<?php
//include_once( 'includes/Premise/premise.php' );

function vg_print_r($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}
/**
 * Upon theme activation
 */
if ( !function_exists( 'vg_theme_activation' ) ) {
	function vg_theme_activation() {
		$defaults = array(
			'vg_fb' => '#Facebook', 
			'vg_tt' => '#Twitter',
			'vg_one_page_nav' => array(
				'ignore-sticky' => '1',
			),
			'vg_splash' => array(
				'logo' => get_stylesheet_directory().'/img/defaults/logo-splash.png',
			),
		);
		
		//redirect to theme options page
		$url = admin_url().'/themes.php?page=bloodhound_theme_options';
		wp_redirect( $url );
	}
}
add_action('switch_theme', 'vg_theme_activation');

/**
 * Setup Wordpress
 */
if ( !function_exists( 'vg_setup_wp' ) ) {
	function vg_setup_wp() {
		add_theme_support('post-thumbnails', array( 'page', 'post', 'teammember' ) );
		//register Navs
		register_nav_menus( array( 'primary' => 'Primary Menu', 'second' => 'Secondary Menu' ) );
	}
}
add_action( 'init', 'vg_setup_wp' );

/**
 * Site scripts
 */
if( !function_exists('vg_enqueue_scripts') ) {
	function vg_enqueue_scripts() {
		//register stylesheets
		wp_register_style( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css' );
		wp_register_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700|Nunito:400,300,700', array( 'jquery-ui' ) );
		wp_register_style( 'fontawesome', get_template_directory_uri().'/includes/font-awesome-4.2.0/css/font-awesome.css', array( 'googlefonts' ) );//'//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'
		wp_register_style( 'premise', get_template_directory_uri().'/includes/Premise/css/premise.css', array( 'fontawesome' ) );
		wp_register_style( 'vg_style', get_template_directory_uri().'/style.css', array( 'premise' ) );
		wp_register_style( 'vg_responsive', get_template_directory_uri().'/css/responsive.css', array( 'vg_style' ) );
		//register scripts
		wp_register_script('premise', get_template_directory_uri().'/includes/Premise/js/premise.js', array( 'jquery' ) );
		wp_register_script('vg_main_js', get_template_directory_uri().'/js/main.js', array( 'premise', 'jquery-ui-accordion' ) );
		//enqueue styles and scripts
		if( !is_admin()){
			wp_enqueue_style('vg_responsive');
			wp_enqueue_script('vg_main_js');
		}
	}
}
add_action('wp_enqueue_scripts', 'vg_enqueue_scripts');

/**
 * Create theme options page
 */
function vg_add_theme_options_page() {
	$vg_theme_page = add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'bloodhound_theme_options', 'vg_build_options_page');
	add_action('admin_init', 'vg_register_theme_settings');
	//add_action('admiin_print_scripts-'.$vg_theme_page, 'vg_load_admin_scripts');
}
add_action('admin_menu', 'vg_add_theme_options_page');

/**
 * Admin scripts
 */
if( !function_exists('vg_enqueue_admin_scripts') ) {
	function vg_enqueue_admin_scripts() {
		//register admin style
		wp_register_style( 'fontawesome', get_template_directory_uri().'/includes/font-awesome-4.2.0/css/font-awesome.css' );//'//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
		wp_register_style( 'premise', get_template_directory_uri().'/includes/Premise/css/premise.css', array( 'fontawesome' ) );
		wp_register_style('minicolors-css', get_template_directory_uri().'/includes/admin/css/jquery.minicolors.css');
		wp_register_style('vg_admin_css', get_template_directory_uri().'/includes/admin/css/vg-admin.css', array('premise', 'minicolors-css'));
		//register scripts
		wp_register_script('minicolors', get_template_directory_uri().'/includes/admin/js/jquery.minicolors.min.js');
		wp_register_script( 'premise', get_template_directory_uri().'/includes/Premise/js/premise.js' );
		wp_register_script('vg_admin_js', get_template_directory_uri().'/includes/admin/js/vg-admin.js', array('jquery', 'minicolors', 'premise' ) );
		//enqueue admin style and script
		if( is_admin()){
			wp_enqueue_style('vg_admin_css');	
			wp_enqueue_script('vg_admin_js');
		}
	}
}
add_action( 'admin_enqueue_scripts', 'vg_enqueue_admin_scripts' );

/**
 * Load admin scripts
 */
function vg_load_admin_scripts() {
	add_action('admin_enqueue_scripts', 'vg_enqueue_admin_scripts');
}

/**
 * Build theme options page
 */
function vg_build_options_page() {
	wp_enqueue_media();
	//create theme options page
	require_once( TEMPLATEPATH . '/includes/admin/theme-options/theme-options.php' );
}

/**
 * register theme settings
 */
if ( !function_exists( 'vg_register_theme_settings' ) ) {
	function vg_register_theme_settings () {
		register_setting( 'vg_theme_options', 'vg_home' );
		register_setting( 'vg_theme_options', 'vg_one_page_nav' );
		register_setting( 'vg_theme_options', 'vg_splash' );
		register_setting( 'vg_theme_options', 'vg_header' );
		register_setting( 'vg_theme_options', 'vg_logo' );

		register_setting( 'vg_theme_options', 'vg_enable_one_page' );
	}
}

/**
 * Includes
 */
require_once( 'includes/includes.php' );


function vg_home_splash_nav_class($classes, $item){
	if(is_single() && $item->title == "Blog"){ //Notice you can change the conditional from is_single() and $item->title
		$classes[] = "special-class";
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'vg_home_splash_nav_class' , 10 , 2);