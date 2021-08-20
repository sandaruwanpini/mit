<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

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

// Page Layout Options
$obira_woo_columns = cs_get_option('woo_product_columns');
$obira_woo_sidebar = cs_get_option('woo_sidebar_position');

$obira_woo_columns = $obira_woo_columns ? $obira_woo_columns : '4';

if ($obira_woo_sidebar === 'left-sidebar') {
	$obira_column_class = 'col-md-9';
	$obira_sidebar_class = ' left-sidebar';
} elseif ($obira_woo_sidebar === 'right-sidebar') {
	$obira_column_class = 'col-md-9';
	$obira_sidebar_class = ' right-sidebar';
} else {
	$obira_column_class = 'col-md-12';
	$obira_sidebar_class = ' obra-hide-sidebar';
}

get_header();
?>
<div class="obra-mid-wrap <?php echo esc_attr($obira_content_padding . $obira_sidebar_class); ?> woo-col-<?php echo esc_attr($obira_woo_columns); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
  <div class="woocommerce woocommerce-page">
    <div class="container">
			<div class="row">
				<div class="obra-primary <?php echo esc_attr($obira_column_class); ?>">
					<?php
					if ( have_posts() ) :
						woocommerce_content();
					endif; // End of the loop.
					?>
				</div>
				<?php
					// Right Sidebar
					if($obira_woo_sidebar == 'left-sidebar' || $obira_woo_sidebar == 'right-sidebar') {
						get_sidebar('shop');
					}
				?>
			</div><!-- Content Area -->
		</div>
	</div>
</div>

<?php
get_footer();
