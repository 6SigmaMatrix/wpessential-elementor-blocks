<?php

namespace WPEssential\Plugins\ElementorBlocks\Assets;

class RegisterAssets
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/js', [ __CLASS__, 'register_script' ], 20 );
		add_filter( 'wpe/register/css', [ __CLASS__, 'register_css' ], 20 );
	}

	public static function register_script ( $list )
	{
		return wp_parse_args( [
			'wpessential-elementor-editor' => [
				'link' => WPEELB_URL . 'assets/js/wpessential-elementor-editor',
				'dep'  => false,
				'ver'  => WPEELB_VERSION,
			],
			'wpessential-elementor-blocks' => [
				'link' => WPEELB_URL . 'assets/js/wpessential-elementor-blocks',
				'dep'  => false,
				'ver'  => WPEELB_VERSION,
			]
		], $list );
	}

	public static function register_css ( $list )
	{
		return wp_parse_args( [
			'wpessential-elementor-blocks-imageselect' => [
				'link' => WPEELB_URL . 'assets/css/controls/imageselect.css',
				'dep'  => false,
				'ver'  => WPEELB_VERSION,
			],
		], $list );
	}
}
