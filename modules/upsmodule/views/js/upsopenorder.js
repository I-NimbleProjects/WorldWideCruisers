/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

$(document).ready(function() {
    var arrSelected = $('.noborder:checkbox:checked');
    var arrOpenOrderID = [];
    var numberPackageString = '';

    $("#createdShipment").val(1);
    $("#clickedEstimate").val(1);
    $(".dropdown-menu li").last().remove("li");
    $(".dropdown-menu .divider").remove("li");
    $(".filter").addClass("hidden");

    disableButtons();

    $("#btnAddPackageRow").click(function () {
        var html = $(".package-row").html();
        var addPackage = $('<div class="form-group row package-row">' + html + '</div>');
        addPackage.find('.btn-remove-row').removeClass('hidden');
        addPackage.find('.custom-package').addClass('hidden');
        $("#package").append(addPackage);
        loadAutoIncrement();
        }
    );

    function loadAutoIncrement()
    {
        $(document).find('.label-auto-increment').each(
            function (index) {
                $(this).find('o').html(index+1);
            }
        );
    }

    $("#estimation").click(function(e) {
        estimateEvent(e);
    });

    if (countRow > 1)
    {
        $(".noborder").click(function() {
            if (arrSelected.length > 0)
            {
                enableButtons();
            }

            $("input:checkbox[class=noborder]:checked").each(function() {
                arrOpenOrderID.push($(this).val());
            });

            if (arrOpenOrderID)
            {
                numberPackageString = arrOpenOrderID.toString();
            }

            $.ajax({
                type: 'POST',
                url: 'index.php?controller=AdminUpsOpenOrders',
                data: {
                    token: token,
                    ajax: true,
                    action: 'ExportOpenOrder',
                    orderID: numberPackageString,
                },
                dataType: 'json',
                success: function(resp,textStatus,jqXHR) {
                    $("#allOrderID").val(resp);
                }
            });
        });

        // Event click Select All and Export Shipment
        $(".dropdown-menu li:first-child").on("click", function() {
            showButtons($('.noborder:checkbox:checked'));

            $("input:checkbox[class=noborder]:checked").each(function() {
                arrOpenOrderID.push($(this).val());
            });

            if (arrOpenOrderID)
            {
                numberPackageString = arrOpenOrderID.toString();
            }

            $.ajax({
                type: 'POST',
                url: 'index.php?controller=AdminUpsOpenOrders',
                data: {
                    token: token,
                    ajax: true,
                    action: 'ExportOpenOrder',
                    orderID: numberPackageString,
                },
                dataType: 'json',
                success: function(resp,textStatus,jqXHR) {

                }
            });
        })

        // Event click Unselect All
        $(".dropdown-menu li:nth-child(2)").on("click", function(){
            showButtons($('.noborder:checkbox:checked'));
        });
    }
    else if (countRow == 0)
    {
        disableButtonCreateShipment();
        $("#page-header-desc-order-archive_orders").removeAttr("onclick");
    }
    else if (countRow == 1)
    {
        enableButtons();
        $("#page-header-desc-order-export_open_orders").attr("href", getExportUrl);

        $.ajax({
            type: 'POST',
            url: 'index.php?controller=AdminUpsOpenOrders',
            data: {
                token: token,
                ajax: true,
                action: 'ExportOpenOrder',
                orderID: orderID,
            },
            dataType: 'json',
            success: function(resp,textStatus,jqXHR)
            {

            }
        });
    }
});

$(document).on("change", ".select-package-option", function () {
        var packageRow = $(this).parents('.package-row');
        packageRow.find('input').removeClass('has-error');
        if (this.value == 'custom_package') {
            packageRow.find('.custom-package').removeClass('hidden');
        } else {
            packageRow.find('.custom-package').addClass('hidden');
            packageRow.find('input').val('');
        }
    }
);

$(document).on('click', '.btn-remove-row', function () {
        $(this).parents(".package-row").remove();
    }
);

