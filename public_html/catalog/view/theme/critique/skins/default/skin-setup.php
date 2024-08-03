<?php
/**
 * Skin Setup
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.76.0
 */


//--------------------------------------------
// SKIN DEFAULTS
//--------------------------------------------

// Return theme's (skin's) default value for the specified parameter
if ( ! function_exists( 'critique_theme_defaults' ) ) {
	function critique_theme_defaults( $name='', $value='' ) {
		$defaults = array(
			'page_width'        => 1290,
			'page_boxed_extra'  => 60,
			'page_fullwide_max' => 1920,
			'page_fullwide_extra' => 130,
			'sidebar_width'     => 390,
			'sidebar_gap'       => 50,
			'grid_gap'          => 30,
			'rad'               => 6,
		);
		if ( empty( $name ) ) {
			return $defaults;
		} else {
			if ( empty( $value ) && isset( $defaults[ $name ] ) ) {
				$value = $defaults[ $name ];
			}
			return $value;
		}
	}
}


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)


//--------------------------------------------
// SKIN SETTINGS
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup', 1 );
	function critique_skin_setup() {
		$GLOBALS['CRITIQUE_STORAGE'] = array_merge( $GLOBALS['CRITIQUE_STORAGE'], array(
			
			'theme_pro_key'       => 'env-axiom',

			'theme_doc_url'       => '//critique.axiomthemes.com/doc',

			'theme_demofiles_url' => '//demofiles.axiomthemes.com/critique/',
			
			'theme_rate_url'      => '//themeforest.net/download',

			'theme_custom_url'    => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themeinstall',

			'theme_support_url'   => '//themerex.net/support/',

			'theme_download_url'  => '//themeforest.net/user/axiomthemes/portfolio',            

			'theme_video_url'     => '//www.youtube.com/channel/UCBjqhuwKj3MfE3B6Hg2oA8Q',

			'theme_privacy_url'   => '//axiomthemes.com/privacy-policy/',                       

			'portfolio_url'       => '//themeforest.net/user/axiomthemes/portfolio',            

			// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
			// (i.e. 'children,kindergarten')
			'theme_categories'    => '',
		) );
	}
}


