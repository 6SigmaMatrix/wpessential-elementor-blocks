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

class Gallery extends Base implements Shortcodes
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
		return [ 'Gallery', 'title', 'text' ];
	}

	public function set_widget_icon ()
	{
		return "eicon-justified-gallery";
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
			'wpe_st_image_style',
			[
				'label' => esc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->image_style();
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


		
		$this->add_responsive_control(
			'wpe_st_image_width_normal',
			[
				'label'          => esc_html__( 'Width', 'wpessential-elementor-blocks'),
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
				'label'          => esc_html__( 'Max Width', 'wpessential-elementor-blocks'),
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
				'label'      => esc_html__( 'Height', 'wpessential-elementor-blocks'),
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
				'label'     => esc_html__( 'Object Fit', 'wpessential-elementor-blocks'),
				'type'      => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options'   => [
					''        => esc_html__( 'Default', 'wpessential-elementor-blocks'),
					'fill'    => esc_html__( 'Fill', 'wpessential-elementor-blocks'),
					'cover'   => esc_html__( 'Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__( 'Contain', 'wpessential-elementor-blocks'),
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
				'label'     => esc_html__( 'Object Position', 'wpessential-elementor-blocks'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center center' => esc_html__( 'Center Center', 'wpessential-elementor-blocks'),
					'center left'   => esc_html__( 'Center Left', 'wpessential-elementor-blocks'),
					'center right'  => esc_html__( 'Center Right', 'wpessential-elementor-blocks'),
					'top center'    => esc_html__( 'Top Center', 'wpessential-elementor-blocks'),
					'top left'      => esc_html__( 'Top Left', 'wpessential-elementor-blocks'),
					'top right'     => esc_html__( 'Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__( 'Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left'   => esc_html__( 'Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right'  => esc_html__( 'Bottom Right', 'wpessential-elementor-blocks'),
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
				'label' => esc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image-box-img img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
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
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_image_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
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

			
		$this->add_responsive_control(
			'wpe_st_image_width_hover',
			[
				'label'          => esc_html__( 'Width', 'wpessential-elementor-blocks'),
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
				'label'          => esc_html__( 'Max Width', 'wpessential-elementor-blocks'),
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
				'label'      => esc_html__( 'Height', 'wpessential-elementor-blocks'),
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
				'label'     => esc_html__( 'Object Fit', 'wpessential-elementor-blocks'),
				'type'      => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options'   => [
					''        => esc_html__( 'Default', 'wpessential-elementor-blocks'),
					'fill'    => esc_html__( 'Fill', 'wpessential-elementor-blocks'),
					'cover'   => esc_html__( 'Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__( 'Contain', 'wpessential-elementor-blocks'),
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
				'label'     => esc_html__( 'Object Position', 'wpessential-elementor-blocks'),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center center' => esc_html__( 'Center Center', 'wpessential-elementor-blocks'),
					'center left'   => esc_html__( 'Center Left', 'wpessential-elementor-blocks'),
					'center right'  => esc_html__( 'Center Right', 'wpessential-elementor-blocks'),
					'top center'    => esc_html__( 'Top Center', 'wpessential-elementor-blocks'),
					'top left'      => esc_html__( 'Top Left', 'wpessential-elementor-blocks'),
					'top right'     => esc_html__( 'Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__( 'Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left'   => esc_html__( 'Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right'  => esc_html__( 'Bottom Right', 'wpessential-elementor-blocks'),
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
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_image_opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
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
				'label' => esc_html__( 'Transition Duration', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
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
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_image_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
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

}


