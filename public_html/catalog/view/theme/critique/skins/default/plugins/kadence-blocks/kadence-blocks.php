<?php

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'critique_kadence_blocks_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'critique_kadence_blocks_theme_setup9', 9 );
    function critique_kadence_blocks_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'critique_filter_tgmpa_required_plugins', 'critique_kadence_blocks_tgmpa_required_plugins' );
        }
        
        if ( critique_is_off( critique_get_theme_option( 'debug_mode' ) ) ) {
            remove_action( 'critique_filter_merge_styles_responsive', 'critique_gutenberg_merge_styles_responsive' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'critique_kadence_blocks_tgmpa_required_plugins' ) ) {    
    function critique_kadence_blocks_tgmpa_required_plugins( $list = array() ) {
        if ( critique_storage_isset( 'required_plugins', 'kadence-blocks' ) && critique_storage_get_array( 'required_plugins', 'kadence-blocks', 'install' ) !== false ) {
            $list[] = array(
                'name'     => critique_storage_get_array( 'required_plugins', 'kadence-blocks', 'title' ),
                'slug'     => 'kadence-blocks',
                'required' => false,
            );
        }
        return $list;
    }
}

// Check if plugin installed and activated
if ( ! function_exists( 'critique_exists_kadenc_blocks' ) ) {
    function critique_exists_kadence_blocks() {
        return function_exists('kadence_blocks_init') && class_exists('Kadence_Blocks_Frontend');
    }
}

// Remove Kadence Blocks plugin styles
if ( ! function_exists( 'critique_kadence_blocks_frontend_scripts' ) ) {
    add_action( 'get_footer', 'critique_kadence_blocks_frontend_scripts' );
    function critique_kadence_blocks_frontend_scripts() {
        if ( critique_exists_kadence_blocks() && critique_elm_is_elementor_page() ) {
            if ( wp_style_is('kadence-blocks-rowlayout') ) {
                wp_dequeue_style( 'kadence-blocks-rowlayout' );
            }
            if ( wp_style_is('kadence-blocks-gallery') ) {
                wp_dequeue_style( 'kadence-blocks-gallery' );
            }
            if ( wp_style_is('kadence-blocks-spacer') ) {
                wp_dequeue_style( 'kadence-blocks-spacer' );
            }
        } 
    }
}

// Previous posts loading
if ( ! function_exists( 'critique_kadence_blocks_prev_post_loading' ) ) {
    add_action( 'wp_ajax_critique_skin_prev_post_loading', 'critique_kadence_blocks_prev_post_loading' );
    add_action( 'wp_ajax_nopriv_critique_skin_prev_post_loading', 'critique_kadence_blocks_prev_post_loading' );
    function critique_kadence_blocks_prev_post_loading() {
        critique_verify_nonce();
        $response = '';
        if ( critique_exists_kadence_blocks() ) {
            $post_id = critique_get_value_gp( 'post_id' );
            if ( !empty($post_id) ) {
                global $post;
                $post = get_post( $post_id );
                setup_postdata( $post );
                critique_kadence_blocks_frontend_inline_css();
                wp_reset_postdata();    
            }
        }
        critique_ajax_response( $response );
    }
}

