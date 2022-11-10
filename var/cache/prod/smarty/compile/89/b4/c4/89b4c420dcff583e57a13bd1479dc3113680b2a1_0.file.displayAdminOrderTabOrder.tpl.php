<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:45:56
  from '/var/www/html/prestashop/modules/paypal/views/templates/hook/displayAdminOrderTabOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6b14503fb1_71071086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89b4c420dcff583e57a13bd1479dc3113680b2a1' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/hook/displayAdminOrderTabOrder.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6b14503fb1_71071086 (Smarty_Internal_Template $_smarty_tpl) {
?>

<li class="nav-item">
    <a href="#paypal" class="nav-link" data-toggle="tab" role="tab">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'PayPal','mod'=>'paypal'),$_smarty_tpl ) );?>

        <?php if (version_compare($_smarty_tpl->tpl_vars['psVersion']->value,'1.7.7','>=')) {?>
            (<?php if ((isset($_smarty_tpl->tpl_vars['logs']->value))) {
echo count($_smarty_tpl->tpl_vars['logs']->value);
} else { ?>0<?php }?>)
        <?php } else { ?>
          <span class="badge"><?php if ((isset($_smarty_tpl->tpl_vars['logs']->value))) {
echo count($_smarty_tpl->tpl_vars['logs']->value);
} else { ?>0<?php }?></span>
        <?php }?>
    </a>
</li>
<?php }
}
