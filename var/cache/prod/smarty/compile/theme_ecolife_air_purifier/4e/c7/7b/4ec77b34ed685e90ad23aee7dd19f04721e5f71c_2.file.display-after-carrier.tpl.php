<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:43:55
  from '/var/www/html/prestashop/modules/springxbs/views/templates/hook/display-after-carrier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6a9b8a55c4_36190306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ec77b34ed685e90ad23aee7dd19f04721e5f71c' => 
    array (
      0 => '/var/www/html/prestashop/modules/springxbs/views/templates/hook/display-after-carrier.tpl',
      1 => 1656004313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6a9b8a55c4_36190306 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carriers']->value, 'service_code', false, 'id_carrier');
$_smarty_tpl->tpl_vars['service_code']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id_carrier']->value => $_smarty_tpl->tpl_vars['service_code']->value) {
$_smarty_tpl->tpl_vars['service_code']->do_else = false;
?>
    var img = document.querySelector('img[src*="/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['id_carrier']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
."]');
    if (img) {
        img.src = '<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['src']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
?service=<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['service_code']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&country=<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['country_iso']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
&get_carrier_logo=1';
        img.style['max-width'] = '55px';
        img.style['max-height'] = '55px';
    }
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo '</script'; ?>
>
<?php }
}
