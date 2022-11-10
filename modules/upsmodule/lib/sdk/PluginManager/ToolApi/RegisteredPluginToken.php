<?php

namespace PluginManager\ToolApi;

/**
 * Created by UPS
 * Created at 03/05/2019
 */

use PluginManager\ToolApi\ToolHandle;

class RegisteredPluginToken extends ToolHandle
{
    const PATH = 'SecurityService/RegisteredPluginToken';

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
        $data = [
            "WebstoreMetadata"=> [
                "MerchantKey"=> $args['data']['MerchantKey'],
                "WebstoreUrl"=> $args['data']['WebstoreUrl'],
                "WebstoreUpsServiceLinkSecurityToken"=> $args['data']['WebstoreUpsServiceLinkSecurityToken'],
                "WebstorePlatform"=> "PrestaShop",
                "WebstorePlatformVersion"=> $args['data']['WebstorePlatformVersion'],
                "UpsReadyPluginName"=> "UPS Access Point and Shipping=> Official Module",
                "UpsReadyPluginVersion"=> $args['data']['UpsReadyPluginVersion']
            ],
            "UPSSecurity"=> [
                "UsernameToken"=> [
                    "Username"=> $args['data']['UPSAccountMerchant']['Username'],
                    "Password"=> $args['data']['UPSAccountMerchant']['Password'],
                ],
                "ServiceAccessToken"=> [
                    "AccessLicenseNumber"=> $args['data']['UPSAccountMerchant']['LicenseKey']
                ]
            ]
        ];

        parent::resolveParam($data);
    }
}