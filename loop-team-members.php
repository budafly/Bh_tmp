<?php
//$paged = get_query_var( 'paged' );


$team_members = new WP_Query( array( 'post_type' => 'team_member' ) ); 
$all_posts = $team_members->get_posts();

$every_four = array_chunk( $all_posts, 4 );

echo '<div class="bxslider">';

foreach ( $every_four as $posts ) :

echo '<section id="bloodhound-team-members-section"><div class="row">';

echo '<div class="bloodhound-team-member-excerpt span3 same-height right relative" data-height="'.bloodhound_accordion_height().'">
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
 		bloodhound_the_team_member_excerpt( $posts[0] );
echo' 	</div>
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
 		bloodhound_the_team_member_excerpt( $posts[1] );
echo' 	</div>
 </div>
		
<div class="span6 relative same-height">

	<div class="bloodhound-accordion border-box" style="overflow:hidden;min-height:'.bloodhound_accordion_height().';'.premise_the_background( 'bloodhound_team_members', false ).'"><!-- Beigin Team Member -->';
		
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			
			$meta = get_post_meta( $post->ID, 'bloodhound_add_post', true );
			echo '<h3 class="relative" style="background:'.$meta['page-color'].';color:'.$meta['title-color'].';">'.get_the_title().'<i class="absolute fa fa-fw '.$meta['nav-icon'].'" style="top:5px;right:5px;"></i></h3>';
		
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

			wp_reset_postdata();
		endforeach;

	echo '</div>

</div><!-- ./Middle Column -->
		

<div class="bloodhound-team-member-excerpt span3 same-height left relative">
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
		bloodhound_the_team_member_excerpt( $posts[2] );
echo '	</div>
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">';
		bloodhound_the_team_member_excerpt( $posts[3] );
echo'	</div>
</div>';

echo '</div></section>';

endforeach;

echo '</div>';

 ?>


