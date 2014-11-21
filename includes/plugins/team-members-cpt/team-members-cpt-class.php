<?php
/** 
 * The BloodhoundTeamMemberClass
 */
class BloodhoundTeamMemberClass {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'bloodhound_tmcpt_metabox' ) );
		add_action( 'save_post', array( $this, 'bloodhound_tmcpt_metabox_save' ) );
	}

	public function bloodhound_tmcpt_metabox( $post_type ) {
        $post_types = array( 'teammember' );
        if ( in_array( $post_type, $post_types ) )
        	add_meta_box( 'team-member-options', __( 'Team Member Info', 'bloodhound_textdomain' ), array( $this, 'bloodhound_tmcpt_metabox_render' ), $post_type, 'normal', 'high' );
	}

	public function bloodhound_tmcpt_metabox_save( $post_id ) {
		// Check if our nonce is set.
		if ( !isset( $_POST['bloodhound_tmcpt_metabox_nonce'] ) )
			return $post_id;

		$nonce = $_POST['bloodhound_tmcpt_metabox_nonce'];

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $nonce, 'bloodhound_tmcpt_check_nonce' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
        // so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( !isset( $_POST['post_type'] ) && 'teammember' !== $_POST['post_type'] )
			return $post_id;

		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$mydata = $_POST['bloodhound_tmcpt_meta'];

		// Update the meta field.
		update_post_meta( $post_id, 'bloodhound_tmcpt_meta', $mydata );
	}

	public function bloodhound_tmcpt_metabox_render( $post ) {
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'bloodhound_tmcpt_check_nonce', 'bloodhound_tmcpt_metabox_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$meta = get_post_meta( $post->ID, 'bloodhound_tmcpt_meta', true );
		
		echo '<div class="row"><div class="col2">';
		$field_builder = array( array(  'type' 	  => 'text',		//title
								   'name' 		  => 'bloodhound_tmcpt_meta[title]',
								   'value' 	  	  => $meta['title'],
								   'id' 		  => 'bh_tmcpt_title',
								   'placeholder'  => 'title',),
								array(  'type' 	  => 'email',		//email
								   'name' 		  => 'bloodhound_tmcpt_meta[email]',
								   'value' 	  	  => $meta['email'],
								   'id' 		  => 'bh_tmcpt_email',
								   'placeholder'  => 'email',),
								array(  'type' 	  => 'tel',			//tel
								   'name' 		  => 'bloodhound_tmcpt_meta[tel]',
								   'value' 	  	  => $meta['tel'],
								   'id' 		  => 'bh_tmcpt_tel',
								   'placeholder'  => 'tel',),
								array(  'type' 	  => 'tel',			//cell
								   'name' 		  => 'bloodhound_tmcpt_meta[cell]',
								   'value' 	  	  => $meta['cell'],
								   'id' 		  => 'bh_tmcpt_cell',
								   'placeholder'  => 'cell',),
								array(  'type' 	  => 'text',		//url
								   'name' 		  => 'bloodhound_tmcpt_meta[url]',
								   'value' 	  	  => $meta['url'],
								   'id' 		  => 'bh_tmcpt_url',
								   'placeholder'  => 'url',),
								array(  'type' 	  => 'textarea',	//address
								   'name' 		  => 'bloodhound_tmcpt_meta[address]',
								   'value' 	  	  => $meta['address'],
								   'id' 		  => 'bh_tmcpt_address',
								   'placeholder'  => 'address',), );
		premise_field( $field_builder );
		echo '</div><div class="col2">';
		//user info
		echo '<div class="block center">';
		if ( has_post_thumbnail() )
			the_post_thumbnail( 'medium', array( 'class' => 'inline-block responsive' ) );
		else echo '<img src="" class="inline-block responsive">';
		echo '</div>
		<div class="block center">
			<h2>'.$meta['title'].'</h2>
			 <p>'.$meta['email'].'</p>
			 <p>'.$meta['tel'].'</p>
			 <p>'.$meta['cell'].'</p>
			 <p>'.$meta['url'].'</p>
			 <p>'.$meta['address'].'</p>
		</di>'; 

		echo '</div></div>';
	}
}
?>