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

function upgrade_module_2_0_7($object)
{
    $sql = [];
    // Check column is exist in table
    $query = "SHOW COLUMNS FROM `" . _DB_PREFIX_ . "ups_openorder` 
        WHERE Field='package'";
    $hasPackageColumn = Db::getInstance()->executeS($query);

    if (empty($hasPackageColumn)) {
        // Add column package to table ups open order
        $sql[] = "ALTER TABLE `" . _DB_PREFIX_ . "ups_openorder` 
            ADD COLUMN `package` VARCHAR(1000) AFTER `accessorials_service`";
    }

    // Drop table log data
    $sql[] = "DROP TABLE IF EXISTS `log_data`";

    // Create table log api
    $sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "ups_logs_api` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `method` VARCHAR(255) DEFAULT NULL,
        `full_uri` VARCHAR(255) DEFAULT NULL,
        `request` TEXT,
        `response` TEXT,
        `time_request` TIMESTAMP NULL DEFAULT NULL,
        `time_response` TIMESTAMP NULL DEFAULT NULL,
        PRIMARY KEY (`id`)
    );";

    // Delete unused tab for package dimension
    $sql[] = "DELETE FROM `". _DB_PREFIX_ ."tab` 
        WHERE (
            `class_name` IN (
                'AdminUpsAddPackage',
                'AdminUpsAddPackageBatch'
            ) 
            AND `id_parent` = 0 
            AND `module` = 'upsmodule' 
        );";

    // Execute query
    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }

    return true;
}
?>