<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

$critique_template_args = get_query_var( 'critique_template_args' );

if ( is_array( $critique_template_args ) ) {
	$critique_columns       = empty( $critique_template_args['columns'] ) ? 2 : max( 1, $critique_template_args['columns'] );
	$critique_blog_style    = array( $critique_template_args['type'], $critique_columns );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns, ! empty( $critique_template_args['columns_tablet']) ? $critique_template_args['columns_tablet'] : '', ! empty($critique_template_args['columns_mobile']) ? $critique_template_args['columns_mobile'] : '' );
} else {
	$critique_blog_style    = explode( '_', critique_get_theme_option( 'blog_style' ) );
	$critique_columns       = empty( $critique_blog_style[1] ) ? 2 : max( 1, $critique_blog_style[1] );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns );
}
$critique_expanded   = ! critique_sidebar_present() && critique_get_theme_option( 'expand_content' ) == 'expand';

$critique_post_format = get_post_format();
$critique_post_format = empty( $critique_post_format ) ? 'standard' : str_replace( 'post-format-', '', $critique_post_format );

?><div class="<?php
	if ( ! empty( $critique_template_args['slider'] ) ) {
		echo ' slider-slide swiper-slide';
	} else {
		echo ( critique_is_blog_style_use_masonry( $critique_blog_style[0] )
			? 'masonry_item masonry_item-1_' . esc_attr( $critique_columns )
			: esc_attr( $critique_columns_class )
			);
	}
?>"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $critique_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $critique_columns )
				. ' post_layout_' . esc_attr( $critique_blog_style[0] )
				. ' post_layout_' . esc_attr( $critique_blog_style[0] ) . '_' . esc_attr( $critique_columns )
	);
	critique_add_blog_animation( $critique_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$critique_hover      = ! empty( $critique_template_args['hover'] ) && ! critique_is_inherit( $critique_template_args['hover'] )
							? $critique_template_args['hover']
							: critique_get_theme_option( 'image_hover' );

	$critique_components = ! empty( $critique_template_args['meta_parts'] )
							? ( is_array( $critique_template_args['meta_parts'] )
								? $critique_template_args['meta_parts']
								: explode( ',', $critique_template_args['meta_parts'] )
								)
							: critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );

	critique_show_post_featured( apply_filters( 'critique_filter_args_featured',
		array(
			'thumb_size' => critique_get_thumb_size(
				'classic' == $critique_blog_style[0]
						? ( strpos( critique_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $critique_columns > 2 ? 'big' : 'huge' )
								: ( $critique_columns > 2
									? ( $critique_expanded ? 'med' : 'small' )
									: ( $critique_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( critique_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $critique_columns > 2 ? 'masonry-big' : 'full' )
								: ( $critique_columns <= 2 && $critique_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $critique_hover,
			'meta_parts' => $critique_components,
			'no_links'   => ! empty( $critique_template_args['no_links'] ),
		),
		'content-classic',
		$critique_template_args
	) );

	// Title and post meta
	$critique_show_title = get_the_title() != '';
	$critique_show_meta  = count( $critique_components ) > 0 && ! in_array( $critique_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $critique_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Categories
			if ( apply_filters( 'critique_filter_show_blog_categories', $critique_show_meta && in_array( 'categories', $critique_components ), array( 'categories' ), 'classic' ) ) {
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
			if ( apply_filters( 'critique_filter_show_blog_title', true, 'classic' ) ) {
				do_action( 'critique_action_before_post_title' );
				if ( empty( $critique_template_args['no_links'] ) ) {
					the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
				} else {
					the_title( '<h5 class="post_title entry-title">', '</h5>' );
				}
				do_action( 'critique_action_after_post_title' );
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}

	// Post content
	ob_start();
	if ( apply_filters( 'critique_filter_show_blog_excerpt', empty( $critique_template_args['hide_excerpt'] ) && critique_get_theme_option( 'excerpt_length' ) > 0, 'classic' ) ) {
		critique_show_post_content( $critique_template_args, '<div class="post_content_inner">', '</div>' );
	}
	$critique_content = ob_get_contents();
	ob_end_clean();

	critique_show_layout( $critique_content, '<div class="post_content entry-content">', '</div><!-- .entry-content -->' );

	// Post meta
	if ( apply_filters( 'critique_filter_show_blog_meta', $critique_show_meta, $critique_components, 'classic' ) ) {
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
		
	// More button
	if ( apply_filters( 'critique_filter_show_blog_readmore', ! $critique_show_title || ! empty( $critique_template_args['more_button'] ), 'classic' ) ) {
		if ( empty( $critique_template_args['no_links'] ) ) {
			do_action( 'critique_action_before_post_readmore' );
			critique_show_post_more_link( $critique_template_args, '<p>', '</p>' );
			do_action( 'critique_action_after_post_readmore' );
		}
	}
	?>

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
