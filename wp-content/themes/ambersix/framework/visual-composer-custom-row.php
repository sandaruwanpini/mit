<?php
if ( function_exists('vc_add_param') ) {
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Content Position: Middle', 'ambersix'),
            "param_name" => "row_content_position",
            'value' => array(
                'Default' => 'Default',
                'Top' => 'top',
                'Middle' => 'middle',
                'Bottom' => 'bottom'
            ),   
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Equal Height', 'ambersix'),
            "param_name" => "row_equal_height",
            "value" => array(   
                esc_html__('No', 'ambersix') => 'no',  
                esc_html__('Yes', 'ambersix') => 'yes',                                                                                
            ),     
        ) 
    ); 
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Fullwidth', 'ambersix'),
            "param_name" => "fullwidth",
            "value" => array(   
                esc_html__('No', 'ambersix') => 'no',  
                esc_html__('Yes', 'ambersix') => 'yes',                                                                                
            ),
            "description" => esc_html__("Select 'Yes' to stretch row and content", 'ambersix' ),      
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Content Alignment', 'ambersix' ),
            'param_name' => 'content_align',
            'value' => array(
                esc_html__( 'Default', 'ambersix' ) => '',
                esc_html__( 'Top', 'ambersix' ) => 'top',
                esc_html__( 'Middle', 'ambersix' ) => 'middle',                
                esc_html__( 'Bottom', 'ambersix' ) => 'bottom',                
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Spacing Between Columns', 'ambersix'),
            "param_name" => "column_spacing",
            'value' => array(
                esc_html__( 'Default', 'ambersix' ) => '30',
                '0px' => '0px',
                '1px' => '1',
                '5px' => '5',
                '10px' => '10',
                '20px' => '20',
                '30px' => '30',
                '40px' => '40',
                '50px' => '50',
                '60px' => '60',
                '65px' => '65',
                '70px' => '70',
                '80px' => '80',
                '90px' => '90',
                '100px' => '100',
            ),     
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Enable Aside Image for Row?', 'ambersix' ),
            'param_name' => 'img_halfrow',
            'value' => array(
                esc_html__( 'Disable', 'ambersix' ) => '',
                esc_html__( 'Background', 'ambersix' ) => 'simple',
                esc_html__( 'Parallax', 'ambersix' ) => 'parallax',
                esc_html__( 'Absolute', 'ambersix' ) => 'absolute',
            ),
            'description' => esc_html__( 'Put a image left or right side of row', 'ambersix' ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'ambersix' ),
            'param_name' => 'halfrow_image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'ambersix' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax', 'absolute' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Columns image', 'ambersix' ),
            'param_name' => 'img_columns',
            'value' => array(
                esc_html__( 'Default', 'ambersix' ) => '',
                esc_html__( 'Image on 3 Columns', 'ambersix' ) => '3columns',
                esc_html__( 'Image on 4 Columns', 'ambersix' ) => '4columns',
                esc_html__( 'Image on 5 Columns', 'ambersix' ) => '5columns',
                esc_html__( 'Image on 6 Columns', 'ambersix' ) => '6columns',
                esc_html__( 'Image on 7 Columns', 'ambersix' ) => '7columns',
            ),
            'description' => esc_html__( 'Select columns position within row.', 'ambersix' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Image position', 'ambersix' ),
            'param_name' => 'img_position',
            'value' => array(
                esc_html__( 'Default', 'ambersix' ) => '',
                esc_html__( 'Image on Left Row', 'ambersix' ) => 'imgleft',
                esc_html__( 'Image on Right Row', 'ambersix' ) => 'imgright',                
            ),
            'description' => esc_html__( 'Select Image position within row.', 'ambersix' ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Video URL (Link Youtube/Vimeo)', 'ambersix'),
            "param_name" => "image_video",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => array( 'simple', 'parallax' ),
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Image Parallax: Offset Top', 'ambersix'),
            "param_name" => "img_offset_top",
            'value' => array(
                '0px' => '0px',
                '50px' => '50px',
                '60px' => '60px',
                '70px' => '70px',
                '80px' => '80px',
                '90px' => '90px',
                '100px' => '100px',
                '110px' => '110px',
                '120px' => '120px',
                '130px' => '130px',
                '140px' => '140px',
                '150px' => '150px',
                '160px' => '160px',
                '170px' => '170px',
                '180px' => '180px',
                '190px' => '190px',
                '200px' => '200px',
                '210px' => '210px',
                '220px' => '220px',
                '230px' => '230px',
                '240px' => '240px',
                '250px' => '250px',
            ),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Image Parallax: Offset Left', 'ambersix'),
            "param_name" => "img_offset_left",
            'value' => array(
                '0px' => '0px',
                '10px' => '10px',
                '20px' => '20px',
                '30px' => '30px',
                '40px' => '40px',
                '50px' => '50px',
                '60px' => '60px',
                '70px' => '70px',
                '80px' => '80px',
                '90px' => '90px',
                '100px' => '100px',
                '110px' => '110px',
                '120px' => '120px',
                '130px' => '130px',
                '140px' => '140px',
                '150px' => '150px',
                '160px' => '160px',
                '170px' => '170px',
                '180px' => '180px',
                '190px' => '190px',
                '200px' => '200px',
            ),
            'dependency' => array(
                'element' => 'img_position',
                'value' => 'imgright',
            ),
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Image Parallax: Offset Right', 'ambersix'),
            "param_name" => "img_offset_right",
            'value' => array(
                '0px' => '0px',
                '10px' => '10px',
                '20px' => '20px',
                '30px' => '30px',
                '40px' => '40px',
                '50px' => '50px',
                '60px' => '60px',
                '70px' => '70px',
                '80px' => '80px',
                '90px' => '90px',
                '100px' => '100px',
                '110px' => '110px',
                '120px' => '120px',
                '130px' => '130px',
                '140px' => '140px',
                '150px' => '150px',
                '160px' => '160px',
                '170px' => '170px',
                '180px' => '180px',
                '190px' => '190px',
                '200px' => '200px',
            ),
            'dependency' => array(
                'element' => 'img_position',
                'value' => 'imgleft',
            ),
        ) 
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax X', 'ambersix'),
            'param_name' => 'parallax_x',
            'description'   => esc_html__('X axis translation.', 'ambersix'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Parallax Y', 'ambersix'),
            'param_name' => 'parallax_y',
            'description'   => esc_html__('Y axis translation.', 'ambersix'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'parallax',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Top', 'ambersix'),
            "param_name" => "img_top",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Right', 'ambersix'),
            "param_name" => "img_right",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Bottom', 'ambersix'),
            "param_name" => "img_bottom",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Left', 'ambersix'),
            "param_name" => "img_left",
            'value' => '',
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Translate X', 'ambersix'),
            'param_name' => 'image_x',
            'description'   => esc_html__('X axis translation.', 'ambersix'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    vc_add_param(
        'vc_row',
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Translate Y', 'ambersix'),
            'param_name' => 'image_y',
            'description'   => esc_html__('Y axis translation.', 'ambersix'),
            'dependency' => array(
                'element' => 'img_halfrow',
                'value' => 'absolute',
            ),
        )
    );
    // Add new Param in Row Inner  
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "dropdown",
            "heading" => esc_html__('Spacing Between Columns', 'ambersix'),
            "param_name" => "column_inner_spacing",
            'value' => array(
                esc_html__( 'Default', 'ambersix' ) => '30',
                '0px' => '0px',
                '1px' => '1',
                '5px' => '5',
                '10px' => '10',
                '20px' => '20',
                '30px' => '30',
                '40px' => '40',
                '50px' => '50',
                '60px' => '60',
                '65px' => '65',
                '70px' => '70',
                '80px' => '80',
                '90px' => '90',
                '100px' => '100',
            ),     
        ) 
    );
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Padding Wrapper', 'ambersix'),
            "param_name" => "column_inner_padding",
            'value' => '',     
        )
    );
    vc_add_param(
        'vc_row_inner',
        array(
            "type" => "textfield",
            "heading" => esc_html__('Mobile Padding Wrapper', 'ambersix'),
            "param_name" => "column_inner_mobipadding",
            'value' => '',     
        )
    );
}

if ( function_exists('vc_remove_param') ) {
    vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "content_placement" );
    vc_remove_param( "vc_row", "equal_height" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( 'vc_row_inner', 'gap' );
    vc_remove_param( 'vc_row_inner', 'equal_height' );
    vc_remove_param( 'vc_row_inner', 'content_placement' );
    vc_remove_param( "vc_column", "css_animation" );
    vc_remove_param( "vc_column", "video_bg" );
    vc_remove_param( "vc_column", "video_bg_parallax" );
    vc_remove_param( "vc_column", "video_bg_url" );
}    