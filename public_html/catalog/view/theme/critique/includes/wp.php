<?php
/**
 * WP tags and utils
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Theme init
if ( ! function_exists( 'critique_wp_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'critique_wp_theme_setup' );
	function critique_wp_theme_setup() {

		// Remove macros from title
		add_filter( 'wp_title', 'critique_remove_macros_from_site_title' );
		add_filter( 'wp_title_parts', 'critique_remove_macros_from_site_title' );
		add_filter( 'document_title_parts', 'critique_remove_macros_from_site_title' );

		// Breadcrumbs link 'All posts'
		add_filter( 'post_type_archive_link', 'critique_get_template_page_link', 10, 2 );
	}
}


// Check if current page is a PageBuilder preview mode
if ( ! function_exists( 'critique_is_preview' ) ) {
	function critique_is_preview( $builder = 'any' ) {
		return ( in_array( $builder, array( 'any', 'elm', 'elementor' ) ) && function_exists( 'critique_elementor_is_preview' ) && critique_elementor_is_preview() )
				||
				( in_array( $builder, array( 'any', 'gb', 'gutenberg' ) ) && function_exists( 'critique_gutenberg_is_preview' ) && critique_gutenberg_is_preview() );
	}
}


/* Blog utilities
-------------------------------------------------------------------------------- */

// Detect current blog mode to get correspond options (front|home|post|page|category|tag|author|search|blog|...)
if ( ! function_exists( 'critique_detect_blog_mode' ) ) {
	function critique_detect_blog_mode() {
		if ( is_front_page() && ! is_home() ) {
			$mode = 'front';
		} elseif ( is_home() ) {
			$mode = 'home';     // Specify 'blog' if you don't need a separate options for the homepage
		} elseif ( is_single() ) {
			$mode = 'post';
		} elseif ( is_page() && ! critique_storage_isset( 'blog_archive' ) ) {
			$mode = 'page';
		} elseif ( is_category() ) {
			$mode = 'category';
		} elseif ( is_tag() ) {
			$mode = 'tag';
		} elseif ( is_author() ) {
			$mode = 'author';
		} elseif ( is_search() ) {
			$mode = 'search';
		} else {
			$mode = 'blog';
		}
		return apply_filters( 'critique_filter_detect_blog_mode', $mode );
	}
}

// Return true if 'blog_mode' is custom (not one of front|home|post|page|category|tag|author|search|blog)
if ( ! function_exists( 'critique_is_blog_mode_custom' ) ) {
	function critique_is_blog_mode_custom() {
		return ! in_array( critique_storage_get( 'blog_mode' ), apply_filters( 'critique_filter_blog_mode_standard', array(
					'front', 'home', 'post', 'page', 'category', 'tag', 'author', 'search', 'blog'
				) ) );

	}
}

// Return image of current post/page/category/blog mode
if ( ! function_exists( 'critique_get_current_mode_image' ) ) {
	function critique_get_current_mode_image( $default = '' ) {
		if ( is_category() ) {
			$img = critique_get_term_image();
			if ( '' != $img ) {
				$default = $img;
			}
		} elseif ( is_singular() || critique_storage_isset( 'blog_archive' ) ) {
			if ( has_post_thumbnail() ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if ( ! empty( $img[0] ) ) {
					$default = $img[0];
				}
			} else {
				$default = '';
			}
		}
		return $default;
	}
}

// Start blog archive template
if ( ! function_exists( 'critique_blog_archive_start' ) ) {
	function critique_blog_archive_start() {
		$main_post = critique_storage_get( 'blog_archive_template_post' );
		if ( is_object( $main_post ) ) {
			// Prepare post with template content
			$GLOBALS['post'] = $main_post;
			setup_postdata( $main_post );
			// Get template content
			$critique_content            = '';
			$critique_blog_archive_mask  = '%%CONTENT%%';
			$critique_blog_archive_subst = sprintf( '<div class="blog_archive">%s</div>', $critique_blog_archive_mask );
			$critique_content            = apply_filters( 'the_content', get_the_content() );
			// Destroy sc parameters from the content of the template
			set_query_var( 'critique_template_args', false );
			// Display parts of the template
			if ( '' != $critique_content ) {
				$critique_pos = stripos( $critique_content, $critique_blog_archive_mask );
				if ( false !== $critique_pos ) {
					$critique_content = preg_replace( '/(\<p\>\s*)?' . $critique_blog_archive_mask . '(\s*\<\/p\>)/i', $critique_blog_archive_subst, $critique_content );
				} else {
					$critique_content .= $critique_blog_archive_subst;
				}
				$critique_content = explode( $critique_blog_archive_mask, $critique_content );
				// Display first part
				critique_show_layout( apply_filters( 'critique_filter_blog_archive_start', $critique_content[0] ) );
				// And store second part
				critique_storage_set( 'blog_archive_end', $critique_content[1] );
			}
			// Restore current post data
			wp_reset_postdata();
		}
		// Destroy sc parameters from the content of the template
		set_query_var( 'critique_template_args', false );
	}
}

// End blog archive template
if ( ! function_exists( 'critique_blog_archive_end' ) ) {
	function critique_blog_archive_end() {
		$html = critique_storage_get( 'blog_archive_end' );
		if ( '' != $html ) {
			// Display second part of template content
			critique_show_layout( apply_filters( 'critique_filter_blog_archive_end', $html ) );
		}
	}
}

// Return name of the archive template for current blog style
if ( ! function_exists( 'critique_blog_archive_get_template' ) ) {
	function critique_blog_archive_get_template( $blog_style = '' ) {
		if ( empty( $blog_style ) ) {
			$blog_style = critique_get_theme_option( 'blog_style' );
		}
		$parts   = explode( '_', $blog_style );
		$archive = 'index';
		if ( critique_storage_isset( 'blog_styles', $parts[0], 'archive' ) ) {
			$archive = critique_storage_get_array( 'blog_styles', $parts[0], 'archive' );
		}
		return apply_filters( 'critique_filter_blog_archive_template', $archive, $blog_style );
	}
}

