<?php
/**
 * The "Style 3" template to display the post header of the single post or attachment:
 * featured image and title placed in the post header
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
		'popup'     => true,
		'class_avg' => in_array( $critique_post_format, array( 'video' ) ) ? 'content_wrap' : '',
	) );
	$critique_post_header = ob_get_contents();
	ob_end_clean();
	
	// Remove video hover
	preg_match( '/(<div class="post_video_hover).*(<\/a><\/div>)/', $critique_post_header, $matches );
	$video_hover = $matches ? $matches[0] : '';
	if ( !empty($video_hover) ) {
		$critique_post_header = str_replace( $video_hover, '', $critique_post_header );
	}

	$critique_with_featured_image = critique_is_with_featured_image( $critique_post_header );
	// Post title and meta
	ob_start();
	critique_sc_layouts_showed('title', false);
	critique_show_post_title_and_meta( array(
										'content_wrap'  => false,
										'author_avatar' => true,
										'show_labels'   => false,
										'add_spaces'    => true,
										)
									);
	$critique_post_header .= ob_get_contents();
	ob_end_clean();

	if ( strpos( $critique_post_header, 'post_featured' ) !== false
		|| strpos( $critique_post_header, 'post_title' ) !== false
		|| strpos( $critique_post_header, 'post_meta' ) !== false
	) {
		do_action( 'critique_action_before_post_header' );
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( critique_get_theme_option( 'single_style' ) );
			if ( $critique_with_featured_image ) {
				echo ' with_featured_image';
			}
		?>">
			<div class="content_wrap">
				<?php
				// Add video hover
				if ( is_singular() && get_post_format() == 'video') {
					$critique_post_header = str_replace( '<div class="post_video_hover hide"></div>', $video_hover, $critique_post_header );
				}
				critique_show_layout( $critique_post_header );
			?>
			</div>
		</div>
		<?php
		do_action( 'critique_action_after_post_header' );
	}
}
