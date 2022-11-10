<?php
/* Smarty version 3.1.43, created on 2022-07-01 13:32:42
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/_partials/dhl-extracharges.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf2fba9cc404_01703412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b4cac481c613a0cff046df8e65b1eaf40f22d9f' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_label/_partials/dhl-extracharges.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf2fba9cc404_01703412 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="DG-box">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dhl_extracharges']->value, 'extracharge');
$_smarty_tpl->tpl_vars['extracharge']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['extracharge']->value) {
$_smarty_tpl->tpl_vars['extracharge']->do_else = false;
?>
      <div class="form-group
      <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_insurance']->value) {?> dhl-label-extracharge-insurance dhl-extracharge-non-doc
      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_excepted']->value) {?> dhl-label-extracharge-excepted dhl-extracharge-non-doc
      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_liability']->value) {?> dhl-label-extracharge-liability
      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_dangerous']->value) {?> dhl-label-extracharge-dangerous-goods
      <?php } else { ?>dhl-extracharge-non-doc<?php }?>
      ">

        <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_dangerous']->value) {?>
        <p class="dhl-dangerous-extracharges">
          <i class="icon icon-warning"></i>
          <span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Below are extracharges for dangerous shipments. You need to have validation of DHL before using them. For that, please contact your commercial','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</span>
        </p>
        <?php }?>
        <label class="control-label col-lg-3">
                  <span class="label-tooltip"
                        data-toggle="tooltip"
                        data-html="true"
                        title=""
                        data-original-title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['extracharge']->value['description'],'html','utf-8' ));?>
"
                  >
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['extracharge']->value['name'],'html','utf-8' ));?>

                  </span>
        </label>
        <div class="col-lg-2 <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] != $_smarty_tpl->tpl_vars['extracharge_insurance']->value && $_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] != $_smarty_tpl->tpl_vars['extracharge_DTP']->value && $_smarty_tpl->tpl_vars['extracharge']->value['extracharge_code'] != 'IB') {?>btn_DG <?php }?>">
                  <span class="switch prestashop-switch fixed-width-lg">
                    <input
                      <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_insurance']->value) {?>class="dhl-label-extracharge-insurance-on"
                      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_excepted']->value) {?>class="dhl-label-extracharge-excepted-on"
                      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_liability']->value) {?>class="dhl-label-extracharge-liability-on"<?php }?>
                      type="radio"
                      name="extracharge_<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
"
                      id="extracharge-<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
_on"
                      value="1"
                      <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['active']) {?>checked="checked"<?php }?>>
                    <label for="extracharge-<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
_on"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Yes','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                    <input
                      <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_insurance']->value) {?>class="dhl-label-extracharge-insurance-off"
                      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_excepted']->value) {?>class="dhl-label-extracharge-excepted-off"
                      <?php } elseif ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_excepted']->value) {?>class="dhl-label-extracharge-liability-off"<?php }?>
                      type="radio"
                      name="extracharge_<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
"
                      id="extracharge-<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
_off"
                      value="0"
                      <?php if (!$_smarty_tpl->tpl_vars['extracharge']->value['active']) {?>checked="checked"<?php }?>>
                    <label for="extracharge-<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
_off"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No','mod'=>'dhlexpress'),$_smarty_tpl ) );?>
</label>
                    <a class="slide-button btn"></a>
                  </span>
        </div>
        <div class="form-group div_nbr_pices_concerned dhl_nbr_pieces_concerned_<?php echo $_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'];?>
 col-lg-3" style="display: none;">
            <label class="control-label" for="dhl-nbr_piced_concerned">
              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Nb colis','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

            </label>
            <div class="input-group fixed-width-xs dhl-total-pieces-concerned-div">
                <input  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                        name="dhl-number-pieces-concerned-<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
"
                        type="text"
                        value=""
                        class="input fixed-width-sm dhl-number-pieces-concerned">
                <span class="input-group-addon dhl-total-pieces-concerned" id="dhl-total-pieces-concerned_<?php echo intval($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge']);?>
" name="dhl-total-pieces-concerned"> / 0 </span>
            </div>
        </div>
       <?php if ($_smarty_tpl->tpl_vars['extracharge']->value['id_dhl_extracharge'] == $_smarty_tpl->tpl_vars['extracharge_excepted']->value) {?>
            <div class="form-group col-lg-4" id="type_designation_div">
                <label class="control-label un_label" for="dhl-label-reference-id">
                  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'UN','mod'=>'dhlexpress'),$_smarty_tpl ) );?>

                </label>

                <div class="col-lg-8">
                  <div class="input-group">
                    <span id="dhl_type_designation_id_counter" class="input-group-addon">35</span>
                    <input type="text"
                           name="TYPE_DESIGNATION_UN_XXXX"
                           id="TYPE_DESIGNATION_UN_XXXX"
                           value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['type_designation']->value,'html','utf-8' ));?>
"
                           data-maxchar="35"
                           maxlength="35"
                    >
                  </div>
                  <?php echo '<script'; ?>
 type="text/javascript">
                    $(document).ready(function () {
                      countDown($("#TYPE_DESIGNATION_UN_XXXX"), $("#dhl_type_designation_id_counter"));
                    });
                  <?php echo '</script'; ?>
>
                </div>
              </div>
        <?php }?>
      </div>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
     <input type="hidden" name="dhl-total-pieces-concerned2" id="dhl-total-pieces-concerned2" value="" />
 </div><?php }
}
