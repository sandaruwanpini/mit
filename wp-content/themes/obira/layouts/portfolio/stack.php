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
  $sidebar_position = $portfolio_meta['sidebar_position'];
  $sidebar_type = $portfolio_meta['sidebar_type'];
} else {
  $portfolio_sub_title = '';
  $portfolio_image = array();
  $link_txt = '';
  $text_link = '';
  $link_before_txt = '';
  $sidebar_position = '';
  $sidebar_type = '';
}
$obira_single_pagination = cs_get_option('portfolio_single_pagination');
if($sidebar_position === 'left') {
  $sidebar_cls = ' port-left-sidebar';
} else {
  $sidebar_cls = ' port-right-sidebar';
}
if($sidebar_type === 'sticky') {
  $sidebar_type_cls = ' obra-sticky-sidebar';
} elseif($sidebar_type === 'floating') {
  $sidebar_type_cls = ' obra-floating-sidebar';
} else {
  $sidebar_type_cls = '';
}

while( have_posts() ) : the_post(); ?>
<div class="portfolio-detail <?php echo esc_attr($sidebar_cls); ?>">
  <div class="row">
    <div class="col-md-8 obra-floating-parent">
      <div class="obra-masonry zoom-hover" data-items="1">

        <?php
        if ( $portfolio_image ) {
          foreach ($portfolio_image as $key => $img) {
          $image = wp_get_attachment_image_url( $img['image'], 'full', false );
          if ($image) {
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
        <div class="masonry-item branding-item" data-category="branding-item">
          <div class="portfolio-item">
            <div class="obra-image obra-popup">
              <a href="<?php echo esc_url( $largimage ); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr($obira_alt); ?>"></a>
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
    </div>
    <div class="col-md-4 <?php echo esc_attr($sidebar_type_cls); ?>">
      <div class="portfolio-detail-wrap">
        <h2 class="portfolio-title"><?php esc_attr(the_title()); ?></h2>
        <h5 class="portfolio-categories">
          <?php
            $taxonomy = 'portfolio_category';
            $terms = get_the_terms( $post->ID, 'portfolio_category' );
            if ( $terms ) :
              foreach ( $terms as $term ) { ?>
                  <span class="portfolio-category"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo esc_html($term->name); ?></a></span>
              <?php }
             endif;
          ?>
        </h5>
        <?php echo the_content(); ?>
        <?php obira_portfolio_information_meta('portfolio_single_metabox', 'portfolio_informations');
          if($link_txt) {
            if($text_link) {
              echo '<div class="obra-link"><a href="'.esc_url($text_link).'">'.esc_html($link_txt).'</a></div>';
            } else {
              echo '<div class="obra-link"><span>'.esc_html($link_txt).'</span></div>';
            }
          }
          if ( function_exists( 'obira_portfolio_share_option' ) ) {
            obira_portfolio_share_option();
          }
        ?>
      </div>
    </div>
  </div>
  <?php  if ($obira_single_pagination) { obira_portfolio_next_prev(); } ?>
</div>
<?php
endwhile;
