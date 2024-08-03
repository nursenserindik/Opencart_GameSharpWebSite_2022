<?php
/**
 * Generate custom CSS
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Return CSS with custom colors and fonts
if ( ! function_exists( 'critique_customizer_get_css' ) ) {

	function critique_customizer_get_css( $args = array() ) {

		$colors        = isset( $args['colors'] ) ? $args['colors'] : null;
		$scheme        = isset( $args['scheme'] ) ? $args['scheme'] : null;
		$fonts         = isset( $args['fonts'] ) ? $args['fonts'] : null;
		$vars          = isset( $args['vars'] ) ? $args['vars'] : null;
		$remove_spaces = isset( $args['remove_spaces'] ) ? $args['remove_spaces'] : true;

		$css = array(
			'vars'   => '',
			'fonts'  => '',
			'colors' => '',
		);

		// Theme fonts
		//---------------------------------------------
		if ( null === $fonts ) {
			$fonts = critique_get_theme_fonts();
		}

		if ( $fonts ) {

			// Make theme-specific fonts rules
			$fonts        = critique_customizer_add_theme_fonts( $fonts );
			$rez          = array();
			$article_font = ( ! empty( $fonts['post_font-family'] )
								|| ! empty( $fonts['post_font-weight'] )
								|| ! empty( $fonts['post_font-style'] )
								|| ! empty( $fonts['post_text-decoration'] )
								|| ! empty( $fonts['post_text-transform'] )
								|| ! empty( $fonts['post_letter-spacing'] )
								? "
/* Article text*/
.post_item_single.post_type_post .post_content_single,
body.post-type-post .editor-block-list__layout {
	{$fonts['post_font-family']}
	{$fonts['post_font-weight']}
	{$fonts['post_font-style']}
	{$fonts['post_text-decoration']}
	{$fonts['post_text-transform']}
	{$fonts['post_letter-spacing']}
}
"
								: ''
							)
							. ( ! empty( $fonts['post_margin-top'] )
								|| ! empty( $fonts['post_margin-bottom'] )
								? "
.post_item_single.post_type_post .post_content_single p,
.post_item_single.post_type_post .post_content_single ul,
.post_item_single.post_type_post .post_content_single ol,
.post_item_single.post_type_post .post_content_single dl,
.post_item_single.post_type_post .post_content_single table,
.post_item_single.post_type_post .post_content_single blockquote,
.post_item_single.post_type_post .post_content_single address,
.post_item_single.post_type_post .post_content_single .wp-block-button,
.post_item_single.post_type_post .post_content_single .wp-block-cover,
.post_item_single.post_type_post .post_content_single .wp-block-image,
.post_item_single.post_type_post .post_content_single .wp-block-video,
.post_item_single.post_type_post .post_content_single .wp-block-media-text,
body.post-type-post .editor-block-list__layout p,
body.post-type-post .editor-block-list__layout ul,
body.post-type-post .editor-block-list__layout ol,
body.post-type-post .editor-block-list__layout dl,
body.post-type-post .editor-block-list__layout table,
body.post-type-post .editor-block-list__layout blockquote,
body.post-type-post .editor-block-list__layout address,
body.post-type-post .editor-block-list__layout .wp-block-button,
body.post-type-post .editor-block-list__layout .wp-block-cover,
body.post-type-post .editor-block-list__layout .wp-block-image,
body.post-type-post .editor-block-list__layout .wp-block-video,
body.post-type-post .editor-block-list__layout .wp-block-media-text {
	{$fonts['post_margin-top']}
	{$fonts['post_margin-bottom']}
}
"
								: ''
							)
							. ( ! empty( $fonts['post_font-size'] )
								? '
.post_item_single.post_type_post .post_content_single p:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single ul:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single ol:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single dl:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single table:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single blockquote:not([class*="-font-size"]),
.post_item_single.post_type_post .post_content_single address:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout p:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout ul:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout ol:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout dl:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout table:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout blockquote:not([class*="-font-size"]),
body.post-type-post .editor-block-list__layout address:not([class*="-font-size"]) {
' . $fonts['post_font-size'] . '
}
.post_item_single.post_type_post .post_content_single form p:not([style*="font-size"]) {
	font-size: 1em;
}
'
								: ''
							)
							. ( ! empty( $fonts['post_line-height'] )
								? '
.post_item_single.post_type_post .post_content_single p:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single ul:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single ol:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single dl:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single table:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single blockquote:not([style*="font-size"]),
.post_item_single.post_type_post .post_content_single address:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout p:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout ul:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout ol:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout dl:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout table:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout blockquote:not([style*="font-size"]),
body.post-type-post .editor-block-list__layout address:not([style*="font-size"]) {
' . $fonts['post_line-height'] . '
}
'
								: ''
							);

			$rez['fonts'] = <<<CSS

