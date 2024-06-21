<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility;

use Elementor\Controls_Manager;

use function defined;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

final class Tabs
{
	public static function constructor ()
	{
		self::register_tabs();
	}

	/**
	 * Set Tabs list.
	 * Retrieve Tabs name.
	 *
	 * @return array Tabs name.
	 * @access static|protected
	 * @static | @protected
	 */

	protected static function register_tabs ()
	{
		$categories = apply_filters(
			'wpeeb/elementor/tabs',
			[
				'loop' => esc_html__( 'Loop', 'wpessential-elementor-blocks' )
			]
		);

		if ( ! empty( $categories ) )
		{
			foreach ( $categories as $key => $name )
			{
				Controls_Manager::add_tab( $key, $name );
			}
		}
	}
}
