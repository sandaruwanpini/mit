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
$obira_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($obira_page_layout) {

	$obira_page_layout = $obira_page_layout['page_layout'];

	if ($obira_page_layout === 'extra-width') {
		$obira_column_class = 'extra-width';
		$obira_layout_class = 'container-fluid';
	} elseif($obira_page_layout === 'left-sidebar' || $obira_page_layout === 'right-sidebar') {
		$obira_column_class = 'col-md-9';
		$obira_layout_class = 'container';
	} else {
		$obira_column_class = 'col-md-12';
		$obira_layout_class = 'container';
	}

	// Page Layout Class
	if ($obira_page_layout === 'left-sidebar') {
		$obira_sidebar_class = 'left-sidebar';
	} elseif ($obira_page_layout === 'right-sidebar') {
		$obira_sidebar_class = 'right-sidebar';
	} elseif ($obira_page_layout === 'extra-width') {
		$obira_sidebar_class = 'obra-extra-width';
	} else {
		$obira_sidebar_class = 'obra-full-width';
	}
} else {
	$obira_column_class = 'col-md-12';
	$obira_layout_class = 'container';
	$obira_sidebar_class = 'obra-full-width';
}

get_header();  ?>

<div class="<?php echo esc_attr($obira_layout_class.' '.$obira_content_padding .' '. $obira_sidebar_class); ?> obra-page-wrap obra-content-area" style="<?php echo esc_attr($obira_custom_padding); ?>">
		<div class="row">
			<div class="obra-content-side obra-primary <?php echo esc_attr($obira_column_class); ?>">

				<?php
				 // echo '<pre>'. json_encode( get_option('_cs_options') ). '<pre>'; // ObiraWP - JSON File, json, Json.
					while ( have_posts() ) : the_post();
						the_content();
						echo obira_wp_link_pages();
						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;
					endwhile; // End of the loop.
				?>
			</div><!-- Content Area -->
			<?php
				if($obira_page_layout === 'right-sidebar' || $obira_page_layout === 'left-sidebar') {
					get_sidebar();
				}
			?>
	</div>
</div>

<?php
get_footer();
