<?php
/* Smarty version 3.1.43, created on 2022-06-24 09:22:59
  from '/var/www/html/prestashop/modules/ph_instagram/views/templates/hook/head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b5bab37836f7_07116488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ee06466475a512f215ef691ca5cf2ea6e7a8758' => 
    array (
      0 => '/var/www/html/prestashop/modules/ph_instagram/views/templates/hook/head.tpl',
      1 => 1653046660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b5bab37836f7_07116488 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var PH_INSTA_LINK_AJAX = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['linkAjaxFront']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var PH_INSTA_TOKEN = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tokenFront']->value,'html','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['linkFancybox']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" defer="defer"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['jsFront']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" defer="defer"><?php echo '</script'; ?>
><?php }
}
