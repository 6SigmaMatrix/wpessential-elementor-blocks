<?php
/**
 * Plugin Name: WPEssential Elementor Blocks
 * Description: WPEssential created themes.
 * Plugin URI: https://wp.wpessential.org/plugins/wpessential/
 * Author: WPEssential
 * Version: 1.0.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-pro
 * Requires PHP: 8.0
 * Requires at least: 5.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages/
 */

require_once plugin_dir_path( __FILE__ ) . 'constants.php';
require WPEELBLOCK_DIR . 'vendor/autoload.php';

/**
 * Fire on 'wpessential_loaded'
 *
 * @since  1.0.0
 */
function wpe_elementor_blocks_plugin_loaded_action ()
{
	\WPEssential\Plugins\ElementorBlocks\Loader::constructor();
}

add_action( 'wpessential_loaded', 'wpe_elementor_blocks_plugin_loaded_action', 20 );
