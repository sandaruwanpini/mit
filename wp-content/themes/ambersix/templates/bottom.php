<?php
/**
 * Bottom Bar
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer
if ( ! ambersix_get_mod( 'bottom_bar', true ) ) return false;

$css = ambersix_element_bg_css('bottom_background_img');
$copyright = ambersix_get_mod( 'bottom_copyright', '&copy; Amber Six. Creative Multi-purpose WordPress Theme.' );

if ( is_page() && $bottom_bg = ambersix_metabox('bottom_bg') )
    $css .= 'background-color:'. $bottom_bg .';';
?>

<div id="bottom" style="<?php echo esc_attr( $css ); ?>" >
    <div class="ambersix-container">
        <div class="bottom-bar-inner-wrap">
            <div class="bottom-bar-copyright">
                <?php
                if ( $copyright ) : ?>
                    <div id="copyright">
                        <?php printf( '%s', do_shortcode( $copyright ) ); ?>
                    </div>
                <?php endif; ?>
            </div><!-- /.bottom-bar-copyright -->
        </div>
    </div>
</div><!-- /#bottom -->