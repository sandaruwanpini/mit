<?php
/**
 * Accent color
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'Ambersix_Accent_Color' ) ) {
	class Ambersix_Accent_Color {
		// Main constructor
		public function __construct() {
			add_filter( 'ambersix_custom_colors_css', array( 'Ambersix_Accent_Color', 'generate' ), 1 );
		}

		// Generates arrays of elements to target
		private static function arrays( $return ) {
			// Color
			$texts = apply_filters( 'ambersix_accent_texts', array(
				'.text-accent-color',
				'.sticky-post',
				'#top-bar .top-bar-content .content:before',
				'.top-bar-style-1 #top-bar .top-bar-socials .icons a:hover',
				'.top-bar-style-2 #top-bar .top-bar-socials .icons a:hover',
				'#site-logo .site-logo-text:hover',
				'#main-nav .sub-menu li a:hover',
				'.search-style-fullscreen .search-submit:hover:after',
				'.header-style-1 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-1 #site-header .header-search-trigger:hover',
				'.header-style-2 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-2 #site-header .header-search-trigger:hover',
				'.header-style-3 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-3 #site-header .header-search-trigger:hover',
				'.header-style-4 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-4 #site-header .header-search-trigger:hover',
				'#featured-title #breadcrumbs a:hover',
				'.hentry .post-categories',
				'.hentry .page-links span',
				'.hentry .page-links a span',
				'.hentry .post-title a:hover',
				'.hentry .post-meta .item.post-by-author a:hover',
				'.hentry .post-tags:before',
				'.hentry .post-tags a',
				'.hentry .post-author .author-socials .socials a ',
				'.related-news .post-item .cat',
				'.related-news .post-item .text-wrap h3 a:hover',
				'.related-news .post-item .text-wrap .meta a:hover',
				'.related-news .related-post .slick-next:hover:before',
				'.related-news .related-post .slick-prev:hover:before',
				'.comment-reply a',
				'#cancel-comment-reply-link',
				'.widget.widget_archive ul li a:hover',
				'.widget.widget_categories ul li a:hover',
				'.widget.widget_meta ul li a:hover',
				'.widget.widget_nav_menu ul li a:hover',
				'.widget.widget_pages ul li a:hover',
				'.widget.widget_recent_entries ul li a:hover',
				'.widget.widget_recent_comments ul li a:hover',
				'.widget.widget_rss ul li a:hover',
				'#footer-widgets .widget.widget_archive ul li a:hover',
				'#footer-widgets .widget.widget_categories ul li a:hover',
				'#footer-widgets .widget.widget_meta ul li a:hover',
				'#footer-widgets .widget.widget_nav_menu ul li a:hover',
				'#footer-widgets .widget.widget_pages ul li a:hover',
				'#footer-widgets .widget.widget_recent_entries ul li a:hover',
				'#footer-widgets .widget.widget_recent_comments ul li a:hover',
				'#footer-widgets .widget.widget_rss ul li a:hover',
				'#sidebar .widget.widget_calendar caption',
				'#footer-widgets .widget.widget_calendar caption',
				'.widget.widget_nav_menu .menu > li.current-menu-item > a',
				'.widget.widget_nav_menu .menu > li.current-menu-item',
				'#sidebar .widget.widget_calendar tbody #today',
				'#sidebar .widget.widget_calendar tbody #today a',
				'#sidebar .widget_information ul li.accent-icon i',
				'#footer-widgets .widget_information ul li.accent-icon i',
				'#sidebar .widget.widget_twitter .authorstamp:before',
				'#footer-widgets .widget.widget_twitter .authorstamp:before',
				'.widget.widget_search .search-form .search-submit:before',
				'#sidebar .widget.widget_socials .socials a:hover',
				'#footer-widgets .widget.widget_socials .socials a:hover',
				'#sidebar .widget.widget_recent_posts h3 a:hover',
				'#footer-widgets .widget.widget_recent_posts h3 a:hover',

				// shortcodes
				'.ambersix-accordions .accordion-item .accordion-heading:hover',
				'.ambersix-accordions .accordion-item.style-1.active .accordion-heading > .inner:before',
				'.ambersix-accordions .accordion-item.style-2 .accordion-heading > .inner:before',
				'.ambersix-links.link-style-1.accent',
				'.ambersix-links.link-style-2.accent',
				'.ambersix-links.link-style-2.accent > span:before',
				'.ambersix-links.link-style-3.accent',
				'.ambersix-links.link-style-4.accent',
				'.ambersix-links.link-style-4.accent > .text:after',
				'.ambersix-button.outline.outline-accent',
				'.ambersix-button.outline.outline-accent .icon',
				'.ambersix-counter .icon.accent',
				'.ambersix-counter .prefix.accent',
				'.ambersix-counter .suffix.accent',
				'.ambersix-counter .number.accent',
				'.ambersix-divider.has-icon .icon-wrap > span.accent',
				'.ambersix-single-heading .heading.accent',
				'.ambersix-headings .heading.accent',
				'.ambersix-icon.accent > .icon',
				'.ambersix-image-box.style-1 .item .title a:hover',
				'.ambersix-images-grid .cbp-nav-next:hover:after',
				'.ambersix-images-grid .cbp-nav-prev:hover:after',
				'.ambersix-news .news-item .text-wrap .categories a:hover',
				'.ambersix-news .news-item .text-wrap .title a:hover',
				'.ambersix-news.style-1 .news-item .categories',
				'.ambersix-news.style-1 .news-item .categories a',
				'.project-box.style-2 .project-image > .title a:hover',
				'.project-box.style-2 .project-image > .terms a:hover',
				'.project-box.style-3 .project-image > .title a:hover',
				'.project-related-wrap .title-wrap .pre-title',
				'.project-related-wrap .btn-wrap a',
				'.project-related-wrap .project-item .cat a',
				'.project-related-wrap .project-item h2 a:hover',
				'.ambersix-progress .perc.accent',
				'.ambersix-team .socials li a',
				'.ambersix-list .icon.accent',
				'.ambersix-price-table .price-name .heading.accent',
				'.ambersix-price-table .price-name .sub-heading.accent',
				'.ambersix-price-table .price-figure .currency.accent',
				'.ambersix-price-table .price-figure .figure.accent',
				'.owl-theme .owl-nav [class*="owl-"]:hover:after',

				 // Woocommerce
				'.woocommerce-page .woocommerce-MyAccount-content .woocommerce-info .button',
				'.products li .product-info .button',
				'.products li .product-info .added_to_cart',
				'.products li .product-cat:hover',
				'.products li h2:hover',
				'.woo-single-post-class .woocommerce-grouped-product-list-item__label a:hover',
				'.woocommerce .shop_table.cart .product-name a:hover',
				'.woocommerce-page .shop_table.cart .product-name a:hover',
				'.product_list_widget .product-title:hover',
				'.widget_recent_reviews .product_list_widget a:hover',
				'.widget_product_categories ul li a:hover',
				'.widget.widget_product_search .woocommerce-product-search .search-submit:hover:before',
				'.widget_shopping_cart_content ul li a:hover',

				 // Default Link
				 'a',
			) );

			// Background color
			$backgrounds = apply_filters( 'ambersix_accent_backgrounds', array(
				'bg-accent',
				'blockquote:before',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'.tparrows.custom:hover',
				'.slick-dots li:after',
				'.header-style-2 #site-header .header-button a',
				'.post-media .slick-prev:hover',
				'.post-media .slick-next:hover',
				'.post-media .slick-dots li.slick-active button',
				'.hentry .post-title:before',
				'.hentry .post-link a',
				'.comment-reply a:after',
				'#cancel-comment-reply-link:after',
				'.widget.widget_categories ul li > span',
				'.widget.widget_archive ul li > span',
				'#sidebar .widget.widget_recent_posts .recent-news .thumb.icon',
				'#footer-widgets .widget.widget_recent_posts .recent-news .thumb.icon',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',
				'#scroll-top:hover:before',
				'.ambersix-pagination ul li a.page-numbers:hover',
				'.woocommerce-pagination .page-numbers li .page-numbers:hover',
				'.ambersix-pagination ul li .page-numbers.current',
				'.woocommerce-pagination .page-numbers li .page-numbers.current',
				'.no-results-content .search-form .search-submit:before',

				// shortcodes
				'.ambersix-accordions .accordion-item.style-2.active .accordion-heading',
				'.ambersix-links.link-style-1.accent > span:after',
				'.ambersix-links.link-style-3.accent .line',
				'.ambersix-links.link-style-4 .line',
				'.ambersix-links.link-style-4.accent .line',
				'.ambersix-button.accent',
				'.ambersix-button.outline.outline-accent:hover',
				'.ambersix-content-box > .inner.accent',
				'.ambersix-content-box > .inner.dark-accent',
				'.ambersix-content-box > .inner.light-accent',
				'.ambersix-tabs.style-2 .tab-title .item-title.active',
				'.ambersix-tabs.style-3 .tab-title .item-title.active',
				'.ambersix-single-heading .line.accent',
				'.ambersix-headings .sep.accent',
				'.ambersix-headings .heading > span',
				'.ambersix-icon.accent-bg > .icon',
				'.project-box .project-text .icons > a:hover ',
				'.project-related-wrap .btn-wrap a:hover',
				'.ambersix-progress .progress-animate.accent',
				'.ambersix-images-carousel.has-borders:after',
				'.ambersix-images-carousel.has-borders:before',
				'.ambersix-images-carousel.has-arrows.arrow-bottom .owl-nav',
				'.ambersix-team-grid .socials li a:hover',
				'.ambersix-fancy-img-bg',
				'.owl-theme .owl-dots .owl-dot span:after',

				// woocemmerce
				'.woocommerce-page .woo-single-post-class .summary .stock.in-stock',
				'.woocommerce-page .wc-proceed-to-checkout .button',
				'.woocommerce-page .return-to-shop a',
				'.woocommerce-page #payment #place_order',
				'.widget_price_filter .price_slider_amount .button:hover',
			) );

			// Border color
			$borders = apply_filters( 'ambersix_accent_borders', array(
				'textarea:focus,input[type="text"]:focus,input[type="password"]:focus,input[type="datetime"]:focus,input[type="datetime-local"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="number"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="search"]:focus,input[type="tel"]:focus,input[type="color"]:focus',
				'.underline-solid:after, .underline-dotted:after, .underline-dashed:after' => array( 'bottom' ),
				'.widget.widget_search .search-form .search-field:focus',
				'#sidebar .mc4wp-form .email-wrap input:focus',
				'.no-results-content .search-form .search-field:focus',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'#footer-widgets .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',

				// shortcodes
				'.ambersix-button.outline.outline-accent',
				'.ambersix-button.outline.outline-accent:hover',
				'.divider-icon-before.accent',
				'.divider-icon-after.accent',
				'.ambersix-divider.has-icon .divider-double.accent',
				'.ambersix-tabs.style-2 .tab-title .item-title.active > span' => array( 'top' ),
				'.ambersix-testimonials-g3 .avatar-wrap img:hover',
				'.ambersix-testimonials-g3 .avatar-wrap a.active img',

				'.ambersix-video-icon.white a:after' => array( 'left' ),
				'.ambersix-video-icon.accent .circle',

				// woocommerce
				'.widget_price_filter .ui-slider .ui-slider-handle',
			) );

			// Gradient color
			$gradients = apply_filters( 'ambersix_accent_gradient', array(
				'.ambersix-progress .progress-animate.accent.gradient'
			) );

			// Return array
			if ( 'texts' == $return ) {
				return $texts;
			} elseif ( 'backgrounds' == $return ) {
				return $backgrounds;
			} elseif ( 'borders' == $return ) {
				return $borders;
			} elseif ( 'gradients' == $return ) {
				return $gradients;
			}
		}

		// Generates the CSS output
		public static function generate( $output ) {

			// Get custom accent
			$default_accent = '#4f9be8';
			$custom_accent  = ambersix_get_mod( 'accent_color' );

			// Return if accent color is empty or equal to default
			if ( ! $custom_accent || ( $default_accent == $custom_accent ) )
				return $output;

			// Define css var
			$css = '';

			// Get arrays
			$texts       = self::arrays( 'texts' );
			$backgrounds = self::arrays( 'backgrounds' );
			$borders     = self::arrays( 'borders' );
			$gradients    = self::arrays( 'gradients' );

			// Texts
			if ( ! empty( $texts ) )
				$css .= implode( ',', $texts ) .'{color:'. $custom_accent .';}';

			// Backgrounds
			if ( ! empty( $backgrounds ) )
				$css .= implode( ',', $backgrounds ) .'{background-color:'. $custom_accent .';}';

			// Borders
			if ( ! empty( $borders ) ) {
				foreach ( $borders as $key => $val ) {
					if ( is_array( $val ) ) {
						$css .= $key .'{';
						foreach ( $val as $key => $val ) {
							$css .= 'border-'. $val .'-color:'. $custom_accent .';';
						}
						$css .= '}'; 
					} else {
						$css .= $val .'{border-color:'. $custom_accent .';}';
					}
				}
			}

			// Gradients
			if ( ! empty( $gradients ) )
				$css .= implode( ',', $gradients ) .'{background: '. ambersix_hex2rgba($custom_accent, 1) .';background: -moz-linear-gradient(left, '. ambersix_hex2rgba($custom_accent, 1) .' 0%, '. ambersix_hex2rgba($custom_accent, 0.3) .' 100%);background: -webkit-linear-gradient( left, '. ambersix_hex2rgba($custom_accent, 1) .' 0%, '. ambersix_hex2rgba($custom_accent, 0.3) .' 100% );background: linear-gradient(to right, '. ambersix_hex2rgba($custom_accent, 1) .' 0%, '. ambersix_hex2rgba($custom_accent, 0.3) .' 100%) !important;}';

			// Return CSS
			if ( ! empty( $css ) )
				$output .= '/*ACCENT COLOR*/'. $css;

			// Return output css
			return $output;
		}
	}
}

new Ambersix_Accent_Color();