<div id="bloodhound-home" class="block theme-tab-content">
	
<?php //get Home settings array
$home = get_option( 'vg_home' );
$onepage = get_option( 'vg_one_page_nav' );

$home_fields = array(
	array(
		'type' => 'checkbox',
		'label' => 'One Page Home',
		'tooltip' => 'Enabling this option will allow you to display pages and posts on top of each other in one single home page. You can select wchich pages and posts to display in the home page by simply selcting "display in one page home" checkbox in the page/post edit screen. When users click on a menu item, if the page or post is displayed in the home page the site will scroll to that section; otherwise, it will behave like a normal site and take the user to the selected page or post.',
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
		'tooltip' => 'When selected Sticky posts will be excluded from your one page nav. Only applies if your blog has any Sticky posts.',
		'name' => 'vg_one_page_nav[ignore-sticky]',
		'value_att' => '1',
		'value' => $onepage['ignore-sticky'],
		'id' => 'vg_one_page_nav-ignore-sticky',
		'class' => 'span4 float-left'
	),
);

premise_field( $home_fields );

echo '<div class="clear hr_ccc"></div>';

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
	),
	array(
		'type' => 'wp_dropdown_pages',
		'label' => 'Link Page to Call to Action',
		'tooltip' => 'Select the page you would like the call  to action to point to.',
		'name' => 'vg_splash[cta-link]',
		'id' => 'vg_splash-cta-link',
		'value' => $splash['cta-link'],
		'show_option_none'=>'Please Select a Page',
	),
);
premise_field( $splash_fields );

premise_insert_background( 'vg_splash' );

premise_field( array(
		'type' => 'select',
		'label' => 'Test',
		'name' => 'test',
		'options' => array(
			'Key ' => 'Value',
			'Keys ' => 'Value',
			'Keyf ' => 'Value',
			'Keyg ' => 'Value',
			),
	));

submit_button();
?>
</div>