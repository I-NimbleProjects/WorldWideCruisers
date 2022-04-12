<?php
/* Smarty version 3.1.43, created on 2022-04-12 08:46:04
  from '/var/www/html/prestashop/themes/theme_ecolife_air_purifier/templates/catalog/_partials/product-cover-thumbnails.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_6255748c7fcf27_30991851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f0df501b33dc4f5ca7925763091f7d3768415d0' => 
    array (
      0 => '/var/www/html/prestashop/themes/theme_ecolife_air_purifier/templates/catalog/_partials/product-cover-thumbnails.tpl',
      1 => 1649431797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6255748c7fcf27_30991851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 0) {?>
	<div class="images-container">
	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13434548036255748c7e1ed7_96619317', 'product_cover');
?>


	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1008962586255748c7e7a91_61048871', 'product_images');
?>

	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 1) {?>
	<div class="images-container left_vertical"> 
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8324054266255748c7eae67_27064010', 'product_images');
?>

	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1045161306255748c7edee0_62158318', 'product_cover');
?>

	</div>
<?php } elseif ($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'] == 2) {?>
	<div class="images-container right_vertical"> 
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6588007506255748c7f3996_11892837', 'product_images');
?>

	  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3035817876255748c7f65e4_88134068', 'product_cover');
?>

	</div> 
<?php }?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayAfterProductThumbs'),$_smarty_tpl ) );?>


 <?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function() {
	$('.images-container .slider-for').not('.slick-initialized').slick({
	   slidesToShow: 1,
	   slidesToScroll: 1,
	   focusOnSelect: true,
	   arrows: true, 
	   fade: true,
	   infinite: true,
	   lazyLoad: 'ondemand',
	   asNavFor: '.slider-nav'
	 });
	  if (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postheme']->value['product_thumbnail'], ENT_QUOTES, 'UTF-8');?>
 == 0) {
		 $('.images-container .slider-nav').not('.slick-initialized').slick({
		   slidesToShow: 4,
		   slidesToScroll: 1,
		   asNavFor: '.slider-for',
		   dots: false, 
		   arrows: true, 
		   infinite: true,
		   focusOnSelect: true
		 });
	 }else {
	 $('.images-container .slider-nav').not('.slick-initialized').slick({
	   slidesToShow: 4,
	   slidesToScroll: 1,
	   asNavFor: '.slider-for',
	   vertical:true,
	   dots: false, 
	   arrows: true, 
	   infinite: true,
	   focusOnSelect: true,
	   responsive: [
	   	{
		  breakpoint: 991,
		  settings: {
			slidesToShow: 2, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 4, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 543,
		  settings: {
			slidesToShow: 3, 
			slidesToScroll: 1,
		  }
		},
		{
		  breakpoint: 399,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1, 
		  }
		}
		]
	 });
	 }
	 
	 $('.images-container .slider-for').slickLightbox({
			src: 'src',
			itemSelector: '.thumb-item img'
	 });
	 	if($(window).width() >= 992) 
		{
			var $easyzoom = $('.images-container .easyzoom').easyZoom(); 
		}
	$(window).resize(function(){
		if($(window).width() >= 992)
		{
			 var $easyzoom = $('.images-container .easyzoom').easyZoom();  
			$('.easyzoom--overlay').addClass('easyzoom');
		}
		else
		{
			$('.easyzoom--overlay').removeClass('easyzoom'); 	
		}
	});
});
<?php echo '</script'; ?>
><?php }
/* {block 'product_flags'} */
class Block_4250136206255748c7e2347_99207391 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_13434548036255748c7e1ed7_96619317 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_13434548036255748c7e1ed7_96619317',
  ),
  'product_flags' => 
  array (
    0 => 'Block_4250136206255748c7e2347_99207391',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4250136206255748c7e2347_99207391', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_1008962586255748c7e7a91_61048871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_1008962586255748c7e7a91_61048871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		  <ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
			  <div class="thumb-container">
				<div>
				<img
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  width="100"
				  itemprop="image"
				>
				</div>
			  </div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		  </ul>

	  <?php
}
}
/* {/block 'product_images'} */
/* {block 'product_images'} */
class Block_8324054266255748c7eae67_27064010 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_8324054266255748c7eae67_27064010',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
			<div class="thumb-container">
				<div>
				<img 
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  itemprop="image"
				>
				</div>
			</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
		<?php
}
}
/* {/block 'product_images'} */
/* {block 'product_flags'} */
class Block_12388116876255748c7ee327_85193213 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_1045161306255748c7edee0_62158318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_1045161306255748c7edee0_62158318',
  ),
  'product_flags' => 
  array (
    0 => 'Block_12388116876255748c7ee327_85193213',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	   <div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12388116876255748c7ee327_85193213', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
/* {block 'product_images'} */
class Block_6588007506255748c7f3996_11892837 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_images' => 
  array (
    0 => 'Block_6588007506255748c7f3996_11892837',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<ul class="product-images slider-nav">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
			<div class="thumb-container">
				<div>
				<img 
				  class="thumb js-thumb <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image'] == $_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> selected <?php }?>"
				  src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['home_default']['url'], ENT_QUOTES, 'UTF-8');?>
"
				  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
				  itemprop="image"
				>
				</div>
			</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
		<?php
}
}
/* {/block 'product_images'} */
/* {block 'product_flags'} */
class Block_17200469076255748c7f69f9_17006867 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			<ul class="product-flag">
			  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['flags'], 'flag');
$_smarty_tpl->tpl_vars['flag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->do_else = false;
?>
				<li class=" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['type'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flag']->value['label'], ENT_QUOTES, 'UTF-8');?>
</li>
			  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		  <?php
}
}
/* {/block 'product_flags'} */
/* {block 'product_cover'} */
class Block_3035817876255748c7f65e4_88134068 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_cover' => 
  array (
    0 => 'Block_3035817876255748c7f65e4_88134068',
  ),
  'product_flags' => 
  array (
    0 => 'Block_17200469076255748c7f69f9_17006867',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	   <div class="product-view_content">
		  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17200469076255748c7f69f9_17006867', 'product_flags', $this->tplIndex);
?>

		<div class="product-cover slider-for">
		 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['images'], 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
		 <div class="thumb-item">
		  <?php if ($_smarty_tpl->tpl_vars['product']->value['cover']) {?>
		  <div class="easyzoom easyzoom--overlay">
		  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
">
		   <img class=""  style="width:100%;" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
		  </a>
		  </div>

		  <?php } else { ?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['no_picture_image']['bySize']['large_default']['url'], ENT_QUOTES, 'UTF-8');?>
" style="width:100%;">
		  <?php }?>
		   </div>
		 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		</div>
	  <?php
}
}
/* {/block 'product_cover'} */
}
