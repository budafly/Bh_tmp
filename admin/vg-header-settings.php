<!-- Header Settings -->
<div class="vg-tab" id="vg-header" style="display:none;">
	<h2>Customize your website's Header</h2>

	<?php //get all header options as array
		$header = get_option( 'vg_header' );
		$header_gradient = get_option( 'vg_header_gradient' );
		$header_image = get_option( 'vg_header_image' );
		$header_border = get_option('vg_header_border');
	?>
	
	<div class="field-section vg-header-position">
		<h3>Sticky Header</h3>
		<i class="description">This will make the header stick to the top when the site scrolls down.</i>
		<div class="field">
			<div class="checkbox">
				<input type="checkbox" name="vg_header[sticky]" id="vg-header-sticky" value="1" <?php checked($header['sticky'], '1'); ?>>
				<label for="vg-header-sticky"></label>
				<p class="label">Make header sticky</p>				
			</div>
		</div>
	</div><!-- header sticky -->
	
	<div class="field-section">
		<h3>Choose Header Layout</h3>
		
		<div class="field">
			<p class="label">25% - 50% - 25%</p>
			<div class="radio header-layout">
				<input type="radio" name="vg_header[layout]" id="vg-header-layout-3-6-3" value="3-6-3" <?php checked( $header['layout'], '3-6-3' ); ?>>
				<label for="vg-header-layout-3-6-3" style="display:block;" class="row">
					<span class="span3 center"><i class="fa fa-fw fa-2x fa-shield"></i><br>Logo</span>
					<span class="span6 center"><i class="fa fa-fw fa-2x fa-bars"></i><br>Menu</span>
					<span class="span3 center"><i class="fa fa-fw fa-2x fa-cubes"></i><br>Widgets</span>
				</label>
			</div>
		</div>
		
		<div class="field">
			<p class="label">33% - 33% - 33%</p>
			<div class="radio header-layout">
				<input type="radio" name="vg_header[layout]" id="vg-header-layout-4-4-4" value="4-4-4" <?php checked( $header['layout'], '4-4-4' ); ?>>
				<label for="vg-header-layout-4-4-4" style="display:block;" class="row">
					<span class="span4 center"><i class="fa fa-fw fa-2x fa-shield"></i><br>Logo</span>
					<span class="span4 center"><i class="fa fa-fw fa-2x fa-bars"></i><br>Menu</span>
					<span class="span4 center"><i class="fa fa-fw fa-2x fa-cubes"></i><br>Widgets</span>
				</label>
			</div>
		</div>
		
		<div class="field">
			<p class="label">50% - 50%</p>
			<div class="radio header-layout">
				<input type="radio" name="vg_header[layout]" id="vg-header-layout-6-6" value="6-6" <?php checked( $header['layout'], '6-6' ); ?>>
				<label for="vg-header-layout-6-6" style="display:block;" class="row">
					<span class="span6 center"><i class="fa fa-fw fa-2x fa-shield"></i><br>Logo</span>
					<span class="span6 center"><i class="fa fa-fw fa-2x fa-bars"></i><br>Menu</span>
				</label>
			</div>
		</div>
		
		<div class="field">
			<p class="label">25% - 75%</p>
			<div class="radio header-layout">
				<input type="radio" name="vg_header[layout]" id="vg-header-layout-3-9" value="3-9" <?php checked( $header['layout'], '3-9' ); ?>>
				<label for="vg-header-layout-3-9" style="display:block;" class="row">
					<span class="span3 center"><i class="fa fa-fw fa-2x fa-shield"></i><br>Logo</span>
					<span class="span9 center"><i class="fa fa-fw fa-2x fa-bars"></i><br>Menu</span>
				</label>
			</div>
		</div>
	</div><!-- header layout -->

	
	<div class="field-section">
		<h3>Header Background Options</h3>
		
		<div class="field col2">
			<h3>Select a Background</h3>
			<div class="select">
				<select name="vg_header[bg]" class="toggle" id="vg-header-bg">
					<option data-toggle=".vg-header-color" value="color" <?php selected( $header['bg'], 'color' ); ?>>Solid Background</option>
					<option data-toggle=".vg-header-gradient" value="gradient" <?php selected( $header['bg'], 'gradient' ); ?>>Gradient Background</option>
					<option data-toggle=".vg-header-pattern" value="pattern" <?php selected( $header['bg'], 'pattern' ); ?>>Pattern Background</option>
					<option data-toggle=".vg-header-image" value="image" <?php selected( $header['bg'], 'image' ); ?>>Image Background</option>
				</select>

			</div>
		</div>
		
		<div class="field col2 vg-header-color vg-form-toggle" <?php if('color' !== $header['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Color</h3>
			<div class="field">
				<div class="color">
					<input type="text" name="vg_header_bgcolor" value="<?php echo get_option('vg_header_bgcolor', '#ffffff'); ?>">
				</div>
			</div>
		</div>
		
		<div class="field col2 vg-header-gradient vg-form-toggle" <?php if('gradient' !== $header['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Gradient</h3>
			<div class="field">
				<label for="vg-header-gradient-start">Start Gradient</label>
				<div class="color">
					<input type="text" id="vg-header-gradient-start" name="vg_header_gradient[start]" value="<?php echo $header_gradient['start']; ?>">
				</div>
			</div>
			<div class="field">
				<label for="vg-header-gradient-finish">Finish Gradient</label>
				<div class="color">
					<input type="text" id="vg-header-gradient-finish" name="vg_header_gradient[finish]" value="<?php echo $header_gradient['finish']; ?>">
				</div>
			</div>
			<div class="field">
				<h3>Select Gradient type</h3>
				<div class="radio">
					<input type="radio" name="vg_header_gradient[dir]" value="linear" id="vg-header-gradient-linear" <?php checked( $header_gradient['dir'], 'linear' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
					<label for="vg-header-gradient-linear">Linear</label>
					<input type="radio" name="vg_header_gradient[dir]" value="radial" id="vg-header-gradient-radial" <?php checked( $header_gradient['dir'], 'radial' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
					<label for="vg-header-gradient-radial">Radial</label>					
				</div>
			</div>
			<div class="field vg-gradient-direction" <?php if('linear' !== $header_gradient['dir']) echo 'style="display:none;"'; ?>>
				<div class="radio">
					<input type="radio" name="vg_header_gradient[linear]" value="ttb" id="vg-header-gradient-linear-ttb" <?php checked( $header_gradient['linear'], 'ttb' ); ?>>
					<label for="vg-header-gradient-linear-ttb">Top to Bottom</label>
					<input type="radio" name="vg_header_gradient[linear]" value="ltr" id="vg-header-gradient-linear-ltr" <?php checked( $header_gradient['linear'], 'ltr' ); ?>>
					<label for="vg-header-gradient-linear-ltr">left to right</label>
				</div>
			</div>
		</div>
		
		<div class="field col2 vg-header-pattern vg-form-toggle" <?php if('pattern' !== $header['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select a Pattern</h3>
			<div class="field">
				<div class="file">
					<input type="text" placeholder="Upload a pattern" name="vg_header_pattern" id="vg-header-image" value="<?php echo get_option( 'vg_header_pattern' ); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="block">
				<div class="block center" style="padding:20px;">
					<?php if (get_option( 'vg_header_pattern' )) { ?>
						<p class="label left">Pattern Preview</p>
						<div style="background: url(<?php echo get_option( 'vg_header_pattern' ); ?>) repeat scroll top left transparent;display:block;height:200px;" class="responsive">
					<?php } ?>
				</div>
			</div>
			</div>
		</div>
		<div class="field col2 vg-header-image vg-form-toggle" <?php if('image' !== $header['bg']) echo 'style="display:none;"'; ?>>
			<h3>Select an Image</h3>
			<div class="field">
				<div class="file">
					<input type="text" placeholder="Upload an Image to use as header background" name="vg_header_image[image]" id="vg-header-image" value="<?php echo $header_image['image']; ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="block">
				<div class="block center" style="padding:20px;">
					<?php if ($header_image['image']) { ?>
						<p class="label left">Background Preview</p>
						<img src="<?php echo $header_image['image']; ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="field">
				<label for="vg-header-repeat">Background Reapeat</label>
				<div class="select">
					<select name="vg_header_image[repeat]" id="vg-header-repeat">
						<option value="repeat" <?php selected( $header_image['repeat'], 'repeat' ); ?>>Reapeat</option>
						<option value="repeat-x" <?php selected( $header_image['repeat'], 'repeat-x' ); ?>>Reapeat-X</option>
						<option value="repeat-y" <?php selected( $header_image['repeat'], 'repeat-y' ); ?>>Reapeat-Y</option>
						<option value="no-repeat" <?php selected( $header_image['repeat'], 'no-repeat' ); ?>>No Repeat</option>
					</select>
				</div>
			</div>
			
			<div class="field">
				<label for="vg-header-attach">Background Attachment</label>
				<div class="select">
					<select name="vg_header_image[attach]" id="vg-header-attach">
						<option value="fixed" <?php selected( $header_image['attach'], 'fixed'); ?>>Fixed</option>
						<option value="scroll" <?php selected( $header_image['attach'], 'scroll'); ?>>Scroll</option>
					</select>
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-header-position-x">Background <br>Position X</label>
				<div class="select">
					<select name="vg_header_image[position-x]" id="vg-header-position-x">
						<option value="left" <?php selected( $header_image['position-x'], 'left' ); ?>>Left</option>
						<option value="center" <?php selected( $header_image['position-x'], 'center' ); ?>>Center</option>
						<option value="right" <?php selected( $header_image['position-x'], 'right' ); ?>>Right</option>
					</select>
				</div>
			</div>
			<div class="field col2">
				<label for="vg-header-position-y">Background <br>Position Y</label>
				<div class="select">
					<select name="vg_header_image[position-y]" id="vg-header-position-y">
						<option value="top" <?php selected( $header_image['position-y'], 'top' ); ?>>Top</option>
						<option value="center" <?php selected( $header_image['position-y'], 'center' ); ?>>Center</option>
						<option value="bottom" <?php selected( $header_image['position-y'], 'bottom' ); ?>>Bottom</option>
					</select>
				</div>
			</div>
		</div>
	</div><!-- header background -->
	
	<div class="clear"></div>
	
	<div class="field-section">
		<h3>Header Bottom Border</h3>
		<div class="field">
			<div class="col3">
				<label for="vg-header-border-px">Border Size</label>
				<input type="text" name="vg_header_border[px]" id="vg-header-border-px" value="<?php echo $header_border['px']; ?>" placeholder="Ex: 2px">
			</div>
			<div class="col3">
				<label for="vg-header-border-color">Border Style</label>
				<div class="select">
					<select name="vg_header_border[style]" id="vg-header-border-color">
						<option value="solid" <?php selected( $header_border['style'], 'solid' ); ?>>Solid</option>
						<option value="dotted" <?php selected( $header_border['style'], 'dotted' ); ?>>Dotted</option>
						<option value="ridged" <?php selected( $header_border['style'], 'ridged' ); ?>>Ridged</option>
					</select>
				</div>
			</div>
			<div class="col3">
				<label for="vg-header-border-color">Border Color</label>
				<div class="color">
					<input type="text" name="vg_header_border[color]" id="vg-header-border-color" value="<?php echo $header_border['color']; ?>">
				</div>
			</div>

		<div class="clear"></div>
		</div>
	</div><!-- header border-bottom -->
			
	<div class="field-section">
		<h3>Main Nav Options</h3>

		<?php $mobile_nav = get_option( 'vg_mobile_nav' ); ?>
		
		<div class="field">
			<div class="checkbox">
				<input type="checkbox" name="vg_mobile_nav[force]" id="vg-mobile-nav-mobile" value="force-mobile" <?php checked( $mobile_nav['force'], 'force-mobile', true ); ?>>
				<label for="vg-mobile-nav-mobile"></label>
				<p class="label">Always display mobile menu</p>
			</div>
		</div>
		
		<div class="field">
			<h3>When in mobile menu, how will the menu open?</h3>
			<div class="radio">
				<input type="radio" name="vg_mobile_nav[animation]" id="vg-mobile-nav-left" value="slide-left" <?php checked( $mobile_nav['animation'], 'slide-left', true ); ?> onchange="jQuery('.mobile-mobile-nav-style').show('slow');">
				<label for="vg-mobile-nav-left">Slide from left</label>
				<input type="radio" name="vg_mobile_nav[animation]" id="vg-mobile-nav-down" value="down" <?php checked( $mobile_nav['animation'], 'down', true ); ?> onchange="jQuery('.mobile-mobile-nav-style').slideToggle('slow');">
				<label for="vg-mobile-nav-down">Slide down</label>
				<input type="radio" name="vg_mobile_nav[animation]" id="vg-mobile-nav-right" value="slide-right" <?php checked( $mobile_nav['animation'], 'slide-right', true ); ?> onchange="jQuery('.mobile-mobile-nav-style').show('slow');">
				<label for="vg-mobile-nav-right">Slide from right</label>
			</div>
		</div>
		
		<div class="field mobile-mobile-nav-style" <?php if( 'down' == $mobile_nav['animation'] ) echo 'style="display:none;"'; ?>>
			<div class="radio">
				<input type="radio" name="vg_mobile_nav[skin]" id="vg-mobile-nav-dark" value="dark" <?php checked( $mobile_nav['skin'], 'dark', true ); ?>>
				<label for="vg-mobile-nav-dark">Dark</label>
				<input type="radio" name="vg_mobile_nav[skin]" id="vg-mobile-nav-light" value="light" <?php checked( $mobile_nav['skin'], 'light', true ); ?>>
				<label for="vg-mobile-nav-light">Light</label>
			</div>
		</div>
		
		<h3>Toggle Menu Button</h3>

		<div class="field col2">			
			<p class="label">Position</p>
			<div class="radio">
				<input type="radio" name="vg_mobile_nav[btn][position]" id="vg-mobile-nav-button-left" value="left" <?php checked( $mobile_nav['btn']['position'], 'left', true ); ?>>
				<label for="vg-mobile-nav-button-left">Left</label>
				<input type="radio" name="vg_mobile_nav[btn][position]" id="vg-mobile-nav-button-center" value="center" <?php checked( $mobile_nav['btn']['position'], 'center', true ); ?>>
				<label for="vg-mobile-nav-button-center">Center</label>
				<input type="radio" name="vg_mobile_nav[btn][position]" id="vg-mobile-nav-button-right" value="right" <?php checked( $mobile_nav['btn']['position'], 'right', true ); ?>>
				<label for="vg-mobile-nav-button-right">Right</label>
			</div>
		</div>

		<div class="field col2">
			<p class="label">Size</p>
			<div class="radio">
				<input type="radio" name="vg_mobile_nav[btn][size]" id="vg-mobile-nav-button-sm" value="small" <?php checked( $mobile_nav['btn']['size'], 'small', true ); ?>>
				<label for="vg-mobile-nav-button-sm">Small</label>
				<input type="radio" name="vg_mobile_nav[btn][size]" id="vg-mobile-nav-button-med" value="medium" <?php checked( $mobile_nav['btn']['size'], 'medium', true ); ?>>
				<label for="vg-mobile-nav-button-med">Medium</label>
				<input type="radio" name="vg_mobile_nav[btn][size]" id="vg-mobile-nav-button-lg" value="large" <?php checked( $mobile_nav['btn']['size'], 'large', true ); ?>>
				<label for="vg-mobile-nav-button-lg">Large</label>
			</div>
		</div>
		
		<div class="field col2">
			<label for="vg-mobile-nav-button-bg">Background</label>
			<div class="color">
				<input type="text" name="vg_mobile_nav[btn][background]" id="vg-mobile-nav-bg" value="<?php echo $mobile_nav['btn']['background']; ?>">
			</div>
		</div>
		
		<div class="field col2">
			<label for="vg-mobile-nav-button-color">Color</label>
			<div class="color">
				<input type="text" name="vg_mobile_nav[btn][color]" id="vg-mobile-nav-color" value="<?php echo $mobile_nav['btn']['color']; ?>">
			</div>
		</div>

		<div class="field col2">
			<label for="vg-mobile-nav-button-color">Border</label>
			<div class="color">
				<input type="text" name="vg_mobile_nav[btn][border]" id="vg-mobile-nav-color" value="<?php echo $mobile_nav['btn']['border']; ?>">
			</div>
		</div>

		<div class="field col2">
			<label for="vg-mobile-nav-button-color">Border Radius</label>
			<div class="color">
				<input type="text" name="vg_mobile_nav[btn][border-radius]" id="vg-mobile-nav-color" value="<?php echo $mobile_nav['btn']['border-radius']; ?>">
			</div>
		</div>
		<div class="clear"></div>
		<div class="field">
			<label for="vg-mobile-nav-button-icon">Icon</label>
			<div class="icon">			
				<div class="icon-string">
					<input type="text" name="vg_mobile_nav[btn][icon]" id="vg-mobile-nav-icon" value="<?php echo $mobile_nav['btn']['icon']; ?>">
					<a href="javascript:;" class="btn show-icons"><i class="fa fa-fw fa-th"></i></a>
					<a href="javascript:;" class="btn hide-icons"><i class="fa fa-fw fa-minus"></i></a>
				</div>
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
<!-- /Header Settings -->