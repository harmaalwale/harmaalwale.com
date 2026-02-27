<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:37:30
  from '/home1/harmakko/public_html/PS/modules/ps_mbo/views/templates/hook/dashboard-zone-one.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac13a7f0333_56001202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '420ca23c79e1d196675ef9d2b1d3390865d856c3' => 
    array (
      0 => '/home1/harmakko/public_html/PS/modules/ps_mbo/views/templates/hook/dashboard-zone-one.tpl',
      1 => 1749535714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac13a7f0333_56001202 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['urlAccountsCdn']->value))) {?>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['urlAccountsCdn']->value;?>
" rel=preload><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
    var psAccountLoaded = false;
    if (window?.psaccountsVue) {
      window?.psaccountsVue?.init();
      psAccountLoaded = true;
    }
  <?php echo '</script'; ?>
>
<?php }?>

<?php echo '<script'; ?>
>
  if (typeof window.mboCdc == undefined || typeof window.mboCdc == "undefined") {
    if (typeof renderCdcError === 'function') {
      window.$(document).ready(function() {
        renderCdcError($('#cdc-tips-and-update-container'));
      });
    }
  } else {
    const renderTipsAndUpdate = window.mboCdc.renderDashboardTipsAndUpdate

    const dashboardTipsAndUpdateContext = <?php echo $_smarty_tpl->tpl_vars['shop_context']->value;?>
;

    if (psAccountLoaded) {
      dashboardTipsAndUpdateContext.accounts_component_loaded = true;
    }

    renderTipsAndUpdate(dashboardTipsAndUpdateContext, '#cdc-tips-and-update-container')
  }
<?php echo '</script'; ?>
>

<prestashop-accounts style="display: none;"></prestashop-accounts>

<section id="cdc-tips-and-update-container" class="cdc-container" data-error-path="<?php echo $_smarty_tpl->tpl_vars['cdcErrorUrl']->value;?>
"></section>
<?php }
}
