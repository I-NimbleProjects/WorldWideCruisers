<?php

namespace Ups\Api;

/**
 * Created by UPS
 * Created at 20/07/2018
 */

use Ups\Api\CommonHandle;

class Locator extends CommonHandle
{
    const PATH = 'Locator';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;
        // Debug style $return
        $return = parent::__invoke($args);

        return $return;
    }

    protected function responseHandler($response)
    {
        $data = parent::responseHandler($response);

        if (isset($data->LocatorResponse->Response->ResponseStatusCode) && $data->LocatorResponse->Response->ResponseStatusCode == 0)
        {
            return array(
                'Code' => $data
                        ->LocatorResponse
                        ->Response
                        ->Error
                        ->ErrorCode,
                'Description' => $data
                                ->LocatorResponse
                                ->Response
                                ->Error
                                ->ErrorDescription,
            );
        }

        if (!isset($data->LocatorResponse->SearchResults->DropLocation)) { // handle $data null
            return array(
                'Code' => 0,
                'Description' => 'Fail',
                'Data' => null,
            );
        }

        return array(
            'Code' => $data
                    ->LocatorResponse
                    ->Response
                    ->ResponseStatusCode,
            'Description' => $data
                            ->LocatorResponse
                            ->Response
                            ->ResponseStatusDescription,

            'Data' => $data
                    ->LocatorResponse
                    ->SearchResults
                    ->DropLocation
        );
    }

    protected function resolveParam($args)
    {
        $data = array(
            "AccessRequest" => array(
                "AccessLicenseNumber" => $args['LicenseKey'],
                "Username" => $args['Username'],
                "Password" => $args['Password']
            ),
            "LocatorRequest" => array(
                "Request" => array(
                    "RequestAction"=> "Locator",
                    "RequestOption"=> "64",
                    "TransactionReference"=>""
                ),
                "OriginAddress" => array(
                    "PhoneNumber"=> "",
                    "AddressKeyFormat"=>array(
                        "SingleLineAddress" => $args['fullAddress'],
                        "CountryCode"=> $args['countryCode']
                    )
                ),
                "Translate" => array(
                    "Locale"=> $args['locale'],
                ),
                "UnitOfMeasurement" => array(
                    "Code"=> $args['unitOfMeasurement'],
                ),
                "LocationSearchCriteria" => array(
                    "MaximumListSize"=> $args['maximumListSize'],
                    "SearchRadius"=> $args['nearby']
                )
            )
        );

        $this->time_request = date("Y-m-d H:i:s");
        $this->request = $data;
    }
}
