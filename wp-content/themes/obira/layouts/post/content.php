<?php
/**
 * Template part for displaying posts.
 */
$obira_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$obira_large_image = $obira_large_image[0];

$obira_read_more_text = cs_get_option('read_more_text');
$obira_read_text = $obira_read_more_text ? $obira_read_more_text : esc_html__( 'Read More', 'obira' );
$obira_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$obira_blog_style = cs_get_option('blog_listing_style');
$obira_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$blog_excerpt = cs_get_option('theme_blog_excerpt');
if(is_sticky()){
  $sticky_cls = ' tag-sticky';
} else {
  $sticky_cls = '';
}

// Columns
$obira_blog_columns = cs_get_option('blog_listing_columns');
if ($obira_blog_style === 'style-two') {
	$blog_excerpt = $blog_excerpt ? $blog_excerpt : '12';
	$obira_blog_columns = $obira_blog_columns ? $obira_blog_columns : 'col-md-6 col-sm-6';
} else {
	$obira_blog_columns = 'obra-blog-col-1';
	$blog_excerpt = $blog_excerpt ? $blog_excerpt : '55';
}
$metas_hide = (array) cs_get_option( 'theme_metas_hide' );
if ($obira_blog_style === 'style-two') {
?>

<div class="obra-item <?php echo esc_attr($obira_blog_columns); ?>">
<?php } ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(' blog-item '.esc_attr($sticky_cls).''); ?>>
		<?php
			if ($obira_large_image) {?>
			  <div class="obra-image">
			    <img src="<?php echo esc_url($obira_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
			  </div>
		  <?php } ?>
		  <div class="blog-info">
		    <div class="blog-info-wrap">
		    <?php if ( !in_array( 'date', $metas_hide ) ) { // Category Hide ?>
		      <h5 class="blog-time"><?php echo get_the_date(); ?></h5>
		    <?php } ?>
		      <h2 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
		      <?php
						echo '<div class="obra-blog-excerpt">';
	          obira_excerpt($blog_excerpt);
	          echo '</div>';
						echo obira_wp_link_pages();
					?>
		      <div class="obra-link">
			      <a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php echo esc_html($obira_read_text); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>
		      </div>
		    </div>
		    <?php
			    if ($obira_blog_style !== 'style-two') {
			    	obira_post_metas();
			  	}
		    ?>
		  </div>
	</div>
<?php	if ($obira_blog_style === 'style-two') { ?>
	</div>
<?php }
