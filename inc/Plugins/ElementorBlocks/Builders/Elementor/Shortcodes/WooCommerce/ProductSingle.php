<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\Builders\Fields\Text;

use function defined;

class ProductSingle extends WCCategory
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
		return [ 'productsingle', 'woocommerce product single', 'woocommerce' ];
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

		$post_opt = Text::make( esc_html__( 'Product ID', 'wpessential-elementor-blocks' ) )
						->desc( esc_html__( 'Enter the product id to display product on frontend.', 'wpessential-elementor-blocks' ) )
						->toArray();
		$this->add_control( $post_opt[ 'id' ], $post_opt );

		$this->end_controls_section();

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
		echo do_shortcode( '[product_page id="' . $settings->get( 'wpe_st_product_id' ) . '"]' );
	}
}
