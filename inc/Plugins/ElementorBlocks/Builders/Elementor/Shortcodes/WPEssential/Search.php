<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;

use function defined;

class Search extends Base implements Shortcodes
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
		return [ 'Search', 'title', 'text' ];
	}

	public function set_widget_icon ()
	{
		return 'eicon-search-bold';
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
			'wpe_st_search_content',
			[
				'label' => esc_html__( 'Search Content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->search_content();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_input_style',
			[
				'label' => esc_html__( 'Input Field', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->input_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_input_focus_style',
			[
				'label' => esc_html__( 'Input Focus', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->input_focus_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_text_button_style',
			[
				'label' => esc_html__( 'Text Button', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->text_button_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_icon_button_style',
			[
				'label' => esc_html__( 'Icon Button', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->icon_button_style();
		$this->end_controls_section();

	}

	private function search_content ()
	{
		$this->add_control(
			'wpe_st_skin',
			[
				'label'        => esc_html__( 'Skin', 'wpessential-elementor-blocks' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'classic',
				'options'      => [
					'classic' => esc_html__( 'Classic', 'wpessential-elementor-blocks' ),
					'minimal' => esc_html__( 'Minimal', 'wpessential-elementor-blocks' ),
					'full_screen' => esc_html__( 'Full Screen', 'wpessential-elementor-blocks' ),
				],
				'prefix_class' => 'elementor-search-form--skin-',
				'render_type'  => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_placeholder',
			[
				'label'   => esc_html__( 'Placeholder', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::TEXT,
				'separator' => 'before',
				'default' => esc_html__( 'Search', 'wpessential-elementor-blocks' ) . '...',
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'wpe_st_heading_button_content',
			[
				'label' => esc_html__( 'Button', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'wpe_st_skin' => 'classic',
				],
			]
		);

		$this->add_control(
			'wpe_st_button_type',
			[
				'label'       => esc_html__( 'Type', 'wpessential-elementor-blocks' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'icon',
				'options'     => [
					'icon' => esc_html__( 'Icon', 'wpessential-elementor-blocks' ),
					'text' => esc_html__( 'Text', 'wpessential-elementor-blocks' ),
				],
				'prefix_class' => 'elementor-search-form--button-type-',
				'render_type' => 'template',
				'condition'   => [
					'wpe_st_skin' => 'classic',
				],
			]
		);

		$this->add_control(
			'wpe_st_button_text',
			[
				'label'     => esc_html__( 'Text', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Search', 'wpessential-elementor-blocks' ),
				'condition' => [
					'wpe_st_button_type' => 'text',
					'wpe_st_skin' => 'classic',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon',
			[
				'label'       => esc_html__( 'Icon', 'wpessential-elementor-blocks' ),
				'type'        => Controls_Manager::CHOOSE,
				'default'     => 'search',
				'options'     => [
					'search' => [
						'title' => esc_html__( 'Search', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-search',
					],
					'arrow'  => [
						'title' => esc_html__( 'Arrow', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-arrow-right',
					],
				],
				'render_type' => 'template',
				'prefix_class' => 'elementor-search-form--icon-',
				'condition'   => [
					'wpe_st_button_type' => 'icon',
					'wpe_st_skin' => 'classic',
				],
			]
		);

		$this->add_control(
			'wpe_st_size',
			[
				'label'     => esc_html__( 'Size', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'default'   => [
					'wpe_st_size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-search-form__container'           => 'min-height: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .elementor-search-form__submit'              => 'min-width: {{SIZE}}{{UNIT}}',
					'body:not(.rtl) {{WRAPPER}} .elementor-search-form__icon' => 'padding-left: calc({{SIZE}}{{UNIT}} / 3)',
					'body.rtl {{WRAPPER}} .elementor-search-form__icon'       => 'padding-right: calc({{SIZE}}{{UNIT}} / 3)',
					'{{WRAPPER}} .elementor-search-form__input, {{WRAPPER}}.elementor-search-form--button-type-text .elementor-search-form__submit' => 'padding-left: calc({{SIZE}}{{UNIT}} / 3); padding-right: calc({{SIZE}}{{UNIT}} / 3)',
				],
				'condition' => [
					'wpe_st_skin!' => 'full_screen',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_toggle_button_content',
			[
				'label' => esc_html__( 'Toggle', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'wpe_st_skin' => 'full_screen',
				],
			]
		);

		$this->add_control(
			'wpe_st_toggle_align',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-search-form' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'wpe_st_skin' => 'full_screen',
				],
			]
		);

		$this->add_control(
			'wpe_st_toggle_size',
			[
				'label'   => esc_html__( 'Size', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'wpe_st_size' => 33,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-search-form__toggle' => '--e-search-form-toggle-size: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'wpe_st_skin' => 'full_screen',
				],
			]
		);

	}

	private function input_style ()
	{

		$this->start_controls_tabs( 'tabs_input_style' ); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_input_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_input_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_control(
			'wpe_st_input_text_color_normal',
			[
				'label'   => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_input_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_input_padding_normal',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_input_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 5,
					],
					'em' => [
						'min' => 1,
						'max' => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'    => 2,
					'right'  => 0,
					'bottom' => 2,
					'left'   => 0,
					'unit'   => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_input_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_input_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_input_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_input_text_decoration_noraml',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
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
			'wpe_st_input_border_width_normal',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_input_border_color_normal',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_input_alignment_normal',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_input_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_input_text_color_hover',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_text_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_control(
			'wpe_st_input_border_width_hover',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_input_border_color_hover',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_input_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_input_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_input_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_input_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_input_text_decoration_hover',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'none'         => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'underline'    => esc_html__( 'Underline', 'wpessential-elementor-blocks' ),
					'overline'     => esc_html__( 'Overline', 'wpessential-elementor-blocks' ),
					'line-through' => esc_html__( 'Line Through', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

	}

	private function input_focus_style ()
	{

		// 		$this->start_controls_tabs('tabs_input_focus_style'); /* this will create a tab in which we can make two tabs
		// normal and hover*/
		// 		// for normal controls
		// 		$this->start_controls_tab(
		// 			'tab_input_focus_normal',
		// 			[
		// 				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
		// 			]
		// 		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_input_focus_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_control(
			'wpe_st_input_focus_text_color_normal',
			[
				'label'   => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_input_focus_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_focus_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_input_focus_padding_normal',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_input_focus_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 5,
					],
					'em' => [
						'min' => 1,
						'max' => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'    => 2,
					'right'  => 0,
					'bottom' => 2,
					'left'   => 0,
					'unit'   => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_input_focus_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_input_focus_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_input_focus_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_input_focus_text_decoration_noraml',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
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
			'wpe_st_input_focus_border_width_normal',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_input_focus_border_color_normal',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_input_focus_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_input_focus_alignment_normal',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		// $this->end_controls_tab();

		// $this->end_controls_tabs();

	}

	private function text_button_style ()
	{

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'   => 'wpe_st_text_button_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,

				],
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->start_controls_tabs( 'tabs_text_button_styles' ); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'wpe_st_tab_text_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_text_button_text_color_normal',
			[
				'label'   => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_text_button_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_text_button_border_type_normal',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
				//'condition' => $args['section_condition'],
			]
		);
		$this->add_responsive_control(
			'wpe_st_text_button_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_text_button_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpessential-elementor-blocks',
				//'condition' => $args['section_condition'],
			]
		);
		$this->add_responsive_control(
			'wpe_st_text_button_text_padding_normal',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
				//'condition' => $args['section_condition'],
			]
		);
		$this->add_control(
			'wpe_st_text_button_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 5,
					],
					'em' => [
						'min' => 1,
						'max' => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'    => 2,
					'right'  => 0,
					'bottom' => 2,
					'left'   => 0,
					'unit'   => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_text_button_text_shadow_normal',
			[
				'label' => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_text_button_width_normal',
			[
				'label'      => esc_html__( 'Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_text_button_text_stroke_normal',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_text_button_text_decoration_noraml',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
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
			'wpe_st_text_button_border_width_normal',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_text_button_border_color_normal',
			[
				'label' => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::COLOR,
				//'condition' => [
				//	'border_border!' => '',
				//],
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'border-color: {{VALUE}};',
				],
				//'condition' => $args['section_condition'],
			]
		);
		$this->add_control(
			'wpe_st_text_button_align_normal',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'  => [
						'title' => esc_html__( 'Start', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle'  => false,
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_text_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_text_button_text_color_hover',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-button:hover svg, {{WRAPPER}} .elementor-button:focus svg' => 'fill: {{VALUE}};',
				],
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_text_button_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_control(
			'wpe_st_text_button_animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_text_button_border_type_hover',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_responsive_control(
			'wpe_st_text_button_width_hover',
			[
				'label'      => esc_html__( 'Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_text_button_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_text_button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .elementor-button',
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_text_button_text_shadow_hover',
				'selector' => '{{WRAPPER}} .elementor-button',
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_text_button_text_stroke_hover',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_text_button_text_decoration_hover',
			[
				'label'   => esc_html__( 'Text Decoration', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
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
			'wpe_st_text_button_border_width_hover',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_text_button_border_color_hover',
			[
				'label' => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::COLOR,
				//'condition' => [
				//	'border_border!' => '',
				//],
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'border-color: {{VALUE}};',
				],
				//'condition' => $args['section_condition'],
			]
		);
		$this->add_control(
			'wpe_st_text_button_align_hover',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'  => [
						'title' => esc_html__( 'Start', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle'  => false,
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

	}

	// If the user select to display the text button it will show text biutton cntrols text_button_style()

	private function icon_button_style ()
	{
		$this->start_controls_tabs( 'tabs_iocn_button_style' ); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_icon_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_icon_button_primary_color_normal',
			[
				'label'     => esc_html__( 'Primary Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                          => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_icon_button_border_width_normal',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_border_color_normal',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_icon_button_align_normal',
			[
				'label'   => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'  => [
						'title' => esc_html__( 'Start', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle'  => false,
			]
		);

		$this->add_control(
			'wpe_st_icon_button_color_normal',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_active_color_normal',
			[
				'label'     => esc_html__( 'Active Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_button_spacing_normal',
			[
				'label'     => esc_html__( 'Spacing', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon.elementor-accordion-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-icon.elementor-accordion-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_icon_button_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 5,
					],
					'em' => [
						'min' => 1,
						'max' => 5,
						'step' => 0.5,
					],
				],
				'default'    => [
					'top'    => 2,
					'right'  => 0,
					'bottom' => 2,
					'left'   => 0,
					'unit'   => 'em',
					'isLinked' => false,
				],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_button_size_normal',
			[
				'label'      => esc_html__( 'Size', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->add_control(
			'wpe_st_icon_button_fit_to_size_normal',
			[
				'label'     => esc_html__( 'Fit to Size', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SWITCHER,
				'description' => 'Avoid gaps around icons when width and height aren\'t equal',
				'label_off' => esc_html__( 'Off', 'wpessential-elementor-blocks' ),
				'label_on'  => esc_html__( 'On', 'wpessential-elementor-blocks' ),
				'condition' => [
					'selected_icon[library]' => 'svg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper svg' => 'width: 100%;',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_padding_normal',
			[
				'label' => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_icon_button_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_icon_button_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor icon',
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_button_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_iocn_text_shadow_normal',
			[
				'label' => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor iocn' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_icon_button_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_icon_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_icon_button_color_hover',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_border_width_hover',
			[
				'label'      => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_border_color_hover',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_icon_button_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_button_rotate_hover',
			[
				'label'      => esc_html__( 'Rotate', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'deg', 'grad', 'rad', 'turn', 'custom' ],
				'default'    => [
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon i, {{WRAPPER}} .elementor-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_button_animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_button_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_icon_button_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor icon',
			]
		);

		$this->add_control(
			'wpe_st_iocn_text_shadow_hover',
			[
				'label' => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor iocn' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_icon_button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs(); // the tab in which normal and hover are present .that tab ends here
	}

	// If the user select to display the icon button it will show text biutton cntrols icon_button_style()

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function render () {}

}
