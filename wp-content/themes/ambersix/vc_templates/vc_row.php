<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $fullwidth
 * @var $img_halfrow
 * @var $img_columns
 * @var $img_position
 * @var $halfrow_image
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $img_position = $extra_cls = $halfrow_image = $img_columns = $img_halfrow = $full_height = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $inner_cls = $inner_css = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $fullwidth = $css_animation = $image_video = $row_content_position = $row_equal_height = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	//'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = ' vc_row-o-columns-' . $columns_placement;
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = ' vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = ' vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}

if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

if ( $img_halfrow == 'simple' || $img_halfrow == 'parallax' ) {
	$css_classes[] = 'col-aside-img';
	$img_asiderow_attributes = array();	

	if ( $img_columns ===  '3columns' ) {
		$img_asiderow_attributes[] = 'vc_col-sm-3';
	} elseif ($img_columns ===  '4columns') {
		$img_asiderow_attributes[] = 'vc_col-sm-4';
	} elseif ($img_columns ===  '5columns') {
		$img_asiderow_attributes[] = 'vc_col-sm-5';
	} elseif ($img_columns ===  '6columns') {
		$img_asiderow_attributes[] = 'vc_col-sm-6';
	} elseif ($img_columns ===  '7columns') {
		$img_asiderow_attributes[] = 'vc_col-sm-7';
	}
	
	if ($img_position === 'imgleft') {
		$img_asiderow_attributes[] =  'aside-left';
	} elseif ($img_position === 'imgright') {
		$img_asiderow_attributes[] =  'aside-right';
	}
}

if ( $fullwidth !== 'no' ) {
	$css_classes[] = ' no-padding';
}

if( ! empty( $bg_html5_video ) ) {
	$css_classes[] = ' row-relative';
}

if ( ! empty( $row_content_position ) ) {
	$css_classes[] = 'row-content-position-' . $row_content_position;
}

if ( 'yes' === $row_equal_height ) $css_classes[] = 'row-equal-height';

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="'. esc_attr( trim( $css_class ) ) .'"';


$ambersix_wrap_classes = 'vc-custom-col-spacing clearfix';

if ( ! empty( $column_spacing ) ) {
	$ambersix_wrap_classes .= ' vc-col-spacing-'. $column_spacing;
}

if ( $img_halfrow == 'absolute' ) {
	$ambersix_wrap_classes .= ' image-absolute';
}

$output .= '<div class="'. $ambersix_wrap_classes .'">';

$output .= '<section '. implode( ' ', $wrapper_attributes ) .'>';

$video_icon = '';

if ( $image_video )
	$video_icon = '<div class="ambersix-video-icon clearfix accent"><a class="icon-wrap popup-video" href="'. $image_video .'">play<span class="circle"></span><span class="circle-2"></span></a></div>';

if ( $img_halfrow == 'simple' ) {
	$halfrow_image_id = preg_replace( '/[^\d]/', '', $halfrow_image );
	$halfrow_image_src = wp_get_attachment_image_src( $halfrow_image_id, 'full' );
	if ( ! empty( $halfrow_image_src[0] ) ) {
		$halfrow_image_src = $halfrow_image_src[0];
	}	
	$output .= '<div class="image-container img-simple '. implode( ' ', $img_asiderow_attributes ) .'"><div class="background-image" style="background-image: url('. esc_url($halfrow_image_src) .');"></div>'. $video_icon .'</div>';
}

if ( $content_align == 'top' ) $extra_cls = ' d-flex align-items-start';
if ( $content_align == 'middle' ) $extra_cls = ' d-flex align-items-center';
if ( $content_align == 'bottom' ) $extra_cls = ' d-flex align-items-end';

if ( $fullwidth == 'yes' ) {
	$output .= '<div class="row-inner clearfix">' .wpb_js_remove_wpautop( $content ) .'</div>';
} else {
	$output .= '<div class="ambersix-container">';
	$output .= '<div class="row-inner clearfix '. $extra_cls .'">' .wpb_js_remove_wpautop( $content ) .'</div>';
	$output .= '</div>';
}

if ( $img_halfrow == 'parallax' ) {
	if ( ! $img_offset_top ) $img_offset_top = 0;
	if ( ! $img_offset_left ) $img_offset_left = 0;
	if ( ! $img_offset_right ) $img_offset_right = 0;

	if ($img_position === 'imgleft') {
		$inner_css .= 'right:'. $img_offset_right;
		$inner_cls .= ' wow fadeInLeft';
	} elseif ($img_position === 'imgright') {
		$inner_css .= 'left:'. $img_offset_left;
		$inner_cls .= ' wow fadeInRight';
	}

	$px = intval( $parallax_x );
	$py = intval( $parallax_y );
	$halfrow_image_id = preg_replace( '/[^\d]/', '', $halfrow_image );
	$halfrow_image_src = wp_get_attachment_image_src( $halfrow_image_id, 'full' );
	if ( ! empty( $halfrow_image_src[0] ) ) {
		$halfrow_image_src = $halfrow_image_src[0];
	}	
	$output .= '<div class="image-container img-parallax '. implode( ' ', $img_asiderow_attributes ) .'" style="top:'. $img_offset_top .'"><div class="inner '. $inner_cls .'" style="'. $inner_css .'"><img src="'. esc_url( $halfrow_image_src ) .'" data-parallax=\'{"x" : '. $px .', "y" : '. $py .'}\' alt="'. esc_attr__( 'Image', 'ambersix' ) .'">'. $video_icon .'</div></div>';
}

if ( $img_halfrow == 'absolute' ) {
	$css = '';
	if ( $img_top ) $css .= 'top:'. $img_top .';';
	if ( $img_right ) $css .= 'right:'. $img_right .';';
	if ( $img_bottom ) $css .= 'bottom:'. $img_bottom .';';
	if ( $img_left ) $css .= 'left:'. $img_left .';';

	if ( ! $image_x ) $image_x = 0;
	if ( ! $image_y ) $image_y = 0;

	if ( $image_x  || $image_y ) $css .= 'transform:translate('. $image_x .','. $image_y .');';

	$halfrow_image_id = preg_replace( '/[^\d]/', '', $halfrow_image );
	$halfrow_image_src = wp_get_attachment_image_src( $halfrow_image_id, 'full' );
	if ( ! empty( $halfrow_image_src[0] ) ) {
		$halfrow_image_src = $halfrow_image_src[0];
	}	
	$output .= '<div class="image-container" style="'. $css .'"><img src="'. esc_url( $halfrow_image_src ) .'" alt="'. esc_attr__( 'Image', 'ambersix' ) .'"></div>';
}

$output .= '</section>';
$output .= $after_output;

$output .= '</div>';

printf( '%1$s', $output );
