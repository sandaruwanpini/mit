<?php
/*
 * All Theme Options for Obira theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function obira_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => OBIRA_NAME . esc_html__(' Options', 'obira'),
    'menu_slug'       => sanitize_title(OBIRA_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => OBIRA_NAME .' <small>V-'. OBIRA_VERSION .' by <a href="'. OBIRA_BRAND_URL .'" target="_blank">'. OBIRA_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'obira_vt_settings' );

// Theme Framework Options
function obira_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'obira'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'obira'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'obira')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'obira'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'obira'),
            'add_title' => esc_html__('Add Logo', 'obira'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'obira'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'obira'),
            'add_title' => esc_html__('Add Retina Logo', 'obira'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'obira'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'obira'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'obira'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'obira'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Transparent Header', 'obira')
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'obira'),
            'info'  => esc_html__('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'obira'),
            'add_title' => esc_html__('Add Transparent Logo', 'obira'),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Transparent Retina Logo', 'obira'),
            'info'  => esc_html__('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'obira'),
            'add_title' => esc_html__('Add Transparent Retina Logo', 'obira'),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'obira')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'obira'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'obira'),
            'add_title' => esc_html__('Add Login Logo', 'obira'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'obira'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'obira')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'obira'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'obira'),
            'add_title' => esc_html__('Add Mobile Logo', 'obira'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'obira'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'obira'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'obira'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'obira'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'obira'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'obira'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'obira'),
              'add_title' => esc_html__('Add Fav Icon', 'obira'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'obira'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'obira'),
              'add_title' => esc_html__('Add iPhone Icon', 'obira'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'obira'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'obira'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'obira'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'obira'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'obira'),
              'add_title' => esc_html__('Add iPad Icon', 'obira'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'obira'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'obira'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'obira'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'obira'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'obira'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'pre_loader',
        'type'  => 'switcher',
        'title' => esc_html__('Pre Loader', 'obira'),
        'info' => esc_html__('Turn On if you want pre loader in your pages.', 'obira'),
        'default' => false,
      ),

      array(
        'id'        => 'pre_loader_option',
        'type'      => 'select',
        'options'   => array(
          'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'obira'),
          'ball-pulse'                  => esc_html__('Ball Pulse', 'obira'),
          'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'obira'),
          'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'obira'),
          'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'obira'),
          'square-spin'                 => esc_html__('Square Spin', 'obira'),
          'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'obira'),
          'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'obira'),
          'ball-rotate'                 => esc_html__('Ball Rotate', 'obira'),
          'cube-transition'             => esc_html__('Cube Transition', 'obira'),
          'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'obira'),
          'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'obira'),
          'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'obira'),
          'ball-scale'                  => esc_html__('Ball Scale', 'obira'),
          'line-scale'                  => esc_html__('Line Scale', 'obira'),
          'line-scale-party'            => esc_html__('Line Scale Party', 'obira'),
          'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'obira'),
          'ball-beat'                   => esc_html__('Ball Beat', 'obira'),
          'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'obira'),
          'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'obira'),
          'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'obira'),
          'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'obira'),
          'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'obira'),
          'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'obira'),
          'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'obira'),
          'pacman'                      => esc_html__('Pacman', 'obira'),
          'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'obira'),
          'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'obira'),
        ),
        'title'     => esc_html__('Loader Style', 'obira'),
        'dependency'  => array('pre_loader', '==', 'true'),
      ),

      array(
        'id'    => 'theme_img_resizer',
        'type'  => 'switcher',
        'title' => esc_html__('Disable Image Resizer?', 'obira'),
        'info' => esc_html__('Turn on if you don\'t want image resizer.', 'obira'),
      ),


    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'obira'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'obira'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          array(
            'id'        => 'transparency_header',
            'type'      => 'select',
            'title'     => esc_html__('Transparent Header', 'obira'),
            'options'   => array(
              'normal'   => 'Normal Header',
              'transparent' => 'Transparent Header',
            ),
          ),

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Extra\'s', 'obira'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'obira'),
            'attributes'  => array( 'placeholder' => '991' ),
            'info' => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'obira'),
          ),
          array(
            'id'             => 'sticky_header',
            'type'           => 'select',
            'title'          => esc_html__('Sticky Header', 'obira'),
            'options'        => array(
              'sticky' => esc_html__('Sticky', 'obira'),
              'not-sticky' => esc_html__('Not Sticky', 'obira'),
            ),
          ),
          array(
            'id'             => 'search_icon',
            'type'           => 'select',
            'title'          => esc_html__('Search Icon', 'obira'),
            'options'        => array(
              'show' => esc_html__('Show', 'obira'),
              'hide' => esc_html__('Hide', 'obira'),
            ),
          ),
          array(
            'id'             => 'cart_widget',
            'type'           => 'select',
            'title'          => esc_html__('Cart Widget', 'obira'),
            'options'        => array(
              'show' => esc_html__('Show', 'obira'),
              'hide' => esc_html__('Hide', 'obira'),
            ),
          ),
          array(
            'id'    => 'header_btns',
            'type'  => 'textarea',
            'shortcode' => true,
            'title' => esc_html__('Button Shortcode', 'obira'),
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'obira'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'obira')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'obira'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'obira'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'obira'),
            'options'        => array(
              'padding-none' => esc_html__('Default Spacing', 'obira'),
              'padding-xs' => esc_html__('Extra Small Padding', 'obira'),
              'padding-sm' => esc_html__('Small Padding', 'obira'),
              'padding-md' => esc_html__('Medium Padding', 'obira'),
              'padding-lg' => esc_html__('Large Padding', 'obira'),
              'padding-xl' => esc_html__('Extra Large Padding', 'obira'),
              'padding-no' => esc_html__('No Padding', 'obira'),
              'padding-custom' => esc_html__('Custom Padding', 'obira'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'obira'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'obira'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'obira'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'obira'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'obira'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'obira'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'obira'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'obira')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'obira'),
            'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'obira'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'obira'),
            'info' => esc_html__('Choose your footer widget layouts.', 'obira'),
            'default' => 4,
            'options' => array(
              1   => OBIRA_CS_IMAGES . '/footer/footer-1.png',
              2   => OBIRA_CS_IMAGES . '/footer/footer-2.png',
              3   => OBIRA_CS_IMAGES . '/footer/footer-3.png',
              4   => OBIRA_CS_IMAGES . '/footer/footer-4.png',
              5   => OBIRA_CS_IMAGES . '/footer/footer-5.png',
              6   => OBIRA_CS_IMAGES . '/footer/footer-6.png',
              7   => OBIRA_CS_IMAGES . '/footer/footer-7.png',
              8   => OBIRA_CS_IMAGES . '/footer/footer-8.png',
              9   => OBIRA_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
          array(
            'id'    => 'sticky_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Footer Sticky', 'obira'),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'obira'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'obira'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'obira'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'obira'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'obira'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => OBIRA_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => OBIRA_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => OBIRA_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'obira'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'obira'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'obira'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'obira'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'obira'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'obira'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'obira'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'obira'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'obira'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'obira'),
            'info'           => esc_html__('Enter css selectors like : <strong>body, .custom-class</strong>', 'obira'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'obira'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'obira'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'obira'),
        'accordion_title'     => esc_html__('New Typography', 'obira'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'obira'),
            'selector'        => 'body, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, input[type="submit"], form label, blockquote p, .nice-select, .bitbucket-template .banner-caption p, .obra-callout h2.callout-title p, .obra-view-plans h3.view-plan-title p, .dropbox-template .banner-caption p, .status-item p, .obra-contact-wrap input[type="submit"], .obra-contact-form input[type="submit"], .portfolio-label, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta, .woocommerce .review-rating, .woocommerce .comment-form-rating, .woocommerce form .lost_password, .form-wrap .forgot-link, .form-wrap .create-account-link',
            'font'            => array(
              'family'        => 'Quicksand',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'obira'),
            'selector'        => '.obra-nav .navigation-bar > ul > li > a',
            'font'            => array(
              'family'        => 'Quicksand',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'obira'),
            'selector'        => '.dropdown-nav',
            'font'            => array(
              'family'        => 'Quicksand',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'obira'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .text-logo',
            'font'            => array(
              'family'        => 'Quicksand',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'obira'),
            'selector'        => 'p, .blog-info .obra-blog-excerpt, .author-designation, .plan-info ul, .device-features-info ul, .obra-board-status .nav-tabs > li .board-tab-text, .getstart-rules, .mate-designation, .job-location, .unordered-list, .job-item-subtitle, .obra-text-page ul, .obra-text-page ol, .woocommerce .cart_totals .shipping-calculator-form, .woocommerce .woocommerce-checkout-review-order table.shop_table .cart-shipping td, ul.bullet-list, .obra-blog-share a, .obra-footer-wrap ul',
            'font'            => array(
              'family'        => 'Open Sans',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Secondary Font', 'obira'),
            'selector'        => '.obra-pagination, .woocommerce nav.woocommerce-pagination ul, .blog-detail-wrap .blog-title',
            'font'            => array(
              'family'        => 'Rubik',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'obira'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'obira'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'obira'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '300','400','500','600','700' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'obira'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Portfolio Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'portfolio_section',
    'title'    => esc_html__('Portfolio', 'obira'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // portfolio name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'obira')
      ),
      array(
        'id'      => 'theme_portfolio_name',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Name', 'obira'),
        'attributes'     => array(
          'placeholder'  => 'Portfolio'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Slug', 'obira'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-item'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Category Slug', 'obira'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('<strong>Important</strong>: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'obira')
      ),
      // Portfolio Name

      // portfolio listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Portfolio Style', 'obira')
      ),
      array(
        'id'             => 'portfolio_style',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Style', 'obira'),
        'options'        => array(
          'bpw-style-one' => esc_html__('Style One', 'obira'),
          'bpw-style-two' => esc_html__('Style Two', 'obira'),
        ),
        'default_option'     => esc_html__('Select Portfolio Style', 'obira'),
      ),
      array(
        'id'             => 'portfolio_column',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Column', 'obira'),
        'options'        => array(
          'bpw-col-2' => esc_html__('Two Columns', 'obira'),
          'bpw-col-3' => esc_html__('Three Columns', 'obira'),
          'bpw-col-4' => esc_html__('Four Columns', 'obira'),
        ),
        'default_option'     => esc_html__('Select Portfolio Column', 'obira'),
      ),
      array(
        "type"        =>'text',
        "title"     => esc_html__('Limit', 'obira'),
        "id"  => "portfolio_limit",
        "info" => esc_html__( "Enter the number of items to show.", 'obira'),
      ),
      array(
        'id'          => 'portfolio_order',
        'title'       => esc_html__('Portfolio Order', 'obira'),
        'desc'        => esc_html__('Select portfolio order', 'obira'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'obira'),
          'decending' => esc_html__('Decending', 'obira'),
        ),
      ),
      array(
        'id'          => 'portfolio_orderby',
        'title'       => esc_html__('Portfolio Orderby', 'obira'),
        'desc'        => esc_html__('Select portfolio orderby', 'obira'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'obira'),
          'id' => esc_html__('ID', 'obira'),
          'author' => esc_html__('Author', 'obira'),
          'title' => esc_html__('Title', 'obira'),
          'name' => esc_html__('Name', 'obira'),
          'type' => esc_html__('Type', 'obira'),
          'date' => esc_html__('Date', 'obira'),
          'modified' => esc_html__('Modified', 'obira'),
          'random' => esc_html__('Random', 'obira'),
        ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'obira')
      ),
      array(
        'id'      => 'portfolio_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'obira'),
        'label'   => esc_html__('If you need pagination in portfolio pages, please turn this ON.', 'obira'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Portfolio Filter', 'obira'),
        'label'   => esc_html__('If you need filter in portfolio pages, please turn this ON.', 'obira'),
        'default'   => false,
      ),
      array(
        'id'      => 'portfolio_no_space',
        'type'    => 'switcher',
        'title'   => esc_html__('Gutter Space', 'obira'),
        'label'   => esc_html__('If you don\'t want gutter spaces between portfolio items, please turn this ON.', 'obira'),
        'default'   => false,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Portfolio', 'obira')
      ),
      array(
        'id'      => 'portfolio_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Next & Prev Navigation', 'obira'),
        'label'   => esc_html__('If you don\'t want next and previous navigation in portfolio single pages, please turn this OFF.', 'obira'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_home_url',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio URL', 'obira'),
         'attributes' => array(
            'placeholder'     => esc_html__('http://yourdomain.com/portfolio', 'obira'),
        ),
      ),
      // Portfolio Listing

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'obira'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      array(
        'id'      => 'team_limit',
        'type'    => 'text',
        'title'   => esc_html__('Team limit', 'obira'),
        'info'   => esc_html__('Enter the number of items to show.', 'obira'),
      ),
      array(
        'id'          => 'team_column',
        'title'       => esc_html__('Team Column', 'obira'),
        'desc'        => esc_html__('Select Team column', 'obira'),
        'type'        => 'select',
        'options'        => array(
          'col-3' => esc_html__('Column Three', 'obira'),
          'col-4' => esc_html__('Column Four', 'obira'),
        ),
      ),
      array(
        'id'          => 'team_order',
        'title'       => esc_html__('Team Order', 'obira'),
        'desc'        => esc_html__('Select Team order', 'obira'),
        'type'        => 'select',
        'options'        => array(
          'ASC' => esc_html__('Ascending', 'obira'),
          'DESC' => esc_html__('Decending', 'obira'),
        ),
      ),
      array(
        'id'          => 'team_orderby',
        'title'       => esc_html__('Team Orderby', 'obira'),
        'desc'        => esc_html__('Select Team orderby', 'obira'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'obira'),
          'id' => esc_html__('ID', 'obira'),
          'author' => esc_html__('Author', 'obira'),
          'title' => esc_html__('Title', 'obira'),
          'date' => esc_html__('Date', 'obira'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'obira')
      ),
      array(
        'id'      => 'team_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'obira'),
        'label'   => esc_html__('If you need pagination in Team pages, please turn this ON.', 'obira'),
        'default'   => true,
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'obira'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'obira'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'obira')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'obira'),
            'options'        => array(
              'style-one' => esc_html__('List (Default)', 'obira'),
              'style-two' => esc_html__('Grid', 'obira'),
            ),
            'default_option' => 'Select blog style',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'obira'),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Columns', 'obira'),
            'options'        => array(
              'col-md-6 col-sm-6' => esc_html__('Column Two', 'obira'),
              'col-md-4 col-sm-6' => esc_html__('Column Three', 'obira'),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', '==', 'style-two'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'obira'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'obira'),
              'sidebar-left' => esc_html__('Left', 'obira'),
              'sidebar-hide' => esc_html__('Hide', 'obira'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'obira'),
            'info'          => esc_html__('Default option : Right', 'obira'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'obira'),
            'options'        => obira_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'obira'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'obira'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'obira')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'obira'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'obira'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'obira'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'obira'),
            'default' => '55',
          ),
          array(
            'id'      => 'blog_pagination_style',
            'type'    => 'select',
            'title'   => esc_html__('Blog Pagination', 'obira'),
            'options'        => array(
              'navigation' => esc_html__('Navigation', 'obira'),
              'load-more' => esc_html__('Ajax Button', 'obira'),
              'infinite-scroll' => esc_html__('Ajax Infinite Scroll', 'obira'),
            ),
            'info'          => esc_html__('Default : Navigation', 'obira'),
          ),
          array(
            'id'      => 'blog_load_btn_type',
            'type'    => 'select',
            'title'   => esc_html__('Load More Button Type', 'obira'),
            'options'        => array(
              'button' => esc_html__('Button', 'obira'),
              'icon' => esc_html__('Icon', 'obira'),
            ),
            'dependency'     => array('blog_pagination_style', '==', 'load-more'),
            'info'          => esc_html__('Default : Button', 'obira'),
          ),
          array(
            'id'        => 'blog_loader_icon_option',
            'type'      => 'select',
            'options'   => array(
              'ball-scale-multiple'         => esc_html__('Ball Scale Multiple', 'obira'),
              'ball-pulse'                  => esc_html__('Ball Pulse', 'obira'),
              'ball-grid-pulse'             => esc_html__('Ball Grid Pulse', 'obira'),
              'ball-clip-rotate'            => esc_html__('Ball Clip Rotate', 'obira'),
              'ball-clip-rotate-pulse'      => esc_html__('Ball Clip Rotate Pulse', 'obira'),
              'square-spin'                 => esc_html__('Square Spin', 'obira'),
              'ball-clip-rotate-multiple'   => esc_html__('Ball Clip Rotate Multiple', 'obira'),
              'ball-pulse-rise'             => esc_html__('Ball Pulse Rise', 'obira'),
              'ball-rotate'                 => esc_html__('Ball Rotate', 'obira'),
              'cube-transition'             => esc_html__('Cube Transition', 'obira'),
              'ball-zig-zag'                => esc_html__('Ball Zig Zag', 'obira'),
              'ball-zig-zag-deflect'        => esc_html__('Ball Zig Zag Deflect', 'obira'),
              'ball-triangle-path'          => esc_html__('Ball Triangle Path', 'obira'),
              'ball-scale'                  => esc_html__('Ball Scale', 'obira'),
              'line-scale'                  => esc_html__('Line Scale', 'obira'),
              'line-scale-party'            => esc_html__('Line Scale Party', 'obira'),
              'ball-pulse-sync'             => esc_html__('Ball Pulse Sync', 'obira'),
              'ball-beat'                   => esc_html__('Ball Beat', 'obira'),
              'line-scale-pulse-out'        => esc_html__('Line Scale Pulse Out', 'obira'),
              'line-scale-pulse-out-rapid'  => esc_html__('Line Scale Pulse Out Rapid', 'obira'),
              'ball-scale-ripple'           => esc_html__('Ball Scale Ripple', 'obira'),
              'ball-scale-ripple-multiple'  => esc_html__('Ball Scale Ripple Multiple', 'obira'),
              'ball-spin-fade-loader'       => esc_html__('Ball Spin Fade Loader', 'obira'),
              'line-spin-fade-loader'       => esc_html__('Line Spin Fade Loader', 'obira'),
              'triangle-skew-spin'          => esc_html__('Triangle Skew Spin', 'obira'),
              'pacman'                      => esc_html__('Pacman', 'obira'),
              'ball-grid-beat'              => esc_html__('Ball Grid Beat', 'obira'),
              'semi-circle-spin'            => esc_html__('Semi Circle Spin', 'obira'),
            ),
            'dependency'     => array('blog_pagination_style', '==', 'infinite-scroll'),
            'title'     => esc_html__('Loader Icon Style', 'obira'),
          ),
          array(
            'id'      => 'blog_load_more_btn_txt',
            'type'    => 'text',
            'title'   => esc_html__('Load More Button Text', 'obira'),
            'dependency'     => array('blog_pagination_style|blog_load_btn_type', '==|==', 'load-more|button'),
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'obira'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'obira'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'obira'),
              'date'    => esc_html__('Date', 'obira'),
              'author'     => esc_html__('Author', 'obira'),
              'comments'      => esc_html__('Comments', 'obira'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'obira'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'obira')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'obira'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'obira'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'obira'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'obira'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'obira'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'obira'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'obira')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'obira'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'obira'),
              'sidebar-left' => esc_html__('Left', 'obira'),
              'sidebar-hide' => esc_html__('Hide', 'obira'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'obira'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'obira'),
            'options'        => obira_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'obira'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'obira'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'obira'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Layout', 'obira')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'obira'),
        'options'        => array(
          2 => esc_html__('Two Column', 'obira'),
          3 => esc_html__('Three Column', 'obira'),
          4 => esc_html__('Four Column', 'obira'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'obira'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'obira'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'obira'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'obira'),
          'left-sidebar' => esc_html__('Left', 'obira'),
          'sidebar-hide' => esc_html__('Hide', 'obira'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'obira'),
        'info'          => esc_html__('Default option : Right', 'obira'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'obira'),
        'options'        => obira_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'obira'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'obira'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'obira')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'obira'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'obira'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'obira')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'obira'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'obira'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'obira'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'obira'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'obira'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'obira'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'obira'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'obira'),
            'info'  => esc_html__('Enter 404 page heading.', 'obira'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'obira'),
            'info'  => esc_html__('Enter 404 page content.', 'obira'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg_image',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background Image', 'obira'),
            'info'  => esc_html__('Choose 404 page background styles.', 'obira'),
            'add_title' => esc_html__('Add 404 Image', 'obira'),
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Image', 'obira'),
            'info'  => esc_html__('Choose 404 page image.', 'obira'),
            'add_title' => esc_html__('Add 404 Image', 'obira'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'obira'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'obira'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'obira'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'obira')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'obira'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'obira'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'obira'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'obira'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'obira'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'obira'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'obira'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'obira'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'obira'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'obira'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'obira'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'obira'),
            'accordion_title' => esc_html__('New Sidebar', 'obira'),
            'default'             => array(
              array(
                'sidebar_name'          => 'Faq Widget',
                'sidebar_desc'        => 'Faq Widget',
              ),
              )
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'obira'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'obira')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'obira'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'obira'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'obira')
          ),
          array(
            'id'          => 'search_txt',
            'type'        => 'text',
            'title'       => esc_html__('Search for Placeholder Text', 'obira'),
          ),
          array(
            'id'          => 'search_btn_txt',
            'type'        => 'text',
            'title'       => esc_html__('Search button Text', 'obira'),
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'obira'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'obira'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'obira'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('About author Text', 'obira'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'obira'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WooCommerce', 'obira')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'obira'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'obira')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'obira'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'obira'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'obira')
          ),
          array(
            'id'          => 'all_portfolio_txt',
            'type'        => 'text',
            'title'       => esc_html__('All Text(in portfolio filter)', 'obira'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'obira')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Project Text', 'obira'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Project Text', 'obira'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'obira_vt_options' );
