<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:31:36
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-addresses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2f78aaa4e2_25427494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '556b192242e751d1eef596ebb1b741d23796aaa6' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-addresses.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2f78aaa4e2_25427494 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-group">
  <div class="col-lg-12">
    <a class="btn btn-xl btn-primary"
       href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&addNewAddress"
       id="dhl-add-new-address">
      <i class="icon-plus-sign"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a new address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
  </div>
  <div class="clearfix"></div>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dhl_addresses']->value, 'addr');
$_smarty_tpl->tpl_vars['addr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['addr']->value) {
$_smarty_tpl->tpl_vars['addr']->do_else = false;
?>
    <div id="module_form" class="defaultForm form-horizontal col-lg-4">
      <div class="panel" id="fieldset_0">
        <div class="panel-heading">
          <i class="icon-envelope"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['iso'],'html','utf-8' ));?>
 - <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['city'],'html','utf-8' ));?>

        </div>
        <div class="form-wrapper form-wrapper-view">
          <p class="dhl-address-iso"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['iso'],'html','utf-8' ));?>
</p>
          <p class="dhl-company-name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['company_name'],'html','utf-8' ));?>
</p>
          <p>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['address1'],'html','utf-8' ));?>
<br>
            <?php if ($_smarty_tpl->tpl_vars['addr']->value['address2']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['address2'],'html','utf-8' ));?>
<br><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['addr']->value['address3']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['address3'],'html','utf-8' ));?>
<br><?php }?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['zipcode'],'html','utf-8' ));?>
<br>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['city'],'html','utf-8' ));?>
<br>
            <?php if ((isset($_smarty_tpl->tpl_vars['addr']->value['state']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['state'],'html','utf-8' ));?>
<br><?php }?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['country'],'html','utf-8' ));?>
<br>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['phone'],'html','utf-8' ));?>
<br>
          </p>
          <p class="dhl-contact-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact at this location: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
          <p>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['contact_name'],'html','utf-8' ));?>
<br>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['contact_email'],'html','utf-8' ));?>
<br>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Phone: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['addr']->value['contact_phone'],'html','utf-8' ));?>
<br>
          </p>
        </div>
        <div class="panel-footer">
          <a type="button"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&addNewAddress&id_dhl_address=<?php echo intval($_smarty_tpl->tpl_vars['addr']->value['id_dhl_address']);?>
"
             class="btn btn-default pull-right">
            <i class="process-icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </a>
          <a type="button"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&deleteAddress&id_dhl_address=<?php echo intval($_smarty_tpl->tpl_vars['addr']->value['id_dhl_address']);?>
"
             class="btn btn-default pull-right">
            <i class="process-icon-trash icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </a>
        </div>
      </div>
    </div>
    <?php
}
if ($_smarty_tpl->tpl_vars['addr']->do_else) {
?>
    <div id="dhl-no-addresses">
      <div class="alert alert-info">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please create your first address.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <div class="clearfix"></div>
</div>
<?php }
}
