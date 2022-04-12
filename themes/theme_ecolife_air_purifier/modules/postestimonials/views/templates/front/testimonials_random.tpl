{if $testimonials}
	<div class="testimonials_container full-width">
		<div class="container-fluid">
			<div class="pos_title">
				<h2><span>{l s='What our' d='Shop.Theme.Catalog'}</span> {l s='clients say' d='Shop.Theme.Catalog'}</h2>
				<div class=" desc_title">
					{l s='Welcome to my personal presentation' d='Shop.Theme.Catalog'} 
				</div>
			</div>
			<div class=" row pos_content">
				<div class="testimonialsSlide owl-carousel">
				  {foreach from=$testimonials name=myLoop item=testimonial}
					{if $testimonial.active == 1}
						{if $smarty.foreach.myLoop.index % 1 == 0 || $smarty.foreach.myLoop.first }
						<div class="item-testimonials" data-aos="zoom-in-up">
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
	testi.on('changed.owl.carousel initialized.owl.carousel', function(event) {
	$(event.target)
	  .find('.owl-item').removeClass('firstActiveItem')
	  .eq(event.item.index).addClass('firstActiveItem');
	  $(event.target)
	  .find('.owl-item').removeClass('lastActiveItem')
      .eq(event.item.index + event.page.size - 1).addClass('lastActiveItem');
	  }).owlCarousel({
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
		  1600 : {
	          items: 5
	      }
		}
	});
});


</script>

 {/if}