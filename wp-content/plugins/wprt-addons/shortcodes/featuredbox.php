<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $css = $data = $img_css = $content_css = '';

extract( shortcode_atts( array(
    'style' => 'style-1',
    'height' => '570',
    'rounded' => '',
    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s',
    'img_width' => '',
	'image' => '',
	'content_width' => '',
	'content_align' => 'top',
	'content_padding' => '',
), $atts ) );

$cls = $style;

if ( $animation ) {
    $cls .= ' wow '. $animation_effect;
    $data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

if ( $content_align == 'top' ) $content_align = 'flex-start';
if ( $content_align == 'middle' ) $content_align = 'center';
if ( $content_align == 'bottom' ) $content_align = 'flex-end';

if ( $height ) $css .= 'border-radius:'. intval( $rounded ) .'px;';

if ( $content_align ) $css .= 'align-items:'. $content_align .';';

if ( $img_width ) $img_css .= 'flex-basis:'. $img_width .'%;';
if ( $content_width ) $content_css .= 'flex-basis:'. $content_width .'%;';

if ( $content_padding ) $content_css .= 'padding:'. $content_padding .';';

if ( $image ) $img_css .= 'background:url('. wp_get_attachment_image_src( $image, 'full' )[0] .') no-repeat left top;';
if ( $height ) $img_css .= 'height:'. intval( $height ) .'px;';

printf(
	'<div class="ambersix-featured-box clearfix %1$s" style="%5$s" %6$s>
		<div class="featured-img" style="%2$s"></div>
		<div class="featured-content" style="%3$s">%4$s</div>
	</div>',
	$cls,
	$img_css,
	$content_css,
	do_shortcode( $content ),
	$css,
	$data
);