<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;


use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;



use function defined;

class Table extends Base implements Shortcodes
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
		return [ 'Table', 'title', 'text' ];
	}
	public function get_icon()
	{
		return 'eicon-table';
	}

	

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function register_controls () {

		
		// $this->start_controls_section(
		// 	'wpe_st_box_style',
		// 	[
		// 		'label' => esc_html__('Box', 'wpessential-elementor-blocks'),
		// 		'tab' => Controls_Manager::TAB_STYLE,
		// 	]
		// );
		// $this->box_style();
		// $this->end_controls_section();

		
		$this->start_controls_section(
			'wpe_st_table_style',
			[
				'label' => esc_html__('Table', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->table_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_header_style',
			[
				'label' => esc_html__('Header', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->header_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_body_style',
			[
				'label' => esc_html__('Body', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->body_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_footer_style',
			[
				'label' => esc_html__('Footer', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->footer_style();
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
	public function render () {}

	private function box_style(){



		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_box_bg_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
	;

		$this->add_control(
			'wpe_st_box_border_color_normal',
			[
				'label' => esc_html__( 'Border Color', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}' => '--box-border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_box_loader_color_normal',
			[
				'label' => esc_html__( 'Loader Color', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Not using CSS var for BC, when not configured: the loader should get the color from the body tag.
					'{{WRAPPER}} .elementor-toc__spinner' => 'color: {{VALUE}}; fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_box_border_width_normal',
			[
				'label' => esc_html__( 'Border Width', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--box-border-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_box_border_radius_normal',
			[
				'label' => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}}' => '--box-border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_box_padding_normal',
			[
				'label' => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}}' => '--box-padding: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_box_min_height_normal',
			[
				'label' => esc_html__( 'Min Height', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--box-min-height: {{SIZE}}{{UNIT}}',
				],
				'frontend_available' => true,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_box_box_shadow_normal',
				'selector' => '{{WRAPPER}}',
			]
		);

	
	}

	private function table_style(){



				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name' => 'wpe_st_table_background_normal',
						'types' => ['classic', 'gradient', 'video'],
						'selector' => '{{WRAPPER}} .wpe-text-editor title',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'wpe_st_table_box_shadow_normal',
						'selector' => '{{WRAPPER}} .wpe-text-editor ',
					]
				);
				$this->add_control(
					'wpe_st_box_margin_normal',
					[
						'label' => esc_html__('Margin', 'wpessential-elementor-blocks'),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%', 'em', 'rem', 'custom'],
						'range' => [
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
						'default' => [
							'top' => 2,
							'right' => 0,
							'bottom' => 2,
							'left' => 0,
							'unit' => 'em',
							'isLinked' => false,
						],
						'selectors' => [
							'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_table_border_type_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->add_control(
			'wpe_st_table_border_width_normal',
			[
				'label' => esc_html__('Border Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_table_border_color_normal',
			[
				'label' => esc_html__('Border Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_table_border_radius_normal',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				//'condition' => $args['section_condition'],
			]
		);
		
	}
	private function header_style()
	{

		$this->start_controls_tabs('tabs_header_style'); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_header_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_header_background_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_control(
			'wpe_st_header_color_normal',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_control(
			'wpe_st_header_text_color_normal',
			[
				'label' => esc_html__('Text Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
	;

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_header_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_header_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_header_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_header_padding_normal',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_header_margin_normal',
			[
				'label' => esc_html__('Margin', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'range' => [
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
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_header_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->add_control(
			'wpe_st_header_text_decoration_noraml',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-blocks'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-blocks'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-blocks'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-blocks'),
				],
				'default' => 'none',
			]
		);

		$this->add_responsive_control(
			'wpe_st_header_alignment_normal',
			[
				'label' => esc_html__('Alignment', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_header_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_control(
			'wpe_st_header_border_width_normal',
			[
				'label' => esc_html__('Border Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_header_border_color_normal',
			[
				'label' => esc_html__('Border Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab(); // normal tabs end here


		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_header_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_control(
			'wpe_st_header_hover_animation_hover',
			[
				'label' => esc_html__('Hover Animation', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_header_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_header_color_hover',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_header_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_header_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_header_background_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_header_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);


		$this->add_control(
			'wpe_st_header_text_decoration_hover',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-blocks'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-blocks'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-blocks'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-blocks'),
				],
				'default' => 'none',
			]
		);
		$this->add_responsive_control(
			'wpe_st_header_border_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_header_border_width_hover',
			[
				'label' => esc_html__('Border Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_header_border_color_hover',
			[
				'label' => esc_html__('Border Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();


	}
	private function body_style(){
		
		$this->add_control(
			'wpe_st_body_rows_strips_normal',
			[
				'label' => esc_html__( 'Row Strips', 'wpessential-elementor-blocks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'wpessential-elementor-blocks' ),
				'label_off' => esc_html__( 'Off', 'wpessential-elementor-blocks' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_body_rows_strips_bg_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
				'condition' =>[ 
					'wpe_st_body_rows_strips_normal' => 'yes'
				],
			
			]
		);

		$this->add_control(
			'wpe_st_body_rows_color_normal',
			[
				'label' => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}}' => '--marker-color: {{VALUE}}',
				],
				'condition' =>[ 
					'wpe_st_body_rows_strips_normal' => 'yes'
				],
			]
		);

		$this->start_controls_tabs('tabs_body_style'); /* this will create a tab in which we can make two tabs
		normal and hover*/
				// for normal controls
				$this->start_controls_tab(
					'tab_body_normal',
					[
						'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
					]
				);
		
				

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_body_bg_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
				
			
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_body_typograpghy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
	
		$this->add_control(
			'wpe_st_body_color_normal',
			[
				'label' => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}}' => '--marker-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_body_margin_normal',
			[
				'label' => esc_html__('Margin', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'range' => [
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
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_body_padding_normal',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_body_hover',
			[
				'label' => esc_html__('hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_body_bg_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
				
			
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_body_typograpghy_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
	
		$this->add_control(
			'wpe_st_body_color_hover',
			[
				'label' => esc_html__( 'Color', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}}' => '--marker-color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_tab();
		$this->end_controls_tabs();


	
		
	
	}

	private function footer_style()
	{

		$this->start_controls_tabs('tabs_footer_style'); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_footer_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_footer_background_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_control(
			'wpe_st_footer_color_normal',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_control(
			'wpe_st_footer_text_color_normal',
			[
				'label' => esc_html__('Text Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_footer_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_footer_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_footer_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_footer_padding_normal',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_footer_margin_normal',
			[
				'label' => esc_html__('Margin', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'range' => [
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
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_footer_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->add_control(
			'wpe_st_footer_text_decoration_noraml',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-blocks'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-blocks'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-blocks'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-blocks'),
				],
				'default' => 'none',
			]
		);

		$this->add_responsive_control(
			'wpe_st_footer_alignment_normal',
			[
				'label' => esc_html__('Alignment', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__('Justified', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_footer_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_control(
			'wpe_st_footer_border_width_normal',
			[
				'label' => esc_html__('Border Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_footer_border_color_normal',
			[
				'label' => esc_html__('Border Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab(); // normal tabs end here


		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_footer_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_control(
			'wpe_st_footer_hover_animation_hover',
			[
				'label' => esc_html__('Hover Animation', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_footer_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_footer_color_hover',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-icon, {{WRAPPER}} .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_footer_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_footer_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_footer_background_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_footer_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);


		$this->add_control(
			'wpe_st_footer_text_decoration_hover',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-blocks'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-blocks'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-blocks'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-blocks'),
				],
				'default' => 'none',
			]
		);
		$this->add_responsive_control(
			'wpe_st_footer_border_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_footer_border_width_hover',
			[
				'label' => esc_html__('Border Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_footer_border_color_hover',
			[
				'label' => esc_html__('Border Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-accordion-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-content' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();


	}


	// start body drom next day  


}
