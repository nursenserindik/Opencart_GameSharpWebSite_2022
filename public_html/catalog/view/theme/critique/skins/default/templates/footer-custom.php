<?php
/**
 * The template to display default site footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

$critique_footer_id = critique_get_custom_footer_id();
$critique_footer_meta = critique_get_custom_layout_meta( $critique_footer_id );
if ( ! empty( $critique_footer_meta['margin'] ) ) {
	critique_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( critique_prepare_css_value( $critique_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $critique_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $critique_footer_id ) ) ); ?>
						<?php
						$critique_footer_scheme = critique_get_theme_option( 'footer_scheme' );
						$critique_footer_scheme = critique_is_woocommerce_page() ? 
													( ( empty(critique_get_theme_option( 'woo_footer_scheme' ) ) || critique_get_theme_option( 'woo_footer_scheme' ) === 'inherit') ? 
														$critique_footer_scheme 
														: critique_get_theme_option( 'woo_footer_scheme' ) ) 
													: $critique_footer_scheme;
						if ( ! empty( $critique_footer_scheme ) && ! critique_is_inherit( $critique_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $critique_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'critique_action_show_layout', $critique_footer_id );
	?>
</footer><!-- /.footer_wrap -->
