<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 16/05/2019
 */

use PluginManager\CollectionApi\CollectionHandle;

class MerchantInfo extends CollectionHandle
{
    const PATH = 'Merchant/TransferMerchantInfo';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function resolveParam($args)
    {
        $data = array();

        foreach ($args['data'] as $arg) {
            $data = array(
                'isFirstAccount' => (bool) $arg['isFirstAccount'],
                'accountNumber' => $arg['AccountNumber'],
                'joiningDate' => $arg['joiningDate'],
                'website' => $arg['website'],
                'currencyCode' => $arg['currencyCode'],
                'status' => $arg['status'],
                'platform' => $arg['platform'],
                'version' => $arg['version'],
                'postalCode' => $arg['PostalCode'],
                'city' => $arg['City'],
                'country' => $arg['CountryCode'],
            );

            if (isset($arg['merchantKey'])) {
                $data['merchantKey'] = $arg['merchantKey'];
            }

            if (isset($arg['packageDimension'])) {
                $data = array_merge($data, array(
                    'packageDimension' => [
                        [
                        'option' => $arg['packageDimension']['packageSettingType']
                        ]
                    ] ,
                ));
            }

            if (isset($arg['shippingServices'])) {
                $data = array_merge($data, array(
                    'shippingServices' => $arg['shippingServices'],
                    'deliveryRates' => $arg['deliveryRates']
                ));
            }

            if (isset($arg['accessorials'])) {
                $data['accessorials'] = array();
            }
        }

        parent::resolveParam($data);
    }
}
