<?php get_header(); ?>

<section id="content">

<div class="container">

	<?php while( have_posts() ) : the_post(); ?>
	
		<div class="page-title">
		
			<h2><?php the_title(); ?></h2>
		
		</div>
		
		<article <?php post_class(); ?>>
		
			<?php if( has_post_thumbnail() ) : ?>
			
				<div class="span4 float-left" style="margin-top:0;margin-left:0;">
				
					<?php the_post_thumbnail('full', array('class' => 'responsive')); ?>
				
				</div>
			
			<?php endif; ?>
		
			<?php the_content(); ?>
		
		</article>
	
	<?php endwhile; ?>

</div>

</section>

<?php get_footer(); ?>