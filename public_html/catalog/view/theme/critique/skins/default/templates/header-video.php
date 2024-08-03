<?php
/**
 * The template to display the background video in the header
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.14
 */
$critique_header_video = critique_get_header_video();
$critique_embed_video  = '';
if ( ! empty( $critique_header_video ) && ! critique_is_from_uploads( $critique_header_video ) ) {
	if ( critique_is_youtube_url( $critique_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $critique_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php critique_show_layout( critique_get_embed_video( $critique_header_video ) ); ?></div>
		<?php
	}
}
