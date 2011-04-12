<?php 

/*
Plugin Name: Sukrupa Volunteer Events Calendar
Plugin URI: 
Description: Plugin for displaying Sukrupa Volunteer Events calendar on pages / posts. To use it just add '&lt;!-- volunteer_calendar --&gt;' to the html content of the post.
Author: ThoughtWorks
Version: 1.0
Author URI: http://www.thoughtworks.com
*/

define('VOLUNTEER_CALENDAR_HTML', '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=500&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=events%40sukrupa.org&amp;color=%23182C57&amp;src=en.indian%23holiday%40group.v.calendar.google.com&amp;color=%23691426&amp;ctz=Asia%2FCalcutta" style=" border-width:0 " width="675" height="500" frameborder="0" scrolling="no"></iframe>');

add_filter('the_content', 'check_content');

function check_content($content) {
    if (strpos($content, '<!-- volunteer_calendar -->') !== FALSE) {
    	$content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
		$content = str_replace('<!-- volunteer_calendar -->', VOLUNTEER_CALENDAR_HTML, $content);
	}
	
	return $content;
}

?>
