<?php
/*
 * The template for displaying all single portfolios.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Metabox
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
$obira_single_pagination = cs_get_option('portfolio_single_pagination');
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

$portfolio_meta  = get_post_meta( $obira_id, 'portfolio_single_metabox', true );
if ($portfolio_meta) {
	$portfolio_layout = $portfolio_meta['portfolio_single_layout'];
} else {
	$portfolio_layout = '';
}
get_header(); ?>
<div class="obra-mid-wrap obra-port-single mid-style-two <?php echo esc_attr($obira_content_padding); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
  <div class="container">
		<?php	get_template_part('layouts/portfolio/'.$portfolio_layout ); ?>
	</div>
</div>
<?php
get_footer();
