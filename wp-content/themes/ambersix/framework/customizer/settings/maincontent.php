<?php
/**
 * Main Content setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Content General
$this->sections['ambersix_maincontent_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_maincontent',
	'settings' => array(
		array(
			'id' => 'main_content_top_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Top Padding', 'ambersix' ),
				'description' => esc_html__( 'Example: 30px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#main-content',
				'alter' => 'padding-top',
			),
		),
		array(
			'id' => 'main_content_bottom_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Bottom Padding', 'ambersix' ),
				'description' => esc_html__( 'Example: 30px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#main-content, .footer-has-subs #main-content',
				'alter' => 'padding-bottom',
			),
		),
		array(
			'id' => 'main_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#main-content',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'main_content_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'ambersix' ),
			),
		),
		array(
			'id' => 'main_content_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Background Image Style', 'ambersix' ),
				'type'  => 'image',
				'type'  => 'select',
				'choices' => array(
					''             => esc_html__( 'Default', 'ambersix' ),
					'cover'        => esc_html__( 'Cover', 'ambersix' ),
					'center-top'        => esc_html__( 'Center Top', 'ambersix' ),
					'fixed-top'    => esc_html__( 'Fixed Top', 'ambersix' ),
					'fixed'        => esc_html__( 'Fixed Center', 'ambersix' ),
					'fixed-bottom' => esc_html__( 'Fixed Bottom', 'ambersix' ),
					'repeat'       => esc_html__( 'Repeat', 'ambersix' ),
					'repeat-x'     => esc_html__( 'Repeat-x', 'ambersix' ),
					'repeat-y'     => esc_html__( 'Repeat-y', 'ambersix' ),
				),
			),
		),
	),
);

// Main Content Left
$this->sections['ambersix_maincontent_left'] = array(
	'title' => esc_html__( 'Content', 'ambersix' ),
	'panel' => 'ambersix_maincontent',
	'settings' => array(
		array(
			'id' => 'left_content_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 30px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#inner-content',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'left_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#inner-content',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'left_content_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#inner-content:after',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'left_content_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#inner-content:after',
				'alter' => 'border-color',
			),
		),
	),
);

// Main Content Right
$this->sections['ambersix_maincontent_right'] = array(
	'title' => esc_html__( 'Sidebar', 'ambersix' ),
	'panel' => 'ambersix_maincontent',
	'settings' => array(
		array(
			'id' => 'right_content_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 30px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'right_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'right_content_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 3px 3px 0px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'right_content_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'border-color',
			),
		),
	),
);