<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:26:17
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-shipment-details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2e398d5612_31013430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f42f4be9387955870bf689a1699ba07268f80f8a' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-shipment-details.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2e398d5612_31013430 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="dhl-shipment-details-new-theme">
  <div class="row dhl-shipment-details-buttons">
    <div class="col-lg-12">
      <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DHL Shipment details','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h2>
      <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlLabel'),'htmlall','utf-8' ));?>
&id_order=<?php echo intval($_smarty_tpl->tpl_vars['id_order']->value);?>
&action=create"
         title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
         class="edit btn">
        <i class="material-icons">add_circle</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </a>
      <a href="#"
         data-id-dhl-order="<?php echo intval($_smarty_tpl->tpl_vars['id_dhl_order']->value);?>
"
         class="btn btn-primary dhl-update-tracking">
        <i class="material-icons">refresh</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update tracking','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </a>
      <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'html','utf-8' ));?>
loading.gif"
           class="dhl-tracking dhl-loading-tracking"
           style="display: none;"/>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 dhl-shipment-details-table-container">
      <?php echo $_smarty_tpl->tpl_vars['html_shipment_details_table']->value;?>

    </div>
  </div>
</div>
<?php echo '<script'; ?>
>
  
  $('.dhl-update-tracking').click(function (e) {
      e.preventDefault();
      var idDhlOrder = parseInt($(this).attr('data-id-dhl-order'));
      var shipmentDetail = $('.dhl-shipment-details-table');
      var dhlLoader = $('.dhl-loading-tracking');
      var tokenDhlOrders = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlOrders'),$_smarty_tpl ) );?>
';

      shipmentDetail.fadeTo('fast', 0.4);
      dhlLoader.show();
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php',
          data: {
              controller: 'AdminDhlOrders',
              ajax: 1,
              token: tokenDhlOrders,
              action: 'updateTrackingStatus',
              id_dhl_order: idDhlOrder,
              new_theme : 1 ,
          },
          success: function (data) {

              if (data.errors === false) {
                  showSuccessMessage(data.message);
                  dhlLoader.hide();
                  $('.dhl-shipment-details-table-container').html(data.html);
                  shipmentDetail.fadeTo('fast', 1);
              } else {
                  showErrorMessage(data.message);
                  dhlLoader.hide();
                  shipmentDetail.fadeTo('fast', 1);
              }
          },
          error: function (data) {

          }
      });
  });
  
<?php echo '</script'; ?>
>
<?php }
}
