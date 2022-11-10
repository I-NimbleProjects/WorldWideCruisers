<?php
/* Smarty version 3.1.43, created on 2022-06-24 08:53:33
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-packages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62b5b3cda1e7f4_88318799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea58af1a1aac5ec1eac8b00710698de29976614f' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_partials/dhl-packages.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b5b3cda1e7f4_88318799 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="form-group">
  <div class="col-lg-12">
    <a class="btn btn-xl btn-primary"
       href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&addNewPackage"
       id="dhl-add-new-package">
      <i class="icon-plus-sign"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add a new package','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
  </div>
  <div class="clearfix"></div>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dhl_packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
    <div id="module_form" class="defaultForm form-horizontal col-lg-3">
      <div class="panel" id="fieldset_0">
        <div class="panel-heading">
          <i class="icon-archive"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Package name: ','mod'=>'dhlexpress'),$_smarty_tpl ) );
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['package']->value['name'],'html','utf-8' ));?>

        </div>
        <div class="form-wrapper form-wrapper-view">
          <p>
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</b><?php echo floatval($_smarty_tpl->tpl_vars['package']->value['weight_value']);?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['weight_unit']->value,'html','utf-8' ));?>

          </p>
          <p>
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Length: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</b><?php echo floatval($_smarty_tpl->tpl_vars['package']->value['length_value']);?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>

            <br/>
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Width: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</b><?php echo floatval($_smarty_tpl->tpl_vars['package']->value['width_value']);?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>

            <br/>
            <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Depth: ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</b><?php echo floatval($_smarty_tpl->tpl_vars['package']->value['depth_value']);?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>

            <br/>
          </p>
        </div>
        <div class="panel-footer">
          <a type="button"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&addNewPackage&id_dhl_package=<?php echo intval($_smarty_tpl->tpl_vars['package']->value['id_dhl_package']);?>
"
             class="btn btn-default pull-right">
            <i class="process-icon-edit"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Edit package','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </a>
          <a type="button"
             href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','utf-8' ));?>
&configure=dhlexpress&deletePackage&id_dhl_package=<?php echo intval($_smarty_tpl->tpl_vars['package']->value['id_dhl_package']);?>
"
             class="btn btn-default pull-right">
            <i class="process-icon-trash icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete package','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </a>
        </div>
      </div>
    </div>
    <?php
}
if ($_smarty_tpl->tpl_vars['package']->do_else) {
?>
    <div id="dhl-no-addresses">
      <div class="alert alert-info">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please create your first package.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <div class="clearfix"></div>
</div>
<?php }
}
