<?php  ?>

<article <?php post_class(); ?>>
	
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