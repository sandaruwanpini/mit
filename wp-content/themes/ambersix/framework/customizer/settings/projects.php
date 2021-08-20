<?php
/**
 * Projects setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Project Related General
$this->sections['ambersix_projects_general'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_projects',
	'settings' => array(
		array(
			'id' => 'project_related',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'ambersix' ),
				'type' => 'checkbox',
				'active_callback' => 'ambersix_cac_has_single_project',
			),
		),
		array(
			'id' => 'project_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Single Project: Featured Title Background', 'ambersix' ),
				'active_callback' => 'ambersix_cac_has_related_project',
			),
		),
		array(
			'id' => 'related_title',
			'default' => esc_html__( 'Related Projects', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Project Related Title', 'ambersix' ),
				'type' => 'ambersix_textarea',
				'rows' => 3,
				'active_callback' => 'ambersix_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_query',
			'default' => 7,
			'control' => array(
				'label' => esc_html__( 'Number of items', 'ambersix' ),
				'type' => 'number',
				'active_callback' => 'ambersix_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_column',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Columns', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'4' => '4',
					'3' => '3',
					'2' => '2',
				),
				'active_callback' => 'ambersix_cac_has_related_project',
			),
		),
		array(
			'id' => 'project_related_item_spacing',
			'default' => 30,
			'control' => array(
				'label' => esc_html__( 'Spacing between items', 'ambersix' ),
				'type' => 'number',
				'active_callback' => 'ambersix_cac_has_related_project',
			),
		),
	),
);