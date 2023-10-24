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
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;

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
		return [ 'heading', 'title', 'text' ];
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
			'section_image',
			[
				'label' => esc_html__( 'Image', 'wpessential' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'wpessential' ),
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
				'name'      => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'   => 'large',
				'separator' => 'none',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => esc_html__( 'Alignment', 'wpessential' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'wpessential' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpessential' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'wpessential' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'caption_source',
			[
				'label'   => esc_html__( 'Caption', 'wpessential' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'none'       => esc_html__( 'None', 'wpessential' ),
					'attachment' => esc_html__( 'Attachment Caption', 'wpessential' ),
					'custom'     => esc_html__( 'Custom Caption', 'wpessential' ),
				],
				'default' => 'none',
			]
		);

		$this->add_control(
			'caption',
			[
				'label'       => esc_html__( 'Custom Caption', 'wpessential' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => esc_html__( 'Enter your image caption', 'wpessential' ),
				'condition'   => [
					'caption_source' => 'custom',
				],
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'link_to',
			[
				'label'   => esc_html__( 'Link', 'wpessential' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'   => esc_html__( 'None', 'wpessential' ),
					'file'   => esc_html__( 'Media File', 'wpessential' ),
					'custom' => esc_html__( 'Custom URL', 'wpessential' ),
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label'      => esc_html__( 'Link', 'wpessential' ),
				'type'       => Controls_Manager::URL,
				'dynamic'    => [
					'active' => true,
				],
				'condition'  => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'open_lightbox',
			[
				'label'       => esc_html__( 'Lightbox', 'wpessential' ),
				'type'        => Controls_Manager::SELECT,
				'description' => sprintf(
				/* translators: 1: Link open tag, 2: Link close tag. */
					esc_html__( 'Manage your site’s lightbox settings in the %1$sLightbox panel%2$s.', 'wpessential' ),
					'<a href="javascript: $e.run( \'panel/global/open\' ).then( () => $e.route( \'panel/global/settings-lightbox\' ) )">',
					'</a>'
				),
				'default'     => 'default',
				'options'     => [
					'default' => esc_html__( 'Default', 'wpessential' ),
					'yes'     => esc_html__( 'Yes', 'wpessential' ),
					'no'      => esc_html__( 'No', 'wpessential' ),
				],
				'condition'   => [
					'link_to' => 'file',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label'   => esc_html__( 'View', 'wpessential' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'wpessential' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label'          => esc_html__( 'Width', 'wpessential' ),
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
				'label'          => esc_html__( 'Max Width', 'wpessential' ),
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
				'label'      => esc_html__( 'Height', 'wpessential' ),
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
				'label'     => esc_html__( 'Object Fit', 'wpessential' ),
				'type'      => Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options'   => [
					''        => esc_html__( 'Default', 'wpessential' ),
					'fill'    => esc_html__( 'Fill', 'wpessential' ),
					'cover'   => esc_html__( 'Cover', 'wpessential' ),
					'contain' => esc_html__( 'Contain', 'wpessential' ),
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
				'label'     => esc_html__( 'Object Position', 'wpessential' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center center' => esc_html__( 'Center Center', 'wpessential' ),
					'center left'   => esc_html__( 'Center Left', 'wpessential' ),
					'center right'  => esc_html__( 'Center Right', 'wpessential' ),
					'top center'    => esc_html__( 'Top Center', 'wpessential' ),
					'top left'      => esc_html__( 'Top Left', 'wpessential' ),
					'top right'     => esc_html__( 'Top Right', 'wpessential' ),
					'bottom center' => esc_html__( 'Bottom Center', 'wpessential' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'wpessential' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'wpessential' ),
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
				'label' => esc_html__( 'Normal', 'wpessential' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label'     => esc_html__( 'Opacity', 'wpessential' ),
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
				'label' => esc_html__( 'Hover', 'wpessential' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label'     => esc_html__( 'Opacity', 'wpessential' ),
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
				'label'     => esc_html__( 'Transition Duration', 'wpessential' ),
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
				'label' => esc_html__( 'Hover Animation', 'wpessential' ),
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
				'label'      => esc_html__( 'Border Radius', 'wpessential' ),
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
				'label'     => esc_html__( 'Caption', 'wpessential' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'caption_source!' => 'none',
				],
			]
		);

		$this->add_responsive_control(
			'caption_align',
			[
				'label'     => esc_html__( 'Alignment', 'wpessential' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => esc_html__( 'Left', 'wpessential' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => esc_html__( 'Center', 'wpessential' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => esc_html__( 'Right', 'wpessential' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpessential' ),
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
				'label'     => esc_html__( 'Text Color', 'wpessential' ),
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
				'label'     => esc_html__( 'Background Color', 'wpessential' ),
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
				'label'     => esc_html__( 'Spacing', 'wpessential' ),
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

		$this->end_controls_section();
	}

	/**
	 * Check if the current widget has caption
	 *
	 * @access private
	 *
	 * @param array $settings
	 *
	 * @return boolean
	 * @since  2.3.0
	 *
	 */
	private function has_caption ( $settings )
	{
		return ( ! empty( $settings[ 'caption_source' ] ) && 'none' !== $settings[ 'caption_source' ] );
	}

	/**
	 * Get the caption for current widget.
	 *
	 * @access private
	 *
	 * @param $settings
	 *
	 * @return string
	 * @since  2.3.0
	 */
	private function get_caption ( $settings )
	{
		$caption = '';
		if ( ! empty( $settings[ 'caption_source' ] ) ) {
			switch ( $settings[ 'caption_source' ] ) {
				case 'attachment':
					$caption = wp_get_attachment_caption( $settings[ 'image' ][ 'id' ] );
					break;
				case 'custom':
					$caption = ! Utils::is_empty( $settings[ 'caption' ] ) ? $settings[ 'caption' ] : '';
			}
		}
		return $caption;
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
		echo do_shortcode( "[{$this->get_base_name()} {$settings}']" );
	}

	/**
	 * Retrieve image widget link URL.
	 *
	 * @param array $settings
	 *
	 * @return array|string|false An array/string containing the link URL, or false if no link.
	 * @since  3.11.0
	 * @access protected
	 *
	 */
	protected function get_link_url ( $settings )
	{
		if ( 'none' === $settings[ 'link_to' ] ) {
			return false;
		}

		if ( 'custom' === $settings[ 'link_to' ] ) {
			if ( empty( $settings[ 'link' ][ 'url' ] ) ) {
				return false;
			}

			return $settings[ 'link' ];
		}

		return [
			'url' => $settings[ 'image' ][ 'url' ],
		];
	}
}
