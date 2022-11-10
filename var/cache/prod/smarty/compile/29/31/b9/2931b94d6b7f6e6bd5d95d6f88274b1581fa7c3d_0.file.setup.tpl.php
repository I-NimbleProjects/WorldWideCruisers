<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:11:00
  from '/var/www/html/prestashop/modules/paypal/views/templates/admin/setup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2aa4759906_08460567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2931b94d6b7f6e6bd5d95d6f88274b1581fa7c3d' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/admin/setup.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./_partials/messages/prestashopCheckoutInfo.tpl' => 1,
    'file:./_partials/messages/restApiIntegrationMessage.tpl' => 1,
    'file:./_partials/messages/roundingSettingsMessage.tpl' => 1,
    'file:./_partials/paypalBanner/installmentPopup.tpl' => 1,
    'file:./_partials/headerLogo.tpl' => 1,
  ),
),false)) {
function content_62bf2aa4759906_08460567 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122253390662bf2aa474f337_42435698', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, './admin.tpl');
}
/* {block 'content'} */
class Block_122253390662bf2aa474f337_42435698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_122253390662bf2aa474f337_42435698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['showPsCheckoutInfo']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:./_partials/messages/prestashopCheckoutInfo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['showRestApiIntegrationMessage']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:./_partials/messages/restApiIntegrationMessage.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['need_rounding']->value)) && $_smarty_tpl->tpl_vars['need_rounding']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:./_partials/messages/roundingSettingsMessage.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['showInstallmentPopup']->value)) && $_smarty_tpl->tpl_vars['showInstallmentPopup']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:./_partials/paypalBanner/installmentPopup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>

    <?php $_smarty_tpl->_subTemplateRender('file:./_partials/headerLogo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="pp__flex setup-blocks">
      <?php if ((isset($_smarty_tpl->tpl_vars['formAccountSettings']->value))) {?>
        <div class="pp__flex-item-1 pp__mr-1 stretchHeightForm">
            <?php if ((isset($_smarty_tpl->tpl_vars['country_iso']->value)) && in_array($_smarty_tpl->tpl_vars['country_iso']->value,array('MX','BR','IN','JP'))) {?>
              <div>
                  <?php echo $_smarty_tpl->tpl_vars['formAccountSettings']->value;?>
              </div>

              <div>
                  <?php if ((isset($_smarty_tpl->tpl_vars['formPaymentSettings']->value))) {?>
                    <div>
                        <?php echo $_smarty_tpl->tpl_vars['formPaymentSettings']->value;?>
                    </div>
                  <?php }?>
              </div>

            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['formAccountSettings']->value;?>
            <?php }?>

        </div>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['formEnvironmentSettings']->value))) {?>
        <div class="pp__flex-item-1 pp__mr-1 stretchHeightForm">
            <?php echo $_smarty_tpl->tpl_vars['formEnvironmentSettings']->value;?>
        </div>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['country_iso']->value)) === false || false === in_array($_smarty_tpl->tpl_vars['country_iso']->value,array('MX','BR','IN','JP'))) {?>
          <?php if ((isset($_smarty_tpl->tpl_vars['formPaymentSettings']->value))) {?>
            <div class="pp__flex-item-1 pp__mr-1 stretchHeightForm">
                <?php echo $_smarty_tpl->tpl_vars['formPaymentSettings']->value;?>
            </div>
          <?php }?>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['formStatus']->value))) {?>
        <div class="pp__flex-item-1 <?php if (false === (isset($_smarty_tpl->tpl_vars['country_iso']->value)) || false === in_array($_smarty_tpl->tpl_vars['country_iso']->value,array('MX','BR','IN','JP'))) {?>stretchHeightForm<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['formStatus']->value;?>
        </div>
      <?php }?>
  </div>
<?php
}
}
/* {/block 'content'} */
}
