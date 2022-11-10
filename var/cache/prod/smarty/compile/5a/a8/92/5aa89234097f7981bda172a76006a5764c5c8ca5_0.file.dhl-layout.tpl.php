<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:31:36
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl-layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2f78a8f279_92384472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5aa89234097f7981bda172a76006a5764c5c8ca5' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl-layout.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./_partials/dhl-header.tpl' => 1,
    'file:./_partials/dhl-addresses.tpl' => 1,
    'file:./_partials/dhl-packages.tpl' => 1,
  ),
),false)) {
function content_62bf2f78a8f279_92384472 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./_partials/dhl-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="bo-dhlexpress">
  <div class="form-wrapper">
    <ul class="nav nav-tabs">
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'intro') {?>class="active"<?php }?>><a href="#intro"
                                                        data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Introduction','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a></li>
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'account') {?>class="active"<?php }?>><a href="#account"
                                                          data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DHL Account','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
      </li>
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'fo') {?>class="active"<?php }?>><a href="#fo"
                                                     data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Front-office configuration','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
      </li>
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'bo') {?>class="active"<?php }?>><a href="#bo"
                                                     data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back-office configuration','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
      </li>
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'addresses') {?>class="active"<?php }?>><a href="#addresses"
                                                            data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My addresses','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
      </li>
      <li <?php if ($_smarty_tpl->tpl_vars['active']->value == 'packages') {?>class="active"<?php }?>><a href="#packages"
                                                           data-toggle="tab"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My packages','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</a>
      </li>
    </ul>
    <div class="tab-content panel">
      <div id="intro" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'intro') {?>active<?php }?>">
        <div class="form-group" data-tab-id="intro">
          <div class="row dhl-background">
            <div class="col-lg-8 col-md-6">
              <h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DHL Express','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</h1>

              <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Offer the Services of the best logistician for international Express delivery door-to-door!','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

              <p class="dhl-steps">
                <span class="list-number">1. </span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Already registered as DHL customer or subscribe here','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                <a target="_blank"
                   href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'http://www.dhlecommerce.fr/prestashop/en/contact.html','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                   class="btn btn-xl btn-primary btn-dhl-left">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get a DHL account','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </a>
              </p>

              <p class="dhl-steps">
                <span class="list-number">2. </span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Synchronize your PrestaShop store with DHL services thanks to this DHL Module, by simply filling your account ID & password','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </p>

              <p class="dhl-steps">
                <span class="list-number">3. </span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Accelerate your international growth by offering your DHL prices to your customers in 1-click!','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </p>
              <ul class="dhl-services-list">
                <li>> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delivery before 9AM','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</li>
                <li>> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delivery before 12PM','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</li>
                <li>> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Delivery before 6PM','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</li>
                <li>> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Economy delivery within 2-4 days','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</li>
              </ul>
              <p class="dhl-steps">
                <span class="list-number">4. </span>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Automate your task to save time','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </p>
              <ul class="dhl-tasks">
                <li>
                  > <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Label edition integrated to your order management interface.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </li>
                <li>
                  > <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ready-to-print commercial invoice to facilitate customs procedures.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </li>
                <li>
                  > <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Print your manifest from your PrestaShop back-office.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </li>
                <li>
                  > <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Request a pick up.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </li>
                <li>
                  > <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Or edit a return label for your customers... and many other integrated services!','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </li>
              </ul>
              <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'In few words, DHL module is the development of your business in France & internationally through the experience of DHL integrated within PrestaShop.','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
            </div>
            <div class="col-lg-4 col-md-6">
              <p class="video-header"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enjoy 40 years of experience','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>

              <div class="video-wrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4jmftUX3iRY" frameborder="0"
                        allowfullscreen></iframe>
              </div>
              <a target="_blank"
                 href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'http://www.dhlecommerce.fr/prestashop/en/contact.html','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
