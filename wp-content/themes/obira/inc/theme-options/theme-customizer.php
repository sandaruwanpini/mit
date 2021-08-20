<?php
/*
 * All customizer related options for Obira theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'obira_vt_customizer' ) ) {
  function obira_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'obira'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#36bbf7',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'obira'),
					'info'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'obira'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'obira'),
	  'sections'    => array(

	  	array(
      'name'          => 'normal_header_section',
      'title'         => esc_html__('Desktop Menu', 'obira'),
      'settings'      => array(

		    // Fields Start
				array(
					'name'          => 'header_main_menu_heading',
					'control'       => array(
						'type'        => 'cs_field',
						'options'     => array(
							'type'      => 'notice',
							'class'     => 'info',
							'content'   => esc_html__('Main Menu Colors', 'obira'),
						),
					),
				),
				array(
					'name'      => 'header_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Background Color', 'obira'),
					),
				),
				array(
					'name'      => 'header_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Color', 'obira'),
					),
				),
				array(
					'name'      => 'header_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Hover Color', 'obira'),
					),
				),
				array(
					'name'      => 'cart_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Cart Counter Background Color', 'obira'),
					),
				),
				array(
					'name'      => 'sticky_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Background Color', 'obira'),
					),
				),
				array(
					'name'      => 'header_sticky_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Link Color', 'obira'),
					),
				),
				array(
					'name'      => 'header_sticky_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Link Hover Color', 'obira'),
					),
				),
				array(
					'name'      => 'sticky_cart_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Cart Counter Background Color', 'obira'),
					),
				),
	      
	      // Transparent Header
				array(
					'name'          => 'trans_header_main_menu_heading',
					'control'       => array(
						'type'        => 'cs_field',
						'options'     => array(
							'type'      => 'notice',
							'class'     => 'info',
							'content'   => esc_html__('Main Menu Colors(Transparent Header)', 'obira'),
						),
					),
				),
				array(
					'name'      => 'trans_header_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Color', 'obira'),
					),
				),
				array(
					'name'      => 'trans_header_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Hover Color', 'obira'),
					), 
				),
				array(
					'name'      => 'trans_cart_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Cart Counter Background Color', 'obira'),
					),
				),
				array(
					'name'      => 'transparent_sticky_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Transparent Sticky Background Color', 'obira'),
					),
				),

				array(
					'name'      => 'trans_header_sticky_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Link Color', 'obira'),
					),
				),
				array(
					'name'      => 'trans_header_sticky_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Link Hover Color', 'obira'),
					), 
				),
				array(
					'name'      => 'trans_sticky_cart_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Sticky Cart Counter Background Color', 'obira'),
					),
				),


				// Sub Menu Color
				array(
					'name'          => 'header_submenu_heading',
					'control'       => array(
						'type'        => 'cs_field',
						'options'     => array(
							'type'      => 'notice',
							'class'     => 'info',
							'content'   => esc_html__('Sub-Menu Colors', 'obira'),
						),
					),
				),
				array(
					'name'      => 'submenu_bg_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Background Color', 'obira'),
					),
				),
				array(
					'name'      => 'submenu_link_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Color', 'obira'),
					),
				),
				array(
					'name'      => 'submenu_link_hover_color',
					'control'   => array(
						'type'  => 'color',
						'label' => esc_html__('Link Hover Color', 'obira'),
					),
				),
		    // Fields End
		    )
			),
			
			array(
	      'name'          => 'mobile_menu_section',
	      'title'         => esc_html__('Mobile Menu', 'obira'),
	      'settings'      => array(
	      	array(
						'name'          => 'mobile_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Mobile Menu Colors', 'obira'),
							),
						),
					),
					array(
						'name'      => 'mobile_menu_toggle_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Toggle Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Hover Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Hover Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Background Color', 'obira'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Background Hover Color', 'obira'),
						),
					),
				)
      ),


	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'obira'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'obira'),
					),
				),
			),
			array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'obira'),
				),
			),
			array(
				'name'      => 'titlebar_sub_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub-Title Color', 'obira'),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'obira'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'obira'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'obira'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'          => 'body_content_colors',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Body/Content Colors', 'obira'),
							),
						),
					),
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'obira'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'obira'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'obira'),
						),
					),
					array(
						'name'          => 'sidebar_content_colors',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sidebar Colors', 'obira'),
							),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'obira'),
						),
					),
					array(
						'name'      => 'sidebar_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Links Color', 'obira'),
						),
					),
					array(
						'name'      => 'sidebar_links_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Links Hover Color', 'obira'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'obira'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'obira'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'obira'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'obira'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Obira > Theme Options > Footer ', 'obira'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'obira'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'obira'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'obira'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'obira'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'obira'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'obira'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#ffffff',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'obira'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'obira'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Obira > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'obira'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'obira'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'obira'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'obira'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'obira'),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => '#eeeeee',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'obira'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'obira_vt_customizer' );
}
