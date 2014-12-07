<?php
/**
 * Create the one page navigation
 * @package Bloodhound
 * @subpackage One Page Nav
 */

/**
 * Calls the class on the post edit screen.
 */
function bloodhound_call_one_page_nav_class() {
    new BloodhoundOnePageNavClass;
}
add_action( 'wp_loaded', 'bloodhound_call_one_page_nav_class' );

/**
* One Page Nav Class
*/
class BloodhoundOnePageNavClass extends Walker_Nav_Menu {
	public $nav;
	protected $menu;
	protected $menu_id;
	protected $menu_args = array(
		'menu-item-title'     => '',
		'menu-item-url'       => '',
		'menu-item-object-id' => '',
		'menu-item-object'    => '',
		'menu-item-type'      => 'post_type',
		'menu-item-status'    => 'publish', );
	protected $message = array(
		'success-add-post'    => array(
			'message'         => 'This Page/Post is now in your home page and main navigation. <br><b>NOTE:</b> This <b>does not save other changes</b> you have made. Rememeber to save your changes by updating the post or page.',
			'type'            => 'success', ),
		'failure-add-post'    => array(
			'message'         => 'Seems like this Page/Post is already in your navigation. Make sure to update to add to your home page as well.',
			'type'            => 'warning', ),
		'success-delete-post' => array(
			'message'         => 'This Page/Post is no longer in your home page or main navigation.',
			'type'            => 'success', ),
		'failure-delete-post' => array(
			'message'         => 'Seems like this Page/Post was already removed from your navigation, make sure you update to remove it from your home page as well.',
			'type'            => 'warning', ),
		'no-menu'             => array(
			'message'         => 'Error: This will only add this Page/Post to your home page. To add it to your Navigation as well you must create a Wordpress menu (with at least one item) and set the theme location to <em>Bloodhound Menu</em>.',
			'type'            => 'warning', ), );

