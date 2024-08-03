<?php
/**
 * The style "default" of the Widget "Banner"
 *
 * @package ThemeREX Addons
 * @since v1.6.10
 */

$args = get_query_var('trx_addons_args_widget_banner');
extract($args);
		
// Before widget (defined by themes)
if ( trx_addons_is_on($fullwidth) ) {
	$before_widget = str_replace('class="widget ', 'class="widget widget_fullwidth ', $before_widget);
}
if ( ! is_admin()  && ! trx_addons_gutenberg_is_preview() ) {
	$before_widget = str_replace('class="widget ', 'class="widget trx_addons_show_on_' . esc_attr( $banner_show ) . ' ' , $before_widget);
}
if ( ! empty ($args['align'])  && ! trx_addons_gutenberg_is_preview() ) { 
	$before_widget = str_replace('class="widget ', 'class="widget align' . esc_attr( $args['align'] ) . ' ', $before_widget);
}

trx_addons_show_layout($before_widget);
			
// Widget title if one was input (before and after defined by themes)
trx_addons_show_layout($title, $before_title, $after_title);
	
// Widget body
$class = ( $banner_code != '' && $banner_image != '' ? ' bg_image' : '' );
$attr = ( $banner_image != '' ? trx_addons_getimagesize($banner_image) : '' );
echo ( ! empty($banner_link)
		? '<a href="' . esc_url($banner_link) . '"'
			. ( ! empty( $args['new_window'] ) || ! empty( $args['link_extra']['is_external'] )
				? ' target="_blank"'
				: '' )
			. ( ! empty( $args['nofollow'] ) || ! empty( $args['link_extra']['nofollow'] )
				? ' rel="nofollow"'
				: '' )
		: '<span'
	)
	. ' class="banner_wrap' . esc_attr($class) . ($banner_code != '' && $banner_image != '' ?  ' ' . critique_add_inline_css_class( 'background-image: url(' . esc_url( $banner_image ) . ');' ) : '' ) . '">'
		.  ( $banner_code == '' && $banner_image != '' 
				? '<img src="' . esc_url($banner_image) . '" alt="' . esc_attr($title) . '"' . (!empty($attr[3]) ? ' '.trim($attr[3]) : '')	. '>' 
				: do_shortcode( $banner_code ) 
			)
	. ( ! empty( $banner_link )
		? '</a>'
		: '</span>'
		);
	
// After widget (defined by themes)
trx_addons_show_layout($after_widget);
