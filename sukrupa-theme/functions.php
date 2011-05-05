<?php 
ini_set('display_errors', 'on');
remove_action('wp_head', 'wp_generator'); 
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link'); 

add_action('wp_ajax_ammado_mail_action', 'sending_mail');
add_action('wp_ajax_nopriv_ammado_mail_action', 'sending_mail');

function hide_wp_vers() {
	return '';
}

add_filter('the_generator','hide_wp_vers');
function filter_wp_title( $title, $separator ) {
	if ( is_feed() )
		return $title;
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'filter_wp_title', 10, 2 );

function editDashboard() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'editDashboard' );
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );

function my_custom_logo() {
   echo '
      <style type="text/css">
         #header-logo { background-image: url('.get_bloginfo('template_directory').'/img/palm.png) !important; }
      </style>
   ';
}

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/opportunities_logo.png) !important; }
    </style>';
}

function include_jquery() {
    echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>';
}

//hook the administrative header output
add_action('admin_head', 'my_custom_logo');
add_action('login_head', 'my_custom_login_logo');
add_action('admin_head', 'include_jquery');

function jquery_hide_send_password() {
    echo "<script type=\"text/javascript\">
$(document).ready(function() {
    $('label[for=\"send_password\"]').hide();
});
</script>";
}

add_action('admin_footer', 'jquery_hide_send_password');

function sending_mail(){
	if(isset($_POST['donorEmail']))
	{
		$to = "sukrupa.connect@sukrupa.org";
		$subject = "Donation";
		$message = $_POST['donorEmail'] . " has made a donation";	

		mail($to, $subject, $message);
		sleep(2);
	}
}

/*
   Description: Allows you to edit excerpts for Pages.
   Author: Peter Westwood
   Version: 0.02
   Author URI: http://blog.ftwr.co.uk/

 */
class pjw_page_excerpt
{
		function pjw_page_excerpt()
		{
			if ( function_exists('add_meta_box') ){
				add_meta_box( 'postexcerpt', __('Excerpt'), array(&$this, 'meta_box'), 'page'  );
			} else {
				add_action('dbx_page_advanced', array(&$this,'post_excerpt'));
			}
		}

		function meta_box()
		{
			global $post;
			?>
			<textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
			<p><?php _e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>'); ?></p>
			<?php
		}

		function post_excerpt()
		{
			global $post;
			?>
			<div class="dbx-box-wrapper">
			<fieldset id="postexcerpt" class="dbx-box">
			<div class="dbx-handle-wrapper">
			<h3 class="dbx-handle"><?php _e('Optional Excerpt') ?></h3>
			</div>
			<div class="dbx-content-wrapper">
			<div class="dbx-content"><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea></div>
			</div>
			</fieldset>
			</div>
			<?php
		}
}

/* Initialise outselves lambda stylee */
add_action('admin_menu', create_function('','global $pjw_page_excerpt; $pjw_page_excerpt = new pjw_page_excerpt;'));

?>