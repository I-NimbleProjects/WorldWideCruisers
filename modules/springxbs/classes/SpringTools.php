<?php
/**
 * 2019-2021 Xmlshop LLC
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author Xmlshop LLC <tsuren@xmlshop.com>
 * @copyright  2019-2021 PostNL
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @version  1.4.4
 */

class SpringTools
{
    public static $this_module = 'springxbs';

    public static $this_module_class = 'Springxbs';

    public static $this_carriers;

    public static $popover_flag = true;

    /**
     * Prints the track & trace progress bar on an orders list
     * <br><br>
     * <b>Spring status codes:</b>
     * <table><thead><tr><th width=60>Code</th><th>Explanation</th></tr></thead><tbody>
     * <tr><td>0</td><td>PARCEL CREATED</td></tr>
     * <tr><td>10</td><td>LABEL CREATED</td></tr>
     * <tr><td>1001</td><td>ITEM ON HOLD DUE TO INCOMPLETE DATA</td></tr>
     * <tr><td>1002</td><td>ITEM RELEASED AFTER DATA COMPLETION</td></tr>
     * <tr><td>20</td><td>ACCEPTED</td></tr>
     * <tr><td>21</td><td>IN TRANSIT</td></tr>
     * <tr><td>2101</td><td>IN TRANSIT - EXPORTED</td></tr>
     * <tr><td>2102</td><td>ITEM RELEASED FROM CUSTOMS</td></tr>
     * <tr><td>25</td><td>END OF TRACKING UPDATES</td></tr>
     * <tr><td>31</td><td>DELIVERY EXCEPTION</td></tr>
     * <tr><td>40</td><td>IN CUSTOMS</td></tr>
     * <tr><td>41</td><td>CUSTOMS EXCEPTION</td></tr>
     * <tr><td>4101</td><td>ITEM HELD FOR CUSTOMS INSPECTION</td></tr>
     * <tr><td>91</td><td>DELIVERY ATTEMPTED</td></tr>
     * <tr><td>92</td><td>DELIVERY AWAITING COLLECTION</td></tr>
     * <tr><td>93</td><td>DELIVERY SCHEDULED</td></tr>
     * <tr><td>100</td><td>DELIVERED</td></tr>
     * <tr><td>101</td><td>DELIVERED TO DESTINATION COUNTRY Special for PostNL Packet Bag&Trace (Semi-Tracked)</td></tr>
     * <tr><td>111</td><td>LOST OR DESTROYED</td></tr>
     * <tr><td>11101</td><td>LOST</td></tr>
     * <tr><td>11102</td><td>DESTROYED</td></tr>
     * <tr><td>11103</td><td>ITEM SEIZED BY CUSTOMS</td></tr>
     * <tr><td>121</td><td>COMMERCIAL RETURN: CREATED</td></tr>
     * <tr><td>122</td><td>COMMERCIAL RETURN: IN TRANSIT</td></tr>
     * <tr><td>123</td><td>COMMERCIAL RETURN: RECEIVED</td></tr>
     * <tr><td>124</td><td>RETURN IN TRANSIT</td></tr>
     * <tr><td>12401</td><td>RETURN IN TRANSIT - REFUSED</td></tr>
     * <tr><td>12402</td><td>RETURN IN TRANSIT - UNDELIVERABLE</td></tr>
     * <tr><td>12403</td><td>RETURN IN TRANSIT - DAMAGED</td></tr>
     * <tr><td>12404</td><td>RETURN IN TRANSIT - NOT COLLECTED</td></tr>
     * <tr><td>12405</td><td>RETURN IN TRANSIT - ACCORDING TO AGREEMENT</td></tr>
     * <tr><td>12406</td><td>ITEM RETURNED TO SHIPPER</td></tr>
     * <tr><td>125</td><td>RETURN RECEIVED</td></tr>
     * <tr><td>12501</td><td>RETURN RECEIVED - REFUSED</td></tr>
     * <tr><td>12502</td><td>RETURN RECEIVED - UNDELIVERABLE</td></tr>
     * <tr><td>12503</td><td>RETURN RECEIVED - DAMAGED</td></tr>
     * <tr><td>12504</td><td>RETURN RECEIVED - NOT COLLECTED</td></tr>
     * <tr><td>12505</td><td>RETURN RECEIVED - ACCORDING TO AGREEMENT</td></tr>
     * <tr><td>126</td><td>RETURN COMPLETED</td></tr>
     * </tbody></table>
     *
     * @param string $service
     * @param array $tr
     *
     * @return string
     *
     * @throws Exception
     * @throws PrestaShopException
     * @throws SmartyException
     * @codingStandardsIgnoreStart
     */
    public static function printTrackTrace($service, $tr)
    {
        $output = '';
        $this_module = self::$this_module;
        $this_module_class = self::$this_module_class;
        $status_code = (int)$tr['spring_status'];

        /*$error_and_exception_codes = array(
            121, 122, 124, 12401, 12402, 12403, 12404, 12405,
        );*/
        $finish_statuses = array(
            25, 31, 41, 100, 101, 111, 11101, 11102, 11103, 123, 12406, 125, 12501, 12502, 12503, 12504, 12505, 126,
        );

        if ($status_code < 0) {
            return '';
        }

        switch (true) {
            case $service === 'UNTR':
                $progress = -1;
                break;
            case in_array($status_code, $finish_statuses):
                $progress = 100;
                break;
            case $status_code >= 20:
//            case in_array($status_code, array(20, 21, 2101, 2102)):
                $progress = 50;
                break;
            default:
                $progress = 0;
        }

        $test_mode_msg = $tr['label_test_mode'] ? SpringXbsHelper::l('Test mode') : '';
        $border_style = $test_mode_msg ? 'border-bottom: 1px #f00 solid;' : '';

        Context::getContext()->smarty->assign(array(
            'tracking_number' => $tr['spring_tracking_number'],
            'carrier_tracking_url' => Springxbs::SPRING_TRACKING_URL
                . $tr['spring_tracking_number']
                . ($tr['label_test_mode'] ? '&testMode=1' : ''),
            'progress' => $progress,
            'test_mode_msg' => $test_mode_msg,
            'border_style' => $border_style,
            'not_tracked' => SpringXbsHelper::l('Not tracked'),
        ));

        $location = 'views/templates/admin/ordergrid/icon-tracktrace.tpl';
        $module = Module::getInstanceByName($this_module);
        $reflection = new ReflectionClass($this_module_class);
        $module_overridden = !file_exists(dirname($reflection->getFileName()) . '/' . $location);
        $output .= $module->display(
            $module_overridden ? _PS_MODULE_DIR_ . "{$this_module}/{$this_module}.php" : $reflection->getFileName(),
            $location
        );

        return $output;
    }

