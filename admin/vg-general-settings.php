<!-- General Tab -->
<div class="vg-tab" id="vg-general">
	<h2>General Settings</h2>
	
	<!-- Branding -->
	<div class="field-section vg-branding-options">
		<h3>Branding</h3>
		<div class="row">
		
			<div class="field span8">
				<label for="vg-favicon">Upload a Favicon <em>72x72 pixels</em></label>
				<div class="file">
					<input type="text" placeholder="Upload change or remove your favicon" name="vg_favicon" id="vg-favicon" value="<?php echo get_option('vg_favicon'); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span4">
				<div class="block center" style="padding:20px;">
					<?php if (get_option('vg_favicon')) { ?>
						<img src="<?php echo get_option('vg_favicon'); ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div class="field span8">
				<label for="vg-logo">Upload your Logo</label>
				<div class="file">
					<input type="text" placeholder="The logo will appear on your website" name="vg_logo" id="vg-logo" value="<?php echo get_option('vg_logo'); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span4">
				<div class="block center" style="padding:20px;">
					<?php if (get_option('vg_logo')) { ?>
						<img src="<?php echo get_option('vg_logo'); ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div class="field span8">
				<label for="vg-admin-logo">Upload an Admin Logo</label>
				<div class="file">
					<input type="text" placeholder="This logo will appear on the admin page" name="vg_admin_logo" id="vg-admin-logo" value="<?php echo get_option('vg_admin_logo'); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span4">
				<div class="block center" style="padding:20px;">
					<?php if (get_option('vg_admin_logo')) { ?>
						<img src="<?php echo get_option('vg_admin_logo'); ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div class="field span8">
				<label for="vg-icon-touch">Upload an Icon</label>
				<i class="description">This will display in the Apple device as if it were an app.</i>
				<div class="file">
					<input type="text" placeholder="This icon is displayed in iphones or ipads" name="vg_icon_touch" id="vg-icon-touch" value="<?php echo get_option('vg_icon_touch'); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span4">
				<div class="block center" style="padding:20px;">
					<?php if (get_option('vg_icon_touch')) { ?>
						<img src="<?php echo get_option('vg_icon_touch'); ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div class="field span8">
				<label for="vg-startup-image">Upload a Startup Image</label>
				<i class="description">This will be displayed in the device while the app loads.</i>
				<div class="file">
					<input type="text" placeholder="This appears right before the page loads" name="vg_startup_image" id="vg-startup-image" value="<?php echo get_option('vg_startup_image'); ?>" class="vg-file-url">
					<button class="vg-btn btn-upload vg-upload-file">+</button>
					<button class="vg-btn btn-remove vg-remove-file">-</button>
				</div>
			</div>
			<div class="span4">
				<div class="block center" style="padding:20px;">
					<?php if (get_option('vg_startup_image')) { ?>
						<img src="<?php echo get_option('vg_startup_image'); ?>" class="responsive">
					<?php } ?>
				</div>
			</div>
		
		</div>
									
	</div>
	
	<!-- Social Icons -->
	<div class="field-section vg-socail-options">
		<h3>Social Media Options</h3>
		<div class="row">
			<div class="field col2">
				<label for="vg-fb">Facebook</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-facebook-square"></i></span>
					<input name="vg_fb" id="vg-fb" type="text" placeholder="Enter your Facebook url" value="<?php echo get_option('vg_fb'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-tt">Twitter</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-twitter-square"></i></span>
					<input name="vg_tt" id="vg-tt" type="text" placeholder="Enter your Twitter url" value="<?php echo get_option('vg_tt'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-gplus">Google +</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-google-plus-square"></i></span>
					<input name="vg_gplus" id="vg-gplus" type="text" placeholder="Enter your Google+ url" value="<?php echo get_option('vg_gplus'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-yt">YouTube</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-youtube-square"></i></span>
					<input name="vg_yt" id="vg-yt" type="text" placeholder="Enter your YouTube url" value="<?php echo get_option('vg_yt'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-ig">Instagram</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-instagram"></i></span>
					<input name="vg_ig" id="vg-ig" type="text" placeholder="Enter your Instagram url" value="<?php echo get_option('vg_ig'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-pt">Pinterest</label>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-pinterest-square"></i></span>
					<input name="vg_pt" id="vg-pt" type="text" placeholder="Enter your Pinterest url" value="<?php echo get_option('vg_pt'); ?>">
				</div>
			</div>
		</div>
	</div><!-- /Social Icons -->
	
	<!-- Contact Information -->
	<div class="field-section vg-contact-options">
		<h3>Contact Information</h3>
		<div class="row">
			<div class="field col2">
				<label for="vg-tel">Phone</label>
				<i class="description">Enter a phone number to display in the header.</i>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-phone"></i></span>
					<input name="vg_tel" id="vg-tel" type="text" placeholder="Enter your Phone Number" value="<?php echo get_option('tp_tel'); ?>">
				</div>
			</div>
			
			<div class="field col2">
				<label for="vg-email">Email</label>
				<i class="description">Enter an email address to display in the header.</i>
				<div class="icon-input">
					<span class="icon-box-left"><i class="fa fa-fw fa-envelope"></i></span>
					<input name="vg_email" id="vg-email" type="text" placeholder="Enter your Email Address" value="<?php echo get_option('tp_email'); ?>">
				</div>
			</div>
		</div>
	</div>
	<!-- /Contact Information -->
	
	<!-- Submit button -->
	<div class="row">
		<div class="vg-btn float-right">
			<?php submit_button(); ?>
		</div>
	</div>
</div><!-- /General Tab -->