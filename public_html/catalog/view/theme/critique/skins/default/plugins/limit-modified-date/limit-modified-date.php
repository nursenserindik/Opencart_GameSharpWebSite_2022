<?php

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_limit_modified_date_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'critique_limit_modified_date_theme_setup9', 9 );
    function critique_limit_modified_date_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_limit_modified_date_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_limit_modified_date_tgmpa_required_plugins' ) ) {    
    function critique_limit_modified_date_tgmpa_required_plugins( $list = array() ) {
        if ( critique_storage_isset( 'required_plugins', 'limit-modified-date' ) && critique_storage_get_array( 'required_plugins', 'limit-modified-date', 'install' ) !== false ) {
            $list[] = array(
                'name'     => critique_storage_get_array( 'required_plugins', 'limit-modified-date', 'title' ),
                'slug'     => 'limit-modified-date',
                'required' => false,
            );
        }
        return $list;
    }
}