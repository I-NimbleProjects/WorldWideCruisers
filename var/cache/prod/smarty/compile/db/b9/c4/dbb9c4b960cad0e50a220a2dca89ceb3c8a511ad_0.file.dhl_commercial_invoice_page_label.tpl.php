<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:32:42
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_commercial_invoice/dhl_commercial_invoice_page_label.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fba9eae07_82001702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbb9c4b960cad0e50a220a2dca89ceb3c8a511ad' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_commercial_invoice/dhl_commercial_invoice_page_label.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2fba9eae07_82001702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195108418662bf2fba9d1794_64198624', "dhl-form");
?>

<?php }
/* {block "dhl-form"} */
class Block_195108418662bf2fba9d1794_64198624 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'dhl-form' => 
  array (
    0 => 'Block_195108418662bf2fba9d1794_64198624',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <form id="create-invoice" class="defaultForm form-horizontal dhl-form" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentIndex']->value,'html','utf-8' ));?>
"
        method="post" enctype="multipart/form-data">
    <input type="hidden" id="id_order" value="<?php echo intval($_smarty_tpl->tpl_vars['id_order']->value);?>
"/>
    <input type="hidden" name="dhl_currency_iso" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
"/>

    <div id="dhl-create-invoice">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel form-horizontal clearfix">
            <div class="panel-heading">
              <i class="icon-user"></i>
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate an invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </div>
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'General informations','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>

            <div class="form-group">
              <label class="control-label col-lg-3" for="dhl-invoice-incoterms">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Incoterms (2010)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </label>

              <div class="col-lg-3">
                <select name="dhl_invoice_incoterms" class="col-lg-12" id="dhl-invoice-incoterms">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['incoterms']->value, 'name', false, 'code');
$_smarty_tpl->tpl_vars['name']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['code']->value => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->do_else = false;
?>
                    <option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['code']->value,'html','utf-8' ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['code']->value,'html','utf-8' ));?>

                      (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','utf-8' ));?>
)
                    </option>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
              </div>
            </div>

            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping content','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>

            <div class="form-group">
              <label class="control-label col-lg-3 required" for="dhl-total-package">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Number of package','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </label>

              <div class="col-lg-3">
                <input type="text"
                       name="dhl_total_package"
                       id="dhl-total-package"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                       class="input fixed-width-xs">
              </div>
            </div>

            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Products detail','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h4>

            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please review the content of the shipping and make corrections if needed','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

            <div class="tab-content panel collapse in">
              <div>
                <table class="table dhl-product-table">
                  <thead>
                  <tr>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SH Code','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ref.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product name','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Origin country','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quantity','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unit price (tax excl.)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"></span></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_details']->value, 'order_detail');
$_smarty_tpl->tpl_vars['order_detail']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order_detail']->value) {
$_smarty_tpl->tpl_vars['order_detail']->do_else = false;
?>
                    <tr>
                      <td class="fixed-width-xl">
                        <input type="text"
                               value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_hs_code']->value,'html','utf-8' ));?>
"
                               name="dhl_od_hs_code_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               id="dhl-od-hs-code-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               class="input fixed-width-xl">
                      </td>
                      <td class="fixed-width-lg"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['order_detail']->value['product_reference'],'html','utf-8' ));?>
</td>
                      <td class="fixed-width-xl">
                        <input type="text"
                               name="dhl_od_pname_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               id="dhl-od-pname-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['order_detail']->value['product_name'],'html','utf-8' ));?>
">
                      </td>
                      <td class="fixed-width-xl">
                        <select name="dhl_od_country_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                                id="dhl-od-country-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
">
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                            <option value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
"
                                    <?php if ($_smarty_tpl->tpl_vars['country']->value['id_country'] == $_smarty_tpl->tpl_vars['default_country']->value) {?>selected="selected"<?php }?>><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['name'],'html','utf-8' ));?>
</option>
                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                      </td>
                      <td class="fixed-width-sm center">
                        <input type="text"
                               name="dhl_od_quantity_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               id="dhl-od-quantity-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                               value="<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['product_quantity']);?>
"
                               class="fixed-width-xs">
                      </td>
                      <td class="fixed-width-sm">
                        <div class="col-lg-3">
                          <div class="input-group fixed-width-sm">
                            <input name="dhl_od_weight_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                                   id="dhl-od-weight-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                                   type="text"
                                   value="<?php echo floatval($_smarty_tpl->tpl_vars['order_detail']->value['product_weight']);?>
"
                                   class="fixed-width-sm dhl-value-weight">
                            <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['weight_unit']->value,'html','utf-8' ));?>
</span>
                          </div>
                        </div>
                      </td>
                      <td class="fixed-width-sm">
                        <div class="col-lg-3">
                          <div class="input-group fixed-width-sm">
                            <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
</span>
                            <input name="dhl_od_price_<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                                   id="dhl-od-price-<?php echo intval($_smarty_tpl->tpl_vars['order_detail']->value['id_order_detail']);?>
"
                                   type="text"
                                   value="<?php echo floatval($_smarty_tpl->tpl_vars['order_detail']->value['unit_price_tax_excl']);?>
"
                                   class="fixed-width-sm"/>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a class="btn btn-default" href="#" onclick="dhlDeleteRow(event, this)"><i
                                  class="icon-trash"></i></a>
                      </td>
                    </tr>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>
                </table>
              </div>
            </div>
            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add additional products','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h4>

            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can add more products the list...','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

            <div id="div-dhl-add-sup-product" class="tab-content collapse in dhl-product-sup-table">
              <div>
                <table class="table">
                  <thead>
                  <tr>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'SH Code','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Product name','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Origin country','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Quantity','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Weight','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box required"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Unit price (tax excl.)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
                    <th><span class="title_box"></span></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <input type="text"
                             value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['default_hs_code']->value,'html','utf-8' ));?>
