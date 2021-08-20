<?php
/**
 * Top Bar
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get Top style
$top_style = ambersix_get_mod( 'top_bar_site_style', 'hide' );
if ( is_page() && ambersix_metabox('top_bar_style') )
    $top_style = ambersix_metabox('top_bar_style');

if ( $top_style == 'hide' ) 
    return;
?>

<div id="top-bar" style="<?php echo ambersix_top_bar_style(); ?>">
    <div id="top-bar-inner" class="ambersix-container">
        <div class="top-bar-inner-wrap">
            <?php
            // Get topbar content
            get_template_part( 'templates/top-content' );

            // Get topbar socials
            get_template_part( 'templates/top-socials' );
            ?>
        </div>
    </div>
</div><!-- /#top-bar -->