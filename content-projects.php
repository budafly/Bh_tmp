<?php  ?>

<!-- Content Project -->
<article <?php post_class(); ?>>
		
	<?php if( has_post_thumbnail() ) : ?>

		<div class="span4 float-left" style="margin-top:0;margin-left:0;">
		
			<?php the_post_thumbnail('full', array('class' => 'responsive')); ?>
		
		</div>

	<?php endif; ?>

	<?php the_content(); ?>

</article>