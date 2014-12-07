<div id="bloodhound-header" class="block theme-tab-content" style="display:none;">
	
	<?php //get header options
	$header = get_option( 'vg_header' );
	//setup fields
	$header_fields = array(
		array(
			'type' => 'checkbox',
			'name' => 'vg_header[sticky]',
			'id' => 'vg_header-sticky',
			'label' => 'Make header sticky',
			'tooltip' => 'If enabled, the header will always stick to the top.',
			'value_att' => '1',
			'value' => $header['sticky'],
			'container' => true,
			'container_title' => 'Header Settings',
		),
		array(
			'type' => 'file',
			'name' => 'vg_logo',
			'id' => 'vg_logo',
			'label' => 'Upload a Logo',
			'value' => get_option( 'vg_logo' ),
		),
	);
	$mobile_nav_fields = array(
		array(
			'type' => 'minicolors',
			'name' => 'vg_header[nav-toggle-bg]',
			'id' => 'vg_header-nav-toggle-bg',
			'label' => 'Select a background',
			'value' => $header['nav-toggle-bg'],
			'container' => true,
			'container_title' => 'Mobile Nav Button',
			'container_desc' => 'Style the mobile nav toggle button.',
		),
		array(
			'type' => 'fa-icon',
			'name' => 'vg_header[nav-toggle-icon]',
			'id' => 'vg_header-nav-toggle-icon',
			'label' => 'Select a Nav Icon',
			'value' => $header['nav-toggle-icon'],
		),
		array(
			'type' => 'minicolors',
			'name' => 'vg_header[nav-toggle-color]',
			'id' => 'vg_header-nav-toggle-color',
			'label' => 'Nav Icon Color',
			'value' => $header['nav-toggle-color'],
		),
	);
	//build fields
	premise_field( $header_fields );

	premise_save_background( 'vg_header' );

	premise_field( $mobile_nav_fields );

	submit_button(); ?>

</div>