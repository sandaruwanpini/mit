<?php
/**
 * Header / Aside
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get header style
$header_style = ambersix_get_mod( 'header_site_style', 'style-1' );
if ( is_page() && ambersix_metabox('header_style') )
    $header_style = ambersix_metabox('header_style');

$info_one = ambersix_get_mod( 'aside_info_one', '<span class="text-dark">Manhattan</span><br /><span class="font-weight-600">112 W 34th St, NY</span>' );
$info_two = ambersix_get_mod( 'aside_info_two', '<span class="text-dark">8.00am – 6.00pm</span><br /><span class="font-weight-600">Monday to Friday</span>' );
$info_three = ambersix_get_mod( 'aside_info_three', '<span class="text-dark">24/7 Support</span><br /><span class="font-weight-600">(+1) 212-946-2707</span>' ); ?>

<?php if ( 'style-5' == $header_style || 'style-6' == $header_style ) : ?>
	<div id="header-aside">
        <div class="aside-content">
            <div class="inner">
                <?php
                    if ( $info_one )
                    printf('
                        <span class="info-one"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_map"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_one )
                    );
                    if ( $info_two )
                    printf('
                        <span class="info-two"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_clock"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_two )
                    );
                    if ( $info_three )
                    printf('
                        <span class="info-three"><div class="info-wrap">
                            <div class="info-i"><span><i class="elegant-icon_chat"></i></span></div>
                            <div class="info-c">%1$s</div>
                        </div></span>',
                        do_shortcode( $info_three )
                    );
                ?>
            </div>
        </div>
	</div>
<?php else : ?>
    <?php get_template_part( 'templates/header-menu' ); ?>
<?php endif; ?>

