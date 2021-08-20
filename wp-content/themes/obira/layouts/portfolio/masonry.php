<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

global $post;
// Metabox
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
$portfolio_meta  = get_post_meta( $obira_id, 'portfolio_single_metabox', true );
if ($portfolio_meta) {
  $portfolio_sub_title = $portfolio_meta['portfolio_sub_title'];
  $portfolio_image = $portfolio_meta['portfolio_single_images'];
  $link_txt = $portfolio_meta['link_txt'];
  $text_link = $portfolio_meta['text_link'];
  $link_before_txt = $portfolio_meta['link_before_txt'];
} else {
  $portfolio_sub_title = '';
  $portfolio_image = array();
  $link_txt = '';
  $text_link = '';
  $link_before_txt = '';
}
$obira_single_pagination = cs_get_option('portfolio_single_pagination');

while( have_posts() ) : the_post(); ?>
<div class="portfolio-detail full-width">
  <div class="portfolio-detail-wrap">
    <h2 class="portfolio-title"><?php esc_html(the_title()); ?></h2>
    <h5 class="portfolio-subtitle"><?php echo esc_html($portfolio_sub_title); ?></h5>
    <?php echo the_content();
    if($link_txt) {
      if($text_link) {
        echo '<div class="obra-link"><a href="'.esc_url($text_link).'">'.esc_html($link_txt).'</a></div>';
      } else {
        echo '<div class="obra-link"><span>'.esc_html($link_txt).'</span></div>';
      }
    } ?>
  </div>
  <div class="obra-masonry zoom-hover" data-items="2">
    <?php
    if ( $portfolio_image ) {
      foreach ($portfolio_image as $key => $img) {
      $image = wp_get_attachment_image_url( $img['image'], 'full', false );
      if ( $image ) {
        $image = $image;
      } else {
        $image = OBIRA_IMAGES.'/grid-placeholder.jpg';
      }
      $obira_alt = get_post_meta($img['image'], '_wp_attachment_image_alt', true);
      $image_media_link = get_post_meta($img['image'], '_image_media_link', true);
      if ( $image_media_link ) {
        $largimage = $image_media_link;
      } else {
        $largimage = $image;
      }
      if($img['item_width'] === 'double-width-height') {
        $width_cls = '';
      } elseif($img['item_width'] === 'double-height') {
        $width_cls = ' two-fifths';
      } else {
        $width_cls = ' three-fifths';
      }
    ?>
    <div class="masonry-item <?php echo esc_attr($width_cls); ?>">
      <div class="portfolio-item">
        <div class="obra-image obra-popup">
          <a href="<?php echo esc_url( $largimage ); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr($obira_alt); ?>"></a>
            <?php if($img['title']) { ?>
              <div class="portfolio-label"><?php echo esc_html($img['title']); ?></div>
            <?php } ?>
        </div>
      </div>
    </div>
    <?php } } ?>
  </div>
  <div class="text-center">
    <?php
      if ( function_exists( 'obira_portfolio_share_option' ) ) {
        obira_portfolio_share_option();
      }
    ?>
  </div>
  <?php  if ($obira_single_pagination) { obira_portfolio_next_prev(); } ?>
</div>

<?php
endwhile;
