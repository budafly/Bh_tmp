<?php get_header(); ?>
<div class="clear" style="margin-bottom:80px;"></div>
<section id="content">

<div class="container">

	<?php while( have_posts() ) : the_post(); ?>
	
		<div class="page-title">
		
			<h2><?php the_title(); ?></h2>
		
		</div>
		
		<article <?php post_class(); ?>>
		
			<?php the_content(); ?>
		
		</article>
	
	<?php endwhile; ?>

</div>

</section>

<?php get_footer(); ?>