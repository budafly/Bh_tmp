<?php
/**
 * Template Name: Home One Page 
 *
 * This template displays the one page nav. making your home page a one page website.
 *
 * @package Template
 * @subpackage One Page Home
 */

get_header(); ?>

<section id="bloodhound-one-page-loop">
	
	<?php
	/**
	 * get the one page WP Query Object
	 */
	$WP_Query = bloodhound_one_page_loop_query();

	if ( $WP_Query->have_posts() ) :
		
		/**
		 * start the loop
		 */
		while ( $WP_Query->have_posts() ) : $WP_Query->the_post(); ?>

			<section id="<?php echo $post->post_name; ?>" <?php post_class( 'one-page-section bloodhound-section' ); bloodhound_the_page_styles( $post ); ?>>
				
				<?php get_template_part( 'loop', 'one-page-home' ); ?>

			</section>

		<?php endwhile;

	else :
		
		get_template_part( 'content', 'none' );

	endif; ?>

</section>

<?php get_footer(); ?>