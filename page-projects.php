<?php 
/* Template Name: Projects */

get_header(  );

 ?>


<section id="bloodhound-projects-page" class="block bloodhound-section">

	<?php bloodhound_the_title( $post ); ?>

	<div class="clear"></div>

	<div class="container">

		<?php get_template_part( 'loop', 'projects' ); ?>

	</div>

</section>

<?php get_footer(); ?>