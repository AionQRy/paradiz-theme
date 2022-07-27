<?php
/**
 * Kirki Config
 */
Kirki::add_config( 'paradiz', [
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
] );
Kirki::add_section( 'header', [
	'title'          => __( 'Header' , 'paradiz'),
	'panel'          => '',
	'priority'       => 81,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
Kirki::add_section( 'body', [
	'title'          => __( 'Body' , 'paradiz'),
	'description'    => '',
	'panel'          => '',
	'priority'       => 82,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'shop', [
		'title'          => __( 'Shop' , 'paradiz'),
		'description'    => '',
		'panel'          => '',
		'priority'       => 83,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
	] );
}
Kirki::add_section( 'footer', [
	'title'          => __( 'Footer' , 'paradiz'),
	'description'    => __( 'These settings will be disabled if using Widgets in Footbar or creating Page with "footer" slug.','paradiz' ),
	'panel'          => '',
	'priority'       => 90,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );
Kirki::add_section( 'general', [
	'title'          => __( 'Other' , 'paradiz'),
	'description'    => __( 'Layouts and other settings', 'paradiz' ),
	'panel'          => '',
	'priority'       => 91,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
] );



/* HEADER */

Kirki::add_field( 'paradiz', [
	'settings'    => 'header_style_d',
    'label'       => __( 'Header Style', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => [
        // 'autoshow' => esc_html__( 'Auto Show', 'paradiz' ),
        'fixed'     => esc_html__( 'Fixed', 'paradiz' ),
        'standard'  => esc_html__( 'Standard', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'header_layout',
	'label'       => __( 'Header Layout', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'menu',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'left-logo'		=> esc_attr__( 'Left Logo', 'paradiz' ),
        'top-logo'  	=> esc_attr__( 'Top Logo', 'paradiz' ),
        'center-menu'  	=> esc_attr__( 'Center Menu', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
    'settings'    => 'head_height_d',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Header Height', 'kirki' ),
	'section'     => 'header',
	'default'     => '70px',
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-header, .site-header-space, .site-header > .s-container',
            'property'  	=> 'height',
		],
    ],
] );
Kirki::add_field( 'paradiz', [
    'settings'    => 'head_logo_height_d',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Logo Height', 'kirki' ),
	'section'     => 'header',
	'default'     => '35px',
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'max-height',
		],
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'height',
        ],
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'dimension',
	'settings'    => 'head_logo_padding_top',
	'label'       => esc_html__( 'Logo Top Space', 'paradiz' ),
	'section'     => 'header',
	'default'     => '20px',
    'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output' => [
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'  		=> '.site-header.-top-logo .site-branding',
			'property' 		=> 'padding-top',
		],
	],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'dimension',
	'settings'    => 'head_nav_height',
	'label'       => esc_html__( 'Menu Height', 'paradiz' ),
	'section'     => 'header',
	'default'     => '60px',
    'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output' => [
		[
			'element'  => '.site-header.-top-logo .site-nav-d, .site-header.-top-logo .site-action',
			'property' => 'height',
		],
		[
			'media_query'	=> '@media(min-width: 992px)',
			'element'  => '.site-header.-top-logo .site-branding',
			'property' => 'height',
			'prefix'    => 'calc(100% - ',
            'suffix'    => ')',
		],
	],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'hide_title',
	'label'       => __( 'Hide Site Title?', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'toggle',
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'head_shadow',
	'label'       => __( 'Has Shadow?', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'toggle',
    'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'color',
	'settings'    => 'head_shadow_color',
	'label'       => __( 'Shadow Color', 'paradiz' ),
	'section'     => 'header',
	'default'     => 'rgba(0,0,0,0.72)',
	'choices'     => [
		'alpha' => true,
    ],
    'active_callback' => [
	    [
		'setting'  => 'head_shadow',
		'operator' => '==',
		'value'    => true,
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'slider',
	'settings'    => 'head_shadow_blur',
	'label'       => esc_html__( 'Shadow Blur', 'paradiz' ),
	'section'     => 'header',
	'default'     => 5,
	'choices'     => [
		'min'  => 1,
		'max'  => 30,
		'step' => 1,
    ],
    'active_callback' => [
	    [
		'setting'  => 'head_shadow',
		'operator' => '==',
		'value'    => true,
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'header_action',
    'label'       => __( 'Action Icon', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'multicheck',
	'default'     => array('search'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'search'  	=> esc_attr__( 'Search', 'paradiz' ),
        'cart'      => esc_attr__( 'Cart', 'paradiz' ),
        'my-account'=> esc_attr__( 'My Account', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'cart_icon',
	'label'       => __( 'Cart Icon', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'cart',
	'priority'    => 10,
	'choices'     => [
        'shopping-cart'		=> '<i class="flaticon-shopping-cart"></i>',
        'shopping-cart-1'    => '<i class="flaticon-shopping-cart-1"></i>',
        'shopping-cart-2'	=> '<i class="flaticon-shopping-cart-2"></i>',
				'shopping-cart-3'   => '<i class="flaticon-shopping-cart-3"></i>',
        'shopping-cart-empty-side-view'=> '<i class="flaticon-shopping-cart-empty-side-view"></i>',
        'shopping-cart-of-horizontal-lines-design'       => '<i class="flaticon-shopping-cart-of-horizontal-lines-design"></i>',
        'cart'   => '<i class="flaticon-cart"></i>',
				'cart-1'   => '<i class="flaticon-cart-1"></i>',
				'supermarket'   => '<i class="flaticon-supermarket"></i>',
				'commerce-and-shopping'   => '<i class="flaticon-commerce-and-shopping"></i>',
				'shopping-basket'   => '<i class="flaticon-shopping-basket"></i>',

    ],
    'active_callback' => [
	    [
		    'setting'  => 'header_action',
		    'operator' => 'in',
		    'value'    => array('cart'),
	    ]
    ],
] );
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'head_colors',
    'label'       => esc_html__( 'Link Colors', 'paradiz' ),
    'section'     => 'header',
    'priority'    => 10,
    'choices'     => [
        'link'    	=> esc_html__( 'Link', 'paradiz' ),
        'hover'   	=> esc_html__( 'Link: Hover', 'paradiz' ),
		'active'  	=> esc_html__( 'Link: Active', 'paradiz' ),
		'active_bg' => esc_html__( 'Link: Active Background', 'paradiz' ),
    ],
    'default'     	=> [
        'link'    	=> '#4f4343',
        'hover'   	=> '#222',
		'active'  	=> '#222',
		'active_bg' => 'rgba(255,255,255,0)',
	],
	'output' => [
		[
			'choice'   => 'link',
			'element'  => '.site-header, .site-header a, .site-nav-d .sub-menu li > a',
			'property' => 'color',
        ],
        [
			'choice'   => 'link',
			'element'  => '.site-toggle b, .site-toggle b:after, .site-toggle b:before',
			'property' => 'background-color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-header a:hover, .site-nav-d .sub-menu li > a:hover',
			'property' => 'color',
        ],
		[
			'choice'   => 'active',
			'element'  => '.site-header a:active, .site-nav-d li.current-menu-item > a, .site-nav-d li.current-menu-ancestor > a, .site-nav-d li.current_page_item > a, .site-nav-d li.current-menu-parent.menu-item-has-children i',
			'property' => 'color',
		],
		[
			'choice'   => 'active_bg',
			'element'  => '.site-header li:active, .site-nav-d li.current-menu-item, .site-nav-d li.current-menu-ancestor, .site-nav-d li.current_page_item',
			'property' => 'background-color',
		],
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'header_effect',
    'label'       => __( 'Header Effect on Homepage', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'none',
	'priority'    => 10,
	'choices'     => [
        'none' 		=> esc_html__( 'None', 'paradiz' ),
        'slide-in'  => esc_attr__( 'Slide In', 'paradiz' ),
        'overlay'  	=> esc_attr__( 'Overlay', 'paradiz' ),
    ],
] );


Kirki::add_field( 'paradiz', [
    'settings'    => 'header_scroll',
    'type'        => 'number',
	'label'       => esc_html__( 'Scroll before fade in', 'kirki' ),
	'section'     => 'header',
	'default'     => '300',
	'choices'     => [
		'min'  => 1,
		'max'  => 900,
		'step' => 1,
	],
	'active_callback' => [
	    [
		'setting'  => 'header_effect',
		'operator' => '==',
		'value'    => 'slide-in',
        ]
    ]
] );



Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_header_logo_bg',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<div class="_h">Logo Background</div>',
	'priority'    => 10,
	'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'background',
	'settings'    => 'header_logo_bg',
	'section'     => 'header',
	'default'     => [
		'background-color'      => 'rgba(255,255,255,0)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'active_callback' => [
	    [
		'setting'  => 'header_layout',
		'operator' => '==',
		'value'    => 'top-logo',
        ]
	],
	'output'      => [
		[
			'element' => '.site-header.-top-logo .site-branding ',
        ],
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_header_bg',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<style type="text/css">._h{background-color: rgba(0,0,0,0.4);padding: 3px 12px;margin:6px -12px 0;color:#fff;font-weight: normal;font-size:12px}</style><div class="_h">Header Background</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'background',
	'settings'    => 'header_bg',
	'section'     => 'header',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.site-header, .site-nav-d .sub-menu',
        ],
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_mobile',
	'label'       => '',
	'section'     => 'header',
	'default'     => '<div class="_h">For Mobile</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'header_style_m',
    'label'       => __( 'Header Style', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'radio-buttonset',
	'default'     => 'fixed',
	'priority'    => 10,
	'choices'     => [
        // 'autoshow' => esc_html__( 'Auto Show', 'paradiz' ),
        'fixed'     => esc_attr__( 'Fixed', 'paradiz' ),
        'standard'  => esc_attr__( 'Standard', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
    'settings'    => 'head_height_m',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Header Height', 'kirki' ),
	'section'     => 'header',
    'default'     => '50px',
    'output' => [
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   => '.site-header, .site-header-space',
            'property'  => 'height',
        ],
        [
			'element'   => '.site-nav-m',
            'property'  => 'top',
        ],
        [
			'element'   => '.site-nav-m.active',
            'property'  => 'height',
            'prefix'    => 'calc(100vh - ',
            'suffix'    => ')',
        ],
    ],
] );
Kirki::add_field( 'paradiz', [
    'settings'    => 'head_logo_height_m',
    'type'        => 'dimension',
	'label'       => esc_html__( 'Logo Width', 'kirki' ),
	'section'     => 'header',
	'default'     => '30px',
	'output' => [
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'max-width',
		],
		[
			'media_query'	=> '@media(max-width: 991px)',
			'element'   	=> '.site-branding img',
            'property'  	=> 'width',
        ],
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'left_area',
	'label'       => __( 'Left Area', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'menu',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'menu' 	  => esc_attr__( 'Menu', 'paradiz' ),
        'search'  => esc_attr__( 'Search', 'paradiz' ),
        'phone'    => esc_attr__( 'Phone', 'paradiz' ),
        'custom'  => esc_attr__( 'Custom', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'     => 'text',
	'settings' => 'left_area_phone',
	'label'    => esc_html__( 'Phone No.', 'paradiz' ),
	'section'  => 'header',
    'priority' => 10,
    'active_callback' => [
	    [
		'setting'  => 'left_area',
		'operator' => '==',
		'value'    => 'phone',
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
	'type'     => 'code',
	'settings' => 'left_area_custom',
	'label'    => esc_html__( 'Custom HTML', 'paradiz' ),
	'section'  => 'header',
    'priority' => 10,
    'choices'     => [
		'language' => 'html',
	],
    'active_callback' => [
	    [
		'setting'  => 'left_area',
		'operator' => '==',
		'value'    => 'custom',
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'right_area',
	'label'       => __( 'Right Area', 'paradiz' ),
	'section'     => 'header',
	'type'        => 'select',
	'default'     => 'search',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
        'menu' 	  => esc_attr__( 'Menu', 'paradiz' ),
        'search'  => esc_attr__( 'Search', 'paradiz' ),
        'phone'    => esc_attr__( 'Phone', 'paradiz' ),
        'custom'  => esc_attr__( 'Custom', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'     => 'text',
	'settings' => 'right_area_phone',
	'label'    => esc_html__( 'Phone No.', 'paradiz' ),
	'section'  => 'header',
    'priority' => 10,
    'active_callback' => [
	    [
		'setting'  => 'right_area',
		'operator' => '==',
		'value'    => 'phone',
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
	'type'     => 'code',
	'settings' => 'right_area_custom',
	'label'    => esc_html__( 'Custom HTML', 'paradiz' ),
	'section'  => 'header',
    'priority' => 10,
    'choices'     => [
		'language' => 'html',
	],
    'active_callback' => [
	    [
		'setting'  => 'right_area',
		'operator' => '==',
		'value'    => 'custom',
        ]
    ]
] );
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'menu_colors',
    'label'       => esc_html__( 'Menu Colors', 'paradiz' ),
    'section'     => 'header',
    'priority'    => 10,
    'choices'     => [
        'bg'      => esc_html__( 'Background', 'paradiz' ),
        'link'    => esc_html__( 'Link', 'paradiz' ),
        'hover'   => esc_html__( 'Link: Hover', 'paradiz' ),
		'active'  => esc_html__( 'Link: Active', 'paradiz' ),
		'border'  => esc_html__( 'Border', 'paradiz' ),
    ],
    'default'     => [
        'bg'      => '#333333',
        'link'    => 'rgba(255,255,255,0.9)',
        'hover'   => 'rgba(255,255,255,1)',
		'active'  => 'rgba(255,255,255,0.6)',
		'border'  => 'rgba(255,255,255,0.15)',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.site-nav-m.active',
			'property' => 'background-color',
        ],
        [
			'choice'   => 'link',
			'element'  => '.site-nav-m li a',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-nav-m li a:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'active',
			'element'  => '.site-nav-m li a:active, .site-nav-m li.current-menu-item a, .site-nav-m li.current-menu-ancestor a, .site-nav-m li.current_page_item a',
			'property' => 'color',
		],
		[
			'choice'   => 'border',
			'element'  => '.site-nav-m li',
			'property' => 'border-bottom-color',
        ],
    ],
] );




/* BODY */
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'body_colors',
    'label'       => esc_html__( 'Link Colors', 'paradiz' ),
    'section'     => 'body',
    'priority'    => 10,
    'choices'     => [
        'link'    => esc_html__( 'Link', 'paradiz' ),
        'hover'   => esc_html__( 'Link: Hover', 'paradiz' ),
        'active'  => esc_html__( 'Link: Active', 'paradiz' ),
    ],
    'default'     => [
        'link'    => '#4f4343',
        'hover'   => '#444',
        'active'  => '#4f4343',
	],
	'output' => [
		[
			'choice'   => 'link',
			'element'  => 'a',
			'property' => 'color',
		],
		[
			'choice'   => 'link',
			'element'  => '.content-item .cat a',
			'property' => 'background',
        ],
		[
			'choice'   => 'hover',
			'element'  => 'a:hover',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.content-item .cat a:hover',
			'property' => 'background',
        ],
        [
			'choice'   => 'active',
			'element'  => 'a:active',
			'property' => 'color',
        ],
        ],
] );
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'body_bg',
    'label'       => esc_html__( 'Background Color', 'paradiz' ),
    'section'     => 'body',
    'priority'    => 10,
    'choices'     => [
		'home'      => esc_html__( 'Homepage', 'paradiz' ),
		'other'      => esc_html__( 'Other pages', 'paradiz' ),
    ],
    'default'     => [
		'home'    => '#ffffff',
		'other'    => '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'home',
			'element'  => 'body.home',
			'property' => 'background',
		],
		[
			'choice'   => 'other',
			'element'  => 'body',
			'property' => 'background',
		],
	],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_blog',
	'label'       => '',
	'section'     => 'body',
	'default'     => '<div class="_h">For Single Post</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_profile',
	'label'       => __( 'Show Author Profile?', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '1',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_comments',
	'label'       => __( 'Enable WP Comments?', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_layout_single',
	'label'       => __( 'Sidebar', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'full-width',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'full-width' => esc_attr__( 'No Sidebar', 'paradiz' ),
		'rightbar'   => esc_attr__( 'Right Sidebar', 'paradiz' ),
		'leftbar'    => esc_attr__( 'Left Sidebar', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_card',
	'label'       => '',
	'section'     => 'body',
	'default'     => '<div class="_h">For Archive</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'radio-buttonset',
	'settings'    => 'blog_columns_d',
	'label'       => __( 'Columns on Desktop', 'paradiz' ),
	'section'     => 'body',
	'default'     => '3',
	'choices'     => [
		'1'	=> '1',
		'2'	=> '2',
		'3'	=> '3',
		'4'	=> '4',
		'5'	=> '5',
		'6'	=> '6',
    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'radio-buttonset',
	'settings'    => 'blog_columns_m',
	'label'       => __( 'Columns on Mobile', 'paradiz' ),
	'section'     => 'body',
	'default'     => '1',
	'choices'     => [
		'1'	=> '1',
		'2'	=> '2',
		'3'	=> '3',
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_archive_profile',
	'label'       => __( 'Show Author Name?', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'toggle',
	'default'     => '1',
    'priority'    => 10
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_template',
	'label'       => __( 'Template', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'card',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'card' 		=> esc_attr__( 'Card', 'paradiz' ),
		'list' 		=> esc_attr__( 'List', 'paradiz' ),
		'hero' 		=> esc_attr__( 'Hero', 'paradiz' ),
		'caption' 	=> esc_attr__( 'Caption', 'paradiz' ),
    ],
] );
Kirki::add_field( 'paradiz', [
	'settings'    => 'blog_layout',
	'label'       => __( 'Sidebar', 'paradiz' ),
	'section'     => 'body',
	'type'        => 'select',
	'default'     => 'standard',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'full-width' => esc_attr__( 'No Sidebar', 'paradiz' ),
		'rightbar' => esc_attr__( 'Right Sidebar', 'paradiz' ),
		'leftbar'   => esc_attr__( 'Left Sidebar', 'paradiz' ),
    ],
] );

/* WOOCOMMERCE */

if ( class_exists( 'WooCommerce' ) ) {

	Kirki::add_field( 'paradiz', [
		'settings'    => 'shop_layout',
		'label'       => __( 'Shop Layout', 'paradiz' ),
		'section'     => 'shop',
		'type'        => 'select',
		'default'     => 'full-width',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'full-width' => esc_attr__( 'No Sidebar', 'paradiz' ),
			'rightbar' => esc_attr__( 'Right Sidebar', 'paradiz' ),
			'leftbar'   => esc_attr__( 'Left Sidebar', 'paradiz' ),
        ],
	] );
	Kirki::add_field( 'paradiz', [
		'settings' => 'shop_border_color',
		'label'    => __( 'Shop Highlight Border', 'paradiz' ),
		'description' => __( 'Show on Product Detail and Checkout', 'paradiz' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#222',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#main .related.products > h2, #main .wc-tabs li.active, #main .wc-tabs li:hover',
				'property' => 'border-top-color',
            ],
			[
				'element'  => '#main #order_review_heading, #main #order_review',
				'property' => 'border-color',
            ],
			[
				'element'  => '#content #main .woocommerce-pagination .current, #content #main .woocommerce-pagination .page-numbers:hover, #content #main .woocommerce-pagination .page-numbers:focus',
				'property' => 'border-color',
            ],
			[
				'element'  => '#content #main .woocommerce-pagination .current, #content #main .woocommerce-pagination .page-numbers:hover, #content #main .woocommerce-pagination .page-numbers:focus',
				'property' => 'color',
            ],
        ],
	] );
	Kirki::add_field( 'paradiz', [
		'settings' => 'shop_badge_color',
		'label'    => __( 'Sale Badge Color', 'paradiz' ),
		'description' => __( 'Show on Product Archive and Detail', 'paradiz' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#c00',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#page .onsale',
				'property' => 'background-color',
            ],
		],
	] );
	Kirki::add_field( 'paradiz', [
		'settings' => 'shop_price_color',
		'label'    => __( 'Price Color', 'paradiz' ),
		'description' => __( 'Show on Product Archive and Detail', 'paradiz' ),
		'section'  => 'shop',
		'type'     => 'color',
		'priority' => 10,
		'default'  => '#222',
		'choices'     => [
			'alpha' => true,
        ],
		'output' => [
			[
				'element'  => '#main .price',
				'property' => 'color',
            ],
        ],
	] );

	Kirki::add_field( 'paradiz', [
		'settings'    => 'shop_pagebuilder',
		'label'       => __( 'Page Builder on Shop Page?', 'paradiz' ),
		'description' => __( 'Show only content, not products list on Shop page.', 'paradiz' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '0',
		'priority'    => 10,
	] );
	Kirki::add_field( 'paradiz', [
		'settings'    => 'shop_hide_addtocart',
		'label'       => __( 'Hide Add to Cart Button?', 'paradiz' ),
		'description' => __( 'On Product Archive page.', 'paradiz' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '0',
		'priority'    => 10,
	] );
	Kirki::add_field( 'paradiz', [
		'settings'    => 'shop_hide_related',
		'label'       => __( 'Hide Related Products?', 'paradiz' ),
		'description' => __( 'On Product Detail page.', 'paradiz' ),
		'section'     => 'shop',
		'type'        => 'toggle',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'paradiz', [
		'type'        => 'number',
		'settings'    => 'shop_products',
		'label'       => __( 'Products Per Page', 'paradiz' ),
		'description' => __( 'Save and refresh to see the result.', 'paradiz' ),
		'section'     => 'shop',
		'default'     => 12,
		'choices'     => [
			'min'  => '1',
			'max'  => '99',
			'step' => '1',
        ],
	] );
}

/* FOOTER */
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'footer_colors',
    'label'       => esc_html__( 'Footer Colors', 'paradiz' ),
    'section'     => 'footer',
    'priority'    => 10,
    'choices'     => [
		'bg'      => esc_html__( 'Background', 'paradiz' ),
		'text'    => esc_html__( 'Text', 'paradiz' ),
        'link'    => esc_html__( 'Link', 'paradiz' ),
        'hover'   => esc_html__( 'Link: Hover', 'paradiz' ),
		'active'  => esc_html__( 'Link: Active', 'paradiz' ),
    ],
    'default'     => [
		'bg'      => 'rgba(0,0,0,0.03)',
		'text'    => 'rgba(0,0,0,0.5)',
        'link'    => 'rgba(0,0,0,0.5)',
        'hover'   => 'rgba(0,0,0,0.6)',
		'active'  => 'rgba(0,0,0,0.3)',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.site-footer',
			'property' => 'background-color',
		],
		[
			'choice'   => 'text',
			'element'  => '.site-footer .site-info',
			'property' => 'color',
		],
		[
			'choice'   => 'link',
			'element'  => '.site-footer a',
			'property' => 'color',
		],
        [
			'choice'   => 'link',
			'element'  => '.site-footer a',
			'property' => 'color',
		],
		[
			'choice'   => 'hover',
			'element'  => '.site-footer a:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'active',
			'element'  => '.site-footer a:active',
			'property' => 'color',
		],
    ],
] );

Kirki::add_field( 'paradiz', [
	'type'     => 'textarea',
	'settings' => 'foot_note',
	'label'    => __( 'Note', 'paradiz' ),
	'section'  => 'footer',
	'default'  => esc_attr__( '©' .  date("Y") . ' ' . $_SERVER['HTTP_HOST'] . '. All rights reserved.', 'paradiz' ),
	'priority' => 10,
] );

/* Other */
Kirki::add_field( 'paradiz', [
	'settings'    => 'fontawesome',
	'label'       => __( 'Load Font Awesome 5?', 'paradiz' ),
	'description'    => __( 'Save and refresh to see.', 'paradiz' ),
	'section'     => 'general',
	'type'        => 'toggle',
	'default'     => '0',
	'priority'    => 10,
] );
// Kirki::add_field( 'paradiz', [
// 	'settings'    => 'show_admin_bar',
// 	'label'       => __( 'Show Admin Bar?', 'paradiz' ),
// 	'description'    => __( 'Save and refresh to see.', 'paradiz' ),
// 	'section'     => 'general',
// 	'type'        => 'toggle',
// 	'default'     => '0',
// 	'priority'    => 10,
// ] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_button_alt',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<div class="_h">Action Button</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_button_alt_desc',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<small><i>WooCommerce large button and .s-button, .button.alt</i></small>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'button_alt_colors',
    'label'       => esc_html__( 'Button Colors', 'paradiz' ),
    'section'     => 'general',
    'priority'    => 10,
    'choices'     => [
        'bg'      	=> esc_html__( 'Background', 'paradiz' ),
        'bg_hover'  => esc_html__( 'Background: Hover', 'paradiz' ),
        'link'   	=> esc_html__( 'Text', 'paradiz' ),
		'link_hover'=> esc_html__( 'Text: Hover', 'paradiz' ),
    ],
    'default'     => [
        'bg'      	=> '#000',
        'bg_hover'  => '#444',
        'link'   	=> '#ffffff',
		'link_hover'=> '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.woocommerce .button.alt, #page.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'background',
		],
		[
			'choice'   => 'bg',
			'element'  => '.s-modal .search-form',
			'property' => 'border-bottom-color',
		],
		[
			'choice'   => 'bg',
			'element'  => '.s-modal-close:hover',
			'property' => 'color',
        ],
        [
			'choice'   => 'bg_hover',
			'element'  => '.woocommerce .button.alt:hover, #page.site .button.alt:hover, .site .s-button a:hover, .site a.s-button:hover',
			'property' => 'background',
		],
		[
			'choice'   => 'link',
			'element'  => '.woocommerce .button.alt, #page.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'color',
		],
		[
			'choice'   => 'link_hover',
			'element'  => '.woocommerce .button.alt:hover, #page.site .button.alt:hover, .site .s-button a:hover, .site a.s-button:hover',
			'property' => 'color',
		],

    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'dimension',
	'settings'    => 'button_alt_border_radius',
	'label'       => esc_html__( 'Border Radius', 'paradiz' ),
	'section'     => 'general',
	'default'     => '0',
	'output' => [
		[
			'element'  => '.site .button.alt, .site .s-button a, .site a.s-button',
			'property' => 'border-radius',
		],
	],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_button',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<div class="_h">Plain Button</div>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'custom',
	'settings'    => 'h_button_desc',
	'label'       => '',
	'section'     => 'general',
	'default'     => '<small><i>For .button: WooCommerce small button.</i></small>',
	'priority'    => 10,
] );
Kirki::add_field( 'paradiz', [
    'type'        => 'multicolor',
    'settings'    => 'button_colors',
    'label'       => esc_html__( 'Button Colors', 'paradiz' ),
    'section'     => 'general',
    'priority'    => 10,
    'choices'     => [
        'bg'      	=> esc_html__( 'Background', 'paradiz' ),
        'bg_hover'  => esc_html__( 'Background: Hover', 'paradiz' ),
        'link'   	=> esc_html__( 'Text', 'paradiz' ),
		'link_hover'=> esc_html__( 'Text: Hover', 'paradiz' ),
    ],
    'default'     => [
        'bg'      	=> '#000',
        'bg_hover'  => '#575f6d',
        'link'   	=> '#ffffff',
		'link_hover'=> '#ffffff',
	],
	'output' => [
		[
			'choice'   => 'bg',
			'element'  => '.woocommerce .button:not(.kt-button), #page .button:not(.kt-button)',
			'property' => 'background',
        ],
        [
			'choice'   => 'bg_hover',
			'element'  => '.woocommerce .button:not(.kt-button):hover, #page .button:not(.kt-button):hover',
			'property' => 'background',
		],
		[
			'choice'   => 'link',
			'element'  => '.woocommerce .button:not(.kt-button), #page .button:not(.kt-button)',
			'property' => 'color',
		],
		[
			'choice'   => 'link_hover',
			'element'  => '.woocommerce .button:not(.kt-button):hover, #page .button:not(.kt-button):hover',
			'property' => 'color',
		],

    ],
] );
Kirki::add_field( 'paradiz', [
	'type'        => 'dimension',
	'settings'    => 'button_border_radius',
	'label'       => esc_html__( 'Border Radius', 'paradiz' ),
	'section'     => 'general',
	'default'     => '0',
	'output' => [
		[
			'element'  => '#page .button:not(.kt-button)',
			'property' => 'border-radius',
		],
	],
] );




// Kirki::add_field( 'paradiz', [
// 	'type'        => 'custom',
// 	'settings'    => 'h_thumbsize',
// 	'label'       => '',
// 	'section'     => 'general',
// 	'default'     => '<div class="_h">Thumbnail Size</div>',
// 	'priority'    => 10,
// ] );
// Kirki::add_field( 'paradiz', [
// 	'type'        => 'custom',
// 	'settings'    => 'h_thumbsize_desc',
// 	'label'       => '',
// 	'section'     => 'general',
// 	'default'     => '<small><i>Save and use <a href="https://wordpress.org/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails</a> plugin</i></small>',
// 	'priority'    => 10,
// ] );
// Kirki::add_field( 'paradiz', [
// 	'type'        => 'toggle',
// 	'settings'    => 'thumbsize_crop',
// 	'label'       => __( 'Crop Thumbnail?', 'paradiz' ),
// 	'section'     => 'general',
// 	'default'     => '1',
// 	'priority'    => 10,
// ] );
// Kirki::add_field( 'paradiz', [
// 	'type'        => 'dimensions',
// 	'settings'    => 'thumbsize',
// 	'label'       => __( '', 'paradiz' ),
// 	'section'     => 'general',
// 	'default'     => [
// 		'width'  => '350',
// 		'height' => '184',
// 	],
// ] );











/*
 * Convert Color Funtion
 */
function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	if(empty($color)) return $default;
	if ($color[0] == '#' ) { $color = substr( $color, 1 );}
	if (strlen($color) == 6) {$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );}
	elseif ( strlen( $color ) == 3 ) {$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );}
	else {return $default;}
	$rgb =  array_map('hexdec', $hex);
	if($opacity){ if(abs($opacity) > 1) $opacity = 1.0; $output = 'rgba('.implode(",",$rgb).','.$opacity.')';}
	else { $output = 'rgb('.implode(",",$rgb).')';}
	return $output;
}

// /*
//  * Hide Admin Bar
//  */
// $show_admin_bar  = get_theme_mod( 'show_admin_bar', '0' );
// if ($show_admin_bar) {
// 	$GLOBALS['s_admin_bar']  = 'show';
// } else {
// 	$GLOBALS['s_admin_bar']  = 'hide';
// }

/*
 * Load Font Awesome
 */
function fontawesome_scripts() {
	wp_enqueue_style( 'paradiz-fontawesome', get_template_directory_uri() . '/vendor/fonts/font-awesome/css/fontawesome-all.min.css' );
}
if (get_theme_mod( 'fontawesome', '0' )) {
	add_action( 'wp_enqueue_scripts', 'fontawesome_scripts' );
}


/*
 * WooCommerce
 */

/* Display x products per page */
if ( class_exists( 'WooCommerce' ) ) {
	$GLOBALS['shop_products'] = get_theme_mod( 'shop_products', '12' );
	add_filter( 'loop_shop_per_page', 'paradiz_loop_shop_per_page', 20 );
	function paradiz_loop_shop_per_page( $cols ) {
		$cols = $GLOBALS['shop_products'];
		return $cols;
	}
}

/*
 * Assign $GLOBALS
 */
if ( ! function_exists( 'paradiz_var' ) ) {
	function paradiz_var() {
        $GLOBALS['s_header_style_m']        = get_theme_mod( 'header_style_m', 'autoshow' );
		$GLOBALS['s_header_style_d']        = get_theme_mod( 'header_style_d', 'autoshow' );
        $GLOBALS['s_header_layout']			= get_theme_mod( 'header_layout','left-logo');
        $GLOBALS['s_header_action']			= get_theme_mod( 'header_action', array('search'));
        $GLOBALS['s_cart_icon']			    = get_theme_mod( 'cart_icon', 'cart');
        $GLOBALS['s_left_area']             = get_theme_mod( 'left_area', 'menu' );
        $GLOBALS['s_left_area_phone']       = get_theme_mod( 'left_area_phone', '' );
        $GLOBALS['s_left_area_custom']      = get_theme_mod( 'left_area_custom', '' );
        $GLOBALS['s_right_area']            = get_theme_mod( 'right_area', 'search' );
        $GLOBALS['s_right_area_phone']      = get_theme_mod( 'right_area_phone', '' );
        $GLOBALS['s_right_area_custom']     = get_theme_mod( 'right_area_custom', '' );
		$GLOBALS['s_blog_columns_m']        = get_theme_mod( 'blog_columns_m', '1' );
		$GLOBALS['s_blog_columns_d']        = get_theme_mod( 'blog_columns_d', '3' );
		$GLOBALS['s_header_effect']			= get_theme_mod( 'header_effect','none');
        $GLOBALS['s_header_scroll']    		= get_theme_mod( 'header_scroll', '300' );
        $GLOBALS['s_blog_layout_single']    = get_theme_mod( 'blog_layout_single', 'full-width' );
        $GLOBALS['s_blog_layout']           = get_theme_mod( 'blog_layout', 'full-width' );
		$GLOBALS['s_blog_profile']      	= (get_theme_mod( 'blog_profile', '1' ))? 'enable' : 'disable';
		$GLOBALS['s_blog_archive_profile']  = (get_theme_mod( 'blog_archive_profile', '1' ))? 'enable' : 'disable';
		$GLOBALS['s_wp_comments']  			= (get_theme_mod( 'blog_comments', '0' ))? 'enable' : 'disable';
		$GLOBALS['s_blog_template']    		= get_theme_mod( 'blog_template', 'card' );
        $GLOBALS['s_shop_pagebuilder']      = get_theme_mod( 'shop_pagebuilder', '0' );
        $GLOBALS['s_shop_layout']           = get_theme_mod( 'shop_layout', 'full-width' );
        $GLOBALS['s_footer']                = get_theme_mod( 'foot_note', '©' .  date("Y") . ' ' . $_SERVER['HTTP_HOST'] . '. All rights reserved.' );
        $GLOBALS['s_logo_overlay ']         = get_theme_mod('logo_overlay' , '');
        $thumbsize                          = get_theme_mod( 'thumbsize', array('width'   => '350','height'  => '184'));
        $GLOBALS['s_thumb_width']           = $thumbsize['width'];
        $GLOBALS['s_thumb_height']          = $thumbsize['height'];
        $GLOBALS['s_thumb_crop']            = get_theme_mod( 'thumbsize_crop', '1' );
    }
}
paradiz_var();

/*
 * Assign CSS in header.php.
 */
if ( ! function_exists( 'paradiz_css' ) ) {
	function paradiz_css() {
		$header_style_m         = get_theme_mod( 'header_style_m','autoshow');
        $header_style_m         = get_theme_mod( 'header_style_m','autoshow');
		$header_style_d         = get_theme_mod( 'header_style_d','autoshow');
		$header_layout			= get_theme_mod( 'header_layout','left-logo');
		$header_bg 				= get_theme_mod( 'header_bg',array('background-color'   => '#ffffff'));
		$header_effect			= get_theme_mod( 'header_effect','none');
        $head_height_m          = get_theme_mod( 'head_height_m','50px');
        $head_height_d          = get_theme_mod( 'head_height_d','70px');
        $head_shadow 			= get_theme_mod( 'head_shadow','0');
        $head_shadow_color  	= get_theme_mod( 'head_shadow_color','rgba(0,0,0,0.15)');
		$head_shadow_blur       = get_theme_mod( 'head_shadow_blur','1');
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ($custom_logo_id) {
		  $hide_title 		= get_theme_mod( 'hide_title','1');
		}else {
			$hide_title 			= get_theme_mod( 'hide_title','0');

		}
        $blog_archive_profile   = get_theme_mod( 'blog_archive_profile','1');

		$shop_hide_addtocart 	= get_theme_mod('shop_hide_addtocart' , '0');
		$shop_hide_related 		= get_theme_mod('shop_hide_related' , '0');

		echo '<style id="kirki_css" type="text/css">';

        if ($header_style_m == 'standard') {
			echo '.site-header{position:absolute;}';
        } else {
            echo '.site-header{position:fixed;}';
        }

        // MOBILE
        echo '@media(max-width:991px){';
        echo '.s-autoshow-m.-hide{transform: translateY(-' . $head_height_m . ')}';
        echo '.s-autoshow-m.-show{transform: translateY(0)}';
        echo '}';

        // DESKTOP
		echo '@media(min-width:992px){';
        if ($header_style_d == 'standard') {
			echo '.site-header{position: absolute;}';
        } else {
            echo '.site-header{position: fixed;}';
        }
        // echo '.s-autoshow-dx.-hide{transform: translateY(-' . $head_height_d . ')}';
		echo 'body header.s-standard-d{top: 0!important}';
		switch ($header_layout) {
			case 'top-logo':
				echo '.site-branding{flex: 0 0 100%;justify-content: center}.site-action{margin-right:auto}';
				break;
			case 'center-menu':
				echo '.site-nav-d{margin-right:auto}';
				break;
			default:
				break;
		}
		echo '.site-nav-d .sub-menu::before{border-bottom-color:' . $header_bg['background-color'] . '}';
		echo '}';

		if ($hide_title) {
			echo '.site-title{display:none}';
		}
		if (!$head_shadow) {
			echo '.site-header{box-shadow:none;}';
		} else {
			echo '.site-header{box-shadow: 0 0 ' . $head_shadow_blur . 'px ' . $head_shadow_color .  '}';
		}
		switch ($header_effect) {
			case 'slide-in':
				echo 'body.home .site-header-space{display:none}body.home .site-header{opacity:0;}body.home .site-header.-active{opacity:1;transform: translateY(0)}body.home .site-header.-not-active{opacity:0;transform:translateY(-' . $head_height_d . ')}';
				break;
			case 'overlay':
				echo 'body.home .site-header-space{display:none}body.home .site-header:not(.-active){background:none;}';
				break;
			default:
				break;
		}
        if (!$blog_archive_profile) {
            echo '.content-item .byline,.content-item a.author{display:none}.content-item.-card{padding-bottom:15px}';
        }
		if ($shop_hide_addtocart) {
			echo '#main .add_to_cart_button {display:none;}';
		}
		if ($shop_hide_related) {
			echo '#main .related.products{display:none;}';
		}
		echo '</style>';

	}
}
