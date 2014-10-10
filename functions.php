<?php
/*
*	On Theme activation
*
*	This function runs  only when the theme is activated.
*	It sets defaults, flushes rewrite rules, and redirects
*	the user to the theme options page.
*
**/
if ( !function_exists( 'vg_theme_activation' ) ) {
	function vg_theme_activation() {
		$defaults = array(
			'vg_fb' => '#Facebook', 
			'vg_tt' => '#Twitter', 
		);
		$options = wp_parse_args( $options, $defaults );
	}

	$url = admin_url( 'themes.php?page=TEMPLATE_NAME_theme_options' );
	//wp_redirect( $url ); exit;
}
add_action('switch_theme', 'vg_theme_activation');

/*
*	Load Admin Scripts
*
*	@return: Loads admin scripts and stylesheets
*
**/
if( !function_exists('vg_enqueue_admin_scripts') ) {
	function vg_enqueue_admin_scripts() {
		
		if( is_admin()){

		}
	}
		function my_enqueue($hook) {
	    if ( 'edit.php' != $hook ) {
	        return;
	    }

	    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'myscript.js' );
	}
	add_action( 'admin_enqueue_scripts', 'my_enqueue' );
}

/*
*	Load Scripts
*
*	@return: Loads front-end scripts and stylesheets
*
**/
if( !function_exists('vg_enqueue_scripts') ) {
	function vg_enqueue_scripts() {
		
		if( !is_admin()){

		}
	}
}
add_action('wp_enqueue_scripts', 'vg_enqueue_scripts');

/*
*	Theme Essentials
*
*	Register Navs, sidebars, and add support for Wordpress functionalities
*
**/
add_theme_support('post-thumbnails', array('page', 'post'));

//register Navs
register_nav_menu('primary', 'Primary Menu');

//register header widget
$header = array( 	'name'          => __( 'Header Widget' ),
					'id'            => 'header-widget',
					'description'   => 'Widget to display in the header',
				    'class'         => 'header-widget');
register_sidebar( $header );

/*
*	Theme Options Page
*
*	Register and create theme options page
*
**/
function vg_add_theme_options_page() {
	$vg_theme_page = add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'bloodhound_theme_options', 'vg_build_options_page');
	add_action('admin_init', 'register_vg_settings');
	add_action('load-'.$vg_theme_page, 'vg_load_scripts');
}
add_action('admin_menu', 'vg_add_theme_options_page');
function vg_build_options_page() {
	wp_enqueue_media();
	require_once( 'theme-options.php' );
}
//Load Scripts for theme options
function vg_load_scripts() {
	add_action('admin_enqueue_scripts', 'vg_enqueue_admin_scripts');
}

/*======================================================================================*/
function vg_get_header_layout() {
	$layout = get_option('vg_header_layout');
	
	switch( $layout ) {
		
		case '3-6-3' : 
			$span = array('span3', 'span6', 'span3');
		break;
		
		case '4-4-4' : 
			$span = array('span4', 'span4', 'span4');
		break;
		
		case '6-6' :
			$span = array('span6', 'span6');
		break;
		
		case '3-9' :
			$span = array('span3', 'span9');
		break;
	}
	return $span;
}

function vg_header_class() {
	//get mobile nav options
	$force_mobile = get_option('vg_force_mobile');
	$nav_animation = get_option('vg_mobile_nav_animation');
	$btn_position = get_option('vg_mobile_nav_btn');
	
	echo $force_mobile.' '.$nav_animation.' '.$btn_position.' '.$btn_bg.' '.$btn_color.' '.$nav_theme;
}

//vg background composer

function vg_header_style( $s="" ) {
	//get main header styles
	$header = get_option('vg_header');
	$header_border = get_option('vg_header_border');

	$style = 'style="';

	if($header['sticky'] && '1' == $header['sticky']){
		$position = 'position:fixed;top:0;left:0;width:100%;z-index:99;';
		$style .= $position;
	}

	if($header_border) {
		$style .= "border-bottom:".$header_border['px']." ".$header_border['style']." ".$header_border['color'].";";
	}
	
	//color, gradient, pattern, or image
	switch ( $header['bg'] ) {
		case 'color':
			$style .= 'background:'.get_option( 'vg_header_bgcolor' ).';';
			break;
		
		case 'gradient':
			$style .= "";
			break;

		case 'pattern':
			$style .= "background: url(".get_option( 'vg_header_pattern' ).") repeat scroll top left transparent;";
			break;

		case 'image':
			$image = get_option( 'vg_header_image' );
			$style .= "background: url( ".$image['image']." ) ".$image['repeat']." ".$image['attach']." ".$image['position-x']." ".$image['position-y']." transparent;";
			break;

		default:
			$style .= 'background:'.get_option( 'vg_header_bgcolor' ).';';
			break;
	}
	
	$style .= ''.$s.'"';
	
	echo $style;
}

function vg_output_css( ) {
	$gradient = get_option('vg_header_gradient');

	$style = "<style>
		#header {";
	if('radial' == $gradient['dir']){
		$style .= "
			background-color: ".$gradient['start'].";
			background: -webkit-gradient(radial, center center, 0, center center, 460, from(".$gradient['start']."), to(".$gradient['finish']."));
			background: -webkit-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");
			background: -moz-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");
			background: -ms-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");";
	}
	else{
		if('linear' == $gradient){
			if('ttb' == $gradient['linear']){
				$style .= "
					background-color: ".$gradient['start'].";
					background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(".$gradient['start']."), to(".$gradient['finish']."));
					background: -webkit-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -moz-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -ms-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -o-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");";
			}
			else{
				$style .= "
					background-color: ".$gradient['start'].";
					background: -webkit-gradient(linear, left top, right top, from(".$gradient['start']."), to(".$gradient['finish']."));
					background: -webkit-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -moz-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -ms-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -o-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");";
			}
		}
	}
	
	$style .= "}
		</style>";
	echo $style;
}