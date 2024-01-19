<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Implement;

use function defined;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

interface Crontrols
{

	public static function constructor ();

	public static function html ( $settings, $value );

}
