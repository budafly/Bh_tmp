<?php get_header(); ?>

<section id="page" class="bloodhound-section">

<div class="container">

	<?php while( have_posts() ) : the_post(); ?>
	
		<div class="page-title">
		
			<h2><?php the_title(); ?></h2>
		
		</div>
		
		<?php get_template_part( 'content', 'page' ); ?>
	
	<?php endwhile; ?>

</div>

</section>

<?php get_footer(); ?>