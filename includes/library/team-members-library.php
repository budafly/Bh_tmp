<?php
/**
 * Team Member Function Library
 * 
 * @package 	Bloodhound
 * @subpackage 	Team Member
 * @subpackage 	Library
 */




/**
 * Team Member info
 * 
 * @return string team member's info
 */
function bloodhound_the_team_meber_info() {
	global $post;

	if( !$post )
		return false;

	$tm_info = get_post_meta( $post->ID, 'bloodhound_tmcpt_meta', true );
	$page_meta = get_post_meta( $post->ID, 'bloodhound_add_post', true );

	foreach ( $tm_info as $key => $value ) {
		
		$html = '<span class="block left border-box'.$key.'">';

		switch ( $key ) {
			case 'title':
				$html .= '<span style="color:'.$page_meta['title-color'].';font-size:1.5em;text-transform:uppercase;">'.$value.'</span>';
				break;

			case 'email':
				$html .= '<a href="mailto:'.$value.'" style="color:'.$page_meta['title-color'].';">'.$value.'</a>';
				break;

			case 'tel':
			case 'cell':
				$html .= '<a href="tel:'.$value.'" style="color:'.$page_meta['title-color'].';">'.$value.'</a>';
				break;

			case 'url':
				$url = preg_match( "/\/\//", $value ) ? $value : 'http://'.$value;
				$html .= '<a href="'.$url.'" style="color:'.$page_meta['title-color'].';">'.$value.'</a>';
				break;

			default:
				$html .= '<span style="color:'.$page_meta['title-color'].';">'.$value.'</span>';
				break;
		}

	 	$html .= '</span>';

	 	echo $html;
	}
}




/**
 * Displays the excerpt for each team member
 * Must be used within the team members loop.
 * 	
 * @param  object $post the post for each team member custom post type
 * @return string       html output to display excerpt and team member title
 */
function bloodhound_the_team_member_excerpt( $post ) {
	$meta = get_post_meta( $post->ID, 'bloodhound_add_post', true );
	echo '<h3 class="block" style="font-weight:700;color:'.$meta['page-color'].';">'.$post->post_title.'</h3><span class="block">'.$post->post_excerpt.'</span>';
}





/**
 * Return the accordion height
 * 	
 * @return var returns height to be used for the accordion
 */
function bloodhound_accordion_height() {
	$team_members = get_option( 'bloodhound_team_members' );
	return $team_members['accordion-height'];
}

?>
