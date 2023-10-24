<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Controls;

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
		/*$controls_manager->add_group_control( Posts::get_type(), new Posts() );
		$controls_manager->add_group_control( GroupQuery::get_type(), new GroupQuery() );
		$controls_manager->add_group_control( Related::get_type(), new Related() );
		*/
		$controls_manager->register( new Query() );
		$controls_manager->register( new ImageSelect() );
	}
}
