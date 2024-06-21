<?php
if ( ! \defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

/**
 * Plugin Version
 *
 * @since  1.0.0
 */
if ( ! defined( 'WPEELB_VERSION' ) )
{
	define( 'WPEELB_VERSION', '1.0.0' );
}

/**
 * WPEssential Plugin dir
 *
 * @since  1.0.0
 */
if ( ! defined( 'WPEELB_DIR' ) )
{
	define( 'WPEELB_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * WPEssential Plugin url
 *
 * @since  1.0.0
 */
if ( ! defined( 'WPEELB_URL' ) )
{
	define( 'WPEELB_URL', plugin_dir_url( __FILE__ ) );
}