function showViewOpenOrderModal(val)
{
    $(".reset-content").html('');

    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'GetOrdersByIds',
            orderIds: val,
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            // Have to show error message here
            // if (!Array.isArray(resp)) {
            //     return false;
            // }

            // if (resp.length <= 0) {
            //     return false;
            // }

            var order = resp.firstOrder;
            var shipTo = resp.shipTo[0];

            $("#orderId").html(order.id_order);
            $("#orderDate").html(order.order_date);
            $("#orderTime").html(order.order_time);
            $("#firstName").html(order.firstname);
            $("#lastName").html(order.lastname);
            $(".product").html(order.products);

            var totalValue = Number(order.total_paid).toFixed(2);

            $("#accessorialService").html(resp.accessorials);

            if (resp.serviceType == 'AP')
            {
                $("#accessPointName").html(shipTo.name);
                $("#toAPAddress").html(formatAddress(shipTo));

                var orderAddress = {};

                orderAddress['addressLine1'] = order.address_delivery1;
                orderAddress['addressLine2'] = order.address_delivery2;
                orderAddress['city'] = order.city;
                orderAddress['postcode'] = order.postcode;
                orderAddress['country'] = order.country_name;
                orderAddress['state'] = order.state_name;

                $("#toHomeAddress").html(formatAddress(orderAddress));
            }
            else
            {
                $("#toHomeAddress").html(formatAddress(shipTo));
            }

            $("#phone").html(shipTo.phone);
            $("#email").html(shipTo.email);
            $("#detailShippingService").html(resp.shippingService);
            $("#orderValue").html(resp.currency + ' ' + totalValue);
            $("#currentState").html(resp.currentState);

            $("#modalViewDetail").modal("show");
        }
    });
}

function archiveOrders()
{
    // var textWarning = '';

    // $.ajax({
    //     type: 'POST',
    //     url: 'index.php?controller=AdminUpsOpenOrders',
    //     data: {
    //         token: token,
    //         ajax: true,
    //         action: 'GetText',
    //     },
    //     dataType: 'json',
    //     success : function(resp, textStatus, jqXHR)
    //     {
            // textWarning = resp;
            if (countRow > 1)
            {
                var arrOrderID = [];
                var numberPackageString = '';

                $("input:checkbox[class=noborder]:checked").each(function(){
                    arrOrderID.push($(this).val());
                });

                if (arrOrderID)
                {
                    numberPackageString = arrOrderID.toString();
                }

                if (numberPackageString)
                {
                    // if (confirm(textWarning))
                    // {
                        $.ajax({
                            type: 'POST',
                            url: 'index.php?controller=AdminUpsOpenOrders',
                            data: {
                                token: token,
                                ajax: true,
                                action: 'ArchiveOrders',
                                orderID: numberPackageString,
                            },
                            dataType: 'json',
                            success : function(resp, textStatus, jqXHR)
                            {
                                location.reload();
                            }
                        });
                    // }
                }
            }
            else if (countRow == 1)
            {
                var id_order = orderID;

                // if (confirm(textWarning))
                // {
                    $.ajax({
                        type: 'POST',
                        url: 'index.php?controller=AdminUpsOpenOrders',
                        data: {
                            token: token,
                            ajax: true,
                            action: 'ArchiveOrders',
                            orderID: id_order,
                        },
                        dataType: 'json',
                        success : function(resp, textStatus, jqXHR)
                        {
                            location.reload();
                        }
                    });
                // }
            }
        // }

    // });
}

function deletePackage(numberPackage)
{
    $("#package" + numberPackage).remove();
    $("#customPackage" + numberPackage).remove();
}

function addState(stateDefautl)
{
    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'GetState',
            countryID: $("#shipmentCountryEditAddress").val()
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            var listStateHtml = '';
            var listState = '';
			var len = $.map(resp, function(n, i) { return i; }).length;
            if (typeof resp != "undefined" && resp != null && len > 0)
            {
                $.each(resp, function(key, value) {
                    if (typeof stateDefautl != "undefined" && stateDefautl != null && stateDefautl.trim() == value.trim())
                    {
                        listState += '<option selected value="' + key + '">' + value + '</option>';
                    }
                    else
                    {
                        listState += '<option value="' + key + '">' + value + '</option>';
                    }

                });

                listStateHtml = '<div class="row addressPadding">'
                    + '<label class="control-label col-lg-5">' + txtOpenState + '</label>'
                    + '<div class="col-lg-7">'
                    + '<select class="ups-form-control form-control" id="listStateShipment">'
                        + listState
                    + '</select>'
                        + '</div>'
                    + '</div>';
                $("#selectionListState").html(listStateHtml);
            }
            else
            {
                listStateHtml = '';
                $("#selectionListState").html(listStateHtml);
            }
        }
    });
}

