<?php
	$search_txt = cs_get_option('search_txt');
	$search_txt = $search_txt ? $search_txt : esc_html__( 'Search Here', 'obira' );
?>

<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
 <p >
  <input type="text" name="s" id="s" placeholder="<?php echo esc_attr($search_txt); ?>" />
  <input type="submit" id="searchsubmit" value="" />
 </p >
</form>
