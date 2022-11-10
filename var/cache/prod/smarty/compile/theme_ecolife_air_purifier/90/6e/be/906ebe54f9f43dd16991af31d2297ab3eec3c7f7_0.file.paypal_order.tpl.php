<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:45:56
  from '/var/www/html/prestashop/modules/paypal/views/templates/hook/paypal_order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6b144c51c9_21635666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '906ebe54f9f43dd16991af31d2297ab3eec3c7f7' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/hook/paypal_order.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6b144c51c9_21635666 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    $('.kpi-container').after($('.paypal-warning').parents('.module_warning'));
<?php echo '</script'; ?>
>
<?php }
}