function showEditShipmentModal()
{
    var radioAddressValue = $("input[name='batchShipTo']:checked").val();

    if (!$(".alert-danger").hasClass('hidden'))
    {
        $(".alert-danger").addClass('hidden');
    }

    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'GetOrdersByIds',
            orderIds: $("#orderID").val(),
            selectedAddress: radioAddressValue,
            wannaEdit: true
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            var radioChecked = '';
            var order = resp;
            var shipmentShippingServiceHtml = '<div class="col-lg-8">';
            $("#editShipment").addClass('hidden');
            $("#cancelEditShipment").removeClass('hidden');
            $('.accessorial-description').parent().hide();

            if (order.serviceType == 'AP')
            {
                $("#txtScreen").val('1');
                shipmentShippingServiceHtml += order.serviceTypeName + '<br/>';
                $("#editShipmentButton").html('');
            } else {
                $("#txtScreen").val('2');
                shipmentShippingServiceHtml += order.serviceTypeName + '<br />';

                // Edit Merger Shipment
                if (radioAddressValue)
                {
                    order.address_title     = order.addOrderSelected.address_title;
                    order.address_delivery1 = order.addOrderSelected.address_delivery1;
                    order.address_delivery2 = order.addOrderSelected.address_delivery2;
                    order.address_delivery3 = order.addOrderSelected.address_delivery3;
                    order.postcode          = order.addOrderSelected.postcode;
                    order.city              = order.addOrderSelected.city;
                    order.phone             = order.addOrderSelected.phone;
                    order.email             = order.addOrderSelected.email;
                    order.country_name      = order.addOrderSelected.country;
                    order.state_name        = order.addOrderSelected.state;
                } else {
                    order.state_name        = order.shipTo[0].state;
                }

                var listShipToCountry = generateCbCountries(order);
                var addressShippingChange = generateFormAddress(order.firstOrder, listShipToCountry, order.ttlAddress);

                $("#shipToAddress").html(addressShippingChange);

            }

            $.each(order.listShippingService, function(serviceKey, serviceName) {
                    if (serviceKey === order.firstOrder.shipping_service) { // UPS_SP_SERV_UK_ADD_WW_EXPRESS_PLUS
                        radioChecked = 'checked';
                    } else {
                        radioChecked = '';
                    }
                    shipmentShippingServiceHtml +=
                        '<input name="shippingServiceSingleNames" '
                        + radioChecked +
                        ' value="'
                        + serviceKey +
                        '" type="radio"> '
                        + serviceName +
                        '<br />';
                shipmentShippingServiceHtml += '';
            });
            shipmentShippingServiceHtml += '</div>';
            $("#shippingService").html(shipmentShippingServiceHtml);

            // add state select box when load popup
            if (typeof order.state_name != "undefined" && order.state_name != null)
            {
                addState(order.state_name);
            }

            generateAccessorials(order);
            switcherOptions();

            //checked and disable accessorial saturday delivery
            var service_key = $('input[name="shippingServiceSingleNames"]:checked').val();
            if (service_key.includes("SATDELI")) {
                $('input[value="UPS_ACSRL_STATURDAY_DELIVERY"]').prop("disabled", true);
            }
        }
    });
}

function generateAccessorials(order)
{
    var accessorialsHtml = '';
    if (order.listAccessorialService)
    {
        $.each(order.listAccessorialService, function(key, serviceAccessorial) {
            var checkedAccessorial = '';
            if ($.inArray(key.trim(), order.default_accessorials_service) !== -1)
            {
                checkedAccessorial = 'checked = "checked"';
            }
            if (order.isUSA) {
                switch (key) {
                case 'UPS_ACSRL_ADDITIONAL_HADING':
                    accessorialsHtml += '<input name="accessorialServicesNames" ' + checkedAccessorial + ' value="'+ key +'" id="'+ key +'" type="checkbox">' + ' ' + '<label class="control-label"><span data-toggle="tooltip" class="label-tooltip" title="' + order.tipAdditionalHandling + '" data-placement="top" data-html="true">' + serviceAccessorial + '</span></label>' +'<br />';
                    break;
                case 'UPS_ACSRL_RESIDENTIAL_ADDRESS':
                    accessorialsHtml += '<input name="accessorialServicesNames" ' + checkedAccessorial + ' value="'+ key +'" id="'+ key +'" type="checkbox">' + ' ' + '<label class="control-label"><span data-toggle="tooltip" class="label-tooltip" title="' + order.tipResidentialAddress + '" data-placement="top" data-html="true">' + serviceAccessorial + '</span></label>' +'<br />';
                    break;
                case 'UPS_ACSRL_TO_HOME_COD':
                    accessorialsHtml += '<input name="accessorialServicesNames" ' + checkedAccessorial + ' value="'+ key +'" id="'+ key +'" type="checkbox">' + ' ' + '<label class="control-label"><span data-toggle="tooltip" class="label-tooltip" title="' + order.txtTooltipToHomeCOD + '" data-placement="top" data-html="true">' + serviceAccessorial + '</span></label>' +'<br />';
                    break;
                default:
                    accessorialsHtml += '<input name="accessorialServicesNames" ' + checkedAccessorial + ' value="'+ key +'" id="'+ key +'" type="checkbox">' + ' ' + serviceAccessorial +'<br />';
                }
            } else {
                accessorialsHtml += '<input name="accessorialServicesNames" ' + checkedAccessorial + ' value="'+ key +'" id="'+ key +'" type="checkbox">' + ' ' + serviceAccessorial +'<br />';
            }
        });
    }

    $("#shipCode").html(accessorialsHtml);
    $('[data-toggle="tooltip"]').tooltip();
}

