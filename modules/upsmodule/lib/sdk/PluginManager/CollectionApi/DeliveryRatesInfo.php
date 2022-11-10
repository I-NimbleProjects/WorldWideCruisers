<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 28/07/2018
 */

use PluginManager\CollectionApi\CollectionHandle;

class DeliveryRatesInfo extends CollectionHandle
{
    const PATH = 'Merchant/TransferDeliveryRates';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function resolveParam($args)
    {
        $param = [
            'merchantKey' => $args['data']['merchantKey'],
            'deliveryRates' => $args['data']['deliveryRates']
        ];

        parent::resolveParam($param);
    }
}
