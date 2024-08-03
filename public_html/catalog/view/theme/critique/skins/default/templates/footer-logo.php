<?php
/**
 * The template to display the site logo in the footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

// Logo
if ( critique_is_on( critique_get_theme_option( 'logo_in_footer' ) ) ) {
	$critique_logo_image = critique_get_logo_image( 'footer' );
	$critique_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $critique_logo_image['logo'] ) || ! empty( $critique_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $critique_logo_image['logo'] ) ) {
					$critique_attr = critique_getimagesize( $critique_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $critique_logo_image['logo'] ) . '"'
								. ( ! empty( $critique_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $critique_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'critique' ) . '"'
								. ( ! empty( $critique_attr[3] ) ? ' ' . wp_kses_data( $critique_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $critique_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $critique_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