// Return name of the item template for current blog style
if ( ! function_exists( 'critique_blog_item_get_template' ) ) {
	function critique_blog_item_get_template( $blog_style = '' ) {
		if ( empty( $blog_style ) ) {
			$blog_style = critique_get_theme_option( 'blog_style' );
		}
		$parts = explode( '_', $blog_style );
		$item  = '';
		if ( strpos( $parts[0], 'blog-custom-' ) === 0 ) {
			$item = 'templates/content-custom';
		} elseif ( critique_storage_isset( 'blog_styles', $parts[0], 'item' ) ) {
			$item = critique_storage_get_array( 'blog_styles', $parts[0], 'item' );
		} else {
			$item = "templates/content-{$parts[0]}";
		}
		return $item;
	}
}


// Return ID of the post/page
if ( ! function_exists( 'critique_get_post_id' ) ) {
	function critique_get_post_id( $args = array() ) {
		$args  = array_merge(
			array(
				'posts_per_page' => 1,
			), $args
		);
		$id    = 0;
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			$id = ! empty( $query->posts[0]->ID )
				? $query->posts[0]->ID
				: ( ! empty( $query->post->ID )
					? $query->post->ID
					: 0
					);
		}
		return $id;
	}
}


// Return full content of the post/page
if ( ! function_exists( 'critique_get_post_content' ) ) {
	function critique_get_post_content( $apply_filters = false ) {
		global $post;
		$content = ! empty( $post->post_content ) ? $post->post_content : '';
		return $apply_filters ? apply_filters( 'the_content', $content ) : $content;
	}
}


// Prepare post content in the blog posts instead 'the_content' filter
// to avoid conflicts with Gutenberg
if ( ! function_exists( 'critique_filter_post_content' ) ) {
	function critique_filter_post_content( $content ) {
		$content = apply_filters( 'critique_filter_post_content', $content );
		global $wp_embed;
		if ( is_object( $wp_embed ) ) {
			$content = $wp_embed->autoembed( $content );
		}
		return do_shortcode( $content );
	}
}

// Return ID for the page with specified template
if ( ! function_exists( 'critique_get_template_page_id' ) ) {
	function critique_get_template_page_id( $args = array() ) {
		$args   = array_merge(
			array(
				'template'   => 'blog.php',
				'post_type'  => 'post',
				'parent_cat' => '',
			), $args
		);
		$q_args = array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'orderby'        => 'id',
			'order'          => 'asc',
			'meta_query'     => array( 'relation' => 'AND' ),
		);
		if ( ! empty( $args['template'] ) ) {
			$q_args['meta_query'][] = array(
				'key'     => '_wp_page_template',
				'value'   => $args['template'],
				'compare' => '=',
			);
		}
		if ( ! empty( $args['post_type'] ) ) {
			$q_args['meta_query'][] = array(
				'key'     => 'critique_options_post_type',
				'value'   => $args['post_type'],
				'compare' => '=',
			);
		}
		if ( '' !== $args['parent_cat'] ) {
			$q_args['meta_query'][] = array(
				'key'     => 'critique_options_parent_cat',
				'value'   => $args['parent_cat'] > 0 ? $args['parent_cat'] : 1,
				'compare' => $args['parent_cat'] > 0 ? '=' : '<',
			);
		}
		return critique_get_post_id( $q_args );
	}
}

// Return link to the page with theme specific $post_type archive template page:
// page_template == blog.php and 'post_type'== $post_type and 'parent_cat' == 0
if ( ! function_exists( 'critique_get_template_page_link' ) ) {
	//Handler of the add_filter('post_type_archive_link', 'critique_get_template_page_link', 10, 2 );
	function critique_get_template_page_link( $link = '', $post_type = '' ) {
		if ( ! empty( $post_type ) ) {
			$id = critique_get_template_page_id(
				array(
					'post_type'  => $post_type,
					'parent_cat' => 0,
				)
			);
			if ( $id > 0 ) {
				$link = get_permalink( $id );
			}
		}
		return $link;
	}
}

// Change standard archive template to the custom page
if ( ! function_exists( 'critique_get_posts_archive_template' ) ) {
	add_filter( 'archive_template', 'critique_get_posts_archive_template', 100 );
	function critique_get_posts_archive_template( $template ) {
		if ( critique_get_theme_option( 'use_blog_archive_pages' ) ) {
			if ( is_post_type_archive() ) {
				$obj = get_queried_object();
				if ( ! empty( $obj->name ) ) {
					$templates = get_option( 'critique_blog_archive_templates' );
					if ( ! empty( $templates[ $obj->name ] ) ) {
						$template = critique_redirect_to_archive_template( $template, $templates[ $obj->name ] );
					}
				}
			} else {
				$template = critique_get_tax_archive_template( $template );
			}
		}
		return $template;
	}	
}

// Change standard taxonomy template to the custom page
if ( ! function_exists( 'critique_get_tax_archive_template' ) ) {
	add_filter( 'category_template', 'critique_get_tax_archive_template', 100 );
	add_filter( 'taxonomy_template', 'critique_get_tax_archive_template', 100 );
	function critique_get_tax_archive_template( $template ) {
		if ( critique_get_theme_option( 'use_blog_archive_pages' ) && ( is_category() || is_tag() || is_tax() ) ) {
			$obj = get_queried_object();
			global $wp_query;
			$tax  = ! empty( $obj->taxonomy ) ? $obj->taxonomy : '';
			$term = ! empty( $obj->term_id ) ? $obj->term_id : '';
			$pt   = ! empty( $wp_query->posts[0]->post_type ) ? $wp_query->posts[0]->post_type : '';
			if ( $pt && $tax && $term ) {
				$pt_tax  = critique_get_post_type_taxonomy( $pt );
				if ( $pt_tax == $tax ) {
					$templates = get_option( 'critique_blog_archive_templates' );
					if ( ! empty( $templates[ "{$pt}_{$tax}_{$term}" ] ) ) {
						$template = critique_redirect_to_archive_template( $template, $templates[ "{$pt}_{$tax}_{$term}" ] );
					} else {
						$found = false;
						do {
							$parent = isset( $obj->parent ) 
											? $obj->parent
											: ( isset( $obj->category_parent ) 
												? $obj->category_parent
												: 0 );
							if ( ! empty( $templates[ "{$pt}_{$tax}_{$parent}" ] ) ) {
								$template = critique_redirect_to_archive_template( $template, $templates[ "{$pt}_{$tax}_{$parent}" ], $term );
								$found = true;
								break;
							} else {
								$obj = get_term_by( 'id', $parent, $tax, OBJECT );
							}
						} while ( $parent > 0 );
						if ( ! $found && ! empty( $templates[ "{$pt}" ] ) ) {
							$template = critique_redirect_to_archive_template( $template, $templates[ "{$pt}" ], $term );
						}
					}
				}
			}
		}
		return $template;
	}	
}