// Add/remove/change Theme Settings
if ( ! function_exists( 'critique_skin_setup_settings' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_settings', 1 );
	function critique_skin_setup_settings() {
		// Example: enable (true) / disable (false) thumbs in the prev/next navigation
		critique_storage_set_array( 'settings', 'thumbs_in_navigation', true );
	}
}



//--------------------------------------------
// SKIN FONTS
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup_fonts' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_fonts', 1 );
	function critique_skin_setup_fonts() {
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder css/font-face/font-name inside the skin folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'

		$load_fonts = array(
			// Google font
			array(
				'name'   => 'D-DIN',
				'family' => 'sans-serif',
				'link'   => '',
				'styles' => '',
			),
			// Google font
			array(
				'name'   => 'Roboto',
				'family' => 'serif',
				'styles' => 'wght@400;500',     // Parameter 'style' used only for the Google fonts
			),
		);		
		critique_storage_set( 'load_fonts', $load_fonts );


		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		critique_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags.
		// Default value of 'font-family' may be specified as reference to the array $load_fonts (see above)
		// or as comma-separated string.
		// In the second case (if 'font-family' is specified manually as comma-separated string):
		//    1) Font name with spaces in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		//    2) If font-family inherit a value from the 'Main text' - specify 'inherit' as a value
		// example:
		// Correct:   'font-family' => critique_get_load_fonts_family_string( $load_fonts[0] )
		// Correct:   'font-family' => 'Roboto,sans-serif'
		// Correct:   'font-family' => '"PT Serif",sans-serif'
		// Incorrect: 'font-family' => 'Roboto, sans-serif'
		// Incorrect: 'font-family' => 'PT Serif,sans-serif'


		$font_description = esc_html__( 'Font settings for the %s of the site. To ensure that the elements scale properly on mobile devices, please use only the following units: "rem", "em" or "ex"', 'critique' );

		critique_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'main text', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[1] ), // 'Roboto, serif',
					'font-size'       => '1.2142857rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.9em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.003em',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.95em',
				),
				'post'    => array(
					'title'           => esc_html__( 'Article text', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'article text', 'critique' ) ),
					'font-family'     => '',			
					'font-size'       => '',		
					'font-weight'     => '',			
					'font-style'      => '',			
					'line-height'     => '',			
					'text-decoration' => '',	
					'text-transform'  => '',			
					'letter-spacing'  => '',			
					'margin-top'      => '',			
					'margin-bottom'   => '',			
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H1', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '50px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '50px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '0.95em',
					'margin-bottom'   => '0.36em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H2', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '35px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '38px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '1.1em',
					'margin-bottom'   => '0.65em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H3', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '32px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '32px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '1.15em',
					'margin-bottom'   => '0.7em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H4', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '26px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '28px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '0.65em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H5', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '21px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '24px', 
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '1.5em',
					'margin-bottom'   => '0.8em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H6', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '18px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '22px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.001em',
					'margin-top'      => '1.3em',
					'margin-bottom'   => '0.9em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'text of the logo', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[1] ), // 'Roboto, serif',
					'font-size'       => '1.8em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.02em',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'buttons', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '12px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '19px',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.12em',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'input fields, dropdowns and textareas', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[1] ), // 'Roboto, serif',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '21px',     // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'post meta (author, categories, publish date, counters, share, etc.)', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[1] ), // 'Roboto, serif',
					'font-size'       => '11px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '18px',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.75em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'main menu items', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[0] ), // 'D-DIN, sans-serif',
					'font-size'       => '13px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.1em',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'critique' ),
					'description'     => sprintf( $font_description, esc_html__( 'dropdown menu items', 'critique' ) ),
					'font-family'     => critique_get_load_fonts_family_string( $load_fonts[1] ), // 'Roboto, serif',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
			)
		);

		// Store new fonts parameters
		$theme_slug = get_option( 'stylesheet' );
		$mods = get_option( 'theme_mods_' . $theme_slug );
		if ( $mods ) {
			$settings = critique_unserialize($mods);	
			if ( is_array($settings) ) {	
				$updated = false;			
				$fonts = critique_get_theme_fonts();
				foreach ( $fonts as $tag => $v ) {
					foreach ( $v as $css_prop => $css_value ) {
						if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
							continue;
						}
						if ( isset( $settings[ "{$tag}_{$css_prop}" ] ) ) {
							$fonts[ $tag ][ $css_prop ] = $settings[ "{$tag}_{$css_prop}" ];
							$updated = true;	
						}
					}
				}
				if ( $updated ) {					
					critique_storage_set( 'theme_fonts', $fonts );	
				}
			}		
		}

		// Font presets
		critique_storage_set(
			'font_presets', array(
				'default' => array(
					'title'  => esc_html__( 'Default', 'critique' ),
					'load_fonts' => $load_fonts,
					'theme_fonts' => critique_storage_get('theme_fonts'),
				),
			)
		);
	}
}


