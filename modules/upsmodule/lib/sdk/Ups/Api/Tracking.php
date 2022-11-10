<?php

namespace Ups\Api;

/**
 * Created by UPS
 * Created at 24/07/2018
 */

use Ups\Api\CommonHandle;

class Tracking extends CommonHandle
{
    CONST PATH = 'Track';

    public function __invoke($args = array())
    {
        $this->path = SELF::PATH;
        // Debug style $return
        $return = parent::__invoke($args);

        return $return;
    }

    protected function responseHandler($response)
    {
        $data = parent::responseHandler($response);

        if (isset($data->Fault))
        {
            return $this->formatFault($data);
        }

        $return = $this->formatReturn($data, 'TrackResponse', 'Tracking');

        return $return;
    }

    protected function resolveParam($args)
    {
        $data = $this->trackingData($args);

        // Debug style for return data
        parent::resolveParam($data);
    }

    private function trackingData($args)
    {
        // if (DEVELOPMENT)
        // {
        //     $args['shipmentId'] = '1Z12345E0205271688';
        // }

        return [
            "TrackRequest"=> [
                "Request"=> [
                    "RequestOption"=> '',
                    "TransactionReference"=> [
                        "CustomerContext"=> ''
                    ]
                ],
                "InquiryNumber"=> $args['shipmentId'],
            ]
        ];
    }
}