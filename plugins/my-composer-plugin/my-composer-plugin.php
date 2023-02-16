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

use MyComposerPlugin\Setup;

add_action('rest_api_init', function () {
  Setup::init_rest_controllers();
});
