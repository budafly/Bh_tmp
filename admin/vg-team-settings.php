<!-- Team Tab -->
<div class="vg-tab" id="vg-team" style="display:none;">
	<h2>Team Settings</h2>
	<!-- Layout Options -->
	<div class="field-section">
		<h3>Team Members Page Layout Options</h3>
		
		<div class="field">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_search" id="vg-team-search" value="display" <?php if (get_option('vg_team_search') == 'display') echo 'checked'; ?>>
				<label for="vg-team-search"></label>
				<p class="label">Display Search Box</p>
			</div>
		</div>
		
		<div class="field">
			<div class="radio">
				<input type="radio" name="vg_team_width" id="vg-team-width-left" value="left-sidebar" <?php if (get_option('vg_team_width') == 'left-sidebar') echo 'checked'; ?>>
				<label for="vg-team-width-left">Left Sidebar</label>
				<input type="radio" name="vg_team_width" id="vg-team-width-full" value="full" <?php if (get_option('vg_team_width', 'full') == 'full') echo 'checked'; ?>>
				<label for="vg-team-width-full">Full Width</label>
				<input type="radio" name="vg_team_width" id="vg-team-width-right" value="right-sidebar" <?php if (get_option('vg_team_width') == 'right-sidebar') echo 'checked'; ?>>
				<label for="vg-team-width-right">Right Sidebar</label>
			</div>
		</div>
		
		<div class="field">
			<label for="vg-team-layout">Team Page Layout</label>
			<div class="select">
				<select name="vg_team_layout" id="vg-team-layout">
					<option value="list-view" <?php if (get_option('vg_team_layout') == 'list-view') echo 'selected'; ?>>List View</option>
					<option value="grid-view" <?php if (get_option('vg_team_layout') == 'grid-view') echo 'selected'; ?>>Grid View</option>
				</select>
			</div>
		</div>
	</div><!-- /Layout Option -->
	
	<!-- Grid view options -->
	<div class="field-section vg-grid-options" style="display:none;overflow:hidden;">
		<h3>Grid View Options</h3>
		
		<div class="field">
			<div class="radio">				
				<input type="radio" name="vg_team_cols" id="vg-team-cols2" value="col2" <?php if ('col2' == get_option('vg_team_cols')) echo 'checked'; ?>>
				<label for="vg-team-cols2">2 Columns</label>
				<input type="radio" name="vg_team_cols" id="vg-team-cols3" value="col3" <?php if ('col3' == get_option('vg_team_cols')) echo 'checked'; ?>>
				<label for="vg-team-cols3">3 Columns</label>
				<input type="radio" name="vg_team_cols" id="vg-team-cols4" value="col4" <?php if ('col4' == get_option('vg_team_cols')) echo 'checked'; ?>>
				<label for="vg-team-cols4">4 Columns</label>
				<input type="radio" name="vg_team_cols" id="vg-team-cols5" value="col5" <?php if ('col5' == get_option('vg_team_cols')) echo 'checked'; ?>>
				<label for="vg-team-cols5">5 Columns</label>
				<input type="radio" name="vg_team_cols" id="vg-team-cols6" value="col6" <?php if ('col6' == get_option('vg_team_cols')) echo 'checked'; ?>>
				<label for="vg-team-cols6">6 Columns</label>
			</div>
		</div>
	</div><!-- /Grid view options -->
	
	<!-- Team Avatar -->
	<div class="field-section">
		<h3>Avatar</h3>
		
		<div class="field col2">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_photo" value="display" id="vg-team-photo" <?php if ( 'display' == get_option('vg_team_photo') ) echo 'checked'; ?>>
				<label for="vg-team-photo"></label>
				<p class="label">Display Team Member Avatar Photo</p>
			</div>
		</div>
		
		<div class="row">
			<div class="field-section vg-team-avatar" style="display:none;">
				<div class="field span8">
					<label for="vg-team-avatar">Team Member Image</label>
					<i  class="description">Image to display if Team Member does not have a a profile picture.</i>
					<div class="file">
						<input type="text" placeholder="Upload change or remove your Avatar Image" name="vg_team_avatar" id="vg-team-avatar" value="<?php echo get_option('vg_team_avatar'); ?>" class="vg-file-url">
						<button class="vg-btn btn-upload vg-upload-file">+</button>
						<button class="vg-btn btn-remove vg-remove-file">-</button>
					</div>
				</div>
				<div class="span4">
					<div class="block center" style="padding:20px;">
						<?php if (get_option('vg_team_avatar')) { ?>
							<img src="<?php echo get_option('vg_team_avatar'); ?>" class="responsive">
						<?php } ?>
					</div>
				</div>
				
				<div class="clear"></div>
				
				<div class="field vg-team-image-round">
					<div class="radio">
						<input type="radio" name="vg_team_image_round" id="vg-team-image-round" value="round" <?php if('round' == get_option('vg_team_image_round', 'round')) echo 'checked'; ?>>
						<label for="vg-team-image-round">Round</label>
						<input type="radio" name="vg_team_image_round" id="vg-team-image-round-corners" value="round-corners" <?php if('round-corners' == get_option('vg_team_image_round')) echo 'checked'; ?>>
						<label for="vg-team-image-round-corners">Round Corners</label>
						<input type="radio" name="vg_team_image_round" id="vg-team-image-square" value="square" <?php if('square' == get_option('vg_team_image_round')) echo 'checked'; ?>>
						<label for="vg-team-image-square">Square</label>
					</div>
				</div>
			</div>		
		</div>
	</div>
	
	<div class="field-section">
		<h3>Team Member Info to Display</h3>				
		
		<div class="field col2">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_social" value="display" id="vg-team-social" <?php if ( 'display' == get_option('vg_team_social') ) echo 'checked'; ?>>
				<label for="vg-team-social"></label>
				<p class="label">Display Team Member Social Links</p>
			</div>
		</div>
		
		<div class="field col2">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_phone" value="display" id="vg-team-phone" <?php if ( 'display' == get_option('vg_team_phone') ) echo 'checked'; ?>>
				<label for="vg-team-phone"></label>
				<p class="label">Display Team Member Phone</p>
			</div>
		</div>
		
		<div class="field col2">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_email" value="display" id="vg-team-email" <?php if ( 'display' == get_option('vg_team_email') ) echo 'checked'; ?>>
				<label for="vg-team-email"></label>
				<p class="label">Display Team Member Email</p>
			</div>
		</div>
		
		<div class="field col2">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_desc" value="display" id="vg-team-desc" <?php if ( 'display' == get_option('vg_team_desc') ) echo 'checked'; ?>>
				<label for="vg-team-desc"></label>
				<p class="label">Display Team Member Description</p>
			</div>
		</div>				
	</div>
	
	<div class="field-section vg-team-level">
		<h3>Other Features & Options</h3>
		<div class="field">
			<label for="vg-team-level">Choose Level to display Team Memebers from</label>
			<div class="select">
				<select name="vg_team_level" id="vg-team-level">
					<option value="category" <?php if ( 'category' == get_option('vg_team_level') ) echo 'selected'; ?>>Start at category level</option>
					<option value="post" <?php if ( 'post' == get_option('vg_team_level') ) echo 'selected'; ?>>Start at post level</option>				
				</select>
			</div>
		</div>
		
		<div class="field vg-team-display-members" style="display:none;">
			<label>Display Team Members</label>
			<div class="select">
				<select id="vg-team-display-members" name="vg_team_display_members">
					<option value="new-page" <?php if ( 'new-page' == get_option('vg_team_display_members') ) echo 'selected'; ?>>In a new page</option>
					<option value="same-page" <?php if ( 'same-page' == get_option('vg_team_display_members') ) echo 'selected'; ?>>In same page</option>
				</select>
			</div>
		</div>
		
		<div class="field">
			<div class="checkbox">
				<input type="checkbox" name="vg_team_link" id="vg-team-link" value="link" <?php if ( 'link' == get_option('vg_team_link') ) echo 'checked'; ?>>
				<label for="vg-team-link"></label>
				<p class="label">Link Team Members</p>
				<i>This will link each team member to their own post.</i>
			</div>
		</div>
	</div>
	
	<!-- Submit button -->
	<div class="row">
		<div class="vg-btn float-right">
			<?php submit_button(); ?>
		</div>
	</div>
</div><!-- /Team Tab -->