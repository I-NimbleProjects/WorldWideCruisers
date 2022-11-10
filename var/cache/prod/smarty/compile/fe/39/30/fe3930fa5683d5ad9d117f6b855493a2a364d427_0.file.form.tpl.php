<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:31:36
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2f7892b292_77893029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe3930fa5683d5ad9d117f6b855493a2a364d427' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2f7892b292_77893029 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193398595562bf2f788fee51_19632973', "input_row");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "input_row"} */
class Block_193398595562bf2f788fee51_19632973 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'input_row' => 
  array (
    0 => 'Block_193398595562bf2f788fee51_19632973',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'dhl_services') {?>
    <div
            class="form-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['form_group_class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['form_group_class'],'html','UTF-8' ));
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'hidden') {?> hide<?php }?>"<?php if ((isset($_smarty_tpl->tpl_vars['tabs']->value)) && (isset($_smarty_tpl->tpl_vars['input']->value['tab']))) {?> data-tab-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['tab'],'html','UTF-8' ));?>
"<?php }?>>
      <div class="col-lg-12">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['services'], 'service', false, 'key');
$_smarty_tpl->tpl_vars['service']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->do_else = false;
?>
          <h2><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8' ));?>
</h2>
          <table class="table col-lg-12 dhl-services">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['service']->value, 'field');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
              <tr>
                <td class="col-lg-3">
                  <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['logo'],'html','UTF-8' ));?>
" width="150"/>
                </td>
                <td class="col-lg-6">
                  <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['label']))) {?>
                    <span
                            class="col-lg-12 <?php if ((isset($_smarty_tpl->tpl_vars['field']->value['required'])) && $_smarty_tpl->tpl_vars['field']->value['required'] && $_smarty_tpl->tpl_vars['field']->value['type'] != 'radio') {?> required<?php }?>">
                      <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['field']->value['label'],'html','UTF-8' ));?>

                    </span>
                  <?php }?>
                </td>
                <td class="col-lg-3">
                  <span class="switch prestashop-switch fixed-width-lg">
                    <input type="radio"
                           name="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
" id="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
_on"
                           value="1" <?php if ($_smarty_tpl->tpl_vars['field']->value['active'] == 1) {?> checked="checked"<?php }?>
                    />
                    <label for="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
_on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enabled','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                    <input type="radio"
                           name="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
" id="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
_off"
                           value="0" <?php if ($_smarty_tpl->tpl_vars['field']->value['active'] == 0) {?> checked="checked"<?php }?>
                    />
                    <label for="service_<?php echo intval($_smarty_tpl->tpl_vars['field']->value['service_id']);?>
_off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Disabled','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                    <a class="slide-button btn"></a>
                  </span>
                </td>
              </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'dhl_dimension') {?>
    <div
            class="form-group<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['form_group_class']))) {?> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['form_group_class'],'html','UTF-8' ));
}
if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'hidden') {?> hide<?php }?>"<?php if ((isset($_smarty_tpl->tpl_vars['tabs']->value)) && (isset($_smarty_tpl->tpl_vars['input']->value['tab']))) {?> data-tab-id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['tab'],'html','UTF-8' ));?>
"<?php }?>>
      <label class="control-label col-lg-3">&nbsp;</label>
      <div class="col-lg-4">
        <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['dim_values'][0]['name']])) || $_smarty_tpl->tpl_vars['input']->value['readonly'] == false) {?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['dim_values'], 'dim_value');
$_smarty_tpl->tpl_vars['dim_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dim_value']->value) {
$_smarty_tpl->tpl_vars['dim_value']->do_else = false;
?>
            <?php $_smarty_tpl->_assignInScope('value_text', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['dim_value']->value['name']]);?>
            <label class="control-label col-lg-3"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dim_value']->value['label'],'html','UTF-8' ));?>
