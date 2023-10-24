<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\DynamicTag;

use Elementor\Core\DynamicTags\Tag;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper\GetDynamicBase;

abstract class DynamicBase extends Tag
{
	use GetDynamicBase;

	public function __construct ( array $data = [] )
	{
		parent::__construct( $data );
	}
}
