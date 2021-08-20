<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $thumb = $name = $pos = $text = $slide = $padding = '';

extract( shortcode_atts( array(
	'style' => 'style-1',
    'items' => '5',
    'borders' => '',
    'hide_bullets' => '',
    'center_mode' => 'false',
    'slide1' => '2',
    'slide2' => '1',
    'padding_content' => '15'
), $atts ) );

$cls = $style;
if ( $borders ) $cls .= ' has-borders';
if ( $hide_bullets ) $cls .= ' hide-bullets';

if ( $center_mode == 'false' ) $slide = $slide1;
if ( $center_mode == 'true' ) $slide = $slide2;
if ( $padding_content ) $padding = $padding_content .'%';

$query_args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => $items,
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'testimonials_category'
		),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Testimonials post not found!"; return; }

ob_start();
wp_enqueue_script( 'slick' );
?>

<div class="ambersix-testimonials <?php echo esc_attr( $cls ); ?>" data-center="<?php echo esc_attr( $center_mode ); ?>" data-padding="<?php echo esc_attr( $padding ); ?>" data-slide="<?php echo esc_attr( $slide ); ?>">
<?php $i = 0; if ( $query->have_posts() ) : ?>
	
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="item"><div class="shadow"><div class="inner">
	 		<?php
			if ( has_post_thumbnail() )
	 		 	$thumb = get_the_post_thumbnail( get_the_ID(), 'full' );
	        
	        if ( $name = ambersix_metabox( 'name' ) )
	        	$name = '<h4 class="name">'. $name .'</h4>';

	        if ( $pos = ambersix_metabox( 'position' ) )
	        	$pos = '<div class="position">'. $pos .'</div>';

	        if ( $text = ambersix_metabox( 'text' ) )
	        	$text = '<div class="text">'. $text .'</div>';

	        printf(
	        	'<div class="thumb">%1$s</div>
	        	<div class="person">%2$s %3$s</div>
	        	<div class="text">%4$s</div>',
        		$thumb,
        		$name,
        		$pos,
        		$text
        	);
	        ?>
		</div></div></div>
	<?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div><!-- /.ambersix-testimonials -->

<?php
$return = ob_get_clean();
echo $return;