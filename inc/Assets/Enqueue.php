<?php

namespace WPEssential\Plugins\ElementorBlocks\Assets;

class Enqueue
{

	public static function constructor ()
	{
		add_filter( 'wpe/elementor/editor/after/js', [ __CLASS__, 'elementor_editor_after_js' ], 20 );
	}

	public static function elementor_editor_after_js ( $list )
	{
		return wp_parse_args( [ 'wpessential-elementor-editor' ], $list );
	}

}
