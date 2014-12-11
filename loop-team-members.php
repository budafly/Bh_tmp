<?php
$paged = get_query_var( 'paged' );
$team_members = new WP_Query( array( 'post_type' => 'team_member', 'posts_per_page' => 4, 'paged' => $paged ) ); 
$posts = $team_members->get_posts();
$team_members = get_option( 'bloodhound_team_members' ); ?>

<div class="bloodhound-accordion border-box" style="overflow:hidden;min-height:<?php echo $team_members['accordion-height']; ?>;"><!-- Beigin Team Member -->

	<?php $all_posts = array_chunk( $posts, 4 );
	foreach( $all_posts as $posts ) :
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			
			bloodhound_the_team_member_name(); ?>
			<article <?php post_class( 'bloodhound-team-member inline-block' );  ?> <?php bloodhound_the_page_styles( $post ); ?>>
				<div class="block">
					<?php if( has_post_thumbnail() ) : ?>
						<div class="span4 float-left inline-block border-box" style="padding:0 20px 10px 0;">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'inline-block responsive' ) ); ?>
						</div>
					<?php $span = 'span8'; 
					else : 
						$span = 'block';
					endif; ?>

					<div class="bloodhound-team-member-info float-left <?php echo $span; ?>">
						<?php bloodhound_the_team_meber_info(); ?>
					</div>

					<div class="clear"></div>

					<div class="block justify">
						<?php the_content(); ?>
					</div>
				</div>

			</article>

		<?php 
		endforeach;
	endforeach; ?>

</div>

<?php 

if ( $paged ) : 

	echo 'nav';

endif; ?>