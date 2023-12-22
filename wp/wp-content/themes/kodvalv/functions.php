<?php
// Clean up WP
require_once("inc/cleanup/disable-comments.php");
require_once("inc/cleanup/clean-up-dashboard.php");
require_once("inc/cleanup/clean-up-admin-menu.php");

// Add custom post types
require_once("inc/post-types/snippets.php");

// Add custom meta boxes
require_once("inc/post-types/meta-box/code.php");

// Add admin styles
require_once("inc/admin/admin-styles.php");

// Add helper functions
require_once("inc/helper-functions.php");