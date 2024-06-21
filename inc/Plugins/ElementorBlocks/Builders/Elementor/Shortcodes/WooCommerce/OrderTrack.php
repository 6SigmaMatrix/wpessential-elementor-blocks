<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\Builders\Fields\RawHtml;

use function defined;

class OrderTrack extends WCCategory
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
		return [ 'order track', 'woocommerce order track', 'woocommerce' ];
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
					  ->data( esc_html__( 'There is no option found.', 'wpessential-elementor-blocks' ), )
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
		$settings = $this->get_settings_for_display();
		/*$settings[ 'wpe_st_post_info_data_list' ] = urlencode( json_encode( $settings[ 'wpe_st_post_info_data_list' ] ) );
		$settings[ 'wpe_st_post_button_icon' ]    = urlencode( json_encode( $settings[ 'wpe_st_post_button_icon' ] ) );*/
		//wpe_error( $settings );
		$settings = wpe_collect( $settings );
		echo do_shortcode( '[woocommerce_order_tracking]' );
	}
}
