<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:37:30
  from '/home1/harmakko/public_html/PS/modules/ps_mbo/views/templates/hook/dashboard-zone-three.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac13ab82c00_40609204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f19d5a3a5688c0595640e734195d8170ccbcc32d' => 
    array (
      0 => '/home1/harmakko/public_html/PS/modules/ps_mbo/views/templates/hook/dashboard-zone-three.tpl',
      1 => 1749535714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac13ab82c00_40609204 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
  if (typeof window.mboCdc == undefined || typeof window.mboCdc == "undefined") {
    if (typeof renderCdcError === 'function') {
      window.$(document).ready(function() {
        renderCdcError($('#cdc-dashboard-news'));
      });
    }
  } else {
    const dashboardNewsContext = <?php echo $_smarty_tpl->tpl_vars['shop_context']->value;?>
;

    const renderNews = window.mboCdc.renderDashboardNews
    renderNews(dashboardNewsContext, '#cdc-dashboard-news')
  }
<?php echo '</script'; ?>
>

<section id="cdc-dashboard-news" class="dash_news cdc-container" data-error-path="<?php echo $_smarty_tpl->tpl_vars['cdcErrorUrl']->value;?>
"></section>
<?php }
}
