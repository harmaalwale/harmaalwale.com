<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:43:25
  from 'module:ps_facetedsearchviewstemplatesfrontcatalogactivefilters.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac29d78ac48_08172663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e807335546cfa2360c36327ac89dd2fcb054379' => 
    array (
      0 => 'module:ps_facetedsearchviewstemplatesfrontcatalogactivefilters.tpl',
      1 => 1733471274,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac29d78ac48_08172663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home1/harmakko/public_html/PS/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<section id="js-active-search-filters" class="<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['activeFilters']->value)) {?>active_filters<?php } else { ?>hide<?php }?>">
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2194776568aac29d784df8_88442782', 'active_filters_title');
?>


  <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['activeFilters']->value)) {?>
    <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['activeFilters']->value, 'filter');
$_smarty_tpl->tpl_vars['filter']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['filter']->value) {
$_smarty_tpl->tpl_vars['filter']->do_else = false;
?>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26275569868aac29d787f76_25292353', 'active_filters_item');
?>

      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
  <?php }?>
</section>
<?php }
/* {block 'active_filters_title'} */
class Block_2194776568aac29d784df8_88442782 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'active_filters_title' => 
  array (
    0 => 'Block_2194776568aac29d784df8_88442782',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home1/harmakko/public_html/PS/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <p class="h6 <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['activeFilters']->value)) {?>active-filter-title<?php } else { ?>hidden-xs-up<?php }?>"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Active filters','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</p>
  <?php
}
}
/* {/block 'active_filters_title'} */
/* {block 'active_filters_item'} */
class Block_26275569868aac29d787f76_25292353 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'active_filters_item' => 
  array (
    0 => 'Block_26275569868aac29d787f76_25292353',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <li class="filter-block">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'%1$s:','d'=>'Shop.Theme.Catalog','sprintf'=>array($_smarty_tpl->tpl_vars['filter']->value['facetLabel'])),$_smarty_tpl ) );?>

            <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['filter']->value['label']), ENT_QUOTES, 'UTF-8');?>

            <a class="js-search-link" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['filter']->value['nextEncodedFacetsURL']), ENT_QUOTES, 'UTF-8');?>
"><i class="material-icons close">&#xE5CD;</i></a>
          </li>
        <?php
}
}
/* {/block 'active_filters_item'} */
}
