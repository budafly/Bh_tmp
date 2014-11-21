<?php 
/* Template Name: Team Members */

get_header();

$title = vg_the_title( $post, false, false ); ?>

<section id="bloodhound_team_members_page" class="block">

	<?php vg_the_title( $post ); ?>

	<div class="clear"></div>

	<div class="container">

		<section class="bloodhound-team-members-page border-box block">
			<div class="row">
				
				<div class="bloodhound-team-member-excerpt span3 same-height right relative" data-height="450px" >
				 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
				 		<?php bloodhound_the_team_member_excerpt( '0' ); ?>
				 	</div>
				 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
				 		<?php bloodhound_the_team_member_excerpt( '1' ); ?>
				 	</div>
				 </div>
						
				<div class="span6 relative same-height">
					<?php get_template_part( 'content-team-member' ); ?>
					<div class="bloodhound-our-team-title"><?php echo $title; ?></div>
				</div>
						

				<div class="bloodhound-team-member-excerpt span3 same-height left relative">
					<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
						<?php bloodhound_the_team_member_excerpt( '2' ); ?>
					</div>
					<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
						<?php bloodhound_the_team_member_excerpt( '3' ); ?>
					</div>
				</div>

			</div>
		</section>

	</div>

</section>

<?php get_footer(); ?>