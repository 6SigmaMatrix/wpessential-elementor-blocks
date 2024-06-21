<?php

namespace WPEssential\Plugins;

use WPEssential\Plugins\ElementorBlocks\Assets\AssetsInit;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\ElementorInit;

final class ElementorBlocksInit
{
	public static function init ()
	{
		load_plugin_textdomain( 'wpessential-elementor-blocks', false, WPEELB_DIR . '/language' );
		add_filter( 'wpe/editors/init', [ __CLASS__, 'builders' ] );
	}

	public static function builders ( $editor_list )
	{
		if ( did_action( 'elementor/loaded' ) )
		{
			$editor_list = wp_parse_args( [
				ElementorInit::class => 'constructor'
			], $editor_list );
		}

		return $editor_list;
	}

	public static function constructor ()
	{
		do_action( 'wpessential_el_blocks_loaded' );
		self::load_files();
		self::start();
		add_action( 'wpessential_init', [ __CLASS__, 'init' ], 100 );
	}

	public static function load_files ()
	{
		require_once WPEELB_DIR . '/inc/Plugins/ElementorBlocks/Functions/general.php';
	}

	public static function start ()
	{
		AssetsInit::constructor();
	}
}
