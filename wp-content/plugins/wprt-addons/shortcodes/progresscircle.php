<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $css = $data = '';

extract( shortcode_atts( array(
	'width' => '200px',
	'percent' => '90',
	'pc' => '#222222',
	'ps' => '20px',
	'sc' => '#222222',
	'tc' => '#f7f7f7',
	'sw' => '4px',
	'tw' => '4px',
    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s'
), $atts ) );

if ( $animation ) {
	$cls .= ' wow '. $animation_effect;
	$data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

if ( $width ) $css .= 'max-width:'. intval( $width ) .'px;';

wp_enqueue_script( 'ambersix-progressbar' );

printf( '
	<div class="ambersix-piechart %9$s" %10$s>
		<div class="piechart" data-percent="%2$s" data-pc="%3$s" data-ps="%4$s" data-sc="%5$s" data-tc="%6$s" data-sw="%7$s" data-tw="%8$s" style="%1$s"></div>
	</div>', $css, $percent, $pc, $ps, $sc, $tc, intval( $sw ), intval( $tw ), $cls, $data
);