<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders;

use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\ElementorInit;

final class BuildersInit
{
	public static function constructor ()
	{
		self::builders();
	}

	private static function builders ()
	{
		if ( did_action( 'elementor/loaded' ) ) {
			ElementorInit::constructor();
		}
	}
}