"
                 class="btn btn-xl btn-primary btn-dhl">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get a DHL account','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="account" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'account') {?>active<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['accountSettings']->value;?>

        <div class="clearfix"></div>
      </div>
      <div id="fo" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'fo') {?>active<?php }?>">
        <div class="form-group" data-tab-id="fo">
          <?php echo $_smarty_tpl->tpl_vars['frontOfficeSettings']->value;?>

        </div>
      </div>
      <div id="bo" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'bo') {?>active<?php }?>">
        <div class="form-group" data-tab-id="bo">
           
          <?php echo $_smarty_tpl->tpl_vars['backOfficeSettings']->value;?>

           <form id="module_form_2" class="defaultForm form-horizontal" 
                  action="" method="post" enctype="multipart/form-data" novalidate="">
                <div class="panel clearfix">
                    <div class="panel-heading">
                        <i class="icon-globe"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Conversion rate :','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                    </div>

                    <div class="form-wrapper" style="padding-bottom: 40px;padding-top: 10px;">
                        <div class="form-group col-lg-12">
                            <?php if ($_smarty_tpl->tpl_vars['conversion_rate_to_usd']->value == 0) {?>
                                <div class="col-lg-5">
                                    <label class="control-label">
                                        <span class="label-tooltip"
                                            data-toggle="tooltip"
                                            data-html="true"
                                            title=""
                                            data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Printing doc archive is mandatory for International shippings. Optional for Domestic & EU shippings','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
">
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Conversion rate from EUR to USD :','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                                        </span>
                                    </label>
                                    <br/> <p class="help-block" style="margin: 0;font-size: 11px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(ex. 1 EUR = 1,17 USD, please enter 1.17)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
                                </div>
                            <?php } else { ?>
                                <div class="col-lg-4">
                                    <label class="control-label"> 
                                        <span class="label-tooltip"
                                            data-toggle="tooltip"
                                            data-html="true"
                                            title=""
                                            data-original-title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Fulfill it to convert << authorized amount >> for PLT option if you don\'t have any Dollar currency into your << location/currency menu >> ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
">
                                             <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Conversion rate from ','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
 <?php echo $_smarty_tpl->tpl_vars['default_currency']->value;?>
 <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to USD  :','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                                        </span>
                                       
                                    </label>
                                    <br/> <p class="help-block" style="margin: 0;font-size: 11px;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'(ex. 1 EUR = 1,17 USD, please enter 1.17)','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</p>
                                </div>
                            <?php }?>
                            <div class="col-lg-2">
                                <input type="text" id="conversion_rate_value" name="conversion_rate_value" value="<?php echo $_smarty_tpl->tpl_vars['conversion_rate_to_usd']->value;?>
">
                            </div>
                           <?php if ($_smarty_tpl->tpl_vars['conversion_rate_to_usd']->value == 0) {?> <div class="alert alert-info col-lg-12" style="margin-top: 35px;"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Please set the conversion rate of your default currency','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
  </div><?php }?>
                        </div>
                    </div>
                    <div class="panel-footer" style="clear: both;">
                        <button type="submit" value="1" id="save_conversion_rate" name="save_conversion_rate" class="btn btn-default pull-right">
                            <i class="process-icon-save"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Enregistrer','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div id="addresses" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'addresses') {?>active<?php }?>">
        <?php if ((isset($_smarty_tpl->tpl_vars['addNewAddress']->value))) {?>
          <?php echo $_smarty_tpl->tpl_vars['newAddressForm']->value;?>

        <?php } else { ?>
          <?php $_smarty_tpl->_subTemplateRender('file:./_partials/dhl-addresses.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
      </div>
      <div id="packages" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['active']->value == 'packages') {?>active<?php }?>">
        <?php if ((isset($_smarty_tpl->tpl_vars['addNewPackage']->value))) {?>
          <?php echo $_smarty_tpl->tpl_vars['newPackageForm']->value;?>

        <?php } else { ?>
          <?php $_smarty_tpl->_subTemplateRender('file:./_partials/dhl-packages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<?php }
}
