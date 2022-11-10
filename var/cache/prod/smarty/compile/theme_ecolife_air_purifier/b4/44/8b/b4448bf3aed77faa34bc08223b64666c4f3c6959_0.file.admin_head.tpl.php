<?php
/* Smarty version 3.1.43, created on 2022-08-25 12:39:58
  from '/var/www/html/prestashop/modules/ph_instagram/views/templates/hook/admin_head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_6307a5def1ac90_53834558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4448bf3aed77faa34bc08223b64666c4f3c6959' => 
    array (
      0 => '/var/www/html/prestashop/modules/ph_instagram/views/templates/hook/admin_head.tpl',
      1 => 1653046660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6307a5def1ac90_53834558 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    var PH_INSTA_LINK_AJAX = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['linkAjaxBo']->value,'quotes','UTF-8' ));?>
";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['linkJsAdmin']->value,'quotes','UTF-8' ));?>
" defer="defer"><?php echo '</script'; ?>
><?php }
}
