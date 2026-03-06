<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:43:26
  from '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/category-footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac29e5c45b3_15196551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0aa688ab169196064ade5658bbe69903cab1f3ca' => 
    array (
      0 => '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/category-footer.tpl',
      1 => 1746167122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac29e5c45b3_15196551 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="js-product-list-footer">
    <?php if ((isset($_smarty_tpl->tpl_vars['category']->value)) && $_smarty_tpl->tpl_vars['category']->value['additional_description'] && $_smarty_tpl->tpl_vars['listing']->value['pagination']['items_shown_from'] == 1) {?>
        <div class="card">
            <div class="card-block category-additional-description">
                <?php echo $_smarty_tpl->tpl_vars['category']->value['additional_description'];?>

            </div>
        </div>
    <?php }?>
</div>
<?php }
}
