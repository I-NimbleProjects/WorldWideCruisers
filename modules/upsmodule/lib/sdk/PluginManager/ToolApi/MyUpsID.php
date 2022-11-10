<?php

namespace PluginManager\ToolApi;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use PluginManager\ToolApi\ToolHandle;

class MyUpsID extends ToolHandle
{
    const PATH = 'SecurityService/MyUpsID';

    public function __invoke($args = array())
    {
        if ($this->e == null)
        {
            $this->e = new \Exception;
        }
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function resolveParam($args)
    {
        parent::resolveParam(array());
    }

    protected function responseHandler($response)
    {
        $result = parent::responseHandler($response);

        return $result->data;
    }
}