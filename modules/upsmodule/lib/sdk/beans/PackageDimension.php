<?php
/**
 * @author    United Parcel Service of America, Inc.*
 * @copyright (c) 2019 United Parcel Service of America, Inc., all rights reserved*
 * @license   This work is Licensed under the Academic Free License version 3.0
 *            http://opensource.org/licenses/afl-3.0.php *
 * @link      https://www.ups.com/pl/en/services/technology-integration/ecommerce-plugins.page *
 */

namespace Bean;

use DVDoug\BoxPacker\Test\TestBox;  // use your own `Box` implementation
use DVDoug\BoxPacker\Test\TestItem; // use your own `Item` implementation
use DVDoug\BoxPacker\InfalliblePacker;
use upsWegPack;
use UpsEuBoxPack;

class PackageDimension
{
    public $length = 0;
    public $width  = 0;
    public $height = 0;
    public $dimensionUnit = 'cm';
    public $weight = 0;
    public $numberOfPackage = 1;
    public $weightUnit = 'kgs';
    public $description = '';

    private $numberOfCartItem = 0;
    private $isIncludeDimension = false;
    private $isCompatibleWeight = false;
    private $isCompatibleDimension = false;
    private $cartPackage;
    private $smallestBox;
    private $heaviestBox;
    private $cartProducts = [];
    private $listDefaultPackage = [];
    private $listProductDimension = [];

    const TYPE_PACKAGE_DEFAULT = 1;
    const TYPE_PRODUCT_DIMENSION = 2;

    public function __construct($dimensionUnit, $weightUnit)
    {
        $this->dimensionUnit = $dimensionUnit;
        $this->weightUnit = $weightUnit;
    }

    /**
     * setProductPackageDimension
     *
     * @param array $listDefaultPackage : list default package
     * @param int $numberOfCartItem : number of item in cart
     */
    public function setDefaultPackageDimension($listDefaultPackage, $numberOfCartItem) {
        // Set variable
        $this->listDefaultPackage = $listDefaultPackage;
        $this->numberOfCartItem = $numberOfCartItem;
        // Check empty array data
        if (empty($this->listDefaultPackage)) {
            return;
        }
        $packageIndex = 0;
        $numberOfItem = 1;
        // Set package index (get max setting number < cart number)
        foreach ($this->listDefaultPackage as $key => $defaultPackage) {
            if ($defaultPackage['unit_dimension'] != $this->dimensionUnit || $defaultPackage['unit_weight'] != $this->weightUnit) {
                continue;
            }
            if ($defaultPackage['number_of_item'] <= $numberOfCartItem && $numberOfItem <= $defaultPackage['number_of_item']) {
                $packageIndex = $key;
                $numberOfItem = $defaultPackage['number_of_item'];
            }
        }
        // Set package dimension
        $this->length = $this->listDefaultPackage[$packageIndex]['length'];
        $this->width  = $this->listDefaultPackage[$packageIndex]['width'];
        $this->height = $this->listDefaultPackage[$packageIndex]['height'];
        $this->weight = $this->listDefaultPackage[$packageIndex]['weight'];
        $this->description = 'Get default package dimension';
    }

