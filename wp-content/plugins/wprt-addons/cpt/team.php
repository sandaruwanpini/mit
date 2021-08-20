<?php
if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

add_action('init', 'register_member_post_type');
/**
  * Register member post type
*/
function register_member_post_type() {
    $member_slug = 'member';

    $labels = array(
        'name'               => esc_html__( 'Members', 'ambersix' ),
        'singular_name'      => esc_html__( 'Member Item', 'ambersix' ),
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
        'rewrite'       => array( 'slug' => $member_slug ),
        'supports'      => array( 'title', 'thumbnail' ),
        'public'        => true
    );

    register_post_type( 'member', $args );
}

add_filter( 'post_updated_messages', 'member_updated_messages' );
/**
  * Member update messages.
*/
function member_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['member'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Member updated.', 'ambersix' ),
        2  => esc_html__( 'Custom field updated.', 'ambersix' ),
        3  => esc_html__( 'Custom field deleted.', 'ambersix' ),
        4  => esc_html__( 'Member updated.', 'ambersix' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Member restored to revision from %s', 'ambersix' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Member published.', 'ambersix' ),
        7  => esc_html__( 'Member saved.', 'ambersix' ),
        8  => esc_html__( 'Member submitted.', 'ambersix' ),
        9  => sprintf(
            esc_html__( 'Member scheduled for: <strong>%1$s</strong>.', 'ambersix' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'ambersix' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Member draft updated.', 'ambersix' )
    );
    return $messages;
}

add_action( 'init', 'register_member_taxonomy' );
/**
  * Register member taxonomy
*/
function register_member_taxonomy() {
    $cat_slug = 'member_category';

    $labels = array(
        'name'                       => esc_html__( 'Member Categories', 'ambersix' ),
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
    register_taxonomy( 'member_category', 'member', $args );
}