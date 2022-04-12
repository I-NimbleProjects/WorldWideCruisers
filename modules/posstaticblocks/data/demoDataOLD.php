<?php

class demoData
{
    public function initData()
    {
        $return = true;
        $languages = Language::getLanguages(true);
        $id_shop = Context::getContext()->shop->id;
        $id_hook_home = (int)Hook::getIdByName('displayHome');
        $id_hook_bottom = (int)Hook::getIdByName('displayContainerbottom');
        
        $queries = [
            'INSERT INTO `'._DB_PREFIX_.'pos_staticblock` (`id_pos_staticblock`, `id_hook`, `position`, `name`,`active`) VALUES
                (1, '.$id_hook_home.', 1, "Static Cms", 1),
                (2, '.$id_hook_home.', 2, "Home Banner", 1),
                (3, '.$id_hook_home.', 3, "Home Banner2", 1),
                (4, '.$id_hook_home.', 4, "Home Banner3", 1),
                (5, '.$id_hook_bottom.', 5, "Home Banner4", 1)'
        ];

        foreach (Language::getLanguages(true, Context::getContext()->shop->id) as $lang) {
            $queries[] = 'INSERT INTO `'._DB_PREFIX_.'pos_staticblock_lang` (`id_pos_staticblock`, `id_lang`, `content`) VALUES
                (1, '.(int)$lang['id_lang'].', \'<div class="static_cms full-width">
				<div class="container">
				<div class="row">
				<div class="col-cms col-xs-12 col-sm-12 col-md-4 col-lg-4 aos-init aos-animate" data-aos="flip-left" data-aos-delay="0">
				<div class="box_cms">
				<div class="img_cms"><img src="/pos_ecolife_singleproduct/img/cms/icon_cms1_5.png" alt="" class="img-responsive" /></div>
				<div class="txt_cms">
				<h2>Payment</h2>
				<p>Pay with VISA, MasterCard, or PayPal in our secure checkout.</p>
				</div>
				</div>
				</div>
				<div class="col-cms col-xs-12 col-sm-12 col-md-4 col-lg-4 aos-init aos-animate" data-aos="flip-left" data-aos-delay="100">
				<div class="box_cms">
				<div class="img_cms"><img src="/pos_ecolife_singleproduct/img/cms/icon_cms2_5.png" alt="" class="img-responsive" /></div>
				<div class="txt_cms">
				<h2>Shipping & Returns</h2>
				<p>Free shipping on all orders over 150$/1500 kr. Free returns.</p>
				</div>
				</div>
				</div>
				<div class="col-cms col-xs-12 col-sm-12 col-md-4 col-lg-4 aos-init aos-animate" data-aos="flip-left" data-aos-delay="200">
				<div class="box_cms">
				<div class="img_cms"><img src="/pos_ecolife_singleproduct/img/cms/icon_cms3_5.png" alt="" class="img-responsive" /></div>
				<div class="txt_cms">
				<h2>Extended Warranty</h2>
				<p>Two years warranty on all of our bags. We promise that they will last.</p>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>\'), 
				(2, '.(int)$lang['id_lang'].', \'<div class="home-banner static-one-air">
				<div class="pos_title">
				<h2>How It Work’s</h2>
				<div class="desc_title">INTRODUCTION</div>
				</div>
				<div class="row">
				<div class="col col-text col-md-6 col-xs-12" data-aos="zoom-in">
				<div class="box-option">
				<div class="box"><img src="/pos_ecolife_singleproduct/img/cms/icon1_5.png" alt="" class="img-responsive" />
				<div class="text">
				<h4>Automatic & Smart</h4>
				<p>Not just “low/medium/high” -- tap “smart” and uses smart sensors to detect the contaminates in your air and adjusts automatically.</p>
				</div>
				</div>
				<div class="box"><img src="/pos_ecolife_singleproduct/img/cms/icon2_5.png" alt="" class="img-responsive" />
				<div class="text">
				<h4>Filtration for You</h4>
				<p>Whether you deal with allergies, wildfires, or something else, we have custom filters built for YOUR environment.</p>
				</div>
				</div>
				<div class="box"><img src="/pos_ecolife_singleproduct/img/cms/icon3_5.png" alt="" class="img-responsive" />
				<div class="text">
				<h4>Quiet</h4>
				<p>As a premium produt, we use the latest motor and fan advancements to ensure low noise pollution.</p>
				</div>
				</div>
				</div>
				</div>
				<div class="col col-image col-md-6 col-xs-12" data-aos="fade-down-left">
				<div class="banner-box"><img src="/pos_ecolife_singleproduct/img/cms/1_5.jpg" alt="" /></div>
				</div>
				</div>
				</div>\'),
				(3, '.(int)$lang['id_lang'].', \'<div class="full-width static-two-air">
				<div class="box-text" data-aos="zoom-in">
				<p>NEW RELEASE - AGH380 Air Purifier with Medical</p>
				<a href="#">View Details</a></div>
				</div>\'),
				(4, '.(int)$lang['id_lang'].', \'<div class="full-width static-three-air">
				<div class="box box-top">
				<div class="col col-image"><img src="/pos_ecolife_singleproduct/img/cms/2_5.jpg" alt="" class="img-responsive" />
				<div class="small_img"><img data-aos="fade-up" src="/pos_ecolife_singleproduct/img/cms/2_5.png" alt="" class="img-responsive" /></div>
				</div>
				<div class="col col-text" data-aos="fade-down-left">
				<div class="inner">
				<h3>APH260 True HEPA <span>Air Purifier</span><br /> Smart Auto Mode - Pure Morning</h3>
				<p>$30 off on APH260 air purifier. code: APH260</p>
				<ul>
				<li>FILTER OUT 99.97% POLLEN: Pre-Filter, True HEPA Filter</li>
				<li>CADR RATED 152+ CFM: It can purify an area up to 355 sq.</li>
				<li>SMART CONTROL: Turn on Airthereal’s smart control to automatically measure air quality.</li>
				</ul>
				<p class="price">$59.92</p>
				<a href="#">View Product</a></div>
				</div>
				</div>
				<div class="box box-bottom">
				<div class="col col-text" data-aos="fade-down-right">
				<div class="inner">
				<h3>AGH380 <span>Air Purifier</span> with Medical<br /> - Grade Filter, UV-C Sanitizer</h3>
				<p>We cannot ship this item to the State of California.</p>
				<ul>
				<li>Five Fan Speeds - If you’re a light sleeper, the max noise level of 22 dB</li>
				<li>Press and hold the Fan button for 5 seconds to activate or deactivate the Child Lock Function.</li>
				<li>The extra long timer allows you to set the unit to power off in 1 hour increments up to 24 hours.</li>
				</ul>
				<p class="price">$100.50</p>
				<a href="#">View Product</a></div>
				</div>
				<div class="col col-image"><img src="/pos_ecolife_singleproduct/img/cms/3_5.jpg" alt="" class="img-responsive" />
				<div class="small_img"><img data-aos="fade-up" src="/pos_ecolife_singleproduct/img/cms/3_5.png" alt="" class="img-responsive" /></div>
				</div>
				</div>
				</div>\'), 			
				(5, '.(int)$lang['id_lang'].', \'<div class="full_beautiful full-width ">
				<div class="img_full"><img src="/pos_ecolife_singleproduct/img/cms/4_5.jpg" alt="" /></div>
				<div class="content-banner">
				<div class="container">
				<div class="text-banner center aos-init aos-animate" data-aos="zoom-out">
				<h5>Protect Home & Commercial</h5>
				<h2>Clean, Pure Air With <br />The Touch Of A Button</h2>
				<a href="#" class="buy_now">Buy now</a> <a href="#" class="learn_more">Learn more</a></div>
				</div>
				</div>
				</div>\')'
            ;
        }

        $queries[] = 'INSERT INTO `'._DB_PREFIX_.'pos_staticblock_shop` (`id_pos_staticblock`, `id_shop`) VALUES
                (1, 1),
                (2, 1),
                (3, 1),
                (4, 1),
                (5, 1)';

        foreach ($queries as $query) {
            $return &= Db::getInstance()->execute($query);
        }

        return $return;
    }
}
?>