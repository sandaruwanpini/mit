<?php
	// Main Text
	$obira_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($obira_footer_copyright_layout === 'copyright-1') {
		$obira_copyright_layout_class = 'col-sm-6 pull-left';
		$obira_copyright_seclayout_class = 'col-sm-6 pull-right';
	} elseif ($obira_footer_copyright_layout === 'copyright-2') {
		$obira_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$obira_copyright_seclayout_class = 'col-sm-6 pull-left';
	} elseif ($obira_footer_copyright_layout === 'copyright-3') {
		$obira_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$obira_copyright_layout_class = '';
		$obira_copyright_seclayout_class = '';
	}
?>

<!-- Copyright Bar -->
<div class="obra-copyright">
  <div class="container">
	  <div class="row">
	    <div class="<?php echo esc_attr($obira_copyright_layout_class); ?>">
	      <div class="copyright-wrap">
	      	<?php
						$obira_copyright_text = cs_get_option('copyright_text');
						if($obira_copyright_text){
							echo '<p>'. do_shortcode($obira_copyright_text) .'</p>';
						} else { ?>
							&copy; <?php echo date('Y'); ?><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e(' VictorThemes', 'obira') ?></a>
						<?php }
					?>
	      </div>
	    </div>
	    <?php if ($obira_footer_copyright_layout != 'copyright-3') { ?>
	    <div class="<?php echo esc_attr($obira_copyright_seclayout_class); ?>">
	      <?php
					$obira_secondary_text = cs_get_option('secondary_text');
					echo do_shortcode($obira_secondary_text);
				?>
	    </div>
	    <?php } ?>
	  </div>
  </div>
</div>
<!-- Copyright Bar -->
<?php
