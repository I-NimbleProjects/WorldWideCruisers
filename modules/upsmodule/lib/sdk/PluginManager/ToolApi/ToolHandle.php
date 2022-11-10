<?php

namespace PluginManager\ToolApi;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use PluginManager\CommonHandle;

class ToolHandle extends CommonHandle
{
    public function __invoke($params = array())
    {
        $this->endpoint = TOOL_API_URI . $this->path;
        return parent::__invoke($params);
    }

    protected function resolveParam($args)
    {
        $this->time_request = date("Y-m-d H:i:s");
        if (isset($args['data'])) {
            $this->request = $args['data'];
        } else {
            $this->request = $args;
        }
    }
}
