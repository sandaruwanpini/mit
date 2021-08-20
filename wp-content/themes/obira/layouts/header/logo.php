<?php
// Logo Image
$obira_brand_logo_default = cs_get_option('brand_logo_default');
$obira_brand_logo_retina = cs_get_option('brand_logo_retina');

// Mobile Logo
$obira_mobile_logo = cs_get_option('mobile_logo_retina');
$obira_mobile_width = cs_get_option('mobile_logo_width');
$obira_mobile_height = cs_get_option('mobile_logo_height');
$obira_mobile_logo_top = cs_get_option('mobile_logo_top');
$obira_mobile_logo_bottom = cs_get_option('mobile_logo_bottom');
$obira_mobile_class = $obira_mobile_logo ? ' hav-mobile-logo' : ' dhve-mobile-logo';

$mobile_height_actual = $obira_mobile_height ? 'height ='.$obira_mobile_height.'' : '';
$mobile_width_actual = $obira_mobile_width ? 'width ='.$obira_mobile_width.'' : '';

// Transparent Header Logos
$obira_transparent_logo = cs_get_option('transparent_logo_default');
$obira_transparent_retina = cs_get_option('transparent_logo_retina');

// Metabox - Header Transparent
global $post;
$obira_id    = ( $post ) ? $post->ID : false;
$obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
$obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
$obira_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $obira_id : false;
$obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
if ($obira_meta) {
  $obira_transparent_header = $obira_meta['transparency_header'];
} else {
	$obira_transparent_header = cs_get_option('transparency_header');
}
if ($obira_meta && $obira_transparent_header != 'default') {
    $obira_transparent_header  = $obira_meta['transparency_header'];
  } else {
    $obira_transparent_header  = cs_get_option('transparency_header');
  }
if ($obira_meta && $obira_meta['obra_page_logo'] ) {
  $logo_image = $obira_meta['obra_page_logo'];
} else {
  $logo_image = '';
}
if ($obira_meta && $obira_meta['obra_page_retina_logo'] ) {
  $retina_logo_image = $obira_meta['obra_page_retina_logo'];
  $meta_retina_logo_image = wp_get_attachment_image_src($obira_meta['obra_page_retina_logo']);
} else {
  $retina_logo_image = '';
  $meta_retina_logo_image = '';
}

if ($retina_logo_image) {
  $retina_logo_image = $retina_logo_image;
  $meta_retina_logo_width = $meta_retina_logo_image[1]/2;
  $meta_retina_logo_height = $meta_retina_logo_image[2]/2;
} else {
  $retina_logo_image = $logo_image;
  $meta_retina_logo_width = '';
  $meta_retina_logo_height = '';
}

// Retina Size
$obira_retina_width = cs_get_option('retina_width');
$obira_retina_height = cs_get_option('retina_height');

$retina_height_actual = $obira_retina_height ? 'height ='.$obira_retina_height.'' : '';
$retina_width_actual = $obira_retina_width ? 'width ='.$obira_retina_width.'' : '';

$transparent_logo_class = $obira_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$trans_retina_logo_class = $obira_transparent_retina ? ' hav-trans-retina' : ' dhav-trans-retina';

$obira_logo_default_cls = $obira_brand_logo_default ? ' hav-default-logo' : ' dhav-default-logo';
$obira_default_retina_cls = $obira_brand_logo_retina ? ' hav-d-retina-logo' : ' dhav-d-retina-logo';

// Logo Spacings
$obira_brand_logo_top = cs_get_option('brand_logo_top');
$obira_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($obira_mobile_logo_top) {
  $obira_brand_logo_top = 'padding-top:'. obira_check_px($obira_mobile_logo_top) .';';
} elseif ($obira_brand_logo_top) {
  $obira_brand_logo_top = 'padding-top:'. obira_check_px($obira_brand_logo_top) .';';
} else { $obira_brand_logo_top = ''; }
if ($obira_mobile_logo_bottom) {
  $obira_brand_logo_bottom = 'padding-bottom:'. obira_check_px($obira_mobile_logo_bottom) .';';
} elseif ($obira_brand_logo_bottom) {
  $obira_brand_logo_bottom = 'padding-bottom:'. obira_check_px($obira_brand_logo_bottom) .';';
} else { $obira_brand_logo_bottom = ''; }

