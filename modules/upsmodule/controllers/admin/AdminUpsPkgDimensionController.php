<?php
/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

require_once dirname(__FILE__) . '/../../common/CommonController.php';

class AdminUpsPkgDimensionController extends CommonController
{
    private $texts;
    private $medium_weight;
    private $max_weight;
    private $medium_size;
    private $max_size;
    private $medium_length;
    private $max_length;
    private $message_common_error;
    private $message_weight_warning;
    private $message_weight_error;
    private $message_size_warning;
    private $message_size_error;
    private $message_size_exceed_warning;
    private $message_size_exceed_error;

    public function __construct()
    {
        $this->bootstrap               = true;
        $this->show_form_cancel_button = false;
        $this->table                   = 'configuration';
        parent::__construct();

        $result = CommonFunction::checkScreenConfig();
        if ($result !== 'DONE' &&
            $result !== Tools::getValue('controller')) {
            Tools::redirectAdmin(Context::getContext()->link->getAdminLink($result));
        }

        $currency = Currency::getCurrencyInstance(Configuration::get('PS_CURRENCY_DEFAULT'));

        $sdk = $this->sdk;
        if ($this->module->usa()) {
            // Set weight and size check for US
            $this->medium_weight = 44;
            $this->max_weight = 150;
            $this->medium_size = 130;
            $this->max_size = 165;
            $this->medium_length = 38;
            $this->max_length = 108;
            $this->message_common_error = $this->sdk->t('err-msg', 'notValidUS');
            $this->message_weight_warning = $sdk->t('pkgdimension', 'txtWarningWeightUS');
            $this->message_weight_error = $sdk->t('pkgdimension', 'txtErrorWeightUS');
            $this->message_size_warning = $sdk->t('pkgdimension', 'txtWarningSizeUS');
            $this->message_size_error = $sdk->t('pkgdimension', 'txtErrorSizeUS');
            $this->message_size_exceed_warning = $sdk->t('pkgdimension', 'txtWarningSizeExceeds');
            $this->message_size_exceed_error = $sdk->t('pkgdimension', 'txtErrorSizeExceeds');
        } else {
            // Set weight and size check for EU (Weight: Pounds and Size: Inch)
            $this->medium_weight = 44.09;
            $this->max_weight = 154.32;
            $this->medium_size = 129.92;
            $this->max_size = 157.48;
            $this->medium_length = 100;
            $this->max_length = 100;
            $this->message_common_error = $this->sdk->t('err-msg', 'notValid');
            $this->message_weight_warning =  $sdk->t('pkgdimension', 'txtWarningWeight');
            $this->message_weight_error = $sdk->t('pkgdimension', 'txtErrorWeight');
            $this->message_size_warning = $sdk->t('pkgdimension', 'txtWarningSize');
            $this->message_size_error = $sdk->t('pkgdimension', 'txtErrorSize');
            $this->message_size_exceed_warning = '';
            $this->message_size_exceed_error = '';
        }

        $this->texts = array(
            'txtPkgDefault'              => $this->sdk->t('pkgdimension', 'txtPkgDefault'),
            'txtPkgWeightSize'           => $this->sdk->t('pkgdimension', 'txtPkgWeightSize'),
            'txtPkgDefaultOption'        => $this->sdk->t('pkgdimension', 'txtPkgDefaultOption'),
            'txtPkgDefaultOptionNote1'   => $this->sdk->t('pkgdimension', 'txtPkgDefaultOptionNote1'),
            'txtPkgDefaultOptionNote2'   => $this->sdk->t('pkgdimension', 'txtPkgDefaultOptionNote2'),
            'txtPkgAddNewPackage'        => $this->sdk->t('pkgdimension', 'txtPkgAddNewPackage'),
            'txtPkgProductOption'        => $this->sdk->t('pkgdimension', 'txtPkgProductOption'),
            'txtPkgProductOptionNote'    => $this->sdk->t('pkgdimension', 'txtPkgProductOptionNote'),
            'txtPkgBoxDimension'         => $this->sdk->t('pkgdimension', 'txtPkgBoxDimension'),
            'txtPkgAddBoxDimension'      => $this->sdk->t('pkgdimension', 'txtPkgAddBoxDimension'),
            'txtPkgBackupRate'           => $this->sdk->t('pkgdimension', 'txtPkgBackupRate'),
            'txtPkgAddBackupRate'        => $this->sdk->t('pkgdimension', 'txtPkgAddBackupRate'),
            'txtPkgBackupRateNote'       => $this->sdk->t('pkgdimension', 'txtPkgBackupRateNote'),
            'txtPkgIncludeDimension'     => $this->sdk->t('pkgdimension', 'txtPkgIncludeDimension'),
            'txtPkgIncludeDimensionNote' => $this->sdk->t('pkgdimension', 'txtPkgIncludeDimensionNote'),
            'txtPkgName'                 => $this->sdk->t('pkgdimension', 'txtPkgName'),
            'txtPkgNumberOfItem'         => $this->sdk->t('pkgdimension', 'txtPkgNumberOfItem'),
            'txtPkgServiceName'          => $this->sdk->t('pkgdimension', 'txtPkgServiceName'),
            'txtPkgRate'                 => $this->sdk->t('pkgdimension', 'txtPkgRate'),
            'txtPkgLength'               => $this->sdk->t('pkgdimension', 'txtPkgLength'),
            'txtPkgWidth'                => $this->sdk->t('pkgdimension', 'txtPkgWidth'),
            'txtPkgHeight'               => $this->sdk->t('pkgdimension', 'txtPkgHeight'),
            'txtPkgWeight'               => $this->sdk->t('pkgdimension', 'txtPkgWeight'),
            'txtPkgMaxWeight'            => $this->sdk->t('pkgdimension', 'txtPkgMaxWeight'),
            'txtPkgMaxWeight1'           => $this->sdk->t('pkgdimension', 'txtPkgMaxWeight1'),
            'txtPkgWeightUnit'           => $this->sdk->t('pkgdimension', 'txtPkgWeightUnit'),
            'txtPkgDimUnit'              => $this->sdk->t('pkgdimension', 'txtPkgDimUnit'),
            'txtPackitem'                => $this->sdk->t('pkgdimension', 'txtPackitem'),
            'txtWeightBased'             => $this->sdk->t('pkgdimension', 'txtWeightBased'),
            'txtBoxBased'                => $this->sdk->t('pkgdimension', 'txtBoxBased'),
            'txtMaxWeightNote'           => $this->sdk->t('pkgdimension', 'txtMaxWeightNote'),
            'txtCurrency'                => $this->sdk->t('ups', 'txtCurrency'),
            'selectedCurrency'           => $currency->iso_code,
            'txtArcOk'                   => $this->sdk->t('button', 'txtOk'),
            'txtYes'                     => $this->sdk->t('pkgdimension', 'txtYes'),
            'txtNo'                      => $this->sdk->t('pkgdimension', 'txtNo'),
            'btnCancel'                  => $this->sdk->t('button', 'txtCancel'),
            'txtSave'                    => $this->sdk->t('button', 'txtSave'),
            'txtNext'                    => $this->sdk->t('button', 'txtNext'),
            'ttlWarning'                 => $this->sdk->t('openorder', 'ttlWarning')
        );
    }

    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('AdminUpsPkgDimension');
    }

    public function initContent()
    {
        $checkValidate = true;
        $action = Tools::getValue('btn_package');
        if ($action == 'save' || $action == 'next') {
            $checkValidate = $this->validatePackageSetting();
            if ($checkValidate === true) {
                $this->savePackageSetting();
            }
            if ($action == 'save') {
                Tools::redirectAdmin(Context::getContext()->link->getAdminLink(Tools::getValue('controller')));
            } else {
                CommonFunction::setDoneConfigScreen(Tools::getValue('controller'));
                Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminUpsDeliveryRates'));
            }
        }
        // Get setting type
        if (Configuration::get('UPS_PKG_SETTING_TYPE')) {
            $pkgSettingOptionConfig = Configuration::get('UPS_PKG_SETTING_TYPE');
        } else {
            $pkgSettingOptionConfig = '1';
        }
        // Get setting default package
        if (Configuration::get('UPS_PKG_DEFAULT')) {
            $pkgDefault = unserialize(Configuration::get('UPS_PKG_DEFAULT'));
        } else {
            $pkgDefault = [];
            // Get old setting for package default
            if (Configuration::get('UPS_PKG_1_DIMENSION')) {
                $pkgDefaultConfig = unserialize(Configuration::get('UPS_PKG_1_DIMENSION'));
                $pkgDefault[] = [
                    'number_of_item' => '1',
                    'length' => $pkgDefaultConfig['lenght'],
                    'width' => $pkgDefaultConfig['width'],
                    'height' => $pkgDefaultConfig['height'],
                    'unit_dimension' => $pkgDefaultConfig['lenghtUnit'],
                    'weight' => $pkgDefaultConfig['weight'],
                    'unit_weight' => $pkgDefaultConfig['weightUnit']
                ];
            } else {
                $pkgDefault[] = $this->getDefaultPackageData('default_package');
            }
        }
        // Get setting product dimension
        $listProductDimension = [];
        if (Configuration::get('UPS_PKG_PRODUCT_DIMENSION')) {
            $listProductDimension = unserialize(Configuration::get('UPS_PKG_PRODUCT_DIMENSION'));
        } else {
            $listProductDimension[] = $this->getDefaultPackageData('product_dimension');
        }
        // Get setting backup rate
        $listBackupRateActive = [];
        $listServiceAddActive = [];
        $listBackupRate = [];
        if (Configuration::get('UPS_PKG_BACKUP_RATE')) {
            $listBackupRate = unserialize(Configuration::get('UPS_PKG_BACKUP_RATE'));
        }
        // Get list service Add
        $listServiceAdd = $this->module::$shippingServices->getServicesAdd();
        foreach ($listServiceAdd as $service) {
            if (Configuration::get($service['key'])) {
                $listServiceAddActive[] = $service;
                foreach ($listBackupRate as $backupRate) {
                    if ($backupRate['service_key'] == $service['key']) {
                        $listBackupRateActive[] = $backupRate;
                    }
                }
            }
        }

        if (empty($listBackupRateActive)) {
            $listBackupRateActive[] = $this->getDefaultPackageData('backup_rate');
        }
        if ($this->module->usa()) {
            $unitWeight = [
                'lbs' => $this->sdk->t('pkgdimension', 'txtPkgPounds'),
                'kgs' => $this->sdk->t('pkgdimension', 'txtPkgKg')
            ];
            $unitDimension = [
                'inch' => $this->sdk->t('pkgdimension', 'txtPkgInch'),
                'cm' => $this->sdk->t('pkgdimension', 'txtPkgCm')
            ];
        } else {
            $unitWeight = [
                'kgs' => $this->sdk->t('pkgdimension', 'txtPkgKg'),
                'lbs' => $this->sdk->t('pkgdimension', 'txtPkgPounds')
            ];
            $unitDimension = [
                'cm' => $this->sdk->t('pkgdimension', 'txtPkgCm'),
                'inch' => $this->sdk->t('pkgdimension', 'txtPkgInch')
            ];
        }
        $selected_pac_algo = Configuration::get('UPS_PKG_ALGO_TYPE');
        if (empty($selected_pac_algo)) {
            $selected_pac_algo = 3;
        }
        $max_weight = Configuration::get('UPS_PKG_MAX_WEG');
        $pack_dim_unit = Configuration::get('UPS_PKG_DIM_UNIT');
        $pack_weg_unit = Configuration::get('UPS_PKG_WEIG_UNIT');

        $data = [
            'content' => $this->texts,
            'package_setting_option' => $pkgSettingOptionConfig,
            'list_default_package' => $pkgDefault,
            'include_dimension' => Configuration::get('UPS_PKG_INCLUDE_DIMENSION'),
            'is_address_delivery' => Configuration::get('UPS_SP_SERV_ADDRESS_DELIVERY'),
            'list_product_dimension' => $listProductDimension,
            'list_backup_rate' => $listBackupRateActive,
            'list_service' => $listServiceAddActive,
            'list_unit_weight' => $unitWeight,
            'list_unit_dimension' => $unitDimension,
            'selected_pac_algo' => $selected_pac_algo,
            'pack_max_weight' => $max_weight,
            'pack_dim_unit' => $pack_dim_unit,
            'pack_weg_unit' => $pack_weg_unit
        ];
        if ($checkValidate === false) {
            $data['error'] = $this->sdk->t('pkgdimension', 'txtErrorNext');
        }
        $path = _PS_MODULE_DIR_ . $this->module->name .'/views/templates/admin/ups_pkg_dimension/pkg_dimension.tpl';

        $this->content .= $this->context->smarty->createTemplate($path, null, null, $data)->fetch();
        parent::initContent();
    }

    public function setMedia($isNewTheme = false)
    {
        Media::addJsDef(array(
            'mediumWeight' => $this->medium_weight,
            'maxWeight' => $this->max_weight,
            'mediumSize' => $this->medium_size,
            'maxSize' => $this->max_size,
            'mediumLength' => $this->medium_length,
            'maxLength' => $this->max_length,
            'gtextError' => $this->message_common_error,
            'textWarningWeight' => $this->message_weight_warning,
            'textErrorWeight' => $this->message_weight_error,
            'textWarningSize' => $this->message_size_warning,
            'textErrorSize' => $this->message_size_error,
            'textWarningSizeExceeds' => $this->message_size_exceed_warning,
            'textErrorSizeExceeds' => $this->message_size_exceed_error,
            'countryCode'        => Configuration::get('UPS_COUNTRY_SELECTED')
        ));
        parent::setMedia($isNewTheme);
//        $this->addJS(_PS_MODULE_DIR_ . $this->module->name . '/views/js/upspkgdimension.js');
        $this->addJS(_PS_MODULE_DIR_ . $this->module->name . '/views/js/pkgdimension.js');
        $this->addJS(_PS_MODULE_DIR_ . $this->module->name . '/views/js/validate.js');
        $this->addCSS(_PS_MODULE_DIR_ . $this->module->name . '/views/css/upspkgdimension.css');
    }

    private function savePackageSetting()
    {
        $pkgSettingOption = Tools::getValue('package_setting_option');
        $sel_pack_algo = Tools::getValue('pack_algorithm');
        $checkValidate = $this->validatePackageSetting();
        if ($checkValidate === true) {
            Configuration::updateValue('UPS_PKG_SETTING_TYPE', $pkgSettingOption);
            Configuration::updateValue('UPS_PKG_ALGO_TYPE', $sel_pack_algo);
            if ($pkgSettingOption == 1) {
                Configuration::updateValue('UPS_PKG_DEFAULT', serialize(Tools::getValue('default_package')));
                $listDefaultPackage = [];
                $nameIndex = 1;
                foreach (Tools::getValue('default_package') as $package) {
                    $defaultPackage = [];
                    $defaultPackage['merchantKey'] = Configuration::get('MERCHANT_KEY');
                    $defaultPackage['name'] = 'Package_' . $nameIndex;
                    $defaultPackage['weight'] = $package['weight'];
                    $defaultPackage['weightUnit'] = $package['unit_weight'] == 'kgs' ? 'Kg' : 'Pounds';
                    $defaultPackage['length'] = $package['length'];
                    $defaultPackage['width'] = $package['width'];
                    $defaultPackage['height'] = $package['height'];
                    $defaultPackage['dimensionUnit'] = $package['unit_dimension'];
                    $defaultPackage['packageItem'] = $package['number_of_item'];
                    $nameIndex++;
                    $listDefaultPackage[] = $defaultPackage;
                }
                $this->transferDefaultPackage($listDefaultPackage);
            } elseif(($pkgSettingOption == 2) && !empty($sel_pack_algo) && ($sel_pack_algo != 3)) {
                if($sel_pack_algo == 2){    //weight based
                    Configuration::updateValue('UPS_PKG_WEIG_UNIT',Tools::getValue('weig_unit'));
                    Configuration::updateValue('UPS_PKG_MAX_WEG', Tools::getValue('max_weight'));

                } else {    //individual
                    Configuration::updateValue('UPS_PKG_DIM_UNIT', Tools::getValue('dim_unit'));
                    Configuration::updateValue('UPS_PKG_WEIG_UNIT', Tools::getValue('weig_unit'));

                }
            } elseif ($pkgSettingOption == 2) {
                Configuration::updateValue('UPS_PKG_INCLUDE_DIMENSION', Tools::getValue('include_dimension'));
                Configuration::updateValue('UPS_PKG_BACKUP_RATE', serialize(Tools::getValue('backup_rate')));
                Configuration::updateValue('UPS_PKG_PRODUCT_DIMENSION', serialize(Tools::getValue('product_dimension')));
                $listBackupRate = [];
                foreach (Tools::getValue('backup_rate') as $backupRate) {
                    $backupRateItem = [];
                    $backupRateItem['serviceKey'] = $backupRate['service_key'];
                    $backupRateItem['rate'] = (float)$backupRate['rate'];
                    $listBackupRate[] = $backupRateItem;
                }
                /*$listBoxDimension = [];
                foreach (Tools::getValue('product_dimension') as $package) {
                    $boxDimension = [];
                    $boxDimension['name'] = $package['package_name'];
                    $boxDimension['weight'] = (float) $package['weight'];   
                    $boxDimension['weightUnit'] = $package['unit_weight'] == 'kgs' ? 'Kg' : 'Pounds';
                    $boxDimension['length'] = (float) $package['length'];
                    $boxDimension['width'] = (float) $package['width'];
                    $boxDimension['height'] = (float) $package['height'];
                    $boxDimension['dimensionUnit'] = (float) $package['unit_dimension'];
                    $listBoxDimension[] = $boxDimension;
                }*/
                $this->transferDefaultPackageRate([
                    'merchantKey' => Configuration::get('MERCHANT_KEY'),
                    'includeDimensionsInRating' => (int)Tools::getValue('include_dimension'),
                    'backupRate' => $listBackupRate,
                    //'boxDimension' => $listBoxDimension
                ]);
            }
        }
    }
    /**
     * validatePackageSetting
     *
     * @return boolean
     */
    private function validatePackageSetting()
    {
        $checkValidate = true;
        $pkgSettingOption = Tools::getValue('package_setting_option');
        if ($pkgSettingOption == 1) {
            // Validate default package
            foreach (Tools::getValue('default_package') as $defaultPackage) {
                $validateRow = $this->validatePackageItem($defaultPackage);
                if ($validateRow == false) {
                    $checkValidate = false;
                }
            }
        } elseif ($pkgSettingOption == 2) {
            $sel_pack_algo = Tools::getValue('pack_algorithm');
            if ($sel_pack_algo == 2) {
                $max_weight = Tools::getValue('max_weight');
                if(!empty($max_weight) && $max_weight > 0){
                    $checkValidate = true;
                } else {
                    $checkValidate = false;
                }
            } else {
                // Validate product dimension
                foreach (Tools::getValue('product_dimension') as $productDimension) {
                    $validateRow = $this->validatePackageItem($productDimension);
                    if ($validateRow == false) {
                        $checkValidate = false;
                    }
                }
            }
            // Validate backup rate
            $listServiceId = [];
            foreach (Tools::getValue('backup_rate') as $backupRate) {
                if (in_array($backupRate['service_key'], $listServiceId)) {
                    $checkValidate = false;
                }
                $checkRow = $this->validateBackupRateItem($backupRate['rate']);
                if ($checkRow == false) {
                    $checkValidate = false;
                }
                $listServiceId[] = $backupRate['service_key'];
            }
        } else {
            $checkValidate = false;
        }
        return $checkValidate;
    }

    /**
     * getDefaultPackageData
     *
     * @param string $key // key
     * @return array
     */
    private function getDefaultPackageData($key)
    {
        $defaultData = [];
        switch ($key) {
            case 'default_package':
                $defaultData = [
                    'number_of_item' => '',
                    'length' => '0',
                    'width' => '0',
                    'height' => '0',
                    'unit_dimension' => '',
                    'weight' => '0',
                    'unit_weight' => ''
                ];
                break;
            case 'product_dimension':
                $defaultData = [
                    'package_name' => '',
                    'length' => '0',
                    'width' => '0',
                    'height' => '0',
                    'unit_dimension' => '',
                    'weight' => '0',
                    'unit_weight' => ''
                ];
                break;
            case 'backup_rate':
                $defaultData = [
                    'service_key' => '',
                    'rate' => '0'
                ];
                break;
        }
        return $defaultData;
    }

    /**
     *  checkPackageWeight
     *
     * @param object $data //The data
     * @return object
     */
    private function checkPackageWeight($data)
    {
        $check = true;
        $message = $this->message_common_error;
        $medium_weight = $this->medium_weight;
        $max_weight = $this->max_weight;
        $message_weight_warning = $this->message_weight_warning;
        $message_weight_error = $this->message_weight_error;

        switch ($data->unit_weight) {
            case "kgs":
                if ((float)$data->weight <= 20) {
                    $message = "";
                } elseif ((float)$data->weight > 20 && (float)$data->weight <= 70) {
                    $message = $message_weight_warning;
                } else {
                    $check = false;
                    $message = $message_weight_error;
                }
                break;
            case "lbs":
                if ((float)$data->weight <= $medium_weight) {
                    $message = "";
                } elseif ((float)$data->weight > $medium_weight && (float)$data->weight <= $max_weight) {
                    $message = $message_weight_warning;
                } else {
                    $check = false;
                    $message = $message_weight_error;
                }
                break;
            default:
                break;
        }
        $result = new \stdClass();
        $result->check = $check;
        $result->message = $message;

        return $result;
    }

    /**
     * checkPackageSize
     *
     * @param object $data //The data
     * @return object
     */
    private function checkPackageSize($data)
    {
        $check = true;
        $message = $this->message_common_error;
        $medium_size = $this->medium_size;
        $max_size = $this->max_size;
        $medium_length = $this->medium_length;
        $max_length = $this->max_length;
        $message_size_warning = $this->message_size_warning;
        $message_size_error = $this->message_size_error;
        $message_size_exceed_warning = $this->message_size_exceed_warning;
        $message_size_exceed_error = $this->message_size_exceed_error;

        switch ($data->unit_dimension) {
            case "cm":
                $size = (float)$data->length + 2 * (float)$data->width + 2 * (float)$data->height;
                if ($size <= 330) {
                    $message = "";
                } elseif ($size > 330 && $size <= 400) {
                    $message = $message_size_warning;
                } else {
                    $check = false;
                    $message = $message_size_error;
                }
                break;
            case "inch":
                $size = (float)$data->length + 2 * (float)$data->width + 2 * (float)$data->height;
                if ($size <= $medium_size) {
                    $message = "";
                } elseif ($size > $medium_size && $size <= $max_size) {
                    $message = $message_size_warning;
                } else {
                    $check = false;
                    $message = $message_size_error;
                }
                if ($this->module->usa() && $check) {
                    $max_side = $this->getLongestSide($data);
                    if ($max_side <= $medium_length) {
                        $message = $message . "";
                    } elseif ($max_side > $medium_length && $max_side <= $max_length) {
                        if (!empty($message)) {
                            $message = $message_size_exceed_warning . '<br>' . $message;
                        } else {
                            $message = $message_size_exceed_warning;
                        }
                    } else {
                        $check = false;
                        $message = $message_size_exceed_error;
                    }
                }
                break;
            default:
                break;
        }
        $result = new \stdClass();
        $result->check = $check;
        $result->message = $message;

        return $result;
    }

    /**
     * getLongestSide
     *
     * @param string $package_data //The package_data
     * @return string
     */
    private function getLongestSide($package_data)
    {
        $max_side = (float)$package_data->length;
        if ((float)$package_data->width > $max_side) {
            $max_side = (float)$package_data->width;
        }
        if ((float)$package_data->height > $max_side) {
            $max_side = (float)$package_data->height;
        }
        return $max_side;
    }

    /**
     *  validatePackageItem
     *
     * @param string $package //The package_data
     * @return boolean
     */
    private function validatePackageItem($package)
    {
        // Check number of item
        if (isset($package['number_of_item'])) {
            if ($package['number_of_item'] <= 0 || !is_numeric($package['number_of_item'])) {
                return false;
            }
        }
        // Check package name
        if (isset($package['package_name'])) {
            if (empty(trim($package['package_name']))) {
                return false;
            }
        }

        $validate_weight = $this->checkPackageWeight((object)$package);
        if ($validate_weight->check == false) {
            return false;
        }
        $validate_size = $this->checkPackageSize((object)$package);
        if ($validate_size->check == false) {
            return false;
        }

        return true;
    }

    /**
     * validateBackupRateItem
     *
     * @param string $rate //backup rate
     * @return boolean
     */
    private function validateBackupRateItem($rate)
    {
        if (trim($rate) == '') {
            return false;
        } else {
            if (!preg_match('/^\d+(\.\d{1,2})?$/', $rate)) {
                return false;
            } else {
                $rate = (float)$rate;
                if (($rate < 0) || ($rate > 9999.99)) {
                    return false;
                }
            }
        }
        return true;
    }
}
?>