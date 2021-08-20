<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
if( 'portfolio' == get_post_type() ) {
$portfolio_style = cs_get_option('portfolio_style');
$portfolio_limit = cs_get_option('portfolio_limit');
$portfolio_order = cs_get_option('portfolio_order');
$portfolio_orderby = cs_get_option('portfolio_orderby');
$portfolio_pagination = cs_get_option('portfolio_pagination');
$portfolio_filter = cs_get_option('portfolio_filter');
$portfolio_no_space =cs_get_option('portfolio_no_space');
$portfolio_column = cs_get_option('portfolio_column');

	// Style
  $portfolio_style = $portfolio_style === 'bpw-style-two' ? 'bpw-style-two' : 'bpw-style-one';
  $portfolio_column = $portfolio_column ? $portfolio_column : 'bpw-col-3';

  // Portfolio No Space
  $portfolio_no_space = $portfolio_no_space ? 'bpw-no-gutter' : '';
  $portfolio_limit = $portfolio_limit ? $portfolio_limit : '-1';
  $all_portfolio_txt = cs_get_option('all_portfolio_txt');
  $all_portfolio_txt = $all_portfolio_txt ? $all_portfolio_txt : esc_html__( 'All', 'obira' );
?>

  <div class="obra-mid-wrap mid-spacer-three">
    <div class="container">
    <?php
    // Portfolio Filter

    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }
    $category = get_queried_object();

    $args = array(
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'portfolio',
      'posts_per_page' => (int)$portfolio_limit,
      'portfolio_category' => $category->name,
      'orderby' => $portfolio_orderby,
      'order' => $portfolio_order
    );

    $obira_port = new WP_Query( $args ); ?>

    <!-- Portfolio Start -->
    <div class="obra-masonry <?php echo esc_attr($portfolio_style); ?> <?php echo esc_attr($portfolio_column); ?> <?php echo esc_attr($portfolio_no_space); ?>">

      <?php
      if ($obira_port->have_posts()) : while ($obira_port->have_posts()) : $obira_port->the_post();

        // Category
        global $post;
        $terms = wp_get_post_terms($post->ID,'portfolio_category');
        foreach ($terms as $term) {
          $cat_class = ' '.$term->slug.'-item';
        }
        $count = count($terms);
        $i=0;
        $cat_class = '';
        if ($count > 0) {
          foreach ($terms as $term) {
            $i++;
            $cat_class .= ' '.$term->slug.'-item';
            if ($count != $i) {
              $cat_class .= '';
            } else {
              $cat_class .= '';
            }
          }
        }

        // Featured Image
        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $obira_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
        $large_image = $large_image[0];

          if ($portfolio_column === 'bpw-col-2') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '590', '439', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : OBIRA_PLUGIN_ASTS . '/images/590x439.png';
          } elseif ($portfolio_column === 'bpw-col-4') {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '280', '190', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : OBIRA_PLUGIN_ASTS . '/images/280x190.jpg';
          } else {
            if(class_exists('Aq_Resize')) {
              $portfolio_img = aq_resize( $large_image, '376', '280', true );
            } else {$portfolio_img = $large_image;}
            $featured_img = ( $portfolio_img ) ? $portfolio_img : OBIRA_PLUGIN_ASTS . '/images/376x280.png';
          }

        if ($portfolio_style === 'bpw-style-two') { ?>
        <div class="masonry-item direction-hover <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
            <div class="portfolio-item">
              <div class="obra-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($obira_alt); ?>"></div>
              <div class="portfolio-info">
                <div class="obra-table-wrap">
                  <div class="obra-align-wrap">
                    <h4 class="portfolio-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                    <h5 class="portfolio-categories"><span class="portfolio-category">
                      <?php
                        $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                        $i=1;
                        foreach ($category_list as $term) {
                          $term_link = get_term_link( $term );
                          echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
                          if($i++==2) break;
                        }
                      ?>
                    </span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
        <div class="masonry-item <?php echo esc_attr($cat_class); ?>" data-category="<?php echo esc_attr($cat_class); ?>">
            <div class="portfolio-item">
              <div class="obra-image"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr($obira_alt); ?>"></div>
              <div class="portfolio-info">
                <div class="obra-table-wrap">
                  <div class="obra-align-wrap">
                    <h4 class="portfolio-title"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                    <h5 class="portfolio-categories"><span class="portfolio-category">
                      <?php
                        $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
                        $i=1;
                        foreach ($category_list as $term) {
                          $term_link = get_term_link( $term );
                          echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
                          if($i++==2) break;
                        }
                      ?>
                    </span></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php }
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
    <!-- Portfolio End -->
      <?php
      if ($portfolio_pagination) {
      	echo '<div class="obra-pagination">';
        obira_custom_paging_nav($obira_port->max_num_pages,"",$paged);
        echo '</div>';
      } ?>
    </div>
  </div>

