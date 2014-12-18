<?php 
/* Template Name: Full Width */

get_header(  );

 ?>


<section id="bloodhound-full-width-page" class="block bloodhound-section">

	<?php bloodhound_the_title( $post ); ?>

	<div class="clear"></div>

	<div class="container">

		<?php get_template_part( 'content', 'page' ); ?>

	</div>

</section>

<?php get_footer(); ?>