<!-- splash Settings -->
<div class="vg-tab" id="vg-splash" style="display:none;">

	<?php 
		$splash = get_option( 'vg_splash' );
		$splash_image = get_option( 'vg_splash_image' );
		$splash_gradient = get_option( 'vg_splash_gradient' );
	?>
	
	<!-- Home Options -->
	<div class="field-section vg-splash-options">
		<h2>Choose a Logo ofr the Splash Page</h2>
		<i>If no logo is chosen here, your default logo will be displayed.</i>
			<div class="field span4">
				<label for="vg-splashlogo">Upload your Logo</label>
				<div class="file">
					<input type="text" placeholder="The logo will appear on your splash page" name="vg_splash[logo]" id="vg-splashlogo" value="<?php echo $splash['logo']; ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span8">
				<div class="block center" style="padding:20px;">
					<?php if ($splash['logo']) { ?>
						<img src="<?php echo $splash['logo']; ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>

	</div><!-- /Home Option -->

	<div class="field-section">
		<h3>Splash Page Background Options</h3>
		
		<div class="field col2">
			<h3>Select a Background</h3>
			<div class="select">
				<select name="vg_splash[bg]" class="toggle" id="vg-splash-bg">
					<option data-toggle=".vg-splash-color" value="color" <?php selected( $splash['bg'], 'color' ); ?>>Solid Background</option>
					<option data-toggle=".vg-splash-gradient" value="gradient" <?php selected( $splash['bg'], 'gradient' ); ?>>Gradient Background</option>
					<option data-toggle=".vg-splash-pattern" value="pattern" <?php selected( $splash['bg'], 'pattern' ); ?>>Pattern Background</option>
					<option data-toggle=".vg-splash-image" value="image" <?php selected( $splash['bg'], 'image' ); ?>>Image Background</option>
				</select>

			</div>
		</div>
		
		<div class="field col2 vg-splash-color vg-form-toggle" <?php if('color' !== $splash['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Color</h3>
			<div class="field">
				<div class="color">
					<input type="text" name="vg_splash_bgcolor" value="<?php echo get_option('vg_splash_bgcolor', '#ffffff'); ?>">
				</div>
			</div>
		</div>
		
		<div class="field col2 vg-splash-gradient vg-form-toggle" <?php if('gradient' !== $splash['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Gradient</h3>
			<div class="field">
				<label for="vg-splash-gradient-start">Start Gradient</label>
				<div class="color">
					<input type="text" id="vg-splash-gradient-start" name="vg_splash_gradient[start]" value="<?php echo $splash_gradient['start']; ?>">
				</div>
			</div>
			<div class="field">
				<label for="vg-splash-gradient-finish">Finish Gradient</label>
				<div class="color">
					<input type="text" id="vg-splash-gradient-finish" name="vg_splash_gradient[finish]" value="<?php echo $splash_gradient['finish']; ?>">
				</div>
			</div>
			<div class="field">
				<h3>Select Gradient type</h3>
				<div class="radio">
					<input type="radio" name="vg_splash_gradient[dir]" value="linear" id="vg-splash-gradient-linear" <?php checked( $splash_gradient['dir'], 'linear' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
					<label for="vg-splash-gradient-linear">Linear</label>
					<input type="radio" name="vg_splash_gradient[dir]" value="radial" id="vg-splash-gradient-radial" <?php checked( $splash_gradient['dir'], 'radial' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
					<label for="vg-splash-gradient-radial">Radial</label>					
				</div>
			</div>
			<div class="field vg-gradient-direction" <?php if('linear' !== $splash_gradient['dir']) echo 'style="display:none;"'; ?>>
				<div class="radio">
					<input type="radio" name="vg_splash_gradient[linear]" value="ttb" id="vg-splash-gradient-linear-ttb" <?php checked( $splash_gradient['linear'], 'ttb' ); ?>>
					<label for="vg-splash-gradient-linear-ttb">Top to Bottom</label>
					<input type="radio" name="vg_splash_gradient[linear]" value="ltr" id="vg-splash-gradient-linear-ltr" <?php checked( $splash_gradient['linear'], 'ltr' ); ?>>
					<label for="vg-splash-gradient-linear-ltr">left to right</label>
				</div>
			</div>
		</div>
		
		<div class="field col2 vg-splash-pattern vg-form-toggle" <?php if('pattern' !== $splash['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Pattern</h3>
			<div class="field">
				<div class="file">
					<input type="text" placeholder="Upload a pattern" name="vg_splash_pattern" id="vg-splash-image" value="<?php echo get_option( 'vg_splash_pattern' ); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="block">
				<div class="block center" style="padding:20px;">
					<?php if (get_option( 'vg_splash_pattern' )) { ?>
						<p class="label left">Pattern Preview</p>
						<div style="background: url(<?php echo get_option( 'vg_splash_pattern' ); ?>) repeat scroll top left transparent;display:block;height:200px;" class="responsive">
					<?php } ?>
				</div>
			</div>
			</div>
		</div>
		<div class="field col2 vg-splash-image vg-form-toggle" <?php if('image' !== $splash['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select an Image</h3>
			<div class="field">
				<div class="file">
					<input type="text" placeholder="Upload an Image to use as splash background" name="vg_splash_image[image]" id="vg-splash-image" value="<?php echo $splash_image['image']; ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="block">
				<div class="block center" style="padding:20px;">
					<?php if ($splash_image['image']) { ?>
						<p class="label left">Background Preview</p>
						<img src="<?php echo $splash_image['image']; ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="field">
				<label for="vg-splash-repeat">Background Reapeat</label>
				<div class="select">
					<select name="vg_splash_image[repeat]" id="vg-splash-repeat">
						<option value="repeat" <?php selected( $splash_image['repeat'], 'repeat' ); ?>>Reapeat</option>
						<option value="repeat-x" <?php selected( $splash_image['repeat'], 'repeat-x' ); ?>>Reapeat-X</option>
						<option value="repeat-y" <?php selected( $splash_image['repeat'], 'repeat-y' ); ?>>Reapeat-Y</option>
						<option value="no-repeat" <?php selected( $splash_image['repeat'], 'no-repeat' ); ?>>No Repeat</option>
					</select>
				</div>
			</div>
			
			<div class="field">
				<label for="vg-splash-attach">Background Attachment</label>
				<div class="select">
					<select name="vg_splash_image[attach]" id="vg-splash-attach">
						<option value="fixed" <?php selected( $splash_image['attach'], 'fixed'); ?>>Fixed</option>
						<option value="scroll" <?php selected( $splash_image['attach'], 'scroll'); ?>>Scroll</option>
					</select>
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-splash-position-x">Background <br>Position X</label>
				<div class="select">
					<select name="vg_splash_image[position-x]" id="vg-splash-position-x">
						<option value="left" <?php selected( $splash_image['position-x'], 'left' ); ?>>Left</option>
						<option value="center" <?php selected( $splash_image['position-x'], 'center' ); ?>>Center</option>
						<option value="right" <?php selected( $splash_image['position-x'], 'right' ); ?>>Right</option>
					</select>
				</div>
			</div>
			<div class="field col2">
				<label for="vg-splash-position-y">Background <br>Position Y</label>
				<div class="select">
					<select name="vg_splash_image[position-y]" id="vg-splash-position-y">
						<option value="top" <?php selected( $splash_image['position-y'], 'top' ); ?>>Top</option>
						<option value="center" <?php selected( $splash_image['position-y'], 'center' ); ?>>Center</option>
						<option value="bottom" <?php selected( $splash_image['position-y'], 'bottom' ); ?>>Bottom</option>
					</select>
				</div>
			</div>
		</div>
	</div><!-- splash background -->

	<div class="field-section">
		<h3>Splash Page Nav Options</h3>
		<div class="field">
			<label for="vg-nav-style">Round or Square icons?</label>
			<div class="select">
				<select name="vg_splash_nav[style]" id="vg-nav-style">
					<option value="round" <?php selected( $splash_nav['style'], 'round' ); ?>>Round</option>
					<option value="square" <?php selected( $splash_nav['style'], 'square' ); ?>>Square</option>					
				</select>
			</div>
		</div>
	</div>
	
	<!-- Submit button -->
	<div class="row">
		<div class="vg-btn float-right">
			<?php submit_button(); ?>
		</div>
	</div>
</div>
<!-- /splash Settings -->