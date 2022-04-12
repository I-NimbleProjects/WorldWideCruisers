<?php
/* Smarty version 3.1.43, created on 2022-04-12 10:01:09
  from '/var/www/html/prestashop/themes/theme_ecolife_air_purifier/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62558625abd0b2_26393808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85b5c676423c4be2acc41fbb14584b9341737154' => 
    array (
      0 => '/var/www/html/prestashop/themes/theme_ecolife_air_purifier/templates/index.tpl',
      1 => 1649431797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62558625abd0b2_26393808 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145332771462558625aba8d1_16777007', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_118489846962558625abae27_93768084 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_72222678362558625abbb89_99195853 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_213122960362558625abb601_29791848 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_72222678362558625abbb89_99195853', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_145332771462558625aba8d1_16777007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_145332771462558625aba8d1_16777007',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_118489846962558625abae27_93768084',
  ),
  'page_content' => 
  array (
    0 => 'Block_213122960362558625abb601_29791848',
  ),
  'hook_home' => 
  array (
    0 => 'Block_72222678362558625abbb89_99195853',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118489846962558625abae27_93768084', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213122960362558625abb601_29791848', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
