/* global jQuery:false */
/* global CRITIQUE_STORAGE:false */

( function() {
	"use strict";

	var $window   = jQuery( window ),
		$document = jQuery( document ),
		$body = jQuery( 'body' ),
		is_touch_device = ('ontouchstart' in document.documentElement);



	/* Init
	***************************/
	// Widget Slider
	critique_trx_addons_slider_init();

	// Shortcode Blogger
	critique_trx_addons_blogger_init();

	// Menu
	critique_trx_addons_menu_init();



	/* Ready
	***************************/
	$document.ready(function() {
		// Widget Recent News 
		critique_trx_addons_recent_news_ready();

		// Widget Recent Posts 
		critique_trx_addons_recent_posts_ready();

		// Widget Video List
		critique_trx_addons_video_list_ready();

		// Menu
		critique_trx_addons_menu_ready();

		// Layouts
		critique_trx_addons_layouts_ready();

		// Register/login tabs
		critique_trx_addons_login_ready();

		// Widget Rating Posts
		critique_trx_addons_rating_posts_ready();

		// Shortcode Blogger: Images
		critique_trx_addons_blogger_images_ready_ajax();
    
    // Blogger extended taxonomy & custom categories
		critique_trx_addons_extended_taxonomy('.post_categories .trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle .trx_addons_extended_taxonomy, .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle .trx_addons_extended_taxonomy');
		critique_trx_addons_categories_custom_style('.post_categories a:not(.inited), .post_categories a.inited > span.trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .post_sponsored_label, .slide_cats a');
	});



	/* Page Load
	***************************/
	$window.load(function() {		

		// Shortcode Blogger: Slider
		critique_trx_addons_blogger_slider_load_resize();

		// Widget Slider
		critique_trx_addons_slider_load_resize_ajax();
	});



	/* Page Resize
	***************************/
	$window.resize(function() {
		// Shortcode Blogger: Slider
		critique_trx_addons_blogger_slider_load_resize();		

		// Widget Slider
		critique_trx_addons_slider_load_resize_ajax();

		// Widget Video list
		critique_trx_addons_video_list_resize();

		// Blogger extended taxonomy & custom categories
		critique_trx_addons_categories_custom_style('.post_categories a:not(.inited), .post_categories a.inited > span.trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .post_sponsored_label, .slide_cats a');
	});



	/* Elementor Editor
	***************************/
	$window.on( 'elementor/frontend/init', function() {
		if ( typeof window.elementorFrontend !== 'undefined' && typeof window.elementorFrontend.hooks !== 'undefined' ) {
			// If Elementor is in the Editor's Preview mode
			if ( elementorFrontend.isEditMode() ) {
				// Init elements after creation
				elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $cont ) {	
					// Widget Rating Posts
					critique_trx_addons_rating_posts_ready();

					// Shortcode Blogger: Images
					critique_trx_addons_blogger_images_ready_ajax();
          
          // Blogger extended taxonomy & custom categories
          critique_trx_addons_extended_taxonomy('.post_categories .trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle .trx_addons_extended_taxonomy, .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle .trx_addons_extended_taxonomy');
					critique_trx_addons_categories_custom_style('.post_categories a:not(.inited), .post_categories a.inited > span.trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_type_wide .trx_addons_video_list_controller_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy, .slide_cats a');
				} );
			}
		}
	});



	/* AJAX
	***************************/
	$document.on( 'action.ajax_critique', function() { 
		// Shortcode Blogger: Images
		critique_trx_addons_blogger_images_ready_ajax();

		// Widget Slider
		critique_trx_addons_slider_load_resize_ajax();
	});



	/* LazyLoad
	***************************/
	$document.on('action.after_lazy_load', function() { 
		// Shortcode Blogger: Images
		critique_trx_addons_blogger_images_ready_ajax();
	});



	// Widget Slider
	function critique_trx_addons_slider_init() {
		// Slider min width
		critique_add_filter('trx_addons_filter_slider_controller_slide_width', function(width) {
			return 140;
		});

		// Slider all params
		critique_add_filter('trx_addons_filter_slider_init_args', function(params, slider) {
			var spv = params['slidesPerView'];
			params['lazy'] = true;
			params['effect'] = slider.data('effect') ? slider.data('effect') : (spv == 1 && slider.parents('.sc_blogger[class*="sc_blogger_default_over"]').length > 0 ? 'fade' : 'slide');
			return params;
		});
		
		// Slider controls html
		critique_add_filter('trx_addons_filter_slider_controls_html_fraction', function(html, controls) {
			html = html.replace('</span>/<span', '</span><span');
			return html;
		});
	}

	// Shortcode Blogger
	function critique_trx_addons_blogger_init() {
		critique_add_filter('trx_addons_filter_set_min_height_on_switch_tabs', function(set, sc) {
			if ( sc.parents('.sc_layouts_submenu').length !== 0 ) {
				set = false;
			}
			return set;
		});
	}

	// Menu
	function critique_trx_addons_menu_init() {
		// Superfish menu params
		critique_add_filter('trx_addons_filter_menu_init_args', function(sf_init) {
			sf_init['delay'] = is_touch_device ? 500 : 200;
			sf_init['speed'] = 0;
			sf_init['speedOut'] = 200;
			return sf_init;
		});
		
		// Superfish method - onBeforeShow
		critique_add_action('trx_addons_action_menu_on_before_show', function(menu_item) {
			if ( !is_touch_device && menu_item ) {
				menu_item.addClass('wait');
			}
		});
		
		// Superfish animation in
		critique_add_filter('trx_addons_filter_menu_animation_in', function(animated, menu_item, animation_in, animation_out) {		
			var delay = 0;
			if ( !is_touch_device ) {
				delay = menu_item.parents('ul.sub-menu').length > 0 ? 200 : 500;
			}
			window.menuFadeTimer = setTimeout(function() {
				if ( menu_item.hasClass('animated') && menu_item.hasClass(animation_out) ) {
					menu_item.removeClass('animated fast '+animation_out);
				}
				menu_item.removeClass('wait').addClass('animated fast '+animation_in);
			}, delay);
			return true;
		});

		// Superfish before animation out
		critique_add_action('trx_addons_action_menu_before_animation_out', function() {
			clearTimeout(window.menuFadeTimer);
		});

		// Timer for fix/unfix row
		critique_add_filter('trx_addons_filter_sc_layouts_row_fixed_off_timeout', function(time) {		
			return 200;
		});	

		// Stretch sumbenu
		critique_add_filter('trx_addons_filter_stretch_menu_to', function(result, menu_item) {
			// Change parent container for the fullwidth submenu
			if ( menu_item.parents('.elementor-section-full_width').length > 0 && menu_item.parents('.elementor-section-boxed').length == 0 ) {
				result = 'window';
			}				
			return result;
		});
	}	

	// Widget Recent News
	function critique_trx_addons_recent_news_ready() {
		if ( jQuery('.sc_recent_news').length > 0 ) { 
			jQuery('.sc_recent_news.sc_recent_news_style_news-magazine.magazine_type_on_plate').each(function(){
				jQuery(this).parent().addClass('on_plate');		
			});
		}
	}

	// Widget Recent Posts
	function critique_trx_addons_recent_posts_ready() {
		// Wrap recent post widget title for underline animation
		if ( jQuery('.sc_recent_posts').length > 0 ) { 
			jQuery('.sc_recent_posts .post_content .post_title a').each(function() {
			   jQuery(this).wrapInner('<span></span>');
			});
		}
	}

	// Widget Video List 
	function critique_trx_addons_video_list_ready() {
		// Video List (add padding when horizontal scroll)
		jQuery('.trx_addons_video_list_controller_wrap').each(function() {
		    var $this = jQuery(this),
		        scrollWidth = this.scrollWidth,
		        width = Math.ceil($this.outerWidth());
		    if ( scrollWidth > width ) {
		    	$this.addClass('with_scroll').css('paddingBottom', '15px');		    
		    }	    
		});	
	}

	// Menu 
	function critique_trx_addons_menu_ready() {
		if ( jQuery('.elementor-nav-menu').length > 0 ) { 
			jQuery('.elementor-nav-menu .sc_layouts_submenu').each(function() {
				jQuery(this).find('> li').remove();
				jQuery(this).addClass('sub-menu elementor-nav-menu--dropdown').removeClass('sc_layouts_submenu').append('<li class="menu-item"><span><a href="#" style="pointer-events: none;">' + CRITIQUE_STORAGE['submenu_not_allowed'] + '</a></span></li>');
			});
		}
	}		

	// Layouts
	function critique_trx_addons_layouts_ready() {
		// Close panel on click on the page
		if ( jQuery('.sc_layouts_panel').length > 0 ) { 
			$body.on('click', function(e) {
				if ( jQuery(e.target).closest('.sc_layouts_panel').length ) { 
				 	return;    
				} 
				if( jQuery('.sc_layouts_panel_opened').length > 0 ) {
					trx_addons_close_panel(jQuery('.sc_layouts_panel_opened'));
				}			
			});	
		}
	}

	// Register/login tabs
	function critique_trx_addons_login_ready() {		
		if ( jQuery('#trx_addons_login_popup').length > 0 ) { 
			jQuery('.trx_addons_tabs_title_register a').on('click', function() {
				jQuery('#trx_addons_login_content').hide();
				jQuery('#trx_addons_register_content').show();
				$document.trigger('action.opened_popup_elements')
			});
			jQuery('.trx_addons_tabs_title_login a').on('click', function() {
				jQuery('#trx_addons_register_content').hide();
				jQuery('#trx_addons_login_content').show();
				$document.trigger('action.opened_popup_elements')
			});
		}
	}

	// Widget Rating Posts
	function critique_trx_addons_rating_posts_ready() {
		if ( jQuery('.sc_rating_posts').length > 0 ) { 
			// Replace mark text for "Widget: Rating Posts" (type Default)
			jQuery('.sc_rating_posts.type_default .post_item:not(.inited)').each(function() {
				var self = jQuery(this).addClass('inited');
				var trxAddonsReviewsTextMax = self.find('.trx_addons_reviews_text_max'),	
				trxAddonsReviewsTextMark = self.find('.trx_addons_reviews_text_mark'),
				trxAddonsReviewsTextMaxText = trxAddonsReviewsTextMax.text(),
				trxAddonsReviewsTextMarkText = trxAddonsReviewsTextMark.text();

				if( trxAddonsReviewsTextMaxText == 5 || trxAddonsReviewsTextMaxText == 10 ) {
					var updatedMax = 100;
					var updatedMark = Math.round(trxAddonsReviewsTextMarkText * 100 / trxAddonsReviewsTextMaxText);
					trxAddonsReviewsTextMax.html(updatedMax);
					trxAddonsReviewsTextMark.html(updatedMark);
				}
			});	

			// Replace mark text for "Widget: Rating Posts"  (type Modern)
			jQuery('.sc_rating_posts.type_modern .post_item:not(.inited)').each(function(){
				var self = jQuery(this).addClass('inited');
				var trxAddonsReviewsTextMax = self.find('.trx_addons_reviews_text_max'),	
				trxAddonsReviewsTextMark = self.find('.trx_addons_reviews_text_mark'),
				trxAddonsReviewsTextMaxText = trxAddonsReviewsTextMax.text(),
				trxAddonsReviewsTextMarkText = trxAddonsReviewsTextMark.text();

				if( trxAddonsReviewsTextMaxText == 10 || trxAddonsReviewsTextMaxText == 100 ) {
					var updatedMax = 5;
					var updatedMark = trxAddonsReviewsTextMarkText / (trxAddonsReviewsTextMaxText / 5);
					updatedMark = updatedMark.toFixed(1);
					if(Number.isInteger(updatedMark)) {
						updatedMark += '.0';
					}
					trxAddonsReviewsTextMax.html(updatedMax);
					trxAddonsReviewsTextMark.html(updatedMark);
				}
			});	
		}
	}

	// Shortcode Blogger: Images
	function critique_trx_addons_blogger_images_ready_ajax() {
		// Blogger Wide
		jQuery('.sc_blogger_item_wide:not(.sc_blogger_item_info_over_image) .post_featured:not(.size_inited)').addClass('size_inited').each(function() {
			var image_width = jQuery(this).width();
			if (image_width < 600) {
				jQuery(this).parents('.sc_blogger_item').addClass('small_image');
			}
		});

		// Blogger List
		jQuery('.sc_blogger_item_list:not(.sc_blogger_item_image_position_top) .post_featured:not(.size_inited)').addClass('size_inited').each(function() {
			var image_width = jQuery(this).width();
			if (image_width > 90 && image_width <= 100) {
				jQuery(this).parents('.sc_blogger_item').addClass('small_image');
			}
			if (image_width <= 90) {
				jQuery(this).parents('.sc_blogger_item').addClass('tiny_image');
			}
		});

		// Blogger Info over image - Modern
		jQuery('.sc_blogger_default_over_bottom_modern').each(function() { 
			var blogger = jQuery(this);						
			if ( blogger.find('.bg_mask_wrap').length == 0 ) {
				blogger.find('.sc_blogger_content, .trx_addons_columns_wrap, .masonry_wrap, .sc_blogger_slider > .slider_multi:not(.swiper-container-fade)').prepend('<div class="bg_mask_wrap"></div>');
			}

			// Create masks from post's images
			blogger.find('.sc_blogger_item:not(.bg_inited)').each(function() {
				var item = jQuery(this);
				var id = item.data('post-id');
				var img = item.find('.post_featured_wrap > img,	.post_featured > img');
				var img_url = '';

				// Check normal <img>
				if ( img.length > 0 ) {
					if ( jQuery('body').hasClass('allow_lazy_load') && !img.hasClass('lazyload_inited') ) {
						return;
					}
					img_url = img.attr('src');
				} else {
					// Check background images
					img = item.find('.featured_bg_wrapper .featured_bg');
					if ( img.length > 0 ) {
						if ( jQuery('body').hasClass('allow_lazy_load') && !img.hasClass('lazyload_inited') ) {
							return;
						}
						img_url = img.css('background-image').replace('url("', '').replace('")', '').replace("'", '').replace("'", '');
					} else {
						// Check sliders
						img = item.find('.slider-slide');
						if ( img.length > 0 ) {
							if ( jQuery('body').hasClass('allow_lazy_load') && !img.hasClass('lazyload_inited') ) {
								return;
							}
							img_url = img.css('background-image').replace('url("', '').replace('")', '').replace("'", '').replace("'", '');
						}
					}
				}

				if ( img_url != '' && id ) {
					if ( blogger.find('.sc_blogger_slider > .slider_multi:not(.swiper-container-fade)').length > 0 ) {
						blogger.addClass('with_slider').find('.sc_blogger_slider > .slider_multi:not(.swiper-container-fade) .bg_mask_wrap').prepend('<div class="bg_mask" data-post-id="'+id+'" style="background-image: url('+img_url+')"></div>');
					} else {
						blogger.find('.sc_blogger_content .bg_mask_wrap, .trx_addons_columns_wrap .bg_mask_wrap, .masonry_wrap .bg_mask_wrap').prepend('<div class="bg_mask" data-post-id="'+id+'" style="background-image: url('+img_url+')"></div>');
					}
				}

				item.addClass('bg_inited');
			});

			// Make first mask active
			if ( blogger.find('.sc_blogger_item.bg_inited').length > 0 && blogger.find('.bg_mask.active').length == 0) {
				blogger.find('.bg_mask:first-child').addClass('active');
			}

			// Change active mask after post hover
			blogger.find('.sc_blogger_item.bg_inited').on('mouseover', function() {
				var item = jQuery(this);  
				var id = item.data('post-id');
				var mask = blogger.find('.bg_mask[data-post-id="'+id+'"]');
				if ( id && mask.length > 0 && !mask.hasClass('active') ) {
					blogger.find('.bg_mask.active').removeClass('active');
					mask.addClass('active');
				}
			});
		});
	}

	// Shortcode Blogger: Slider
	function critique_trx_addons_blogger_slider_load_resize() {
		if ( jQuery('.sc_blogger_slider').length > 0 ) {
			// Cropp text if blogger style is Simple
			jQuery('.sc_blogger_slider .sc_blogger_item_list.sc_blogger_item_list_simple h6.sc_blogger_item_title').each(function(){
				var title = jQuery(this);
				title.removeClass('cropped');
				if ( title.find('span').width() > title.width() ) {
					title.addClass('cropped');
				}
			})
		}
	}

	// Widget Slider
	function critique_trx_addons_slider_load_resize_ajax() {
		if ( jQuery('.slider_container').length > 0 ) {
			setTimeout(function(){
				jQuery('.slider_container .slider-slide.with_titles > .trx_addons_video_player').each(function() {
					var item = jQuery(this);
					var height = item.find('.video_hover ').outerHeight() + item.find('+ .slide_info').outerHeight() + 30;
					if ( item.parent().height() < height ) {
						item.addClass('hide'); 
						item.parent().find('.slide_link').removeClass('hide'); 
					} else {
						item.removeClass('hide'); 
						item.parent().find('.slide_link').addClass('hide'); 
					}
				});
			}, 50);
		}
	}



	// Widget Video list
	function critique_trx_addons_video_list_resize() {
		if ( jQuery('.trx_addons_video_list').length > 0 ) {
			jQuery('.trx_addons_video_list .trx_addons_video_player.video_play ').each(function(){	       			
	   			jQuery(this).children('img').animate({
	   				opacity: 0,
	   				height: 0
	   			}, 300).css('display', 'none').siblings('.video_embed').css('position', 'static');	       			
	       	});
	       	jQuery('.trx_addons_video_list.trx_addons_video_list_type_news .trx_addons_video_player.video_play ').each(function(){
	       		jQuery(this).parents('.trx_addons_video_list').find('.trx_addons_video_list_controller_item_active').addClass('hide_oveflow_image').siblings().removeClass('hide_oveflow_image');			
	       	}); 
	       	jQuery('.trx_addons_video_list.trx_addons_video_list_type_news .trx_addons_video_list_controller_item_link ').click(function(){
	       		jQuery(this).parents('.trx_addons_video_list').find('.trx_addons_video_list_controller_item.hide_oveflow_image').removeClass('hide_oveflow_image');			
	       	}); 
          
          // Blogger extended taxonomy & custom categories
	       	jQuery('.trx_addons_video_list .trx_addons_video_list_controller_item_link ').click(
	       		critique_trx_addons_extended_taxonomy('.post_categories .trx_addons_extended_taxonomy, .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle .trx_addons_extended_taxonomy')).click(
	       		critique_trx_addons_categories_custom_style('.trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a:not(.inited), .trx_addons_video_list_video_wrap .trx_addons_video_list_subtitle a.inited .trx_addons_extended_taxonomy')
	       	);	
		}
	}
  
  // Blogger extended taxonomy 
	function critique_trx_addons_extended_taxonomy(cont) {
		jQuery(cont).each(function() {
			var item = jQuery(this);
			var parent = jQuery(this).parent();

			parent.addClass('inited trx_addons_extended_taxonomy_parent');

			if(item.hasClass('trx_addons_extended_taxonomy_bg')) {
				parent.addClass('trx_addons_extended_taxonomy_parent_bg');
			}
		});
	}

	// Wrap categories inner text for custom style
	function critique_trx_addons_categories_custom_style(cont) {
		jQuery(cont).each(function() {
			var item = jQuery(this),
			itemContent = item.html(),
			itemText = '<samp class="inited">' + item.text() + '</samp>';

			item.addClass('inited').empty().html(itemText);
		});
	}

})();