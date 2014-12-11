<?php
/* Template Name: Home One Page */
get_header(  ); ?>

<section id="bloodhound-one-page-loop">
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
			
			while ( $WP_Query->have_posts() ) : $WP_Query->the_post(); ?>

				<section id="<?php echo $post->post_name; ?>" <?php post_class( 'one-page-section bloodhound-section' ); bloodhound_the_page_styles( $post ); ?>>
					
					<?php 

					bloodhound_the_title( $post );

					if ( 'page' == get_post_type() ) :
						
							$page_template = basename( get_page_template() );
							
							$page_template_name = current( explode( '.php', $page_template, 2 ) );

						if ( 'page' !== $page_template_name ) :


							$page_template_name = explode( 'page-', $page_template_name, 2 );

						


							get_template_part( 'content', $page_template_name[1] );


						else : 
							
						
							get_template_part( 'content', 'page' );

						
						endif;

					else :


						get_template_part( 'content', 'single' );


					endif;

					?>

				</section>

			<?php endwhile;

		else :
			echo 'No posts or pages have been added to your one page nav.';
		endif;
	?>
</section>

<?php get_footer(); ?>