    /**
     * Shows popup on orders grid and shortcut to print label for the order
     *
     * @param int $id
     * @param array $tr
     *
     * @return string
     *
     * @throws Exception
     * @throws PrestaShopException
     * @throws SmartyException
     * @codingStandardsIgnoreStart
     */
    public static function printLabelIcon($id, $tr)
    {
        $output = '';

        $this_module = self::$this_module;
        $this_module_class = self::$this_module_class;

        $label_exists = $id >= 0;
        $cannot_order_shipment_text = false;

        $order = new Order($tr['id_order']);
        $id_order_carrier = $order->getIdOrderCarrier();

        if (!$id_order_carrier) {
            $cannot_order_shipment_text = SpringXbsHelper::l('Virtual product cannot be shipped by physical carrier');
        }

        if (!$cannot_order_shipment_text && !$label_exists) {
            $result = AdminSpringxbsApiController::canCreateLabel($tr['id_order']);
            $cannot_order_shipment_text = !empty($result['error']) ? $result['error'] : false;
        }

        $location = 'views/templates/admin/ordergrid/icon-popover.tpl';
        $module = Module::getInstanceByName($this_module);
        $reflection = new ReflectionClass($this_module_class);
        $module_overridden = !file_exists(dirname($reflection->getFileName()) . '/' . $location);

        $address = new Address($order->id_address_delivery);
        $customer = new Customer($order->id_customer);
        $carrier = new Carrier($order->id_carrier);

        $language_id = Context::getContext()->language->id;

        if ($id_order_carrier && !self::$this_carriers) {
            $only_active = true;
            $active_modules_carriers = Carrier::getCarriers(
                $language_id,
                $only_active,
                false,
                false,
                null,
                Carrier::ALL_CARRIERS
            );

            foreach ($active_modules_carriers as $_carrier) {
                self::$this_carriers[$_carrier['id_reference']] = $_carrier['id_reference'];
            }
        }

        $carrier_id_service_code = Springxbs::getCarrierServiceCodes();
        $service_names = json_decode(SpringXbsHelper::get(Springxbs::SPRINGXBS_CARRIERS_SERVICES_NAMES), true) ?: array();
        $carriers_to_set_list = array();

        if ($id_order_carrier && !$label_exists) {
            foreach ($carrier_id_service_code as $_id_carrier => $service_code) {
                // active carriers only !important
                if (!isset(self::$this_carriers[$_id_carrier])) {
                    continue;
                }

                $code_name = isset($service_names[$service_code]) ? $service_names[$service_code] : $service_code;
                $carriers_to_set_list[] = array(
                    'id' => $_id_carrier,
                    'service_code' => $service_code,
                    'service_name' => $code_name,
                    'active' => $_id_carrier == $carrier->id_reference ? 'warning' : 'primary',
                    'current' => $_id_carrier == $carrier->id_reference,
                    'form_shipping_carrier' => $_id_carrier,
                );
            }
        }

        $test_mode_msg = $tr['label_test_mode'] ? SpringXbsHelper::l('Test mode') : '';
        $border_style = $test_mode_msg ? 'border-bottom: 1px #f00 solid;' : '';

        if ($cannot_order_shipment_text != false || (int)$tr['spring_error_level'] === 1) {
            $label_link_bg = "#fbbb22";
        } else {
            $label_link_bg = "transparent";
        }

        $label_reprint_text = '';

        if ((int)$tr['spring_error_level'] === 1) {
            $label_reprint_text = SpringXbsHelper::l('The label is temporary, please reorder it');
        }

        $void_label_link = '';
        $parcel_prefilled_dimensions = array();

        if ($label_exists) {
            $void_label_link = Springxbs::appendQueryToUrl(
                Context::getContext()->link->getAdminLink('AdminSpringxbsApi'),
                array(
                    'ajax' => '1',
                    'action' => 'voidLabel',
                    'id_order' => $tr['id_order'],
                )
            );
            $dimensions = AdminSpringxbsApiController::getShipmentDimensions($tr['id_order']);
        } else {
            $parcel_prefilled_dimensions = self::getParcelDimensions($tr['id_order']);
        }

        /*if (Springxbs::$_ps_version >= 1700) {
            $form_link = Springxbs::getSetCarrierLink($tr['id_order']);
        } else {*/
        $form_link = Springxbs::appendQueryToUrl(
            Context::getContext()->link->getAdminLink('AdminSpringxbsApi'),
            array(
                'id_order' => $tr['id_order'],
                'ajax' => '1',
                'action' => 'changeOrderCarrier',
            )
        );
        /*}*/

        $totals = array(
            'tax' => 0.00,
            'duty' => 0.00,
            'currency' => '',
        );

        if (!empty($dimensions) && $dimensions['ddp'] === 'DDP') {
            $shipment_data = json_decode(AdminSpringxbsApiController::getShipmentStatic($tr['id_order'])['data'])
                ->response_shipment
                ->DdpInfo
                ->landedCost;

            switch (true) {
                case $shipment_data->totalTax->sourceValue > 0 || $shipment_data->totalDuty->sourceValue > 0:
                    $tax = $shipment_data->totalTax->sourceValue;
                    $duty = $shipment_data->totalDuty->sourceValue;
                    $currency = $shipment_data->sourceCurrency;
                    break;
                case $shipment_data->totalTax->destinationValue > 0 || $shipment_data->totalDuty->destinationValue > 0:
                    $tax = $shipment_data->totalTax->destinationValue;
                    $duty = $shipment_data->totalDuty->destinationValue;
                    $currency = $shipment_data->destinationCurrency;
                    break;
                default:
                    $tax = 0.00;
                    $duty = 0.00;
                    $currency = '';
            }

            $totals = array(
                'tax' => $tax,
                'duty' => $duty,
                'currency' => $currency,
            );
        }

        Context::getContext()->smarty->assign(array(
            'id' => $tr['id_order'],
            'label_link' => Springxbs::getApiAjaxLink(
                $tr['id_order'],
                !$label_exists ? 'createLabel' : 'printLabel'
            ),
            'label_link_title' => SpringXbsHelper::l($label_exists ? 'Reprint label' : 'Get label'),
            'cannot_order_shipment_text' => SpringXbsHelper::l($cannot_order_shipment_text),
            'label_link_bg' => $label_link_bg,
            'label_exists' => $label_exists,

            'firstname' => $address->firstname,
            'lastname' => $address->lastname,
            'address1' => $address->address1,
            'postcode' => $address->postcode,
            'city' => $address->city,
            'state' => State::getNameById($address->id_state),
            'country' => Country::getNameById($customer->id_lang, $address->id_country),
            'email' => $customer->email,
            'order_reference' => $order->reference,
            'carriers_to_set_list' => $carriers_to_set_list,

            'form_link' => $form_link,
            'form_submitShippingNumber' => 1,
            'form_id_order_carrier' => $id_order_carrier,
            'form_shipping_tracking_number' => 'temporary-value',//$order->getWsShippingNumber(),

            'test_mode_msg' => $test_mode_msg,
            'border_style' => $border_style,

            'error_level_1' => (int)$tr['spring_error_level'] === 1,
            'reprint_by_api_link_text' => SpringXbsHelper::l('Reorder label'),
            'label_reprint_text' => $label_reprint_text,
            'reprint_by_api_link' => Springxbs::appendQueryToUrl(
                Context::getContext()->link->getAdminLink('AdminSpringxbsApi'),
                array(
                    'ajax' => '1',
                    'action' => 'reorderLabel',
                    'id_order' => $tr['id_order'],
                    'output' => 1,
                )
            ),
            'popover_flag' => self::$popover_flag,

            'void_label_text' => SpringXbsHelper::l('Cancel label'),
            'void_label_link' => $void_label_link,
            'prefix' => __CLASS__,
            'label_check_link' => $module->getShipmentCheckUrl($tr['id_order']),
            'parcel_prefilled_dimensions' => $parcel_prefilled_dimensions,
            'parcel_dimensions' => isset($dimensions) ? $dimensions : false,
            'can_get_label' => !$cannot_order_shipment_text,
            'save_dimensions_link' => Springxbs::getApiAjaxLink(
                $tr['id_order'],
                'saveDimensionsTemporary'
            ),
            'dimensions_not_saved_confirm' => SpringXbsHelper::l('Dimensions not saved, continue?'),
            'totals' => $totals,

        ));

        self::$popover_flag = false;

        $output .= $module->display(
            $module_overridden
                ? _PS_MODULE_DIR_ . "{$this_module}/{$this_module}.php"
                : $reflection->getFileName(),
            $location
        );

        return $output;
    }

