<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Css_Filter;
use Elementor\Modules\DynamicTags\Module as TagsModule;
use Elementor\Plugin;
use Elementor\Settings;
use WPEssential\Plugins\Builders\Fields\RawHtml;
use WPEssential\Plugins\Builders\Fields\Slider;
use WPEssential\Plugins\Builders\Fields\Text;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;
use WPEssential\Plugins\Loader;
use function defined;


class GoogleMaps extends Base implements Shortcodes
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
		return [ 'google maps', 'google', 'map' ];
	}

	public function set_widget_icon ()
	{
		return 'eicon-google-maps';
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
		Loader::editor( 'elementor' );

		$this->start_controls_section(
			'section_map',
			[
				'label' => esc_html__( 'Map', 'elementor' ),
			]
		);

		if ( Plugin::$instance->editor->is_edit_mode() ) {
			$api_key = get_option( 'elementor_google_maps_api_key' );

			if ( ! $api_key ) {
				$opt = RawHtml::make( __( 'Warning', 'wpessential-elementor-blocks' ) );
				$opt->data( sprintf(
					esc_html__( 'Set your Google Maps API Key in Elementor\'s %1$sIntegrations Settings%3$s page. Create your key %2$shere.%3$s', 'elementor' ),
					'<a href="' . Settings::get_url() . '#tab-integrations" target="_blank">',
					'<a href="https://developers.google.com/maps/documentation/embed/get-api-key" target="_blank">',
					'</a>'
				) );
				$opt->contentClasses( 'elementor-panel-alert elementor-panel-alert-info' );
				$this->add_control( $opt->key, $opt->toArray() );
			}
		}

		$default_address = __( 'London Eye, London, United Kingdom', 'elementor' );

		$opt = Text::make( __( 'Location', 'wpessential-elementor-blocks' ), 'address' );
		$opt->dynamic( true, '', [ TagsModule::POST_META_CATEGORY, ] );
		$opt->placeholder( $default_address );
		$opt->default( $default_address );
		$opt->label_block( true );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Slider::make( __( 'Zoom', 'wpessential-elementor-blocks' ) );
		$opt->default( [ 'size' => 10 ] );
		$opt->separator( true );
		$opt->max( 20 );
		$opt->range( [
			'px' => [
				'min' => 1,
				'max' => 20,
			]
		] );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Slider::make( __( 'Height', 'wpessential-elementor-blocks' ) );
		$opt->default( [ 'size' => 10 ] );
		$opt->separator( true );
		$opt->max( 20 );
		$opt->range( [
			'px' => [
				'min' => 40,
				'max' => 1440,
			],
			'vh' => [
				'min' => 0,
				'max' => 100,
			],
		] );
		$this->add_control( $opt->key, $opt->toArray() );

		// $this->add_responsive_control(
		// 	'height',
		// 	[
		// 		'label'      => esc_html__( 'Height', 'elementor' ),
		// 		'type'       => Controls_Manager::SLIDER,
		// 		'range'      => [
		// 			'px' => [
		// 				'min' => 40,
		// 				'max' => 1440,
		// 			],
		// 			'vh' => [
		// 				'min' => 0,
		// 				'max' => 100,
		// 			],
		// 		],
		// 		'size_units' => [ 'px', 'em', 'rem', 'vh', 'custom' ],
		// 		'selectors'  => [
		// 			'{{WRAPPER}} .wpe-custom-embed > iframe' => 'height: {{SIZE}}{{UNIT}};',
		// 		],
		// 	]
		// );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_map_style',
			[
				'label' => esc_html__( 'Map', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'map_filter' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'css_filters',
				'selector' => '{{WRAPPER}} .wpe-custom-embed > iframe',
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label'          => esc_html__( 'Width', 'elementor' ),
				'type'           => Controls_Manager::SLIDER,
				'size_units'     => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range'          => [
					'px' => [
						'max' => 1000,
					],
				],
				'default'        => [
					'size' => 100,
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'selectors'      => [
					'{{WRAPPER}} .elementor-divider-separator' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label'     => esc_html__( 'Alignment', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-divider'           => 'text-align: {{VALUE}}',
					'{{WRAPPER}} .elementor-divider-separator' => 'margin: 0 auto; margin-{{VALUE}}: 0',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_map_border_radius_normal',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_map_border_type_normal',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'wpe_st_css_filters_normal',
				'selector' => '{{WRAPPER}}:hover .wpe-custom-embed > iframe',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name'     => 'wpe_st_css_filters_hover',
				'selector' => '{{WRAPPER}}:hover .wpe-custom-embed > iframe',
			]
		);

		$this->add_control(
			'wpe_st_hover_transition',
			[
				'label'     => esc_html__( 'Transition Duration', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wpe-custom-embed > iframe' => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_responsive_control(
			'wpe_st_map_border_radius_hover',
			[
				'label'      => esc_html__( 'Border Radius', 'wpessential-elementor-blocks' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .wpe-text-editor a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'wpe_st_map_border_type_hover',
				'selector' => '{{WRAPPER}} .wpe-text-editor title',
			]

		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
		$settings = $this->get_settings_for_display();
		$address  = wpe_array_get( $settings, 'address' );

		if ( ! $address ) {
			return;
		}

		$zoom = wpe_array_get( $settings, 'zoom.size' );
		if ( absint( $zoom ) === 0 ) {
			$zoom = 10;
		}

		$api_key = esc_html( get_option( 'elementor_google_maps_api_key' ) );

		$params = [
			rawurlencode( $address ),
			absint( $zoom ),
		];

		if ( $api_key ) {
			$params[] = $api_key;
			$url      = 'https://www.google.com/maps/embed/v1/place?key=%3$s&q=%1$s&amp;zoom=%2$d';
		}
		else {
			$url = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near';
		}

		?>
		<div class="wpe-custom-embed">
			<iframe referrerpolicy="no-referrer-when-downgrade" loading="lazy" src="<?php echo esc_url( vsprintf( $url, $params ) ); ?>" title="<?php echo esc_attr( $address ); ?>" aria-label="<?php echo esc_attr( $address ); ?>"></iframe>
		</div>
		<?php
	}


}
