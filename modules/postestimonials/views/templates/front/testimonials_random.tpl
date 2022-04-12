{if $testimonials}
	<div class="testimonials_container">
		<div class="container">
			<div class="pos_title">
				<div class=" desc_title">
					{l s='Welcome to my personal presentation' mod='postestimonials'}
				</div>
				<h2>{l s='What our clients say' mod='postestimonials'}</h2>
				
			</div>
			<div class=" row pos_content">
				<div class="testimonialsSlide owl-carousel">
				  {foreach from=$testimonials name=myLoop item=testimonial}
					{if $testimonial.active == 1}
						{if $smarty.foreach.myLoop.index % 1 == 0 || $smarty.foreach.myLoop.first }
						<div class="item-testimonials">
						{/if}	
							<div class="item">										
								<div class="content_author">
									<div class="img"><img src="{$mediaUrl}{$testimonial.media}" alt="Image Testimonial"></div>
									<div class="content_test">	
										<p class="des_namepost"><span>{$testimonial.name_post}</span></p>							
										<div class="des_testimonial">{$testimonial.content|escape:'html':'UTF-8'}</div>	
										<p class="des_email">{$testimonial.email}</p>										
										
									</div>							
								</div>						
							</div>
						{if $smarty.foreach.myLoop.iteration % 1 == 0 || $smarty.foreach.myLoop.last  }
						</div>
						{/if}
					{/if}
				  {/foreach}
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function() {
	var testi = $(".testimonialsSlide");
	testi.owlCarousel({
		autoplay :false,
		autoplayHoverPause: true,
		smartSpeed : 1000,
		nav :false,
		dots : true, 
		responsiveClass:true,
		responsive : {
		  0 : {
	          items: 1
	      }, 
		  360 : {
	          items: 1
	      },
	      576 : {
	          items: 2
	      },
	      768 : {
	          items: 2
	      },
	      992 : {
	          items:3
	      },
		  1200 : {
	          items: 3
	      }
		}
	});
});


</script>

 {/if}