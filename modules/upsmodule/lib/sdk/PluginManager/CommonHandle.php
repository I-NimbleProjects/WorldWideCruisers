<?php

namespace PluginManager;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use Sdk\mycurl;
use Sdk\Handle;

class CommonHandle extends Handle
{
    public function __invoke($params = array())
    {
        parent::__invoke($params);

        $auth = array();
        if (isset($params['preToken'])) {
            $token = $params['preToken'];
            $auth = array("Authorization: Bearer $token");
        }

        // Resolve param
        $this->resolveParam($params);

        // Call api
        $mycurl = new mycurl($this->endpoint);
        $mycurl->setPost(json_encode($this->request));
        $mycurl->createCurl($auth);

        // Set response data
        $result = $this->responseHandler($mycurl->__tostring());

        // Write logs api
        $this->writeLogsApiDB();

        // Call api WriteLogger
        if (isset($this->response->error->errorCode) && $this->path != 'Merchant/WriteLogger') {
            // Return false when error 401
            if ($this->response->error->errorCode == '401') {
                $result = false;
            }
            $this->saveLogAPI();
        }

        return $result;
    }
}
