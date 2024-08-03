<?php
/**
 * 'Band' template to display the content
 *
 * Used for index/archive/search.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.71.0
 */

$critique_template_args = get_query_var( 'critique_template_args' );

$critique_columns       = 1;

$critique_expanded      = ! critique_sidebar_present() && critique_get_theme_option( 'expand_content' ) == 'expand';

$critique_post_format   = get_post_format();
$critique_post_format   = empty( $critique_post_format ) ? 'standard' : str_replace( 'post-format-', '', $critique_post_format );

if ( is_array( $critique_template_args ) ) {
	$critique_columns    = empty( $critique_template_args['columns'] ) ? 1 : max( 1, $critique_template_args['columns'] );
	$critique_blog_style = array( $critique_template_args['type'], $critique_columns );
	if ( ! empty( $critique_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide"><?php
	} elseif ( $critique_columns > 1 ) {
		$critique_columns_class = critique_get_column_class( 1, $critique_columns, ! empty( $critique_template_args['columns_tablet']) ? $critique_template_args['columns_tablet'] : '', ! empty($critique_template_args['columns_mobile']) ? $critique_template_args['columns_mobile'] : '' );
		?><div class="<?php echo esc_attr( $critique_columns_class ); ?>"><?php
	}
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_band post_format_' . esc_attr( $critique_post_format ) );
	critique_add_blog_animation( $critique_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$critique_hover      = ! empty( $critique_template_args['hover'] ) && ! critique_is_inherit( $critique_template_args['hover'] )
							? $critique_template_args['hover']
							: critique_get_theme_option( 'image_hover' );
	$critique_components = ! empty( $critique_template_args['meta_parts'] )
							? ( is_array( $critique_template_args['meta_parts'] )
								? $critique_template_args['meta_parts']
								: array_map( 'trim', explode( ',', $critique_template_args['meta_parts'] ) )
								)
							: critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );

	$critique_show_title = get_the_title() != '';
	$critique_show_meta  = count( $critique_components ) > 0 && ! in_array( $critique_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	// Post date
	if ( $critique_show_meta && in_array( 'date', $critique_components ) ) {
		?>
		<div class="post_date_wrap">
			<div class="day"><?php echo esc_html(get_the_date('d')); ?></div>
			<?php			
			critique_show_post_meta( apply_filters(
												'critique_filter_post_meta_args',
												array(
													'components' => 'date',
													'date_format' => 'M Y',
													'seo'        => false,
													'echo'       => true,
													),
												'band', 0
												)
								);
			?>
		</div>
		<?php
		$critique_components = critique_array_delete_by_value( $critique_components, 'date' );
	}

	// Featured image
	critique_show_post_featured( apply_filters( 'critique_filter_args_featured', 
		array(
			'no_links'   => ! empty( $critique_template_args['no_links'] ),
			'hover'      => $critique_hover,
			'meta_parts' => $critique_components,
			'thumb_bg'   => true,
			'thumb_ratio' => $critique_post_format == 'image' ? '16:9' : '1:1',
			'thumb_size' => critique_get_thumb_size( 'big' )
		),
		'content-band',
		$critique_template_args
	) );

	?><div class="post_content_wrap"><?php
		// Title and post meta
		if ( $critique_show_title ) {
			?>
			<div class="post_header entry-header">
				<?php
				// Categories
				if ( apply_filters( 'critique_filter_show_blog_categories', $critique_show_meta && in_array( 'categories', $critique_components ), array( 'categories' ), 'band' ) ) {
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
				if ( apply_filters( 'critique_filter_show_blog_title', true, 'band' ) ) {
					do_action( 'critique_action_before_post_title' );
					$critique_title_tag = $critique_post_format == 'image' && !is_archive() && !is_home() ? 'h3' : 'h4';
					if ( empty( $critique_template_args['no_links'] ) ) {
						the_title( sprintf( '<'.esc_html($critique_title_tag).' class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></'.esc_html($critique_title_tag).'>' );
					} else {
						the_title( '<'.esc_html($critique_title_tag).' class="post_title entry-title">', '</'.esc_html($critique_title_tag).'>' );
					}
					do_action( 'critique_action_after_post_title' );
				}
				?>
			</div><!-- .post_header -->
			<?php
		}

		// Post content
		if ( ! isset( $critique_template_args['excerpt_length'] ) && ! in_array( $critique_post_format, array( 'gallery', 'audio', 'video' ) ) ) {
			$critique_template_args['excerpt_length'] = 30;
		}
		if ( apply_filters( 'critique_filter_show_blog_excerpt', empty( $critique_template_args['hide_excerpt'] ) && critique_get_theme_option( 'excerpt_length' ) > 0, 'band' ) ) {
			?>
			<div class="post_content entry-content">
				<?php
				// Post content area
				critique_show_post_content( $critique_template_args, '<div class="post_content_inner">', '</div>' );
				?>
			</div><!-- .entry-content -->
			<?php
		}
		// Post meta
		if ( false && apply_filters( 'critique_filter_show_blog_meta', $critique_show_meta, $critique_components, 'band' ) ) {
			if ( count( $critique_components ) > 0 ) {
				do_action( 'critique_action_before_post_meta' );
				critique_show_post_meta(
					apply_filters(
						'critique_filter_post_meta_args', array(
							'components' => join( ',', $critique_components ),
							'seo'        => false,
							'echo'       => true,
						), 'band', 1
					)
				);
				do_action( 'critique_action_after_post_meta' );
			}
		}
		// More button
		if ( apply_filters( 'critique_filter_show_blog_readmore', true, 'band' ) ) {
			if ( empty( $critique_template_args['no_links'] ) ) {
				do_action( 'critique_action_before_post_readmore' ); ?>
				<a class="sc_button sc_button_simple color_style_1" href="<?php echo esc_url( get_permalink() ); ?>">
					<span class="icon"></span>
				</a><?php
				do_action( 'critique_action_after_post_readmore' );
			}
		}
		?>
	</div>
</article>
<?php

if ( is_array( $critique_template_args ) ) {
	if ( ! empty( $critique_template_args['slider'] ) || $critique_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
