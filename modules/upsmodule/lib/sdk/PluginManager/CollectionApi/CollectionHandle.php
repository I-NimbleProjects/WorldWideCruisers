<?php

namespace PluginManager\CollectionApi;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use PluginManager\CommonHandle;

class CollectionHandle extends CommonHandle
{
    public function __invoke($params = array())
    {
        $this->endpoint = COLLECTION_API_URI . $this->path;
        return parent::__invoke($params);
    }

    protected function resolveParam($args)
    {
        $this->time_request = date("Y-m-d H:i:s");
        if (empty($args)) {
            $this->request = [];
        }

        if ('Shipment/UpdateShipmentStatus' == $this->path || 'Merchant/TransferDefaultPackage' == $this->path) {
            if (isset($args['data'])) {
                $this->request = $args['data'];
            } else {
                $this->request = $args;
            }
        } else {
            if (isset($args['data'])) {
                $this->request[] = $args['data'];
            } else {
                $this->request[] = $args;
            }
        }
    }

    protected function responseHandler($res)
    {
        $data = parent::responseHandler($res);

        if (isset($data->error->errorCode) && $data->error->errorCode == '401') {
            return false;
        }

        return $data;
    }
}