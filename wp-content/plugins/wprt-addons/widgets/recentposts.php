<?php
class WPRT_recent_news extends WP_Widget {
    // Holds widget settings defaults, populated in constructor.
    protected $defaults;

    // Constructor
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Recent Posts', 
            'category'  => '',
            'count'     => 3,
            'bottom_margin' => '20px',
            'thumb_width' => '78px',
            'thumb_style' => 'hide',
            'thumb_right_margin' => '18px',
            'title_size' => '',
            'title_color' => '',
            'border_color' => '',
            'date_color' => '',
            'show_date' => 'on',
            'excerpt_length' => '0',
            'title_length' => '6'
        );

        parent::__construct(
            'widget_news_post',
            esc_html__( 'Recent Posts Advanced', 'ambersix' ),
            array(
                'classname'   => 'widget_recent_posts',
                'description' => esc_html__( 'Display recent blog posts.', 'ambersix' )
            )
        );
    }

    // Display widget
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );

        echo $before_widget;

        if ( ! empty( $title ) ) { echo $before_title . $title . $after_title; }

        $bottom_margin = intval( $bottom_margin );
        $thumb_width = intval( $thumb_width );
        $thumb_right_margin = intval( $thumb_right_margin );
        $title_size = intval( $title_size );

        $item_css = '';
        if ( ! empty( $bottom_margin ) )
            $item_css .= 'padding-bottom:'. $bottom_margin/2 .'px;margin-bottom:'. $bottom_margin/2 .'px';

        if ( ! empty( $border_color ) )
            $item_css .= ';border-color:'. $border_color;

        $icon_css = $thumb_css = '';
        if ( isset( $thumb_width ) ) {
            $thumb_css .= 'width:'. $thumb_width .'px;height:'. $thumb_width .'px;';
            $icon_css .= 'width:'. $thumb_width .'px;height:'. $thumb_width .'px;line-height:'. $thumb_width .'px;';
        }

        if ( isset( $thumb_right_margin ) )
            $thumb_css .= ';margin-right:'. $thumb_right_margin .'px';

        $title_css = '';
        if ( ! empty( $title_size ) )
            $title_css .= 'font-size:'. $title_size .'px';

        if ( ! empty( $title_color ) )
            $title_css .= ';color:'. $title_color;

        $date_css = '';
        if ( ! empty( $date_color ) )
            $date_css .= 'color:'. $date_color;

        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => intval($count)
        );

        if ( ! empty( $category ) )
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms'    => $category,
                ),
            );             
       
        $query = new WP_Query( $query_args ); ?>

        <ul class="recent-news clearfix">
		<?php $i = 0; if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
				<li class="clearfix" style="<?php echo esc_attr( $item_css ); ?>">
                    <?php if ( $thumb_width ) : ?>
                    <div class="thumb <?php echo esc_attr( $thumb_style ); ?>" style="<?php echo esc_attr( $thumb_css ); ?>">
                        <?php

                            $size = 'ambersix-post-widget';

                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( $size );
                            } elseif ( get_post_format() == 'gallery' ) {
                                $images = ambersix_metabox( 'gallery_images', "type=image&size=$size" );
                                
                                if ( ! empty( $images ) ) {
                                    foreach ( $images as $image ) {
                                        if ( $image === reset( $images ) )
                                        printf( '<img src="%s" alt="gallery">', esc_url( $image['url'] ) );
                                    }
                                }
                            }
                        ?>
                    </div>
                    <?php endif; ?>
                    <?php 
                    $excerpt = '';
                    $title = get_the_title();
                    if ( !empty( $title_length ) ) {
                        $title = ambersix_trim_words( $title, $title_length );
                    }

                    if ( !empty( $excerpt_length ) ) {
                        $excerpt = sprintf('<div class="excerpt">%1$s</div>', wp_trim_words( get_the_content(), $excerpt_length, '...' ) );
                    }

                    $date = ''; 
                    if ( !empty( $show_date ) ) {
                        $date = sprintf('
                            <span class="post-date" style="%2$s"><span class="entry-date">%1$s</span></span>',
                            get_the_date(),
                            esc_attr( $date_css )
                        );
                    }

                    printf( '
                        <div class="texts">%4$s<h3><a href="%1$s" style="%5$s">%2$s</a></h3>%3$s</div>',
                        esc_url( get_the_permalink() ),
                        $title,
                        $excerpt,
                        $date,
                        esc_attr( $title_css )
                    );
                    ?>
                </li>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>        
        </ul>
        
		<?php echo $after_widget;
    }

    // Update widget
    function update( $new_instance, $old_instance ) {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['bottom_margin']         = strip_tags( $new_instance['bottom_margin'] );
        $instance['thumb_width']         = strip_tags( $new_instance['thumb_width'] );
        $instance['thumb_right_margin'] = strip_tags( $new_instance['thumb_right_margin'] );
        $instance['title_size']         = strip_tags( $new_instance['title_size'] );
        $instance['title_color']         = strip_tags( $new_instance['title_color'] );
        $instance['date_color']         = strip_tags( $new_instance['date_color'] );
        $instance['border_color']         = strip_tags( $new_instance['border_color'] );
        $instance['bottom_margin']         = strip_tags( $new_instance['bottom_margin'] );
        $instance['category']       = array_filter( $new_instance['category'] );
        $instance['count']          = intval( $new_instance['count'] );
        $instance['excerpt_length']  = intval( $new_instance['excerpt_length'] );
        $instance['title_length']  = intval( $new_instance['title_length'] );
        $instance[ 'show_date' ] = $new_instance[ 'show_date' ];
        $instance[ 'thumb_style' ] = $new_instance[ 'thumb_style' ];

        return $instance;
    }

    // Widget setting
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );       
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ambersix' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'ambersix' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'ambersix' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]">
                <option value=""<?php selected( empty( $instance['category'] ) ); ?>><?php esc_html_e( 'All', 'ambersix' ); ?></option>
                <?php               
                $categories = get_categories();
                foreach ( $categories as $category ) {
                    printf(
                        '<option value="%1$s" %4$s>%2$s (%3$s)</option>',
                        esc_attr( $category->term_id ),
                        $category->name,
                        $category->count,
                        ( in_array( $category->term_id, $instance['category'] ) ) ? 'selected="selected"' : '');
                }               

                ?>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e( 'Title Word Count Length (ex: 4):', 'ambersix' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>" value="<?php echo esc_attr( $instance['title_length'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>"><?php esc_html_e( 'Excerpt Word Count Length (ex: 4):', 'ambersix' ); ?></label>
            <input class="widefat" type="number" id="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt_length' ) ); ?>" value="<?php echo esc_attr( $instance['excerpt_length'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'bottom_margin' ) ); ?>"><?php esc_html_e('Item Bottom Margin:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bottom_margin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bottom_margin' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['bottom_margin'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'thumb_style' ) ); ?>"><?php esc_html_e( 'Thumbnail', 'ambersix' ); ?></label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'thumb_style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_style' ) ); ?>">
                <option value="hide" <?php selected( 'hide', $instance['thumb_style'] ); ?>><?php esc_html_e( 'Hide', 'ambersix' ) ?></option>
                <option value="show" <?php selected( 'show', $instance['thumb_style'] ); ?>><?php esc_html_e( 'Show', 'ambersix' ) ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'thumb_width' ) ); ?>"><?php esc_html_e('Thumbnail Width:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumb_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_width' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['thumb_width'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'thumb_right_margin' ) ); ?>"><?php esc_html_e('Thumbnail Right Margin:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumb_right_margin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_right_margin' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['thumb_right_margin'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title_size' ) ); ?>"><?php esc_html_e('Title Size (ex: 18px):', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_size' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['title_size'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title_color' ) ); ?>"><?php esc_html_e('Title Color (ex: #e3e3e3):', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_color' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['title_color'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'date_color' ) ); ?>"><?php esc_html_e('Date Color (ex: #303030):', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'date_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date_color' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['date_color'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'border_color' ) ); ?>"><?php esc_html_e('Border Color (ex: #303030):', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'border_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_color' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['border_color'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Show Date:', 'ambersix' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_date' ], 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" /> 
        </p>
    <?php
    }
}
add_action( 'widgets_init', 'register_ambersix_recent_news' );

// Register widget
function register_ambersix_recent_news() {
    register_widget( 'WPRT_recent_news' );
}


