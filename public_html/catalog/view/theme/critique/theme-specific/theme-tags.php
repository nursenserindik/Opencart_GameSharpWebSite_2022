<?php
/**
 * Theme tags
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */


//----------------------------------------------------------------------
//-- Common tags
//----------------------------------------------------------------------

// Return true if current page need title
if ( ! function_exists( 'critique_need_page_title' ) ) {
	function critique_need_page_title() {
		return ! is_front_page() && apply_filters( 'critique_filter_need_page_title', true );
	}
}

// Output string with the html layout (if not empty)
// (put it between 'before' and 'after' tags)
// Attention! This string may contain layout formed in any plugin (widgets or shortcodes output)
// and not require escaping to prevent damage layout!
if ( ! function_exists( 'critique_show_layout' ) ) {
	function critique_show_layout( $str, $before = '', $after = '' ) {
		if ( trim( $str ) != '' ) {
			printf( '%s%s%s', $before, $str, $after );
		}
	}
}

// Return logo images (if set)
if ( ! function_exists( 'critique_get_logo_image' ) ) {
	function critique_get_logo_image( $type = '' ) {
		$logo_image  = '';
		if ( empty( $type ) && function_exists( 'the_custom_logo' ) ) {
			$logo_image = critique_get_theme_option( 'custom_logo' );
			if ( empty( $logo_image ) ) {
				$logo_image = get_theme_mod( 'custom_logo' );
			}
			if ( is_numeric( $logo_image ) && (int) $logo_image > 0 ) {
				$image      = wp_get_attachment_image_src( $logo_image, 'full' );
				$logo_image = empty( $image[0] ) ? '' : $image[0];
			}
		} else {
			$logo_image = critique_get_theme_option( 'logo' . ( ! empty( $type ) ? '_' . trim( $type ) : '' ) );
		}
		$logo_retina = critique_is_on( critique_get_theme_option( 'logo_retina_enabled' ) )
						? critique_get_theme_option( 'logo' . ( ! empty( $type ) ? '_' . trim( $type ) : '' ) . '_retina' )
						: '';
		return array(
					'logo'        => ! empty( $logo_image ) ? critique_remove_protocol_from_url( $logo_image, false ) : '',
					'logo_retina' => ! empty( $logo_retina ) ? critique_remove_protocol_from_url( $logo_retina, false ) : ''
				);
	}
}

// Return header video (if set)
if ( ! function_exists( 'critique_get_header_video' ) ) {
	function critique_get_header_video() {
		$video = '';
		if ( apply_filters( 'critique_header_video_enable', ! wp_is_mobile() && is_front_page() ) ) {
			if ( critique_check_theme_option( 'header_video' ) ) {
				$video = critique_get_theme_option( 'header_video' );
				if ( is_numeric( $video ) && (int) $video > 0 ) {
					$video = wp_get_attachment_url( $video );
				}
			} elseif ( function_exists( 'get_header_video_url' ) ) {
				$video = get_header_video_url();
			}
		}
		return $video;
	}
}


//----------------------------------------------------------------------
//-- Post parts
//----------------------------------------------------------------------

// Show post featured image
if ( ! function_exists( 'critique_show_post_featured_image' ) ) {
	function critique_show_post_featured_image( $args = array() ) {
		$args = array_merge( array(
								'singular' => true,
								'thumb_bg' => false,
								),
								$args
							);
		// Featured image
		$post_format = str_replace( 'post-format-', '', get_post_format() );
		if ( ( ! critique_sc_layouts_showed( 'featured' ) && strpos( critique_get_post_content(), '[trx_widget_banner]' ) === false ) || in_array( $post_format, array( 'audio', 'video', 'gallery' ) ) ) {
			do_action( 'critique_action_before_post_featured' );
			critique_show_post_featured( $args );
			do_action( 'critique_action_after_post_featured' );
		} elseif ( critique_is_on( critique_get_theme_option( 'seo_snippets' ) ) && has_post_thumbnail() ) {
			?>
			<meta itemprop="image" itemtype="<?php echo esc_attr( critique_get_protocol( true ) ); ?>//schema.org/ImageObject" content="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>">
			<?php
		}
	}
}

// Show post title and meta
if ( ! function_exists( 'critique_show_post_title_and_meta' ) ) {
	function critique_show_post_title_and_meta( $args = array() ) {

		$args = array_merge( array(
								'content_wrap'  => false,
								'show_title'    => true,
								'show_meta'     => true,
								'split_meta_by' => '',
								),
								$args
							);

		// Title and post meta
		if ( ( ! critique_sc_layouts_showed( 'title' ) || ! critique_sc_layouts_showed( 'postmeta' ) ) ) {
			do_action( 'critique_action_before_post_title' );
			ob_start();
			?>
			<div class="post_header post_header_single entry-header">
				<?php
				if ( $args['content_wrap'] ) {
					?>
					<div class="content_wrap">
					<?php
				}

				do_action( 'critique_action_post_header_start' );
				
				// Post meta
				$meta_components = critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );
				$show_categories = in_array( 'categories', $meta_components );
				$meta_components = critique_array_delete_by_value( $meta_components, 'categories' );
				$meta_components = critique_array_delete_by_value( $meta_components, 'likes' );
				$share_position  = critique_array_get_keys_by_value( critique_get_theme_option( 'share_position' ) );
				if ( ! in_array( 'top', $share_position ) ) {
					$meta_components = critique_array_delete_by_value( $meta_components, 'share' );
				}
				$seo = critique_is_on( critique_get_theme_option( 'seo_snippets' ) );
				if ( ! empty( $args['show_title'] ) ) {
					if ( $show_categories && ! critique_sc_layouts_showed( 'postmeta' ) && critique_is_on( critique_get_theme_option( 'show_post_meta' ) ) ) {
						critique_show_post_meta(
							apply_filters(
								'critique_filter_post_meta_args',
								array_merge(
									array(
										'components' => 'categories',
										'class'      => 'post_meta_categories',
									),
									$args
								),
								'single',
								1
							)
						);
					}
					// Post title
					if ( ! critique_sc_layouts_showed( 'title' ) ) {
						the_title( '<h1 class="post_title entry-title"' . ( $seo ? ' itemprop="headline"' : '' ) . '>', '</h1>' );
					}
					// Post subtitle
					$post_subtitle = critique_get_theme_option( 'post_subtitle' );
					if ( ! empty( $post_subtitle ) ) {
						?>
						<div class="post_subtitle">
							<?php critique_show_layout( $post_subtitle ); ?>
						</div>
						<?php
					}
				}
				// Post meta
				if ( ! empty( $args['show_meta'] ) && ! critique_sc_layouts_showed( 'postmeta' ) && critique_is_on( critique_get_theme_option( 'show_post_meta' ) ) ) {
					if ( ! empty( $args['split_meta_by'] ) ) {
						?><div class="post_meta_other"><?php
							$meta_components = critique_get_theme_option( 'meta_parts' );
							if ( ! is_array( $meta_components ) ) {
								parse_str( str_replace( '|', '&', $meta_components ), $meta_components );
							}
							if ( isset( $meta_components['categories'] ) ) {
								unset( $meta_components['categories'] );
							}
							if ( isset( $meta_components['likes'] ) ) {
								unset( $meta_components['likes'] );
							}
							$part1 = array_keys( critique_array_slice( $meta_components, '', $args['split_meta_by'] ), 1 );
							$part2 = array_keys( critique_array_slice( $meta_components, '+' . $args['split_meta_by'], '' ), 1 );
							if ( ! in_array( 'top', $share_position ) ) {
								$part2 = critique_array_delete_by_value( $part2, 'share' );
							}
							critique_show_post_meta(
								apply_filters(
									'critique_filter_post_meta_args',
									array_merge(
										array(
											'components' => join( ',', $part1 ),
											'seo'        => $seo,
											'class'      => 'post_meta_other_part1',
										),
										$args
									),
									'single',
									1
								)
							);
							critique_show_post_meta(
								apply_filters(
									'critique_filter_post_meta_args',
									array_merge(
										array(
											'components' => join( ',', $part2 ),
											'seo'        => $seo,
											'class'      => 'post_meta_other_part2',
										),
										$args,
										array(
											'show_labels' => ! empty( $args['show_labels'] ) || ! in_array( 'share', $part2 ) || ! critique_exists_trx_addons()
										)
									),
									'single',
									1
								)
							);
						?></div><?php
					} else {
						critique_show_post_meta(
							apply_filters(
								'critique_filter_post_meta_args',
								array_merge(
									array(
										'components' => join( ',', $meta_components ),
										'seo'        => $seo,
										'class'      => 'post_meta_other',
									),
									$args
								),
								'single',
								1
							)
						);
					}
				}

				do_action( 'critique_action_post_header_end' );

				if ( $args['content_wrap']) {
					?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
			$critique_post_header = ob_get_contents();
			ob_end_clean();
			if ( strpos( $critique_post_header, 'post_subtitle' ) !== false
				|| strpos( $critique_post_header, 'post_title' ) !== false
				|| strpos( $critique_post_header, 'post_meta' ) !== false
			) {
				critique_show_layout( $critique_post_header );
			}
			do_action( 'critique_action_after_post_title' );
		}
	}
}


// Show post content in the blog posts
if ( ! function_exists( 'critique_show_post_content' ) ) {
	function critique_show_post_content( $args = array(), $otag='', $ctag='' ) {
		$simple = true;
		$post_format = get_post_format();
		$post_format = empty( $post_format ) ? 'standard' : str_replace( 'post-format-', '', $post_format );
		ob_start();
		if ( has_excerpt() ) {
			the_excerpt();
		} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
			do_action( 'critique_action_before_full_post_content' );
			critique_show_layout( critique_filter_post_content( get_the_content('') ) );
			do_action( 'critique_action_after_full_post_content' );
			$simple = false;
		} elseif ( in_array( $post_format, array( 'link', 'aside', 'status' ) ) ) {
			do_action( 'critique_action_before_full_post_content' );
			critique_show_layout( critique_filter_post_content( get_the_content() ) );
			do_action( 'critique_action_after_full_post_content' );
			$simple = false;
		} elseif ( 'quote' == $post_format ) {
			$quote = critique_get_tag( critique_filter_post_content( get_the_content() ), '<blockquote', '</blockquote>' );
			if ( ! empty( $quote ) ) {
				critique_show_layout( wpautop( $quote ) );
				$simple = false;
			} else {
				critique_show_layout( critique_filter_post_content( get_the_content() ) );
			}
		} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
			critique_show_layout( critique_filter_post_content( get_the_content() ) );
		}
		$output = ob_get_contents();
		ob_end_clean();
		if ( ! empty( $output ) ) {
			if ( $simple ) {
				$len = isset( $args['hide_excerpt'] ) && (int) $args['hide_excerpt'] > 0
							? 0
							: ( ! empty( $args['excerpt_length'] )
								? max( 0, (int) $args['excerpt_length'] )
								: critique_get_theme_option( 'excerpt_length' )
								);
				$output = critique_excerpt( $output, $len );
			}
		}
		if ( trim( str_replace( "&nbsp;", '', $output ) ) != '' ) {
			critique_show_layout( trim( $output ), $otag, $ctag);
		}
	}
}


