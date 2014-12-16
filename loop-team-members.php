<?php
$paged = get_query_var( 'paged' );
$team_members = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => 4, 'paged' => $paged ) ); 
$posts = $team_members->get_posts();
$team_members = get_option( 'bloodhound_team_members' );

echo '<div class="bloodhound-team-member-excerpt span3 same-height right relative" data-height="'.$team_members['accordion-height'].'">
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
 		bloodhound_the_team_member_excerpt( $posts[0], '0' );
echo' 	</div>
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
 		bloodhound_the_team_member_excerpt( $posts[1], '1' );
echo' 	</div>
 </div>
		
<div class="span6 relative same-height">

	<div class="bloodhound-accordion border-box" style="overflow:hidden;min-height:'.$team_members['accordion-height'].';"><!-- Beigin Team Member -->';
		
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			
			bloodhound_the_team_member_name();
			echo '<article ';
				post_class( 'bloodhound-team-member inline-block' ); 
				bloodhound_the_page_styles( $post );
				echo '>';

				echo '<div class="block">';
					if( has_post_thumbnail() ) :
						
						echo '<div class="span4 float-left inline-block border-box" style="padding:0 20px 10px 0;">';
							the_post_thumbnail( 'medium', array( 'class' => 'inline-block responsive' ) );
						echo '</div>';
						
						$span = 'span8'; 

					else : 

						$span = 'block';

					endif;

					echo '<div class="bloodhound-team-member-info float-left '.$span.'">';
						bloodhound_the_team_meber_info();
					echo '</div>

					<div class="clear"></div>

					<div class="block justify">';
						the_content();
					echo '</div>
				</div>

			</article>';

		endforeach;

	echo '</div>

</div><!-- ./Middle Column -->
		

<div class="bloodhound-team-member-excerpt span3 same-height left relative">
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
		bloodhound_the_team_member_excerpt( $posts[2], '2' );
echo '	</div>
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
		bloodhound_the_team_member_excerpt( $posts[3], '3' );
echo'	</div>
</div>';













if ( $paged ) : 

	echo 'nav';

endif; ?>