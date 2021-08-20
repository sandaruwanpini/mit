<?php
/**
 * Single Post.
 */
$obira_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$obira_large_image = $obira_large_image[0];

$obira_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$obira_blog_style = cs_get_option('blog_listing_style');

// Single Theme Option
$obira_single_featured_image = cs_get_option('single_featured_image');
$obira_single_author_info = cs_get_option('single_author_info');
$obira_single_share_option = cs_get_option('single_share_option');

if ($obira_blog_style === 'style-two') {
	$obira_blog_style = ' blog-style-two ';
} else {
	$obira_blog_style = ' ';
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('obra-blog-post'); ?>>
  <div class="obra-unit-fix">
    <div class="obra-blog-detail">
      <?php
      if(!$obira_single_featured_image) {} else {
			if ($obira_large_image) {?>
			  <div class="blog-image">
			    <img src="<?php echo esc_url($obira_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
			  </div>
		  <?php } } ?> <!-- Obira - !$obira_single_featured_image -->
      <div class="blog-detail-wrap">
        <h5 class="blog-time"><?php echo get_the_date(); ?></h5> <!-- ObiraWP - Blog Single Title -->
        <?php
          the_content();
          echo obira_wp_link_pages();
          $tag_list = get_the_tags();
          if($tag_list) { ?>
            <div class="obra-sigltags_warp">
              <span><?php esc_html_e('Tags:', 'obira' ); ?></span>
              <p class="obra-sigl_tags">
                <?php echo the_tags( '', '', '' ); ?>
              </p>
            </div>
          <?php } ?>
      </div>
      <?php obira_post_metas();
      if ( function_exists( 'obira_wp_share_option' ) ) {
        if (!$obira_single_share_option) {} else { ?>
        <div class="obra-blog-meta">
          <?php obira_wp_share_option(); ?>
        </div>
      <?php } }
      if (!$obira_single_author_info) {} else {
        obira_author_info();
      }

      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'Prev Post', 'obira' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'Next Post', 'obira' );
      $prev_post = get_adjacent_post(false, '', true);
      $next_post = get_adjacent_post(false, '', false);
      if($prev_post || $next_post) { ?>
      <div class="obra-blog-controls">
        <?php
  		 		if($prev_post) {
          	echo '<div class="pull-left"><a href="' . esc_url(get_permalink($prev_post->ID)) . '"><i class="fa fa-angle-left" aria-hidden="true"></i> '.esc_html($older_post).'</a></div>';
          }
  				if($next_post) {
          	echo '<div class="pull-right"><a href="'. esc_url(get_permalink($next_post->ID)) .'">'.esc_html($newer_post).' <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>';
        	}
        ?>
      </div>
      <?php } // $prev_post && $next_post ?>
    </div>
  </div>
</div><!-- #post-## -->
<?php
