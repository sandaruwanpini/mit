<?php
// Metabox
global $post;
$obira_id    = ( $post ) ? $post->ID : false;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $obira_id : false;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
if ($obira_meta) {
  $obira_topbar_options = $obira_meta['topbar_options'];
} else {
  $obira_topbar_options = '';
}
// Define Theme Options and Metabox varials in right way!
if ($obira_meta) {
  if ($obira_topbar_options === 'custom' && $obira_topbar_options !== 'default') {
    $obira_top_left           = $obira_meta['top_left'];
    $obira_top_right          = $obira_meta['top_right'];
    $obira_topbar_left_width  = $obira_meta['topbar_left_width'];
    $obira_topbar_right_width = $obira_meta['topbar_right_width'];
    $obira_left_width         = $obira_topbar_left_width ? 'width:'. $obira_topbar_left_width .';' : '';
    $obira_right_width        = $obira_topbar_right_width ? 'width:'. $obira_topbar_right_width .';' : '';
    $obira_hide_topbar        = $obira_topbar_options;
    $obira_topbar_bg          = $obira_meta['topbar_bg'];
    if ($obira_topbar_bg) {
      $obira_topbar_bg = 'background-color: '. $obira_topbar_bg .';';
    } else {$obira_topbar_bg = '';}
  } else {
    $obira_top_left           = cs_get_option('top_left');
    $obira_top_right          = cs_get_option('top_right');
    $obira_topbar_left_width  = cs_get_option('topbar_left_width');
    $obira_topbar_right_width = cs_get_option('topbar_right_width');
    $obira_left_width         = $obira_topbar_left_width ? 'width:'. $obira_topbar_left_width .';' : '';
    $obira_right_width        = $obira_topbar_right_width ? 'width:'. $obira_topbar_right_width .';' : '';
    $obira_hide_topbar        = cs_get_option('top_bar');
    $obira_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $obira_top_left           = cs_get_option('top_left');
  $obira_top_right          = cs_get_option('top_right');
  $obira_topbar_left_width  = cs_get_option('topbar_left_width');
  $obira_topbar_right_width = cs_get_option('topbar_right_width');
  $obira_left_width         = $obira_topbar_left_width ? 'width:'. $obira_topbar_left_width .';' : '';
  $obira_right_width        = $obira_topbar_right_width ? 'width:'. $obira_topbar_right_width .';' : '';
  $obira_hide_topbar        = cs_get_option('top_bar');
  $obira_topbar_bg          = '';
}
// All options
if ($obira_meta && $obira_topbar_options === 'custom' && $obira_topbar_options !== 'default') {
  $obira_top_left = ( $obira_top_left ) ? $obira_meta['top_left'] : cs_get_option('top_left');
  $obira_top_right = ( $obira_top_right ) ? $obira_meta['top_right'] : cs_get_option('top_right');
} else {
  $obira_top_left = cs_get_option('top_left');
  $obira_top_right = cs_get_option('top_right');
}
if ($obira_meta && $obira_topbar_options !== 'default') {
  if ($obira_topbar_options === 'hide_topbar') {
    $obira_hide_topbar = 'hide';
  } else {
    $obira_hide_topbar = 'show';
  }
} else {
  $obira_hide_topbar_check = cs_get_option('top_bar');
  if ($obira_hide_topbar_check === true ) {
    $obira_hide_topbar = 'hide';
  } else {
    $obira_hide_topbar = 'show';
  }
}
if ($obira_meta) {
  $obira_topbar_bg = ( $obira_topbar_bg ) ? $obira_meta['topbar_bg'] : '';
} else {
  $obira_topbar_bg = '';
}

if ($obira_topbar_bg) {
  $obira_topbar_bg = 'background-color: '. $obira_topbar_bg .';';
} else {$obira_topbar_bg = '';}

$obira_topbar_left_width = ( $obira_topbar_left_width ) ? $obira_meta['topbar_left_width'] : cs_get_option('topbar_left_width');
$obira_topbar_right_width = ( $obira_topbar_right_width ) ? $obira_meta['topbar_right_width'] : cs_get_option('topbar_right_width');
$obira_left_width   = $obira_topbar_left_width ? 'width:'. $obira_topbar_left_width .';' : '';
$obira_right_width  = $obira_topbar_right_width ? 'width:'. $obira_topbar_right_width .';' : '';

if($obira_hide_topbar === 'show') {
?>
<div class="obra-topbar" style="<?php echo esc_attr($obira_topbar_bg); ?>">
  <div class="container">
    <div class="row">
      <div class="obra-topbar-left" style="<?php echo esc_attr($obira_left_width); ?>">
        <?php echo do_shortcode($obira_top_left); ?>
      </div> <!-- obra-topbar-left -->
      <div class="obra-topbar-right" style="<?php echo esc_attr($obira_right_width); ?>">
        <?php echo do_shortcode($obira_top_right); ?>
      </div> <!-- obra-topbar-right -->
    </div>
  </div>
</div>
<?php } // Hide Topbar - From Metabox
