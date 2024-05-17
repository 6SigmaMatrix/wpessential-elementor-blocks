<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Implement;

interface Dynamic
{
	public function get_group ();

	public function get_categories ();

	public function register_controls ();
}
