<?php
/**
 * Create the one page navigation
 * @package One Page Nav
 */

/**
 * Create option to add page/post to Navigation
 */
if ( !function_exists( 'vg_add_post_to_nav' ) ) {
	function vg_add_post_to_nav( $post ) {
		wp_nonce_field( 'vg_add_post_to_nav_metabox', 'vg_add_post_to_nav_metabox_nonce' );
		$nav = get_post_meta( $post->ID, 'vg_add_post', true );
		?>
			<table class="form-table">
				<tr>
					<td>
						<label for="vg_add_post-checkbox">Add this page/post to your one page nav.</label>
					</td>
					<td><?php $check = get_post_meta( $post->ID, 'vg_add_post_to_one_page', true ); ?>
						<input type="checkbox" value="1" id="vg_add_post-checkbox" name="vg_add_post_to_one_page" <?php checked( $check, 1 ); ?>>						
					</td>
				</tr>
				<tr>
					<td colspan="2"><span class="ajax-response"></span></td>
				</tr>
				<tr>
					<td colspan="2"><span id="vg_add_post_options">
						<div class="field">
							<label for="vg_add_post-color">Choose Page Color</label>
							<div class="color">
							<input type="text" name="vg_add_post[page-color]" id="vg_add_post-color" class="premise-color-field" value="<?php echo $nav['page-color']; ?>">
							</div>
						</div>

						<div class="field">
							<label for="vg_add_post-style">Select Style</label>
							<div class="select">
								<select name="vg_add_post[style]" id="vg_add_post-style">
									<option value="" <?php selected( $nav['style'], '') ?>>None</option>
									<option value="solid" <?php selected( $nav['style'], 'solid') ?>>Solid Background</option>
									<option value="top" <?php selected( $nav['style'], 'top') ?>>Top Bar</option>
								</select>
							</div>
						</div>

						<div class="field">
							<label for="vg_add_post-nav-icon">Select a Nav Icon</label>
							<i>Only applies to Home Splash Nav</i>
							<div class="fa-icon">
								<input type="text" name="vg_add_post[nav-icon]" id="vg_add_post_nav-icon" class="premise-insert-icon" value="<?php echo $nav['nav-icon']; ?>">
								<a href="javascript:;" class="premise-choose-icon"><i class="fa fa-fw fa-th"></i></a>
								<a href="javascript:;" class="premise-remove-icon"><i class="fa fa-fw fa-times"></i></a>
							</div>
						</div>

						<div class="field">
							<label for="vg_add_post-title-color">Select Title Color</label>
							<div class="color">
							<input type="text" name="vg_add_post[title-color]" id="vg_add_post-title-color" class="premise-color-field" value="<?php echo $nav['title-color']; ?>">
							</div>
						</div>
					</span></td>
				</tr>
			</table>
			<script>
			jQuery(function($){
				
				$(document).on('change', '#vg_add_post-checkbox', updatePostAjax)

				function updatePostAjax(obj) {
					if( $('#vg_add_post-color').val() == '' ){
						$('#vg_add_post-checkbox').prop('checked', false)
						alert( 'Please select a color first.' )
						$('#vg_add_post-color').focus()
						return false;
					}
					var c = $('#'+obj.id),
						data;
					if( c.is(':checked') ){
						data = {
							'action': 'vg_update_this_post',
							'vg_add_post_to_one_page': '1',
							'vg_post_title': <?php echo "'".get_the_title()."'"; ?>,
							'vg_post_url': <?php echo "'".get_permalink()."'"; ?>,
							'vg_post_object_id': <?php echo "'".$post->ID."'"; ?>,
							'vg_post_object': <?php echo "'".$post->post_type."'"; ?>
						};
					}
					else{
						data = {
							'action': 'vg_update_this_post',
							'vg_add_post_to_one_page': '0',
							'vg_post_object_id': <?php echo "'".$post->ID."'"; ?>,
							'vg_post_object': <?php echo "'".$post->post_type."'"; ?>
						}
					}
					$('span.ajax-response').html( '<i class="fa fa-fw fa-spin fa-futbol"></i>' )
					$.post(ajaxurl, data, function( response ) {
						response = JSON.parse(response)
						if( response.status !== null ) {
							if( 'SUCCESS' == response.status && 'create' == response.action ){
								$('span.ajax-response').html( 'Page added to menu.' )
							}
							else if( 'SUCCESS' == response.status && 'delete' == response.action ){
								$('span.ajax-response').html( 'Page removed from menu.' )
							}
							else if( 'SUCCESS' == response.status && 'exists' == response.action ){
								$('span.ajax-response').html( 'Page already exists in menu.' )
							}
							else if( 'FAILURE' == response.status && 'exists' == response.action ){
								$('span.ajax-response').html( 'Page has already been removed from menu.' )
							}
							else{
								$('span.ajax-response').html( '<i class="fa fa-fw fa-frown-o"></i> Please try again.' )
							}
						}
						else{
							$('span.ajax-response').html( '<i class="fa fa-fw fa-frown-o"></i> Please try again.' )
						}			
						console.log(response.status)
					})
				}
			})
			</script>
		<?php
	}
}
/*
wp_update_post( array( 'post_type' => 'wp_nav_item' ) ); 
For every page or post that is marked to appear in nav. 
Edit nav item and page backgournd and other features right from the page.
 */
