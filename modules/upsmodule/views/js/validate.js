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

//General Param
var rulePattern = {
    'alphanum': /^[a-zA-Z0-9]*$/,
    'alpha': /^[a-zA-Z]*$/,
    'name': /^[\D]*$/,
    'number': /^\s*-?\d*(\.\d*)?\s*$/,
    'numberInt': /^\d+$/,
    'numberFloat': /^\d+(\.\d{1,2})?$/,
    'email': /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
    'emailEdit': /^[\S]+\@[\S]+\.[\S]{2,3}$/,
    'phone': /^[0|\+][0-9]+/,
    'phoneEdit': /^[0|\+|(0-9)]+[\)|0-9\s\-]+/,
    'postalCode': /[0-9]{2}[\-][0-9]{3}/,
    'postalCodeEdit': /^[0-9]/,
    'accountNumber': /[A-Za-z0-9]{6}/,
    'invoiceNumber': /^[^-\s][\w\s-]+$/,
    'invoiceAmount': /^[0-9]+\.?[0-9]*$/,
    'validateNull': /^\D+$/,
    'address': /^\D+$/,
    'matchAll': /^.+$/,
    'date': /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/,
    'vatNumber': /[A-Za-z0-9]/,
    'promoNumber': /[A-Za-z0-9]/
};
var packageValidation = {
    validateNumberOfItem: function(numberOfItemElm, result) {
        $(numberOfItemElm).removeClass('has-error');
        var chkVal = $(numberOfItemElm).val();
        var check = packageValidation.checkEmpty(chkVal);
        var check_duplication = packageValidation.checkDuplication(chkVal, result.arrItems);
        if (check === true) {
            if (Math.sign(chkVal) !== 1) {
                check = false
            }
        }
        if (check === false || check_duplication === false) {
            result.check = false;
            result.message.error.gtextError = gtextError;
            $(numberOfItemElm).addClass('has-error');
        }
    },
    validatePackageName: function(packageNameElm, result) {
        $(packageNameElm).removeClass('has-error');
        var chkVal = $(packageNameElm).val();
        var check = packageValidation.checkEmpty(chkVal);
        var check_duplication = packageValidation.checkDuplication(chkVal, result.arrItemNames);
        if (check === false || check_duplication === false) {
            result.check = false;
            result.message.error.gtextError = gtextError;
            $(packageNameElm).addClass('has-error');
        }
    },
    validateDimension: function(lengthElm, widthElm, heightElm, unitElm, result) {
        // Clear error class
        $(lengthElm).removeClass('has-error');
        $(widthElm).removeClass('has-error');
        $(heightElm).removeClass('has-error');
        // Define validate variable
        var check = true;
        var checkDimensionElm = [lengthElm, widthElm, heightElm];
        // Loop dimension element
        checkDimensionElm.forEach(
            function (chkElm) {
                var chkVal = $(chkElm).val();
                // Check empty
                check = packageValidation.checkEmpty(chkVal);
                // Check range and valid number of each item
                if (check === true) {
                    check = popupValidate.checkPackageValue(chkVal, 0.01, 9999.99, 3);
                }
                if (check === false) {
                    $(chkElm).addClass('has-error');
                }
            }
        );
        if (check === false) {
            result.message.error.gtextError = gtextError;
            result.check = false;
            return;
        }
        // Define dimension value
        var length = $(lengthElm).val();
        var width = $(widthElm).val();
        var height = $(heightElm).val();
        var unit = $(unitElm).val();
        var tag;
        var checkWarning = true;
        // Check unit is chosen and validate
        switch (unit) {
            case "cm":
                var size = parseFloat(length) + 2 * parseFloat(width) + 2 * parseFloat(height);
                if (size > 330 && size <= 400) {
                    checkWarning = false;
                    result.message.warning.textWarningSize = textWarningSize;
                } else if (size > 400) {
                    check = false;
                    result.message.error.textErrorSize = textErrorSize;
                }
                break;
            case "inch":
                var check = true;
                var size = parseFloat(length) + 2 * parseFloat(width) + 2 * parseFloat(height);
                if (size > mediumSize && size <= maxSize) {
                    checkWarning = false;
                    tag = 'size';
                    result.message.warning.textWarningSize = textWarningSize;
                } else if (size > maxSize) {
                    check = false;
                    tag = 'size';
                    result.message.error.textErrorSize = textErrorSize;
                }
                if (countryCode == "US" && check) {
                    var max_side = packageValidation.getLongestSide(length, width, height);
                    if (max_side.max > mediumLength && max_side.max <= maxLength) {
                        checkWarning = false;
                        tag = max_side.tag;
                        result.message.warning.textWarningSizeExceeds = textWarningSizeExceeds;
                    } else if (max_side.max > maxLength) {
                        check = false;
                        tag = max_side.tag;
                        result.message.error.textErrorSizeExceeds = textErrorSizeExceeds;
                    }
                }
                break;
            default:
                check = false;
                result.message.error.gtextError = gtextError;
                break;
        }

        if (checkWarning === false) {
            switch (tag) {
                case "length":
                    $(lengthElm).addClass('has-warning');
                    break;
                case "width":
                    $(widthElm).addClass('has-warning');
                    break;
                case "height":
                    $(heightElm).addClass('has-warning');
                    break;
                default:
                    $(lengthElm).addClass('has-warning');
                    $(widthElm).addClass('has-warning');
                    $(heightElm).addClass('has-warning');
                    break;
            }
        }

        if (check === false) {
            result.check = false;
            switch (tag) {
                case "length":
                    $(lengthElm).addClass('has-error');
                    break;
                case "width":
                    $(widthElm).addClass('has-error');
                    break;
                case "height":
                    $(heightElm).addClass('has-error');
                    break;
                default:
                    $(lengthElm).addClass('has-error');
                    $(widthElm).addClass('has-error');
                    $(heightElm).addClass('has-error');
                    break;
            }
        }
    },
    validateWeight: function(weightElm, unitElm, result) {
        // Clear error class
        $(weightElm).removeClass('has-error');
        // Define validate variable
        var weight = $(weightElm).val();
        var unit = $(unitElm).val();
        // Check empty
        var check = packageValidation.checkEmpty(weight);
        var checkWarning = true;
        // Check range and valid number of each item
        if (check === true) {
            check = popupValidate.checkPackageValue(weight, 0.01, 9999.99, 3);
        }
        if (check === false) {
            result.message.error.gtextError = gtextError;
            result.check = false;
            $(weightElm).addClass('has-error');
            return;
        }
        switch (unit) {
            case "kgs":
                if (parseFloat(weight) > 20 && parseFloat(weight) <= 70) {
                    checkWarning = false;
                    result.message.warning.textWarningWeight = textWarningWeight;
                } else if (parseFloat(weight) > 70){
                    check = false;
                    result.message.error.textErrorWeight = textErrorWeight;
                }
                break;
            case "lbs":
                if (parseFloat(weight) > mediumWeight && parseFloat(weight) <= maxWeight) {
                    checkWarning = false;
                    result.message.warning.textWarningWeight = textWarningWeight;
                } else if (parseFloat(weight) > maxWeight) {
                    check = false;
                    result.message.error.textErrorWeight = textErrorWeight;
                }
                break;
            default:
                check = false;
                result.message.error.gtextError = gtextError;
                break;
        }
        if (checkWarning == false) {
            $(weightElm).addClass('has-warning');
        }
        if (check == false) {
            result.check = false;
            $(weightElm).addClass('has-error');
        }
    },
    getLongestSide: function(length, width, height) {
        var result = {};
        result.max = parseFloat(length);
        result.tag = "length";
        if (parseFloat(width) > result.max) {
            result.max = parseFloat(width);
            result.tag = "width";
        }
        if (parseFloat(height) > result.max) {
            result.max = parseFloat(height);
            result.tag = "width";
        }
        return result;
    },
    checkEmpty: function (chkVal) {
        if (typeof chkVal == 'undefined' ) {
            return false;
        }
        var check = 0;
        var val = chkVal.trim();
        if (val == '') {
            check += 1;
        }
        if (check > 0) {
            return false;
        }
        return true;
    },
    checkDuplication: function (chkVal, arrItem) {
        if (arrItem.indexOf(chkVal) > -1) {
            return false;
        } else {
            arrItem.push(chkVal);
        }
        return true;
    }
};

var popupValidate = {
    validation: function (string, pattern) {
        var strRegex = rulePattern[pattern];
        if (strRegex.test(string.trim())) {
            return true
        } else {
            return false;
        }
    },
    showMessage: function (msg, flg = true) {
        if (flg === true) {
            $('.error-message').show();
            $('.error-message').html('<div class="alert alert-danger">' + msg + '<button type="button" class="close" data-dismiss="alert">×</button></div>');
        } else {
            $('.error-message').hide();
        }
    },
    checkPackageValue: function (value, min, max, length) {
        var strRegex = rulePattern['number'];
        if (strRegex.test(value)) {
            if(value.indexOf('.') == -1) {
                if(parseFloat(value) >= min && parseFloat(value) <= max) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if((value.substring(value.indexOf('.')).length > length)) {
                    return false;
                } else {
                    if(parseFloat(value) >= min && parseFloat(value) <= max) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    },
    addClassError: function (cls, check) {
        if (check == false) {
            $('.' + cls).addClass('has-error');
        } else {
            $('.' + cls).removeClass('has-error');
        }
    }
};
