<?php
/**
 * Shop setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Shop
$this->sections['ambersix_shop_general'] = array(
	'title' => esc_html__( 'Main Shop', 'ambersix' ),
	'panel' => 'ambersix_shop',
	'settings' => array(
		array(
			'id' => 'shop_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Layout Position', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'ambersix' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'ambersix' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'ambersix' ),
				),
				'desc' => esc_html__( 'Specify layout for main shop page.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title',
			'default' => esc_html__( 'Our Shop', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Shop: Featured Title', 'ambersix' ),
				'type' => 'ambersix_textarea',
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop: Featured Title Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_products_per_page',
			'default' => 6,
			'control' => array(
				'label' => esc_html__( 'Products Per Page', 'ambersix' ),
				'type' => 'number',
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_columns',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Shop Columns', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_item_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Bottom Margin', 'ambersix' ),
				'description' => esc_html__( 'Example: 30px.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_woo',
			),
			'inline_css' => array(
				'target' => '.products li',
				'alter' => 'margin-top',
			),
		),
	),
);

// Single Shop
$this->sections['ambersix_single_shop_general'] = array(
	'title' => esc_html__( 'Single Shop', 'ambersix' ),
	'panel' => 'ambersix_shop',
	'settings' => array(
		array(
			'id' => 'shop_single_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Single Layout Position', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'ambersix' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'ambersix' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'ambersix' ),
				),
				'desc' => esc_html__( 'Specify layout on the shop single page.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title',
			'default' => esc_html__( 'Our Shop', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Shop Single: Featured Title', 'ambersix' ),
				'type' => 'text',
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop Single: Featured Title Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_woo',
			),
		),
	),
);