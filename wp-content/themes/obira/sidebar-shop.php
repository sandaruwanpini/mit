<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$obira_woo_widget = cs_get_option('woo_widget');
$obira_sidebar_type = cs_get_option('woo_sidebar_type');
	if ($obira_sidebar_type) {
	  $sidebar_type_cls = ' obra-floating-sidebar';
	} else {
		$sidebar_type_cls = '';
	}
?>
<div class="col-md-3 obra-secondary secondary-spacer-one <?php echo esc_attr($sidebar_type_cls); ?>">
	<?php if ($obira_woo_widget) {
		if (is_active_sidebar($obira_woo_widget)) {
			dynamic_sidebar($obira_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-shop' )) {
			dynamic_sidebar( 'sidebar-shop' );
		}
	} ?>
</div><!-- #secondary -->
<?php
