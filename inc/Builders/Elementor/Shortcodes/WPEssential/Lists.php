<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;
use function defined;

class Lists extends Base implements Shortcodes
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
		return [ 'list', 'title', 'text', 'image' ];
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
			'wpe_st_test_style',
			[
				'label' => esc_html__( 'Test', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_CONTENT
			]
		);
		//$this->list_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_list_style',
			[
				'label' => esc_html__( 'List', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->list_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_icon_style',
			[
				'label' => esc_html__( 'Icon', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->icon_style();
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
			'wpe_st_content_style',
			[
				'label' => esc_html__( 'content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->content_style();
		$this->end_controls_section();


	}

	public function list_style ()
	{


		$this->add_responsive_control(
			'wpe_st_list_space_between_normal',
			[
				'label'      => esc_html__( 'Space Between', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child)'  => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item'                         => 'margin-right: calc({{SIZE}}{{UNIT}}/2); margin-left: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items'                                                   => 'margin-right: calc(-{{SIZE}}{{UNIT}}/2); margin-left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body.rtl {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after'          => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
					'body:not(.rtl) {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after'    => 'right: calc(-{{SIZE}}{{UNIT}}/2)',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_list_align_normal',
			[
				'label'        => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
			]
		);

		$this->add_control(
			'wpe_st_list_divider_normal',
			[
				'label'     => esc_html__( 'Divider', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Off', 'wpessential-elementor-blocks' ),
				'label_on'  => esc_html__( 'On', 'wpessential-elementor-blocks' ),
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'content: ""',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_list_divider_style_normal',
			[
				'label'     => esc_html__( 'Style', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'solid'  => esc_html__( 'Solid', 'wpessential-elementor-blocks' ),
					'double' => esc_html__( 'Double', 'wpessential-elementor-blocks' ),
					'dotted' => esc_html__( 'Dotted', 'wpessential-elementor-blocks' ),
					'dashed' => esc_html__( 'Dashed', 'wpessential-elementor-blocks' ),
				],
				'default'   => 'solid',
				'condition' => [
					'wpe_st_list_divider_normal' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-style: {{VALUE}}',
					'{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:not(:last-child):after'       => 'border-left-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_list_divider_weight_normal',
			[
				'label'      => esc_html__( 'Weight', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'default'    => [
					'size' => 1,
				],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 20,
					],
				],
				'condition'  => [
					'wpe_st_list_divider_normal' => 'yes',
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .elementor-inline-items .elementor-icon-list-item:not(:last-child):after'                                 => 'border-left-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_list_devider_width_normal',
			[
				'label'      => esc_html__( 'Width', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'default'    => [
					'unit' => '%',
				],
				'condition'  => [
					'wpe_st_list_divider_normal' => 'yes',
					'view!'                      => 'inline',
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_list_devider_height_normal',
			[
				'label'      => esc_html__( 'Height', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
				'default'    => [
					'unit' => '%',
				],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'condition'  => [
					'wpe_st_list_divider_normal' => 'yes',
					'view'                       => 'inline',
				],
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_list_devider_color_normal',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ddd',
				'global'    => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'condition' => [
					'wpe_st_list_divider_normal' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'border-color: {{VALUE}}',
				],
			]
		);


	}

	private function icon_style ()
	{
		$this->start_controls_tabs( 'tabs_iocn_style' );/* this will create a tab in which we can make two tabs
		normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_icon_primary_color_normal',
			[
				'label'     => esc_html__( 'Primary Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                              => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover'     => 'color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_icon_text_indent_normal',
			[
				'label'      => esc_html__( 'Gap', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 50,
					],
				],
				'separator'  => 'after',
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-icon' => is_rtl() ? 'padding-left: {{SIZE}}{{UNIT}};' : 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_icon_horizontal_align_normal',
			[
				'label'     => esc_html__( 'Horizontal Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'   => '',
				// 	'selectors_dictionary' => [
				// 	'left' =>sprintf( '--e-icon-list-icon-align: left; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_left  ),
				// 'center' => printf( '--e-icon-list-icon-align: center; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_center  ),
				// 		'right' => sprintf( '--e-icon-list-icon-align: right; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_right ),
				// 	],
				'selectors' => [
					'{{WRAPPER}}' => '{{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'wpe_st_icon_vertical_align_normal',
			[
				'label'     => esc_html__( 'Vertical Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-top',
					],
					'center'     => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'flex-end'   => [
						'title' => esc_html__( 'End', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => '--icon-vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_border_width_normal',
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
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_border_color_normal',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_align_normal',
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
			'wpe_st_icon_color_normal',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg'      => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'wpe_st_icon_active_color_normal',
			[
				'label'     => esc_html__( 'Active Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon svg'      => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_spacing_normal',
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
					'{{WRAPPER}} .elementor-accordion-icon.elementor-accordion-icon-left'  => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-icon.elementor-accordion-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_icon_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
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
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'wpe_st_icon_size_normal',
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
					'{{WRAPPER}} .elementor-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->add_control(
			'wpe_st_icon_fit_to_size_normal',
			[
				'label'       => esc_html__( 'Fit to Size', 'wpessential-elementor-blocks' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => 'Avoid gaps around icons when width and height aren\'t equal',
				'label_off'   => esc_html__( 'Off', 'wpessential-elementor-blocks' ),
				'label_on'    => esc_html__( 'On', 'wpessential-elementor-blocks' ),
				'condition'   => [
					'selected_icon[library]' => 'svg',
				],
				'selectors'   => [
					'{{WRAPPER}} .elementor-icon-wrapper svg' => 'width: 100%;',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_padding_normal',
			[
				'label'     => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range'     => [
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
				'name'     => 'wpe_st_icon_background_normal',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_icon_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor icon',
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_border_radius_normal',
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
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor iocn' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_icon_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);


		$this->end_controls_tab();


		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_icon_color_hover',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg'      => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_text_indent_hover',
			[
				'label'      => esc_html__( 'Gap', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'      => [
					'px' => [
						'max' => 50,
					],
				],
				'separator'  => 'after',
				'selectors'  => [
					'{{WRAPPER}} .elementor-icon-list-icon' => is_rtl() ? 'padding-left: {{SIZE}}{{UNIT}};' : 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_icon_horizontal_align_hover',
			[
				'label'     => esc_html__( 'Horizontal Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'   => '',
				// 	'selectors_dictionary' => [
				// 	'left' =>sprintf( '--e-icon-list-icon-align: left; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_left  ),
				// 'center' => printf( '--e-icon-list-icon-align: center; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_center  ),
				// 		'right' => sprintf( '--e-icon-list-icon-align: right; --e-icon-list-icon-margin: %s;', $e_icon_list_icon_align_right ),
				// 	],
				'selectors' => [
					'{{WRAPPER}}' => '{{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'wpe_st_icon_vertical_align_hover',
			[
				'label'     => esc_html__( 'Vertical Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-top',
					],
					'center'     => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'flex-end'   => [
						'title' => esc_html__( 'End', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => '--icon-vertical-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_border_width_hover',
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
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon_border_color_hover',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_icon_background_hover',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_rotate_hover',
			[
				'label'          => esc_html__( 'Rotate', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'size_units'     => [ 'deg', 'grad', 'rad', 'turn', 'custom' ],
				'default'        => [
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors'      => [
					'{{WRAPPER}} .elementor-icon i, {{WRAPPER}} .elementor-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'wpe_st_icon__animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'wpe_st_icon_border_radius_hover',
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
				'name'     => 'wpe_st_icon_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor icon',
			]
		);


		$this->add_control(
			'wpe_st_iocn_text_shadow_hover',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor iocn' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_icon_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();// the tab in which normal and hover are present .that tab ends here
	}

	private function image_style ()
	{
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs( 'tabs_image_style' );
		// this is the start of normal tab
		$this->start_controls_tab(
			'tab_image_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);


		$this->add_responsive_control(
			'wpe_st_image_width_normal',
			[
				'label'          => esc_html__( 'Width', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units'     => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'          => [
					'%'  => [
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
				'selectors'      => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_space_normal',
			[
				'label'          => esc_html__( 'Max Width', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units'     => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'          => [
					'%'  => [
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
				'selectors'      => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_height_normal',
			[
				'label'      => esc_html__( 'Height', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_fit_normal',
			[
				'label'     => esc_html__( 'Object Fit', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options'   => [
					''        => esc_html__( 'Default', 'wpessential-elementor-blocks' ),
					'fill'    => esc_html__( 'Fill', 'wpessential-elementor-blocks' ),
					'cover'   => esc_html__( 'Cover', 'wpessential-elementor-blocks' ),
					'contain' => esc_html__( 'Contain', 'wpessential-elementor-blocks' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_position_normal',
			[
				'label'     => esc_html__( 'Object Position', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center center' => esc_html__( 'Center Center', 'wpessential-elementor-blocks' ),
					'center left'   => esc_html__( 'Center Left', 'wpessential-elementor-blocks' ),
					'center right'  => esc_html__( 'Center Right', 'wpessential-elementor-blocks' ),
					'top center'    => esc_html__( 'Top Center', 'wpessential-elementor-blocks' ),
					'top left'      => esc_html__( 'Top Left', 'wpessential-elementor-blocks' ),
					'top right'     => esc_html__( 'Top Right', 'wpessential-elementor-blocks' ),
					'bottom center' => esc_html__( 'Bottom Center', 'wpessential-elementor-blocks' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'wpessential-elementor-blocks' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'wpessential-elementor-blocks' ),
				],
				'default'   => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				'condition' => [
					'object-fit' => 'cover',
				],
			]
		);

		$this->add_control(
			'wpe_st_image_seperator_panel_style_normal',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->add_control(
			'wpe_st_image_opacity_nomral',
			[
				'label'     => esc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_image_typography_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_text_padding_normal',
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
				'type'       => Controls_Manager::DIMENSIONS,
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_image_text_stroke',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_control(
			'wpe_st_image_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_image_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_image_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_control(
			'wpe_st_image_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .wpe-text-editor img' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_image_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
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

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_image_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);


		$this->add_responsive_control(
			'wpe_st_image_width_hover',
			[
				'label'          => esc_html__( 'Width', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units'     => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'          => [
					'%'  => [
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
				'selectors'      => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_space_hover',
			[
				'label'          => esc_html__( 'Max Width', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units'     => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'          => [
					'%'  => [
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
				'selectors'      => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_height_hover',
			[
				'label'      => esc_html__( 'Height', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_fit_hover',
			[
				'label'     => esc_html__( 'Object Fit', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options'   => [
					''        => esc_html__( 'Default', 'wpessential-elementor-blocks' ),
					'fill'    => esc_html__( 'Fill', 'wpessential-elementor-blocks' ),
					'cover'   => esc_html__( 'Cover', 'wpessential-elementor-blocks' ),
					'contain' => esc_html__( 'Contain', 'wpessential-elementor-blocks' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_position_hover',
			[
				'label'     => esc_html__( 'Object Position', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center center' => esc_html__( 'Center Center', 'wpessential-elementor-blocks' ),
					'center left'   => esc_html__( 'Center Left', 'wpessential-elementor-blocks' ),
					'center right'  => esc_html__( 'Center Right', 'wpessential-elementor-blocks' ),
					'top center'    => esc_html__( 'Top Center', 'wpessential-elementor-blocks' ),
					'top left'      => esc_html__( 'Top Left', 'wpessential-elementor-blocks' ),
					'top right'     => esc_html__( 'Top Right', 'wpessential-elementor-blocks' ),
					'bottom center' => esc_html__( 'Bottom Center', 'wpessential-elementor-blocks' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'wpessential-elementor-blocks' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'wpessential-elementor-blocks' ),
				],
				'default'   => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				'condition' => [
					'object-fit' => 'cover',
				],
			]
		);

		$this->add_control(
			'wpe_st_image_seperator_panel_style_hover',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->add_control(
			'wpe_st_image_hover_animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_image_opacity_hover',
			[
				'label'     => esc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_image_transion_hover',
			[
				'label'     => esc_html__( 'Transition Duration', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 0.3,
				],
				'range'     => [
					'px' => [
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_control(
			'wpe_st_image_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_image_hover_background',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_image_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_control(
			'wpe_st_image_hover_text_decoration',
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
			'wpe_st_image_hover_text_shadow',
			[
				'label'     => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}.wpe-text-editor img' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_image_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_image_hover_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_image_hover_typography',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function content_style ()
	{

		$this->start_controls_tabs( 'tabs_content_style' );/* this will create a tab in which we can make two tabs
		normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_content_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_content_background_normal',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_control(
			'wpe_st_content_color_normal',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'wpe_st_content_text_color_normal',
			[
				'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_content_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'wpe_st_content_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_content_padding_normal',
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
			'wpe_st_content_margin_normal',
			[
				'label'      => esc_html__( 'Margin', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
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
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_content_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_content_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_content_border_radius_normal',
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
			'wpe_st_content_text_decoration_noraml',
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
			'wpe_st_content_border_width_normal',
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
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_content_border_color_normal',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_content_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_content_alignment_normal',
			[
				'label'     => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
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
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_content_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_content_text_color_hover',
			[
				'label'     => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg'                                     => 'fill: {{VALUE}};',
				],
				'global'    => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'wpe_st_content_text_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_control(
			'wpe_st_content_border_width_hover',
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
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_content_border_color_hover',
			[
				'label'     => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item'                                       => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content'                => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name'     => 'wpe_st_content_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'wpe_st_content_background_hover',
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_content_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_content_border_radius_hover',
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
			'wpe_st_content_text_decoration_hover',
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
				'name'     => 'wpe_st_content_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();

	}

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
