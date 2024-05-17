<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper;

trait GetDynamicBase
{
	use SetDynamicBase;

	public function get_name ()
	{
		return $this->set_name();
	}

	public function get_title ()
	{
		return $this->set_title();
	}

	/**
	 * Init Dynamic Tags
	 * Include dynamic tag files and register them
	 *
	 * @access static
	 *
	 * @param $tags
	 */
	public function get_dynamic ( $tags )
	{
		$calss = get_class( $this );
		$tags->register( new $calss() );
	}
}
