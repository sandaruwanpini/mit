<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

printf(
	'<div class="ambersix-icon-list clearfix">%1$s</div>',
	do_shortcode($content)
);