<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:32:42
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/dhl_label.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fba98b218_69836115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02671fe3d4e36c2bc6e1913a89ee76e0d943418a' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/dhl_label.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../_partials/dhl-header.tpl' => 1,
    'file:../_partials/admin-dhl-customer-address.tpl' => 2,
    'file:../_partials/admin-dhl-shipper-addresses.tpl' => 2,
    'file:./_partials/dhl-extracharges.tpl' => 1,
    'file:../dhl_commercial_invoice/dhl_commercial_invoice_page_label.tpl' => 1,
  ),
),false)) {
function content_62bf2fba98b218_69836115 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:../_partials/dhl-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_191467406362bf2fba9626c6_21783943', "dhl-info-message");
?>

<div id="dhl-create-label">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel form-horizontal clearfix">
        <form id="create-label"
              class="defaultForm form-horizontal dhl-form"
              action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','utf-8' ));?>
"
              method="post"
              enctype="multipart/form-data">
          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_214095605162bf2fba963918_18821751', "dhl-hidden-input");
?>

          <input type="hidden" name="dhl_label_currency_iso" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
"/>


          <div class="panel-heading">
            <i class="icon-user"></i>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107615262062bf2fba965c74_27807272', "dhl-form-title");
?>

          </div>
          <?php if ((isset($_smarty_tpl->tpl_vars['return_label']->value))) {?>
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer address (depature address)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
            <?php $_smarty_tpl->_subTemplateRender("file:../_partials/admin-dhl-customer-address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php } else { ?>
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipper address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
            <?php $_smarty_tpl->_subTemplateRender("file:../_partials/admin-dhl-shipper-addresses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php }?>
          <?php if ((isset($_smarty_tpl->tpl_vars['return_label']->value))) {?>
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Consignee address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
            <?php $_smarty_tpl->_subTemplateRender("file:../_partials/admin-dhl-shipper-addresses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          <?php } else { ?>
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Customer address','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_48526968362bf2fba969b77_16421698', "dhl-customer-address");
?>

          <?php }?>
          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipment details','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>

          <div class="alert alert-info">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add packages to you shipment using pre-defined package type.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </div>
          <div class="form-group">
            <label for="dhl-label-package-type" class="control-label col-lg-3">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use a package type','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-3">
              <select name="dhl_label_package_type" class="col-lg-12" id="dhl-label-package-type">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['package_types']->value, 'package_type');
$_smarty_tpl->tpl_vars['package_type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package_type']->value) {
$_smarty_tpl->tpl_vars['package_type']->do_else = false;
?>
                  <option value="<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                          <?php if ($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package'] == $_smarty_tpl->tpl_vars['default_package_type']->value) {?>selected="selected"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['package_type']->value['name'],'html','utf-8' ));
if ($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package'] == $_smarty_tpl->tpl_vars['default_package_type']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' (default)','mod'=>'dhlexpress'),$_smarty_tpl ) );
}?></option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
          </div>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['package_types']->value, 'package_type');
$_smarty_tpl->tpl_vars['package_type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package_type']->value) {
$_smarty_tpl->tpl_vars['package_type']->do_else = false;
?>
            <div id="dhl-package-<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
" class="form-group dhl-packages"
                 <?php if ($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package'] != $_smarty_tpl->tpl_vars['default_package_type']->value) {?>style="display: none"<?php }?>>
              <div class="col-lg-4 col-lg-offset-3">
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>

                <div class="input-group fixed-width-xs">
                  <input onchange="this.value = parseFloat(this.value.replace(/,/g, '.')) || 0"
                         name="dhl_package_weight_<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                         type="text"
                         value="<?php echo floatval($_smarty_tpl->tpl_vars['package_type']->value['weight_value']);?>
"
                         class="fixed-width-xs dhl-value-weight">
                  <span class="input-group-addon dhl-suffix-weight"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['weight_unit']->value,'html','utf-8' ));?>
</span>
                </div>
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Length','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>

                <div class="input-group fixed-width-xs">
                  <input onchange="this.value = parseInt(this.value) || 0"
                         name="dhl_package_length_<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                         type="text"
                         value="<?php echo floatval($_smarty_tpl->tpl_vars['package_type']->value['length_value']);?>
"
                         class="fixed-width-xs dhl-value-length">
                  <span class="input-group-addon dhl-suffix-dimension"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>
</span>
                </div>
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Width','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>

                <div class="input-group fixed-width-xs">
                  <input onchange="this.value = parseInt(this.value) || 0"
                         name="dhl_package_width_<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                         type="text"
                         value="<?php echo floatval($_smarty_tpl->tpl_vars['package_type']->value['width_value']);?>
"
                         class="fixed-width-xs dhl-value-width">
                  <span class="input-group-addon dhl-suffix-dimension"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>
</span>
                </div>
                <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Depth','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>

                <div class="input-group fixed-width-xs">
                  <input onchange="this.value = parseInt(this.value) || 0"
                         name="dhl_package_depth_<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                         type="text"
                         value="<?php echo floatval($_smarty_tpl->tpl_vars['package_type']->value['depth_value']);?>
"
                         class="fixed-width-xs dhl-value-depth">
                  <span class="input-group-addon dhl-suffix-dimension"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dimension_unit']->value,'html','utf-8' ));?>
</span>
                </div>
                <div class="col-lg-offset-3">
                  <a class="btn btn-xl btn-primary dhl-add-package" data-package="<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
"
                     href="#" id="dhl-add-new-package-<?php echo intval($_smarty_tpl->tpl_vars['package_type']->value['id_dhl_package']);?>
">
                    <i class="icon-plus-sign"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add this package','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
                </div>
              </div>
            </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <div class="tab-content panel collapse in">
            <div>
              <table class="table dhl-package-table" id="dhl-package-table">
                <thead>
                <tr>
                  <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Package type','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Length','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Width','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                  <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Depth','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="required control-label col-lg-3" for="dhl-label-reference-id">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your Shipper ID','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-3">
              <div class="input-group">
                <span id="dhl_reference_id_counter" class="input-group-addon">35</span>
                <input type="text"
                       name="dhl_reference_id"
                       id="dhl-label-reference-id"
                       value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shipper_id']->value,'html','utf-8' ));?>
"
                       data-maxchar="35"
                       maxlength="35"
                >
              </div>
              <?php echo '<script'; ?>
 type="text/javascript">
                  $(document).ready(function () {
                      countDown($("#dhl-label-reference-id"), $("#dhl_reference_id_counter"));
                  });
              <?php echo '</script'; ?>
>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3 required" for="dhl-label-contents">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Description of the content','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-3">
              <textarea name="dhl_label_contents"
                        id="dhl-label-contents"
                        class="textarea-autosize"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_shipment_content']->value,'html','utf-8' ));?>
</textarea>
            </div>
          </div>

          <div class="form-group dhl-label-archive-doc">
            <label class="control-label col-lg-3">
              <span class="label-tooltip"
                    data-toggle="tooltip"
                    data-html="true"
                    title=""
                    data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Printing doc archive is mandatory for International shippings. Optional for Domestic & EU shippings','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Print doc archive','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </span>
            </label>

            <div class="col-lg-9">
              <span class="switch prestashop-switch fixed-width-lg">
                <input class=""
                       type="radio"
                       name="dhl_print_doc_archive"
                       id="print-doc-archive_on"
                       value="1">
                <label for="print-doc-archive_on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                <input class=""
                       type="radio"
                       name="dhl_print_doc_archive"
                       id="print-doc-archive_off"
                       value="0"
                       checked="checked">
                <label for="print-doc-archive_off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                <a class="slide-button btn"></a>
              </span>
            </div>
          </div>

          <div class="form-group dhl-label-doc">
            <label class="control-label col-lg-3">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This shipping has documents only','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-9">
              <span class="switch prestashop-switch fixed-width-lg">
                <input class=""
                       type="radio"
                       name="dhl_sending_doc"
                       id="sending-doc_on"
                       value="1"
                       <?php if ($_smarty_tpl->tpl_vars['dhl_sending_doc']->value) {?>checked="checked"<?php }?>>
                <label for="sending-doc_on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                <input class=""
                       type="radio"
                       name="dhl_sending_doc"
                       id="sending-doc_off"
                       value="0"
                       <?php if (!$_smarty_tpl->tpl_vars['dhl_sending_doc']->value) {?>checked="checked"<?php }?>>
                <label for="sending-doc_off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                <a class="slide-button btn"></a>
              </span>
            </div>
          </div>

          <div class="form-group form-group-declared-value">
            <label class="control-label col-lg-3" for="dhl-label-declared-value">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Declared value','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-3">
              <div class="input-group input fixed-width-md">
                <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
</span>
                <input type="text"
                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                       onchange="declaredValueControl();"
                       name="dhl_label_declared_value"
                       id="dhl-label-declared-value"
                       value=""
                       class="input fixed-width-sm">
              </div>
              <?php if ((isset($_smarty_tpl->tpl_vars['declared_value_with_taxes']->value)) && (isset($_smarty_tpl->tpl_vars['declared_value_without_taxes']->value))) {?>
                <p class="help-block">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total products (tax excl.):','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
 <?php echo sprintf('%.2f',floatval($_smarty_tpl->tpl_vars['declared_value_without_taxes']->value));?>

                  <br/>
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Total products (tax incl.):','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
 <?php echo sprintf('%.2f',floatval($_smarty_tpl->tpl_vars['declared_value_with_taxes']->value));?>

                </p>
              <?php }?>
            </div>
          </div>
          <div class="form-group form-group-insured-value">
            <label class="control-label col-lg-3" for="dhl-label-insured-value">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Insured value','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>

            <div class="col-lg-3">
              <div class="input-group input fixed-width-md">
                <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
</span>
                <input type="text"
                       onchange="this.value = this.value.replace(/,/g, '.')"
                       name="dhl_label_insured_value"
                       id="dhl-label-insured-value"
                       class="input fixed-width-sm">
              </div>
            </div>
          </div>
          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Extracharges','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
          <?php $_smarty_tpl->_subTemplateRender("file:./_partials/dhl-extracharges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <div class="dhl-process-button">
            <button id="submit-dhl-label-prices" type="submit" class="btn btn-primary" name="submitDhlLabelPrices">
              <i class="process-icon- icon-arrow-circle-down"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get available DHL services','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </button>
            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'html','utf-8' ));?>
loading.gif" id="dhl-loading-price" style="display: none"
                 class="dhl-loading"/>
          </div>

          <div class="dhl-services-result"></div>
          <?php if ((isset($_smarty_tpl->tpl_vars['id_order']->value)) && $_smarty_tpl->tpl_vars['action']->value != 'createreturn') {?>
            <div style="clear: both; display: none;" class="panel_plt panel col-lg-12" id="panel_plt">
              <div style="border-bottom: solid 1px #a0d0eb;margin-bottom: 15px;"><span style="line-height: 3;"
                                                                                       class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use P.L.T. Option to save time and paper ! No need to attach physically your DHL commercial invoice, send it by electronic transmission : PaperLess Transfer','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span>
              </div>
              <form>
                <input type="radio"
                       name="dhl_plt_service"
                       id="use_plt_option"
                       value="create_invoice"
                       checked="true"
                       style="margin-right: 10px;"
                       onchange="usePltOption();"/> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use P.L.T. Option by editing commercial invoice here :','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                <a onclick="displayFormInvoice();"
                   style="text-transform: none;margin-left: 30px;"
                   title="Create DHL invoice"
                   class="btn_display_form_invoice edit btn btn-default btn-primary">
                  <i class="icon-plus-circle"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create DHL invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </a>
                <div class="dhl-invoice-result-page-label col-lg-7" style="float:right"></div>

                <br/><br/><br/>
                <div class="panel_form_invoice col-lg-12" style="display: none;">
                  <?php $_smarty_tpl->_subTemplateRender("file:../dhl_commercial_invoice/dhl_commercial_invoice_page_label.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                  <br/><br/>
                </div>

                <input type="radio"
                       name="dhl_plt_service"
                       id="use_plt_option2"
                       value="upload_invoice"
                       style="margin-right: 10px;"
                       onchange="uploadOwnInvoice();"/> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use P.L.T. Option and - upload your own PDF invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                <div class="col-lg-6 div_upload_pdf_invoice" style="float: right; display: none">
                  <div class="form-group" style="margin-bottom: 0;">
                    <div>
                      <div id="view_file_pdf" class="btn-group" style="display: none; text-transform: none;">
                        <a target="_blank"
                           id="edit_file_pdf"
                           style="text-transform: none;"
                           href=""
                           title="View invoice"
                           class="edit btn btn-default btn-primary"
                           style="text-transform: none; border-right: 2px solid #2eacce;">
                          <i class="icon-eye"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                        </a>
                        <button class="btn btn-default dropdown-toggle btn-primary" data-toggle="dropdown">
                          <i class="icon-caret-down"></i>&nbsp;
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="edit dhl-edit-invoice" id="dhl-edit-invoice"
                               onclick="DeleteInvoice();">
                              <i class="icon-trash"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                            </a>
                          </li>
                        </ul>
                      </div>
                      <form method="post"
                            id="form-upload_invoice"
                            onsubmit="return false"
                            enctype="multipart/form-data">
                        <button id="dhl_upload_invoice"
                                type="submit"
                                class="btn btn-default pull-right btn-primary"
                                name="submit_dhl_upload_invoice"
                                style="margin-right: 22%; text-transform: none;"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'save','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
 </button>
                        <?php echo $_smarty_tpl->tpl_vars['input_upload']->value;?>

                        <p id="error_pdf_form"
                           class="help-block"
                           style="font-size: 10px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Only .pdf files are allowed','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
                        <p id="error_champ_vide"
                           class="help-block"
                           style="font-size: 10px; color: red; display: none;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Insert the invoice please ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
                      </form>
                    </div>

                  </div>


                </div>
                <br/><br/><br/><br/>
                <input type="radio"
                       name="dhl_plt_service"
                       id="use_plt_option3"
                       value="not_use_plt"
                       style="margin-right: 10px;"
                       onchange="notUsePlt();"/> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Do not use P.L.T. and edit label (I asume that I have to attach my commercial invoice to my shipping)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </form>

            </div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['action']->value == 'create') {?>
            <div class="alert alert-info msg_plt_not_eligible" style="display: none; clear: both;">
              <ul>
                <li>
                  <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping country or order amount is not eligible to Paperless Transfer (PLT). You should attached your commercial invoice paper document to your shipping.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span>
                </li>
              </ul>
            </div>
          <?php }?>
          <div id="dhl-generate-label-block" class="dhl-process-button" style="display: none;">

            <button id="submit-dhl-label-create" type="submit" class="btn btn-primary" name="submitDhlLabelCreate">
              <i class="process-icon- icon-barcode"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate the label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </button>
            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'html','utf-8' ));?>
