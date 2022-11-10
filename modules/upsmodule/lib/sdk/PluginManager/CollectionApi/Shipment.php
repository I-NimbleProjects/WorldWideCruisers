<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 27/07/2018
 */

use PluginManager\CollectionApi\CollectionHandle;

class Shipment extends CollectionHandle
{
    const PATH = 'Shipment/TransferShipments';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function resolveParam($args)
    {
        $params = [
            'merchantKey' => $args['data']['merchantKey'],
            'accountNumber' => $args['data']['accountNumber'],
            'shipmentId' => $args['data']['shipmentId'],
            'fee' => $args['data']['fee'],
            'revenue' => $args['data']['revenue'],
            'orderDate' => $args['data']['orderDate'],
            'address' => $args['data']['address'],
            'postalCode' => $args['data']['postalCode'],
            'city' => $args['data']['city'],
            'country' => $args['data']['country'],
            'serviceType' => $args['data']['serviceType'],
            'serviceCode' => $args['data']['serviceCode'],
            'serviceName' => $args['data']['serviceName'],
            'isCashOnDelivery' => $args['data']['isCashOnDelivery'],
            'packages' => $args['data']['packages'],
            'products' => array($args['data']['products']),
            'accessorials' => $args['data']['accessorials']
        ];

        parent::resolveParam($params);
    }

}
