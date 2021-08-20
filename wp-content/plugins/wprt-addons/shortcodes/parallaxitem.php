<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $inner_css = $image_html = '';

extract( shortcode_atts( array(
	'image' => '',
	'image_width' => '',
	'image_rounded' => '',
	'stretch' => '',
	'parallax_x' => '',
	'parallax_y' => '',
	'smoothness' => '30',
	'left' => '',
	'top' => '',
    'inset' => '',
    'horizontal' => '',
    'vertical' => '',
    'blur' => '',
    'spread' => '',
    'shadow_color' => ''
), $atts ) );

if ( ! empty( $left ) ) $css .= 'left:'. $left .';';
if ( ! empty( $top ) ) $css .= 'top:'. $top .';';

if ( $image ) $image_html .= '<img src="'. wp_get_attachment_image_src( $image, 'full' )[0] .'" alt="image">';
if ( $image_width ) $css .= 'max-width:'. intval( $image_width ) .'px;';
if ( $image_rounded ) $inner_css .= 'border-radius:'. intval( $image_rounded ) .'px;';


if ( $horizontal && $vertical && $blur && $spread && $shadow_color )
    $inner_css .= 'box-shadow:'. $inset .' '. $horizontal .' '. $vertical .' '. $blur .' '. $spread .' '. $shadow_color .';';

printf(
	'<div class="ambersix-parallax-item" style="%2$s"><div class="%6$s" style="%5$s" data-parallax=\'{"x" : %3$s, "y" : %4$s, "from-scroll" : 0, "smoothness" : %6$s}\'>%1$s</div></div>',
	$image_html,
	$css,
	intval( $parallax_x ),
	intval( $parallax_y ),
	$inner_css,
	intval ($smoothness )
);