    /**
     * setProductPackageDimension
     *
     * @param boolean $isIncludeDimension : is include dimension
     * @param array $listProductDimension : list product dimension
     * @param array $cartProduct : list product in cart
     */
    public function setProductPackageDimension($isIncludeDimension, $listProductDimension, $cartProduct) {
        // Set variable
        $this->isIncludeDimension = $isIncludeDimension;
        $this->listProductDimension = $listProductDimension;
        // Check empty array data
        if (empty($this->listProductDimension)) {
            return;
        }
        $this->setCartPackage($cartProduct);
        // Determine smallest package size to largest of user defined package
        $maxWeightIndex = 0;
        $maxWeight = 0;
        $smallestVolume = 0;
        foreach ($this->listProductDimension as $key => $productDimension) {
            if ($productDimension['unit_dimension'] != $this->dimensionUnit || $productDimension['unit_weight'] != $this->weightUnit) {
                continue;
            }
            if ($productDimension['weight'] > $maxWeight) {
                $maxWeight = $productDimension['weight'];
                $maxWeightIndex = $key;
            }
            $compatibleWeightFlg = false;
            $compatibleDimensionFlg = false;
            $volume = $productDimension['length'] * $productDimension['width'] * $productDimension['height'];
            list ($minSide, $medianSide, $maxSide) = $this->getPackageSide([
                $productDimension['length'],
                $productDimension['width'],
                $productDimension['height']
            ]);
            // Check compatible weight
            if ($this->cartPackage->weight <= $productDimension['weight']) {
                $compatibleWeightFlg = true;
            }
            // Check compatible dimension
            if ($this->isIncludeDimension) {
                if ($this->cartPackage->minSide <= $minSide && $this->cartPackage->medianSide <= $medianSide
                    && $this->cartPackage->maxSide <= $maxSide && $this->cartPackage->volume <= $volume) {
                    $compatibleDimensionFlg = true;
                }
            }
            // Set package weight
            if ($compatibleWeightFlg) {
                // If compatible dimension, get smallest box
                if (!$this->isIncludeDimension || $compatibleDimensionFlg) {
                    // Get smallest box
                    if ($volume < $smallestVolume || $smallestVolume == 0) {
                        $smallestVolume = $volume;
                        // Set package dimension
                        $this->length  = $productDimension['length'];
                        $this->width  = $productDimension['width'];
                        $this->height  = $productDimension['height'];
                        $this->numberOfPackage = 1;
                        $this->weight = $this->cartPackage->weight;
                        $this->smallestBox = $productDimension;
                        $this->smallestBox['volume'] = $productDimension['length'] * $productDimension['width'] * $productDimension['height'];
                    }
                    $this->description = "Weight is compatible, dimension is compatible or not include (get smallest box)";
                }
            } else if ($compatibleDimensionFlg){
                // Get smallest box
                if ($volume < $smallestVolume || $smallestVolume == 0) {
                    $smallestVolume = $volume;
                    // Set package dimension
                    $this->length  = $productDimension['length'];
                    $this->width  = $productDimension['width'];
                    $this->height  = $productDimension['height'];
                    $this->numberOfPackage = ceil($this->cartPackage->weight / $productDimension['weight']);
                    $this->weight = round($this->cartPackage->weight / $this->numberOfPackage, 2);
                    $this->smallestBox = $productDimension;
                    $this->smallestBox['volume'] = $productDimension['length'] * $productDimension['width'] * $productDimension['height'];
                }
                $this->description = "Weight is not compatible, dimension is compatible (get smallest box with multi package)";
            }

            if ($compatibleWeightFlg) {
                $this->isCompatibleWeight = true;
            }
            if ($compatibleDimensionFlg) {
                $this->isCompatibleDimension = true;
            }
        }
        // Weight is compatible, dimension is not compatible
        if ($this->isCompatibleWeight && !$this->isCompatibleDimension && $this->isIncludeDimension) {
            $this->length = $this->cartPackage->maxSide;
            $this->width = $this->cartPackage->medianSide;
            $this->height = $this->cartPackage->minSide;
            $this->weight = $this->cartPackage->weight;
            $this->description = "Weight is compatible, dimension is not compatible (get custom dimension)";
        }
        // Weight is not compatible, dimension is not compatible or not include
        if (!$this->isCompatibleWeight && (!$this->isIncludeDimension || !$this->isCompatibleDimension)) {
            $packageHeaviest = $this->listProductDimension[$maxWeightIndex];
            if (!$this->isIncludeDimension) {
                $this->length = $packageHeaviest['length'];
                $this->width = $packageHeaviest['width'];
                $this->height = $packageHeaviest['height'];
                $this->description = "Weight is not compatible, not include dimension (get heaviest box)";
            } else if (!$this->isCompatibleDimension) {
                $this->length = $this->cartPackage->maxSide;
                $this->width = $this->cartPackage->medianSide;
                $this->height = $this->cartPackage->minSide;
                $this->description = "Weight and dimension are not compatible (get custom dimension with multi package which one package is compatible with heaviest box)";
            }
            // $this->numberOfPackage = ceil($this->cartPackage->weight / $packageHeaviest['weight']); //old_code
            $this->numberOfPackage = isset($packageHeaviest['weight']) ? ceil($this->cartPackage->weight / $packageHeaviest['weight']) : 0;
            $this->weight = round($this->cartPackage->weight / $this->numberOfPackage, 2);
            $this->heaviestBox = $packageHeaviest;
        }
    }

