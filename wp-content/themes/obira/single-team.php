<?php
/*
 * The template for displaying all single team.
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
// Padding - Theme Options
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
	$obira_top_spacing = cs_get_option('team_top_spacing');
	$obira_bottom_spacing = cs_get_option('team_bottom_spacing');
	if ($obira_top_spacing || $obira_bottom_spacing) {
		$obira_top_spacing = $obira_top_spacing ? 'padding-top:'. obira_check_px($obira_top_spacing) .';' : '';
		$obira_bottom_spacing = $obira_bottom_spacing ? 'padding-bottom:'. obira_check_px($obira_bottom_spacing) .';' : '';
		$obira_custom_padding = $obira_top_spacing . $obira_bottom_spacing;
	} else {
		$obira_custom_padding = '';
	}
}

// Sidebar Position
$obira_layout_class = 'col-lg-12 no-padding';
$obira_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$obira_large_image = $obira_large_image[0];
$team_options = get_post_meta( get_the_ID(), 'team_options', true );
if($team_options) {
  $team_job_position = $team_options['team_job_position'];
  $team_socials = $team_options['team_socials'];
  $team_link = $team_options['team_custom_link'];
  if($team_options['single_featured_image']) {
    $single_team_img = wp_get_attachment_image_url( $team_options['single_featured_image'], 'fullsize', true );
  } else {
    $single_team_img = $obira_large_image;
  }
} else {
  $team_job_position = '';
  $team_socials = '';
  $team_link = '';
  $single_team_img = $obira_large_image;
}
if ($team_link) {
  $team_url = $team_link;
} else {
  $team_url = get_the_permalink();
}
?>

<div class="container obra-content-area <?php echo esc_attr($obira_content_padding); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
	<div class="row">
		<div class="<?php echo esc_attr($obira_layout_class); ?> sngl-team-cnt">
			<div class="obra-team-sngl-content">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
						?>
						<div class="col-md-12">
							<div class="col-md-5">
								<div class="obra-image">
	                <img src="<?php echo esc_url( $single_team_img ); ?>" alt="<?php esc_attr_e('Single Team', 'obira'); ?>">
	              </div>
	            </div>
	            <div class="col-md-7">
	              <div class="mate-info">
	                <h4 class="mate-name"><a href="<?php echo esc_url( $team_url ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
	                <?php
	                if ($team_job_position) {
	                  echo '<h5 class="mate-designation">'.esc_html($team_job_position).'</h5>';
	                } ?>
	                <p class=team-content>
	                	<?php echo esc_html(the_excerpt()); ?>
	                </p>	
	                <div class="obra-social">
	                <?php if($team_socials) { ?>
	                  <div class="obra-table-wrap">
	                    <div class="obra-align-wrap bottom">
	                      <?php foreach ($team_socials as $key => $icon) : ?>
	                        <a href="<?php echo esc_url($icon['team_social_link']); ?>">
	                          <i class="<?php echo esc_attr($icon['team_social_icon']); ?>"></i>
	                        </a>
	                      <?php endforeach; ?>
	                    </div>
	                  </div>
	                <?php } ?>
	                </div>
	              </div>
            	</div>
            </div>
            <div class="col-md-12">
          		<?php	the_content(); ?>
						</div>
						<?php
							endwhile;
							endif;
						?>
			</div><!-- Blog Div -->
			<?php
	    wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->
	</div>
</div>

<?php
get_footer();
