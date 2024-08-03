<?php
/**
 * The style "default" of the Widget "Video"
 *
 * @package ThemeREX Addons
 * @since v1.6.10
 */

$args = get_query_var('trx_addons_args_widget_video');
extract($args);
		
// Before widget (defined by themes)
trx_addons_show_layout($before_widget);
			
// Widget title if one was input (before and after defined by themes)
trx_addons_show_layout($title, $before_title, $after_title);
	
// Widget body
trx_addons_show_layout( trx_addons_get_video_layout( array(
														'link' => $link,
														'embed' => $embed,
														'cover' => $cover,
														'show_cover' => true,
														'popup' => !empty($popup),
														'button_style' => $button_style
														)
													)
						);
	
// After widget (defined by themes)
trx_addons_show_layout($after_widget);
