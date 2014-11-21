<?php
/**
 * Team Member Function Library
 * @package Team Member
 */

/**
 * Team Member info
 * @return echo team member's info
 */
function bloodhound_the_team_meber_info() {
	global $post;

	if( !$post )
		return false;

	$tm_info = get_post_meta( $post->ID, 'bloodhound_tmcpt_meta', true );

	foreach ( $tm_info as $key => $value ) {
		
		$html = '<span class="block left border-box'.$key.'">';

		switch ( $key ) {
			case 'title':
				$html .= '<span style="font-size:1.5em;text-transform:uppercase;">'.$value.'</span>';
				break;

			case 'email':
				$html .= '<a href="mailto:'.$value.'">'.$value.'</a></span>';
				break;

			case 'tel':
			case 'cell':
				$html .= '<a href="tel:'.$value.'">'.$value.'</a></span>';
				break;

			case 'url':
				$url = preg_match( "/\/\//", $value ) ? $value : 'http://'.$value;
				$html .= '<a href="'.$url.'">'.$value.'</a></span>';
				break;

			default:
				$html .= $value;
				break;
		}

	 	$html .= '</span>';

	 	echo $html;
	}
}

function bloodhound_the_team_member_name() {
	global $post;

	if( !$post )
		return false;

	$meta = get_post_meta( $post->ID, 'vg_add_post', true );

	echo '<h3 class="relative" style="	background:	'.$meta['page-color'].';
										color:		'.$meta['title-color'].';">
	'.get_the_title().'<i class="absolute fa fa-fw '.$meta['nav-icon'].'" style="top:5px;right:5px;"></i></h3>';
}

function bloodhound_the_team_member_excerpt( $i ) {
	$side_info = get_posts( 'post_type=teammember&numberposts=4' );
	
	if( $side_info[$i] ) {
		global $post;
		$meta = get_post_meta( $post->ID, 'vg_add_post', true );
		echo '<h3 class="block" style="font-weight:700;color:'.$meta['page-color'].';">'.$side_info[$i]->post_title.'</h3>
			  <span class="block">'.$side_info[$i]->post_excerpt.'</span>';
	}
}

?>