// Redirect to the template
if ( ! function_exists( 'critique_redirect_to_archive_template' ) ) {
	function critique_redirect_to_archive_template( $template, $page_id, $term = false ) {
		// Store page number
		$page_number = is_paged()
							? ( get_query_var( 'paged' ) 
								? get_query_var( 'paged' ) 
								: ( get_query_var( 'page' ) 
									? get_query_var( 'page' ) 
									: 1 
									)
								)
							: 1;
		// Make new query
		$GLOBALS['wp_query'] = new WP_Query( array(
												'p' => $page_id,
												'post_type' => 'page'
												)
											);
		wp_reset_postdata();
		set_query_var( 'page_number', $page_number );
		// Load page options
		critique_override_theme_options( null, $page_id );
		// Override parent category
		if ( $term > 0 ) {
			critique_storage_set_array( 'options_meta', 'parent_cat', $term );
		}
		return critique_get_file_dir( 'blog.php' );
	}
}

// Add page to templates
if ( ! function_exists( 'critique_save_archive_template' ) ) {
	add_action( 'save_post', 'critique_save_archive_template', 11 );
	function critique_save_archive_template( $post_id ) {
		// verify nonce
		if ( ! wp_verify_nonce( critique_get_value_gp( 'override_options_nonce' ), admin_url() ) ) {
			return $post_id;
		}

		// check autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		$post_type = wp_kses_data( wp_unslash( isset( $_POST['override_options_post_type'] ) ? $_POST['override_options_post_type'] : $_POST['post_type'] ) );

		// Check permissions
		$capability = 'page';
		$post_types = get_post_types( array( 'name' => $post_type ), 'objects' );
		if ( ! empty( $post_types ) && is_array( $post_types ) ) {
			foreach ( $post_types as $type ) {
				$capability = $type->capability_type;
				break;
			}
		}
		if ( ! current_user_can( 'edit_' . ( $capability ), $post_id ) ) {
			return $post_id;
		}

		// Save separate meta options to search template pages
		if ( 'page' == $post_type ) {
			$meta = get_post_meta( $post_id, 'critique_options', true );
			$page_template = isset( $_POST['page_template'] )
								? wp_kses_data( wp_unslash( $_POST['page_template'] ) )
								: get_post_meta( $post_id, '_wp_page_template', true );
			$templates = get_option( 'critique_blog_archive_templates' );
			if ( ! is_array( $templates ) ) {
				$templates = array();
			}
			if ( 'blog.php' == $page_template ) {
				$pt   = isset( $meta['post_type'] ) ? $meta['post_type'] : 'post';
				$tax  = critique_get_post_type_taxonomy( $pt );
				$term = isset( $meta['parent_cat'] ) ? $meta['parent_cat'] : 0;
				$templates = critique_array_delete_by_value( $templates, $post_id );
				$templates[ $pt . ( $term > 0 ? "_{$tax}_{$term}" : '' ) ] = $post_id;
			} else {
				$templates = critique_array_delete_by_value( $templates, $post_id );
			}
			update_option( 'critique_blog_archive_templates', $templates );
		}
	}
}

// Delete page from templates
if ( ! function_exists( 'critique_delete_archive_template' ) ) {
	add_action( 'delete_post', 'critique_delete_archive_template', 11 );
	function critique_delete_archive_template( $post_id ) {
		$templates = get_option( 'critique_blog_archive_templates' );
		if ( is_array( $templates ) ) {
			$templates = critique_array_delete_by_value( $templates, $post_id );
			update_option( 'critique_blog_archive_templates', $templates );
		}
	}
}

// Return current site protocol
if ( ! function_exists( 'critique_get_protocol' ) ) {
	function critique_get_protocol( $suffix=false ) {
		return ( is_ssl() ? 'https' : 'http' ) . ( ! empty( $suffix ) ? ':' : '' );
	}
}

// Return internal page link - if is customize mode - full url else only hash part
if ( ! function_exists( 'critique_get_hash_link' ) ) {
	function critique_get_hash_link( $hash ) {
		if ( 0 !== strpos( $hash, 'http' ) ) {
			if ( '#' != $hash[0] ) {
				$hash = '#' . $hash;
			}
			if ( is_customize_preview() ) {
				$url = critique_get_current_url();
				$pos = strpos( $url, '#' );
				if ( false !== $pos ) {
					$url = substr( $url, 0, $pos );
				}
				$hash = $url . $hash;
			}
		}
		return $hash;
	}
}

// Return URL to the current page
if ( ! function_exists( 'critique_get_current_url' ) ) {
	function critique_get_current_url() {
		return add_query_arg( array() );
	}
}

// Check if URL contain specified string
if ( ! function_exists( 'critique_check_url' ) ) {
	function critique_check_url( $val = '', $defa = false ) {
		if ( ! is_array( $val ) ) {
			$val = array( $val );
		}
		$rez = false;
		$url = critique_get_current_url();
		foreach	( $val as $s ) {
			$rez = false !== strpos( $url, $s );
			if ( $rez ) {
				break;
			}
		}
		return $rez;
	}
}

// Return attachment id by url
if ( ! function_exists( 'critique_attachment_url_to_postid' ) ) {
	function critique_attachment_url_to_postid( $url ) {
		static $images = array();
		if ( ! isset( $images[ $url ] ) ) {
			$images[ $url ] = attachment_url_to_postid( critique_clear_thumb_size( $url, false ) );
		}
		return $images[ $url ];
	}
}

// Remove macros from the title
if ( ! function_exists( 'critique_remove_macros_from_site_title' ) ) {
	// Handler of the add_filter( 'wp_title', 'critique_remove_macros_from_site_title');
	// Handler of the add_filter( 'wp_title_parts', 'critique_remove_macros_from_site_title');
	// Handler of the add_filter( 'document_title_parts', 'critique_remove_macros_from_site_title');
	function critique_remove_macros_from_site_title( $title ) {
		if ( is_array( $title ) ) {
			foreach ( $title as $k => $v ) {
				$title[ $k ] = critique_remove_macros( $v );
			}
		} else {
			$title = critique_remove_macros( $title );
		}
		return $title;
	}
}

