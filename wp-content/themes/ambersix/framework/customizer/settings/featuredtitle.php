<?php
/**
 * Featured Title setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Featured Title General
$this->sections['ambersix_featuredtitle_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_featuredtitle',
	'settings' => array(
		array(
			'id' => 'featured_title',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'featured_title_style',
			'default' => 'heading_breadcrumbs',
			'control' => array(
				'label'  => esc_html__( 'Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'heading_breadcrumbs' => esc_html__( 'Simple', 'ambersix' ),
					'heading_breadcrumbs_centered' => esc_html__( 'Centered', 'ambersix' ),
				),
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
		),
		array(
			'id' => 'featured_title_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'ambersix' ),
				'description' => esc_html__( 'Example: 250px 0px 150px 0px', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
			'inline_css' => array(
				'media_query' => '(min-width: 992px)',
				'target' => '.header-style-1 #featured-title .inner-wrap, .header-style-2 #featured-title .inner-wrap, .header-style-3 #featured-title .inner-wrap, .header-style-4 #featured-title .inner-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'featured_title_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
			'inline_css' => array(
				'target' => '#featured-title',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
		),
		array(
			'id' => 'featured_title_background_img_style',
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
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
		),
	),
);

// Featured Title Headings
$this->sections['ambersix_featuredtitle_heading'] = array(
	'title' => esc_html__( 'Headings', 'ambersix' ),
	'panel' => 'ambersix_featuredtitle',
	'settings' => array(
		array(
			'id' => 'featured_title_heading',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
		),
		array(
			'id' => 'featured_title_heading_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Heading Bottom Margin', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title_center',
				'description' => esc_html__( 'Example: 5px.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#featured-title.centered .title-group',
				'alter' => 'margin-bottom',
			),
		),
		array(
			'id' => 'featured_title_heading_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Title Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title_heading',
			),
			'inline_css' => array(
				'target' => '#featured-title .main-title',
				'alter' => 'color',
			),
		),
	),
);

// Featured Title Breadcrumbs
$this->sections['ambersix_featuredtitle_breadcrumbs'] = array(
	'title' => esc_html__( 'Breadcrumbs', 'ambersix' ),
	'panel' => 'ambersix_featuredtitle',
	'settings' => array(
		array(
			'id' => 'featured_title_breadcrumbs',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
				'active_callback' => 'ambersix_cac_has_featured_title',
			),
		),
		array(
			'id' => 'featured_title_breadcrumbs_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title_breadcrumbs',
			),
			'inline_css' => array(
				'target' => array(
					'#featured-title #breadcrumbs',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'featured_title_breadcrumbs_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title_breadcrumbs',
			),
			'inline_css' => array(
				'target' => '#featured-title #breadcrumbs a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'featured_title_breadcrumbs_link_hover_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color: Hover', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_featured_title_breadcrumbs',
			),
			'inline_css' => array(
				'target' => '#featured-title #breadcrumbs a:hover',
				'alter' => 'color',
			),
		),
	),
);