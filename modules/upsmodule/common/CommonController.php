<?php
/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

require_once dirname(__FILE__) . '/../lib/sdk/autoloader.php';
require_once dirname(__FILE__) . '/CommonFunction.php';
require_once dirname(__FILE__) . '/Constants.php';

class CommonController extends ModuleAdminController
{
    protected $sdk;
    protected $licenseApi;
    protected $fault                   = array();
    private $needToCreateAccountNumber = false;
    private $primaryInfo               = array();
    private $accountInfo               = array();

    public function __construct()
    {
        parent::__construct();
        $this->sdk = UpsModule::$globalSdk;

        if ((Configuration::get('UPS_CONFIG_DONE') == 1) // User done for the step configuration BUT.
            && (Configuration::get('UPS_MERCHANTINFO_EXIST') == 0)) { // Did not transfer informations to PM
            $this->transferMerchantInfo($this->collectShopConfigurations(0), false);
        }
        // $transMerLog = $this->getMerchantInfoLog();
 	if (Configuration::get('UPS_M_TRANSFER_INFO_RETRY') != 1 && Configuration::get('UPS_CONFIG_DONE') == 1 && Configuration::get('UPS_MERCHANTINFO_EXIST') == 1 ) {
            $this->transferMerchantInfo($this->collectShopConfigurations(0), false);
        }

    }

    public function setMedia($isNewTheme = false)
    {
        $isUSA = $this->module->usa();
        $language         = $this->context->language->iso_code;
        $fileCssTrademark = ($language == 'pl') ? 'upstrademarkpl.css' : 'upstrademarkuk.css';

        $viewPath = _PS_MODULE_DIR_ . $this->module->name . "/views/";

        parent::setMedia($isNewTheme);
        $this->addJS($viewPath . 'js/upsmodule.js');
        $this->addCSS($viewPath . 'css/upsmodule.css');
        if ($isUSA) {
            $this->addCSS($viewPath . 'css/' . $fileCssTrademark);
        }

        if (Tools::version_compare(_PS_VERSION_, '1.7.4', '>=')) {
            $this->addCSS($viewPath . 'css/upsmodule1750.css');
        }
    }

