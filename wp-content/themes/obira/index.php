<?php
/*
 * The main template file.
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
$obira_blog_style = cs_get_option('blog_listing_style');
$obira_sidebar_position = cs_get_option('blog_sidebar_position');
$obira_pagi_style = cs_get_option('blog_pagination_style');
$blog_load_btn_type = cs_get_option('blog_load_btn_type');
$obira_load_more = cs_get_option('blog_load_more_btn_txt');
$obira_loader_icon = cs_get_option('blog_loader_icon_option');

$obira_pagi_style = $obira_pagi_style ? $obira_pagi_style : 'navigation';

$obira_load_more = ( $obira_load_more ) ? $obira_load_more : esc_html__( 'Load More', 'obira' );

// Style
if ($obira_blog_style !== 'style-two') {
	$obira_blog_style = ' blog-style-two ';
	$paging_item_select = ' .blog-item';
} else {
	$obira_blog_style = ' blog-style-one';
	$paging_item_select = ' .obra-item';
}

// Sidebar Position
if ($obira_sidebar_position === 'sidebar-hide') {
	$layout_class = 'col-md-12';
	$obira_sidebar_class = 'obra-hide-sidebar';
} elseif ($obira_sidebar_position === 'sidebar-left') {
	$layout_class = 'col-md-9';
	$obira_sidebar_class = 'left-sidebar';
} else {
	$layout_class = 'col-md-9';
	$obira_sidebar_class = 'right-sidebar';
}
?>
<div class="obra-mid-wrap mid-no-spacer <?php echo esc_attr($obira_content_padding .' '. $obira_sidebar_class); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
  <div class="container">

    <div class="row">
      <div class="obra-primary blogs-wrap <?php echo esc_attr($layout_class .$obira_blog_style); ?>">
        <div class="blog-items-wrap obra-post-load-more load-posts <?php echo esc_attr($obira_blog_style); ?>" data-select=".blog-items-wrap" data-item="<?php echo esc_attr($paging_item_select); ?>" data-space="20" data-paging="<?php echo esc_attr($obira_pagi_style); ?>" data-button="<?php echo esc_attr($blog_load_btn_type); ?>" data-loading="<?php echo esc_attr($obira_load_more); ?>" data-iconn="<?php echo esc_attr($obira_loader_icon); ?>">
            <div class="ventre-blog-items">
            	<?php

							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();
									get_template_part( 'layouts/post/content' );
								endwhile;
							else :
								get_template_part( 'layouts/post/content', 'none' );
							endif; ?>
            </div>
						<div class="obra-pagination">
							<?php obira_paging_nav(); ?>
						</div>
				</div><!-- Blog Div -->
				<?php
			    wp_reset_postdata();  // avoid errors further down the page
				?>
      </div>
      <?php
				if ($obira_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
    </div>
  </div>
</div>

<?php
get_footer();
