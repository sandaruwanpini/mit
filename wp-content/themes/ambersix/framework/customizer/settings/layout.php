<?php
/**
 * Layout setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Layout Style
$this->sections['ambersix_layout_style'] = array(
	'title' => esc_html__( 'Layout Site', 'ambersix' ),
	'panel' => 'ambersix_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_style',
			'default' => 'full-width',
			'control' => array(
				'label' => esc_html__( 'Layout Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'full-width' => esc_html__( 'Full Width','ambersix' ),
					'boxed' => esc_html__( 'Boxed','ambersix' )
				),
			),
		),
		array(
			'id' => 'site_layout_boxed_shadow',
			'control' => array(
				'label' => esc_html__( 'Box Shadow', 'ambersix' ),
				'type' => 'checkbox',
				'active_callback' => 'ambersix_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'site_layout_wrapper_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Wrapper Margin', 'ambersix' ),
				'desc' => esc_html__( 'Top Right Bottom Left. Default: 30px 0px 30px 0px.', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'wrapper_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Outer Background Color', 'ambersix' ),
				'type' => 'color',
				'active_callback' => 'ambersix_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'wrapper_background_img',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image', 'ambersix' ),
				'type' => 'image',
				'active_callback' => 'ambersix_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'wrapper_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image Style', 'ambersix' ),
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
				'active_callback' => 'ambersix_cac_has_boxed_layout',
			),
		),
	),
);

// Layout Position
$this->sections['ambersix_layout_position'] = array(
	'title' => esc_html__( 'Layout Position', 'ambersix' ),
	'panel' => 'ambersix_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Site Layout Position', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'ambersix' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'ambersix' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'ambersix' ),
				),
				'desc' => esc_html__( 'Specify layout for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'ambersix' )
			),
		),
		array(
			'id' => 'single_post_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Single Post Layout Position', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'ambersix' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'ambersix' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'ambersix' ),
				),
				'desc' => esc_html__( 'Specify layout for all single post pages.', 'ambersix' )
			),
		),
	),
);

// Layout Widths
$this->sections['ambersix_layout_widths'] = array(
	'title' => esc_html__( 'Layout Widths', 'ambersix' ),
	'panel' => 'ambersix_layout',
	'settings' => array(
		array(
			'id' => 'site_desktop_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Container', 'ambersix' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default: 1170px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array( 
					'.site-layout-full-width .ambersix-container',
					'.site-layout-boxed #page'
				),
				'alter' => 'width',
			),
		),
		array(
			'id' => 'left_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Content', 'ambersix' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 66%', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#site-content',
				'alter' => 'width',
			),
		),
		array(
			'id' => 'sidebar_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Sidebar', 'ambersix' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 28%', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '#sidebar',
				'alter' => 'width',
			),
		),
	),
);