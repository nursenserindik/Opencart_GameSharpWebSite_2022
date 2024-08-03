<?php
/**
 * The "News Magazine" template to show post's content
 *
 * Used in the widget Recent News.
 *
 * @package ThemeREX Addons
 * @since v1.0
 */
 
$widget_args = get_query_var('trx_addons_args_recent_news');
$style = $widget_args['style'];
$magazine_type = $widget_args['magazine_type'];
$number = $widget_args['number'];
$count = $widget_args['count'];
$columns = $widget_args['columns'];
$featured = $widget_args['featured'];
$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$animation = apply_filters('trx_addons_blog_animation', '');

if ($number==$featured+1 && $number > 1 && $featured < $count && $featured!=$columns-1) {
	?><div class="post_delimiter<?php if ($columns > 1) echo ' '.esc_attr(trx_addons_get_column_class(1, 1)); ?>"></div><?php
}
if ($columns > 1 && !($featured==$columns-1 && $number>$featured+1)) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $columns)); ?>"><?php
}
?><article 
	<?php post_class( 'post_item post_layout_'.esc_attr($style)
					.' post_format_'.esc_attr($post_format)
					.' post_accented_'.($number<=$featured ? 'on' : 'off') 
					.($featured == $count && $featured > $columns ? ' post_accented_border' : '')
					); ?>
	<?php echo (!empty($animation) ? ' data-animation="'.esc_attr($animation).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	
	trx_addons_get_template_part('templates/tpl.featured.php',
								'trx_addons_args_featured',
								apply_filters('trx_addons_filter_args_featured', array(
												'post_info' => '',
												'thumb_size' => trx_addons_get_thumb_size($number<=$featured ? 'w-video-wide-main' : 'tiny')
												), 'recent_news-magazine')
								);

	if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			if ( $number<=$featured && in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
				trx_addons_sc_show_post_meta('recent_news_magazine', apply_filters('trx_addons_filter_post_meta_args', array(
									'components' => 'categories',
									'seo' => false,
									'theme_specific' => false,
									), 'recent_news_magazine', 1)
								);
			}

			$tag = $number<=$featured ? ($magazine_type == 'on_plate' ? 'h5' : 'h4') : 'h6';
			the_title( '<'.esc_html($tag).' class="post_title entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></'.esc_html($tag).'>' );
			
			if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
				trx_addons_sc_show_post_meta('recent_news_magazine', apply_filters('trx_addons_filter_post_meta_args', array(
									'components' => ($number<=$featured ? 'author,' : '') . 'date,comments',
									'seo' => false,
									'theme_specific' => false,
									), 'recent_news_magazine', 1)
								);
			}
			if ('with_rating' == $magazine_type) {
				?>
				<div class="post_rating">
				<?php
					if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
						trx_addons_reviews_show_stars();				
					}
				?>
				</div>
				<?php
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>		
		
</article><?php

if ($columns > 1 && !($featured==$columns-1 && $featured<$number && $number<$count)) {
	?></div><?php
}

if ( $number == $count ) {
	
	// More Button
	if ( !empty($widget_args['button_link']) && !empty($widget_args['button_text']) ) { ?>
		<div class="sc_item_button sc_button_wrap sc_align_none">
			<a href="<?php echo esc_url($widget_args['button_link']); ?>" class="sc_button sc_button_rn sc_button_size_normal sc_button_icon_left">
				<span class="sc_button_text">
					<span class="sc_button_title"><?php echo esc_html($widget_args['button_text']); ?></span>
				</span><!-- /.sc_button_text -->
			</a><!-- /.sc_button -->
		</div><?php
	}
}