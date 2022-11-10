<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:45:56
  from '/var/www/html/prestashop/modules/paypal/views/templates/hook/displayAdminOrderContentOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6b14507c47_47953032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f1f03db42df9d921001653eee73cb16c86cdb4e' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/hook/displayAdminOrderContentOrder.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./tableLogs.tpl' => 1,
  ),
),false)) {
function content_62bf6b14507c47_47953032 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="tab-pane" id="paypal">
    <?php $_smarty_tpl->_subTemplateRender('file:./tableLogs.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
