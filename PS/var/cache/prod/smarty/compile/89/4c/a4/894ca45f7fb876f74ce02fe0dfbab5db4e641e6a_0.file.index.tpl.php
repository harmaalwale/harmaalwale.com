<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:48:30
  from '/home1/harmakko/public_html/PS/modules/ps_themecusto/views/templates/admin/controllers/configuration/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac3ce37c4f9_34623525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '894ca45f7fb876f74ce02fe0dfbab5db4e641e6a' => 
    array (
      0 => '/home1/harmakko/public_html/PS/modules/ps_themecusto/views/templates/admin/controllers/configuration/index.tpl',
      1 => 1737601160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./dropdownList.tpl' => 3,
    'file:./elem/modal.tpl' => 1,
  ),
),false)) {
function content_68aac3ce37c4f9_34623525 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="psthemecusto" class="container-fluid clearfix">
    <div class="panel row">
        <div class="panel-heading text-center">
            <button class="btn btn-primary btn-lg selected" data-id-modal="homepageModal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Homepage','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</button>
            <button class="btn btn-primary btn-lg" data-id-modal="categoryModal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Category page','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</button>
            <button class="btn btn-primary btn-lg" data-id-modal="productModal"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product page','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</button>
        </div>

        <?php $_smarty_tpl->_subTemplateRender("file:./dropdownList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('elementsList'=>$_smarty_tpl->tpl_vars['homePageList']->value,'idModal'=>'homepage','defaultModalClass'=>''), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:./dropdownList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('elementsList'=>$_smarty_tpl->tpl_vars['categoryPageList']->value,'idModal'=>'category','defaultModalClass'=>'hide'), 0, true);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:./dropdownList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('elementsList'=>$_smarty_tpl->tpl_vars['productPageList']->value,'idModal'=>'product','defaultModalClass'=>'hide'), 0, true);
?>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:./elem/modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php }
}
