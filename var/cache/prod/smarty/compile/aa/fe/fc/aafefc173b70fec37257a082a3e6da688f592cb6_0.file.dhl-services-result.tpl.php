<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:33:16
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/_partials/dhl-services-result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fdcec9b91_87293774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aafefc173b70fec37257a082a3e6da688f592cb6' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/_partials/dhl-services-result.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2fdcec9b91_87293774 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['errors']->value) {?>
  <div id="dhl-services-error" class="alert alert-danger">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['description']->value, 'text');
$_smarty_tpl->tpl_vars['text']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['text']->value) {
$_smarty_tpl->tpl_vars['text']->do_else = false;
?>
      <p><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['text']->value,'html','utf-8' ));?>
</p>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
<?php } else { ?>
  <div id="dhl-services-block" class="col-lg-12">
    <?php if (!$_smarty_tpl->tpl_vars['free_label']->value) {?>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Chosen product by the customer: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

        <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service_wanted']->value,'html','utf-8' ));?>
</strong>
      </p>
      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping cost paid by the customer (tax excl.): ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

        <strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shipping_paid']->value,'html','utf-8' ));?>
</strong> <span
          class="dhl-price-converted"><?php if ((isset($_smarty_tpl->tpl_vars['convert_price']->value))) {?>(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['services_currency']->value,'html','utf-8' ));?>
 <?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['convert_price']->value);?>
)<?php }?></span></p>
    <?php }?>
    <div class="tab-content panel collapse in">
      <table class="table dhl-services-table">
        <thead>
        <tr>
          <th></th>
          <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product name','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
          <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delivery on','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
          <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pickup cutoff time','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
          <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Price (tax excl.)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
        </tr>
        </thead>
        <tbody>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['services']->value, 'servicesLocal', false, 'code');
$_smarty_tpl->tpl_vars['servicesLocal']->index = -1;
$_smarty_tpl->tpl_vars['servicesLocal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['code']->value => $_smarty_tpl->tpl_vars['servicesLocal']->value) {
$_smarty_tpl->tpl_vars['servicesLocal']->do_else = false;
$_smarty_tpl->tpl_vars['servicesLocal']->index++;
$_smarty_tpl->tpl_vars['servicesLocal']->first = !$_smarty_tpl->tpl_vars['servicesLocal']->index;
$__foreach_servicesLocal_1_saved = $_smarty_tpl->tpl_vars['servicesLocal'];
?>
            <?php $_smarty_tpl->_assignInScope('code_value', trim($_smarty_tpl->tpl_vars['code']->value));?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servicesLocal']->value, 'service');
$_smarty_tpl->tpl_vars['service']->index = -1;
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
$_smarty_tpl->tpl_vars['service']->index++;
$_smarty_tpl->tpl_vars['service']->first = !$_smarty_tpl->tpl_vars['service']->index;
$__foreach_service_2_saved = $_smarty_tpl->tpl_vars['service'];
?>
              <?php if ((isset($_smarty_tpl->tpl_vars['available_services']->value[$_smarty_tpl->tpl_vars['code_value']->value]))) {?>
                  <tr>
                  <td>

                    <input <?php if (!$_smarty_tpl->tpl_vars['free_label']->value && !$_smarty_tpl->tpl_vars['return_label']->value) {?> <?php if ($_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'] == "P" || $_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'] == "E" || $_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'] == "Y" || $_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'] == "H") {?>onclick="displayPltOption(<?php echo $_smarty_tpl->tpl_vars['service_plt']->value;?>
);"<?php } else { ?> onclick="hiddePltOption();"<?php }?> <?php }?>
                           <?php if (($_smarty_tpl->tpl_vars['service_wanted_code']->value == '' && $_smarty_tpl->tpl_vars['servicesLocal']->first && $_smarty_tpl->tpl_vars['service']->first) || (trim($_smarty_tpl->tpl_vars['code']->value) == $_smarty_tpl->tpl_vars['service_wanted_code']->value)) {?>  class="display_plt_checked global_product_code_<?php echo $_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'];?>
"  <?php }?> type="radio" name="dhl_label_service" class="dhl_label_service global_product_code_<?php echo $_smarty_tpl->tpl_vars['service']->value['GlobalProductCode'];?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( trim($_smarty_tpl->tpl_vars['code']->value),'html','utf-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['LocalProductCode'],'html','utf-8' ));?>
" />
                    <input type="hidden" name="dhl_label_local_code_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( trim($_smarty_tpl->tpl_vars['code']->value),'html','utf-8' ));?>
_<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['LocalProductCode'],'html','utf-8' ));?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['LocalProductCode'],'html','utf-8' ));?>
" />
                  </td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['ProductShortName'],'html','utf-8' ));?>
</td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['DeliveryDate'],'html','utf-8' ));?>
</td>
                  <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service']->value['PickupCutoffTime'],'html','utf-8' ));?>
</td>
                  <td><strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['services_currency']->value,'html','utf-8' ));?>
 <?php echo floatval($_smarty_tpl->tpl_vars['service']->value['ChargeWithoutTax']);?>
</strong></td>
                </tr>
              <?php }?>
            <?php
$_smarty_tpl->tpl_vars['service'] = $__foreach_service_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <?php
$_smarty_tpl->tpl_vars['servicesLocal'] = $__foreach_servicesLocal_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
      </table>
    </div>
  </div>

<?php }
}
}
