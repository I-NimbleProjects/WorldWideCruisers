<?php
/* Smarty version 3.1.43, created on 2022-07-01 07:53:36
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_orders/_partials/dhl-tracking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bee0406841d3_28533850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9205015580a28257581d67414c1bf5d4d0f9a01c' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_orders/_partials/dhl-tracking.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bee0406841d3_28533850 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel col-lg-12">
      <div class="panel-heading">
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Track your shipments','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

      </div>
      <div class="row">
        <div class="col-lg-12">
          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can update trackings using the two following methods:','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

          <p><span class="dhl-number">1. </span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Manually, by clicking the button below','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
          <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_update_tracking']->value,'html','utf-8' ));?>
"
             class="btn btn-primary"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Update tracking','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>

          <p class="dhl-or"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'-or-','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

          <p>
            <span class="dhl-number">2. </span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Automatically, ask your hosting provider or your administrator to setup a "Cron Task" to load the following URL at the time you would like:','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </p>
          <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_tracking_url']->value,'html','utf-8' ));?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
  
  $(document).ready(function () {

      $('.dhl-dropdown').click(function (e) {
          e.preventDefault();
          var idDhlOrder = parseInt($(this).attr('data-dhl-order'));
          var imgPath = '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_img_path']->value,'html','utf-8' ));?>
loading.gif';
          var tokenDhlOrders = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlOrders'),$_smarty_tpl ) );?>
';

          $('.dhl-shipment-detail').remove();
          $('<tr class="dhl-shipment-detail-loading">' +
              '<td colspan="7" style="padding: 0">' +
              '<div style="background: #fff;">' +
              '<img src="' + imgPath + '" class="dhl-loading dhl-loading-expand-order" />' +
              '</div>' +
              '</td>' +
              '</tr>').insertAfter($('*[data-dhl-order="' + idDhlOrder + '"]').closest('tr'));
          $.ajax({
              type: 'POST',
              dataType: 'json',
              url: baseAdminDir + 'index.php',
              data: {
                  controller: 'AdminDhlOrders',
                  ajax: 1,
                  action: 'expandDhlOrder',
                  token: tokenDhlOrders,
                  id_dhl_order: idDhlOrder,
              },
              success: function (data) {
                  if (data.errors !== true) {
                      $('.dhl-shipment-detail-loading').remove();
                      $('<tr class="dhl-shipment-detail">' +
                          '<td colspan="7" style="padding: 0">' +
                          '<div class="dhl-shipment-details-container">' + data.html + '</div>' +
                          '</td>' +
                          '</tr>').insertAfter($('*[data-dhl-order="' + idDhlOrder + '"]').closest('tr')).hide().show('slow');
                  } else {
                      $('.dhl-shipment-detail-loading').remove();
                      showErrorMessage(data.message);
                  }
              },
              error: function (data) {

              }
          });
      });
  });
  
<?php echo '</script'; ?>
>
<?php }
}
