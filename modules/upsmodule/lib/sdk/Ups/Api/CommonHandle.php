<?php

namespace Ups\Api;

use Sdk\mycurl;
use Sdk\Handle;

class CommonHandle extends Handle
{
    const COUNTRY_EU = [
        "Austria" => "AT",
        "Belgium" => "BE",
        "Bulgaria" => "BG",
        "Croatia" => "HR",
        "Cyprus" => "CY",
        "CzechRepublic" => "CZ",
        "Denmark" => "DK",
        "Estonia" => "EE",
        "Finland" => "FI",
        "France" => "FR",
        "Germany" => "DE",
        "Greece" => "GR",
        "Hungary" => "HU",
        "Ireland" => "IE",
        "Italy" => "IT",
        "Latvia" => "LV",
        "Lithuania" => "LT",
        "Luxembourg" => "LU",
        "Malta" => "MT",
        "Netherlands" => "NL",
        "Poland" => "PL",
        "Portugal" => "PT",
        "Romania" => "RO",
        "Slovakia" => "SK",
        "Slovenia" => "SI",
        "Spain" => "ES",
        "Sweden" => "SE",
        "UnitedKingdom" => "GB",
    ];

    const SHIPMENT_LEVEL = 'Shipment';
    const PACKAGE_LEVEL = 'Package';

    protected static $term;
    protected $upsDatatable = 'ups_data';

    public function __invoke($params = array())
    {
        parent::__invoke($params);

        $this->endpoint = UPS_URI . $this->path;

        if ($this->path == 'Locator') {
            $this->endpoint = UPS_URI_PRO . $this->path;
        }
        $this->resolveParam($params);

        $mycurl = new mycurl($this->endpoint);
        $mycurl->setPost(json_encode($this->request));
        $mycurl->createCurl();

        if (DEVELOPMENT)
        {
            $curlError = $mycurl->getError();
            if (!empty($curlError))
            {
                // hua($curlError);
            }
        }

        $responseFormat = $this->responseHandler($mycurl->__tostring());
        $this->writeLogsApiDB();

        if (is_object($this->response) && property_exists($this->response, 'Fault')) {
            $this->saveLogAPI();
        }

        return $responseFormat;
    }

    protected function resolveParam($args)
    {
        $username = $this->sdk->getUsername();
        $password = $this->sdk->getPassword();
        $license = $this->sdk->getLicense();

        if (isset($username) && $username) {
            $args['UPSSecurity'] = [
                "UsernameToken" => [
                    "Username" =>
                        isset($username) ? $username : 'nousername',
                    "Password" =>
                        isset($password) ? $password : 'nopassword'
                ],
                "ServiceAccessToken" => [
                    "AccessLicenseNumber" =>
                        isset($license) ? $license : 'nokey'
                ]
            ];
        }

        $this->time_request = date("Y-m-d H:i:s");
        $this->request = $args;
    }
}