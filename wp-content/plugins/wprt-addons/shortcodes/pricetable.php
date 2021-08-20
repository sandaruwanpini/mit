<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = $cls = $data = $features_css = $price_html = '';
$price_css = $button_wrap_css = '';
$heading_html = $heading_css = $h_html = $h_css = $h_cls = $sh_html = $sh_css = $sh_cls = '';
$currency_html = $cur_css = $cur_cls = '';
$figure_html = $fig_css = $fig_cls = '';
$unit_html = $unit_css = $unit_cls = '';
$button_html = $button_css = $button_cls = $button_data = '';

extract( shortcode_atts( array(
	'alignment' => '',
	'padding' => '',
	'rounded' => '',
	'bg_color' => '',
    'bg_image' => '',
    'bg_position' => 'lt',
    'bg_repeat' => 'no-repeat',
    'bg_size' => '',

    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s',

    'inset' => '',
    'horizontal' => '',
    'vertical' => '',
    'blur' => '',
    'spread' => '',
    'shadow_color' => '',

	'heading' => 'Heading Text',
	'heading_color' => '',
	'subheading' => '',
	'subheading_color' => '',

	'price' => '199',
	'price_color' => '',
	'unit' => '/MO',
	'unit_color' => '',
	'currency' => '$',
	'currency_color' => '',
	'content_color' => '',

	'link_text' => 'Sign Up',
	'link_url' => '',
	'new_tab' => 'yes',
	'button_size' => 'medium',
	'button_rounded' => '',
	'button_text_color' => '',
	'button_background' => '',
    'button_border_width' => '1px',
    'button_border_style' => 'solid',
	'button_border' => '',
	'button_text_hover' => '',
	'button_background_hover' => '',
	'button_border_hover' => '',

	'heading_font_family' => 'Default',
	'heading_font_weight' => 'Default',
	'heading_font_size' => '',
	'heading_line_height' => '',
	'price_font_family' => 'Default',
	'price_font_weight' => 'Default',
	'price_font_size' => '',
	'price_line_height' => '',
	'unit_font_family' => 'Default',
	'unit_font_weight' => 'Default',
	'unit_font_size' => '',
	'unit_line_height' => '',
	'heading_margin' => '',
	'price_margin' => '',
	'content_margin' => '',
	'button_margin' => ''
), $atts ) );
$content = wpb_js_remove_wpautop($content, true);

if ( $heading_margin )  $heading_css .= 'margin:'. $heading_margin .';';
if ( $price_margin )  $price_css .= 'margin:'. $price_margin .';';
if ( $content_margin )  $features_css .= 'margin:'. $content_margin .';';
if ( $content_color )  $features_css .= 'color:'. $content_color .';';
if ( $button_margin ) $button_wrap_css .= 'margin:'. $button_margin .';';

if ( $heading ) {
	if ( $heading_color == '#4f9be8' ) { $h_cls .= ' accent'; }
	else { if ( $heading_color ) $h_css .= 'color:'. $heading_color .';'; }

	if ( $subheading_color == '#4f9be8' ) { $sh_cls .= ' accent'; }
	else { if ( $subheading_color ) $sh_css .= 'color:'. $subheading_color .';'; }

	if ( $heading_font_weight != 'Default' ) $h_css .= 'font-weight:'. $heading_font_weight .';';
	if ( $heading_font_size ) $h_css .= 'font-size:'. intval( $heading_font_size ) .'px;';
	if ( $heading_line_height ) $h_css .= 'line-height:'. intval( $heading_line_height ) .'px;';
	if ( $heading_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $heading_font_family );
		$h_css .= 'font-family:'. $heading_font_family .';';
	}

	$h_html .= sprintf( '<div class="heading %3$s" style="%2$s">%1$s</div>', $heading, $h_css, $h_cls );
	$sh_html .= sprintf( '<div class="sub-heading %3$s" style="%2$s">%1$s</div>', $subheading, $sh_css, $sh_cls );

	$heading_html .= sprintf(
		'<div class="price-name" style="%3$s">
			%1$s %2$s
		</div>',
		$h_html,
		$sh_html,
		$heading_css
	);
}

