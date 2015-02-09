<?php 
/**
 * loop for home page if one age nav is selected. This template will add whatever posts or page has been selected
 * to be displayed in the one page home nav. If a page is selected this will look to see if any page template
 * has been assigned to that page and will load the correct template.
 *
 * @package Loop
 * @subpackage One Page Home
 */

bloodhound_the_title( $post );

/**
 * if this is a page NOT a post
 */
if ( 'page' == get_post_type() ) :
	
	/**
	 * if there are no page templates assigned to this page
	 */
	if ( 'page' !== bloodhound_get_page_template_name() ) :


		
		get_template_part( 'content', bloodhound_get_content_template() );


	else : 
		
	
		get_template_part( 'content', 'page' );

	
	endif;

else :


	get_template_part( 'content', 'single' );


endif;

?>