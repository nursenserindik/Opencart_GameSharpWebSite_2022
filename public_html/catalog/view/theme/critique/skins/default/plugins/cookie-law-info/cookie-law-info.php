<?php

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_cookie_law_info_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'critique_cookie_law_info_theme_setup9', 9 );
    function critique_cookie_law_info_theme_setup9() {     
        if ( is_admin() ) {
            add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_cookie_law_info_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_cookie_law_info_tgmpa_required_plugins' ) ) {
    function critique_cookie_law_info_tgmpa_required_plugins( $list = array() ) {
        if ( critique_storage_isset( 'required_plugins', 'cookie-law-info' ) && critique_storage_get_array( 'required_plugins', 'cookie-law-info', 'install' ) !== false ) {
            $list[] = array(
                'name'     => critique_storage_get_array( 'required_plugins', 'cookie-law-info', 'title' ),
                'slug'     => 'cookie-law-info',
                'required' => false,
            );
        }
        return $list;
    }
}

// Check if plugin installed and activated
if ( ! function_exists( 'critique_exists_cookie_law_info' ) ) {
    function critique_exists_cookie_law_info() {
        return class_exists( 'Cookie_Law_Info' );
    }
}