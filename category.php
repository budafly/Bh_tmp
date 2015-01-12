<?php get_header(); ?>

<section id="content">

<div class="container">
	
	<div class="page-title">
		
		<h2><?php single_cat_title( '', true ); ?></h2>
	
	</div>
	
	<article class="row category-grid">
	
		<?php while( have_posts() ) : the_post(); ?>
			
				<?php if( has_post_thumbnail() ) : ?>
				
					<div <?php post_class('span4 relative premise-same-height'); ?> style="margin-top:0;margin-left:0;">
						
						<a href="<?php the_permalink(); ?>" class="block">
							<?php the_post_thumbnail('full', array('class' => 'responsive')); ?>
						</a>
						
						<div class="post-details absolute">
							<a href="<?php the_permalink(); ?>" class="block">
								<h2><?php the_title(); ?></h2>
							</a>
							<div class="block">
								<?php the_excerpt(); ?>
							</div>
						</div>
	
						
					</div>
				
				<?php else : ?>
				
					<div <?php post_class('span4 relative premise-same-height'); ?> style="margin-top:0;margin-left:0;">
						
						<a href="<?php the_permalink(); ?>" class="block">
							<img src="" class="resopnsive">
						</a>
						
						<div class="post-details absolute">
							<a href="<?php the_permalink(); ?>" class="block">
								<h2><?php the_title(); ?></h2>
							</a>
							<div class="block">
								<?php the_excerpt(); ?>
							</div>
						</div>
	
						
					</div>
				
				<?php endif; ?>
			
		<?php endwhile; ?>
	
	</article>

</div>

</section>

<script>

jQuery(function($){
	$(window).load(function(){
	//set same height for elements were needed
	var currentTallest = 0;
	$('.premise-same-height').each(function(){
		if ($(this).height() > currentTallest) { 
			currentTallest = $(this).height(); 
		}
	});
	//set tallest as min-height
	$('.premise-same-height').css({'min-height': currentTallest});	
	});
});

</script>

<?php get_footer(); ?>