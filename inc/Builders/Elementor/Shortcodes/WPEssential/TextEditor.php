<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use WPEssential\Plugins\Builders\Fields\Switcher;
use WPEssential\Plugins\Builders\Fields\Wysiwyg;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Helper\TextEditor as Text;
use function defined;

class TextEditor extends Base implements Shortcodes
{
	use Text; 
	
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
		return [ 'text editor', 'title', 'text' ];
	}

	public function set_widget_icon ()
	{
		return 'eicon-text-area';
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
		$text = new TextEditor();

		$this->start_controls_section(
			'wpe_st_content',
			[
				'label' => esc_html__( 'Content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$opt = Wysiwyg::make( __( 'Text Editor', 'wpessential-elementor-blocks' ) );
		$opt->label_block( true );
		$opt->default( '<p>' . __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>' );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Switcher::make( __( 'Drop Cap', 'wpessential-elementor-blocks' ) );
		$opt->label_off( esc_html__( 'Off', 'elementor' ) );
		$opt->label_on( esc_html__( 'On', 'elementor' ) );
		$opt->prefix_class( 'wpe-drop-cap-' );
		$this->add_control( $opt->key, $opt->toArray() );

		$text_columns       = range( 1, 10 );
		$text_columns       = array_combine( $text_columns, $text_columns );
		$text_columns[ '' ] = esc_html__( 'Default', 'elementor' );

		$this->add_responsive_control(
			'text_columns',
			[
				'label'     => esc_html__( 'Columns', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'separator' => 'before',
				'options'   => $text_columns,
				'selectors' => [
					'{{WRAPPER}}' => 'columns: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'column_gap',
			[
				'label'      => esc_html__( 'Columns Gap', 'elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 100,
					],
					'%'  => [
						'max'  => 10,
						'step' => 0.1,
					],
					'vw' => [
						'max'  => 10,
						'step' => 0.1,
					],
					'em' => [
						'max'  => 10,
						'step' => 0.1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}}' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
		$text->anchor_style();
		$text->paragraph_style();
		$text->button_style();
		$text->heading_1_style();
		$text->heading_2_style();
		$text->heading_3_style();
		$text->heading_4_style();
		$text->heading_5_style();
		$text->heading_6_style();
		$text->pre_tag_style();
		$text->data_list_style();
		$text->order_list_style();
		$text->unorder_list_style();
		$text->address_style();
		$text->fig_caption_style();
		$text->sub_script_style();
		$text->super_script_style();
		$text->audio_style();
		$text->video_style();
		$text->block_qoute_style();
		$text->hr_style();
		$text->table_style
		();
		

	
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
		$settings = wpe_gen_attr( $this->get_settings_for_display() );
		echo do_shortcode( "[{$this->get_base_name()} {$settings}']" );
	}



	}







