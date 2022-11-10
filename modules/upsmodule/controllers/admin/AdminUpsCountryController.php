<?php
/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

require_once dirname(__FILE__) . '/../../common/CommonController.php';

class AdminUpsCountryController extends CommonController
{
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();

        if (Configuration::get('UPS_TC_AGREED')) {
            Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminUpsAccount'));
        }

        $this->show_form_cancel_button = false;
        $this->fields_form = $this->createForm();
        $this->fields_value = array(
            'UPS_COUNTRY_SELECTED' => Configuration::get('UPS_COUNTRY_SELECTED'),
        );
    }

    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->l('AdminUpsCountry');
    }

    public function initContent()
    {
        $this->display = 'edit';
        parent::initContent();
    }

    public function createForm()
    {
        $check_status = $this->preCheck();

        if($check_status) {
            return array(
                'legend' => array(
                'title' => $this->sdk->t('ups', 'country_setting'),
                'icon'  => 'icon-globe',
            ),
            'input'  => array(
                array(
                    'type'    => 'select',
                    'label'   => $this->sdk->t('ups', 'country_selected'),
                    'name'    => 'UPS_COUNTRY_SELECTED',
                    'class'   => 'fixed-width-sm',
                    'options' => array(
                        'query' => $this->processCountriesList(),
                        'id'    => 'id_configuration',
                        'name'  => 'name',
                    ),
                ),
            ),
            'submit' => array(
                'title' => $this->sdk->t('button', 'txtCon'),
                'name'  => 'submitCountry',
                'icon'  => 'process-icon-next',
            ),
        );
      }
    }

    public function preCheck() {
        $path = _PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/ups_precheck/precheck_status.tpl';
        $path_icon = _PS_MODULE_DIR_ . $this->module->name . '/views/templates/admin/views/css/icon.css';
        $no_error = true;

        //SSL INFO
        $ssl_info = '<i class="icon-check-circle" style="color: green;"></i>';
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
           $ssl_info = '<i class="icon-minus-circle" style="color: red;"></i>';
           $no_error = false;
        }
        //MAINTAINACE INFO
        $maintainance_info = '<i class="icon-check-circle" style="color: green;"></i>';
        if (!Configuration::get('PS_SHOP_ENABLE')) {
            $maintainance_info = '<i class="icon-minus-circle" style="color: red;"></i>';
            $no_error = false;
        }
        //URL CHECK
        $url_check_info_1 = 'https://fa-ecptools-prd.azurewebsites.net';
        $url_check_info_2 = 'https://onlinetools.ups.com/';
        $url_check_info_3 = 'https://fa-ecpanalytics-prd.azurewebsites.net';
        $res1 = $this->ProcessCurl($url_check_info_1);
        $res2 = $this->ProcessCurl($url_check_info_2);
        $res3 = $this->ProcessCurl($url_check_info_3);
        
        if ($res1 != '200') {
            $no_error = false;
            $url_check_info_1 = '<i class="icon-minus-circle" style="color: red;"></i>';
            
        } else {
            $url_check_info_1 = '<i class="icon-check-circle" style="color: green;"></i>';
        }

        if ($res1 != '200') {
            $url_check_info_2 = '<i class="icon-minus-circle" style="color: red;"></i>';
            $no_error = false;
        } else {
            $url_check_info_2 = '<i class="icon-check-circle" style="color: green;"></i>';
        }

        if ($res1 != '200') {
            $url_check_info_3 = '<i class="icon-minus-circle" style="color: red;"></i>';
            $no_error = false;
        } else {
            $url_check_info_3 = '<i class="icon-check-circle" style="color: green;"></i>';
        }
        
       if(!$no_error) {
        $this->context->smarty->assign('ssl_info', $ssl_info);
        $this->context->smarty->assign('maintainance_info', $maintainance_info);
        $this->context->smarty->assign('url_check_info_1', $url_check_info_1);
        $this->context->smarty->assign('url_check_info_2', $url_check_info_2);
        $this->context->smarty->assign('url_check_info_3', $url_check_info_3);
        $this->content = $this->context->smarty->createTemplate($path)->fetch();
       }
       return $no_error;
    }
    
    //Process Curl for UPS Links
    public function ProcessCurl($url_check_info) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_check_info);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $rt = curl_exec($ch);
        $info = curl_getinfo($ch);
        return $info["http_code"];
    }

    private function processCountriesList()
    {
        $tmp = array();

        foreach ($this->module->pluginCountryList as $isoCode => $country) {
            $tmp[] = array(
                'id_configuration' => $isoCode,
                'name' => $country
            );
        }

        return $tmp;
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitCountry') && Tools::getIsset('UPS_COUNTRY_SELECTED')) {
            $country = Tools::getValue('UPS_COUNTRY_SELECTED');
            Configuration::updateValue('UPS_COUNTRY_SELECTED', $country);
            Configuration::updateValue('UPS_READY_TO_GET_TC', 1);
            $count = 0;
            $this->getTermAndCondition($country, $count);
            return Tools::redirectAdmin(Context::getContext()->link->getAdminLink('AdminUpsTermCondition'));
        }
    }

    private function getTermAndCondition($country, $count = 0)
    {
        $token = $this->module->getPreTokenKey();
        $licenseRes = [];
        if (empty($token)) {
            if ($count > 3) {
                $licenseRes['Content'] = $this->sdk->t('ups', 'cannot_get');
            } else {
                $this->module->doHandShake();
                $count++;
                $this->getTermAndCondition($country, $count);
            }
        } else {
            $this->licenseApi = new PluginManager\ToolApi\License();
            $this->licenseApi->setAccessLicenseAgreementRequest();
            $client = $this->licenseApi;
            $licenseRes = $client(array(
                'CountryCode'  => $country,
                'LanguageCode' => Tools::strtoupper($this->context->language->iso_code),
                'preToken' => $token,
                'sdk' => $this->sdk
            ));
            $licenseIsoCode = '';
            if (!empty(Tools::strtoupper($this->context->language->iso_code))) {
                $licenseIsoCode = pSQL(Tools::strtoupper($this->context->language->iso_code));
            }
            if (!empty($licenseRes['Content'])) {
                $text = $licenseRes['Content'];
                if (function_exists('iconv')) {
                    if ($this->module->lang == 'it' && Configuration::get('UPS_COUNTRY_SELECTED') == 'IT') {
                        $text = iconv(mb_detect_encoding($licenseRes['Content'], mb_detect_order(), true), "ISO-8859-1", $licenseRes['Content']); // Except fr-FR
                    }
                }
                $licenseContent = pSQL($text);
                Db::getInstance()->insert(
                    'ups_data',
                    array(
                        array('key_name' => 'Term', 'ups_value' => $licenseContent),
                        array('key_name' => 'Country', 'ups_value' => pSQL($country)),
                        array(
                            'key_name' => 'Language',
                            'ups_value' => $licenseIsoCode
                        )
                    )
                );
            }
        }
    }
}
?>