<?php
/**
 * Entry Content / Media
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! ambersix_get_mod( 'blog_single_media', true ) )
	return;

$html = '';

switch ( get_post_format() ) {
	case 'gallery':
		$icon = 'post-gallery';
		$size = 'ambersix-post-standard';

		if ( is_single() )
			$size = 'ambersix-post-single';

		$images = ambersix_metabox( 'gallery_images', "type=image&size=$size" );

		if ( empty( $images ) )
			break;

		wp_enqueue_script( 'slick' );
		$html = '<div class="blog-gallery">';
  
		foreach ( $images as $image ) {
			$html .= sprintf(
				'<li><img src="%s" alt="%s"></li>',
				esc_url( $image['url'] ),
				esc_attr__( 'Image', 'ambersix' )
			);
		}
		$html .= '</div>';
		break;
	case 'video':
		$icon = 'post-video';
		$video = ambersix_metabox( 'video_url' );
		if ( ! $video )
			break;

		if ( filter_var( $video, FILTER_VALIDATE_URL ) ) {
			// If URL: show oEmbed HTML
			if ( $oembed = @wp_oembed_get( $video ) )
				$html .= $oembed;
		} else {
			// If embed code: just display
			$html .= $video;
		}
		break;
	default:
		$icon = 'post-standard"';
		$size = 'ambersix-post-standard';

		if ( is_single() )
			$size = 'ambersix-post-single';

		$thumb = get_the_post_thumbnail( get_the_ID(), $size );
		if ( empty( $thumb ) )
			return;

		if ( is_single() ) {
			$html .= $thumb;
		} else {
			$html .= '<a href="' . esc_url( get_permalink() ) . '">';
			$html .= $thumb;
			$html .= '</a>';
		}
}

if ( $html )
	printf( '<div class="post-media clearfix">%1$s</div>', $html );
