<?php 
/**
 * Bloodhound Projects Library
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
			$class .= 'bloodhound-project-popup ' . $myclasses . '" onclick="bloodhoundProjectPopup(this);"';
			add_action( 'wp_footer', 'bloodhound_projects_popup_script' );
			break;

		default :
			$class .= $myclasses . '"';
			break;
	}
	echo $class;
}





function bloodhound_projects_popup_script() {
	return bloodhound_prepare_ajax();
}





function bloodhound_prepare_ajax() {
	$ajax_overlay = '<div id="bloodhound-ajax-overlay" style="
		display:none;
		position:fixed;
		top:0;
		left:0;
		width:100%;
		height:100%;
		background-color:#FFFFFF;
		opacity:.6;
		z-index:9990;
		"></div>';

	$ajax_icon = '<div id="bloodhound-ajax-loading" 
		class="absolute center" style="
		display:none;
		position:fixed;
		width:60px;
		top:40%;
		left:50%;
		margin-left:-30px;
		z-index:9991;
		"><i class="fa fa-3x fa-spinner fa-spin"></i></div>';

	$ajax_dialog = '<div id="bloodhound-ajax-dialog" style="
		display:none;
		position:fixed;
		top:10%;
		left:10%;
		width:80%;
		height:80%;
		background-color:#FFFFFF;
		z-index:9992;
		overflow:auto;
		box-shadow: 0 0 5px #333333;
		-webkit-box-shadow: 0 0 5px #333333;
		-moz-box-shadow: 0 0 5px #333333;
		-ms-box-shadow: 0 0 5px #333333;
		-o-box-shadow: 0 0 5px #333333;
		padding:20px;
		" class="round-corners25"></div>';

	$ajax_control = '<a id="bloodhound-ajax-close" style="
		display:none;
		position: fixed;
		padding: 2px 12px;
		top: 60px;
		right: 40px;
		background: #FFFFFF;
		z-index: 9995;
		line-height: 150%;
		font-size: 20px;
		color: #AAAAAA;
		border-radius: 24px;
		-webkit-border-radius: 24px;
		-moz-border-radius: 24px;
		-ms-border-radius: 24px;
		-o-border-radius: 24px;
		box-shadow: 0 0 5px #333333;
		-webkit-box-shadow: 0 0 5px #333333;
		-moz-box-shadow: 0 0 5px #333333;
		-ms-box-shadow: 0 0 5px #333333;
		-o-box-shadow: 0 0 5px #333333;
		" class="row" href="javascript:;" onclick="bloodhoundAjaxClose();">x</a>';

	echo $ajax_overlay, $ajax_icon, $ajax_dialog, $ajax_control;
}


?>