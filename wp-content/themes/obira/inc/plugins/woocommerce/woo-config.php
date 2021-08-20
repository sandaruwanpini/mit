<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	* Insert the opening anchor tag for products in the loop.
	*/
	function obira_product_wrap_open() {
		echo '<div class="product-wrap obra-item">';
	}
	add_action( 'obira_open_wrap', 'obira_product_wrap_open', 1 );

	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function obira_product_wrap_close() {
		echo '</div>';
	}
	add_action( 'obira_close_wrap', 'obira_product_wrap_close', 1 );

	// Remove the product rating display on product loops
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

  /* Remove Product Title action and added with h4 tag */
  remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

  if ( ! function_exists( 'obira_template_loop_product_title' ) ) {

		/**
		 * Show the product title in the product loop. By default this is an H2.
		 */
		function obira_template_loop_product_title() {
			global $product;
			$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

			echo '<a href="' . esc_url( $link ) . '"><h4 class="woocommerce-loop-product__title">' . esc_html(get_the_title()) . '</h4></a>';
		}
	}
	add_action( 'woocommerce_shop_loop_item_title', 'obira_template_loop_product_title', 10 );

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'obira_product_limit', 20 );
	if ( ! function_exists('obira_product_limit') ) {
	  function obira_product_limit() {
	    $woo_limit = cs_get_option('theme_woo_limit');
	    $woo_limit = $woo_limit ? $woo_limit : '12';
	    return $woo_limit;
	  }
	}

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'obira_hide_page_title' );
	function obira_hide_page_title() {
		return false;
	}

	// Add to cart text
	function obira_add_to_cart_text_change() {

		// Add To Cart Change Text
		add_filter( 'woocommerce_product_single_add_to_cart_text', 'obira_woo_add_cart_button' ); // 2.1 +
		function obira_woo_add_cart_button() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Bag', 'obira');
			}
			return $woo_cart;
		}

		add_filter( 'woocommerce_product_add_to_cart_text' , 'obira_product_add_to_cart' );
		function obira_product_add_to_cart() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add to cart', 'obira');
			}
			global $product;
			$grouped = $product->is_type( 'grouped' );
			$variable = $product->is_type( 'variable' );
			if ($grouped) {
				$button_text = esc_html__( 'View', 'obira' );
			} elseif($variable) {
				$button_text = esc_html__( 'Select Option', 'obira' );
			} else {
				$button_text = $woo_cart;
			}
			return $button_text;
		}

	} // Function OT
	add_action( 'after_setup_theme', 'obira_add_to_cart_text_change' );

	// Define image sizes
	function obira_woo_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
  	$catalog = array(
			'width' 	=> '270',
			'height'	=> '330',
			'crop'		=> 1
		);
		$single = array(
			'width' 	=> '415',
			'height'	=> '500',
			'crop'		=> 1
		);
		$thumbnail = array(
			'width' 	=> '57',
			'height'	=> '70',
			'crop'		=> 1
		);
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'obira_woo_image_dimensions', 1 );

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'obira_single_product_gallery_image' );
	function obira_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'obira_related_products_args' );
  function obira_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
  	if ($woo_related_limit) {
			$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		} else {
			$args['posts_per_page'] = 4; // 4 related products
		}
		return $args;
	}

	// Single Product Share Option
	if ( ! function_exists( 'woocommerce_single_share' ) ) {
		function woocommerce_single_share() { ?>
			<div class="obra-share-product">
			  <div class="container">
				  <?php 
					  if ( function_exists( 'obira_product_share_option' ) ) {
							echo obira_product_share_option();
						}
					?>
			  </div>
			</div>
	<?php
		}
	}
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_single_share' );


  // Remove You May Also Like section
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if($woo_single_upsell) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}
	// Remove You May Also Like section in single product page

  // Remove Related Products section
  $woo_single_related = cs_get_option('woo_single_related');
  if($woo_single_related) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  }

	// Product thumbnail column set to 1
	add_filter( 'woocommerce_product_thumbnails_columns', 'obira_single_gallery_columns', 99 );
	function obira_single_gallery_columns() {
	 return 1;
	}

	/**
	* Add new register fields for WooCommerce registration.
	*/
	function obira_extra_register_fields() { ?>

	 <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	   <label for="reg_billing_first_name"><?php esc_html_e( 'First name', 'obira' ); ?><span class="required">*</span></label>
	   <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr( $_POST['billing_first_name'] ); ?>" />
	 </p>
	 <div class="clear"></div>
	<?php
	}
	add_action( 'woocommerce_register_form_start', 'obira_extra_register_fields' );

	/**
	* Validate the extra register fields.
	*/
	function obira_validate_extra_register_fields( $username, $email, $validation_errors ) {

		if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		  $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'obira' ) );
		}

	}
	add_action( 'woocommerce_register_post', 'obira_validate_extra_register_fields', 10, 3 );

	/**
	* Save the extra register fields.
	*/
	function obira_save_extra_register_fields( $customer_id ) {

		if ( isset( $_POST['billing_first_name'] ) ) {

			// WordPress default first name field.
			update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

			// WooCommerce billing first name.
			update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
		}

	}
	add_action( 'woocommerce_created_customer', 'obira_save_extra_register_fields' );

} // class_exists => WooCommerce
