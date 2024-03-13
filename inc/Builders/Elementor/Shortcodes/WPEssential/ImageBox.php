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


class ImageBox extends Base implements Shortcodes
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
		return [ 'ImageBox', 'title', 'text', 'Image' ];
	}

	public function get_icon ()
	{
		return 'eicon-image-box';
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
			'wpe_st_image_box_content_tab',
			[
				'label' => esc_html__( 'Image Content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->image_box_content();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_box_style',
			[
				'label' => esc_html__( 'Box', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->box_style();
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
				'label' => esc_html__( 'Content', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->content_style();
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
	public function render () {
		
	}


	private function image_box_content()
	{

		$this->add_control(
			'wpe_st_image',
			[
				'label' => esc_html__( 'Choose Image', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'wpe_st_thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'image[url]!' => '',
				],
			]
		);

		$this->add_control(
			'wpe_st_title_text',
			[
				'label' => esc_html__( 'Title', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'This is the heading', 'wpessential-elementor-blocks' ),
				'placeholder' => esc_html__( 'Enter your title', 'wpessential-elementor-blocks' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'wpe_st_description_text',
			[
				'label' => esc_html__( 'Description', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'wpessential-elementor-blocks' ),
				'placeholder' => esc_html__( 'Enter your description', 'wpessential-elementor-blocks' ),
				'separator' => 'none',
				'rows' => 10,
			]
		);

		$this->add_control(
			'wpe_st_link',
			[
				'label' => esc_html__( 'Link', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_title_size',
			[
				'label' => esc_html__( 'Title HTML Tag', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SELECT,
				'options' => wpe_heading_tags (),
				'default' => 'h3',
			]
		);

		$this->add_control(
			'wpe_st_view',
			[
				'label' => esc_html__( 'View', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
	}
	private function box_style ()
	{


		$this->start_controls_tabs( 'tabs_button_styles' );/* this will create a tab in which we can make two tabs
		normal and hover*/
		// for normal controls

		$this->add_control(
			'wpe_st_image_position_normal',
			[
				'label'        => esc_html__( 'Image Position', 'wpessential-elementor-blocks' ),
				'type'         => Controls_Manager::CHOOSE,
				'default'      => 'top',
				'options'      => [
					'left'  => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-left',
					],
					'top'   => [
						'title' => esc_html__( 'Top', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle'       => true,
				// 'condition' => [
				// 	'image[url]!' => '',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_image_vertical_alignment_normal',
			[
				'label'        => esc_html__( 'Vertical Alignment', 'wpessential-elementor-blocks' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'top'    => [
						'title' => esc_html__( 'Top', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'      => 'top',
				'toggle'       => false,
				'prefix_class' => 'elementor-vertical-align-',
				// 'condition' => [
				// 	'position!' => 'top',
				// ],
			]
		);


		$this->end_controls_tabs();

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
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_image_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
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
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'wpe_st_image_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
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

	

}
