<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Plugin Name: JE Social Settings
 * Description: Settings for social links
 * Version: 1.0.0
 * Author: John Ericta
 * Author URI: http://www.johnericta.com
 */
add_action( 'admin_menu', 'wp_social_register_menu_page' );

function wp_social_register_menu_page() {
	//add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
	$page = add_options_page(
		'Communications Settings',
		'Communications',
		'manage_options',
		'options-communications.php',
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
		echo '<div id="message" class="updated fade"><p><strong>Communications Settings updated!</strong></p></div>';
		$wp_social = $_POST['wp_social'];
	} else {
		$wp_social = get_option('wp_social');
	}
?>
	
	<div class="wrap">
		<h2>Communications Settings</h2>
		<br />
		
		<form action="" method="post">
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_phone">Phone Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="phone_header">Phone number in header</label>
						<input type="text" id="phone_header" class="wp_social_field" name="wp_social[phone_header]" value="<?php echo (isset($wp_social['phone_header'])) ? stripslashes($wp_social['phone_header']) : '' ; ?>" placeholder="Phone number, without +1. It must be like: 888.416.3992" />
					</div>
				</div>
			</div>
			
			<div class="clearfix wp_social_block wp_social_bg">
				<div class="wp_social_block_title wp_social_block_title_email">Email Settings</div>
				<div class="clearfix wp_social_block_content">
					<div class="wp_social_row">
						<label for="email_field">Email for contacts page</label>
						<input type="text" id="email_field" class="wp_social_field" name="wp_social[email]" value="<?php echo (isset($wp_social['email'])) ? stripslashes($wp_social['email']) : '' ; ?>" placeholder="Email address" />
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
						<label>Show Facebook link in footer</label>
						<div class="wp_social_row_radio">
							<label for="facebook_show"><input type="radio" id="facebook_show" name="wp_social[facebook_show]" value="1" <?php echo (isset($wp_social['facebook_show']) AND $wp_social['facebook_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="facebook_hide"><input type="radio" id="facebook_hide" name="wp_social[facebook_show]" value="0" <?php echo ($wp_social['facebook_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
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
						<label>Show YouTube link in footer</label>
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
						<label>Show Google+ link in footer</label>
						<div class="wp_social_row_radio">
							<label for="gplus_show"><input type="radio" id="gplus_show" name="wp_social[gplus_show]" value="1" <?php echo (isset($wp_social['gplus_show']) AND $wp_social['gplus_show'] == 1) ? 'checked' : '' ; ?> /> show</label> <label for="gplus_hide"><input type="radio" id="gplus_hide" name="wp_social[gplus_show]" value="0" <?php echo ($wp_social['gplus_show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
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