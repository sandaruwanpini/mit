<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'obira_vt_excludeCat' ) ) {
  function obira_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'obira_vt_excludeCat');
}

/* Excerpt Length */
class ObiraExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: obira_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    ObiraExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'ObiraExcerpt::new_length');
    ObiraExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(ObiraExcerpt::$types[ObiraExcerpt::$length]) )
      return ObiraExcerpt::$types[ObiraExcerpt::$length];
    else
      return ObiraExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'obira_excerpt' ) ) {
  function obira_excerpt($length = 55) {
    ObiraExcerpt::length($length);
  }
}

if ( ! function_exists( 'obira_new_excerpt_more' ) ) {
  function obira_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'obira_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'obira_vt_tag_cloud' ) ) {
  function obira_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'obira_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'obira_vt_password_form' ) ) {
  function obira_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'obira_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'obira_vt_maintenance_mode' ) ) {
  function obira_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'obira_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'obira_vt_footer_widgets' ) ) {
  function obira_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

if( ! function_exists( 'obira_vt_top_bar' ) ) {
  function obira_vt_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="obra-topbar"><div class="container"><div class="row">';
      $out .= obira_vt_top_bar_modules( 'left' );
      $out .= obira_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'obira_wp_link_pages' ) ) {
  function obira_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'obira' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'obira_post_metas' ) ) {
  function obira_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="blog-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide ?>
    <div class="pull-left">
    <?php
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ' );
        if ( $category_list ) {
          echo '<div class="blog-category">'. esc_html__('In ', 'obira') . $category_list .' </div>';
        }
      } ?>
      </div>
    <?php
    } // Category Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <div class="pull-right">
      <?php
      printf(
        '<span>'. esc_html__('by', 'obira') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </div>
    <?php } ?>
  </div>
  <?php
  }
}

