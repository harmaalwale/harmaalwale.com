// HarmaalWale Auth Widget v3 — Performance Optimized
// ============================================================
//  HarmaalWale — Frontend Auth & UI Widget v2
// ============================================================
const HW = {
  API: 'api',
  token: localStorage.getItem('hw_token'),
  user:  JSON.parse(localStorage.getItem('hw_user') || 'null'),

  async request(path, method='GET', body=null) {
    const controller = new AbortController();
    const tid = setTimeout(() => controller.abort(), 20000); // 20s hard limit
    const opts = { method, headers: {'Content-Type':'application/json'}, signal: controller.signal };
    if (this.token) opts.headers['Authorization'] = 'Bearer ' + this.token;
    if (body) opts.body = JSON.stringify(body);
    try {
      const res = await fetch(this.API + '/' + path, opts);
      clearTimeout(tid);
      return res.json();
    } catch(e) {
      clearTimeout(tid);
      if (e.name === 'AbortError') return {error: 'Request timed out. Please try again.'};
      return {error: 'Network error. Check your connection and try again.'};
    }
  },

  save(token, user) {
    this.token = token; this.user = user;
    localStorage.setItem('hw_token', token);
    localStorage.setItem('hw_user', JSON.stringify(user));
  },

  logout() {
    this.token = null; this.user = null;
    localStorage.removeItem('hw_token');
    localStorage.removeItem('hw_user');
    this.updateUI();
    this.showToast('Signed out. See you soon! 👋');
    document.getElementById('hw-slide-panel')?.remove();
  },

  updateUI() {
    const btn = document.getElementById('hw-account-btn');
    if (btn) {
      btn.style.color = this.user ? '#E87000' : '';
      btn.title = this.user ? this.user.name : 'Sign In / Register';
    }
    if (this.user) {
      this.loadCartCount();
      this.loadWishCount();
    } else {
      const cb = document.getElementById('hw-cart-badge');
      const wb = document.getElementById('hw-wish-badge');
      if (cb) { cb.textContent = ''; cb.style.display = 'none'; }
      if (wb) { wb.textContent = ''; wb.style.display = 'none'; }
    }
  },

  async loadCartCount() {
    const data = await this.request('cart.php');
    const b = document.getElementById('hw-cart-badge');
    if (b) { b.textContent = data.count > 0 ? data.count : ''; b.style.display = data.count > 0 ? 'flex' : 'none'; }
  },

  async loadWishCount() {
    const data = await this.request('wishlist.php');
    const b = document.getElementById('hw-wish-badge');
    if (b) { b.textContent = data.count > 0 ? data.count : ''; b.style.display = data.count > 0 ? 'flex' : 'none'; }
  },

  // ============================================================
  // AUTH MODAL
  // ============================================================
  openAuth(tab='login') {
    if (this.user) { this.showAccountMenu(); return; }
    document.getElementById('hw-auth-modal').classList.add('open');
    this.switchTab(tab);
    setTimeout(() => document.getElementById(tab==='login'?'hw-login-email':'hw-reg-name')?.focus(), 100);
  },

  closeAuth() { document.getElementById('hw-auth-modal').classList.remove('open'); },

  switchTab(tab) {
    document.getElementById('hw-login-form').style.display = tab==='login' ? 'block' : 'none';
    document.getElementById('hw-register-form').style.display = tab==='register' ? 'block' : 'none';
    document.querySelectorAll('.hw-tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab===tab));
    document.getElementById('hw-login-err').textContent = '';
    document.getElementById('hw-reg-err').textContent = '';
  },

  async doLogin() {
    const btn   = document.getElementById('hw-login-btn');
    const email = document.getElementById('hw-login-email').value.trim();
    const pass  = document.getElementById('hw-login-pass').value;
    const err   = document.getElementById('hw-login-err');
    err.textContent = ''; btn.textContent = 'Signing in...'; btn.disabled = true;
    const data = await this.request('auth.php?action=login','POST',{email,password:pass});
    btn.textContent = 'Sign In →'; btn.disabled = false;
    if (!data.success) {
      err.textContent = data.error || 'Login failed';
      if (data.unverified) {
        err.innerHTML = data.error + ' <a href="#" onclick="HW.resendVerify(\'' + email + '\')" style="color:#E87000">Resend verification email</a>';
      }
      return;
    }
    this.save(data.token, data.user);
    this.closeAuth();
    this.updateUI();
    this.showToast(`Welcome back, ${data.user.name}! 👋`);
  },

  async doRegister() {
    const btn     = document.getElementById('hw-reg-btn');
    const nameEl  = document.getElementById('hw-reg-name');
    const emailEl = document.getElementById('hw-reg-email');
    const phoneEl = document.getElementById('hw-reg-phone');
    const passEl  = document.getElementById('hw-reg-pass');
    const err     = document.getElementById('hw-reg-err');

    const name  = nameEl ? nameEl.value.trim() : '';
    const email = emailEl ? emailEl.value.trim() : '';
    const phone = phoneEl ? phoneEl.value.trim() : '';
    const pass  = passEl ? passEl.value : '';

    err.textContent = '';
    if (!name || !email || !pass) { err.textContent = 'Name, email and password are required'; return; }
    if (!email.includes('@')) { err.textContent = 'Please enter a valid email address'; return; }
    if (pass.length < 6) { err.textContent = 'Password must be at least 6 characters'; return; }

    btn.textContent = 'Creating account...';
    btn.disabled = true;

    let data;
    try {
      data = await this.request('auth.php?action=register', 'POST', {name, email, phone, password: pass});
    } catch(e) {
      data = {error: 'Network error. Please try again.'};
    }

    // ALWAYS re-enable button
    btn.textContent = 'Create Account →';
    btn.disabled = false;

    if (!data || !data.success) {
      err.textContent = (data && data.error) ? data.error : 'Registration failed. Please try again.';
      return;
    }

    // SUCCESS: show overlay, do NOT replace form innerHTML
    const box = document.querySelector('.hw-auth-box');
    const prev = document.getElementById('hw-success-overlay');
    if (prev) prev.remove();
    const ov = document.createElement('div');
    ov.id = 'hw-success-overlay';
    ov.style.cssText = 'position:absolute;inset:0;background:#141414;border-radius:16px;z-index:10;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:30px;text-align:center;animation:hwFadeIn .3s ease';
    ov.innerHTML =
      '<div style="font-size:64px;margin-bottom:16px">\uD83D\uDCE7</div>' +
      '<h3 style="color:#fff;font-family:Barlow Condensed,sans-serif;font-size:24px;font-weight:900;text-transform:uppercase;margin:0 0 12px">Check Your Email!</h3>' +
      '<p style="color:#888;font-size:14px;margin:0 0 6px">Verification link sent to</p>' +
      '<p style="color:#E87000;font-weight:700;font-size:15px;margin:0 0 18px;word-break:break-all">' + email + '</p>' +
      '<p style="color:#555;font-size:13px;line-height:1.7;margin:0 0 22px">Click the link in the email to activate your account.<br>Check <b style=\'color:#aaa\'>spam</b> if you don't see it within 2 minutes.</p>' +
      '<button id="hw-got-it-btn" style="background:#E87000;color:#fff;border:none;padding:12px 28px;border-radius:7px;font-family:Barlow Condensed,sans-serif;font-size:15px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer;margin-bottom:8px">Got it! →</button><br>' +
      '<button onclick="HW.closeAuth()" style="background:none;border:none;color:#444;font-size:12px;cursor:pointer;margin-top:8px">Close</button>';
    if (box) {
      box.style.position = 'relative';
      box.appendChild(ov);
      document.getElementById('hw-got-it-btn').onclick = function() {
        ov.remove();
        HW.switchTab('login');
      };
    }
  },

  async resendVerify(email) {
    const data = await this.request('auth.php?action=resend_verify','POST',{email});
    this.showToast(data.success ? 'Verification email resent! Check your inbox.' : data.error||'Failed', data.success?'ok':'err');
  },

  // ============================================================
  // ACCOUNT MENU DROPDOWN
  // ============================================================
  showAccountMenu() {
    document.getElementById('hw-slide-panel')?.remove();
    let menu = document.getElementById('hw-account-menu');
    if (menu) { menu.remove(); return; }
    menu = document.createElement('div');
    menu.id = 'hw-account-menu';
    menu.innerHTML = `
      <div class="hw-menu-header">
        <div class="hw-menu-avatar">${this.user.name.charAt(0).toUpperCase()}</div>
        <div>
          <div class="hw-menu-name">${this.user.name}</div>
          <div class="hw-menu-email">${this.user.email}</div>
        </div>
      </div>
      <div class="hw-menu-item" onclick="HW.showOrders()"><span>📦</span> My Orders</div>
      <div class="hw-menu-item" onclick="HW.showWishlist()"><span>♡</span> My Wishlist</div>
      <div class="hw-menu-item" onclick="HW.showCart()"><span>🛒</span> My Cart</div>
      <div class="hw-menu-item" onclick="HW.showAddresses()"><span>📍</span> My Addresses</div>
      <div class="hw-menu-item" onclick="HW.showProfile()"><span>⚙️</span> Profile Settings</div>
      <div class="hw-menu-item" onclick="window.location.href='support.html'"><span>🎧</span> Customer Support</div>
      ${this.user.role==='admin'?'<div class="hw-menu-sep"></div><div class="hw-menu-item" onclick="window.open(\'admin.html\',\'_blank\')" style="color:#E87000"><span>🛠️</span> Admin Panel</div>':''}
      <div class="hw-menu-sep"></div>
      <div class="hw-menu-item hw-menu-logout" onclick="HW.logout()"><span>🚪</span> Sign Out</div>`;
    document.body.appendChild(menu);
    setTimeout(() => document.addEventListener('click', function h(e) {
      if (!menu.contains(e.target) && e.target.id !== 'hw-account-btn') { menu.remove(); document.removeEventListener('click',h); }
    }), 50);
  },

  // ============================================================
  // SLIDE PANEL HELPER
  // ============================================================
  openPanel(title, html, icon='') {
    document.getElementById('hw-account-menu')?.remove();
    let panel = document.getElementById('hw-slide-panel');
    if (!panel) {
      panel = document.createElement('div');
      panel.id = 'hw-slide-panel';
      document.body.appendChild(panel);
    }
    panel.className = 'hw-slide-panel';
    panel.innerHTML = `
      <div class="hw-panel-hdr">
        <div style="display:flex;align-items:center;gap:10px"><span style="font-size:20px">${icon}</span><span>${title}</span></div>
        <button onclick="document.getElementById('hw-slide-panel').remove()" class="hw-panel-close">✕</button>
      </div>
      <div id="hw-panel-body" class="hw-panel-body">${html}</div>`;
    document.addEventListener('keydown', function esc(e) {
      if (e.key==='Escape') { panel?.remove(); document.removeEventListener('keydown',esc); }
    });
  },

  // ============================================================
  // MY ORDERS
  // ============================================================
  async showOrders() {
    if (!this.user) { this.openAuth(); return; }
    this.openPanel('My Orders', '<div class="hw-loading"><div class="hw-spin"></div></div>', '📦');
    const data = await this.request('orders.php');
    const body = document.getElementById('hw-panel-body');
    if (!body) return;
    if (!data.orders?.length) {
      body.innerHTML = `<div class="hw-empty"><div style="font-size:48px;margin-bottom:12px">📦</div><p>No orders yet.</p><a href="fashion.html" class="hw-panel-btn" style="text-decoration:none;display:inline-block;margin-top:10px">Start Shopping →</a></div>`;
      return;
    }
    body.innerHTML = data.orders.map(o => `
      <div class="hw-order-card">
        <div class="hw-order-top">
          <span class="hw-mono">${o.order_number}</span>
          <span class="hw-status ${o.status}">${o.status}</span>
        </div>
        <div class="hw-order-items">${(o.items||[]).map(i=>`<span>${i.name} ×${i.quantity}</span>`).join(', ')}</div>
        <div class="hw-order-bottom">
          <span style="font-weight:700;font-size:15px">₹${Number(o.total).toLocaleString()}</span>
          <span style="color:#666;font-size:12px">${new Date(o.created_at).toLocaleDateString('en-IN',{day:'numeric',month:'short',year:'numeric'})}</span>
        </div>
      </div>`).join('');
  },

  // ============================================================
  // CART
  // ============================================================
  async openCart() { this.showCart(); },
  async showCart() {
    if (!this.user) { this.openAuth(); return; }
    this.openPanel('My Cart', '<div class="hw-loading"><div class="hw-spin"></div></div>', '🛒');
    await this._renderCart();
  },

  async _renderCart() {
    const data = await this.request('cart.php');
    const body = document.getElementById('hw-panel-body');
    if (!body) return;
    const badge = document.getElementById('hw-cart-badge');
    if (badge) badge.textContent = data.count > 0 ? data.count : '';
    if (!data.items?.length) {
      body.innerHTML = `<div class="hw-empty"><div style="font-size:48px;margin-bottom:12px">🛒</div><p>Your cart is empty.</p><a href="fashion.html" class="hw-panel-btn" style="text-decoration:none;display:inline-block;margin-top:10px">Shop Now →</a></div>`;
      return;
    }
    body.innerHTML = `
      ${data.items.map(item => `
        <div class="hw-cart-item" id="ci-${item.id}">
          <div class="hw-cart-img">${item.image ? `<img src="${item.image}" style="width:100%;height:100%;object-fit:cover;border-radius:6px">` : '👕'}</div>
          <div class="hw-cart-info">
            <div class="hw-cart-name">${item.name}</div>
            <div class="hw-cart-meta">Size: ${item.size||'—'} · ${item.fabric||''}</div>
            <div class="hw-cart-price">${item.price > 0 ? '₹'+item.price : 'Price on enquiry'}</div>
          </div>
          <div class="hw-cart-qty">
            <button onclick="HW.updateCartItem(${item.id},${item.quantity-1})">−</button>
            <span>${item.quantity}</span>
            <button onclick="HW.updateCartItem(${item.id},${item.quantity+1})">+</button>
          </div>
          <button class="hw-cart-remove" onclick="HW.removeCartItem(${item.id})" title="Remove">✕</button>
        </div>`).join('')}
      <div class="hw-cart-footer">
        <div class="hw-cart-total">
          <span>Subtotal (${data.count} items)</span>
          <span style="font-weight:900;font-size:18px;color:#E87000">₹${data.subtotal > 0 ? Number(data.subtotal).toLocaleString() : 'On Enquiry'}</span>
        </div>
        <button class="hw-panel-btn" onclick="HW.checkout()" style="width:100%;margin-top:12px">Proceed to Checkout →</button>
        <button onclick="HW.clearCart()" style="width:100%;margin-top:8px;background:none;border:1px solid #e74c3c;color:#e74c3c;padding:9px;border-radius:6px;font-size:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer">Clear Cart</button>
      </div>`;
  },

  async updateCartItem(id, qty) {
    await this.request('cart.php?id='+id,'PUT',{quantity:qty});
    await this._renderCart();
  },
  async removeCartItem(id) {
    await this.request('cart.php?id='+id,'DELETE');
    await this._renderCart();
    this.showToast('Item removed from cart');
  },
  async clearCart() {
    if (!confirm('Clear your entire cart?')) return;
    await this.request('cart.php?clear=1','DELETE');
    await this._renderCart();
  },
  async checkout() {
    this.openPanel('Checkout', `
      <div style="text-align:center;padding:30px">
        <div style="font-size:48px;margin-bottom:16px">🚧</div>
        <h3 style="font-family:'Barlow Condensed',sans-serif;font-size:22px;font-weight:900;text-transform:uppercase;margin-bottom:10px">Checkout Coming Soon</h3>
        <p style="color:#666;font-size:14px;line-height:1.7;margin-bottom:20px">Online checkout is being set up. For now, place your order via WhatsApp or email and we'll confirm it manually.</p>
        <a href="https://wa.me/91XXXXXXXXXX?text=Hi, I'd like to place an order from my cart" target="_blank" class="hw-panel-btn" style="text-decoration:none;display:inline-block;margin-bottom:10px;background:#25D366">💬 Order via WhatsApp</a><br>
        <a href="support.html" style="color:#E87000;font-size:13px">Or contact our support team →</a>
      </div>`, '🛒');
  },

  async addToCart(productId, productName) {
    if (!this.user) { this.showToast('Please sign in to add to cart','err'); this.openAuth('login'); return; }
    const data = await this.request('cart.php','POST',{product_id:productId,quantity:1});
    if (data.success) { this.showToast(`${productName||'Item'} added to cart 🛒`); this.loadCartCount(); }
    else this.showToast(data.error||'Failed to add','err');
  },

  // ============================================================
  // WISHLIST
  // ============================================================
  async openWishlist() { this.showWishlist(); },
  async showWishlist() {
    if (!this.user) { this.openAuth(); return; }
    this.openPanel('My Wishlist', '<div class="hw-loading"><div class="hw-spin"></div></div>', '♡');
    await this._renderWishlist();
  },

  async _renderWishlist() {
    const data = await this.request('wishlist.php');
    const body = document.getElementById('hw-panel-body');
    if (!body) return;
    const wb = document.getElementById('hw-wish-badge');
    if (wb) { if (data.count>0){wb.textContent=data.count;wb.style.display='flex';}else{wb.textContent='';wb.style.display='none';} }
    if (!data.items?.length) {
      body.innerHTML = `<div class="hw-empty"><div style="font-size:48px;margin-bottom:12px">♡</div><p>Your wishlist is empty.</p><a href="fashion.html" class="hw-panel-btn" style="text-decoration:none;display:inline-block;margin-top:10px">Explore Products →</a></div>`;
      return;
    }
    body.innerHTML = data.items.map(item => `
      <div class="hw-cart-item">
        <div class="hw-cart-img">${item.image ? `<img src="${item.image}" style="width:100%;height:100%;object-fit:cover;border-radius:6px">` : '👕'}</div>
        <div class="hw-cart-info">
          <div class="hw-cart-name">${item.name}</div>
          <div class="hw-cart-meta">Size: ${item.size||'—'}</div>
          <div class="hw-cart-price">${item.price > 0 ? '₹'+item.price : 'Price on enquiry'}</div>
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;align-items:flex-end">
          <button onclick="HW.addToCart(${item.product_id},'${item.name.replace(/'/g,"\\'")}');HW.removeWishItem(${item.id})" style="background:#E87000;color:#fff;border:none;padding:6px 12px;border-radius:5px;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer">+ Cart</button>
          <button onclick="HW.removeWishItem(${item.id})" class="hw-cart-remove" title="Remove">✕</button>
        </div>
      </div>`).join('');
  },

  async removeWishItem(id) {
    await this.request('wishlist.php?id='+id,'DELETE');
    await this._renderWishlist();
  },

  async addToWishlist(productId, productName) {
    if (!this.user) { this.showToast('Please sign in first','err'); this.openAuth('login'); return; }
    const data = await this.request('wishlist.php','POST',{product_id:productId});
    if (data.success) { this.showToast(`${productName||'Item'} added to wishlist ♡`); this.loadWishCount(); }
    else this.showToast(data.error||'Already in wishlist','err');
  },

  // ============================================================
  // MY ADDRESSES
  // ============================================================
  async showAddresses() {
    if (!this.user) { this.openAuth(); return; }
    this.openPanel('My Addresses', '<div class="hw-loading"><div class="hw-spin"></div></div>', '📍');
    await this._renderAddresses();
  },

  async _renderAddresses() {
    const data = await this.request('addresses.php');
    const body = document.getElementById('hw-panel-body');
    if (!body) return;
    let html = (data.addresses||[]).map(a => `
      <div class="hw-addr-card">
        <div class="hw-addr-top">
          <span class="hw-addr-label">${a.label} ${a.is_default?'<span style="color:#E87000;font-size:11px">(Default)</span>':''}</span>
          <button onclick="HW.deleteAddress(${a.id})" style="background:none;border:none;color:#e74c3c;cursor:pointer;font-size:16px">🗑</button>
        </div>
        <div class="hw-addr-name">${a.name||''} ${a.phone?'· '+a.phone:''}</div>
        <div class="hw-addr-line">${a.line1}${a.line2?', '+a.line2:''}</div>
        <div class="hw-addr-line">${a.city}, ${a.state} — ${a.pincode}</div>
      </div>`).join('');
    html += `
      <div style="margin-top:16px">
        <button onclick="HW.showAddAddressForm()" class="hw-panel-btn" style="width:100%">+ Add New Address</button>
      </div>
      <div id="hw-add-addr-form" style="display:none;margin-top:16px;background:#111;border-radius:10px;padding:16px">
        <div style="font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#E87000;margin-bottom:14px">New Address</div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
          <div><label class="hw-lbl">Label</label><input class="hw-inp" id="a-label" value="Home" placeholder="Home/Work"></div>
          <div><label class="hw-lbl">Full Name</label><input class="hw-inp" id="a-name" placeholder="Recipient name"></div>
          <div><label class="hw-lbl">Phone</label><input class="hw-inp" id="a-phone" placeholder="+91..."></div>
          <div><label class="hw-lbl">Pincode</label><input class="hw-inp" id="a-pin" placeholder="302001"></div>
        </div>
        <div style="margin-top:10px"><label class="hw-lbl">Address Line 1</label><input class="hw-inp" id="a-line1" placeholder="House/Flat No., Street"></div>
        <div style="margin-top:10px"><label class="hw-lbl">Address Line 2 (optional)</label><input class="hw-inp" id="a-line2" placeholder="Area, Landmark"></div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px">
          <div><label class="hw-lbl">City</label><input class="hw-inp" id="a-city" placeholder="City"></div>
          <div><label class="hw-lbl">State</label><input class="hw-inp" id="a-state" value="Rajasthan" placeholder="State"></div>
        </div>
        <button onclick="HW.saveAddress()" class="hw-panel-btn" style="width:100%;margin-top:14px">Save Address</button>
      </div>`;
    if (!data.addresses?.length) html = `<div class="hw-empty"><div style="font-size:40px;margin-bottom:10px">📍</div><p>No saved addresses.</p></div>` + html;
    body.innerHTML = html;
  },

  showAddAddressForm() {
    const f = document.getElementById('hw-add-addr-form');
    if (f) f.style.display = f.style.display==='none' ? 'block' : 'none';
  },

  async saveAddress() {
    const addr = {
      label: document.getElementById('a-label').value||'Home',
      name:  document.getElementById('a-name').value,
      phone: document.getElementById('a-phone').value,
      line1: document.getElementById('a-line1').value,
      line2: document.getElementById('a-line2').value,
      city:  document.getElementById('a-city').value,
      state: document.getElementById('a-state').value,
      pincode: document.getElementById('a-pin').value,
      country: 'India',
      is_default: 0
    };
    if (!addr.line1||!addr.city||!addr.pincode) { this.showToast('Please fill required fields','err'); return; }
    const data = await this.request('addresses.php','POST',addr);
    if (data.success) { this.showToast('Address saved ✓'); this._renderAddresses(); }
    else this.showToast(data.error||'Failed','err');
  },

  async deleteAddress(id) {
    if (!confirm('Delete this address?')) return;
    await this.request('addresses.php?id='+id,'DELETE');
    this._renderAddresses();
  },

  // ============================================================
  // PROFILE SETTINGS
  // ============================================================
  async showProfile() {
    if (!this.user) { this.openAuth(); return; }
    this.openPanel('Profile Settings', `
      <div class="hw-profile-avatar">${this.user.name.charAt(0).toUpperCase()}</div>
      <div style="text-align:center;margin-bottom:20px">
        <div style="font-weight:800;font-size:16px;color:#fff">${this.user.name}</div>
        <div style="font-size:13px;color:#555">${this.user.email}</div>
        <div style="display:inline-block;margin-top:6px;background:rgba(232,112,0,.15);color:#E87000;border:1px solid rgba(232,112,0,.3);padding:3px 12px;border-radius:20px;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase">${this.user.role}</div>
      </div>
      <div class="hw-profile-section">
        <div class="hw-profile-section-title">Personal Information</div>
        <label class="hw-lbl">Full Name</label><input class="hw-inp" id="hw-prof-name" value="${this.user.name}" style="margin-bottom:12px">
        <label class="hw-lbl">Phone Number</label><input class="hw-inp" id="hw-prof-phone" value="${this.user.phone||''}" placeholder="+91 98765 43210" style="margin-bottom:12px">
        <label class="hw-lbl">Email (cannot be changed)</label><input class="hw-inp" value="${this.user.email}" disabled style="opacity:.4;margin-bottom:16px">
        <button onclick="HW.saveProfile()" class="hw-panel-btn" style="width:100%">Save Changes</button>
      </div>
      <div class="hw-profile-section" style="margin-top:16px">
        <div class="hw-profile-section-title">Change Password</div>
        <label class="hw-lbl">Current Password</label><input type="password" class="hw-inp" id="hw-cur-pass" placeholder="••••••••" style="margin-bottom:12px">
        <label class="hw-lbl">New Password</label><input type="password" class="hw-inp" id="hw-new-pass" placeholder="Min. 6 characters" style="margin-bottom:16px">
        <button onclick="HW.changePass()" style="width:100%;background:#1e1e1e;border:1px solid #333;color:#aaa;padding:10px;border-radius:6px;font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer">Update Password</button>
      </div>
      <div class="hw-profile-section" style="margin-top:16px">
        <button onclick="HW.logout()" style="width:100%;background:none;border:1px solid #e74c3c;color:#e74c3c;padding:11px;border-radius:6px;font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer">🚪 Sign Out</button>
      </div>`, '⚙️');
  },

  async saveProfile() {
    const name  = document.getElementById('hw-prof-name')?.value.trim();
    const phone = document.getElementById('hw-prof-phone')?.value.trim();
    if (!name) { this.showToast('Name cannot be empty','err'); return; }
    const data = await this.request('auth.php?action=update_profile','POST',{name,phone});
    if (data.success) {
      this.user.name = name; this.user.phone = phone;
      localStorage.setItem('hw_user', JSON.stringify(this.user));
      this.showToast('Profile updated ✓');
      this.updateUI();
    } else this.showToast(data.error||'Failed','err');
  },

  async changePass() {
    const cur = document.getElementById('hw-cur-pass')?.value;
    const nw  = document.getElementById('hw-new-pass')?.value;
    if (!cur||!nw) { this.showToast('Both passwords required','err'); return; }
    const data = await this.request('auth.php?action=change_password','POST',{current_password:cur,new_password:nw});
    this.showToast(data.success ? 'Password changed successfully ✓' : data.error||'Failed', data.success?'ok':'err');
    if (data.success) { document.getElementById('hw-cur-pass').value=''; document.getElementById('hw-new-pass').value=''; }
  },

  // ============================================================
  // TOAST
  // ============================================================
  showToast(msg, type='ok') {
    let t = document.getElementById('hw-toast');
    if (!t) {
      t = document.createElement('div'); t.id='hw-toast';
      document.body.appendChild(t);
    }
    t.textContent = msg; t.className = 'hw-toast-show hw-toast-' + type;
    clearTimeout(this._toastTimer);
    this._toastTimer = setTimeout(() => t.className = '', 3500);
  },

  // ============================================================
  // INIT
  // ============================================================
  init() {
    const style = document.createElement('style');
    style.textContent = `
      @keyframes hwSlideIn{from{transform:translateX(100%);opacity:0}to{transform:translateX(0);opacity:1}}
      @keyframes hwFadeIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:translateY(0)}}
      @keyframes hwSpin{to{transform:rotate(360deg)}}

      /* AUTH MODAL */
      #hw-auth-modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,.88);z-index:9999;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(6px)}
      #hw-auth-modal.open{display:flex}
      .hw-auth-box{background:#141414;border:1px solid #252525;border-radius:16px;width:100%;max-width:420px;position:relative;animation:hwFadeIn .3s ease}
      .hw-auth-header{padding:28px 28px 0;text-align:center}
      .hw-auth-header h2{font-size:26px;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#fff;margin-bottom:6px;font-family:'Barlow Condensed',sans-serif}
      .hw-auth-header h2 span{color:#E87000}
      .hw-auth-header p{font-size:13px;color:#555;margin-bottom:20px}
      .hw-tabs{display:flex;border-bottom:1px solid #222}
      .hw-tab-btn{flex:1;background:none;border:none;padding:13px;font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:#444;cursor:pointer;border-bottom:2px solid transparent;transition:all .2s}
      .hw-tab-btn.active{color:#E87000;border-bottom-color:#E87000}
      .hw-auth-body{padding:24px 28px 28px}
      .hw-field{margin-bottom:14px}
      .hw-field label{display:block;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:#555;margin-bottom:7px}
      .hw-field input{width:100%;background:#111;border:1px solid #222;border-radius:7px;padding:11px 14px;color:#fff;font-family:'Barlow',sans-serif;font-size:14px;outline:none;transition:border-color .2s}
      .hw-field input:focus{border-color:#E87000}
      .hw-field input::placeholder{color:#333}
      .hw-submit{width:100%;background:#E87000;color:#fff;border:none;padding:13px;border-radius:7px;font-family:'Barlow Condensed',sans-serif;font-size:16px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer;margin-top:6px;transition:all .2s}
      .hw-submit:hover:not(:disabled){background:#ff8c1a}
      .hw-submit:disabled{opacity:.6;cursor:default}
      .hw-err{color:#e74c3c;font-size:13px;margin-top:8px;min-height:18px;line-height:1.4}
      .hw-auth-close{position:absolute;top:14px;right:14px;background:#1e1e1e;border:1px solid #333;color:#666;width:30px;height:30px;border-radius:50%;font-size:14px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s}
      .hw-auth-close:hover{color:#fff;border-color:#555}

      /* ACCOUNT MENU */
      #hw-account-menu{position:fixed;top:70px;right:40px;background:#1a1a1a;border:1px solid #2a2a2a;border-radius:12px;min-width:230px;z-index:9999;box-shadow:0 20px 50px rgba(0,0,0,.6);overflow:hidden;animation:hwFadeIn .2s ease}
      .hw-menu-header{padding:14px 16px;border-bottom:1px solid #222;background:#111;display:flex;align-items:center;gap:12px}
      .hw-menu-avatar{width:38px;height:38px;border-radius:50%;background:#E87000;color:#fff;display:flex;align-items:center;justify-content:center;font-family:'Barlow Condensed',sans-serif;font-size:18px;font-weight:900;flex-shrink:0}
      .hw-menu-name{font-weight:700;font-size:14px;color:#fff}
      .hw-menu-email{font-size:11px;color:#555;margin-top:1px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:160px}
      .hw-menu-item{padding:11px 16px;font-size:13px;color:#aaa;cursor:pointer;transition:all .2s;display:flex;align-items:center;gap:10px}
      .hw-menu-item:hover{background:#222;color:#fff}
      .hw-menu-sep{height:1px;background:#1e1e1e;margin:4px 0}
      .hw-menu-logout{color:#e74c3c !important}
      .hw-menu-logout:hover{background:rgba(231,76,60,.1) !important;color:#e74c3c !important}

      /* SLIDE PANEL */
      .hw-slide-panel{position:fixed;top:0;right:0;width:400px;max-width:100vw;height:100vh;background:#0d0d0d;border-left:1px solid #1e1e1e;z-index:9998;display:flex;flex-direction:column;animation:hwSlideIn .28s cubic-bezier(.25,.46,.45,.94);box-shadow:-20px 0 60px rgba(0,0,0,.6)}
      .hw-panel-hdr{padding:18px 20px;border-bottom:1px solid #1e1e1e;display:flex;align-items:center;justify-content:space-between;background:#111;font-family:'Barlow Condensed',sans-serif;font-size:16px;font-weight:800;text-transform:uppercase;letter-spacing:1px;color:#fff;flex-shrink:0}
      .hw-panel-close{background:#1e1e1e;border:1px solid #2a2a2a;color:#666;width:32px;height:32px;border-radius:50%;font-size:15px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .2s}
      .hw-panel-close:hover{color:#fff;background:#333}
      .hw-panel-body{flex:1;overflow-y:auto;padding:16px;scrollbar-width:thin;scrollbar-color:#222 transparent}
      .hw-panel-body::-webkit-scrollbar{width:4px}
      .hw-panel-body::-webkit-scrollbar-thumb{background:#222;border-radius:4px}
      .hw-panel-btn{background:#E87000;color:#fff;border:none;padding:11px 22px;border-radius:7px;font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer;transition:all .2s}
      .hw-panel-btn:hover{background:#ff8c1a}

      /* CART & WISHLIST */
      .hw-cart-item{display:flex;align-items:center;gap:12px;background:#141414;border:1px solid #1e1e1e;border-radius:10px;padding:12px;margin-bottom:10px}
      .hw-cart-img{width:56px;height:56px;border-radius:7px;background:#222;display:flex;align-items:center;justify-content:center;font-size:24px;overflow:hidden;flex-shrink:0}
      .hw-cart-info{flex:1;min-width:0}
      .hw-cart-name{font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:700;text-transform:uppercase;color:#fff;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
      .hw-cart-meta{font-size:11px;color:#555;margin-top:2px}
      .hw-cart-price{font-size:13px;font-weight:700;color:#E87000;margin-top:4px}
      .hw-cart-qty{display:flex;align-items:center;gap:8px;background:#1e1e1e;border-radius:6px;padding:4px 8px}
      .hw-cart-qty button{background:none;border:none;color:#aaa;font-size:16px;cursor:pointer;width:20px;text-align:center;line-height:1;transition:color .2s}
      .hw-cart-qty button:hover{color:#E87000}
      .hw-cart-qty span{font-size:13px;font-weight:700;color:#fff;min-width:16px;text-align:center}
      .hw-cart-remove{background:none;border:none;color:#333;font-size:14px;cursor:pointer;padding:4px;transition:color .2s;flex-shrink:0}
      .hw-cart-remove:hover{color:#e74c3c}
      .hw-cart-footer{background:#141414;border:1px solid #1e1e1e;border-radius:10px;padding:16px;margin-top:8px}
      .hw-cart-total{display:flex;justify-content:space-between;align-items:center;font-size:13px;color:#666;margin-bottom:4px}

      /* ORDERS */
      .hw-order-card{background:#141414;border:1px solid #1e1e1e;border-radius:10px;padding:14px 16px;margin-bottom:10px}
      .hw-order-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
      .hw-mono{font-family:monospace;color:#E87000;font-size:13px}
      .hw-order-items{font-size:12px;color:#555;margin-bottom:8px;line-height:1.5}
      .hw-order-bottom{display:flex;justify-content:space-between;align-items:center;border-top:1px solid #1e1e1e;padding-top:8px;margin-top:4px}
      .hw-status{display:inline-block;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.5px}
      .hw-status.pending{background:rgba(232,112,0,.15);color:#E87000}
      .hw-status.confirmed,.hw-status.delivered{background:rgba(76,175,80,.15);color:#4CAF50}
      .hw-status.cancelled{background:rgba(231,76,60,.15);color:#e74c3c}
      .hw-status.processing,.hw-status.shipped{background:rgba(68,136,255,.15);color:#4488ff}

      /* ADDRESSES */
      .hw-addr-card{background:#141414;border:1px solid #1e1e1e;border-radius:10px;padding:14px 16px;margin-bottom:10px}
      .hw-addr-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:6px}
      .hw-addr-label{font-family:'Barlow Condensed',sans-serif;font-size:14px;font-weight:800;text-transform:uppercase;color:#fff}
      .hw-addr-name{font-size:13px;font-weight:600;color:#aaa;margin-bottom:3px}
      .hw-addr-line{font-size:12px;color:#555;line-height:1.5}

      /* PROFILE */
      .hw-profile-avatar{width:60px;height:60px;border-radius:50%;background:#E87000;color:#fff;display:flex;align-items:center;justify-content:center;font-family:'Barlow Condensed',sans-serif;font-size:28px;font-weight:900;margin:0 auto 10px}
      .hw-profile-section{background:#141414;border:1px solid #1e1e1e;border-radius:10px;padding:16px}
      .hw-profile-section-title{font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#E87000;margin-bottom:14px}

      /* INPUTS */
      .hw-inp{width:100%;background:#1e1e1e;border:1px solid #2a2a2a;border-radius:6px;padding:10px 12px;color:#fff;font-family:'Barlow',sans-serif;font-size:13px;outline:none;transition:border-color .2s;display:block}
      .hw-inp:focus{border-color:#E87000}
      .hw-inp::placeholder{color:#333}
      .hw-inp:disabled{opacity:.4;cursor:default}
      .hw-lbl{display:block;font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#555;margin-bottom:5px}

      /* LOADING & EMPTY */
      .hw-loading{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:50px;color:#555;font-size:13px;gap:12px}
      .hw-spin{width:28px;height:28px;border:2px solid #222;border-top-color:#E87000;border-radius:50%;animation:hwSpin .7s linear infinite}
      .hw-empty{text-align:center;padding:40px 20px;color:#555;font-size:14px}
      .hw-empty p{margin-bottom:6px}

      /* TOAST */
      #hw-toast{position:fixed;bottom:24px;right:24px;background:#1a1a1a;border-radius:8px;padding:12px 20px;font-size:13px;font-weight:600;z-index:99999;opacity:0;pointer-events:none;transition:opacity .3s,transform .3s;transform:translateY(10px);max-width:300px}
      .hw-toast-show{opacity:1 !important;transform:translateY(0) !important}
      .hw-toast-ok{border:1px solid #4CAF50;color:#4CAF50}
      .hw-toast-err{border:1px solid #e74c3c;color:#e74c3c}

      @media(max-width:480px){
        .hw-slide-panel{width:100vw}
        #hw-account-menu{right:10px;left:10px;width:auto}
      }
    `;
    document.head.appendChild(style);

    // Inject auth modal
    const modal = document.createElement('div');
    modal.id = 'hw-auth-modal';
    modal.innerHTML = `
      <div class="hw-auth-box">
        <button class="hw-auth-close" onclick="HW.closeAuth()">✕</button>
        <div class="hw-auth-header">
          <h2>Harmaal<span>Wale</span></h2>
          <p>Sign in to your account</p>
        </div>
        <div class="hw-tabs">
          <button class="hw-tab-btn active" data-tab="login" onclick="HW.switchTab('login')">Sign In</button>
          <button class="hw-tab-btn" data-tab="register" onclick="HW.switchTab('register')">Create Account</button>
        </div>
        <div class="hw-auth-body">
          <div id="hw-login-form">
            <div class="hw-field"><label>Email Address</label><input type="email" id="hw-login-email" placeholder="you@example.com" onkeydown="if(event.key==='Enter')HW.doLogin()"></div>
            <div class="hw-field"><label>Password</label><input type="password" id="hw-login-pass" placeholder="••••••••" onkeydown="if(event.key==='Enter')HW.doLogin()"></div>
            <button class="hw-submit" id="hw-login-btn" onclick="HW.doLogin()">Sign In →</button>
            <div class="hw-err" id="hw-login-err"></div>
          </div>
          <div id="hw-register-form" style="display:none">
            <div class="hw-field"><label>Full Name</label><input type="text" id="hw-reg-name" placeholder="Your full name"></div>
            <div class="hw-field"><label>Email Address</label><input type="email" id="hw-reg-email" placeholder="you@example.com"></div>
            <div class="hw-field"><label>Phone (optional)</label><input type="tel" id="hw-reg-phone" placeholder="+91 98765 43210"></div>
            <div class="hw-field"><label>Password</label><input type="password" id="hw-reg-pass" placeholder="Min. 6 characters" onkeydown="if(event.key==='Enter')HW.doRegister()"></div>
            <button class="hw-submit" id="hw-reg-btn" onclick="HW.doRegister()">Create Account →</button>
            <div class="hw-err" id="hw-reg-err"></div>
          </div>
        </div>
      </div>`;
    document.body.appendChild(modal);
    modal.addEventListener('click', e => { if(e.target===modal) HW.closeAuth(); });

    // ── Wire all header icon buttons ──────────────────────────────
    // Remove any existing onclick attributes first, then use addEventListener
    const accountBtn = document.getElementById('hw-account-btn');
    if (accountBtn) {
      accountBtn.removeAttribute('onclick');
      accountBtn.addEventListener('click', () => {
        if (HW.user) HW.showAccountMenu();
        else HW.openAuth('login');
      });
    }

    const wishlistBtn = document.getElementById('hw-wishlist-btn');
    if (wishlistBtn) {
      wishlistBtn.removeAttribute('onclick');
      wishlistBtn.addEventListener('click', () => HW.openWishlist());
    }

    const cartBtn = document.getElementById('hw-cart-btn');
    if (cartBtn) {
      cartBtn.removeAttribute('onclick');
      cartBtn.addEventListener('click', () => HW.openCart());
    }

    this.updateUI();
  }
};

document.addEventListener('DOMContentLoaded', () => HW.init());
