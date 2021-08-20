<?php
/**
 * Bottom Bar setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bottom Bar General
$this->sections['ambersix_bottombar_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_bottombar',
	'settings' => array(
		array(
			'id' => 'bottom_bar',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'bottom_copyright',
			'transport' => 'postMessage',
			'default' => '&copy; Amber Six. Creative Multi-purpose WordPress Theme.',
			'control' => array(
				'label' => esc_html__( 'Copyright', 'ambersix' ),
				'type' => 'ambersix_textarea',
				'active_callback' => 'ambersix_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_padding',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
				'active_callback'=> 'ambersix_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'bottom_background',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback'=> 'ambersix_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'background',
			),
		),
		array(
			'id' => 'bottom_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_background_img_style',
			'default' => 'repeat',
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
				'active_callback' => 'ambersix_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'ambersix' ),
				'active_callback'=> 'ambersix_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'line_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Line Color', 'ambersix' ),
				'active_callback'=> 'ambersix_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap:before',
				'alter' => 'background-color',
			),
		),
	),
);