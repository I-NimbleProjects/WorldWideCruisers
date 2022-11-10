<?php
/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

// require_once dirname(__FILE__) . '/../lib/sdk/autoloader.php';
// require_once dirname(__FILE__) . '/CommonFunction.php';
// require_once dirname(__FILE__) . '/Constants.php';
require_once dirname(__FILE__) . '/../../common/CommonController.php';


class AdminUpsRateonorderController extends ModuleAdminController
{
    public function __construct()
    {  
        parent::__construct();
         $ap_ratecheck = Tools::getValue('action');
       
        if(!empty($ap_ratecheck) && $ap_ratecheck == 'AP_Check') {  
            echo json_encode($this->CheckAPeligible());
            exit;
        } else {
            $this->GetRates();
        }
    }
    public function GetRates() {
        
        $orderID = Tools::getValue('orderID');
        $cutOffTime   = Configuration::get('UPS_SP_SERV_CUT_OFF_TIME');
        $pickupDate   = $this->calculatePickupDate((int) $cutOffTime);
        // $accountNumber   = static::getAccountNumberByService($serviceType);
        // $accountShiper   = $this->getAccountByNumber($accountNumber);
       
        $order = new Order((int) $orderID);
        $currency= new currency((int) $order->id_currency);
        
        $address = isset($order->id_address_delivery) ? new Address((int) $order->id_address_delivery) : [];
        $account_no_add = Configuration::get('UPS_SP_SERV_ADDRESS_CHOOSE_ACC');
        $acc_details = $this->getAccDetails($account_no_add);
        $stateCode = "";
        $getstate = new State((int) $address->id_state);
        if (Validate::isLoadedObject($getstate)) {
            $stateCode = $getstate->iso_code;    
        }

        if (!empty($order) && !empty($address)) {
            require_once dirname(__FILE__) . '/AdminUpsOpenOrdersController.php';
            $openordercontroller_obj = new AdminUpsOpenOrdersController();
            $open_order_data = $openordercontroller_obj->getOrders($orderID);
            
            $product_detail = $order->getProducts();
            // $packages = $this->setPackageDimension($product_detail);
            $packages = (isset($open_order_data[0]['package']) && !empty($open_order_data[0]['package'])) ? unserialize($open_order_data[0]['package']) : "";
            $accessorials = $this->getAccessorialCodes($this->listAccessorialActive());
            $rateInfo = array(
                'RequestOption' => Constants::RATE_API_REQ_OPT_STIT,

                'ShipperName' => isset($acc_details->AccountName) ? base64_decode($acc_details->AccountName) : "",
                'ShipperNumber' => isset($acc_details->AccountNumber) ? $acc_details->AccountNumber : "",
                'ShipperAddressLine1' => (isset($acc_details->AddressLine1) && !empty($acc_details->AddressLine1)) ? base64_decode($acc_details->AddressLine1) : "",
                'ShipperAddressLine2' => (isset($acc_details->AddressLine2) && !empty($acc_details->AddressLine2)) ? base64_decode($acc_details->AddressLine2) : "",
                'ShipperAddressLine3' => (isset($acc_details->AddressLine3) && !empty($acc_details->AddressLine3)) ? base64_decode($acc_details->AddressLine3) : "",
                'ShipperCity' => isset($acc_details->City) ? base64_decode($acc_details->City) : "",
                'ShipperStateProvinceCode' => (isset($acc_details->ProvinceCode) && !empty($acc_details->ProvinceCode)) ? $acc_details->ProvinceCode : "XX",
                'ShipperStatePostalCode' => isset($acc_details->PostalCode) ? $acc_details->PostalCode : "",
                'ShipperCountryCode' => isset($acc_details->CountryCode) ? $acc_details->CountryCode : "",

                'ShipToName' => $address->lastname . ' ' . $address->firstname,
                'ShipToAddress1' => $address->address1,
                'ShipToAddress2' => $address->address2,
                'ShipToAddress3' => '',
                'ShipToCity' => $address->city,
                'ShipToStateProvinceCode' => !empty($stateCode) ? $stateCode : 'XX',
                'ShipToPostalCode' => $address->postcode,
                'ShipToCountryCode' => Country::getIsoById($address->id_country),

                'ShipFromName' => isset($acc_details->AccountName) ? base64_decode($acc_details->AccountName) : "",
                'ShipFromAddress1' => (isset($acc_details->AddressLine1) && !empty($acc_details->AddressLine1)) ? base64_decode($acc_details->AddressLine1) : "",
                'ShipFromAddress2' => (isset($acc_details->AddressLine2) && !empty($acc_details->AddressLine2)) ? base64_decode($acc_details->AddressLine2) : "",
                'ShipFromAddress3' => (isset($acc_details->AddressLine3) && !empty($acc_details->AddressLine3)) ? base64_decode($acc_details->AddressLine3) : "",
                'ShipFromCity'  => isset($acc_details->City) ? base64_decode($acc_details->City) : "",
                'ShipFromStateProvinceCode' => (isset($acc_details->ProvinceCode) && !empty($acc_details->ProvinceCode)) ? $acc_details->ProvinceCode : "XX",
                'ShipFromPostalCode' => isset($acc_details->PostalCode) ? $acc_details->PostalCode : "",
                'ShipFromCountryCode' => isset($acc_details->CountryCode) ? $acc_details->CountryCode : "",

                'packages' => $packages,
                'accessorialsService' => $accessorials,
                'PackageWeightCode' => isset($packages[0]['unit_weight']) ? $packages[0]['unit_weight'] : '' ,
                'PackageWeightDescription' => isset($packages[0]['unit_weight']) ? $packages[0]['unit_weight'] : '' ,
                'PackageWeightWeight' => isset($packages[0]['weight']) ? $packages[0]['weight'] : '' ,
                
                'CurrencyCode'  => $currency->iso_code,
                'MonetaryValue' => $order->total_products,
                'PickupDate' => $pickupDate,
                'sdk' => $this->buildSdk()
            );
            $rateAPI  = new Ups\Api\Rate();
            $rate_res = $rateAPI($rateInfo);

            if (!empty($rate_res)) {
                $all_services = !empty($openordercontroller_obj->getShippingServicesActived()) ? $openordercontroller_obj->getShippingServicesActived() : [];
                $filtered_services = array();
                if (!empty($all_services)) {
                        foreach ($all_services as $key => $service) {
                           if (isset($service['key']) && !empty(strpos($service['key'], '_ADD_'))) {
                              $filtered_services[] =  $service;    
                           }
                        }
                } 
                if (!empty($filtered_services)) {
                    $final_rates = [];
                    if (isset($rate_res['ShippingService'])) {
                        foreach ($rate_res['ShippingService'] as $rates) {
                            $rate_code_check = $this->check_rate_code_availablity((string)$rates->Service->Code, $filtered_services);
                            if (!empty($rate_code_check)) {
                                $curr_rates = [];
                                $curr_rates['rate_des'] = (string)$rates->TimeInTransit->ServiceSummary->Service->Description;
                                $curr_rates['rate_code'] = (string)$rates->Service->Code;
                              
                                if(isset($rates->NegotiatedRateCharges->TotalCharge)) {
                                    $curr_rates['currency'] = (string)$rates->NegotiatedRateCharges->TotalCharge->CurrencyCode;
                                    $curr_rates['rate'] = (string)$rates->NegotiatedRateCharges->TotalCharge->MonetaryValue;
                                } elseif (isset($rates->TotalCharges)) {
                                    $curr_rates['currency'] = (string)$rates->TotalCharges->CurrencyCode;
                                    $curr_rates['rate'] = (string)$rates->TotalCharges->MonetaryValue;
                                    } 
                                $curr_rates['key'] = $rate_code_check;
                                $final_rates[] = $curr_rates;
                            }
                        }
                        echo json_encode(array("success" => true, "rates_list" => $final_rates));
                    } else {
                        if (isset($rate_res->Fault->faultstring)) {
                            $err_msg = (string)$rate_res->Fault->faultstring;
                            echo "{error: ".$err_msg."}";
                        } else {
                            echo "{error: Unknown error/response found.}";
                        }
                    }
                } else {
                    echo "{error: Enable NON-AP services to get rates.}";
                }
            } else {
                echo "{error: Response Empty.}";
            }

        }
       
        exit;
    }

