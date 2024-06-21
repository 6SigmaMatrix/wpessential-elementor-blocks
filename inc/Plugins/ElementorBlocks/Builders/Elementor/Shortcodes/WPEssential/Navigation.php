<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! defined( 'ABSPATH' ) )
{
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

class Navigation extends Base implements Shortcodes
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
		return [ 'Navigation', 'title', 'text' ];
	}

	public function set_widget_icon ()
	{
		return 'eicon-navigation-horizontal';
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
			'wpe_st_navigation_content',
			[
				'label' => esc_html__( 'Navigation Content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->navigation_content();
		$this->end_controls_section();
		$this->start_controls_section(
			'wpe_st_label_style',
			[
				'label' => esc_html__( 'Label', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->label_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_title_style',
			[
				'label' => esc_html__( 'Title', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->title_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_navigation_icon_style',
			[
				'label' => esc_html__( 'Navigation Icons', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->navigation_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_navigation_border_style',
			[
				'label' => esc_html__( 'Borders', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->borders_style();
		$this->end_controls_section();

	}

	private function navigation_content ()
	{
		$this->add_control(
			'wpe_st_show_label',
			[
				'label'     => esc_html__( 'Label', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wpessential-elementor-blocks' ),
				'label_off' => esc_html__( 'Hide', 'wpessential-elementor-blocks' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'wpe_st_prev_label',
			[
				'label'   => esc_html__( 'Previous Label', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Previous', 'wpessential-elementor-blocks' ),
				'condition' => [
					'wpe_st_show_label' => 'yes',
				],
			]
		);

		$this->add_control(
			'wpe_st_next_label',
			[
				'label'   => esc_html__( 'Next Label', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Next', 'wpessential-elementor-blocks' ),
				'condition' => [
					'wpe_st_show_label' => 'yes',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'wpe_st_show_arrow',
			[
				'label'     => esc_html__( 'Arrows', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wpessential-elementor-blocks' ),
				'label_off' => esc_html__( 'Hide', 'wpessential-elementor-blocks' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'wpe_st_arrow',
			[
				'label'   => esc_html__( 'Arrows Type', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'fa fa-angle-left'          => esc_html__( 'Angle', 'wpessential-elementor-blocks' ),
					'fa fa-angle-double-left'   => esc_html__( 'Double Angle', 'wpessential-elementor-blocks' ),
					'fa fa-chevron-left'        => esc_html__( 'Chevron', 'wpessential-elementor-blocks' ),
					'fa fa-chevron-circle-left' => esc_html__( 'Chevron Circle', 'wpessential-elementor-blocks' ),
					'fa fa-caret-left'          => esc_html__( 'Caret', 'wpessential-elementor-blocks' ),
					'fa fa-arrow-left'          => esc_html__( 'Arrow', 'wpessential-elementor-blocks' ),
					'fa fa-long-arrow-left'     => esc_html__( 'Long Arrow', 'wpessential-elementor-blocks' ),
					'fa fa-arrow-circle-left'   => esc_html__( 'Arrow Circle', 'wpessential-elementor-blocks' ),
					'fa fa-arrow-circle-o-left' => esc_html__( 'Arrow Circle Negative', 'wpessential-elementor-blocks' ),
				],
				'default' => 'fa fa-angle-left',
				'condition' => [
					'wpe_st_show_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'wpe_st_show_title',
			[
				'label'     => esc_html__( 'Post Title', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'wpessential-elementor-blocks' ),
				'label_off' => esc_html__( 'Hide', 'wpessential-elementor-blocks' ),
				'default'   => 'yes',
			]
		);

		//Filter out post type without taxonomies
		$post_type_options = wpe_get_post_types();
		$post_type_taxonomies = [];
		foreach ( $post_type_options as $post_type => $post_type_label )
		{
			$taxonomies = wpe_get_taxonomies( [ 'object_type' => [ $post_type ] ] );
			if ( empty ( $taxonomies ) )
			{
				continue;
			}

			$post_type_taxonomies[ $post_type ] = [];
			foreach ( $taxonomies as $taxonomy => $name )
			{
				if ( $taxonomy === 'no' )
				{
					unset( $post_type_taxonomies[ $post_type ], $post_type_options[ $post_type ] );
					continue;
				}
				$post_type_taxonomies[ $post_type ][ $taxonomy ] = $name;
			}
		}

		$this->add_control(
			'wpe_st_in_same_term',
			[
				'label'       => esc_html__( 'In same Term', 'wpessential-elementor-blocks' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => $post_type_options,
				'default'     => '',
				'multiple'    => true,
				'label_block' => true,
				'description' => esc_html__( 'Indicates whether next post must be within the same taxonomy term as the current post, this lets you set a taxonomy per each post type', 'wpessential-elementor-blocks' ),
			]
		);

		foreach ( $post_type_options as $post_type => $post_type_label )
		{
			$this->add_control(
				"wpe_st_{$post_type}_taxonomy",
				[
					'label'   => $post_type_label . ' ' . esc_html__( 'Taxonomy', 'wpessential-elementor-blocks' ),
					'type'    => Controls_Manager::SELECT,
					'options' => wpe_array_get( $post_type_taxonomies, $post_type ),
					'default' => '',
					'condition' => [
						'wpe_st_in_same_term' => $post_type,
					],
				]
			);
		}
	}

	private function label_style ()
	{

		$this->start_controls_tabs( 'tabs_label_style' );/* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_label_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_label_color_normal',
			[
				'label'     => esc_html__( 'Label Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
				'condition' => [ 'wpe_st_general_setting_color' => 'custom' ],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'wpe_st_label_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'wpe_st_label_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_label_padding_normal',
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
			'wpe_st_label_margin_normal',
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
				'name'     => 'wpe_st_label_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_label_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_label_border_radius_normal',
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
			'wpe_st_label_text_decoration_noraml',
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
			'wpe_st_label_border_width_normal',
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
			'wpe_st_label_border_color_normal',
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
				'name'     => 'wpe_st_label_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_label_alignment_normal',
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
			'wpe_st_tab_label_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_label_text_color_hover',
			[
				'label'     => esc_html__( 'Label Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
				'condition' => [ 'wpe_st_general_setting_color' => 'custom' ],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'wpe_st_label_text_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_control(
			'wpe_st_label_border_width_hover',
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
			'wpe_st_label_border_color_hover',
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
				'name'     => 'wpe_st_label_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_label_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_label_border_radius_hover',
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
			'wpe_st_label_text_decoration_hover',
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
				'name'     => 'wpe_st_label_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

	}

	private function title_style ()
	{

		$this->start_controls_tabs( 'tabs_title_style' );/* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_title_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_control(
			'wpe_st_title_color_normal',
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
		$this->add_control(
			'wpe_st_title_text_color_normal',
			[
				'label'   => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_title_active_color_normal',
			[
				'label'     => esc_html__( 'Active Color', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-active .elementor-accordion-icon, {{WRAPPER}} .elementor-active .elementor-accordion-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-active .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
				'global'    => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_title_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_title_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_title_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_title_padding_normal',
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
			'wpe_st_title_margin_normal',
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
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_title_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->add_control(
			'wpe_st_title_text_decoration_noraml',
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

		$this->add_responsive_control(
			'wpe_st_title_alignment_normal',
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

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_title_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_control(
			'wpe_st_title_border_width_normal',
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
			'wpe_st_title_border_color_normal',
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

		$this->end_controls_tab();// normal tabs end here

		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_title_hover_animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_title_text_color_hover',
			[
				'label'   => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_title_color_hover',
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_title_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_title_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'  => 'wpe_st_title_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_title_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->add_control(
			'wpe_st_title_text_decoration_hover',
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
		$this->add_responsive_control(
			'wpe_st_title_border_radius_hover',
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
			'wpe_st_title_border_width_hover',
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
			'wpe_st_title_border_color_hover',
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

		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function navigation_style ()
	{
		$this->start_controls_tabs( 'tabs_iocn_style' ); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_navigation_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);
		$this->add_control(
			'wpe_st_navigation_primary_color_normal',
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
			'wpe_st_navigation_border_width_normal',
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
			'wpe_st_navigation_border_color_normal',
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
			'wpe_st_navigation_align_normal',
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
			'wpe_st_navigation_color_normal',
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
			'wpe_st_navigation_active_color_normal',
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
			'wpe_st_navigation_spacing_normal',
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
			'wpe_st_navigation_margin_normal',
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
			'wpe_st_navigation_size_normal',
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
			'wpe_st_navigation_fit_to_size_normal',
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
			'wpe_st_navigation_padding_normal',
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
				'name'  => 'wpe_st_navigation_background_normal',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_navigation_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor icon',
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_border_radius_normal',
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
				'name' => 'wpe_st_navigation_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_navigation_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_navigation_color_hover',
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
			'wpe_st_navigation_border_width_hover',
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
			'wpe_st_navigation_border_color_hover',
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
				'name'  => 'wpe_st_navigation_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_rotate_hover',
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
			'wpe_st_navigation_animation_hover',
			[
				'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_border_radius_hover',
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
				'name' => 'wpe_st_navigation_border_hover',
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
				'name' => 'wpe_st_navigation_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs(); // the tab in which normal and hover are present .that tab ends here
	}

	private function borders_style ()
	{

		$this->start_controls_tabs( 'tabs_border_style' );/* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_border_normal',
			[
				'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_border_border_type_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_control(
			'wpe_st_border_border_color_normal',
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
			'wpe_st_border_border_width_normal',
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

		$this->add_responsive_control(
			'wpe_st_border_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_border_border_gap_normal',
			[
				'label'      => esc_html__( 'Border Gap', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .elementor-blockquote__content +.e-q-footer' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_border_hover',
			[
				'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_border_border_type_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_control(
			'wpe_st_border_border_color_hover',
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
			'wpe_st_border_border_width_hover',
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

		$this->add_responsive_control(
			'wpe_st_border_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_border_border_gap_hover',
			[
				'label'      => esc_html__( 'Border Gap', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .elementor-blockquote__content +.e-q-footer' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
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
