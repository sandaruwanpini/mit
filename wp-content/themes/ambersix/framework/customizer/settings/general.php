<?php
/**
 * General setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Accent Colors
$this->sections['ambersix_accent_colors'] = array(
	'title' => esc_html__( 'Accent Colors', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'accent_color',
			'default' => '#4f9be8',
			'control' => array(
				'label' => esc_html__( 'Accent Color', 'ambersix' ),
				'type' => 'color',
			),
		),
	)
);

// Favicon
$this->sections['ambersix_favicon'] = array(
	'title' => esc_html__( 'Favicon', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'favicon',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Site Icon', 'ambersix' ),
				'type' => 'image',
				'description' => esc_html__( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512 pixels wide and tall.', 'ambersix' ),
			),
		),
	)
);

// PreLoader
$this->sections['ambersix_preloader'] = array(
	'title' => esc_html__( 'PreLoader', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'preloader',
			'default' => 'animsition',
			'control' => array(
				'label' => esc_html__( 'Preloader Option', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'animsition' => esc_html__( 'Enable','ambersix' ),
					'' => esc_html__( 'Disable','ambersix' )
				),
			),
		),
	)
);

// Top Bar Site
$this->sections['ambersix_topbar_site'] = array(
	'title' => esc_html__( 'Top Bar Site', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'top_bar_site_style',
			'default' => 'hide',
			'control' => array(
				'label' => esc_html__( 'Top Bar Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'hide' => esc_html__( 'Hide', 'ambersix' ),
					'style-1' => esc_html__( 'Dark-Text', 'ambersix' ),
					'style-2' => esc_html__( 'Light-Text', 'ambersix' ),
				),
				'desc' => esc_html__( 'Top Bar Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'ambersix' )
			),
		),
	),
);

// Header Site
$this->sections['ambersix_header_site'] = array(
	'title' => esc_html__( 'Header Site', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'header_site_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Header Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Dark-Text', 'ambersix' ),
					'style-2' => esc_html__( 'Light-Text', 'ambersix' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'ambersix' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'ambersix' ),
				),
				'desc' => esc_html__( 'Header Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'ambersix' )
			),
		),
		array(
			'id' => 'header_fixed',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Header Fixed: Enable', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Scroll to top
$this->sections['ambersix_scroll_top'] = array(
	'title' => esc_html__( 'Scroll Top Button', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'scroll_top',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Forms
$this->sections['ambersix_general_forms'] = array(
	'title' => esc_html__( 'Forms', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		array(
			'id' => 'input_border_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Rounded', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'input_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'input_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'input_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Enter a value in pixels. Example: 1px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'input_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'color',
			),
		),
	),
);

// Responsive
$this->sections['ambersix_responsive'] = array(
	'title' => esc_html__( 'Responsive', 'ambersix' ),
	'panel' => 'ambersix_general',
	'settings' => array(
		// Top Bar
		array(
			'id' => 'heading_top_bar',
			'control' => array(
				'type' => 'ambersix-heading',
				'label' => esc_html__( 'Top Bar', 'ambersix' ),
			),
		),
		array(
			'id' => 'mobile_hide_top_bar',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Hide: Top Bar on Mobile', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		// Mobile Logo
		array(
			'id' => 'heading_mobile_logo',
			'control' => array(
				'type' => 'ambersix-heading',
				'label' => esc_html__( 'Mobile Logo', 'ambersix' ),
			),
		),
		array(
			'id' => 'mobile_logo_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Width', 'ambersix' ),
				'description' => esc_html__( 'Example: 150px', 'ambersix' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo',
				'alter' => 'max-width',
			),
		),
		array(
			'id' => 'mobile_logo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Margin', 'ambersix' ),
				'description' => esc_html__( 'Example: 20px 0px 20px 0px', 'ambersix' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo-inner',
				'alter' => 'margin',
			),
		),
		// Mobile Menu
		array(
			'id' => 'heading_mobile_menu',
			'control' => array(
				'type' => 'ambersix-heading',
				'label' => esc_html__( 'Mobile Menu', 'ambersix' ),
			),
		),
		array(
			'id' => 'mobile_menu_item_height',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Height', 'ambersix' ),
				'description' => esc_html__( 'Example: 40px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'#main-nav-mobi ul > li > a',
					'#main-nav-mobi .menu-item-has-children .arrow'
				),
				'alter' => 'line-height'
			),
		),
		array(
			'id' => 'mobile_menu_logo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo', 'ambersix' ),
				'type' => 'image',
			),
		),
		array(
			'id' => 'mobile_menu_logo_width',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo: Width', 'ambersix' ),
				'type' => 'text',
			),
		),
		// Featured Title
		array(
			'id' => 'heading_featured_title',
			'control' => array(
				'type' => 'ambersix-heading',
				'label' => esc_html__( 'Mobile Featured Title', 'ambersix' ),
			),
		),
		array(
			'id' => 'mobile_featured_title_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '.header-style-1 #featured-title .inner-wrap, .header-style-2 #featured-title .inner-wrap, .header-style-3 #featured-title .inner-wrap, .header-style-4 #featured-title .inner-wrap	',
				'alter' => 'padding',
			),
		),
	)
);