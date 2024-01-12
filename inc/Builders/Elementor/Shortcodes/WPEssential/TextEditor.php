<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;


if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use WPEssential\Plugins\Builders\Fields\Switcher;
use WPEssential\Plugins\Builders\Fields\Wysiwyg;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;

class TextEditor extends Base implements Shortcodes
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
		// For anchor styles
		$this->start_controls_section(
			'wpe_st_anchor_style',
			[
				'label' => esc_html__( 'Anchor', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->anchor_style();


		$this->end_controls_section();
		// For Paragraph styles
		$this->start_controls_section(
			'wpe_st_paragraph_style',
			[
				'label' => esc_html__( 'Paragraph', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->paragraph_style();


		$this->end_controls_section();

		// For hr styles
		$this->start_controls_section(
			'wpe_st_button_style',
			[
				'label' => esc_html__( 'Button', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->button_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_heading_1_style',
			[
				'label' => esc_html__( 'Heading 1', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_1_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_heading_2_style',
			[
				'label' => esc_html__( 'Heading 2', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_2_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_heading_3_style',
			[
				'label' => esc_html__( 'Heading 3', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_3_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_heading_4_style',
			[
				'label' => esc_html__( 'Heading 4', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_4_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_heading_5_style',
			[
				'label' => esc_html__( 'Heading 5', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_5_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_heading_6_style',
			[
				'label' => esc_html__( 'Heading 6', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->heading_6_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_pre_tag_style',
			[
				'label' => esc_html__( 'Pre tag', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->pre_tag_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_figure_style',
			[
				'label' => esc_html__( 'Figure', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->figure_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_data_list_style',
			[
				'label' => esc_html__( 'Data list', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->data_list_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_table_style',
			[
				'label' => esc_html__( 'Table', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		//$this->table_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_order_list_style',
			[
				'label' => esc_html__( 'Order List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->order_list_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_unorder_list_style',
			[
				'label' => esc_html__( 'Unorder List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->unorder_list_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_image_style',
			[
				'label' => esc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->image_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_address_style',
			[
				'label' => esc_html__( 'Address', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->address_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_fig_caption_style',
			[
				'label' => esc_html__( 'Fig caption', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->fig_caption_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_sub_script_style',
			[
				'label' => esc_html__( 'Sub script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->sub_script_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_super_script_style',
			[
				'label' => esc_html__( 'Super script', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->super_script_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_audio_style',
			[
				'label' => esc_html__( 'Audio', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->audio_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_video_style',
			[
				'label' => esc_html__( 'Video', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->video_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_iframe_style',
			[
				'label' => esc_html__( 'iframe', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->iframe_style();
		$this->end_controls_section();
		


		$this->start_controls_section(
			'wpe_st_block_qoute_style',
			[
				'label' => esc_html__( 'Block Qoute', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->block_qoute_style();
		$this->end_controls_section();


		$this->start_controls_section(
			'wpe_st_hr_style',
			[
				'label' => esc_html__( 'hr', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->hr_style();
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
		$settings = wpe_gen_attr( $this->get_settings_for_display() );
		echo do_shortcode( "[{$this->get_base_name()} {$settings}']" );
	}








	private function anchor_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_anchor_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_anchor_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_anchor_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);

		$this->add_responsive_control(
			'wpe_st_anchor_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_control(
			'wpe_st_anchor_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_anchor_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);

		$this->add_control(
			'wpe_st_anchor_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_anchor_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_anchor_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);
		$this->add_control(
			'wpe_st_anchor_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor a' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_anchor_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_anchor_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_anchor_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_anchor_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_anchor_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_anchor_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);
		$this->add_control(
			'wpe_st_anchor_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_anchor_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor a' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_anchor_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_anchor_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor a',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function paragraph_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_paragraph_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_paragraph_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_paragraph_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);

		$this->add_responsive_control(
			'wpe_st_paragraph_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_control(
			'wpe_st_paragraph_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_paragraph_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);

		$this->add_control(
			'wpe_st_paragraph_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_paragraph_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_paragraph_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor p' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_paragraph_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_paragraph_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_paragraph_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_paragraph_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_paragraph_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_paragraph_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor p' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_paragraph_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_paragraph_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor p',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function button_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_button_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_button_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);

		$this->add_responsive_control(
			'wpe_st_button_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_button_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_button_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);

		$this->add_control(
			'wpe_st_button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_button_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_button_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);
		$this->add_control(
			'wpe_st_button_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor button' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_button_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_button_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_button_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_button_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);
		$this->add_control(
			'wpe_st_button_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_button_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor button' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_button_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_button_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor button',
			]
		);

	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_1_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_1_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_1_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_1_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_1_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_1_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_1_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);

		$this->add_control(
			'wpe_st_heading_1_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_1_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_1_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);
		$this->add_control(
			'wpe_st_heading_1_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h1' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_1_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_1_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_1_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_1_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_1_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_1_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);
		$this->add_control(
			'wpe_st_heading_1_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_1_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h1' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_1_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_1_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h1',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_2_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_2_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_2_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_2_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_2_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_2_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_2_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);

		$this->add_control(
			'wpe_st_heading_2_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_2_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_2_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);
		$this->add_control(
			'wpe_st_heading_2_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h2' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_2_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_2_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_2_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_2_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_2_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_2_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);
		$this->add_control(
			'wpe_st_heading_2_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_2_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor h2' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_2_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_2_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h2',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_3_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_3_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_3_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_3_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_3_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_3_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_3_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);

		$this->add_control(
			'wpe_st_heading_3_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_3_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_3_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);
		$this->add_control(
			'wpe_st_heading_3_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h3' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_3_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_3_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_3_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_3_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_3_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_3_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);
		$this->add_control(
			'wpe_st_heading_3_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_3_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h3' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_3_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_3_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h3',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_4_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_4_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_4_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_4_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_4_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_4_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_4_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);

		$this->add_control(
			'wpe_st_heading_4_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_4_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_4_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);
		$this->add_control(
			'wpe_st_heading_4_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h4' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_4_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_4_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_4_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_4_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_4_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_4_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);
		$this->add_control(
			'wpe_st_heading_4_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_4_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h4' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_4_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_4_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h4',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_5_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_5_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_5_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_5_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_5_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_5_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_5_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);

		$this->add_control(
			'wpe_st_heading_5_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_5_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_5_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);
		$this->add_control(
			'wpe_st_heading_5_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h5' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_5_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_5_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_5_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_5_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_5_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_5_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);
		$this->add_control(
			'wpe_st_heading_5_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_5_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h5' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_5_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h5' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_5_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h5',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function heading_6_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_heading_6_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_heading_6_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_6_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_6_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_6_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_heading_6_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);

		$this->add_control(
			'wpe_st_heading_6_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_6_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_6_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);
		$this->add_control(
			'wpe_st_heading_6_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor h6' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_heading_6_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_heading_6_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_heading_6_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_heading_6_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_heading_6_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_heading_6_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);
		$this->add_control(
			'wpe_st_heading_6_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_heading_6_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor h6' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_heading_6_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor h6' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_heading_6_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor h6',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function pre_tag_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_pre_tag_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_pre_tag_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);

		$this->add_responsive_control(
			'wpe_st_pre_tag_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_pre_tag_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);

		$this->add_control(
			'wpe_st_pre_tag_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);
		$this->add_control(
			'wpe_st_pre_tag_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor pre' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_pre_tag_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_pre_tag_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_pre_tag_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_pre_tag_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);
		$this->add_control(
			'wpe_st_pre_tag_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_pre_tag_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor pre' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_pre_tag_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor pre' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_pre_tag_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor pre',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function figure_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_figure_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_figure_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_figure_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);

		$this->add_responsive_control(
			'wpe_st_figure_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_figure_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_figure_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);

		$this->add_control(
			'wpe_st_figure_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_figure_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_figure_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);
		$this->add_control(
			'wpe_st_figure_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor figure' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_figure_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_figure_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_figure_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_figure_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_figure_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_figure_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);
		$this->add_control(
			'wpe_st_figure_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_figure_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor figure' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_figure_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor figure' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_figure_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor figure',
			]
		);
	


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function data_list_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_data_list_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_data_list_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_data_list_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);

		$this->add_responsive_control(
			'wpe_st_data_list_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_control(
			'wpe_st_data_list_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_data_list_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);

		$this->add_control(
			'wpe_st_data_list_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_data_list_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_data_list_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);
		$this->add_control(
			'wpe_st_data_list_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor dl' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_data_list_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_data_list_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_data_list_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_data_list_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_data_list_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_data_list_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);
		$this->add_control(
			'wpe_st_data_list_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_data_list_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor dl' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_data_list_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor dl' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_data_list_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor dl',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function block_qoute_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_block_qoute_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_block_qoute_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);

		$this->add_responsive_control(
			'wpe_st_block_qoute_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor block-qoute' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_control(
			'wpe_st_block_qoute_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor block-qoute' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);

		$this->add_control(
			'wpe_st_block_qoute_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor block-qoute' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor block-qoute' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_block_qoute_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor block-qoute' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_block_qoute_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_block_qoute_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor block-qoute' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor block-qoute' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor block-qoute',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}
	
	 private function table_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_table_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_table_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_table_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);

		$this->add_responsive_control(
			'wpe_st_table_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_table_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor table' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_table_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);

		$this->add_control(
			'wpe_st_table_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor table' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_table_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_table_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);
		$this->add_control(
			'wpe_st_table_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor table' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_table_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_table_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_table_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_table_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor table' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_table_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_table_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);
		$this->add_control(
			'wpe_st_table_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_table_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor table' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_table_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_table_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor table',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function order_list_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_order_list_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_order_list_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_order_list_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);

		$this->add_responsive_control(
			'wpe_st_order_list_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_order_list_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_order_list_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);

		$this->add_control(
			'wpe_st_order_list_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_order_list_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_order_list_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);
		$this->add_control(
			'wpe_st_order_list_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor ol' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_order_list_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_order_list_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_order_list_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_order_list_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_order_list_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_order_list_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);
		$this->add_control(
			'wpe_st_order_list_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_order_list_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor ol' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_order_list_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ol' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_order_list_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor ol',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}
	private function unorder_list_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_unorder_list_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_unorder_list_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);

		$this->add_responsive_control(
			'wpe_st_unorder_list_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_unorder_list_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);

		$this->add_control(
			'wpe_st_unorder_list_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);
		$this->add_control(
			'wpe_st_unorder_list_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor ul' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_unorder_list_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_unorder_list_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_unorder_list_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_unorder_list_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);
		$this->add_control(
			'wpe_st_unorder_list_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_unorder_list_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor ul' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_unorder_list_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_unorder_list_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor ul',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function image_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_image_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_image_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_image_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_image_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_image_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_control(
			'wpe_st_image_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_image_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_image_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_control(
			'wpe_st_image_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor img' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_image_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_image_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_image_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_image_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_image_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_control(
			'wpe_st_image_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_image_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor img' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_image_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_image_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function address_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_address_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_address_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_address_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);

		$this->add_responsive_control(
			'wpe_st_address_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor address' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_address_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor address' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_address_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);

		$this->add_control(
			'wpe_st_address_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor address' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_address_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);


		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_address_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);
		$this->add_control(
			'wpe_st_address_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor address' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_address_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor address' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_address_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_address_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_address_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor address' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_address_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_address_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);
		$this->add_control(
			'wpe_st_address_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_address_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor address' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_address_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor address' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_address_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor address',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}


	private function fig_caption_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_fig_caption_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_fig_caption_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);

		$this->add_responsive_control(
			'wpe_st_fig_caption_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_fig_caption_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);

		$this->add_control(
			'wpe_st_fig_caption_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);


		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);
		$this->add_control(
			'wpe_st_fig_caption_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor fig_caption' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_fig_caption_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_fig_caption_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_fig_caption_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_fig_caption_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);
		$this->add_control(
			'wpe_st_fig_caption_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_fig_caption_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor fig_caption' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_fig_caption_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor fig_caption' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_fig_caption_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor fig_caption',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function sub_script_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_sub_script_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_sub_script_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_sub_script_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);

		$this->add_responsive_control(
			'wpe_st_sub_script_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_sub_script_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_sub_script_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);

		$this->add_control(
			'wpe_st_sub_script_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_sub_script_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);


		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_sub_script_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);
		$this->add_control(
			'wpe_st_sub_script_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor sub' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_sub_script_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_sub_script_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_sub_script_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_sub_script_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_sub_script_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_sub_script_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);
		$this->add_control(
			'wpe_st_sub_script_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_sub_script_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor sub' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_sub_script_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sub' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_sub_script_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor sub',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function super_script_style(){
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_super_script_style' );
		// this is the start of normal tab 
		$this->start_controls_tab(
			'tab_super_script_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_super_script_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);

		$this->add_responsive_control(
			'wpe_st_super_script_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_super_script_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_super_script_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);

		$this->add_control(
			'wpe_st_super_script_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_super_script_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);


		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_super_script_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);
		$this->add_control(
			'wpe_st_super_script_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor sup' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_super_script_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_super_script_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_super_script_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_super_script_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_super_script_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_super_script_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);
		$this->add_control(
			'wpe_st_super_script_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_super_script_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor sup' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_super_script_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor sup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_super_script_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor sup',
			]
		);
	


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function audio_style ()
	{
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_audio_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor audio',
			]
		);

		$this->add_responsive_control(
			'wpe_st_audio_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor audio' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_audio_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor audio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_audio_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor audio',
			]
		);

		$this->add_control(
			'wpe_st_audio_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor audio' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_audio_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor audio',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_audio_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor audio',
			]
		);
		$this->add_control(
			'wpe_st_audio_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor audio' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_audio_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor audio' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_audio_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);


		
		


	}

	private function video_style ()
	{
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_video_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor video',
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor video' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_video_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor video' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_video_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor video',
			]
		);

		$this->add_control(
			'wpe_st_video_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor video' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_video_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor video',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_video_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor video',
			]
		);
		$this->add_control(
			'wpe_st_video_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor video' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_video_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

	
		
		


	}

	private function iframe_style ()
	{
		
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_iframe_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor iframe',
			]
		);

		$this->add_responsive_control(
			'wpe_st_iframe_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor iframe' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_iframe_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor iframe' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_iframe_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor iframe',
			]
		);

		$this->add_control(
			'wpe_st_iframe_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor iframe' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_iframe_background',
				'types'    => [ 'classic', 'gradient', 'iframe' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor iframe',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_iframe_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor iframe',
			]
		);
		$this->add_control(
			'wpe_st_iframe_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor iframe' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_iframe_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor iframe' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_iframe_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		
		
		


	}

	private function hr_style ()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs( 'tabs_hr_style' );
		// for normal controls 
		$this->start_controls_tab(
			'tab_hr_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_hr_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);

		$this->add_responsive_control(
			'wpe_st_hr_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_hr_margin',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min'  => 10,
						'max'  => 50,
						'step' => 5,
					],
					'em' => [
						'min'  => 1,
						'max'  => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'      => 2,
					'right'    => 0,
					'bottom'   => 2,
					'left'     => 0,
					'unit'     => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_hr_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);

		$this->add_control(
			'wpe_st_hr_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_hr_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_hr_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);
		$this->add_control(
			'wpe_st_hr_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor hr' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_hr_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_hr_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_hr_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_hr_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_hr_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_hr_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);
		$this->add_control(
			'wpe_st_hr_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_hr_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor hr' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_hr_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor hr' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_hr_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor hr',
			]
		);

		


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}








	// private function abc_style ()
	// {
	// 	// this will set condtion for normal or hover
	// 	$this->start_controls_tabs( 'tabs_abc_style' );
	// 	// for normal controls 
	// 	$this->start_controls_tab(
	// 		'tab_abc_normal',
	// 		[
	// 			'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
	// 		]
	// 	);
	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Typography::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_typography',
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);

	// 	$this->add_responsive_control(
	// 		'wpe_st_abc_text_padding',
	// 		[
	// 			'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
	// 			'type'       => Controls_Manager::DIMENSIONS,
	// 			'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
	// 			'selectors'  => [
	// 				'{{WRAPPER}} .wpe-text-editor test' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	// 			],
	// 			'separator'  => 'before',

	// 		]
	// 	);
	// 	$this->add_control(
	// 		'wpe_st_abc_margin',
	// 		[
	// 			'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
	// 			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
	// 			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
	// 			'range'      => [
	// 				'px' => [
	// 					'min'  => 10,
	// 					'max'  => 50,
	// 					'step' => 5,
	// 				],
	// 				'em' => [
	// 					'min'  => 1,
	// 					'max'  => 5,
	// 					'step' => 0.5,
	// 				],
	// 			],
	// 			'default'    => [
	// 				'top'      => 2,
	// 				'right'    => 0,
	// 				'bottom'   => 2,
	// 				'left'     => 0,
	// 				'unit'     => 'em',
	// 				'isLinked' => false,
	// 			],
	// 			'selectors'  => [
	// 				'{{WRAPPER}} .wpe-text-editor test' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	// 			],
	// 		]
	// 	);


	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Text_Stroke::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_text_stroke',
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);

	// 	$this->add_control(
	// 		'wpe_st_abc_text_color',
	// 		[
	// 			'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
	// 			'type'      => \Elementor\Controls_Manager::COLOR,
	// 			'selectors' => [
	// 				'{{WRAPPER}} .wpe-text-editor test' => 'color: {{VALUE}}',
	// 			],
	// 		]
	// 	);

	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Background::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_background',
	// 			'types'    => [ 'classic', 'gradient', 'video' ],
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);

	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Border::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_border',
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);
	// 	$this->add_control(
	// 		'wpe_st_abc_text_shadow',
	// 		[
	// 			'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
	// 			'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
	// 			'selectors' => [
	// 				'{{SELECTOR}} .wpe-text-editor test' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
	// 			],
	// 		]
	// 	);

	// 	$this->add_responsive_control(
	// 		'wpe_st_abc_border_radius',
	// 		[
	// 			'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
	// 			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
	// 			'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
	// 			'selectors'  => [
	// 				'{{WRAPPER}} .wpe-text-editor test' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	// 			],
	// 		]
	// 	);
	// 	$this->add_control(
	// 		'wpe_st_abc_text_decoration',
	// 		[
	// 			'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
	// 			'type'    => \Elementor\Controls_Manager::SELECT,
	// 			'options' => [
	// 				'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
	// 				'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
	// 				'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
	// 				'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
	// 			],
	// 			'default' => 'none',
	// 		]
	// 	);

	// 	$this->end_controls_tab();

	// 	$this->start_controls_tab(
	// 		'wpe_st_tab_abc_hover',
	// 		[
	// 			'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
	// 		]
	// 	);

	// 	$this->add_control(
	// 		'wpe_st_abc_hover_text_color',
	// 		[
	// 			'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
	// 			'type'      => \Elementor\Controls_Manager::COLOR,
	// 			'selectors' => [
	// 				'{{WRAPPER}} .wpe-text-editor test' => 'color: {{VALUE}}',
	// 			],
	// 		]
	// 	);
	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Background::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_hover_background',
	// 			'types'    => [ 'classic', 'gradient', 'video' ],
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);
	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Border::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_hover_border',
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);
	// 	$this->add_control(
	// 		'wpe_st_abc_hover_text_decoration',
	// 		[
	// 			'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
	// 			'type'    => \Elementor\Controls_Manager::SELECT,
	// 			'options' => [
	// 				'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
	// 				'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
	// 				'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
	// 				'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
	// 			],
	// 			'default' => 'none',
	// 		]
	// 	);
	// 	$this->add_control(
	// 		'wpe_st_abc_hover_text_shadow',
	// 		[
	// 			'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
	// 			'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
	// 			'selectors' => [
	// 				'{{SELECTOR}} .wpe-text-editor test' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
	// 			],
	// 		]
	// 	);
	// 	$this->add_group_control(
	// 		\Elementor\Group_Control_Typography::get_type(),
	// 		[
	// 			'name'     => 'wpe_st_abc_hover_typography',
	// 			'selector' => '{{WRAPPER}} .wpe-text-editor test',
	// 		]
	// 	);


	// 	$this->end_controls_tab();
	// 	$this->end_controls_tabs();


	// }



}