    private function setPackageDimension($products)
    {
        $dimensionUnit = Configuration::get('PS_DIMENSION_UNIT') == 'in' ? 'inch' : Configuration::get('PS_DIMENSION_UNIT');
        $weightUnit = Configuration::get('PS_WEIGHT_UNIT') == 'kg' ? 'kgs' : Configuration::get('PS_WEIGHT_UNIT');
        // Instant PackageDimension class
        $packageDimension = new Bean\PackageDimension($dimensionUnit, $weightUnit);
        $packageSettingType = Configuration::get('UPS_PKG_SETTING_TYPE');
        
        if ($packageSettingType == false || $packageSettingType == $packageDimension::TYPE_PACKAGE_DEFAULT) {
            // Get list default package
            $listDefaultPackage = $this->getDefaultPackage();
            $numberOfCartItem = $this->getProductCount($products);
            // Set package dimension (case package default)
            $packageDimension->setDefaultPackageDimension($listDefaultPackage, $numberOfCartItem);
        } elseif ($packageSettingType == $packageDimension::TYPE_PRODUCT_DIMENSION) {
            $isIncludeDimension = Configuration::get('UPS_PKG_INCLUDE_DIMENSION') == 1 ? true : false;
            $listProductDimension = unserialize(Configuration::get('UPS_PKG_PRODUCT_DIMENSION'));
            $cartProduct = $products;
            // Set package dimension (case product dimension)
            $packageDimension->setProductPackageDimension($isIncludeDimension, $listProductDimension, $cartProduct);
        }
        $listPackages = [];
        for ($i = 1; $i <= $packageDimension->numberOfPackage; $i++) {
            $package = [];
            $package['length'] = (string)$packageDimension->length;
            $package['width'] = (string)$packageDimension->width;
            $package['height'] = (string)$packageDimension->height;
            $package['unit_dimension'] = $packageDimension->dimensionUnit;
            $package['weight'] = (string)$packageDimension->weight;
            $package['unit_weight'] = $packageDimension->weightUnit;
            $listPackages[] = $package;
        }
        return $listPackages;
    }

