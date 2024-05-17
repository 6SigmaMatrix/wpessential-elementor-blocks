<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\DynamicTag;

use function defined;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class DynamicTagInit
{
	public static function constructor ()
	{
		add_action( 'elementor/dynamic_tags/register', [ __CLASS__, 'register_tags' ] );
	}

	public static function register_tags ( $tags )
	{
		$groups = apply_filters( 'wpe/elementor/groups', [] );
		if ( ! empty( $groups ) ) {
			foreach ( $groups as $k => $group ) {
				$tags->register_group( $k, $group );
			}
		}

		$dynamic_tags = apply_filters( 'wpe/elementor/dynamic/tags', [] );
		if ( ! empty( $dynamic_tags ) ) {
			foreach ( $dynamic_tags as $tag ) {
				$tags->register( new $tag() );
			}
		}
	}
}