    /**
     * setCartPackage
     *
     * @param array $cartProducts
     * @return object
     */
    private function setCartPackage($cartProducts)
    {
        $minSide = 0;
        $medianSide = 0;
        $maxSide = 0;
        $volume = 0;
        $weight = 0;
        // Get product item in cart
        foreach ($cartProducts as $product) {
            // Get product info
            $productItem = [
                'id_product' => $product['id_product'],
                'quantity' => $product['quantity'],
                'depth' => $product['depth'],
                'width' => $product['width'],
                'weight' => $product['weight'],
                'height' => $product['height'],
            ];
            $this->cartProducts[] = $productItem;
            // Get product volume
            $productVolume = $product['depth'] * $product['width'] * $product['height'];
            // Get package side (min, median, max)
            list ($productMinSide, $productMedianSide, $productMaxSide) = $this->getPackageSide([
                $product['depth'],
                $product['width'],
                $product['height']
            ]);
            if ($minSide < $productMinSide) {
                $minSide = $productMinSide;
            }
            if ($medianSide < $productMedianSide) {
                $medianSide = $productMedianSide;
            }
            if ($maxSide < $productMaxSide) {
                $maxSide = $productMaxSide;
            }
            if ($product['quantity'] > 1) {
                $volume += $product['quantity'] * $productVolume;
                $weight += $product['quantity'] * $product['weight'];
            } else {
                $volume += $productVolume;
                $weight += $product['weight'];
            }
        }
        $cartPackage = new \stdClass();
        $cartPackage->minSide = round($minSide, 2);
        $cartPackage->medianSide = round($medianSide, 2);
        $cartPackage->maxSide = round($maxSide, 2);
        $cartPackage->volume = round($volume, 2);
        $cartPackage->weight = round($weight, 2);

        $this->cartPackage = $cartPackage;
    }

    /**
     * getPackageSide
     *
     * @param array $sides
     * @return array
     */
    private function getPackageSide($sides) {
        asort($sides);
        $minSide  = array_shift($sides);
        $medianSide = array_shift($sides);
        $maxSide = array_shift($sides);
        return [
            $minSide,
            $medianSide,
            $maxSide
        ];
    }

    public function per_item($cartProduct, $pack_weg_unit = '', $pack_dim_unit = '') {
        if (empty($cartProduct)) {
            return;
        }
        $boxes = [];
        foreach($cartProduct as $cart_prod) {
            $package = [];
            $package['length'] = (isset($cart_prod['depth']) && ($cart_prod['depth']) > 0) ? (string)round($cart_prod['depth']) : "0.5";
            $package['width'] = (isset($cart_prod['width']) && ($cart_prod['width']) > 0) ? (string)round($cart_prod['width']) : "0.5";
            $package['height'] = (isset($cart_prod['height']) && ($cart_prod['height']) > 0) ? (string)round($cart_prod['height']) : "0.5";
            $package['unit_dimension'] = !empty($pack_dim_unit) ? $pack_dim_unit : "cm";
            $package['weight'] = (isset($cart_prod['weight']) && ($cart_prod['weight']) > 0) ? (string)round($cart_prod['weight']) : "0.5";
            $package['unit_weight'] = !empty($pack_weg_unit) ? $pack_weg_unit : "kgs";
            for ($i=0; $i < $cart_prod['cart_quantity']; $i++) { 
                $boxes[] = $package;
            }
        }
        return $boxes;
    }

