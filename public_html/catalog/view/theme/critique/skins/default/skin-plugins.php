<?php
/**
 * Required plugins
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.76.0
 */

// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$critique_theme_required_plugins_groups = array(
	'core'          => esc_html__( 'Core', 'critique' ),
	'page_builders' => esc_html__( 'Page Builders', 'critique' ),
	'ecommerce'     => esc_html__( 'E-Commerce & Donations', 'critique' ),
	'socials'       => esc_html__( 'Socials and Communities', 'critique' ),
	'events'        => esc_html__( 'Events and Appointments', 'critique' ),
	'content'       => esc_html__( 'Content', 'critique' ),
	'other'         => esc_html__( 'Other', 'critique' ),
);
$critique_theme_required_plugins        = array(
	'trx_addons'                 => array(
		'title'       => esc_html__( 'ThemeREX Addons', 'critique' ),
		'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'critique' ),
		'required'    => true,
		'logo'        => 'trx_addons.png',
		'group'       => $critique_theme_required_plugins_groups['core'],
	),
	'elementor'                  => array(
		'title'       => esc_html__( 'Elementor', 'critique' ),
		'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'critique' ),
		'required'    => false,
		'logo'        => 'elementor.png',
		'group'       => $critique_theme_required_plugins_groups['page_builders'],
	),
	'gutenberg'                  => array(
		'title'       => esc_html__( 'Gutenberg', 'critique' ),
		'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'critique' ),
		'required'    => false,
		'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'gutenberg.png',
		'group'       => $critique_theme_required_plugins_groups['page_builders'],
	),
	'woocommerce'                => array(
		'title'       => esc_html__( 'WooCommerce', 'critique' ),
		'description' => esc_html__( "Connect the store to your website and start selling now", 'critique' ),
		'required'    => false,
		'logo'        => 'woocommerce.png',
		'group'       => $critique_theme_required_plugins_groups['ecommerce'],
	),
	'elegro-payment'             => array(
		'title'       => esc_html__( 'Elegro Crypto Payment', 'critique' ),
		'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'critique' ),
		'required'    => false,
		'logo'        => 'elegro-payment.png',
		'group'       => $critique_theme_required_plugins_groups['ecommerce'],
	),
	'advanced-product-labels-for-woocommerce'             => array(
		'title'       => esc_html__( 'Advanced Product Labels For Woocommerce', 'critique' ),
		'description' => esc_html__( "With Advanced Product Labels plugin you can create labels easily and quickly", 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/advanced-product-labels-for-woocommerce/advanced-product-labels-for-woocommerce.png' ),
		'group'       => $critique_theme_required_plugins_groups['ecommerce'],
	),
	'mailchimp-for-wp'           => array(
		'title'       => esc_html__( 'MailChimp for WP', 'critique' ),
		'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'critique' ),
		'required'    => false,
		'logo'        => 'mailchimp-for-wp.png',
		'group'       => $critique_theme_required_plugins_groups['socials'],
	),
	'contact-form-7'             => array(
		'title'       => esc_html__( 'Contact Form 7', 'critique' ),
		'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'critique' ),
		'required'    => false,
		'logo'        => 'contact-form-7.png',
		'group'       => $critique_theme_required_plugins_groups['content'],
	),
	'yikes-inc-easy-mailchimp-extender'             => array(
		'title'       => esc_html__( 'Easy Forms for Mailchimp', 'critique' ),
		'description' => esc_html__( "Easy Forms for Mailchimp allows you to add unlimited Mailchimp sign up forms to your WordPress site", 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/yikes-inc-easy-mailchimp-extender/yikes-inc-easy-mailchimp-extender.png' ),
		'group'       => $critique_theme_required_plugins_groups['content'],
	),
	'eu-opt-in-compliance-for-mailchimp'             => array(
		'title'       => esc_html__( 'GDPR Compliance for Mailchimp', 'critique' ),
		'description' => esc_html__( "This addon creates an additional section on the Easy Forms for Mailchimp form builder called ‘EU Law Compliance.’", 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/eu-opt-in-compliance-for-mailchimp/eu-opt-in-compliance-for-mailchimp.png' ),
		'group'       => $critique_theme_required_plugins_groups['content'],
	),
	'sitepress-multilingual-cms' => array(
		'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'critique' ),
		'description' => esc_html__( "Allows you to make your website multilingual", 'critique' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'sitepress-multilingual-cms.png',
		'group'       => $critique_theme_required_plugins_groups['content'],
	),
	'accelerated-mobile-pages'         => array(
		'title'       => esc_html__( 'AMP for WP – Accelerated Mobile Pages', 'critique' ),
		'description' => esc_html__( "AMP makes your website faster for Mobile visitors", 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/accelerated-mobile-pages/accelerated-mobile-pages.png' ),
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'wp-gdpr-compliance'         => array(
		'title'       => esc_html__( 'Cookie Information', 'critique' ),
		'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'critique' ),
		'required'    => false,
		'install'     => false,
		'logo'        => 'wp-gdpr-compliance.png',
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'trx_updater'                => array(
		'title'       => esc_html__( 'ThemeREX Updater', 'critique' ),
		'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'critique' ),
		'required'    => false,
		'logo'        => 'trx_updater.png',
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'trx_popup'                  => array(
		'title'       => esc_html__( 'ThemeREX Popup', 'critique' ),
		'description' => esc_html__( "Add popup to your site.", 'critique' ),
		'required'    => false,
		'logo'        => 'trx_popup.png',
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'advanced-popups'                  => array(
		'title'       => esc_html__( 'Advanced Popups', 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/advanced-popups/advanced-popups.jpg' ),
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'powerkit'              => array(
		'title'       => esc_html__( 'Powerkit', 'critique' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'powerkit.png',
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'kadence-blocks'		=> array(
		'title'       => esc_html__( 'Kadence Blocks', 'critique' ),
		'description' => '',
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/kadence-blocks/kadence-blocks.png' ),
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'limit-modified-date'		=> array(
		'title'       => esc_html__( 'Limit Modified Date', 'critique' ),
		'description' => '',
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/limit-modified-date/limit-modified-date.png' ),
		'group'       => $critique_theme_required_plugins_groups['other'],
	),
	'cookie-law-info'         => array(
		'title'       => esc_html__( 'GDPR Cookie Consent', 'critique' ),
		'description' => esc_html__( "The CookieYes GDPR Cookie Consent & Compliance Notice plugin will assist you in making your website GDPR (RGPD, DSVGO) compliant.", 'critique' ),
		'required'    => false,
		'logo'        => critique_get_file_url( critique_skins_get_current_skin_dir() . 'plugins/cookie-law-info/cookie-law-info.png'),
		'group'       => $critique_theme_required_plugins_groups['other'],
	)
);

if ( CRITIQUE_THEME_FREE ) {
	unset( $critique_theme_required_plugins['js_composer'] );
	unset( $critique_theme_required_plugins['vc-extensions-bundle'] );
	unset( $critique_theme_required_plugins['easy-digital-downloads'] );
	unset( $critique_theme_required_plugins['give'] );
	unset( $critique_theme_required_plugins['bbpress'] );
	unset( $critique_theme_required_plugins['booked'] );
	unset( $critique_theme_required_plugins['content_timeline'] );
	unset( $critique_theme_required_plugins['mp-timetable'] );
	unset( $critique_theme_required_plugins['learnpress'] );
	unset( $critique_theme_required_plugins['the-events-calendar'] );
	unset( $critique_theme_required_plugins['calculated-fields-form'] );
	unset( $critique_theme_required_plugins['essential-grid'] );
	unset( $critique_theme_required_plugins['revslider'] );
	unset( $critique_theme_required_plugins['ubermenu'] );
	unset( $critique_theme_required_plugins['sitepress-multilingual-cms'] );
	unset( $critique_theme_required_plugins['envato-market'] );
	unset( $critique_theme_required_plugins['trx_updater'] );
	unset( $critique_theme_required_plugins['trx_popup'] );
}

// Add plugins list to the global storage
critique_storage_set( 'required_plugins', $critique_theme_required_plugins );