<?php
} elseif('team' == get_post_type()) {
  $team_limit = cs_get_option('team_limit');
  $team_column = cs_get_option('team_column');
  $team_order = cs_get_option('team_order');
  $team_orderby = cs_get_option('team_orderby');
  $team_pagination = cs_get_option('team_pagination');

  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }
  $team_limit = $team_limit ? $team_limit : '-1';
  $args = array(
    'paged' => $my_page,
    'post_type' => 'team',
    'posts_per_page' => (int) $team_limit,
    'orderby' => $team_orderby,
    'order' => $team_order,
  );
  $count = 0;
  $obira_team = new WP_Query( $args );
  if ($obira_team->have_posts()) : ?>
  <div class="obra-team-global">
    <div class="container">
    <div class="row">
      <div class="obra-team-mates">
        <?php
          while ($obira_team->have_posts()) : $obira_team->the_post();
            $count++;
            $team_options = get_post_meta( get_the_ID(), 'team_options', true );
            if($team_options) {
              $team_job_position = $team_options['team_job_position'];
              $team_socials = $team_options['team_socials'];
              $team_link = $team_options['team_custom_link'];
            } else {
              $team_job_position = '';
              $team_socials = '';
              $team_link = '';
            }
            if ($team_link) {
              $team_url = $team_link;
            } else {
              $team_url = get_the_permalink();
            }
            // Column
            $team_column = ( $team_column ) ?  $team_column : 'col-3';
            if ($team_column === 'col-4'){
              $col_class = 'col-md-3 col-sm-6 col-12';
            } else {
              $col_class = 'col-md-4 col-sm-6 col-12';
            }

            // Featured Image
            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
            $large_image = $large_image[0];
            $obira_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

            if ($team_column === 'col-4') {
              if(class_exists('Aq_Resize')) {
                $team_img = aq_resize( $large_image, '270', '230', true );
              } else {$team_img = $large_image;}
              $featured_img = ( $team_img ) ? $team_img : OBIRA_PLUGIN_ASTS . '/images/270x230.png';
            } else {
              if(class_exists('Aq_Resize')) {
                $team_img = aq_resize( $large_image, '368', '313', true );
              } else {$team_img = $large_image;}
              $featured_img = ( $team_img ) ? $team_img : OBIRA_PLUGIN_ASTS . '/images/368x313.png';
            }

            ?>
            <div class="<?php echo esc_attr( $col_class ); ?>">
              <div class="mate-item obra-item">
                <div class="obra-image">
                  <img src="<?php echo esc_url( $featured_img ); ?>" alt="<?php echo esc_attr( $obira_alt ); ?>">
                  <div class="obra-social">
                  <?php if($team_socials) { ?>
                    <div class="obra-table-wrap">
                      <div class="obra-align-wrap bottom">
                        <?php foreach ($team_socials as $key => $icon) : ?>
                          <a href="<?php echo esc_url($icon['team_social_link']); ?>">
                            <i class="<?php echo esc_attr($icon['team_social_icon']); ?>"></i>
                          </a>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php } ?>
                  </div>
                </div>
                <div class="mate-info">
                  <h4 class="mate-name"><a href="<?php echo esc_url( $team_url ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                  <?php
                  if ($team_job_position) {
                    echo '<h5 class="mate-designation">'.esc_html($team_job_position).'</h5>';
                  } ?>
                </div>
              </div>
            </div>
            <?php
          endwhile;
        ?>
      </div> <!-- team End -->
      <?php
      endif;

      if ($team_pagination) {
        echo '<div class="obra-pagination">';
        obira_custom_paging_nav($obira_team->max_num_pages,"",$paged);
        echo '</div>';
      }
      wp_reset_postdata();?>

    </div>
  </div>
  </div>
