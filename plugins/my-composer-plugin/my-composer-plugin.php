<?php
/*
Plugin Name: My Composer Plugin
Plugin URI: https://example.com/my-wordpress-plugin
Description: My awesome WordPress plugin.
Version: 1.0.0
Author: Kalleby Santos
License: MIT
*/

define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_FILE', __FILE__);

// Load the Composer autoload
require_once(PLUGIN_DIR . 'vendor/autoload.php');

use MyComposerPlugin\Database\Database;
use MyComposerPlugin\Setup;

register_activation_hook(__FILE__, function () {
error_log('activate');
  
});

/**
 * Fires once activated plugins have loaded.
 *
 */
add_action('plugins_loaded',function() : void {
 Database::connect(); 
});

// http://localhost:3333/wp-json/my-composer-plugin/v1
add_action('rest_api_init', function () {
  Setup::init_rest_controllers();
});
