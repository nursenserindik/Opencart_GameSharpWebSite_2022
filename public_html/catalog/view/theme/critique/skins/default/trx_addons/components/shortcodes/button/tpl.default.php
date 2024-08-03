<?php
/**
 * The style "default" of the Button
 *
 * @package ThemeREX Addons
 * @since v1.3
 */

$args = get_query_var('trx_addons_args_sc_button');

?><div<?php if (!empty($args['id'])) echo ' id="'.esc_attr($args['id']).'"'; ?>
	class="sc_item_button sc_button_wrap<?php
		if (!trx_addons_is_off($args['align'])) echo ' sc_align_'.esc_attr($args['align']);
		if (!empty($args['class'])) echo ' '.esc_attr($args['class']);
	?>"<?php
	if (!empty($args['css'])) echo ' style="'.esc_attr($args['css']).'"';
	trx_addons_sc_show_attributes('sc_button', $args, 'sc_wrapper');
?>><?php

	$icon_present = '';

	foreach ($args['buttons'] as $item) {
		$item = apply_filters('trx_addons_filter_sc_item_button_args', $item);
		if (empty($item['icon_type'])) $item['icon_type'] = '';
		$icon = !empty($item['icon_type']) && !empty($item['icon_' . $item['icon_type']]) && $item['icon_' . $item['icon_type']] != 'empty' 
					? $item['icon_' . $item['icon_type']] 
					: '';
		if (!empty($icon)) {
			if (strpos($icon_present, $item['icon_type'])===false)
				$icon_present .= (!empty($icon_present) ? ',' : '') . $item['icon_type'];
		} else {
			if (!empty($item['icon']) && strtolower($item['icon'])!='none') $icon = $item['icon'];
		}
		$item['icon'] = $icon;

		if (empty($item['bg_image'])) $item['bg_image'] = !empty($item['back_image']) ? $item['back_image'] : '';
		if (!empty($item['bg_image'])) {
			$item['bg_image'] = trx_addons_get_attachment_url($item['bg_image'], apply_filters('trx_addons_filter_thumb_size', trx_addons_get_thumb_size('masonry'), 'button-bg'));
		}
		if (!empty($item['bg_image'])) {
			$item['css'] = 'background-image:url(' . esc_url($item['bg_image']) . ');' . $item['css'];
		}
		if (!empty($item['image'])) {
			$item['image'] = trx_addons_get_attachment_url($item['image'], apply_filters('trx_addons_filter_thumb_size', trx_addons_get_thumb_size('masonry'), 'button'));
		}

		?><a href="<?php echo esc_url($item['link']); ?>"<?php
			if (!empty($item['item_id'])) echo ' id="'.esc_attr($item['item_id']).'"';
			?> class="<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_link_classes',
												'sc_button sc_button_'.$item['type']
													. (!empty($item['class']) ? ' '.$item['class'] : '')
	        	                                    . (!empty($item['size']) ? ' sc_button_size_'.$item['size'] : '')
	            	                                . (!empty($item['bg_image']) ? ' sc_button_bg_image' : '')
	                	                            . (!empty($item['image']) ? ' sc_button_with_image' : '')
	                    	                        . (!empty($item['icon']) ? ' sc_button_with_icon' : '')
	                        	                    . (!empty($item['icon_position']) ? ' sc_button_icon_'.$item['icon_position'] : '')
	                        	                    . (!empty($item['color_style'] ) && !critique_is_inherit($item['color_style']) && 'default' != $item['color_style'] ? ' color_style_' . esc_attr($item['color_style']) : '')
	                        	                    . (!empty($item['hover_style'] ) && !critique_is_inherit($item['hover_style']) && 'default' != $item['hover_style'] ? ' hover_style_' . esc_attr($item['hover_style']) : '')
	                        	                    . (!empty($item['subtitle']) ? ' with_subtitle' : ''),
	                                            'sc_button', $item)); ?>"<?php
			if (!empty($item['new_window']) || !empty($item['link_extra']['is_external'])) echo ' target="_blank"';
			if (!empty($item['nofollow']) || !empty($item['link_extra']['nofollow'])) echo ' rel="nofollow"';
			if (!empty($item['css'])) echo ' style="'.esc_attr($item['css']).'"';
			trx_addons_sc_show_attributes('sc_button', $args, 'sc_item_wrapper');
			?>><?php
		
			// Icon or Image
			if (!empty($item['image']) || !empty($item['icon'])) {
				?><span class="sc_button_icon"><?php
					if (!empty($item['image'])) {
						$attr = trx_addons_getimagesize($item['image']);
						?><img class="sc_icon_as_image" src="<?php echo esc_url($item['image']); ?>" alt="<?php esc_attr_e('Icon', 'critique'); ?>"<?php echo (!empty($attr[3]) ? ' '.trim($attr[3]) : ''); ?>><?php
					} else if (trx_addons_is_url($item['icon'])) {
						if (strpos($item['icon'], '.svg') !== false) {
							trx_addons_show_layout(trx_addons_get_svg_from_file($item['icon']));
						} else {
							$attr = trx_addons_getimagesize($item['icon']);
							?><img class="sc_icon_as_image" src="<?php echo esc_url($item['icon']); ?>" alt="<?php esc_attr_e('Icon', 'critique'); ?>"<?php echo (!empty($attr[3]) ? ' '.trim($attr[3]) : ''); ?>><?php
						}
					} else {
						?><span class="<?php echo esc_attr($item['icon']); ?>"></span><?php
					}
				?></span><?php
			}
			if (!empty($item['title']) || !empty($item['subtitle'])) {
				?><span class="sc_button_text<?php if (!trx_addons_is_off($item['text_align'])) echo ' sc_align_'.esc_attr($item['text_align']); ?>"><?php
					if (!empty($item['subtitle'])) {
						?><span class="sc_button_subtitle"><?php echo esc_html($item['subtitle']); ?></span><?php
					}
					if (!empty($item['title'])) {
						?><span class="sc_button_title"><?php echo esc_html($item['title']); ?></span><?php
					}
				?></span><!-- /.sc_button_text --><?php
			}
		?></a><!-- /.sc_button --><?php

	}

?></div><!-- /.sc_item_button --><?php

trx_addons_load_icons($icon_present);