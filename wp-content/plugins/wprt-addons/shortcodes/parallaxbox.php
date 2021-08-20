<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

printf( '
	<div class="ambersix-parallax-box">%1$s</div>',
	do_shortcode( $content )
);