// Show post link 'Read more' in the blog posts
if ( ! function_exists( 'critique_show_post_more_link' ) ) {
	function critique_show_post_more_link( $args = array(), $otag='', $ctag='' ) {
		if ( ! isset( $args['more_button'] ) || $args['more_button'] ) {
			critique_show_layout(
				'<a class="more-link" href="' . esc_url( get_permalink() ) . '">'
					. ( ! empty( $args['more_text'] )
							? esc_html( $args['more_text'] )
							: esc_html__( 'Read more', 'critique' )
							)
				. '</a>',
				$otag,
				$ctag
			);
		}
	}
}


// Show post link 'View comments' in the blog posts
if ( ! function_exists( 'critique_show_post_comments_link' ) ) {
	function critique_show_post_comments_link( $args = array(), $otag='', $ctag='' ) {
		$total = get_comments_number();
		critique_show_layout(
			'<a class="more-link comments-link" href="' . esc_url( get_comments_link() ) . '">'
				. ( ! empty( $args['comments_text'] )
						? esc_html( $args['comments_text'] )
						: ( $total == 0
							? esc_html__( 'Leave a comment', 'critique' )
							: ( $total == 1 ? esc_html__( 'View comment', 'critique' ) : esc_html__( 'View comments', 'critique' ) )
							)
						)
			. '</a>',
			$otag,
			$ctag
		);
	}
}