"
                             name="dhl_supp_hs_code"
                             id="dhl-supp-hs-code"
                             class="input fixed-width-xl"/>
                    </td>
                    <td>
                      <input type="text" name="dhl_supp_pname" id="dhl-supp-pname" value=""/>
                    </td>
                    <td>
                      <select class="fixed-width-lg" name="dhl_supp_country" id="dhl-supp-country">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                          <option value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
"
                                  <?php if ($_smarty_tpl->tpl_vars['country']->value['id_country'] == $_smarty_tpl->tpl_vars['default_country']->value) {?>selected="selected"<?php }?>>
                            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country']->value['name'],'html','utf-8' ));?>

                          </option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      </select>
                    </td>
                    <td class="center">
                      <input type="text" name="dhl_supp_quantity" id="dhl-supp-quantity" class="fixed-width-xs"/>
                    </td>
                    <td>
                      <div class="col-lg-3">
                        <div class="input-group fixed-width-xs">
                          <input name="dhl_supp_weight" type="text" id="dhl-supp-weight" class="fixed-width-xs">
                          <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['weight_unit']->value,'html','utf-8' ));?>
</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="col-lg-3">
                        <div class="input-group fixed-width-xs">
                          <span class="input-group-addon"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currency_iso']->value,'html','utf-8' ));?>
</span>
                          <input name="dhl_supp_price" id="dhl-supp-price" type="text" class="fixed-width-sm"/>
                        </div>
                      </div>
                    </td>
                    <td>
                      <button type="submit"
                              class="btn btn-default"
                              id="submit-dhl-add-sup-product"
                              name="submitDhlAddSupProduct">
                        <i class="icon-plus-sign-alt"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Add','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                      </button>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dhl-process-button">
              <button id="submit-dhl-invoice-download" type="submit" class="btn btn-primary"
                      name="submitDhlInvoiceDownload">
                <i class="process-icon- icon-file-text"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Generate the invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </button>
            </div>
            <div class="dhl-invoice-result"></div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php echo '<script'; ?>
 type="text/javascript">
    

    var addI = 0;
    var tokenDhlCI = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlCommercialInvoice'),$_smarty_tpl ) );?>
';
    var result;
    /* Binding submit event */
    $('#create-invoice').submit(function (e) {
        return false;
    });
    $('#submit-dhl-invoice-download').click(function (e) {
        var dhlInvoiceResult = $('.dhl-invoice-result');
        dhlInvoiceResult.html('');
        var dhlInvoiceResultPageLabel = $('.dhl-invoice-result-page-label');
        dhlInvoiceResultPageLabel.html('');
        var data = {
            controller: 'AdminDhlCommercialInvoice',
            ajax: 1,
            action: 'generateInvoiceInPageLabel',
            token: tokenDhlCI,
        };

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: baseAdminDir + 'index.php?' + $.param(data),
            data: $('#create-label').serialize(),
            success: function (data) {
                if (data.html.indexOf("alert-danger") > -1) {
                    dhlInvoiceResult.html(data.html).hide().show(400);
                } else {
                    dhlInvoiceResultPageLabel.html(data.html).hide().show(400);
                    $('#dhl-generate-label-and-invoice-block').show(400);
                    /*$('.btn_display_form_invoice').hide(200);*/
                    $('.panel_form_invoice').hide(200);
                    $('.btn_view_invoice').show(400);
                    $('#dhl-generate-label-and-invoice-block').show(400);
                }
            }
        });
    });

    $('#submit-dhl-add-sup-product').click(function (e) {
        var data = {
            controller: 'AdminDhlCommercialInvoice',
            ajax: 1,
            action: 'addSupProduct',
            token: tokenDhlCI,
        };

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: baseAdminDir + 'index.php?' + $.param(data),
            data: $('#create-label').serialize(),
            success: function (data) {
                if (data.errors !== true) {
                    addI++;
                    $('.dhl-product-table > tbody:last-child').append('<tr>' +
                        '<td><input type="hidden" name="dhl_supp_hs_code_' + addI + '" value="' + data.productRow.shCode + '" />' + data.productRow.shCode + '</td>' +
                        '<td>---</td>' +
                        '<td><input type="hidden" name="dhl_supp_pname_' + addI + '" value="' + data.productRow.name + '" />' + data.productRow.name + '</td>' +
                        '<td><input type="hidden" name="dhl_supp_country_' + addI + '" value="' + data.productRow.originCountry + '" />' + data.productRow.originCountry + '</td>' +
                        '<td><input type="hidden" name="dhl_supp_quantity_' + addI + '" value="' + data.productRow.quantity + '" />' + data.productRow.quantity + '</td>' +
                        '<td><input type="hidden" name="dhl_supp_weight_' + addI + '" value="' + data.productRow.weight + '" />' + data.productRow.weight + '</td>' +
                        '<td><input type="hidden" name="dhl_supp_price_' + addI + '" value="' + data.productRow.unitPrice + '" />' + data.productRow.unitPrice + '</td>' +
                        '<td class="text-right"><a class="btn btn-default" href="#" onclick="dhlDeleteRow(event, this)"><i class="icon-trash"></i></a></td>' +
                        '</tr>');
                }
            }
        });
    });
    
  <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "dhl-form"} */
}
