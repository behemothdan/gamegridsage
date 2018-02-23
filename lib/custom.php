<?php
/**
 * Custom Functions for Behemoth - Based off Sage
 */
 
 /* Logo Uploader */
 function themeslug_theme_customizer( $wp_customize ) {    
	$wp_customize->add_setting( 'themeslug_logo' );
	
	$wp_customize->add_section( 'themeslug_logo_section' , array(
		'title'       => __( 'Logo', 'themeslug' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
		'label'    => __( 'Logo', 'themeslug' ),
		'section'  => 'themeslug_logo_section',
		'settings' => 'themeslug_logo',
	) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');
/* End Logo Uploader */


/* Creates a thumbnail image size for the homepage, generated when a file an image is uploaded */
if ( function_exists( 'add_image_size' ) ) { 	
	add_image_size( 'homepage-featured-thumbnail', 363, 150, true );
	add_image_size( 'homepage-featured', 780, 300, true );	
	add_image_size('jumbotron', 1140, 250, true);
	add_image_size('half-jumbotron', 550, 250, true);
}
/* End Thumbnail Definitions */

function create_bannerimage()  {	
	$labels = array(
		'name' => _x('Events and Products', 'post type general name'),
		'singular_name' => _x('New Event', 'post type singular name'),
		'add_new' => _x('Add New Event', 'book'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Event'),
		'new_item' => __('New Event'),
		'all_items' => __('All Events'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Events'),
		'not_found' =>  __('No Events found'),
		'not_found_in_trash' => __('No Events found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Events')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'events'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',
		'capability_type' => 'page',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('newbanners', $args);		
}
add_action('init', 'create_bannerimage');	

function create_storeeventdetails()  {	
	$labels = array(
		'name' => _x('Store Event Details', 'post type general name'),
		'singular_name' => _x('New Store Event Details', 'post type singular name'),
		'add_new' => _x('Add Store Event Details', 'book'),
		'add_new_item' => __('Add Store Event Details'),
		'edit_item' => __('Edit Store Event Details'),
		'new_item' => __('New Store Event Details'),
		'all_items' => __('All Store Event Details'),
		'view_item' => __('View Store Event Details'),
		'search_items' => __('Search Store Event Details'),
		'not_found' =>  __('No Store Event Details found'),
		'not_found_in_trash' => __('No Store Event Details found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Store Event Details')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'storeeventdetails'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',			
		'capability_type' => 'page',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_position' => null,
  'exclude_from_search' => true,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('storeeventdetails', $args);		
}
add_action('init', 'create_storeeventdetails');	

function create_stores()  {	
	$labels = array(
		'name' => _x('Stores', 'post type general name'),
		'singular_name' => _x('New Store', 'post type singular name'),
		'add_new' => _x('Add New Store', 'book'),
		'add_new_item' => __('Add New Store'),
		'edit_item' => __('Edit Store'),
		'new_item' => __('New Store'),
		'all_items' => __('All Stores'),
		'view_item' => __('View Store'),
		'search_items' => __('Search Stores'),
		'not_found' =>  __('No Stores found'),
		'not_found_in_trash' => __('No Stores found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Stores')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'stores'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',			
		'capability_type' => 'page',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('stores', $args);		
}
add_action('init', 'create_stores');	


/* Function to fix embedded Youtube URLs */
function fix_youtube_url($url,$width,$height){
    $removeEndingJunk = explode('&',$url);
	$youtubeurls = array("http://www.youtube.com/watch?v=", "https://www.youtube.com/watch?v=");
	$embed_video_url = str_replace($youtubeurls, "https://www.youtube.com/embed/", $removeEndingJunk[0]);	
	$fixed_url = '<iframe width="'. $width .'" height="'. $height . '" src="' . $embed_video_url . '" frameborder="0" allowfullscreen></iframe>';		
	return $fixed_url;
}
/* End Youtube Link Fixer */


/* Create our Theme Settings Page */
function build_options_page() { ?>
	<div id="theme-options-wrap">
		<div class="icon32" id="icon-tools"> <br /> </div>
		<h2>Behemoth Theme Settings</h2>
		<p>Easily change and update sections of your site using the Behemoth Theme based on <a href='https://roots.io/sage/' target='_blank'>Sage</a>.</p>
		
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('theme_options'); ?>
			<?php do_settings_sections(__FILE__); ?>
		
			<p class="submit">
				<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
			</p>
		
		</form>
	</div>
<?php }
add_action('admin_init', 'register_and_build_fields');

function register_and_build_fields() {
	register_setting('theme_options', 'theme_options', 'validate_setting');
  
	add_settings_section('theme_settings', 'Theme Settings', 'settings_section', __FILE__);
  
	function settings_section() {}
	
  /* Define our settings */
	add_settings_field('youtubechannel', 'Youtube Channel URL', 'youtubechannel_setting', __FILE__, 'theme_settings');
	add_settings_field('twitteraccount', 'Twitter Username', 'twitter_setting', __FILE__, 'theme_settings');
	add_settings_field('facebookaccount', 'Facebook Page URL', 'facebook_setting', __FILE__, 'theme_settings');
	add_settings_field('frontpagevideo', 'Frontpage Video Link', 'frontpagevideo_setting', __FILE__, 'theme_settings');
	add_settings_field('calendar', 'Google Calendar Embed', 'calendar_setting', __FILE__, 'theme_settings');
}

function validate_setting($theme_options) {
	return $theme_options;
}

function youtubechannel_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[youtubechannel_setting]' type='text' value='{$options['youtubechannel_setting']}' />";
}
function youtubechannellink_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[youtubechannellink_setting]' type='text' value='{$options['youtubechannellink_setting']}' />";
}

function twitter_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[twitter_setting]' type='text' value='{$options['twitter_setting']}' />";
}
function twitterlink_setting() {
	$options = get_option('theme_options');  echo "<input name='theme_options[twitterlink_setting]' type='text' value='{$options['twitterlink_setting']}' />";
}

function facebook_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[facebook_setting]' type='text' value='{$options['facebook_setting']}' />";
}
function facebooklink_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[facebooklink_setting]' type='text' value='{$options['facebooklink_setting']}' />";
}

function frontpagevideo_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[frontpagevideo_setting]' value='{$options['frontpagevideo_setting']}' />";
}
function frontpagevideolink_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[frontpagevideolink_setting]' value='{$options['frontpagevideolink_setting']}' />";
}

function calendar_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[calendar_setting]' value='{$options['calendar_setting']}' />";
}
function calendarlink_setting() {
	$options = get_option('theme_options');  echo "<input style='width:500px;' name='theme_options[calendarlink_setting]' value='{$options['calendarlink_setting']}' />";
}