	function __construct( $nav = '' ) {
		$this->nav = 'splash' == $nav ? 'splash' : '';
		$this->get_menu();
		$this->set_new_menu_params();
		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'save_post', array( $this, 'save_metabox' ) );
		add_action( 'wp_ajax_bloodhound_update_this_post', array( $this, 'add_to_one_page_nav' ) );
	}

	/**
	 * Get the main menu from theme
	 * @return array array of menu item objects
	 */
	protected function get_menu() {
		$locations = get_nav_menu_locations();
		$this->menu_id = $locations['primary'];
		$this->menu = wp_get_nav_menu_items( $this->menu_id );
	}

	/**
	 * Set Menu Item Args
	 */
	protected function set_new_menu_params() {
		$this->menu_args['menu-item-title']     = !empty( $_POST['bloodhound_post_title'] ) ? $_POST['bloodhound_post_title'] : '';
		$this->menu_args['menu-item-url']       = !empty( $_POST['bloodhound_post_url'] ) ? $_POST['bloodhound_post_url'] : '';
		$this->menu_args['menu-item-object-id'] = !empty( $_POST['bloodhound_post_object_id'] ) ? $_POST['bloodhound_post_object_id'] : '';
		$this->menu_args['menu-item-object']    = !empty( $_POST['bloodhound_post_object'] ) ? $_POST['bloodhound_post_object'] : '';
	}

	/**
	 * Add Metabox
	 */
	public function add_metabox() {
		$post_types = get_post_types( array( 'public' => true ), 'names' );
		foreach ($post_types as $post_type) {
			add_meta_box( 'vg-one-page-nav', 'One Page Nav', array( $this, 'render_metabox' ), $post_type, 'side', 'high' );
		}
	}

	/**
	 * Save Meta Box
	 * @param  int $post_id The Post ID
	 */
	public function save_metabox( $post_id ) {
		if ( !isset( $_POST['bloodhound_one_page_nav_nonce'] ) ) return;
		if ( !wp_verify_nonce( $_POST['bloodhound_one_page_nav_nonce'], 'bloodhound_one_page_nav' ) ) return;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( isset( $_POST['post_type'] ) && get_post_type() == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) ) return;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) ) return;
		}	
		update_post_meta( $post_id, 'bloodhound_add_post_to_one_page', $_POST['bloodhound_add_post_to_one_page'] );
		update_post_meta( $post_id, 'bloodhound_add_post', $_POST['bloodhound_add_post'] );
	}

	/**
	 * Render Metabox
	 * @param  object $post The post to be included in our one page navigation
	 * @return string       HTML for one page nav metabox
	 */
	public function render_metabox( $post ) {
		wp_nonce_field( 'bloodhound_one_page_nav', 'bloodhound_one_page_nav_nonce' );
		$nav = get_post_meta( $post->ID, 'bloodhound_add_post', true ) ? get_post_meta( $post->ID, 'bloodhound_add_post', true ) : array();
		$nav_title = $nav['title-color'] ? $nav['title-color'] : '#333333';
		$page_color = $nav['page-color'] ? $nav['page-color'] : '#FFFFFF';
		$check = get_post_meta( $post->ID, 'bloodhound_add_post_to_one_page', true );
		
		echo '<span class="ajax-response"></span>';
		$form_builder = array( 
			array( 
				'type' => 'checkbox',
				'label' => 'Add to one page nav',
				'tooltip' => 'When this box gets checked, this post or page automatically gets added to our home screen and main nav. You must have the One Page Nav option enabled iin the theme for this to work though.',
				'name' => 'bloodhound_add_post_to_one_page',
				'id' => 'bloodhound_add_post-checkbox',
				'value_att' => '1',
				'value' => $check,
				'attribute' => 'onchange="jQuery(function($){bloodhoundAddToOPN(this);})"',
			 ),
			array( 
				'type' => 'minicolors',
				'label' => 'Choose page color',
				'name' => 'bloodhound_add_post[page-color]',
				'id' => 'bloodhound_add_post-page-color',
				'value' => $page_color,
			 ),
			array( 
				'type' => 'select',
				'name' => 'bloodhound_add_post[style]',
				'label' => 'Select style',
				'id' => 'bloodhound_add_post-style',
				'placeholder' => 'Select a style',
				'value' => $nav['style'],
				'options' => array(
					'Solid' => 'solid',
					'Top Bar' => 'top',
				),
			 ),
			array( 
				'type' => 'fa-icon',
				'name' => 'bloodhound_add_post[nav-icon]',
				'label' => 'Select a nav icon',
				'tooltip' => 'Only applys to Home Splash Nav',
				'id' => 'bloodhound_add_post-nav-icon',
				'value' => $nav['nav-icon'],
			 ),
			array( 
				'type' => 'minicolors',
				'label' => 'Select title color',
				'name' => 'bloodhound_add_post[title-color]',
				'id' => 'bloodhound_add_post-title-color',
				'value' => $nav_title,
			 ),
			array(
				'type' => 'hidden',
				'name' => 'bloodhound_post_title',
				'id' => 'bloodhound_post_title',
				'value' => get_the_title(),
				'template' => 'raw',
			),
			array(
				'type' => 'hidden',
				'name' => 'bloodhound_post_url',
				'id' => 'bloodhound_post_url',
				'value' => get_permalink(),
				'template' => 'raw',
			),
			array(
				'type' => 'hidden',
				'name' => 'bloodhound_post_object_id',
				'id' => 'bloodhound_post_object_id',
				'value' => $post->ID,
				'template' => 'raw',
			),
			array(
				'type' => 'hidden',
				'name' => 'bloodhound_post_object',
				'id' => 'bloodhound_post_object',
				'value' => $post->post_type,
				'template' => 'raw',
			),
		); 

		premise_field( $form_builder );
	}

	/**
	 * Add Post to One Page Nav AJAX Function
	 * @return mixed confirmation message $this->message, false if function fails
	 */
	public function add_to_one_page_nav() {
		// Check if menu even exists
		if( empty( $this->menu_id ) ) {
			echo json_encode( $this->message['no-menu'] );
			die();
		}
		// if adding post o OPN
		if ( $_POST['bloodhound_add_post_to_one_page'] == '1' ) {
			if( !$this->bloodhound_nav_item_exists() )
				$r = wp_update_nav_menu_item( $this->menu_id, 0, $this->menu_args );
			echo $r ? json_encode( $this->message['success-add-post'] ) : json_encode( $this->message['failure-add-post'] );
			die();
		}
		// If deleting post from OPN
		$item_id = "";
		foreach( $this->menu as $item ){
			if( $item->object_id == $this->menu_args['menu-item-object-id'] )
				$item_id = $item->ID;
		}
		$menuObject = wp_get_nav_menu_object( $this->menu_id );
		$menu_objects = get_objects_in_term( $menuObject->term_id, 'nav_menu' );
        if ( !empty( $item_id ) && !empty( $menu_objects ) ) {
            foreach ( $menu_objects as $item ) {
                if( $item == $item_id ){
                	$r = wp_delete_post( $item );
                	echo $r ? json_encode( $this->message['success-delete-post'] ) : json_encode( $this->message['failure-delete-post'] );
                	die();
                }
	        }
    	}
    	die();
	}

	/**
	 * Check nav item exists
	 * @param int $nav_id nav item id to check for. if none $this->menu_args['menu-item-object-id'] will be used
	 * @return mixed if nav item exists returns int ID. false if nav item does not exist
	 */
	public function bloodhound_nav_item_exists( $nav_id = '' ) {
		$nav_id = empty( $nav_id ) ? $this->menu_args['menu-item-object-id'] : $nav_id;
		foreach( $this->menu as $item ){
			if( $item->object_id == $nav_id )
				return $item->ID;
		}
		return false;
	}

	/**
	 * Customization to Wordpress Menu Walker
	 *
	 * DO NOT EDIT THIS FUNCTION
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[] = 'menu-item-' . $item->ID;

	    /**
	     * Filter the CSS class(es) applied to a menu item's <li>.
	     *
	     * @since 3.0.0
	     *
	     * @see wp_nav_menu()
	     *
	     * @param array  $classes The CSS classes that are applied to the menu item's <li>.
	     * @param object $item    The current menu item.
	     * @param array  $args    An array of wp_nav_menu() arguments.
	     */
	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	    
	    /**
	     * Filter the ID applied to a menu item's <li>.
	     *
	     * @since 3.0.1
	     *
	     * @see wp_nav_menu()
	     *
	     * @param string $menu_id The ID that is applied to the menu item's <li>.
	     * @param object $item    The current menu item.
	     * @param array  $args    An array of wp_nav_menu() arguments.
	     */
	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

	    $output .= $indent . '<li' . $id . $class_names .'>';

	    $onepage = get_post_meta( $item->object_id, 'bloodhound_add_post', true );
	    $header = get_option( 'bloodhound_header' );

	    $post = get_post( $item->object_id );
		$in_one_page = get_post_meta( $item->object_id, 'bloodhound_add_post_to_one_page', true );	    

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ( ! empty( $item->url ) && !$in_one_page )       ? $item->url       : '/#'.$post->post_name;

	    if( $in_one_page ){
	    	$atts['onclick'] = ! empty( $item->object_id )  ? 'bloodhound_ScrollToEl(this);' : '';
	    }
	    
	    if( $this->nav == '' ){
	    	$atts['style']  = ! empty( $item->object_id )  ? 'background:'.$onepage['page-color'].';color:'.$onepage['title-color'].';' : '';
	    }
	    else{
	    	$atts['style']  = ! empty( $item->object_id )  ? 'color:'.$onepage['title-color'].';' : '';
	    }

	    /**
	     * Filter the HTML attributes applied to a menu item's <a>.
	     *
	     * @since 3.6.0
	     *
	     * @see wp_nav_menu()
	     *
	     * @param array $atts {
	     *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
	     *
	     *     @type string $title  Title attribute.
	     *     @type string $target Target attribute.
	     *     @type string $rel    The rel attribute.
	     *     @type string $href   The href attribute.
	     * }
	     * @param object $item The current menu item.
	     * @param array  $args An array of wp_nav_menu() arguments.
	     */
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	            if ( ! empty( $value ) ) {
	                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	                    $attributes .= ' ' . $attr . '="' . $value . '"';
	            }
	    }

	    $item_output = $args->before;


	    $item_output .= '<a'. $attributes .'>';
	    if( $this->nav == 'splash' ){
	    	$bloodhound_nav_icon = '<span class="splash-nav-icon" style="background:'.$onepage['page-color'].';color:'.$onepage['title-color'].';">
	    		<i class="fa fa-fw '.$onepage['nav-icon'].'"></i>
	    		</span>';
	    	//insert nav icon
	    	$item_output .= $bloodhound_nav_icon;
	    }
	    /** This filter is documented in wp-includes/post-template.php */
	    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	    $item_output .= '</a>';
	    $item_output .= $args->after;

	    /**
	     * Filter a menu item's starting output.
	     *
	     * The menu item's starting output only includes $args->before, the opening <a>,
	     * the menu item's title, the closing </a>, and $args->after. Currently, there is
	     * no filter for modifying the opening and closing <li> for a menu item.
	     *
	     * @since 3.0.0
	     *
	     * @see wp_nav_menu()
	     *
	     * @param string $item_output The menu item's starting HTML output.
	     * @param object $item        Menu item data object.
	     * @param int    $depth       Depth of menu item. Used for padding.
	     * @param array  $args        An array of wp_nav_menu() arguments.
	     */	    
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>