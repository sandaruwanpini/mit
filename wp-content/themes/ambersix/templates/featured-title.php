<?php
/**
 * Featured Title
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer or Metabox
if ( ! ambersix_get_mod( 'featured_title', true ) || ( is_page() && ambersix_metabox('hide_featured_title') ) )
    return;

$title = ambersix_get_mod( 'blog_featured_title', 'Our News' );

if ( is_singular() ) {
    $title = get_the_title();
} elseif ( is_search() ) {
    $title = sprintf( esc_html__( 'Search results for &quot;%s&quot;', 'ambersix' ), get_search_query() );
} elseif ( is_404() ) {
    $title = esc_html__( 'Not Found', 'ambersix' );
} elseif ( is_author() ) {
    the_post();
    $title = sprintf( esc_html__( 'Author Archives: %s', 'ambersix' ), get_the_author() );
    rewind_posts();
} elseif ( is_day() ) {
    $title = sprintf( esc_html__( 'Daily Archives: %s', 'ambersix' ), get_the_date() );
} elseif ( is_month() ) {
    $title = sprintf( esc_html__( 'Monthly Archives: %s', 'ambersix' ), get_the_date( 'F Y' ) );
} elseif ( is_year() ) {
    $title = sprintf( esc_html__( 'Yearly Archives: %s', 'ambersix' ), get_the_date( 'Y' ) );
} elseif ( is_tax() || is_category() || is_tag() ) {
    $title = single_term_title( '', false );
}

if ( is_page() && ambersix_metabox('custom_featured_title' ) ) {
    $title = ambersix_metabox('custom_featured_title' );
}

if ( ambersix_is_woocommerce_shop() ) {
    $title = ambersix_get_mod( 'shop_featured_title', 'Our Shop' );
}

if ( is_singular( 'product' ) ) {
    $sptitle = ambersix_get_mod( 'shop_single_featured_title', 'Our Shop' );
    if ( $sptitle != '' ) { $title = $sptitle; }
    else { $title = get_the_title(); }
}

if ( is_singular( 'post' ) ) {
    $title = ambersix_get_mod( 'blog_single_featured_title', 'Our News' );
}

// Return array to order contents
$featured_title_content = ambersix_get_mod( 'featured_title_style' )
    ? explode( '_', ambersix_get_mod( 'featured_title_style' ) )
    : array( "heading", "breadcrumbs" );
?>

<div id="featured-title" class="<?php echo ambersix_feature_title_cls(); ?>" style="<?php echo ambersix_featured_title_bg(); ?>">
    <div class="ambersix-container clearfix">
        <div class="inner-wrap">
            <?php
            foreach ( $featured_title_content as $content ) :
                // Get heading
                if ( 'breadcrumbs' == $content ) {
                    // Dont load if disabled via Customizer
                    if ( ambersix_get_mod( 'featured_title_breadcrumbs', true ) ) : ?>
                        <div id="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <div class="breadcrumb-trail">
                                    <?php ambersix_breadcrumbs(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                }

                if ( 'heading' == $content ) {
                // Get breadcrumbs
                if ( ambersix_get_mod( 'featured_title_heading', true ) ) : ?>
                    <div class="title-group">
                        <h1 class="main-title">
                            <?php echo do_shortcode( $title ); ?>
                        </h1>
                    </div>
                <?php endif;
                }
            endforeach; ?>
        </div>
    </div>
</div><!-- /#featured-title -->

