<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Controls;

use function defined;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class ControlsInit
{
	public static function constructor ()
	{
		add_action( 'elementor/controls/register', [ __CLASS__, 'register_controls' ] );
	}

	public static function register_controls ( $controls_manager )
	{
		$controls_manager->register( new ImageSelect() );
	}
}
