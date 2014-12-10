<?php
/**
 * Bloodhound Hooks
 *
 * @package Bloodhound
 * @subpackage Hooks
 */


// On theme activation
add_action('switch_theme', array( Bloodhound_Theme_Options_Class::get_instance(), 'run_defaults' ) );

add_action('wp_enqueue_scripts', 'bloodhound_enqueue_scripts');

add_action( 'admin_menu', array( Bloodhound_Theme_Options_Class::get_instance(), 'theme_page_init' ) );

add_action( 'admin_enqueue_scripts', 'bloodhound_enqueue_admin_scripts' );



?>