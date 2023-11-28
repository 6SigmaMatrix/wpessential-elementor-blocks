<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;


if (!\defined('ABSPATH')) {
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
	public function set_keywords()
	{
		return ['TextEditor', 'title', 'text'];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function register_controls()
	{

		$this->start_controls_section(
			'wpe_st_anchor_style',
			[
				'label' => esc_html__('Anchor Style', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->anchor_style();


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
	public function render()
	{

	}

	private function anchor_style()
	{
		 // this will set condtion for normal or hover
		 $this->start_controls_tabs('tabs_button_style');
		 // for normal controls 
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_responsive_control(
			'wpe_st_text_padding',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',

			]
		);
		$this->add_control(
			'wpe_st_margin',
			[
				'label' => esc_html__('Margin', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
					'{{WRAPPER}} .your-class' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_text_color',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_text_shadow',
			[
				'label' => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_border_radius',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'textdomain'),
					'underline' => esc_html__('Underline', 'textdomain'),
					'overline' => esc_html__('Overline', 'textdomain'),
					'line-through' => esc_html__('Line Through', 'textdomain'),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'wpessential-elementor-modal' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_hover_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_hover_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_hover_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'textdomain'),
					'underline' => esc_html__('Underline', 'textdomain'),
					'overline' => esc_html__('Overline', 'textdomain'),
					'line-through' => esc_html__('Line Through', 'textdomain'),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_hover_text_shadow',
			[
				'label' => esc_html__( 'Text Shadow', 'wpessential-elementor-blocks' ),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_hover_content_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);


		$this->end_controls_tab();


	}
}
