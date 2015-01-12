<?php

$all_posts = bloodhound_team_members_WP_Query(); ?>

<div class="bxslider">

<?php
foreach ( $all_posts as $posts ) : ?>

<section id="bloodhound-team-members-section"><div class="row">

<div class="bloodhound-team-member-excerpt span3 premise-same-height right relative" data-height="<?php bloodhound_accordion_height(); ?>">
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
 		<?php bloodhound_the_team_member_excerpt( $posts[0] ); ?>
	</div>
 	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; right:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
 		<?php bloodhound_the_team_member_excerpt( $posts[1] ); ?>
	</div>
</div>

<div class="span6 relative premise-same-height">

	<div class="bloodhound-accordion border-box" style="overflow:hidden;min-height:<?php bloodhound_accordion_height(); premise_the_background( 'bloodhound_team_members', false ); ?>"><!-- Beigin Team Member -->
		
		<?php 
		foreach ( $posts as $post ) :
		setup_postdata( $post );
		
		$meta = get_post_meta( $post->ID, 'bloodhound_add_post', true ); ?>
		<h3 class="relative" style="background:<?php echo $meta['page-color']; ?>;color:<?php echo $meta['title-color']; ?>;"><?php echo get_the_title(); ?><i class="absolute fa fa-fw <?php echo $meta['nav-icon']; ?>" style="top:5px;right:5px;"></i></h3>
	
		<article <?php post_class( 'bloodhound-team-member inline-block' ); bloodhound_the_page_styles( $post ); ?>>

			<div class="block">
				<?php if( has_post_thumbnail() ) : ?>
					
					<div class="span4 float-left inline-block border-box" style="padding:0 20px 10px 0;">
						<?php the_post_thumbnail( 'medium', array( 'class' => 'inline-block responsive' ) ); ?>
					</div>
					
				<?php	$span = 'span8';

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

		<?php wp_reset_postdata();
		endforeach; ?>

	</div>

</div><!-- ./Middle Column -->
		

<div class="bloodhound-team-member-excerpt span3 premise-same-height left relative">
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="top:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
		<?php bloodhound_the_team_member_excerpt( $posts[2] ); ?>
	</div>
	<div class="bloodhound-team-member-excerpt block border-box absolute" style="bottom:0; left:0; width:100%; height:45%; overflow:hidden; margin-bottom:5%;">
		<?php bloodhound_the_team_member_excerpt( $posts[3] ); ?>
</div>
</div>

</div></section>

<?php endforeach; ?>

</div>