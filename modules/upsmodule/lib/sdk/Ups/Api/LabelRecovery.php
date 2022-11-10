<?php

namespace Ups\Api;

/**
 * Created by UPS
 * Created at 19/06/2018
 */

use Ups\Api\CommonHandle;

class LabelRecovery extends CommonHandle
{
    const PATH = 'LBRecovery';

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
        $data = parent::responseHandler($response);
        $res = $data->LabelRecoveryResponse;

        if (isset($res))
        {
            $return = [
                'Code' => $res->Response->ResponseStatus->Code,
                'Description' => $res->Response->ResponseStatus->Description,
                'LabelResults' => $res->LabelResults
            ];
        }
        elseif (isset($data->Fault))
        {
            $return = [
                'Code' => $data
                        ->Fault
                        ->detail
                        ->Errors
                        ->ErrorDetail
                        ->PrimaryErrorCode
                        ->Code,
                'Description' => $data
                        ->Fault
                        ->detail
                        ->Errors
                        ->ErrorDetail
                        ->PrimaryErrorCode
                        ->Description
            ];
        }
        else
        {
            $return = [
                'Code' => -1,
                'Description' => 'No internet connection'
            ];
        }

        return $return;
    }

    protected function resolveParam($args)
    {
        $data = [
            'LabelRecoveryRequest' => [
                'RequestOption' => [
                    'SubVersion' => '1701',
                ],
                'LabelSpecification' => [
                    'LabelImageFormat' => [
                        'Code' => $args['labelFormat'],
                    ],
                    'HTTPUserAgent' => 'Mozilla/4.5',
                ],
                'Translate' => [
                    'LanguageCode' => 'eng',
                    'DialectCode' => 'GB',
                    'Code' => '01',
                ],
                'TrackingNumber' => $args['trackingNumber'],
            ]
        ];

        parent::resolveParam($data);
    }
}
