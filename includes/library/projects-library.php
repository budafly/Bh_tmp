<?php 
/**
 * Bloodhound Projects Library
 *
 * This file holds all the function needed for the projects 
 * custom pot type to run properly. This document should not be 
 * changed. A theme update will erase your changes.
 *
 * @package Bloodhound
 * @subpackage Projects
 * @subpackage Library
 */



/**
 * Team Memeber WP Query
 * 
 * @return array array of objects for each post from team members custom post types
 */
function bloodhound_projects_WP_Query() {
	$projects = new WP_Query( array( 'post_type' => 'project' ) );
	return array_chunk( $projects->get_posts(), 4 );
}




/**
 * output the href attribute for each project anchor tag
 * 
 * @return string href attribute
 */
function bloodhound_project_anchor_classes( $myclasses = '' ) {
	$projects = get_option( 'bloodhound_projects' );

	$class = 'class="bloodhound-project col4 ';
	switch( $projects['permalink'] ) {
		case 'popup':
			$class .= 'bloodhound-project-popup ' . $myclasses . '" onclick="premisePopup(this, \'#content\');"';
			add_action( 'wp_footer', 'bloodhound_projects_popup_script' );
			break;

		default :
			$class .= $myclasses . '"';
			break;
	}
	echo $class;
}




/**
 * Load the necessary ajax markup for our popup
 */
function bloodhound_projects_popup_script() {
	return premise_load_ajax_markup();
}








?>