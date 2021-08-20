<?php
/**
 * Entry Content / Author
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! get_the_author_meta( 'description' ) )
	return;
?>

<div class="post-author cleafix">
    <div class="author-avatar">
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>" rel="author">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ambersix_author_bio_avatar_size', 100 ) ); ?>
        </a>
    </div>

    <div class="author-desc">
        <h4 class="name"><?php the_author_meta( 'nickname' ); ?></h4>

        <div class="position"><?php echo get_the_author_meta( 'user_position' ); ?></div>

        <p><?php the_author_meta( 'description' ); ?></p>

        <?php if ( get_the_author_meta( 'user_facebook' ) || get_the_author_meta( 'user_twitter' ) || get_the_author_meta( 'user_google_plus' )  || get_the_author_meta( 'user_linkedin' ) || get_the_author_meta( 'user_pinterest' ) || get_the_author_meta( 'user_instagram' )  ) : ?>
        <div class="author-socials">
            <div class="socials">
                <?php if ( $url = get_the_author_meta( 'user_facebook' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Facebook', 'ambersix' ); ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_twitter' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Twitter', 'ambersix' ); ?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_google_plus' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Google +', 'ambersix' ); ?>">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_linkedin' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Linkedin', 'ambersix' ); ?>">
                        <i class="fab fa-linkedin"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_pinterest' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Pinterest', 'ambersix' ); ?>">
                        <i class="fab fa-pinterest"></i>
                    </a>
                <?php endif; ?>

                <?php if ( $url = get_the_author_meta( 'user_instagram' ) ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr__( 'Instagram', 'ambersix' ); ?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>




