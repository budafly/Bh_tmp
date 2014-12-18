<?php 
/* Template Name: Team Members */

get_header(  );

$title = bloodhound_the_title( $post, false, false ); ?>


<section id="bloodhound_team_members_page" class="block bloodhound-section">

	<?php bloodhound_the_title( $post ); ?>

	<div class="clear"></div>

	<div class="container">

		<?php get_template_part( 'content', 'team-members' ); ?>

	</div>

</section>

<?php get_footer(); ?>