// Return blog title
if ( ! function_exists( 'critique_get_blog_title' ) ) {
	function critique_get_blog_title() {

		if ( is_front_page() ) {
			$title = esc_html__( 'Home', 'critique' );
		} elseif ( is_home() ) {
			$title = esc_html__( 'All Posts', 'critique' );
		} elseif ( is_author() ) {
			$curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
			// Translators: Add the author's name to the title
			$title = sprintf( esc_html__( 'Author page: %s', 'critique' ), $curauth->display_name );
		} elseif ( is_404() ) {
			$title = esc_html__( 'URL not found', 'critique' );
		} elseif ( is_search() ) {
			// Translators: Add the author's name to the title
			$title = sprintf( esc_html__( 'Search: %s', 'critique' ), get_search_query() );
		} elseif ( is_day() ) {
			// Translators: Add the queried date to the title
			$title = sprintf( esc_html__( 'Daily Archives: %s', 'critique' ), get_the_date() );
		} elseif ( is_month() ) {
			// Translators: Add the queried month to the title
			$title = sprintf( esc_html__( 'Monthly Archives: %s', 'critique' ), get_the_date( 'F Y' ) );
		} elseif ( is_year() ) {
			// Translators: Add the queried year to the title
			$title = sprintf( esc_html__( 'Yearly Archives: %s', 'critique' ), get_the_date( 'Y' ) );
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			// Translators: Add the tag's name to the title
			$title = sprintf( esc_html__( 'Tag: %s', 'critique' ), single_tag_title( '', false ) );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_post_type_archive() ) {
			$obj   = get_queried_object();
			$title = ! empty( $obj->labels->all_items ) ? $obj->labels->all_items : '';
		} elseif ( is_attachment() ) {
			// Translators: Add the attachment's name to the title
			$title = sprintf( esc_html__( 'Attachment: %s', 'critique' ), get_the_title() );
		} elseif ( is_single() || is_page() ) {
			$title = get_the_title();
		} else {
			$title = get_the_title();
		}
		return apply_filters( 'critique_filter_get_blog_title', $title );
	}
}

// Return string with categories links
if ( ! function_exists( 'critique_get_post_categories' ) ) {
	function critique_get_post_categories( $delimiter = ', ', $id = false, $links = true ) {
		return critique_get_post_terms( $delimiter, $id, 'category', $links );
	}
}

// Return string with terms links
if ( ! function_exists( 'critique_get_post_terms' ) ) {
	function critique_get_post_terms( $delimiter = ', ', $id = false, $taxonomy = 'category', $links = true ) {
		$output = '';
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}
		if ( empty( $taxonomy ) ) {
			$taxonomy = critique_get_post_type_taxonomy( get_post_type( $id ) );
		}
		$terms = get_the_terms( $id, $taxonomy );
		if ( ! empty( $terms ) && is_array( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( empty( $term->term_id ) ) {
					continue;
				}
				$output .= ( ! empty( $output )
								? $delimiter
								: ''
								)
							. ( $links
								? '<a href="' . esc_url( get_term_link( $term->term_id, $taxonomy ) ) . '"'
										// Translators: Add the term's name to the title
										. ' title="' . sprintf( esc_attr__( 'View all posts in %s', 'critique' ), $term->name ) . '"'
										. '>'
								: '<span>'
								)
								. apply_filters( 'critique_filter_term_name', $term->name, $term )
							. ( $links
								? '</a>'
								: '</span>'
								);
			}
		}
		return $output;
	}
}

// Return taxonomy for current post type
if ( ! function_exists( 'critique_get_post_type_taxonomy' ) ) {
	function critique_get_post_type_taxonomy( $post_type = '' ) {
		if ( empty( $post_type ) ) {
			$post_type = get_post_type();
		}
		if ( 'post' == $post_type ) {
			$tax = 'category';
		} else {
			$taxonomy_names = get_object_taxonomies( $post_type );
			$tax            = ! empty( $taxonomy_names[0] ) ? $taxonomy_names[0] : '';
		}
		return apply_filters( 'critique_filter_post_type_taxonomy', $tax, $post_type );
	}
}


// Return editing post id or 0 if is new post or false if not edit mode
if ( ! function_exists( 'critique_get_edited_post_id' ) ) {
	function critique_get_edited_post_id() {
		$id = false;
		if ( is_admin() ) {
			$url = critique_get_current_url();
			if ( strpos( $url, 'post.php' ) !== false ) {
				if ( critique_get_value_gp( 'action' ) == 'edit' ) {
					$post_id = critique_get_value_gp( 'post' );
					if ( 0 < $post_id ) {
						$id = $post_id;
					}
				}
			} elseif ( strpos( $url, 'post-new.php' ) !== false ) {
				$id = 0;
			}
		}
		return $id;
	}
}


// Return editing post type or empty string if not edit mode
if ( ! function_exists( 'critique_get_edited_post_type' ) ) {
	function critique_get_edited_post_type() {
		$pt = '';
		if ( is_admin() ) {
			$url = critique_get_current_url();
			if ( strpos( $url, 'post.php' ) !== false ) {
				if ( in_array( critique_get_value_gp( 'action' ), array( 'edit', 'elementor' ) ) ) {
					$id = critique_get_value_gp( 'post' );
					if ( 0 < $id ) {
						$post = get_post( (int) $id );
						if ( is_object( $post ) && ! empty( $post->post_type ) ) {
							$pt = $post->post_type;
						}
					}
				}
			} elseif ( strpos( $url, 'post-new.php' ) !== false ) {
				$pt = critique_get_value_gp( 'post_type' );
			}
		}
		return $pt;
	}
}


// Return true if current mode is "Edit post"
if ( !function_exists( 'critique_is_post_edit' ) ) {
	function critique_is_post_edit() {
		return ( critique_check_url( 'post.php' ) && ! empty( $_GET['action'] ) && $_GET['action'] == 'edit')
				||
				critique_check_url( 'post-new.php' )
				||
				( ! empty( $_GET['context'] ) && $_GET['context'] == 'edit' && ! empty( $_GET['post_id'] ) && $_GET['post_id'] > 0 )
				||
				( critique_check_url( 'admin.php' ) && ! empty( $_GET['page'] ) && $_GET['page'] == 'gutenberg-edit-site' );
	}
}


