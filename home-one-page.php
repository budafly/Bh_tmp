<?php
/* Template Name: Home One Page */
get_header( 'one-page' ); ?>

<section id="vg-one-page-loop">
	<?php
	$onepage = get_option( 'bloodhound_one_page_nav' );
	$post_types = get_post_types( array( 'public' => true ), 'names' );
	
		$menu_items = bloodhound_grab_menu_items_ids();
		$args = array(
			'post_type' => $post_types,
			'meta_key' => 'bloodhound_add_post_to_one_page',
			'meta_value' => '1',
			'orderby' => 'post__in',
			'order' => 'ASC',
			'post__in' => $menu_items,
		);

		if( $onepage['ignore-sticky'] )
			$args['post__not_in'] = get_option( 'sticky_posts' );
		
		$WP_Query = new WP_Query( $args );
		
		if ( $WP_Query->have_posts() ) :
			
			while ( $WP_Query->have_posts() ) : $WP_Query->the_post(); 
				$nav = get_post_meta( $post->ID, 'bloodhound_add_post', true );
				switch( $nav['style'] ){
					case 'solid' :
						$post_css = 'background:'.$nav['page-color'].';';
					break;

					case 'top' :
						$post_css = 'border-top: 20px solid '.$nav['page-color'].';';
					break;

					default :
						$post_css = 'background:#fff;';
					break;
				} ?>
				
				<article id="<?php echo $post->post_name; ?>" <?php post_class( 'one-page-section' ); echo 'style="'.$post_css.'"'; ?>>
					<?php bloodhound_the_title( $post ); ?>
					
					<div class="container">

						<div class="main">
							
							<?php if( has_post_thumbnail() ) : ?>
								<div class="post-thumbnail span4 float-left">
									<?php the_post_thumbnail( 'full', array( 'class' => 'responsive' ) ); ?>
								</div>
							<?php endif; ?>

							<?php the_content(); ?>

						</div>

					</div>
					<div class="clear"></div>
				</article>

			<?php endwhile;

		else :
			echo 'No posts or pages have been added to your one page nav.';
		endif;
	?>
</section>

<?php get_footer(); ?>