<?php
/**
 * The style "default" of the Title block
 *
 * @package ThemeREX Addons
 * @since v1.4.3
 */

$args = get_query_var('trx_addons_args_sc_title');
$args['show_link'] = true;
?><div<?php if ( !empty($args['id'] ) ) echo ' id="'. esc_attr($args['id']) .'"'; ?>
		class="sc_title sc_title_<?php
			echo esc_attr($args['type']);
			if (!empty($args['class'])) echo ' '.esc_attr($args['class']);
			?>"<?php
		if ($args['css']!='') echo ' style="'.esc_attr($args['css']).'"';
?>><?php

	trx_addons_sc_show_titles('sc_title', $args);
	
?></div><!-- /.sc_title -->