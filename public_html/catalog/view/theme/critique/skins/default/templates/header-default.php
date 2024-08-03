<?php
/**
 * The template to display default site header
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

$critique_header_css   = '';
$critique_header_image = get_header_image();
$critique_header_video = critique_get_header_video();
if ( ! empty( $critique_header_image ) && critique_trx_addons_featured_image_override( is_singular() || critique_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$critique_header_image = critique_get_current_mode_image( $critique_header_image );
}
?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $critique_header_image ) || ! empty( $critique_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $critique_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $critique_header_image ) {
		echo ' ' . esc_attr( critique_add_inline_css_class( 'background-image: url(' . esc_url( $critique_header_image ) . ');' ) );
	}
	if ( is_singular() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( critique_is_on( critique_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight critique-full-height';
	}
	$critique_header_scheme = critique_get_theme_option( 'header_scheme' );
	if ( ! empty( $critique_header_scheme ) && ! critique_is_inherit( $critique_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $critique_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $critique_header_video ) ) {
		get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-navi' ) );

	// Mobile header
	if ( critique_is_on( critique_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	if ( ! is_single() ) {
		get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-title' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
