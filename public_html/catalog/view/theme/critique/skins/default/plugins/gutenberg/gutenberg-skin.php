<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_gutenberg_blocks_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'critique_gutenberg_blocks_theme_setup9', 9 );
    function critique_gutenberg_blocks_theme_setup9() {        
        if ( critique_is_off( critique_get_theme_option( 'debug_mode' ) ) ) {
            remove_action( 'critique_filter_merge_styles', 'critique_skin_gutenberg_merge_styles' );
            remove_action( 'critique_filter_merge_styles', 'critique_gutenberg_merge_styles' );
        }
    }
}

// Load required styles and scripts for Gutenberg Editor mode
if ( ! function_exists( 'critique_gutenberg_editor_scripts' ) ) {
    add_action( 'enqueue_block_editor_assets', 'critique_gutenberg_editor_scripts');
    function critique_gutenberg_editor_scripts() {
        // Editor styles 
        wp_enqueue_style( 'critique-gutenberg', critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/gutenberg/gutenberg.css' ), array(), null );
    }
}