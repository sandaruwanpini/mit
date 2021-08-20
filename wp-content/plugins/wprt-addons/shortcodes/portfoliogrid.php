<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $inner_css = $filter_css = $filter_wrap_css  = $filter_data = '';

extract( shortcode_atts( array(
	'style' => 'style-1',
	'margin' => '',
	'showcase' => 'masonry',
	'image_crop' => 'square',
	'items'			=> '8',
	'cat_slug'	=> '',
	'exclude_cat_slug' => '',
	'pagination' => 'false',
	'gapv'			=> '30',
	'gaph'			=> '30',
	'rounded' 	=> '',
	'show_filter'	=> 'true',
	'filter_by_default' => '',
	'filter_cat_slug' => '',
	'filter_button_all' => 'All',
	'bottom_filter' => '',
	'filter_align' => 'style-1',
	'filter_counter' => 'true',
	'column'		=> '4c',
	'column2'		=> '3c',
	'column3'		=> '2c',
	'column4'		=> '1c',
	'filter_font_family' => 'Default',
	'filter_font_weight' => 'Default',
	'filter_font_size' => '',
	'filter_line_height' => '',
	'filter_letter_spacing' => '',
	'filter_text_tranform' => 'capitalize'
), $atts ) );

$gapv = intval( $gapv );
$gaph = intval( $gaph );
$items = intval( $items );
$column = intval( $column );
$column2 = intval( $column2 );
$column3 = intval( $column3 );
$column4 = intval( $column4 );
$bottom_filter = intval( $bottom_filter );
$filter_font_size = intval( $filter_font_size );
$filter_line_height = intval( $filter_line_height );
$filter_letter_spacing = intval( $filter_letter_spacing );

if ( empty( $items ) ) return;

if ( empty( $gapv ) ) $gapv = 0;
if ( empty( $gaph ) ) $gaph = 0;

if ( $rounded ) $cls .= ' rounded'; 

if ( $margin ) $inner_css .= 'margin:'. $margin .';';

if ( $bottom_filter ) $filter_wrap_css = 'margin-bottom:'. $bottom_filter . 'px;';
if ( $filter_text_tranform ) $filter_css .= 'text-transform:'. $filter_text_tranform .';';
if ( $filter_font_weight != 'Default' ) $filter_css .= 'font-weight:'. $filter_font_weight .';';
if ( $filter_font_size ) $filter_css .= 'font-size:'. $filter_font_size .'px;';
if ( $filter_line_height ) $filter_css .= 'line-height:'. $filter_line_height .'px;';
if ( $filter_letter_spacing ) $filter_css .= 'letter-spacing:'. $filter_letter_spacing .'px;';
if ( $filter_font_family != 'Default' ) {
	ambersix_enqueue_google_font( $filter_font_family );
	$filter_css .= 'font-family:'. $filter_font_family .';';
}

if ( ! empty( $filter_cat_slug ) && $filter_by_default  )
	$filter_data = strtolower( $filter_cat_slug );

if ( get_query_var('paged') ) {
   $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
   $paged = get_query_var('page');
} else {
   $paged = 1;
}

$query_args = array(
    'post_type' => 'project',
    'posts_per_page' => $items,
    'paged'     => $paged
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'project_category',
			'field'    => 'slug',
			'terms'    => $cat_slug
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

<div class="ambersix-project-grid" data-layout="<?php echo esc_attr( $showcase ); ?>" data-column="<?php echo esc_attr( $column ); ?>" data-column2="<?php echo esc_attr( $column2 ); ?>" data-column3="<?php echo esc_attr( $column3 ); ?>" data-column4="<?php echo esc_attr( $column4 ); ?>" data-gaph="<?php echo esc_attr( $gaph ); ?>" data-gapv="<?php echo esc_attr( $gapv ); ?>" data-filter="<?php echo esc_attr( $filter_data ); ?>">
<div style="<?php echo esc_attr( $inner_css ); ?>">

	<?php if ( $query->have_posts() ) :
	    if ( $show_filter == 'true' ) {
	        echo '<div id="project-filter" style="'. $filter_wrap_css .'" class="cbp-l-filters-alignCenter clearfix '. $filter_align .'"><div class="inner">';
        	if ( ! empty( $filter_button_all ) )
        		echo '<div data-filter="*" class="cbp-filter-item button-all" style="'. $filter_css .'"><span>'. esc_html( $filter_button_all ) .'</span><div class="cbp-filter-counter"></div></div>';

				if ( $cat_slug ) {

					$term = strtolower( str_replace( ' ', '-', $cat_slug ) );
					$term = get_term_by( 'slug', $cat_slug, 'project_category' ); 
					if ( $term ) $terms = get_term_children( $term->term_id, 'project_category' );

					foreach( $terms as $term ) {
						$t = get_term_by( 'id', $term, 'project_category' );
						echo '<div data-filter=".'. esc_attr( $t->slug ) .'" class="cbp-filter-item" title="'. esc_attr( $t->name ) .'" style="'. $filter_css .'"><span>'. $t->name . '</span><div class="cbp-filter-counter"></div></div>';
					}
				} else {

					$terms = get_terms('project_category');
				    foreach ( $terms as $term ) {
				        echo '<div data-filter=".'. esc_attr( $term->slug ) .'" class="cbp-filter-item" title="'. esc_attr( $term->name ) .'" style="'. $filter_css .'"><span>'. $term->name . '</span><div class="cbp-filter-counter"></div></div>';
				    }
				}
	        echo '</div></div>';
	    } ?>

		<div id="portfolio" class="cbp">
		    <?php while ( $query->have_posts() ) : $query->the_post();
				wp_enqueue_script( 'ambersix-cubeportfolio' ); wp_enqueue_script( 'ambersix-magnificpopup' );
				
			    global $post;
				$term_list = '';
			    $terms = get_the_terms( $post->ID, 'project_category' );

			    if ( $terms ) {
			        foreach ( $terms as $term ) {
			            $term_list .= $term->slug .' ';
			        }
			    } ?>

	            <div class="cbp-item <?php echo esc_attr( $term_list ); ?>">
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
							?>
		                </div>
					</div><!-- /.project-box -->
	            </div><!-- /.cbp-item -->
			<?php endwhile; ?>
		</div><!-- /#portfolio -->

		<?php if ( 'true' == $pagination ) {
			echo '<div class="project-nav">';
			ambersix_pagination($query);
			echo '</div>';
		}
		?>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

</div>
</div><!-- /.ambersix-project -->

<?php
$return = ob_get_clean();
echo $return;