//--------------------------------------------
// COLOR SCHEMES
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup_schemes' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_schemes', 1 );
	function critique_skin_setup_schemes() {

		// Theme colors for customizer
		// Attention! Inner scheme must be last in the array below
		critique_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'critique' ),
					'description' => esc_html__( 'Colors of the main content area', 'critique' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'critique' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'critique' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'critique' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'critique' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'critique' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'critique' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'critique' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'critique' ),
				),
			)
		);

		critique_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'critique' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'critique' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'critique' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'critique' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'critique' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'critique' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'critique' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'critique' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'critique' ),
					'description' => esc_html__( 'Color of the text inside this block', 'critique' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'critique' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'critique' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'critique' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'critique' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'critique' ),
					'description' => esc_html__( 'Color of the links inside this block', 'critique' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'critique' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'critique' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Accent 2', 'critique' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'critique' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Accent 2 hover', 'critique' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'critique' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Accent 3', 'critique' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'critique' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Accent 3 hover', 'critique' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'critique' ),
				),
			)
		);

		// Default values for each color scheme
		$schemes = array(

			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'critique' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#ffffff',
					'bd_color'         => '#ECF1F7',
					'bd_hover'         => '#E7EDF4',

					// Text and links colors
					'text'             => '#727E8D',
					'text_dark'        => '#090D17',
					'text_light'       => '#A6AEB9',
					'text_link'        => '#00BCF2',
					'text_hover'       => '#0094D6',
					'text_link2'       => '#0ABE3E',
					'text_hover2'      => '#00A02E',
					'text_link3'       => '#FF4500',
					'text_hover3'      => '#D62100',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#F8F8F8',
					'alter_bg_hover'   => '#EFEFEF',
					'alter_bd_color'   => '#ECF1F7',
					'alter_bd_hover'   => '#E7EDF4',
					'alter_text'       => '#727E8D',
					'alter_dark'       => '#090D17',
					'alter_light'      => '#A6AEB9',
					'alter_link'       => '#00BCF2',
					'alter_hover'      => '#0094D6',
					'alter_link2'      => '#0ABE3E',
					'alter_hover2'     => '#00A02E',
					'alter_link3'      => '#FF4500',
					'alter_hover3'     => '#D62100',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#090D17',
					'extra_bg_hover'   => '#212227',
					'extra_bd_color'   => '#222731',
					'extra_bd_hover'   => '#2B3345',					
					'extra_text'       => '#AAB3C7',
					'extra_dark'       => '#FCFCFC',
					'extra_light'      => '#A6AEB9',
					'extra_link'       => '#FCFCFC',
					'extra_hover'      => '#00BCF2',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#FFFFFF',
					'input_bg_hover'   => '#F8F7F5',
					'input_bd_color'   => '#CCCCCC',
					'input_bd_hover'   => '#E7EDF4',
					'input_text'       => '#727E8D',
					'input_dark'       => '#090D17',
					'input_light'      => '#A6AEB9',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FFFFFF',
					'inverse_bd_hover' => '#FFFFFF',
					'inverse_text'     => '#FFFFFF',
					'inverse_dark'     => '#FCFCFC',
					'inverse_light'    => '#FFFFFF',
					'inverse_link'     => '#FFFFFF',
					'inverse_hover'    => '#FFFFFF',

				),
			),

			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'critique' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#090D17',
					'bd_color'         => '#222731',
					'bd_hover'         => '#2B3345',

					// Text and links colors
					'text'             => '#AAB3C7',
					'text_dark'        => '#FCFCFC',
					'text_light'       => '#A6AEB9',
					'text_link'        => '#00BCF2',
					'text_hover'       => '#0094D6',
					'text_link2'       => '#0ABE3E',
					'text_hover2'      => '#00A02E',
					'text_link3'       => '#FF4500',
					'text_hover3'      => '#D62100',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#212227',
					'alter_bg_hover'   => '#191B1F',
					'alter_bd_color'   => '#222731',
					'alter_bd_hover'   => '#2B3345',
					'alter_text'       => '#AAB3C7',
					'alter_dark'       => '#FCFCFC',
					'alter_light'      => '#A6AEB9',
					'alter_link'       => '#00BCF2',
					'alter_hover'      => '#0094D6',
					'alter_link2'      => '#0ABE3E',
					'alter_hover2'     => '#00A02E',
					'alter_link3'      => '#FF4500',
					'alter_hover3'     => '#D62100',

					/// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#090D17',
					'extra_bg_hover'   => '#212227',
					'extra_bd_color'   => '#222731',
					'extra_bd_hover'   => '#2B3345',
					'extra_text'       => '#AAB3C7',
					'extra_dark'       => '#FCFCFC',
					'extra_light'      => '#A6AEB9',
					'extra_link'       => '#FCFCFC',
					'extra_hover'      => '#00BCF2',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#090D17',
					'input_bg_hover'   => '#212227',
					'input_bd_color'   => '#222731',
					'input_bd_hover'   => '#2B3345',
					'input_text'       => '#AAB3C7',
					'input_dark'       => '#FCFCFC',
					'input_light'      => '#A6AEB9',

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FFFFFF',
					'inverse_bd_hover' => '#FFFFFF',
					'inverse_text'     => '#FFFFFF',
					'inverse_dark'     => '#FCFCFC',
					'inverse_light'    => '#FFFFFF',
					'inverse_link'     => '#FFFFFF',
					'inverse_hover'    => '#FFFFFF',
				),
			),
		);
		critique_storage_set( 'schemes', $schemes );
		critique_storage_set( 'schemes_original', $schemes );


		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		critique_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'bd_color_05'       => array(
					'color' => 'bd_color',
					'alpha' => 0.5,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_dark_075'     => array(
					'color' => 'alter_dark',
					'alpha' => 0.75,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_002' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.02,
				),
				'extra_bg_color_015' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.15,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_bg_hover_01' => array(
					'color' => 'extra_bg_hover',
					'alpha' => 0.1,
				),				
				'extra_dark_07'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.7,
				),				
				'extra_dark_092'     => array(
					'color' => 'extra_dark',
					'alpha' => 0.92,
				),			
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_005'      => array(
					'color' => 'text_dark',
					'alpha' => 0.05,
				),
				'text_dark_01'      => array(
					'color' => 'text_dark',
					'alpha' => 0.1,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_dark_095'      => array(
					'color' => 'text_dark',
					'alpha' => 0.95,
				),
				'text_link_01'      => array(
					'color' => 'text_link',
					'alpha' => 0.1,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_hover_01'      => array(
					'color' => 'text_hover',
					'alpha' => 0.1,
				),
				'text_link3_03'      => array(
					'color' => 'text_link3',
					'alpha' => 0.3,
				),
				'text_hover3_03'      => array(
					'color' => 'text_hover3',
					'alpha' => 0.3,
				),
				'input_dark_06'      => array(
					'color' => 'input_dark',
					'alpha' => 0.6,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		critique_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
			)
		);

		// Parameters to set order of schemes in the css
		critique_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// Color presets
		critique_storage_set(
			'color_presets', array(
				'autumn' => array(
								'title'  => esc_html__( 'Autumn', 'critique' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	),
												'dark' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	)
												)
							),
				'green' => array(
								'title'  => esc_html__( 'Natural Green', 'critique' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	),
												'dark' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	)
												)
							),
			)
		);
	}
}