</label>
            <div class="input-group fixed-width-xs">
              <input onchange="this.value = parseFloat(this.value.replace(/,/g, '.')) || 0"
                     type="text"
                     <?php if ($_smarty_tpl->tpl_vars['input']->value['readonly'] == true) {?>readonly="readonly"
                     <?php }?>name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dim_value']->value['name'],'html','UTF-8' ));?>
"
                     id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dim_value']->value['name'],'html','UTF-8' ));?>
"
                     value="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['string_format'])) && $_smarty_tpl->tpl_vars['input']->value['string_format']) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value),'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_text']->value,'html','UTF-8' ));
}?>"
                     class="fixed-width-xs"/>
              <span class="input-group-addon <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dim_value']->value['suffix_class'],'html','UTF-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dim_value']->value['suffix'],'html','UTF-8' ));?>
</span>
            </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
          <div class="alert alert-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['no_package'],'html','UTF-8' ));?>
</div>
        <?php }?>
      </div>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'dhl_display_addr') {?>
    <div class="form-group">
      <div class="col-lg-4 col-lg-offset-3">
        <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]))) {?>
          <div class="well">
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-default pull-right"
                   href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['edit_link'],'html','UTF-8' ));?>
&addNewAddress&id_dhl_address=<?php echo intval($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->id);?>
">
                  <i class="icon-pencil"></i>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['edit_label'],'html','UTF-8' ));?>

                </a>

                <p style="font-weight: bold; font-size: 18px;"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->iso_country,'html','UTF-8' ));?>
</p>
                <p style="font-weight: bold;"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->company_name,'html','UTF-8' ));?>
</p>
                <p>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->address1,'html','utf-8' ));?>
<br>
                  <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->address2) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->address2,'html','utf-8' ));?>

                    <br>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->address3) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->address3,'html','utf-8' ));?>

                    <br>
                  <?php }?>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->zipcode,'html','utf-8' ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->city,'html','utf-8' ));?>
<br>
                  <?php if ((isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->state))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->state,'html','utf-8' ));?>

                    <br>
                  <?php }?>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->country,'html','utf-8' ));?>
<br>
                  <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['obj']]->phone,'html','utf-8' ));?>
<br>
                </p>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="alert alert-info"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['no_address'],'html','UTF-8' ));?>
</div>
        <?php }?>
      </div>
    </div>
  <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'dhl_credentials') {?>
    <div class="row">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['modes'], 'mode', false, 'k');
$_smarty_tpl->tpl_vars['mode']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['mode']->value) {
$_smarty_tpl->tpl_vars['mode']->do_else = false;
?>
        <?php $_smarty_tpl->_assignInScope('value_login', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['mode']->value['login_name']]);?>
        <?php $_smarty_tpl->_assignInScope('value_passw', $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['mode']->value['password_name']]);?>
        <div class="col-md-6">
          <div class="panel">
            <div class="panel-heading"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['title'],'html','UTF-8' ));?>
</div>
            <div class="form-group">
              <label class="control-label col-lg-6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['login_label'],'html','UTF-8' ));?>
</label>
              <div class="col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="icon icon-user"></i>
                  </span>
                  <input type="text"
                         name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['login_name'],'html','UTF-8' ));?>
"
                         id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['login_name'],'html','UTF-8' ));?>
"
                         value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_login']->value,'html','UTF-8' ));?>
">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-lg-6"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['password_label'],'html','UTF-8' ));?>
</label>
              <div class="col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="icon icon-key"></i>
                  </span>
                  <input type="text"
                         name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['password_name'],'html','UTF-8' ));?>
"
                         id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['password_name'],'html','UTF-8' ));?>
"
                         value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['value_passw']->value,'html','UTF-8' ));?>
"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-6 col-lg-6">
                <div class="input-group">
                  <button class="btn btn-primary" name="check<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['k']->value,'html','UTF-8' ));?>
credentials">
                    <i class=""></i>
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mode']->value['check_credentials_label'],'html','UTF-8' ));?>

                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  <?php } else { ?>
    <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

  <?php }
}
}
/* {/block "input_row"} */
}
