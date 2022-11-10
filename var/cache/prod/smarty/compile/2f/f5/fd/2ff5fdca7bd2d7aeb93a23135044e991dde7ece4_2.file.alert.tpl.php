<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:43:55
  from '/var/www/html/prestashop/modules/paypal/views/templates/admin/_partials/alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6a9b8ff001_20419448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ff5fdca7bd2d7aeb93a23135044e991dde7ece4' => 
    array (
      0 => '/var/www/html/prestashop/modules/paypal/views/templates/admin/_partials/alert.tpl',
      1 => 1655923391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6a9b8ff001_20419448 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="alert alert-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['type']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ((isset($_smarty_tpl->tpl_vars['widthByContent']->value)) && $_smarty_tpl->tpl_vars['widthByContent']->value) {?>d-inline-block<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['class']->value)) && $_smarty_tpl->tpl_vars['class']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
    <?php if ((isset($_smarty_tpl->tpl_vars['btnClose']->value)) && $_smarty_tpl->tpl_vars['btnClose']->value) {?>
        <button type="button" class="close" data-dismiss="alert">×</button>
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }
}
