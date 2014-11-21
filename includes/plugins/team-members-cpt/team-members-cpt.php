<?php
add_action( 'init', 'bloodhound_tmcpt_init' );
function bloodhound_tmcpt_init() {
    bloodhound_team_member_cpt();
	bloodhound_team_member_taxonomy();
	include_once('team-members-cpt-class.php');
}

/**
 * Team Mmeber CPT
 * @return registers team member cpt
 */
function bloodhound_team_member_cpt() {
	$labels = array(
		'name'               => _x( 'Team Members', 'post type general name', 'bloodhound-domain' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'bloodhound-domain' ),
		'menu_name'          => _x( 'Team Members', 'admin menu', 'bloodhound-domain' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'bloodhound-domain' ),
		'add_new'            => _x( 'Add New', 'Team Member', 'bloodhound-domain' ),
		'add_new_item'       => __( 'Add New Team Member', 'bloodhound-domain' ),
		'new_item'           => __( 'New Team Member', 'bloodhound-domain' ),
		'edit_item'          => __( 'Edit Team Member', 'bloodhound-domain' ),
		'view_item'          => __( 'View Team Member', 'bloodhound-domain' ),
		'all_items'          => __( 'All Team Members', 'bloodhound-domain' ),
		'search_items'       => __( 'Search Team Members', 'bloodhound-domain' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'bloodhound-domain' ),
		'not_found'          => __( 'No Team Members found.', 'bloodhound-domain' ),
		'not_found_in_trash' => __( 'No Team Members found in Trash.', 'bloodhound-domain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'teammember' ),
		'capability_type'    => 'post',
		'taxonomies' 		 => array( 'teammembers' ),
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'teammember', $args );
}

function bloodhound_team_member_taxonomy() {
	$labels = array(
		'name'              => _x( 'Team Members Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Team Members Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Team Members' ),
		'all_items'         => __( 'All Team Members Category' ),
		'parent_item'       => __( 'Parent Team Members Category' ),
		'parent_item_colon' => __( 'Parent Team Members Category:' ),
		'edit_item'         => __( 'Edit Team Members Category' ),
		'update_item'       => __( 'Update Team Members Category' ),
		'add_new_item'      => __( 'Add New Team Members Category' ),
		'new_item_name'     => __( 'New Team Members Category Name' ),
		'menu_name'         => __( 'Team Members Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'teammebers-cat' ),
	);

	register_taxonomy( 'teammebers-cat', array( 'teammember' ), $args );
}

function bloodhound_tmcpt_activate() {
    bloodhound_tmcpt_init();
	// You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bloodhound_tmcpt_activate' );
//register_activation_hook( __FILE__, 'bloodhound_tmcpt_activate' );

/**
 * Calls the class on the post edit screen.
 */
function call_BloodhoundTeamMemberClass() {
    new BloodhoundTeamMemberClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'call_BloodhoundTeamMemberClass' );
    add_action( 'load-post-new.php', 'call_BloodhoundTeamMemberClass' );
}

include( 'team-members-library.php' );