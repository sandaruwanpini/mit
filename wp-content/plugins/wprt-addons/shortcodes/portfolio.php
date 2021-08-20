<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$inner_css = '';

extract( shortcode_atts( array(
	'style' => 'style-1',
	'margin' => '',
	'image_crop' => 'square',
	'items'			=> '8',
	'gap'			=> '30',
	'rounded' => '',
	'cat_slug'	=> '',
	'exclude_cat_slug' => '',
	'auto_scroll' => 'false',
	'column'		=> '3c',
	'column2'		=> '2c',
	'column3'		=> '1c',
	'show_bullets' => '',
	'show_arrows' => '',
	'bullet_between' => '50',
    'arrow_offset' => 'center',
    'arrow_offset_v' => '0'
), $atts ) );

$gap = intval( $gap );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );

if ( empty( $items ) ) return;

$cls = 'arrow-center';
$cls .= ' offset'. $arrow_offset .' offset-v'. $arrow_offset_v;

if ( $rounded ) $cls .= ' rounded'; 

if ( $margin ) $inner_css .= 'margin:'. $margin .';';

if ( $show_bullets ) $cls .= ' has-bullets'; 
if ( $show_arrows ) $cls .= ' has-arrows';

if ( $bullet_between == '45' ) $cls .= ' bullet45';
if ( $bullet_between == '40' ) $cls .= ' bullet40';
if ( $bullet_between == '35' ) $cls .= ' bullet35';
if ( $bullet_between == '30' ) $cls .= ' bullet30';
if ( $bullet_between == '25' ) $cls .= ' bullet25';
if ( $bullet_between == '20' ) $cls .= ' bullet20';
if ( $bullet_between == '15' ) $cls .= ' bullet15';
if ( $bullet_between == '10' ) $cls .= ' bullet10';

$query_args = array(
    'post_type' => 'project',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'project_category',
			'field'    => 'slug',
			'terms'    => $cat_slug,
			'category__not_in' => 144
		),
	);
}

if ( ! empty( $exclude_cat_slug ) ) {
	$query_args['tax_query'] = array(
	    array(
	        'taxonomy' => 'project_category',
	        'field' => 'slug',
	        'terms' => $exclude_cat_slug,
	        'operator' => 'NOT IN',
	    ),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Project item not found!"; return; }
ob_start(); ?>

<div class="ambersix-project <?php echo esc_attr( $cls ); ?>" data-auto="<?php echo esc_attr( $auto_scroll ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-gap="<?php echo esc_html( $gap ); ?>">
<div style="<?php echo esc_attr( $inner_css ); ?>">

<?php if ( $query->have_posts() ) : ?>
	<?php wp_enqueue_script( 'ambersix-owlcarousel' ); wp_enqueue_script( 'ambersix-magnificpopup' ); ?>

	<div class="owl-carousel owl-theme">
	    <?php while ( $query->have_posts() ) : $query->the_post(); global $post; ?>
			<div class="project-box <?php echo esc_attr( $style ); ?>">
				<div class="inner">
					<?php
					$img_size = $title = $term_html = '';

					if ( has_post_thumbnail() ) {
				    	if ( $image_crop == 'default' ) $img_size = 'ambersix-'. ambersix_metabox( 'image_crop' );
						if ( $image_crop == 'full' ) $img_size = 'full';
						if ( $image_crop == 'square' ) $img_size = 'ambersix-square';
						if ( $image_crop == 'rectangle' ) $img_size = 'ambersix-rectangle';
						if ( $image_crop == 'rectangle2' ) $img_size = 'ambersix-rectangle2';
					}

	            	$icon_html = sprintf('<div class="icons"><a href="%1$s" class="zoom popup-image"><span class="linea-basic-magnifier-plus"></span></a><a href="%2$s" class="link"><span class="linea-basic-link"></span></a></div>',
	            	ambersix_get_image( array( 'size' => 'full', 'format' => 'src' ) ),
	            	esc_url( get_the_permalink() )
	            	);

	            	$title = ambersix_metabox( 'title' ) ? ambersix_metabox( 'title' ) : get_the_title();
	            	$title_html = sprintf('<h4 class="title"><a href="%1$s" title="%2$s">%2$s</a></h4>', esc_url( get_the_permalink() ), esc_attr( $title ) );

					$terms = get_the_terms( $post->ID, 'project_category' );

					if ( $terms ) {
					    $out = array();
					    foreach ( $terms as $term ) {
					        $out[] = '<a class="'. $term->slug .'" href="'. get_term_link( $term->slug, 'project_category' ) .'">'. $term->name .'</a>';
					    }
					    $term_html .=  join( ' / ', $out );
					}

					if ( $style == 'style-1' )
						echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="project-text">'. $title_html . $icon_html .'</div></div></div></div>';

					if ( $style == 'style-2' )
	            		echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="project-text">'. $icon_html .'</div></div>'. $title_html .'<div class="terms">'. $term_html .'</div></div></div>';

	            	if ( $style == 'style-3' )
	            		echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="project-text">'. $icon_html .'</div></div>'. $title_html .'</div></div>';
					?>
                </div>
			</div><!-- /.project-box -->
		<?php endwhile; ?>
	</div><!-- /.owl-carousel -->

<?php endif; ?>
<?php wp_reset_postdata(); ?>

</div>
</div><!-- /.ambersix-project -->

<?php
$return = ob_get_clean();
echo $return;