<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'obira_dynamic_styles' ) ) {
  function obira_dynamic_styles() {

    // Typography
    $obira_vt_get_typography  = obira_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( $bg_image['image'] ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( $bg_image['repeat'] ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( $bg_image['position'] ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( $bg_image['attachment'] ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( $bg_image['size'] ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( $bg_image['color'] ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. OBIRA_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  .obra-btn, input[type="submit"], .obra-callout, .obra-hover .plan-info .obra-gray-border-btn,
  .woocommerce ul.products li.product .button.add_to_cart_button:hover,
  .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
  .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce a.button,
  .woocommerce button.button, .woocommerce input.button, .woocommerce .wc-proceed-to-checkout .button.alt,
  .woocommerce-edit-address .woocommerce-Address-title a {background-color: {$all_element_color};}

  p a, a:hover, a:focus, .masonry-filters ul li a.active, table td a:hover, .obra-social a:hover, .obra-nav > ul > li:hover > a, .obra-nav > ul > li.active > a,
  .dropdown-nav > li > a:hover, .dropdown-nav > li.active > a, .dropdown-nav > li.has-dropdown:hover > a > .nav-label:after,
  .dark-transparent-header .obra-nav > ul > li:hover > a, .dark-transparent-header .obra-nav > ul > li.active > a,
  .search-link:hover, .cart-link-wrap a:hover, .obra-get-start p a:hover, .obra-get-start .obra-link a:hover,
  .obra-copyright a:hover, .obra-copyright .obra-social a:hover, .obra-footer-wrap a:hover, .connector-app-title a:hover,
  .special-feature-info .obra-link a:hover, .job-item-subtitle a:hover, .contact-info p a:hover,
  .portfolio-detail-wrap .portfolio-categories a:hover, .portfolio-detail-item a:hover, .portfolio-controls a:hover,
  .portfolio-subtitle a:hover, .woocommerce-product-rating .woocommerce-review-link:hover, .product_meta a:hover,
  .woocommerce .additional-info .dl-horizontal dd a:hover, .woocommerce .cart_totals .shipping-calculator-form a:hover,
  .woocommerce form .lost_password a:hover, .blog-meta a:hover, .obra-widget ul li a:hover, .obra-blog-detail .blog-meta .pull-left a:hover,
  .author-content .obra-social a:hover, .form-wrap .forgot-link a:hover,
  .obra-nav > ul > li:hover > a > .nav-label:before, .obra-nav > ul > li.active > a > .nav-label:before,
  .obra-nav .navigation-bar > ul > li > a:hover, .obra-link a, .workflow-item.obra-hover [class*="ti-"],
  .woocommerce ul.products li.product a.button.add_to_cart_button, .woocommerce .star-rating span,
  .woocommerce .cart-collaterals a.shipping-calculator-button:hover, .woocommerce .wc_payment_method .wpcf7-list-item-label a,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul .is-active a,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover,
  .obra-nav .navigation-bar > ul > li.current-menu-ancestor > a,
  .obra-nav .navigation-bar > ul > li.current-menu-item > a,
  .search-link-wrap a.close-icon:hover {color: {$all_element_color};}

  p a:after, .radio-icon-wrap input[type="radio"]:checked + .radio-icon:before,
  .nav-tabs > li > a:after, .obra-pagination ul li span, .obra-pagination span.page-numbers.current,
  .wp-link-pages > span, .obra-back-top a:hover, .cart-counter, .board-tab-counter:after, .obra-video-btn:hover,
  .grid-view-link:hover .grid-view-square, .grid-view-link:hover .grid-view-square:after, .portfolio-label:hover,
  .woocommerce span.onsale, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
  .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce div.product .woocommerce-tabs ul.tabs li a:after,
  .woocommerce a.remove:hover, .woocommerce .cart .actions .coupon input[type="submit"]:hover,
  .woocommerce .cart .actions input[type="submit"].update-cart,
  .woocommerce-cart input.button:disabled, .woocommerce-cart input.button[type="submit"],
  ul.bullet-list li:before, .obra-blog-share a:hover, .obra-blog-controls a:hover, .comments-reply a:hover,
  .obra-pagination a.malinky-load-more__button {background: {$all_element_color};}

  .masonry-filters ul li a.active, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
  .woocommerce nav.woocommerce-pagination ul li span.current,
  .plan-item.obra-hover,
  .woocommerce nav.woocommerce-pagination ul li span.current {border-color: {$all_element_color};}

  blockquote {border-left-color: {$all_element_color};}
CSS;
}

/* Header - Customizer */
if ($obira_meta) {
  $header_link_color = $obira_meta['transparent_menu_color'];
  $sticky_bg_color = $obira_meta['transparent_sticky_bg_color'];
  $header_link_hover_color = $obira_meta['transparent_menu_hover_color'];
  $sticky_menu_color = $obira_meta['sticky_menu_color'];
  $sticky_menu_hover_color = $obira_meta['sticky_menu_hover_color'];
} else {
  $header_link_color = cs_get_customize_option( 'header_link_color' );
  $sticky_bg_color = cs_get_customize_option('sticky_bg_color');
  $header_link_hover_color = cs_get_customize_option( 'header_link_hover_color' );
  $sticky_menu_color = cs_get_customize_option('header_sticky_link_color');
  $sticky_menu_hover_color = cs_get_customize_option('header_sticky_link_hover_color');

}


$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .obra-header {
    background-color: {$header_bg_color};
  }
CSS;
}

$sticky_bg_color = $sticky_bg_color ? $sticky_bg_color : cs_get_customize_option('sticky_bg_color');
$sticky_menu_color = $sticky_menu_color ? $sticky_menu_color : cs_get_customize_option('header_sticky_link_color');
$sticky_menu_hover_color = $sticky_menu_hover_color ? $sticky_menu_hover_color : cs_get_customize_option('header_sticky_link_hover_color');
$header_link_color  = $header_link_color ? $header_link_color : cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = $header_link_hover_color ? $header_link_hover_color : cs_get_customize_option( 'header_link_hover_color' );
$cart_bg_color = cs_get_customize_option('cart_bg_color');
$sticky_cart_bg_color = cs_get_customize_option('sticky_cart_bg_color');
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .obra-nav .navigation-bar > ul > li > a, .cart-link-wrap a, a.search-link {
    color: {$header_link_color};
  }
  .toggle-separator:before, .toggle-separator:after, .toggle-separator {
    background: {$header_link_color};
  }
  .obra-nav .navigation-bar > ul > li > a:hover,
  .obra-nav .navigation-bar > ul > li.current-menu-ancestor > a,
  .obra-nav .navigation-bar > ul > li.current-menu-item > a,
  .cart-link-wrap a:hover, a.search-link:hover {
    color: {$header_link_hover_color};
  }
CSS;
}

// Sticky Menu colors
if($sticky_menu_color || $sticky_menu_hover_color) {
echo <<<CSS
  .no-class {}
  .is-sticky .obra-nav .navigation-bar > ul > li > a, .is-sticky .cart-link-wrap a, .is-sticky a.search-link {
    color: {$sticky_menu_color};
  }
  .is-sticky .toggle-separator:before, .is-sticky .toggle-separator:after, .toggle-separator {
    background: {$sticky_menu_color};
  }
  .is-sticky .obra-nav .navigation-bar > ul > li > a:hover,
  .is-sticky .obra-nav .navigation-bar > ul > li.current-menu-ancestor > a,
  .is-sticky .obra-nav .navigation-bar > ul > li.current-menu-item > a,
  .is-sticky .cart-link-wrap a:hover, .is-sticky a.search-link:hover {
    color: {$sticky_menu_hover_color};
  }
CSS;
}

if($cart_bg_color) {
 echo <<<CSS
  .no-class {}
  .cart-counter, .cart-link-wrap a:hover .cart-counter {
    background: {$cart_bg_color};
  }
CSS;
}
if($sticky_cart_bg_color) {
 echo <<<CSS
  .no-class {}
  .is-sticky .cart-counter, .is-sticky .cart-link-wrap a:hover .cart-counter {
    background: {$sticky_cart_bg_color};
  }
CSS;
}
// Sticky Bg Color
if($sticky_bg_color) {
 echo <<<CSS
  .no-class {}
  .is-sticky .obra-header {
    background: {$sticky_bg_color};
  }
CSS;
}

// Metabox - Header Transparent
if ($obira_meta) {
  $transparent_header = $obira_meta['transparency_header'];
  $transparent_menu_color = $obira_meta['transparent_menu_color'];
  $transparent_sticky_bg_color = $obira_meta['transparent_sticky_bg_color'];
  $transparent_menu_hover = $obira_meta['transparent_menu_hover_color'];
  $trans_sticky_menu_color = $obira_meta['sticky_menu_color'];
  $trans_sticky_menu_hover_color = $obira_meta['sticky_menu_hover_color'];
} else {
  $transparent_header = cs_get_option('transparency_header');
  $transparent_menu_color = cs_get_customize_option('trans_header_link_color');
  $transparent_sticky_bg_color = cs_get_customize_option('transparent_sticky_bg_color');
  $transparent_menu_hover = cs_get_customize_option('trans_header_link_hover_color');
  $trans_sticky_menu_color = cs_get_customize_option('trans_header_sticky_link_color');
  $trans_sticky_menu_hover_color = cs_get_customize_option('trans_header_sticky_link_hover_color');
}
$transparent_sticky_bg_color_actual = $transparent_sticky_bg_color ? $transparent_sticky_bg_color : cs_get_customize_option('transparent_sticky_bg_color');
$transparent_menu_color = $transparent_menu_color ? $transparent_menu_color : cs_get_customize_option('trans_header_link_color');
$transparent_menu_hover = $transparent_menu_hover ? $transparent_menu_hover : cs_get_customize_option('trans_header_link_hover_color');
$trans_sticky_menu_color = $trans_sticky_menu_color ? $trans_sticky_menu_color : cs_get_customize_option('trans_header_sticky_link_color');
$trans_sticky_menu_hover_color = $trans_sticky_menu_hover_color ? $trans_sticky_menu_hover_color : cs_get_customize_option('trans_header_sticky_link_hover_color');

if($transparent_header === 'transparent') {

if ($transparent_menu_color) {
echo <<<CSS
  .no-class {}
  .transparent-header .obra-nav .navigation-bar> ul > li > a,
  .transparent-header .cart-link-wrap a, .transparent-header .search-link {
    color: {$transparent_menu_color};
  }
  .transparent-header .mean-container a.meanmenu-reveal span {
    background: {$transparent_menu_color};
  }
  .transparent-header .toggle-separator, .transparent-header .toggle-separator:before, .transparent-header .toggle-separator:after {
    background: {$transparent_menu_color};
  }
CSS;
}

if ($transparent_sticky_bg_color_actual) {
echo <<<CSS
  .no-class {}
  .transparent-header .is-sticky .obra-header {
    background: {$transparent_sticky_bg_color_actual};
  }
CSS;
}

if ($transparent_menu_hover) {
echo <<<CSS
  .no-class {}
  .transparent-header .obra-nav .navigation-bar> ul > li > a:hover,
  .transparent-header .obra-nav .navigation-bar > ul > li.current-menu-ancestor > a,
  .transparent-header .obra-nav .navigation-bar > ul > li.current-menu-item > a,
  .transparent-header .cart-link-wrap a:hover, .transparent-header .search-link:hover,
  .transparent-header .obra-nav .navigation-bar> ul > li > a:focus {
    color: {$transparent_menu_hover};
  }
CSS;
}

$trans_cart_bg_color = cs_get_customize_option('trans_cart_bg_color');
$trans_sticky_cart_bg_color =cs_get_customize_option('trans_sticky_cart_bg_color');
if($trans_cart_bg_color) {
 echo <<<CSS
  .no-class {}
  .transparent-header .cart-counter, .transparent-header .cart-link-wrap a:hover .cart-counter {
    background: {$trans_cart_bg_color};
  }
CSS;
}
if($trans_sticky_cart_bg_color) {
 echo <<<CSS
  .no-class {}
  .transparent-header .is-sticky .cart-counter, .transparent-header .is-sticky .cart-link-wrap a:hover .cart-counter {
    background: {$trans_sticky_cart_bg_color};
  }
CSS;
}

// Sticky colors
if($trans_sticky_menu_color || $trans_sticky_menu_hover_color) {
echo <<<CSS
  .no-class {}
  .is-sticky .obra-nav .navigation-bar > ul > li > a, .is-sticky .cart-link-wrap a, .is-sticky a.search-link {
    color: {$trans_sticky_menu_color};
  }
  .is-sticky .toggle-separator:before, .is-sticky .toggle-separator:after, .toggle-separator {
    background: {$trans_sticky_menu_color};
  }
  .is-sticky .obra-nav .navigation-bar > ul > li > a:hover,
  .is-sticky .obra-nav .navigation-bar > ul > li.current-menu-ancestor > a,
  .is-sticky .obra-nav .navigation-bar > ul > li.current-menu-item > a,
  .is-sticky .cart-link-wrap a:hover, .is-sticky a.search-link:hover {
    color: {$trans_sticky_menu_hover_color};
  }
CSS;
}

}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .dropdown-nav > li > a {
    color: {$submenu_link_color};
  }
  .dropdown-nav > li > a:focus,
  .dropdown-nav > li > a:hover,
  .dropdown-nav > .active > a,
  .dropdown-nav > .active > a:focus,
  .dropdown-nav > .active > a:hover,
  .mean-container .mean-nav ul.sub-menu > li:hover,
  .mean-container .mean-nav ul.sub-menu > li.current-menu-item,
  .mean-container .mean-nav ul.sub-menu > li a:hover,
  .dropdown-nav > li.active > a {
    color: {$submenu_link_hover_color};
  }
  .dropdown-nav,
  .mean-container .mean-nav ul.sub-menu li a {
    background-color: {$submenu_bg_color};
  }
  .mean-container .mean-nav ul.sub-menu li a {
    color: {$submenu_link_color};
  }

CSS;
}

/* Mobile Menu - Customizer */
$mobile_menu_toggle_color = cs_get_customize_option('mobile_menu_toggle_color');
$mobile_menu_bg_color  = cs_get_customize_option( 'mobile_menu_bg_color' );
$mobile_menu_bg_hover_color  = cs_get_customize_option( 'mobile_menu_bg_hover_color' );
$mobile_menu_link_color  = cs_get_customize_option( 'mobile_menu_link_color' );
$mobile_menu_link_hover_color  = cs_get_customize_option( 'mobile_menu_link_hover_color' );
$mobile_menu_border_color  = cs_get_customize_option( 'mobile_menu_border_color' );
$mobile_menu_expand_color  = cs_get_customize_option( 'mobile_menu_expand_color' );
$mobile_menu_expand_hover_color  = cs_get_customize_option( 'mobile_menu_expand_hover_color' );
$mobile_menu_expand_bg_color  = cs_get_customize_option( 'mobile_menu_expand_bg_color' );
$mobile_menu_expand_bg_hover_color  = cs_get_customize_option( 'mobile_menu_expand_bg_hover_color' );
if ($mobile_menu_toggle_color) {
echo <<<CSS
  .no-class {}
  .dont-transparent .mean-container a.meanmenu-reveal span,
  .mean-container a.meanmenu-reveal span,
  .transparent-header .mean-container a.meanmenu-reveal span {
    background: {$mobile_menu_toggle_color};
  }
CSS;
}
if ($mobile_menu_bg_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav {
    background-color: {$mobile_menu_bg_color};
  }
CSS;
}
if($mobile_menu_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .roof-header .mean-container .dropdown-nav > li:hover > a,
  .roof-header .mean-container .dropdown-nav > li:focus > a,
  .mean-container .mean-nav ul li:hover > a,
  .mean-container .mean-nav ul li:focus > a {
    background-color: {$mobile_menu_bg_hover_color};
  }
CSS;
}
if($mobile_menu_link_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a {
    color: {$mobile_menu_link_color}!important;
  }
CSS;
}

if($mobile_menu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a:hover,
  .mean-container .mean-nav ul li a:focus,
  .roof-header .mean-container .dropdown-nav > li.active > a,
  .mean-container ul li.current-menu-ancestor > a,
  .mean-container .mean-nav .current-menu-parent>a,
  .mean-container li.current-menu-item.active a,
  .mean-container .mean-nav ul li.current-menu-ancestor>a,
  .mean-container li.current-menu-item.active>a {
    color: {$mobile_menu_link_hover_color}!important;
  }
CSS;
}
if($mobile_menu_border_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li li a, .mean-container .mean-nav ul li a {
    border-color: {$mobile_menu_border_color};
  }
CSS;
}
if($mobile_menu_expand_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand {
    color: {$mobile_menu_expand_color}!important;
  }
CSS;
}
if($mobile_menu_expand_hover_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand:hover,
  .mean-container .mean-nav ul li a.mean-expand:focus,
  .mean-container .mean-nav ul li:hover > a.mean-expand,
  .mean-container .mean-nav ul li:focus > a.mean-expand,
  .roof-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
  .roof-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
    color: {$mobile_menu_expand_hover_color}!important;
  }
CSS;
}
if($mobile_menu_expand_bg_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand {
    background-color: {$mobile_menu_expand_bg_color};
  }
CSS;
}
if($mobile_menu_expand_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .mean-container .mean-nav ul li a.mean-expand:hover,
  .mean-container .mean-nav ul li a.mean-expand:focus,
  .mean-container .mean-nav ul li:hover > a.mean-expand,
  .mean-container .mean-nav ul li:focus > a.mean-expand,
  .roof-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
  .roof-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
    background-color: {$mobile_menu_expand_bg_hover_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
$titlebar_sub_title_color  = cs_get_customize_option( 'titlebar_sub_title_color' );
if ($titlebar_bg) {

  $title_area = ( $titlebar_bg['image'] ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( $titlebar_bg['repeat'] ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( $titlebar_bg['position'] ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( $titlebar_bg['attachment'] ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( $titlebar_bg['size'] ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( $titlebar_bg['color'] ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .obra-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .obra-page-title h1 {
    color: {$title_heading_color};
  }
CSS;
}
if ($titlebar_sub_title_color) {
echo <<<CSS
  .no-class {}
  .obra-page-title p {
    color: {$titlebar_sub_title_color};
  }
CSS;
}

/* Footer */
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .obra-footer-wrap {background: {$footer_bg_color};}
CSS;
}
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .obra-footer-wrap h4.widget-title, .obra-footer-wrap h1, .obra-footer-wrap h2, .obra-footer-wrap h3, .obra-footer-wrap h4, .obra-footer-wrap h5, .obra-footer-wrap h6 {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .obra-footer-wrap p, .obra-footer-wrap .obra-widget,
  .obra-footer-wrap .widget_rss .rssSummary,
  .obra-footer-wrap .news-time, .obra-footer-wrap .recentcomments,
  .obra-footer-wrap input[type="text"], .obra-footer-wrap .nice-select, .obra-footer-wrap caption,
  .obra-footer-wrap table td, .obra-footer-wrap .obra-widget input[type="search"],
  .obra-footer-wrap .woocommerce ul.product_list_widget .woocommerce-Price-amount {color: {$footer_text_color};}
  .obra-footer-wrap .obra-widget ul li:before{background: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .obra-footer-wrap a,
  .obra-footer-wrap .obra-widget ul li a {color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .obra-footer-wrap a:hover,
  .obra-footer-wrap .obra-widget ul li a:hover {color: {$footer_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_border_color  = cs_get_customize_option( 'copyright_border_color' );
if ($copyright_bg_color) {
echo <<<CSS
  .no-class {}
  .obra-copyright {background: {$copyright_bg_color};}
CSS;
}
if ($copyright_border_color) {
echo <<<CSS
  .no-class {}
  .obra-copyright {border-color: {$copyright_border_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .obra-copyright,
  .obra-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .obra-copyright a, .obra-copyright .obra-social a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .obra-copyright a:hover, .obra-copyright .obra-social a:hover {color: {$copyright_link_hover_color};}
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  .obra-primary p, .ventre-blog-items .blog-time, .blog-meta,
  .blog-detail-wrap .blog-time, .obra-primary blockquote, ul.bullet-list,
  .obra-blog-detail .blog-meta .pull-left, .author-content, .obra-primary form label,
  .obra-testimonials .owl-carousel p, .obra-primary input[type="email"],
  .obra-board-status .nav-tabs > li .board-tab-text,
  .obra-primary input[type="text"], .obra-primary input[type="password"], .device-features-info ul,
  .device-features-info ul li .obra-icon, .obra-testimonials.testimonials-style-three .owl-carousel p,
  .career-subtitle, .obra-switch, .obra-switch input[type="checkbox"]:checked + label .switch-label.left,
  .plan-info ul, .obra-glances, .glance-title, .portfolio-detail p, .portfolio-subtitle,
  .portfolio-detail-title, .portfolio-detail-wrap .portfolio-categories, .portfolio-detail-item,
  .subtitle-item-title, .full-width .obra-link, .job-location, .contact-info p span, textarea,
  .obra-text-page ul li span, .obra-text-page ol li span, .obra-text-page ul, .obra-text-page ol,
  .woocommerce ul.products li.product .price,
  .woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count,
  .woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
  .product_meta, .woocommerce .quantity .qty, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
  .woocommerce #reviews #comments ol.commentlist li time, .woocommerce table.shop_table th, .woocommerce table td,
  .woocommerce table.shop_table .cart-subtotal, .woocommerce table.shop_table .order-total,
  .woocommerce .cart_totals table.shop_table th, .woocommerce .nice-select,
  .woocommerce-error, .woocommerce-info, .woocommerce-message,
  .select2-container--default .select2-selection--single .select2-selection__rendered,
  .woocommerce ul.order_details li, .woocommerce .woocommerce-customer-details address,
  .woocommerce-MyAccount-content strong, .woocommerce-MyAccount-content p,
  .woocommerce-edit-address address {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  .obra-primary a, .obra-blog-detail .blog-meta .pull-left a,
  .nav-tabs > li > a, .panel-title a.collapsed, .obra-bitbucket-features .obra-link a, .service-title,
  .obra-blog-controls a i, .masonry-filters ul li a, .obra-link a, .obra-share-link, .obra-social a,
  .portfolio-controls a, .portfolio-detail-item a, .portfolio-detail-wrap .portfolio-categories a,
  .portfolio-subtitle a, .woocommerce div.product .woocommerce-tabs ul.tabs li a,
  .obra-share-product, .woocommerce-product-rating .woocommerce-review-link,
  .woocommerce .cart_totals .shipping-calculator-form a, .woocommerce .cart-collaterals a.shipping-calculator-button,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  .obra-primary a:hover, .obra-blog-detail .blog-meta .pull-left a:hover,
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus,
  .nav > li > a:hover, .nav > li > a:focus,
  .enterprise-wrap .nav-tabs > li.active > a, .enterprise-wrap .nav-tabs > li.active > a:hover,
  .enterprise-wrap .nav-tabs > li.active > a:focus, .obra-switch .switch-label.left,
  .obra-switch input[type="checkbox"]:checked + label .switch-label.right,
  .obra-bitbucket-features .obra-hover .obra-link a, .obra-blog-controls a:hover i,
  .masonry-filters ul li a.active, .obra-link a:hover, .obra-social a:hover,
  .portfolio-controls a:hover, .portfolio-detail-item a:hover,
  .portfolio-detail-wrap .portfolio-categories a:hover,
  .portfolio-subtitle a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.r-tabs-state-active a,
  .woocommerce-product-rating .woocommerce-review-link:hover,
  .woocommerce .cart-collaterals a.shipping-calculator-button:hover,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:focus,
  .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul .is-active a {color: {$body_link_hover_color};}

  .masonry-filters ul li a.active, .masonry-filters ul li a:hover {border-color: {$body_link_hover_color};}
  p a:after {background: {$body_link_hover_color};}
CSS;
}
// Sidebar
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .obra-secondary p, .obra-secondary .obra-widget,
  .obra-secondary .widget_rss .rssSummary,
  .obra-secondary .news-time, .obra-secondary .recentcomments,
  .obra-secondary input[type="text"], .obra-secondary .nice-select, .obra-secondary caption,
  .obra-secondary table td, .obra-secondary .obra-widget input[type="search"],
  .obra-secondary .woocommerce ul.product_list_widget .woocommerce-Price-amount {color: {$sidebar_content_color};}

  .obra-secondary .obra-widget ul li:before{background: {$sidebar_content_color};}
CSS;
}
$sidebar_links_color  = cs_get_customize_option( 'sidebar_links_color' );
if ($sidebar_links_color) {
echo <<<CSS
  .no-class {}
  .obra-secondary a,
  .obra-secondary .obra-widget ul li a
  {color: {$sidebar_links_color};}
CSS;
}
$sidebar_links_hover_color  = cs_get_customize_option( 'sidebar_links_hover_color' );
if ($sidebar_links_hover_color) {
echo <<<CSS
  .no-class {}
  .obra-secondary a:hover,
  .obra-secondary .obra-widget ul li a:hover
  {color: {$sidebar_links_hover_color};}
CSS;
}
$content_heading_color = cs_get_customize_option('content_heading_color');
if($content_heading_color) {
echo <<<CSS
  .no-class {}
  .obra-primary h1, .obra-primary h2, .obra-primary h3, .obra-primary h4, .obra-primary h5, .obra-primary h6,
  .obra-blog-share .blog-share-label, .author-info-title, .board-tab-title, .career-title,
  .clients-style-five .client-title, .portfolio-detail .portfolio-title,
  .woocommerce .related-product-title, .woocommerce .related.products h2, .woocommerce #reviews .comment-reply-title,
  .woocommerce legend
  {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color = cs_get_customize_option('sidebar_heading_color');
if($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .obra-secondary h1, .obra-secondary h2, .obra-secondary h3, .obra-secondary h4, .obra-secondary h5, .obra-secondary h6
  {color: {$sidebar_heading_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( $maintenance_mode_bg['image'] ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( $maintenance_mode_bg['repeat'] ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( $maintenance_mode_bg['position'] ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( $maintenance_mode_bg['attachment'] ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( $maintenance_mode_bg['size'] ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( $maintenance_mode_bg['color'] ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
} // If Condition

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$obira_breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '991';

echo <<<CSS
  .no-class {}
@media (max-width: {$obira_breakpoint}px) {
  .obra-header {
    position: relative;
  }
  .obra-nav {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: 45vh;
    background: #ffffff;
    overflow-y: auto;
    -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
  }
  .obra-nav .navigation-bar> ul {
    width: 750px;
    max-width: 100%;
    padding: 0 15px;
    margin: 0 auto;
    float: none;
  }
  .obra-nav .navigation-bar > ul > li {
    float: none;
  }
  .obra-nav .navigation-bar > ul > li > a {
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #e8e8e8;
  }
  .obra-nav .navigation-bar > ul > li:last-child > a {
    border-bottom: none;
  }
  .obra-nav .dropdown-nav {
    position: static;
    min-width: 100%;
    padding: 0 0 0 20px;
    -webkit-box-shadow: none;
    -ms-box-shadow: none;
    box-shadow: none;
  }
  .obra-nav .dropdown-nav > li > a {
    padding: 12px 0;
    border-bottom: 1px solid #e8e8e8;
  }

  .hav-mobile-logo img.default-logo.transparent-logo,
  .hav-mobile-logo .default-logo {
    display: none;
  }
  .hav-mobile-logo img.mobile-logo {
    display: block;
  }
  .hav-mobile-logo .text-logo {
    display: none;
  }
  .transparent-header .obra-nav .navigation-bar> ul > li > a {
    color: #aaaaaa;
  }
  .transparent-header .obra-nav .navigation-bar> ul > li > a:hover, .transparent-header .obra-nav .navigation-bar> ul > li > a:focus {
    color: #36bbf7;
  }
}
CSS;

  echo $obira_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'obira_custom_font_load' ) ) {
  function obira_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( $font_family ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( !( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( $font['ttf'] ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( $font['eot']  ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( $font['woff'] ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( $font['otf']  ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'obira_vt_custom_css' ) ) {
  function obira_vt_custom_css() {
    wp_enqueue_style('obira-default-style', get_template_directory_uri() . '/style.css');
    $output  = obira_custom_font_load();
    $output .= obira_dynamic_styles();
    $custom_css = obira_compress_css_lines( $output );

    wp_add_inline_style( 'obira-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'obira_vt_custom_js' ) ) {
  function obira_vt_custom_js() {
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'obira_vt_custom_js' );
}
