<?php
/**
 * The "Style 4" template to display the post header of the single post or attachment:
 * featured image placed in the post header and title placed inside content
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.75.0
 */

if ( apply_filters( 'critique_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
	$critique_post_format = str_replace( 'post-format-', '', get_post_format() );
	// Featured image
	ob_start();
	critique_show_post_featured_image( array(
		'thumb_bg'  => true,
		'popup'    => true,
		'class_avg' => in_array( $critique_post_format, array( 'video' ) ) ? 'content_wrap' : '',
	) );
	$critique_post_header = ob_get_contents();
	ob_end_clean();
	$critique_with_featured_image = critique_is_with_featured_image( $critique_post_header );

	if ( strpos( $critique_post_header, 'post_featured' ) !== false ) {
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
	}
}
