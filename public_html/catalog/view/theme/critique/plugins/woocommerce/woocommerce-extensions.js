/* global jQuery:false */
/* global CRITIQUE_STORAGE:false */

jQuery( document ).on( 'action.ready_critique', function() {

	"use strict";

	var $window = jQuery( window ),
		$document = jQuery( document ),
		$body = jQuery( 'body' );


	// Gallery Fullwidth
	//-------------------------------------------

	// Make gallery fullwidth
	if ( $body.hasClass('single-product') ) {
		var $product = jQuery( '.single_product_gallery_style_fullwidth:not(.single_product_gallery_style_fullwidth_inited)' ).eq(0);
		if ( $product.length ) {
			var $gallery = $product.find( '.woocommerce-product-gallery' );
			if ( $gallery.length ) {
				$document.on( 'action.resize_critique', function() {
					critique_woocommerce_stretch_fullwidth();
				} );
				critique_woocommerce_stretch_fullwidth();
				$product.addClass( 'single_product_gallery_style_fullwidth_inited' );
			}
		}
	}


	// Stretch area to full window width
	function critique_woocommerce_stretch_fullwidth() {
		var $page_wrap = $gallery.closest( '.page_wrap' ),
			page_wrap_offset = $page_wrap.length === 0 ? 0 : $page_wrap.offset().left;
		if ($page_wrap.length === 0) {
			$page_wrap = $body;
		}
		var offset = -1 * ( page_wrap_offset - $product.offset().left );
		document.querySelector('html').style.setProperty( '--theme-var-single-product-gallery-shift', offset+'px' );
	}


	// Gallery 'Grid' - make it masonry
	//---------------------------------------------
	if ( $body.hasClass('single-product') ) {
		var product_wrap = jQuery( '.single_product_gallery_style_grid:not(.single_product_gallery_style_grid_inited)' );
		if ( product_wrap.length ) {
			product_wrap.addClass( 'single_product_gallery_style_grid_inited' );
			// Add gallery wrapper to the masonry selector
			critique_add_filter('critique_filter_masonry_wrap', function( selector ) {
				selector += ( selector ? ',' : '' ) + '.woocommerce-product-gallery__wrapper';
				return selector;
			});
			// Add gallery image to the masonry item selector
			critique_add_filter('critique_filter_masonry_item', function( selector ) {
				selector += ( selector ? ',' : '' ) + '.woocommerce-product-gallery__image,.woocommerce-product-gallery__video';
				return selector;
			});
		}
	}


	// Disable lightbox on click 'video_hover'
	//---------------------------------------------
	if ( $body.hasClass('single-product') ) {
		jQuery( '.woocommerce-product-gallery__image--with_video .trx_addons_popup_link:not(.single_product_gallery_video_inited)' ).each( function() {
			jQuery(this)
				.addClass( 'single_product_gallery_video_inited' )
				.on( 'click', function( e ) {
					e.stopPropagation();
				} );
		} );
	}


	// Bottom bar (sticky)
	//---------------------------------------------

	if ( CRITIQUE_STORAGE['add_to_cart_sticky'] ) {

		// Show sticky bar on form is out of the window viewport
		var $form = jQuery( '.summary form.cart' );
		if ( $form.length ) {
			critique_intersection_observer_add( $form, function( item, enter, data ) {
				if ( ! enter ) {
					if ( ! $body.hasClass( 'single_product_bottom_bar_sticky_on' ) ) {
						$body.addClass( 'single_product_bottom_bar_sticky_on' );
					}
				} else {
					if ( $body.hasClass( 'single_product_bottom_bar_sticky_on' ) ) {
						$body.removeClass( 'single_product_bottom_bar_sticky_on' );
					}
				}
			} );
		}

		// Hide sticky bar on footer is in to the window viewport
		var $footer = jQuery( '.single_product_bottom_bar_sticky_holder' );	// use '.single_product_bottom_bar_sticky_holder' to hide sticky after whole footer is appear
																			// or  '.footer_wrap' to hide sticky before footer is appear
		if ( $footer.length ) {
			critique_intersection_observer_add( $footer, function( item, enter, data ) {
				if ( ! enter ) {
					if ( ! $body.hasClass( 'single_product_bottom_bar_sticky_on' ) ) {
						$body.addClass( 'single_product_bottom_bar_sticky_on' );
					}
				} else {
					if ( $body.hasClass( 'single_product_bottom_bar_sticky_on' ) ) {
						$body.removeClass( 'single_product_bottom_bar_sticky_on' );
					}
				}
			} );
		}

		// Scroll to top on click button 'Select options' (for variable products only)
		jQuery( '.single_product_bottom_bar_button_select_options' ).on( 'click', function(e) {
			critique_document_animate_to( '.variations_form' );
			e.preventDefault();
			return false;
		} );
	}

} );
