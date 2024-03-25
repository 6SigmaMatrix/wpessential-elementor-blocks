<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! \defined( 'ABSPATH' ) ) {
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

class Image extends Base implements Shortcodes
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
		return [ 'image', 'featured image', 'post image' ];
	}

	public function set_title ()
	{
		return 'Image';
	}

	public function set_widget_icon ()
	{
		return 'eicon-image';
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
		// CONTENT TAB

		$this->start_controls_section(
			'wpe_st_section_image',
			[
				'label' => esc_html__( 'Image ', 'wpessential-elementor-blocks' ),
			]
		);

		$this->add_control(
			'wpe_st_image',
			[
				'label'   => esc_html__( 'Choose Image', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'wpe_st_image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'   => 'large',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'wpe_st_align',
			[
				'label'     => esc_html__( 'Alignment', 'wpessential-elementor-blocks' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential-elementor-blocks' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'wpe_st_caption_source',
			[
				'label'   => esc_html__( 'Caption', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'none'       => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'attachment' => esc_html__( 'Attachment Caption', 'wpessential-elementor-blocks' ),
					'custom'     => esc_html__( 'Custom Caption', 'wpessential-elementor-blocks' ),
				],
				'default' => 'none',
			]
		);

		$this->add_control(
			'wpe_st_caption',
			[
				'label'       => esc_html__( 'Custom Caption', 'wpessential-elementor-blocks' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => esc_html__( 'Enter your image caption', 'wpessential-elementor-blocks' ),
				'condition'   => [
					'wpe_st_caption_source' => 'custom',
				],
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'wpe_st_link_to',
			[
				'label'   => esc_html__( 'Link', 'wpessential-elementor-blocks' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => apply_filters( 'wpe/elementor/image/link_opt', [
					'none'   => esc_html__( 'None', 'wpessential-elementor-blocks' ),
					'file'   => esc_html__( 'Media File', 'wpessential-elementor-blocks' ),
					'custom' => esc_html__( 'Custom URL', 'wpessential-elementor-blocks' )
				] ),
			]
		);

		$this->add_control(
			'wpe_st_link',
			[
				'label'      => esc_html__( 'Link', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::URL,
				'dynamic'    => [
					'active' => true,
				],
				'condition'  => [
					'wpe_st_link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->end_controls_section();


		//   FOT STYLE TAB
		$this->start_controls_section(
			'wpe_st_image_style',
			[
				'label' => esc_html__( 'Image', 'wpessential-elementor-blocks' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->image_style();
		$this->end_controls_section();

		/* $this->start_controls_section(
		 	'section_style_image',
		 	[
		 		'label' => esc_html__( 'Image cto', 'wpessential-elementor-blocks' ),
		 		'tab'   => Controls_Manager::TAB_STYLE,
		 	]
		 );

		 $this->add_responsive_control(
		 	'width',
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
		 	'space',
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
		 	'height',
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
		 	'object-fit',
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
		 	'object-position',
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
		 	'separator_panel_style',
		 	[
		 		'type'  => Controls_Manager::DIVIDER,
		 		'style' => 'thick',
		 	]
		 );

		 $this->start_controls_tabs( 'image_effects' );

		 $this->start_controls_tab( 'normal',
		 	[
		 		'label' => esc_html__( 'Normal', 'wpessential-elementor-blocks' ),
		 	]
		 );

		 $this->add_control(
		 	'opacity',
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
		 			'{{WRAPPER}} img' => 'opacity: {{SIZE}};',
		 		],
		 	]
		 );

		 $this->add_group_control(
		 	Group_Control_Css_Filter::get_type(),
		 	[
		 		'name'     => 'css_filters',
		 		'selector' => '{{WRAPPER}} img',
		 	]
		 );

		 $this->end_controls_tab();

		 $this->start_controls_tab( 'hover',
		 	[
		 		'label' => esc_html__( 'Hover', 'wpessential-elementor-blocks' ),
		 	]
		 );

		 $this->add_control(
		 	'opacity_hover',
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
		 			'{{WRAPPER}}:hover img' => 'opacity: {{SIZE}};',
		 		],
		 	]
		 );

		 $this->add_group_control(
		 	Group_Control_Css_Filter::get_type(),
		 	[
		 		'name'     => 'css_filters_hover',
		 		'selector' => '{{WRAPPER}}:hover img',
		 	]
		 );

		 $this->add_control(
		 	'background_hover_transition',
		 	[
		 		'label'     => esc_html__( 'Transition Duration', 'wpessential-elementor-blocks' ),
		 		'type'      => Controls_Manager::SLIDER,
		 		'range'     => [
		 			'px' => [
		 				'max'  => 3,
		 				'step' => 0.1,
		 			],
		 		],
		 		'selectors' => [
		 			'{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
		 		],
		 	]
		 );

		 $this->add_control(
		 	'hover_animation',
		 	[
		 		'label' => esc_html__( 'Hover Animation', 'wpessential-elementor-blocks' ),
		 		'type'  => Controls_Manager::HOVER_ANIMATION,
		 	]
		 );

		 $this->end_controls_tab();

		 $this->end_controls_tabs();

		 $this->add_group_control(
		 	Group_Control_Border::get_type(),
		 	[
		 		'name'      => 'image_border',
		 		'selector'  => '{{WRAPPER}} img',
		 		'separator' => 'before',
		 	]
		 );

		 $this->add_responsive_control(
		 	'image_border_radius',
		 	[
		 		'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
		 		'type'       => Controls_Manager::DIMENSIONS,
		 		'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
		 		'selectors'  => [
		 			'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		 		],
		 	]
		 );

		 $this->add_group_control(
		 	Group_Control_Box_Shadow::get_type(),
		 	[
		 		'name'     => 'image_box_shadow',
		 		'exclude'  => [
		 			'box_shadow_position',
		 		],
		 		'selector' => '{{WRAPPER}} img',
		 	]
		 );

		 $this->end_controls_section();

		 $this->start_controls_section(
		 	'section_style_caption',
		 	[
		 		'label'     => esc_html__( 'Caption', 'wpessential-elementor-blocks' ),
		 		'tab'       => Controls_Manager::TAB_STYLE,
		 		'condition' => [
		 			'wpe_st_caption_source!' => 'none',
		 		],
		 	]
		 );

		 $this->add_responsive_control(
		 	'caption_align',
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
		 			'{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
		 		],
		 	]
		 );

		 $this->add_control(
		 	'text_color',
		 	[
		 		'label'     => esc_html__( 'Text Color', 'wpessential-elementor-blocks' ),
		 		'type'      => Controls_Manager::COLOR,
		 		'default'   => '',
		 		'selectors' => [
		 			'{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
		 		],
		 		'global'    => [
		 			'default' => Global_Colors::COLOR_TEXT,
		 		],
		 	]
		 );

		 $this->add_control(
		 	'caption_background_color',
		 	[
		 		'label'     => esc_html__( 'Background Color', 'wpessential-elementor-blocks' ),
		 		'type'      => Controls_Manager::COLOR,
		 		'selectors' => [
		 			'{{WRAPPER}} .widget-image-caption' => 'background-color: {{VALUE}};',
		 		],
		 	]
		 );

		 $this->add_group_control(
		 	Group_Control_Typography::get_type(),
		 	[
		 		'name'     => 'caption_typography',
		 		'selector' => '{{WRAPPER}} .widget-image-caption',
		 		'global'   => [
		 			'default' => Global_Typography::TYPOGRAPHY_TEXT,
		 		],
		 	]
		 );

		 $this->add_group_control(
		 	Group_Control_Text_Shadow::get_type(),
		 	[
		 		'name'     => 'caption_text_shadow',
		 		'selector' => '{{WRAPPER}} .widget-image-caption',
		 	]
		 );

		 $this->add_responsive_control(
		 	'caption_space',
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
		 			'{{WRAPPER}} .widget-image-caption' => 'margin-top: {{SIZE}}{{UNIT}};',
		 		],
		 	]
		 );

		 $this->end_controls_section();*/
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
				'default'        => [ 'unit' => '%' ],
				'tablet_default' => [ 'unit' => '%' ],
				'mobile_default' => [ 'unit' => '%' ],
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'wpe_st_image_space_normal',
			[
				'label'          => esc_html__( 'Max Width', 'wpessential-elementor-blocks' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => [ 'unit' => '%' ],
				'tablet_default' => [ 'unit' => '%' ],
				'mobile_default' => [ 'unit' => '%' ],
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'max-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'max-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'object-fit: {{VALUE}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'object-fit: {{VALUE}};',
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'object-position: {{VALUE}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'object-position: {{VALUE}};',
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'opacity: {{VALUE}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'opacity: {{VALUE}};',
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
			'wpe_st_image_padding_normal',
			[
				'label'      => esc_html__( 'Padding', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} span.wpe-image-span-wrapper'                => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} span.wpe-image-span-wrapper > figure > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wpe-image-wrapper'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .wpe-image-wrapper a' => 'color: {{VALUE}}',
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

	/**
	 * Render image widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	public function render ()
	{
		$settings = wpe_gen_attr( $this->get_settings_for_display() );
		echo do_shortcode( shortcode_unautop( "[{$this->get_base_name()} {$settings}]" ) );
	}

}
