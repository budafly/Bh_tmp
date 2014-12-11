<?php 


$team_members = get_option( 'bloodhound_team_members' ); ?>


<section class="bloodhound-team-members-page border-box block">
	<div class="row">
		
		<div class="bloodhound-team-member-excerpt span3 same-height right relative" data-height="<?php echo $team_members['accordion-height']; ?>">
		 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
		 		<?php bloodhound_the_team_member_excerpt( $post, '0' ); ?>
		 	</div>
		 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
		 		<?php bloodhound_the_team_member_excerpt( $post, '1' ); ?>
		 	</div>
		 </div>
				
		<div class="span6 relative same-height">
			<?php get_template_part( 'loop', 'team-members' ); ?>
		</div>
				

		<div class="bloodhound-team-member-excerpt span3 same-height left relative">
			<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
				<?php bloodhound_the_team_member_excerpt( $post, '2' ); ?>
			</div>
			<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
				<?php bloodhound_the_team_member_excerpt( $post, '3' ); ?>
			</div>
		</div>

	</div>
</section>