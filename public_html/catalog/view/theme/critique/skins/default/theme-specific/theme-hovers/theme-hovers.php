<?php
/**
 * Generate custom CSS for theme hovers
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'critique_hovers_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'critique_hovers_theme_setup3', 3 );
	function critique_hovers_theme_setup3() {

		// Add 'Buttons hover' option
		critique_storage_set_array_after(
			'options', 'border_radius', array(
				'button_hover' => array(
					'title'   => esc_html__( "Button hover", 'critique' ),
					'desc'    => wp_kses_data( __( 'Select a hover effect for theme buttons', 'critique' ) ),
					'std'     => 'default',
					'options' => array(
						'default'      => esc_html__( 'Fade', 'critique' ),
						'slide_left'   => esc_html__( 'Slide from Left', 'critique' ),
						'slide_right'  => esc_html__( 'Slide from Right', 'critique' ),
						'slide_top'    => esc_html__( 'Slide from Top', 'critique' ),
						'slide_bottom' => esc_html__( 'Slide from Bottom', 'critique' ),
					),
					'type'    => 'hidden',
				),
				'image_hover'  => array(
					'title'    => esc_html__( "Image hover", 'critique' ),
					'desc'     => wp_kses_data( __( 'Select a hover effect for theme images', 'critique' ) ),
					'std'      => 'inherit',
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'critique' ),
					),
					'options'  => critique_get_list_hovers(),
					'type'     => 'select',
					'type'     => 'hidden',
				),
			)
		);
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_hovers_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'critique_hovers_theme_setup9', 9 );
	function critique_hovers_theme_setup9() {
		add_action( 'wp_enqueue_scripts', 'critique_hovers_frontend_scripts', 1100 );      // Priority 1100 -  after theme scripts (1000)
		add_action( 'wp_enqueue_scripts', 'critique_hovers_frontend_styles', 1100 );       // Priority 1100 -  after theme/skin styles (1050)
		add_action( 'wp_enqueue_scripts', 'critique_hovers_responsive_styles', 2100 );     // Priority 2100 -  after theme/skin responsive (2000)
		add_filter( 'critique_filter_localize_script', 'critique_hovers_localize_script' );
		add_filter( 'critique_filter_merge_scripts', 'critique_hovers_merge_scripts' );
		add_filter( 'critique_filter_merge_styles', 'critique_hovers_merge_styles' );
		add_filter( 'critique_filter_merge_styles_responsive', 'critique_hovers_merge_styles_responsive' );
	}
}

// Enqueue hover styles and scripts
if ( ! function_exists( 'critique_hovers_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'critique_hovers_frontend_scripts', 1100 );
	function critique_hovers_frontend_scripts() {
		if ( critique_is_on( critique_get_theme_option( 'debug_mode' ) ) ) {
			$critique_url = critique_get_file_url( 'theme-specific/theme-hovers/theme-hovers.js' );
			if ( '' != $critique_url ) {
				wp_enqueue_script( 'critique-hovers', $critique_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'critique_hovers_frontend_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'critique_hovers_frontend_styles', 1100 );
	function critique_hovers_frontend_styles() {
		if ( critique_is_on( critique_get_theme_option( 'debug_mode' ) ) ) {
			$critique_url = critique_get_file_url( 'theme-specific/theme-hovers/theme-hovers.css' );
			if ( '' != $critique_url ) {
				wp_enqueue_style( 'critique-hovers', $critique_url, array(), null );
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'critique_hovers_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'critique_hovers_responsive_styles', 2100 );
	function critique_hovers_responsive_styles() {
		if ( critique_is_on( critique_get_theme_option( 'debug_mode' ) ) ) {
			$critique_url = critique_get_file_url( 'theme-specific/theme-hovers/theme-hovers-responsive.css' );
			if ( '' != $critique_url ) {
				wp_enqueue_style( 'critique-hovers-responsive', $critique_url, array(), null, critique_media_for_load_css_responsive( 'hovers' ) );
			}
		}
	}
}

// Merge hover effects into single css
if ( ! function_exists( 'critique_hovers_merge_styles' ) ) {
	//Handler of the add_filter( 'critique_filter_merge_styles', 'critique_hovers_merge_styles' );
	function critique_hovers_merge_styles( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers.css';
		return $list;
	}
}

// Merge hover effects to the single css (responsive)
if ( ! function_exists( 'critique_hovers_merge_styles_responsive' ) ) {
	//Handler of the add_filter( 'critique_filter_merge_styles_responsive', 'critique_hovers_merge_styles_responsive' );
	function critique_hovers_merge_styles_responsive( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers-responsive.css';
		return $list;
	}
}

// Add hover effect's vars to the localize array
if ( ! function_exists( 'critique_hovers_localize_script' ) ) {
	//Handler of the add_filter( 'critique_filter_localize_script','critique_hovers_localize_script' );
	function critique_hovers_localize_script( $arr ) {
		$arr['button_hover'] = critique_get_theme_option( 'button_hover' );
		return $arr;
	}
}

// Merge hover effects to the single js
if ( ! function_exists( 'critique_hovers_merge_scripts' ) ) {
	//Handler of the add_filter( 'critique_filter_merge_scripts', 'critique_hovers_merge_scripts' );
	function critique_hovers_merge_scripts( $list ) {
		$list[] = 'theme-specific/theme-hovers/theme-hovers.js';
		return $list;
	}
}

// Add hover icons on the featured image
if ( ! function_exists( 'critique_hovers_add_icons' ) ) {
	function critique_hovers_add_icons( $hover, $args = array() ) {
		// Reviews
		if ( ( !critique_exists_woocommerce() || ( critique_exists_woocommerce() && !is_woocommerce() ) ) && 'shop_buttons' != $hover && 'shop' != $hover) {
			if ( critique_exists_trx_addons() && in_array('rating', $args['meta_parts']) ) {
				$trx_addons_meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
				if ( ! empty( $trx_addons_meta['reviews_mark'] ) ) { 
					$trx_addons_reviews_max  = trx_addons_get_option('reviews_mark_max');
					$trx_addons_reviews_decimals = trx_addons_get_option('reviews_mark_decimals');
					$trx_addons_reviews_mark = trx_addons_reviews_mark2show( $trx_addons_meta['reviews_mark'], $trx_addons_reviews_max ); ?>
					<div class="post_hover_rating">
						<div class="trx_addons_reviews_block_mark">
							<canvas id="sc_reviews_<?php echo esc_attr(get_the_ID()); ?>_mark" 
								width="56" height="56" 
								data-max-value="<?php echo esc_attr($trx_addons_reviews_max); ?>" 
								data-decimals="<?php echo esc_attr($trx_addons_reviews_decimals); ?>"
								data-value="<?php echo esc_attr($trx_addons_reviews_mark); ?>" 
								data-color="<?php echo esc_attr( critique_get_scheme_color( 'text_link3' ) ); ?>"></canvas>					
							<span class="trx_addons_reviews_block_mark_value" data-max-value="<?php echo esc_attr($trx_addons_reviews_max); ?>"  data-decimals="<?php echo esc_attr($trx_addons_reviews_decimals); ?>"><?php
								echo esc_html( $trx_addons_reviews_mark );
							?></span>
							<span class="trx_addons_reviews_block_mark_progress"></span>
						</div>
					</div><?php
				}			
			}			
		}
		// Additional parameters
		$args = array_merge(
			array(
				'cat'        => '',
				'image'      => null,
				'no_links'   => false,
				'link'       => '',
				'post_info'  => '',
				'meta_parts' => ''
			), $args
		);

		$post_link = empty( $args['no_links'] )
						? ( ! empty( $args['link'] )
							? $args['link']
							: apply_filters( 'critique_filter_get_post_link', get_permalink() )
							)
						: '';
		$no_link   = 'javascript:void(0)';
		$target    = ! empty( $post_link ) && false === strpos( $post_link, home_url() )
						? ' target="_blank" rel="nofollow"'
						: '';

		if ( in_array( $hover, array( 'icons', 'zoom' ) ) ) {
			// Hover style 'Icons and 'Zoom'
			if ( $args['image'] ) {
				$large_image = $args['image'];
			} else {
				$attachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 'masonry-big' );
				if ( ! empty( $attachment[0] ) ) {
					$large_image = $attachment[0];
				}
			}
			?>
			<div class="icons">
				<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : esc_attr( $no_link ); ?>" <?php critique_show_layout($target); ?> aria-hidden="true" class="icon-link
									<?php
									if ( empty( $large_image ) ) {
										echo ' single_icon';
									}
									?>
				"></a>
				<?php if ( ! empty( $large_image ) ) { ?>
				<a href="<?php echo esc_url( $large_image ); ?>" aria-hidden="true" class="icon-search" title="<?php the_title_attribute( '' ); ?>"></a>
				<?php } ?>
			</div>
			<?php

		} elseif ( 'shop' == $hover || 'shop_buttons' == $hover ) {
			// Hover style 'Shop'
			global $product;
			?>
			<div class="icons">
				<a href="<?php echo esc_url( is_object( $args['cat'] ) ? get_term_link( $args['cat']->slug, 'product_cat' ) : get_permalink() ); ?>" aria-hidden="true" class="shop_link button icon-link">
				<?php
				if ( 'shop_buttons' == $hover ) {
					if ( is_object( $args['cat'] ) ) {
						esc_html_e( 'View products', 'critique' );
					} else {
						esc_html_e( 'Details', 'critique' );
					}
				}
				?>
				</a>
				<?php
				if ( ! is_object( $args['cat'] ) ) {
					critique_show_layout(
						apply_filters(
							'woocommerce_loop_add_to_cart_link',
							'<a rel="nofollow" href="' . esc_url( $product->add_to_cart_url() ) . '" 
														aria-hidden="true" 
														data-quantity="1" 
														data-product_id="' . esc_attr( $product->is_type( 'variation' ) ? $product->get_parent_id() : $product->get_id() ) . '"
														data-product_sku="' . esc_attr( $product->get_sku() ) . '"
														class="shop_cart icon-cart-2 button add_to_cart_button'
																. ' product_type_' . $product->get_type()
																. ' product_' . ( $product->is_purchasable() && $product->is_in_stock() ? 'in' : 'out' ) . '_stock'
																. ( $product->supports( 'ajax_add_to_cart' ) ? ' ajax_add_to_cart' : '' )
																. '">'
											. ( 'shop_buttons' == $hover ? ( $product->is_type( 'variable' ) ? esc_html__( 'Select options', 'critique' ) : esc_html__( 'Buy now', 'critique' ) ) : '' )
										. '</a>',
							$product
						)
					);
				}
				?>				
			</div>
			<?php

		} elseif ( 'icon' == $hover ) {
			// Hover style 'Icon'
			?>
			<div class="icons"><a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : esc_attr( $no_link ); ?>" <?php critique_show_layout($target); ?> aria-hidden="true" class="icon-search-alt"></a></div>
			<?php

		} elseif ( 'dots' == $hover ) {
			// Hover style 'Dots'
			?>
			<a href="<?php echo ! empty( $post_link ) ? esc_url( $post_link ) : esc_attr( $no_link ); ?>" <?php critique_show_layout($target); ?> aria-hidden="true" class="icons"><span></span><span></span><span></span></a>
			<?php

		} elseif ( 'info' == $hover ) {
			// Hover style 'Info'
			if ( ! empty( $args['post_info'] ) ) {
				critique_show_layout( $args['post_info'] );
			} else {
				$critique_components = empty( $args['meta_parts'] )
										? critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) )
										: ( is_array( $args['meta_parts'] )
											? $args['meta_parts']
											: explode( ',', $args['meta_parts'] )
											);
				?>
				<div class="post_info">
					<?php
					if ( in_array( 'categories', $critique_components ) ) {
						if ( apply_filters( 'critique_filter_show_blog_categories', true, array( 'categories' ) ) ) {
							?>
							<div class="post_category">
								<?php
								$categories = critique_show_post_meta( apply_filters(
																	'critique_filter_post_meta_args',
																	array(
																		'components' => 'categories',
																		'seo'        => false,
																		'echo'       => false,
																		),
																	'hover_' . $hover, 1
																	)
													);
								critique_show_layout( str_replace( ', ', '', $categories ) );
								?>
							</div>
							<?php
						}
						$critique_components = critique_array_delete_by_value( $critique_components, 'categories' );
					}
					if ( apply_filters( 'critique_filter_show_blog_title', true ) ) {
						?>
						<h4 class="post_title">
							<?php
							if ( ! empty( $post_link ) ) {
								?>
								<a href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?>>
								<?php
							}
							the_title();
							if ( ! empty( $post_link ) ) {
								?>
								</a>
								<?php
							}
							?>
						</h4>
						<?php
					}
					?>
					<div class="post_descr">
						<?php
						if ( ! empty( $critique_components ) && count( $critique_components ) > 0 ) {
							if ( apply_filters( 'critique_filter_show_blog_meta', true, $critique_components ) ) {
								critique_show_post_meta(
									apply_filters(
										'critique_filter_post_meta_args', array(
											'components' => join( ',', $critique_components ),
											'seo'        => false,
											'echo'       => true,
										), 'hover_' . $hover, 1
									)
								);
							}
						}
						?>
					</div>
					<?php
					if ( ! empty( $post_link ) ) {
						?>
						<a class="post_link" href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?>></a>
						<?php
					}
					?>
				</div>
				<?php
			}

		} elseif ( in_array( $hover, array( 'fade', 'pull', 'slide', 'border', 'excerpt' ) ) ) {
			// Hover style 'Fade', 'Slide', 'Pull', 'Border', 'Excerpt'
			if ( ! empty( $args['post_info'] ) ) {
				critique_show_layout( $args['post_info'] );
			} else {
				?>
				<div class="post_info">
					<div class="post_info_back">
						<?php
						if ( apply_filters( 'critique_filter_show_blog_title', true ) ) {
							?>
							<h4 class="post_title">
								<?php
								if ( ! empty( $post_link ) ) {
									?>
									<a href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?>>
									<?php
								}
								the_title();
								if ( ! empty( $post_link ) ) {
									?>
									</a>
									<?php
								}
								?>
							</h4>
							<?php
						}
						?>
						<div class="post_descr">
							<?php
							if ( 'excerpt' != $hover ) {
								$critique_components = empty( $args['meta_parts'] )
														? critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) )
														: ( is_array( $args['meta_parts'] )
															? $args['meta_parts']
															: explode( ',', $args['meta_parts'] )
															);
								if ( ! empty( $critique_components ) ) {
									if ( apply_filters( 'critique_filter_show_blog_meta', true, $critique_components ) ) {
										critique_show_post_meta(
											apply_filters(
												'critique_filter_post_meta_args', array(
													'components' => $critique_components,
													'seo'        => false,
													'echo'       => true,
												), 'hover_' . $hover, 1
											)
										);
									}
								}
							}
							// Remove the condition below if you want display excerpt
							if ( 'excerpt' == $hover ) {
								if ( apply_filters( 'critique_filter_show_blog_excerpt', true ) ) {
									?>
									<div class="post_excerpt"><?php
										critique_show_layout( get_the_excerpt() );
									?></div>
									<?php
								}
							}
							?>
						</div>
						<?php
						if ( ! empty( $post_link ) ) {
							?>
							<a class="post_link" href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?>></a>
							<?php
						}
						?>
					</div>
					<?php
					if ( ! empty( $post_link ) ) {
						?>
						<a class="post_link" href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?>></a>
						<?php
					}
					?>
				</div>
				<?php
			}

		} elseif ( ! empty( $post_link ) ) {
			// Hover style empty
			?>
			<a href="<?php echo esc_url( $post_link ); ?>" <?php critique_show_layout($target); ?> aria-hidden="true" class="icons"></a>
			<?php
		}
	}
}