function switcherOptions()
{
    $("#UPS_ACSRL_SIGNATURE_REQUIRED").click(function()
    {
        if ($("#UPS_ACSRL_ADULT_SIG_REQUIRED").prop( "checked" ))
        {
            $("#UPS_ACSRL_ADULT_SIG_REQUIRED").prop( "checked", false );
        }
    });

    $("#UPS_ACSRL_ADULT_SIG_REQUIRED").click(function()
    {
        if ($("#UPS_ACSRL_SIGNATURE_REQUIRED").prop( "checked" ))
        {
            $("#UPS_ACSRL_SIGNATURE_REQUIRED").prop( "checked", false );
        }
    });
}

function generateCbCountries(order)
{
    var optCountry = '';
    $.each(order.listCountry, function(keyCountry, countryName) {
        if (order.firstOrder.country_name.trim() == countryName.trim())
        {
            optCountry += '<option selected value="' + keyCountry + '">' + countryName + '</option>';
        }
        else
        {
            optCountry += '<option value="' + keyCountry + '">' + countryName + '</option>';
        }
    });
    return optCountry;
}

function generateFormAddress(order, listShipToCountry, ttlAddress)
{
    return '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenName + '</label>'
    + '<div class="col-lg-7"><input class="ups-form-control form-control" id="shipToNameEditAddress" type="text" value="' + ttlAddress + '" maxlength="50"></div>'
    + '</div>'
    + '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenAddress + '</label>' + '<div class="col-lg-7">'
        + '<p><input class="ups-form-control form-control" id="shipToEditAddressDelivery" type="text" maxlength="50" value="' + ((order.address_delivery1) ? order.address_delivery1 : '') + '"></p>'
            + '<p><input class="ups-form-control form-control" id="shipToEditAddressDelivery2" type="text" maxlength="50" value="' + ((order.address_delivery2) ? order.address_delivery2 : '') + '" ></p>'
            + '<p class="mb-0"><input class="ups-form-control form-control" id="shipToEditAddressDelivery3" type="text" maxlength="50" value="' + ((order.address_delivery3) ? order.address_delivery3 : '') + '"></p>'
            + '</div>'
        + '</div>'
    + '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenPostalCode + '</label>'
        + '<div class="col-lg-7"><input class="ups-form-control form-control" id="postalCodeEditAddress" type="text" value="' + ((order.postcode)? order.postcode : '') + '"></div></div>'
    + '<div class="row addressPadding"><label class="control-label col-lg-5">' + txtOpenCity + '</label>'
        + '<div class="col-lg-7"><input class="ups-form-control form-control" id="shipmentCityEditAddress" type="text" value="' + ((order.city) ? order.city : '') + '" maxlength="100"></div>'
        + '</div>'
        + '<div id="selectionListState"></div>'
    + '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenCountry + '</label>'
        + '<div class="col-lg-7">'
        + '<select class="ups-form-control form-control" id="shipmentCountryEditAddress" onchange="addState();">'
            + listShipToCountry
                + '</select>'
            + '</div>'
        + '</div>'
    + '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenPhone + '</label>'
        + '<div class="col-lg-7"><input class="ups-form-control form-control" id="shipPhoneEditAddress" type="text" maxlength="15" value="' + ((order.phone) ? order.phone :'') + '"></div>'
        + '</div>'
    + '<div class="row addressPadding">'
    + '<label class="control-label col-lg-5">' + txtOpenMail + '</label>'
        + '<div class="col-lg-7"><input class="ups-form-control form-control" id="shipEmailEditAddress" type="text" maxlength="100" value="' + ((order.email) ? order.email: '') + '"></div>'
        + '</div>'
        + '<p class="noteLabel">' + txtOpenNote + '</p>'
}

