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
<div class="portfolio-detail full-width full-width-style-two port-center-slider">
  <div class="portfolio-detail-wrap">
    <h2 class="portfolio-title"><?php esc_attr(the_title()); ?></h2>
    <?php
    $informations = $portfolio_meta['portfolio_informations'];
    if ($informations) {
      $infos = $informations;
    } else {
      $infos = array();
    } ?>
      <h5 class="portfolio-subtitle">
        <?php
        foreach ( $infos as $key => $information ) {
          $meta_info = explode('<br>', nl2br($information['meta_info'], false));
          $meta_url = explode('<br>', nl2br($information['info_url'], false));

          if($information['info_url']) {
            $meta_i = count($meta_info);
            $meta_u = count($meta_url);
            if ($meta_i > $meta_u) {
              $meta_info = array_slice($meta_info, 0, count($meta_url));
            } elseif($meta_u > $meta_i) {
              $meta_url = array_slice($meta_url, 0, count($meta_info));
            } else {
              $meta_info = $meta_info;
              $meta_url = $meta_url;
            }
            $totlal_info = array_combine($meta_info, $meta_url);
            ?>
            <span class="subtitle-item">
              <span class="subtitle-item-title"><?php echo esc_html($information['title']); ?></span>
                <?php foreach ($totlal_info as $info => $url) {  ?>
                <span class="portfolio-service"><a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a></span>
                <?php } ?>
            </span>
          <?php } else { ?>
            <span class="subtitle-item">
              <span class="subtitle-item-title"><?php echo esc_html($information['title']); ?></span>
              <?php foreach ($meta_info as $key => $info) {
                echo trim($info);
              } ?>
            </span>
              <?php
          }
        } ?>
      </h5>
    <?php echo the_content();
    if($link_txt) {
      if($text_link) {
        echo '<div class="obra-link">'.esc_attr($link_before_txt).'<a href="'.esc_url($text_link).'">'.esc_html($link_txt).'</a></div>';
      } else {
        echo '<div class="obra-link">'.esc_attr($link_before_txt).'<span>'.esc_html($link_txt).'</span></div>';
      }
    } ?>
  </div>
  <div class="owl-carousel carousel-style-three" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-auto-height="true">
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
      ?>
      <div class="item">
        <div class="obra-image obra-popup">
          <a href="<?php echo esc_url( $largimage ); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr($obira_alt); ?>"></a>
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