// Outputs extra css for blocks
if ( ! function_exists( 'critique_kadence_blocks_frontend_inline_css' ) ) {
     function critique_kadence_blocks_frontend_inline_css() {
        if ( critique_exists_kadence_blocks() ) {
            if ( function_exists( 'has_blocks' ) && has_blocks( get_the_ID() ) ) {
                global $post;
                if ( ! is_object( $post ) ) {
                    return;
                }
                $kadence = new Kadence_Blocks_Frontend();
                $blocks = $kadence->kadence_parse_blocks( $post->post_content );
                if ( ! is_array( $blocks ) || empty( $blocks ) ) {
                    return;
                }
                foreach ( $blocks as $indexkey => $block ) {
                    if ( ! is_object( $block ) && is_array( $block ) && isset( $block['blockName'] ) ) {
                        if ( 'kadence/rowlayout' === $block['blockName'] ) {
                            if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
                                $blockattr = $block['attrs'];
                                critique_kadence_blocks_render_row_layout_css_head( $blockattr );
                            }
                        }
                        if ( 'kadence/column' === $block['blockName'] ) {
                            if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
                                $blockattr = $block['attrs'];
                                critique_kadence_blocks_render_column_layout_css_head( $blockattr );
                            }
                        }
                        if ( 'kadence/advancedgallery' === $block['blockName'] ) {
                            if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
                                $blockattr = $block['attrs'];
                                critique_kadence_blocks_render_advancedgallery_css_head( $blockattr );
                            }
                        }
                        if ( 'core/block' === $block['blockName'] ) {
                            if ( isset( $block['attrs'] ) && is_array( $block['attrs'] ) ) {
                                $blockattr = $block['attrs'];
                                if ( isset( $blockattr['ref'] ) ) {
                                    $reusable_block = get_post( $blockattr['ref'] );
                                    if ( $reusable_block && 'wp_block' == $reusable_block->post_type ) {
                                        $reuse_data_block = $kadence->kadence_parse_blocks( $reusable_block->post_content );
                                        critique_kadence_blocks_blocks_cycle_through( $reuse_data_block );
                                    }
                                }
                            }
                        }
                        if ( isset( $block['innerBlocks'] ) && ! empty( $block['innerBlocks'] ) && is_array( $block['innerBlocks'] ) ) {
                            critique_kadence_blocks_blocks_cycle_through( $block['innerBlocks'] );
                        }
                    }
                }
            }
        }
    }
}

// Builds css for inner blocks
if ( ! function_exists( 'critique_kadence_blocks_blocks_cycle_through' ) ) {
    function critique_kadence_blocks_blocks_cycle_through( $inner_blocks ) { 
        foreach ( $inner_blocks as $in_indexkey => $inner_block ) {
            if ( ! is_object( $inner_block ) && is_array( $inner_block ) && isset( $inner_block['blockName'] ) ) {          
                $kadence = new Kadence_Blocks_Frontend();
                if ( 'kadence/rowlayout' === $inner_block['blockName'] ) {
                    if ( isset( $inner_block['attrs'] ) && is_array( $inner_block['attrs'] ) ) {
                        $blockattr = $inner_block['attrs'];
                        critique_kadence_blocks_render_row_layout_css_head( $blockattr );
                    }
                }
                if ( 'kadence/column' === $inner_block['blockName'] ) {
                    if ( isset( $inner_block['attrs'] ) && is_array( $inner_block['attrs'] ) ) {
                        $blockattr = $inner_block['attrs'];
                        critique_kadence_blocks_render_column_layout_css_head( $blockattr );
                    }
                }
                if ( 'kadence/advancedgallery' === $inner_block['blockName'] ) { 
                    if ( isset( $inner_block['attrs'] ) && is_array( $inner_block['attrs'] ) ) {
                        $blockattr = $inner_block['attrs'];
                        critique_kadence_blocks_render_advancedgallery_css_head( $blockattr );
                    }
                }
                if ( 'core/block' === $inner_block['blockName'] ) {
                    if ( isset( $inner_block['attrs'] ) && is_array( $inner_block['attrs'] ) ) {
                        $blockattr = $inner_block['attrs'];
                        if ( isset( $blockattr['ref'] ) ) {
                            $reusable_block = get_post( $blockattr['ref'] );
                            if ( $reusable_block && 'wp_block' == $reusable_block->post_type ) {
                                $reuse_data_block = $kadence->kadence_parse_blocks( $reusable_block->post_content );
                                critique_kadence_blocks_blocks_cycle_through( $reuse_data_block );
                            }
                        }
                    }
                }
                if ( isset( $inner_block['innerBlocks'] ) && ! empty( $inner_block['innerBlocks'] ) && is_array( $inner_block['innerBlocks'] ) ) {
                    critique_kadence_blocks_blocks_cycle_through( $inner_block['innerBlocks'] );
                }
            }
        }
    }
}

// Render Inline CSS helper function
if ( ! function_exists( 'critique_kadence_blocks_render_inline_css' ) ) {
    function critique_kadence_blocks_render_inline_css( $css, $style_id, $in_content = false ) {
        if ( critique_exists_kadence_blocks() ) {
            wp_register_style( $style_id, false );
            wp_enqueue_style( $style_id );
            wp_add_inline_style( $style_id, $css );
            wp_print_styles( $style_id );       
        }
    }
}