// cancel editing
function cancelEditShipment()
{
	$('.accessorial-description').parent().show();
    $("#modalSingleShipment").modal("hide");
}

// create shipment
function createSingleShipment()
{
    if ($("#createdShipment").val() == 1)
    {
        document.getElementById("createdShipment").disabled = true;

        $("#createdShipment").val(0);
        // if there is error alert before then remove it.
        if (!$(".alert-danger").hasClass('hidden'))
            $(".alert-danger").addClass('hidden');
        var createScreen = $("#txtScreen").val()*1;
        var listShippingServices = '';
        var listAccessorialServices = [];
        var listError = [];
        var shipToAddress = {};
        if (createScreen == 1 || createScreen == 2)
        {
            var radioShippingServiceSingleValue = $("input[name='shippingServiceSingleNames']:checked"). val();
            if (radioShippingServiceSingleValue)
            {
                listShippingServices = radioShippingServiceSingleValue;
            }
            else
            {
                listError.push(txtE_ShippingMethod);
            }

            $("input:checkbox[name=accessorialServicesNames]:checked").each(function () {
                listAccessorialServices.push($(this).val());
            });
        }
        if (createScreen == 2 || createScreen == 4)
        {
            // ship to name
            var shipToName = $("#shipToNameEditAddress").val();
            shipToName = shipToName.trim();
            if (!shipToName)
            {
                listError.push(name_empty);
            }
            else
            {
                shipToAddress['name'] = shipToName;
            }
            // ship to address
            var shipToAddress1 = $("#shipToEditAddressDelivery").val();
            shipToAddress1 = shipToAddress1.trim();
            if (!shipToAddress1)
            {
                listError.push(txtAddressRequired);
            }
            else
            {
                shipToAddress['shipToAddress1'] = shipToAddress1;
            }

            // ship to address 2
            var shipToAddress2 = $("#shipToEditAddressDelivery2").val();
            shipToAddress2 = shipToAddress2.trim();
            shipToAddress['shipToAddress2'] = shipToAddress2;

            // ship to address 3
            var shipToAddress3 = $("#shipToEditAddressDelivery3").val();
            shipToAddress3 = shipToAddress3.trim();
            shipToAddress['shipToAddress3'] = shipToAddress3;

            // ship to postal code
            var shipToPostalCode = $("#postalCodeEditAddress").val();
            shipToPostalCode = shipToPostalCode.trim();
            if (!shipToPostalCode)
            {
                listError.push(postal_empty_invalid);
            }
            else
            {
                shipToAddress['shipToPostalCode'] = shipToPostalCode;
            }
            // ship to city
            var shipToCity = $("#shipmentCityEditAddress").val();
            shipToCity = shipToCity.trim();
            if (!shipToCity)
            {
                listError.push(city_empty);
            }
            else
            {
                shipToAddress['shipToCity'] = shipToCity;
            }

            //ship to state
            var shipToState = $("#listStateShipment").val();
            shipToAddress['shipToState'] = shipToState;

            // ship to country
            var shipToCountry = $("#shipmentCountryEditAddress").val();
            shipToAddress['shipToCountry'] = shipToCountry;

            // ship to Phone
            var shipToPhone = $("#shipPhoneEditAddress").val();
            shipToPhone = shipToPhone.trim();
            if (!shipToPhone)
            {
                listError.push(format_phone_not_empty);
            }
            else
            {
                shipToAddress['shipToPhone'] = shipToPhone;
            }

            // ship to Email
            var shipToEmail = $("#shipEmailEditAddress").val();
            shipToEmail = shipToEmail.trim();
            if (!shipToEmail)
            {
                listError.push(email_empty);
            }
            else
            {
                shipToAddress['shipToEmail'] = shipToEmail;
            }
        }
        // merge shipment
        if (createScreen == 3 || createScreen == 1)
        {
            var selectedAddress = '';
            var radioAddressValue = $("input[name='batchShipTo']:checked").val();
            if (radioAddressValue)
            {
                selectedAddress = radioAddressValue;
            }
        }
        var shipmentToFee = $("#shipmentFeeSingle").text();
        var trackingNumberSingle = $("#shipmentTrackingNumberSingle").text();

        var shipmentPackage = getShipmentPackage();
        if (shipmentPackage == false) {
            listError.push(txtErrorMgs);
        }
        // no error
        if (listError.length == 0)
        {
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=AdminUpsOpenOrders',
                data: {
                    token: token,
                    ajax: true,
                    action: 'saveSingleShipment',
                    orderID: $("#orderID").val(),
                    allOrderID: $("#allOrderID").val(),
                    selectedAddress: selectedAddress,
                    singleShipmentAccount: $("#cmbCustomer").val(),
                    packageDetail: shipmentPackage,
                    shippingService: listShippingServices,
                    accessorialsService: listAccessorialServices,
                    shipToListAddress: JSON.stringify(shipToAddress),
                    trackingNumber: trackingNumberSingle,
                    shipmentToFee: Number(shipmentToFee.replace(/[^0-9\.-]+/g,"")),
                },
                dataType : 'json',
                success : function(resp, textStatus, jqXHR)
                {
                    if (resp.error)
                    {
                        $("#createdShipment").val(1);
                        $(".alert-danger").html(resp.error);
                        $(".alert-danger").removeClass('hidden');
                        return false;
                    }
                    else
                    {
                        $("#modalSingleShipment").modal("hide");
                        window.location.replace(resp.redirect);
                    }
                }
            });
        } else {
            var listErrorString = listError.join('<br />');
            $(".alert-danger").html(listErrorString);
            $(".alert-danger").removeClass('hidden');
            $("#createdShipment").val(1);
            return false;
        }
    }
}

