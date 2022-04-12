<?php
/* Smarty version 3.1.43, created on 2022-04-12 10:01:09
  from '/var/www/html/prestashop/modules/posslideshows/views/templates/hook/slider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_62558625b004c1_56926252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6fe5ac4c1fcd30503e5caa6af98899382ab1b74' => 
    array (
      0 => '/var/www/html/prestashop/modules/posslideshows/views/templates/hook/slider.tpl',
      1 => 1649431797,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_62558625b004c1_56926252 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="slideshow_container" data-speed="600" data-time="6000" data-nav="false" data-pag="true" data-pausehover="hover">
	<div class="pos-slideshow">
		<div class="flexslider ma-nivoslider">
			<div class="pos-loading"><span></span><img src="http://worldwidecruisers.com/modules/posslideshows/images/6ec76121c2a274264aae593a88e65cef768d61cb_b2b1867c-fbc1-4a61-8c2d-7dd31b7b101f.JPG" alt="" /></div>
			<div id="pos-slideshow-home" class="slides">
				
													<a href="/" title="fj45" ><img style="display:none" src="http://worldwidecruisers.com/modules/posslideshows/images/6ec76121c2a274264aae593a88e65cef768d61cb_b2b1867c-fbc1-4a61-8c2d-7dd31b7b101f.JPG"  data-thumb="http://worldwidecruisers.com/modules/posslideshows/images/6ec76121c2a274264aae593a88e65cef768d61cb_b2b1867c-fbc1-4a61-8c2d-7dd31b7b101f.JPG"  alt="" title="#htmlcaption3"  /> </a>
			   					<a href="/" title="Toyota" ><img style="display:none" src="http://worldwidecruisers.com/modules/posslideshows/images/039e07a60cd0d0f47f5adeddabe3434192d9b934_85_FJ45-6-720x480-d3f0197a-56bc-4768-9e89-a8c3f34c3f52.jpg"  data-thumb="http://worldwidecruisers.com/modules/posslideshows/images/039e07a60cd0d0f47f5adeddabe3434192d9b934_85_FJ45-6-720x480-d3f0197a-56bc-4768-9e89-a8c3f34c3f52.jpg"  alt="" title="#htmlcaption5"  /> </a>
			   			</div>
																<div id="htmlcaption3" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 6000ms ease-in-out;
								-moz-animation: myfirst 6000ms ease-in-out;
								-ms-animation: myfirst 6000ms ease-in-out;
								animation: myfirst 6000ms ease-in-out;
							
							">
							</div>
															 
																			</div>
									 					<div id="htmlcaption5" class="pos-slideshow-caption nivo-html-caption nivo-caption">					
							<div class="timethai" style=" 
								position:absolute;
								top:0;
								left:0;
								z-index:8;
								background-color: rgba(49, 56, 72, 0.298);
								height:5px;
								-webkit-animation: myfirst 6000ms ease-in-out;
								-moz-animation: myfirst 6000ms ease-in-out;
								-ms-animation: myfirst 6000ms ease-in-out;
								animation: myfirst 6000ms ease-in-out;
							
							">
							</div>
																																		</div>
									 			 		</div>
	</div>
</div>

 <script type="text/javascript">
 $(document).ready(function() {
	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	//Variables on page load 
	var $myCarousel = $('.ma-nivoslider'),
		$firstAnimatingElems = $myCarousel.find('.nivo-caption').find("[data-animation ^= 'animated']");
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

});
</script><?php }
}
