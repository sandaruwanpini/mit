<?php
/*
 * The template for displaying search results pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

get_header();

// Theme Options
$obira_blog_style = cs_get_option('blog_listing_style');
$obira_blog_columns = cs_get_option('blog_listing_columns');
$obira_sidebar_position = cs_get_option('blog_sidebar_position');

// Columns
if ($obira_blog_style === 'style-two') {
	$obira_blog_columns = $obira_blog_columns ? $obira_blog_columns : 'obra-blog-col-2';
} else {
	$obira_blog_columns = 'obra-blog-col-1';
}

// Style
if ($obira_blog_style === 'style-two') {
	$obira_blog_style = ' obra-blog-one ';
} else {
	$obira_blog_style = ' obra-blog-one obra-blog-list ';
}

// Sidebar Position
if ($obira_sidebar_position === 'sidebar-hide') {
	$obira_layout_class = 'col-md-12';
	$obira_sidebar_class = 'obra-hide-sidebar';
} elseif ($obira_sidebar_position === 'sidebar-left') {
	$obira_layout_class = 'col-md-8';
	$obira_sidebar_class = 'obra-left-sidebar';
} else {
	$obira_layout_class = 'col-md-8';
	$obira_sidebar_class = 'obra-right-sidebar';
}
?>
<div class="container obra-content-area <?php echo esc_attr($obira_sidebar_class); ?>">
	<div class="row">
		<?php
			if ($obira_sidebar_position === 'sidebar-left' && $obira_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
		?>
		<div class="obra-content-side <?php echo esc_attr($obira_layout_class); ?>">
			<div class="<?php echo esc_attr($obira_blog_style) .' '. esc_attr($obira_blog_columns); ?>">
				<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'layouts/post/content' );
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif; 
				?>
			</div><!-- Blog Div -->
			<div class="obra-pagination">
				<?php
			    obira_paging_nav();
				?>
			</div>
			<?php  wp_reset_postdata();  // avoid errors further down the page ?>
		</div><!-- Content Area -->
		<?php
			if ($obira_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
		?>
	</div>
</div>
<?php
get_footer();
