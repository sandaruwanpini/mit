<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(OBIRA_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$obira_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($obira_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($obira_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$obira_id    = ( $post ) ? $post->ID : false;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $obira_id : false;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );

// Parallax
$obira_bg_parallax = cs_get_option('theme_bg_parallax');
$obira_hav_parallax = $obira_bg_parallax ? ' parallax-window' : '';
$obira_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$obira_bg_parallax_speed = $obira_parallax_speed ? $obira_parallax_speed : '0.4';

// Theme Layout Width
$obira_bg_overlay_color  = cs_get_option( 'theme_bg_overlay_color' );
$obira_layout_width  = cs_get_option( 'theme_layout_width' );
$obira_layout_width_class = ($obira_layout_width === 'container') ? 'layout-boxed'. $obira_hav_parallax : 'layout-full';

if ($obira_meta) {
  $obira_hide_header  = $obira_meta['hide_header'];
  $obira_sticky_header  = $obira_meta['sticky_header'];
  $obira_search_icon    = $obira_meta['search_icon'];
  $obira_cart_widget = $obira_meta['cart_widget'];
  $obira_header_btns = $obira_meta['header_btns'];
  $left_menu = $obira_meta['left_menu'];
  $one_page_menu = $obira_meta['one_page_menu'];
} else {
  $obira_hide_header  = '';
  $obira_sticky_header  = cs_get_option('sticky_header');
  $obira_search_icon    = cs_get_option('search_icon');
  $obira_cart_widget = cs_get_option('cart_widget');
  $obira_header_btns = cs_get_option('header_btns');
  $left_menu = '';
  $one_page_menu = '';
}
$obira_header_btns = $obira_header_btns ? $obira_header_btns : cs_get_option('header_btns');
  // Sticky Header
  if ($obira_meta && $obira_sticky_header != 'default') {
    $obira_sticky_header  = $obira_meta['sticky_header'];
  } else {
    $obira_sticky_header  = cs_get_option('sticky_header');
  }
  if($obira_sticky_header === 'not-sticky') {
    $obira_sticky_header_class = ' ';
  } else {
    $obira_sticky_header_class = ' obra-header-sticky';
  }

  // Search Icon
  if ($obira_meta && $obira_search_icon != 'default') {
    $obira_search_icon  = $obira_meta['search_icon'];
  } else {
    $obira_search_icon  = cs_get_option('search_icon');
  }

  // Cart Widget
  if ($obira_meta && $obira_cart_widget != 'default') {
    $obira_cart_widget  = $obira_meta['cart_widget'];
  } else {
    $obira_cart_widget  = cs_get_option('cart_widget');
  }

  $sticky_footer = cs_get_option('sticky_footer');
  if($sticky_footer){
    $sticky_footer_class = ' sticky-footer';
  } else {
    $sticky_footer_class = '';
  }

  // Header Transparent
  if ($obira_meta) {
    $obira_transparent_header = $obira_meta['transparency_header'];
    // Shortcode Banner Type
    $obira_banner_type = ' '. $obira_meta['banner_type'];
  } else {
    $obira_transparent_header = cs_get_option('transparency_header');
    $obira_banner_type = '';
  }
  // Header Transparent
  if ($obira_meta && $obira_transparent_header != 'default') {
    $obira_transparent_header  = $obira_meta['transparency_header'];
  } else {
    $obira_transparent_header  = cs_get_option('transparency_header');
  }

  if($obira_transparent_header === 'transparent') {
    $obira_transparent_header_cls = ' transparent-header';
  } else {
    $obira_transparent_header_cls = ' dont-transparent';
  }

  if($left_menu) {
    $menu_align_cls = ' header-style-two';
  } else {
    $menu_align_cls = '';
  }

  // One Page Menu
  if($one_page_menu) {
    $parallax_menu_class = ' obra-parallax-scroll';
  } else {
    $parallax_menu_class = '';
  }

wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php
if ($obira_bg_parallax) { ?>
  <div class="<?php echo esc_attr($obira_layout_width_class); ?>" data-stellar-background-ratio="<?php echo esc_attr($obira_bg_parallax_speed); ?>">
<?php } else {?>
  <div class="<?php echo esc_attr($obira_layout_width_class. $obira_transparent_header_cls); ?>">
<?php }

if($obira_bg_overlay_color) { ?>
<div class="layout-overlay" style="background-color: <?php echo esc_attr($obira_bg_overlay_color); ?>;"></div>
<?php } ?>

<div id="vtheme-wrapper"> <!-- #vtheme-wrapper -->
<div class="obra-main-wrap <?php echo esc_attr($obira_transparent_header_cls .$sticky_footer_class .$menu_align_cls); ?>">
  <!-- Obra Main Wrap Inner -->
  <div class="main-wrap-inner">
  <?php if($obira_hide_header) {} else { ?>
    <header class="obra-header <?php echo esc_attr($obira_banner_type . $obira_sticky_header_class .$parallax_menu_class); ?>">
      <div class="container">
        <?php
          // Brand Logo
          get_template_part( 'layouts/header/logo' );
        ?>
        <div class="obra-header-right">
          <?php get_template_part( 'layouts/header/menu', 'bar' );
          if($obira_cart_widget !== 'hide' || $obira_search_icon !== 'hide'){ ?>
          <div class="header-links-wrap">
          <?php
            if($obira_cart_widget !== 'hide'){
              get_template_part( 'layouts/header/header', 'cart' );
            }
            if($obira_search_icon !== 'hide'){
              get_template_part( 'layouts/header/header', 'search' );
            }
          ?>
          </div>
          <?php } if($obira_header_btns) { ?>
            <div class="header-buttons">
              <?php echo do_shortcode($obira_header_btns); ?>
            </div>
          <?php } ?>
          <div class="obra-toggle">
            <a href="javascript:void(0);" class="obra-toggle-link"><span class="toggle-separator"></span></a>
          </div>
        </div>
      </div>
    </header>
    <?php } ?>
  <!-- Header -->

  <?php
  // Title Area
  $obira_need_title_bar = cs_get_option('need_title_bar');
  if(!is_404()){
    if ($obira_need_title_bar) {
      get_template_part( 'layouts/header/title', 'bar' );
    }
  }
