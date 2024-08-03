<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'critique_woocommerce_get_css' ) ) {
	add_filter( 'critique_filter_get_css', 'critique_woocommerce_get_css', 10, 2 );
	function critique_woocommerce_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.woocommerce .checkout table.shop_table .product-name .variation,
.woocommerce .shop_table.order_details td.product-name .variation{
	{$fonts['p_font-family']}
}
.woocommerce ul.products li.product .price,
.woocommerce ul.products li.product .price del,
.woocommerce ul.products li.product .price ins,
.woocommerce span.amount, .woocommerce-page span.amount,
.widget_price_filter .price_label,
.trx_addons_woocommerce_search_type_inline,
#btn-buy {
	{$fonts['h1_font-family']}
}
#elegro-reset-wrapper .elegro-widget__button {
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.select2-container .select2-results__option,
.woocommerce form .form-row .select2-container,
.woocommerce ul.order_details li {
	{$fonts['p_font-family']}
}
.woocommerce div.product .product_title {
	{$fonts['h2_font-size']}
	{$fonts['h2_font-weight']}
	{$fonts['h2_font-style']}
	{$fonts['h2_text-decoration']}
	{$fonts['h2_text-transform']}
	{$fonts['h2_letter-spacing']}
}
.woocommerce div.product .woocommerce-tabs h2, 
.woocommerce #content div.product .woocommerce-tabs h2, 
.woocommerce-page div.product .woocommerce-tabs h2, 
.woocommerce-page #content div.product .woocommerce-tabs h2,
.woocommerce #review_form #respond #reply-title {
	{$fonts['h4_font-family']}
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_font-style']}
	{$fonts['h4_text-decoration']}
	{$fonts['h4_text-transform']}
	{$fonts['h4_letter-spacing']}
	{$fonts['h4_line-height']}
}
.woocommerce #review_form #respond .comment-form-author label,
.woocommerce #review_form #respond .comment-form-email label,
.woocommerce #review_form #respond .comment-form-rating label,
.woocommerce #review_form #respond .comment-form-comment label,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author,
.woocommerce-checkout form .form-row label {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
}
.woocommerce ul.products li.product .post_header, .woocommerce-page ul.products li.product .post_header,
.single-product div.product .woocommerce-tabs .wc-tabs li a,
.woocommerce .shop_table th,
.woocommerce div.product .summary p.price, .woocommerce div.product .summary span.price,
.woocommerce div.product .summary .stock,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
.woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta strong,
.woocommerce #content table.cart td.product-name a, .woocommerce-page #content table.cart td.product-name a,
.woocommerce-MyAccount-navigation,
.woocommerce-MyAccount-content .woocommerce-Address-title a,
.woocommerce-mini-cart__empty-message,
ul.cart_list li a,
ul.product_list_widget li a,
.quantity,
.total {
	{$fonts['h5_font-family']}
}
.woocommerce ul.products li.product .woocommerce-loop-category__title,
.woocommerce ul.products li.product .woocommerce-loop-product__title,
.woocommerce ul.products li.product h3,
.single-product ul.products li.product .post_data .post_header h3, 
.single-product ul.products li.product .post_data .post_header .woocommerce-loop-product__title {
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_letter-spacing']}
}
.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button,
.woocommerce .woocommerce-message .button,
.woocommerce #review_form #respond p.form-submit input[type="submit"],
.woocommerce-page #review_form #respond p.form-submit input[type="submit"],
.woocommerce table.my_account_orders .order-actions .button,
.woocommerce .button, .woocommerce-page .button,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #respond input#submit,
.woocommerce .hidden-title-form a.hide-title-form,
.woocommerce input[type="button"], .woocommerce-page input[type="button"],
.woocommerce input[type="submit"], .woocommerce-page input[type="submit"] {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.woocommerce-input-wrapper,
.woocommerce table.cart td.actions .coupon .input-text,
.woocommerce #content table.cart td.actions .coupon .input-text,
.woocommerce-page table.cart td.actions .coupon .input-text,
.woocommerce-page #content table.cart td.actions .coupon .input-text {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}
.woocommerce .select2-container--default .select2-selection--single span.select2-selection__rendered, 
.woocommerce-page .select2-container--default .select2-selection--single span.select2-selection__rendered {
	{$fonts['input_font-size']}
	{$fonts['input_line-height']}
}
.woocommerce ul.products li.product .post_header .post_tags,
.woocommerce div.product .product_meta span > a, .woocommerce div.product .product_meta span > span,
.woocommerce div.product form.cart .reset_variations,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time, .woocommerce-page #reviews #comments ol.commentlist li .comment-text p.meta time {
	{$fonts['info_font-family']}
}

.woocommerce ul.products li.product .onsale,
.woocommerce-page ul.products li.product .onsale,
.woocommerce div.product span.onsale,
.woocommerce ul.products li.product .outofstock_label {
	{$fonts['info_text-transform']}
}

.woocommerce table.shop_table tfoot th,
.woocommerce table.shop_table td.product-name,
.woocommerce table.shop_table td label,
.woocommerce table.shop_table li strong,
.woocommerce .woocommerce-result-count {
	{$fonts['p_font-family']}
}

CSS;
		}

		return $css;
	}
}

