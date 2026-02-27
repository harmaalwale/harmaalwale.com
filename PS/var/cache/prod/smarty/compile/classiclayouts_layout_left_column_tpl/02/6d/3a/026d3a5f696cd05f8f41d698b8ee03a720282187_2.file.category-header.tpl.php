<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:43:26
  from '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/category-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac29e31b4b3_14888606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '026d3a5f696cd05f8f41d698b8ee03a720282187' => 
    array (
      0 => '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/category-header.tpl',
      1 => 1746167122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac29e31b4b3_14888606 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="js-product-list-header">
    <?php if ($_smarty_tpl->tpl_vars['listing']->value['pagination']['items_shown_from'] == 1) {?>
        <div class="block-category card card-block">
            <h1 class="h1"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['name']), ENT_QUOTES, 'UTF-8');?>
</h1>
            <div class="block-category-inner">
                <?php if ($_smarty_tpl->tpl_vars['category']->value['description']) {?>
                    <div id="category-description" class="text-muted"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</div>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['cover']['large']['url'])) {?>
                    <div class="category-cover">
                        <picture>
                            <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['cover']['large']['sources']['avif'])) {?><source srcset="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['large']['sources']['avif']), ENT_QUOTES, 'UTF-8');?>
" type="image/avif"><?php }?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['cover']['large']['sources']['webp'])) {?><source srcset="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['large']['sources']['webp']), ENT_QUOTES, 'UTF-8');?>
" type="image/webp"><?php }?>
                            <img src="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['large']['url']), ENT_QUOTES, 'UTF-8');?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['category']->value['cover']['legend'])) {
echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['legend']), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['name']), ENT_QUOTES, 'UTF-8');
}?>" fetchpriority="high" width="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['large']['width']), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['category']->value['cover']['large']['height']), ENT_QUOTES, 'UTF-8');?>
">
                        </picture>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php }?>
</div>
<?php }
}