// Add SEO params to the article tag
if ( !function_exists( 'critique_add_seo_itemprops' ) ) {
	function critique_add_seo_itemprops() {
		if ( critique_is_on( critique_get_theme_option( 'seo_snippets' ) ) ) {
			?>
			itemscope="itemscope" 
			itemprop="<?php
				if ( 'page' == get_post_type() ) {
					echo 'mainEntityOfPage';
				} else {
					echo 'articleBody';					
				}
			?>" 
			itemtype="<?php echo esc_attr( critique_get_protocol( true ) ); ?>//schema.org/<?php echo esc_attr( critique_get_markup_schema() ); ?>" 
			itemid="<?php echo esc_url( get_the_permalink() ); ?>"
			content="<?php the_title_attribute( '' ); ?>"
			<?php
		}
	}
}


// Add SEO meta to the post
if ( !function_exists( 'critique_add_seo_snippets' ) ) {
	function critique_add_seo_snippets() {
		if ( critique_is_on( critique_get_theme_option( 'seo_snippets' ) ) ) {
			get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/seo' ) );
		}
	}
}


/* Menu utilities
-------------------------------------------------------------------------------- */

// Return nav menu html
if ( ! function_exists( 'critique_get_nav_menu' ) ) {
	function critique_get_nav_menu( $location = '', $menu = '', $depth = 11, $custom_walker = false ) {
		static $list = array();
		$slug = $location . '_' . $menu;
		if ( empty( $list[ $slug ] ) ) {
			$list[ $slug ] = esc_html__( 'You are trying to use a menu inserted in himself!', 'critique' );
			$args          = array(
								'menu'            => empty( $menu ) || 'default' == $menu || critique_is_inherit( $menu ) ? '' : $menu,
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'menu_class'      => 'sc_layouts_menu_nav ' . ( ! empty( $location ) ? esc_attr( $location ) : 'menu_main' ) . '_nav',
								'menu_id'         => ( ! empty( $location ) ? esc_attr( $location ) : 'menu_main' ),
								'echo'            => false,
								'fallback_cb'     => '',
								'before'          => '',
								'after'           => '',
								'link_before'     => critique_get_theme_setting( 'wrap_menu_items_with_span' ) ? '<span>' : '',
								'link_after'      => critique_get_theme_setting( 'wrap_menu_items_with_span' ) ? '</span>' : '',
								'depth'           => $depth,
							);
			if ( ! empty( $location ) ) {
				$args['theme_location'] = $location;
			}
			if ( $custom_walker && class_exists( 'critique_custom_menu_walker' ) ) {
				$args['walker'] = new critique_custom_menu_walker;
			}
			$list[ $slug ] = wp_nav_menu( apply_filters( 'critique_filter_get_nav_menu_args', $args ) );
		}
		return apply_filters( 'critique_filter_get_nav_menu', $list[ $slug ], $location, $menu );
	}
}

// Remove empty spaces between menu items
if ( ! function_exists( 'critique_remove_empty_spaces_between_menu_items' ) ) {
	add_action( 'wp_nav_menu', 'critique_remove_empty_spaces_between_menu_items', 98, 2 );
	function critique_remove_empty_spaces_between_menu_items( $html = '', $args = array() ) {
		return preg_replace(
							array( "/>[\r\n\s]*<li/", "/>[\r\n\s]*<\\/ul>/" ),
							array( "><li", "></ul>" ),
							$html
							);
	}
}

// Clear menu from empty items
if ( ! function_exists( 'critique_remove_empty_menu_items' ) ) {
	add_action( 'wp_nav_menu', 'critique_remove_empty_menu_items', 99, 2 );
	function critique_remove_empty_menu_items( $html = '', $args = array() ) {
		return critique_get_theme_setting( 'remove_empty_menu_items' )
					? preg_replace(
							"/<li[^>]*>[\r\n\s]*<a[^>]*>[\r\n\s]*(<span>[\r\n\s]*<\\/span>[\r\n\s]*)?<\\/a>[\r\n\s]*<\\/li>/",
							"",
							$html
							)
					: $html;
	}
}


/* Query manipulations
-------------------------------------------------------------------------------- */

// Make a new main query
if ( ! function_exists( 'critique_new_main_query' ) ) {
	function critique_new_main_query( $args ) {
		$args = array_merge( array(
			'post_ids'            => '',
			'post_type'           => '',
			'category'            => '',
			'posts_per_page'      => '',
			'page'                => 1
		), $args );
		$query_args  = array();
		if ( ! empty( $args['post_type'] ) || ! empty( $args['category'] ) ) {
			$query_args  = critique_query_add_posts_and_cats( $query_args, $args['post_ids'], $args['post_type'], $args['category'] );
		}
		if ( $args[ 'page' ] > 1 ) {
			$query_args['paged']               = $args[ 'page' ];
			$query_args['ignore_sticky_posts'] = true;
		}
		if ( 0 != (int) $args[ 'posts_per_page' ] ) {
			$query_args['posts_per_page'] = (int) $args[ 'posts_per_page' ];
		}
		if ( count( $query_args ) > 0 ) {
			$query_args['post_status'] = current_user_can( 'read_private_pages' ) && current_user_can( 'read_private_posts' )
											? array( 'publish', 'private' )
											: 'publish';
			$GLOBALS['wp_the_query']->query( $query_args );
			$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];
		}
	}
}

// Add sorting parameter in query arguments
if ( ! function_exists( 'critique_query_add_sort_order' ) ) {
	function critique_query_add_sort_order( $args, $orderby = 'date', $order = 'desc' ) {
		if ( ! empty( $orderby ) && ( empty( $args['orderby'] ) || 'none' != $orderby ) ) {
			$q          = apply_filters( 'critique_filter_add_sort_order', array(), $orderby, $order );
			$q['order'] = 'asc' == $order ? 'asc' : 'desc';
			if ( empty( $q['orderby'] ) ) {
				if ( 'none' == $orderby ) {
					$q['orderby'] = 'none';
				} elseif ( 'ID' == $orderby ) {
					$q['orderby'] = 'ID';
				} elseif ( 'comments' == $orderby ) {
					$q['orderby'] = 'comment_count';
				} elseif ( 'title' == $orderby || 'alpha' == $orderby ) {
					$q['orderby'] = 'title';
				} elseif ( 'rand' == $orderby || 'random' == $orderby ) {
					$q['orderby'] = 'rand';
				} else {
					$q['orderby'] = 'post_date';
				}
			}
			foreach ( $q as $mk => $mv ) {
				if ( is_array( $args ) ) {
					$args[ $mk ] = $mv;
				} else {
					$args->set( $mk, $mv );
				}
			}
		}
		return $args;
	}
}

