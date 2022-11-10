<?php
/**
  * @author    United Parcel Service of America, Inc.*
  * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
  * @license   This work is Licensed under the Academic Free License version 3.0
  *            http://opensource.org/licenses/afl-3.0.php *
  * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_0_3($object)
{
    return ($object->registerHook('actionAdminControllerSetMedia')
        && $object->registerHook('actionAdminLoginControllerSetMedia')
    );
}
?>