// Show single post pagination
if ( ! function_exists( 'critique_show_post_pagination' ) ) {
	function critique_show_post_pagination() {
		do_action( 'critique_action_before_post_pagination' );
		wp_link_pages(
			array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'critique' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'critique' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		do_action( 'critique_action_after_post_pagination' );
	}
}


// Show single post footer: tags, likes and share
if ( ! function_exists( 'critique_show_post_footer' ) ) {
	function critique_show_post_footer( $components = 'pages,tags,likes,share,prev_next,author' ) {

		$components               = array_map( 'trim', explode( ',', $components ) );
		$meta_components          = critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );
		$share_position           = critique_array_get_keys_by_value( critique_get_theme_option( 'share_position' ) );

		$full_post_loading        = critique_get_value_gp( 'action' ) == 'full_post_loading';
		$critique_posts_navigation = critique_get_theme_option( 'posts_navigation' );

		foreach( $components as $comp ) {

			if ( 'tags' == $comp ) {

				// Post tags
				ob_start();
				the_tags( '', '', '' );
				$critique_meta_output = ob_get_contents();
				ob_end_clean();
				if ( ! empty( $critique_meta_output ) ) {
					do_action( 'critique_action_before_post_tags' );
					critique_show_layout( $critique_meta_output, '<div class="post_tags_single"><span class="post_meta_label">' . esc_html__( 'Tags:', 'critique' ) . '</span> ', '</div>' );
					do_action( 'critique_action_after_post_tags' );
				}

			} else if ( 'likes' == $comp ) {

				// Emotions
				if ( critique_exists_trx_addons() && function_exists( 'trx_addons_get_post_reactions' ) && trx_addons_is_on( trx_addons_get_option( 'emotions_allowed' ) ) ) {
					trx_addons_get_post_reactions( true );
				}

			} else if ( 'share' == $comp ) {

				// Likes and Share
				$meta_footer = array();
				if ( in_array( 'likes', $components ) && in_array( 'likes', $meta_components )
						&&
						( ! function_exists( 'trx_addons_get_option' ) || trx_addons_is_off( trx_addons_get_option( 'emotions_allowed' ) ) || ! apply_filters( 'trx_addons_filter_show_post_reactions', is_single() && ! is_attachment() ) )
				) {
					$meta_footer[] = 'likes';
				}
				if ( in_array( 'bottom', $share_position ) ) {
					$meta_footer[] = 'share';
				}
				if ( count( $meta_footer) > 0 ) {
					ob_start();
					critique_show_post_meta(
						apply_filters(
							'critique_filter_post_meta_args',
							array(
								'components' => join( ',', $meta_footer ),
								'class'      => 'post_meta_single',
								'share_type' => 'block'
							),
							'single',
							1
						)
					);
					$critique_meta_output = ob_get_contents();
					ob_end_clean();
					if ( ! empty( $critique_meta_output ) ) {
						do_action( 'critique_action_before_post_meta' );
						critique_show_layout( $critique_meta_output );
						do_action( 'critique_action_after_post_meta' );
					}
				}

			} else if ( 'author' == $comp ) {

				// Author bio
				if ( critique_get_theme_option( 'show_author_info' ) == 1
					&& ! is_attachment()
					&& get_the_author_meta( 'description' )
					&& ( 'scroll' != $critique_posts_navigation || critique_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
					&& ( ! $full_post_loading || critique_get_theme_option( 'open_full_post_hide_author' ) == 0 )
				) {
					do_action( 'critique_action_before_post_author' );
					get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/author-bio' ) );
					do_action( 'critique_action_after_post_author' );
				}

			} else if ( 'prev_next' == $comp ) {

				// Previous/next post navigation.
				if ( 'links' == $critique_posts_navigation && ! $full_post_loading ) {
					do_action( 'critique_action_before_post_navigation' );
					?>
					<div class="nav-links-single<?php
						if ( critique_get_theme_setting( 'thumbs_in_navigation' ) ) {
							echo ' nav-links-with-thumbs';
						}
						if ( ! critique_is_off( critique_get_theme_option( 'posts_navigation_fixed' ) ) ) {
							echo ' nav-links-fixed fixed';
						}
					?>">
						<?php
						the_post_navigation( apply_filters( 'critique_filter_post_navigation_args', array(
							'next_text' => ( critique_get_theme_setting( 'thumbs_in_navigation' ) ? '<span class="nav-arrow"></span>' : '' )
								. '<span class="nav-arrow-label">' . esc_html__( 'Next', 'critique' ) . '</span> '
								. '<h6 class="post-title">%title</h6>'
								. '<span class="post_date">%date</span>',
							'prev_text' => ( critique_get_theme_setting( 'thumbs_in_navigation' ) ? '<span class="nav-arrow"></span>' : '' )
								. '<span class="nav-arrow-label">' . esc_html__( 'Previous', 'critique' ) . '</span> '
								. '<h6 class="post-title">%title</h6>'
								. '<span class="post_date">%date</span>',
						), 'post_footer' ) );
						?>
					</div>
					<?php
					do_action( 'critique_action_after_post_navigation' );
				}

			}
		}
	}
}


// Show post meta block: post date, author, categories, counters, etc.
if ( ! function_exists( 'critique_show_post_meta' ) ) {
	function critique_show_post_meta( $args = array() ) {
		if ( is_single() && critique_is_off( critique_get_theme_option( 'show_post_meta' ) ) ) {
			return ' ';  // Need at least one space!
		}
		$args = array_merge(
			apply_filters( 'critique_filter_post_meta_args_default', array(
				'tag'             => 'div',
				'components'      => 'categories,date,author,comments,share,edit',
				'show_labels'     => true,
				'share_type'      => 'drop',
				'share_direction' => 'horizontal',
				'seo'             => false,
				'author_avatar'   => true,
				'date_format'     => '',
				'class'           => '',
				'add_spaces'      => false,
				'echo'            => true,
				'cat_sep'         => true,
			) ),
			$args
		);

		ob_start();

		$components = is_array( $args['components'] ) ? $args['components'] : explode( ',', $args['components'] );

		// Reorder meta_parts with last user's choise
		if ( critique_storage_isset( 'options', 'meta_parts', 'val' ) ) {
			$parts = explode( '|', critique_get_theme_option( 'meta_parts' ) );
			$list_new = array();
			foreach( $parts as $part ) {
				$part = explode( '=', $part );
				if ( in_array( $part[0], $components ) ) {
					$list_new[] = $part[0];
					$components = critique_array_delete_by_value( $components, $part[0] );
				}
			}
			$components = count( $components ) > 0 ? array_merge( $list_new, $components ) : $list_new;
		}

		// Display components
		$dt_last = '';
		foreach ( $components as $comp ) {
			$comp = trim( $comp );
			if ( 'categories' == $comp ) {
				// Label 'Sponsored content' will be shown always before the categories list
				if ( critique_exists_trx_addons() ) {
					$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
					if ( ! empty( $meta['sponsored_post'] ) && 1 == (int) $meta['sponsored_post'] ) {
						$cats = ( ! empty( $meta['sponsored_url'] )
									? '<a class="post_sponsored_label"'
										. ' href="' . esc_url( $meta['sponsored_url'] ) . '"'
										. ' target="_blank"'
										. ( ! empty( $meta['sponsored_rel_nofollow'] ) || ! empty( $meta['sponsored_rel_sponsored'] )
											? ' rel="'
													. trim( ( ! empty( $meta['sponsored_rel_nofollow'] ) ? 'nofollow ' : '' )
															. ( ! empty( $meta['sponsored_rel_sponsored'] ) ? 'sponsored' : '' )
														)
													. '"'
											: '' )
										. '>'
									: '<span class="post_sponsored_label">' )
								. ( ! empty( $meta['sponsored_label'] )
									? esc_html( $meta['sponsored_label'] )
									: esc_html__( 'Sponsored content', 'critique' )
									)
								. ( ! empty( $meta['sponsored_url'] )
									? '</a>'
									: '</span>'
									);
						critique_show_layout( $cats, '<span class="post_meta_item post_sponsored">', '</span>');
					}
				}
				// Post categories
				$cats = get_post_type() == 'post'
								? get_the_category_list(
									apply_filters(
										'critique_filter_post_meta_cat_separator',
										'<span class="post_meta_item_cat_separator">' . ( ! isset( $args['cat_sep'] ) || ! empty( $args['cat_sep'] ) ? ', ' : ' ' ) . '</span>',
										$args
										)
									)
								: apply_filters( 'critique_filter_get_post_categories', '' );
				if ( ! empty( $cats ) ) {
					critique_show_layout( $cats, 
											'<span class="post_meta_item post_categories' 
												. ( ! isset( $args['cat_sep'] ) || ! empty( $args['cat_sep'] ) ? ' cat_sep' : '' )
												. '">',
											'</span>'
										);
				}
			} elseif ( 'date' == $comp || ( 'modified' == $comp && get_post_type() != 'post' ) ) {
				// Published date
				$dt = apply_filters( 'critique_filter_get_post_date', critique_get_date( '', ! empty( $args['date_format'] ) ? $args['date_format'] : '' ) );
				if ( ! empty( $dt ) && ( empty( $dt_last ) || $dt_last != $dt ) ) {
					critique_show_layout(
						$dt,
						'<span class="post_meta_item post_date' . ( ! empty( $args['seo'] ) ? ' date published' : '' ) . '"'
							. ( ! empty( $args['seo'] ) ? ' itemprop="datePublished"' : '' )
							. '>'
							. ( ! is_single() ? '<a href="' . esc_url( get_permalink() ) . '">' : '' )
							. ( in_array( 'date', $components ) && in_array( 'modified', $components ) && get_post_type() == 'post' ? '<span class="post_meta_item_label">' . esc_html__( 'Published:', 'critique' ) . '</span>' : '' ),
						( ! is_single() ? '</a>' : '' ) . '</span>'
					);
					$dt_last = $dt;
				}
			} elseif ( 'modified' == $comp && get_post_type() == 'post' ) {
				// Modified date
				$dt = apply_filters( 'critique_filter_get_post_modified_date', critique_get_date( get_post_modified_time( 'U' ), ! empty( $args['date_format'] ) ? $args['date_format'] : '' ) );
				if ( ! empty( $dt ) && ( empty( $dt_last ) || $dt_last != $dt ) ) {
					critique_show_layout(
						$dt,
						'<span class="post_meta_item post_date' . ( ! empty( $args['seo'] ) ? ' date updated modified' : '' ) . '"'
							. ( ! empty( $args['seo'] ) ? ' itemprop="dateModified"' : '' )
							. '>'
							. ( ! is_single() ? '<a href="' . esc_url( get_permalink() ) . '">' : '' )
							. '<span class="post_meta_item_label">' . esc_html__( 'Updated:', 'critique' ) . '</span>',
						( ! is_single() ? '</a>' : '' ) . '</span>'
					);
					$dt_last = $dt;
				}
			} elseif ( 'author' == $comp ) {
				// Post author
				$author_id = get_the_author_meta( 'ID' );
				if ( empty( $author_id ) && ! empty( $GLOBALS['post']->post_author ) ) {
					$author_id = $GLOBALS['post']->post_author;
				}
				if ( $author_id > 0 ) {
					$author_link   = get_author_posts_url( $author_id );
					$author_name   = get_the_author_meta( 'display_name', $author_id );
					$author_avatar = ! empty( $args['author_avatar'] )
										? get_avatar( get_the_author_meta( 'user_email', $author_id ), apply_filters( 'critique_filter_author_avatar_size', 56, 'post_meta' ) * critique_get_retina_multiplier() ) 
										: '';
					echo '<a class="post_meta_item post_author" rel="author" href="' . esc_url( $author_link ) . '">'
							. apply_filters( 'critique_filter_post_author_content',
								'<span class="post_author_by">' . esc_html__( 'By', 'critique' ) . '</span>'
								. ( ! empty( $author_avatar )
									? sprintf( '<span class="post_author_avatar">%s</span>', $author_avatar )
									: ''
									)
								. '<span class="post_author_name">' . esc_html( $author_name ) . '</span>',
								$author_avatar,
								$author_name
								)
						. '</a>';
				}

			} else if ( 'comments' == $comp ) {
				// Comments
				if ( !is_single() || have_comments() || comments_open() ) {
					$post_comments = get_comments_number();
					echo '<a href="' . esc_url( get_comments_link() ) . '" class="post_meta_item post_meta_comments icon-comment-light">'
							. '<span class="post_meta_number">' . esc_html( critique_num2size( $post_comments ) ) . '</span>'
							. ( $args['show_labels'] ? '<span class="post_meta_label">' . esc_html( _n( 'Comment', 'Comments', $post_comments, 'critique' ) ) . '</span>' : '' )
						. '</a>';
				}

			// Views
			} else if ( 'views' == $comp ) {
				if ( function_exists( 'trx_addons_get_post_views' ) ) {
					$post_views = trx_addons_get_post_views();
					echo '<a href="' . esc_url( get_permalink() ) . '" class="post_meta_item post_meta_views trx_addons_icon-eye">'
							. '<span class="post_meta_number">' . esc_html( critique_num2size( $post_views ) ) . '</span>'
							. ( $args['show_labels'] ? '<span class="post_meta_label">' . esc_html( _n( 'View', 'Views', $post_views, 'critique' ) ) . '</span>' : '' )
						. '</a>';
				}

			// Likes (Emotions)
			} else if ( 'likes' == $comp ) {
				if ( function_exists( 'trx_addons_get_post_likes' ) ) {
					$emotions_allowed = trx_addons_is_on( trx_addons_get_option( 'emotions_allowed' ) );
					if ( $emotions_allowed ) {
						$post_emotions = trx_addons_get_post_emotions();
						$post_likes = 0;
						if ( is_array( $post_emotions ) ) {
							foreach ( $post_emotions as $v ) {
								$post_likes += (int) $v;
							}
						}
					} else {
						$post_likes = trx_addons_get_post_likes();
					}
					$liked = isset( $_COOKIE['trx_addons_likes'] ) ? $_COOKIE['trx_addons_likes'] : '';
					$allow = strpos( sprintf( ',%s,', $liked ), sprintf( ',%d,', get_the_ID() ) ) === false;
					echo ( true == $emotions_allowed
							? '<a href="' . esc_url( trx_addons_add_hash_to_url( get_permalink(), 'trx_addons_emotions' ) ) . '"'
								. ' class="post_meta_item post_meta_emotions trx_addons_icon-angellist">'
							: '<a href="#"'
								. ' class="post_meta_item post_meta_likes trx_addons_icon-heart' . ( ! empty( $allow ) ? '-empty enabled' : ' disabled' ) . '"'
								. ' title="' . ( ! empty( $allow ) ? esc_attr__( 'Like', 'critique') : esc_attr__( 'Dislike', 'critique' ) ) . '"'
								. ' data-postid="' . esc_attr( get_the_ID() ) . '"'
								. ' data-likes="' . esc_attr( $post_likes ) . '"'
								. ' data-title-like="' . esc_attr__( 'Like', 'critique') . '"'
								. ' data-title-dislike="' . esc_attr__( 'Dislike', 'critique' ) . '"'
								. '>'
							)
								. '<span class="post_meta_number">' . esc_html( critique_num2size( $post_likes ) )  . '</span>'
								. ( $args['show_labels']
									? '<span class="post_meta_label">'
										. ( true == $emotions_allowed
											? esc_html( _n( 'Reaction', 'Reactions', $post_likes, 'critique' ) )
											: esc_html( _n( 'Like', 'Likes', $post_likes, 'critique' ) )
											)
									. '</span>'
									: '' )
							. '</a>';
				}

			} elseif ( 'share' == $comp ) {
				// Socials share
				critique_show_share_links( apply_filters( 'critique_filter_share_links_args', 
					array(
						'type'      => $args['share_type'],
						'wrap'      => 'span',
						'direction' => $args['share_direction'],
						'caption'   => 'drop' == $args['share_type']
											? apply_filters( 'critique_filter_share_links_text', esc_html__( 'Share', 'critique' ) )
											: '',
						'before'    => '<span class="post_meta_item post_share">',
						'after'     => '</span>',
					)
				) );

			} elseif ( 'edit' == $comp ) {
				// Edit page link
				edit_post_link( esc_html__( 'Edit', 'critique' ), '', '', 0, 'post_meta_item post_edit icon-pencil' );

			} else {
				// Custom counter
				do_action( 'critique_action_show_post_meta', $comp, get_the_ID(), $args );
			}
			// Spaces between post_items
			if ( ! empty( $args['add_spaces'] ) ) {
				echo ' ';
			}
		}

		$rez = ob_get_contents();
		ob_end_clean();

		if ( ! empty( trim( $rez ) ) ) {
			$rez = '<' . esc_attr( $args['tag'] ) . ' class="post_meta' . ( ! empty( $args['class'] ) ? ' ' . esc_attr( $args['class'] ) : '' ) . '">'
						. trim( $rez )
					. '</' . esc_attr( $args['tag'] ) . '>';
			if ( $args['echo'] ) {
				critique_show_layout( $rez );
				$rez = '';
			}
		}

		return $rez;
	}
}

// Show post featured block: image, video, audio, etc.
if ( ! function_exists( 'critique_show_post_featured' ) ) {
	function critique_show_post_featured( $args = array() ) {
		$args = apply_filters( 'critique_filter_post_featured_args', array_merge(
			array(
				'popup'         => ! is_single() && critique_get_theme_option( 'video_in_popup' ),  // Open video in popup
				'hover'         => critique_get_theme_option( 'image_hover' ),     // Hover effect
				'parallax'      => critique_get_theme_option( 'single_parallax' ), // Parallax speed. If 0 - no parallax effect is used
				'no_links'      => false,                                         // Disable links
				'link'          => '',                                            // Alternative (external) link
				'class'         => '',                                            // Additional Class for featured block
				'data'          => array(),                                       // Data parameters
				'post_info'     => '',                                            // Additional layout after hover
				'post_meta'     => false,                                         // Post meta from caller to prevent new queries
				'meta_parts'    => array(),                                       // String with comma separated meta parts
				'thumb_bg'      => false,                                         // Put thumb image as block background or as separate tag
				'thumb_size'    => '',                                            // Image size
				'thumb_ratio'   => '',                                            // Image's ratio for the slider
				'thumb_only'    => false,                                         // Display only thumb (without post formats)
				'show_no_image' => critique_is_on( critique_get_theme_setting( 'allow_no_image' ) ),  // Display 'no-image.jpg' if post haven't thumbnail
				'video'         => '',                                            // Video layout
				'autoplay'      => false,                                         // Autoplay video (if present)
				'seo'           => critique_is_on( critique_get_theme_option( 'seo_snippets' ) ),     // Add SEO-snippets
				'singular'      => false                                          // Current page is singular (true) or blog/shortcode (false)
			), $args
		) );
		if ( post_password_required() ) {
			return;
		}

		$post_format = str_replace( 'post-format-', '', get_post_format() );
		if ( empty( $post_format ) ) {
			$post_format = 'standard';
		}

		$show_video_player = false;
		$videos            = false;
		$show_audio_player = false;
		$audios            = false;
		$show_gallery      = false;
		$gallery_images    = false;
		
		$post_meta         = $args['post_meta'];

		$thumb_size        = ! empty( $args['thumb_size'] )
								? $args['thumb_size']
								: critique_get_thumb_size( is_attachment() || is_single() ? 'full' : 'big' );
		$has_thumb         = has_post_thumbnail();
		$thumb_id          = 0;

		$parallax          = ! empty( $args['parallax'] ) && is_singular('post') && ! in_array( $post_format, array( 'audio', 'video', 'gallery' ) )
								? $args['parallax']
								: 0;

		if ( 'audio' == $post_format ) {
			$audios = critique_get_post_audio_list();
			if ( ! empty( $audios[0]['cover'] ) ) {
				$has_thumb = true;
				$thumb_id  = critique_attachment_url_to_postid( $audios[0]['cover'] );
				if ( empty( $args['thumb_size'] ) ) {
					$ts = critique_detect_thumb_size( $audios[0]['cover'] );
					if ( ! empty( $ts ) ) {
						$thumb_size = $ts;
					}
				}
			}
		} elseif ( 'video' == $post_format ) {
			$videos = critique_get_post_video_list();
			if ( $post_meta === false ) {
				$post_meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
			}
			if ( ( ! empty( $args['singular'] ) && ! empty( $post_meta['video_without_cover'] ) ) || ! empty( $args['autoplay'] ) ) {
				$has_thumb             = false;
				$args['thumb_bg']      = false;
				$args['show_no_image'] = false;
			} elseif ( ( empty( $args['singular'] ) || empty( $post_meta['video_without_cover'] ) ) && ! empty( $videos[0]['image'] ) && empty( $args['autoplay'] ) ) {
				$has_thumb = true;
				$thumb_id  = critique_attachment_url_to_postid( $videos[0]['image'] );
				if ( empty( $args['thumb_size'] ) ) {
					$ts = critique_detect_thumb_size( $videos[0]['image'] );
					if ( ! empty( $ts ) ) {
						$thumb_size = $ts;
					}
				}				
			}
		} elseif ( ! empty( $args['video']) && ! empty( $args['autoplay'] ) ) {
			$has_thumb             = false;
			$args['thumb_bg']      = false;
			$args['show_no_image'] = false;			
		}
		if ( empty( $thumb_id ) && $has_thumb ) {
			$thumb_id = get_post_thumbnail_id( get_the_ID() );
		}
		$args['thumb_id'] = $thumb_id;
		$args['thumb_size'] = $thumb_size;

		$no_image = ! empty( $args['show_no_image'] ) ? critique_get_no_image( '', true ) : '';

		if ( $parallax ) {
			$args['thumb_bg'] = false;
		}

		if ( $args['thumb_bg'] ) {
			if ( $has_thumb ) {
				$image = wp_get_attachment_image_src( $thumb_id, $thumb_size );
				$image = empty( $image[0] ) ? '' : $image[0];
			} elseif ( 'image' == $post_format ) {
				$image = critique_get_post_image();
				if ( ! empty( $image ) ) {
					$image = critique_add_thumb_size( $image, $thumb_size );
				}
			}
			if ( empty( $image ) ) {
				$image = $no_image;
			}
			if ( ! empty( $image ) ) {
				$args['thumb_bg_class'] = 'post_featured_bg';
				$args['thumb_bg_image'] = critique_add_inline_css_class( 'background-image: url(' . esc_url( $image ) . ');' );
			} else {
				$args['thumb_bg'] = false;
			}
		}

		if ( ! empty( $args['singular'] ) ) {

			if ( is_attachment() ) {
				?>
				<div class="post_featured post_attachment
					<?php
					echo ( ! empty( $args['class'] ) ? ' ' . esc_attr( $args['class'] ) : '' )
						. ( ! empty( $args['thumb_bg_class'] ) ? ' ' . esc_attr( $args['thumb_bg_class'] ) . ' ' . esc_attr( $args['thumb_bg_image'] ) : '' );
					?>
				">
				<?php
				do_action('critique_action_before_featured');
				if ( ! $args['thumb_bg'] ) {
					echo wp_get_attachment_image(
							get_the_ID(),
							$thumb_size,
							false,
							critique_is_on( critique_get_theme_option( 'seo_snippets' ) )
								? array( 'itemprop' => 'image' )
								: ''
					);
				}
				if ( critique_get_theme_setting( 'attachments_navigation' ) ) {
					?>
						<nav id="image-navigation" class="navigation image-navigation">
							<div class="nav-previous"><?php previous_image_link( false, '' ); ?></div>
							<div class="nav-next"><?php next_image_link( false, '' ); ?></div>
						</nav>
						<?php
				}
				do_action('critique_action_after_featured');
				?>
				</div>
				<?php
				if ( has_excerpt() ) {
					?>
					<div class="entry-caption"><?php the_excerpt(); ?></div>
					<?php
				}
			} else {
				if ( 'video' == $post_format ) {
					if ( function_exists( 'trx_addons_sc_widget_video_list' ) ) {
						if ( ! empty( $videos ) && is_array( $videos ) ) {
							if ( count( $videos ) > 1 ) {
								$args['thumb_bg']  = false;
								$show_video_player = true;
							} elseif ( empty( $args['post_info'] ) && ! empty( $videos[0]['title'] ) ) {
								$args['post_info'] = apply_filters(
														'critique_filter_video_post_info',
									 					'<div class="post_info post_info_video">'
															. ( ! empty( $videos[0]['subtitle'] ) ? '<div class="post_info_subtitle">' . $videos[0]['subtitle'] . '</div>' : '' )
															. '<h3 class="post_info_title">' . $videos[0]['title'] . '</h3>'
															. ( ! empty( $videos[0]['meta'] ) ? '<div class="post_info_meta">' . $videos[0]['meta'] . '</div>' : '' )
														. '</div>',
														$videos[0],
														$args
													);
							}
						}
					}
				} elseif ( 'audio' == $post_format ) {
					if ( function_exists( 'trx_addons_sc_widget_audio' ) ) {
						if ( ! empty( $audios ) && is_array( $audios ) && count( $audios ) > 0 ) {
							$show_audio_player = true;
						}
					}
				} elseif ( 'gallery' == $post_format ) {
					if ( $post_meta === false ) {
						$post_meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
					}
					if ( ! empty( $post_meta['gallery_list'] ) ) {
						$gallery_images   = explode( '|', $post_meta['gallery_list'] );
						$args['thumb_bg'] = false;
						$show_gallery     = true;
					}
				}
				if ( ( ( $has_thumb || ! empty( $args['show_no_image'] ) ) && ! critique_sc_layouts_showed( 'featured' ) )
						|| $show_video_player || ! empty( $videos )
						|| $show_audio_player
						|| $show_gallery
				) {
					$output = '<div class="'
									. apply_filters( 'critique_filter_post_featured_classes',
										'post_featured'
										. ( $args['class'] ? ' ' . esc_attr( $args['class'] ) : '' )
										. ( $show_video_player
											? ( ' with_video with_video_list'
												. ( ! empty( $args['class_avg'] )  ? ' ' . esc_attr( $args['class_avg'] ) : '' )
												)
											: ( $show_audio_player
												? ( ' with_audio'
													. ( $has_thumb || ! empty( $args['show_no_image'] ) ? ' with_thumb' : ' without_thumb' )
													. ( ! empty( $args['thumb_bg_class'] ) ? ' ' . esc_attr( $args['thumb_bg_class'] ) . ' ' . esc_attr( $args['thumb_bg_image'] ) : '' )
													. ( ! empty( $args['class_avg'] )  ? ' ' . esc_attr( $args['class_avg'] ) : '' )
													)
												: ( $show_gallery
													? ( ' with_gallery'
														. ( ! empty( $args['class_avg'] )  ? ' ' . esc_attr( $args['class_avg'] ) : '' )
														)
													: (
														  ( $has_thumb || ! empty( $args['show_no_image'] )
														  	? ' with_thumb' . ( $parallax
														  							? ' sc_parallax_wrap sc_parallax_direction_' . ( $parallax < 0 ? 'up' : 'down' )
														  							: ''
														  							)
														  	: ' without_thumb'
														  	)
														. ( ! empty( $args['thumb_bg_class'] )
															? ' ' . esc_attr( $args['thumb_bg_class'] ) . ' ' . esc_attr( $args['thumb_bg_image'] )
															: ''
															)
														. ( ! empty( $args['video'] ) || ( in_array( $post_format, array( 'video' ) ) && ( ! empty( $videos[0]['video_url'] ) || ! empty( $videos[0]['video_embed'] ) ) )
															? ( ' with_video'
																. ( $has_thumb || ! empty( $args['show_no_image'] )
																	? ' hover_play'
																	: ( ! empty( $args['class_avg'] )  ? ' ' . esc_attr( $args['class_avg'] ) : '' )
																	)
																)
															: ''
															)
														)
													)
												)
											),
										$args,
										'singular'
									)
									. '"';

					if ( $args['seo'] ) {
						$output .= ' itemscope="itemscope" itemprop="image" itemtype="' . esc_attr( critique_get_protocol( true ) ) . '//schema.org/ImageObject"';
					}
					if ( empty( $args['data'] ) || ! is_array( $args['data'] ) ) {
						$args['data'] = array();
					}
					if ( ! empty( $args['thumb_bg'] ) && ! empty( $args['thumb_ratio'] ) ) {
						$args['data']['ratio'] = $args['thumb_ratio'];
					}
					if ( $parallax ) {
						$args['data']['parallax'] = $parallax;
					}
					$args['data'] = apply_filters( 'critique_filter_post_featured_data', $args['data'], $args, 'singular' );
					if ( ! empty( $args['data'] ) && is_array( $args['data'] ) ) {
						foreach( $args['data'] as $k => $v ) {
							$output .= ' data-' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
						}
					}
					$output .= '>';
					critique_show_layout( $output );

					do_action('critique_action_before_featured');

					if ( $has_thumb && $args['seo'] ) {
						$critique_attr = critique_getimagesize( wp_get_attachment_url( $thumb_id ) );
						?>
						<meta itemprop="width" content="<?php echo esc_attr( $critique_attr[0] ); ?>">
						<meta itemprop="height" content="<?php echo esc_attr( $critique_attr[1] ); ?>">
						<?php
					}
					if ( ! $args['thumb_bg'] && ! $show_video_player && ! $show_gallery ) {
						$atts = array();
						if ( critique_is_on( critique_get_theme_option( 'seo_snippets' ) ) ) {
							$atts['itemprop'] = 'url';
						}
						if ( is_numeric( $thumb_id ) && (int) $thumb_id > 0 ) {
							echo wp_get_attachment_image( $thumb_id, $thumb_size, false, $atts );
						} elseif ( $has_thumb && ( 'video' != $post_format || empty( $post_meta['video_without_cover'] ) ) ) {	// $has_thumb instead has_post_thumbnail() is used to prevent to show image under the video
							the_post_thumbnail( $thumb_size, $atts );
						} elseif ( ! empty( $no_image ) ) {
							?>
							<img
								<?php
								if ( $args['seo'] ) {
									echo ' itemprop="url"';
								}
								?>
								src="<?php echo esc_url( $no_image ); ?>" alt="<?php the_title_attribute( '' ); ?>">
							<?php
						}
					}
					// Add audio, video or gallery
					critique_show_post_avg( array_merge( $args, compact( 'post_format', 'has_thumb', 'thumb_id', 'thumb_size', 'videos', 'audios', 'gallery_images', 'post_meta' ) ) );
					// Put optional info block over the thumb
					critique_show_layout( $args['post_info'] );
					do_action('critique_action_after_featured');
					echo '</div>';
				}
			}

		} else {

			if ( $has_thumb
				|| ! empty( $args['show_no_image'] )
				|| ( ! empty( $args['video'] ) && ! empty( $args['autoplay'] ) )
				|| ( ! $args['thumb_only']
						&& ( in_array( $post_format, array( 'image', 'audio', 'video' ) )
							|| ( 'gallery' == $post_format && critique_exists_trx_addons() )
							)
					)
			) {
				$output = '<div class="'
									. apply_filters( 'critique_filter_post_featured_classes',
										'post_featured'
										. ( ! empty( $has_thumb ) || 'image' == $post_format || ! empty( $args['show_no_image'] )
											? ( ' with_thumb'
												. ' hover_' . esc_attr( $args['hover'] )
												. ( in_array( $post_format, array( 'video' ) ) || ! empty( $args['video'] )
													? ' hover_play'
													: ''
													)
												)
											: ' without_thumb'
												. ( ! empty( $args['video']) && ! empty( $args['autoplay'] )
													? ' hover_' . esc_attr( $args['hover'] )
													: ''
													)
											)
										. ( ! empty( $args['class'] ) ? ' ' . esc_attr( $args['class'] ) : '' )
										. ( ! empty( $args['thumb_bg_class'] ) ? ' ' . $args['thumb_bg_class'] : '' ),
										$args,
										'blog' )
									. '"';
				if ( ! empty( $args['thumb_bg'] ) && ! empty( $args['thumb_ratio'] ) ) {
					$args['data']['ratio'] = $args['thumb_ratio'];
				}
				$args['data'] = apply_filters( 'critique_filter_post_featured_data', $args['data'], $args, 'blog' );
				if ( ! empty( $args['data'] ) && is_array( $args['data'] ) ) {
					foreach( $args['data'] as $k => $v ) {
						$output .= ' data-' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
					}
				}
				$output .= '>';
				critique_show_layout( $output );

				do_action('critique_action_before_featured');

				// Put the thumb or gallery or image or video from the post
				$show_hover = ! empty( $args['autoplay'] );
				$image_hover = '';
				if ( empty( $args['autoplay'] ) ) {
					if ( $args['thumb_bg'] ) {
						$show_hover = true;
						if ( ! empty( $args['thumb_bg_image'] ) ) {
							?><span class="post_thumb post_thumb_bg bg_in <?php echo esc_attr( $args['thumb_bg_image'] ); ?>"></span><?php
						}

					} elseif ( $has_thumb ) {
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( $thumb_size, array() );
						} elseif ( is_numeric( $thumb_id ) && (int) $thumb_id > 0 ) {
							echo wp_get_attachment_image( $thumb_id, $thumb_size, false, '' );
						}
						$show_hover = true;
					} elseif ( 'image' == $post_format ) {
						$image = critique_get_post_image();
						if ( ! empty( $image ) ) {
							$image = critique_add_thumb_size( $image, $thumb_size );
							?>
							<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title_attribute(''); ?>">
							<?php
							$show_hover = true;
						}
					} elseif ( ! empty( $args['show_no_image'] ) && ! empty( $no_image ) ) {
						?>
						<img src="<?php echo esc_url( $no_image ); ?>" alt="<?php the_title_attribute(''); ?>">
						<?php
						$show_hover = true;
					}
					
				}

				// Show hover
				if ( $show_hover ) {
					if ( ! empty( $args['hover'] ) ) {
						?>
						<div class="mask"></div>
						<?php
					}
					critique_hovers_add_icons(
						$args['hover'],
						array(
							'no_links'   => $args['no_links'],
							'link'       => $args['link'],
							'post_info'  => $args['post_info'],
							'meta_parts' => $args['meta_parts'],
							'image'      => $image_hover,
							'thumb_size' => $args['thumb_size'],
							'thumb_bg'   => $args['thumb_bg'],
						)
					);
				}

				// Add audio, video or gallery
				critique_show_post_avg( array_merge( $args, compact( 'post_format', 'has_thumb', 'thumb_id', 'thumb_size', 'videos', 'audios' ) ) );

				// Put optional info block over the thumb
				if ( ! $show_hover ) {
					critique_show_layout( $args['post_info'] );
				}

				// Close div.post_featured
				do_action('critique_action_after_featured');
				echo '</div>';

			} else {
				// Put optional info block over the thumb
				critique_show_layout( $args['post_info'] );
			}
		}
	}
}


