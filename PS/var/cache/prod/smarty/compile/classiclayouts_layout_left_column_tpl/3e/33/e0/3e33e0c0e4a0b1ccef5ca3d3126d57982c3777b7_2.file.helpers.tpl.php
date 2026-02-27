<?php
/* Smarty version 4.5.5, created on 2025-08-24 03:43:25
  from '/home1/harmakko/public_html/PS/themes/classic/templates/_partials/helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68aac29deb75c6_60586679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e33e0c0e4a0b1ccef5ca3d3126d57982c3777b7' => 
    array (
      0 => '/home1/harmakko/public_html/PS/themes/classic/templates/_partials/helpers.tpl',
      1 => 1746167122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68aac29deb75c6_60586679 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => '/home1/harmakko/public_html/PS/var/cache/prod/smarty/compile/classiclayouts_layout_left_column_tpl/3e/33/e0/3e33e0c0e4a0b1ccef5ca3d3126d57982c3777b7_2.file.helpers.tpl.php',
    'uid' => '3e33e0c0e4a0b1ccef5ca3d3126d57982c3777b7',
    'call_name' => 'smarty_template_function_renderLogo_104625047468aac29deb1574_72581809',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_104625047468aac29deb1574_72581809 */
if (!function_exists('smarty_template_function_renderLogo_104625047468aac29deb1574_72581809')) {
function smarty_template_function_renderLogo_104625047468aac29deb1574_72581809(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['urls']->value['pages']['index']), ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['shop']->value['logo_details']['src']), ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['shop']->value['name']), ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['shop']->value['logo_details']['width']), ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['shop']->value['logo_details']['height']), ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_104625047468aac29deb1574_72581809 */
}
