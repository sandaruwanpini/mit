/*
 * All Admin Related Scripts in this Obira Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

jQuery(document).ready(function($) {
  "use strict";

  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
  /*---------------------------------------------------------------*/
  /* =  Toggle Meta boxes based on post formats
  /*---------------------------------------------------------------*/
  function obira_toggle_metaboxes() {

    // Hide All Format Metabox Fields
    function hide_all_format_metaboxes() {
      $('.cs-element-standard-image, .cs-element-gallery-format, .cs-element-add-gallery').hide();
    }
    // Show Only Image Format Metabox Fields
    function image_format_metaboxes() {
      $('.cs-element-gallery-format, .cs-element-add-gallery').slideUp('fast');
      $('.cs-element-standard-image').slideDown('slow');
    }
    // Show Only Gallery Format Metabox Fields
    function gallery_format_metaboxes() {
      $('.cs-element-standard-image').slideUp('fast');
      $('.cs-element-gallery-format, .cs-element-add-gallery').slideDown('slow');
    }

    function getMetaFieldsWork() {
      if (postFormat == 'standard') {image_format_metaboxes();}
      if (postFormat == 'image') {image_format_metaboxes();}
      if (postFormat == 'gallery') {gallery_format_metaboxes();}
    }

    hide_all_format_metaboxes();
    let postFormat;
    if ($('div').hasClass("block-editor")) {
      wp.data.subscribe( () => {
        const newPostFormat = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'format' );
        if ( postFormat !== newPostFormat ) {
          postFormat = newPostFormat;
        }
        getMetaFieldsWork(); // On Change Page Effect
      } );
    } // If hasClass of block-editor

    // Saved Value Effect
    getMetaFieldsWork();

    // Classic Editor
    if (!$('body').hasClass('.block-editor-page')) { // If Condition for Classic Editor
      var format = $("input[name='post_format']:checked").val();
      $('.cs-element-standard-image, .cs-element-gallery-format, .cs-element-add-gallery').hide();
      if (format == '0' || format == 'image') {
        $('').slideUp('fast');
        $('.cs-element-standard-image').slideDown('slow');
      }
      if (format == 'gallery') {
        $('').slideUp('fast');
        $('.cs-element-gallery-format, .cs-element-add-gallery').slideDown('slow');
      }
    } // If Condition for Classic Editor
  }

  obira_toggle_metaboxes(); // Execute on document ready

  if (!$('body').hasClass('.block-editor-page')) {
    $('#post-formats-select input[type="radio"]').on('click', obira_toggle_metaboxes);
  }

 // After above plugins load

  // Tooltip for System Status [?]
  $( '.tool_tip_help' ).tipTip({
    attribute: 'data-tip'
  });
  $('a.tool_tip_help').on('click', function(e) {
    return false;
  });
  $( ".vt-cs-widget-fields" ).parents( ".widget-inside" ).addClass( "vt-cs-widget" );

   // Auto & Manual Import Tabs Active Mode
  $(function() {
    var loc = window.location.href; // returns the full URL
    console.log(loc);
    if(loc.indexOf('manual') > -1) {
      $('.nav-tab-wrapper .vt-auto-mode').removeClass('nav-tab-active');
      $('.nav-tab-wrapper .vt-manual-mode').addClass('nav-tab-active');
    }
  });

});