    /**
     * @param $id_lang
     * @param $id_shop
     * @throws PrestaShopDatabaseException
     */
    public static function exportProductsCsvV16plus($id_lang, $id_shop)
    {
        $sql = "SELECT 
             p.`id_product`  AS `id_product`,
             p.`reference`  AS `reference`,
             p.`price`  AS `price`,
             pl.`name`  AS `name`,
             cl.`name`  AS `name_category`
            FROM  `" . _DB_PREFIX_ . "product` p 
             LEFT JOIN `" . _DB_PREFIX_ . "product_lang` pl ON (pl.`id_product` = p.`id_product` AND pl.`id_lang` = " . (int)$id_lang . " AND pl.`id_shop` = " . (int)$id_shop . ")  
             JOIN `" . _DB_PREFIX_ . "product_shop` sa ON (p.`id_product` = sa.`id_product` AND sa.id_shop = " . (int)$id_shop . ") 
             LEFT JOIN `" . _DB_PREFIX_ . "category_lang` cl ON (sa.`id_category_default` = cl.`id_category` AND cl.`id_lang` = " . (int)$id_lang . " AND cl.id_shop = " . (int)$id_shop . ")    
            ORDER BY  `id_product` asc
             "; // LIMIT 0, 5000

        $data = Db::getInstance()->executeS($sql);

        self::fillProductsSpringData($data);

        array_unshift($data, self::getCsvHead());

        self::exportCsv($data, 'product_springxbs_api_data_add' . date('Y-m-d_His'));
    }