// Show audio, video or gallery inside featured image
if ( ! function_exists( 'critique_show_post_avg' ) ) {
	function critique_show_post_avg( $args ) {

		if ( ! $args['thumb_only'] && ( in_array( $args['post_format'], array( 'video', 'audio', 'gallery' ) ) || ! empty( $args['video'] ) ) ) {
			
			$post_content = critique_get_post_content();
			$post_content_parsed = $post_content;

			if ( 'video' == $args['post_format'] || ! empty( $args['video'] ) ) {

				if ( ! empty( $args['singular'] ) 
						&& ! empty( $args['videos'] ) 
						&& is_array( $args['videos'] ) 
						&& count( $args['videos'] ) > 1 
						&& function_exists( 'trx_addons_sc_widget_video_list' )
				) {
					// If hide cover - remove images from list
					if ( ! empty( $args['post_meta']['video_without_cover'] ) ) {
						for ( $i = 0; $i < count( $args['videos'] ); $i++ ) {
							$args['videos'][ $i ]['image'] = '';
						}
					}
					?>
					<div class="post_video_list">
						<?php
						critique_show_layout( trx_addons_sc_widget_video_list( array(
							'controller_style' => 'default', // Style of controller
							'controller_pos' => 'right',     // left | right | bottom - position of the slider controller
							'controller_height' => '',       // Height of the the controller
							'controller_autoplay' => ! empty( $args['post_meta']['video_autoplay'] ) ? 1 : 0,   // Autoplay video on click on the the controller item
							'autoplay' => ! empty( $args['post_meta']['video_autoplay'] ) ? 1 : 0,              // Autoplay video on page load
							'videos' => $args['videos'],
							'singular_extra' => ! empty( $args['singular'] )
						) ) );
						?>
					</div>
					<?php

				} else {

					if ( ! empty( $args['video'] ) ) {
						$video = $args['video'];
					} else if ( ! empty( $args['singular'] ) ) {
						$video = critique_get_post_video_list_first( true );
					} else if ( critique_get_theme_option( 'blog_content' ) != 'fullpost' ) {
						$video = critique_get_post_video( $post_content, false );
					}
					if ( empty( $args['singular'] ) ) {
						if ( empty( $video ) ) {
							$video = critique_get_post_iframe( $post_content, false );
						}
						if ( empty( $video ) ) {
							// Only get video from the content if a playlist isn't present.
							$post_content_parsed = critique_filter_post_content( $post_content );
							if ( false === strpos( $post_content_parsed, 'wp-playlist-script' ) ) {
								$videos = get_media_embedded_in_content( $post_content_parsed, array( 'video', 'object', 'embed', 'iframe' ) );
								if ( ! empty( $videos ) && is_array( $videos ) ) {
									$video = critique_array_get_first( $videos, false );
								}
							}
						}
					}
					if ( ! empty( $video ) ) {
						$video_out = false;
						if ( $args['has_thumb'] && ! empty( $args['popup'] ) && function_exists( 'trx_addons_get_video_layout' ) ) {
							$popup = explode(
											'<!-- .sc_layouts_popup -->',
											trx_addons_get_video_layout( array(
																			'link'  => '',
																			'embed' => $video,
																			'cover' => $args['thumb_id'],
																			'show_cover' => false,
																			'popup' => true
																			)
																		)
											);
							if ( ! empty( $popup[0] ) && ! empty( $popup[1] ) ) {
								if ( preg_match( '/<a .*<\/a>/', $popup[0], $matches ) && ! empty( $matches[0] ) ) {
									$video_out = true;
									?>
									<div class="post_video_hover post_video_hover_popup"><?php critique_show_layout( $matches[0] ); ?></div>
									<?php
									critique_show_layout($popup[1]);
								}
							}
						}
						if ( ! $video_out ) {
							if ( ! empty( $args['autoplay'] ) ) {
								$video = critique_make_video_autoplay( $video, true );
							} else if ( ! empty( $args['has_thumb'] ) ) {
								$video = critique_make_video_autoplay( $video );
								?>
								<div class="post_video_hover" data-video="<?php echo esc_attr( $video ); ?>"></div>
								<?php
							}
							do_action( 'critique_action_before_single_post_video', $args );
							?>
							<div class="post_video video_frame<?php if ( ! empty( $args['autoplay'] ) ) echo " with_video_autoplay"; ?>">
								<?php
								if ( empty( $args['has_thumb'] ) || ! empty( $args['autoplay'] ) ) {
									critique_show_layout( $video );
								}
								?>
							</div>
							<?php
							do_action( 'critique_action_after_single_post_video', $args );
						}
					}
				}

			} elseif ( 'audio' == $args['post_format'] ) {
				$media_author      = '';
				$media_title       = '';
				$media_description = '';
				$audio             = '';
				if ( ! empty( $args['audios'][0] ) ) {
					$media_author      = ! empty( $args['audios'][0]['author'] )      ? $args['audios'][0]['author']      : '';
					$media_title       = ! empty( $args['audios'][0]['caption'] )     ? $args['audios'][0]['caption']     : '';
					$media_description = ! empty( $args['audios'][0]['description'] ) ? $args['audios'][0]['description'] : '';
					$audio             = critique_get_post_audio_list_first( true );
				}
				if ( empty( $args['singular'] ) ) {
					if ( empty( $audio ) && critique_get_theme_option( 'blog_content' ) != 'fullpost' ) {
						$audio = critique_get_post_audio( $post_content, false );
						if ( empty( $audio ) ) {
							$audio = critique_get_post_iframe( $post_content, false );
						}
					}
					// Apply filters to get audio, title and author
					$post_content_parsed = critique_filter_post_content( $post_content );
					if ( empty( $audio ) && critique_get_theme_option( 'blog_content' ) != 'fullpost' ) {
						// Only get audio from the content if a playlist isn't present.
						if ( false === strpos( $post_content_parsed, 'wp-playlist-script' ) ) {
							$audios = get_media_embedded_in_content( $post_content_parsed, array( 'audio' ) );
							if ( ! empty( $audios ) && is_array( $audios ) ) {
								$audio = critique_array_get_first( $audios, false );
							}
						}
					}
				}
				if ( ! empty( $audio ) ) {
					?>
					<div class="post_audio
						<?php
						if ( strpos( $audio, 'soundcloud' ) !== false ) {
							echo ' with_iframe';
						}
						if ( ! empty( $args['singular'] ) && ! empty( $args['class_avg'] ) ) {
							echo ' ' . esc_attr( $args['class_avg'] );
						}
						?>
					">
						<?php
						// Get author and audio title
						if ( empty( $args['singular'] ) && empty( $media_author ) && empty( $media_title ) ) {
							if ( strpos( $audio, '<audio' ) !== false ) {
								$media_author = critique_get_tag_attrib( $audio, '<audio>', 'data-author' );
								$media_title  = critique_get_tag_attrib( $audio, '<audio>', 'data-caption' );
							}
							if ( empty( $media_author) &&  empty( $media_title) ) {
								$media = urldecode( critique_get_tag_attrib( $post_content, '[trx_widget_audio]', 'media' ) );
								if ( ! empty( $media ) ) {
									// Shortcode found in the content
								 	if ( '[{' == substr( $media, 0, 2 ) ) {
										$media = json_decode( $media, true );
										if ( is_array( $media ) ) {
											if ( !empty( $media[0]['author'] ) ) {
												$media_author = $media[0]['author'];
											}
											if ( !empty( $media[0]['caption'] ) ) {
												$media_title = $media[0]['caption'];
											}
										}
									}
								} else {
									// Parse tag params
									$media_author = strip_tags( critique_get_tag( $post_content_parsed, '<h6 class="audio_author">', '</h6>' ) );
									$media_title  = strip_tags( critique_get_tag( $post_content_parsed, '<h5 class="audio_caption">', '</h5>' ) );

								}
							}
						}
						if ( ! empty( $media_author) || ! empty( $media_title) ) {
							?>
							<div class="post_info_audio">
								<?php
								if ( ! empty( $media_author ) ) {
									critique_show_layout( $media_author, '<div class="post_audio_author">', '</div>' );
								}
								if ( ! empty( $media_title ) ) {
									critique_show_layout( $media_title, '<h5 class="post_audio_title">', '</h5>' );
								}
								if ( ! empty( $media_description ) ) {
									critique_show_layout( $media_description, '<div class="post_audio_description">', '</div>' );
								}
								?>
							</div>
							<?php
						}
						// Display audio
						critique_show_layout( $audio, '<div class="audio_wrap">', '</div>' );
						?>
					</div>
					<?php
				}

			} elseif ( 'gallery' == $args['post_format'] ) {
				$slider_args = array(
					'thumb_size'      => $args['thumb_size'],
					'controls'        => 'yes',
					'pagination'      => 'yes'
				);
				if ( ! empty( $args['singular'] ) ) {
					$slider_args = array_merge( $slider_args, array(
						'count'               => 999,
						'per_view'            => ! empty( $args['post_meta']['slides_per_view'] ) ? max( 1, min( 10, $args['post_meta']['slides_per_view'] ) ) : 1,
						'slides_space'        => ! empty( $args['post_meta']['slides_space'] ) ? max( 0, min( 100, $args['post_meta']['slides_space'] ) ) : 0,
						'slides_centered'     => ! empty( $args['post_meta']['slides_centered'] ) ? 'yes' : 'no',
						'slides_overflow'     => ! empty( $args['post_meta']['slides_overflow'] ) ? 'yes' : 'no',
						'mouse_wheel'         => ! empty( $args['post_meta']['mouse_wheel'] ) ? 'yes' : 'no',
						'controls'            => ! empty( $args['post_meta']['controls'] ) ? 'yes' : 'no',
						'pagination'          => ! empty( $args['post_meta']['pagination'] ) ? 'yes' : 'no',
						'pagination_type'     => ! empty( $args['post_meta']['pagination_type'] ) ? $args['post_meta']['pagination_type'] : 'bullets',
						'controller'          => ! empty( $args['post_meta']['controller'] ) ? $args['post_meta']['controller'] : 'no',
						'controller_pos'      => ! empty( $args['post_meta']['controller_pos'] ) ? $args['post_meta']['controller_pos'] : 'bottom',
						'controller_per_view' => ! empty( $args['post_meta']['controller_per_view'] ) ? $args['post_meta']['controller_per_view'] : 5,
						'controller_space'    => ! empty( $args['post_meta']['controller_space'] ) ? $args['post_meta']['controller_space'] : 0,
						'controller_margin'   => ! empty( $args['post_meta']['controller_margin'] ) ? $args['post_meta']['controller_margin'] : 0,
						'controller_height'   => ! empty( $args['post_meta']['controller_height'] ) ? $args['post_meta']['controller_height'] : 100,
						)
					);
				}
				$slider_args['slides_ratio'] = ! empty( $args['thumb_ratio'] ) && ! in_array( $args['thumb_ratio'], array('none', 'masonry') )
													? $args['thumb_ratio']
													: '16:9';
				$output = critique_get_slider_layout( apply_filters( 'critique_filter_post_slider_args', $slider_args ) );
				if ( '' != $output ) {
					critique_show_layout( $output );
				}
			}
		}
	}
}


