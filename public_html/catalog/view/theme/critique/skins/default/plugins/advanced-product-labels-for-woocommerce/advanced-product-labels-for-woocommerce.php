<?php
/* Advanced Product Labels For Woocommerce support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_advanced_product_labels_for_woocommerce_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'critique_advanced_product_labels_for_woocommerce_theme_setup9', 9 );
	function critique_advanced_product_labels_for_woocommerce_theme_setup9() {		
		if ( is_admin() ) {
			add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_advanced_product_labels_for_woocommerce_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_advanced_product_labels_for_woocommerce_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('critique_filter_tgmpa_required_plugins',	'critique_advanced_product_labels_for_woocommerce_tgmpa_required_plugins');
	function critique_advanced_product_labels_for_woocommerce_tgmpa_required_plugins( $list = array() ) {
		if ( critique_storage_isset( 'required_plugins', 'advanced-product-labels-for-woocommerce' ) && critique_storage_get_array( 'required_plugins', 'advanced-product-labels-for-woocommerce', 'install' ) !== false && critique_is_theme_activated() ) {
			$path = critique_get_plugin_source_path( 'plugins/advanced-product-labels-for-woocommerce/advanced-product-labels-for-woocommerce.zip' );
			if ( ! empty( $path ) || critique_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => critique_storage_get_array( 'required_plugins', 'advanced-product-labels-for-woocommerce', 'title' ),
					'slug'     => 'advanced-product-labels-for-woocommerce',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'critique_exists_advanced_product_labels_for_woocommerce' ) ) {
	function critique_exists_advanced_product_labels_for_woocommerce() {
		return class_exists( 'BeRocket_products_label' );
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'critique_exists_advanced_product_labels_for_woocommerce_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'critique_exists_advanced_product_labels_for_woocommerce_importer_set_options' );
    function critique_exists_advanced_product_labels_for_woocommerce_importer_set_options($options=array()) {   
        if ( critique_exists_advanced_product_labels_for_woocommerce() && in_array('advanced-product-labels-for-woocommerce', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'br-products_label-options';
        }
        return $options;
    }
}