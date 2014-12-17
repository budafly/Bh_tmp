<?php 
/* Template Name: Projects */

get_header(  );

 ?>


<section id="bloodhound_projects_page" class="block">

	<?php bloodhound_the_title( $post ); ?>

	<div class="clear"></div>

	<div class="container">

		<?php get_template_part( 'content', 'projects' ); ?>

	</div>

</section>

<?php get_footer(); ?>