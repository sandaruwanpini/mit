<?php
/**
 * Footer Promotion
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer or Metabox
if ( ! ambersix_get_mod( 'promotion_box', false ) || ( is_page() && ambersix_metabox('hide_footer_promo') ) )
	return false;

$html = '';
$title = ambersix_get_mod( 'promo_title', 'Have a project in mind?<br />We\'d love to help make your ideas a reality.' );
$button = ambersix_get_mod( 'promo_button', 'GET STARTED' );
$button_url = ambersix_get_mod( 'promo_button_url', '#' );

if ( $title )
	$html .= sprintf(
	'<div class="title-wrap">
		<div class="text-wrap">
			<h5 class="promo-title">%1$s</h5>
		</div>
	</div>', do_shortcode( $title ) );

if ( $button)
	$html .= sprintf(
	'<div class="button-wrap">
		<div class="btn">
			<a href="%1$s" class="promo-btn">
				<span>%2$s</span>
			</a>
		</div>
	</div>', $button_url, $button );

if ( $html )
	printf(
		'<div class="footer-promotion" style="%2$s">
			<div class="ambersix-container">
				<div class="inner">%s</div>
			</div>
		</div>',
		$html,
		ambersix_element_bg_css('promo_background_img')
	);

