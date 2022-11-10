<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 16/05/2019
 */

use PluginManager\CollectionApi\CollectionHandle;

class Accessorial extends CollectionHandle
{
    const PATH = 'Merchant/TransferAccessorials';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function resolveParam($args)
    {
        parent::resolveParam(array());
    }
}