/**
 * Add Meta Box
 */
if ( !function_exists( 'vg_one_page_nav_add_metabox' ) ) {
	function vg_one_page_nav_add_metabox() {
		$post_types = get_post_types( '', 'names' );
		foreach ($post_types as $post_type) {
			add_meta_box( 'vg-one-page-nav', 'One Page Nav', 'vg_add_post_to_nav', $post_type, 'side', 'high' );
		}
	}
}
add_action( 'add_meta_boxes', 'vg_one_page_nav_add_metabox' );

function vg_one_page_nav_save_metabox( $post_id ) {
	if ( !isset( $_POST['vg_add_post_to_nav_metabox_nonce'] ) ) return;
	if ( !wp_verify_nonce( $_POST['vg_add_post_to_nav_metabox_nonce'], 'vg_add_post_to_nav_metabox' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( isset( $_POST['post_type'] ) && get_post_type() == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) return;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) ) return;
	}	
	update_post_meta( $post_id, 'vg_add_post_to_one_page', $_POST['vg_add_post_to_one_page'] );
	update_post_meta( $post_id, 'vg_add_post', $_POST['vg_add_post'] );

}
add_action( 'save_post', 'vg_one_page_nav_save_metabox' );


/**
 * Validate CRM credentials
 * @return echo message
*/
if ( !function_exists( 'vg_add_post_to_main_nav' ) ) {
	function vg_add_post_to_main_nav($post) {
		$locations = get_nav_menu_locations();		
		$menu_id = $locations['primary'];

		$menu = wp_get_nav_menu_items( $menu_id );

		if ( $_POST['vg_add_post_to_one_page'] == '1' ) {
			if( vg_nav_item_exists( $menu_id ) ) {
				$response = array(
	        		'status' => 'SUCCESS',
	        		'action' => 'exists',
	        	);
	        	echo json_encode($response);
	        	die();
			}
			$args = array(
				'menu-item-title' => $_POST['vg_post_title'],
				'menu-item-url' => $_POST['vg_post_url'],
				'menu-item-object-id' => $_POST['vg_post_object_id'],
				'menu-item-object' => $_POST['vg_post_object'],
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish',
			);
			if( wp_update_nav_menu_item( $menu_id, 0, $args ) ) {
				$response = array(
	        		'status' => 'SUCCESS',
	        		'action' => 'create',
	        	);	
			}
			else{
				$response = array(
	        		'status' => 'FAILURE',
	        		'action' => 'warning',
	        	);
			}
			echo json_encode($response);
			die();
		}
		else{

			if( !vg_nav_item_exists( $menu_id ) ) {
				$response = array(
	        		'status' => 'FAILURE',
	        		'action' => 'exists',
	        	);
	        	echo json_encode($response);
	        	die();
			}
			
			$item_id = "";
			foreach( $menu as $item ){
				if( $item->object_id == $_POST['vg_post_object_id'] )
					$item_id = $item->ID;
			}

			$menuObject = wp_get_nav_menu_object( $menu_id );
			$menu_objects = get_objects_in_term( $menuObject->term_id, 'nav_menu' );
	        if ( !empty( $item_id ) && !empty( $menu_objects ) ) {
                foreach ( $menu_objects as $item ) {
                    if( $item == $item_id ){
                    	wp_delete_post( $item );
                    	$response = array(
                    		'status' => 'SUCCESS',
                    		'action' => 'delete',
                    	);
                    }
                }
	        }
	        else{
            	$response = array(
            		'status' => 'FAILURE',
            		'action' => 'warning',
            	);
            }
			echo json_encode($response);
			die();
		}
		return false;
	}
}
add_action( 'wp_ajax_vg_update_this_post', 'vg_add_post_to_main_nav' );