<?php
} else {

  // Theme Options
  $obira_blog_style = cs_get_option('blog_listing_style');
  $obira_blog_columns = cs_get_option('blog_listing_columns');
  $obira_sidebar_position = cs_get_option('blog_sidebar_position');
  $obira_pagi_style = cs_get_option('blog_pagination_style');
  $blog_load_btn_type = cs_get_option('blog_load_btn_type');
  $obira_load_more = cs_get_option('blog_load_more_btn_txt');
  $obira_loader_icon = cs_get_option('blog_loader_icon_option');
  // Metabox
  $obira_id    = ( $post ) ? $post->ID : 0;
  $obira_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $obira_id;
  $obira_id    = ( obira_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $obira_id;
  $obira_meta  = get_post_meta( $obira_id, 'page_type_metabox', true );
  if ($obira_meta) {
    $obira_content_padding = $obira_meta['content_spacings'];
  } else { $obira_content_padding = ''; }
  // Padding - Metabox
  if ($obira_content_padding && $obira_content_padding !== 'padding-none') {
    $obira_content_top_spacings = $obira_meta['content_top_spacings'];
    $obira_content_bottom_spacings = $obira_meta['content_bottom_spacings'];
    if ($obira_content_padding === 'padding-custom') {
      $obira_content_top_spacings = $obira_content_top_spacings ? 'padding-top:'. obira_check_px($obira_content_top_spacings) .';' : '';
      $obira_content_bottom_spacings = $obira_content_bottom_spacings ? 'padding-bottom:'. obira_check_px($obira_content_bottom_spacings) .';' : '';
      $obira_custom_padding = $obira_content_top_spacings . $obira_content_bottom_spacings;
    } else {
      $obira_custom_padding = '';
    }
  } else {
    $obira_custom_padding = '';
  }

  // Columns
  if ($obira_blog_style === 'style-two') {
  	$obira_blog_columns = $obira_blog_columns ? $obira_blog_columns : 'obra-blog-col-2';
  } else {
  	$obira_blog_columns = 'obra-blog-col-1';
  }

  // Style
  if ($obira_blog_style !== 'style-two') {
    $obira_blog_style = ' blog-style-two ';
    $paging_item_select = ' .blog-item';
  } else {
    $obira_blog_style = ' blog-style-one';
    $paging_item_select = ' .obra-item';
  }

  // Sidebar Position
  if ($obira_sidebar_position === 'sidebar-hide') {
  	$obira_layout_class = 'col-md-12';
  	$obira_sidebar_class = 'obra-hide-sidebar';
  } elseif ($obira_sidebar_position === 'sidebar-left') {
  	$obira_layout_class = 'col-md-9';
  	$obira_sidebar_class = 'left-sidebar';
  } else {
  	$obira_layout_class = 'col-md-9';
  	$obira_sidebar_class = 'right-sidebar';
  }
  ?>

  <div class="obra-mid-wrap mid-no-spacer <?php echo esc_attr($obira_content_padding .' '. $obira_sidebar_class); ?>" style="<?php echo esc_attr($obira_custom_padding); ?>">
    <div class="container">
      <div class="row">
        <div class="obra-primary blogs-wrap <?php echo esc_attr($obira_layout_class .$obira_blog_style); ?>">
          <div class="blog-items-wrap obra-post-load-more load-posts <?php echo esc_attr($obira_blog_style); ?>" data-select=".blog-items-wrap" data-item="<?php echo esc_attr($paging_item_select); ?>" data-space="20" data-paging="<?php echo esc_attr($obira_pagi_style); ?>" data-button="<?php echo esc_attr($blog_load_btn_type); ?>" data-loading="<?php echo esc_attr($obira_load_more); ?>" data-iconn="<?php echo esc_attr($obira_loader_icon); ?>">
              <div class="ventre-blog-items">
                <?php
                if ( have_posts() ) :
                  /* Start the Loop */
                  while ( have_posts() ) : the_post();
                    get_template_part( 'layouts/post/content' );
                  endwhile;
                else :
                  get_template_part( 'layouts/post/content', 'none' );
                endif; ?>
              </div>
              <div class="obra-pagination">
                <?php obira_paging_nav(); ?>
              </div>
          </div><!-- Blog Div -->
          <?php
            wp_reset_postdata();  // avoid errors further down the page
          ?>
        </div>
        <?php
          if ($obira_sidebar_position !== 'sidebar-hide') {
            get_sidebar(); // Sidebar
          }
        ?>
      </div>
    </div>
  </div>

<?php }
get_footer();
