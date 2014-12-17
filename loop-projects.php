<?php

$all_posts = bloodhound_projects_WP_Query(); ?>

<div class="bxslider">

	<?php 
	foreach ( $all_posts as $posts ) : ?>

		<section id="bloodhound-projects-section">

			<div class="row">

				<?php 
				foreach ( $posts as $post ) :
					setup_postdata( $post );
					
					$meta = get_post_meta( $post->ID, 'bloodhound_add_post', true ); ?>

					<a href="<?php the_permalink(); ?>" <?php bloodhound_project_anchor_classes(); ?>>

						<?php if( has_post_thumbnail() ) : $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
							<div class="block" style="height:200px;background:url(<?php echo $url; ?>) no-repeat center center / cover;"></div>
						<?php endif; ?>

					
						<article <?php post_class( 'bloodhound-project-anchor same-height center relative' ); bloodhound_the_page_styles( $post ); ?>>

							<h3 style="color:<?php echo $meta['title-color']; ?>;"><?php the_title(); ?></h3>

							<div class="block bloodhound-project-excerpt" style="color:<?php echo $meta['title-color']; ?>;">
								<?php the_excerpt(); ?>
							</div>

							<span class="bloodhound-project-icon block center" style="color:<?php echo $meta['title-color']; ?>;"><i class="fa fa-fw <?php echo $meta['nav-icon']; ?>"></i></span>

						</article>

					</a>

					<?php wp_reset_postdata();
				endforeach; ?>

			</div>

		</section>

	<?php 
	endforeach; ?>

</div>