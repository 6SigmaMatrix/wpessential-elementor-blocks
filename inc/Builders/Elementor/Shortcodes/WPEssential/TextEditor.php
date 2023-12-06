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
	// function removefuntion(){
	// 	$opt = Wysiwyg::make( __( 'Text Editor', 'wpessential-elementor-blocks' ) );
	// 	$opt->label_block( true );
	// 	$opt->default( '<p>' . __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>' );
	// 	$this->add_control( $opt->key, $opt->toArray() );

	// 	$opt = Switcher::make( __( 'Drop Cap', 'wpessential-elementor-blocks' ) );
	// 	$opt->label_off( esc_html__( 'Off', 'elementor' ) );
	// 	$opt->label_on( esc_html__( 'On', 'elementor' ) );
	// 	$opt->prefix_class( 'wpe-drop-cap-' );
	// 	$this->add_control( $opt->key, $opt->toArray() );

	// 	$text_columns       = range( 1, 10 );
	// 	$text_columns       = array_combine( $text_columns, $text_columns );
	// 	$text_columns[ '' ] = esc_html__( 'Default', 'elementor' );

	// 	$this->add_responsive_control(
	// 		'text_columns',
	// 		[
	// 			'label'     => esc_html__( 'Columns', 'elementor' ),
	// 			'type'      => Controls_Manager::SELECT,
	// 			'separator' => 'before',
	// 			'options'   => $text_columns,
	// 			'selectors' => [
	// 				'{{WRAPPER}}' => 'columns: {{VALUE}};',
	// 			],
	// 		]
	// 	);

	// 	$this->add_responsive_control(
	// 		'column_gap',
	// 		[
	// 			'label'      => esc_html__( 'Columns Gap', 'elementor' ),
	// 			'type'       => Controls_Manager::SLIDER,
	// 			'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
	// 			'range'      => [
	// 				'px' => [
	// 					'max' => 100,
	// 				],
	// 				'%'  => [
	// 					'max'  => 10,
	// 					'step' => 0.1,
	// 				],
	// 				'vw' => [
	// 					'max'  => 10,
	// 					'step' => 0.1,
	// 				],
	// 				'em' => [
	// 					'max'  => 10,
	// 					'step' => 0.1,
	// 				],
	// 			],
	// 			'selectors'  => [
	// 				'{{WRAPPER}}' => 'column-gap: {{SIZE}}{{UNIT}};',
	// 			],
	// 		]
	// 	);

	// }

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

		// For button styles
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

		// $this->start_controls_section(
		// 	'wpe_st_block_qoute_style',
		// 	[
		// 		'label' => esc_html__( 'Block Qoute', 'wpessential-elementor-blocks' ),
		// 		'tab'   => Controls_Manager::TAB_STYLE,
		// 	]
		// );
		// $this->block_qoute_style();
		// $this->end_controls_section();

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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
			'wpe_st_paragraph_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
			'wpe_st_button_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);

		$this->add_responsive_control(
			'wpe_st_block_qoute_text_padding',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor test' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wpe-text-editor test' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);

		$this->add_control(
			'wpe_st_block_qoute_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor test' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor test' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_block_qoute_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor test' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor test' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
			]
		);
		$this->add_control(
			'wpe_st_block_qoute_hover_text_decoration',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
					'{{SELECTOR}} .wpe-text-editor test' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_block_qoute_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor test',
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
	// 			'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-modal' ),
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
	// 			'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
	// 			'type'    => \Elementor\Controls_Manager::SELECT,
	// 			'options' => [
	// 				'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
	// 				'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
	// 				'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
	// 				'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
	// 			'label'     => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
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
	// 			'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-modal' ),
	// 			'type'    => \Elementor\Controls_Manager::SELECT,
	// 			'options' => [
	// 				'none'         => esc_html__( 'None', 'wpessential-elementor-modal' ),
	// 				'underline'    => esc_html__( 'Underline', 'wpessential-elementor-modal' ),
	// 				'overline'     => esc_html__( 'Overline', 'wpessential-elementor-modal' ),
	// 				'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-modal' ),
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
