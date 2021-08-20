<?php
	if ( class_exists( 'WooCommerce' ) ) :
	global $woocommerce;
	$cart_url = wc_get_cart_url(); ?>
	<div class="cart-link-wrap">
		<a href="<?php echo esc_url( $cart_url ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
			<span class="cart-counter"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'obira' ), WC()->cart->get_cart_contents_count() ); ?>
			</span>
		</a>
	</div><!--/end-->
<?php endif;
