<?php
/**
 * The template to display default site footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

?>
<footer class="footer_wrap footer_default
<?php
$critique_footer_scheme = critique_get_theme_option( 'footer_scheme' );
$critique_footer_scheme = critique_is_woocommerce_page() ? critique_get_theme_option( 'woo_footer_scheme' ) : $critique_footer_scheme;
if ( ! empty( $critique_footer_scheme ) && ! critique_is_inherit( $critique_footer_scheme  ) ) {
	echo ' scheme_' . esc_attr( $critique_footer_scheme );
}
?>
				">
	<?php

	// Footer widgets area
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/footer-widgets' ) );

	// Logo
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/footer-logo' ) );

	// Socials
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/footer-socials' ) );

	// Menu
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/footer-menu' ) );

	// Copyright area
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/footer-copyright' ) );

	?>
</footer><!-- /.footer_wrap -->
