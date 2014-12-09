<?php
/**
 * Theme Options
 *
 * Loads our theme opiotns page
 *
 * @package Bloodhound
 * @subpackage Theme Options
 */


/**
* Theme Options Class
*/
class Bloodhound_Theme_Options_Class {
	
	
	/**
	 * Settings to register
	 * 
	 * @var array
	 */
	public $settings = array(
		'bloodhound_logo',
		'bloodhound_header',
		'bloodhound_home',
		'bloodhound_one_page_nav',
		'bloodhound_splash',
		'bloodhound_footer',
		'bloodhound_enable_one_page',
		'bloodhound_team_members',
	);


	
	/**
	 * Options Group for settings
	 * 
	 * @var string
	 */
	public $options_group = 'bloodhound_theme_options';



	/**
	 * Options
	 *
	 * @var array
	 */
	public $options = array();



	public $theme_page = array(
		'page_title' => 'Bloodhound Theme Options',
		'caps'       => 'edit_theme_options',
		'slug'       => 'bloodhound_theme_options',
	);



	/**
	 * Instance of this class
	 * 	
	 * @var object
	 */
	public static $instance = NULL;



	/**
	 * Constructor is left empty on purpose
	 */
	function __construct() {}



	/**
	 * Instantiate this class
	 * @return object instance of this class
	 */
	public static function get_instance() {
		NULL === self::$instance and self::$instance = new self;
		
		return self::$instance;
	}



	/**
	 * Initiate theme options page
	 */
	public function theme_page_init() {
		
		add_theme_page( 
			$this->theme_page['page_title'], 
			$this->theme_page['page_title'], 
			$this->theme_page['caps'], 
			$this->theme_page['slug'], 
			array( $this, 'theme_options' ) 
		);

		add_action( 'admin_init', array( $this, 'register_settings' ) );

		$this->get_options();

	}



	public function theme_options() {
		
		wp_enqueue_media();

		echo '	<div id="bloodhound-theme-options-page" class="vg">
					<h1 class="center">Bloodhound Settings</h1>
					<!-- Start Form -->
					<form method="post" action="options.php" enctype="multipart/form-data">';

					settings_fields( $this->options_group );
					do_settings_sections( $this->options_group );

					submit_button( 'Save Changes', 'primary bh-btn float-right', '', false );

		echo '		<div class="clear"></div>
						<div class="block">
							<div class="span3 theme-options-nav float-left same-height inline-block border-box">
								<div class="block theme-logo">
									<img src="" class="block responsive">
								</div>
								<div class="block theme-tabs">
									<span class="theme-tab active"><a href="#bloodhound-home">Home</a></span>
									<span class="theme-tab"><a href="#bloodhound-header">Header</a></span>
									<span class="theme-tab"><a href="#bloodhound-team">Team Members</a></span>
									<span class="theme-tab"><a href="#bloodhound-footer">Footer</a></span>
								</div>
							</div>
							<div class="span9 theme-options-content float-left same-height inline-block border-box relative">';

								$this->home_settings();
								$this->header_settings();
								$this->team_settings();
								$this->footer_settings();

		echo '				</div>
						</div>
						<div class="clear"></div>
					</form><!-- /Form -->		
				</div><!-- /Theme Options Page -->';
	}


	/**
	 * Home settings Tab
	 */
	public function home_settings() {
		echo '<div id="bloodhound-home" class="block theme-tab-content">';
			
		//get Home settings array
		$home    = $this->options['bloodhound_home'] 			? $this->options['bloodhound_home'] 		: array();
		$onepage = $this->options['bloodhound_one_page_nav'] 	? $this->options['bloodhound_one_page_nav'] : array();

		premise_field( array(
			array(
				'type' => 'checkbox',
				'label' => 'One Page Home',
				'tooltip' => 'Enabling this option will turn your home page into a "one page website" allowing you to display pages and posts as sections of one single page. You can select wchich pages or posts to display in the home page by simply checking the "Add To One Page Nav" option from the Pgae/Post edit screen. The "Add To One Page Nav" option will automatically add the post to your main nav as well.',
				'name' => 'bloodhound_enable_one_page',
				'value_att' => '1',
				'value' => $this->options['bloodhound_enable_one_page'],
				'id' => 'bloodhound_home-one-page',
				'container' => true,
				'container_title' => 'Home Settings',
				'class' => 'span4 float-left',
			),
			array(
				'type' => 'checkbox',
				'label' => 'Ignore Sticky Posts',
				'tooltip' => 'When selected Sticky posts will be excluded from your "One Page Nav".',
				'name' => 'bloodhound_one_page_nav[ignore-sticky]',
				'value_att' => '1',
				'value' => $onepage['ignore-sticky'],
				'id' => 'bloodhound_one_page_nav-ignore-sticky',
				'class' => 'span4 float-left',
			),
		) );

		echo '<div class="clear" style="border-top:1px solid #ccc;margin:40px 0;"></div>';

		//get splash options
		$splash = $this->options['bloodhound_splash'];

		premise_field( array(
			array(
				'type' => 'checkbox',
				'label' => 'Force Home Splash to cover screen',
				'tooltip' => 'If checked the Home Splash will cover the device\'s screen.',
				'name' => 'bloodhound_splash[cover-screen]',
				'id' => 'home-splash-cover',
				'value_att' => '1',
				'value' => $splash['cover-screen'],
				'container' => true,
				'container_title' => 'Home Splash',
				'container_desc' => 'The Home Splash is similar to a landing page. It is the first content users will see when the site loads and it covers the whole screen.',
			),
			array(
				'type' => 'file',
				'label' => 'Home Splash Logo',
				'tooltip' => 'If no logo is chosen here, your main logo will be used.',
				'name' => 'bloodhound_splash[logo]',
				'id' => 'home-splash-logo',
				'value' => $splash['logo'],
			),
			array(
				'type' => 'textarea',
				'label' => 'Home Splash Tag Line',
				'tooltip' => 'Type a tag line here. This field accepts HTML for ease of styling.',
				'name' => 'bloodhound_splash[tag-line]',
				'id' => 'bloodhound_splash-tag-line',
				'value' => $splash['tag-line'],
			),
			array(
				'type' => 'text',
				'label' => 'Call to Action text',
				'tooltip' => 'This call to action appears at the bottom of your Home Splash screen',
				'name' => 'bloodhound_splash[cta]',
				'id' => 'bloodhound_splash-cta',
				'value' => $splash['cta'],
				'class' => 'span6 float-left',
			),
			array(
				'type' => 'wp_dropdown_pages',
				'label' => 'Link Page to Call to Action',
				'tooltip' => 'Select the page you would like the call  to action to point to.',
				'name' => 'bloodhound_splash[cta-link]',
				'id' => 'bloodhound_splash-cta-link',
				'value' => $splash['cta-link'],
				'show_option_none'=>'Please Select a Page',
				'class' => 'span6 float-right',
			),
		) );

		echo '<div class="clear"></div>';

		premise_save_background( 'bloodhound_splash' );

		submit_button();

		echo '</div>';
	}



