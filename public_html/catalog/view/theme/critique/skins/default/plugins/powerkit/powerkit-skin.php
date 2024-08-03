<?php
/* Powerkit support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_skin_powerkit_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'critique_skin_powerkit_theme_setup9', 9 );
    function critique_skin_powerkit_theme_setup9() {
        if ( critique_exists_powerkit() ) {
            add_action( 'wp_enqueue_scripts', 'critique_powerkit_frontend_scripts', 1100 );
            add_filter( 'critique_filter_merge_styles', 'critique_powerkit_merge_styles' );
        }
    }
}

// Set plugin's specific importer options
if ( !function_exists( 'critique_exists_powerkit_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'critique_exists_powerkit_importer_set_options' );
    function critique_exists_powerkit_importer_set_options($options=array()) {   
        if ( critique_exists_powerkit() && in_array('accelerated-mobile-pages', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'powerkit_%';                   
        }
        return $options;
    }
}

// Video cover image size
if ( ! function_exists( 'critique_powerkit_social_links_color_schemes' ) ) {
    add_filter( 'powerkit_social_links_color_schemes', 'critique_powerkit_social_links_color_schemes' );
    function critique_powerkit_social_links_color_schemes($schemes) {    
        $schemes = array(
            'default'         => array(
                'name' => esc_html__('Default', 'critique')
            ),
            'rounded'         => array(
                'name' => esc_html__('Rounded', 'critique')
            ),
            'rounded_border'         => array(
                'name' => esc_html__('Rounded with border', 'critique')
            ),
            'square'         => array(
                'name' => esc_html__('Square', 'critique')
            ),
            'square_border'         => array(
                'name' => esc_html__('Square with border', 'critique')
            ),
        );
        return $schemes;
    }
}

// Twitter avatar
if ( ! function_exists( 'critique_powerkit_lazy_process_images' ) ) {
    add_filter( 'powerkit_lazy_process_images', 'critique_powerkit_lazy_process_images', 20 );
    function critique_powerkit_lazy_process_images($image_avatar) {  
        $image_avatar = str_replace('_normal', '', $image_avatar);
        return $image_avatar;
    }
}


// Change thumb size for Author Widget (Powerkit)
if ( ! function_exists( 'critique_powerkit_widget_author_avatar_size' ) ) {
    add_filter( 'powerkit_widget_author_avatar_size', 'critique_powerkit_widget_author_avatar_size');
    function critique_powerkit_widget_author_avatar_size() {
        return '410';
    }
}

// Change title tag for Author Widget (Powerkit)
if ( ! function_exists( 'critique_powerkit_widget_author_title_tag' ) ) {
    add_filter( 'powerkit_widget_author_title_tag', 'critique_powerkit_widget_author_title_tag');
    function critique_powerkit_widget_author_title_tag() {
        return 'h4';
    }
}

// Enqueue custom scripts
if ( ! function_exists( 'critique_powerkit_frontend_scripts' ) ) {
    //Handler of the add_action( 'wp_enqueue_scripts', 'critique_powerkit_frontend_scripts', 1100 );
    function critique_powerkit_frontend_scripts( $force = false ) {
        static $loaded = false;
        if ( ! $loaded ) {
            $loaded = true;
            $critique_url = critique_get_file_url( 'plugins/powerkit/powerkit.css' );
            if ( '' != $critique_url ) {
                wp_enqueue_style( 'critique-powerkit', $critique_url, array(), null );
            }
        }
    }
}

// Merge custom styles
if ( ! function_exists( 'critique_powerkit_merge_styles' ) ) {
    add_filter('critique_filter_merge_styles', 'critique_powerkit_merge_styles');
    function critique_powerkit_merge_styles( $list ) {
        $list[] = 'plugins/powerkit/powerkit.css';
        return $list;
    }
}