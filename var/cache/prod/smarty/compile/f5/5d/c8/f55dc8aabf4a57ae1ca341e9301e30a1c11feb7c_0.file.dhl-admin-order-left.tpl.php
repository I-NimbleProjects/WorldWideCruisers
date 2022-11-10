<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:26:17
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-admin-order-left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2e398f0b98_59952207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f55dc8aabf4a57ae1ca341e9301e30a1c11feb7c' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-admin-order-left.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2e398f0b98_59952207 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="dhl-admin-orders-new-theme">
  <div class="card mt-2">
    <h3 class="card-header"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DHL Shipping','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h3>
    <div class="card-body">
      <img class="dhl-logo" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'htmlall','UTF-8' ));?>
dhl.png"/>

      <div class="alert alert-info">
        <p>
          <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlOrders'),'html','utf-8' ));?>
">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click here to manage all your DHL shippings','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </a>
        </p>
      </div>

      <div class="card-body">
        <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

      </div>
    </div>
  </div>
</div>
<?php }
}
