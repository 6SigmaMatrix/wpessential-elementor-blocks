<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Controls;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Control_Select2;

class Query extends Control_Select2
{

	/**
	 * Get imageselect control type.
	 *
	 * Retrieve the control type, in this case `imageselect`.
	 *
	 * @return string Control type.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_type ()
	{
		return 'query';
	}

	/**
	 * Get imageselect control default settings.
	 *
	 * Retrieve the default settings of the imageselect control. Used to return the
	 * default settings while initializing the imageselect control.
	 *
	 * @return array Control default settings.
	 * @since  1.8.0
	 * @access protected
	 *
	 */
	protected function get_default_settings ()
	{
		return wp_parse_args( [ 'query' => '', parent::get_default_settings() ] );
	}
}
