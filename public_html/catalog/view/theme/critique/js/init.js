/* global jQuery:false */
/* global CRITIQUE_STORAGE:false */

jQuery( document ).ready( function() {

	"use strict";

	var ready_busy = true;

	var theme_init_counter      = 0;

	var $window                 = jQuery( window ),
		_window_height          = $window.height(),
		_window_width           = $window.width(),
		_window_scroll_top      = $window.scrollTop(),
		$document               = jQuery( document ),
		_document_height        = $document.height(),
		$body                   = jQuery( 'body' ),
		$body_wrap              = jQuery( '.body_wrap' ),
		$page_wrap              = jQuery( '.page_wrap' ),
		$header                 = jQuery( '.top_panel' ),
		_header_height          = $header.length === 0 ? 0 : $header.height(),
		$footer                 = jQuery( '.footer_wrap' ),
		_footer_height          = $footer.length === 0 ? 0 : $footer.height(),
		$menu_side_wrap         = jQuery( '.menu_side_wrap' ),
		$menu_side_logo         = $menu_side_wrap.find( '.sc_layouts_logo' ),
		$adminbar               = jQuery( '#wpadminbar' ),
		_adminbar_height        = critique_adminbar_height(),
		_fixed_rows_height      = critique_fixed_rows_height();

	var $page_content_wrap,
		$content,
		$sidebar,
		// Single post parts
		$single_nav_links_fixed,
		$single_post_info_fixed,
		$single_post_scrollers,
		$stretch_width;

	// Update links after the new post added
	$document.on( 'action.new_post_added', update_jquery_links );
	$document.on( 'action.got_ajax_response', update_jquery_links );
	$document.on( 'action.init_hidden_elements', update_jquery_links );
	var first_run = true;
	function update_jquery_links(e) {
		if ( first_run && e && e.namespace == 'init_hidden_elements' ) {
			first_run = false;
			return; 
		}
		$page_content_wrap      = jQuery( '.page_content_wrap' );
		$content                = jQuery( '.content' );
		$sidebar                = jQuery( '.sidebar:not(.sidebar_fixed_placeholder)' );
		// Single post parts
		$single_nav_links_fixed = jQuery( '.nav-links-single.nav-links-fixed' );
		$single_post_info_fixed = jQuery( '.post_info_vertical.post_info_vertical_fixed' );
		$single_post_scrollers  = jQuery( '.nav-links-single-scroll' );
		$stretch_width          = jQuery( '.trx-stretch-width' );
	}
	update_jquery_links();

	// Update fixed rows height
	$document.on( 'action.sc_layouts_row_fixed_on', update_fixed_rows_height );
	$document.on( 'action.sc_layouts_row_fixed_off', update_fixed_rows_height );
	function update_fixed_rows_height() {
		_fixed_rows_height = critique_fixed_rows_height();
		if ( ! CRITIQUE_STORAGE['trx_addons_exists'] ) {
			document.querySelector('html').style.setProperty( '--fixed-rows-height', _fixed_rows_height+'px' );
		}
	}


	// Init actions
	//-----------------------------------

	// Init intersection observer
	critique_intersection_observer_init();

	// Init all other actions
	critique_init_actions();

	function critique_init_actions() {

		if (CRITIQUE_STORAGE['vc_edit_mode'] && jQuery( '.vc_empty-placeholder' ).length === 0 && theme_init_counter++ < 30) {
			setTimeout( critique_init_actions, 200 );
			return;
		}

		update_fixed_rows_height();

		// Resize handlers
		$window.on( 'resize', function() {
			critique_resize_actions();
		} );

		// Scroll handlers
		CRITIQUE_STORAGE['scroll_busy'] = true;
		$window.on( 'scroll', function() {
			if (window.requestAnimationFrame) {
				if ( ! CRITIQUE_STORAGE['scroll_busy']) {
					window.requestAnimationFrame( function() {
						critique_scroll_actions();
					});
					CRITIQUE_STORAGE['scroll_busy'] = true;
				}
			} else {
				critique_scroll_actions();
			}
		} );

		// First call to init core actions
		critique_ready_actions();
		critique_resize_actions();
		critique_scroll_actions();

		// Wait when logo is loaded
		if ( $body.hasClass( 'menu_side_present' ) ) {
			if ( $menu_side_logo.length > 0 && ! critique_is_images_loaded( $menu_side_logo ) ) {
				critique_when_images_loaded(
					$menu_side_logo, function() {
						critique_stretch_sidemenu();
					}
				);
			}
		}
	}   // critique_init_actions


	// Theme first load actions
	//==============================================
	function critique_ready_actions() {

		// Add scheme class and js support
		//------------------------------------
		document.documentElement.className = document.documentElement.className.replace( /\bno-js\b/,'js' );
		if (document.documentElement.className.indexOf( CRITIQUE_STORAGE['site_scheme'] ) == -1) {
			document.documentElement.className += ' ' + CRITIQUE_STORAGE['site_scheme'];
		}

		// Skip to content link
		//------------------------------------
		jQuery( 'a.critique_skip_link:not(.inited)' )
			.addClass( 'inited' )
			.on( 'focus', function() {
				if ( ! $body.hasClass( 'show_outline' ) ) {
					$body.addClass( 'show_outline' );
				}
			} )
			.on( 'click', function() {
				var id = jQuery(this).attr('href');
				jQuery(id).focus();
			} );


		// Detect the keyboard usage to show outline around links and fields
		//-------------------------------------------------------------------
		$body.on( 'keydown', 'a,input,textarea,select,span[tabindex]', function( e ) {
			if ( 9 == e.which ) {
				if ( ! $body.hasClass( 'show_outline' ) ) {
					$body.addClass( 'show_outline' );
				}
			}
		} );


		// Init background video
		//------------------------------------
		
		// Use Bideo to play local video
		var $top_panel_with_bg_video = jQuery( '.top_panel.with_bg_video' );
		if (CRITIQUE_STORAGE['background_video'] && $top_panel_with_bg_video.length > 0 && window.Bideo) {
			// Waiting 10ms after mejs init
			setTimeout(
				function() {
					$top_panel_with_bg_video.prepend( '<video id="background_video" loop muted></video>' );
					var bv = new Bideo();
					bv.init(
						{
							// Video element
							videoEl: document.querySelector( '#background_video' ),

							// Container element
							container: document.querySelector( '.top_panel' ),

							// Resize
							resize: true,

							// autoplay: false,

							isMobile: window.matchMedia( '(max-width: 768px)' ).matches,

							playButton: document.querySelector( '#background_video_play' ),
							pauseButton: document.querySelector( '#background_video_pause' ),

							// Array of objects containing the src and type
							// of different video formats to add
							// For example:
							//	src: [
							//			{	src: 'night.mp4', type: 'video/mp4' }
							//			{	src: 'night.webm', type: 'video/webm;codecs="vp8, vorbis"' }
							//		]
							src: [
							{
								src: CRITIQUE_STORAGE['background_video'],
								type: 'video/' + critique_get_file_ext( CRITIQUE_STORAGE['background_video'] )
							}
							],

							// What to do once video loads (initial frame)
							onLoad: function () {
								//document.querySelector('#background_video_cover').style.display = 'none';
							}
						}
					);
				}, 10
			);

			// Use Tubular to play video from Youtube
		} else if (jQuery.fn.tubular) {
			jQuery( 'div#background_video' ).each(
				function() {
					var $self = jQuery( this );
					var youtube_code = $self.data( 'youtube-code' );
					if (youtube_code) {
						$self.tubular( {videoId: youtube_code} );
						jQuery( '#tubular-player' ).appendTo( $self ).show();
						jQuery( '#tubular-container,#tubular-shield' ).remove();
					}
				}
			);
		}

		// Tabs
		//------------------------------------
		if ( jQuery.ui && jQuery.ui.tabs ) {
			jQuery( '.critique_tabs:not(.inited)' ).each(
				function () {
					var $self = jQuery( this );
					// Get initially opened tab
					var init = $self.data( 'active' );
					if (isNaN( init )) {
						init       = 0;
						var active = $self.find( '> ul > li[data-active="true"]' ).eq( 0 );
						if (active.length > 0) {
							init = active.index();
							if (isNaN( init ) || init < 0) {
								init = 0;
							}
						}
					} else {
						init = Math.max( 0, init );
					}
					// Init tabs
					$self.addClass( 'inited' ).tabs(
						{
							active: init,
							show: {
								effect: 'fadeIn',
								duration: 300
							},
							hide: {
								effect: 'fadeOut',
								duration: 300
							},
							create: function( event, ui ) {
								if ( ui.panel.length > 0 && ! ready_busy ) {
									$document.trigger( 'action.init_hidden_elements', [ui.panel] );
								}
							},
							activate: function( event, ui ) {
								if ( ui.newPanel.length > 0 && ! ready_busy ) {
									$document.trigger( 'action.init_hidden_elements', [ui.newPanel] );
									$window.trigger('resize');
								}
							}
						}
					);
				}
			);
		}

		// AJAX loader for the tabs
		jQuery( '.critique_tabs_ajax' ).on(
			"tabsbeforeactivate", function( event, ui ) {
				if (ui.newPanel.data( 'need-content' )) {
					critique_tabs_ajax_content_loader( ui.newPanel, 1, ui.oldPanel );
				}
			}
		);

		// AJAX loader for the pages in the tabs
		jQuery( '.critique_tabs_ajax' ).on(
			"click", '.nav-links a', function(e) {
				var $self = jQuery( this );
				var panel = $self.parents( '.critique_tabs_content' );
				var page  = 1;
				var href  = $self.attr( 'href' );
				var pos   = -1;
				if ((pos = href.lastIndexOf( '/page/' )) != -1 ) {
					page = Number( href.substr( pos + 6 ).replace( "/", "" ) );
					if ( ! isNaN( page )) {
						page = Math.max( 1, page );
					}
				}
				critique_tabs_ajax_content_loader( panel, page );
				e.preventDefault();
				return false;
			}
		);


		// Accordion
		//----------------------------------
		if (jQuery.ui && jQuery.ui.accordion) {
			jQuery( '.critique_accordion:not(.inited)' )
				.addClass( 'inited' )
				.accordion( {
					'header': '.critique_accordion_title',
					'heightStyle': 'content',
					'create': function( event, ui ) {
						if ( ui.panel.length > 0 && ! ready_busy ) {
							$document.trigger( 'action.init_hidden_elements', [ui.panel] );
						}
					},
					'activate': function( event, ui ) {
						if ( ui.newPanel.length > 0 && ! ready_busy ) {
							$document.trigger( 'action.init_hidden_elements', [ui.newPanel] );
							$window.trigger('resize');
						}
					}
				} );
		}


		// Sidebar open/close
		//----------------------------------------------
		jQuery( '.sidebar_control' ).on(
			'click', function(e){
				var $self = jQuery( this ),
					$parent = $self.parent();
				$parent.toggleClass( 'opened' );
				if ( $body.hasClass('sidebar_small_screen_above') ) {
					var $next = $self.next();
					$next.slideToggle();
					if ( $parent.hasClass( 'opened' ) ) {
						setTimeout( function() {
							$document.trigger( 'action.init_hidden_elements', [$next] );
						}, 310 );
					}
				}
				e.preventDefault();
				return false;
			}
		);



		// Menu
		//----------------------------------------------

		// Keyboard navigation in the menus
		jQuery( '.sc_layouts_menu li > a' ).on( 'keydown', function(e) {
			var handled = false,
				link = jQuery( this ),
				li = link.parent(),
				ul = li.parent(),
				li_parent = ul.parent().prop( 'tagName' ) == 'LI' ? ul.parent() : false,
				item = false;
			if ( 32 == e.which ) {								// Space
				link.trigger( 'click' );
				handled = true;
			} else if ( 27 == e.which ) {						// Esc
				if ( li_parent ) {
					item = li_parent.find( '> a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				}
				handled = true;
			} else if ( 37 == e.which ) {						// Left
				if ( li_parent ) {
					item = li_parent.find( '> a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				} else if ( li.index() > 0 ) {
					item = li.prev().find( '> a' );
					if ( item.length > 0 ) {
						item.eq(0).focus();
					}
				}
				handled = true;
			} else if ( 38 == e.which ) {						// Top
				if ( li.index() > 0 ) {
					item = li.prev().find( '> a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				} else if ( li_parent ) {
					item = li_parent.find( '> a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				}
				handled = true;
			} else if ( 39 == e.which ) {						// Right
				if ( li_parent ) {
					if ( li.find( '> ul' ).length == 1 ) {
						item = li.find( '> ul > li:first-child a' );
						if ( item.length > 0 ) {
							item.get(0).focus();
						}
					}
				} else if ( li.next().prop( 'tagName' ) == 'LI' ) {
					item = li.next().find( '> a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				}
				handled = true;
			} else if ( 40 == e.which ) {						// Bottom
				if ( li_parent || li.find( '> ul' ).length === 0 ) {
					if ( li.next().prop( 'tagName' ) == 'LI' ) {
						item = li.next().find( '> a' );
						if ( item.length > 0 ) {
							item.get(0).focus();
						}
					}
				} else if ( li.find( '> ul' ).length == 1 ) {
					item = li.find( '> ul > li:first-child a' );
					if ( item.length > 0 ) {
						item.get(0).focus();
					}
				}
				handled = true;
			}
			if ( handled ) {
				if ( ! $body.hasClass( 'show_outline' ) ) {
					$body.addClass( 'show_outline' );
				}
				e.preventDefault();
				return false;
			}
			return true;
		} );

		// Open/Close side menu
		jQuery( '.menu_side_button' ).on(
			'click', function(e){
				jQuery( this ).parent().toggleClass( 'opened' );
				e.preventDefault();
				return false;
			}
		);

		// Add images to the menu items with classes image-xxx
		jQuery( '.sc_layouts_menu li[class*="image-"]' ).each(
			function() {
				var $self   = jQuery( this );
				var classes = $self.attr( 'class' ).split( ' ' );
				var icon    = '';
				for (var i = 0; i < classes.length; i++) {
					if (classes[i].indexOf( 'image-' ) >= 0) {
						icon = classes[i].replace( 'image-', '' );
						break;
					}
				}
				if (icon) {
					$self.find( '>a' ).css( 'background-image', 'url(' + CRITIQUE_STORAGE['theme_url'] + 'trx_addons/css/icons.png/' + icon + '.png' );
				}
			}
		);

		// Add arrows to the mobile menu
		jQuery( '.menu_mobile .menu-item-has-children > a,.sc_layouts_menu_dir_vertical .menu-item-has-children > a' ).append( '<span class="open_child_menu"></span>' );

		// Open/Close mobile menu
		function critique_mobile_menu_open() {
			var $menu = jQuery( '.menu_mobile' );
			$menu
				.addClass( 'opened' )
				.prev( '.menu_mobile_overlay' ).fadeIn();
			$body.addClass( 'menu_mobile_opened' );
			$document
				.trigger( 'action.stop_wheel_handlers' )
				.trigger( 'action.mobile_menu_open', [$menu] );
		}
		function critique_mobile_menu_close() {
			var $menu = jQuery( '.menu_mobile' );
			$document.trigger( 'action.mobile_menu_close', [$menu] );
			setTimeout( function() {
				$menu
					.removeClass( 'opened' )
					.prev( '.menu_mobile_overlay' ).fadeOut();
				$body.removeClass( 'menu_mobile_opened' );
				$document.trigger( 'action.start_wheel_handlers' );
			}, critique_apply_filters( 'critique_filter_mobile_menu_close_timeout', 0, $menu ) );
		}
		jQuery( '.sc_layouts_menu_mobile_button > a,.menu_mobile_button,.menu_mobile_description' )
			.on( 'click', function(e) {
				var $self = jQuery( this );
				if ( $self.parent().hasClass( 'sc_layouts_menu_mobile_button_burger' ) && $self.next().hasClass( 'sc_layouts_menu_popup' ) ) {
					return false;
				}
				critique_mobile_menu_open();
				e.preventDefault();
				return false;
			}
		);
		$document
			.on( 'keyup', function(e) {
				if (e.keyCode == 27) {
					if (jQuery( '.menu_mobile.opened' ).length == 1) {
						critique_mobile_menu_close();
						e.preventDefault();
						return false;
					}
				}
			}
		);
		
		$document.on( 'action.trx_addons_inner_links_click', function( e, link_obj, original_e ) {
			if ( $body.hasClass( 'menu_mobile_opened' ) ) {
				// Removing class before menu closing animations started
				// is need to animate inner links and scrolling to the anchor
				$body.removeClass( 'menu_mobile_opened' );
				critique_mobile_menu_close();
			}
		} );


		jQuery( '.menu_mobile_close, .menu_mobile_overlay' )
			.on( 'click', function(e){
				critique_mobile_menu_close();
				e.preventDefault();
				return false;
			} );
		jQuery( '.menu_mobile_close' )
			.on( 'keyup', function(e) {
				if (e.keyCode == 13) {
					if (jQuery( '.menu_mobile.opened' ).length == 1) {
						critique_mobile_menu_close();
						e.preventDefault();
						return false;
					}
				}
			} )
			.on( 'focus', function() {
				if ( ! $body.hasClass( 'menu_mobile_opened' ) ) {
					jQuery( '#content_skip_link_anchor' ).focus();
				}
			} );

		// Open/Close mobile submenu
		jQuery( '.menu_mobile,.sc_layouts_menu_dir_vertical:not([class*="sc_layouts_submenu_"]),.sc_layouts_menu.sc_layouts_submenu_dropdown' )
			.on( 'click', 'li a, li a .open_child_menu', function(e) {
				var $self = jQuery( this );
				var $a    = $self.hasClass( 'open_child_menu' ) ? $self.parent() : $self;
				if ($a.parent().hasClass( 'menu-item-has-children' )) {
					if ($a.attr( 'href' ) == '#' || $self.hasClass( 'open_child_menu' )) {
						if ($a.siblings( 'ul:visible' ).length > 0) {
							$a.siblings( 'ul' ).slideUp().parent().removeClass( 'opened' );
						} else {
							$self.parents( 'li' ).eq(0).siblings( 'li' ).find( 'ul.sub-menu:visible,ul.sc_layouts_submenu:visible' ).slideUp().parent().removeClass( 'opened' );
							$a.siblings( 'ul' ).slideDown(
								function() {
									var $self = jQuery( this );
									// Init layouts
									if ( ! $self.hasClass( 'layouts_inited' ) && $self.parents( '.menu_mobile' ).length > 0) {
										$self.addClass( 'layouts_inited' );
										$document.trigger( 'action.init_hidden_elements', [$self] );
									}
								}
							).parent().addClass( 'opened' );
						}
					}
				}
				if ( ! $self.hasClass( 'open_child_menu' ) && $self.parents( '.menu_mobile' ).length > 0 && critique_is_local_link( $a.attr( 'href' ) )) {
					jQuery( '.menu_mobile_close' ).trigger( 'click' );
				}
				if ( $self.hasClass( 'open_child_menu' ) || $a.attr( 'href' ) == '#' ) {
					e.preventDefault();
					return false;
				}
			} )
			.on( 'keyup', 'li a', function(e) {
				if ( e.keyCode == 9 ) {
					jQuery(this).find('.open_child_menu').trigger('click');
				}
			} );

		if ( ! CRITIQUE_STORAGE['trx_addons_exist'] || jQuery( '.top_panel.top_panel_default .sc_layouts_menu_default' ).length > 0) {
			// Init superfish menus
			critique_init_sfmenu( '.sc_layouts_menu:not(.inited):not(.sc_layouts_submenu_dropdown) > ul:not(.inited)' );
			// Show menu
			jQuery( '.sc_layouts_menu:not(.inited)' ).each(
				function() {
					var $self = jQuery( this );
					if ( $self.find( '>ul.inited' ).length == 1 ) {
						$self.addClass( 'inited' );
					}
				}
			);
			// Generate 'scroll' event after the menu is showed
			$window.trigger( 'scroll' );
		}


		// Pagination
		//------------------------------------

		// Infinite scroll in the blog streampages
		$document.on(
			'action.scroll_critique', function(e) {
				var inf = jQuery( '.nav-links-infinite:not(.all_items_loaded)' );
				if (inf.length === 0) {
					return;
				}
				var container = $content.find( '> .posts_container,> .blog_archive > .posts_container,> .critique_tabs > .critique_tabs_content:visible > .posts_container' ).eq( 0 );
				if (container.length == 1 && container.offset().top + container.height() < _window_scroll_top + _window_height * 1.5) {
					inf.find( 'a' ).trigger( 'click' );
				}
			}
		);

		// Infinite scroll in the single posts
		CRITIQUE_STORAGE['cur_page_url']   = location.href;
		CRITIQUE_STORAGE['cur_page_title'] = jQuery('.sc_layouts_title_caption').eq(0).text() || jQuery('head title').eq(0).text() || '';
		$document.on(
			'action.scroll_critique', function(e) {
				if ( $single_post_scrollers.length === 0 ) {
					return;
				}

				var container      = CRITIQUE_STORAGE['which_block_load'] == 'article'
										? $content.eq( 0 )
										: $page_content_wrap.eq( 0 ),
					cur_page_link  = CRITIQUE_STORAGE['cur_page_url'],
					cur_page_title = CRITIQUE_STORAGE['cur_page_title'];

				$single_post_scrollers.each( function() {
					var inf  = jQuery(this),
						link = inf.data('post-link'),
						off  = inf.offset().top,
						st   = _window_scroll_top,
						wh   = _window_height;
					
					// Change location url
					if (inf.hasClass('nav-links-single-scroll-loaded')) {
						if (link && off < st + wh / 2) {
							cur_page_link  = link;
							cur_page_title = inf.data('post-title');
						}

					// Load next post
					} else if ( ! inf.hasClass('critique_loading') && link && off < st + wh * 2) {
						critique_add_to_read_list( container.find( '.previous_post_content:last-child > article[data-post-id]').data('post-id'));
						inf.addClass('critique_loading');
						jQuery.get( critique_add_to_url( link, { 'action': 'prev_post_loading' } ) ).done(
							function( response ) {
								// Get inline styles and add to the page styles
								critique_import_inline_styles( response );
								// Get tags 'link' from response and add its to the 'head'
								critique_import_tags_link( response );
								// Get article and add it to the page
								var $response = jQuery( response ),
									$response_page_content_wrap = $response.find( '.page_content_wrap' ),
									$response_content = $response.find( '.content' ),
									$response_sidebar = $response.find( '.sidebar' ),
									$response_post_content = CRITIQUE_STORAGE['which_block_load'] == 'article'
																? $response_content
																: $response_page_content_wrap;
								if ( $response_post_content.length > 0 ) {
									var html = $response_post_content.html(),
										response_body_classes = CRITIQUE_STORAGE['which_block_load'] == 'article'
																? null
																: response.match(/<body[^>]*class="([^"]*)"/);
									if ( CRITIQUE_STORAGE['which_block_load'] == 'wrapper' ) {
										if ( $response_sidebar.length === 0
											&& ! response_body_classes
											&& ! $body.hasClass( 'expand_content' )
											&& ! $body.hasClass( 'narrow_content' )
										) {
											$response_post_content.find( '.content' ).width( '100%' );
											html = $response_post_content.html();
										} else if ( $response_sidebar.length > 0 && $body.hasClass( 'narrow_content' ) ) {
											$response_post_content.find( '.post_item_single.post_type_post' ).width( '100%' );
											html = $response_post_content.html();
										}
									}
									container.append(
										'<div class="previous_post_content'
														+ ( response_body_classes
															? ' ' + response_body_classes[1]
															: '' )
														+ ( $response_page_content_wrap.attr( 'data-single-style' ) !== undefined
																? ' single_style_' + $response_page_content_wrap.attr( 'data-single-style' )
																: ''
															)
										+ '">'
											+ html
										+ '</div>'
									);
									inf.removeClass('critique_loading').addClass( 'nav-links-single-scroll-loaded' );
									// Remove TOC if exists (rebuild on init_hidden_elements)
									jQuery( '#toc_menu' ).remove();
									// Trigger actions to init new elements
									CRITIQUE_STORAGE['init_all_mediaelements'] = true;
									$document
										.trigger( 'action.new_post_added' )
										.trigger( 'action.init_hidden_elements', [container] );
									$window.trigger( 'resize' );
								}
								$document.trigger('action.got_ajax_response', {
									action: 'prev_post_loading',
									result: response
								});
							}
						);
					}						
				} );
				if (cur_page_link != location.href) {
					critique_document_set_location(cur_page_link);
					jQuery( '.sc_layouts_title_caption,head title' ).html( cur_page_title );
				}
			}
		);

		// Mark single post as readed
		if ( $body.hasClass('single')) {
			critique_add_to_read_list(jQuery('.content > article[data-post-id]').data('post-id'));
		}

		// Mark readed posts
		$document.on(
			'action.init_hidden_elements', function(e, cont) {
				var read_list = critique_get_storage('critique_post_read');
				if ( read_list && read_list.charAt(0) == '[' ) {
					read_list = JSON.parse(read_list);
					for (var p=0; p<read_list.length; p++) {
						var read_post = cont.find('[data-post-id="'+read_list[p]+'"]');
						if (!read_post.addClass('full_post_read') && !read_post.parent().hasClass('content')) {
							read_post.addClass('full_post_read');
						}
					}
				}
			}
		);

		// Open single post right in the blog or in the shortcode "Blogger"
		jQuery( '.posts_container,.sc_blogger_content.sc_item_posts_container' ).on( 'click', 'a', function(e) {
			var link = jQuery(this),
				link_url = link.attr( 'href' ),
				post = link.parents( '.post_item,.sc_blogger_item' ).eq(0),
				post_url = post.find( '.post_title > a,.entry-title > a' ).attr( 'href' ),
				posts_container = post.parents('.posts_container,.sc_item_posts_container').eq(0);
			if ( link_url && post_url && link_url == post_url
				&& ( posts_container.hasClass('open_full_post') || CRITIQUE_STORAGE['open_full_post'] )
				&& ! posts_container.hasClass('no_open_full_post')
				&& ! posts_container.hasClass('columns_wrap')
				&& ! posts_container.hasClass('masonry_wrap')
				&& posts_container.find('.sc_blogger_grid_wrap').length === 0
				&& posts_container.find('.masonry_wrap').length === 0
				&& posts_container.parents('.wp-block-columns').length === 0
				&& ( posts_container.parents('.wpb_column').length === 0 || posts_container.parents('.wpb_column').eq(0).hasClass('vc_col-sm-12') )
				&& ( posts_container.parents('.elementor-column').length === 0 || posts_container.parents('.elementor-column').eq(0).hasClass('elementor-col-100') )
			) {
				posts_container.find('.full_post_opened').removeClass('full_post_opened').show();
				posts_container.find('.full_post_content').remove();
				post.addClass('full_post_loading');
				jQuery.get( critique_add_to_url( post_url, { 'action': 'full_post_loading' } ) ).done( function( response ) {
					if ( response ) {
						var $response = jQuery( response );
						var post_content = $response.find('.content');
						if ( post_content.length > 0 ) {
							// Get inline styles from response
							var inline_styles = response.match( /<style[^>]*id="trx_addons-inline-styles-inline-css"[^>]*>([^<]*)<\/style>/ );
							if ( inline_styles ) {
								jQuery( '#trx_addons-inline-styles-inline-css' ).append( inline_styles[1] );
							}
							// Get tags 'link' from response and add its to the 'head'
							critique_import_tags_link( response );
							// Animate to posts_container
							var cs = post.offset().top - ( post.parents('.posts_container').length > 0 ? 100 : 200 );
							critique_document_animate_to( cs );
							// Insert new content
							post.after( 
									'<div class="full_post_content">'
										+ '<button class="full_post_close" data-post-url="' + post_url + '"></button>'
										+ post_content.html()
									+ '</div>'
								)
								.removeClass('full_post_loading')
								.addClass('full_post_opened')
								.hide()	// instead .slideUp('fast')
								.next().slideDown( 'slow', function() {
									// Trigger actions to init new elements after posts_container is shown
									CRITIQUE_STORAGE['init_all_mediaelements'] = true;
									$document.trigger( 'action.init_hidden_elements', [posts_container] );
									$window.trigger( 'resize' );
								} );
							critique_full_post_read_change_state();
							// Close full post content on click
							post.next().find('.full_post_close')
								.on( 'click', function(e) {
									var content = jQuery(this).parent(),
										cs = content.offset().top - (content.parents('.posts_container').length > 0 ? 100 : 200),
										post = content.prev();
									content.remove();
									critique_full_post_read_change_state();
									post
										.removeClass('full_post_opened')
										.slideDown();
									critique_document_animate_to( cs, 0 );
									e.preventDefault();
									return false;
								} );
							// Remove TOC if exists (rebuild on init_hidden_elements)
							jQuery( '#toc_menu' ).remove();
						}
						$document.trigger('action.got_ajax_response', {
							action: 'full_post_loading',
							result: response
						} );
					}
				} );
				e.preventDefault();
				return false;
			}
		} );


		// Comments
		//------------------------------------

		// Scroll to comments (if hidden)
		if ( location.hash == '#comments' || location.hash == '#respond' ) {
			var $show_comments_button = jQuery( '.show_comments_button' );
			if ( $show_comments_button.length == 1 && ! $show_comments_button.hasClass( 'opened' ) ) {
				$show_comments_button.trigger( 'click' );
				critique_document_animate_to( location.hash );
			}
		}

		// Other settings
		//------------------------------------
		$document.trigger( 'action.ready_critique' );

		// Blocks with stretch width
		//----------------------------------------------
		// Action to prepare stretch blocks in the third-party plugins
		$document.trigger( 'action.prepare_stretch_width' );
		// Wrap stretch blocks
		$stretch_width = jQuery( '.trx-stretch-width' );
		$stretch_width.wrap( '<div class="trx-stretch-width-wrap"></div>' );
		$stretch_width.after( '<div class="trx-stretch-width-original"></div>' );
		critique_stretch_width();

		// Add theme-specific handlers on 'action.init_hidden_elements'
		//---------------------------------------------------------------
		$document.on( 'action.init_hidden_elements', critique_init_post_formats );
		$document.on( 'action.init_hidden_elements', critique_add_toc_to_sidemenu );

 		// Init hidden elements
		$document.trigger( 'action.init_hidden_elements', [$body.eq(0)] );

	} // critique_ready_actions

	
	// Post formats init
	//=====================================================
	function critique_init_post_formats(e, cont) {

		// Wrap select with .select_container
		critique_add_select_container( cont );

		// Masonry posts
		cont.find( critique_apply_filters( 'critique_filter_masonry_wrap', '.masonry_wrap' ) ).each( function() {
			var masonry_wrap = jQuery( this );
			if ( masonry_wrap.parents( 'div:hidden,article:hidden' ).length > 0) return;
			if ( ! masonry_wrap.hasClass( 'inited' ) ) {
				masonry_wrap.addClass( 'inited' );
				critique_when_images_loaded( masonry_wrap, function() {
					setTimeout( function() {
									masonry_wrap.masonry( {
										itemSelector: critique_apply_filters( 'critique_filter_masonry_item', '.masonry_item' ),
										columnWidth: critique_apply_filters( 'critique_filter_masonry_item', '.masonry_item' ),
										percentPosition: true
									} );
									$window.trigger('resize');
									$window.trigger('scroll');
								}, critique_apply_filters( 'critique_filter_masonry_init', 10 ) );
				});
			} else {
				setTimeout( function() {
					masonry_wrap.masonry();   // Relayout after activate tab
				}, critique_apply_filters( 'critique_filter_masonry_reinit', 510 ) );
			}
		});

		// Load more
		cont.find( '.nav-load-more:not(.inited)' )
			.addClass( 'inited' )
			.on( 'click', function(e) {
				if (CRITIQUE_STORAGE['load_more_link_busy']) {
					return false;
				}
				var more     = jQuery( this );
				var page     = Number( more.data( 'page' ) );
				var max_page = Number( more.data( 'max-page' ) );
				if (page >= max_page) {
					more.parent().addClass( 'all_items_loaded' ).hide();
					return false;
				}
				more.parent().addClass( 'loading' );
				CRITIQUE_STORAGE['load_more_link_busy'] = true;

				var panel = more.parents( '.critique_tabs_content' );

				// Load simple page content
				if (panel.length === 0) {
					jQuery.get(
						location.href, {
							paged: page + 1
						}
					).done(
						function(response) {
							// Get inline styles and add to the page styles
							critique_import_inline_styles( response );
							// Get tags 'link' from response and add its to the 'head'
							critique_import_tags_link( response );
							// Get new posts and append to the .posts_container
							var $response = jQuery( response );
							var $response_posts_container = $response.find('.content .posts_container');
							if ( $response_posts_container.length === 0 ) {
								$response_posts_container = $response.find('.posts_container');
							}
							if ( $response_posts_container.length > 0 ) {
								critique_loadmore_add_items(
									$content.find( '.posts_container' ).eq( 0 ),
									$response_posts_container.find(
										'> .masonry_item,'
										+ '> div[class*="column-"],'
										+ '> article'
									)
								);
							}
							$document.trigger('action.got_ajax_response', {
								action: 'load_more_next_page',
								result: response
							});
						}
					);

					// Load tab's panel content
				} else {
					jQuery.post(
						CRITIQUE_STORAGE['ajax_url'], {
							nonce: CRITIQUE_STORAGE['ajax_nonce'],
							action: 'critique_ajax_get_posts',
							blog_template: panel.data( 'blog-template' ),
							blog_style: panel.data( 'blog-style' ),
							posts_per_page: panel.data( 'posts-per-page' ),
							cat: panel.data( 'cat' ),
							parent_cat: panel.data( 'parent-cat' ),
							post_type: panel.data( 'post-type' ),
							taxonomy: panel.data( 'taxonomy' ),
							page: page + 1
						}
					).done(
						function(response) {
							var rez = {};
							try {
								rez = JSON.parse( response );
							} catch (e) {
								rez = { error: CRITIQUE_STORAGE['msg_ajax_error'] };
								console.log( response );
							}
							if (rez.error !== '') {
								panel.html( '<div class="critique_error">' + rez.error + '</div>' );
							} else {
								// Get inline styles and add to the page styles
								if ( rez.css !== '' ) {
									critique_import_inline_styles( '<style id="critique-inline-styles-inline-css">' + rez.css + '</style>' );
								}
								// Get new posts and append to the .posts_container
								critique_loadmore_add_items(
									panel.find( '.posts_container' ),
									jQuery( rez.data ).find(
										'> .masonry_item,'
										+ '> div[class*="column-"],'
										+ '> article'
									)
								);
							}
							$document.trigger('action.got_ajax_response', {
								action: 'critique_ajax_get_posts',
								result: rez,
								panel: panel
							});
						}
					);
				}

				// Append items to the container
				function critique_loadmore_add_items(container, items) {
					if (container.length > 0 && items.length > 0) {
						items.addClass( 'just_loaded_items' );
						container.append( items );
						$document.trigger('action.after_add_content', [container]);
						var just_loaded_items = container.find( '.just_loaded_items' );
						if ( container.hasClass( 'masonry_wrap' ) ) {
							just_loaded_items.addClass( 'hidden' );
							critique_when_images_loaded(
								just_loaded_items, function() {
									just_loaded_items.removeClass( 'hidden' );
									container.masonry( 'appended', items ).masonry();
									// Remove TOC if exists (rebuild on init_hidden_elements)
									jQuery( '#toc_menu' ).remove();
									// Trigger actions to init new elements
									CRITIQUE_STORAGE['init_all_mediaelements'] = true;
									$document.trigger( 'action.init_hidden_elements', [container.parent()] );
								}
							);
						} else {
							just_loaded_items.removeClass( 'just_loaded_items hidden' );
							// Remove TOC if exists (rebuild on init_hidden_elements)
							jQuery( '#toc_menu' ).remove();
							// Trigger actions to init new elements
							CRITIQUE_STORAGE['init_all_mediaelements'] = true;
							$document.trigger( 'action.init_hidden_elements', [container.parent()] );
						}
						more.data( 'page', page + 1 ).parent().removeClass( 'loading' );
					}
					if (page + 1 >= max_page) {
						more.parent().addClass( 'all_items_loaded' ).hide();
					}
					CRITIQUE_STORAGE['load_more_link_busy'] = false;
					// Fire 'window.resize'
					$window.trigger( 'resize' );
					// Fire 'window.scroll'
					$window.trigger( 'scroll' );
				}

				e.preventDefault();
				return false;
			}
		);

		// MediaElement init
		critique_init_media_elements( cont );

		// Video play button
		cont.find( '.post_featured.with_thumb .post_video_hover:not(.post_video_hover_popup):not(.inited)' )
			.addClass( 'inited' )
			.on( 'click', function(e) {
				var $self = jQuery( this ),
					$post_featured = $self.parents( '.post_featured' ).eq(0);
				$post_featured
					.addClass( 'post_video_play' )
					.find( '.post_video' ).html( $self.data( 'video' ) );
				$document.trigger( 'action.init_hidden_elements', [ $post_featured ] );
				$window.trigger( 'resize' );
				e.preventDefault();
				return false;
			} )
			.parents('.post_featured')
			.on( 'click', function(e) {
				var $self = jQuery(this);
				if ( ! $self.hasClass('post_video_play') && ! jQuery(e.target).is('a') ) {
					jQuery(this).find('.post_video_hover').trigger('click');
					e.preventDefault();
					return false;
				}
			} );


		// Comments
		//------------------------------------

		// Show/Hide Comments
		jQuery( '.show_comments_button:not(.inited)' )
			.addClass( 'inited' )
			.on( 'click', function(e) {
				var bt = jQuery(this);
				if ( bt.attr( 'href' ) == '#' ) {
					bt.toggleClass( 'opened' ).text( bt.data( bt.hasClass( 'opened' ) ? 'hide' : 'show' ) );
					var $comments_wrap = bt.parent().next();	//jQuery( '.comments_wrap' )
					$comments_wrap.slideToggle( function() {
						$comments_wrap.toggleClass( 'opened' );
						$window.trigger( 'scroll' );
					});
					e.preventDefault();
					return false;
				}
			} );

		// Show comments block when link '#comments' or '#respond' is clicked
		jQuery( 'a[href$="#comments"]:not(.inited),a[href$="#respond"]:not(.inited)' )
			.addClass( 'inited' )
			.on( 'click', function(e) {
				var $self = jQuery(this);
				if ( critique_is_local_link( $self.attr( 'href') ) ) {
					var $prev_post_content = $self.parents( '.previous_post_content' ),
						$comments_wrap = $prev_post_content.length
											? $prev_post_content.find( '.comments_wrap' ).eq(0)
											: jQuery( '.comments_wrap' ).eq(0),
						$show_comments_button = $comments_wrap.prev().find('.show_comments_button ');
					if ( $comments_wrap.length ) {
						if ( $comments_wrap.css( 'display' ) == 'none' ) {
							if ($show_comments_button.length ) {
								$show_comments_button.trigger( 'click' );
							}
						}
						if ($show_comments_button.length ) {
							critique_document_animate_to( $show_comments_button.offset().top );
						}
					}
				}
			} );

		// Checkbox with "I agree..."
		var $i_agree = jQuery('input[type="checkbox"][name="i_agree_privacy_policy"]:not(.inited)'
							+ ',input[type="checkbox"][name="gdpr_terms"]:not(.inited)'
							+ ',input[type="checkbox"][name="wpgdprc"]:not(.inited)'
							+ ',input[type="checkbox"][name="AGREE_TO_TERMS"]:not(.inited)'
							+ ',input[type="checkbox"][name="acceptance"]:not(.inited)'
							);
		if ( $i_agree.length > 0 ) {
			if ( true ) {	// New way: On click Submit button - checkbox is checked
				$i_agree.each( function() {
					var chk = jQuery( this ),
						form = chk.parents('form');
					chk.addClass( 'inited' );
					form.find( 'button,input[type="submit"]' ).on( 'click', function(e) {
						if ( ! chk.get(0).checked ) {
							form.find('.trx_addons_message_box').remove();
							form.append(
								'<div class="trx_addons_message_box trx_addons_message_box_error">'
									+ CRITIQUE_STORAGE['msg_i_agree_error']
								+ '</div>'
							);
							var error_msg = form.find('.trx_addons_message_box');
							error_msg.fadeIn();
							setTimeout( function() {
								error_msg.fadeOut( function() {
									error_msg.remove();
								} );
							}, 3000 );
							e.preventDefault();
							return false;
						}
					} );
				} );
			} else {		// Old way: Disable Submit button while checkbox is not checked
				$i_agree
					.addClass('inited')
					.on('change', function(e) {
						var $self = jQuery(this),
							$bt   = $self.parents('form').find('button,input[type="submit"]');
						if ($self.get(0).checked) {
							$bt.removeAttr('disabled');
						} else {
							$bt.attr('disabled', 'disabled');
						}
					})
					.trigger('change');
			}
		}
	}  // critique_init_post_formats


	// Wrap select with .select_container
	function critique_add_select_container( cont ) {
		cont.find( 'select:not(.esg-sorting-select):not([class*="trx_addons_attrib_"]):not([size])' ).each(
			function() {
				var $self = jQuery( this );
				if ( $self.css( 'display' ) != 'none'
					&& $self.parents( '.select_container' ).length === 0
					&& ! $self.next().hasClass( 'select2' )
					&& ! $self.hasClass( 'select2-hidden-accessible' )) {
						$self.wrap( '<div class="select_container"></div>' );
						// Bubble submit() up for widget "Categories"
						if ( $self.parents( '.widget_categories' ).length > 0 ) {
							$self.parent().get(0).submit = function() {
								jQuery(this).closest('form').eq(0).submit();
							};
						}
				}
			}
		);
	}
	// Add select_container on 'ajaxComplete'
	$document.on( 'ajaxComplete', function(e) {
		// Trigger event after timeout to allow other scripts add elements on the page
		setTimeout( function() {
			critique_add_select_container( $body );
		}, 100 );
	} );


	// Init media elements
	CRITIQUE_STORAGE['mejs_attempts'] = 0;
	function critique_init_media_elements(cont) {
		var audio_selector = critique_apply_filters( 'critique_filter_mediaelements_audio_selector', 'audio:not(.inited)' ),
			video_selector = critique_apply_filters( 'critique_filter_mediaelements_video_selector', 'video:not(.inited):not([nocontrols]):not([controls="0"]):not([controls="false"]):not([controls="no"])' ),	//:not([autoplay])
			media_selector = audio_selector + ( audio_selector && video_selector ? ',' : '') + video_selector;
		if (CRITIQUE_STORAGE['use_mediaelements'] && cont.find( media_selector ).length > 0) {
			if ( window.mejs ) {
				if (window.mejs.MepDefaults) {
					window.mejs.MepDefaults.enableAutosize = true;
				}
				if (window.mejs.MediaElementDefaults) {
					window.mejs.MediaElementDefaults.enableAutosize = true;
				}
				// Disable init for video[autoplay]
				cont.find(
						  // Old shortcode 'wp-video'
						  'video.wp-video-shortcode[autoplay],'
						+ 'video.wp-video-shortcode[nocontrols],'
						+ 'video.wp-video-shortcode[controls="0"],'
						+ 'video.wp-video-shortcode[controls="false"],'
						+ 'video.wp-video-shortcode[controls="no"],'
						// New block 'video'
						+ '.wp-block-video > video[autoplay],'
						+ '.wp-block-video > video[nocontrols],'
						+ '.wp-block-video > video[controls="0"],'
						+ '.wp-block-video > video[controls="false"],'
						+ '.wp-block-video > video[controls="no"]'
						)
					.removeClass('wp-video-shortcode');
				// Init mediaelements
				cont.find( media_selector ).each(
					function() {
						var $self = jQuery( this );
						// If item now invisible
						if ($self.parents( 'div:hidden,section:hidden,article:hidden' ).length > 0) {
							return;
						}
						if (   $self.addClass( 'inited' ).parents( '.mejs-mediaelement' ).length === 0
							&& $self.parents( '.wp-block-video' ).length === 0
							&& ! $self.hasClass( 'wp-block-cover__video-background' )
							&& $self.parents( '.elementor-background-video-container' ).length === 0
							&& $self.parents( '.elementor-widget-video' ).length === 0
							// Comment a next row if you want init mediaelements on the background video inside a layouts title
							&& $self.parents( '.sc_layouts_title' ).length === 0
							// Uncomment the next row to 
							// disable mediaelements init on the Elementor's video shortcode
							// to support a video ratio, specified in a shortcode parameters
							// && $self.parents( '.elementor-fit-aspect-ratio' ).length === 0
							&& ( CRITIQUE_STORAGE['init_all_mediaelements']
								|| ( ! $self.hasClass( 'wp-audio-shortcode' )
									&& ! $self.hasClass( 'wp-video-shortcode' )
									&& ! $self.parent().hasClass( 'wp-playlist' )
									)
								)
						) {
							var media_cont = $self.parents('.post_video,.video_frame').eq(0);
							if ( media_cont.length === 0 ) {
								media_cont = $self.parent();
							}
							var cont_w = media_cont.length > 0 ? media_cont.width() : -1,
								cont_h = media_cont.length > 0 ? Math.floor(cont_w / 16 * 9) : -1,
								settings = {
									enableAutosize: true,
									videoWidth:     cont_w,   // if set, overrides <video width>
									videoHeight:    cont_h,   // if set, overrides <video height>
									audioWidth:     '100%',   // width of audio player
									audioHeight:    40,	      // height of audio player
									success: function(mejs) {
										if ( mejs.pluginType && 'flash' === mejs.pluginType && mejs.attributes ) {
											mejs.attributes.autoplay
												&& 'false' !== mejs.attributes.autoplay
												&& mejs.addEventListener( 'canplay', function () { mejs.play(); }, false );
											mejs.attributes.loop
												&& 'false' !== mejs.attributes.loop
												&& mejs.addEventListener( 'ended', function () { mejs.play(); }, false );
										}
									}
								};
							$self.mediaelementplayer( settings );
						}
					}
				);
			} else if ( CRITIQUE_STORAGE['mejs_attempts']++ < 5 ) {
				setTimeout( function() { critique_init_media_elements( cont ); }, 400 );
			}
		}
		// Init all media elements after first run
		setTimeout( function() { CRITIQUE_STORAGE['init_all_mediaelements'] = true; }, 1000 );
	}

	// Load the tab's content
	function critique_tabs_ajax_content_loader(panel, page, oldPanel) {
		if (panel.html().replace( /\s/g, '' ) === '') {
			var height = oldPanel === undefined ? panel.height() : oldPanel.height();
			if (isNaN( height ) || height < 100) {
				height = 100;
			}
			panel.html( '<div class="critique_tab_holder" style="min-height:' + height + 'px;"></div>' );
		} else {
			panel.find( '> *' ).addClass( 'critique_tab_content_remove' );
		}
		panel.data( 'need-content', false ).addClass( 'critique_loading' );
		jQuery.post(
			CRITIQUE_STORAGE['ajax_url'], {
				nonce: CRITIQUE_STORAGE['ajax_nonce'],
				action: 'critique_ajax_get_posts',
				blog_template: panel.data( 'blog-template' ),
				blog_style: panel.data( 'blog-style' ),
				posts_per_page: panel.data( 'posts-per-page' ),
				cat: panel.data( 'cat' ),
				parent_cat: panel.data( 'parent-cat' ),
				post_type: panel.data( 'post-type' ),
				taxonomy: panel.data( 'taxonomy' ),
				page: page
			}
		).done(	function( response ) {
			panel.removeClass( 'critique_loading' );
			var rez = {};
			try {
				rez = JSON.parse( response );
			} catch (e) {
				rez = { error: CRITIQUE_STORAGE['msg_ajax_error'] };
				console.log( response );
			}
			if (rez.error !== '') {
				panel.html( '<div class="critique_error">' + rez.error + '</div>' );
			} else {
				// Get inline styles and add to the page styles
				if ( rez.css !== '' ) {
					critique_import_inline_styles( '<style id="critique-inline-styles-inline-css">' + rez.css + '</style>' );
				}
				// Append posts
				panel
					.find( '.critique_tab_holder,.critique_tab_content_remove' ).remove().end()
					.prepend( rez.data ).fadeIn(
						function() {
							critique_document_animate_to('#content_skip_link_anchor');
							$document.trigger( 'action.init_hidden_elements', [panel] );
							$window.trigger( 'scroll' );
						}
					);
				$document.trigger('action.after_add_content', [panel]);
			}
			$document.trigger( 'action.got_ajax_response', {
				action: 'critique_ajax_get_posts',
				result: rez,
				panel: panel
			} );
		} );
	} // critique_tabs_ajax_content_loader


	// Navigation
	//==============================================

	// Init Superfish menu
	function critique_init_sfmenu(selector) {
		jQuery( selector ).show().each(
			function() {
				var $self = jQuery( this );
				// Do not init the mobile menu - only add class 'inited'
				if ($self.addClass( 'inited' ).parents( '.menu_mobile' ).length > 0) {
					return;
				}
				var animation_in = $self.parent().data( 'animation_in' );
				if (animation_in == undefined) {
					animation_in = "none";
				}
				var animation_out = $self.parent().data( 'animation_out' );
				if (animation_out == undefined) {
					animation_out = "none";
				}
				$self.superfish(
					{
						delay: 300,
						animation: {
							opacity: 'show'
						},
						animationOut: {
							opacity: 'hide'
						},
						speed: 		animation_in != 'none' ? 500 : 200,
						speedOut:	animation_out != 'none' ? 300 : 200,
						autoArrows: false,
						dropShadows: false,
						onBeforeShow: function(ul) {
							var $self = jQuery( this );
							var par_offset = 0,
								par_width = 0,
								ul_width = 0,
								ul_height = 0;
							// Detect horizontal position (left | right)
							if ( $self.parents( "ul" ).length > 1 ) {
								var w      = $page_wrap.width();
								par_offset = $self.parents( "ul" ).eq(0).offset().left;
								par_width  = $self.parents( "ul" ).eq(0).outerWidth();
								ul_width   = $self.outerWidth();
								if (par_offset + par_width + ul_width > w - 20 && par_offset - ul_width > 0) {
									$self.addClass( 'submenu_left' );
								} else {
									$self.removeClass( 'submenu_left' );
								}
							}
							// Shift vertical if menu going out the window
							if ( $self.parents( '.top_panel' ).length > 0 ) {
								ul_height      = $self.outerHeight();
								par_offset     = 0;
								var w_height   = _window_height,
									row        = $self.parents( '.sc_layouts_row' ).eq(0),
									row_offset = 0,
									row_height = 0,
									par        = $self.parent();
								while (row.length > 0) {
									row_offset += row.outerHeight();
									if (row.hasClass( 'sc_layouts_row_fixed_on' )) {
										break;
									}
									row = row.prev();
								}
								while (par.length > 0) {
									par_offset += par.position().top + par.parent().position().top;
									row_height  = par.outerHeight();
									if (par.position().top === 0) {
										break;
									}
									par = par.parents( 'li' ).eq(0);
								}
								if (row_offset + par_offset + ul_height > w_height) {
									if (par_offset > ul_height) {
										$self.css( {
											'top': 'auto',
											'bottom': '-1.4em'
										} );
									} else {
										$self.css( {
											'top': '-' + (par_offset - row_height - 2) + 'px',
											'bottom': 'auto'
										} );
									}
								}
							}
							// Animation in
							if (animation_in != 'none') {
								$self.removeClass( 'animated faster ' + animation_out );
								$self.addClass( 'animated fast ' + animation_in );
							}
						},
						onBeforeHide: function(ul) {
							if (animation_out != 'none') {
								var $self = jQuery( this );
								$self.removeClass( 'animated fast ' + animation_in );
								$self.addClass( 'animated faster ' + animation_out );
							}
						},
						onShow: function(ul) {
							var $self = jQuery( this );
							// Init layouts
							if ( ! $self.hasClass( 'layouts_inited' )) {
								$self.addClass( 'layouts_inited' );
								$document.trigger( 'action.init_hidden_elements', [$self] );
							}
						}
					}
				);
			}
		);
	}  // critique_init_sfmenu

	// Add TOC in the side menu
	// Make this function global because it used in the elementor.js
	function critique_add_toc_to_sidemenu() {
		if ( jQuery( '.menu_side_inner' ).length > 0 && jQuery( '#toc_menu' ).length > 0 ) {
			jQuery( '#toc_menu' ).appendTo( '.menu_side_inner' );
			critique_stretch_sidemenu();
		}
	}

	// Get inline styles and add to the page styles
	function critique_import_inline_styles( response ) {
		var selector = 'critique-inline-styles-inline-css';
		var p1       = response.indexOf( selector );
		if (p1 < 0) {
			selector = 'trx_addons-inline-styles-inline-css';
			p1       = response.indexOf( selector );
		}
		if (p1 > 0) {
			p1                 = response.indexOf( '>', p1 ) + 1;
			var p2             = response.indexOf( '</style>', p1 ),
				inline_css_add = response.substring( p1, p2 ),
				inline_css     = jQuery( '#' + selector );
			if (inline_css.length === 0) {
				$body.append( '<style id="' + selector + '" type="text/css">' + inline_css_add + '</style>' );
			} else {
				inline_css.append( inline_css_add );
			}
		}
	}

	// Get tags 'link' from response and add its to the 'head'
	function critique_import_tags_link( response ) {
		// Get links to css from response
		var links = response.match( /<link[^>]*rel=['"]stylesheet['"][^>]*id=['"]([^'"]+)['"][^>]*>/g );
		if ( links ) {
			// Prepend its to the HEAD (if not loaded in the current page)
			var $head = jQuery( 'head' );
			for ( var i = 0; i < links.length; i++ ) {
				var matches = links[i].match( /<link[^>]*rel=['"]stylesheet['"][^>]*id=['"]([^'"]+)['"][^>]*>/ );
				if ( matches && matches.length && matches.length > 1 && matches[1] ) {
					if ( jQuery( '#' + matches[1].replace('.', '\\.') ).length === 0 ) {
						$head.prepend( links[i] );
					}
				}
			}
		}
	}

	// Init intersection observer
	//==============================================
	function critique_intersection_observer_init() {

		if ( typeof IntersectionObserver != 'undefined' ) {
			// Create observer
			if ( typeof CRITIQUE_STORAGE['intersection_observer'] == 'undefined' ) {
				CRITIQUE_STORAGE['intersection_observer'] = new IntersectionObserver( function(entries) {
						entries.forEach( function( entry ) {
							critique_intersection_observer_in_out( jQuery(entry.target), entry.isIntersecting || entry.intersectionRatio > 0 ? 'in' : 'out', entry );
						} );
					},
					{
						root: null,			// avoiding 'root' or setting it to 'null' sets it to default value: viewport
						rootMargin: '1px',	// increase (if positive) or decrease (if negative) root area
											// 1px is used instead 0px to avoid a problem with appear sticky elements when window is scrolled down
						threshold: 0		// 0.0 - 1.0: 0.0 - fired when top of the object enter in the viewport
											//            0.5 - fired when half of the object enter in the viewport
											//            1.0 - fired when the whole object enter in the viewport
					}
				);
			}
		} else {
			// Emulate IntersectionObserver behaviour
			$window.on( 'scroll', function() {
				if ( typeof CRITIQUE_STORAGE['intersection_observer_items'] != 'undefined' ) {
					for ( var i in CRITIQUE_STORAGE['intersection_observer_items'] ) {
						if ( ! CRITIQUE_STORAGE['intersection_observer_items'][i] || CRITIQUE_STORAGE['intersection_observer_items'][i].length === 0 ) {
							continue;
						}
						var item = CRITIQUE_STORAGE['intersection_observer_items'][i],
							item_top = item.offset().top,
							item_height = item.height();
						critique_intersection_observer_in_out( item, item_top + item_height > _window_scroll_top && item_top < _window_scroll_top + _window_height ? 'in' : 'out' );
					}
				}
			} );
		}

		// Change state of the entry
		window.critique_intersection_observer_in_out = function( item, state, entry ) {
			var callback = null;
			if ( state == 'in' ) {
				if ( ! item.hasClass( 'critique_in_viewport' ) ) {
					item.addClass( 'critique_in_viewport' );
					callback = item.data('trx-addons-intersection-callback');
					if ( callback ) {
						callback( item, true, entry );
					}
				}
			} else {
				if ( item.hasClass( 'critique_in_viewport' ) ) {
					item.removeClass( 'critique_in_viewport' );
					callback = item.data('trx-addons-intersection-callback');
					if ( callback ) {
						callback( item, false, entry );
					}
				}
			}
		};

		// Add elements to the observer
		window.critique_intersection_observer_add = function( items, callback ) {
			items.each( function() {
				var $self = jQuery( this ),
					id = $self.attr( 'id' );
				if ( ! $self.hasClass( 'critique_intersection_inited' ) ) {
					if ( ! id ) {
						id = 'io-' + ( '' + Math.random() ).replace('.', '');
						$self.attr( 'id', id );
					}
					$self.addClass( 'critique_intersection_inited' );
					if ( callback ) {
						$self.data( 'trx-addons-intersection-callback', callback );
					}
					if ( typeof CRITIQUE_STORAGE['intersection_observer_items'] == 'undefined' ) {
						CRITIQUE_STORAGE['intersection_observer_items'] = {};
					}
					CRITIQUE_STORAGE['intersection_observer_items'][id] = $self;
					if ( typeof CRITIQUE_STORAGE['intersection_observer'] !== 'undefined' ) {
						CRITIQUE_STORAGE['intersection_observer'].observe( $self.get(0) );
					}
				}
			} );
		};

		// Remove elements from the observer
		window.critique_intersection_observer_remove = function( items ) {
			items.each( function() {
				var $self = jQuery( this ),
					id = $self.attr( 'id' );
				if ( $self.hasClass( 'critique_intersection_inited' ) ) {
					$self.removeClass( 'critique_intersection_inited' );
					delete CRITIQUE_STORAGE['intersection_observer_items'][id];
					if ( typeof CRITIQUE_STORAGE['intersection_observer'] !== 'undefined' ) {
						CRITIQUE_STORAGE['intersection_observer'].unobserve( $self.get(0) );
					}
				}
			} );
		};
	}



	// Scroll actions
	//==============================================

	// Do actions when page scrolled
	function critique_scroll_actions() {

		// Update global values
		_window_scroll_top = $window.scrollTop();

		// Call theme/plugins specific action (if exists)
		$document.trigger( 'action.scroll_critique' );

		// Fix/unfix sidebar
		critique_fix_sidebar();

		// Fix/unfix nav links
		critique_fix_nav_links();

		// Fix/unfix share links
		critique_fix_share_links();

		// Shift top and footer panels when header position is 'Under content'
		critique_shift_under_panels();

		// Show full post reading progress
		critique_full_post_reading();

		// Set flag about scroll actions are finished
		CRITIQUE_STORAGE['scroll_busy'] = false;
	}

	// Add post_id to the readed list
	function critique_add_to_read_list(post_id) {
		if ( post_id > 0 ) {
			var read_list = critique_get_storage('critique_post_read');
			if ( read_list && read_list.charAt(0) == '[' ) {
				read_list = JSON.parse(read_list);
			} else {
				read_list = [];
			}
			if ( read_list.indexOf(post_id) == -1 ) {
				read_list.push(post_id);
			}
			critique_set_storage('critique_post_read', JSON.stringify(read_list));
		}
	}

	var fpr_bt, fpr_cont, fpr_cs, fpr_ch, fpr_pw;
	function critique_full_post_read_change_state() {
		fpr_bt = jQuery('.full_post_close');
		if ( fpr_bt.length == 1 ) {
			fpr_cont = fpr_bt.parent();
			fpr_cs   = fpr_cont.offset().top;
			fpr_ch   = fpr_cont.height();
			fpr_pw   = fpr_bt.find('.full_post_progress');
		}
	}

	// Show full post reading progress
	function critique_full_post_reading() {
		if ( typeof fpr_bt == 'undefined' ) {
			critique_full_post_read_change_state();
		}
		if ( fpr_bt.length == 1 ) {
			var ws = _window_scroll_top,
				wh = _window_height;
			if ( ws > fpr_cs ) {
				if ( fpr_pw.length === 0 ) {
					fpr_bt.append(
						'<span class="full_post_progress">'
							+ '<svg viewBox="0 0 50 50">'
								+ '<circle class="full_post_progress_bar" cx="25" cy="25" r="22"></circle>'
							+ '</svg>'
						+ '</span>'
					);
					fpr_pw = fpr_bt.find('.full_post_progress');
				}
				var bar = fpr_pw.find('.full_post_progress_bar'),
					bar_max = parseFloat( bar.css('stroke-dasharray') );
				if ( fpr_cs + fpr_ch > ws + wh ) {
					var now = fpr_cs + fpr_ch - ( ws + wh ),
						delta = bar.data('delta');
					if ( delta == undefined ) {
						delta = now;
						bar.data('delta', delta);
					}
					bar.css('stroke-dashoffset', Math.min( 1, now / delta ) * bar_max );
					if ( now / delta < 0.5 ) {
						var post = fpr_cont.prev(),
							post_id = post.data('post-id');
						post.addClass('full_post_read');
						critique_add_to_read_list(post_id);
					}
				} else if ( ! fpr_bt.hasClass('full_post_read_complete') ) {
					fpr_bt.addClass('full_post_read_complete');
				} else if ( fpr_cs + fpr_ch + wh / 3 < ws + wh ) {
					fpr_bt.trigger('click');
				}
			} else {
				if ( fpr_pw.length !== 0 ) {
					fpr_pw.remove();
				}
			}
		}
	}  // critique_full_post_reading

	// Shift top and footer panels when header position is 'Under content'
	function critique_shift_under_panels() {

		if ($body.hasClass( 'header_position_under' ) && ! critique_browser_is_mobile()) {

			// Disable 'under' behavior on small screen
			if ( $body.hasClass( 'mobile_layout' ) ) {	//_window_width < CRITIQUE_STORAGE['mobile_breakpoint_underpanels_off'] ) {
				if ( $header.css( 'position' ) == 'fixed' ) {
					// Header
					$header.css(
						{
							'position': 'relative',
							'left': 'auto',
							'top': 'auto',
							'width': 'auto',
							'transform': 'none',
							'zIndex': 3
						}
					);
					$header.find( '.top_panel_mask' ).hide();
					// Content
					$page_content_wrap.css(
						{
							'marginTop': 0,
							'marginBottom': 0,
							'zIndex': 2
						}
					);
					// Footer
					$footer.css(
						{
							'position': 'relative',
							'left': 'auto',
							'bottom': 'auto',
							'width': 'auto',
							'transform': 'none',
							'zIndex': 1
						}
					);
					$footer.find( '.top_panel_mask' ).hide();
				}
				return;
			}

			// Header
			var delta           = 50;
			var scroll_offset   = _window_scroll_top;
			var header_height   = _header_height;
			var shift           = ! (/Chrome/.test( navigator.userAgent ) && /Google Inc/.test( navigator.vendor ))
									|| $header.find( '.slider_engine_revo' ).length === 0
										? 0	//1.2		// Parallax speed (if 0 - disable parallax)
										: 0;
			var mask            = $header.find( '.top_panel_mask' );
			var mask_opacity    = 0;
			var css             = {};
			if (mask.length === 0) {
				$header.append( '<div class="top_panel_mask"></div>' );
				mask = $header.find( '.top_panel_mask' );
			}
			if ( $header.css( 'position' ) !== 'fixed' ) {
				$page_content_wrap.css(
					{
						'zIndex': 5,
						'marginTop': header_height + 'px'
					}
				);
				$header.css(
					{
						'position': 'fixed',
						'left': 0,
						'top': _adminbar_height + 'px',
						'width': '100%',
						'zIndex': 3
					}
				);
			} else {
				$page_content_wrap.css( 'marginTop', header_height + 'px' );
			}
			if (scroll_offset > 0) {
				var offset = scroll_offset;	// - _adminbar_height;
				if (offset <= header_height) {
					mask_opacity = Math.max( 0, Math.min( 0.8, (offset - delta) / header_height ) );
					// Don't shift header with Revolution slider in Chrome
					if (shift) {
						$header.css( 'transform', 'translate3d(0px, ' + (-Math.round( offset / shift )) + 'px, 0px)' );
					}
					mask.css(
						{
							'opacity': mask_opacity,
							'display': offset === 0 ? 'none' : 'block'
						}
					);
				} else {
					if (shift) {
						$header.css( 'transform', 'translate3d(0px, ' + (-Math.round( offset / shift )) + 'px, 0px)' );
					}
				}
			} else {
				if (shift) {
					$header.css( 'transform', 'none' );
				}
				if (mask.css( 'display' ) != 'none') {
					mask.css(
						{
							'opacity': 0,
							'display': 'none'
						}
					);
				}
			}

			// Footer
			var footer_height  = Math.min( _footer_height, _window_height );
			var footer_visible = (scroll_offset + _window_height) - ( $header.outerHeight() + $page_content_wrap.outerHeight() );
			if ( $footer.css( 'position' ) !== 'fixed' ) {
				$page_content_wrap.css(
					{
						'marginBottom': footer_height + 'px'
					}
				);
				$footer.css(
					{
						'position': 'fixed',
						'left': 0,
						'bottom': 0,
						'width': '100%',
						'zIndex': 2
					}
				);
			} else {
				$page_content_wrap.css( 'marginBottom', footer_height + 'px' );
			}
			if ( footer_visible > 0 ) {
				if ( $footer.css( 'zIndex' ) == 2 ) {
					$footer.css( 'zIndex', 4 );
				}
				mask = $footer.find( '.top_panel_mask' );
				if (mask.length === 0) {
					$footer.append( '<div class="top_panel_mask"></div>' );
					mask = $footer.find( '.top_panel_mask' );
				}
				if (footer_visible <= footer_height) {
					mask_opacity = Math.max( 0, Math.min( 0.8, (footer_height - footer_visible) / footer_height ) );
					// Don't shift header with Revolution slider in Chrome
					if (shift) {
						$footer.css( 'transform', 'translate3d(0px, ' + Math.round( (footer_height - footer_visible) / shift ) + 'px, 0px)' );
					}
					mask.css(
						{
							'opacity': mask_opacity,
							'display': footer_height - footer_visible <= 0 ? 'none' : 'block'
						}
					);
				} else {
					if (shift) {
						$footer.css( 'transform', 'none' );
					}
					if (mask.css( 'display' ) != 'none') {
						mask.css(
							{
								'opacity': 0,
								'display': 'none'
							}
						);
					}
				}
			} else {
				if ( $footer.css( 'zIndex' ) == 4 ) {
					$footer.css( 'zIndex', 2 );
				}
			}
		}
	}  // critique_shift_under_panels


	// Fix/unfix footer
	function critique_fix_footer() {
		if ( $body.hasClass( 'header_position_under' ) && ! critique_browser_is_mobile() ) {
			if ( $footer.length > 0 ) {
				var ft_height = $footer.outerHeight( false ),
				pc            = $page_content_wrap,
				pc_offset     = pc.offset().top,
				pc_height     = pc.height();
				if ( pc_offset + pc_height + ft_height < _window_height ) {
					if ( $footer.css( 'position' ) != 'absolute' ) {
						$footer.css( {
							'position': 'absolute',
							'left': 0,
							'bottom': 0,
							'width' :'100%'
						} );
					}
				} else {
					if ( $footer.css( 'position' ) != 'relative' ) {
						$footer.css( {
							'position': 'relative',
							'left': 'auto',
							'bottom': 'auto'
						} );
					}
				}
			}
		}
	}  // critique_fix_footer

	// Fix/unfix sidebar
	function critique_fix_sidebar(force) {
		// Fix sidebar only if css sticky behaviour is not used
		if ( $body.hasClass( 'fixed_blocks_sticky' ) ) {
			return;
		}
		$sidebar.each( function() {
			var sb        = jQuery( this );
			var content   = sb.siblings( '.content' );
			var old_style = '';

			if ( content.length == 0 ) {
				return;
			}

			// Unfix when sidebar is under content
			if (content.css( 'float' ) == 'none') {
				old_style = sb.data( 'old_style' );
				if (old_style !== undefined) {
					sb.attr( 'style', old_style ).removeAttr( 'data-old_style' );
				}

			} else {

				var sb_height      = sb.outerHeight();
				var sb_shift       = 30;
				var content_height = content.outerHeight();
				var content_top    = content.offset().top;
				var content_shift  = content.position().top;

				// If sidebar shorter then content and page scrolled below the content's top
				if (sb_height < content_height && _window_scroll_top + _fixed_rows_height > content_top) {

					var sb_init = {
						'position': 'undefined',
						'float': 'none',
						'top': 'auto',
						'bottom': 'auto',
						'marginLeft': '0',
						'marginRight': '0'
					};

					if (typeof CRITIQUE_STORAGE['scroll_offset_last'] == 'undefined') {
						CRITIQUE_STORAGE['sb_top_last']        = content_top;
						CRITIQUE_STORAGE['scroll_offset_last'] = _window_scroll_top;
						CRITIQUE_STORAGE['scroll_dir_last']    = 1;
					}
					var scroll_dir = _window_scroll_top - CRITIQUE_STORAGE['scroll_offset_last'];
					if (scroll_dir === 0) {
						scroll_dir = CRITIQUE_STORAGE['scroll_dir_last'];
					} else {
						scroll_dir = scroll_dir > 0 ? 1 : -1;
					}

					var sb_big = sb_height + sb_shift >= _window_height - _fixed_rows_height,
					sb_top     = sb.offset().top;

					if (sb_top < 0) {
						sb_top = CRITIQUE_STORAGE['sb_top_last'];
					}

					// If sidebar height greater then window height
					if (sb_big) {

						// If change scrolling dir
						if (scroll_dir != CRITIQUE_STORAGE['scroll_dir_last'] && sb.css( 'position' ) == 'fixed') {
							sb_init.position = 'absolute';
							sb_init.top      = sb_top + content_shift - content_top;

						// If scrolling down
						} else if (scroll_dir > 0) {
							if (_window_scroll_top + _window_height >= content_top + content_height) {
								sb_init.position = 'absolute';
								sb_init.bottom   = 0;
							} else if (_window_scroll_top + _window_height >= (sb.css( 'position' ) == 'absolute' ? sb_top : content_top) + sb_height + sb_shift) {
								sb_init.position = 'fixed';
								sb_init.bottom   = sb_shift;
							}

						// If scrolling up
						} else {
							if (_window_scroll_top + _fixed_rows_height <= sb_top) {
								sb_init.position = 'fixed';
								sb_init.top      = _fixed_rows_height;
							}
						}

					// If sidebar height less then window height
					} else {
						if (_window_scroll_top + _fixed_rows_height >= content_top + content_height - sb_height) {
							sb_init.position = 'absolute';
							sb_init.bottom   = 0;
						} else {
							sb_init.position = 'fixed';
							sb_init.top      = _fixed_rows_height;
						}
					}
					
					if (force && sb_init.position == 'undefined' && sb.css('position') == 'absolute') {
						sb_init.position = 'absolute';
						if (sb.css('top') != 'auto') {
							sb_init.top = sb.css('top');
						} else {
							sb_init.bottom = sb.css('bottom');
						}
					}

					// Check bounds
					if ( sb_init.position == 'absolute' || sb_init.position == 'undefined' ) {
						if ( sb_init.top == 'auto' && sb_init.bottom == 'auto' ) {
							sb_init.top = sb.offset().top;
						}
						if ( sb_init.top != 'auto' ) {
							if ( sb_init.top + sb_height > content_height ) {
								sb_init.position = 'absolute';
								sb_init.top = content_shift + content_height - sb_height;
								force = true;
							}
							if ( sb_init.top + sb_height <= content_shift + content_height && sb_init.top >= _window_scroll_top + _window_height ) {
								sb_init.position = 'fixed';
								sb_init.top      = 'auto';
								sb_init.bottom   = sb_shift;
								force = true;
							}
						}
					} else if ( sb_init.position == 'fixed' ) {
						if ( sb_init.top == 'auto' && sb_init.bottom == 'auto' && sb.css('top') != 'auto') {
							sb_init.top = parseFloat( sb.css('top') );
						}
						if ( sb_init.top != 'auto' && _window_scroll_top + sb_init.top + sb_height > content_top + content_height ) {
							sb_init.position = 'absolute';
							sb_init.top = content_shift + content_height - sb_height;
							force = true;
						}
					}

					// Set new position of the sidebar
					if (sb_init.position != 'undefined') {
						// Insert placeholder before sidebar
						var style = sb.attr('style');
						if (!style) style = '';
						if (!sb.prev().hasClass('sidebar_fixed_placeholder')) {
							sb.css(sb_init);
							CRITIQUE_STORAGE['scroll_dir_last'] = 0;
							sb.before('<div class="sidebar_fixed_placeholder '+sb.attr('class')+'"'
									   		+ (sb.data('sb') ? ' data-sb="' + sb.data('sb') + '"' : '')
									   + '></div>');
						}
						// Detect horizontal position
						sb_init.left = sb_init.position == 'fixed' || $body.hasClass('body_style_fullwide') || $body.hasClass('body_style_fullscreen')
											? sb.prev().offset().left
											: sb.prev().position().left;
						sb_init.right = 'auto';
						sb_init.width = sb.prev().width() + parseFloat(sb.prev().css('paddingLeft')) + parseFloat(sb.prev().css('paddingRight'));
						// Set position
						if (force
							|| sb.css('position') != sb_init.position 
							|| CRITIQUE_STORAGE['scroll_dir_last'] != scroll_dir
							|| sb.width() != sb_init.width) {
							if (sb.data('old_style') === undefined) {
								sb.attr('data-old_style', style);
							}
							sb.css(sb_init);
						}
					}

					CRITIQUE_STORAGE['sb_top_last']        = sb_top;
					CRITIQUE_STORAGE['scroll_offset_last'] = _window_scroll_top;
					CRITIQUE_STORAGE['scroll_dir_last']    = scroll_dir;

				} else {

					// Unfix when page scrolling to top
					old_style = sb.data( 'old_style' );
					if (old_style !== undefined) {
						sb.attr( 'style', old_style ).removeAttr( 'data-old_style' );
						if (sb.prev().hasClass('sidebar_fixed_placeholder')) {
							sb.prev().remove();
						}
					}

				}
			}
		} );
	}  // critique_fix_sidebar

	// Fix/unfix .nav_links_fixed
	function critique_fix_nav_links() {
		if ( $single_nav_links_fixed.length > 0 && $single_nav_links_fixed.css( 'position' ) == 'fixed') {
			var window_bottom = _window_scroll_top + _window_height,
				article = jQuery('.post_item_single'),
				article_top = article.length > 0 ? article.offset().top : _window_height,
				article_bottom = article_top + ( article.length > 0 ? article.height() * 2 / 3 : 0 ),
				footer_top = $footer.length > 0 ? $footer.offset().top : 100000;
			if ( article_bottom < window_bottom && footer_top > window_bottom ) {
				if ( ! $single_nav_links_fixed.hasClass('nav-links-visible') ) {
					$single_nav_links_fixed.addClass('nav-links-visible');
				}
			} else {
				if ( $single_nav_links_fixed.hasClass('nav-links-visible') ) {
					$single_nav_links_fixed.removeClass('nav-links-visible');
				}					
			}
		}
	}

	// Fix/unfix .post_info_vertical_fixed
	function critique_fix_share_links() {
		if ( $single_post_info_fixed.length > 0 ) {
			var frh = _fixed_rows_height + 10,
				st = _window_scroll_top + frh;
			$single_post_info_fixed.each( function() {
				var share_links = jQuery(this),
					share_links_top = share_links.offset().top,
					share_links_left = share_links.offset().left,
					share_links_height = share_links.height(),
					share_links_position = share_links.css( 'position' ),
					article = share_links.parents('.post_content'),
					article_top = article.offset().top,
					article_bottom = article_top + article.height();
				if ( share_links_position == 'absolute') {
					if ( st >= article_top && st + share_links_height < article_bottom ) {
						share_links
							.data('abs-pos', {
								'left': share_links.css('left'), 
								'top':  share_links.css('top')})
							.addClass('post_info_vertical_fixed_on')
							.css({
								'top':  frh,
								'left': share_links_left
							});
					}
				} else if ( share_links_position == 'fixed' ) {
					if ( st < article_top ) {
						if ( share_links.hasClass( 'post_info_vertical_fixed_on' ) ) {
							var abs_pos = share_links.data('abs-pos');
							share_links
								.removeClass( 'post_info_vertical_fixed_on' )
								.css({
									'top': abs_pos.top,
									'left': abs_pos.left
								});
						}
					} else if ( st + share_links_height >= article_bottom ) {
						share_links.fadeOut();
					} else if ( share_links.css('display') == 'none' ) {
						share_links.fadeIn();
					}
				}
			});
		}
	}




	// Resize actions
	//==============================================

	// Do actions when page scrolled
	function critique_resize_actions(cont) {

		// Update global values
		_window_height     = $window.height();
		_window_width      = $window.width();
		_window_scroll_top = $window.scrollTop();
		_document_height   = $document.height();
		_adminbar_height   = critique_adminbar_height();
		_header_height     = $header.length === 0 ? 0 : $header.height();
		_footer_height     = $footer.length === 0 ? 0 : $footer.height();
		
		update_fixed_rows_height();
		
		// Call handlers
		critique_check_layout();
		critique_fix_sidebar(true);
		critique_fix_footer();
		critique_fix_nav_links();
		critique_stretch_width( cont );
		critique_stretch_bg_video();
		critique_vc_row_fullwidth_to_boxed( cont );
		critique_stretch_sidemenu();
		critique_resize_video( cont );
		critique_shift_under_panels();

		// Call theme/plugins specific action (if exists)
		//----------------------------------------------
		$document.trigger( 'action.resize_critique', [cont] );
	}

	// Stretch sidemenu (if present)
	function critique_stretch_sidemenu() {
		var toc_items = $menu_side_wrap.find( '.toc_menu_item' );
		if (toc_items.length === 0) {
			return;
		}
		var toc_items_height = _window_height
							- _adminbar_height
							- $menu_side_logo.outerHeight()
							- toc_items.length;
		var th               = Math.floor( toc_items_height / toc_items.length );
		var th_add           = toc_items_height - th * toc_items.length;
		if (CRITIQUE_STORAGE['menu_side_stretch'] && toc_items.length >= 5 && th >= 30) {
			toc_items.find( ".toc_menu_description,.toc_menu_icon" ).css(
				{
					'height': th + 'px',
					'lineHeight': th + 'px'
				}
			);
			toc_items.eq( 0 ).find( ".toc_menu_description,.toc_menu_icon" ).css(
				{
					'height': (th + th_add) + 'px',
					'lineHeight': (th + th_add) + 'px'
				}
			);
		}
		//$menu_side_wrap.find('#toc_menu').height(toc_items_height + toc_items.length - toc_items.eq(0).height());
	}

	// Scroll sidemenu (if present)
	$document.on( 'action.toc_menu_item_active', function() {
		var toc_menu = $menu_side_wrap.find( '#toc_menu' );
		if (toc_menu.length === 0) {
			return;
		}
		var toc_items = toc_menu.find( '.toc_menu_item' );
		if (toc_items.length === 0) {
			return;
		}
		var th           = toc_items.eq( 0 ).height(),
		toc_menu_pos     = parseFloat( toc_menu.css( 'top' ) ),
		toc_items_height = toc_items.length * th,
		menu_side_height = _window_height
							- _adminbar_height
							- $menu_side_logo.outerHeight()
							- $menu_side_logo.next( '.toc_menu_item' ).outerHeight();
		if ( toc_items_height > menu_side_height ) {
			var toc_item_active = $menu_side_wrap.find( '.toc_menu_item_active' ).eq( 0 );
			if ( toc_item_active.length == 1 ) {
				var toc_item_active_pos = (toc_item_active.index() + 1) * th;
				if (toc_menu_pos + toc_item_active_pos > menu_side_height - th) {
					toc_menu.css( 'top', Math.max( -toc_item_active_pos + 3 * th, menu_side_height - toc_items_height ) );
				} else if (toc_menu_pos < 0 && toc_item_active_pos < -toc_menu_pos + 2 * th) {
					toc_menu.css( 'top', Math.min( -toc_item_active_pos + 3 * th, 0 ) );
				}
			}
		} else if ( toc_menu_pos < 0 ) {
			toc_menu.css( 'top', 0 );
		}
	} );

	// Check for mobile layout
	function critique_check_layout() {
		var resize = true;
		if ( $body.hasClass( 'no_layout' ) ) {
			$body.removeClass( 'no_layout' );
			resize = false;
		}
		var w = window.innerWidth;
		if (w == undefined) {
			w = _window_width + (_window_height < _document_height || _window_scroll_top > 0 ? 16 : 0);
		}
		if ( w < CRITIQUE_STORAGE['mobile_layout_width'] ) {
			if ( ! $body.hasClass( 'mobile_layout' )) {
				$body.removeClass( 'desktop_layout' ).addClass( 'mobile_layout' );
				$document.trigger( 'action.switch_to_mobile_layout' );
				if (resize) {
					$window.trigger( 'resize' );
				}
			}
		} else {
			if ( ! $body.hasClass( 'desktop_layout' )) {
				$body.removeClass( 'mobile_layout' ).addClass( 'desktop_layout' );
				jQuery( '.menu_mobile' ).removeClass( 'opened' );
				jQuery( '.menu_mobile_overlay' ).hide();
				$document.trigger( 'action.switch_to_desktop_layout' );
				if ( resize ) {
					$window.trigger( 'resize' );
				}
			}
		}
		if (CRITIQUE_STORAGE['mobile_device'] || critique_browser_is_mobile()) {
			$body.addClass( 'mobile_device' );
		}
	}

	// Stretch area to full window width
	function critique_stretch_width(cont) {
		if (cont === undefined) {
			cont = $body;
		}
		$stretch_width.each(
			function() {
				var $el             = jQuery( this );
				var $el_cont        = $el.parents( '.page_wrap' );
				var $el_cont_offset = 0;
				if ($el_cont.length === 0) {
					$el_cont = $window;
				} else {
					$el_cont_offset = $el_cont.offset().left;
				}
				var $el_full        = $el.next( '.trx-stretch-width-original' );
				var el_margin_left  = parseInt( $el.css( 'margin-left' ), 10 );
				var el_margin_right = parseInt( $el.css( 'margin-right' ), 10 );
				var offset          = $el_cont_offset - $el_full.offset().left - el_margin_left;
				var width           = $el_cont.width();
				if ( ! $el.hasClass( 'inited' )) {
					$el.addClass( 'inited invisible' );
					$el.css(
						{
							'position': 'relative',
							'box-sizing': 'border-box'
						}
					);
				}
				$el.css(
					{
						'left': offset,
						'width': $el_cont.width()
					}
				);
				if ( ! $el.hasClass( 'trx-stretch-content' ) ) {
					var padding      = Math.max( 0, -1 * offset );
					var paddingRight = Math.max( 0, width - padding - $el_full.width() + el_margin_left + el_margin_right );
					$el.css( { 'padding-left': padding + 'px', 'padding-right': paddingRight + 'px' } );
				}
				$el.removeClass( 'invisible' );
			}
		);
	}  // critique_stretch_width

	// Resize video frames
	function critique_resize_video(cont) {
		if (cont === undefined) {
			cont = $body;
		}
		// Resize tags 'video'
		cont.find( 'video' ).each( function() {
			var $self = jQuery( this );
			// If item now invisible
			if ( ( ! CRITIQUE_STORAGE['resize_tag_video'] && $self.parents('.mejs-mediaelement').length === 0 )
				|| $self.hasClass( 'trx_addons_resize' )
				|| $self.hasClass( 'trx_addons_noresize' )
				|| $self.parents( 'div:hidden,section:hidden,article:hidden' ).length > 0
			) {
				return;
			}
			var video     = $self.addClass( 'critique_resize' ).eq( 0 );
			var ratio     = (video.data( 'ratio' ) !== undefined ? video.data( 'ratio' ).split( ':' ) : [16,9]);
			ratio         = ratio.length != 2 || ratio[0] === 0 || ratio[1] === 0 ? 16 / 9 : ratio[0] / ratio[1];
			var mejs_cont = video.parents( '.mejs-video' ).eq(0);
			var mfp_cont  = video.parents( '.mfp-content' ).eq(0);
			var w_attr    = video.data( 'width' );
			var h_attr    = video.data( 'height' );
			if ( ! w_attr || ! h_attr) {
				w_attr = video.attr( 'width' );
				h_attr = video.attr( 'height' );
				if ( ! w_attr || ! h_attr) {
					return;
				}
				video.data( {'width': w_attr, 'height': h_attr} );
			}
			var percent = ('' + w_attr).substr( -1 ) == '%';
			w_attr      = parseInt( w_attr, 10 );
			h_attr      = parseInt( h_attr, 10 );
			var w_real  = Math.ceil(
							mejs_cont.length > 0
									? Math.min( percent ? 10000 : w_attr, mejs_cont.parents( 'div,article' ).eq(0).width() )
									: Math.min( percent ? 10000 : w_attr, video.parents( 'div,article' ).eq(0).width() )
			);
			if ( mfp_cont.length > 0 ) {
				w_real  = Math.max( mfp_cont.width(), w_real );
			}
			var h_real  = Math.ceil( percent ? w_real / ratio : w_real / w_attr * h_attr );
			if ( parseInt( video.attr( 'data-last-width' ), 10 ) == w_real ) {
				return;
			}
			if ( percent ) {
				video.height( h_real );
			} else if ( video.parents( '.wp-video-playlist' ).length > 0 ) {
				if ( mejs_cont.length === 0 ) {
					video.attr( {'width': w_real, 'height': h_real} );
				}
			} else {
				video.attr( {'width': w_real, 'height': h_real} ).css( {'width': w_real + 'px', 'height': h_real + 'px'} );
				if ( mejs_cont.length > 0 ) {
					critique_set_mejs_player_dimensions( video, w_real, h_real );
				}
			}
			video.attr( 'data-last-width', w_real );
		} );

		// Resize tags 'iframe'
		if ( CRITIQUE_STORAGE['resize_tag_iframe'] ) {
			cont.find( '.video_frame iframe,iframe' ).each( function() {
				var $self = jQuery( this );
				// If item now invisible
				if ( $self.hasClass( 'trx_addons_resize' ) || $self.hasClass( 'trx_addons_noresize' ) || $self.addClass( 'critique_resize' ).parents( 'div:hidden,section:hidden,article:hidden' ).length > 0 ) {
					return;
				}
				var iframe = $self.eq( 0 );
				if (iframe.length === 0 || iframe.attr( 'src' ) === undefined || iframe.attr( 'src' ).indexOf( 'soundcloud' ) > 0) {
					return;
				}
				var ratio  = (iframe.data( 'ratio' ) !== undefined
								? iframe.data( 'ratio' ).split( ':' )
								: (iframe.parent().data( 'ratio' ) !== undefined
									? iframe.parent().data( 'ratio' ).split( ':' )
									: (iframe.find( '[data-ratio]' ).length > 0
										? iframe.find( '[data-ratio]' ).data( 'ratio' ).split( ':' )
										: (iframe.attr('width') && iframe.attr('height')
											? [iframe.attr('width'), iframe.attr('height')]
											: [16, 9]
											)
										)
									)
								);
				ratio      = ratio.length != 2 || ratio[0] === 0 || ratio[1] === 0 ? 16 / 9 : ratio[0] / ratio[1];
				var w_attr = iframe.attr( 'width' );
				var h_attr = iframe.attr( 'height' );
				if ( ! w_attr || ! h_attr ) {
					return;
				}
				var percent   = ('' + w_attr).substr( -1 ) == '%';
				w_attr        = parseInt( w_attr, 10 );
				h_attr        = parseInt( h_attr, 10 );
				var par       = iframe.parents( 'div,section' ).eq(0),
					contains  = iframe.data('contains-in-parent')=='1' || iframe.hasClass('contains-in-parent'),
					nostretch = iframe.data('no-stretch-to-parent')=='1' || iframe.hasClass('no-stretch-to-parent'),
					pw        = Math.ceil( par.width() ),
					ph        = Math.ceil( par.height() ),
					w_real    = nostretch ? Math.min( w_attr, pw ) : pw,
					h_real    = Math.ceil( percent ? w_real / ratio : w_real / w_attr * h_attr );
				if ( contains && par.css( 'position' ) == 'absolute' && h_real > ph) {
					h_real = ph;
					w_real = Math.ceil( percent ? h_real * ratio : h_real * w_attr / h_attr );
				}
				if (parseInt( iframe.attr( 'data-last-width' ), 10 ) == w_real) {
					return;
				}
				iframe.css( {'width': w_real + 'px', 'height': h_real + 'px'} );
				iframe.attr( 'data-last-width', w_real );
			} );
		}
	}  // critique_resize_video

	// Set Media Elements player dimensions
	function critique_set_mejs_player_dimensions(video, w, h) {
		if (mejs) {
			for (var pl in mejs.players) {
				if (mejs.players[pl].media.src == video.attr( 'src' )) {
					if (mejs.players[pl].media.setVideoSize) {
						mejs.players[pl].media.setVideoSize( w, h );
					} else if (mejs.players[pl].media.setSize) {
						mejs.players[pl].media.setSize( w, h );
					}
					mejs.players[pl].setPlayerSize( w, h );
					mejs.players[pl].setControlsSize();
				}
			}
		}
	}

	// Stretch background video
	function critique_stretch_bg_video() {
		var video_wrap = jQuery( 'div#background_video,.tourmaster-background-video' );
		if (video_wrap.length === 0) {
			return;
		}
		var cont = video_wrap.hasClass( 'tourmaster-background-video' ) ? video_wrap.parent() : video_wrap,
		w        = cont.width(),
		h        = cont.height(),
		video    = video_wrap.find( '>iframe,>video' );
		if (w / h < 16 / 9) {
			w = h / 9 * 16;
		} else {
			h = w / 16 * 9;
		}
		video
			.attr( {'width': w, 'height': h} )
			.css( {'width': w, 'height': h} );
	}

	// Recalculate width of the vc_row[data-vc-full-width="true"] when content boxed or menu_side=='left|right'
	$document.on('vc-full-width-row action.before_resize_trx_addons', function(e, container) {
		critique_vc_row_fullwidth_to_boxed( jQuery(container) );
	});
	function critique_vc_row_fullwidth_to_boxed(cont) {
		if ( $body.hasClass( 'body_style_boxed' )
			|| $body.hasClass( 'menu_side_present' )
			|| parseInt($page_wrap.css('paddingLeft'), 10) > 0
		) {
			if (cont === undefined || ! cont.hasClass( '.vc_row' ) || ! cont.data( 'vc-full-width' )) {
				cont = jQuery( '.vc_row[data-vc-full-width="true"]' );
			}
			var rtl                = jQuery( 'html' ).attr( 'dir' ) == 'rtl';
			var page_wrap_pl       = parseInt( $page_wrap.css('paddingLeft'), 10 );
			if ( isNaN( page_wrap_pl ) ) {
				page_wrap_pl = 0;
			}
			var page_wrap_pr       = parseInt( $page_wrap.css('paddingRight'), 10 );
			if ( isNaN( page_wrap_pr ) ) {
				page_wrap_pr = 0;
			}
			var page_wrap_width    = $page_wrap.outerWidth() - page_wrap_pl - page_wrap_pr;
			var content_wrap       = $page_content_wrap.find( '.content_wrap' );
			var content_wrap_width = content_wrap.width();
			var indent             = ( page_wrap_width - content_wrap_width ) / 2;
			cont.each( function() {
				var $self           = jQuery( this );
				var mrg             = parseInt( $self.css( 'marginLeft' ), 10 );
				var stretch_content = $self.attr( 'data-vc-stretch-content' );
				var stretch_row     = $self.attr( 'data-vc-full-width' );
				var in_content      = $self.parents( '.content_wrap' ).length > 0;
				$self.css( {
					'width':         in_content && ! stretch_content && ! stretch_row ? Math.min( page_wrap_width, content_wrap_width ) : page_wrap_width,
					'left':          rtl ? 'auto' : ( in_content ? -indent : 0 ) - mrg,
					'right':         ! rtl ? 'auto' : ( n_content ? -indent : 0 ) - mrg,
					'padding-left':  stretch_content ? 0 : indent + mrg,
					'padding-right': stretch_content ? 0 : indent + mrg
				} );
			} );
		}
	}

	ready_busy = false;

} );
