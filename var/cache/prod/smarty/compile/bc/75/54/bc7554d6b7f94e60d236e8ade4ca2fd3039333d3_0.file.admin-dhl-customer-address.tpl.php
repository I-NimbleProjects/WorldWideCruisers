<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:32:42
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/admin-dhl-customer-address.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fba9b94a4_80345414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc7554d6b7f94e60d236e8ade4ca2fd3039333d3' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/admin-dhl-customer-address.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2fba9b94a4_80345414 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-group">
  <div class="form-horizontal col-lg-offset-3 col-lg-4" id="dhl-customer-part">
    <div class="panel">
      <div class="panel-heading">
        <i class="icon-envelope"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->alias,'html','utf-8' ));?>

        <span class="pull-right">#<?php echo intval($_smarty_tpl->tpl_vars['customer_address']->value->id_customer);?>
</span>
      </div>
      <div class="form-wrapper form-wrapper-view">
        <input type="hidden" name="dhl_customer_address" value="<?php echo intval($_smarty_tpl->tpl_vars['customer_address']->value->id);?>
" />
        <p class="dhl-address-iso"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_country_iso']->value,'html','utf-8' ));?>
</p>
        <p class="dhl-address-company"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->company,'html','utf-8' ));?>
</p>
        <p>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->firstname,'html','utf-8' ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->lastname,'html','utf-8' ));?>
<br />
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->address1,'html','utf-8' ));?>
<br>
          <?php if ($_smarty_tpl->tpl_vars['customer_address']->value->address2) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->address2,'html','utf-8' ));?>
<br><?php }?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->postcode,'html','utf-8' ));?>
<br>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->city,'html','utf-8' ));?>
<br>
          <?php if ((isset($_smarty_tpl->tpl_vars['customer_address']->value->state))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->state,'html','utf-8' ));?>
<br><?php }?>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->country,'html','utf-8' ));?>
<br>
          <?php if ($_smarty_tpl->tpl_vars['customer_address']->value->phone) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->phone,'html','utf-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_address']->value->phone_mobile,'html','utf-8' ));
}?><br>
        </p>
      </div>
      <div class="panel-footer">
        <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['update_addr_link']->value,'html','utf-8' ));?>
&amp;back=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
" class="btn btn-default">
          <i class="icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

        </a>
      </div>

    </div>
  </div>
</div>
<?php }
}
