<?php
/*
Plugin Name: Clean Life Widgets
Description: Widgets for the theme Clean Life.
Version: 1.0.0
Text Domain: clean-life-widgets
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /languages/
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

function register_clean_life_widget() {
	register_widget( 'Recent_Posts' );
	register_widget( 'Tag_Cloud' );
	register_widget( 'Widget_Media_Image' );
	register_widget( 'Widget_Custom_HTML' );
	register_widget( 'Widget_Text' );
	//unregister_widget
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Pages');
}
add_action( 'widgets_init', 'register_clean_life_widget' );
require_once 'widgets/class-wp-widget-recent-posts.php';
require_once 'widgets/class-wp-widget-tag-cloud.php';
function clean_life_tag_cloud($args){
	$args['smallest'] = 0.75;
	$args['largest'] = 0.75;
	$args['unit'] = 'rem';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'clean_life_tag_cloud');
function tag_cloud_link($tags_data){
	$filter_tags_data = array();
	foreach ($tags_data as $tag_data) {
		$tag_data['class'] = $tag_data['class'] . ' tags-list__link';
		$filter_tags_data[] = $tag_data;
	}
	return $filter_tags_data;
}
add_filter( 'wp_generate_tag_cloud_data', 'tag_cloud_link' );
require_once 'widgets/class-wp-widget-media.php';
require_once 'widgets/class-wp-widget-media-image.php';
require_once 'widgets/class-wp-widget-text.php';
require_once 'widgets/class-wp-widget-custom-html.php';