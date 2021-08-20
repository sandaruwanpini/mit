<?php
// Metabox
$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
if ($obira_meta && is_page()) {
	$obira_title_bar_padding = $obira_meta['title_area_spacings'];
} else {
	$obira_title_bar_padding = '';
}
if ($obira_meta) {
	$obira_page_sub_title = $obira_meta['page_sub_title'];
	$page_banner_shortcode = $obira_meta['page_banner_shortcode'];
	$parallax_arrow_id = $obira_meta['parallax_arrow_id'];
	$banner_title = $obira_meta['banner_title'];
	$banner_featured_image = $obira_meta['banner_featured_image'];
} else {
	$obira_page_sub_title = '';
	$page_banner_shortcode = '';
	$parallax_arrow_id = '';
	$banner_title = '';
	$banner_featured_image = '';
}
// Padding - Theme Options
if ($obira_title_bar_padding && $obira_title_bar_padding !== 'padding-none') {
	$obira_title_top_spacings = $obira_meta['title_top_spacings'];
	$obira_title_bottom_spacings = $obira_meta['title_bottom_spacings'];
	if ($obira_title_bar_padding === 'padding-custom') {
		$obira_title_top_spacings = $obira_title_top_spacings ? 'padding-top:'. obira_check_px($obira_title_top_spacings) .';' : '';
		$obira_title_bottom_spacings = $obira_title_bottom_spacings ? 'padding-bottom:'. obira_check_px($obira_title_bottom_spacings) .';' : '';
		$obira_custom_padding = $obira_title_top_spacings . $obira_title_bottom_spacings;
	} else {
		$obira_custom_padding = '';
	}
} else {
	$obira_title_bar_padding = cs_get_option('title_bar_padding');
	$obira_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$obira_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($obira_title_bar_padding === 'padding-custom') {
		$obira_titlebar_top_padding = $obira_titlebar_top_padding ? 'padding-top:'. obira_check_px($obira_titlebar_top_padding) .';' : '';
		$obira_titlebar_bottom_padding = $obira_titlebar_bottom_padding ? 'padding-bottom:'. obira_check_px($obira_titlebar_bottom_padding) .';' : '';
		$obira_custom_padding = $obira_titlebar_top_padding . $obira_titlebar_bottom_padding;
	} else {
		$obira_custom_padding = '';
	}
}

// Banner Type - Meta Box
if ($obira_meta) {
	$obira_banner_type = $obira_meta['banner_type'];
} else { $obira_banner_type = ''; }

// Overlay Color - Theme Options
if ($obira_meta && is_page()) {
	$obira_bg_overlay_color = $obira_meta['titlebar_bg_overlay_color'];
} else { $obira_bg_overlay_color = ''; }
if ($obira_bg_overlay_color) {
	if ($obira_bg_overlay_color) {
		$obira_overlay_color = $obira_bg_overlay_color;
	} else {
		$obira_overlay_color = '';
	}
} else {
	$obira_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($obira_bg_overlay_color) {
		$obira_overlay_color = $obira_bg_overlay_color;
	} else {
		$obira_overlay_color = '';
	}
}

