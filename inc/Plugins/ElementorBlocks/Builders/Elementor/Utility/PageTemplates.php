<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility;

use function defined;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

final class PageTemplates
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/page_attributes/templates', [ __CLASS__, 'add_template' ] );
		add_filter( 'wpe/register/page_attributes/templates/view', [ __CLASS__, 'view_template' ] );
	}

	public static function add_template ( $list )
	{
		return wp_parse_args( [
			'wpe-elementor.php' => 'WPE Elementor',
		], $list );
	}

	public static function view_template ( $list )
	{
		return wp_parse_args( [
			wpe_template_load( 'templates/editor-templates/' )
		], $list );
	}
}
