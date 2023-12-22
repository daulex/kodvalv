<?php
// remove posts from admin menu
function remove_posts_menu() {
    
    global $pagenow;
    if ($pagenow === 'index.php') {
        
        wp_redirect(admin_url('edit.php?post_type=snippet'));
        die("301");
    }


    $banned_pages = [
        'edit.php',
        'edit.php?post_type=page',
        'post-new.php',
        'upload.php',
        'plugins.php',
        'tools.php',
        'themes.php',
        'options-general.php',
        'edit-comments.php',
        'index.php',
        'users.php'
    ];
    foreach ($banned_pages as $page) {
        remove_menu_page($page);
    }
    // block access to banned pages
    
    if (in_array($pagenow, $banned_pages)) {
        // if (isset($_GET['post_type']) && in_array($_GET['post_type'], ['page', 'snippet'])) {
        if (isset($_GET['post_type']) && in_array($_GET['post_type'], ['snippet'])) {
            return;
        }
        wp_die(
            __('403', 'kodvalv')
        );
    }

    // if $pagenow contains "options-"
    if (strpos($pagenow, 'options-') !== false) {
        wp_die(
            __('403', 'kodvalv')
        );
    }
}
add_action('admin_menu', 'remove_posts_menu');

remove_action('plugins_loaded', '_wp_customize_include', 10);
remove_action(
    'admin_enqueue_scripts',
    '_wp_customize_loader_settings',
    11
);
function override_load_customizer_action(){
    wp_die(
        __('403', 'kodvalv')
    );
}
add_action('load-customize.php', 'override_load_customizer_action');

// remove new button from admin bar
function remove_new_button_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-content');
}
add_action('wp_before_admin_bar_render', 'remove_new_button_admin_bar');

// remove update nag
function remove_update_nag() {
    remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_menu', 'remove_update_nag');

// remove howdy from admin bar
function remove_howdy_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('my-account');
}
add_action('wp_before_admin_bar_render', 'remove_howdy_admin_bar');


// disable dashboard link
function disable_dashboard_link() {
    global $submenu;
    unset($submenu['index.php'][0]);
}
add_action('admin_menu', 'disable_dashboard_link');