//--------------------------------------------
// THUMBS
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup_thumbs' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_thumbs', 1 );
	function critique_skin_setup_thumbs() {
		critique_storage_set(
			'theme_thumbs', apply_filters(
				'critique_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'critique-thumb-huge'        => array(
						'size'  => array( 1290, 616, true ),
						'title' => esc_html__( 'Huge image', 'critique' ),
						'subst' => 'trx_addons-thumb-huge',
					),

					// Image for Classic blog item
					// Height is fixed
					'critique-thumb-large'         => array(
						'size'  => array( 1080, 590, true ),
						'title' => esc_html__( 'Large image', 'critique' ),
						'subst' => 'trx_addons-thumb-large',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'critique-thumb-big'         => array(
						'size'  => array( 850, 541, true ),
						'title' => esc_html__( 'Big image', 'critique' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/2 of the content area width (without sidebar)
					// Height is fixed
					'critique-thumb-med'         => array(
						'size'  => array( 642, 491, true ),
						'title' => esc_html__( 'Medium 642x491', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Width of the image is equal to the narrow content area width (without sidebar)
					// Height is fixed
					'critique-thumb-med-1'         => array(
						'size'  => array( 630, 427, true ),
						'title' => esc_html__( 'Medium 630x427', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Width of the image is equal to the narrow content area width (without sidebar)
					// Height is fixed
					'critique-thumb-med-2'         => array(
						'size'  => array( 533, 400, true ),
						'title' => esc_html__( 'Medium 533x400', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Long width image for shortcode Categories
					// Height is fixed
					'critique-thumb-med-3'	=> array(
						'size'  => array( 410, 290, true ),
						'title' => esc_html__( 'Medium 410x290', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Long width image for shortcode Categories
					// Height is fixed
					'critique-thumb-med-4'	=> array(
						'size'  => array( 410, 430, true ),
						'title' => esc_html__( 'Medium 410x430', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Long width image for shortcode Categories
					// Height is fixed
					'critique-thumb-med-5'	=> array(
						'size'  => array( 390, 110, true ),
						'title' => esc_html__( 'Medium 390x110', 'critique' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Medium square image
					// Height is fixed
					'critique-thumb-med-square'	=> array(
						'size'  => array( 300, 300, true ),
						'title' => esc_html__( 'Medium square', 'critique' ),
						'subst' => 'trx_addons-thumb-med-square',
					),

					// Small square image (for avatars in comments, etc.)
					'critique-thumb-tiny'        => array(
						'size'  => array( 120, 120, true ),
						'title' => esc_html__( 'Small square avatar', 'critique' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Image for Masonry blog item
					'critique-thumb-masonry-huge' => array(
						'size'  => array( 1290, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Huge (scaled)', 'critique' ),
						'subst' => 'trx_addons-thumb-masonry-huge',
					),

					// Image for Masonry blog item
					'critique-thumb-masonry-large' => array(
						'size'  => array( 1080, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'critique' ),
						'subst' => 'trx_addons-thumb-masonry-large',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'critique-thumb-masonry-big' => array(
						'size'  => array( 865, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Big (scaled)', 'critique' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/2 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'critique-thumb-masonry'     => array(
						'size'  => array( 642, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'critique' ),
						'subst' => 'trx_addons-thumb-masonry',
					),

					// Image for Widget Video List (Style "Default": main image)
					'critique-thumb-w-video-def-main'         => array(
						'size'  => array( 915, 570, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-def-main',
					),

					// Image for Widget Video List (Style "Default": small image)
					'critique-thumb-w-video-def-small'         => array(
						'size'  => array( 300, 225, true ),
						'title' => esc_html__( 'Video Small', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-def-small',
					),
					// Image for Widget Video List (Style "Alter": main image)
					'critique-thumb-w-video-alter-main'         => array(
						'size'  => array( 883, 580, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-alter-main'
					),
					// Image for Widget Video List (Style "Wide": main image)
					'critique-thumb-w-video-wide-main'         => array(
						'size'  => array( 870, 610, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-wide-main'
					),
					// Image for Widget Video List (Style "Wide": small image)
					'critique-thumb-w-video-wide-small'         => array(
						'size'  => array( 405, 310, true ),
						'title' => esc_html__( 'Video Small', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-wide-small'
					),
					// Image for Widget Video List (Style "News": main image)
					'critique-thumb-w-video-news-main'         => array(
						'size'  => array( 1335, 590, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-news-main'
					),
					// Image for Widget Video List (Style "News": small image)
					'critique-thumb-w-video-news-small'         => array(
						'size'  => array( 344, 225, true ), 
						'title' => esc_html__( 'Video Small', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-news-small'
					),
					// Image for Widget Video List (Style "Standard": main image)
					'critique-thumb-w-video-standard-main'         => array(
						'size'  => array( 996, 550, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-standard-main'
					),
					// Image for Widget Video List (Style "Classic": main image)
					'critique-thumb-w-video-classic-main'         => array(
						'size'  => array( 1347, 610, true ), 
						'title' => esc_html__( 'Video Main', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-classic-main'
					),
					// Image for Widget Video List (Style "Classic": small image)
					'critique-thumb-w-video-classic-small'         => array(
						'size'  => array( 326, 230, true ), 
						'title' => esc_html__( 'Video Small', 'critique' ),
						'subst' => 'trx_addons-thumb-w-video-classic-small'
					),
					// Image for Widget About Us (Style "Default")
					'critique-thumb-about-us-def'         => array(
						'size'  => array( 160, 160, true ),
						'title' => esc_html__( 'About Us Default', 'critique' ),
						'subst' => 'trx_addons-thumb-about-us'
					),
					// Image for Widget About Us (Style "Modern")
					'critique-thumb-about-us-modern'         => array(
						'size'  => array( 446, 220, true ), 
						'title' => esc_html__( 'About Us Modern', 'critique' ),
						'subst' => 'trx_addons-thumb-about-us-modern'
					),
					// Image for Product
					'critique-thumb-product-image'         => array(
						'size'  => array( 433, 380, true ), 
						'title' => esc_html__( 'Products image', 'critique' ),
						'subst' => 'trx_addons-thumb-product'
					),
				)
			)
		);
	}
}


//--------------------------------------------
// BLOG STYLES
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup_blog_styles' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_blog_styles', 1 );
	function critique_skin_setup_blog_styles() {

		$blog_styles = array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'critique' ),
				'archive' => 'index',
				'item'    => 'templates/content-excerpt',
				'styles'  => 'excerpt',
				'icon'    => "images/theme-options/blog-style/excerpt.png",
			),
			'band'    => array(
				'title'   => esc_html__( 'Band', 'critique' ),
				'archive' => 'index',
				'item'    => 'templates/content-band',
				'styles'  => 'band',
				'icon'    => "images/theme-options/blog-style/band.png",
			),
		);
		if ( ! CRITIQUE_THEME_FREE ) {
			$blog_styles['classic-masonry']   = array(
				'title'   => esc_html__( 'Classic Masonry', 'critique' ),
				'archive' => 'index',
				'item'    => 'templates/content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => array( 'classic', 'masonry' ),
				'scripts' => 'masonry',
				'icon'    => "images/theme-options/blog-style/classic-masonry-%d.png",
				'new_row' => true,
			);
			$blog_styles['portfolio-masonry'] = array(
				'title'   => esc_html__( 'Portfolio Masonry', 'critique' ),
				'archive' => 'index',
				'item'    => 'templates/content-portfolio',
				'columns' => array( 2, 3 ),
				'styles'  => array( 'portfolio', 'masonry' ),
				'scripts' => 'masonry',
				'icon'    => "images/theme-options/blog-style/portfolio-masonry-%d.png",
				'new_row' => true,
			);
		}
		critique_storage_set( 'blog_styles', apply_filters( 'critique_filter_add_blog_styles', $blog_styles ) );
	}
}


//--------------------------------------------
// SINGLE STYLES
//--------------------------------------------
if ( ! function_exists( 'critique_skin_setup_single_styles' ) ) {
	add_action( 'after_setup_theme', 'critique_skin_setup_single_styles', 1 );
	function critique_skin_setup_single_styles() {

		critique_storage_set( 'single_styles', apply_filters( 'critique_filter_add_single_styles', array(
			'style-1'   => array(
				'title'       => esc_html__( 'Style 1', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are over the image', 'critique' ),
				'styles'      => 'style-1',
				'icon'        => "images/theme-options/single-style/style-1.png",
			),
			'style-2'   => array(
				'title'       => esc_html__( 'Style 2', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are over the image', 'critique' ),
				'styles'      => 'style-2',
				'icon'        => "images/theme-options/single-style/style-2.png",
			),
			'style-3'   => array(
				'title'       => esc_html__( 'Style 3', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are over the image', 'critique' ),
				'styles'      => 'style-3',
				'icon'        => "images/theme-options/single-style/style-3.png",
			),
			'style-4'   => array(
				'title'       => esc_html__( 'Style 4', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are inside the content area', 'critique' ),
				'styles'      => 'style-4',
				'icon'        => "images/theme-options/single-style/style-4.png",
			),
			'style-5'   => array(
				'title'       => esc_html__( 'Style 5', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are below the image', 'critique' ),
				'styles'      => 'style-5',
				'icon'        => "images/theme-options/single-style/style-5.png",
			),
			'style-6'   => array(
				'title'       => esc_html__( 'Style 6', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-6',
				'icon'        => "images/theme-options/single-style/style-6.png",
			),
			'style-7'   => array(
				'title'       => esc_html__( 'Style 7', 'critique' ),
				'description' => esc_html__( 'Boxed image, the title and meta are above the content area like two big square areas', 'critique' ),
				'styles'      => 'style-7',
				'icon'        => "images/theme-options/single-style/style-7.png",
			),
			'style-8'   => array(
				'title'       => esc_html__( 'Style 8', 'critique' ),
				'description' => esc_html__( 'Boxed image is inside the content area, the title and meta are above the content area', 'critique' ),
				'styles'      => 'style-8',
				'icon'        => "images/theme-options/single-style/style-8.png",
			),
			'style-9'   => array(
				'title'       => esc_html__( 'Style 9', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-9',
				'icon'        => "images/theme-options/single-style/style-9.png",
			),
			'style-10'   => array(
				'title'       => esc_html__( 'Style 10', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are inside the content area', 'critique' ),
				'styles'      => 'style-10',
				'icon'        => "images/theme-options/single-style/style-10.png",
			),
			'style-11'   => array(
				'title'       => esc_html__( 'Style 11', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-11',
				'icon'        => "images/theme-options/single-style/style-11.png",
			),
			'style-12'   => array(
				'title'       => esc_html__( 'Style 12', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-12',
				'icon'        => "images/theme-options/single-style/style-12.png",
			),
			'style-13'   => array(
				'title'       => esc_html__( 'Style 13', 'critique' ),
				'description' => esc_html__( 'Boxed image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-13',
				'icon'        => "images/theme-options/single-style/style-13.png",
			),
			'style-14'   => array(
				'title'       => esc_html__( 'Style 14', 'critique' ),
				'description' => esc_html__( 'Fullwidth image is above the content area, the title and meta are above the image', 'critique' ),
				'styles'      => 'style-14',
				'icon'        => "images/theme-options/single-style/style-14.png",
			),
			'style-15'   => array(
				'title'       => esc_html__( 'Style 15', 'critique' ),
				'description' => esc_html__( 'Featured image is hidden', 'critique' ),
				'styles'      => 'style-15',
				'icon'        => "images/theme-options/single-style/style-15.png",
			)
		) ) );
	}
}
