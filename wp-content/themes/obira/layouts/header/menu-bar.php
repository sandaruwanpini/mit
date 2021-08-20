<?php
// Metabox
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $obira_id : false;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$obira_breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '991';

if ($obira_meta) {
  $hide_menu = $obira_meta['hide_menu'];
} else {
  $hide_menu = '';
}

// Navigation & Search
if($hide_menu) {} else { ?>
<nav class="obra-nav" data-nav="<?php echo esc_attr($obira_breakpoint); ?>">
<?php
  if ($obira_meta) {
    $obira_choose_menu = $obira_meta['choose_menu'];
  } else { $obira_choose_menu = ''; }
  $obira_choose_menu = $obira_choose_menu ? $obira_choose_menu : '';

  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navigation-bar',
      'container_id'      => '',
      'menu'              => $obira_choose_menu,
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'obira_wp_bootstrap_navwalker::fallback',
      'walker'            => new obira_wp_bootstrap_navwalker()
    )
  );
  ?>
</nav>
<?php }
