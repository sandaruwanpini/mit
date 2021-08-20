<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$item_css = $content_css = $heading_css ='';

extract( shortcode_atts( array(
	'style' => 'style-1',
	'thumb' => 'featured-image',
	'image_crop' => 'related',
	'alignment' => '',
	'content_padding' => '',
	'content_background' => '#f7f7f7',
	'link_text' => 'Read more',
	'column'		=> '3c',
	'column2'		=> '2c',
	'column3'		=> '1c',
	'items'		=> '3',
	'gap'		=> '30',
	'auto_scroll' => 'false',
	'show_bullets' => '',
	'show_arrows' => '',
	'bullet_between' => '50',
	'arrow_position' => 'center',
    'arrow_offset' => 'center',
    'arrow_offset_v' => '0',
    'arrow_offset_s' => '50',
	'cat_slug' => '',
	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_color' => '',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'heading_top_margin' => '',
	'heading_bottom_margin' => ''
), $atts ) );

$gap = intval( $gap );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );

$heading_line_height = intval( $heading_line_height );
$heading_font_size = intval( $heading_font_size );
$heading_top_margin = intval( $heading_top_margin );
$heading_bottom_margin = intval( $heading_bottom_margin );

if ( empty( $items ) ) return;

$cls = $style .' '. $alignment .' arrow-'. $arrow_position .' offset'. $arrow_offset .' offset-v'. $arrow_offset_v;
if ( $show_bullets ) $cls .= ' has-bullets'; 
if ( $show_arrows ) $cls .= ' has-arrows';
if ( $arrow_offset_s ) $cls .= ' arrow'.$arrow_offset_s;

if ( $content_padding ) $content_css .= 'padding:'. $content_padding .';';
if ( $content_background ) $item_css .= 'background-color:'. $content_background .';';

if ( $bullet_between == '45' ) $cls .= ' bullet45';
if ( $bullet_between == '40' ) $cls .= ' bullet40';
if ( $bullet_between == '35' ) $cls .= ' bullet35';
if ( $bullet_between == '30' ) $cls .= ' bullet30';
if ( $bullet_between == '25' ) $cls .= ' bullet25';
if ( $bullet_between == '20' ) $cls .= ' bullet20';
if ( $bullet_between == '15' ) $cls .= ' bullet15';
if ( $bullet_between == '10' ) $cls .= ' bullet10';

if ( $heading_font_weight != 'Default' ) $heading_css .= 'font-weight:'. $heading_font_weight .';';
if ( $heading_color ) $heading_css .= 'color:'. $heading_color .';';
if ( $heading_font_size ) $heading_css .= 'font-size:'. $heading_font_size .'px;';
if ( $heading_line_height ) $heading_css .= 'line-height:'. $heading_line_height .'px;';
if ( $heading_top_margin ) $heading_css .= 'margin-top:'. $heading_top_margin .'px;';
if ( $heading_bottom_margin ) $heading_css .= 'margin-bottom:'. $heading_bottom_margin .'px;';
if ( $heading_font_family != 'Default' ) {
	ambersix_enqueue_google_font( $heading_font_family );
	$heading_css .= 'font-family:'. $heading_font_family .';';
}

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) )
	$query_args['category_name'] = $cat_slug;

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { return; }
ob_start(); ?>

<div class="ambersix-news <?php echo esc_attr( $cls ); ?>" data-auto="<?php echo esc_attr( $auto_scroll ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-gap="<?php echo esc_html( $gap ); ?>">
<?php if ( $query->have_posts() ) : ?>
	<?php wp_enqueue_script( 'ambersix-owlcarousel' ); ?>

	<div class="owl-carousel owl-theme">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<div class="news-item clearfix">
			<div class="inner" style="<?php echo esc_attr( $item_css ); ?>">
				<div class="thumb-wrap">
					<?php
					$img_size = $title_html = $meta_html = '';
					if ( $image_crop == 'full' ) $img_size = 'full';
					if ( $image_crop == 'standard' ) $img_size = 'ambersix-post-standard';
					if ( $image_crop == 'related' ) $img_size = 'ambersix-post-related';

					if ( $thumb == 'featured-image' && has_post_thumbnail() )
						echo get_the_post_thumbnail( get_the_ID(), $img_size );

					if ( $thumb == 'custom-thumbnail'  ) {
						$images = ambersix_metabox( 'custom_thumbnail', "type=image&size=$img_size" );

						foreach ( $images as $image ) {
							echo '<img src="'. $image['url'] .'" alt="%s">';
						}
					} ?>
				</div><!-- /.thumb-wrap -->

                <div class="text-wrap" style="<?php echo esc_attr( $content_css ); ?>">
                    <div class="categories">
                    	<?php the_category( ', ', get_the_ID() ); ?>
                    </div>

					<?php 
					$title_html = sprintf( '<h3 class="title" style="%s"><span><a href="%s">%s</a></span></h3>',
						esc_attr( $heading_css ),
						esc_url( get_the_permalink() ),
						get_the_title()
					);

					$meta_html = sprintf( '<div class="post-meta"><span class="post-by-author item"><a href="%s" title="%s">%s</a></span> <span class="post-date item"><span class="entry-date">%s</span></span></div>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( esc_html__( 'View all posts by %s', 'ambersix' ), get_the_author() ) ),
						get_the_author(),
						get_the_date()
					);

					if ( $style == 'style-1' ) echo $title_html . $meta_html;
					if ( $style == 'style-2' ) echo $meta_html . $title_html;
					?>
                </div><!-- /.text-wrap -->
	        </div>
	    </div><!-- /.news-item -->
	    
	<?php endwhile; ?>
	</div><!-- /.owl-carousel -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>
</div><!-- /.ambersix-news -->
<?php
$return = ob_get_clean();
echo $return;