// Detect if content contains featured image
if ( ! function_exists( 'critique_is_with_featured_image' ) ) {
	function critique_is_with_featured_image( $content, $disabled=array() ) {
		$rez = strpos( $content, 'post_featured' ) !== false
				&& (
					strpos( $content, ' with_thumb' ) !== false
					||
					strpos( $content, ' with_gallery' ) !== false
					);
		$disabled = array_merge( array( 'with_video_list' ), $disabled );
		if ( $rez && count( $disabled ) > 0 ) {
			foreach( $disabled as $class ) {
				if ( ! empty( $class ) && strpos( $content, " {$class}" ) !== false ) {
					$rez = false;
					break;
				}
			}
		}
		return $rez;
	}
}


// Return path to the 'no-image'
if ( ! function_exists( 'critique_get_no_image' ) ) {
	function critique_get_no_image( $no_image = '', $need = false ) {
		static $no_image_url = '';
		$img = critique_get_theme_option( 'no_image' );
		if ( empty( $img ) && ( $need || critique_get_theme_setting( 'allow_no_image' ) ) ) {
			if ( empty( $no_image_url ) ) {
				$no_image_url = critique_get_file_url( 'images/no-image.jpg' );
			}
			$img = $no_image_url;
		}
		if ( ! empty( $img ) ) {
			$no_image = $img;
		}
		return $no_image;
	}
}


