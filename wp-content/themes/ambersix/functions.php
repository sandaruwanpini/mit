<?php

// Framework functions
require_once( get_template_directory() . '/framework/get-mods.php' );
require_once( get_template_directory() . '/framework/framework-functions.php' );
require_once( get_template_directory() . '/framework/sanitize-data.php' );
require_once( get_template_directory() . '/framework/fonts.php' );
require_once( get_template_directory() . '/framework/typography.php' );
require_once( get_template_directory() . '/framework/accent-color.php' );
require_once( get_template_directory() . '/framework/customizer/customizer.php' );
require_once( get_template_directory() . '/framework/metabox-options.php' );
require_once( get_template_directory() . '/framework/widget-areas.php' );
require_once( get_template_directory() . '/framework/breadcrumbs.php' );
require_once( get_template_directory() . '/framework/plugins.php' );
require_once( get_template_directory() . '/framework/theme-woocommerce.php' );
require_once( get_template_directory() . '/framework/demo-install.php' );

// Visual Composer
if ( class_exists( 'Vc_Manager' ) ) {
	require_once( get_template_directory() . '/framework/visual-composer-config.php' );
	require_once( get_template_directory() . '/framework/visual-composer-custom-row.php' );
}

// Sets up theme defaults and registers support for various WordPress features.
add_action( 'after_setup_theme', 'ambersix_theme_setup' );
function ambersix_theme_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'ambersix', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable woocommerce support
	add_theme_support( 'woocommerce' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ambersix-post-standard', 770, 450, true );
	add_image_size( 'ambersix-post-related', 480, 324, true );
	add_image_size( 'ambersix-post-widget', 140, 140, true );

	// Register menus
	register_nav_menu( 'top', esc_html__( 'Top Menu', 'ambersix' ) );
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'ambersix' ) );
	register_nav_menu( 'onepage', esc_html__( 'OnePage Menu', 'ambersix' ) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'image',
		'gallery',
		'video'
	) );

	// Add Excerpts to Pages
	add_post_type_support( 'page', 'excerpt' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}

// Enqueues scripts and styles.
add_action( 'wp_enqueue_scripts', 'ambersix_theme_scripts' );
function ambersix_theme_scripts() {
	// Vendor Styles & Icons
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.5.2' );
	wp_enqueue_style( 'animsition', get_template_directory_uri() . '/assets/css/animsition.css', array(), '4.0.1' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.6.0' );
	wp_enqueue_style( 'eleganticons', get_template_directory_uri() . '/assets/css/eleganticons.css', array(), '1.0.0' );
	wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.0' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'lineaicons', get_template_directory_uri() . '/assets/css/lineaicons.css', array(), '1.0.0' );

	// Theme Fonts & Style
	wp_enqueue_style( 'ambersix-theme-fonts', get_template_directory_uri() . '/assets/css/theme-fonts.css', array(), '1.0.0' );
	wp_enqueue_style( 'ambersix-theme-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Vendor Scripts
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array('jquery'), '3.7.3', true );
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.js', array('jquery'), '1.3.0', true );
	wp_enqueue_script( 'matchmedia', get_template_directory_uri() . '/assets/js/matchmedia.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/easing.js', array('jquery'), '1.3.0', true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/js/fitvids.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'animsition', get_template_directory_uri() . '/assets/js/animsition.js', array('jquery'), '4.0.1', true );
	wp_register_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.6.0', true );

	// Theme Script
	wp_enqueue_script( 'ambersix-theme-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

	// Comment JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}

// Output custom CSS from Customizer
add_action( 'wp_enqueue_scripts', 'ambersix_output_custom_color' );
function ambersix_output_custom_color( $output = NULL ) {
	$output = apply_filters( 'ambersix_custom_colors_css', $output );
    wp_add_inline_style( 'ambersix-theme-style', $output );
}

// Registers a widget area.
add_action( 'widgets_init', 'ambersix_sidebars_init' );
function ambersix_sidebars_init() {
	// Sidebar for Blog
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Blog', 'ambersix' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here to appear in Sidebar Blog.', 'ambersix' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>'
	) );

	// Sidebar for Pages
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Page', 'ambersix' ),
		'id'			=> 'sidebar-page',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Page', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );

	// Sidebar for Portfolio
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Portfolio', 'ambersix' ),
		'id'			=> 'sidebar-portfolio',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Portfolio', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );

	// Sidebar for Shop
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Shop', 'ambersix' ),
		'id'			=> 'sidebar-shop',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Shop', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );

	// 4 Sidebars for Footer
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Footer 1', 'ambersix' ),
		'id'			=> 'sidebar-footer-1',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Footer 1', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Footer 2', 'ambersix' ),
		'id'			=> 'sidebar-footer-2',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Footer 2', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Footer 3', 'ambersix' ),
		'id'			=> 'sidebar-footer-3',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Footer 3', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar Footer 4', 'ambersix' ),
		'id'			=> 'sidebar-footer-4',
		'description'	=> esc_html__( 'Add widgets here to appear in Sidebar Footer 4', 'ambersix' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title"><span>',
		'after_title'	=> '</span></h2>'
	) );
}

// Disable WPBakery front end editor.
if(function_exists('vc_disable_frontend')){
    vc_disable_frontend();
}