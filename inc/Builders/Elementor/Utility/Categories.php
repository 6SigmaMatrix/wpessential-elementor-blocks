<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility;

use function defined;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Categories
{
	public static function constructor ()
	{
		add_action( 'elementor/elements/categories_registered', [ __CLASS__, 'register_categories' ], 20 );
	}

	/**
	 * Register Categories list.
	 * Retrieve Categories name.
	 *
	 * @return array Categories name.
	 * @access static|protected
	 * @static | @public
	 */

	public static function register_categories ( $elements_manager )
	{
		$categories = apply_filters(
			'wpe/elementor/categories',
			[
				'wpessential'            => [
					'title'     => __( 'WPEssential', 'wpessential' ),
					'icon'      => 'wpe-icons wpe',
					'promotion' => [
						'url' => ''
					],
				],
				'wpessential-wc'         => [
					'title'     => __( 'WPEssential WC', 'wpessential' ),
					'icon'      => 'wpe-icons wpe',
					'promotion' => [
						'url' => ''
					],
				],
				'wpessential-wc-archive' => [
					'title'     => __( 'WPEssential WC Archive', 'wpessential' ),
					'icon'      => 'wpe-icons wpe',
					'promotion' => [
						'url' => ''
					],
				],
				'wpessential-form'       => [
					'title'     => __( 'WPEssential Form', 'wpessential' ),
					'icon'      => 'wpe-icons wpe',
					'promotion' => [
						'url' => ''
					],
				],
				'wpessential-slider'     => [
					'title'     => __( 'WPEssential Slider', 'wpessential' ),
					'icon'      => 'wpe-icons wpe',
					'promotion' => [
						'url' => ''
					],
				]
			]
		);
		$categories = wp_parse_args( $elements_manager->get_categories(), $categories );

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $key => $name ) {
				$elements_manager->add_category( $key, $name );
			}
		}
	}
}