loading.gif" id="dhl-loading-generate" style="display: none"
                 class="dhl-loading"/>
          </div>
          <div id="dhl-generate-label-and-invoice-block" class="dhl-process-button" style="display: none;">

            <button id="submit-dhl-label-invoice-create"
                    type="submit"
                    class="btn btn-primary"
                    name="submitDhlLabelCreate">
              <i class="process-icon- icon-barcode"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate the label And Save Invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </button>
            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'html','utf-8' ));?>
loading.gif" id="dhl-loading-save" style="display: none"
                 class="dhl-loading"/>
          </div>


        </form>
        <div class="dhl-label-result"></div>

      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
  

  var vat_number = 0;

  /* Binding submit event */
  $('#create-label').submit(function (e) {
      return false;
  });

  /* Get availables prices and services */
  $('#submit-dhl-label-prices').click(function (e) {
      var dhlServicesResult = $('.dhl-services-result');
      var dhlLabelResult = $('.dhl-label-result');
      var dhlLabelGenerateBtn = $('#dhl-generate-label-block');
      var free_label = 0;
      dhlServicesResult.html('');
      dhlLabelResult.html('');
      dhlLabelGenerateBtn.hide();
      $('#dhl-loading-price').show();
      var input_dhl_id_order;
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';
      var data = {
          controller: 'AdminDhlLabel',
          ajax: 1,
          action: 'retrieveDhlService',
          token: tokenDhlLabel
      };

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php?' + $.param(data),
          data: $('#create-label').serialize(),
          success: function (data) {
              $('#dhl-loading-price').hide(200);
              dhlServicesResult.html(data.html).hide().show(400);
              if (data.errors !== true) {
                  dhlLabelGenerateBtn.show(400);
              }
          }
      });
  });

  /* Generate the label */
  $('#submit-dhl-label-create').click(function (e) {
      var dhlLabelResult = $('.dhl-label-result');
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';
      var data = {
          controller: 'AdminDhlLabel',
          ajax: 1,
          action: 'generateFormLabel',
          token: tokenDhlLabel
      };

      dhlLabelResult.html('');
      $('#dhl-loading-generate').show();
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php?' + $.param(data),
          data: $("#create-label").serialize(),
          success: function (data) {
              $('#dhl-loading-generate').hide(200);
              if (data.errors === false) {
                  $('#submit-dhl-label-prices').hide();
                  $('.msg_plt_not_eligible').hide();
                  $('.dhl-services-result').html('');
                  $('#submit-dhl-label-create').hide();
                  $('#panel_plt').hide();

              }
              dhlLabelResult.html(data.html);
          },
      });
  });
  $('#submit-dhl-label-invoice-create').click(function (e) {
      var dhlLabelResult = $('.dhl-label-result');
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';
      var data = {
          controller: 'AdminDhlLabel',
          ajax: 1,
          action: 'generateFormLabelAndSaveInvoice',
          token: tokenDhlLabel,
      };

      dhlLabelResult.html('');
      $('#dhl-loading-save').show();
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php?' + $.param(data),
          data: $("#create-label").serialize(),
          success: function (data) {
              $('#dhl-loading-save').hide(200);
              if (data.errors === false) {
                  $('#submit-dhl-label-prices').hide();
                  $('.dhl-services-result').html('');
                  $('#panel_plt').hide();
                  $('#submit-dhl-label-invoice-create').hide();
              }
              dhlLabelResult.html(data.html);
          },
      });
  });

  $('.dhl-add-package').click(function (e) {
      e.preventDefault();
      var idPackage = $(this).attr('data-package');
      var weight = $("input[name='dhl_package_weight_" + idPackage + "']").val();
      var width = $("input[name='dhl_package_width_" + idPackage + "']").val();
      var length = $("input[name='dhl_package_length_" + idPackage + "']").val();
      var depth = $("input[name='dhl_package_depth_" + idPackage + "']").val();
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php',
          data: {
              controller: 'AdminDhlLabel',
              ajax: 1,
              action: 'addDhlPackage',
              token: tokenDhlLabel,
              id_dhl_package: idPackage,
              width: width,
              length: length,
              depth: depth,
              weight: weight,
          },
          success: function (data) {
              if (data.errors !== true) {
                  var dim = data.packageDetails.id + 'x' +
                      data.packageDetails.weight + 'x' +
                      data.packageDetails.length + 'x' +
                      data.packageDetails.width + 'x' +
                      data.packageDetails.depth;

                  $('.dhl-package-table > tbody:last-child').append('<tr>' +
                      '<td>' + data.packageDetails.name + '</td>' +
                      '<td>' + data.packageDetails.weight + '</td>' +
                      '<td>' + data.packageDetails.length + '</td>' +
                      '<td>' + data.packageDetails.width + '</td>' +
                      '<td>' + data.packageDetails.depth + '</td>' +
                      '<td class="text-right"><a class="btn btn-default dhl-delete-row" href="#" onclick="dhlDeleteRow(event, this)"><i class="icon-trash"></i></a></td>' +
                      '<input type="hidden" name="package_dimensions[]" value="' + dim + '" />' +
                      '</tr>');

                  $("input[name='dhl_package_weight_" + idPackage + "']").attr('value', data.init.weight);
                  $("input[name='dhl_package_length_" + idPackage + "']").attr('value', data.init.length);
                  $("input[name='dhl_package_depth_" + idPackage + "']").attr('value', data.init.depth);
                  $("input[name='dhl_package_width_" + idPackage + "']").attr('value', data.init.width);
              }
              updateTotalPicesDangerousGoods();
          },
          error: function (data) {

          }
      });
  });

  $('#dhl_upload_invoice').click(function (e) {
      var formData = new FormData($("#form-upload_invoice").get(0));
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';
      var data = {
          controller: 'AdminDhlLabel',
          ajax: 1,
          action: 'uploadPdfInvoice',
          token: tokenDhlLabel,
      };
      $.ajax({
          url: baseAdminDir + 'index.php?' + $.param(data),
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false
      }).done(function (response) {
//            there is an error
          if (response.indexOf("CommercialInvoice") > -1) {
              $("#eg_pdf_invoice-name").css("border-color", "#C7D6DB");
              $("#error_pdf_form").css("border-color", "#959595");
              $('#error_champ_vide').hide();

              $('#error_champ_vide').hide();
              $("#pdf_name_submitted").val(response);
              $('#form-upload_invoice').hide();
              $('#edit_file_pdf').attr('href', '/modules/dhlexpress/pdf/' + response);
              $('#view_file_pdf').show();
              $('#dhl-generate-label-and-invoice-block').show();
          } else {
//            there no error
              $("#eg_pdf_invoice-name").css("border-color", "red");
              $('#error_champ_vide').show();
              $('#error_champ_vide').text(response);
          }
      }).fail(function () {
          // Here you should treat the http errors (e.g., 403, 404)
      }).always(function () {
          //alert("AJAX request finished!");
      });
  });

  $('#dhl-edit-invoice').click(function (e) {
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';
      var data = {
          controller: 'AdminDhlLabel',
          ajax: 1,
          action: 'deleteInvoice',
          token: tokenDhlLabel,
      };

      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php?' + $.param(data),
          data: $('#create-label').serialize(),
          success: function (data) {
              document.getElementById("pdf_name_submitted").value = "";
          }
      });
  });
  
