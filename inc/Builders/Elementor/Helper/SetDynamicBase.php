<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper;


trait SetDynamicBase
{

	public function set_name ()
	{
		return 'WPEssential' . substr( strrchr( get_class( $this ), "\\" ), 1 );
	}

	public function set_title ()
	{
		return sprintf( __( '%s', 'wpessential-pro' ), str_replace( 'WPEssential', '', preg_replace( '/(?<!\ )[A-Z]/', ' $0', substr( strrchr( get_class( $this ), "\\" ), 1 ) ) ) );
	}
}
