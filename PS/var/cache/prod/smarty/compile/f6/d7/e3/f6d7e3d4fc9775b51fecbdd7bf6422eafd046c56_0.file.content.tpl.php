<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:37:30
  from '/home1/harmakko/public_html/PS/admin123/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac13ac10600_08821473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6d7e3d4fc9775b51fecbdd7bf6422eafd046c56' => 
    array (
      0 => '/home1/harmakko/public_html/PS/admin123/themes/default/template/content.tpl',
      1 => 1749535714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac13ac10600_08821473 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>
<div id="content-message-box"></div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