function getShipmentPackage()
{
    var package = [];
    var customPackage = [];
    var checkValidPackage = true
    $('.package-row').each(
        function () {
            if ($(this).find('select[name="package_option"]').val() === "custom_package") {
                var weight = $(this).find('input[name="weight"]').val();
                var unitWeight = $(this).find('select[name="unit_weight"]').val();
                var length = $(this).find('input[name="length"]').val();
                var width = $(this).find('input[name="width"]').val();
                var height = $(this).find('input[name="height"]').val();
                var unitDimension = $(this).find('select[name="unit_dimension"]').val();
                if(validatePackage(this) == false) {
                    checkValidPackage = false;
                }
                customPackage = {
                    'length': length,
                    'width': width,
                    'height': height,
                    'unit_dimension': unitDimension,
                    'weight': weight,
                    'unit_weight': unitWeight
                };
                package.push(customPackage);
            } else {
                var key = $(this).find('select[name="package_option"]').val();
                package.push(listPackage[key]);
            };
        }
    );
    if (checkValidPackage == false) {
        return false;
    }
    return package;
}

function validatePackage(packageElm)
{
    var checkValidate = true;
    var checkItems = ['weight', 'length', 'width', 'height'];
    checkItems.forEach(function (itemName) {
        var itemElm = $(packageElm).find('input[name="' + itemName + '"]');
        var checkValidateItem = popupValidate.checkPackageValue(itemElm.val(), 0.01, 9999.99, 3);
        if (checkValidateItem == false) {
            checkValidate = false;
            itemElm.addClass('has-error');
        } else {
            itemElm.removeClass('has-error');
        }
    });
    return  checkValidate;
}

function batchShipment()
{
    document.getElementById("batchShipment").disabled = true;

    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'batchShipment',
            batchOrderIds: $("#batchOrderIds").val(),
            batchShipmentAccount: $("#upsAccount").val(),
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            var orders;
            var content = '';

            if (!Object.entries) {
                Object.entries = function( obj ){
                  var ownProps = Object.keys( obj ),
                      i = ownProps.length,
                      resArray = new Array(i); // preallocate the Array
                  while (i--)
                    resArray[i] = [ownProps[i], obj[ownProps[i]]];

                  return resArray;
                };
            }
            orders = Object.entries(resp.resultList);
            orders.forEach(function(el) {
                var result = el[1];
                content += '<li>' + result.orderId + ' ' + result.icon + ' ' + result.msg + '</li>';
            });

            $(".list-orders").html(content);
            $("#batchShipment").addClass('disabled');9
        }
    });
}

