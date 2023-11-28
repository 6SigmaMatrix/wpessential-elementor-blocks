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
	public function register_controls()
	{
// For anchor styles
		$this->start_controls_section(
			'wpe_st_anchor_style',
			[
				'label' => esc_html__('Anchor Style', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->anchor_style();
		$this->end_controls_section();
// For Paragraph styles 
$this->start_controls_section(
	'wpe_st_paragraph_style',
	[
		'label' => esc_html__('Paragraph Style', 'wpessential-elementor-blocks'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);
$this->paragraph_style();
$this->end_controls_section();

// For button styles 
$this->start_controls_section(
	'wpe_st_button_style',
	[
		'label' => esc_html__('Button Style', 'wpessential-elementor-blocks'),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);
$this->button_style();
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
		$this->start_controls_tabs('tabs_anchor_style');
		// for normal controls 
		$this->start_controls_tab(
			'tab_anchor_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_anchor_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_responsive_control(
			'wpe_st_anchor_text_padding',
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
			'wpe_st_anchor_margin',
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
				'name' => 'wpe_st_anchor_text_stroke',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_anchor_text_color',
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
				'name' => 'wpe_st_anchor_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_anchor_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_anchor_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_anchor_border_radius',
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
			'wpe_st_anchor_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_anchor_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_anchor_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_anchor_hover_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_anchor_hover_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_anchor_hover_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_anchor_hover_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_anchor_hover_anchor_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}
	private function paragraph_style()
	{
		// this will set condtion for normal or hover
		$this->start_controls_tabs('tabs_paragraph_style');
		// for normal controls 
		$this->start_controls_tab(
			'tab_paragraph_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_paragraph_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_responsive_control(
			'wpe_st_paragraph_text_padding',
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
			'wpe_st_paragraph_margin',
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
				'name' => 'wpe_st_paragraph_text_stroke',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_paragraph_text_color',
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
				'name' => 'wpe_st_paragraph_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_paragraph_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_paragraph_border_radius',
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
			'wpe_st_paragraph_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_paragraph_tab_paragraph_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_paragraph_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_paragraph_hover_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_paragraph_hover_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_paragraph_hover_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_paragraph_hover_paragraph_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

	private function button_style()
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
				'name' => 'wpe_st_button_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_responsive_control(
			'wpe_st_button_text_padding',
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
		$this->add_responsive_control(
			'wpe_st_button_margin',
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
				'name' => 'wpe_st_button_text_stroke',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_control(
			'wpe_st_button_text_color',
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
				'name' => 'wpe_st_button_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_button_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_button_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_button_border_radius',
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
			'wpe_st_button_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_button_tab_button_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_button_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_button_hover_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_button_hover_border',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'wpe_st_button_text_decoration',
			[
				'label' => esc_html__('Text Decoration', 'wpessential-elementor-modal'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'wpessential-elementor-modal'),
					'underline' => esc_html__('Underline', 'wpessential-elementor-modal'),
					'overline' => esc_html__('Overline', 'wpessential-elementor-modal'),
					'line-through' => esc_html__('Line Through', 'wpessential-elementor-modal'),
				],
				'default' => 'none',
			]
		);
		$this->add_control(
			'wpe_st_button_hover_text_shadow',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}}' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_button_hover_button_typography',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		$this->add_control(
			'heading_level',
			[
				'label' => esc_html__('Heading Level', 'wpessential-elementor-blocks'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2', // Set the default heading level
				'options' => [
					'h1' => esc_html__('Heading 1', 'wpessential-elementor-blocks'),
					'h2' => esc_html__('Heading 2', 'wpessential-elementor-blocks'),
					'h3' => esc_html__('Heading 3', 'wpessential-elementor-blocks'),
					'h4' => esc_html__('Heading 4', 'wpessential-elementor-blocks'),
					'h5' => esc_html__('Heading 5', 'wpessential-elementor-blocks'),
					'h6' => esc_html__('Heading 6', 'wpessential-elementor-blocks'),
				],
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}

}
