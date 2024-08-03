<?php
/**
 * The "Style 7" template to display the post header of the single post or attachment:
 * featured image and title are placed in the fullscreen post header, meta is inside the content
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.75.0
 */

if ( apply_filters( 'critique_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
	// Post title and meta
	ob_start();
	critique_sc_layouts_showed('title', false);
	critique_show_post_title_and_meta( array( 
		'show_meta' => true,
	) );
	$critique_post_header = ob_get_contents();
	ob_end_clean();
	// Featured image
	ob_start();
	critique_show_post_featured_image( array(
		'thumb_bg' => true,
		'popup'    => true,
	) );
	$critique_post_header .= ob_get_contents();
	ob_end_clean();
	$critique_with_featured_image = critique_is_with_featured_image( $critique_post_header, array( 'with_gallery' ) );

	if ( strpos( $critique_post_header, 'post_featured' ) !== false
		|| strpos( $critique_post_header, 'post_title' ) !== false
	) {
		do_action( 'critique_action_before_post_header' );	
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( critique_get_theme_option( 'single_style' ) );
			if ( $critique_with_featured_image ) {
				echo ' with_featured_image';
			}
		?>">
			<?php
			critique_show_layout( $critique_post_header );
			?>
		</div>
		<?php
		do_action( 'critique_action_after_post_header' );
	}
}
