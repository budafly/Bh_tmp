<?php get_header(); ?>

<section id="single-post">

<div class="container">

	<?php 
	/**
	 * Check if there are any posts
	 */
	if( have_posts() ) :

		/**
		 * Start the loop
		 */
		while( have_posts() ) : the_post(); ?>
		
			<div class="page-title">
			
				<h2><?php the_title(); ?></h2>
			
			</div>
			
			<?php 
			/**
			 * Get the template part that corresponds to this content
			 */
			get_template_part( 'content', 'single' ); ?>
		
		<?php endwhile;

	else :

		get_template_part( 'content', 'none' );

	endif; ?>

</div>

</section>

<?php get_footer(); ?>