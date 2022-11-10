<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:45:56
  from '/var/www/html/prestashop/modules/paypal/views/templates/hook/partialRefund.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6b144c8c54_70658556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edc4be82599f7093fb7bb2737b578be8bbe079e1' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/hook/partialRefund.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6b144c8c54_70658556 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
  
    // add checkbox
    $(document).ready(() => {
        var chb_paypal_refund = '<?php echo $_smarty_tpl->tpl_vars['chb_paypal_refund']->value;?>
';

        // Make partial order refund in Order page in BO
        $(document).on('click', '#desc-order-partial_refund', function(){

            // Create checkbox and insert for Paypal refund
            if ($('#doPartialRefundPaypal').length == 0) {
                let newCheckBox = `<p class="checkbox"><label for="doPartialRefundPaypal">
                        <input type="checkbox" id="doPartialRefundPaypal" name="doPartialRefundPaypal" value="1">
                          ${chb_paypal_refund}</label></p>`;
                $('button[name=partialRefund]').parent('.partial_refund_fields').prepend(newCheckBox);
            }
        });

        $(document).on('click', '.partial-refund-display', function(){
            // Create checkbox and insert for Paypal refund
            if ($('#doPartialRefundPaypal').length == 0) {
                let newCheckBox = `
                        <div class="cancel-product-element form-group" style="display: block;">
                                <div class="checkbox">
                                    <div class="md-checkbox md-checkbox-inline">
                                      <label>
                                          <input type="checkbox" id="doPartialRefundPaypal" name="doPartialRefundPaypal" material_design="material_design" value="1">
                                          <i class="md-checkbox-control"></i>
                                            ${chb_paypal_refund}
                                        </label>
                                    </div>
                                </div>
                         </div>`;

                $('.refund-checkboxes-container').prepend(newCheckBox);
            }
        });
    });
  
<?php echo '</script'; ?>
>
<?php }
}