// Add post type and posts list or categories list in query arguments
if ( ! function_exists( 'critique_query_add_posts_and_cats' ) ) {
	function critique_query_add_posts_and_cats( $args, $ids = '', $post_type = '', $cat = '', $taxonomy = '' ) {
		if ( ! empty( $ids ) ) {
			$args['post_type'] = empty( $args['post_type'] )
									? ( empty( $post_type ) ? array( 'post', 'page' ) : $post_type )
									: $args['post_type'];
			$args['post__in']  = explode( ',', str_replace( ' ', '', $ids ) );
			if ( empty( $args['orderby'] ) || 'none' == $args['orderby'] ) {
				$args['orderby'] = 'post__in';
				if ( isset( $args['order'] ) ) {
					unset( $args['order'] );
				}
			}
		} else {
			$args['post_type'] = empty( $args['post_type'] )
									? ( empty( $post_type ) ? 'post' : $post_type )
									: $args['post_type'];
			$post_type         = is_array( $args['post_type'] ) ? $args['post_type'][0] : $args['post_type'];
			if ( ! empty( $cat ) ) {
				$cats = ! is_array( $cat ) ? explode( ',', $cat ) : $cat;
				if ( empty( $taxonomy ) ) {
					$taxonomy = critique_get_post_type_taxonomy( $post_type );
				}
				if ( 'category' == $taxonomy ) {              // Add standard categories
					if ( is_array( $cats ) && count( $cats ) > 1 ) {
						$cats_ids = array();
						foreach ( $cats as $c ) {
							$c = trim( $c );
							if ( empty( $c ) ) {
								continue;
							}
							if ( 0 == (int) $c ) {
								$cat_term = get_term_by( 'slug', $c, $taxonomy, OBJECT );
								if ( $cat_term ) {
									$c = $cat_term->term_id;
								}
							}
							if ( 0 == $c ) {
								continue;
							}
							$cats_ids[] = (int) $c;
							$children   = get_categories(
								array(
									'type'         => $post_type,
									'child_of'     => $c,
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'taxonomy'     => $taxonomy,
									'pad_counts'   => false,
								)
							);
							if ( is_array( $children ) && count( $children ) > 0 ) {
								foreach ( $children as $c ) {
									if ( ! in_array( (int) $c->term_id, $cats_ids ) ) {
										$cats_ids[] = (int) $c->term_id;
									}
								}
							}
						}
						if ( count( $cats_ids ) > 0 ) {
							$args['category__in'] = $cats_ids;
						}
					} else {
						if ( 0 < (int) $cat ) {
							$args['cat'] = (int) $cat;
						} else {
							$args['category_name'] = $cat;
						}
					}
				} else {                                    // Add custom taxonomies
					if ( ! isset( $args['tax_query'] ) ) {
						$args['tax_query'] = array();
					}
					$args['tax_query']['relation'] = 'AND';
					$args['tax_query'][]           = array(
						'taxonomy'         => $taxonomy,
						'include_children' => true,
						'field'            => (int) $cats[0] > 0 ? 'id' : 'slug',
						'terms'            => $cats,
					);
				}
			}
		}
		return $args;
	}
}

// Add filters (meta parameters) in query arguments
if ( ! function_exists( 'critique_query_add_filters' ) ) {
	function critique_query_add_filters( $args, $filters = false ) {
		if ( ! empty( $filters ) ) {
			if ( ! is_array( $filters ) ) {
				$filters = array( $filters );
			}
			foreach ( $filters as $v ) {
				$found = false;
				if ( 'thumbs' == $v ) {                                                      // Filter with meta_query
					if ( ! isset( $args['meta_query'] ) ) {
						$args['meta_query'] = array();
					} else {
						for ( $i = 0; $i < count( $args['meta_query'] ); $i++ ) {
							if ( $args['meta_query'][ $i ]['meta_filter'] == $v ) {
								$found = true;
								break;
							}
						}
					}
					if ( ! $found ) {
						$args['meta_query']['relation'] = 'AND';
						if ( 'thumbs' == $v ) {
							$args['meta_query'][] = array(
								'meta_filter' => $v,
								'key'         => '_thumbnail_id',
								'value'       => false,
								'compare'     => '!=',
							);
						}
					}
				} elseif ( in_array( $v, array( 'video', 'audio', 'gallery' ) ) ) {          // Filter with tax_query
					if ( ! isset( $args['tax_query'] ) ) {
						$args['tax_query'] = array();
					} else {
						for ( $i = 0; $i < count( $args['tax_query'] ); $i++ ) {
							if ( $args['tax_query'][ $i ]['tax_filter'] == $v ) {
								$found = true;
								break;
							}
						}
					}
					if ( ! $found ) {
						$args['tax_query']['relation'] = 'AND';
						if ( 'video' == $v ) {
							$args['tax_query'][] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-video' ),
							);
						} elseif ( 'audio' == $v ) {
							$args['tax_query'] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-audio' ),
							);
						} elseif ( 'gallery' == $v ) {
							$args['tax_query'] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-gallery' ),
							);
						}
					}
				}
			}
		}
		return $args;
	}
}




/* Widgets utils
------------------------------------------------------------------------------------- */