// Render Row Block CSS In Head
if ( ! function_exists( 'critique_kadence_blocks_render_row_layout_css_head' ) ) {
    function critique_kadence_blocks_render_row_layout_css_head( $attributes ) {
        if ( ! wp_style_is( 'kadence-blocks-rowlayout', 'enqueued' ) ) {
            wp_enqueue_style( 'kadence-blocks-rowlayout' );
        }
        if ( isset( $attributes['uniqueID'] ) ) {
            $unique_id = $attributes['uniqueID'];
            $style_id  = 'kt-blocks' . esc_attr( $unique_id );
            if ( ! wp_style_is( $style_id, 'enqueued' ) && apply_filters( 'kadence_blocks_render_inline_css', true, 'rowlayout', $unique_id ) ) {
                $kadence = new Kadence_Blocks_Frontend();
                $css = $kadence->row_layout_array_css( $attributes, $unique_id );
                if ( ! empty( $css ) ) {
                    $css = apply_filters( 'as3cf_filter_post_local_to_provider', $css );
                    critique_kadence_blocks_render_inline_css( $css, $style_id );
                }
            }
        }
    }
}

// Render Column Block CSS Head
if ( ! function_exists( 'critique_kadence_blocks_render_column_layout_css_head' ) ) {
    function critique_kadence_blocks_render_column_layout_css_head( $attributes ) {
        if ( isset( $attributes['uniqueID'] ) && ! empty( $attributes['uniqueID'] ) ) {
            $unique_id = $attributes['uniqueID'];
            $style_id = 'kt-blocks' . esc_attr( $unique_id );
            if ( ! wp_style_is( $style_id, 'enqueued' ) && apply_filters( 'kadence_blocks_render_inline_css', true, 'column', $unique_id ) ) {
                $kadence = new Kadence_Blocks_Frontend();
                $css = $kadence->column_layout_css( $attributes, $unique_id );
                if ( ! empty( $css ) ) {
                    $css = apply_filters( 'as3cf_filter_post_local_to_provider', $css );
                    critique_kadence_blocks_render_inline_css( $css, $style_id );
                }
            }
        }
    }
}

// Render Gallery CSS in Head
if ( ! function_exists( 'critique_kadence_blocks_render_advancedgallery_css_head' ) ) {
    function critique_kadence_blocks_render_advancedgallery_css_head( $attributes ) {
        if ( ! wp_style_is( 'kadence-blocks-gallery', 'enqueued' ) ) {
            wp_enqueue_style( 'kadence-blocks-gallery' );
        }
        if ( isset( $attributes['uniqueID'] ) ) {
            $unique_id = $attributes['uniqueID'];
            $style_id  = 'kt-blocks' . esc_attr( $unique_id );
            if ( ! wp_style_is( $style_id, 'enqueued' ) && apply_filters( 'kadence_blocks_render_inline_css', true, 'advancedgallery', $unique_id ) ) {
                $kadence = new Kadence_Blocks_Frontend();
                $css = $kadence->blocks_advancedgallery_array( $attributes, $unique_id );
                if ( ! empty( $css ) ) {
                    critique_kadence_blocks_render_inline_css( $css, $style_id );
                }
            }
        }
    }
}

// Enqueue styles for frontend
if ( ! function_exists( 'critique_gutenberg_frontend_scripts' ) ) {
    add_action( 'wp_enqueue_scripts', 'critique_gutenberg_frontend_scripts', 1100 );
    function critique_gutenberg_frontend_scripts() {
        // Kadence Blocks
        if ( critique_exists_kadence_blocks() && 'article' == critique_get_theme_option( 'posts_navigation_scroll_which_block' ) && is_singular('post') ) {         
            if (!wp_style_is('kadence-blocks-rowlayout')) {
                wp_enqueue_style( 'kadence-blocks-rowlayout', KADENCE_BLOCKS_URL . 'dist/blocks/row.style.build.css', array(), KADENCE_BLOCKS_VERSION );
            }
            if (!wp_style_is('kadence-blocks-gallery')) {
                wp_enqueue_style( 'kadence-blocks-gallery', KADENCE_BLOCKS_URL . 'dist/blocks/gallery.style.build.css', array(), KADENCE_BLOCKS_VERSION );
            }
            if (!wp_script_is('kadence-blocks-rowlayout')) {
                wp_enqueue_script( 'kadence-blocks-gallery-magnific-init', KADENCE_BLOCKS_URL . 'dist/kb-gallery-magnific-init.js', array( 'jquery', 'magnific-popup' ), KADENCE_BLOCKS_VERSION, true );
            }       
        }
    }
}