    /**
     * @param $id_lang
     * @param $id_shop
     * @throws PrestaShopDatabaseException
     */
    public static function exportProductsCsvV15($id_lang, $id_shop)
    {
        $sql = "SELECT 
            a.id_product,
            b.name as name,
            a.reference,
            cl.name as name_category,
            a.price
            FROM `" . _DB_PREFIX_ . "product` a
            LEFT JOIN `" . _DB_PREFIX_ . "product_lang` b ON (b.`id_product` = a.`id_product` AND b.`id_lang` = " . (int)$id_lang . " AND b.`id_shop` = " . (int)$id_shop . ")
            LEFT JOIN `" . _DB_PREFIX_ . "tax_rule` tr ON (a.`id_tax_rules_group` = tr.`id_tax_rules_group` AND tr.`id_country` = 13 AND tr.`id_state` = 0)
            LEFT JOIN `" . _DB_PREFIX_ . "tax` t ON (t.`id_tax` = tr.`id_tax`)
            LEFT JOIN `" . _DB_PREFIX_ . "stock_available` sav ON (sav.`id_product` = a.`id_product` AND sav.`id_product_attribute` = 0 AND sav.id_shop = " . (int)$id_shop . ")
            
            JOIN `" . _DB_PREFIX_ . "product_shop` sa ON (a.`id_product` = sa.`id_product` AND sa.id_shop = " . (int)$id_shop . ")
            LEFT JOIN `" . _DB_PREFIX_ . "category_lang` cl ON (sa.`id_category_default` = cl.`id_category` AND cl.`id_lang` = " . (int)$id_lang . " AND cl.id_shop = " . (int)$id_shop . ") 
            LEFT JOIN `" . _DB_PREFIX_ . "category` c ON (c.`id_category` = cl.`id_category`)
            WHERE 1 
        ORDER BY id_product asc"; // LIMIT 0, 5000

        $data = Db::getInstance()->executeS($sql);

        self::fillProductsSpringData($data);

        array_unshift($data, self::getCsvHead());

        self::exportCsv($data, 'product_springxbs_api_data_add' . date('Y-m-d_His'));
    }

