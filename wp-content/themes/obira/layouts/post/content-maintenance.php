<!DOCTYPE html>
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
wp_head();

// Metabox
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );

if ($obira_meta) {
  $obira_content_padding = $obira_meta['content_spacings'];
} else { $obira_content_padding = ''; }
// Padding - Metabox
if ($obira_content_padding && $obira_content_padding !== 'padding-none') {
  $obira_content_top_spacings = $obira_meta['content_top_spacings'];
  $obira_content_bottom_spacings = $obira_meta['content_bottom_spacings'];
  if ($obira_content_padding === 'padding-custom') {
    $obira_content_top_spacings = $obira_content_top_spacings ? 'padding-top:'. obira_check_px($obira_content_top_spacings) .';' : '';
    $obira_content_bottom_spacings = $obira_content_bottom_spacings ? 'padding-bottom:'. obira_check_px($obira_content_bottom_spacings) .';' : '';
    $obira_custom_padding = $obira_content_top_spacings . $obira_content_bottom_spacings;
  } else {
    $obira_custom_padding = '';
  }
} else {
  $obira_custom_padding = '';
}
?>
</head>

	<body <?php body_class(); ?>>
    <div class="vt-maintenance-mode">
      <div class="container <?php echo esc_attr($obira_content_padding); ?> obra-content-area" style="<?php echo esc_attr($obira_custom_padding); ?>">
     	<div class="row">
        <?php
          $obira_page = get_post( cs_get_option('maintenance_mode_page') );
          WPBMap::addAllMappedShortcodes();
          echo ( is_object( $obira_page ) ) ? do_shortcode( $obira_page->post_content ) : '';
        ?>
      </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
<?php