/* Author Info */
if ( ! function_exists( 'obira_author_info' ) ) {
  function obira_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'About author', 'obira' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="author-info-title"><?php echo esc_html($author_text); ?></div>
  <div class="obra-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>><?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?></a>
    </div>
    <div class="author-content">
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_html(get_the_author_meta('first_name')).' '.esc_html(get_the_author_meta('last_name')); ?></a>
      <p><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
      <div class="obra-social">
        <?php if (get_the_author_meta( 'facebook' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank" class="facebook">
          <i class="fa fa-facebook-official"></i>
        </a><?php endif;
        if (get_the_author_meta( 'twitter' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank" class="twitter">
          <i class="fa fa-twitter-square"></i>
        </a><?php endif;
        if (get_the_author_meta( 'linkedin' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>" target="_blank" class="linkedin">
          <i class="fa fa-linkedin-square"></i>
        </a><?php endif;
        if (get_the_author_meta( 'pinterest' )): ?>
        <a href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>" target="_blank" class="google">
          <i class="fa fa-pinterest-square"></i>
        </a><?php endif; ?>
      </div>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'obira_comment_modification' ) ) {
  function obira_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="obra-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?></h4>
        <span class="comments-date">
          <?php echo get_comment_date('d M Y'); echo ' - '; ?>
          <span class="caps"><?php echo get_comment_time(); ?></span>
        </span>

      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'obira' ); ?></em>
      <?php endif; ?>
      <div class="comment-area">
        <?php comment_text(); ?>
        <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply', 'obira') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
        </div>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Comments Form - Textarea next to Normal Fields */
if( ! function_exists( 'obira_move_comment_field' ) ) {
  add_filter( 'comment_form_fields', 'obira_move_comment_field' );
  function obira_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
  }
}

/* Title Area */
if ( ! function_exists( 'obira_title_area' ) ) {
  function obira_title_area() {

    global $post, $wp_query;

    // Get post meta in all type of WP pages
    $obira_id    = ( $post ) ? $post->ID : 0;
    $obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
    $obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
    $obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
    if ($obira_meta && (!is_archive() || obira_is_woocommerce_shop())) {
      $custom_title = $obira_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_html($custom_title);
    } elseif ( is_home() ) {
      bloginfo('name');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for "%s"', 'obira' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'obira'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'obira' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'obira' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'obira' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'obira' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_shop() ) {
        esc_html_e( 'Shop', 'obira' );
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'obira' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'obira');
    } else {
      the_title();
    }

  }
}

/* Pre Loader */
if ( ! function_exists( 'obira_pre_loader' ) ) {
  function obira_pre_loader() {
    $obira_pre_loader = cs_get_option('pre_loader');
    $obira_loader_style = cs_get_option('pre_loader_option');

    if (!$obira_pre_loader) {} else {
      if($obira_loader_style){
        $obira_loader_class = $obira_loader_style;
      } else{
        $obira_loader_class = '';
      }
    ?>
        <div class="obra-preloader">
          <div class="loader-wrap">
            <div class="obra-loader">
              <div class="loader-inner <?php echo esc_attr($obira_loader_class); ?>"></div>
            </div>
          </div>
        </div>
      <?php
    }
  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'obira_paging_nav' ) ) {
  function obira_paging_nav($nav_query = NULL) {
    if ( function_exists('wp_pagenavi')) {
      echo '<div class="obra-pagenavi">';
        wp_pagenavi();
      echo '</div>';
    } else {
      global $wp_query;
      $big = 999999999;
      $current = max( 1, get_query_var('paged') );
      $total = ($nav_query != NULL) ? $nav_query->max_num_pages : $wp_query->max_num_pages;

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo '<div class="obra-pagenavi">';
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => '<i class="fa fa-long-arrow-left"></i> ',
        'next_text' => ' <i class="fa fa-long-arrow-right"></i>',
        'current' => $current,
        'total' => $total,
        'type' => 'plain'
      ));
      echo '</div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/**
 * Custom Pagination Function
 */
if ( ! function_exists( 'obira_custom_paging_nav' ) ) {
  function obira_custom_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
    <div class="obra-pagenavi">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'current' => $paged,
        'total' => $numpages,
        'type' => 'list'
      )); ?>
  </div>
<?php
  }
}
/* Added next class to wp-pagenavi*/
add_filter('wp_pagenavi_class_nextpostslink', 'obira_pagination_nextpostslink_class');
function obira_pagination_nextpostslink_class($class_name) {
  return 'next';
}

// single pagination portfolio
if ( ! function_exists( 'obira_portfolio_next_prev' ) ) {
function obira_portfolio_next_prev() {
  global $post;
    $p_home_url = cs_get_option('portfolio_home_url');
    $p_home_url = $p_home_url ? $p_home_url : esc_url(home_url('/'));
    $next_port = cs_get_option('next_port');
    $prev_port = cs_get_option('prev_port');
    $previous_project = $prev_port ? $prev_port : esc_html__( 'Prev Project', 'obira' );
    $next_project = $next_port ? $next_port : esc_html__( 'Next Project', 'obira' );
    ?>
    <div class="portfolio-controls">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-4">
        <?php $prev_post = get_adjacent_post(false, '', true);
        if(!empty($prev_post)) {
          echo'<a href="' . esc_url(get_permalink($prev_post->ID)) . '"><i class="fa fa-angle-left" aria-hidden="true"></i> <span class="control-link-title">'.esc_attr($previous_project).'</span></a>';
        } ?>
      </div>
      <div class="col-md-6 col-sm-6 col-4 text-center">
        <a href="<?php echo esc_url( $p_home_url ); ?>" class="grid-view-link">
          <span class="grid-view-square"></span>
          <span class="grid-view-square"></span>
        </a>
      </div>
      <div class="col-md-3 col-sm-3 col-4 text-right">
        <?php $next_post = get_adjacent_post(false, '', false);
        if(!empty($next_post)) {
          echo'<a href="' . esc_url(get_permalink($next_post->ID)) . '"><span class="control-link-title">'.esc_attr($next_project).'</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a>';
        } ?>
      </div>
    </div>
  </div>
<?php
}
}

// information portfolio
if ( ! function_exists( 'obira_portfolio_information_meta' ) ) {
function obira_portfolio_information_meta( $meta_name, $meta_id ) {
    global $post;
    $portfolio_meta  = get_post_meta( $post->ID, $meta_name, true );
    $informations = $portfolio_meta[$meta_id];
    if ($informations) {
      $infos = $informations;
    } else {
      $infos = array();
    } ?>
      <div class="portfolio-detail-items">
        <?php
        foreach ( $infos as $key => $information ) {
          $meta_info = explode('<br>', nl2br($information['meta_info'], false));
          $meta_url = explode('<br>', nl2br($information['info_url'], false));

          if(!empty($information['info_url'])) {
            $meta_i = count($meta_info);
            $meta_u = count($meta_url);
            if ($meta_i > $meta_u) {
              $meta_info = array_slice($meta_info, 0, count($meta_url));
            } elseif($meta_u > $meta_i) {
              $meta_url = array_slice($meta_url, 0, count($meta_info));
            } else {
              $meta_info = $meta_info;
              $meta_url = $meta_url;
            }
            $totlal_info = array_combine($meta_info, $meta_url);
            ?>
            <div class="portfolio-detail-item">
              <span class="portfolio-detail-title"><?php echo esc_html($information['title']); ?></span>
                <?php foreach ($totlal_info as $info => $url) {  ?>
                <span class="portfolio-service"><a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a></span>
                <?php } ?>
            </div>
          <?php
          } else { ?>
          <div class="portfolio-detail-item">
            <span class="portfolio-detail-title"><?php echo esc_html($information['title']); ?></span>
            <?php foreach ($meta_info as $key => $info) { ?>
              <?php echo trim($info); ?>
            <?php } ?>
          </div>
          <?php
          }
        } ?>
      </div>
<?php
}
}

// Custom Post Per Page
function obira_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'portfolio' ) ) {
    if ( is_post_type_archive('portfolio') ) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';
      if ( $query->query_vars['post_type'] == 'portfolio' ) $query->query_vars['posts_per_page'] = $portfolio_limit;
    }
  }
  if (is_tax('portfolio_category')) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';
      $query->set('posts_per_page', $portfolio_limit);
    }
  // Team
  if ( post_type_exists( 'team' ) ) {
    if ( is_post_type_archive('team') ) {
      $team_limit = cs_get_option('team_limit');
      $team_limit = $team_limit ? $team_limit : '-1';
      if ( $query->query_vars['post_type'] == 'team' ) $query->query_vars['posts_per_page'] = $team_limit;
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'obira_custom_posts_per_page' );