    /**
     * @return array
     */
    protected static function getCsvHead(){
        return array(
            'id_product' => SpringXbsHelper::l('Product ID'),

            'hs_code' => SpringXbsHelper::l('HS Code'),
            'coo' => SpringXbsHelper::l('Country of Origin Code(NL, GB, FR...)'),
            'intl_description' => SpringXbsHelper::l('International Description'),

            'name' => SpringXbsHelper::l('Name'),
            'reference' => SpringXbsHelper::l('Reference'),
            'name_category' => SpringXbsHelper::l('Category'),
            'price' => SpringXbsHelper::l('Price (tax excl.)'),
        );
    }

    /**
     * @param $data
     * @param $filename
     */
    public static function exportCsv($data, $filename)
    {
        header('Content-type: text/csv');
        header('Content-Type: application/force-download; charset=UTF-8');
        header('Cache-Control: no-store, no-cache');
        header('Content-disposition: attachment; filename="' . $filename . '.csv"');

        $headerLine = false;
        $headerKeys = array();
        $delimiter = ";";

        foreach ($data as $arr) {
            if (!$headerLine) {
                $headerKeys = array_keys($arr);
                $headerLine = true;
                $_data = array_values($arr);
            } else {
                $_data = array();
                foreach ($headerKeys as $key) {
                    $_data[] = isset($arr[$key]) ? $arr[$key] : '';
                }
            }
            $_data = array_map(function ($data) {
                $data = str_replace(array('"', ';'), '', $data);
                return sprintf('"%s"', $data);
            }, $_data);
            echo sprintf("%s\n", implode($delimiter, $_data));
        }
        exit();
    }

