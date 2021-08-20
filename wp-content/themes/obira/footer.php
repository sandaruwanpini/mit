<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$obira_id    = ( $post ) ? $post->ID : 0;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );

if ($obira_meta) {
	$obira_hide_footer  = $obira_meta['hide_footer'];
	$obira_hide_copyright  = $obira_meta['hide_copyright'];
} else {
	$obira_hide_footer = '';
	$obira_hide_copyright = '';
}

?>
</div>
	<footer class="obra-footer">
		<?php
		if ($obira_hide_footer) {} else {
			$footer_widget_block = cs_get_option('footer_widget_block');
			if ($footer_widget_block) {
	   		get_template_part( 'layouts/footer/footer', 'widgets' );
	  	}
	  }
    if ($obira_hide_copyright) {} else {
	    $need_copyright = cs_get_option('need_copyright');
	    if ($need_copyright) {
	    	get_template_part( 'layouts/footer/footer', 'copyright' );
	    }
	  }
    ?>
	</footer>
</div>

	<?php obira_pre_loader(); ?>
</div><!-- #vtheme-wrapper -->
</div>
<?php wp_footer(); ?>
</body>
</html>
<?php
