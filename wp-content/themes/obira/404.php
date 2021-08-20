<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$obira_error_heading = cs_get_option('error_heading');
$obira_error_page_content = cs_get_option('error_page_content');
$obira_error_page_bg = cs_get_option('error_page_bg');
$obira_error_page_bg_image = cs_get_option('error_page_bg_image');
$obira_error_btn_text = cs_get_option('error_btn_text');

$error_image_url = wp_get_attachment_url( $obira_error_page_bg_image );
$error_bg_image = $error_image_url ? 'style="background-image: url('.$error_image_url.');"' : '';
$obira_error_heading = ( $obira_error_heading ) ? $obira_error_heading : esc_html__( '404 - Page Not Found', 'obira' );
$obira_error_page_content = ( $obira_error_page_content ) ? $obira_error_page_content : esc_html__( "The page you were looking for doesn't appear to exist.", 'obira' );
$obira_error_page_bg = ( $obira_error_page_bg ) ? wp_get_attachment_url($obira_error_page_bg) : OBIRA_IMAGES . '/icons/icon37@2x.png';
$obira_error_btn_text = ( $obira_error_btn_text ) ? $obira_error_btn_text : esc_html__( 'Go back to home page', 'obira' );

get_header(); ?>
<!-- Content -->
<div class="obra-404-error" <?php echo $error_bg_image; ?>>
  <div class="obra-table-wrap">
    <div class="obra-align-wrap">
      <div class="container">
        <div class="obra-icon">
          <img src="<?php echo esc_url($obira_error_page_bg); ?>" alt="<?php esc_attr_e('404 - Page Not Found', 'obira'); ?>" width="39">
        </div>
        <h2 class="error-title"><?php echo esc_html($obira_error_heading); ?></h2>
        <p><?php echo esc_html($obira_error_page_content); ?></p>
        <div class="obra-btns-wrap"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="obra-btn"><?php echo esc_html($obira_error_btn_text); ?></a></div>
      </div>
    </div>
  </div>
</div>
<!-- Content -->

<?php
get_footer();
