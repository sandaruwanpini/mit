<?php
class WPRT_Socials extends WP_Widget {
    // Holds widget settings defaults, populated in constructor.
    protected $defaults;

    // Constructor
    function __construct() {
        $this->defaults = array(
            'title' 	=> '',
            'width' => '',
            'height' => '',
            'gap' => '',
            'size' => '',
            'rounded' => '',
            'twitter' => '', 
            'facebook' => '', 
            'youtube' => '', 
            'vimeo' => '', 
            'tumblr' => '', 
            'pinterest' => '',
            'linkedin' => '',
            'instagram' => '', 
            'github' => '',
            'apple' => '',
            'android' => '',
            'behance' => '',
            'dribbble' => '',
            'flickr' => '',
            'paypal' => '',
            'soundcloud' => '',
            'spotify' => '',
        );

        parent::__construct(
            'widget_socials',
            esc_html__( 'Socials', 'ambersix' ),
            array(
                'classname'   => 'widget_socials',
                'description' => esc_html__( 'Display the socials.', 'ambersix' )
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

        $width = intval( $width );
        $height = intval( $height );
        $gap = intval( $gap );
        $size = intval( $size );
        $rounded = intval( $rounded );

        $icon_bottom = 10;
        $css = '';
        $inner_css = '';
        if ( ! empty( $gap ) ) {
            $inner_css = 'padding: 0 '. ($gap/2) .'px;';
            $css = 'margin: 0 -'. ($gap/2) .'px';
            $icon_bottom = $gap/2;
        }

        $icon_css = 'margin-bottom:'. $icon_bottom .'px';
        if ( ! empty( $width ) )
            $icon_css .= ';width:'. $width .'px';

        if ( ! empty( $height ) )
            $icon_css .= ';height:'. $height .'px;line-height:'. ($height+2) .'px';

        if ( ! empty( $size ) )
            $icon_css .= ';font-size:'. $size .'px';

        if ( ! empty( $rounded ) )
            $icon_css .= ';border-radius:'. $rounded .'px';

        $html = '';
        foreach ( $instance as $k => $v ) {
            if ( $v != '' && ! in_array( $k , array( 'title', 'width', 'height', 'size', 'rounded', 'gap' ) ) ) 
                $html .= '<div class="icon" style="'. $inner_css .'"><a target="_blank" title="'. $k .'" href="'. $v .'" style="'. $icon_css .'"><i class="fa fa-'. $k .'"></i></a></div>';
        }

        if ( $html )
            printf( '<div class="socials clearfix" style="%2$s">%1$s</div>', $html, $css );

		echo $after_widget;
    }

    // Update widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['width']         = strip_tags( $new_instance['width'] );
        $instance['height']         = strip_tags( $new_instance['height'] );
        $instance['size']         = strip_tags( $new_instance['size'] );
        $instance['rounded']         = strip_tags( $new_instance['rounded'] );
        $instance['gap']         = strip_tags( $new_instance['gap'] );
        $instance['title'] = strip_tags( $new_instance['title'] );

        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
        $instance['youtube'] = strip_tags( $new_instance['youtube'] );
        $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
        $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
        $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
        $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
        $instance['instagram'] = strip_tags( $new_instance['instagram'] );
        $instance['github'] = strip_tags( $new_instance['github'] );
        $instance['apple'] = strip_tags( $new_instance['apple'] );
        $instance['android'] = strip_tags( $new_instance['android'] );
        $instance['behance'] = strip_tags( $new_instance['behance'] );
        $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
        $instance['flickr'] = strip_tags( $new_instance['flickr'] );
        $instance['paypal'] = strip_tags( $new_instance['paypal'] );
        $instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
        $instance['spotify'] = strip_tags( $new_instance['spotify'] );
                
        return $instance;
    }

    // Widget setting
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );

        $fields = array(
            'twitter' => esc_html__( 'Twitter URL:', 'ambersix' ),
            'facebook' => esc_html__( 'Facebook URL:', 'ambersix' ),
            'youtube' => esc_html__( 'Youtube URL:', 'ambersix' ),
            'vimeo' => esc_html__( 'Vimeo URL:', 'ambersix' ),
            'tumblr' => esc_html__( 'Tumblr URL:', 'ambersix' ),
            'pinterest' => esc_html__( 'Pinterest URL:', 'ambersix' ),
            'linkedin' => esc_html__( 'LinkedIn URL:', 'ambersix' ),
            'instagram' => esc_html__( 'Instagram URL:', 'ambersix' ),
            'github' => esc_html__( 'Github URL:', 'ambersix' ),
            'apple' => esc_html__( 'Apple URL:', 'ambersix' ),
            'android' => esc_html__( 'Android URL:', 'ambersix' ),
            'behance' => esc_html__( 'Behance URL:', 'ambersix' ),
            'dribbble' => esc_html__( 'Dribbble URL:', 'ambersix' ),    
            'flickr' => esc_html__( 'Flickr URL:', 'ambersix' ),
            'paypal' => esc_html__( 'Paypal URL:', 'ambersix' ),
            'soundcloud' => esc_html__( 'Soundcloud URL:', 'ambersix' ),
            'spotify' => esc_html__( 'Spotify URL:', 'ambersix' )
        ); ?>

        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'ambersix' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_html_e('Width:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['width'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e('Height:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['height'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e('Icon Font Size:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['size'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'rounded' ) ); ?>"><?php esc_html_e('Rounded:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rounded' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rounded' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['rounded'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'gap' ) ); ?>"><?php esc_html_e('Spacing Between Items:', 'ambersix') ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gap' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gap' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['gap'] ); ?>">
        </p>

        <?php
        foreach ( $fields as $k => $v ) {
            printf(
                '<p>
                    <label for="%s">%s</label>
                    <input type="text" class="widefat" id="%s" name="%s" value="%s">
                </p>',
                $this->get_field_id( $k ),
                $v,
                $this->get_field_id( $k ),
                $this->get_field_name( $k ),
                $instance[$k]
            );
        }
        ?>
    <?php
    }

}

add_action( 'widgets_init', 'register_ambersix_socials' );
// Register widget
function register_ambersix_socials() {
    register_widget( 'WPRT_Socials' );
}
