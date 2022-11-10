<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:11:00
  from '/var/www/html/prestashop/modules/paypal/views/templates/admin/_partials/messages/prestashopCheckoutInfo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2aa4763433_10681261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '268a8384a21d229efbc0581ad838442a923a3418' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/admin/_partials/messages/prestashopCheckoutInfo.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2aa4763433_10681261 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-info ps-checkout-info">
  <button type="button" class="close" data-dismiss="alert" data-action="close">×</button>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This module allows your customers to pay with their PayPal account. If you wish to accept credit cards and other payment methods in addition to PayPal, we recommend the [a @href1@]PrestaShop Checkout[/a] module.','mod'=>'paypal'),$_smarty_tpl ) );
$_prefixVariable4 = ob_get_clean();
ob_start();
echo '#';
$_prefixVariable5 = ob_get_clean();
ob_start();
echo 'data-action="install"';
$_prefixVariable6 = ob_get_clean();
echo smarty_modifier_paypalreplace($_prefixVariable4,array('@href1@'=>$_prefixVariable5,'@target@'=>$_prefixVariable6));?>

</div>
<?php }
}