if ( isset( $price ) ) {
	if ( $price_color == '#4f9be8' ) { $fig_cls .= ' accent'; }
	else { if ( $price_color ) $fig_css .= 'color:'. $price_color .';'; }

	if ( $unit_color == '#4f9be8' ) { $unit_cls .= ' accent'; }
	else { if ( $unit_color ) $unit_css .= 'color:'. $unit_color .';'; }

	if ( $currency_color == '#4f9be8' ) { $cur_cls .= ' accent'; }
	else { if ( $currency_color ) $cur_css .= 'color:'. $currency_color .';'; }

	if ( $price_font_weight != 'Default' ) $fig_css .= 'font-weight:'. $price_font_weight .';';
	if ( $price_font_size ) $fig_css .= 'font-size:'. intval( $price_font_size ) .'px;';
	if ( $price_line_height ) $fig_css .= 'line-height:'. intval( $price_line_height ) .'px;';
	if ( $price_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $price_font_family );
		$fig_css .= 'font-family:'. $price_font_family .';';
	}

	if ( $unit_font_weight != 'Default' ) $unit_css .= 'font-weight:'. $unit_font_weight .';';

	if ( $unit_font_size ) $unit_css .= 'font-size:'. intval( $unit_font_size ) .'px;';
	if ( $unit_line_height ) $unit_css .= 'line-height:'. intval( $unit_line_height ) .'px;';
	if ( $unit_font_family != 'Default' ) {
		ambersix_enqueue_google_font( $unit_font_family );
		$unit_css .= 'font-family:'. $unit_font_family .';';
	}

	if ( $currency ) $currency_html .= sprintf( '<span class="currency %3$s" style="%2$s">%1$s</span>', $currency, $cur_css, $cur_cls );
	if ( $unit ) $unit_html .= sprintf( '<span class="term %3$s" style="%2$s">%1$s</span>', $unit, $unit_css, $unit_cls );

	$figure_html .= sprintf( '<span class="figure %3$s" style="%2$s">%1$s</span>', $price, $fig_css, $fig_cls );

	$price_html .= sprintf(
		'<div class="price-figure" style="%4$s">
			<span class="price-wrap">%1$s %2$s</span>
			%3$s
		</div>',
		$currency_html,
		$figure_html,
		$unit_html,
		$price_css
	);
}

if ( $link_text && $link_url ) {
	$rand = rand();
	$button_cls = $button_size;
	$button_cls = 'medium btn-'. $rand;
	$new_tab = $new_tab == 'yes' ? '_blank' : '_self';
	
	if ( $button_rounded ) $button_css .= 'border-radius:'. intval( $button_rounded ) .'px;';
	if ( $button_border_width ) $button_css .= 'border-width:'. $button_border_width .';';

    if ( $button_background == '#4f9be8' ) {
        $button_cls .= ' accent';
    } else {
        $button_cls .= ' custom';
        $button_data .= ' data-background="'. $button_background .'"';
    }

	if ( $button_text_color == '#4f9be8' ) {
		$button_cls .= ' text-accent';
	} else {
		$button_cls .= ' custom';
		$button_data .= ' data-text="'. $button_text_color .'"';
	}

    if ( $button_border_width ) {
        $button_cls .= ' outline '. $button_border_style;
        if ( $button_border == '#4f9be8' ) {
            $button_cls .= ' outline-accent';
        } else {
            $button_cls .= ' custom';
            $button_data .= ' data-border="'. $button_border .'"';
        }
    }	

	if ( $button_text_hover ) $button_data .= ' data-text-hover="'. $button_text_hover .'"';
	if ( $button_background_hover ) $button_data .= ' data-background-hover="'. $button_background_hover .'"';
	if ( $button_border_hover ) $button_data .= ' data-border-hover="'. $button_border_hover .'"';

	$button_html .= sprintf(
		'<div class="price-button" style="%7$s">
			<a target="%5$s" class="ambersix-button %3$s" href="%2$s" style="%4$s" %6$s>%1$s</a>
		</div>',
		$link_text,
		$link_url,
		$button_cls,
		$button_css,
		$new_tab,
		$button_data,
		$button_wrap_css
	);
}

$cls = $alignment;

if ( $horizontal && $vertical && $blur && $spread && $shadow_color )
    $css .= 'box-shadow:'. $inset .' '. $horizontal .' '. $vertical .' '. $blur .' '. $spread .' '. $shadow_color .';';

if ( $animation ) {
    $cls .= ' wow '. $animation_effect;
    $data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

if ( $bg_position == 'lt' ) $bg_position = 'left top';
if ( $bg_position == 'rt' ) $bg_position = 'right top';
if ( $bg_position == 'ct' ) $bg_position = 'center top';
if ( $bg_position == 'cc' ) $bg_position = 'center center';
if ( $bg_position == 'cb' ) $bg_position = 'center bottom';
if ( $bg_position == 'lb' ) $bg_position = 'left bottom';
if ( $bg_position == 'rb' ) $bg_position = 'right bottom';

if ( $padding ) $css .= 'padding:'. $padding .';';
if ( $rounded ) $css .= 'border-radius:'. intval( $rounded ) .'px;';
if ( $bg_color ) $css .= 'background-color:'. $bg_color .';';
if ( $bg_image ) $css .= 'background:url('. wp_get_attachment_image_src( $bg_image, 'full' )[0] .') '. $bg_position .' '. $bg_repeat .';';
if ( $bg_size ) $css .= 'background-size:'. $bg_size .';';

printf(
	'<div class="ambersix-price-table %1$s" style="%2$s" %8$s>
		%4$s %5$s
		<div class="price-features" style="%7$s">%3$s</div>
		%6$s
	</div>',
	$cls,
	$css,
	$content,
	$heading_html,
	$price_html,
	$button_html,
	$features_css,
	$data
);