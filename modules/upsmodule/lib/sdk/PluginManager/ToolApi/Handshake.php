<?php

namespace PluginManager\ToolApi;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use PluginManager\ToolApi\ToolHandle;

class Handshake extends ToolHandle
{
    const PATH = 'SecurityService/Handshake';

    public function __invoke($args = array())
    {
        if ($this->e == null)
        {
            $this->e = new \Exception;
        }
        $this->path = SELF::PATH;

        return parent::__invoke($args);
    }

    protected function responseHandler($response)
    {
        $result = parent::responseHandler($response);

        if (!is_null($result) && $result->data == true) {
            return true;
        } else {
            return false;
        }
    }
}