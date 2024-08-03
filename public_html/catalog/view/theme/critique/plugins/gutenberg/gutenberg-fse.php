<?php
/* Gutenberg Full-Site Editor support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_gutenberg_fse_loader' ) ) {
	add_action( 'wp_loaded', 'critique_gutenberg_fse_loader', 1 );
	function critique_gutenberg_fse_loader() {
		// Turn off Gutenberg templates on frontend (if theme-specific frontend editor is active)
		// Disabled. Remove false from condition to enable turning off FSE on the front page
		if ( critique_exists_gutenberg_fse()
			&& get_option( 'show_on_front' ) == 'page'
			&& (int) get_option('page_on_front') > 0
			&& critique_is_on( critique_get_theme_option( 'front_page_enabled', false ) )
			&& critique_get_current_url() == '/'
		) {
		 	remove_action( 'wp_loaded', 'gutenberg_add_template_loader_filters' );
		}
	}
}


// Check if Gutenberg Full Site Editor is installed and activated
if ( ! function_exists( 'critique_exists_gutenberg_fse' ) ) {
	function critique_exists_gutenberg_fse() {
		return critique_exists_gutenberg() && function_exists( 'gutenberg_is_fse_theme' );
	}
}


// Check if theme supports Gutenberg Full Site Editor
if ( ! function_exists( 'critique_gutenberg_is_fse_theme' ) ) {
	function critique_gutenberg_is_fse_theme() {
		static $fse = -1;
		if ( $fse == -1 ) {
			$fse = is_readable( get_stylesheet_directory() . '/block-templates/index.html' );
		}
		return $fse;
	}
}


// Check if theme supports Gutenberg Full Site Editor and FSE is installed and activated
if ( ! function_exists( 'critique_gutenberg_is_fse_enabled' ) ) {
	function critique_gutenberg_is_fse_enabled() {
		return critique_exists_gutenberg_fse() && critique_gutenberg_is_fse_theme();
	}
}


// Copy Gutenberg FSE folders from the skin to the root theme's folder
if ( ! function_exists( 'critique_gutenberg_fse_copy_from_skin' ) ) {
	add_action( 'critique_action_skin_switched', 'critique_gutenberg_fse_copy_from_skin', 10, 2 );
	function critique_gutenberg_fse_copy_from_skin( $new_skin, $old_skin ) {
		$theme_templates_dir = critique_prepare_path( CRITIQUE_CHILD_DIR . 'block-templates/' );
		$theme_template_parts_dir = critique_prepare_path( CRITIQUE_CHILD_DIR . 'block-template-parts/' );
		$skin_templates_dir = critique_prepare_path( CRITIQUE_THEME_DIR . 'skins/' . $new_skin . '/block-templates/' );
		$skin_template_parts_dir = critique_prepare_path( CRITIQUE_THEME_DIR . 'skins/' . $new_skin . '/block-template-parts/' );
		// Remove old templates from the stylesheet dir (if exists)
		if ( is_dir( $theme_templates_dir ) ) {
			critique_unlink( $theme_templates_dir );
		}
		if ( is_dir( $theme_template_parts_dir ) ) {
			critique_unlink( $theme_template_parts_dir );
		}
		// If a new skin is a FSE compatible - copy two folders with block templates
		// from a new skin directory to the theme's root folder
		if ( is_dir( $skin_templates_dir ) ) {
			critique_mkdir( $theme_templates_dir );
			$rez = copy_dir( $skin_templates_dir, $theme_templates_dir );
		}
		if ( is_dir( $skin_template_parts_dir ) ) {
			critique_mkdir( $theme_template_parts_dir );
			$rez = copy_dir( $skin_template_parts_dir, $theme_template_parts_dir );
		}
	}
}
