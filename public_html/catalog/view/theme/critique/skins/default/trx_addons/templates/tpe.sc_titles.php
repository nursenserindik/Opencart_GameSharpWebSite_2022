<?php
/**
 * The template to display shortcode's title, subtitle and description
 * on the Elementor's preview page
 *
 * @package ThemeREX Addons
 * @since v1.6.41
 */

extract(get_query_var('trx_addons_args_sc_show_titles'));
if (empty($size)) $size = 'large';
?><#
var sc = "<?php echo esc_attr($sc); ?>";
var title_text = settings.title;
var align = !trx_addons_is_off(settings.title_align) ? ' sc_align_'+settings.title_align : '';
var style = !trx_addons_is_off(settings.title_style) ? ' sc_item_title_style_'+settings.title_style : '';
var title_class = "<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_title_class', 'sc_item_title '.$sc.'_title', $sc)); ?>";
var position = !trx_addons_is_off(settings.subtitle) && !trx_addons_is_off(settings.subtitle_position) ? ' sc_position_'+settings.subtitle_position : '';
var subtitle_in = !trx_addons_is_off(settings.subtitle) && !trx_addons_is_off(settings.title) && (settings.title_align == 'left' || settings.title_align == 'right') ? true : false;
var button = !trx_addons_is_off(settings.link_text) && !trx_addons_is_off(settings.link) && settings.title_align != 'center' ? true : false;
var show_button = !trx_addons_is_off(settings.show_link) ? settings.show_link : false;
var wrap_class = subtitle_in && !button && settings.subtitle_position != 'center' ? ' line_style_2' : '';
var description_class = "<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_description_class', 'sc_item_descr '.$sc.'_descr', $sc)); ?>";
var subtitle_html = '';

if (settings.subtitle) {
	var subtitle_align = trx_addons_is_off(settings.subtitle_align) ? align : ' sc_align_'+settings.subtitle_align;
	subtitle_html += '<span class="'
						+ 'sc_item_subtitle'
						+ ' ' + sc + '_subtitle'
						+ subtitle_align
						+ ' sc_item_subtitle_' + position
						+ style
					+ '">'
						+ trx_addons_prepare_macros(settings.subtitle)
					+ '</span>';
}

if (settings.subtitle_position == 'above' && !subtitle_in ) {
	print(subtitle_html);
}

if (settings.title) {
	print('<div class="sc_item_title_wrap ' + align + ' ' + position + ' ' + wrap_class + '">');
	
	if (settings.typed > 0 && settings.typed_strings != '') {
		var typed_strings = settings.typed_strings.split("\n"),
			typed_strings_json = JSON.stringify(typed_strings).replace(/"/g, '&quot;');
		title_text = title_text.replace(
							typed_strings[0],
							'<span class="sc_typed_entry"'
								+ ' data-strings="' + typed_strings_json + '"'
								+ ' data-loop="' + (settings.typed_loop ? 1 : 0 ) + '"'
								+ ' data-cursor="' + ( settings.typed_cursor ? 1 : 0 ) + '"'
								+ ' data-cursor-char="|"'
								+ ' data-speed="' + settings.typed_speed.size + '"'
								+ ' data-delay="' + settings.typed_delay.size + '"'
								+ ( settings.typed_color != '' ? ' style="color:' + settings.typed_color + '"' : '')
								+ '>' + typed_strings[0] + '</span>'
						);
	}
	var title_tag = !trx_addons_is_off(settings.title_tag)
					? settings.title_tag
					: "<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_title_tag', 'large' == $size ? 'h2' : ('tiny' == $size ? 'h4' : 'h3'))); ?>";
	var title_tag_class = ( ! trx_addons_is_off(settings.title_tag)
							? ' sc_item_title_tag'
							: ''
							)
						+ ( settings.typed > 0
							? ' sc_typed'
							: ''
							);

	var title_tag_style = settings.title_color != '' && settings.title_style != 'gradient'
							? 'color:' + settings.title_color
							: '';

	<?php do_action( 'trx_addons_action_tpe_item_title_tag' ); ?>

	print('<' + title_tag
					+ ' class="'					
						+ title_class
						+ title_tag_class
						+ align
						+ style
						+ '"'						
					+ (title_tag_style != ''
						? ' style="' + title_tag_style + '"'
						: '')
					<?php do_action( 'trx_addons_action_tpe_item_title_data' ); ?>
				+ '>');

	print('<span class="sc_item_title_line_left"></span>');

	if (subtitle_in) {
		print('<span class="sc_item_title_inner">');
		if (settings.subtitle_position == 'above') {
			print(subtitle_html);
		}
	}

	if (settings.title_style == 'gradient' ) {
		print('<span class="trx_addons_text_gradient sc_item_title_text"'
					+ (settings.title_color != ''
						? ' style="'
							+ 'color:' + settings.title_color + ';'
							+ 'background:linear-gradient(' 
								+ Math.max(0, Math.min(360, settings.gradient_direction.size)) + 'deg,'
								+ (settings.title_color2 ? settings.title_color2 : 'transparent') + ','
								+ settings.title_color
								+ ');'
							+ '"'
						: '')
					+ '>'
						+ trx_addons_prepare_macros(title_text)
					+ '</span>');
	} else {
		print('<span class="sc_item_title_text">'
				+ trx_addons_prepare_macros(title_text)
				+ '</span>');
	}

	if (subtitle_in) {
		if (settings.subtitle_position != 'above') {
			print(subtitle_html);
		}
		print('</span>');
	}

	print('<span class="sc_item_title_line_right"></span>');

	print('</' + title_tag + '>');

	if (button && show_button) {
		trx_addons_sc_show_links('sc_title', settings);
	}

	print('</div>');
}

if (settings.subtitle_position != 'above' && !subtitle_in) {
	print(subtitle_html);
}

if (settings.description) {
	print('<div class="' + description_class + align + '">'
					+ trx_addons_prepare_macros(settings.description)
					+ '</div>');
}
#>