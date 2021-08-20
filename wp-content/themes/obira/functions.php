<?php
/*
 * Obira Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'OBIRA_THEMEROOT_PATH', get_template_directory() );
define( 'OBIRA_THEMEROOT_URI', get_template_directory_uri() );
define( 'OBIRA_CSS', OBIRA_THEMEROOT_URI . '/assets/css' );
define( 'OBIRA_IMAGES', OBIRA_THEMEROOT_URI . '/assets/images' );
define( 'OBIRA_SCRIPTS', OBIRA_THEMEROOT_URI . '/assets/js' );
define( 'OBIRA_FRAMEWORK', get_template_directory() . '/inc' );
define( 'OBIRA_LAYOUT', get_template_directory() . '/layouts' );
define( 'OBIRA_CS_IMAGES', OBIRA_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'OBIRA_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'OBIRA_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$obira_theme_child = wp_get_theme();
	$obira_get_parent = $obira_theme_child->Template;
	$obira_theme = wp_get_theme($obira_get_parent);
} else { // Parent Theme Active
	$obira_theme = wp_get_theme();
}
define('OBIRA_NAME', $obira_theme->get( 'Name' ));
define('OBIRA_VERSION', $obira_theme->get( 'Version' ));
define('OBIRA_BRAND_URL', $obira_theme->get( 'AuthorURI' ));
define('OBIRA_BRAND_NAME', $obira_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( OBIRA_FRAMEWORK . '/init.php' );
