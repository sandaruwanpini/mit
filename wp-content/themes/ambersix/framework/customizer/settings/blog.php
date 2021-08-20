<?php
/**
 * Blog setting for Customizer
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Blog Posts General
$this->sections['ambersix_blog_post'] = array(
	'title' => esc_html__( 'General', 'ambersix' ),
	'panel' => 'ambersix_blog',
	'settings' => array(
		array(
			'id' => 'blog_featured_title',
			'default' => esc_html__( 'Our News', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Blog Featured Title', 'ambersix' ),
				'type' => 'text',
			),
		),
		array(
			'id' => 'blog_entry_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Content Background Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.post-content-wrap',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'blog_entry_content_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Content Padding', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'blog_entry_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Bottom Margin', 'ambersix' ),
				'description' => esc_html__( 'Example: 30px.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry',
				'alter' => 'margin-top',
			),
		),
		array(
			'id' => 'blog_entry_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Entry Border Width', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'blog_entry_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Border Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'blog_entry_composer',
			'default' => 'cat,title,meta,excerpt_content,readmore',
			'control' => array(
				'label' => esc_html__( 'Entry Content Elements', 'ambersix' ),
				'type' => 'ambersix-sortable',
				'object' => 'Ambersix_Customize_Control_Sorter',
				'choices' => array(
					'cat'             => esc_html__( 'Category', 'ambersix' ),
					'title'           => esc_html__( 'Title', 'ambersix' ),
					'meta'            => esc_html__( 'Meta', 'ambersix' ),
					'excerpt_content' => esc_html__( 'Excerpt', 'ambersix' ),
					'readmore'        => esc_html__( 'Read More', 'ambersix' ),

				),
				'desc' => esc_html__( 'Drag and drop elements to re-order.', 'ambersix' ),
			),
		),
	),
);

// Blog Posts Title
$this->sections['ambersix_blog_post_title'] = array(
	'title' => esc_html__( 'Blog Post - Title', 'ambersix' ),
	'panel' => 'ambersix_blog',
	'settings' => array(
		array(
			'id' => 'blog_title_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-title a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_title_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color Hover', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Meta
$this->sections['ambersix_blog_post_meta'] = array(
	'title' => esc_html__( 'Blog Post - Meta', 'ambersix' ),
	'panel' => 'ambersix_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_meta_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Meta Margin', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 20px 0.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta',
				'alter' => 'margin',
			),
		),
		array(
			'id'  => 'blog_entry_meta_items',
			'default' => array( 'author' ),
			'control' => array(
				'label' => esc_html__( 'Meta Items', 'ambersix' ),
				'desc' => esc_html__( 'Click and drag and drop elements to re-order them.', 'ambersix' ),
				'type' => 'ambersix-sortable',
				'object' => 'Ambersix_Customize_Control_Sorter',
				'choices' => array(
					'author'     => esc_html__( 'Author', 'ambersix' ),
					'date'       => esc_html__( 'Date', 'ambersix' ),
				),
			),
		),
		array(
			'id' => 'heading_blog_entry_meta_item',
			'control' => array(
				'type' => 'ambersix-heading',
				'label' => esc_html__( 'Item Meta', 'ambersix' ),
			),
		),
		array(
			'id' => 'blog_entry_meta_item_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color Hover', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Excerpt
$this->sections['ambersix_blog_post_excerpt'] = array(
	'title' => esc_html__( 'Blog Post - Excerpt', 'ambersix' ),
	'panel' => 'ambersix_blog',
	'settings' => array(
		array(
			'id' => 'blog_content_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Content Style', 'ambersix' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Normal', 'ambersix' ),
					'style-2' => esc_html__( 'Excerpt', 'ambersix' ),
				),
			),
		),
		array(
			'id' => 'blog_excerpt_length',
			'default' => '50',
			'control' => array(
				'label' => esc_html__( 'Excerpt length', 'ambersix' ),
				'type' => 'text',
				'desc' => esc_html__( 'This option only apply for Content Style: Excerpt.', 'ambersix' )
			),
		),
		array(
			'id' => 'blog_excerpt_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'ambersix' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 30px 0.', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_excerpt_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'ambersix' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Read More
$this->sections['ambersix_blog_post_read_more'] = array(
	'title' => esc_html__( 'Blog Post - Read More', 'ambersix' ),
	'panel' => 'ambersix_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_button_read_more_text',
			'default' => esc_html__( 'Read More', 'ambersix' ),
			'control' => array(
				'label' => esc_html__( 'Button Text', 'ambersix' ),
				'type' => 'text',
			),
		),
	),
);

