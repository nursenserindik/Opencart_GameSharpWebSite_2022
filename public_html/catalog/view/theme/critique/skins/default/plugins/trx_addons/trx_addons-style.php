<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'critique_trx_addons_get_css' ) ) {
	add_filter( 'critique_filter_get_css', 'critique_trx_addons_get_css', 10, 2 );
	function critique_trx_addons_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title,
.sc_dishes_compact .sc_services_item_title,
.sc_services_iconed .sc_services_item_title,
.sc_blogger_item_list_simple.sc_blogger_item_with_numbers .sc_blogger_item_title:before,
.sc_blogger_item_list_with_image.sc_blogger_item_with_image.sc_blogger_item_with_numbers.sc_blogger_item_image_position_top .sc_blogger_item_title:before,
.sc_item_subtitle,
.sc_item_filters_subtitle,
.trx_addons_reviews_block_detailed .trx_addons_reviews_block_mark_value,
.sc_item_subtitle.sc_item_title_style_shadow,
.trx_addons_bg_text .trx_addons_bg_text_inner,
.sc_recent_news_subtitle {
	{$fonts['p_font-family']}
}
.toc_menu_item .toc_menu_description,
.sc_recent_news .post_item .post_footer .post_meta .post_meta_item,
.sc_icons_item_title,
.sc_price_item_title, .sc_price_item_price,
.sc_courses_default .sc_courses_item_price,
.sc_courses_default .trx_addons_hover_content .trx_addons_hover_links a,
.sc_events_classic .sc_events_item_price,
.sc_events_classic .trx_addons_hover_content .trx_addons_hover_links a,
.sc_promo_modern .sc_promo_link2 span+span,
.sc_skills_counter .sc_skills_total,
.sc_skills_pie.sc_skills_compact_off .sc_skills_total,
.slider_container .slide_info.slide_info_large .slide_title,
.slider_style_modern .slider_controls_label span + span,
.sc_slider_controller_info,
.trx_addons_login_socials_title,
.trx_addons_tabs_title_register,
.trx_addons_tabs_title_login,
.sc_item_filters_tabs, .sc_item_filters_more_link_wrap,
.sc_blogger_item_list_with_image.sc_blogger_item_with_image.sc_blogger_item_with_numbers .sc_blogger_item_featured:after,
.socials_wrap .social_item .social_icon + .social_name,
.sc_blogger_item_list.sc_blogger_item_with_image.sc_blogger_item_with_numbers:not(.sc_blogger_item_image_position_top) .sc_blogger_item_featured:after,
.sc_blogger_item_price,
.sc_blogger_item_list_simple.sc_blogger_item_with_numbers.small_numbers .sc_blogger_item_title:before,

.trx_addons_reviews_block_criterias .trx_addons_reviews_block_list_title,
.trx_addons_reviews_block_criterias .trx_addons_reviews_block_list_mark_value,
.trx_addons_reviews_block_pn .trx_addons_reviews_block_list,
.trx_addons_reviews_block_mark_text,
.trx_addons_reviews_block_attributes_row_type_text,
.trx_addons_reviews_block_attributes_row_type_button,
.trx_addons_reviews_block_mark_value,
.trx_addons_audio_wrap .trx_addons_audio_navigation,
.sc_recent_news_wrap .sc_recent_news_style_news-magazine .sc_recent_news_header_categories a,
.sc_recent_news_header_split .sc_recent_news_header_categories > * {
	{$fonts['h5_font-family']}
}
.sc_recent_news .post_item .post_meta,
.sc_courses_default .sc_courses_item_date,
.courses_single .courses_page_meta,
.sc_events_classic .sc_events_item_date,
.sc_promo_modern .sc_promo_link2 span,
.sc_skills_counter .sc_skills_item_title,
.slider_style_modern .slider_controls_label span,
.slider_titles_outside_wrap .slide_cats,
.slider_titles_outside_wrap .slide_subtitle,
.sc_slider_controller_item_info_date,
.sc_team .sc_team_item_subtitle,
.sc_dishes .sc_dishes_item_subtitle,
.sc_services .sc_services_item_subtitle,
.team_member_page .team_member_brief_info_text,
.sc_testimonials_item_author_title,
.sc_testimonials_item_content:before {
	{$fonts['info_font-family']}
}
.slider_outer_wrap .sc_slider_controller .sc_slider_controller_item_info_date {
	{$fonts['info_font-size']}
	{$fonts['info_font-weight']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
	{$fonts['info_text-transform']}
	{$fonts['info_letter-spacing']}	
}
.sc_button,
.sc_button.sc_button_simple,
.sc_form button,
.nav-links-old .nav-prev a,
.nav-links-old .nav-next a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.sc_promo_modern .sc_promo_link2 {
	{$fonts['button_font-family']}
}
.trx_addons_dropcap_style_1  {
	{$fonts['h1_font-size']}
	{$fonts['h1_font-family']}
}
.trx_addons_reviews_block_detailed .trx_addons_reviews_block_title  {
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_line-height']}
	{$fonts['h4_letter-spacing']}	
}
.trx_addons_reviews_block_detailed .trx_addons_reviews_block_pn .trx_addons_reviews_block_subtitle,
.trx_addons_reviews_block_detailed .trx_addons_reviews_block_criterias .trx_addons_reviews_block_subtitle,
.trx_addons_reviews_block_detailed .trx_addons_reviews_block_buttons .trx_addons_reviews_block_subtitle,
.sc_slider_controller_info_title  {
	{$fonts['h6_font-size']}
	{$fonts['h6_font-family']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_line-height']}
	{$fonts['h6_letter-spacing']}	
}
.sc_price_item_title {
	{$fonts['h3_font-family']}
	{$fonts['h3_font-size']}
	{$fonts['h3_font-weight']}
	{$fonts['h3_font-style']}
	{$fonts['h3_line-height']}
	{$fonts['h3_text-decoration']}
	{$fonts['h3_text-transform']}
	{$fonts['h3_letter-spacing']}
}
.sc_price_item .sc_price_item_subtitle {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_letter-spacing']}
	{$fonts['button_font-weight']}
}
.sc_price_item .sc_price_item_label {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_letter-spacing']}
	{$fonts['button_font-weight']}
}
.sc_price_item_description, .sc_price_item_details {
	{$fonts['p_font-family']}
	{$fonts['p_font-size']}
	{$fonts['p_line-height']}
	{$fonts['p_font-style']}
	{$fonts['p_letter-spacing']}
	{$fonts['p_font-weight']}
}
.sc_recent_news .post_item .post_title {
	{$fonts['h4_font-weight']}
	{$fonts['h4_letter-spacing']}
}
.trx_addons_video_list_controller_wrap h5.trx_addons_video_list_title  {
	{$fonts['h5_font-size']}
	{$fonts['h5_line-height']}
}
.sc_recent_news .post_item h6.post_title,
.trx_addons_video_list_controller_wrap h6.trx_addons_video_list_title  {
	{$fonts['h6_font-size']}
	{$fonts['h6_line-height']}
}
.sc_widget_rating_posts .post_content .post_title {
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
}
.trx_addons_video_list_video_wrap .trx_addons_video_list_meta,
.sc_widget_video_list .trx_addons_video_list_subtitle,
.sc_widget_rating_posts .post_item .post_categories {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
	{$fonts['info_text-transform']}
}
.sc_recent_news.sc_recent_news_style_news-magazine .trx_addons_reviews_text,
.sc_widget_rating_posts .post_content .trx_addons_reviews_text {
	{$fonts['info_font-family']}
}
.sc_widget_rating_posts .type_default .post_item .post_info,	
.sc_widget_categories_list .categories_list_style_1 .categories_list_title_wrapper {
	{$fonts['h6_font-family']}
}
.sc_widget_categories_list .categories_list_style_2 .categories_list_title .categories_list_caption,
.sc_widget_categories_list .categories_list_style_2 .categories_list_title .categories_list_count{
	{$fonts['h6_font-weight']}
}
CSS;
		}

		return $css;
	}
}