<?php echo '</script'; ?>
>

<?php }
/* {block "dhl-info-message"} */
class Block_191467406362bf2fba9626c6_21783943 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'dhl-info-message' => 
  array (
    0 => 'Block_191467406362bf2fba9626c6_21783943',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "dhl-info-message"} */
/* {block "dhl-hidden-input"} */
class Block_214095605162bf2fba963918_18821751 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'dhl-hidden-input' => 
  array (
    0 => 'Block_214095605162bf2fba963918_18821751',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <input id="pdf_name_submitted" name="pdf_name_submitted" type="hidden" value="">
            <input type="hidden" id="dhl_id_order" name="dhl_id_order" value="<?php echo intval($_smarty_tpl->tpl_vars['id_order']->value);?>
"/>
            <?php if ((isset($_smarty_tpl->tpl_vars['return_label']->value))) {?>
              <input type="hidden" name="dhl_id_return_label" value="<?php echo intval($_smarty_tpl->tpl_vars['return_label']->value);?>
"/>
            <?php }?>
          <?php
}
}
/* {/block "dhl-hidden-input"} */
/* {block "dhl-form-title"} */
class Block_107615262062bf2fba965c74_27807272 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'dhl-form-title' => 
  array (
    0 => 'Block_107615262062bf2fba965c74_27807272',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate a label','mod'=>'dhlexpress'),$_smarty_tpl ) );
}
}
/* {/block "dhl-form-title"} */
/* {block "dhl-customer-address"} */
class Block_48526968362bf2fba969b77_16421698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'dhl-customer-address' => 
  array (
    0 => 'Block_48526968362bf2fba969b77_16421698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

              <?php $_smarty_tpl->_subTemplateRender("file:../_partials/admin-dhl-customer-address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php
}
}
/* {/block "dhl-customer-address"} */
}
