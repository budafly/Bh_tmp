<!-- Header Settings -->
<div class="vg-tab" id="vg-home" style="display:none;">

	<?php $home = get_option( 'vg_home' ); ?>
	
	<!-- Home Options -->
	<div class="field-section vg-home-options">
		<h3>Home Page Layout</h3>
		<div class="row">
			<div class="span6">
				<div class="field">
					<div class="radio">
						<input type="radio" name="vg_header[layout]" id="vg-header-layout-onepage" value="onepage" <? checked( $header['layout'], 'onepage' ); ?>>
						<label for="vg-header-layout-onepage">
							<h3 style="text-align:center;display:block;">One Page Layout:</h3>
							<p>One Page Layout displays pages and posts as sections of one long page.</p>
							<p>Instead of navigating from one page to another, when the user clicks on a menu link, the site scrolls them down to the chosen section.</p>
							<p>You can select which pages and posts show up by selecting <strong>"add to one page layout" checkbox</strong> located on the side of each page or post edit screen.</p>
							<p>You can also set the order on how the sections are displayed by simply changing the post date.</p>
						</label>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="field">
					<div class="radio">
						<input type="radio" name="vg_header[layout]" id="vg-header-layout-normal" value="normal" <? checked( $header['layout'], 'normal' ); ?>>
						<label for="vg-header-layout-normal">
							<h3 style="text-align:center;display:block;">Normal Layout:</h3>
							<p>Normal Layout displays pages on a website, each with their own url.</p>
							<p>Instead of scrolling through sections of a website within the same page, the user goes from one page to another and each page contains their own content.</p>
							<p>For SEO purposes, some people may prefer using this method.</p>
						</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="field">
			<label for="vg-home-layout">Home Page Style</label>
			<div class="select">
				<select name="vg_home[layout]" id="vg-home-layout">
					<option value="one-page" <?php selected( $home['layout'], 'one-page'); ?>>One Page Layout</option>
					<option value="normal" <?php selected( $home['layout'], 'normal'); ?>>Normal</option>
				</select>
			</div>
		</div>
	</div><!-- /Home Option -->
	
	<!-- Submit button -->
	<div class="row">
		<div class="vg-btn float-right">
			<?php submit_button(); ?>
		</div>
	</div>
</div>
<!-- /Header Settings -->