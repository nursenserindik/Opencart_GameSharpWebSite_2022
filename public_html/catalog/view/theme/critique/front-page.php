<?php
/**
 * The Front Page template file.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( critique_is_on( critique_get_theme_option( 'front_page_enabled', false ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$critique_sections = critique_array_get_keys_by_value( critique_get_theme_option( 'front_page_sections' ) );
		if ( is_array( $critique_sections ) ) {
			foreach ( $critique_sections as $critique_section ) {
				get_template_part( apply_filters( 'critique_filter_get_template_part', 'front-page/section', $critique_section ), $critique_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'critique_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'critique_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'index' ) );
}

get_footer();