    private function getDefaultPackage()
    {
        // Get setting default package
        $listDefaultPackage = [];
        if (Configuration::get('UPS_PKG_DEFAULT')) {
            // Get package default setting
            $listDefaultPackage = unserialize(Configuration::get('UPS_PKG_DEFAULT'));
        } elseif (Configuration::get('UPS_PKG_1_DIMENSION')) {
            // Get old setting for package default
            $pkgDefaultConfig = unserialize(Configuration::get('UPS_PKG_1_DIMENSION'));
            $defaultPackage = [
                'length' => $pkgDefaultConfig['lenght'],
                'width' => $pkgDefaultConfig['width'],
                'height' => $pkgDefaultConfig['height'],
                'unit_dimension' => $pkgDefaultConfig['lenghtUnit'] == 'IN' ? 'inch' : 'cm',
                'weight' => $pkgDefaultConfig['weight'],
                'unit_weight' => Tools::strtolower($pkgDefaultConfig['weightUnit']),
                'number_of_item' => '1'
            ];
            $listDefaultPackage[] = $defaultPackage;
        }
        return $listDefaultPackage;
    }

    private function getProductCount($products)
    {
        $count = 0;
        foreach($products as $prod){
            if(isset($prod['product_quantity'])){
                $count += $prod['product_quantity'];
            }
        }
        return $count;
    }
   
    public function calculatePickupDate($cutOffTime)
    {
        $stringTinTDate = date("Ymd");

        if ($cutOffTime != 24) {
            $currentHour = (int) date('H');
            if ($currentHour >= $cutOffTime) {
                $today = date("d-m-Y");
                $stringTinTDate = date('Ymd', strtotime($today . "1 day"));
            }
        }

        return $stringTinTDate;
    }

    private function listAccessorialActive()
    {
        $arrayReturn = array();
        $services = new Bean\Accessorial(
            $this->lang,
            include(PATH_ASSETS_FOLDER . 'Accessorials/accessorials.php'));

        foreach ($services as $service) {
            if ($service['show_config']) {
                if (Configuration::get($service['key'])) {
                    $arrayReturn[] = $service['key'];
                }
            }
        }

        return $arrayReturn;
    }

    public function getAccessorialCodes($accessorialServiceKeys)
    {
        $codes = array();

        if (!isset($accessorialServiceKeys)) {
            return $codes;
        }

        if (is_array($accessorialServiceKeys)) {
            $keys = $accessorialServiceKeys;
        } else {
            $keys = unserialize($accessorialServiceKeys);
        }

        if (empty($keys)) {
            return $codes;
        }

        $accessorials = new Bean\Accessorial(
            $this->lang,
            include(PATH_ASSETS_FOLDER . 'Accessorials/accessorials.php'));

        $services = $accessorials->getServices();

        foreach ($keys as $key) {
            $foundKey = array_search($key, array_column($services, 'key'));
            $codes[]  = $services[$foundKey]['code'];
        }

        return $codes;
    }

