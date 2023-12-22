<?php

// remove site health status from dashboard
function remove_site_health_status() {
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'remove_site_health_status' );

// remove site health check from admin menu
function remove_site_health_menu() {
    remove_submenu_page( 'tools.php', 'site-health.php' );
}
add_action( 'admin_menu', 'remove_site_health_menu' );

// remove WP logo from admin bar
function remove_wp_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'remove_wp_logo', 0);

// remove WP logo from login page
function remove_wp_logo_login() {
    echo '<style type="text/css">
        h1 a { display: none !important; }
    </style>';
}
add_action('login_head', 'remove_wp_logo_login');

// remove WP version from admin footer
function remove_wp_version_footer() {
    remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'remove_wp_version_footer' );

// remove WP version from RSS feed
function remove_wp_version_rss() {
    return '';
}
add_filter('the_generator', 'remove_wp_version_rss');

// remove thank you for creating with WP from dashboard
function remove_footer_admin () {
    return false;
}
add_filter('admin_footer_text', 'remove_footer_admin');

// remove at a glance from dashboard
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // right now
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // activity
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // comments
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // incoming links
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // plugins
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // quick press
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// remove wordpress events and news from dashboard
function remove_dashboard_news() {
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'remove_dashboard_news');

// remove screen options from dashboard
function remove_screen_options() {
    return false;
}
add_filter('screen_options_show_screen', 'remove_screen_options');

// disable updates link except for user adminkg
function disable_update_link_except_admin() {
    if (!current_user_can('update_core')) {
        remove_submenu_page('index.php', 'update-core.php');
    }
}
add_action('admin_menu', 'disable_update_link_except_admin');

