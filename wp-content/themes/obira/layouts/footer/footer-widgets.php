<!-- Footer Widgets -->
<?php if (is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) { if(!is_404()) {	?>
		<div class="obra-footer-wrap">
		  <div class="container">
		    <div class="row">
		      <?php echo obira_vt_footer_widgets(); ?>
		    </div>
		  </div>
		</div>
<!-- Footer Widgets -->
<?php } }
