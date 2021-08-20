<?php
/**
 * Header setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Header General
$this->sections['ambersix_header_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_header',
	'settings' => array(
		// Header 1
		array(
			'id' => 'header_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-1 #site-header:after'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-1 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-1 #site-header-inner',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
			),
			'inline_css' => array(
				'target' => '.header-style-1 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-1 #site-header',
				'alter' => 'border-color',
			),
		),
		// Header 2 - Dark
		array(
			'id' => 'header_two_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-2 #site-header'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_two_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-2 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_two_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-2 #site-header .ambersix-container',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_two_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
			),
			'inline_css' => array(
				'target' => '.header-style-2 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_two_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-2 #site-header',
				'alter' => 'border-color',
			),
		),
		// Header 3 - Transparent (Dark-Text)
		array(
			'id' => 'header_three_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-3 #site-header'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_three_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-3 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_three_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-3 #site-header .ambersix-container',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_three_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
			),
			'inline_css' => array(
				'target' => '.header-style-3 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_three_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-3 #site-header',
				'alter' => 'border-color',
			),
		),
		// Header 4 - Transparent (Light-Text)
		array(
			'id' => 'header_four_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-4 #site-header:after'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_four_background_opacity',
			'transport' => 'postMessage',
			'default' => '0.0001',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-4 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_four_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-4 #site-header-inner',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_four_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
			),
			'inline_css' => array(
				'target' => '.header-style-4 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_four_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-4 #site-header',
				'alter' => 'border-color',
			),
		),
		// Header 5 - Normal Aside
		array(
			'id' => 'header_five_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_five',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-5 #site-header:after'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_five_background_opacity',
			'transport' => 'postMessage',
			'default' => '0.0001',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_five',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-5 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_five_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_five',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-5 #site-header-inner',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_five_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_five',
			),
			'inline_css' => array(
				'target' => '.header-style-5 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_five_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_five',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-5 #site-header',
				'alter' => 'border-color',
			),
		),
		// Header 6 - Float Aside
		array(
			'id' => 'header_six_background',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_six',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-6 #site-header:after'
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'header_six_background_opacity',
			'transport' => 'postMessage',
			'default' => '0.0001',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_six',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'ambersix' ),
					'0.9' => esc_html__( '0.9', 'ambersix' ),
					'0.8' => esc_html__( '0.8', 'ambersix' ),
					'0.7' => esc_html__( '0.7', 'ambersix' ),
					'0.6' => esc_html__( '0.6', 'ambersix' ),
					'0.5' => esc_html__( '0.5', 'ambersix' ),
					'0.4' => esc_html__( '0.4', 'ambersix' ),
					'0.3' => esc_html__( '0.3', 'ambersix' ),
					'0.2' => esc_html__( '0.2', 'ambersix' ),
					'0.1' => esc_html__( '0.1', 'ambersix' ),
					'0.0001' => esc_html__( '0', 'ambersix' ),
				),
			),
			'inline_css' => array(
				'target' => '.header-style-6 #site-header:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'header_six_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_six',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 1199px)',
				'target' => '.header-style-6 #site-header-inner',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'header_six_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_six',
			),
			'inline_css' => array(
				'target' => '.header-style-6 #site-header',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'header_six_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Border Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_six',
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.header-style-6 #site-header',
				'alter' => 'border-color',
			),
		),
	)
);

// Header Logo
$this->sections['ambersix_header_logo'] = array(
	'title' => esc_html__( 'Logo', 'ambersix' ),
	'panel' => 'ambersix_header',
	'settings' => array(
		// Logo 1
		array(
			'id' => 'logo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_one',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-1 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_one',
			),
		),
		array(
			'id' => 'logo_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_one',
			),
		),
		// Logo 2
		array(
			'id' => 'logotwo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_two',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-2 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logotwo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_two',
			),
		),
		array(
			'id' => 'logotwo_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_two',
			),
		),
		// Logo 3
		array(
			'id' => 'logothree_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_three',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-3 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logothree',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_three',
			),
		),
		array(
			'id' => 'logothree_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_three',
			),
		),
		// Logo 4
		array(
			'id' => 'logofour_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_four',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-4 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logofour',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_four',
			),
		),
		array(
			'id' => 'logofour_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_four',
			),
		),
		// Logo 5
		array(
			'id' => 'logofive_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_five',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-5 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logofive',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_five',
			),
		),
		array(
			'id' => 'logofive_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_five',
			),
		),
		// Logo 6
		array(
			'id' => 'logosix_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Logo Margin', 'ambersix' ),
		 		'description' => esc_html__( 'Top Right Bottom Left. Example: 30px 0px 0px 0px.', 'ambersix' ),
		 		'active_callback' => 'ambersix_cac_has_header_six',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-6 #site-logo-inner',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'custom_logosix',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Logo Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_header_six',
			),
		),
		array(
			'id' => 'logosix_width',
			'control' => array(
				'label' => esc_html__( 'Logo Width', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_header_six',
			),
		),
	)
);

// Header Menu
$this->sections['ambersix_header_menu'] = array(
	'title' => esc_html__( 'Menu', 'ambersix' ),
	'panel' => 'ambersix_header',
	'settings' => array(
		// General
		array(
			'id' => 'menu_link_spacing',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Link Spacing', 'ambersix' ),
				'description' => esc_html__( 'Example: 20px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'#main-nav > ul > li',
				),
				'alter' => array(
					'padding-left',
					'padding-right',
				),
			),
		),
		array(
			'id' => 'menu_height',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Menu Height', 'ambersix' ),
				'description' => esc_html__( 'Example: 100px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'#site-header #main-nav > ul > li > a',
				),
				'alter' => array(
					'height',
					'line-height',
				),
			),
		),
		array(
			'id' => 'menu_link_current',
			'default' => 'cur-menu-1',
			'control' => array(
				'label' => esc_html__( 'Current Link Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'cur-menu-1' => esc_html__( 'Style 1', 'ambersix' ),
					'cur-menu-2'  => esc_html__( 'Style 2', 'ambersix' ),
				),
			),
		),
		array(
			'id' => 'menu_sub_style',
			'default' => 'sub-menu-1',
			'control' => array(
				'label' => esc_html__( 'Dropdown Menu Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'sub-menu-1' => esc_html__( 'Style 1', 'ambersix' ),
					'sub-menu-2'  => esc_html__( 'Style 2', 'ambersix' ),
				),
			),
		),
		// Header 1
		array(
			'id' => 'menu_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-1 #main-nav > ul > li > a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'menu_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color: Hover', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_one',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-1 #main-nav > ul > li > a:hover',
				),
				'alter' => 'color',
			),
		),
		// Header 2
		array(
			'id' => 'menu_two_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-2 #main-nav > ul > li > a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'menu_two_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color: Hover', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_two',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-2 #main-nav > ul > li > a:hover',
				),
				'alter' => 'color',
			),
		),
		// Header 3
		array(
			'id' => 'menu_three_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-3 #main-nav > ul > li > a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'menu_three_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color: Hover', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_three',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-3 #main-nav > ul > li > a:hover',
				),
				'alter' => 'color',
			),
		),
		// Header 4
		array(
			'id' => 'menu_four_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-4 #main-nav > ul > li > a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'menu_four_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color: Hover', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_header_four',
			),
			'inline_css' => array(
				'target' => array(
					'.header-style-4 #main-nav > ul > li > a:hover',
				),
				'alter' => 'color',
			),
		),
	)
);

// Search, Cart & Button
$this->sections['ambersix_header_search_cart'] = array(
	'title' => esc_html__( 'Search, Cart Icon and Button', 'ambersix' ),
	'panel' => 'ambersix_header',
	'settings' => array(
		// Search Icon
		array(
			'id' => 'header_search_icon',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Search Icon', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'header_search_icon_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Search Icon: Margin', 'ambersix' ),
				'description' => esc_html__( 'Default: 34px 0px 34px 13px', 'ambersix' ),
				'active_callback' => 'ambersix_cac_header_has_normal',
			),
			'inline_css' => array(
				'target' => '.header-search-wrap',
				'alter' => 'margin',
			),
		),
		// Cart Icon
		array(
			'id' => 'header_cart_icon',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Cart Icon', 'ambersix' ),
				'type' => 'checkbox',
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'header_cart_icon_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Cart Icon: Margin', 'ambersix' ),
				'description' => esc_html__( 'Default: 34px 0px 34px 15px', 'ambersix' ),
				'active_callback' => 'ambersix_cac_header_has_normal',
			),
			'inline_css' => array(
				'target' => '.nav-top-cart-wrapper',
				'alter' => 'margin',
			),
		),
		// Button
		array(
			'id' => 'header_button',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Header Button', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'header_button_text',
			'default' => 'GET A QUOTE',
			'control' => array(
				'label' => esc_html__( 'Button Text', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_header_button',
			),
		),
		array(
			'id' => 'header_button_url',
			'control' => array(
				'label' => esc_html__( 'Button URL', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_header_button',
			),
		),
		array(
			'id' => 'header_button_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Button Margin', 'ambersix' ),
				'description' => esc_html__( 'Example: 27px 0px 27px 30px', 'ambersix' ),
				'active_callback' => 'ambersix_cac_header_button',
			),
			'inline_css' => array(
				'target' => '#site-header .header-button',
				'alter' => 'margin',
			),
		),
	)
);
