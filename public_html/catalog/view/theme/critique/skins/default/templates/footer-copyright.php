<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$critique_copyright_scheme = critique_get_theme_option( 'copyright_scheme' );
if ( ! empty( $critique_copyright_scheme ) && ! critique_is_inherit( $critique_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $critique_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$critique_copyright = critique_get_theme_option( 'copyright' );
			if ( ! empty( $critique_copyright ) ) {
				$critique_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $critique_copyright );
				$critique_copyright = critique_prepare_macros( $critique_copyright );
				// Display copyright
				echo wp_kses( nl2br( $critique_copyright ), 'critique_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