    private function getAccDetails($acc_no){
        $acc_key = "AccountNumber$acc_no";
        $sql = new DbQuery();

        $sql->select('ups_value');
        $sql->from('ups_data');
        $sql->where("key_name = '" . pSQL($acc_key) . "'");

        $content = Db::getInstance()->executeS($sql);

        $datafetch = array();
        foreach ($content as $item) {
            $datafetch = isset($item["ups_value"]) ? json_decode($item["ups_value"]) : [];
        }

        return $datafetch;
    }

    private function buildSdk()
    {
            $globalSdk = new Ups\Sdk(array(
                'currencyCode' => Currency::getCurrencyInstance(Configuration::get('PS_CURRENCY_DEFAULT'))->iso_code,
                'dbInstance' => Db::getInstance()
            ));
            $globalSdk->setUsername(Configuration::get('MY_UPS_ID'));
            $globalSdk->setPassword(Configuration::get('UPS_PASS'));
            $globalSdk->setLicense(Configuration::get('UPS_LICENSE'));
            $globalSdk->setLanguage("en");
            $globalSdk->setVersion("2.0.0");
            $globalSdk->setCompatibleVersions("1.7");
            $globalSdk->setReleaseDate("");
            $globalSdk->dbQuery = new DbQuery();

        return $globalSdk;
    }

    private function check_rate_code_availablity($rate_code='', $services)
    {
        $check = "";
        foreach ($services as $service) {
            if ($service['Ratecode'] == $rate_code) {
                $check = $service['key'];
                return $check;
            }
        }
        return $check;
    }

