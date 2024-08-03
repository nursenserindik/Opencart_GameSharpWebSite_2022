<?php
/**
 * The style "alter" of the Widget "Video list"
 *
 * @package ThemeREX Addons
 * @since v1.78.0
 */

$args = get_query_var('trx_addons_args_widget_video_list');
extract($args);

if ( is_array( $videos ) && count( $videos ) > 0 && ( ! empty( $videos[0]['video_url'] ) || ! empty( $videos[0]['video_embed'] ) ) ) {

	// Before widget (defined by themes)
	trx_addons_show_layout($before_widget);

	// Widget title if one was input (before and after defined by themes)
	trx_addons_show_layout($title, $before_title, $after_title);

	// Widget body
	$video_count = 0;
	ob_start();
	foreach ($videos as $k => $v) {
		$video = trx_addons_get_video_layout( array(
												'link' => $v['video_url'],
												'embed' => $v['video_embed'],
												'cover' => ! $args['controller_autoplay'] ? $v['image'] : '',
												'cover_size' => apply_filters( 'trx_addons_filter_video_list_thumb_size', 'w-video-alter-main' ),
												'autoplay' => $args['controller_autoplay']
												)
											);
		$title = trx_addons_get_template_part_as_string(
								array(
									TRX_ADDONS_PLUGIN_WIDGETS . 'video_list/tpl.' . trx_addons_esc($args['controller_style']) . '-title.php',
									TRX_ADDONS_PLUGIN_WIDGETS . 'video_list/tpl.default-title.php',
								),
								'trx_addons_args_widget_video_list_title',
								array_merge( $args, $v )
							);
		$controller_content = apply_filters( 'trx_addons_filter_video_list_controller', '', array_merge( $args, $v ) );
		if ( empty( $controller_content ) ) {
			if ( ! empty( $v['image'] ) ) {
				$controller_content .= '<div class="trx_addons_video_list_image">'
											. '<img src="' . esc_url( trx_addons_get_attachment_url( $v['image'], trx_addons_get_thumb_size( 'w-video-def-small' ) ) ) . '" alt="' . esc_attr( $v['title'] ) . '">'
										. '</div>';
			}
			if ( ! empty( $v['subtitle'] ) || ! empty( $v['title'] ) ) {
				$controller_content .= '<div class="trx_addons_video_list_info">';
				if ( ! empty( $v['subtitle'] ) ) {
					$controller_content .= '<div class="trx_addons_video_list_subtitle">' . trim($v['subtitle']) . '</div>';
				}
				if ( ! empty( $v['title'] ) ) {
					$controller_content .= '<h6 class="trx_addons_video_list_title">'
								. ( ! empty( $v['link'] ) ? '<a href="'.esc_url($v['link']).'">' : '')
								. wp_trim_words( $v['title'], wp_is_mobile() ? 5 : 7, '...' )
								. ( ! empty( $v['link'] ) ? '</a>' : '')
								. '</h6>';
				}										
				
				$controller_content .= '</div>';
			}
		}
		if ( ! empty($controller_content) ) {
			if ( is_singular('post') && !is_page() ) {
				$controller_content = apply_filters( 'trx_addons_filter_lazy_load_process_images', $controller_content, false, true, true, false, false );
			}
			$video_count++;
			?><div class="trx_addons_video_list_controller_item<?php if ( $k == 0 ) echo ' trx_addons_video_list_controller_item_active'; ?>"
				data-video="<?php echo esc_attr( str_replace( '&', '&amp;', $video ) ); ?>"
				data-title="<?php echo esc_attr($title); ?>"
				data-autoplay="<?php echo esc_attr( (int) $args['controller_autoplay'] > 0 ? 1 : 0 ); ?>"
			><?php
				trx_addons_show_layout( $controller_content );
			?><a href="<?php echo (int) $args['controller_link'] == 1 || empty( $v['link'] ) ? '#' : esc_url( $v['link'] ); ?>" class="trx_addons_video_list_controller_item_link"></a></div><?php
		}
	}
	$video_list = ob_get_contents();
	ob_end_clean();

	?><div class="trx_addons_video_list trx_addons_video_list_<?php echo esc_attr( $args['controller_style'] ); ?> <?php echo esc_attr($video_count > 1 ? 'trx_addons_video_list_controller_right trx_addons_video_list_type_' . esc_attr( $args['type'] ) : ''); ?>"><?php
		// Video frame
		?><div class="trx_addons_video_list_video_wrap"><?php
			do_action( 'trx_addons_action_before_single_post_video', $args );
			trx_addons_show_layout( trx_addons_get_video_layout( array(
																'link' => $videos[0]['video_url'],
																'embed' => $videos[0]['video_embed'],
																'cover' => $videos[0]['image'],
																'cover_size' => apply_filters( 'trx_addons_filter_video_list_thumb_size', 'w-video-alter-main' ),
																)
															)
								);
			trx_addons_show_layout( trx_addons_get_template_part_as_string(
										array(
											TRX_ADDONS_PLUGIN_WIDGETS . 'video_list/tpl.' . trx_addons_esc($args['controller_style']) . '-title.php',
											TRX_ADDONS_PLUGIN_WIDGETS . 'video_list/tpl.default-title.php',
										),
										'trx_addons_args_widget_video_list_title',
										array_merge( $args, $videos[0] )
										)
									);
			do_action( 'trx_addons_action_after_single_post_video', $args );
		?></div><?php

		// Controller (TOC)
		if ( $video_count > 1 ) {
			?><div class="trx_addons_video_list_controller_wrap<?php
				if ( $args['controller_pos'] == 'bottom') {
					if ( empty($args['controller_height']) ) {
						$args['controller_height'] = 100;
					}
					if ( ! empty($args['controller_height']) ) {
						echo ' ' . esc_attr(trx_addons_add_inline_css_class('max-height:' . trx_addons_prepare_css_value($args['controller_height'])));
					}
				}
			?>"><?php
				trx_addons_show_layout($video_list);
			?></div><?php
		}
	?></div><?php

	// After widget (defined by themes)
	trx_addons_show_layout($after_widget);

}
