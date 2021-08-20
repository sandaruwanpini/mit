<?php get_header(); ?>

<div id="content-wrap" class="ambersix-container">
    <div id="site-content" class="site-content clearfix archive-project">
    	<div id="inner-content" class="inner-content-wrap">
			<?php if ( have_posts() ) : ?>
				<div class="ambersix-project-grid" data-layout="grid" data-column="3" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
					<div id="portfolio" class="cbp">
					    <?php while ( have_posts() ) : the_post();
							wp_enqueue_script( 'ambersix-cubeportfolio' ); ?>

				            <div class="cbp-item">
								<div class="project-box">
									<?php
										$title_html = '';

										$icon_html = sprintf('<div class="icons"><a href="%1$s" class="zoom popup-image"><span class="linea-basic-magnifier-plus"></span></a><a href="%2$s" class="link"><span class="linea-basic-link"></span></a></div>',
				            					ambersix_get_image( array( 'size' => 'full', 'format' => 'src' ) ),
				            					esc_url( get_the_permalink() )
			            					);

						            	$title = ambersix_metabox( 'title' ) ? ambersix_metabox( 'title' ) : get_the_title();
						            	$title_html = sprintf('<h4 class="title"><a href="%1$s" title="%2$s">%2$s</a></h4>', esc_url( get_the_permalink() ), esc_attr( $title ) );

										echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), 'ambersix-rectangle' ) .'<div class="project-text">'. $title_html . $icon_html .'</div></div></div></div>';
									?>
								</div><!-- /.project-box -->
				            </div><!-- /.cbp-item -->
						<?php endwhile; ?>
					</div><!-- /#portfolio -->

					<?php ambersix_pagination(); ?>
				</div><!-- /.ambersix-project-grid -->
			<?php endif; ?>
    	</div>
    </div><!-- /#site-content -->
</div><!-- /#content-wrap -->

<?php get_footer(); ?>