<?php
/* Smarty version 3.1.43, created on 2022-07-01 07:53:36
  from '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_orders/_partials/_dhl_label_buttons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bee040716564_38825391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4204d0c0a2c02769f6fe7883f294b338b02106a4' => 
    array (
      0 => '/var/www/html/prestashop/modules/dhlexpress/views/templates/admin/dhl_orders/_partials/_dhl_label_buttons.tpl',
      1 => 1656074932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bee040716564_38825391 (Smarty_Internal_Template $_smarty_tpl) {
?>
<button class="btn btn-default dropdown-toggle dhl-dropdown dhl-dropdown-<?php echo intval($_smarty_tpl->tpl_vars['id_dhl_order']->value);?>
" data-dhl-order="<?php echo intval($_smarty_tpl->tpl_vars['id_dhl_order']->value);?>
" data-toggle="dropdown">
  <i class="icon-plus-circle"></i>
</button>
<?php }
}
