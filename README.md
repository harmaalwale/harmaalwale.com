# HarmaalWale — CI/CD Setup Guide

## Flow
```
git push → GitHub → Webhook → cPanel Git Pull → .cpanel.yml → public_html updated
```

## One-Time Setup Steps

### STEP 1 — Generate SSH Key (run on your computer terminal)
```bash
ssh-keygen -t ed25519 -C "harmaalwale-deploy" -f ~/.ssh/harmaalwale_deploy
```
This creates two files:
- `~/.ssh/harmaalwale_deploy`      ← PRIVATE KEY (goes to cPanel)
- `~/.ssh/harmaalwale_deploy.pub`  ← PUBLIC KEY  (goes to GitHub)

### STEP 2 — Add Public Key to GitHub
1. Go to: github.com/harmaalwale/harmaalwale.com → Settings → Deploy Keys
2. Click "Add deploy key"
3. Title: `cPanel Deploy Key`
4. Key: paste contents of `harmaalwale_deploy.pub`
5. ✅ Check "Allow write access" → OFF (read-only is safer)
6. Click "Add key"

### STEP 3 — Add Private Key to cPanel
1. Login to cPanel → SSH Access (or Manage SSH Keys)
2. Click "Import Key"
3. Name: `harmaalwale_deploy`
4. Paste contents of `harmaalwale_deploy` (private key) into "Private Key" box
5. Leave passphrase blank
6. Click Import
7. Then click "Manage" next to the key → "Authorize"

### STEP 4 — Set Up Git Version Control in cPanel
1. cPanel → Git Version Control → "Create"
2. Fill in:
   - Clone URL: `git@github.com:harmaalwale/harmaalwale.com.git`
   - Repository Path: `/home/YOUR_USERNAME/harmaalwale_repo`  (NOT public_html)
   - Repository Name: `harmaalwale`
3. Click "Create"
4. cPanel will clone the repo — wait for it to finish

### STEP 5 — Get the cPanel Webhook URL
1. cPanel → Git Version Control → click "Manage" on your repo
2. Copy the "Clone URL" shown — you need the webhook URL
3. The webhook URL format is:
   `https://harmaalwale.com:2083/cpsess.../json-api/cpanel?cpanel_jsonapi_module=VersionControl&cpanel_jsonapi_func=update&cpanel_jsonapi_version=2&repository_root=/home/USER/harmaalwale_repo`
4. OR use cPanel API token method (see STEP 5b below)

### STEP 5b — Generate cPanel API Token (easier webhook)
1. cPanel → Security → Manage API Tokens → Create Token
2. Name: `github-deploy`
3. Copy the token
4. Your webhook URL will be:
   `https://USER:TOKEN@harmaalwale.com:2083/execute/VersionControl/update?repository_root=/home/USER/harmaalwale_repo`

### STEP 6 — Add Webhook URL as GitHub Secret
1. GitHub repo → Settings → Secrets and variables → Actions
2. New secret:
   - Name: `CPANEL_WEBHOOK_URL`
   - Value: the URL from Step 5b

### STEP 7 — Add GitHub Webhook (push trigger)
1. GitHub repo → Settings → Webhooks → Add webhook
2. Payload URL: same URL from Step 5b
3. Content type: `application/json`
4. Events: "Just the push event"
5. Active: ✅
6. Add webhook

### STEP 8 — Test It
```bash
git add .
git commit -m "test: CI/CD pipeline"
git push origin main
```
Then check:
- GitHub → Actions tab → should show green ✅
- cPanel → Git Version Control → should show latest commit
- harmaalwale.com → should show updated site

## Troubleshooting
| Problem | Fix |
|---|---|
| SSH key rejected | Re-authorize key in cPanel SSH Access |
| Webhook 401 error | Regenerate cPanel API token |
| Files not in public_html | Check .cpanel.yml path — replace `YOUR_USERNAME` |
| Port 2083 blocked | Use cPanel's provided webhook URL exactly |
