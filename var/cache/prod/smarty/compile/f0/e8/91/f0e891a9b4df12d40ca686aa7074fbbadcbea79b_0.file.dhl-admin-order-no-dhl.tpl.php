<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:45:56
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-admin-order-no-dhl.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6b14531633_13000372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0e891a9b4df12d40ca686aa7074fbbadcbea79b' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-admin-order-no-dhl.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6b14531633_13000372 (Smarty_Internal_Template $_smarty_tpl) {
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
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This order is not associated with DHL carrier. However you can still process this shipment using DHL.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          <br/>
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please choose a service then validate.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

        </p>
      </div>
      <div class="card-body">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="form-control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Available services','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
            <div class="col-lg-9">
              <select class="col-lg-4" name="dhl_service_to_associate" id="dhl-service-to-associate">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services_list']->value, 'service');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
                  <option value="<?php echo intval($_smarty_tpl->tpl_vars['service']->value['id_dhl_service']);?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['name'],'htmlall','utf-8' ));?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
          </div>
          <button type="submit" name="submitAssociateDhlOrder" class="col-lg-offset-3 btn btn-primary">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Asociate this order to DHL','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </button>
        </form>
      </div>
      </div>
  </div>
</div>
<?php }
}