function changeCustomer()
{
    var accountNumber =  $("#cmbCustomer").val();
    if (!accountNumber)
    {
        accountNumber = $("#firstAccount").val();
    }

    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'onChangeCustomer',
            accountNumberShipment: accountNumber,
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            if (resp)
            {
                $("#shipFromName").html(resp.AccountName);
                $("#shipFrom").html(resp.shipFromAddress);
            }
        }
    });
}

function getShippingService()
{
    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'getShippingService',
            orderID: $("#orderID").val(),
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            $("#shippingService").html(resp.shippingService);
        }
    });
}

function estimateEvent(e)
{
    e.preventDefault();
    $(".alert-danger").addClass('hidden');
    $(document).ajaxStart(function() {
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function() {
        $("#wait").css("display", "none");
    });

    var getScreen = $("#txtScreen").val();
    var newAdressString = {};
    var newCountryId = '';

    if ($.inArray(getScreen, ['2','4']) !== -1)
    {
        newCountryId = $("#shipmentCountryEditAddress").val();
        newAdressString['newName'] = $("#shipToNameEditAddress").val();
        newAdressString['newAddress1'] = $("#shipToEditAddressDelivery").val();
        newAdressString['newAddress2'] = $("#shipToEditAddressDelivery2").val();
        newAdressString['newAddress3'] = $("#shipToEditAddressDelivery3").val();
        newAdressString['newPostalCode'] = $("#postalCodeEditAddress").val();
        newAdressString['newCity'] = $("#shipmentCityEditAddress").val();
        newAdressString['newCountry'] = $("#shipmentCountryEditAddress").val();
        newAdressString['newPhone'] = $("#shipPhoneEditAddress").val();
        newAdressString['newEmail'] = $("#shipEmailEditAddress").val();
        newAdressString['newState'] = $("#listStateShipment").val();
    }
    var selectedAddress = '';
    var radioAddressValue = $("input[name='batchShipTo']:checked"). val();
    if (radioAddressValue)
    {
        selectedAddress = radioAddressValue;
    }
    var listAccessorialServices = [];
    var listShippingServices = [];

    $("input:checkbox[name=accessorialServicesNames]:checked").each(function () {
        listAccessorialServices.push($(this).val());
    });


    $("input:checkbox[name=accessorialServicesNames]:checked").each(function () {
        listAccessorialServices.push($(this).val());
    });

    var radioShippingServiceSingleValue = $("input[name='shippingServiceSingleNames']:checked"). val();
    if (radioShippingServiceSingleValue)
    {
        listShippingServices = radioShippingServiceSingleValue;
    }

    var shipmentPackage = getShipmentPackage();
    if (shipmentPackage == false) {
        $(".alert-danger").html(txtErrorMgs);
        $(".alert-danger").removeClass('hidden');
        return false;
    }

    $.ajax({
        type: 'POST',
        url: 'index.php?controller=AdminUpsOpenOrders',
        data: {
            token: token,
            ajax: true,
            action: 'shipmentEstimated',
            accountNumberShipment: $("#cmbCustomer").val(),
            orderID: $("#orderID").val(),
            allOrderID: $("#allOrderID").val(),
            newAdressString: JSON.stringify(newAdressString),
            selectedAddress: selectedAddress,
            packageDetail: shipmentPackage,
            newCountryId: newCountryId,
            accessorialsService: listAccessorialServices,
            shippingService: listShippingServices,
        },
        dataType : 'json',
        success : function(resp, textStatus, jqXHR)
        {
            if (resp.error)
            {
                $(".alert-danger").html(resp.error);
                $(".alert-danger").removeClass('hidden');
            }
            else
            {
                $("#shipmentFeeSingle").html(resp.ShippingFee + " " + resp.CurrencyCode);
                $("#shipmentDateArrival").html(resp.shippingDateArrival);
                $(".alert-danger").addClass('hidden');
            }
        }
    });
}

$(document).on("change", 'input[name="shippingServiceSingleNames"]', function () {
    var value = $(this).val();
    if (value.includes("SATDELI")) {
        $('input[value="UPS_ACSRL_STATURDAY_DELIVERY"]').prop("checked", true);
        $('input[value="UPS_ACSRL_STATURDAY_DELIVERY"]').prop("disabled", true);
    } else {
        $('input[value="UPS_ACSRL_STATURDAY_DELIVERY"]').prop("disabled", false);
    }
});
