<div id="home" class="block">
	
	<?php //get Home settings array
	$home = get_option( 'vg_home' ); ?>
	
	<h3>Home Settings</h3>

	<div class="field-section">
		<div class="field">
			<p class="label">One Page Home</p>	
			<span class="tooltip">
				<i>Enabling this option will allow you to display pages and posts on top of each other in one single home page. You can select wchich pages and posts to display in the home page by simply selcting "display in one page home" checkbox in the page/post edit screen. When users click on a menu item, if the page or post is displayed in the home page the site will scroll to that section; otherwise, it will behave like a normal site and take the user to the selected page or post.</i>
			</span>
			<div class="checkbox">
				<input type="checkbox" name="vg_enable_one_page" id="vg_home-one-page" value="1" <?php checked( get_option( 'vg_enable_one_page' ), '1' ); ?>>
				<label for="vg_home-one-page"></label>
			</div>
		</div>
	</div>

	<h3>One Page Nav Settings</h3>
	
	<?php //get one page array
	$onepage = get_option( 'vg_one_page_nav' ); ?>

	<div class="field-section">
		<p class="label">Ignore Sticky Posts</p>
		<div class="field">
			<input type="checkbox" value="1" name="vg_one_page_nav[ignore-sticky]" id="vg_one_page_nav-ignore-sticky" <?php checked( $onepage['ignore-sticky'], '1' ); ?>>
			<label for="vg_one_page_nav-ignore-sticky"></label>
		</div>
	</div>

</div>