/* Main text*/
body {
	{$fonts['p_font-family']}
	{$fonts['p_font-size']}
	{$fonts['p_font-weight']}
	{$fonts['p_font-style']}
	{$fonts['p_line-height']}
	{$fonts['p_text-decoration']}
	{$fonts['p_text-transform']}
	{$fonts['p_letter-spacing']}
}
p, ul, ol, dl, blockquote, address,
.wp-block-button,
.wp-block-cover,
.wp-block-image,
.wp-block-video,
.wp-block-media-text {
	{$fonts['p_margin-top']}
	{$fonts['p_margin-bottom']}
}
p[style*="font-size"],	/* tag p need if custom font size to the paragraph is applied. Thanks to @goodkindman */
.has-small-font-size,
.has-normal-font-size,
.has-medium-font-size {
	{$fonts['p_line-height']}	
}

/* Article text*/
{$article_font}

h1, .h1,
.front_page_section_caption  {
	{$fonts['h1_font-family']}
	{$fonts['h1_font-size']}
	{$fonts['h1_font-weight']}
	{$fonts['h1_font-style']}
	{$fonts['h1_line-height']}
	{$fonts['h1_text-decoration']}
	{$fonts['h1_text-transform']}
	{$fonts['h1_letter-spacing']}
	{$fonts['h1_margin-top']}
	{$fonts['h1_margin-bottom']}
}
h2 {
	{$fonts['h2_font-family']}
	{$fonts['h2_font-size']}
	{$fonts['h2_font-weight']}
	{$fonts['h2_font-style']}
	{$fonts['h2_line-height']}
	{$fonts['h2_text-decoration']}
	{$fonts['h2_text-transform']}
	{$fonts['h2_letter-spacing']}
	{$fonts['h2_margin-top']}
	{$fonts['h2_margin-bottom']}
}
h3 {
	{$fonts['h3_font-family']}
	{$fonts['h3_font-size']}
	{$fonts['h3_font-weight']}
	{$fonts['h3_font-style']}
	{$fonts['h3_line-height']}
	{$fonts['h3_text-decoration']}
	{$fonts['h3_text-transform']}
	{$fonts['h3_letter-spacing']}
	{$fonts['h3_margin-top']}
	{$fonts['h3_margin-bottom']}
}
h4, .h4 {
	{$fonts['h4_font-family']}
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_font-style']}
	{$fonts['h4_line-height']}
	{$fonts['h4_text-decoration']}
	{$fonts['h4_text-transform']}
	{$fonts['h4_letter-spacing']}
	{$fonts['h4_margin-top']}
	{$fonts['h4_margin-bottom']}
}
.comments_list_title,
.comments_form_wrap .comments_form_title {
	{$fonts['h4_font-family']}
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_font-style']}
	{$fonts['h4_line-height']}
	{$fonts['h4_text-decoration']}
	{$fonts['h4_text-transform']}
	{$fonts['h4_letter-spacing']}
}
h5 {
	{$fonts['h5_font-family']}
	{$fonts['h5_font-size']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_font-style']}
	{$fonts['h5_line-height']}
	{$fonts['h5_text-decoration']}
	{$fonts['h5_text-transform']}
	{$fonts['h5_letter-spacing']}
	{$fonts['h5_margin-top']}
	{$fonts['h5_margin-bottom']}
}
h6, .h6,
.sc_layouts_row_fixed.sc_layouts_row_hide_unfixed .sc_layouts_title_caption {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_line-height']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
	{$fonts['h6_margin-top']}
	{$fonts['h6_margin-bottom']}
}
.footer_wrap .widget_title, 
.footer_wrap .widgettitle,
[class*="_banner_wrap"] .banner_wrap_title {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_line-height']}
	{$fonts['h6_text-decoration']}
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="tel"],
input[type="search"],
input[type="password"],
textarea,
textarea.wp-editor-area,
.select_container,
select,
.select_container select {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}

/* jQuery UI widgets reset */
div.ui-widget input, 
div.ui-widget select, 
div.ui-widget textarea, 
[class*="sc_input_hover_"] input[type="text"], 
[class*="sc_input_hover_"] input[type="number"], 
[class*="sc_input_hover_"] input[type="email"], 
[class*="sc_input_hover_"] input[type="password"], 
[class*="sc_input_hover_"] input[type="search"], 
[class*="sc_input_hover_"] select, 
[class*="sc_input_hover_"] textarea {  
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}

form button:not(.components-button),
input[type="button"],
input[type="reset"],
input[type="submit"],
.theme_button,
.sc_layouts_row .sc_button,
.sc_portfolio_preview_show .post_readmore,
.wp-block-button__link,
.post_item .more-link,
div.esg-filter-wrapper .esg-filterbutton > span,
.mptt-navigation-tabs li a,
.critique_tabs .critique_tabs_titles li a,
.show_comments_single .show_comments_button,

/* jQuery UI widgets reset */
div.ui-widget button,
div.ui-widget input[type="submit"] {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

.top_panel .slider_engine_revo .slide_title,
.slider_container .slide_title {
	{$fonts['h1_font-family']}
}

ins,
.logo_text,
.post_price.price,
.theme_scroll_down,
blockquote > cite, 
blockquote > p > cite, 
blockquote > .wp-block-pullquote__citation, 
.wp-block-quote .wp-block-quote__citation,
table th,
label,
.sc_layouts_item_details_line1, 
.sc_layouts_item_details_line2,
.pk-share-buttons-count,
input[type="radio"] + label,
input[type="checkbox"] + label,
input[type="radio"] + .wpcf7-list-item-label,
input[type="checkbox"] + .wpcf7-list-item-label,
.edd_price_options ul > li > label > input[type="radio"] + span,
.edd_price_options ul > li > label > input[type="checkbox"] + span,
.trx_addons_popup_form_field_forgot_password,
.mo-openid-app-icons .btn,
.has-drop-cap:not(:focus):first-letter,
.nav-links-single .nav-links .nav-arrow-label,
.author_info .author_label,
.comments_list_wrap .bypostauthor .comment_bypostauthor,
.pk-font-heading,
.pk-font-secondary,
.pk-social-links-label,
div.esg-filters, 
.woocommerce nav.woocommerce-pagination ul, 
.comments_pagination, 
.nav-links, 
.page_links,
.pk-twitter-wrap .pk-twitter-time,
.pk-twitter-username,
.pk-twitter-counters,
.pk-twitter-count,
#cookie-law-info-bar span,
.sc_layouts_iconed_text.sc_layouts_menu_mobile_button,
.sc_layouts_iconed_text.sc_layouts_menu_mobile_button_burger,
.mejs-container *,
.search_wrap .post_more,
.trx_addons_message_box, 
p.yikes-easy-mc-error-message, 
p.yikes-easy-mc-success-message,
.widget_calendar .wp-calendar-nav,
.wp-block-calendar .wp-calendar-nav,
.widget_rss a.rsswidget,
.widget_rss .rss-date,
.widget_text strong,
.sc_edd_details .downloads_page_tags .downloads_page_data > a,
.widget_product_tag_cloud a,
.widget_tag_cloud a,
.wp-block-tag-cloud a,
.post_title em, 
.post_title i,
#sb_instagram .sbi_follow_btn a,
.woocommerce .product_meta span,
#color_scheme_switcher li {
	{$fonts['h5_font-family']}
}

.post-date, .rss-date, 
.post_date, .post_meta_item,
.post_meta .vc_inline-link,
.comments_list_wrap .comment_date,
.comments_list_wrap .comment_time,
.comments_list_wrap .comment_counters,
.top_panel .slider_engine_revo .slide_subtitle,
.logo_slogan,
fieldset legend,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd,
.format-audio .post_featured .post_audio_author,
.trx_addons_audio_player .audio_author,
.post_item_single .post_content .post_meta,
.author_bio .author_link,
.comments_list_wrap .comment_posted,
.comments_list_wrap .comment_reply,
.single-format-audio .post_featured .post_audio_author {
	{$fonts['info_font-family']}
}

.post_meta,
.slide_cats,
.nav-links-single .nav-links .post_date,
.widget_area .post_item .post_info, 
aside .post_item .post_info {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-weight']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
	{$fonts['info_text-transform']}
	{$fonts['info_letter-spacing']}
	{$fonts['info_margin-top']}
	{$fonts['info_margin-bottom']}
}

.widget_area .post_item .post_categories,
aside .post_item .post_categories,
.post_meta_item .post_sponsored_label,
.pk-widget-author .pk-widget-author-container .widget_title {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
}

.pk-widget-author .pk-widget-author-container .widget_title {
	{$fonts['info_text-transform']}
}

em, i:not([class*="eicon"]),
figure figcaption,
.wp-caption .wp-caption-text,
.post_item_single .post_meta_single .post_meta_likes .post_meta_number,
.footer_wrap .wp-widget-search .search-field,
input[type="checkbox"] + .yikes-mailchimp-eu-compliance-text {
	{$fonts['p_font-family']}
}

.logo_text {
	{$fonts['logo_font-family']}
	{$fonts['logo_font-size']}
	{$fonts['logo_font-weight']}
	{$fonts['logo_font-style']}
	{$fonts['logo_line-height']}
	{$fonts['logo_text-decoration']}
	{$fonts['logo_text-transform']}
	{$fonts['logo_letter-spacing']}
}
.logo_footer_text {
	{$fonts['logo_font-family']}
}

.menu_main_nav_area > ul,
.sc_layouts_menu_nav{
	{$fonts['menu_font-family']}
	{$fonts['menu_font-size']}
	{$fonts['menu_line-height']}
}
.sc_layouts_menu_dir_vertical .sc_layouts_menu_nav {
	{$fonts['menu_font-family']}
	{$fonts['menu_line-height']}
}
.sc_layouts_row_type_normal .sc_layouts_menu_nav > li > a,
.menu_main_nav > li > a,
.sc_layouts_menu_nav > li > a,
.menu_main_nav > li > a,
.sc_layouts_menu_nav > li > a {
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_text-decoration']}
	{$fonts['menu_text-transform']}
	{$fonts['menu_letter-spacing']}
}
.menu_main_nav > li[class*="current-menu-"] > a .sc_layouts_menu_item_description,
.sc_layouts_menu_nav > li[class*="current-menu-"] > a .sc_layouts_menu_item_description {
	{$fonts['menu_font-weight']}
}
.menu_main_nav > li > ul,
.sc_layouts_menu_nav > li > ul,
.sc_layouts_menu_popup .sc_layouts_menu_nav,
.wp-widget-nav_menu ul.menu,
.widget_nav_menu ul.menu {
	{$fonts['submenu_font-family']}
	{$fonts['submenu_font-size']}
	{$fonts['submenu_line-height']}
}
.menu_main_nav > li ul > li > a,
.sc_layouts_menu_nav > li ul > li > a,
.sc_layouts_menu_popup .sc_layouts_menu_nav > li > a {
	{$fonts['submenu_font-weight']}
	{$fonts['submenu_font-style']}
	{$fonts['submenu_text-decoration']}
	{$fonts['submenu_text-transform']}
	{$fonts['submenu_letter-spacing']}
}
.menu_mobile .menu_mobile_nav_area > ul {
	{$fonts['menu_font-family']}
}
.menu_mobile .menu_mobile_nav_area > ul > li ul {
	{$fonts['submenu_font-family']}
}

.author_page .author_posts_total,
.author_page .author_socials .author_socials_caption {
	{$fonts['h1_font-family']}
	{$fonts['h1_font-weight']}
}

.elementor-counter .elementor-counter-title {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_text-transform']}
	{$fonts['h6_font-weight']}
}

.sc_layouts_title_breadcrumbs .breadcrumbs {
	{$fonts['logo_font-family']}
	{$fonts['logo_text-transform']}
}

CSS;
			$rez          = apply_filters( 'critique_filter_get_css', $rez, array( 'fonts' => $fonts ) );
			$css['fonts'] = $rez['fonts'];
		}

		// Theme vars
		//---------------------------------------------
		if ( null === $vars ) {
			$vars = critique_get_theme_vars();
		}

		if ( $vars ) {

			// Make theme-specific vars
			$vars = critique_customizer_add_theme_vars( $vars );

			$rez         = array();
			$rez['vars'] = '';
			$rez         = apply_filters( 'critique_filter_get_css', $rez, array( 'vars' => $vars ) );
			$css['vars'] = $rez['vars'];
		}

		// Theme colors
		//--------------------------------------
		if ( false !== $colors ) {
			$schemes = empty( $scheme ) ? array_keys( critique_get_sorted_schemes() ) : array( $scheme );
			if ( count( $schemes ) > 0 ) {
				$rez = array();
				foreach ( $schemes as $s ) {
					// Prepare colors
					if ( empty( $scheme ) ) {
						$colors = critique_get_scheme_colors( $s );
					} 

					// Make theme-specific colors and tints
					$colors         = critique_customizer_add_theme_colors( $colors );
					$rez['colors']  = '';
					$rez            = apply_filters( 'critique_filter_get_css', $rez, array( 'colors' => $colors, 'scheme' => $s ) ); 
					$css['colors']  = $css['colors'] . $rez['colors']; 
				}
			}
		} 

		$css_str = ( ! empty( $css['vars'] ) ? $css['vars'] : '' )
				. ( ! empty( $css['fonts'] ) ? $css['fonts'] : '' )
				. ( ! empty( $css['colors'] ) ? $css['colors'] : '' ); 

		return apply_filters( 'critique_filter_prepare_css', $css_str, $remove_spaces );
	}
}
