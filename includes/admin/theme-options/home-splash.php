<div id="home-splash" class="block">
	<h3>Home Splash</h3>
	<i>The home splash is similar to a landing page. It is the first content users will see when the site loads and it covers the whole screen.</i>

	<?php //get splash options
	$splash = get_option( 'vg_splash' ); ?>

	<div class="field-section">
		<div class="field">
			<p class="label">Force Home Splash to cover</p>
			<div class="checkbox">
				<input type="checkbox" id="home-splash-cover" name="vg_splash[cover-screen]" <?php checked( $splash['cover-screen'], 1 ); ?> value="1">
				<label for="home-splash-cover"></label>
			</div>
		</div>
	</div>

	<div class="field-section">
		<div class="field">
			<label for="home-splash-logo">Home Splash Logo</label>
			<span class="tooltip">
				<i>If no logo is chosen here, your main logo will be used.</i>
			</span>
			<div class="file">
				<input type="text" name="vg_splash[logo]" value="<?php echo $splash['logo']; ?>" placeholder="Upload a Logo" class="file-url">
				<a class="btn-upload" href="javascript:void(0);"><i class="fa fa-fw fa-upload"></i></a>
				<a class="btn-remove" href="javascript:void(0);"><i class="fa fa-fw fa-times"></i></a>
			</div>
		</div>
	</div>

	<div class="field-section">		
		<div class="field">
			<label>Edit Home Splash Menu Items</label>
			<!-- Setup home splash menu -->
		</div>
	</div>

	<div class="field-section">
		<div class="field">
			<label for="vg_splash-tag-line">Home Splash Tag Line</label>
			<span class="tooltip">
				<i>Type a tag line here. This field accepts HTML for ease of styling.</i>
			</span>
			<div class="textarea">
				<textarea name="vg_splash[tag-line]" id="vg_splash-tag-line"><?php echo $splash['tag-line']; ?></textarea>
			</div>
		</div>
	</div>

	<div class="field-section">
		<div class="field">
			<label for="vg_splash-cta">Call to Action</label>
			<span class="tooltip">
				<i>This call to action appear at the bottom of your home splash screen</i>
			</span>
			<div class="text">
				<input type="text" name="vg_splash[cta]" id="vg_splash-cta" value="<?php echo $splash['cta']; ?>">
			</div>
		</div>

		<div class="field">
			<label for="vg_splash-cta-link">Link Call to Action</label>
			<span class="tooltip">
				<i>Link the call to action to any page or post.</i>
			</span>
			<div class="select">
				<?php $selected = $splash['cta-link']; ?>
				<?php wp_dropdown_pages( array( 'name'=>'vg_splash[cta-link]', 'show_option_none'=>'Please Select a Page', 'selected'=>$selected ) ); ?>
			</div>
		</div>
	</div>

	<?php premise_insert_background( 'vg_splash' ); ?>

</div>