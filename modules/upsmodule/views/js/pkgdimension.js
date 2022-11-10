/**
 * _USER_TECHNICAL_AGREEMENT
 *
 * @category  UPS eCommerce Integrations
 * @package   UPS Shipping and UPS Access Point™ : Official Extension for OpenCart
 * @author    United Parcel Service of America, Inc.
 * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved
 * @license   This work is Licensed under the License and Data Service Terms available
 * at: https://www.ups.com/assets/resources/media/ups-license-and-data-service-terms.pdf
 * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page
 */

$(document).ready(
    function () {
        packing_algorithm ();
        $('#default_package_radio').click(
            function () {
                if ($(this).is(':checked')) {
                    $('.default-package-option .show-hide').removeClass("hidden");
                    $('.product-dimension-option .show-hide').addClass("hidden");
                    $('#product_dimension input').each(function () {
                        $(this).removeClass("has-error");
                    });
                    $('#backup_rate input').each(function () {
                        $(this).removeClass("has-error");
                    });
                    $('.validate-form-label').hide();
                }
               
            }
           
        );

        $('#product_dimension_radio').click(
            function () {
                if ($(this).is(':checked')) {
                    $('.product-dimension-option .show-hide').removeClass("hidden");
                    $('.default-package-option .show-hide').addClass("hidden");
                    $('#default_package input').each(function () {
                        $(this).removeClass("has-error");
                    });
                    $('.validate-form-label').hide();
                }
            }
        );
        
        $('#pack_algorithm').change(
            function () {
                packing_algorithm();
                
            }
        );
        
        $('input[name="package_setting_option"]').each(function () {
            if ($(this).is(':checked')) {
                $(this).closest('div').find('.show-hide').each(function () {
                    $(this).removeClass("hidden");
                })
            } else {
                $(this).closest('div').find('.show-hide').each(function () {
                    $(this).addClass("hidden");
                })
            }
        });

        var packageSettingOption = $("input[name='package_setting_option']:checked").val();

        $("input[name='package_setting_option']").change(function(){
            packageSettingOption = $(this).val();
        });

        $('.add-row').click (function () {
            var divId = $(this).attr('id').replace('add_row_', '');
            addInputRow(divId);
        });

        function addInputRow(divId) {
            if (divId !== 'default_package' && divId !== 'product_dimension' && divId !== 'backup_rate') {
                return;
            }
            // Get row new id
            var rowIds = [];
            var divElm = $('#' + divId);
            var rowIdPattern = divId + '_';
            divElm.find('.input-row').each(function () {
                rowIds.push(parseInt($(this).attr('id').replace(rowIdPattern, '')));
            });
            // Sort array id descending
            rowIds.sort(function(a, b){return b - a});
            var oldId = rowIds[0];
            var newId = oldId + 1;
            // Create new row
            var oldRow = $('#' + rowIdPattern + oldId);
            var newRow = $('<div class="row input-row" id="' + rowIdPattern + newId + '">' + oldRow.html() + '</div>');
            newRow.find('input, select').each(function () {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(oldId.toString(), newId.toString());
                $(this).attr('name', newName);
            });
            newRow.find('input').each(function () {
                $(this).val('');
            });
            newRow.find('select').each(function () {
                $(this).prop("selectedIndex", 0);
            });
            newRow.find('p').remove();
            newRow.find('.hidden').removeClass('hidden');
            newRow.find('.has-error').removeClass('has-error');
            divElm.append(newRow);
        }

        $('#btn_package_save').click(function () {
            $("input[name='btn_package']").val('save');
            validatePackageDimension();
        });

        $('#btn_package_next').click(function () {
            $("input[name='btn_package']").val('next');
            validatePackageDimension();
        });

        function validatePackageDimension() {
            if (packageSettingOption != 1 && packageSettingOption != 2) {
                return;
            }
            var pack_algo_selected = $("#pack_algorithm").val();
            var result = {};
            result.check = true;
            result.arrItems = [];
            result.arrItemNames = [];
            result.message = {
                error:{},
                warning:{}
            };
            if (packageSettingOption == 1) {
                $('#default_package').find('.input-row').each( function () {
                    var packageId = $(this).attr('id');
                    checkPackageDimWeight('default_package', packageId, result);
                });
            } else if((packageSettingOption == 2) && (pack_algo_selected == 2)){
                packageValidation.validateWeight("#max_weight", "#weig_unit", result);
            } else {
                $('#product_dimension').find('.input-row').each( function () {
                    var packageId = $(this).attr('id');
                    checkPackageDimWeight('product_dimension', packageId, result);
                });
                checkBackupRate(result);
            }
            if (Object.keys(result.message.error).length > 0) {
                var msgError = Object.values(result.message.error).join('<br/>');
                popupValidate.showMessage(msgError);
            } else if (Object.keys(result.message.warning).length > 0) {
                var msgWarning = Object.values(result.message.warning).join('<br/>');
                //show popup confirm warning
                $("#popup-text-warning").html(msgWarning);
                $("#popup-warning").modal();
                $("#btn_confirm_ok").click(function () {
                    $("#popup-warning").modal("hide");
                    $('#add-package-dimension').submit();
                });
            } else {
                $(this).prop('disabled', true);
                popupValidate.showMessage('', false);
                $('#add-package-dimension').submit();
            }
        }
    }
);

