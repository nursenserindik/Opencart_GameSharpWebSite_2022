<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: //codex.wordpress.org/Template_Hierarchy
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

$critique_template = apply_filters( 'critique_filter_get_template_part', critique_blog_archive_get_template() );

if ( ! empty( $critique_template ) && 'index' != $critique_template ) {

	get_template_part( $critique_template );

} else {

	critique_storage_set( 'blog_archive', true );

	get_header();

	if ( have_posts() ) {

		// Query params
		$critique_stickies   = is_home()
								|| ( in_array( critique_get_theme_option( 'post_type' ), array( '', 'post' ) )
									&& (int) critique_get_theme_option( 'parent_cat' ) == 0
									)
										? get_option( 'sticky_posts' )
										: false;
		$critique_post_type  = critique_get_theme_option( 'post_type' );
		$critique_args       = array(
								'blog_style'     => critique_get_theme_option( 'blog_style' ),
								'post_type'      => $critique_post_type,
								'taxonomy'       => critique_get_post_type_taxonomy( $critique_post_type ),
								'parent_cat'     => critique_get_theme_option( 'parent_cat' ),
								'posts_per_page' => critique_get_theme_option( 'posts_per_page' ),
								'sticky'         => critique_get_theme_option( 'sticky_style' ) == 'columns'
															&& is_array( $critique_stickies )
															&& count( $critique_stickies ) > 0
															&& get_query_var( 'paged' ) < 1
								);

		critique_blog_archive_start();

		do_action( 'critique_action_blog_archive_start' );

		if ( is_author() ) {
			do_action( 'critique_action_before_page_author' );
			get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/author-page' ) );
			do_action( 'critique_action_after_page_author' );
		}

		if ( critique_get_theme_option( 'show_filters' ) ) {
			do_action( 'critique_action_before_page_filters' );
			critique_show_filters( $critique_args );
			do_action( 'critique_action_after_page_filters' );
		} else {
			do_action( 'critique_action_before_page_posts' );
			critique_show_posts( array_merge( $critique_args, array( 'cat' => $critique_args['parent_cat'] ) ) );
			do_action( 'critique_action_after_page_posts' );
		}

		do_action( 'critique_action_blog_archive_end' );

		critique_blog_archive_end();

	} else {

		if ( is_search() ) {
			get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/content', 'none-search' ), 'none-search' );
		} else {
			get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/content', 'none-archive' ), 'none-archive' );
		}
	}

	get_footer();
}
