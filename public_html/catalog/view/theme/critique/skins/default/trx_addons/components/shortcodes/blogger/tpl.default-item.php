<?php
/**
 * The style "default" of the Blogger
 *
 * @package ThemeREX Addons
 * @since v1.2
 */

$args = get_query_var('trx_addons_args_sc_blogger');

$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$post_link = empty($args['no_links']) ? get_permalink() : '';
$post_title = get_the_title();

$meta_parts = !empty($args['meta_parts'])
				? (is_array($args['meta_parts'])
					? $args['meta_parts']
					: explode(',', $args['meta_parts'])
					)
				: array();
$meta_parts_original = $meta_parts;

$args['image_width'] = max(10, min(90, (int) $args['image_width'])) . '%';
$args['text_width'] = 'calc(100% - ' . $args['image_width'] . ')';

// Info over image
$info_over_image = $args['info_over_image'] != 'none' && $post_format == 'image' && has_post_thumbnail() && ($args['template_default'] == 'classic' ||  $args['template_default'] == 'classic_3' || $args['type'] == 'wide') ? true : false;

// Post title tag 
if ( !empty($args['post_title_length']) ) {
	$post_title = (strlen($post_title) > $args['post_title_length'] ? substr($post_title, 0, $args['post_title_length']) . '..' : $post_title);
	$post_title = str_replace(' ..', '..', $post_title);
}
$args['post_title_tag'] = $info_over_image ? $args['post_title_over_tag'] : $args['post_title_tag'];
$post_title_tag = $args['post_title_tag'] == 'h1' ? 'h2' : $args['post_title_tag'];

// Full size featured image
if ( !empty($args['full_size_image']) ) {
	$args['thumb_size'] = 'full';
}

// Product hover
if ( get_post_type() == 'product' ) {
	$args['hover'] = critique_get_theme_option( 'shop_hover' );
}

