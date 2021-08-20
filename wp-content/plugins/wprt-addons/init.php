<?php 
/*
Plugin Name: WPRT Addons for AmberSix
Plugin URI: https://ninzio.com/
Description: Extend WPBakery with Advanced Shortcodes.
Version: 1.0
Author: Ninzio Themes
Author URI: https://ninzio.com/
*/

/**
 * Plugin Name: NinzioFramework
 * Description: Open Setting, Post Type, Shortcode ... for theme 
 * Version: 1.0
 * Author: Ninzio Themes
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'loadCssAndJs', 999999 );
function loadCssAndJs() {
	wp_enqueue_style( 'ambersix-owlcarousel', plugins_url('assets/owl.carousel.css', __FILE__), array(), '2.2.1' );
	wp_register_script( 'ambersix-owlcarousel', plugins_url('assets/owl.carousel.min.js', __FILE__), array('jquery'), '2.2.1', true );

	wp_enqueue_style( 'slick', plugins_url('assets/slick.css', __FILE__), array(), '1.6.0' );
	wp_register_script( 'slick', plugins_url('assets/slick.js', __FILE__), array('jquery'), '1.6.0', true );
	
	wp_enqueue_script( 'ambersix-imagesloaded', plugins_url('assets/imagesloaded.js', __FILE__), array('jquery'), '4.1.3', true );
	wp_enqueue_style( 'ambersix-cubeportfolio', plugins_url('assets/cubeportfolio.min.css', __FILE__), array(), '3.4.0' );
	wp_register_script( 'ambersix-cubeportfolio', plugins_url('assets/cubeportfolio.min.js', __FILE__), array('jquery'), '3.4.0', true );
	wp_register_script( 'ambersix-countto', plugins_url('assets/countto.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'ambersix-equalize', plugins_url('assets/equalize.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'ambersix-magnificpopup', plugins_url('assets/magnific.popup.css', __FILE__), array(), '1.0.0' );
	wp_enqueue_script( 'ambersix-magnificpopup', plugins_url('assets/magnific.popup.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'ambersix-vegas', plugins_url('assets/vegas.css', __FILE__), array(), '2.3.1' );
	wp_register_script( 'ambersix-vegas', plugins_url('assets/vegas.js', __FILE__), array('jquery'), '2.3.1', true );
	wp_enqueue_style( 'ambersix-ytplayer', plugins_url('assets/ytplayer.css', __FILE__), array(), '3.0.2' );
	wp_register_script( 'ambersix-ytplayer', plugins_url('assets/ytplayer.js', __FILE__), array('jquery'), '3.0.2', true );
	wp_register_script( 'ambersix-fittext', plugins_url('assets/fittext.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'ambersix-flowtype', plugins_url('assets/flowtype.js', __FILE__), array('jquery'), '1.3.0', true );
	wp_register_script( 'ambersix-typed', plugins_url('assets/typed.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'ambersix-countdown', plugins_url('assets/countdown.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'ambersix-appear', plugins_url('assets/appear.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'ambersix-wow', plugins_url('assets/wow.min.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'ambersix-anime', plugins_url('assets/anime.js', __FILE__), array('jquery'), '0.1.0', true );
	wp_enqueue_script( 'ambersix-reveal', plugins_url('assets/reveal.js', __FILE__), array('jquery'), '0.1.0', true );
	wp_enqueue_script( 'ambersix-parallaxscroll', plugins_url('assets/parallax-scroll.js', __FILE__), array('jquery'), '0.2.6', true );
	wp_enqueue_script( 'ambersix-progressbar', plugins_url('assets/progressbar.min.js', __FILE__), array('jquery'), '0.9.0', true );
	wp_enqueue_script( 'ambersix-shortcode', plugins_url('assets/shortcodes.js', __FILE__), array('jquery'), '1.0', true );
	wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js', array(), 'v3');
}

// Add image sizes
add_action( 'after_setup_theme', 'add_image_sizes' );
function add_image_sizes() {
	add_image_size( 'ambersix-square', 640, 640, true );
	add_image_size( 'ambersix-rectangle', 370, 260, true );
	add_image_size( 'ambersix-rectangle2', 370, 570, true );
}

// Map shortcodes to Visual Composer
require_once __DIR__ . '/vc-map.php';

// Include shortcodes files for Visual Composer
foreach ( glob( plugin_dir_path( __FILE__ ) . '/shortcodes/*.php' ) as $file ) {
	$filename = basename( $file );
	$tagname  = str_replace( '-', '_', pathinfo( $file, PATHINFO_FILENAME ) );

	add_shortcode( $tagname, function( $atts, $content = '' ) use( $file, $filename ) {
		ob_start();
		include $file;
		return ob_get_clean();
	} );
}

// Add user contact methods
function ambersix_socials_user_contact_methods() {
	$user_contact['user_position']   = esc_html( 'Position' );
	
	$user_contact['user_facebook']   = esc_html( 'Facebook URL' );
	$user_contact['user_twitter'] = esc_html( 'Twitter URL' );
	$user_contact['user_google_plus'] = esc_html( 'Google+ URL' );
	$user_contact['user_linkedin'] = esc_html( 'LinkedIn URL' );
	$user_contact['user_pinterest'] = esc_html( 'Pinterest URL' );
	$user_contact['user_instagram'] = esc_html( 'Instagram URL' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'ambersix_socials_user_contact_methods' );

// Google API
require_once __DIR__ . '/google-api.php';

// Custom Post Type
require_once __DIR__ . '/cpt/init.php';

// Widgets
require_once __DIR__ . '/widgets/init.php';