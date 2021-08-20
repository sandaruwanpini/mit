<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$html = $cls = $css = '';
$n_html = $n_css = $h_html = $d_html = $h_css = $d_css = '';

extract( shortcode_atts( array(
	'number' => '',
	'number_color' => '',
	'heading' => '',
	'heading_color' => '',
	'description' => '',
	'desc_color' => '',

	'number_font_family' => 'Default',
	'number_font_weight' => 'Default',
	'number_font_size' => '',
	'number_line_height' => '',

	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'desc_font_family' => 'Default',
	'desc_font_weight' => 'Default',
	'desc_font_size' => '',
	'desc_line_height' => '',
	'bottom_margin' => '50px',
	'number_margin' => '',
	'heading_margin' => '0 0 12px 100px',
	'desc_margin' => '0 0 0 100px',
), $atts ) );

if ( $bottom_margin ) $css .= 'padding-bottom:'. intval( $bottom_margin ) .'px;';

if ( $number ) {
	if ( $number_font_weight != 'Default' ) $n_css .= 'font-weight:'. $number_font_weight .';';
	if ( $number_color ) $n_css .= 'color:'. $number_color .';';
	if ( $number_font_size ) $n_css .= 'font-size:'. intval( $number_font_size ) .'px;';
	if ( $number_line_height ) $n_css .= 'line-height:'. intval( $number_line_height ) .'px;';
	if ( $number_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $number_font_family );
		$n_css .= 'font-family:'. $number_font_family .';';
	}
	if ( $number_margin ) $n_css .= 'margin:'. $number_margin .';';

	$n_html = sprintf(
		'<div class="number" style="%2$s">%1$s</div>',
		$number,
		$n_css
	);
}

if ( $heading ) {
	if ( $heading_font_weight != 'Default' ) $h_css .= 'font-weight:'. $heading_font_weight .';';
	if ( $heading_color ) $h_css .= 'color:'. $heading_color .';';
	if ( $heading_font_size ) $h_css .= 'font-size:'. intval( $heading_font_size ) .'px;';
	if ( $heading_line_height ) $h_css .= 'line-height:'. intval( $heading_line_height ) .'px;';
	if ( $heading_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $heading_font_family );
		$h_css .= 'font-family:'. $heading_font_family .';';
	}
	if ( $heading_margin ) $h_css .= 'margin:'. $heading_margin .';';

	$h_html = sprintf(
		'<h3 class="heading" style="%2$s">%1$s</h3>',
		$heading,
		$h_css
	);
}

if ( $description ) {
	if ( $desc_font_weight != 'Default' ) $d_css .= 'font-weight:'. $desc_font_weight .';';
	if ( $desc_color ) $d_css .= 'color:'. $desc_color .';';
	if ( $desc_font_size ) $d_css .= 'font-size:'. intval( $desc_font_size ) .'px;';
	if ( $desc_line_height ) $d_css .= 'line-height:'. intval( $desc_line_height ) .'px;';
	if ( $desc_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $desc_font_family );
		$d_css .= 'font-family:'. $desc_font_family .';';
	}
	if ( $desc_margin ) $d_css .= 'margin:'. $desc_margin .';';

	$d_html = sprintf(
		'<div class="desc" style="%2$s">%1$s</div>',
		$description,
		$d_css
	);
}

printf(
	'<div class="icon-list-item %1$s" style="%2$s">
		%3$s
		<div class="text-item">
		%4$s %5$s
		</div>
	</div>',
	$cls,
	$css,
	$n_html,
	$h_html,
	$d_html
);