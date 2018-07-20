<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Plugin Name: WP Social Settings
 * Description: Settings for social links
 * Version: 1.0.0
 * Author: John Ericta
 * Author URI: http://www.johnericta.com
 */
add_action( 'admin_menu', 'wp_social_register_menu_page' );

function wp_social_register_menu_page() {
	//add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
	$page = add_options_page(
		'WP Social Settings',
		'WP Social Settings',
		'manage_options',
		'options-wp-social-settings.php',
		'wp_social'
	);
	add_action('admin_print_styles-'. $page, 'wp_social_admin_styles');
}
function wp_social_admin_styles() {
	wp_register_style('wp_social_admin_style', plugins_url('css/style_admin.css', __FILE__));
	wp_enqueue_style('wp_social_admin_style');
}

function wp_social() {
	
	if(isset($_POST['wp_social'])) {
		update_option('wp_social', $_POST['wp_social'], false);
		echo '<div id="message" class="updated fade"><p><strong>WP Social Settings updated!</strong></p></div>';
		$wp_social = $_POST['wp_social'];
	} else {
		$wp_social = get_option('wp_social');
	}
?>
	
	<div class="wrap">
		<h2>WP Social Settings</h2>
		<br />
		
		<form action="" method="post">
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_phone">Phone Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="phone">Contact phone number</label>
						<input type="text" id="phone" class="wp_social_field" name="wp_social[phone]" value="<?php echo (isset($wp_social['phone'])) ? stripslashes($wp_social['phone']) : '' ; ?>" placeholder="Phone number ie: 555.555.5555" />
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_email">Email Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="email">Contact email</label>
						<input type="text" id="email" class="wp_social_field" name="wp_social[email]" value="<?php echo (isset($wp_social['email'])) ? stripslashes($wp_social['email']) : '' ; ?>" placeholder="Email address" />
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_fb">Facebook Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="facebook_link">Facebook link</label>
						<input type="text" id="facebook_link" class="wp_social_field" name="wp_social[facebook_link]" value="<?php echo (isset($wp_social['facebook_link'])) ? stripslashes($wp_social['facebook_link']) : '' ; ?>" placeholder="Link to Facebook page" />
					</div>
					<div class="wp_social_row">
						<label>Show Facebook link</label>
						<div class="wp_social_row_radio">
							<label for="facebook_show"><input type="radio" id="facebook_show" name="wp_social[facebook_show]" value="1" <?php echo (isset($wp_social['facebook_show']) AND $wp_social['facebook_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="facebook_hide"><input type="radio" id="facebook_hide" name="wp_social[facebook_show]" value="0" <?php echo ($wp_social['facebook_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>

			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_ig">Instagram Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="instagram_link">Instagram link</label>
						<input type="text" id="instagram_link" class="wp_social_field" name="wp_social[instagram_link]" value="<?php echo (isset($wp_social['instagram_link'])) ? stripslashes($wp_social['instagram_link']) : '' ; ?>" placeholder="Link to Instagram page" />
					</div>
					<div class="wp_social_row">
						<label>Show Instagram link</label>
						<div class="wp_social_row_radio">
							<label for="instagram_show"><input type="radio" id="instagram_show" name="wp_social[instagram_show]" value="1" <?php echo (isset($wp_social['instagram_show']) AND $wp_social['instagram_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="instagram_hide"><input type="radio" id="instagram_hide" name="wp_social[instagram_hide]" value="0" <?php echo ($wp_social['instagram_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_yt">YouTube Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="youtube_link">YouTube link</label>
						<input type="text" id="youtube_link" class="wp_social_field" name="wp_social[youtube_link]" value="<?php echo (isset($wp_social['youtube_link'])) ? stripslashes($wp_social['youtube_link']) : '' ; ?>" placeholder="Link to YouTube page" />
					</div>
					<div class="wp_social_row">
						<label>Show YouTube link</label>
						<div class="wp_social_row_radio">
							<label for="youtube_show"><input type="radio" id="youtube_show" name="wp_social[youtube_show]" value="1" <?php echo (isset($wp_social['youtube_show']) AND $wp_social['youtube_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="youtube_hide"><input type="radio" id="youtube_hide" name="wp_social[youtube_show]" value="0" <?php echo ($wp_social['youtube_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_gp">Google+ Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="gplus_link">Google+ link</label>
						<input type="text" id="gplus_link" class="wp_social_field" name="wp_social[gplus_link]" value="<?php echo (isset($wp_social['gplus_link'])) ? stripslashes($wp_social['gplus_link']) : '' ; ?>" placeholder="Link to Google+ page" />
					</div>
					<div class="wp_social_row">
						<label>Show Google+ link</label>
						<div class="wp_social_row_radio">
							<label for="gplus_show"><input type="radio" id="gplus_show" name="wp_social[gplus_show]" value="1" <?php echo (isset($wp_social['gplus_show']) AND $wp_social['gplus_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="gplus_hide"><input type="radio" id="gplus_hide" name="wp_social[gplus_show]" value="0" <?php echo ($wp_social['gplus_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_gh">GitHub Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="github_link">GitHub link</label>
						<input type="text" id="github_link" class="wp_social_field" name="wp_social[github_link]" value="<?php echo (isset($wp_social['github_link'])) ? stripslashes($wp_social['github_link']) : '' ; ?>" placeholder="Link to GitHub page" />
					</div>
					<div class="wp_social_row">
						<label>Show GitHub link</label>
						<div class="wp_social_row_radio">
							<label for="github_show"><input type="radio" id="github_show" name="wp_social[github_show]" value="1" <?php echo (isset($wp_social['github_show']) AND $wp_social['github_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="github_hide"><input type="radio" id="github_hide" name="wp_social[github_show]" value="0" <?php echo ($wp_social['github_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_so">StackOverflow Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="stackoverflow_link">StackOverflow link</label>
						<input type="text" id="stackoverflow_link" class="wp_social_field" name="wp_social[stackoverflow_link]" value="<?php echo (isset($wp_social['stackoverflow_link'])) ? stripslashes($wp_social['stackoverflow_link']) : '' ; ?>" placeholder="Link to StackOverflow page" />
					</div>
					<div class="wp_social_row">
						<label>Show StackOverflow link</label>
						<div class="wp_social_row_radio">
							<label for="stackoverflow_show"><input type="radio" id="stackoverflow_show" name="wp_social[stackoverflow_show]" value="1" <?php echo (isset($wp_social['stackoverflow_show']) AND $wp_social['stackoverflow_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="stackoverflow_hide"><input type="radio" id="stackoverflow_hide" name="wp_social[stackoverflow_show]" value="0" <?php echo ($wp_social['stackoverflow_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
						</div>
					</div>
				</div>
			</div>
			
			<hr/>
			<input type="submit" value="Save Settings" class="button-primary wp_social_save_button" />
		</form>
		
	</div>
<?php
}
?>