    public function weight_pack($cartProduct, $pack_weg_unit = '', $pack_max_weight) {
        if (empty($cartProduct) || empty($pack_max_weight)) {
            return;
        }
        if ( ! class_exists( 'WeightPack' ) ) {
            include_once(dirname(__FILE__) . '/weight_pack/class-ups-weight-packing.php');
        }
        $weight_pack = new upsWegPack\WeightPack('pack_descending');
        $weight_pack->set_max_weight($pack_max_weight);
        foreach($cartProduct as $product) {
            $prod_data = [];
            $prod_data['product_name'] = isset($product['name']) ? $product['name'] : "";
            $prod_data['product_weight'] = (isset($product['weight']) && $product['weight'] > 0) ? (string)$product['weight'] : "0.5";
            $prod_data['product_quantity'] = isset($product['cart_quantity']) ? $product['cart_quantity'] : 1;
            $weight_pack->add_item($prod_data['product_weight'], $prod_data, $prod_data['product_quantity']);
        }
        $pack   =   $weight_pack->pack_items();
        $errors =   $pack->get_errors();
        $final_out = [];
        if (!empty($errors)) {
            //do nothing
            return;
        } else {
            $boxes = $pack->get_packed_boxes();
            $unpacked_items = $pack->get_unpacked_items();
            $packages = array_merge($boxes, $unpacked_items); // merge items if unpacked are allowed
            if (!empty($packages)) {
                foreach ($packages as $pack) {
                    $reformed_box_data = [];
                    $reformed_box_data['weight'] = ( isset($pack['weight']) && is_numeric($pack['weight']) && ($pack['weight'] > 0) ) ? (string)$pack['weight'] : "0.5";
                    $reformed_box_data['unit_weight'] = $pack_weg_unit;
                    $final_out[] = $reformed_box_data;
                }
            }
        }

        return $final_out;
    }

    public function box_pack($cartProduct, $all_saved_boxes)
    {
        if (empty($cartProduct)) {
            return;
        }
        if (empty($all_saved_boxes)) {
            return;
        }
        if ( ! class_exists( 'UPS_Eu_Boxpack' ) ) {
            include_once(dirname(__FILE__) . '/box_pack/class-ups-eu-box-packing.php');
        }
        $packer = new UpsEuBoxPack\UPS_Eu_Boxpack();

        foreach ($all_saved_boxes as $box_key => $box) {
            $newbox = $packer->add_box( $box['length'], $box['width'], $box['height'] );
            $newbox->set_id($box_key);
            $newbox->set_inner_dimensions( $box['length'], $box['width'], $box['height'] );
            $newbox->set_max_weight( $box['weight'] );
        }
        
        foreach ($cartProduct as $product) {
            $product_name = isset($product['name']) ? $product['name'] : "";
            $product_price = isset($product['price']) ? $product['price'] : 0;
            $product_length = (is_numeric($product['depth']) && $product['depth'] > 0) ? (string)$product['depth'] : "0.5";
            $product_width  = (is_numeric($product['width']) && $product['width'] > 0)  ? (string)$product['width'] : "0.5";
            $product_height = (is_numeric($product['height']) && $product['height'] > 0) ? (string)$product['height'] : "0.5";
            $product_weight = (is_numeric($product['weight']) && $product['weight'] > 0) ? (string)$product['weight'] : "0.5";
            $product_quantity = isset($product['cart_quantity']) ? $product['cart_quantity'] : 0;
            for ($i=0; $i < $product_quantity; $i++) {
                // length, width, heoght, weight, price, meta data
                $packer->add_item($product_length, $product_width, $product_height, $product_weight, $product_price, array($product_name, $product_price, $product_length, $product_width, $product_height, $product_weight));
            }
        }
        
        $packer->pack();
        $packedBoxes = $packer->get_packages();
        $final_out = [];
        if (!empty($packedBoxes)) {
            foreach ($packedBoxes as $pack_key => $box_data) {
                $pack_id = (isset($box_data->id) && !empty($box_data->id)) ? $box_data->id : 0;
                $reformed_box_data = [];
                $reformed_box_data['length'] = (string)$box_data->length;
                $reformed_box_data['width'] = (string)$box_data->width;
                $reformed_box_data['height'] = (string)$box_data->height;
                $reformed_box_data['weight'] = (string)$box_data->weight;
                $reformed_box_data['unit_dimension'] = isset($all_saved_boxes[$pack_id]) ? $all_saved_boxes[$pack_id]['unit_dimension'] : "";
                $reformed_box_data['unit_weight'] = isset($all_saved_boxes[$pack_id]) ? $all_saved_boxes[$pack_id]['unit_weight'] : "";
                $final_out[] = $reformed_box_data;
            }
        }
        // echo "<pre>";print_r($final_out);die();
        return $final_out;
    }

}