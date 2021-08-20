<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

extract( shortcode_atts( array(
    'time' => 'December 30, 2020 8:30:00',
), $atts ) );

if ( $time ) {
	wp_enqueue_script( 'ambersix-countdown' );
	printf( '<div class="ambersix-countdown clearfix" data-date="%1$s"></div>', esc_html( $time ) );
}
