<?php 


get_header(); ?>

<section id="bloodhound_team_members_page" class="block">

	<div class="container">

		<?php //WP_Query for teammembers
		$team_members = new WP_Query( array( 'post_type' => 'teammember' ) );
		
		//check for posts
		if( $team_members->have_posts() ) :
			//start the loop
			while( $team_members->have_posts() ) :
				//get the post!
				$team_members->the_post(); ?>

					<article <?php post_class( '' ); ?>>
						
						<div class="row"><!-- Beigin Team Member -->

							<div class="span3 same-height right relative">
								<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:50%;"></div>
								<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:50%;"></div>
							</div>

							<div class="span6 same-height center">
								
							</div>

							<div class="span3 same-height left relative">
								<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:50%;"></div>
								<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:50%;"></div>
							</div>

						</div>

					</article>

				<?php 
			endwhile; //end loop
		else : 
			//get no content template
			get_template_part( 'no-content', 'teammembers' );

		endif; //done!.. whew!
		?>

	</div>

</section>

<?php get_footer(); ?>