<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Background;

use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;
use function defined;

class Slider extends Base implements Shortcodes
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
		return ['Slider', 'title', 'text'];
	}

	public function get_icon()
	{
		return 'eicon-slider-3d';
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

		
		$this->slider_content();
	
		$this->start_controls_section(
			'wpe_st_image_style',
			[
				'label' => esc_html__('Image', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->image_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_video_style',
			[
				'label' => esc_html__('Video', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->video_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_navigation_style',
			[
				'label' => esc_html__('Navigation', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->navigation_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_caption_style',
			[
				'label' => esc_html__('Caption', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->caption_style();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_pagination_style',
			[
				'label' => esc_html__('Pagination', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->pagination_style();
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



	private function slider_content( ) {
		$this->start_controls_section(
			'wpe_st_slider_content',
			[
				'label' => esc_html__('Content', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'wpe_st_skin',
			[
				'label' => esc_html__( 'Skin', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'carousel',
				'options' => [
					'carousel' => esc_html__( 'Carousel', 'wpessential-elementor-blocks' ),
					'slideshow' => esc_html__( 'Slideshow', 'wpessential-elementor-blocks' ),
					'coverflow' => esc_html__( 'Coverflow', 'wpessential-elementor-blocks' ),
				],
				'prefix_class' => 'elementor-skin-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'wpe_st_type',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Type', 'wpessential-elementor-blocks' ),
				'default' => 'image',
				'options' => [
					'image' => [
						'title' => esc_html__( 'Image', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-image-bold',
					],
					'video' => [
						'title' => esc_html__( 'Video', 'wpessential-elementor-blocks' ),
						'icon' => 'eicon-video-camera',
					],
				],
				'toggle' => false,
			]
		);

		$repeater->add_control(
			'wpe_st_image',
			[
				'label' => esc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'wpe_st_image_link_to_type',
			[
				'label' => esc_html__( 'Link', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'file' => esc_html__( 'Media File', 'wpessential-elementor-blocks' ),
					'custom' => esc_html__( 'Custom URL', 'wpessential-elementor-blocks' ),
				],
				'condition' => [
					'wpe_st_type' => 'image',
				],
			]
		);

		$repeater->add_control(
			'wpe_st_image_link_to',
			[
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'wpessential-elementor-blocks' ),
				'show_external' => 'true',
				'condition' => [
					'wpe_st_type' => 'image',
					'wpe_st_image_link_to_type' => 'custom',
				],
				'separator' => 'none',
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'wpe_st_video',
			[
				'label' => esc_html__( 'Video Link', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your video link', 'wpessential-elementor-blocks' ),
				'description' => esc_html__( 'YouTube or Vimeo link', 'wpessential-elementor-blocks' ),
				'options' => false,
				'condition' => [
					'wpe_st_type' => 'video',
				],
			]
		);

		
		$this->add_control(
			'wpe_st_slider_slides',
			[
				'label' => esc_html__( 'Slides', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wpe_st_type' => 'image', // Added default value for wpe_st_type
						'slide' => 'slide #1',
					],
					[
						'wpe_st_type' => 'image', // Added default value for wpe_st_type
						'slide' => 'slide #2',
					],
					[
						'wpe_st_type' => 'image', // Added default value for wpe_st_type
						'slide' => 'slide #3',
					],
				],
				'title_field' => '{{{ wpe_st_type}}}',
			]
		);

		// Slideshow

		// $this->start_injection( [
		// 	'of' => 'wpe_st_effect',
		// ] );

		$this->add_responsive_control(
			'slideshow_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'wpessential-elementor-blocks' ),
				'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-main-swiper' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'wpe_st_skin' => 'slideshow',
				],
			]
		);

		$this->add_control(
			'wpe_st_thumbs_title',
			[
				'label' => esc_html__( 'Thumbnails', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'wpe_st_skin' => 'slideshow',
				],
			]
		);

		// $this->end_injection();

		// $this->start_injection( [
		// 	'of' => 'wpe_st_slides_per_view',
		// ] );

		$this->add_control(
			'wpe_st_thumbs_ratio',
			[
				'label' => esc_html__( 'Ratio', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'169' => '16:9',
					'219' => '21:9',
					'43' => '4:3',
					'11' => '1:1',
				],
				'selectors_dictionary' => [
					'169' => '16 / 9',
					'219' => '21 / 9',
					'43' => '4 / 3',
					'11' => '1 / 1',
				],
				'default' => '219',
				'condition' => [
					'wpe_st_skin' => 'slideshow',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-thumbnails-swiper .elementor-carousel-image' => 'aspect-ratio: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_centered_slides',
			[
				'label' => esc_html__( 'Centered Slides', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'wpe_st_skin' => 'slideshow',
				],
				'frontend_available' => true,
			]
		);
		
		// $this->end_injection();

		// $this->start_injection( [
		// 	'of' => 'wpe_st_slides_per_view',
		// ] );

		$slides_per_view = range( 1, 10 );

		$slides_per_view = array_combine( $slides_per_view, $slides_per_view );

		$this->add_responsive_control(
			'wpe_st_slideshow_slides_per_view',
			[
				'type' => Controls_Manager::SELECT,
				'label' => esc_html__( 'Slides Per View', 'wpessential-elementor-blocks' ),
				'options' => [ '' => esc_html__( 'Default', 'wpessential-elementor-blocks' ) ] + $slides_per_view,
				
				'frontend_available' => true,
			]
		);

		//$this->end_injection();
		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_show_arrows',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => esc_html__( 'Arrows', 'wpessential-elementor-blocks' ),
				'default' => 'yes',
				'label_off' => esc_html__( 'Hide', 'wpessential-elementor-blocks' ),
				'label_on' => esc_html__( 'Show', 'wpessential-elementor-blocks' ),
				'prefix_class' => 'elementor-arrows-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_pagination',
			[
				'label' => esc_html__( 'Pagination', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bullets',
				'options' => [
					'' => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'bullets' => esc_html__( 'Dots', 'wpessential-elementor-blocks' ),
					'fraction' => esc_html__( 'Fraction', 'wpessential-elementor-blocks' ),
					'progressbar' => esc_html__( 'Progress', 'wpessential-elementor-blocks' ),
				],
				'prefix_class' => 'elementor-pagination-type-',
				'render_type' => 'template',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_speed',
			[
				'label' => esc_html__( 'Transition Duration', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_autoplay_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'wpe_st_autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_loop',
			[
				'label' => esc_html__( 'Infinite Loop', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_pause_on_hover',
			[
				'label' => esc_html__( 'Pause on Hover', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'wpe_st_autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_pause_on_interaction',
			[
				'label' => esc_html__( 'Pause on Interaction', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'wpe_st_autoplay' => 'yes',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'wpe_st_image_size',
				'default' => 'full',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_lazyload',
			[
				'label' => esc_html__( 'Lazyload', 'wpessential-elementor-blocks' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'frontend_available' => true,
			]
		);
		$this->end_controls_section();
	}

	private function image_style()
	{
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs('tabs_image_style');
		// this is the start of normal tab
		$this->start_controls_tab(
			'tab_image_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);


		$this->add_responsive_control(
			'wpe_st_image_width_normal',
			[
				'label' => esc_html__('Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_space_normal',
			[
				'label' => esc_html__('Max Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_height_normal',
			[
				'label' => esc_html__('Height', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_fit_normal',
			[
				'label' => esc_html__('Object Fit', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__('Default', 'wpessential-elementor-blocks'),
					'fill' => esc_html__('Fill', 'wpessential-elementor-blocks'),
					'cover' => esc_html__('Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__('Contain', 'wpessential-elementor-blocks'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_position_normal',
			[
				'label' => esc_html__('Object Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__('Center Center', 'wpessential-elementor-blocks'),
					'center left' => esc_html__('Center Left', 'wpessential-elementor-blocks'),
					'center right' => esc_html__('Center Right', 'wpessential-elementor-blocks'),
					'top center' => esc_html__('Top Center', 'wpessential-elementor-blocks'),
					'top left' => esc_html__('Top Left', 'wpessential-elementor-blocks'),
					'top right' => esc_html__('Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__('Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left' => esc_html__('Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right' => esc_html__('Bottom Right', 'wpessential-elementor-blocks'),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				// 'condition' => [
				// 	'object-fit' => 'cover',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_image_seperator_panel_style_normal',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->add_control(
			'wpe_st_image_opacity_nomral',
			[
				'label' => esc_html__('Opacity', 'wpessential-elementor-blocks'),
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

	

		$this->add_responsive_control(
			'wpe_st_image_padding_normal',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_image_margin',
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
					'{{WRAPPER}} .wpe-text-editor img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_image_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);






		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_image_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_image_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
	

		$this->add_responsive_control(
			'wpe_st_image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_image_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);


		$this->add_responsive_control(
			'wpe_st_image_width_hover',
			[
				'label' => esc_html__('Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_space_hover',
			[
				'label' => esc_html__('Max Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_height_hover',
			[
				'label' => esc_html__('Height', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_fit_hover',
			[
				'label' => esc_html__('Object Fit', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__('Default', 'wpessential-elementor-blocks'),
					'fill' => esc_html__('Fill', 'wpessential-elementor-blocks'),
					'cover' => esc_html__('Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__('Contain', 'wpessential-elementor-blocks'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_object_position_hover',
			[
				'label' => esc_html__('Object Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__('Center Center', 'wpessential-elementor-blocks'),
					'center left' => esc_html__('Center Left', 'wpessential-elementor-blocks'),
					'center right' => esc_html__('Center Right', 'wpessential-elementor-blocks'),
					'top center' => esc_html__('Top Center', 'wpessential-elementor-blocks'),
					'top left' => esc_html__('Top Left', 'wpessential-elementor-blocks'),
					'top right' => esc_html__('Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__('Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left' => esc_html__('Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right' => esc_html__('Bottom Right', 'wpessential-elementor-blocks'),
				],
				'default' => 'center center',
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
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_image_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_control(
			'wpe_st_image_hover_animation_hover',
			[
				'label' => esc_html__('Hover Animation', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_image_opacity_hover',
			[
				'label' => esc_html__('Opacity', 'wpessential-elementor-blocks'),
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
				'label' => esc_html__('Transition Duration', 'wpessential-elementor-blocks'),
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
	
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_image_hover_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_image_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_control(
			'wpe_st_image_hover_text_decoration',
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
			'wpe_st_image_hover_border_radius',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

	}


	private function navigation_style()
	{
		$this->start_controls_tabs('tabs_iocn_style'); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_navigation_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_control(
			'wpe_st_navigation_primary_color_normal',
			[
				'label' => esc_html__('Primary Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_navigation_border_width_normal',
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
			'wpe_st_navigation_border_color_normal',
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
		$this->add_control(
			'wpe_st_navigation_align_normal',
			[
				'label' => esc_html__('Alignment', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Start', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__('End', 'wpessential-elementor-blocks'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle' => false,
			]
		);


		$this->add_control(
			'wpe_st_navigation_color_normal',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'wpe_st_navigation_active_color_normal',
			[
				'label' => esc_html__('Active Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title.elementor-active .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_spacing_normal',
			[
				'label' => esc_html__('Spacing', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
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
			'wpe_st_navigation_size_normal',
			[
				'label' => esc_html__('Size', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_navigation_fit_to_size_normal',
			[
				'label' => esc_html__('Fit to Size', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'description' => 'Avoid gaps around icons when width and height aren\'t equal',
				'label_off' => esc_html__('Off', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('On', 'wpessential-elementor-blocks'),
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
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
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
				'name' => 'wpe_st_navigation_background_normal',
				'types' => ['classic', 'gradient', 'video'],
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
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'wpe_st_iocn_text_shadow_normal',
			[
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT_SHADOW,
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
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_navigation_color_hover',
			[
				'label' => esc_html__('Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tab-title .elementor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_navigation_border_width_hover',
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
			'wpe_st_navigation_border_color_hover',
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
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_navigation_background_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_rotate_hover',
			[
				'label' => esc_html__('Rotate', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['deg', 'grad', 'rad', 'turn', 'custom'],
				'default' => [
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i, {{WRAPPER}} .elementor-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'wpe_st_navigation_animation_hover',
			[
				'label' => esc_html__('Hover Animation', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'wpe_st_navigation_border_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
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
				'label' => esc_html__('Text Shadow', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT_SHADOW,
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

	private function caption_style()
	{

		$this->start_controls_tabs('tabs_caption_style'); /* this will create a tab in which we can make two tabs
normal and hover*/
		// for normal controls
		$this->start_controls_tab(
			'tab_caption_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_caption_background_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);


		$this->add_control(
			'wpe_st_caption_text_color_normal',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-blocks'),
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
				'name' => 'wpe_st_caption_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_caption_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_caption_padding_normal',
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
			'wpe_st_caption_margin_normal',
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_caption_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_caption_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_caption_border_radius_normal',
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
			'wpe_st_caption_text_decoration_noraml',
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

		$this->add_control(
			'wpe_st_caption_border_width_normal',
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
			'wpe_st_caption_border_color_normal',
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

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_caption_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);
		$this->add_responsive_control(
			'wpe_st_caption_alignment_normal',
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

		$this->end_controls_tab();


		$this->start_controls_tab(   // hover tab starts here
			'wpe_st_tab_caption_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_control(
			'wpe_st_caption_text_color_hover',
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
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_caption_text_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_control(
			'wpe_st_caption_border_width_hover',
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
			'wpe_st_caption_border_color_hover',
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
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_caption_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_caption_background_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_caption_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_caption_border_radius_hover',
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
			'wpe_st_caption_text_decoration_hover',
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

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_caption_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();

	}

	private function video_style()
	{
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs('tabs_video_style');
		// this is the start of normal tab
		$this->start_controls_tab(
			'tab_video_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_video_aspect_ratio_normal',
			[
				'label' => esc_html__('Aspect Ratio', 'elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'169' => '16:9',
					'219' => '21:9',
					'43' => '4:3',
					'32' => '3:2',
					'11' => '1:1',
					'916' => '9:16',
				],
				'selectors_dictionary' => [
					'169' => '1.77777', // 16 / 9
					'219' => '2.33333', // 21 / 9
					'43' => '1.33333', // 4 / 3
					'32' => '1.5', // 3 / 2
					'11' => '1', // 1 / 1
					'916' => '0.5625', // 9 / 16
				],
				'default' => '169',
				'selectors' => [
					'{{WRAPPER}} .elementor-wrapper' => '--video-aspect-ratio: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'wpe_st_video_border_width_normal',
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
			'wpe_st_video_border_color_normal',
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
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_video_border_type_normal',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
				//'condition' => $args['section_condition'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'wpe_st_video_css_filters_normal',
				'selector' => '{{WRAPPER}} .elementor-wrapper',
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_width_normal',
			[
				'label' => esc_html__('Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_space_normal',
			[
				'label' => esc_html__('Max Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_video_shape_normal',
			[
				'label' => esc_html__('Shape', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'square' => esc_html__('Square', 'wpessential-elementor-blocks'),
					'rounded' => esc_html__('Rounded', 'wpessential-elementor-blocks'),
					'circle' => esc_html__('Circle', 'wpessential-elementor-blocks'),
				],
				'default' => 'square',
				'prefix_class' => 'elementor-share-buttons--shape-',
			]
		);


		$this->add_responsive_control(
			'wpe_st_video_height_normal',
			[
				'label' => esc_html__('Height', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_object_fit_normal',
			[
				'label' => esc_html__('Object Fit', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__('Default', 'wpessential-elementor-blocks'),
					'fill' => esc_html__('Fill', 'wpessential-elementor-blocks'),
					'cover' => esc_html__('Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__('Contain', 'wpessential-elementor-blocks'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_object_position_normal',
			[
				'label' => esc_html__('Object Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__('Center Center', 'wpessential-elementor-blocks'),
					'center left' => esc_html__('Center Left', 'wpessential-elementor-blocks'),
					'center right' => esc_html__('Center Right', 'wpessential-elementor-blocks'),
					'top center' => esc_html__('Top Center', 'wpessential-elementor-blocks'),
					'top left' => esc_html__('Top Left', 'wpessential-elementor-blocks'),
					'top right' => esc_html__('Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__('Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left' => esc_html__('Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right' => esc_html__('Bottom Right', 'wpessential-elementor-blocks'),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				// 'condition' => [
				// 	'object-fit' => 'cover',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_video_seperator_panel_style_normal',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);




		$this->add_responsive_control(
			'wpe_st_video_padding_normal',
			[
				'label' => esc_html__('Padding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',

			]
		);
		$this->add_responsive_control(
			'wpe_st_video_margin_normal',
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
					'{{WRAPPER}} .wpe-text-editor img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_video_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);






		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_video_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);

		

		$this->add_responsive_control(
			'wpe_st_video_border_radius_normal',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'wpe_st_tab_video_hover',
			[
				'label' => esc_html__('Hover', 'wpessential-elementor-blocks'),
			]
		);



		$this->add_control(
			'wpe_st_video_aspect_ratio_hover',
			[
				'label' => esc_html__('Aspect Ratio', 'elementor'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'169' => '16:9',
					'219' => '21:9',
					'43' => '4:3',
					'32' => '3:2',
					'11' => '1:1',
					'916' => '9:16',
				],
				'selectors_dictionary' => [
					'169' => '1.77777', // 16 / 9
					'219' => '2.33333', // 21 / 9
					'43' => '1.33333', // 4 / 3
					'32' => '1.5', // 3 / 2
					'11' => '1', // 1 / 1
					'916' => '0.5625', // 9 / 16
				],
				'default' => '169',
				'selectors' => [
					'{{WRAPPER}} .elementor-wrapper' => '--video-aspect-ratio: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'wpe_st_video_css_filters_hover',
				'selector' => '{{WRAPPER}} .elementor-wrapper',
			]
		);
		$this->add_responsive_control(
			'wpe_st_video_width_hover',
			[
				'label' => esc_html__('Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_space_hover',
			[
				'label' => esc_html__('Max Width', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
				'range' => [
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
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_video_shape_hover',
			[
				'label' => esc_html__('Shape', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'square' => esc_html__('Square', 'wpessential-elementor-blocks'),
					'rounded' => esc_html__('Rounded', 'wpessential-elementor-blocks'),
					'circle' => esc_html__('Circle', 'wpessential-elementor-blocks'),
				],
				'default' => 'square',
				'prefix_class' => 'elementor-share-buttons--shape-',
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_height_hover',
			[
				'label' => esc_html__('Height', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_object_fit_hover',
			[
				'label' => esc_html__('Object Fit', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__('Default', 'wpessential-elementor-blocks'),
					'fill' => esc_html__('Fill', 'wpessential-elementor-blocks'),
					'cover' => esc_html__('Cover', 'wpessential-elementor-blocks'),
					'contain' => esc_html__('Contain', 'wpessential-elementor-blocks'),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_video_object_position_hover',
			[
				'label' => esc_html__('Object Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => esc_html__('Center Center', 'wpessential-elementor-blocks'),
					'center left' => esc_html__('Center Left', 'wpessential-elementor-blocks'),
					'center right' => esc_html__('Center Right', 'wpessential-elementor-blocks'),
					'top center' => esc_html__('Top Center', 'wpessential-elementor-blocks'),
					'top left' => esc_html__('Top Left', 'wpessential-elementor-blocks'),
					'top right' => esc_html__('Top Right', 'wpessential-elementor-blocks'),
					'bottom center' => esc_html__('Bottom Center', 'wpessential-elementor-blocks'),
					'bottom left' => esc_html__('Bottom Left', 'wpessential-elementor-blocks'),
					'bottom right' => esc_html__('Bottom Right', 'wpessential-elementor-blocks'),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} img' => 'object-position: {{VALUE}};',
				],
				// 'condition' => [
				// 	'object-fit' => 'cover',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_video_seperator_panel_style_hover',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_video_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->add_control(
			'wpe_st_video_hover_animation_hover',
			[
				'label' => esc_html__('Hover Animation', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_control(
			'wpe_st_video_opacity_hover',
			[
				'label' => esc_html__('Opacity', 'wpessential-elementor-blocks'),
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
			'wpe_st_video_transion_hover',
			[
				'label' => esc_html__('Transition Duration', 'wpessential-elementor-blocks'),
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

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_video_hover_background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_video_hover_border',
				'selector' => '{{WRAPPER}} .wpe-text-editor img',
			]
		);


		$this->add_responsive_control(
			'wpe_st_video_hover_border_radius',
			[
				'label' => esc_html__('Border Radius', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_video_border_width_hover',
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
			'wpe_st_video_border_color_hover',
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

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_video_border_type_hover',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
				//'condition' => $args['section_condition'],
			]
		);



		$this->end_controls_tab();

		$this->end_controls_tabs();

	}

	private function pagination_style()
	{
		// this will be contain two tabs normal and hover inside
		$this->start_controls_tabs('tabs_pagination_style');
		// this is the start of normal tab
		$this->start_controls_tab(
			'tab_pagination_normal',
			[
				'label' => esc_html__('Normal', 'wpessential-elementor-blocks'),
			]
		);

		$this->add_control(
			'wpe_st_pagination_position',
			[
				'label' => esc_html__('Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => esc_html__('Outside', 'wpessential-elementor-blocks'),
					'inside' => esc_html__('Inside', 'wpessential-elementor-blocks'),
				],
				'prefix_class' => 'elementor-pagination-position-',
				// 'condition' => [
				// 	'pagination!' => '',
				// ],
			]
		);


		$this->add_responsive_control(
			'wpe_st_pagination_size',
			[
				'label' => esc_html__('Size', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', 'rem', 'custom'],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .swiper-pagination-fraction' => 'font-size: {{SIZE}}{{UNIT}}',
				],
				// 'condition' => [
				// 	'pagination!' => '',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_pagination_color_inactive',
			[
				'label' => esc_html__('Inactive Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// The opacity property will override the default inactive dot color which is opacity 0.2.
					'{{WRAPPER}} .swiper-pagination-bullet:not(.swiper-pagination-bullet-active)' => 'background-color: {{VALUE}}; opacity: 1;',
				],
				// 'condition' => [
				// 	'pagination!' => '',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_pagination_active_color',
			[
				'label' => esc_html__('Active Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active, {{WRAPPER}} .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .swiper-pagination-fraction' => 'color: {{VALUE}}',
				],
				// 'condition' => [
				// 	'pagination!' => '',
				// ],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_pagination_background_normal',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-accordion content',
			]
		);

		$this->add_control(
			'wpe_st_pagination_color_normal',
			[
				'label' => esc_html__('Text Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpe-text-editor a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpe_st_pagination_typograpgy_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_pagination_text_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_responsive_control(
			'wpe_st_pagination_padding_normal',
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
			'wpe_st_pagination_margin_normal',
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
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_pagination_text_stroke_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_pagination_border_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_pagination_border_radius_normal',
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
			'wpe_st_pagination_text_decoration_noraml',
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

		$this->add_control(
			'wpe_st_pagination_border_width_normal',
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
			'wpe_st_pagination_border_color_normal',
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

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_pagination_box_shadow_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
			'tab_caption_hover',
			[
				'label' => esc_html__('hover', 'wpessential-elementor-blocks'),
			]
		);
		$this->add_control(
			'wpe_st_pagination_position_hover',
			[
				'label' => esc_html__('Position', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => esc_html__('Outside', 'wpessential-elementor-blocks'),
					'inside' => esc_html__('Inside', 'wpessential-elementor-blocks'),
				],
				'prefix_class' => 'elementor-pagination-position-',
				// 'condition' => [
				// 	'pagination!' => '',
				// ],
			]
		);

		$this->add_control(
			'wpe_st_pagination_text_color_hover',
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
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wpe_st_pagination_text_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);


		$this->add_control(
			'wpe_st_pagination_border_width_hover',
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
			'wpe_st_pagination_border_color_hover',
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
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'wpe_st_pagination_text_stroke_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'wpe_st_pagination_background_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wpe_st_pagination_border_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_responsive_control(
			'wpe_st_pagination_border_radius_hover',
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
			'wpe_st_pagination_text_decoration_hover',
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

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wpe_st_pagination_box_shadow_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor ',
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();


	}


}