<?php
function k_admin_styles(){
    k_queue_style("k-admin-styles", "/assets/css/admin.css");
}
add_action('admin_enqueue_scripts', 'k_admin_styles');