    public function CheckAPeligible() { 
        // $com_con = new CommonController();
        $accounts = $this->module->getListAccount();
        $accountDefault = $this->module->getDefaultAccount($accounts);
        $cutOffTime   = Configuration::get('UPS_SP_SERV_CUT_OFF_TIME');
        $pickupDate   = $this->calculatePickupDate((int) $cutOffTime);
        $dimensionUnit = Configuration::get('PS_DIMENSION_UNIT') == 'in' ? 'inch' : Configuration::get('PS_DIMENSION_UNIT');
        $weightUnit = Configuration::get('PS_WEIGHT_UNIT') == 'kg' ? 'kgs' : Configuration::get('PS_WEIGHT_UNIT');
        $accessorials = $this->getAccessorialCodes($this->listAccessorialActive());

        $rateInfo = array(
            'RequestOption' => Constants::RATE_API_REQ_OPT_STIT,
                'ShipperName' => isset($accountDefault['AccountName']) ? base64_decode($accountDefault['AccountName']) : "",
                'ShipperNumber' => isset($accountDefault['AccountNumber']) ? $accountDefault['AccountNumber'] : "",
                'ShipperAddressLine1' => (isset($accountDefault['AddressLine1']) && !empty($accountDefault['AddressLine1'])) ? ($accountDefault['AddressLine1']) : "",
                'ShipperAddressLine2' => (isset($accountDefault['AddressLine2']) && !empty($accountDefault['AddressLine2'])) ? ($accountDefault['AddressLine2']) : "",
                'ShipperAddressLine3' => (isset($accountDefault['AddressLine3']) && !empty($accountDefault['AddressLine3'])) ? ($accountDefault['AddressLine3']) : "",
                'ShipperCity' => isset($accountDefault['City']) ? ($accountDefault['City']) : "",
                'ShipperStateProvinceCode' => (isset($accountDefault['ProvinceCode']) && !empty($accountDefault['ProvinceCode'])) ? $accountDefault['ProvinceCode'] : "XX",
                'ShipperStatePostalCode' => isset($accountDefault['PostalCode']) ? $accountDefault['PostalCode'] : "",
                'ShipperCountryCode' => isset($accountDefault['CountryCode']) ? $accountDefault['CountryCode'] : "",

                'ShipToName' => isset($accountDefault['AccountName']) ? base64_decode($accountDefault['AccountName']) : "",
                'ShipToAddress1' => (isset($accountDefault['AddressLine1']) && !empty($accountDefault['AddressLine1'])) ? ($accountDefault['AddressLine1']) : "",
                'ShipToAddress2' => (isset($accountDefault['AddressLine2']) && !empty($accountDefault['AddressLine2'])) ? ($accountDefault['AddressLine2']) : "",
                'ShipToAddress3' => (isset($accountDefault['AddressLine3']) && !empty($accountDefault['AddressLine3'])) ? ($accountDefault['AddressLine3']) : "",
                'ShipToCity'  => isset($accountDefault['City']) ? ($accountDefault['City']) : "",
                'ShipToStateProvinceCode' => (isset($accountDefault['ProvinceCode']) && !empty($accountDefault['ProvinceCode'])) ? $accountDefault['ProvinceCode'] : "XX",
                'ShipToPostalCode' => isset($accountDefault['PostalCode']) ? $accountDefault['PostalCode'] : "",
                'ShipToCountryCode' => isset($accountDefault['CountryCode']) ? $accountDefault['CountryCode'] : "",

                'ShipFromName' => isset($accountDefault['AccountName']) ? ($accountDefault['AccountName']) : "",
                'ShipFromAddress1' => (isset($accountDefault['AddressLine1']) && !empty($accountDefault['AddressLine1'])) ? ($accountDefault['AddressLine1']) : "",
                'ShipFromAddress2' => (isset($accountDefault['AddressLine2']) && !empty($accountDefault['AddressLine2'])) ? ($accountDefault['AddressLine2']) : "",
                'ShipFromAddress3' => (isset($accountDefault['AddressLine3']) && !empty($accountDefault['AddressLine3'])) ? ($accountDefault['AddressLine3']) : "",
                'ShipFromCity'  => isset($accountDefault['City']) ? ($accountDefault['City']) : "",
                'ShipFromStateProvinceCode' => (isset($accountDefault['ProvinceCode']) && !empty($accountDefault['ProvinceCode'])) ? $accountDefault['ProvinceCode'] : "XX",
                'ShipFromPostalCode' => isset($accountDefault['PostalCode']) ? $accountDefault['PostalCode'] : "",
                'ShipFromCountryCode' => isset($accountDefault['CountryCode']) ? $accountDefault['CountryCode'] : "",

                'AlternateDeliveryAddress' => array(
                    'ApName' => isset($accountDefault['AccountName']) ? ($accountDefault['AccountName']) : "",
                    'ApAddressLine' => (isset($accountDefault['AddressLine1']) && !empty($accountDefault['AddressLine1'])) ? ($accountDefault['AddressLine1']) : "",
                    'ApAddressLine' => (isset($accountDefault['AddressLine2']) && !empty($accountDefault['AddressLine2'])) ? ($accountDefault['AddressLine2']) : "",
                    'ApAddressLine' => (isset($accountDefault['AddressLine3']) && !empty($accountDefault['AddressLine3'])) ? ($accountDefault['AddressLine3']) : "",
                    'ApCity'  => isset($accountDefault['City']) ? ($accountDefault['City']) : "",
                    'ApStateProvinceCode' => (isset($accountDefault['ProvinceCode']) && !empty($accountDefault['ProvinceCode'])) ? $accountDefault['ProvinceCode'] : "XX",
                    'ApPostalCode' => isset($accountDefault['PostalCode']) ? $accountDefault['PostalCode'] : "",
                    'ApCountryCode' => isset($accountDefault['CountryCode']) ? $accountDefault['CountryCode'] : ""
                ),

                'packages' =>array(['length' => '10.00','width'=>'10.00','height'=>'10.00','unit_dimension'=>$dimensionUnit,'weight'=>'1','unit_weight'=>$weightUnit]),
                'accessorialsService' => $accessorials,
                'PackageWeightCode' =>  $weightUnit,
                'PackageWeightDescription' => $weightUnit ,
                'PackageWeightWeight' => '1' ,

                'CurrencyCode'  => Currency::getCurrencyInstance(Configuration::get('PS_CURRENCY_DEFAULT'))->iso_code,
                'MonetaryValue' => '28',
                'PickupDate' => $pickupDate,
                'sdk' => $this->buildSdk()
        );
        
        $rateAPI  = new Ups\Api\Rate();
        $rate_res = $rateAPI($rateInfo);

        if(isset($rate_res['Code']) && $rate_res['Code'] == "1") {
         echo json_encode(["status" => "success"]);
        } elseif (isset($rate_res['Fault']['faultstring'])) {
           $err_msg = $rate_res['Fault']['faultstring'];
           echo json_encode(["status" => $err_msg]);
        } else {
            echo json_encode(["status" => "Unknown error/response found. Unable able to enable AP service."]);
        }
        exit;
    }

    }
