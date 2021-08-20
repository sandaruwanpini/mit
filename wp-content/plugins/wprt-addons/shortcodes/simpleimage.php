<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $css = $data = $data2 = $icon_cls = $icon_css = $icon_html = $data = $image_html = $new_tab = '';

extract( shortcode_atts( array(
	'image' => '',
	'image_width' => '',
	'rounded' => '',
	'stretch' => '',
	'url' => '',
	'new_tab' => 'yes',
	'icon_style' => 'white',
	'icon_size' => 'big',
	'video_url' => '',
    'inset' => '',
    'horizontal' => '',
    'vertical' => '',
    'blur' => '',
    'spread' => '',
    'shadow_color' => '',
    'effect' => 'reveal',
    'reveal_dir' => 'lr',
    'reveal_bg' => '#dddddd',
    'bg_pos' => 'top'
), $atts ) );

if ( $stretch == 'stretch_left' ) $cls = 'stretch-to-left';
if ( $stretch == 'stretch_right' ) $cls = 'stretch-to-right';
if ( $stretch == 'stretch_mobi' ) $cls = 'stretch-on-mobile';

if ( $image_width ) $css .= ' max-width:'.  intval($image_width) .'px;';
if ( $rounded ) $css .= 'border-radius:'.  intval($rounded) .'px;overflow:hidden;';

if ( $horizontal && $vertical && $blur && $spread && $shadow_color )
    $css .= ' box-shadow:'. $inset .' '. $horizontal .' '. $vertical .' '. $blur .' '. $spread .' '. $shadow_color;

if ( $video_url ) {
	$icon_cls = $icon_style .' '. $icon_size;

	$icon_html = sprintf(
		'<div class="ambersix-video-icon clearfix %2$s" style="%3$s"><a class="icon-wrap popup-video" href="%1$s"><span class="circle"></span></a></div>',
		$video_url,
		$icon_cls,
		$icon_css
	);
}

if ( $image ) {
	$image_html = sprintf( '<img alt="image" src="%1$s" />', wp_get_attachment_image_src( $image, 'full' )[0] );

	if ( $url ) {
		$new_tab = $new_tab == 'yes' ? '_blank' : '_self';
		$image_html = sprintf( '<a target="%3$s" href="%2$s">%1$s</a>', $image_html, $url, $new_tab );
	}

	if ( $effect == '' ) {
		printf(
			'<div class="ambersix-simple-image %3$s" style="%4$s">
				%1$s %2$s
			</div>',
			$image_html,
			$icon_html,
			$cls,
			$css
		);
	}

	if ( $effect == 'reveal' ) {
		$data = 'data-reveal="true" data-reveal-options=\'{"direction":"'. $reveal_dir .'","bgcolor":"'. $reveal_bg .'"}\'';

		printf(
			'<div class="ambersix-simple-image %3$s" %5$s>
				<figure style="%4$s">%1$s %2$s</figure>
			</div>',
			$image_html,
			$icon_html,
			$cls,
			$css,
			$data
		);
	}

	if ( $effect == 'background' ) {

		$data = 'data-in-viewport="true"';
		$cls .= ' bg-'. $bg_pos;

		printf(
			'<div class="ambersix-fancy-img %3$s" %5$s>
				<div class="ambersix-fancy-img-inner">
					<span class="ambersix-fancy-img-bg"></span>

					<div class="ambersix-fancy-img-holder" style="%4$s">
						%1$s %2$s
					</div>
				</div>
			</div>',
			$image_html,
			$icon_html,
			$cls,
			$css,
			$data
		);
	}
}