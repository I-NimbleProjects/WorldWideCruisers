<?php
namespace PluginManager\ToolApi;

use Ups\Sdk;
use PluginManager\ToolApi\ToolHandle;

class OpenAccount extends ToolHandle
{
    CONST PATH = 'UpsReadyProvider/OpenAccount';
    CONST PICKUP_ADDRESS_CANDIDATE = '9580101';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;
        if ($this->e == null)
        {
            $this->e = new \Exception;
        }
        return parent::__invoke($args);
    }

    protected function responseHandler($response)
    {
        $data = parent::responseHandler($response);

        if (isset($data->Fault))
        {
            return $this->formatFault($data);
        }

        if (!isset($data->OpenAccountResponse))
        {
            return [
                'Code' => -1,
                'Description' => 'No internet connection'
            ];
        }

        $alert = $this->hasAddressCandidatesAlert($data->OpenAccountResponse);

        if ($alert) {

            return [
                'Code' => SELF::PICKUP_ADDRESS_CANDIDATE,
                'Description' => $alert
            ];
        }

        return $this->formatReturn($data, 'OpenAccountResponse', 'OpenAccount');
    }

    private function hasAddressCandidatesAlert($res)
    {
        if (isset($res->Response->Alert)) {

            $alert = $res->Response->Alert;

            switch ($alert->Code) {
                case SELF::PICKUP_ADDRESS_CANDIDATE:
                    return $res->PickupAddressCandidate;
                    break;

                default:
                    break;
            }
        }

        return false;
    }

    protected function resolveParam($args)
    {
        ToolHandle::transliterator($args);
        
        $serviceCode =  '02';
        if (strtolower($args['CountryCode']) == 'us') {
            $serviceCode =  '01';
        }
        
        $data = [
            "OpenAccountRequest" => [
                "Locale" => ToolHandle::getLocale($args['LanguageCode'], $args['CountryCode']),
                "CustomerServiceCode" => "$serviceCode",
                "Request" => [
                    "TransactionReference" => [
                        "CustomerContext" => "",
                        "TransactionIdentifier" => ""
                    ]
                ],
                "AccountCharacteristics" => [
                    "CustomerClassification" => [
                        "Code" => "01"
                    ]
                ],
                "EndUserInformation" => [
                    "EndUserIPAddress" => $this->getClientIP(),
                    "EndUserEmail" => $args['EmailAddress'],
                    "EndUserMyUPSID" => $args['MyUpsID'],
                    "DeviceIdentity" => $args['ioBlackBox']
                ],
                "BillingAddress" => [
                    "ContactName" => $args['CustomerName'],
                    "CompanyName" => $args['CompanyName'],
                    "StreetAddress" => $args['AddressLine1'],
                    "City" => $args['City'],
                    "CountryCode" => $args['CountryCode'],
                    "PostalCode" => $args['PostalCode'],
                    "Phone" => [
                        "Number" => $args['PhoneNumber']
                    ]
                ],
                "PickupAddress" => [
                    "ContactName" => $args['CustomerName'],
                    "CompanyName" => $args['CompanyName'],
                    "StreetAddress" => $args['AddressLine1'],
                    "City" => $args['City'],
                    "CountryCode" => $args['CountryCode'],
                    "PostalCode" => $args['PostalCode'],
                    "Phone" => [
                        "Number" => $args['PhoneNumber']
                    ],
                    "EmailAddress" => $args['EmailAddress'],
                ],
                "PickupInformation" => [
                    "PickupOption" => [
                        "Code" => "08"
                    ]
                ]
            ]
        ];

        if (isset($args['ProvinceCode'])) {
            $data['OpenAccountRequest']['BillingAddress']['StateProvinceCode'] = $args['ProvinceCode'];
            $data['OpenAccountRequest']['PickupAddress']['StateProvinceCode'] = $args['ProvinceCode'];
        }

        if (isset($args['vatNumber'])) {
            $data['OpenAccountRequest']['EndUserInformation']['VatTaxID'] = $args['vatNumber'];
        }

        // Open Account API need use Security
        $data['UPSSecurity'] = array();

        parent::resolveParam($data);
    }
}