add_action('admin_menu', 'theme_options_page');
function theme_options_page() {  add_options_page('Theme Settings', 'Theme Settings', 'administrator', __FILE__, 'build_options_page');}
/* End Theme Settings Page */

/* We really don't need AIM, Jabber, etc */
  function remove_useless_fields( $contactmethods ) {
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    return $contactmethods;
  }
  add_filter('user_contactmethods','remove_useless_fields',10,1);
/* End Irrelevant Social Media */

/* Add Relevant Social Media */
  add_action( 'show_user_profile', 'user_social_media' );
  add_action( 'edit_user_profile', 'user_social_media' );
  function user_social_media( $user ) { ?>
    <h3>Social Media Accounts</h3>
    <h4>(If different then the social media accounts for the site/company)</h4>
    <table class="form-table">
      <tr>
        <th><label for="twitter">Twitter</label></th>
        <td>
          <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
          <span class="description">Please enter your Twitter username.</span>
        </td>
      </tr>	
      <tr>
        <th><label for="youtube">Youtube</label></th>
        <td>
          <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
          <span class="description">Please enter your Youtube channel URL.</span>
        </td>
      </tr>			
      <tr>
        <th><label for="youtube">Facebook</label></th>
        <td>
          <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
          <span class="description">Please enter your Facebook URL.</span>
        </td>
      </tr>			
    </table>
  <?php }
  
  add_action( 'personal_options_update', 'save_user_social_media' );
  add_action( 'edit_user_profile_update', 'save_user_social_media' );
  function save_user_social_media( $user_id ) {
  
    if ( !current_user_can( 'edit_user', $user_id ) )
      return false;
    
    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
    update_usermeta( $user_id, 'youtube', $_POST['youtube'] );
    update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
  }
/* End Relevant Social Media */

