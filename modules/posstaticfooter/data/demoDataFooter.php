<?php

class demoDataFooter
{
    public function initData()
    {
        $return = true;
        $languages = Language::getLanguages(true);
        $id_shop = Context::getContext()->shop->id;
        $id_hook_footer = (int)Hook::getIdByName('displayFooter');
        $id_hook_footerafter = (int)Hook::getIdByName('displayFooterAfter');
        $queries = [
            'INSERT INTO `'._DB_PREFIX_.'posstaticfooter` (`id_posstaticfooter`, `id_hook`, `position`, `width`, `type_content`, `name_module`, `content`,`active_title`) VALUES
                (1, '.$id_hook_footer.', 1, 8, 1, \'ps_socialfollow\', \'{"cms":[false],"product":[false],"static":[false]}\', 1),
                (2, '.$id_hook_footer.', 2, 2, 0, 0, \'{"cms":["1","4","5"],"product":[false],"static":["contact","sitemap","stores"]}\', 1),
				(3, '.$id_hook_footer.', 3, 2, 0, 0, \'{"cms":["2"],"product":["prices-drop","new-products","best-sales"],"static":["authentication","my-account"]}\', 1),
				(4, '.$id_hook_footerafter.', 4, 12, 1, 0, \'{"cms":[false],"product":[false],"static":[false]}\', 0);'
        ];

        foreach (Language::getLanguages(true, Context::getContext()->shop->id) as $lang) {
            $queries[] = 'INSERT INTO `'._DB_PREFIX_.'posstaticfooter_lang` (`id_posstaticfooter`, `id_lang`, `name`, `html_content`, `custom_content`) VALUES
                (1, '.(int)$lang['id_lang'].', "Contact Us", \'<div class="footer_contact_us">
				<div class="txt_info">We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</div>
				<div class="desc_info">
				<p class="address add"><span>The Barn, Ullenhall, Henley in Arden B578 5CC, England</span></p>
				<p class="email add"><a href="#">demo@posthemes.com</a></p>
				<p class="phone add"><span>+123.456.789 - +123.456.678</span></p>
				</div>
				</div>\', ""),
                (2, '.(int)$lang['id_lang'].', "Information", "", ""),
				(3, '.(int)$lang['id_lang'].', "Custom Links", "", ""),			
				(4, '.(int)$lang['id_lang'].', "Copyright Block", \'<div class="copyright">Copyright <i class="fa fa-copyright"></i><a href="http://posthemes.com/">Posthemes</a>. All Rights Reserved</div>\', "")'
				
            ;
        }

        $queries[] = 'INSERT INTO `'._DB_PREFIX_.'posstaticfooter_shop` (`id_posstaticfooter`, `id_shop`) VALUES
                (1, 1),
                (2, 1),
                (3, 1),
                (4, 1)';

        foreach ($queries as $query) {
            $return &= Db::getInstance()->execute($query);
        }

        return $return;
    }
}
?>