if($logo_image){
  $meta_logo_cls = ' hav-meta-logo';
} else {
  $meta_logo_cls = ' dhav-meta-logo';
}
if($retina_logo_image) {
  $meta_retina_logo_cls = ' hav-meta-retina';
} else {
  $meta_retina_logo_cls = ' dhav-meta-retina';
}

$meta_logo_height = 'height ='.$meta_retina_logo_height;
$meta_logo_width = 'width ='.$meta_retina_logo_width;
?>
<div class="obra-brand <?php echo esc_attr($obira_mobile_class); ?> <?php echo esc_attr($transparent_logo_class . $trans_retina_logo_class .$obira_logo_default_cls .$obira_default_retina_cls .$meta_logo_cls .$meta_retina_logo_cls); ?>" style="<?php echo esc_attr($obira_brand_logo_top); echo esc_attr($obira_brand_logo_bottom); ?>">
  <?php
    if($logo_image){
      echo '<a href="'.esc_url(home_url( '/' )).'" class="obra-logo default-logo meta-default-logo"><img src="'. esc_url(wp_get_attachment_url($logo_image)) .'" alt="'. esc_attr(get_bloginfo('name')) .'" '. esc_attr($obira_retina_width_actual) .''. esc_attr($obira_retina_height_actual) .'></a>';
    }
    if($retina_logo_image) {
      echo '<a href="'.esc_url(home_url( '/' )).'" class="obra-logo retina-logo meta-retina-logo"><img src="'. esc_url(wp_get_attachment_url($retina_logo_image)) .'" alt="'. esc_attr(get_bloginfo('name')) .'" '. esc_attr($obira_retina_width_actual) .''. esc_attr($obira_retina_height_actual) .'></a>';
    }

    if(!$logo_image && $retina_logo_image){
      echo '<a href="'.esc_url(home_url( '/' )).'" class="obra-logo default-logo meta-default-logo"><img src="'. esc_url(wp_get_attachment_url($retina_logo_image)) .'" alt="'. esc_attr(get_bloginfo('name')) .'" '. esc_attr($meta_logo_width) .' '. esc_attr($meta_logo_height) .'></a>';
    } ?>
	<a href="<?php echo esc_url(home_url( '/' )); ?>" class="obra-theme-logos">
		<?php
    if ( $obira_transparent_header === 'transparent' ) {

      if ( $obira_transparent_logo ) {

        if ( $obira_transparent_retina ) {
          echo '<img src="'. esc_url( wp_get_attachment_url( $obira_transparent_retina ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="retina-logo transparent-logo">';
        }

        echo '<img src="'. esc_url( wp_get_attachment_url( $obira_transparent_logo ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="default-logo transparent-logo">';

      } elseif ( $obira_brand_logo_default ) {

        if ($obira_brand_logo_retina) {
          echo '<img src="'. esc_url( wp_get_attachment_url( $obira_brand_logo_retina ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="retina-logo">';
        }

        echo '<img src="'. esc_url( wp_get_attachment_url( $obira_brand_logo_default ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="default-logo">';

      } else { echo '<div class="text-logo">'. esc_html(get_bloginfo( 'name' )) . '</div>'; }

    } elseif ( $obira_brand_logo_default ) {

      if ($obira_brand_logo_retina) {
        echo '<img src="'. esc_url( wp_get_attachment_url( $obira_brand_logo_retina ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="retina-logo">';
      }

      echo '<img src="'. esc_url( wp_get_attachment_url( $obira_brand_logo_default ) ) .'" '.esc_attr($retina_width_actual).' '.esc_attr($retina_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="default-logo">';

    } else { echo '<div class="text-logo">'. esc_html( get_bloginfo( 'name' ) ) . '</div>'; }
		if ($obira_mobile_logo) {
			echo '<img src="'. esc_url(wp_get_attachment_url($obira_mobile_logo)) .'" '.esc_attr($mobile_width_actual).' '.esc_attr($mobile_height_actual).' alt="'. esc_attr(get_bloginfo('name')) .'" class="mobile-logo">';
		}
	echo '</a>';
	?>
</div>
<?php
