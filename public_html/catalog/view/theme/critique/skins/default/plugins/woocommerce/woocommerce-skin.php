<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'critique_woocommerce_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'critique_woocommerce_theme_setup3', 3 );
	function critique_woocommerce_theme_setup3() {
		if ( critique_exists_woocommerce() ) {

			// Section 'WooCommerce'
			critique_storage_set_array_before(
				'options', 'fonts', array_merge(
					array(
						'shop'               => array(
							'title'      => esc_html__( 'Shop', 'critique' ),
							'desc'       => wp_kses_data( __( 'Select theme-specific parameters to display the shop pages', 'critique' ) ),
							'priority'   => 80,
							'expand_url' => esc_url( critique_woocommerce_get_shop_page_link() ),
							'icon'       => 'icon-cart-3',
							'type'       => 'section',
						),
					),
					critique_options_get_list_cpt_options_body( 'shop', esc_html__( 'Product', 'critique' ) ),
					critique_options_get_list_cpt_options_header( 'shop', esc_html__( 'Product', 'critique' ) ),
					array(
						'products_info_shop' => array(
							'title'  => esc_html__( 'Products list', 'critique' ),
							'desc'   => '',
							'qsetup' => esc_html__( 'General', 'critique' ),
							'type'   => 'hidden',
						),
						'shop_mode'          => array(
							'title'   => esc_html__( 'Shop style', 'critique' ),
							'desc'    => wp_kses_data( __( 'Select style for the products list. Attention! If the visitor has already selected the list type at the top of the page - his choice is remembered and has priority over this option', 'critique' ) ),
							'std'     => 'thumbs',
							'options' => array(
								'thumbs' => array(
												'title' => esc_html__( 'Grid', 'critique' ),
												'icon'  => 'images/theme-options/shop/grid.png',
												),
								'list'   => array(
												'title' => esc_html__( 'List', 'critique' ),
												'icon'  => 'images/theme-options/shop/list.png',
												),
							),
							'qsetup'  => esc_html__( 'General', 'critique' ),
							'type'    => 'hidden',
						),
					),
					! get_theme_support( 'wc-product-grid-enable' )
					? array(
						'posts_per_page_shop' => array(
							'title' => esc_html__( 'Products per page', 'critique' ),
							'desc'  => wp_kses_data( __( 'How many products should be displayed on the shop page. If empty - use global value from the menu Settings - Reading', 'critique' ) ),
							'std'   => '',
							'type'  => 'hidden',
						),
						'blog_columns_shop'   => array(
							'title'      => esc_html__( 'Grid columns', 'critique' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used for the shop products in the grid view (from 2 to 4)?', 'critique' ) ),
							'dependency' => array(
								'shop_mode' => array( 'thumbs' ),
							),
							'std'        => 2,
							'options'    => critique_get_list_range( 2, 4 ),
							'type'       => 'hidden',
						),
					)
					: array(),
					array(
						'blog_animation_shop' => array(
							'title' => esc_html__( 'Product animation (shop page)', 'critique' ),
							'desc' => wp_kses_data( __( 'Select product animation for the shop page. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour!', 'critique' ) ),
							'std' => 'none',
							'options' => array(),
							'type' => 'select',
						),
						'shop_hover'              => array(
							'title'   => esc_html__( 'Hover style', 'critique' ),
							'desc'    => wp_kses_data( __( 'Hover style on the products in the shop archive', 'critique' ) ),
							'std'     => 'shop',
							'options' => apply_filters(
								'critique_filter_shop_hover',
								array(
									'none'         => esc_html__( 'None', 'critique' ),
									'shop'         => esc_html__( 'Icons', 'critique' ),
								)
							),
							'qsetup'  => esc_html__( 'General', 'critique' ),
							'type'    => 'hidden',
						),
						'shop_pagination'         => array(
							'title'   => esc_html__( 'Pagination style', 'critique' ),
							'desc'    => wp_kses_data( __( 'Pagination style in the shop archive', 'critique' ) ),
							'std'     => 'pages',
							'options' => apply_filters(
								'critique_filter_shop_pagination',
								array(
									'pages'    => array(
														'title' => esc_html__( 'Page numbers', 'critique' ),
														'icon'  => 'images/theme-options/pagination/page-numbers.png',
														),
									'infinite' => array(
														'title' => esc_html__( 'Infinite scroll', 'critique' ),
														'icon'  => 'images/theme-options/pagination/infinite-scroll.png',
														),
								)
							),
							'qsetup'  => esc_html__( 'General', 'critique' ),
							'type'    => 'hidden',
						),
					),
					critique_options_get_list_cpt_options_sidebar( 'shop', esc_html__( 'Product', 'critique' ) ),
					array(
						'single_info_shop'        => array(
							'title' => esc_html__( 'Single product', 'critique' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'single_product_layout'      => array(
							'title'      => esc_html__( 'Single product layout', 'critique' ),
							'desc'       => wp_kses_data( __( 'Select the layout of the single product page.', 'critique' ) ),
							'std'        => 'default',
							'override' => array(
								'mode'    => 'product',
								'section' => esc_html__( 'Content', 'critique' ),
							),
							'options'    => apply_filters(
															'critique_filter_woocommerce_single_product_layouts',
															array(
																'default'   => esc_html__( 'Default', 'critique' ),
																'stretched' => esc_html__( 'Stretched', 'critique' ),
															)
														),
							'type'       => 'hidden',
						),
						'show_related_posts_shop' => array(
							'title'  => esc_html__( 'Show related products', 'critique' ),
							'desc'   => wp_kses_data( __( "Show 'Related posts' section on single product page", 'critique' ) ),
							'std'    => 1,
							'type'   => 'switch',
						),
						'related_posts_shop'      => array(
							'title'      => esc_html__( 'Related products', 'critique' ),
							'desc'       => wp_kses_data( __( 'How many related products should be displayed on the single product page?', 'critique' ) ),
							'dependency' => array(
								'show_related_posts_shop' => array( 1 ),
							),
							'std'        => 3,
							'options'    => critique_get_list_range( 2, 3 ),
							'type'       => 'select',
						),
						'related_columns_shop'    => array(
							'title'      => esc_html__( 'Related columns', 'critique' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related products on the single product page?', 'critique' ) ),
							'dependency' => array(
								'show_related_posts_shop' => array( 1 ),
							),
							'std'        => 3,
							'options'    => critique_get_list_range( 2, 3 ),
							'type'       => 'select',
						),
					),
					critique_options_get_list_cpt_options_sidebar_single( 'shop', esc_html__( 'Product', 'critique' ) ),
					critique_options_get_list_cpt_options_footer( 'shop', esc_html__( 'Product', 'critique' ) )
				)
			);

			// Color schemes number: if < 2 - hide fields with selectors
			$hide_schemes = count( critique_storage_get( 'schemes' ) ) < 2;

			// Section 'WooCommerce'			
			critique_storage_set_array_after(
				'options', 'footer_scheme',
					array(
						'woo_footer_scheme' => array(
							'title'    => esc_html__( 'Shop Footer Color Scheme', 'critique' ),
							'desc'     => '',
							'std'      => 'dark',
							'options'  => array(),
							'refresh'  => false,
							'type'     => $hide_schemes ? 'hidden' : 'select',
						),
					)
			);	
			// Set 'WooCommerce Sidebar' as default for all shop pages
			critique_storage_set_array2( 'options', 'sidebar_widgets_shop', 'std', 'woocommerce_widgets' );
		}
	}
}

// Change star rating position
if ( ! function_exists( 'critique_change_loop_ratings_location' ) ) {
	add_action('woocommerce_after_shop_loop_item_title','critique_change_loop_ratings_location', 2 );
	function critique_change_loop_ratings_location(){
	    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5 );
	    add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 15 );
	}
}

// Change list of styles for "WooCommerce Search"
if ( ! function_exists( 'critique_list_woocommerce_search_types' ) ) {
	add_filter('trx_addons_filter_get_list_woocommerce_search_types', 'critique_list_woocommerce_search_types' );
	function critique_list_woocommerce_search_types($list){
	    unset($list['filter']);
	    return $list;
	}
}
