<?php
/**
 * The template to display shortcode's pagination
 *
 * @package ThemeREX Addons
 * @since v1.6.42
 */

extract(get_query_var('trx_addons_args_sc_pagination'));

$max_page = ! empty( $query )
				? ( ! empty($query->query_vars['offset'])
					? ( ceil( $query->found_posts - $query->query_vars['offset'] ) / max( 1, $query->query_vars['posts_per_page'] ) )
					: ( ! empty($query->max_num_pages)
						? $query->max_num_pages
						: 1
						)
					)
				: 1;

if (!trx_addons_is_off($args['pagination']) && $max_page > 1) {
	
	$args['sc'] = $sc;
	
	$align = !empty($args['title_align']) ? ' sc_align_'.trim($args['title_align']) : '';
	
	// Old style: links 'Prev' & 'Next'
	if ($args['pagination'] == 'prev_next') {
		?><nav class="<?php echo esc_attr($sc); ?>_pagination sc_item_pagination sc_item_pagination_<?php echo esc_attr($args['pagination']); ?> nav-links-old <?php echo esc_attr($align); ?>" data-params="<?php echo esc_attr(serialize(apply_filters('trx_addons_filter_sc_args_to_serialize', $args))); ?>" role="navigation"><?php
			?><span class="nav-prev<?php if ($args['page'] == 1) echo ' nav-disabled'; ?>"><a href="#" data-page="<?php echo esc_attr($args['page'] - 1); ?>"><span class="nav-prev-label"><?php esc_html_e('Previous', 'critique'); ?></span></a></span><?php
			?><span class="nav-next<?php if ($args['page'] >= $max_page) echo ' nav-disabled'; ?>"><a href="#" data-page="<?php echo esc_attr($args['page'] + 1); ?>"><span class="nav-next-label"><?php esc_html_e('Next', 'critique'); ?></span></a></span><?php
		?></nav><?php
	
	// Page numbers
	} else if ( in_array($args['pagination'], array('pages', 'pages_rounded', 'pages_simple', 'advanced_pages')) ) {
		?><nav class="<?php echo esc_attr($sc); ?>_pagination sc_item_pagination sc_item_pagination_<?php echo esc_attr($args['pagination']); ?> navigation pagination <?php echo esc_attr($align); ?>" data-params="<?php echo esc_attr(serialize(apply_filters('trx_addons_filter_sc_args_to_serialize', $args))); ?>" role="navigation">
			<div class="nav-links"><?php
				$total = 5;
				$start = max(1, $args['page'] - floor($total/2));
				$end = min($max_page, $start + $total - 1);
				if ($args['page'] > 1) {
					?><a href="#" class="page-numbers first" data-page="1" title="<?php echo esc_attr('First page', 'critique'); ?>"><?php esc_html_e('First', 'critique'); ?></a><?php
					?><a href="#" class="page-numbers prev" data-page="<?php echo esc_attr($args['page'] - 1); ?>" title="<?php echo esc_attr('Previous page', 'critique'); ?>"><?php esc_html_e('Previous', 'critique'); ?></a><?php
				}
				for ($i = $start; $i <= $end; $i++) {
					if ($i == $args['page']) {
						?><span class="page-numbers current"><?php echo esc_html($i); ?></span><?php
					} else {
						?><a href="#" class="page-numbers" data-page="<?php echo esc_attr($i); ?>"><?php echo esc_html($i); ?></a><?php
					}
				}
				if ($args['page'] < $max_page) {
					?><a href="#" class="page-numbers next" data-page="<?php echo esc_attr($args['page'] + 1); ?>" title="<?php echo esc_attr('Next page', 'critique'); ?>"><?php esc_html_e('Next', 'critique'); ?></a><?php
					?><a href="#" class="page-numbers last" data-page="<?php echo esc_attr($max_page); ?>" title="<?php echo esc_attr('Last page', 'critique'); ?>"><?php esc_html_e('Last', 'critique'); ?></a><?php
				}
			?></div><?php
			if ( $args['pagination'] == 'advanced_pages' ) {
				?><span class="page-numbers page-count"><?php echo sprintf(esc_html__('Page %d of %d', 'critique'), $args['page'], $max_page); ?></span><?php
			}
		?></nav><?php

	// Load more
	} else if ( in_array( $args['pagination'], array('load_more', 'infinite') ) ) {
		if ($args['page'] < $max_page) {
			?><nav class="<?php echo esc_attr($sc); ?>_pagination sc_item_pagination sc_item_pagination_load_more nav-links-more <?php
				if ( array_key_exists('pagination_align', $args) ) {
					echo 'sc_align_' . esc_attr($args['pagination_align']);
				} else {
					echo esc_attr($align);
				}
				if ( $args['pagination'] == 'infinite' ) {
					echo ' sc_item_pagination_infinite';
				}
				$pagination_btn = '';
				if ( array_key_exists('pagination_style', $args) ) {
					$pagination_btn = 'sc_button sc_button_' .  $args['pagination_style'] . ' hover_style_' .  $args['pagination_hover'] . ' color_style_' .  $args['pagination_color'];
				} else {
					$pagination_btn = 'sc_button sc_button_default hover_style_3 color_style_3';
				}
			?>" data-params="<?php echo esc_attr(serialize(apply_filters('trx_addons_filter_sc_args_to_serialize', $args))); ?>">
				<a class="nav-links <?php echo esc_attr($pagination_btn); ?>" data-page="<?php echo esc_attr($args['page']+1); ?>" data-max-page="<?php echo esc_attr($max_page); ?>"><span><?php
					echo !empty( $args['more_text'] ) ? esc_html( $args['more_text'] ) : ( array_key_exists('pagination_style', $args) && $args['pagination_style'] == 'rounded' ? esc_html__( 'More', 'critique' ) : esc_html__( 'Load more', 'critique' ));
				?></span></a>
			</nav><?php
		}
	}
}