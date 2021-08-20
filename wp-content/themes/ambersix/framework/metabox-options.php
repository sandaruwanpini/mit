<?php
/**
 * Metabox Options
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return the registered-widget array
function ambersix_get_widget_registered() {
	global $wp_registered_sidebars;

	$widgets_areas = array();
	if ( ! empty( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $widget_area ) {
			$name = isset ( $widget_area['name'] ) ? $widget_area['name'] : '';
			$id = isset ( $widget_area['id'] ) ? $widget_area['id'] : '';
			if ( $name && $id ) {
				$widgets_areas[$id] = $name;
			}
		}
	}

	return $widgets_areas;
}

// Return the all-widget array
function ambersix_get_widget_mods() {
	$new_arr = array();
	$widget_areas_mod = ambersix_get_mod( 'widget_areas' );
	
	if (is_array($widget_areas_mod) || is_object($widget_areas_mod)) {
		foreach( $widget_areas_mod as $key ) {
			$new_arr[sanitize_key($key)] = $key;
		}
	}
	
	$widget_areas = ambersix_get_widget_registered() + $new_arr;

	return $widget_areas;
}

// Registering meta boxes. Using Meta Box plugin: https://metabox.io/
function ambersix_register_meta_boxes( $meta_boxes ) {
	// Element Thumbnail
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Custom Thumbnail', 'ambersix' ),
		'id'     => 'opt-meta-box-element-thumbnail',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Image', 'ambersix' ),
				'id'   => 'custom_thumbnail',
				'type' => 'image_advanced',
				'max_file_uploads' => 1
			),
		),
	);
	// Post Format Gallery
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'ambersix' ),
		'id'     => 'opt-meta-box-post-format-gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'ambersix' ),
				'id'   => 'gallery_images',
				'type' => 'image_advanced',
			),
		),
	);

	// Post Format Video
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo...)', 'ambersix' ),
		'id'     => 'opt-meta-box-post-format-video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'ambersix' ),
				'id'   => 'video_url',
				'type' => 'textarea',
			),
		)
	);

	// Partner
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Partner Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-partner',
		'pages'  => array( 'partner' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hyperlink', 'ambersix' ),
				'id'   => 'partner_hyperlink',
				'type'       => 'text',
				'desc'  => esc_html__( "Partne's URL. Leave blank to disable (please 'http://' included).", 'ambersix' )
			),
		)
	);

	// Portfolio
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Project Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-project',
		'pages'  => array( 'project' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Title', 'ambersix' ),
				'id'   => 'title',
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Description', 'ambersix' ),
				'id'   => 'desc',
				'type' => 'textarea',
			),
			array(
				'name'    => esc_html__( 'Image Cropping', 'ambersix' ),
				'id'      => 'image_crop',
				'type'    => 'select',
				'options' => array(
					'full' => esc_html__( 'Full', 'ambersix' ),
					'square' => esc_html__( '640 x 640', 'ambersix' ),
					'rectangle' => esc_html__( '370 x 260', 'ambersix' ),
					'rectangle2' => esc_html__( '370 x 570', 'ambersix' ),
				),
				'std'     => 'full',
			),
		)
	);
	
	// Member
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Member Information', 'ambersix' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'member' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Link', 'ambersix' ),
				'id'   => 'url',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Name', 'ambersix' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'ambersix' ),
				'id'   => 'position',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Text', 'ambersix' ),
				'id'   => 'text',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Twitter', 'ambersix' ),
				'id'   => 'twitter',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Facebook', 'ambersix' ),
				'id'   => 'facebook',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'ambersix' ),
				'id'   => 'linkedin',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Google +', 'ambersix' ),
				'id'   => 'google_plus',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'ambersix' ),
				'id'   => 'instagram',
				'type'       => 'text',
			),
		)
	);

	// Testimonials
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Testimonials Information', 'ambersix' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'testimonials' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'ambersix' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'ambersix' ),
				'id'   => 'position',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Text', 'ambersix' ),
				'id'   => 'text',
				'type' => 'textarea',
			),
		)
	);

	// Top Bar Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Top-Bar Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-top-bar',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Style', 'ambersix' ),
				'id'      => 'top_bar_style',
				'type'    => 'select',
				'options' => array(
					'hide' => esc_html__( 'Hide', 'ambersix' ),
					'style-1' => esc_html__( 'Dark-Text', 'ambersix' ),
					'style-2' => esc_html__( 'Light-Text', 'ambersix' ),
				),
				'std'     => 'hide',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'ambersix' ),
			    'id'	=> 'top_bar_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'ambersix' ),
				'id'   => 'top_bar_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'ambersix' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'ambersix' ),
			    'id'	=> 'top_bar_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
		)
	);

	// Header Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Header Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-header',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Logo', 'ambersix' ),
			    'type' => 'single_image',
			    'id'   => 'custom_header_logo',
			),
			array(
				'name'    => esc_html__( 'Style', 'ambersix' ),
				'id'      => 'header_style',
				'type'    => 'select',
				'options' => array(
					'style-1' => esc_html__( 'Dark-Text', 'ambersix' ),
					'style-2' => esc_html__( 'Light-Text', 'ambersix' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'ambersix' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'ambersix' ),
				),
				'std'     => 'style-1',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'ambersix' ),
			    'id'	=> 'header_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'ambersix' ),
				'id'   => 'header_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'ambersix' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'ambersix' ),
			    'id'	=> 'header_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name'    => esc_html__( 'Current Menu Link', 'ambersix' ),
				'id'      => 'menu_link_current',
				'type'    => 'select',
				'options' => array(
					'cur-menu-1' => esc_html__( 'Style 1', 'ambersix' ),
					'cur-menu-2' => esc_html__( 'Style 2', 'ambersix' ),
				),
				'std'     => 'cur-menu-1',
			),
		)
	);

	// Featured Title Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Featured Title Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-featured-title',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide?', 'ambersix' ),
				'id'   => 'hide_featured_title',
				'type' => 'checkbox',
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'ambersix' ),
				'id'		=>	'featured_title_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Title', 'ambersix' ),
				'id'		=>	'custom_featured_title',
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Sub-Title', 'ambersix' ),
				'id'		=>	'custom_featured_subtitle',
			),
		)
	);

	// Main Content Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Main Content Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-main-content',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Layout Position', 'ambersix' ),
				'id'      => 'page_layout',
				'type'    => 'image_select',
				'options' => array(
					'no-sidebar'  => get_template_directory_uri() . '/assets/admin/img/full-content.png',
					'sidebar-left'  => get_template_directory_uri() . '/assets/admin/img/sidebar-left.png',
					'sidebar-right' => get_template_directory_uri() . '/assets/admin/img/sidebar-right.png',
				),
				'std' 		=> 'no-sidebar',
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'ambersix' ),
				'id'      => 'page_sidebar',
				'type'    => 'select',
				'options' => ambersix_get_widget_mods(),
				'std'     => 'sidebar-page',
				'desc'    => esc_html__( 'This option do not apply if Layout Position is full-width.', 'ambersix' )
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'ambersix' ),
				'id'		=>	'main_content_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'name' => esc_html__( 'Remove: Top & Bottom Padding?', 'ambersix' ),
				'id'   => 'hide_padding_content',
				'type' => 'checkbox',
			),
		)
	);

	// Footer Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Footer Settings', 'ambersix' ),
		'id'     => 'opt-meta-box-footer',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide: Footer?', 'ambersix' ),
				'id'   => 'hide_footer',
				'type' => 'checkbox',
			),
			array(
				'name' => esc_html__( 'Hide: Footer Promotion?', 'ambersix' ),
				'id'   => 'hide_footer_promo',
				'type' => 'checkbox',
			),
			array(
			    'name'          => 'Footer Widget: Background',
			    'id'            => 'footer_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
			    'name'          => 'Bottom Bar: Background',
			    'id'            => 'bottom_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
				'name' => esc_html__( 'Hide: Line Footer?', 'ambersix' ),
				'id'   => 'hide_line_footer',
				'type' => 'checkbox',
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'ambersix_register_meta_boxes' );