/* Single Function to retrieve author information */
function author_box() { ?>
	<div class="author-profile">		
		<h4 class="author-name fn n">All about <?php the_author_meta( 'display_name' ); ?></h4>

		<p class="author-description author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>

		<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
			<p class="author-twitter" style="margin:7px;">
				<a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter">
					<img src="http://www.playatgamegrid.com/wp-content/plugins/social-media-widget/images/default/32/twitter.png" alt="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter" />
					Follow <?php the_author_meta( 'display_name' ); ?> on Twitter
				</a>
			</p>
		<?php } // End check for twitter ?>
		
		<?php if ( get_the_author_meta( 'youtube' ) ) { ?>
			<p class="author-youtube" style="margin:7px;">
				<a href="<?php the_author_meta( 'youtube' ); ?>" title="Watch <?php the_author_meta( 'display_name' ); ?> on Youtube">
					<img src="http://www.playatgamegrid.com/wp-content/plugins/social-media-widget/images/default/32/youtube.png" alt="Watch <?php the_author_meta( 'display_name' ); ?> on Youtube" />
					Watch <?php the_author_meta( 'display_name' ); ?> on Youtube
				</a>
			</p>
		<?php } // End check for Youtube ?>
		
		<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
			<p class="author-facebook" style="margin:7px;">
				<a href="<?php the_author_meta( 'facebook' ); ?>" title="Socialize with <?php the_author_meta( 'display_name' ); ?> on Facebok">
					<img src="http://www.playatgamegrid.com/wp-content/plugins/social-media-widget/images/default/32/facebook.png" alt="Socialize with <?php the_author_meta( 'display_name' ); ?> on Facebok" />
					Socialize with <?php the_author_meta( 'display_name' ); ?> on Facebook
				</a>
			</p>
		<?php } // End check for Facebook ?>		
	</div><?php
}

/* Hide the other dashboard panels for simplicity */
function disable_dashboard_widgets() {  
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');  
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');  
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');  
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');    	
}  
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');

/* Add our custom panels */

/* Instructional Videos */
// Edit Your store
function editstore_video_widget(){
 	wp_add_dashboard_widget(
    'editstore_video_widget',
    'Video: How to edit your store',
    'howto_edityourstore_video_widget_function'
  );
}
add_action( 'wp_dashboard_setup', 'editstore_video_widget');

function howto_edityourstore_video_widget_function(){
  echo "<div class='video-container'><iframe width='460' height='259' src='https://www.youtube.com/embed/gs78si7z8Hw' frameborder='0' allowfullscreen></iframe></div>";
}

// Add Event Details
function eventdetails_video_widget(){
 	wp_add_dashboard_widget(
    'eventdetails_video_widget',
    'Video: How to add event details',
    'howto_eventdetails_video_widget_function'
  );
}
add_action( 'wp_dashboard_setup', 'eventdetails_video_widget');

function howto_eventdetails_video_widget_function(){
  echo "<div class='video-container'><iframe width='460' height='259' src='https://www.youtube.com/embed/Z36XJ43yFNk' frameborder='0' allowfullscreen></iframe></div>";
}

// Upload Event Results
function eventresults_video_widget(){
 	wp_add_dashboard_widget(
    'eventresults_video_widget',
    'Video: How to upload event results',
    'howto_eventresults_video_widget_function'
  );
}
add_action( 'wp_dashboard_setup', 'eventresults_video_widget');

function howto_eventresults_video_widget_function(){
  echo "<div class='video-container'><iframe width='460' height='259' src='https://www.youtube.com/embed/EN3tjj3Zy2E' frameborder='0' allowfullscreen></iframe></div>";
}

// Remove version info from files
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

// Post revision maximum
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 10);

// Enable Shotcodes in Widgets
if ( !is_admin() ){
    add_filter('widget_text', 'do_shortcode', 11);
}

// Allow XML file uploads
add_filter('upload_mimes', 'custom_upload_xml');
 
function custom_upload_xml($mimes) {
    $mimes = array_merge($mimes, array('xml' => 'application/xml'));
    return $mimes;
}

add_action('admin_head', 'dashboard_video_css');
function dashboard_video_css()
{
	echo '<style>.video-container {
          position: relative;
          padding-bottom: 56.25%;
          padding-top: 30px; height: 0; overflow: hidden;
      }
       
      .video-container iframe,
      .video-container object,
      .video-container embed {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }</style>';
}
?>