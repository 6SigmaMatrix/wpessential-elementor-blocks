<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\DynamicTag;

use Elementor\Core\DynamicTags\Base_Tag;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper\GetDynamicBase;

abstract class DynamicDataBase extends Base_Tag
{
	use GetDynamicBase;

	public function __construct ( array $data = [] )
	{
		parent::__construct( $data );
	}

	final public function get_content_type ()
	{
		return 'plain';
	}

	public function get_content ( array $options = [] )
	{
		return $this->get_value( $options );
	}
}
