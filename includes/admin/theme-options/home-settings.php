<div id="bloodhound-home" class="block theme-tab-content">
	
<?php //get Home settings array
$home = get_option( 'vg_home' );
$onepage = get_option( 'vg_one_page_nav' );

$home_fields = array(
	array(
		'type' => 'checkbox',
		'label' => 'One Page Home',
		'tooltip' => 'Enabling this option will turn your home page into a "one page website" allowing you to display pages and posts as sections of one single page. You can select wchich pages or posts to display in the home page by simply checking the "Add To One Page Nav" option from the Pgae/Post edit screen. The "Add To One Page Nav" option will automatically add the post to your main nav as well.',
		'name' => 'vg_enable_one_page',
		'value_att' => '1',
		'value' => get_option( 'vg_enable_one_page' ),
		'id' => 'vg_home-one-page',
		'container' => true,
		'container_title' => 'Home Settings',
		'class' => 'span4 float-left'
	),
	array(
		'type' => 'checkbox',
		'label' => 'Ignore Sticky Posts',
		'tooltip' => 'When selected Sticky posts will be excluded from your "One Page Nav".',
		'name' => 'vg_one_page_nav[ignore-sticky]',
		'value_att' => '1',
		'value' => $onepage['ignore-sticky'],
		'id' => 'vg_one_page_nav-ignore-sticky',
		'class' => 'span4 float-left'
	),
);

premise_field( $home_fields );

echo '<div class="clear" style="border-top:1px solid #ccc;margin:40px 0;"></div>';

//get splash options
$splash = get_option( 'vg_splash' );

$splash_fields = array(
	array(
		'type' => 'checkbox',
		'label' => 'Force Home Splash to cover screen',
		'tooltip' => 'If checked the Home Splash will cover the device\'s screen.',
		'name' => 'vg_splash[cover-screen]',
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
		'name' => 'vg_splash[logo]',
		'id' => 'home-splash-logo',
		'value' => $splash['logo'],
	),
	array(
		'type' => 'textarea',
		'label' => 'Home Splash Tag Line',
		'tooltip' => 'Type a tag line here. This field accepts HTML for ease of styling.',
		'name' => 'vg_splash[tag-line]',
		'id' => 'vg_splash-tag-line',
		'value' => $splash['tag-line'],
	),
	array(
		'type' => 'text',
		'label' => 'Call to Action text',
		'tooltip' => 'This call to action appears at the bottom of your Home Splash screen',
		'name' => 'vg_splash[cta]',
		'id' => 'vg_splash-cta',
		'value' => $splash['cta'],
		'class' => 'span6 float-left'
	),
	array(
		'type' => 'wp_dropdown_pages',
		'label' => 'Link Page to Call to Action',
		'tooltip' => 'Select the page you would like the call  to action to point to.',
		'name' => 'vg_splash[cta-link]',
		'id' => 'vg_splash-cta-link',
		'value' => $splash['cta-link'],
		'show_option_none'=>'Please Select a Page',
		'class' => 'span6 float-right'
	),
);
premise_field( $splash_fields );

premise_save_background( 'vg_splash' );

submit_button();
?>
</div>