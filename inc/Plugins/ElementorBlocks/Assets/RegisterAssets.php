<?php

namespace WPEssential\Plugins\ElementorBlocks\Assets;

class RegisterAssets
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/js', [ __CLASS__, 'register_script' ], 20 );
	}

	public static function register_script ( $list )
	{
		return wp_parse_args( [
			'wpessential-elementor-editor' => [
				'link' => WPEELBLOCK_URL . 'assets/js/wpessential-elementor-editor',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
			'wpessential-elementor-blocks' => [
				'link' => WPEELBLOCK_URL . 'assets/js/wpessential-elementor-blocks',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
		], $list );
	}
}
