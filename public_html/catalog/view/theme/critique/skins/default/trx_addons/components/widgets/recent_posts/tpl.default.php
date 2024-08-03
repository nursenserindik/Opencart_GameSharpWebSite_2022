<?php
/**
 * The style "default" of the Widget "Recent posts"
 *
 * @package ThemeREX Addons
 * @since v1.6.10
 */

$args = get_query_var('trx_addons_args_widget_recent_posts');
extract($args);
		
// Before widget (defined by themes)
trx_addons_show_layout($before_widget);
			
// Widget title if one was input (before and after defined by themes)
?><div class="sc_recent_posts_title_type_<?php echo esc_attr($args['type']); ?>"><?php
trx_addons_show_layout($title, $before_title, $after_title);
?></div><?php
// Widget body
?><div class="sc_recent_posts type_<?php echo esc_attr($args['type']); ?>"><?php
trx_addons_show_layout($output);
?></div><?php
	
// After widget (defined by themes)
trx_addons_show_layout($after_widget);
?>