<?php

namespace WPEssential\Plugins\ElementorBlocks;

use WPEssential\Plugins\ElementorBlocks\Assets\AssetsInit;
use WPEssential\Plugins\ElementorBlocks\Builders\BuildersInit;

final class Loader
{
	public static function init ()
	{
		load_plugin_textdomain( 'wpessential-elementor-blocks', false, WPEELBLOCK_DIR . '/language' );
		BuildersInit::constructor();
	}

	public static function constructor ()
	{

		self::load_files();
		self::start();
		add_action( 'wpessential_init', [ __CLASS__, 'init' ] );
	}

	public static function load_files ()
	{
		require_once WPEELBLOCK_DIR . '/inc/Functions/general.php';
	}

	public static function start ()
	{
		AssetsInit::constructor();
	}
}
