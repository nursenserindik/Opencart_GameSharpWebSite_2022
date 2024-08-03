(function(blocks, editor, i18n, element) {
	// Set up variables
	var el = element.createElement;

	// Register Block - Video List
	blocks.registerBlockType(
		'trx-addons/video-player', {
			title: i18n.__( 'Widget: Video List' ),
			description: i18n.__( "Show list of videos from posts or from the custom list" ),
			icon: 'video-alt3',
			category: 'trx-addons-widgets',
			attributes: trx_addons_object_merge(
				{
					title: {
						type: 'string',
						default: ''
					},
					type: {
						type: 'string',
						default: 'alter'
					},
					content_style: {
						type: 'string',
						default: 'default'
					},
					post_type: {
						type: 'string',
						default: 'post'
					},
					taxonomy: {
						type: 'string',
						default: 'category'
					},
					category: {
						type: 'string',
						default: ''
					},
					controller_style: {
						type: 'string',
						default: 'default'
					},
					controller_pos: {
						type: 'string',
						default: 'right'
					},
					controller_height: {
						type: 'string',
						default: ''
					},
					controller_autoplay: {
						type: 'boolean',
						default: true
					},
					controller_link: {
						type: 'boolean',
						default: true
					}
				},
				trx_addons_gutenberg_get_param_query( { columns: false } ),
				trx_addons_gutenberg_get_param_id()
			),
			edit: function(props) {
				return trx_addons_gutenberg_block_params(
					{
						'render': true,
						'general_params': el(
							'div', {},
							// Widget title
							trx_addons_gutenberg_add_param(
								{
									'name': 'title',
									'title': i18n.__( 'Widget title' ),
									'descr': i18n.__( "Title of the widget" ),
									'type': 'text'
								}, props
							),
							// Type
							trx_addons_gutenberg_add_param(
								{
									'name': 'type',
									'title': i18n.__( 'Type' ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists({
										'default': i18n.__( 'Default' ),
										'alter': i18n.__( 'Alter' ),
										'wide': i18n.__( 'Wide' ),
										'news': i18n.__( 'News' ),
										'classic': i18n.__( 'Classic' ),
									}),
								}, props
							),
							// Content style
							trx_addons_gutenberg_add_param(
								{
									'name': 'content_style',
									'title': i18n.__( 'Content style' ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists({
										'default': i18n.__( 'Default' ),
										'alter': i18n.__( 'Alter' ),
									}),
									'dependency': {
										'type': [ 'classic' ]
									}
								}, props
							),
							// Post type
							trx_addons_gutenberg_add_param(
								{
									'name': 'post_type',
									'title': i18n.__( 'Post type' ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['posts_types'] )
								}, props
							),
							// Taxonomy
							trx_addons_gutenberg_add_param(
								{
									'name': 'taxonomy',
									'title': i18n.__( 'Taxonomy' ),
									'type': 'select',
									'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['taxonomies'][props.attributes.post_type], true )
								}, props
							),
							// Category
							trx_addons_gutenberg_add_param(
								{
									'name': 'category',
									'title': i18n.__( 'Category' ),
									'type': 'select',
									'multiple': true,
									'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['categories'][props.attributes.taxonomy], true )
								}, props
							),
						),
						'additional_params': el(
							'div', {},
							// Query params
							trx_addons_gutenberg_add_param_query( props, { columns: false } ),
							// Controller params
							trx_addons_gutenberg_add_param_sc_video_list_controller( props ),
							// ID, Class, CSS params
							trx_addons_gutenberg_add_param_id( props )
						)
					}, props
				);
			},
			save: function(props) {
				return el( '', null );
			}
		}
	);

	// Return details params
	//-------------------------------------------
	function trx_addons_gutenberg_add_param_sc_video_list_controller(props) {
		var el     = window.wp.element.createElement;
		var i18n   = window.wp.i18n;
		var params = [
					// Controller style
					trx_addons_gutenberg_add_param(
						{
							'name': 'controller_style',
							'title': i18n.__( 'Style of the TOC' ),
							'type': 'select',
							'options': trx_addons_gutenberg_get_lists( TRX_ADDONS_STORAGE['gutenberg_sc_params']['sc_video_list_controller_styles'] )
						}, props
					),
					// Autoplay
					trx_addons_gutenberg_add_param(
						{
							'name': 'controller_autoplay',
							'title': i18n.__( 'Autoplay selected video' ),
							'type': 'boolean'
						}, props
					),
					// Link to the video or to the post
					trx_addons_gutenberg_add_param(
						{
							'name': 'controller_link',
							'title': i18n.__( 'Show video or go to the post' ),
							'type': 'boolean'
						}, props
					),
		];

		el(
			'div', {},
			params
		);

		return el(
			wp.element.Fragment,
			null,
			el(
				wp.editor.InspectorControls,
				{ key: 'inspector' },
				el(
					wp.components.PanelBody,
					{ title: i18n.__( "Table of contents" ) },
					params
				)
			)
		);
	}

})( window.wp.blocks, window.wp.editor, window.wp.i18n, window.wp.element, );