// Background - Type
if( $obira_meta && $obira_meta['title_area_bg'] ) {

  extract( $obira_meta['title_area_bg'] );
	if ($image || $color) {
	  $obira_background_image       = ( $image ) ? 'background-image: url(' . $image . ');' : '';
	  $obira_background_repeat      = ( $image && $repeat ) ? ' background-repeat: ' . $repeat . ';' : '';
	  $obira_background_position    = ( $image && $position ) ? ' background-position: ' . $position . ';' : '';
	  $obira_background_size    = ( $image && $size ) ? ' background-size: ' . $size . ';' : '';
	  $obira_background_attachment    = ( $image && $size ) ? ' background-attachment: ' . $attachment . ';' : '';
	  $obira_background_color       = ( $color ) ? ' background-color: ' . $color . ';' : '';
	  $obira_background_style       = ( $image ) ? $obira_background_image . $obira_background_repeat . $obira_background_position . $obira_background_size . $obira_background_attachment : '';

	  $obira_title_bg = ( $obira_background_style || $obira_background_color ) ? $obira_background_style . $obira_background_color : '';
	} else {
		if (cs_get_option('titlebar_bg')) {
			extract( cs_get_option('titlebar_bg') );
		  $obira_background_image       = ( $image ) ? 'background-image: url(' . $image . ');' : '';
		  $obira_background_repeat      = ( $image && $repeat ) ? ' background-repeat: ' . $repeat . ';' : '';
		  $obira_background_position    = ( $image && $position ) ? ' background-position: ' . $position . ';' : '';
		  $obira_background_size    = ( $image && $size ) ? ' background-size: ' . $size . ';' : '';
		  $obira_background_attachment    = ( $image && $size ) ? ' background-attachment: ' . $attachment . ';' : '';
		  $obira_background_color       = ( $color ) ? ' background-color: ' . $color . ';' : '';
		  $obira_background_style       = ( $image ) ? $obira_background_image . $obira_background_repeat . $obira_background_position . $obira_background_size . $obira_background_attachment : '';

		  $obira_title_bg = ( $obira_background_style || $obira_background_color ) ? $obira_background_style . $obira_background_color : '';
		} else {
		  $obira_background_image       = '';
		  $obira_background_repeat      = '';
		  $obira_background_position    = '';
		  $obira_background_size    = '';
		  $obira_background_attachment    = '';
		  $obira_background_color       = '';
		  $obira_background_style       = '';
		  $obira_title_bg = '';
		}
	}

} else {
	if (cs_get_option('titlebar_bg')) {
		extract( cs_get_option('titlebar_bg') );

		  $obira_background_image       = ( $image ) ? 'background-image: url(' . $image . ');' : '';
		  $obira_background_repeat      = ( $image && $repeat ) ? ' background-repeat: ' . $repeat . ';' : '';
		  $obira_background_position    = ( $image && $position ) ? ' background-position: ' . $position . ';' : '';
		  $obira_background_size    = ( $image && $size ) ? ' background-size: ' . $size . ';' : '';
		  $obira_background_attachment    = ( $image && $size ) ? ' background-attachment: ' . $attachment . ';' : '';
		  $obira_background_color       = ( $color ) ? ' background-color: ' . $color . ';' : '';
		  $obira_background_style       = ( $image ) ? $obira_background_image . $obira_background_repeat . $obira_background_position . $obira_background_size . $obira_background_attachment : '';

		  $obira_title_bg = ( $obira_background_style || $obira_background_color ) ? $obira_background_style . $obira_background_color : '';
	} else {
	  $obira_background_image       = '';
	  $obira_background_repeat      = '';
	  $obira_background_position    = '';
	  $obira_background_size    = '';
	  $obira_background_attachment    = '';
	  $obira_background_color       = '';
	  $obira_background_style       = '';
	  $obira_title_bg = '';
	}
}

$banner_featured_image = wp_get_attachment_image_url( $banner_featured_image, 'full' );
$banner_img_alt = get_post_meta( $banner_featured_image, '_wp_attachment_image_alt', true );

