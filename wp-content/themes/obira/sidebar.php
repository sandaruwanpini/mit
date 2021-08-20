<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$obira_blog_widget = cs_get_option('blog_widget');
$obira_single_blog_widget = cs_get_option('single_blog_widget');
$obira_team_widget = cs_get_option('team_widget');

if (is_page()) {
	// Page Layout Options
	$obira_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
}
?>

<div class="col-md-3 obra-secondary">
	<?php if (is_page() && $obira_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($obira_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($obira_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $obira_blog_widget && !$obira_single_blog_widget) {
		if (is_active_sidebar($obira_blog_widget)) {
			dynamic_sidebar($obira_blog_widget);
		}
	} elseif ($obira_team_widget && is_singular('team')) {
		if (is_active_sidebar($obira_team_widget)) {
			dynamic_sidebar($obira_team_widget);
		}
	} elseif (is_single() && $obira_single_blog_widget) {
		if (is_active_sidebar($obira_single_blog_widget)) {
			dynamic_sidebar($obira_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
<?php