    /**
     * @param $file_data
     * @return array|bool|false|mysqli_result|PDOStatement|resource|null
     * @throws PrestaShopDatabaseException
     */
    public static function importProductsCsv($file_data)
    {
        $content_rows = array_filter(explode("\n", str_replace("\r", '', $file_data)));
        $delimiter = self::guessDelimiter($content_rows);

        $file_res = fopen($_FILES['csv_file']['tmp_name'], 'r');
        fgetcsv($file_res, 0x10000, $delimiter);

        $db = \Db::getInstance();
        $added_id = array();

        while ($row = fgetcsv($file_res, 0x10000, $delimiter)) {
            list($id_product, $hs_code, $coo, $intl_description) = array_map('trim', $row);

            if (!$id_product) {
                continue;
            }

            if (!static::validateHSCode($hs_code)) {
                SpringXbsHelper::setNotification(
                    " $hs_code - " .
                    SpringXbsHelper::l('HS code should contain at least 6 digits. i.e.: 999900 or 9999.00'),
                    SpringXbsHelper::MSG_TYPE_ERROR
                );
            }

            $db->execute("REPLACE " . _DB_PREFIX_ . "springxbs_product 
                SET id_product='" . pSQL($id_product) . "',   
                    hs_code='" . pSQL($hs_code) . "',   
                    coo='" . pSQL($coo) . "',   
                    intl_description='" . pSQL($intl_description) . "'");
            $added_id[] = $db->Insert_ID();
        }

        return sizeof($added_id);
    }

    /**
     * @param array $csv_str_rows
     * @return mixed
     */
    protected static function guessDelimiter(Array $csv_str_rows)
    {
        $delimiters = array(';', ',');
        $gage = sizeof(self::getCsvHead());

        if (sizeof(str_getcsv($csv_str_rows[0], $delimiters[0])) == $gage) {
            return $delimiters[0];
        }

        return $delimiters[1];
    }

    /**
     * @param Order|null $order
     * @param null $id_list
     * @return array
     * @throws PrestaShopDatabaseException
     */
    public static function getSpringProductsList(Order $order = null, $id_list = null)
    {
        if (!$id_list) {
            if (!$order) {
                return array();
            }

            foreach ($order->getProducts() as $product) {
                $id_list[] = $product['id_product'];
            }
        }

        $id_list = implode(',', array_filter(array_map("intval", $id_list)));

        if (!$id_list) {
            return array();
        }

        $result = array();
        $list = \Db::getInstance()->executeS(
            "SELECT * FROM " . _DB_PREFIX_ . "springxbs_product WHERE id_product IN ($id_list)"
        );

        foreach ($list as $item) {
            $result[$item['id_product']] = $item;
        }

        return $result;
    }

    /**
     * @param $data
     * @throws PrestaShopDatabaseException
     */
    protected static function fillProductsSpringData(&$data)
    {
        $id_list = array();

        foreach ($data as $product) {
            $id_list[] = $product['id_product'];
        }

        $spring_products = self::getSpringProductsList(null, $id_list);

        foreach ($data as &$item) {
            $item['hs_code'] = $spring_products[$item['id_product']]['hs_code'];
            $item['coo'] = $spring_products[$item['id_product']]['coo'];
            $item['intl_description'] = $spring_products[$item['id_product']]['intl_description'];
        }

        unset($item);
    }

    /**
     * Save temporary parcel dimensions
     *
     * @throws PrestaShopDatabaseException
     * @throws PrestaShopException
     */
    public static function saveParcelDimensionsTemporary($id_order)
    {
        $session = SpringXbsHelper::getSession();
        $session->set(
            Springxbs::$self_name . '_dimensions_tmp_' . $id_order,
            json_encode(
                static::normalizeDimensions(array(
                    'weight' => Tools::getValue('weight'),
                    'depth' => Tools::getValue('depth'),
                    'width' => Tools::getValue('width'),
                    'height' => Tools::getValue('height'),
                    'ddp' => Tools::getValue('ddp'),
                ))
            )
        );
    }

    /**
     * get parcel dimensions
     *
     * @param $id_order
     * @return array|bool
     * @throws PrestaShopDatabaseException
     * @throws PrestaShopException
     * @throws SmartyException
     */
    public static function getParcelDimensions($id_order)
    {
        if (Tools::getValue('weight')) {
            self::saveParcelDimensionsTemporary($id_order);

            return static::normalizeDimensions(array(
                'weight' => Tools::getValue('weight'),
                'depth' => Tools::getValue('depth'),
                'width' => Tools::getValue('width'),
                'height' => Tools::getValue('height'),
                'ddp' => Tools::getValue('ddp'),
            ));
        }

        $session = SpringXbsHelper::getSession();
        $dimensions = json_decode(
            $session->get(Springxbs::$self_name . '_dimensions_tmp_' . $id_order), true
        );

        if (!$dimensions) {
            $order = new Order($id_order);

            if (!Validate::isLoadedObject($order)) {
                return array();
            }

            $dimensions = Springxbs::getPreFilledParcelDimensions($order);
        }

        return $dimensions;
    }

    /**
     * @param $id_order
     */
    public static function clearParcelDimensionsSession($id_order)
    {
        $session = SpringXbsHelper::getSession();
        $session->set(Springxbs::$self_name . '_dimensions_tmp_' . $id_order, null);
    }

    /**
     * @return string
     * @throws PrestaShopDatabaseException
     * @throws PrestaShopException
     */
    public static function getWsShippingNumber($id_order)
    {
        $id_order_carrier = Db::getInstance()->getValue('
            SELECT `id_order_carrier`
            FROM `' . _DB_PREFIX_ . 'order_carrier`
            WHERE `id_order` = ' . (int) $id_order);

        if ($id_order_carrier) {
            $order_carrier = new OrderCarrier($id_order_carrier);

            return $order_carrier->tracking_number;
        }

        $order = new Order($id_order);

        if (!Validate::isLoadedObject($order)) {
            return '';
        }

        return $order->shipping_number;
    }

    /**
     * @param $hs_code
     * @return bool
     */
    public static function validateHSCode($hs_code) {
        return (bool) preg_match(
        "/(^\d{6,10}$)|(^\d{4}\.\d{2}(\.\d{1,4})?$)/",
            $hs_code
        );
    }

    /**
     * @param $dimensions
     * @return array
     */
    public static function normalizeDimensions($dimensions)
    {
        if (!is_array($dimensions)) {
            return array();
        }

        return array(
            'weight' => AdminSpringxbsApiController::round1f($dimensions['weight']),
            'depth' => ceil(10 * $dimensions['depth']) / 10,
            'width' => ceil(10 * $dimensions['width']) / 10,
            'height' => ceil(10 * $dimensions['height']) / 10,
            'ddp' => $dimensions['ddp'],
        );
    }

}