if($obira_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($obira_meta && $obira_banner_type === 'revolution-slider') { // Hide Title Area
	echo do_shortcode($obira_meta['page_revslider']);
} elseif($obira_meta && $obira_banner_type === 'particle-slider') { ?>
	<div class="obra-banner obra-parallax aws-template obra-windowheight" style="<?php echo esc_attr($obira_title_bg); ?>">
	<div class="parallax-overlay" style="background-color:<?php echo esc_attr($obira_overlay_color); ?>;"></div>
  <div id="particles-js" ></div>
    <div class="obra-table-wrap" >
      <div class="obra-table-row-wrap">
        <div class="obra-table-wrap">
          <div class="obra-align-wrap">
            <div class="container">
              <div class="banner-caption">
                <?php
				        	echo do_shortcode($page_banner_shortcode);
				        ?>
              </div>
              <?php if($parallax_arrow_id) { ?>
                <div class="obra-parallax-arrow"><a href="#<?php echo esc_attr($parallax_arrow_id); ?>"><span class="ti-angle-down"></span></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } elseif($obira_meta && $obira_banner_type === 'zapier-banner') { ?>
	<div class="obra-banner obra-parallax zapier-template obra-windowheight" style="<?php echo esc_attr($obira_title_bg); ?>">
    <div class="parallax-overlay" style="background-color:<?php echo esc_attr($obira_overlay_color); ?>;"></div>
    <div class="obra-table-wrap">
      <div class="obra-table-row-wrap">
        <div class="obra-table-wrap">
          <div class="obra-align-wrap">
            <div class="container">
              <div class="banner-caption">
                <?php
                	echo '<h2 class="banner-caption-title">';
                		echo do_shortcode($banner_title);
                	echo '</h2>';
				        	echo do_shortcode($page_banner_shortcode);
				        ?>
                <?php if($parallax_arrow_id) { ?>
	                <div class="obra-parallax-arrow"><a href="#<?php echo esc_attr($parallax_arrow_id); ?>"><span class="ti-angle-down"></span></a></div>
	              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } elseif($obira_meta && $obira_banner_type === 'gmail-banner') { ?>

  <div class="obra-banner obra-parallax obra-windowheight" style="<?php echo esc_attr($obira_title_bg); ?>">
    <div class="obra-table-wrap">
      <div class="obra-table-row-wrap">
        <div class="obra-table-wrap">
          <div class="obra-align-wrap">
            <div class="container">
              <div class="banner-caption">
                <?php
				        	echo do_shortcode($page_banner_shortcode);
				        ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="obra-table-row-wrap obra-template-image">
        <div class="obra-table-wrap">
          <div class="obra-align-wrap">
            <div class="container">
              <div class="template-image-wrap" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="500" data-aos-duration="1000">
                <img src="<?php echo esc_url($banner_featured_image); ?>" alt="<?php echo esc_attr($banner_img_alt); ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="obra-banner-separator"></div>

<?php } else { ?>
	<!-- Banner & Title Area -->
	<div class="obra-page-title <?php echo esc_attr($obira_banner_type); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
    <div class="page-title-wrap <?php echo esc_attr($obira_title_bar_padding); ?>"  style="<?php echo esc_attr($obira_title_bg); ?>">
			<div class="obra-title-overlay" style="background-color:<?php echo esc_attr($obira_overlay_color); ?>;"></div>
      <div class="container">
        <h1 class="page-title"><?php echo obira_title_area(); ?></h1>
        <?php
        if($obira_page_sub_title){
        	echo '<p>'.do_shortcode($obira_page_sub_title).'</p>';
        } else {
        	if ( obira_is_woocommerce_activated() && is_product() ){
        		$product = new WC_Product(get_the_ID());
        		$args = array();
        		$args = apply_filters(
							'wc_price_args', wp_parse_args(
								$args, array(
									'ex_tax_label'       => false,
									'currency'           => '',
									'decimal_separator'  => wc_get_price_decimal_separator(),
									'thousand_separator' => wc_get_price_thousand_separator(),
									'decimals'           => wc_get_price_decimals(),
									'price_format'       => get_woocommerce_price_format(),
								)
							)
						);
        		$price = wc_get_price_including_tax($product);
        		// $dec = wc_get_price_decimals();
        		$unformatted_price = $price;
						$negative          = $price < 0;
						$price             = apply_filters( 'raw_woocommerce_price', floatval( $negative ? $price * -1 : $price ) );
						$price             = apply_filters( 'formatted_woocommerce_price', number_format( $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] ), $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] );

  					$cur = get_woocommerce_currency_symbol();
        		echo '<p>'.esc_html__('Price: ', 'obira').''.$cur.$price.'</p>';
        	} elseif(is_single()) {
          	echo '<p>'.get_the_date().'</p>';
          } else {}
        } ?>
      </div>
    </div>
  </div>
<?php }