// Add featured image as background image to post navigation elements.
if ( ! function_exists( 'critique_add_bg_in_post_nav' ) ) {
	function critique_add_bg_in_post_nav() {
		if ( ! is_single() || ! critique_get_theme_setting( 'thumbs_in_navigation' ) ) {
			return;
		}

		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		$css      = '';
		$noimg    = critique_get_no_image();

		if ( is_attachment() && 'attachment' == $previous->post_type ) {
			return;
		}

		if ( $previous ) {
			$img = '';
			if ( has_post_thumbnail( $previous->ID ) ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), critique_get_thumb_size( 'med' ) );
				$img = empty( $img[0] ) ? '' : $img[0];
			} else {
				$img = $noimg;
			}
			if ( ! empty( $img ) ) {
				$css .= '.post-navigation .nav-previous a .nav-arrow { background-image: url(' . esc_url( $img ) . '); }';
			} else {
				$css .= apply_filters( 'critique_filter_post_navigation_previous_css',
										'.nav-links-single.nav-links-with-thumbs .nav-links .nav-previous a { padding-left: 0; }'
										. '.post-navigation .nav-previous a .nav-arrow { display: none !important; background-color: rgba(128,128,128,0.05); border: 1px solid rgba(128,128,128,0.1); }'
										. '.post-navigation .nav-previous a .nav-arrow:after { top: 0; opacity: 1; }'
									);
			}
		}

		if ( $next ) {
			$img = '';
			if ( has_post_thumbnail( $next->ID ) ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), critique_get_thumb_size( 'med' ) );
				$img = empty( $img[0] ) ? '' : $img[0];
			} else {
				$img = $noimg;
			}
			if ( ! empty( $img ) ) {
				$css .= '.post-navigation .nav-next a .nav-arrow { background-image: url(' . esc_url( $img ) . '); }';
			} else {
				$css .= apply_filters( 'critique_filter_post_navigation_next_css',
										'.nav-links-single.nav-links-with-thumbs .nav-links .nav-next a { padding-right: 0; }'
										. '.post-navigation .nav-next a .nav-arrow { display: none !important; background-color: rgba(128,128,128,0.05); border: 1px solid rgba(128,128,128,0.1); }'
										. '.post-navigation .nav-next a .nav-arrow:after { top: 0; opacity: 1; }'
									);
			}
		}

		critique_add_inline_css( $css );
	}
}

