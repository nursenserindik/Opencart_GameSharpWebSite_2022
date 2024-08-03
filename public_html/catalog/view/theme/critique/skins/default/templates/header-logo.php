<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

$critique_args = get_query_var( 'critique_logo_args' );

// Site logo
$critique_logo_type   = isset( $critique_args['type'] ) ? $critique_args['type'] : '';
$critique_logo_image  = critique_get_logo_image( $critique_logo_type );
$critique_logo_text   = critique_is_on( critique_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$critique_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $critique_logo_image['logo'] ) || ! empty( $critique_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $critique_logo_image['logo'] ) ) {
			if ( empty( $critique_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric( $critique_logo_image['logo'] ) && $critique_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$critique_attr = critique_getimagesize( $critique_logo_image['logo'] );
				echo '<img src="' . esc_url( $critique_logo_image['logo'] ) . '"'
						. ( ! empty( $critique_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $critique_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $critique_logo_text ) . '"'
						. ( ! empty( $critique_attr[3] ) ? ' ' . wp_kses_data( $critique_attr[3] ) : '' )
						. '>';
			}
		} else {
			critique_show_layout( critique_prepare_macros( $critique_logo_text ), '<span class="logo_text">', '</span>' );
			critique_show_layout( critique_prepare_macros( $critique_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
