<?php
/* Smarty version 3.1.43, created on 2022-08-25 12:39:54
  from '/var/www/html/prestashop/admin223ks1tob/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_6307a5da064fb7_41571730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3676f909790f264f3f1a2341c903108af097abc' => 
    array (
      0 => '/var/www/html/prestashop/admin223ks1tob/themes/default/template/content.tpl',
      1 => 1648673914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6307a5da064fb7_41571730 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>

<div class="row">
	<div class="col-lg-12">
		<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
