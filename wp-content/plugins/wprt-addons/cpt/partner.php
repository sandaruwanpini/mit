<?php
if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

add_action('init', 'register_partner_post_type');
/**
  * Register partner post type
*/
function register_partner_post_type() {
    $partner_slug = 'partner';

    $labels = array(
        'name'               => esc_html__( 'Partners', 'ambersix' ),
        'singular_name'      => esc_html__( 'Partner Item', 'ambersix' ),
        'add_new'            => esc_html__( 'Add New', 'ambersix' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'ambersix' ),
        'new_item'           => esc_html__( 'New Item', 'ambersix' ),
        'edit_item'          => esc_html__( 'Edit Item', 'ambersix' ),
        'view_item'          => esc_html__( 'View Item', 'ambersix' ),
        'all_items'          => esc_html__( 'All Items', 'ambersix' ),
        'search_items'       => esc_html__( 'Search Items', 'ambersix' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'ambersix' ),
        'not_found'          => esc_html__( 'No items found.', 'ambersix' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'ambersix' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $partner_slug ),
        'supports'      => array( 'title', 'thumbnail' ),
        'public'        => true
    );

    register_post_type( 'partner', $args );
}

add_filter( 'post_updated_messages', 'partner_updated_messages' );
/**
  * Partner update messages.
*/
function partner_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['partner'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Partner updated.', 'ambersix' ),
        2  => esc_html__( 'Custom field updated.', 'ambersix' ),
        3  => esc_html__( 'Custom field deleted.', 'ambersix' ),
        4  => esc_html__( 'Partner updated.', 'ambersix' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Partner restored to revision from %s', 'ambersix' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Partner published.', 'ambersix' ),
        7  => esc_html__( 'Partner saved.', 'ambersix' ),
        8  => esc_html__( 'Partner submitted.', 'ambersix' ),
        9  => sprintf(
            esc_html__( 'Partner scheduled for: <strong>%1$s</strong>.', 'ambersix' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'ambersix' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Partner draft updated.', 'ambersix' )
    );
    return $messages;
}

add_action( 'init', 'register_partner_taxonomy' );
/**
  * Register partner taxonomy
*/
function register_partner_taxonomy() {
    $cat_slug = 'partner_category';

    $labels = array(
        'name'                       => esc_html__( 'Partner Categories', 'ambersix' ),
        'singular_name'              => esc_html__( 'Category', 'ambersix' ),
        'search_items'               => esc_html__( 'Search Categories', 'ambersix' ),
        'menu_name'                  => esc_html__( 'Categories', 'ambersix' ),
        'all_items'                  => esc_html__( 'All Categories', 'ambersix' ),
        'parent_item'                => esc_html__( 'Parent Category', 'ambersix' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'ambersix' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'ambersix' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'ambersix' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'ambersix' ),
        'update_item'                => esc_html__( 'Update Category', 'ambersix' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'ambersix' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'ambersix' ),
        'not_found'                  => esc_html__( 'No Category found.', 'ambersix' ),
        'menu_name'                  => esc_html__( 'Categories', 'ambersix' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'             => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'partner_category', 'partner', $args );
}