	/**
	 * header settings Tab
	 */
	public function header_settings() {
		echo '<div id="bloodhound-header" class="block theme-tab-content" style="display:none;">';
			
			$header = $this->options['bloodhound_header'] ? $this->options['bloodhound_header'] : array();
			
			premise_field( array(
				array(
					'type' => 'checkbox',
					'name' => 'bloodhound_header[sticky]',
					'id' => 'bloodhound_header-sticky',
					'label' => 'Make header sticky',
					'tooltip' => 'If enabled, the header will always stick to the top.',
					'value_att' => '1',
					'value' => $header['sticky'],
					'container' => true,
					'container_title' => 'Header Settings',
				),
				array(
					'type' => 'file',
					'name' => 'bloodhound_logo',
					'id' => 'bloodhound_logo',
					'label' => 'Upload a Logo',
					'value' => $this->options['bloodhound_logo'],
				),
			) );

			premise_save_background( 'bloodhound_header' );

			premise_field( array(
				array(
					'type' => 'minicolors',
					'name' => 'bloodhound_header[nav-toggle-bg]',
					'id' => 'bloodhound_header-nav-toggle-bg',
					'label' => 'Select a background',
					'value' => $header['nav-toggle-bg'],
					'container' => true,
					'container_title' => 'Mobile Nav Button',
					'container_desc' => 'Style the mobile nav toggle button.',
				),
				array(
					'type' => 'fa-icon',
					'name' => 'bloodhound_header[nav-toggle-icon]',
					'id' => 'bloodhound_header-nav-toggle-icon',
					'label' => 'Select a Nav Icon',
					'value' => $header['nav-toggle-icon'],
				),
				array(
					'type' => 'minicolors',
					'name' => 'bloodhound_header[nav-toggle-color]',
					'id' => 'bloodhound_header-nav-toggle-color',
					'label' => 'Nav Icon Color',
					'value' => $header['nav-toggle-color'],
				),
			) );

			submit_button();

		echo '</div>';
	}



	/**
	 * team settings Tab
	 */
	public function team_settings() {
		echo '<div id="bloodhound-team" class="block theme-tab-content" style="display:none;">';

		$team = $this->options['bloodhound_team_members'] ? $this->options['bloodhound_team_members'] : array();

		premise_field( array(
			array(
				'type' => 'text',
				'id' => 'accordion-height',
				'label' => 'Set Accordion Height',
				'tooltip' => 'The Team Page Template displays an accordion with 4 Team Members per page. Set the height of the accordion here by entering it here in pixels',
				'placeholder' => '450px - remember to enter "px"',
				'container' => true,
				'container_title' => 'Team Members Page Template Options',
				'value' => $team['accordion-height'],
				'name' => 'bloodhound_team_members[accordion-height]',
			),
			// array(),
			// array(),
			// array(),
		) );

		echo '</div>';
	}



	/**
	 * footer settings Tab
	 */
	public function footer_settings() {

	}



	/**
	 * Get Options
	 */
	public function get_options() {
		foreach( $this->settings as $setting )
			$this->options[$setting] = get_option( $setting );
	}



	/**
	 * Register Settings
	 */
	public function register_settings() {
		foreach( $this->settings as $setting )
			register_setting( $this->options_group, $setting );
	}
}
?>