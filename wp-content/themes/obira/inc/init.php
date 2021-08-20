<?php
/*
 * All Obira Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( OBIRA_FRAMEWORK . '/theme-support.php' );
require_once( OBIRA_FRAMEWORK . '/backend-functions.php' );
require_once( OBIRA_FRAMEWORK . '/frontend-functions.php' );
require_once( OBIRA_FRAMEWORK . '/enqueue-files.php' );
require_once( OBIRA_CS_FRAMEWORK . '/custom-style.php' );
require_once( OBIRA_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( OBIRA_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( OBIRA_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( OBIRA_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( OBIRA_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Sidebars */
require_once( OBIRA_FRAMEWORK . '/core/sidebars.php' );
