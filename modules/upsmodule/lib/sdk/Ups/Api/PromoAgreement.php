<?php

namespace Ups\Api;

/**
 * Created by UPS
 * Created at 18/07/2018
 */

use Ups\Api\CommonHandle;

class PromoAgreement extends CommonHandle
{
    const PATH = 'PromoDiscount';

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

        if ( isset($data->Fault) )
        {
            $fault = $this->formatFault($data);

            return $fault;
        }

        if (isset($data->PromoDiscountAgreementResponse))
        {
            $res = $this->formatReturn($data, 'PromoDiscountAgreementResponse');
            $res['Agreement'] = $data;
        } else {
            $res = [
                'Code' => -1,
                'Description' => 'No internet connection'
            ];
        }

        return $res;
    }

    protected function resolveParam($args)
    {
        CommonHandle::transliterator($args);

        $data = [
            'PromoDiscountAgreementRequest' => [
                'PromoCode' => $args['promoCode'],
                'Locale' => [
                    'LanguageCode' => $args['LanguageCode'],
                    'CountryCode' => $args['CountryCode']
                ]
            ]
        ];

        // Debug style for return data
        parent::resolveParam($data);
    }

}
