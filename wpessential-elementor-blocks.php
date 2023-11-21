<?php
/**
 * Plugin Name: WPEssential Elementor Blocks
 * Description: WPEssential created themes.
 * Plugin URI: https://wp.wpessential.org/plugins/wpessential/
 * Author: WPEssential
 * Version: 1.0.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-elementor-blocks
 * Requires PHP: 7.4
 * Requires at least: 5.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages/
 */

add_action( 'wpessential_loaded', function () {
	require_once plugin_dir_path( __FILE__ ) . 'constants.php';
	require_once WPEELBLOCK_DIR . 'vendor/autoload.php';
	\WPEssential\Plugins\ElementorBlocks\Loader::constructor();
}, 20 );