// Create widgets area
if ( ! function_exists( 'critique_create_widgets_area' ) ) {
	function critique_create_widgets_area( $name, $add_classes = '' ) {
		$widgets_name = critique_get_theme_option( $name );
		if ( ! critique_is_off( $widgets_name ) && is_active_sidebar( $widgets_name ) ) {
			critique_storage_set( 'current_sidebar', $name );
			ob_start();
			dynamic_sidebar( $widgets_name );
			$out = trim( ob_get_contents() );
			ob_end_clean();
			if ( ! empty( $out ) ) {
				$out          = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $out );
				$need_columns = strpos( $out, 'columns_wrap' ) === false && apply_filters( 'critique_filter_widgets_area_need_columns', 'footer' == $name, $name, $out );
				if ( $need_columns ) {
					$columns = apply_filters( 'critique_filter_widgets_area_columns', min( 4, max( 1, critique_tags_count( $out, 'aside' ) ) ), $name );
					$out     = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $columns ) . ' widget', $out );
				}
				?>
				<div class="<?php echo esc_attr( $name ); ?> <?php echo esc_attr( $name ); ?>_wrap widget_area">
					<?php do_action( 'critique_action_before_sidebar_wrap' ); ?>
					<div class="<?php echo esc_attr( $name ); ?>_inner <?php echo esc_attr( $name ); ?>_inner widget_area_inner">
						<?php
						do_action( 'critique_action_before_sidebar' );
						critique_show_layout(
							$out,
							true == $need_columns ? '<div class="columns_wrap">' : '',
							true == $need_columns ? '</div>' : ''
						);
						do_action( 'critique_action_after_sidebar' );
						?>
					</div>
					<?php do_action( 'critique_action_after_sidebar_wrap' ); ?>
				</div>
				<?php
			}
		}
	}
}

// Check if sidebar present
if ( ! function_exists( 'critique_sidebar_present' ) ) {
	function critique_sidebar_present() {
		global $wp_query;
		$sidebar_position = critique_get_theme_option( 'sidebar_position' );
		$sidebar_type     = critique_get_theme_option( 'sidebar_type' );
		$sidebar_name     = critique_get_theme_option( 'sidebar_widgets' );
		return apply_filters(
			'critique_filter_sidebar_present',
			! critique_is_off( $sidebar_position )
				&& (
						( 'default' == $sidebar_type && ! critique_is_off( $sidebar_name ) && is_active_sidebar( $sidebar_name ) )
						||
						( 'custom' == $sidebar_type && critique_is_layouts_available() )
					)
				&& ! is_404()
				&& ( ! is_search() || $wp_query->found_posts > 0 )
		);
	}
}

// Return content width ( page_width - sidebar_width - sidebar_gap )
if ( ! function_exists( 'critique_get_content_width' ) ) {
	function critique_get_content_width() {
		$pg_width = apply_filters( 'critique_filter_content_width', critique_get_theme_option( 'page_width' ) );
		$sb_width = 0;
		$sb_gap   = 0;
		if ( critique_sidebar_present() ) {
			$critique_sidebar_type = critique_get_theme_option( 'sidebar_type' );
			if ( 'custom' == $critique_sidebar_type && ! critique_is_layouts_available() ) {
				$critique_sidebar_type = 'default';
			}
			if ( 'default' == $critique_sidebar_type ) {
				$critique_sidebar_name = critique_get_theme_option( 'sidebar_widgets' );
				if ( is_active_sidebar( $critique_sidebar_name ) ) {
					$sb_width = critique_get_theme_option( 'sidebar_width' );
					$sb_gap   = critique_get_theme_option( 'sidebar_gap' );
				}
			} else {
				$sb_width = critique_get_theme_option( 'sidebar_width' );
				$sb_gap   = critique_get_theme_option( 'sidebar_gap' );
			}
		}
		return $pg_width - ( $sb_width > 0 ? $sb_width + $sb_gap : 0 );
	}
}




/* Inline styles and scripts
------------------------------------------------------------------------------------- */

// Add inline styles and return class for it
if ( ! function_exists( 'critique_add_inline_css_class' ) ) {
	function critique_add_inline_css_class( $css, $suffix = '' ) {
		$class_name = critique_generate_id( 'critique_inline_' );
		critique_add_inline_css(
			sprintf(
				'.%s%s{%s}',
				$class_name,
				! empty( $suffix )
					? ( substr( $suffix, 0, 1 ) != ':' ? ' ' : '' ) . str_replace( ',', ",.{$class_name} ", $suffix )
					: '',
				$css
			)
		);
		return $class_name;
	}
}

// Add inline styles
if ( ! function_exists( 'critique_add_inline_css' ) ) {
	function critique_add_inline_css( $css ) {
		if ( function_exists( 'trx_addons_add_inline_css' ) ) {
			trx_addons_add_inline_css( $css );
		} else {
			critique_storage_concat( 'inline_styles', $css );
		}
	}
}

// Return inline styles
if ( ! function_exists( 'critique_get_inline_css' ) ) {
	function critique_get_inline_css() {
		return wp_doing_ajax() && function_exists( 'trx_addons_get_inline_css' )
					? trx_addons_get_inline_css()
					: critique_storage_get( 'inline_styles' );
	}
}



/* Date & Time
----------------------------------------------------------------------------------------------------- */

// Return post date
if ( ! function_exists( 'critique_get_date' ) ) {
	function critique_get_date( $dt = '', $format = '' ) {
		if ( '' == $dt ) {
			$dt = get_the_time( 'U' );
		}
		if ( date( 'U' ) - $dt > intval( critique_get_theme_option( 'time_diff_before' ) ) * 24 * 3600 ) {
			$dt = date_i18n( '' == $format ? get_option( 'date_format' ) : $format, $dt );
		} else {
			// Translators: Add the human-friendly date difference
			$dt = sprintf( esc_html__( '%s ago', 'critique' ), human_time_diff( $dt, current_time( 'timestamp' ) ) );
		}
		return $dt;
	}
}


/* Lazy load images
----------------------------------------------------------------------------------------------------- */

// Disable lazy load for images
if ( ! function_exists( 'critique_lazy_load_off' ) ) {
	function critique_lazy_load_off() {
		if ( ! critique_lazy_load_is_off() ) {
			add_filter( 'wp_lazy_loading_enabled', 'critique_lazy_load_disabled' );
		}
	}
}

if ( ! function_exists( 'critique_lazy_load_disabled' ) ) {
	function critique_lazy_load_disabled() {
		return false;
	}
}

// Enable lazy load for images
if ( ! function_exists( 'critique_lazy_load_on' ) ) {
	function critique_lazy_load_on() {
		if ( critique_lazy_load_is_off() ) {
			remove_action( 'wp_lazy_loading_enabled', 'critique_lazy_load_disabled' );	// Is equal to rf
		}
	}
}

