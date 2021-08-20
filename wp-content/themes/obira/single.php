<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

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

// Theme Options
$obira_sidebar_position = cs_get_option('single_sidebar_position');

// Sidebar Position
if ($obira_sidebar_position === 'sidebar-hide') {
	$obira_layout_class = 'col-md-12 blog-detail-style-two';
	$obira_sidebar_class = 'obra-hide-sidebar';
} elseif ($obira_sidebar_position === 'sidebar-left') {
	$obira_layout_class = 'col-md-9';
	$obira_sidebar_class = 'left-sidebar';
} else {
	$obira_layout_class = 'col-md-9';
	$obira_sidebar_class = 'right-sidebar';
}
?>
<div class="obra-mid-wrap <?php echo esc_attr($obira_content_padding .' '. $obira_sidebar_class); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
	<div class="container">
	  <div class="row">
		  <div class="obra-primary <?php echo esc_attr($obira_layout_class); ?>">
				<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'layouts/post/content', 'single' );
							if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif;
				?>
			</div><!-- Blog Div -->
			<?php
			  obira_paging_nav();
			  wp_reset_postdata();  // avoid errors further down the page
			?>
			<?php
				if ($obira_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
		</div><!-- Content Area -->
	</div>
</div>

<?php
get_footer();
