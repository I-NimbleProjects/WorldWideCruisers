<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 30/07/2018
 */

use PluginManager\CollectionApi\CollectionHandle;

class UpgradePluginVersion extends CollectionHandle
{
    const PATH = 'Merchant/UpgradePluginVersion';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }
}