// Check state of lazy load
if ( ! function_exists( 'critique_lazy_load_is_off' ) ) {
	function critique_lazy_load_is_off() {
		return has_filter( 'wp_lazy_loading_enabled', 'critique_lazy_load_disabled' );
	}
}



/* Structured Data
----------------------------------------------------------------------------------------------------- */

// Return markup schema
if ( ! function_exists( 'critique_get_markup_schema' ) ) {
	function critique_get_markup_schema() {
		if ( is_single() ) {                                        // Is single post
			$type = 'Article';
		} elseif ( is_home() || is_archive() || is_category() ) {    // Is blog home, archive or category
			$type = 'Blog';
		} elseif ( is_front_page() ) {                                // Is static front page
			$type = 'Website';
		} else { // Is a general page
			$type = 'WebPage';
		}
		return $type;
	}
}


// Return text for the Privacy Policy checkbox
if ( ! function_exists( 'critique_get_privacy_text' ) ) {
	function critique_get_privacy_text() {
		$page         = get_option( 'wp_page_for_privacy_policy' );
		$privacy_text = critique_get_theme_option( 'privacy_text' );
		return apply_filters(
			'critique_filter_privacy_text',
			wp_kses(
				$privacy_text
				. ( ! empty( $page ) && ! empty( $privacy_text )
					// Translators: Add url to the Privacy Policy page
					? ' ' . sprintf( __( 'For further details on handling user data, see our %s.', 'critique' ),
						'<a href="' . esc_url( get_permalink( $page ) ) . '" target="_blank">'
						. __( 'Privacy Policy', 'critique' )
						. '</a>' )
					: ''
					),
				'critique_kses_content'
				)
			);
	}
}


/* wp_kses handlers
----------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'critique_kses_allowed_html' ) ) {
	add_filter( 'wp_kses_allowed_html', 'critique_kses_allowed_html', 10, 2);
	function critique_kses_allowed_html($tags, $context) {
		if ( in_array( $context, array( 'critique_kses_content', 'trx_addons_kses_content' ) ) ) {
			$tags = array( 
				'h1'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h2'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h3'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h4'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h5'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h6'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'p'      => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'span'   => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'div'    => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'a'      => array( 'id' => array(), 'class' => array(), 'title' => array(), 'href' => array(), 'target' => array(), 'rel' => array() ),
				'b'      => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'i'      => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'em'     => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'strong' => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'img'    => array( 'id' => array(), 'class' => array(), 'src' => array(), 'width' => array(), 'height' => array(), 'alt' => array() ),
				'br'     => array( 'clear' => array() ),
			);
		}
		return $tags;
	}
}


/* AJAX utilities
----------------------------------------------------------------------------------------------------- */

// Verify nonce and exit if it's not valid
if ( !function_exists( 'critique_verify_nonce' ) ) {
	function critique_verify_nonce( $nonce = 'nonce', $mask = '' ) {
		if ( empty( $mask ) ) {
			$mask = admin_url('admin-ajax.php');
		}
		if ( ! wp_verify_nonce( critique_get_value_gp( $nonce ), $mask ) ) {
			critique_forbidden();
		}
	}
}

// Exit with default code (200 - OK)
if ( !function_exists( 'critique_exit' ) ) {
	function critique_exit( $message = '', $title = '', $code = 200 ) {
		wp_die( $message, $title, array( 'response' => $code, 'exit' => empty( $message ) && empty( $title ) ) );
	}
}

// Exit with code 403 - Forbidden
if ( !function_exists( 'critique_forbidden' ) ) {
	function critique_forbidden( $message = '', $title = '' ) {
		critique_exit( $message, $title, 403 );
	}
}

// Send ajax response and exit
if ( !function_exists( 'critique_ajax_response' ) ) {
	function critique_ajax_response( $response ) {
		echo wp_json_encode( $response );
		wp_die( '', '', array( 'exit' => true ) );
	}
}


/* Upgrade utilities
----------------------------------------------------------------------------------------------------- */

// Get the upgrade server URL
if ( !function_exists( 'critique_get_upgrade_url' ) ) {
	function critique_get_upgrade_url( $params=array() ) {
		$theme_folder = get_template();
		$theme_slug   = apply_filters( 'critique_filter_original_theme_slug', $theme_folder );
		$default      = array(
							'action'     => '',
							'theme_slug' => $theme_slug,
						);
		if ( ! in_array( $params['action'], array( 'info_skins' ) ) ) {
			$default['key']        = '';
			$default['src']        = critique_get_theme_pro_key();
			$default['theme_name'] = wp_get_theme( $theme_folder )->get( 'Name' );
			$default['domain']     = critique_remove_protocol_from_url( get_home_url(), true );
			$default['rnd']        = mt_rand();
		}
		$params = array_merge( $default, $params );
		return critique_add_to_url( trailingslashit( critique_storage_get( 'theme_upgrade_url' ) ) . 'upgrade.php', $params );
	}
}


// Call the upgrade server
if ( !function_exists( 'critique_get_upgrade_data' ) ) {
	function critique_get_upgrade_data( $params=array() ) {
		$url = critique_get_upgrade_url( $params );
		$result = function_exists( 'trx_addons_fgc' ) ? trx_addons_fgc( $url ) : critique_fgc( $url );
		if ( is_serialized( $result ) ) {
			try {
				$result = critique_unserialize( $result );
			} catch ( Exception $e ) {
			}
		}
		if ( ! isset( $result['error'] ) || ! isset( $result['data'] ) ) {
			$result = array(
				'error' => esc_html__( 'Unrecognized server answer!', 'critique' ),
				'data'  => ''
			);
		}
		return $result;
	}
}


// Allow upload archive
if ( ! function_exists( 'critique_allow_upload_archives' ) ) {
	function critique_allow_upload_archives() {
		if ( function_exists( 'trx_addons_allow_upload_archives' ) ) {
			trx_addons_allow_upload_archives();
		}
	}
}


// Disallow upload archive
if ( ! function_exists( 'critique_disallow_upload_archives' ) ) {
	function critique_disallow_upload_archives() {
		if ( function_exists( 'trx_addons_disallow_upload_archives' ) ) {
			trx_addons_disallow_upload_archives();
		}
	}
}