function vg_nav_item_exists( $menu_id ) {
	$menu = wp_get_nav_menu_items( $menu_id );

	foreach( $menu as $item ){
		if( $item->object_id == $_POST['vg_post_object_id'] )
			return $item->ID;
	}
	return false;
}

function vg_grab_menu_items_ids() {
	$locations = get_nav_menu_locations();		
	$menu_id = $locations['primary'];

	$menu = wp_get_nav_menu_items( $menu_id );

	$menu_ids = array();

	foreach ($menu as $menu_item) {
		array_push( $menu_ids, $menu_item->object_id );
	}

	if( $menu_ids )
		return $menu_ids;

	return false;
}

/**
* 
*/
class vgOnePageNav extends Walker_Nav_Menu {
	public $nav;		

	function __construct( $nav ){
		if( 'splash' == $nav )
			$this->nav = 'splash';		
	}

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

	    $onepage = get_post_meta( $item->object_id, 'vg_add_post', true );
	    $header = get_option( 'vg_header' );

	    $post = get_post( $item->object_id );
		$in_one_page = get_post_meta( $item->object_id, 'vg_add_post_to_one_page', true );	    

	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ( ! empty( $item->url ) && !$in_one_page )       ? $item->url       : '#'.$post->post_name;
	    // if( $in_one_page )
	    // 	$atts['onclick'] = 'vgScrollToEl(this);return false';

	    echo $nav;
	    if( $this->nav === null ){
	    	$atts['style']  = ! empty( $item->object_id )  ? 'background:'.$onepage['page-color'].';color:'.$header['nav-color'].';' : '';
	    }
	    else{
	    	$atts['style']  = ! empty( $item->object_id )  ? 'color:'.$header['nav-color'].';' : '';
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
	    	$vg_nav_icon = '<span class="splash-nav-icon" style="background:'.$onepage['page-color'].';color:'.$header['nav-color'].';">
	    		<i class="fa fa-fw '.$onepage['nav-icon'].'"></i>
	    		</span>';
	    	//insert nav icon
	    	$item_output .= $vg_nav_icon;
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

function vg_splash_cta_url() {
	$splash = get_option( 'vg_splash' );
	$p = get_post( $splash['cta-link'] );
	$post_in_onepage = get_post_meta( $p->ID, 'vg_add_post_to_one_page', true );
	
	if( $post_in_onepage ) {		
		$output = '#'.$p->post_name.'" onclick="vgScrollToEl(this)';//Leave last double quote out.
	}
	else{
		$output = '/'.$p->post_name;
	}
	echo $output;
}

function vg_the_title( $post ) {
	$page = get_post_meta( $post->ID, 'vg_add_post', true );
	if( !$page['title-color'] )
		$page['title-color'] = '#333333';
	echo '<div class="post-title">
			<span class="title-bar" style="background:'.$page['title-color'].'"></span>
				<h2 style="color:'.$page['title-color'].'">'.get_the_title().'</h2></div>';
}
?>