$(document).on('click', '.btn-minus', function () {
        $(this).parents('.input-row').remove();
    }
);

$(document).on('change', 'input[type="text"]', function () {
        this.value = $.trim(this.value);
    }
);

$(document).on('click', '#fallback_rate input, #fallback_rate select, #product_dimension input, #default_package input', function () {
    $(this).removeClass('has-error has-warning');
});

function checkPackageDimWeight(prefix, packageId, result) {
    // Define html element
    var packageId       = '#' + packageId;
    var id              = packageId.replace('#' + prefix + '_', '');
    // Check valid number of item in order
    if (prefix == 'default_package') {
        var numberOfItemElm = "input[name='" + prefix + "[" + id + "][number_of_item]']";
        packageValidation.validateNumberOfItem(numberOfItemElm, result);
    }
    if (prefix == 'product_dimension') {
        var packageNameElm  = "input[name='" + prefix + "[" + id + "][package_name]']";
        packageValidation.validatePackageName(packageNameElm, result);
    }
    // Check valid dimension
    var lengthElm       = "input[name='" + prefix + "[" + id + "][length]']";
    var widthElm        = "input[name='" + prefix + "[" + id + "][width]']";
    var heightElm       = "input[name='" + prefix + "[" + id + "][height]']";
    var dimUnitElm      = "select[name='" + prefix + "[" + id + "][unit_dimension]']";
    packageValidation.validateDimension(lengthElm, widthElm, heightElm, dimUnitElm, result);
    // Check valid weight
    var weightElm       = "input[name='" + prefix + "[" + id + "][weight]']";
    var weightUnitElm   = "select[name='" + prefix + "[" + id + "][unit_weight]']";
    packageValidation.validateWeight(weightElm, weightUnitElm, result);
}

function packing_algorithm () {
    var packaging = $('#pack_algorithm').find(":selected").val();
    if (packaging == '2') {   
        $('#form_packitem').hide();
        $('#form_box_packing').hide();
        $('#form_pack_weight_based').show();
        $('#form_weight_based').show();
    }
    if (packaging == '1') {   
        $('#form_packitem').show();
        $('#form_pack_weight_based').show();
        $('#form_box_packing').hide();
        $('#form_weight_based').hide();
    }
    if (packaging == '3') {   
        $('#form_packitem').hide();
        $('#form_pack_weight_based').hide();
        $('#form_box_packing').show();
        $('#form_weight_based').hide();
    }
}

function checkBackupRate(result) {
    var checkServiceId = true;
    var checkRate = true;
    var serviceIds = [];
    $('#backup_rate').find('select').each(function () {
        var serviceId = $(this).val();
        if (serviceIds.includes(serviceId)) {
            checkServiceId = false;
            $(this).addClass('has-error');
        } else {
            $(this).removeClass('has-error');
        }
        serviceIds.push(serviceId);
    });
    $('#backup_rate').find('input').each(function () {
        checkRate = popupValidate.checkPackageValue($(this).val(), 0, 9999.99, 3);
        if (checkRate == false) {
            $(this).addClass('has-error');
        } else {
            $(this).removeClass('has-error');
        }
    });
    if (checkServiceId === false || checkRate === false) {
        result.check = false;
        result.message.error.gtextError = gtextError;
    } else {
        result.check = true;
    }
}
