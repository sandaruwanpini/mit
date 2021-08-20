<?php
  $search_txt = cs_get_option('search_txt');
  $search_btn_txt = cs_get_option('search_btn_txt');
  $search_txt = $search_txt ? $search_txt : esc_html__( 'Search for...', 'obira' );
  $search_btn_txt = $search_btn_txt ? $search_btn_txt : esc_html__( 'Search', 'obira' );
?>
<div class="search-link-wrap">
  <a href="javascript:void(0);" class="search-link search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
  <a href="javascript:void(0);" class="close-icon"><i class="ti-close" aria-hidden="true"></i></a>
  <div class="search-box">
      <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
			<p>
        <input name="s" placeholder="<?php echo esc_attr($search_txt); ?>" type="text">
        <input value="<?php echo esc_attr($search_btn_txt); ?>" class="wpcf7-form-control wpcf7-submit submit-one hover-one" type="submit">
      </p>
		</form>
  </div>
</div>
<?php
