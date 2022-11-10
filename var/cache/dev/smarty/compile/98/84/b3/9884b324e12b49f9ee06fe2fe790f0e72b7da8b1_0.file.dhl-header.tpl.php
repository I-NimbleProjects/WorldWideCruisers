<?php
/* Smarty version 3.1.43, created on 2022-06-24 08:53:33
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b5b3cd9f6f28_03612667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9884b324e12b49f9ee06fe2fe790f0e72b7da8b1' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-header.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b5b3cd9f6f28_03612667 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="header-dhlexpress">
  <div class="dhl-logo">
    <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'htmlall','utf-8' ));?>
dhl.png"/><?php if ((isset($_smarty_tpl->tpl_vars['dhl_version']->value))) {?><br />v<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_version']->value,'htmlall','utf-8' ));
}?>
  </div>
  <div class="dhl-contact">
    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'For technical enquiries, please contact our hotline at','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
    <p id="dhl-phone">
      <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'htmlall','utf-8' ));?>
dhl-contact-phone.png" />
    </p>
    <p>
      <i class="icon-question-circle"></i>
      <a target="_blank" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'http://www.dhlecommerce.fr/prestashop/','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Read our FAQ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
    </p>
  </div>
  <div class="clearfix"></div>
</div>
<?php }
}
