<?php
/**
 * Entry Content / Meta
 *
 * @package ambersix
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! ambersix_get_mod( 'blog_single_meta', true ) )
	return;
?>

<div class="post-meta">
	<div class="post-meta-content">
		<div class="post-meta-content-inner">
			<?php ambersix_entry_meta(); ?>
		</div>
	</div>
</div>



