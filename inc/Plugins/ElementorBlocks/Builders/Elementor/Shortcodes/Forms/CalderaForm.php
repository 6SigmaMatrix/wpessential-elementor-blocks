<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\Builders\Fields\Select;

use function defined;

class CalderaForm extends FormCategory
{
	/**
	 * Set widget icon.
	 * Retrieve widget icon.
	 *
	 * @return string Widget icon.
	 * @since  1.0.0
	 * @access public
	 * @public
	 */
	public function set_widget_icon ()
	{
		return 'eicon-form-horizontal';
	}

	/**
	 * Set widget keywords.
	 * Retrieve widget keywords.
	 *
	 * @return array Widget icon.
	 * @access public
	 * @since  1.0.0
	 * @public
	 */
	public function set_keywords ()
	{
		return [ 'contact form', 'contact', 'form', 'caldera form' ];
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

		$opt = Select::make( esc_html__( 'Forms List', 'wpessential-elementor-blocks' ) )
					 ->options( wpe_caldera_table_query() )
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
		echo do_shortcode( '[caldera_form id="' . $settings->get( 'wpe_st_forms_list' ) . '"]' );
	}
}
