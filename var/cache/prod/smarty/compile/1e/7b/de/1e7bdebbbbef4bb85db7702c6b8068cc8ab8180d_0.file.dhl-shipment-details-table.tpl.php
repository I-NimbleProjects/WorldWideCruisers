<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:26:17
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-shipment-details-table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2e39871120_01342362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e7bdebbbbef4bb85db7702c6b8068cc8ab8180d' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/hook/new_theme/dhl-shipment-details-table.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2e39871120_01342362 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="card mt-2 dhl-shipment-details-table">
  <div>
    <table class="table dhl-package-table">
      <thead>
      <tr>
        <th><span class="title_box"><i class="material-icons">local_shipping</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'AWB Number','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
        <th><span class="title_box"><i class="material-icons">info_outline</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Last tracking status known','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
        <th><span class="title_box"><i class="material-icons">reorder</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
        <th><span class="title_box"><i class="material-icons">note</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Commercial invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
        <th><span class="title_box"><i class="material-icons">reorder</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span></th>
      </tr>
      </thead>
      <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dhl_shipments']->value, 'dhl_shipment', false, 'k');
$_smarty_tpl->tpl_vars['dhl_shipment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['dhl_shipment']->value) {
$_smarty_tpl->tpl_vars['dhl_shipment']->do_else = false;
?>
        <tr>
          <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_shipment']->value['awb_number'],'html','utf-8' ));?>
</td>
          <td>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_shipment']->value['last_status_known'],'html','utf-8' ));?>

            <?php if ($_smarty_tpl->tpl_vars['dhl_shipment']->value['last_status_update']) {?>
              <br/>
              (<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_shipment']->value['last_status_update'],'html','utf-8' ));?>
)
            <?php }?>
          </td>
          <td>
            <div class="btn-group-action">
              <div>
                <a target="_blank"
                   href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlLabel'),'htmlall','utf-8' ));?>
&id_dhl_label=<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_label']);?>
&action=downloadlabel"
                   title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                   class="edit btn">
                  <i class="material-icons">visibility</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </a>
                <a class="tooltip-link d-print-none" href="#" data-toggle="dropdown">
                    <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_shipment']->value['tracking_url'],'html','utf-8' ));?>
"
                       target="_blank"
                       title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Track the shipment','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                       class="dropdown-item">
                       <i class="material-icons">local_shipping</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Track the shipment','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                    </a>
                  <?php if (!$_smarty_tpl->tpl_vars['dhl_shipment']->value['is_tracked']) {?>
                    <li class="divider"></li>
                      <a href="#"
                         title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                         data-id-dhl-label="<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_label']);?>
"
                         class="dropdown-item delete dhl-delete-label">
                        <i class="material-icons">delete</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                      </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </td>
          <td>
            <?php if ($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_commercial_invoice']) {?>
              <div class="btn-group-action">
                <div>
                  <a target="_blank"
                     href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlCommercialInvoice'),'html','utf-8' ));?>
&id_dhl_label=<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_label']);?>
&action=downloadinvoice"
                     title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
" class="edit btn">
                    <i class="material-icons">visibility</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                  </a>
                  <a class="tooltip-link d-print-none" href="#" data-toggle="dropdown">
                    <i class="material-icons">more_vert</i>
                  </a>
                 <div class="dropdown-menu dropdown-menu-right">
                      <a href="#"
                         title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                         data-id-dhl-invoice="<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_commercial_invoice']);?>
"
                         class="dropdown-item delete dhl-delete-invoice">
                        <i class="material-icons">delete</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                      </a>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlCommercialInvoice'),'html','utf-8' ));?>
&id_dhl_label=<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_label']);?>
&action=create"
                 title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create DHL invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                 class="edit btn">
                <i class="material-icons">add_circle</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create DHL invoice','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </a>
            <?php }?>
          </td>
          <td>
            <?php if ($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_return_label']) {?>
              <div class="btn-group-action">
                <div>
                  <a target="_blank"
                     href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlLabel'),'htmlall','utf-8' ));?>
&id_dhl_label=<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_return_label']);?>
&action=downloadlabel"
                     title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View return label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                     class="edit btn">
                    <i class="material-icons">visibility</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'View return label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                  </a>
                  <a class="tooltip-link d-print-none" href="#" data-toggle="dropdown">
                    <i class="material-icons">more_vert</i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['dhl_shipment']->value['tracking_url'],'html','utf-8' ));?>
"
                         target="_blank"
                         title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Track the shipment','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
">
                        <i class="material-icons">local_shipping</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Track the shipment','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                      </a>
                      <a class="divider" href="#"></a>
                      <a href="#"
                         title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                         data-id-dhl-label="<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_return_label']);?>
"
                         class="dropdown-item delete dhl-delete-label">
                        <i class="material-icons">delete</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delete label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                      </a>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDhlLabel'),'htmlall','utf-8' ));?>
&id_dhl_label=<?php echo intval($_smarty_tpl->tpl_vars['dhl_shipment']->value['id_dhl_label']);?>
&action=createreturn"
                 title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create return label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                 class="edit btn">
                <i class="material-icons">add_circle</i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create return label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </a>
            <?php }?>
          </td>
        </tr>
        <?php
}
if ($_smarty_tpl->tpl_vars['dhl_shipment']->do_else) {
?>
        <tr>
          <td align="center" colspan="5">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please create a first label','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

          </td>
        </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
  
  $('.dhl-delete-invoice').click(function (e) {
      e.preventDefault();
      var idDhlInvoice = parseInt($(this).attr('data-id-dhl-invoice'));
      var shipmentDetail = $('.dhl-shipment-details-table');
      var tokenDhlCI = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlCommercialInvoice'),$_smarty_tpl ) );?>
';

      shipmentDetail.fadeTo('fast', 0.4);
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php',
          data: {
              controller: 'AdminDhlCommercialInvoice',
              ajax: 1,
              action: 'deleteInvoice',
              token: tokenDhlCI,
              id_dhl_commercial_invoice: idDhlInvoice,
          },
          success: function (data) {
              if (data.errors === false) {
                  showSuccessMessage(data.message);
                  $('.dhl-shipment-details-table-container').html(data.html);
                  shipmentDetail.fadeTo('fast', 1);
              } else {
                  showErrorMessage(data.message);
                  shipmentDetail.fadeTo('fast', 1);
              }
          },
          error: function (data) {

          }
      });
  });

  $('.dhl-delete-label').click(function (e) {
      e.preventDefault();
      var idDhlLabel = parseInt($(this).attr('data-id-dhl-label'));
      var shipmentDetail = $('.dhl-shipment-details-table');
      var tokenDhlLabel = '<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0], array( array('tab'=>'AdminDhlLabel'),$_smarty_tpl ) );?>
';

      shipmentDetail.fadeTo('fast', 0.4);
      $.ajax({
          type: 'POST',
          dataType: 'json',
          url: baseAdminDir + 'index.php',
          data: {
              controller: 'AdminDhlLabel',
              ajax: 1,
              action: 'deleteLabel',
              token: tokenDhlLabel,
              id_dhl_label: idDhlLabel,
          },
          success: function (data) {
              if (data.errors === false) {
                  showSuccessMessage(data.message);
                  $('.dhl-shipment-details-table-container').html(data.html);
                  shipmentDetail.fadeTo('fast', 1);
              } else {
                  showErrorMessage(data.message);
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
