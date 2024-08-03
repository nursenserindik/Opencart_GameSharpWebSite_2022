<?php
/**
 * The "Style 11" template to display the post header of the single post or attachment:
 * featured image and title placed in the post header
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.75.0
 */

if ( apply_filters( 'critique_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
	$critique_post_format = str_replace( 'post-format-', '', get_post_format() );
	ob_start();
	// Post title and meta
	do_action( 'critique_action_before_post_header' );
	critique_sc_layouts_showed('title', false);
	critique_show_post_title_and_meta( array(
										'author_avatar' => true,
										'show_labels'   => false,
										'add_spaces'    => true,
										)
									);
	do_action( 'critique_action_after_post_header' );
	$critique_post_header = ob_get_contents();
	ob_end_clean();
	// Featured image
	ob_start();
	critique_show_post_featured_image( array(
		'thumb_bg' => false,
		'popup'    => true,
		'thumb_ratio' => $critique_post_format == 'gallery' ? '11:7' : '',  
	) );
	$critique_post_header .= ob_get_contents();
	ob_end_clean();
	$critique_with_featured_image = critique_is_with_featured_image( $critique_post_header );

	if ( strpos( $critique_post_header, 'post_featured' ) !== false
		|| strpos( $critique_post_header, 'post_title' ) !== false
		|| strpos( $critique_post_header, 'post_meta' ) !== false
	) {
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( critique_get_theme_option( 'single_style' ) );
			if ( $critique_with_featured_image ) {
				echo ' with_featured_image';
			}
		?>">
			<div class="content_wrap">
				<?php
				critique_show_layout( $critique_post_header );
				?>
			</div>
		</div>
		<?php
	}
}
