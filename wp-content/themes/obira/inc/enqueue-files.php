<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'obira_vt_scripts_styles' ) ) {
  function obira_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', OBIRA_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', OBIRA_CSS .'/bootstrap.min.css', array(), '4.5.3', 'all' );
    wp_enqueue_style( 'owl-carousel', OBIRA_CSS .'/owl.carousel.min.css', array(), '2.2.1', 'all' );
    wp_enqueue_style( 'rateyo', OBIRA_CSS .'/jquery.rateyo.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'linea', OBIRA_CSS .'/linea.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'loaders', OBIRA_CSS .'/loaders.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', OBIRA_CSS .'/magnific-popup.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'nice-select', OBIRA_CSS .'/nice-select.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'themify-icons', OBIRA_CSS .'/themify-icons.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'aos', OBIRA_CSS .'/aos.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'meanmenu', OBIRA_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'obira-sheet', get_stylesheet_uri() );
    wp_enqueue_style( 'obira-style', OBIRA_CSS .'/styles.css', array(), OBIRA_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', OBIRA_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '4.5.3', true );
    wp_enqueue_script( 'meanmenu', OBIRA_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );
    wp_enqueue_script( 'html5shiv', OBIRA_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'respond', OBIRA_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', OBIRA_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'sticky', OBIRA_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '4.0.2', true );
    wp_enqueue_script( 'SmoothScroll', OBIRA_SCRIPTS . '/SmoothScroll.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'jarallax', OBIRA_SCRIPTS . '/jarallax.min.js', array( 'jquery' ), '1.7.3', true );
    wp_enqueue_script( 'matchHeight', OBIRA_SCRIPTS . '/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'owl-carousel', OBIRA_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'aos', OBIRA_SCRIPTS . '/aos.min.js', array( 'jquery' ), OBIRA_VERSION, true );
    wp_enqueue_script( 'waypoints', OBIRA_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
    wp_enqueue_script( 'counterup', OBIRA_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'magnific-popup', OBIRA_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'theia-sticky-sidebar', OBIRA_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.7.0', true );
    wp_enqueue_script( 'isotope', OBIRA_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode', OBIRA_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'hoverdir', OBIRA_SCRIPTS . '/jquery.hoverdir.min.js', array( 'jquery' ), '1.1.2', true );
    wp_enqueue_script( 'nice-select', OBIRA_SCRIPTS . '/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'responsiveTabs', OBIRA_SCRIPTS . '/jquery.responsiveTabs.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'particles', OBIRA_SCRIPTS . '/particles.js', array( 'jquery' ), OBIRA_VERSION, true );
    wp_enqueue_script( 'rateyo', OBIRA_SCRIPTS . '/jquery.rateyo.min.js', array( 'jquery' ), '2.3.2', true );
    wp_enqueue_script( 'loaders', OBIRA_SCRIPTS . '/loaders.css.min.js', array( 'jquery' ), OBIRA_VERSION, true );
    wp_enqueue_script( 'typed', OBIRA_SCRIPTS . '/typed.min.js', array( 'jquery' ), OBIRA_VERSION, true );

    wp_enqueue_script( 'obira-scripts', OBIRA_SCRIPTS . '/scripts.js', array( 'jquery' ), OBIRA_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', OBIRA_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    wp_enqueue_style( 'obira-responsive', OBIRA_CSS .'/responsive.css', array(), OBIRA_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'obira_vt_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function obira_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'obira_add_editor_styles' );

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'obira_vt_admin_scripts_styles' ) ) {
  function obira_vt_admin_scripts_styles() {

    wp_enqueue_style( 'obira-admin-main', OBIRA_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'obira-admin-scripts', OBIRA_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_script( 'tipTip-scripts', OBIRA_SCRIPTS . '/jquery.tipTip.min.js', true );
    wp_enqueue_style( 'themify-icons', OBIRA_CSS .'/themify-icons.min.css', array(), OBIRA_VERSION, 'all' );
    wp_enqueue_style( 'linea', OBIRA_CSS .'/linea.min.css', array(), OBIRA_VERSION, 'all' );

  }
  add_action( 'admin_enqueue_scripts', 'obira_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'obira_vt_wp_enqueue_styles' ) ) {
  function obira_vt_wp_enqueue_styles() {
    obira_vt_google_fonts();
    add_action( 'wp_head', 'obira_vt_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'obira_vt_wp_enqueue_styles' );
}
