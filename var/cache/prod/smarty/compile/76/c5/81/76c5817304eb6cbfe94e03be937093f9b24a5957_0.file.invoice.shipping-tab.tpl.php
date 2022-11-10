<?php
/* Smarty version 3.1.43, created on 2022-07-01 07:52:15
  from '/var/www/html/prestashop/pdf/invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bedfef3ec800_49096814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76c5817304eb6cbfe94e03be937093f9b24a5957' => 
    array (
      0 => '/var/www/html/prestashop/pdf/invoice.shipping-tab.tpl',
      1 => 1648673915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bedfef3ec800_49096814 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
