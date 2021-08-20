<?php
/**
 * Footer setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Footer General
$this->sections['ambersix_footer_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_footer',
	'settings' => array(
		array(
			'id' => 'footer_columns',
			'default' => '4',
			'control' => array(
				'label' => esc_html__( 'Footer Column(s)', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'5' => '4 Special',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
			),
		),
		array(
			'id' => 'footer_column_gutter',
			'default' => '30',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Footer Column Gutter', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'5'    => '5px',
					'10'   => '10px',
					'15'   => '15px',
					'20'   => '20px',
					'25'   => '25px',
					'30'   => '30px',
					'35'   => '35px',
					'40'   => '40px',
					'45'   => '45px',
					'50'   => '50px',
					'60'   => '60px',
					'70'   => '70px',
					'80'   => '80px',
				),
				'active_callback' => 'ambersix_cac_has_footer_simple',
			),
		),
		array(
			'id' => 'footer_text_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#footer-widgets .widget',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'footer_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'footer_top_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Top Padding', 'ambersix' ),
				'description' => esc_html__( 'Example: 60px.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-top',
			),
		),
		array(
			'id' => 'footer_bottom_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Bottom Padding', 'ambersix' ),
				'description' => esc_html__( 'Example: 60px.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-bottom',
			),
		),
	),
);

// Footer Promotion
$this->sections['ambersix_footer_promotion'] = array(
	'title' => esc_html__( 'Promotion Block', 'ambersix' ),
	'panel' => 'ambersix_footer',
	'settings' => array(
		array(
			'id' => 'promotion_box',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'promo_title',
			'default' => 'Have a project in mind?<br />We\'d love to help make your ideas a reality.',
			'control' => array(
				'label' => esc_html__( 'Title', 'ambersix' ),
				'type' => 'ambersix_textarea',
				'rows' => 3,
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button',
			'default' => esc_html__( 'GET STARTED', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Button', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button_url',
			'default' => esc_html__( '#', 'ambersix' ),
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Button URL', 'ambersix' ),
				'description' => esc_html__( 'Please \'http://\' included', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),	
		),
		array(
			'id' => 'promo_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),
			'inline_css' => array(
				'target' => '.footer-promotion',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'promo_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_background_img_style',
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
				'active_callback' => 'ambersix_cac_has_footer_promo',
			),
		),
	),
);