    protected function createNewUser($rawData, $firstTimeRegistration = false)
    {
        if (isset($rawData['PostalCode']) && !empty($rawData['PostalCode'])) {
            $rawData['PostalCode'] = $this->formatPostalCode($rawData['PostalCode'], true);
        }
        if (isset($rawData['PhoneNumber'])) {
            $rawData['PhoneNumber'] = preg_replace("/[^0-9]/", "", $rawData['PhoneNumber']);
        }

        $rawData['ioBlackBox'] = isset($rawData['ioBlackBox']) ? urlencode($rawData['ioBlackBox']) : '';
        $rawData['CountryCode'] = Configuration::get('UPS_COUNTRY_SELECTED');

        $this->primaryInfo      = $this->collectPrimaryData($rawData);
        $this->accountInfo      = $this->collectRegistrationData($rawData);
        $this->registrationInfo = array_merge($this->primaryInfo, $this->accountInfo);
        
        if (isset($rawData['optradio']) && $rawData['optradio'] == 3) {
            $this->registrationInfo['Username'] = isset($rawData['UsrID']) ? $rawData['UsrID'] : '';
            $this->registrationInfo['Password'] = isset($rawData['Pwd']) ? $rawData['Pwd'] : '';
            $this->registrationInfo['AcssKey'] = isset($rawData['AcssKey']) ? $rawData['AcssKey'] : '';
            // echo"<pre>";print_r( $this->registrationInfo['AcssKey'] );
            $this->registrationInfo['firstTimeFlag'] = true;
            $this->registrationInfo['sdk'] = $this->sdk;
           
            // API need SDK, and PRE_KEY token.
            $token = '';
            if ($this->tokenIsExpired()) {
                if ($this->module->doHandShake()) {
                    // Avoid old value on caches.
                    $token = $this->getToken();
                }
            } else {
                $token = $this->module->getPreTokenKey();
            }
            $this->registrationInfo['preToken'] = $token;
            $this->sdk->setUsername($this->registrationInfo['Username']);
            $this->sdk->setPassword($this->registrationInfo['Password']); 
            $this->sdk->setLicense($this->registrationInfo['AcssKey']);  
            $return_phoneno = $this->SupportPhoneNumber();
            $VerifyAccount = $this->processTrackingAccVerify();

            if (empty($VerifyAccount)) {
            $this->fault = array(
                'err'  => "Empty Response found while verifying the account.",
            );
            return false;
                    } elseif (is_array($VerifyAccount) && ($VerifyAccount['Code'] == '250003') || $VerifyAccount['Code'] == '250002') {
                     $this->fault = array(
                         'err'  => 'The following issue was detected.&nbsp' .$VerifyAccount['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno,
                     );
            return false;
                  } else  {

            Configuration::updateValue('MY_UPS_ID', $this->registrationInfo['Username']);
            Configuration::updateValue('UPS_PASS', $this->registrationInfo['Password']);
            Configuration::updateValue('UPS_LICENSE', $this->registrationInfo['AcssKey']);

                } 

        } elseif (!$this->createUpsId($firstTimeRegistration)) {
            return false;
            }

        if ($firstTimeRegistration) {
            if (!$this->hasLicense()) {
                return false;
            }

            if ($rawData['optradio'] == 0) {
                if (!$this->createAccountNumber()) {
                    return false;
                }

                $rawData['LanguageCode'] = Tools::strtoupper($this->context->language->iso_code);
                $rawData['CountryCode']  = Configuration::get('UPS_COUNTRY_SELECTED');
                if (!isset($rawData['promoCode'])) {
                    $rawData['promoCode'] = '';
                }

                // TODO need handle errors
                $this->getPromotion($rawData);
            }
        }

        //Add Error Promo Code
        $fault = $this->fault;
        $err = '';
        if (isset($fault['err'])) {
            $err = $fault['err'];
        }
        $this->context->cookie->__set('ups_cookie_error_account', $err);
        $this->context->cookie->write();

        $this->saveMerchantInfo($this->accountInfo);
        $this->saveMerchantInfo($this->primaryInfo);

        return $this->registrationInfo;
    }

    public function processTrackingAccVerify()
    {
        $args = array();
        $args['shipmentId'] = '';
        $args['sdk'] = $this->sdk;
        $trackingAPI = new Ups\Api\Tracking();
        $response = $trackingAPI($args);
        return $response;
    }

    public function createAccountNumber()
    {
        $pickUpAddressCandidate = '9580101';
        $openAccountAPI = new PluginManager\ToolApi\OpenAccount();
        $this->registrationInfo['LanguageCode'] = \Ups\Sdk::$language;
        $this->registrationInfo['CountryCode']  = Configuration::get('UPS_COUNTRY_SELECTED');
        $this->registrationInfo['MyUpsID']      = Configuration::get('MY_UPS_ID');
        $this->registrationInfo['sdk'] = $this->sdk;
        // function handle data before transmisson API OpenAccount
        $data = $this->truncateParameterForOpenAccount($this->registrationInfo);
        $response = $openAccountAPI($data);
        $return_phoneno = $this->SupportPhoneNumber();

        if ($response['Code'] != 1) {
            if ($response['Code'] == $pickUpAddressCandidate) {
                $this->fault = array(
                    'code' => $response['Code'],
                    'err'  => 'The following issue was detected.&nbsp'. $this->suggestion($response['Description']).'. Please reach out to your Account Manager to understand and resolve the issue. <br/>For further instructions reach out to' .$return_phoneno,
                );
            } else {
                $this->fault = array(
                    'code' => $response['Code'],
                    'err'  => 'The following issue was detected.&nbsp'. $response['Description'].'. Please reach out to your Account Manager to understand and resolve the issue. <br/>For further instructions reach out to' .$return_phoneno,
                );
            }
            return false;
        } else {
            $this->accountInfo['AccountNumber'] = $response['AccountNumber'];
        }

        return true;
    }

    // get list Account
    public function formatAccountName()
    {
        $accounts = $this->module->getListAccount();

        if (empty($accounts)) {
            return array();
        }

        $listName = array();
        foreach ($accounts as $account) {
            if ($account['AccountNumber']) {
                $listName[$account['AccountNumber']] =
                    (isset($account['AddressType']) ? $account['AddressType'] : '') .
                    ' (#' . $account['AccountNumber'] . ')';
            }
        }

        return $listName;
    }

    public function getPrimaryInfo()
    {
        $info = array();
        $getUpsDataMerchantInfo = $this->module->getUpsData('exactly', MERCHANT_INFO);

        if ($getUpsDataMerchantInfo) {
            if (isset($getUpsDataMerchantInfo[MERCHANT_INFO])) {
                $info = (array) json_decode($getUpsDataMerchantInfo[MERCHANT_INFO]);
                $info['City']         = $this->module->checkDecode($info['City']);
                $info['CustomerName'] = $this->module->checkDecode($info['CustomerName']);
                $info['CompanyName']  = $this->module->checkDecode($info['CompanyName']);
                $info['AddressLine1'] = $this->module->checkDecode($info['AddressLine1']);
                $info['AddressLine2'] = $this->module->checkDecode($info['AddressLine2']);
                $info['AddressLine3'] = $this->module->checkDecode($info['AddressLine3']);

                if (isset($info['CountryCode'])) {
                    $info['Country'] = $this->module->pluginCountryName;
                }
            }
        }
        return $info;
    }

    public function getAccountByNumber($accountNumber)
    {
        $accountNumber     = "AccountNumber$accountNumber";
        $accountInfoReturn = array();
        if ($accountNumber) {
            $getAccount = $this->module->getUpsData('exactly', $accountNumber);
            if (isset($getAccount[$accountNumber])) {
                $accountInfoReturn = (array) json_decode($getAccount[$accountNumber]);
            }
            $accountInfoReturn['Country'] = $this->module->pluginCountryName;
        }

        $accountInfoReturn['AccountName']  = isset($accountInfoReturn['AccountName']) ?
            $this->module->checkDecode($accountInfoReturn['AccountName']) : '';
        $accountInfoReturn['AddressType']  = $this->module->checkDecode($accountInfoReturn['AddressType']);
        $accountInfoReturn['AddressLine1'] = $this->module->checkDecode($accountInfoReturn['AddressLine1']);
        $accountInfoReturn['AddressLine2'] = $this->module->checkDecode($accountInfoReturn['AddressLine2']);
        $accountInfoReturn['AddressLine3'] = $this->module->checkDecode($accountInfoReturn['AddressLine3']);
        $accountInfoReturn['City']         = $this->module->checkDecode($accountInfoReturn['City']);

        if (isset($accountInfoReturn['AccountName']) && empty($accountInfoReturn['AccountName'])) {
            $merchantInfo                     = $this->getMerchantInfo();
            $accountInfoReturn['AccountName'] = $merchantInfo['CustomerName'];
        }

        $accountInfoReturn['ProvinceCode'] = isset($accountInfoReturn['ProvinceCode']) ?
        $accountInfoReturn['ProvinceCode'] : 'XX';

        //Provin Name
        $listState = $this->getListStateCode($accountInfoReturn['CountryCode']);
        $accountInfoReturn['StateProvinceName'] = '';
        if (isset($listState[$accountInfoReturn['ProvinceCode']])) {
            $accountInfoReturn['StateProvinceName'] = $listState[$accountInfoReturn['ProvinceCode']];
        }

        return $accountInfoReturn;
    }

    public function getListStateCode($coutryCode)
    {
        $countryId = Country::getByIso($coutryCode);
        $states = State::getStatesByIdCountry($countryId, true);
        $result = array();
        foreach ($states as $item) {
            if ($item['name'] == 'AA' || $item['name'] == 'AE' || $item['name'] == 'AP') {
                continue;
            }
            $result[$item['iso_code']] = $item['name'];
        }

        return $result;
    }

    public function getMerchantInfo()
    {
        $getAccount   = $this->module->getUpsData('exactly', 'MerchantInfo');
        $merchantInfo = array(
            'Country'      => '',
            'CompanyName'  => '',
            'CustomerName' => '',
            'AddressLine1' => '',
            'AddressLine2' => '',
            'AddressLine3' => '',
            'City'         => '',
        );

        if (isset($getAccount['MerchantInfo'])) {
            $merchantInfo = (array) json_decode($getAccount['MerchantInfo']);
            if (!empty($merchantInfo)) {
                $merchantInfo['Country']      = $this->module->pluginCountryName;
                $merchantInfo['CompanyName']  = $this->module->checkDecode($merchantInfo['CompanyName']);
                $merchantInfo['CustomerName'] = $this->module->checkDecode($merchantInfo['CustomerName']);
                $merchantInfo['AddressLine1'] = $this->module->checkDecode($merchantInfo['AddressLine1']);
                $merchantInfo['AddressLine2'] = $this->module->checkDecode($merchantInfo['AddressLine2']);
                $merchantInfo['AddressLine3'] = $this->module->checkDecode($merchantInfo['AddressLine3']);
                $merchantInfo['City']         = $this->module->checkDecode($merchantInfo['City']);
            }
        }
        return $merchantInfo;
    }

    public function getUpsDataInfoByKey($key)
    {
        $info = array();
        $info = $this->module->getUpsData('exactly', $key);

        if (array_key_exists($key, $info) && isset($info[$key])) {
            return $info[$key];
        }

        return false;
    }

    private function createUpsId($firstTimeRegistration)
    {
        $merchantInfo = $this->module->getUpsData('exactly', MERCHANT_INFO);
        
        if (!empty($merchantInfo)) {
            $merchantInfo                 = (array) json_decode($merchantInfo['MerchantInfo']);
            $merchantInfo['CustomerName'] = base64_decode($merchantInfo['CustomerName']);
            $merchantInfo['CompanyName']  = base64_decode($merchantInfo['CompanyName']);
            $merchantInfo['AddressLine1'] = base64_decode($merchantInfo['AddressLine1']);
            $merchantInfo['AddressLine2'] = base64_decode($merchantInfo['AddressLine2']);
            $merchantInfo['AddressLine3'] = base64_decode($merchantInfo['AddressLine3']);
            $merchantInfo['City']         = base64_decode($merchantInfo['City']);
            $this->primaryInfo            = $merchantInfo;

            if (!empty($merchantInfo['Title'])) {
                $this->registrationInfo['Title'] = $merchantInfo['Title'];
            }

            if (!empty($merchantInfo['CompanyName'])) {
                $this->registrationInfo['CompanyName'] = $merchantInfo['CompanyName'];
            }

            if (!empty($merchantInfo['CustomerName'])) {
                $this->registrationInfo['CustomerName'] = $merchantInfo['CustomerName'];
            }

            if (!empty($merchantInfo['EmailAddress'])) {
                $this->registrationInfo['EmailAddress'] = $merchantInfo['EmailAddress'];
            }
        }

        $registrationAPI = '';

        if ($firstTimeRegistration) {
            $this->registrationInfo['firstTimeFlag'] = $firstTimeRegistration;
            $this->registrationInfo['sdk'] = $this->sdk;
            // API need SDK, and PRE_KEY token
            $this->registrationInfo['Username'] = $this->generateUpsID($this->registrationInfo);
            $this->registrationInfo['Password'] = $this->generatePass(26);
            $token = '';
            if ($this->tokenIsExpired()) {
                if ($this->module->doHandShake()) {
                    // Avoid old value on caches.
                    $token = $this->getToken();
                }
            } else {
                $token = $this->module->getPreTokenKey();
            }

            $this->registrationInfo['preToken'] = $token; // Step 1.

            $registrationAPI = new PluginManager\ToolApi\Registration();
        } else {
            $this->registrationInfo['UPSAccountMerchant'] = $this->module->getUPSAccountMerchant();
            $this->sdk->setUsername(Configuration::get('MY_UPS_ID'));
            $this->sdk->setPassword(Configuration::get('UPS_PASS'));
            $this->sdk->setLicense(Configuration::get('UPS_LICENSE'));
            $this->registrationInfo['sdk'] = $this->sdk;
            $registrationAPI = new Ups\Api\Registration();
        }

        $response = $registrationAPI($this->registrationInfo);
        $result = false;
        $return_phoneno = $this->SupportPhoneNumber();

        switch ($response['Code']) {
            case '1':
                if ($firstTimeRegistration) {
                    Configuration::updateValue('MY_UPS_ID', $this->registrationInfo['Username']);
                    Configuration::updateValue('UPS_PASS', $this->registrationInfo['Password']);
                }

                $result = true;
                break;

            case '2':
                if ($firstTimeRegistration) {
                    Configuration::updateValue('MY_UPS_ID', $this->registrationInfo['Username']);
                    Configuration::updateValue('UPS_PASS', $this->registrationInfo['Password']);
                }

                $result = true;
                break;

            default:
                $this->fault = array(
                    'err' => 'The following issue was detected.&nbsp' .$response['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno,
                );

                $result = false;
                break;
        }

        return $result;
    }

    private function generateUpsID($data, $count = 0)
    {
        $tool = new PluginManager\ToolApi\MyUpsID();
        //get new token when recall.
        $token = $this->module->getPreTokenKey();
        $data['preToken'] = $token;
        $myUpsId = $tool($data);
        if (empty($myUpsId)) {
            $count += 1;
            if ($count != 3) {
                $this->module->doHandShake();
                return $this->generateUpsID($data, $count);
            }
        }
        return $myUpsId;
    }

    private function generatePass($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = Tools::strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    private function hasLicense()
    {
        if (!empty($this->module->getUpsData('exactly', LICENSE_KEY))) {
            return true;
        }
        if (!empty(Configuration::get('UPS_LICENSE'))) {
            return true;
        }
        $data = $this->getLicenseText();
        $this->licenseApi = new PluginManager\ToolApi\License();
        $this->licenseApi->setAccessLicenseRequest();
        $this->registrationInfo['LicenseText']  = &$data[TERM_COND_KEY];
        $country_check_license = ["de", "it", "nl", "be"];
        // if (!empty($data[COUNTRY_KEY]) && in_array(Tools::strtolower($data[COUNTRY_KEY]), $country_check_license) && Configuration::get('UPS_COUNTRY_SELECTED') != 'IT') {
        //     $this->registrationInfo['LicenseText']  = iconv(mb_detect_encoding($data[TERM_COND_KEY], mb_detect_order(), true), "ISO-8859-1", $data[TERM_COND_KEY]);
        // }
        $this->registrationInfo['CountryCode']  = $data[COUNTRY_KEY];
        $this->registrationInfo['LanguageCode'] = $data[LANGUAGE_KEY];
        $this->registrationInfo['PlatformVersion'] = _PS_VERSION_;
        $this->registrationInfo['preToken'] = $this->getToken();

        $client     = $this->licenseApi;
        $licenseRes = $client($this->registrationInfo);
        $return_phoneno = $this->SupportPhoneNumber();
        
        if ($licenseRes['Code'] != 1 || !array_key_exists('AccessLicenseNumber', $licenseRes)) {
            $this->fault = array(
                'err' => 'The following issue was detected.&nbsp' .$licenseRes['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno,
            );
            return false;
        }

        Configuration::updateValue('UPS_LICENSE', $licenseRes['AccessLicenseNumber']);

        return true;
        
    }

    private function getLicenseText()
    {
        $sql = new DbQuery();

        $sql->select('key_name');
        $sql->select('ups_value');
        $sql->from('ups_data');
        $sql->where("key_name IN ('Term', 'Country', 'Language')");

        $datafetch = array();
        $content   = Db::getInstance()->executeS($sql);

        foreach ($content as $row) {
            $datafetch[$row[KEY_COL]] = $row[VAL_COL];
        }

        return $datafetch;
    }

    public function getPromotion($raw)
    {
        // $raw = array(
        //     'LanguageCode' => strtoupper($this->context->language->iso_code),
        //     'CountryCode'  => Configuration::get('UPS_COUNTRY_SELECTED'),
        //     'PromoCode'    => 'C63ZBJTD7',
        // );
        $this->sdk->setUsername(Configuration::get('MY_UPS_ID'));
        $this->sdk->setPassword(Configuration::get('UPS_PASS'));
        $this->sdk->setLicense(Configuration::get('UPS_LICENSE'));
        $raw['sdk'] = $this->sdk;
        $getAgreement = new Ups\Api\PromoAgreement();
        $agree        = $getAgreement($raw);
        $return_phoneno = $this->SupportPhoneNumber();

        if ($agree['Code'] == 1) {
            $raw['AcceptanceCode'] = $agree['Agreement']
                ->PromoDiscountAgreementResponse
                ->PromoAgreement
                ->AcceptanceCode;

            $raw['AccountNumber'] = $this->accountInfo['AccountNumber'];

            $request = new Ups\Api\PromoRequest();
            $result  = $request($raw);

            if ($result['Code'] != 1) {
                $this->fault = array(
                    'err' => 'The following issue was detected.&nbsp' .$result['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno,
                );
                return false;
            }
        } else {
            $this->fault = array(
                'err' => 'The following issue was detected.&nbsp' .$agree['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno,
            );
            return false;
        }

        return true;
    }

    public function SupportPhoneNumber() {
    $support_phones = array(
        'DE' => '+49-(0)69 66308037',
        'FR' => '+33-(0)157324060',
        'GB' => '+44-(0)207 9490192',
        'ES' => '+34-(0)917459877',
        'PL' => '+48 (0) 222030321',
        'IT' => '+39-0248270032',
        'NL' => '+31-(0)205040602',
        'BE' => '+32-(0)22 566619'
    );
    $country = Configuration::get('UPS_COUNTRY_SELECTED');
    $phone_s = $support_phones[$country];
    return $phone_s;
    }

    private function collectRegistrationData($data)
    {
        $CountryCode = isset($data['CountryCode']) ? $data['CountryCode'] : '';
        $Ymd = 'Ymd';
        $newformat = isset($data['InvoiceDate']) ? date($Ymd ,strtotime($data['InvoiceDate'])) : '';
        $return = array(
            'AccountNumber' => isset($data['AccountNumber']) ? $data['AccountNumber'] : '',
            'PhoneNumber'   => isset($data['PhoneNumber']) ? $data['PhoneNumber'] : '',
            'AddressType'   => isset($data['AddressType']) ? $data['AddressType'] : '',
            'AddressLine1'  => isset($data['AddressLine1']) ? $data['AddressLine1'] : '',
            'AddressLine2'  => isset($data['AddressLine2']) ? $data['AddressLine2'] : '',
            'AddressLine3'  => isset($data['AddressLine3']) ? $data['AddressLine3'] : '',
            'City'          => isset($data['City']) ? $data['City'] : '',
            'PostalCode'    => isset($data['PostalCode']) ? $data['PostalCode'] : '',
            'CountryCode'   => $CountryCode,
            'ProvinceCode'  => isset($data['ProvinceCode']) ? $data['ProvinceCode'] : '',
            'ioBlackBox'    => $data['ioBlackBox'],
            'optradio'      => $data['optradio'],
            'isDefaultAccount' => $data['isDefaultAccount']
        );

        if (isset($data['AccountName']) && $data['AccountName'] !== '') {
            $return['AccountName'] = $data['AccountName'];
        } elseif (isset($data['AccountName1']) && $data['AccountName1'] !== '') {
            $return['AccountName'] = $data['AccountName1'];
        } elseif (isset($data['BusinessName']) && $data['BusinessName'] !== '') {
            $return['AccountName'] = $data['BusinessName'];
        }

        switch ($data['optradio']) {
            case 0:
                // TODO
                break;

            case 1:
                $return['AccountNumber'] = isset($data['AccountNumber']) ?
                    $data['AccountNumber'] : '';
                $return['InvoiceNumber'] = isset($data['InvoiceNumber']) ?
                    $data['InvoiceNumber'] : ''; 
                $return['InvoiceDate'] = isset($data['InvoiceDate']) ?
                $newformat : '';  
                $return['CurrencyCode'] = isset($data['Currency']) ?
                    $data['Currency'] : '';
                $return['InvoiceAmount'] = isset($data['InvoiceAmount']) ?
                    $data['InvoiceAmount'] : '';

                if (Tools::strtolower($CountryCode) == 'us') {
                    $return['ControlID'] = isset($data['ControlID']) ? $data['ControlID'] : '';
                }
                break;

            case 2:
                $return['AccountNumber'] = $data['AccountNumber1'];

                break;

            case 3:
                $return['AccountNumber'] = isset($data['accno']) ? $data['accno'] : '';
                $return['AccountName'] = isset($data['accnme']) ? $data['accnme'] : '';
                break;

            default:
                break;
        }

        return $return;
    }

    public function collectPrimaryData($data)
    {
        return array(
            'Title'        => isset($data['Title']) ? $data['Title'] : '',
            'CompanyName'  => isset($data['CompanyName']) ? $data['CompanyName'] : '',
            'CustomerName' => isset($data['CustomerName']) ? $data['CustomerName'] : '',
            'PhoneNumber'  => isset($data['PhoneNumber']) ? $data['PhoneNumber'] : '',
            'EmailAddress' => isset($data['EmailAddress']) ? $data['EmailAddress'] : '',
            'AddressLine1' => isset($data['AddressLine1']) ? $data['AddressLine1'] : '',
            'AddressLine2' => isset($data['AddressLine2']) ? $data['AddressLine2'] : '',
            'AddressLine3' => isset($data['AddressLine3']) ? $data['AddressLine3'] : '',
            'City'         => isset($data['City']) ? $data['City'] : '',
            'PostalCode'   => isset($data['PostalCode']) ? $data['PostalCode'] : '',
            'CountryCode'  => isset($data['CountryCode']) ? $data['CountryCode'] : '',
            'ControlID'  => isset($data['ControlID']) ? $data['ControlID'] : '',
            'ProvinceCode'  => isset($data['ControlID']) ? $data['ProvinceCode'] : '',
            'vatNumber'    => isset($data['vatNumber']) ? $data['vatNumber'] : '',
            'promoCode'    => isset($data['promoCode']) ? $data['promoCode'] : '',
        );
    }

    public function getStatus($res)
    {
        if (!isset($res->Shipment->Package)) {
            return false;
        }

        $package = $res->Shipment->Package;

        // have many tracking number
        if (is_array($package)) {
            $activity = $res->Shipment->Package[0]->Activity;
        } else {
            $activity = $res->Shipment->Package->Activity;
        }

        // have many status in first tracking number
        if (is_array($activity)) {
            $currentStatus = isset($activity[0]->Status) ? $activity[0]->Status->Description : '';
        } else {
            $currentStatus = isset($activity->Status) ? $activity->Status->Description : '';
        }

        return isset($currentStatus) ? $currentStatus : false;
    }

    public function getShippingServicesActived()
    {
        $arrayShipToAp = array();
        $listSpService = $this->getShippingServices();
        foreach ($listSpService as $service) {
            if (Configuration::get($service['key'])) {
                array_push($arrayShipToAp, $service);
            }
        }

        return $arrayShipToAp;
    }

    public function getDefaultPackage()
    {
        // Get setting default package
        $defaultPackage = [];
        // Get old setting for package default
        if (Configuration::get('UPS_PKG_1_DIMENSION')) {
            $pkgDefaultConfig = unserialize(Configuration::get('UPS_PKG_1_DIMENSION'));
            $defaultPackage = [
                'length' => $pkgDefaultConfig['lenght'],
                'width' => $pkgDefaultConfig['width'],
                'height' => $pkgDefaultConfig['height'],
                'unit_dimension' => $pkgDefaultConfig['lenghtUnit'] == 'IN' ? 'inch' : 'cm',
                'weight' => $pkgDefaultConfig['weight'],
                'unit_weight' => Tools::strtolower($pkgDefaultConfig['weightUnit'])
            ];
        } elseif (Configuration::get('UPS_PKG_DEFAULT')) {
            $listDefaultPackage = unserialize(Configuration::get('UPS_PKG_DEFAULT'));
            foreach ($listDefaultPackage as $package) {
                if ($package['number_of_item'] == 1) {
                    $defaultPackage = $package;
                    unset($defaultPackage['number_of_item']);
                }
            }
        }     
        return $defaultPackage;
    }

    public function formatOrderPackage($orderPackage)
    {
        $packages = [];
        for ($i = 1; $i < $orderPackage['number_of_package']; $i++) {
            $package = [];
            $package['length'] = $orderPackage['length'];
            $package['width'] = $orderPackage['width'];
            $package['height'] = $orderPackage['height'];
            $package['unit_dimension'] = $orderPackage['unit_dimension'];
            $package['weight'] = $orderPackage['weight'];
            $package['unit_weight'] = $orderPackage['unit_weight'];
            $packages[] = $package;
        }
        return $packages;
    }

    public function formatOrderPackageNew($orderPackages)
    {
        $packages = [];
        foreach ($orderPackages as $orderPackage) {
            $package = [];
            $package['length'] = $orderPackage['length'];
            $package['width'] = $orderPackage['width'];
            $package['height'] = $orderPackage['height'];
            $package['unit_dimension'] = $orderPackage['unit_dimension'];
            $package['weight'] = $orderPackage['weight'];
            $package['unit_weight'] = $orderPackage['unit_weight'];
            $packages[] = $package;
        }
        return $packages;
    }

    public function formatPackageUnits($unit)
    {
        $formatUnit = '';
        switch ($unit) {
            case 'kgs':
                $formatUnit = 'Kg';
                break;
            case 'lbs':
                $formatUnit = 'Pounds';
                break;
            case 'cm':
                $formatUnit = 'cm';
                break;
            case 'inch':
                $formatUnit = 'inch';
                break;
        }
        return $formatUnit;
    }

    public function getShippingService($key)
    {
        return $this->module::$shippingServices->getServiceInfo($key);
    }

    public function hasCOD($order)
    {
        return strpos($order['cod'], Constants::PS_COD_MODULE) !== false ? true : false;
    }

    private function truncateParameterForOpenAccount($registrationInfo)
    {
        $length = 30;
        // if ($this->module->pluginCountryCode == 'GB') {
        //     $length = 7;
        // }

        $registrationInfo['CustomerName'] = Tools::substr($registrationInfo['CustomerName'], 0, 20);
        $registrationInfo['CompanyName']  = Tools::substr($registrationInfo['CompanyName'], 0, 30);
        $registrationInfo['EmailAddress'] = Tools::substr($registrationInfo['EmailAddress'], 0, 50);
        $registrationInfo['PhoneNumber']  = Tools::substr($registrationInfo['PhoneNumber'], 0, 15);
        $registrationInfo['AddressLine1'] = Tools::substr($registrationInfo['AddressLine1'], 0, 30);
        $registrationInfo['AddressLine2'] = Tools::substr($registrationInfo['AddressLine2'], 0, 30);
        $registrationInfo['AddressLine3'] = Tools::substr($registrationInfo['AddressLine3'], 0, 30);
        $registrationInfo['PostalCode']   = Tools::substr($registrationInfo['PostalCode'], 0, $length);
        $registrationInfo['City']         = Tools::substr($registrationInfo['City'], 0, 30);

        return $registrationInfo;
    }

    public function saveMerchantInfo($merchantInfo)
    {
        if (isset($merchantInfo[ACCOUNT_NUM_KEY]) && $merchantInfo['optradio'] != 0) {
            $columnKey = ACCOUNT_NUM_KEY . $merchantInfo['AccountNumber'];
            $merchantInfo['AddressType'] = $this->encodeRequired($merchantInfo['AddressType']);
            $merchantInfo['AccountName'] = $this->encodeRequired($merchantInfo['AccountName']);
        } elseif (!empty($merchantInfo['CustomerName'])) {
            $columnKey = MERCHANT_INFO;
            $merchantInfo['CustomerName'] = $this->encodeRequired($merchantInfo['CustomerName']);
            $merchantInfo['CompanyName']  = $this->encodeRequired($merchantInfo['CompanyName']);
        } else {
            $columnKey = ACCOUNT_NUM_KEY . $merchantInfo['AccountNumber'];
            $merchantInfo['AddressType'] = $this->encodeRequired($merchantInfo['AddressType']);
        }

        if (isset($merchantInfo['ProvinceCode'])) {
            $merchantInfo['ProvinceCode'] = $merchantInfo['ProvinceCode'];
        }
        $merchantInfo['City'] = $this->encodeRequired($merchantInfo['City']);
        $merchantInfo['AddressLine1'] = $this->encodeRequired($merchantInfo['AddressLine1']);
        $merchantInfo['AddressLine2'] = $this->encodeRequired($merchantInfo['AddressLine2']);
        $merchantInfo['AddressLine3'] = $this->encodeRequired($merchantInfo['AddressLine3']);

        Db::getInstance()->insert(
            'ups_data',
            array('key_name' => pSQL($columnKey),
            'ups_value' => json_encode($merchantInfo)),
            false,
            true,
            4,
            true
        );
    }

    private function encodeRequired($str)
    {
        return isset($str) ? base64_encode($str) : '';
    }

    public function estimateFee($rateInfo)
    {
        $rateInfo['sdk'] = $this->sdk;
        $rateAPI         = new Ups\Api\Rate();
        $response        = $rateAPI($rateInfo);

        return $response;
    }

    public function createShipment($data)
    {
        $this->handleData($data);
        $data['sdk'] = $this->sdk;
        $shipment = new Ups\Api\Shipping();
        $res = $response = $shipment($data);
        $return_phoneno = $this->SupportPhoneNumber();

        if ($response['Code'] == 1) {
            $this->insertShipmentData(
                $data,
                $response['PackageResult'],
                $response['ShipmentId'],
                $response['ShippingFee']
            );
            $this->updateOpenOrderStatus($data['tmpOrderId'], '5');

            $res['data'][] = $response;

            try {
                $this->transferShipment($this->collectShipmentInfo(
                    $data,
                    $response['ShipmentId'],
                    $response['ShippingFee'],
                    $response['PackageResult']
                ));
            } catch (Exception $e) {
            }
        } elseif ($response['Code'] == 102) {
            $res['Code'] = 'API_ERR';
        } else {
            $res['error'][] = 'The following issue was detected.&nbsp' .$response['Description'].'. Please reach out to your Account Manager to understand and resolve the issue.<br/> For further instructions reach out to '.$return_phoneno;
        }

        return $res;
    }

    public function transferMerchantInfo($params, $refreshAllow = true)
    {
        $client = new PluginManager\CollectionApi\MerchantInfo();
        $response = $client($this->module->addParam($params));

        if (empty($response) || (isset($response->error->errorCode) && $response->error->errorCode == "401")) {
            $this->module->refreshToken('', $this, 'transferMerchantInfo', $params);
        }else{
            Configuration::updateValue('UPS_M_TRANSFER_INFO_RETRY', 1);
        }
        // Token Expired
        if ($refreshAllow) {
            $this->module->refreshToken($response, $this, 'transferMerchantInfo', $params);
        }
    }

    public function processTracking($shipmentId)
    {
        $args = array();
        $args['shipmentId'] = $shipmentId;
        $args['sdk'] = $this->sdk;
        $trackingAPI = new Ups\Api\Tracking();
        $response = $trackingAPI($args);
        return $response;
    }

    public function transferShipment($params)
    {
        $transfer = new PluginManager\CollectionApi\Shipment();
        $response = $transfer($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferShipment', $params);
    }

    public function transferDeliveryRates($params)
    {
        $client = new PluginManager\CollectionApi\DeliveryRatesInfo();
        $response = $client($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferDeliveryRates', $params);
    }

    public function transferDefaultPackage($params)
    {
        $client = new PluginManager\CollectionApi\DefaultPackageInfo();
        $response = $client($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferDefaultPackage', $params);
    }

    public function transferDefaultPackageRate($params)
    {
        $client = new PluginManager\CollectionApi\DefaultPackageRate();
        $response = $client($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferDefaultPackageRate', $params);
    }

    public function transferShipmentStatus($params)
    {
        $client = new PluginManager\CollectionApi\ShipmentStatus();
        $response = $client($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferShipmentStatus', $params);
    }

    public function transferShippingService($params)
    {
        $client = new PluginManager\CollectionApi\ShippingService();
        $response = $client($this->module->addParam($params));

        $this->module->refreshToken($response, $this, 'transferShippingService', $params);
    }

    private function collectShipmentInfo($data, $shipmentId, $shippingFee, $packageTrackNumbers)
    {
        $order = $data['firstOrder'];
        $shippingServiceInfo = $data['shippingServiceInfo'];
        $serviceType = $this->module->checkServiceType($order['shipping_service']) == 'AP' ? 10 : 20;
        $packages = $this->refactorKey($data['packages'], $packageTrackNumbers);
        $accessorialName = array();

        if (!empty($data['accessorialKeys'])) {
            foreach ($data['accessorialKeys'] as $key) {
                $accessorialName[]['name'] = $this->module->getNameAccessorialByKey($key);
            }
        }

        $date_format = "m-d-Y";
        $progress = array(
            'merchantKey'      => Configuration::get('MERCHANT_KEY'),
            'accountNumber'    => $data['accountNumber'],
            'shipmentId'       => $shipmentId,
            'fee'              => (float) $shippingFee,
            'revenue'          => (float) $shippingFee,
            // 'orderDate'        => Tools::dateFormat((array)date_create($order['order_date']), $date_format),
            'orderDate'        => isset($order['order_date']) ? date($date_format ,strtotime($order['order_date'])) : '',
            'address'          => $order['address_delivery1'],
            'postalCode'       => $order['postcode'],
            'city'             => $order['city'],
            'country'          => $order['country_code'],
            'serviceType'      => $serviceType,
            'serviceCode'      => $shippingServiceInfo['Ratecode'],
            'serviceName'      => $shippingServiceInfo['name'],
            'isCashOnDelivery' => (int) $this->hasCOD($order),
            'packages'         => $packages,
            'products'         => $order['products'],
            'accessorials'     => $accessorialName,
        );

        return $progress;
    }

    private function refactorKey($packages, $packageTrackNumbers)
    {
        $newPackages = $result = array();

        if (is_array($packageTrackNumbers)) {
            $i=0;

            foreach ($packageTrackNumbers as $info) {
                $newPackages[] = array_merge($packages[$i], array('trackingNumber' => $info->TrackingNumber));
                $i++;
            }
        } else {
            $newPackages = $packages;
        }

        foreach ($newPackages as $package) {
            $result[] = array(
                'trackingNumber' => isset($package['trackingNumber']) ?
                    $package['trackingNumber'] : $packageTrackNumbers->TrackingNumber,
                'weight'         => $package['weight'],
                'weightUnit'     => $package['unit_weight'] === 'kgs' ? 'Kg' : 'Pounds',
                'length'         => $package['length'],
                'width'          => $package['width'],
                'height'         => $package['height'],
                'dimensionUnit'  => $package['unit_dimension'] === 'cm' ? 'Cm' : 'Inch',
                'shipmentStatus' => 'Status not available'
            );
        }

        return $result;
    }

    private function handleData(&$data)
    {
        $orders = $data['orders'];
        $totalOrderValue = 0;

        if (is_array($orders)) {
            foreach ($orders as $order) {
                // The order has shipped
                if ($order['current_state'] == 5) {
                    return array(
                        'error' => array('The order has shipped.'),
                        'data'  => array(),
                    );
                }

                $totalOrderValue += $order['total_paid'];
            }
        } else {
            return array(
                'error' => array('There is haven\'t any order.'),
                'data'  => array(),
            );
        }

        if (empty($data['packages'])) {
            return array(
                'error' => array('Could not get any packages to create shipment.'),
                'data'  => array(),
            );
        }

        // Language
        $data['language'] = $this->context->language->iso_code;
        $data['currency'] = $data['firstOrder']['currency'];

        // Total Order Value
        $data['totalOrderValue'] = $totalOrderValue;
        $data['CurrencyCode'] = $data['currency'];
        $data['MonetaryValue'] = (string) $totalOrderValue;

        // Account
        $key    = ACCOUNT_NUM_KEY . $data['accountNumber'];
        $result = $this->module->getUpsData('in', array("'" . $key . "'", "'" . MERCHANT_INFO . "'"));
        $data['accountInfo'] = (array) json_decode($result[$key]);
        $data['primaryInfo'] = (array) json_decode($result[MERCHANT_INFO]);

        $accountInfo = $data['accountInfo'];
        $primaryInfo = $data['primaryInfo'];
        $accountname = isset($accountInfo['AccountName']) ? $accountInfo['AccountName'] : '';
        // TODO: Refactor base64 decode.
        $data['accountInfo']['AddressLine1'] = $this->module->checkDecode($accountInfo['AddressLine1']);
        $data['accountInfo']['AddressLine2'] = $this->module->checkDecode($accountInfo['AddressLine2']);
        $data['accountInfo']['AddressLine3'] = $this->module->checkDecode($accountInfo['AddressLine3']);
        $data['accountInfo']['City']         = $this->module->checkDecode($accountInfo['City']);
        $data['accountInfo']['AccountName']  = $this->module->checkDecode($accountname);
        // Merchant Information
        $data['primaryInfo']['CompanyName']  = $this->module->checkDecode($primaryInfo['CompanyName']);
        $data['primaryInfo']['CustomerName'] = $this->module->checkDecode($primaryInfo['CustomerName']);
        $data['primaryInfo']['AddressLine1'] = $this->module->checkDecode($primaryInfo['AddressLine1']);
        $data['primaryInfo']['AddressLine2'] = $this->module->checkDecode($primaryInfo['AddressLine2']);
        $data['primaryInfo']['AddressLine3'] = $this->module->checkDecode($primaryInfo['AddressLine3']);
        $data['primaryInfo']['City']         = $this->module->checkDecode($primaryInfo['City']);

        if (!isset($accountInfo['ProvinceCode'])) {
            $data['accountInfo']['ProvinceCode'] = 'XX';
        }

        if (!isset($data['firstOrder']['ap_state'])) {
            $data['firstOrder']['ap_state'] = 'XX';
        }

        if (isset($data['firstOrder']['postcode'])) {
            $data['firstOrder']['postcode'] = $this->formatPostalCode($data['firstOrder']['postcode'], false);
        }
    }

    public function insertShipmentData($data, $packageResult, $shipmentId, $shippingFee)
    {
        $firstOrder      = $data['firstOrder'];
        $orders          = $data['orders'];

        $totalOrderValue = $data['totalOrderValue'];
        $country      = $firstOrder['country_name'];
        $customerName = $firstOrder['firstname'] . ' ' . $firstOrder['lastname'];

        if ($firstOrder['ap_city'] !== "") {
            $apId             = $firstOrder['ap_id'];
            $apName           = $firstOrder['ap_name'];
            $shippingAddress1 = $firstOrder['ap_address1'];
            $shippingAddress2 = $firstOrder['ap_address2'];
            $postcode         = (string) $firstOrder['ap_postcode'];
            $city             = $firstOrder['ap_city'];
            $state            = $firstOrder['ap_state']; // state_code -> sai
        } else {
            $apId             = '';
            $apName           = '';
            $shippingAddress1 = $firstOrder['address_delivery1'];
            $shippingAddress2 = $firstOrder['address_delivery2'];
            $postcode         = (string) $firstOrder['postcode'];
            $city             = $firstOrder['city'];
            $state            = (!empty($firstOrder['state'])) ? $firstOrder['state'] : $firstOrder['ap_state'];
        }
        $phone = $firstOrder['phone'];
        $email = $firstOrder['email'];

        $shippingService = $data['shippingServiceInfo']['key'];

        $accessorialsService = serialize($data['accessorialKeys']);
        $created_date = date("Y-m-d H:i:s");
        $cod = (int) $this->hasAccessorialCOD($data['accessorialKeys'], $shippingService);
        $status = 1;
        // Save to Shipment table
        // Have to move it out here. (26-08-2018 UPS)
        $sql = "INSERT INTO " . UPS_SHIPMENT . " (
                `id_ups_shipment`,
                `tracking_number`,
                `id_order`,
                `customer_name`,
                `product`,
                `ap_id`,
                `ap_name`,
                `shipping_address1`,
                `shipping_address2`,
                `postcode`,
                `city`,
                `state`,
                `country`,
                `phone`,
                `email`,
                `shipping_service`,
                `package_detail`,
                `accessorials_service`,
                `create_date`,
                `cod`,
                `order_value`,
                `shipping_fee`,
                `status`
            ) VALUES";

        foreach ($orders as $order) {
            if (is_array($packageResult)) {
                $i = 0; // Package index;

                foreach ($packageResult as $result) {
                    $package       = $data['packages'][$i];
                    $packageDetail =
                        $package['length'] . 'x' .
                        $package['width'] . 'x' .
                        $package['height'] . ' ' .
                        $package['unit_dimension'] . ', ' .
                        $package['weight'] .
                        $package['unit_weight'];

                    $sql .= "('"
                    . pSQL($shipmentId) . "','"
                    . pSQL($result->TrackingNumber) . "','"
                    . (int) $order['id_order'] . "','"
                    . pSQL($customerName) . "','"
                    . pSQL($order['products']) . "','"
                    . pSQL($apId) . "','"
                    . pSQL($apName) . "','"
                    . pSQL($shippingAddress1) . "','"
                    . pSQL($shippingAddress2) . "','"
                    . pSQL($postcode) . "','"
                    . pSQL($city) . "','"
                    . pSQL($state) . "','"
                    . pSQL($country) . "','"
                    . pSQL($phone) . "','"
                    . pSQL($email) . "','"
                    . pSQL($shippingService) . "','"
                    . pSQL($packageDetail) . "','"
                    . pSQL($accessorialsService) . "','"
                    . pSQL($created_date) . "','"
                    . pSQL($cod) . "','"
                    . pSQL($totalOrderValue) . "','"
                    . pSQL($shippingFee) . "','"
                    . (int) $status . "'),";

                    $i++;
                }
            } else {
                $package = $data['packages'][0];

                $packageDetail =
                    $package['length'] . 'x' .
                    $package['width'] . 'x' .
                    $package['height'] . ' ' .
                    $package['unit_dimension'] . ', ' .
                    $package['weight'] .
                    $package['unit_weight'];

                $sql .= "('"
                . pSQL($shipmentId) . "','"
                . pSQL($packageResult->TrackingNumber) . "','"
                . (int) $order['id_order'] . "','"
                . pSQL($customerName) . "','"
                . pSQL($order['products']) . "','"
                . pSQL($apId) . "','"
                . pSQL($apName) . "','"
                . pSQL($shippingAddress1) . "','"
                . pSQL($shippingAddress2) . "','"
                . pSQL($postcode) . "','"
                . pSQL($city) . "','"
                . pSQL($state) . "','"
                . pSQL($country) . "','"
                . pSQL($phone) . "','"
                . pSQL($email) . "','"
                . pSQL($shippingService) . "','"
                . pSQL($packageDetail) . "','"
                . pSQL($accessorialsService) . "','"
                . pSQL($created_date) . "','"
                . pSQL($cod) . "','"
                . pSQL($totalOrderValue) . "','"
                . pSQL($shippingFee) . "','"
                . (int) $status . "'),";
            }
        }

        $sql = rtrim($sql, ', ');

        Db::getInstance()->execute($sql);
    }

    private function hasAccessorialCOD($accessorials, $shippingService)
    {
        if (empty($accessorials)) {
            return 0;
        }

        $codAss = $this->getCODAccessorial($shippingService);

        foreach ($accessorials as $accessorial) {
            if ($accessorial == $codAss) {
                return 1;
            }
        }

        return 0;
    }

    public function updateOpenOrderStatus($orderIds, $status)
    {
        if (is_array($orderIds)) {
            $orderIds = implode(",", array_map('intval', $orderIds));
        } elseif (!empty($orderIds)) {
            $orderIds = (int) $orderIds;
        }

        return Db::getInstance()->update(
            'ups_openorder',
            array('status' => pSQL($status)),
            "`id_order` IN (" . $orderIds . ")"
        );
    }

    private function suggestion($candidates)
    {
        $str = '';
        $length = count($candidates);

        if ($length > 5) {
            $length = 5;
        }

        if (is_array($candidates)) {
            for ($i = 0; $i < $length; $i++) {
                $str .= '"' . $candidates[$i]->City . ', ' . $candidates[$i]->PostalCode . '"; ';
            }
        } else {
            $str .= '"' . $candidates->City . ', ' . $candidates->PostalCode . '"; ';
        }

        $err1 = $this->sdk->t('err-msg', 'city_err', array('err' => $str));
        $err2 = $this->sdk->t('err-msg', 'city_err_2');
        return $err1 . $err2;
    }

    public function getBingMapsKey()
    {
        $bingmapService = new PluginManager\ToolApi\BingMapsService();
        $result = $bingmapService(array(
            'preToken' => Configuration::get('REGISTERED_TOKEN'),
            'sdk' => $this->sdk
        ));

        Configuration::updateValue('BINGMAPS_KEY', $result->data);

        return is_null($result->error) ? true : false;
    }

    public function collectShopConfigurations($hasMerchantInfo, $accountCreated = array())
    {
        $config = $this->collectConfiguration();
        $package = $this->getPackageForApiTransferMerchantInfo();
        $account = $data = array();

        if (isset($hasMerchantInfo) && $hasMerchantInfo) {
            // It's not The First Account
            if (!empty($accountCreated)) {
                $account = $this->collectAccountJustCreated($accountCreated);
                $account['isFirstAccount'] = false;
                $account['merchantKey'] = Configuration::get('MERCHANT_KEY');
            }

            $data[] = array_merge($config, $account, $package);
        } else {
            Configuration::updateValue('UPS_MERCHANTINFO_EXIST', 1);

            $accounts = $this->module->getListAccount();
            $accountDefault = $this->module->getDefaultAccount($accounts);
            $accountDefault['isFirstAccount'] = true;
            $accountDefault['merchantKey'] = Configuration::get('MERCHANT_KEY');
            $account = $this->collectAccountJustCreated($accountDefault);
            $shippingServices = $this->getShippingServicesActived();
            $deliveryRates = $this->getDeliveryOptions($shippingServices);

            $shippingServices = $this->removeElementWithValue($shippingServices, 'keyDeli');
            $shippingServices = $this->removeElementWithValue($shippingServices, 'keyVal');
            $shippingServices = $this->removeElementWithValue($shippingServices, 'Ratecode');
            $shippingServices = $this->removeElementWithValue($shippingServices, 'TinTcode');

            $deliveryRates = $this->removeElementWithValue($deliveryRates, 'keyDeli');
            $deliveryRates = $this->removeElementWithValue($deliveryRates, 'keyVal');
            $deliveryRates = $this->removeElementWithValue($deliveryRates, 'Ratecode');
            $deliveryRates = $this->removeElementWithValue($deliveryRates, 'TinTcode');

            $data['deliveryRates'] = $deliveryRates;
            $data['shippingServices'] = $shippingServices;
            $data['accessorials'] = array();

            $data = array_merge($config, $account, $data, $package);

            if (count($accounts) > 1) {
                $data = array_merge(array($data), $this->collectAccounts($accounts));
            } else {
                $data = array($data);
            }
        }

        return $data;
    }

    private function collectConfiguration()
    {
        $data = array();
        $data['version'] = $this->sdk->getVersion();
        $data['status'] = 10;
        $data['platform'] = 10;
        $data['website'] = Tools::getHttpHost(true) . __PS_BASE_URI__;
        $data['country'] = Configuration::get('UPS_COUNTRY_SELECTED');
        $data['currencyCode'] = Currency::getCurrencyInstance(Configuration::get('PS_CURRENCY_DEFAULT'))->iso_code;

        return $data;
    }

    private function collectAccountJustCreated($account)
    {   
        $dte = 'm-d-Y';
        $data = array();
        // $data['joiningDate'] = Tools::dateFormat(
        //     date_create(
        //         $this->getJoiningDateAccount($account['AccountNumber'])
        //     ),
        //     $dte
        // );
        $data['joiningDate'] = isset($account['AccountNumber']) ? date($dte ,strtotime($this->getJoiningDateAccount($account['AccountNumber']))) : '';

        return array_merge($data, $account);
    }

    private function collectAccounts($accounts)
    {
        if (!is_array($accounts)) {
            return false;
        }
        $data = array();

        foreach ($accounts as $account) {
            // For the Old VERSION - missing isDefaultAccount on the account default
            if (isset($account['isDefaultAccount']) &&
                !$this->module->checkDefaultAccount($account['isDefaultAccount'])) {
                $account['isFirstAccount'] = false;
                $account['merchantKey'] = Configuration::get('MERCHANT_KEY');
                $data[] = array_merge(
                    $account,
                    $this->collectConfiguration(),
                    $this->collectAccountJustCreated($account),
                    $this->getPackageForApiTransferMerchantInfo()
                );
            }
        }

        return $data;
    }

    private function getPackageForApiTransferMerchantInfo()
    {
        if (Configuration::get('UPS_PKG_SETTING_TYPE')) {
            $packageSettingType = Configuration::get('UPS_PKG_SETTING_TYPE');
            if ($packageSettingType == 1) {
                $data = [];
                if (Configuration::get('UPS_PKG_DEFAULT')) {
                    $listDefaultPackageConfig = unserialize(Configuration::get('UPS_PKG_DEFAULT'));
                    $listDefaultPackage = [];
					foreach ($listDefaultPackageConfig as $package) {    
                        $defaultPackage = [];
                        $defaultPackage['merchantKey'] = Configuration::get('MERCHANT_KEY');
                        $defaultPackage['name'] = isset($package['package_name']) ? $package['package_name'] : 'Package';
                        $defaultPackage['weight'] = $package['weight'];
                        $defaultPackage['weightUnit'] = $package['unit_weight'] == 'kgs' ? 'Kg' : 'Pounds';
                        $defaultPackage['length'] = $package['length'];
                        $defaultPackage['width'] = $package['width'];
                        $defaultPackage['height'] = $package['height'];
                        $defaultPackage['dimensionUnit'] = $package['unit_dimension'];
                        $defaultPackage['packageItem'] = $package['number_of_item'];
                        $listDefaultPackage[] = $defaultPackage;
                    }
                    $data = $listDefaultPackage;
                    $data = [
                        'packageSettingType' => (int)$packageSettingType,
                        'defaultPackage' => $listDefaultPackage
                    ];
                }
            } elseif ($packageSettingType == 2) {
                if (Configuration::get('UPS_PKG_PRODUCT_DIMENSION')) {
                    $listProductDimensionConfig = unserialize(Configuration::get('UPS_PKG_PRODUCT_DIMENSION'));
                }
                $listBackupRate = [];
                if(isset($listProductDimensionConfig['backup_rate'])){
                    foreach ($listProductDimensionConfig['backup_rate'] as $backupRate) {
                        $backupRateItem = [];
                        $backupRateItem['serviceKey'] = $backupRate['service_key'];
                        $backupRateItem['rate'] = (float)$backupRate['rate'];
                        $listBackupRate[] = $backupRateItem;
                    }
                }
                
                /*$listBoxDimension = [];
                foreach ($listProductDimensionConfig['product_dimension'] as $package) {
                    $boxDimension = [];
                    $boxDimension['merchantKey'] = Configuration::get('MERCHANT_KEY');
                    $boxDimension['name'] = $package['package_name'];
                    $boxDimension['weight'] = $package['weight'];
                    $boxDimension['weightUnit'] = $package['unit_weight'] == 'kgs' ? 'Kg' : 'Pounds';
                    $boxDimension['length'] = $package['length'];
                    $boxDimension['width'] = $package['width'];
                    $boxDimension['height'] = $package['height'];
                    $boxDimension['dimensionUnit'] = $package['unit_dimension'];
                    $listBoxDimension[] = $boxDimension;
                }*/
                $data = [
                    'packageSettingType' => (int)$packageSettingType,
                    'includeDimensionsInRating' => isset($listProductDimensionConfig['include_dimension']) ? (int)$listProductDimensionConfig['include_dimension'] : 0,
                    'backupRate' => $listBackupRate,
                    //'boxDimension' => $listBoxDimension
                ];
            }
            return [
                'packageDimension' => $data
            ];
        } else {
            if (Configuration::get('UPS_PKG_1_DIMENSION')) {
                $defaultPackage = unserialize(Configuration::get('UPS_PKG_1_DIMENSION'));
                $data['defaultPackageName'] = $defaultPackage['name'];
                $data['weight'] = $defaultPackage['weight'];
                $data['weightUnit'] = $defaultPackage['weightUnit'] == 'LBS' ? 'Pounds' : 'Kg';
                $data['length'] = $defaultPackage['lenght'];
                $data['width'] = $defaultPackage['width'];
                $data['height'] = $defaultPackage['height'];
                $data['dimensionUnit'] = $defaultPackage['lenghtUnit'] == 'CM' ? 'Cm' : 'Inch';
                return $data;
            }
        }
        return [];
    }

    public function removeElementWithValue($array, $key)
    {
        $m = array();

        foreach ($array as $subArray) {
            if (array_key_exists($key, $subArray)) {
                unset($subArray[$key]);
            }
            array_push($m, $subArray);
        }

        return $m;
    }

    public function getDeliveryOptions($shippingServices)
    {
        $deliveryRates = array();
        foreach ($shippingServices as $service) {
            $deliveryRateService = Configuration::get($service['keyVal']);

            if ($deliveryRateService) {
                if (is_numeric($deliveryRateService)) { // REAL
                    $deliveryRates[] = array(
                        'key'               => $service['key'],
                        'deliveryType'      => 20,
                        'serviceType'       => $service['serviceType'],
                        'serviceName'       => $service['name'],
                        'serviceCode'       => $service['Ratecode'],
                        'minimumOrderValue' => 0,
                        'deliveryValue'     => 0,
                        'realtimeValue'     => (float) $deliveryRateService,
                    );
                } else { //FLAT RATES
                    $arrDeliveryRateServiceAP = unserialize($deliveryRateService);

                    if (!empty($arrDeliveryRateServiceAP)) {
                        foreach ($arrDeliveryRateServiceAP as $rateService) {
                            $deliveryRates[] = array(
                                'key'               => $service['key'],
                                'deliveryType'      => 10,
                                'serviceType'       => $service['serviceType'],
                                'serviceName'       => $service['name'],
                                'serviceCode'       => $service['Ratecode'],
                                'minimumOrderValue' => (isset($rateService['MinValue'])) ? $rateService['MinValue'] : 0,
                                'deliveryValue'     => (isset($rateService['DeliRate'])) ? $rateService['DeliRate'] : 0,
                                'realtimeValue'     => (int) 0,
                            );
                        }
                    }
                }
            }
        }

        return $deliveryRates;
    }

    public function getShippingServices()
    {
        if (Configuration::get('UPS_SP_SERV_AP_DELIVERY') == 1 &&
            Configuration::get('UPS_SP_SERV_ADDRESS_DELIVERY') == 1) {
            return $this->module::$shippingServices->getShippingServices();
        } elseif (Configuration::get('UPS_SP_SERV_AP_DELIVERY') == 1) {
            return $this->module::$shippingServices->getServicesAp();
        } elseif (Configuration::get('UPS_SP_SERV_ADDRESS_DELIVERY') == 1) {
            return $this->module::$shippingServices->getServicesAdd();
        } else {
            return array();
        }
    }

    private function getJoiningDateAccount($accountNumber)
    {
        $sql = new DbQuery();
        $keyAccount = ACCOUNT_NUM_KEY . $accountNumber;

        $sql->select('created_at');
        $sql->from('ups_data');
        $sql->where("key_name ='" . pSQL($keyAccount) . "'");

        return Db::getInstance()->getValue($sql);
    }

    private function getMerchantInfoLog()
    {
        $sql = new DbQuery();

        $sql->select('id');
        $sql->from('ups_logs_api');
        $sql->where("method ='Merchant/TransferMerchantInfo'");

        return Db::getInstance()->getValue($sql);
    }

    public function validateEmail($email)
    {
        if (!Validate::isEmail($email) || Tools::strlen($email) > 50) {
            return 'EmailAddress';
        }
    }

    public function validateFormOption($data, &$result, $hasAccountName = false)
    {
        $CountryCode = isset($data['CountryCode']) ? $data['CountryCode'] : '';
        $v = new Bean\Validator();
        switch ($data['optradio']) {
            case 0:
                $result[] = $v->validVatNumber($data['vatNumber']);
                if (isset($data['promoCode'])) {
                    $result[] = $v->validPromoCode($data['promoCode']);
                }
                break;
            case 1:
                if (isset($data['AccountName'])) {
                    $result[] = $v->validAccName($data['AccountName'], 'AccountName');
                }
                if (isset($data['BusinessName'])) {
                    $result[] = $v->validAccName($data['BusinessName'], 'BusinessName');
                }

                $result[] = $v->validAccNumber($data['AccountNumber'], 'AccountNumber');
                $result[] = $v->validInvoiceAmount($data['InvoiceAmount'], 'InvoiceAmount');
                $result[] = $v->validInvoiceNumber($data['InvoiceNumber'], 'InvoiceNumber');
                if (Tools::strtolower($CountryCode) == 'us') {
                    $result[] = $v->validString('ControlID', $data['ControlID']);
                }
                break;
            case 2:
                if ($hasAccountName) {
                    $result[] = $v->validAccName($data['AccountName1'], 'AccountName1');
                }
                $result[] = $v->validAccNumber($data['AccountNumber1'], 'AccountNumber1');
                break;
            case 3:
                if (isset($data['accnme'])) {
                    $result[] = $v->validAccName($data['accnme'], 'accnme');
                }
                
                $result[] = $v->validAccNumber($data['accno'], 'accno');
                $result[] = $v->validUserID($data['UsrID'], 'UsrID');
                $result[] = $v->validPwd($data['Pwd'], 'Pwd');
                $result[] = $v->validAcssKey($data['AcssKey'], 'AcssKey');
               
            default:
                break;
        }
    }

    private function checkBlank($data = array())
    {
        $valid = array();
        $validator = new Bean\Validator();

        foreach ($data as $key => $val) {
            $tmp = $validator->isBlank($key, $val);

            if (!$tmp && $key != 'PhoneNumber' && $key != 'PostalCode') {
                $valid[] = $validator->validString($key, $val);
            } else {
                $valid[] = $tmp;
            }
        }

        return $valid;
    }

    public function formatPostalCode($postalCode, $keepOriginal)
    {
        if (isset($postalCode)) {
            if ($keepOriginal) { // For Registration API
                return $postalCode;
            } else { // For Shipping API
                // if ($this->module->pluginCountryCode == 'GB') {
                //     return $postalCode; // Portal Code format 7 digit include space.
                // }
                return preg_replace(Constants::PREG_POSTALCODE, '', $postalCode);
            }
        }
    }

    public function reorderList($list)
    {
        return array_values(array_filter($list));
    }

    private function tokenIsExpired()
    {
        $id = Configuration::getIdByName('PRE_KEY');

        $sql = "SELECT `date_upd` FROM `" . _DB_PREFIX_ . "configuration` WHERE `id_configuration` = " . (int) $id;
        $date_upd = Db::getInstance()->getValue($sql, false);

        if (!is_null($date_upd)) {
            $date_upd = new DateTime($date_upd);
            $now = new DateTime('now');

            $interval = date_diff($date_upd, $now);
            if ($interval->d > 1) {
                return true;
            }
        }

        return false;
    }

    private function getToken()
    {
        $id = Configuration::getIdByName('PRE_KEY');

        $sql = "SELECT `value` FROM `" . _DB_PREFIX_ . "configuration` WHERE `id_configuration` = " . (int) $id;
        $token = Db::getInstance()->getValue($sql, false);
        if (!empty($token)) {
            return $token;
        } else {
            $sql = new DbQuery();

            $sql->select('name');
            $sql->select('value');
            $sql->from('configuration');
            $sql->where("name = 'PRE_KEY'");
            $sql->orderBy('id_configuration DESC');

            $content   = Db::getInstance()->executeS($sql);

            $token = Configuration::get('PRE_KEY');
            if (empty($token)) {
                foreach ($content as $item) {
                    if (!empty($item['value'])) {
                        $token = $item['value'];
                        break;
                    }
                }
            }
            return $token;
        }

        return false;
    }

    public function getInformationLink()
    {
        $links = include(PATH_ASSETS_FOLDER . 'Links/support_links.php');
        $countryData = $links[$this->module->pluginCountryCode];
        $lang = $this->module->lang;

        if (array_key_exists($lang, $countryData)) {
            return $countryData[$lang];
        } else {
            return $countryData[$this->module->defaultLanguage];
        }
    }

    public function getCODAccessorial($key)
    {
        if ($this->module::$shippingServices->isShippingToHome($key)) {
            return 'UPS_ACSRL_TO_HOME_COD';
        } else {
            return 'UPS_ACSRL_ACCESS_POINT_COD';
        }
    }
}
