<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

$critique_template_args = get_query_var( 'critique_template_args' );
if ( is_array( $critique_template_args ) ) {
	$critique_columns    = empty( $critique_template_args['columns'] ) ? 2 : max( 1, $critique_template_args['columns'] );
	$critique_blog_style = array( $critique_template_args['type'], $critique_columns );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns, ! empty( $critique_template_args['columns_tablet']) ? $critique_template_args['columns_tablet'] : '', ! empty($critique_template_args['columns_mobile']) ? $critique_template_args['columns_mobile'] : '' );
} else {
	$critique_blog_style = explode( '_', critique_get_theme_option( 'blog_style' ) );
	$critique_columns    = empty( $critique_blog_style[1] ) ? 2 : max( 1, $critique_blog_style[1] );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns );
}

$critique_post_format = get_post_format();
$critique_post_format = empty( $critique_post_format ) ? 'standard' : str_replace( 'post-format-', '', $critique_post_format );

$critique_post_link = get_permalink();
$critique_post_info = '';

?><div class="<?php
if ( ! empty( $critique_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( critique_is_blog_style_use_masonry( $critique_blog_style[0] )
			? 'masonry_item masonry_item-1_' . esc_attr( $critique_columns )
			: esc_attr( $critique_columns_class )
			);
}
?>"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $critique_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $critique_columns )
		. ( 'portfolio' != $critique_blog_style[0] ? ' ' . esc_attr( $critique_blog_style[0] )  . '_' . esc_attr( $critique_columns ) : '' )
	);
	critique_add_blog_animation( $critique_template_args );
	?>
>
<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$critique_hover   = ! empty( $critique_template_args['hover'] ) && ! critique_is_inherit( $critique_template_args['hover'] )
								? $critique_template_args['hover']
								: critique_get_theme_option( 'image_hover' );

	if ( 'dots' == $critique_hover ) {
		$critique_post_link = empty( $critique_template_args['no_links'] )
								? ( ! empty( $critique_template_args['link'] )
									? $critique_template_args['link']
									: get_permalink()
									)
								: '';
		$critique_target    = ! empty( $critique_post_link ) && false === strpos( $critique_post_link, home_url() )
								? ' target="_blank" rel="nofollow"'
								: '';
	}
	
	// Meta parts
	$critique_components = ! empty( $critique_template_args['meta_parts'] )
							? ( is_array( $critique_template_args['meta_parts'] )
								? $critique_template_args['meta_parts']
								: explode( ',', $critique_template_args['meta_parts'] )
								)
							: critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );
	$critique_show_meta  = count( $critique_components ) > 0 && ! in_array( $critique_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );


	ob_start();

	// Categories
	if ( apply_filters( 'critique_filter_show_blog_categories', $critique_show_meta && in_array( 'categories', $critique_components ), array( 'categories' ), 'portfolio' ) ) {
		do_action( 'critique_action_before_post_category' );
				?>
		<div class="post_category">
			<?php
			critique_show_post_meta( apply_filters(
												'critique_filter_post_meta_args',
												array(
													'components' => 'categories',
													'seo'        => false,
													'echo'       => true,
													),
												'hover_' . $critique_hover, 1
												)
								);
			?>
		</div>
		<?php
		$critique_components = critique_array_delete_by_value( $critique_components, 'categories' );
		do_action( 'critique_action_after_post_category' );
	}

	// Post title
	if ( apply_filters( 'critique_filter_show_blog_title', true, 'portfolio' ) ) {
		do_action( 'critique_action_before_post_title' );
		if ( empty( $critique_template_args['no_links'] ) ) {
			the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
		} else {
			the_title( '<h5 class="post_title entry-title">', '</h5>' );
		}
		do_action( 'critique_action_after_post_title' );
	}

	// Post meta
	if ( apply_filters( 'critique_filter_show_blog_meta', $critique_show_meta, $critique_components, 'portfolio' ) ) {
		if ( count( $critique_components ) > 0 ) {
			do_action( 'critique_action_before_post_meta' );
			critique_show_post_meta(
				apply_filters(
					'critique_filter_post_meta_args', array(
						'components' => join( ',', $critique_components ),
						'seo'        => false,
						'echo'       => true,
						'author_avatar'   => false,
					), $critique_blog_style[0], $critique_columns
				)
			);
			do_action( 'critique_action_after_post_meta' );
		}
	}

	$critique_post_info = ob_get_contents();
	ob_end_clean();
							
	// Featured image
	critique_show_post_featured( apply_filters( 'critique_filter_args_featured', 
		array(
			'hover'         => $critique_hover,
			'no_links'      => ! empty( $critique_template_args['no_links'] ),
			'thumb_size'    => critique_get_thumb_size(
									critique_is_blog_style_use_masonry( $critique_blog_style[0] )
										? (	strpos( critique_get_theme_option( 'body_style' ), 'full' ) !== false || $critique_columns < 3
											? 'masonry-big'
											: ( in_array($critique_post_format, array('gallery', 'audio', 'video')) ? 'med' : 'masonry')
											)
										: (	strpos( critique_get_theme_option( 'body_style' ), 'full' ) !== false || $critique_columns < 3
											? 'big'
											: 'med'
											)
								),
    		'thumb_ratio' 	=> $critique_post_format == 'gallery' ? '1:1' : '',
			'show_no_image' => true,
			'meta_parts'    => $critique_components,
			'class'         => 'dots' == $critique_hover ? 'hover_with_info' : '',
			'post_info'     => '<div class="post_info">' . $critique_post_info . '</div>',
		),
		'content-portfolio',
		$critique_template_args
	) );
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!