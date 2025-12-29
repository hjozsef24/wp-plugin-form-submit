<?php

/**
 * Plugin Name:       Form Submits by HJ
 * Description:       Get stored form submits from the database.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hajdu József
 * Author URI:        https://hajdujozsef.hu
 * Text Domain:       hajdujozsef
 */

define('FORM_SUBMITS_PATH', plugin_dir_path(__FILE__));
define('SUBMITS_DATABASE_TABLE', 'contact_form_submits');

require_once(FORM_SUBMITS_PATH . "/includes/setup-database.php");
require_once(FORM_SUBMITS_PATH . "/includes/setup-admin-page.php");

/*
* Enqueue style
*/
function load_plugin_wp_admin_style($hook)
{
    if ($hook != 'toplevel_page_form-submits') {
        return;
    }
    wp_enqueue_style('custom_global_style', plugins_url('assets/css/global.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'load_plugin_wp_admin_style');