// Show related posts
if ( ! function_exists( 'critique_show_related_posts' ) ) {
	function critique_show_related_posts( $args = array(), $style = 1, $title = '' ) {
		$args = array_merge(
			array(
				//  Attention! Parameter 'suppress_filters' is damage WPML-queries!
				'ignore_sticky_posts' => true,
				'posts_per_page'      => 2,
				'columns'             => 0,
				'orderby'             => 'rand',
				'order'               => 'DESC',
				'post_type'           => '',
				'post_status'         => 'publish',
				'post__not_in'        => array(),
				'category__in'        => array(),
			), $args
		);

		if ( empty( $args['post_type'] ) ) {
			$args['post_type'] = get_post_type();
		}

		$taxonomy = 'post' == $args['post_type'] ? 'category' : critique_get_post_type_taxonomy();

		$args['post__not_in'][] = get_the_ID();

		if ( empty( $args['columns'] ) ) {
			$args['columns'] = $args['posts_per_page'];
		}

		if ( empty( $args['category__in'] ) || is_array( $args['category__in'] ) && count( $args['category__in'] ) == 0 ) {
			$post_categories_ids = array();
			$post_cats           = get_the_terms( get_the_ID(), $taxonomy );
			if ( is_array( $post_cats ) && ! empty( $post_cats ) ) {
				foreach ( $post_cats as $cat ) {
					$post_categories_ids[] = $cat->term_id;
				}
			}
			$args['category__in'] = $post_categories_ids;
		}

		if ( 'post' != $args['post_type'] && count( $args['category__in'] ) > 0 ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_taxonomy_id',
					'terms'    => $args['category__in'],
				),
			);
			unset( $args['category__in'] );
		}

		$query = new WP_Query( $args );

		if ( $query->found_posts > 0 ) {
			$slider_args = array();
			$columns = intval( max( 1, min( 6, $args['columns'] ) ) );
			$args['slider'] = (int) critique_get_theme_option( 'related_slider' ) && min( $args['posts_per_page'], $query->found_posts) > $columns;
			$related_position = critique_get_theme_option( 'related_position' );
			$related_style = critique_get_theme_option( 'related_style' );
			$related_tag = strpos( $related_position, 'inside' ) === 0 ? 'h5' : 'h3';
			if ( in_array( $related_position, array( 'inside_left', 'inside_right' ) ) ) {
				$columns = 1;
			}
			?>
			<section class="related_wrap related_position_<?php echo esc_attr( $related_position ); ?> related_style_<?php echo esc_attr( $related_style ); ?>">
				<<?php echo esc_html( $related_tag ); ?> class="section_title related_wrap_title"><?php
					if ( ! empty( $title ) ) {
						echo esc_html( $title );
					} else {
						esc_html_e( 'You May Also Like', 'critique' );
					}
				?></<?php echo esc_html( $related_tag ); ?>><?php
				if ( $args['slider'] ) {
					$slider_args                      = $args;
					$slider_args['count']             = max(1, $query->found_posts);
					$slider_args['slides_min_width']  = 250;
					$slider_args['slides_space']      = critique_get_theme_option( 'related_slider_space' );
					$slider_args['slider_controls']   = critique_get_theme_option( 'related_slider_controls' );
					$slider_args['slider_pagination'] = critique_get_theme_option( 'related_slider_pagination' );
					$slider_args                      = apply_filters( 'critique_related_posts_slider_args', $slider_args, $query );
					?><div class="related_wrap_slider"><?php
					critique_get_slider_wrap_start('related_posts_wrap', $slider_args);
				} else {
					?><div class="columns_wrap posts_container columns_padding_bottom"><?php
				}
					while ( $query->have_posts() ) {
						$query->the_post();
						if ( $args['slider'] ) {
							?><div class="slider-slide swiper-slide"><?php
						} else {
							?><div class="column-1_<?php echo intval( max( 1, min( 6, $columns ) ) ); ?>"><?php
						}
						if ( ! apply_filters( 'critique_filter_related_post_showed', false, $args, $style ) ) {
							get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/related-posts', $style ), $style );
						}
						?></div><?php
					}
				?></div><?php
				if ( $args['slider'] ) {
					critique_get_slider_wrap_end('related_posts_wrap', $slider_args);
					?></div><?php
				}
				wp_reset_postdata();
				?>
			</section>
			<?php
		}
	}
}

// Callback for action 'Related posts'
if ( ! function_exists( 'critique_show_related_posts_callback' ) ) {
	add_action( 'critique_action_related_posts', 'critique_show_related_posts_callback' );
	function critique_show_related_posts_callback() {
		if ( is_single() && ! apply_filters( 'critique_filter_show_related_posts', false ) ) {
			$critique_related_posts   = (int) critique_get_theme_option( 'related_posts' );
			$critique_related_columns = (int) critique_get_theme_option( 'related_columns' );
			$critique_related_style   = critique_get_theme_option( 'related_style' );
			if ( (int) critique_get_theme_option( 'show_related_posts' ) && $critique_related_posts > 0 ) {
				critique_show_related_posts(
					array(
						'orderby'        => 'rand',
						'posts_per_page' => max( 1, min( 9, $critique_related_posts ) ),
						'columns'        => max( 1, min( 6, $critique_related_posts, $critique_related_columns ) ),
					),
					$critique_related_style
				);
			}
		}
	}
}


// Return true if blog style use masonry
if ( ! function_exists( 'critique_is_blog_style_use_masonry' ) ) {
	function critique_is_blog_style_use_masonry( $style ) {
		$blog_styles = critique_storage_get( 'blog_styles' );
		return ! empty( $blog_styles[ $style ][ 'scripts' ] ) && in_array( 'masonry', (array) $blog_styles[ $style ][ 'scripts'] );
	}
}

