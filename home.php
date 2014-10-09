<?php 
/* Template Name: Home	 */

get_header(); 
?>
<!--
<section id="slider">

	<?PHP echo do_shortcode('[layerslider id="1"]'); ?>

</section>
-->

<section id="main-content" class="main-content">

	<article id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					the_content();

				endwhile;
			?>

		</div><!-- #content -->
	</article><!-- #primary -->
</div><!-- #main-content -->
<?php get_footer(); ?>