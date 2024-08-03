<?php
/**
 * The template to display the socials in the footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */


// Socials
if ( critique_is_on( critique_get_theme_option( 'socials_in_footer' ) ) ) {
	$critique_output = critique_get_socials_links();
	if ( '' != $critique_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php critique_show_layout( $critique_output ); ?>
			</div>
		</div>
		<?php
	}
}
