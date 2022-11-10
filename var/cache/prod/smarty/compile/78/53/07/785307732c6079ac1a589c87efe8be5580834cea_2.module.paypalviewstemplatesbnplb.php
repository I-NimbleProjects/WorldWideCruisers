<?php
/* Smarty version 3.1.43, created on 2022-07-01 17:43:55
  from 'module:paypalviewstemplatesbnplb' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62bf6a9b8f97a4_82304609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '785307732c6079ac1a589c87efe8be5580834cea' => 
    array (
      0 => 'module:paypalviewstemplatesbnplb',
      1 => 1655923391,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf6a9b8f97a4_82304609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>

<!-- Start bnpl. Module Paypal -->
<?php ob_start();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['psPaypalDir']->value)."/views/templates/_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->assign('javascriptBlock', ob_get_clean());
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_80543255662bf6a9b8f7658_13303266', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_67466191162bf6a9b8f8485_20693934', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_32923925362bf6a9b8f8a97_08941628', 'js');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_73940989662bf6a9b8f9027_00371008', 'init-button');
?>

<!-- End bnpl. Module Paypal -->



<?php }
/* {block 'head'} */
class Block_80543255662bf6a9b8f7658_13303266 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_80543255662bf6a9b8f7658_13303266',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo $_smarty_tpl->tpl_vars['javascriptBlock']->value;?>

<?php
}
}
/* {/block 'head'} */
/* {block 'content'} */
class Block_67466191162bf6a9b8f8485_20693934 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_67466191162bf6a9b8f8485_20693934',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
/* {block 'js'} */
class Block_32923925362bf6a9b8f8a97_08941628 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_32923925362bf6a9b8f8a97_08941628',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'js'} */
/* {block 'init-button'} */
class Block_73940989662bf6a9b8f9027_00371008 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'init-button' => 
  array (
    0 => 'Block_73940989662bf6a9b8f9027_00371008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo '<script'; ?>
>
      function waitPaypalSDKIsLoaded() {
          if (typeof totPaypalBnplSdkButtons === 'undefined' || typeof BNPL === 'undefined') {
              setTimeout(waitPaypalSDKIsLoaded, 200);
              // console.log('here');
              return;
          }

          BNPL.init();

          if (typeof bnplColor != 'undefined') {
              BNPL.setColor(bnplColor);
          }

          BNPL.initButton();
      }

      waitPaypalSDKIsLoaded();
  <?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'init-button'} */
}
