<?php
/* ThemeREX Popup support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_trx_popup_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'critique_trx_popup_theme_setup9', 9 );
	function critique_trx_popup_theme_setup9() {
		if ( critique_exists_trx_popup() ) {
			add_action( 'wp_enqueue_scripts', 'critique_trx_popup_frontend_scripts', 1100 );
			add_filter( 'critique_filter_merge_styles', 'critique_trx_popup_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_trx_popup_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_trx_popup_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter( 'critique_filter_tgmpa_required_plugins',	'critique_trx_popup_tgmpa_required_plugins' );
	function critique_trx_popup_tgmpa_required_plugins( $list = array() ) {
		if ( critique_storage_isset( 'required_plugins', 'trx_popup' ) && critique_storage_get_array( 'required_plugins', 'trx_popup', 'install' ) !== false && critique_is_theme_activated() ) {
			$path = critique_get_plugin_source_path( 'plugins/trx_popup/trx_popup.zip' );
			if ( ! empty( $path ) || critique_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => critique_storage_get_array( 'required_plugins', 'trx_popup', 'title' ),
					'slug'     => 'trx_popup',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_popup.zip',
					'version'  => '1.0',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'critique_exists_trx_popup' ) ) {
	function critique_exists_trx_popup() {
		return defined( 'TRX_POPUP_URL' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'critique_trx_popup_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'critique_trx_popup_frontend_scripts', 1100 );
	function critique_trx_popup_frontend_scripts() {
		if ( critique_is_on( critique_get_theme_option( 'debug_mode' ) ) ) {
			$critique_url = critique_get_file_url( 'plugins/trx_popup/trx_popup.css' );
			if ( '' != $critique_url ) {
				wp_enqueue_style( 'critique-trx-popup', $critique_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'critique_trx_popup_merge_styles' ) ) {
	//Handler of the add_filter('critique_filter_merge_styles', 'critique_trx_popup_merge_styles');
	function critique_trx_popup_merge_styles( $list ) {
		$list[ 'plugins/trx_popup/trx_popup.css' ] = true;
		return $list;
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( critique_exists_trx_popup() ) {
	require_once critique_get_file_dir( 'plugins/trx_popup/trx_popup-style.php' );
}
