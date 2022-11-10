<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:32:42
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/admin-dhl-shipper-addresses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fba9a9e56_49153916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9a216cdea5c324e797cb76c32800d3b07f5a69e' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/admin-dhl-shipper-addresses.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2fba9a9e56_49153916 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-group">
    <label class="control-label col-lg-3" for="dhl-sender-address">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose an address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

    </label>

    <div class="col-lg-3">
      <select name="dhl_sender_address" class="col-lg-12" id="dhl-sender-address">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sender_addresses']->value, 'sender_address');
$_smarty_tpl->tpl_vars['sender_address']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sender_address']->value) {
$_smarty_tpl->tpl_vars['sender_address']->do_else = false;
?>
          <option value="<?php echo intval($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address']);?>
" <?php if ($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address'] == $_smarty_tpl->tpl_vars['default_sender_address']->value) {?>selected="selected"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['title'],'html','utf-8' ));
if ($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address'] == $_smarty_tpl->tpl_vars['default_sender_address']->value) {?> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(default)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
 <?php }?></option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </div>
    <div class="col-lg-3">
      <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Or','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
&nbsp;</span>
      <a type="button" class="btn btn-default" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['update_dhl_addr_link']->value,'html','utf-8' ));?>
&amp;addNewAddress&amp;redirectAfter=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
">
        <i class="icon-plus-sign-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a new add address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </a>
    </div>
  </div>
  <div class="form-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sender_addresses']->value, 'sender_address');
$_smarty_tpl->tpl_vars['sender_address']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sender_address']->value) {
$_smarty_tpl->tpl_vars['sender_address']->do_else = false;
?>
      <div class="form-horizontal col-lg-offset-3 col-lg-4 dhl-sender-addresses"
           id="dhl-sender-address-<?php echo intval($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address']);?>
" <?php if ($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address'] != $_smarty_tpl->tpl_vars['default_sender_address']->value) {?>style="display: none"<?php }?>>
        <div class="panel">
          <div class="panel-heading">
            <i class="icon-envelope"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['title'],'html','utf-8' ));?>

          </div>
          <div class="form-wrapper form-wrapper-view">
            <p class="dhl-address-iso"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['iso'],'html','utf-8' ));?>
</p>
            <p class="dhl-address-company"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['company_name'],'html','utf-8' ));?>
</p>
            <p>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['address1'],'html','utf-8' ));?>
<br>
              <?php if ($_smarty_tpl->tpl_vars['sender_address']->value['address2']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['address2'],'html','utf-8' ));?>
<br><?php }?>
              <?php if ($_smarty_tpl->tpl_vars['sender_address']->value['address3']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['address3'],'html','utf-8' ));?>
<br><?php }?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['zipcode'],'html','utf-8' ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['city'],'html','utf-8' ));?>
<br>
              <?php if ((isset($_smarty_tpl->tpl_vars['sender_address']->value['state']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['state'],'html','utf-8' ));?>
<br><?php }?>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['country'],'html','utf-8' ));?>
<br>
              <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['phone'],'html','utf-8' ));?>
<br>
            </p>
            <p class="dhl-contact-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact at this location: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
            <p>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Name: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['contact_name'],'html','utf-8' ));?>
<br>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['contact_email'],'html','utf-8' ));?>
<br>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Phone: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['sender_address']->value['contact_phone'],'html','utf-8' ));?>
<br>
            </p>
          </div>
          <div class="panel-footer">
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['update_dhl_addr_link']->value,'html','utf-8' ));?>
&amp;addNewAddress&amp;id_dhl_address=<?php echo intval($_smarty_tpl->tpl_vars['sender_address']->value['id_dhl_address']);?>
&amp;redirectAfter=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
" class="btn btn-default">
              <i class="icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </a>
          </div>

        </div>
      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
<?php }
}
