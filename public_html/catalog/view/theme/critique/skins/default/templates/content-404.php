<article <?php post_class( 'post_item_single post_item_404' ); ?>>
	<div class="post_content">
		<div class="page_info">			
			<div class="page_image">
				<img src="<?php echo esc_attr(critique_get_file_url( critique_skins_get_current_skin_dir() . 'images/404.png' )); ?>" alt="404">
			</div>
			<h1 class="page_title h4"><?php esc_html_e( 'Sorry, something went wrong.', 'critique' ); ?></h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sc_button sc_button_default sc_button_size_normal sc_button_with_icon sc_button_icon_right hover_style_icon_1 color_style_1">
				<span class="sc_button_icon">
					<span class="icon-arrow-right-1"></span>
				</span>
				<span class="sc_button_text">
					<span class="sc_button_title"><?php esc_html_e( 'Go Back Home', 'critique' ); ?></span>
				</span>
			</a>
		</div>
	</div>
</article>