<?php
/**
 * Entry Content / Single
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<?php get_template_part( 'templates/entry-content-media' ); ?>
	<?php echo '<div class="post-categories">'; the_category( ', ', get_the_ID() ); echo '</div>'; ?>
	<?php get_template_part( 'templates/entry-content-title' ); ?>
	<?php get_template_part( 'templates/entry-content-meta' ); ?>
	<?php get_template_part( 'templates/entry-content-body' ); ?>
	<?php get_template_part( 'templates/entry-content-tags' ); ?>
	<?php get_template_part( 'templates/entry-content-author' ); ?>
</article><!-- /.hentry -->