// Show tabs with blog filters
if ( ! function_exists( 'critique_show_filters' ) ) {
	function critique_show_filters( $args = array() ) {
		$args = array_merge(
			array(
				'post_type'  => '',
				'taxonomy'   => '',
				'parent_cat' => 0,
				'posts_per_page' => 0,
			), $args
		);
		// Query terms
		$query_args = array(
			'type'         => ! empty( $args['post_type'] ) ? $args['post_type'] : 'post',
			'taxonomy'     => ! empty( $args['taxonomy'] ) ? $args['taxonomy'] : 'category',
			'child_of'     => $args['parent_cat'],
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'pad_counts'   => false,
		);
		$terms = get_terms( $query_args );
		$tabs = array();
		if ( is_array( $terms ) && count( $terms ) > 0 ) {
			$tabs[ $args['parent_cat'] ] = esc_html__( 'All', 'critique' );
			foreach ( $terms as $term ) {
				if ( isset( $term->term_id ) ) {
					$tabs[ $term->term_id ] = $term->name;
				}
			}
		}
		if ( count( $tabs ) > 0 ) {
			$filters_ajax   = critique_get_theme_setting( 'blog_filters_use_ajax' );
			$filters_active = $args['parent_cat'];
			$filters_id     = 'critique_filters';
			?>
			<div class="critique_tabs critique_tabs_ajax critique_filters">
				<ul class="critique_tabs_titles">
					<?php
					foreach ( $tabs as $tab_id => $tab_title ) {
						?><li>
							<a href="<?php echo esc_url( critique_get_hash_link( sprintf( '#%1$s_%2$s_content', $filters_id, $tab_id ) ) ); ?>"
								data-tab="<?php echo esc_attr( $tab_id ); ?>"><?php
								echo esc_html( $tab_title );
							?></a>
						</li><?php
					}
					?>
				</ul>
				<?php
				foreach ( $tabs as $tab_id => $tab_title ) {
					$tab_need_content = $tab_id == $filters_active || ! $filters_ajax;
					?>
					<div id="<?php echo esc_attr( sprintf( '%1$s_%2$s_content', $filters_id, $tab_id ) ); ?>"
						class="critique_tabs_content"
						data-blog-template="<?php echo esc_attr( critique_storage_get( 'blog_template' ) ); ?>"
						data-blog-style="<?php echo esc_attr( $args['blog_style'] ); ?>"
						data-post-type="<?php echo esc_attr( $args['post_type'] ); ?>"
						data-taxonomy="<?php echo esc_attr( $args['taxonomy'] ); ?>"
						data-parent-cat="<?php echo esc_attr( $args['parent_cat'] ); ?>"
						data-cat="<?php echo esc_attr( $tab_id ); ?>"
						data-posts-per-page="<?php echo esc_attr( $args['posts_per_page'] ); ?>"
						data-need-content="<?php echo ( false === $tab_need_content ? 'true' : 'false' ); ?>"
					>
						<?php
						if ( $tab_need_content ) {
							critique_show_posts( array_merge( $args, array( 'cat' => $tab_id ) ) );
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		} else {
			critique_show_posts( array_merge( $args, array( 'cat' => $args['parent_cat'] ) ) );
		}
	}
}


// Show portfolio posts
if ( ! function_exists( 'critique_show_posts' ) ) {
	function critique_show_posts( $args = array() ) {
		$args = array_merge(
			array(
				'post_type'      => 'post',
				'taxonomy'       => 'category',
				'parent_cat'     => 0,
				'cat'            => 0,
				'posts_per_page' => (int) critique_get_theme_option( 'posts_per_page' ),
				'page'           => 1,
				'sticky'         => false,
				'blog_style'     => '',
				'echo'           => true,
			), $args
		);

		$blog_styles  = critique_storage_get( 'blog_styles' );

		$blog_style   = empty( $args['blog_style'] ) ? critique_get_theme_option( 'blog_style' ) : $args['blog_style'];
		$parts        = explode( '_', $blog_style );
		$style        = $parts[0];
		$columns      = empty( $parts[1] ) ? 1 : max( 1, $parts[1] );

		$custom_style = 'none';
		if ( strpos( $style, 'blog-custom-' ) === 0 ) {
			$custom_blog_id   = critique_get_custom_blog_id( $style );
			$custom_blog_meta = critique_get_custom_layout_meta( $custom_blog_id );
			if ( ! empty( $custom_blog_meta['margin'] ) ) {
				critique_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( critique_prepare_css_value( $custom_blog_meta['margin'] ) ) ) );
			}
			if ( ! empty( $custom_blog_meta['scripts_required'] ) ) {
				$custom_style = $custom_blog_meta['scripts_required'];
			}
		}

		if ( ! $args['echo'] ) {
			ob_start();

			$q_args = array(
				'post_status' => current_user_can( 'read_private_pages' ) && current_user_can( 'read_private_posts' )
										? array( 'publish', 'private' )
										: 'publish',
			);
			$q_args = critique_query_add_posts_and_cats( $q_args, '', $args['post_type'], $args['cat'], $args['taxonomy'] );
			if ( $args['page'] > 1 ) {
				$q_args['paged']               = $args['page'];
				$q_args['ignore_sticky_posts'] = true;
			}
			if ( 0 != $args['posts_per_page'] ) {
				$q_args['posts_per_page'] = $args['posts_per_page'];
			}

			// Make a new query
			$q             = 'wp_query';
			$GLOBALS[ $q ] = new WP_Query( $q_args );
		}

		// Disable lazy load for masonry
		if ( critique_is_blog_style_use_masonry( $style ) ) {
			critique_lazy_load_off();
		}

		// Show posts
		$class = 'posts_container'
				. sprintf( ' %1$s_wrap %1$s_%2$d', $style, $columns )
				. ( ! critique_is_off( $custom_style )
					? sprintf( ' %s_wrap', $custom_style ) . ( 'masonry' == $custom_style ? sprintf( ' masonry_%d', $columns ) : '' )
					: ( critique_is_blog_style_use_masonry( $style )
						?  sprintf( ' masonry_wrap masonry_%1$d', $columns )
						: ( $columns > 1
							? ' columns_wrap columns_padding_bottom'
							: ''
							)
						)
					);
		if ( $args['sticky'] ) {
			?>
			<div class="sticky_wrap columns_wrap">
			<?php
		} else {
			if ( critique_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( critique_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) && have_posts() ) {
				the_post();
				get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/content', 'excerpt' ), 'excerpt' );
			}
			?>
			<div class="<?php echo esc_attr( $class ); ?>">
			<?php
		}

		while ( have_posts() ) {
			the_post();
			if ( $args['sticky'] && ! is_sticky() ) {
				$args['sticky'] = false;
				?>
				</div><div class="<?php echo esc_attr( $class ); ?>">
				<?php
			}
			get_template_part( apply_filters( 'critique_filter_get_template_part', $args['sticky'] && is_sticky() ? 'templates/content-sticky' : critique_blog_item_get_template( $blog_style ) ) );
		}

		?>
		</div>
		<?php

		critique_show_pagination();

		if ( ! $args['echo'] ) {
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
}

// AJAX handler for the critique_ajax_get_posts action
if ( ! function_exists( 'critique_ajax_get_posts_callback' ) ) {
	add_action( 'wp_ajax_critique_ajax_get_posts', 'critique_ajax_get_posts_callback' );
	add_action( 'wp_ajax_nopriv_critique_ajax_get_posts', 'critique_ajax_get_posts_callback' );
	function critique_ajax_get_posts_callback() {

		critique_verify_nonce();

		$id = ! empty( $_REQUEST['blog_template'] ) ? wp_kses_data( wp_unslash( $_REQUEST['blog_template'] ) ) : 0;
		if ( (int) $id > 0 ) {
			critique_storage_set( 'blog_archive', true );
			critique_storage_set( 'blog_mode', 'blog' );
			critique_storage_set( 'options_meta', get_post_meta( $id, 'critique_options', true ) );
		}

		$response = array(
			'error' => '',
			'data'  => critique_show_posts(
				array(
					'cat'        => intval( wp_unslash( $_REQUEST['cat'] ) ),
					'parent_cat' => intval( wp_unslash( $_REQUEST['parent_cat'] ) ),
					'page'       => intval( wp_unslash( $_REQUEST['page'] ) ),
					'post_type'  => trim( wp_unslash( $_REQUEST['post_type'] ) ),
					'taxonomy'   => trim( wp_unslash( $_REQUEST['taxonomy'] ) ),
					'blog_style' => trim( wp_unslash( $_REQUEST['blog_style'] ) ),
					'echo'       => false,
				)
			),
			'css'  => critique_get_inline_css(),
		);

		if ( empty( $response['data'] ) ) {
			$response['error'] = esc_html__( 'Sorry, but nothing matched your search criteria.', 'critique' );
		}

		critique_ajax_response( $response );
	}
}


// Show pagination
if ( ! function_exists( 'critique_show_pagination' ) ) {
	function critique_show_pagination( $args = array() ) {
		global $wp_query;
		$pagination = ! empty( $args[ 'pagination' ] )
						? $args[ 'pagination' ]
						: critique_get_theme_option( 'blog_pagination' );
		$prefix     = ! empty( $args[ 'class_prefix' ] )
						? $args[ 'class_prefix' ]
						: 'nav';
		if ( 'pages' == $pagination ) {
			critique_show_layout( str_replace( "\n", '', get_the_posts_pagination(
				apply_filters( 'critique_filter_get_the_posts_pagination_args', array(
					'mid_size'           => 2,
					'prev_text'          => esc_html__( '<', 'critique' ),
					'next_text'          => esc_html__( '>', 'critique' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'critique' ) . ' </span>',
				) )
			) ) );
		} elseif ( 'more' == $pagination || 'infinite' == $pagination ) {
			$page_number = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
			if ( $page_number < $wp_query->max_num_pages ) {
				?>
				<div class="<?php echo esc_attr( $prefix ); ?>-links-more
					<?php
					if ( 'infinite' == $pagination ) {
						echo ' ' . esc_attr( $prefix ) . '-links-infinite';
					}
					?>
				">
					<a class="<?php echo esc_attr( apply_filters( 'critique_filter_load_more_class', "{$prefix}-load-more" ) ); ?>"
						href="#" 
						data-page="<?php echo esc_attr( $page_number ); ?>" 
						data-max-page="<?php echo esc_attr( $wp_query->max_num_pages ); ?>"
						<?php do_action( 'critique_action_load_more_data' ); ?>
						><span><?php esc_html_e( 'Load more posts', 'critique' ); ?></span></a>
				</div>
				<?php
			}
		} elseif ( 'links' == $pagination ) {
			?>
			<div class="<?php echo esc_attr( $prefix ); ?>-links-old">
				<span class="<?php echo esc_attr( $prefix ); ?>-prev"><?php previous_posts_link( is_search() ? esc_html__( 'Previous posts', 'critique' ) : esc_html__( 'Newest posts', 'critique' ) ); ?></span>
				<span class="<?php echo esc_attr( $prefix ); ?>-next"><?php next_posts_link( is_search() ? esc_html__( 'Next posts', 'critique' ) : esc_html__( 'Older posts', 'critique' ), $wp_query->max_num_pages ); ?></span>
			</div>
			<?php
		}
	}
}



// Return template for the single field in the comments
if ( ! function_exists( 'critique_single_comments_field' ) ) {
	function critique_single_comments_field( $args ) {
		$path_height = 'path' == $args['form_style']
							? ( 'text' == $args['field_type'] ? 75 : 190 )
							: 0;
		$html = '<div class="comments_field comments_' . esc_attr( $args['field_name'] ) . '">'
					. ( 'default' == $args['form_style'] && 'checkbox' != $args['field_type']
						? '<label for="' . esc_attr( $args['field_name'] ) . '" class="' . esc_attr( $args['field_req'] ? 'required' : 'optional' ) . '">' . esc_html( $args['field_title'] ) . '</label>'
						: ''
						)
					. '<span class="sc_form_field_wrap">';
		if ( 'text' == $args['field_type'] ) {
			$html .= '<input id="' . esc_attr( $args['field_name'] ) . '" name="' . esc_attr( $args['field_name'] ) . '" type="text"' . ( 'default' == $args['form_style'] ? ' placeholder="' . esc_attr( $args['field_placeholder'] ) . ( $args['field_req'] ? ' *' : '' ) . '"' : '' ) . ' value="' . esc_attr( $args['field_value'] ) . '"' . ( $args['field_req'] ? ' aria-required="true"' : '' ) . ' />';
		} elseif ( 'checkbox' == $args['field_type'] ) {
			$html .= '<input id="' . esc_attr( $args['field_name'] ) . '" name="' . esc_attr( $args['field_name'] ) . '" type="checkbox" value="' . esc_attr( $args['field_value'] ) . '"' . ( $args['field_req'] ? ' aria-required="true"' : '' ) . ' />'
					. ' <label for="' . esc_attr( $args['field_name'] ) . '" class="' . esc_attr( $args['field_req'] ? 'required' : 'optional' ) . '">' . wp_kses( $args['field_title'], 'critique_kses_content' ) . '</label>';
		} else {
			$html .= '<textarea id="' . esc_attr( $args['field_name'] ) . '" name="' . esc_attr( $args['field_name'] ) . '"' . ( 'default' == $args['form_style'] ? ' placeholder="' . esc_attr( $args['field_placeholder'] ) . ( $args['field_req'] ? ' *' : '' ) . '"' : '' ) . ( $args['field_req'] ? ' aria-required="true"' : '' ) . '></textarea>';
		}
		if ( 'default' != $args['form_style'] && in_array( $args['field_type'], array( 'text', 'textarea' ) ) ) {
			$html .= '<span class="sc_form_field_hover">'
						. ( 'path' == $args['form_style']
							? '<svg class="sc_form_field_graphic" preserveAspectRatio="none" viewBox="0 0 520 ' . intval( $path_height ) . '" height="100%" width="100%"><path d="m0,0l520,0l0,' . intval( $path_height ) . 'l-520,0l0,-' . intval( $path_height ) . 'z"></svg>'
							: ''
							)
						. ( 'iconed' == $args['form_style']
							? '<i class="sc_form_field_icon ' . esc_attr( $args['field_icon'] ) . '"></i>'
							: ''
							)
						. '<span class="sc_form_field_content" data-content="' . esc_attr( $args['field_title'] ) . '">' . wp_kses( $args['field_title'], 'critique_kses_content' ) . '</span>'
					. '</span>';
		}
		$html .= '</span></div>';
		return $html;
	}
}