// Prepare parts of template
$templates = trx_addons_components_get_allowed_templates('sc', 'blogger');
if (isset($templates[$args['type']][$args['template_'.$args['type']]])) {
	$template  = $templates[$args['type']][$args['template_'.$args['type']]];

	// Special settings for post format Image
	if ( $info_over_image ) {

		// Center center
		if ( $args['info_over_image'] == 'cc' ) {
			$template['layout'] = 
				array(
					'featured' => array(
						'mc' => array(
							'meta_categories', 'title', 'meta', 'readmore'
						),
						'tr' => array(
							'price'
						),
					),
				);	
		}

		// Bottom center
		if ( $args['info_over_image'] == 'bc' ) {
			$template['layout'] = 
				array(
					'featured' => array(
						'bc' => array( 'meta_categories', 'title', 'meta', 'readmore' ),
						'tr' => array( 'price' ),
					),
				);
		}	

		// Bottom left
		if ( $args['info_over_image'] == 'bl' ) {
			$template['layout'] = 
				array(
					'featured' => array(
						'bl' => array( 'meta_categories', 'title', 'meta', 'readmore' ),
						'tr' => array( 'price' ),
					),
				);
		}

		// Bottom left and category on the top
		if ( $args['info_over_image'] == 'bl_2' ) {
			$template['layout'] = 
				array(
					'featured' => array(						
						'tl' => array( 'meta_categories' ),
						'bl' => array( 'title', 'meta', 'readmore' ),
						'tr' => array( 'price' ),
					),
				);
			if ( !array_key_exists('categories', $meta_parts) ) {
				array_push( $meta_parts, 'categories');
			}
		}				
	}

	// Classic with cats over image
	if ( $args['template_default'] == 'classic_2' && !has_post_thumbnail() && $post_format != 'gallery' ) {
		$template['layout'] = 
			array(
				'featured' => array(),
				'content' => array(
					'meta_categories', 'title', 'excerpt', 'meta', 'readmore'
				)
			);
	}

	$template_parts = trx_addons_array_get_values($template['layout']);
	usort($template_parts, function($a, $b) {
		return substr($a, 0, 5) == 'meta_' && $b == 'meta'
				? -1
				: ( $a == 'meta' && substr($b, 0, 5) == 'meta_'
					? 1
					: ( $a < $b
						? -1
						: (	$a > $b
							? 1
							: 0
							)
						)
					);
	});
	$template_parts = array_flip($template_parts);
	foreach( $template_parts as $k=>$v ) {
		$template_parts[$k] = '';

		// Post meta
		if ( substr( $k, 0, 4 ) == 'meta') {
			$meta_key = substr( $k, 0, 5 ) == 'meta_' ? substr($k, 5) : '';
			if ( !empty($meta_key) && !in_array($meta_key, $meta_parts) ) continue;
			
			// Remove rating from meta
			foreach ($meta_parts as $key => $value) {
				if ( $value == 'rating' ) {
					unset($meta_parts[$key]);
				}
			}
			$template_parts[$k] = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_post_meta_args', array(
				'components' => !empty($meta_key) ? $meta_key : join(',', $meta_parts),
				'date_format' => $args['date_format'],
				'theme_specific' => false,
				'class' => "sc_blogger_item_meta post_{$k}",
				'echo' => false,
				'share_type' => 'list',
				'author_avatar'   => false,
				), 'sc_blogger_'.$args['type'], $args['columns'])
			);
			if (empty($post_link)) {
				$template_parts[$k] = trx_addons_links_to_span($template_parts[$k]);
			}
			if ( !empty($meta_key) ) {
				$meta_parts = array_flip($meta_parts);
				unset($meta_parts[$meta_key]);
				$meta_parts = array_flip($meta_parts);
			}
		} 

		// Post title
		else if ( $k == 'title' ) {
			ob_start();
			echo '<'.esc_html($post_title_tag).' class="sc_blogger_item_title entry-title'.($args['post_title_tag'] == 'h1' ? ' h1' : '').'"'
						. ' data-item-number="' . esc_attr($args['item_number']) . '"'
						. '>'
							. (!empty($post_link)
								? sprintf( '<a href="%s" rel="bookmark">', esc_url( $post_link ) )
								: '')
							. esc_html($post_title)
						. (!empty($post_link) ? '</a>' : '') . '</'.esc_html($post_title_tag).'>';
			$template_parts[$k] = ob_get_contents();
			ob_end_clean();
		} 

		// Post excerpt
		else if ( $k == 'excerpt' ) {
			if (!isset($args['hide_excerpt']) || (int) $args['hide_excerpt']==0) {
				ob_start();
				trx_addons_show_post_content( $args, '<div class="sc_blogger_item_excerpt">', '</div>' );
				$template_parts[$k] = ob_get_contents();
				ob_end_clean();
			}
		}

		// Read More
		 else if ( $k == 'readmore' ) {
			if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) && !empty($post_link) && $args['more_button']==1 ) {
				$template_parts[$k] = '<div class="sc_blogger_item_button sc_item_button' . esc_attr(!empty($args['more_text']) ? ' with_text' : '') . '">'
										. '<a href="' . esc_url($post_link) . '"'
											. ' class="' . esc_attr(apply_filters('trx_addons_filter_sc_item_link_classes', 'sc_button sc_button_simple color_style_1', 'sc_blogger', $args)) . '">'
											. ( !empty($args['more_text']) ? esc_html($args['more_text']) : '<span class="icon"></span>' )
										. '</a>'
									. '</div>';
			}
		} 

		// Post price
		else if ( $k == 'price' ) {
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);
			if (!is_array($meta)) $meta = array();
			$meta['price'] = apply_filters( 'trx_addons_filter_custom_meta_value', !empty($meta['price']) ? $meta['price'] : '', 'price' );
			if (!empty($meta['price'])) {
				$template_parts[$k] = '<div class="sc_blogger_item_price sc_item_price">' . $meta['price'] . '</div>';
			}
		} else {
			$val = apply_filters( 'trx_addons_filter_custom_meta_value', '', $k );
			if (!empty($val)) {
				$template_parts[$k] = '<div class="sc_blogger_item_'.esc_attr($k).' sc_item_'.esc_attr($k).'">' . esc_html($val) . '</div>';
			}
		}
	}

	if (empty($args['grid'])) {
		if ($args['slider']) {
			?><div class="slider-slide swiper-slide"><?php
		} else if ($args['columns'] > 1) {
			if ($args['image_ratio'] == 'masonry') {
				?><div class="masonry_item masonry_item-1_<?php echo esc_attr($args['columns']); ?>"><?php
			} else {
				?><div class="<?php echo esc_attr( trx_addons_get_column_class( 1, $args['columns'], !empty($args['columns_tablet']) ? $args['columns_tablet'] : '', !empty($args['columns_mobile']) ? $args['columns_mobile'] : '' ) ); ?>"><?php
			}
		}
	}

	?><div data-post-id="<?php the_ID(); ?>" <?php
		post_class(
			'sc_blogger_item sc_item_container post_container'
			. ' sc_blogger_item_'.esc_attr($args['type'])
			. ' sc_blogger_item_'.esc_attr($args['type']).'_'.esc_attr($args['template_'.$args['type']])
			. ' sc_blogger_item_'.esc_attr($args['item_number'] % 2 == 0 ? 'even' : 'odd')
			. ' sc_blogger_item_align_'.esc_attr($args['text_align'])
			. ' post_format_'.esc_attr($post_format)
			. (empty($post_link) ? ' no_links' : '')
			. (isset($template['layout']['featured']) && (has_post_thumbnail() || $post_format == 'gallery') ? ' sc_blogger_item_with_image' : '')			
			. (! empty($args['numbers'] ) ? ' sc_blogger_item_with_numbers' : '')
			. ( (int) $args['on_plate'] > 0 ? ' sc_blogger_item_on_plate' : '' )
			. ' sc_blogger_item_image_position_' . esc_attr($args['image_position'])
			. ( $info_over_image ? ' sc_blogger_item_info_over_image' : '')				
			. ( !empty($args['full_size_image']) ? ' sc_blogger_item_full_size_image' : '')				
			. ' sc_blogger_title_tag_' . esc_attr($args['post_title_tag'])
		);
		?> data-item-number="<?php echo esc_attr($args['item_number']); ?>"
	><?php

		// Post info inside featured image
		$post_info = '';
		if ( !empty($template['layout']['featured']) && is_array($template['layout']['featured']) ) {
			foreach($template['layout']['featured'] as $pos => $elements) {
				$html = '';
				foreach($elements as $element) {
					if (!empty($template_parts[$element])) {
						$html .= apply_filters( 'trx_addons_action_sc_blogger_item_element', trim($template_parts[$element]), $element, 'featured-'.$pos, $args );
					}
				}
				if (!empty($html)) {
					if ( $args['slider'] ) {
						$post_info .= $args['slider'] ? '<div class="post_header">' : '';
					}
					$post_info .= '<div class="' . apply_filters( 'trx_addons_filter_sc_featured_post_info', 'post_info_' . esc_attr($pos), 'blogger-'.$args['type'], $args ) . '">'
										. trim($html)
								. '</div>';

					if ( $args['slider'] ) {
						$post_info .= '</div>';
					}			
				}
			}
		}

		do_action( 'trx_addons_action_sc_blogger_item_start', $args );

		// Header
		if ( !empty($template['layout']['header']) ) {
			do_action( 'trx_addons_action_sc_blogger_item_before_header', $args );
			?><div class="sc_blogger_item_header entry-header"><?php
				do_action( 'trx_addons_action_sc_blogger_item_header_start', $args );
				foreach ($template['layout']['header'] as $element) {
					if (!empty($template_parts[$element])) {
						trx_addons_show_layout( apply_filters( 'trx_addons_action_sc_blogger_item_element', $template_parts[$element], $element, 'header', $args ) );
					}
				}
				do_action( 'trx_addons_action_sc_blogger_item_header_end', $args );
			?></div><!-- .entry-header --><?php
			do_action( 'trx_addons_action_sc_blogger_item_after_header', $args );
		}

		?><div class="sc_blogger_item_body"<?php echo ( !in_array( $args['image_ratio'], array('', 'none', 'masonry') ) && !has_post_thumbnail() ? ' data-ratio="' . esc_attr($args['image_ratio']) . '"' : ''); ?>><?php

			do_action( 'trx_addons_action_sc_blogger_item_body_start', $args );

			// Featured image
			if ( isset($template['layout']['featured']) ) {
				do_action( 'trx_addons_action_sc_blogger_item_before_featured', $args );

				$thumb_ratio = $args['image_ratio'];
				if ( $post_format == 'gallery' && in_array( $args['image_ratio'], array('', 'none', 'masonry') ) ) {
					$thumb_sizes = critique_storage_get( 'theme_thumbs' );
					$x = $y = 0;
					if ( $args['columns'] > 2 ) {
						$x = $thumb_sizes['critique-thumb-med']['size'][0];
						$y = $thumb_sizes['critique-thumb-med']['size'][1];
					} else {
						$x = $thumb_sizes['critique-thumb-big']['size'][0];
						$y = $thumb_sizes['critique-thumb-big']['size'][1];
					}
					if ( $x != 0 && $y != 0 ) {
						$thumb_ratio = $x . ':' . $y;
					}
				}

				$featured_args = array(
									'class' => 'sc_item_featured sc_blogger_item_featured'
												. ( in_array( $args['image_position'], array('left', 'right', 'alter') ) && !empty($template['layout']['content'])
													? ' ' . esc_attr( trx_addons_add_inline_css_class( 'width:' . $args['image_width'] . ' !important;' ) )
													: ''
													),
									'popup' => ! empty( $args['video_in_popup'] ),
									'no_links' => empty($post_link),
									'post_info' => $post_info,
									'meta_parts' => $meta_parts_original,
									'thumb_bg' => ! in_array( $args['image_ratio'], array('', 'none', 'masonry') ),
									'thumb_ratio' => $thumb_ratio,
									'thumb_size' => apply_filters('trx_addons_filter_thumb_size',
														trx_addons_get_thumb_size(
															! empty( $args['thumb_size'] )
																? $args['thumb_size']
																: (
																	! in_array( $args['image_ratio'], array('', 'none') )
																		? ( $args['columns'] > 2
																			? 'masonry'
																			: (( $args['columns'] == 1 && ! in_array( $args['image_position'],  array('left', 'right') )) 
																				|| ( $args['columns'] == 1 && in_array( $args['image_position'],  array('left', 'right') ) && $info_over_image ) 
																				|| ( $args['columns'] == 2 && $info_over_image ) 
																				? 'masonry-big' : 'masonry' )
																			)
																		: ( $args['columns'] > 2 
																			? 'medium' 
																			: 'big'
																			)
																	)
														),
														'blogger-'.$args['type'],
														$args
													),
									);
				if ( ! empty( $args['hover'] ) ) {
					$featured_args['hover'] = trx_addons_is_off( $args['hover'] )
													? ''
													: ( trx_addons_is_inherit( $args['hover'] ) ? '' : '!' ) . $args['hover'];
				}
				trx_addons_get_template_part('templates/tpl.featured.php',
											'trx_addons_args_featured',
											apply_filters('trx_addons_filter_args_featured', $featured_args, 'blogger-'.$args['type'], $args )
										);
				do_action( 'trx_addons_action_sc_blogger_item_after_featured', $args );
			}

			// Content
			if ( !empty($template['layout']['content']) ) {
				$tpl_content = '';
				foreach ($template['layout']['content'] as $element) {
					if (!empty($template_parts[$element])) {
						$tpl_content .= apply_filters( 'trx_addons_action_sc_blogger_item_element', $template_parts[$element], $element, 'content', $args );
					}
				}
				if ( ! empty( $tpl_content ) ) {
					do_action( 'trx_addons_action_sc_blogger_item_before_content', $args );
					?><div class="sc_blogger_item_content entry-content<?php
						echo isset( $template['layout']['featured'] ) && in_array( $args['image_position'], array( 'left', 'right', 'alter' ) )
							? ' '.esc_attr( trx_addons_add_inline_css_class( 'width:' . $args['text_width'] . ' !important;' ) )
							: '';
					?>"><?php
						do_action( 'trx_addons_action_sc_blogger_item_content_start', $args );
						trx_addons_show_layout( $tpl_content );
						do_action( 'trx_addons_action_sc_blogger_item_content_end', $args );
					?></div><!-- .entry-content --><?php
					do_action( 'trx_addons_action_sc_blogger_item_after_content', $args );
				}
			}

			do_action( 'trx_addons_action_sc_blogger_item_body_end', $args );

		?></div><!-- .sc_blogger_item_body --><?php

		// Footer
		if ( !empty($template['layout']['footer']) ) {
			do_action( 'trx_addons_action_sc_blogger_item_before_footer', $args );
			?><div class="sc_blogger_item_footer entry-footer"><?php
				do_action( 'trx_addons_action_sc_blogger_item_footer_start', $args );
				foreach ($template['layout']['footer'] as $element) {
					if (!empty($template_parts[$element])) {
						trx_addons_show_layout( apply_filters( 'trx_addons_action_sc_blogger_item_element', $template_parts[$element], $element, 'footer', $args ) );
					}
				}		
				do_action( 'trx_addons_action_sc_blogger_item_footer_end', $args );
			?></div><!-- .entry-footer --><?php
			do_action( 'trx_addons_action_sc_blogger_item_after_footer', $args );
		}

		do_action( 'trx_addons_action_sc_blogger_item_end', $args );

	?></div><!-- .sc_blogger_item --><?php

	if (empty($args['grid']) && ($args['slider'] || $args['columns'] > 1)) {
		?></div><?php
	}
}