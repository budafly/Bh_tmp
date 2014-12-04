<div id="home-splash" class="block">
	<h3>Home Splash</h3>
	<i>The home splash is similar to a landing page. It is the first content users will see when the site loads and it covers the whole screen.</i>

	<?php //get splash options
	$splash = get_option( 'vg_splash' );

	$splash_fields = array(
		array(
			'type' => 'checkbox',
			'label' => 'Force Home Splash to cover',
			'name' => 'vg_splash[cover-screen]',
			'id' => 'home-splash-cover',
			'value_att' => '1',
			'value' => $splash['cover-screen'],
			'container' => true,
			'container_title' => 'Home Splash',
			'container_desc' => 'The home splash is similar to a landing page. It is the first content users will see when the site loads and it covers the whole screen.',
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
			'label' => 'Call to Action',
			'tooltip' => 'This call to action appears at the bottom of your home splash screen',
			'name' => 'vg_splash[cta]',
			'id' => 'vg_splash-cta',
			'value' => $splash['cta'],
		),
		array(
			'type' => 'wp_dropdown_pages',
			'label' => 'Link Call to Action',
			'tooltip' => 'This call to action appears at the bottom of your home splash screen',
			'name' => 'vg_splash[cta-link]',
			'id' => 'vg_splash-cta-link',
			'value' => $splash['cta-link'],
			'show_option_none'=>'Please Select a Page',
		),
	);
	premise_field( $splash_fields );
	
	premise_insert_background( 'vg_splash' );

	submit_button();?>

</div>