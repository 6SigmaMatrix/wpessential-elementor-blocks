<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\Builders\Fields\RawHtml;

use function defined;

class ProductCategories extends WCCategory
{
	/**
	 * Set widget keywords.
	 * Retrieve widget keywords.
	 *
	 * @return array Widget keywords.
	 * @access public
	 * @since  1.0.0
	 * @public
	 */
	public function set_keywords ()
	{
		return [ 'woocommerce-elements', 'shop', 'store', 'categories', 'product' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function register_controls ()
	{
		$this->start_controls_section(
			'section_1',
			[
				'label' => esc_html__( 'Shortcode', 'wpessential-elementor-blocks' )
			]
		);

		$opt = RawHtml::make( esc_html__( 'WooCommerce', 'wpessential-elementor-blocks' ) )
					  ->data( esc_html__( 'There are no option found. If you want more options, then please try the Pro version.', 'wpessential-elementor-blocks' ), )
					  ->toArray();
		$this->add_control( $opt[ 'id' ], $opt );

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function render ()
	{
		echo do_shortcode( '[product_categories]' );
	}
}
