<?php
/* PowerKit support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_powerkit_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'critique_powerkit_theme_setup9', 9 );
	function critique_powerkit_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_powerkit_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_powerkit_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('critique_filter_tgmpa_required_plugins',	'critique_powerkit_tgmpa_required_plugins');
	function critique_powerkit_tgmpa_required_plugins( $list = array() ) {
		if ( critique_storage_isset( 'required_plugins', 'powerkit' ) && critique_storage_get_array( 'required_plugins', 'powerkit', 'install' ) !== false ) {
			$list[] = array(
				'name'     => critique_storage_get_array( 'required_plugins', 'powerkit', 'title' ),
				'slug'     => 'powerkit',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'critique_exists_powerkit' ) ) {
	function critique_exists_powerkit() {
		return class_exists( 'Powerkit' );
	}
}
