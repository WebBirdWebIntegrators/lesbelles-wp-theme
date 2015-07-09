<?php

remove_action( 'welcome_panel', 'wp_welcome_panel' );

//Remove unwanted widgets from Dashboard
function webbird_remove_dashboard_widgets() {
	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['icl_dashboard_widget']);
}

if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'webbird_remove_dashboard_widgets' );
}

?>