<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use WPEssential\Plugins\Builders\Fields\Choose;
use WPEssential\Plugins\Builders\Fields\PopoverToggle;
use WPEssential\Plugins\Builders\Fields\Select;
use WPEssential\Plugins\Builders\Fields\Textarea;
use WPEssential\Plugins\Builders\Fields\Typography;
use WPEssential\Plugins\Builders\Fields\Url;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;


use WPEssential\Plugins\Builders\Fields\Switcher;
use WPEssential\Plugins\Builders\Fields\Wysiwyg;


class Accordions extends Base implements Shortcodes
{
	/**
	 * Set widget skings.
	 *
	 * @return string $skins_list name.
	 * @access public
	 * @public
	 */
	public $skins_list = [];

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
		return [ 'Accordions', 'title', 'text' ];
	}

	public function set_widget_icon()
	{
		return 'eicon-accordion';
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
		
		// For anchor styles
		$this->start_controls_section(
			'wpe_st_anchor_style',
			[
				'label' => esc_html__( 'Title', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->title_style();
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
		// this code is entered by basit , copied from text editor
		$settings = wpe_gen_attr( $this->get_settings_for_display() );
		echo do_shortcode( "[{$this->get_base_name()} {$settings}']" );
		
	}

	private function title_style(){
		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
	

	}
}


