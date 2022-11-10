<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 27/07/2018
 */

use PluginManager\CollectionApi\CollectionHandle;

class ShipmentStatus extends CollectionHandle
{
    const PATH = 'Shipment/UpdateShipmentStatus';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }
}