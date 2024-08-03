<?php
/**
 * The style "default" of the video's title in the widget "Video list"
 *
 * @package ThemeREX Addons
 * @since v1.78.0
 */

$args = get_query_var('trx_addons_args_widget_video_list_title');

$titles_content = apply_filters('trx_addons_filter_video_list_title', '', $args);
if ( empty( $titles_content ) ) {
	if ( ! empty( $args['subtitle'] ) ) {
		$titles_content .= '<div class="trx_addons_video_list_subtitle">' . trim( $args['subtitle'] ) . '</div>';
	}
	if ( ! empty( $args['title'] ) ) {
		if ( 'classic' == $args['type'] && 'default' == $args['content_style'] ) {
			$titles_content .= '<h3 class="trx_addons_video_list_title">'
					. ( ! empty( $args['link'] ) ? '<a href="'.esc_url( $args['link'] ).'">' : '')
					. wp_trim_words( $args['title'], wp_is_mobile() ? 5 : 9, '...' )
					. ( ! empty( $args['link'] ) ? '</a>' : '')
					. '</h3>';
		} else {
			$titles_content .= '<h2 class="trx_addons_video_list_title">'
					. ( ! empty( $args['link'] ) ? '<a href="'.esc_url( $args['link'] ).'">' : '')
					. wp_trim_words( $args['title'], wp_is_mobile() ? 5 : 9, '...' )
					. ( ! empty( $args['link'] ) ? '</a>' : '')
					. '</h2>';
		}
		
	}
	if ( ! empty( $args['meta'] ) ) {
		$titles_content .= '<div class="trx_addons_video_list_meta">';
		$meta_array = $args['meta'];
			if ( ! empty( $meta_array['author'] ) ) {
				$titles_content .= '<div class="author post_meta_item"><span>'. esc_html__('By ', 'critique') .'</span><span class="author_name">' . esc_html($meta_array['author']) . '</span></div>';
			}
			if ( ! empty($meta_array['data']) ) {
				$titles_content .= '<div class="data post_meta_item">' . esc_html($meta_array['data']) . '</div>'; 
			}
			if ( ! empty($meta_array['comments']) || '0' == $meta_array['comments'] ) {
				$titles_content .= '<div class="comments post_meta_item icon-comment-light"><span class="comments_number">' . esc_html($meta_array['comments']) . '</span></div>'; 
			}	
		$titles_content .= '</div>';
	}
}
if ( ! empty( $titles_content ) ) {
	?><div class="trx_addons_video_list_title_wrap"><?php
		trx_addons_show_layout( $titles_content );
	?></div><?php
}
