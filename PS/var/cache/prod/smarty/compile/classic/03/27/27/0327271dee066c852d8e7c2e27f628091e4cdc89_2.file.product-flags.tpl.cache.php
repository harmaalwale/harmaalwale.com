<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:34:45
  from '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/product-flags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac095a51198_63179571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0327271dee066c852d8e7c2e27f628091e4cdc89' => 
    array (
      0 => '/home1/harmakko/public_html/PS/themes/classic/templates/catalog/_partials/product-flags.tpl',
      1 => 1746167122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac095a51198_63179571 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->compiled->nocache_hash = '76399177168aac095a4cbb8_23275075';
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192064230668aac095a4f025_62990918', 'product_flags');
?>

<?php }
/* {block 'product_flags'} */
class Block_192064230668aac095a4f025_62990918 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_flags' => 
  array (
    0 => 'Block_192064230668aac095a4f025_62990918',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <ul class="product-flags js-product-flags">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
            <li class="product-flag <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['flag']->value['type']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['flag']->value['label']), ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php
}
}
/* {/block 'product_flags'} */
}
