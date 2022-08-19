<?php
/**
 * Plugin Name: BETA - WSUWP Newsletter Generator
 * Plugin URI: https://github.com/wsuwebteam/wsuwp-plugin-newsletter
 * Description: Describe the plugin
 * Version: 0.0.3
 * Requires PHP: 7.3
 * Author: Washington State University, Danial Bleile
 * Author URI: https://web.wsu.edu/
 * Text Domain: wsuwp-plugin-newsletter
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WSUWPPLUGINNEWSLETTERVERSION', '0.0.3' );

// Initiate plugin
require_once __DIR__ . '/includes/plugin.php';

