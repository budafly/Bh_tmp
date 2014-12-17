<?php
/**
 * Bloodhound Theme
 *
 * @author Vallgroup LLC <info@vallgroup.com>
 * @link https://github.com/vallgroup/Bloodhound GitHub
 * 
 * This powers our whole theme loading classes when needed and registering all our hooks 
 * and scripts required. If you would like to customize some of this theme functionality 
 * create a child theme than editing this file. Because by creating a chil theme you avoid
 * losing your changes when the theme gets updated in the future. For more information on
 * parent child themes visit the Wordpress Codex.
 * 
 * @link http://codex.wordpress.org/Child_Themes Read more about child themes
 * 
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * 
 * @package Bloodhound
 * @subpackage Functions
 *
 * @since 1.0
 */



define( 'BH_DIR', get_stylesheet_directory_uri() );



require_once( 'includes/includes.php' );



add_action('switch_theme', array( Bloodhound_Theme_Options_Class::get_instance(), 'run_defaults' ) );

add_action( 'admin_menu', array( Bloodhound_Theme_Options_Class::get_instance(), 'theme_page_init' ) );

add_theme_support('post-thumbnails', array( 'page', 'post', 'team_member', 'project' ) );

register_nav_menu( 'primary', 'Bloodhound Menu' );

echo Bloodhound_Theme_Options_Class::$Ajax['nonce'];


/**
 * Register portfolio custom post type
 *
 * Holds instance of new CPT
 *
 * @see Premise WP Framework for more information
 * @link https://github.com/vallgroup/Premise Premise WP Framework
 * 
 * @var object
 */
$portfolio = new PremiseCPT( 'project', array( 'supports' => array( 'title', 'thumbnail', 'excerpt', 'editor' ) ) );
$portfolio->register_taxonomy(array(
    'taxonomy_name' => 'project_category',
    'singular' => 'Project Category',
    'plural' => 'Project Categories',
    'slug' => 'project-category',
));




/**
 * Register team member custom post type
 *
 * Holds instance of new CPT
 *
 * @see Premise WP Framework for more information
 * @link https://github.com/vallgroup/Premise Premise WP Framework
 * 
 * @var object
 */
$team_member = new PremiseCPT( 'team_member', array( 'supports' => array( 'title', 'thumbnail', 'excerpt', 'editor' ) ) );




/**
 * Load Team Member metaboxes
 *
 * @see bloodhound-classes/team-members-cpt-class.php
 */
if( is_admin() ){
	add_action( 'load-post.php', 'call_Bloodhoundteam_memberClass' );
	add_action( 'load-post-new.php', 'call_Bloodhoundteam_memberClass' );
}




if( !function_exists('bloodhound_enqueue_scripts') ) {
/**
 * Site scripts
 */
function bloodhound_enqueue_scripts() {
	
	wp_register_style( 'jquery_ui'             , '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css' );
	wp_register_style( 'googlefonts'           , 'http://fonts.googleapis.com/css?family=Oswald:400,300,700|Nunito:400,300,700', array( 'jquery_ui' ) );
	wp_register_style( 'bxslider_css'          , BH_DIR . '/css/jquery.bxslider.css' );
	wp_register_style( 'bloodhound_style'      , BH_DIR . '/style.css', array( 'bxslider_css' ) );
	wp_register_style( 'bloodhound_responsive' , BH_DIR . '/css/responsive.css', array( 'bloodhound_style' ) );
	

	wp_register_script('bxslider_js'           , BH_DIR . '/js/jquery.bxslider.min.js' );
	wp_register_script('bloodhound_main_js'    , BH_DIR . '/js/main.js', array( 'jquery', 'jquery-ui-accordion', 'bxslider_js' ) );


	//wp_localize_script( 'bloodhound_admin_js', Bloodhound_Theme_Options_Class::$Ajax, array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	

	if( !is_admin() ) {
		wp_enqueue_style(	'bloodhound_responsive'	);
		wp_enqueue_script(	'bloodhound_main_js'	);
	}

}
}
add_action('wp_enqueue_scripts', 'bloodhound_enqueue_scripts');



if( !function_exists('bloodhound_enqueue_admin_scripts') ) {
/**
 * Admin scripts
 */
function bloodhound_enqueue_admin_scripts() {
	
	wp_register_style('minicolors_css'       , BH_DIR . '/includes/admin/css/jquery.minicolors.css');
	wp_register_style('bloodhound_admin_css' , BH_DIR . '/includes/admin/css/bloodhound-admin.css', array('minicolors_css'));
	

	wp_register_script('minicolors_js'       , BH_DIR . '/includes/admin/js/jquery.minicolors.min.js');
	wp_register_script('bloodhound_admin_js' , BH_DIR . '/includes/admin/js/bloodhound-admin.js', array('jquery', 'minicolors_js' ) );


	if( is_admin() ) {
		wp_enqueue_style(	'bloodhound_admin_css'	);	
		wp_enqueue_script(	'bloodhound_admin_js'	);
	}

}
}
add_action( 'admin_enqueue_scripts', 'bloodhound_enqueue_admin_scripts' );