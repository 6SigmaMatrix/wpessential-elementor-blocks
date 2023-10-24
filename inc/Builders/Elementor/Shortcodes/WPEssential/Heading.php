<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Builders\Fields\Choose;
use WPEssential\Plugins\Builders\Fields\Color;
use WPEssential\Plugins\Builders\Fields\CommonTypography;
use WPEssential\Plugins\Builders\Fields\PopoverToggle;
use WPEssential\Plugins\Builders\Fields\Select;
use WPEssential\Plugins\Builders\Fields\Textarea;
use WPEssential\Plugins\Builders\Fields\Url;
use WPEssential\Plugins\Implement\Shortcodes;

class Heading extends Base implements Shortcodes
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
			'section_1',
			[
				'label' => __( 'Heading Settings', 'wpessential' )
			]
		);

		$opt = Textarea::make( __( 'Title', 'wpessential' ) );
		$opt->dynamic( true );
		$opt->placeholder( __( 'Enter your title', 'wpessential' ) );
		$opt->default( __( 'Add Your Heading Text Here', 'wpessential' ) );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Url::make( __( 'Link', 'wpessential' ) );
		$opt->dynamic( true );
		$opt->default( [ 'url' => '' ] );
		$opt->separator( 'before' );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Select::make( __( 'Size', 'wpessential' ) );
		$opt->options( wpe_element_size() );
		$opt->default( 'default' );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Select::make( __( 'HTML Tag', 'wpessential' ) );
		$opt->options( wpe_heading_tags() );
		$opt->default( 'h2' );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = Choose::make( __( 'Alignment', 'wpessential' ) );
		$opt->options( [
			'left'    => [
				'title' => __( 'Left', 'wpessential' ),
				'icon'  => 'eicon-text-align-left',
			],
			'center'  => [
				'title' => __( 'Center', 'wpessential' ),
				'icon'  => 'eicon-text-align-center',
			],
			'right'   => [
				'title' => __( 'Right', 'wpessential' ),
				'icon'  => 'eicon-text-align-right',
			],
			'justify' => [
				'title' => __( 'Justified', 'wpessential' ),
				'icon'  => 'eicon-text-align-justify',
			],
		] );
		$opt->wrap_selectors( [ '.wpe-heading-title' => 'text-align: {{VALUE}};' ] );
		$opt->default( '' );
		$this->add_responsive_control( $opt->key, $opt->toArray() );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_2',
			[
				'label' => __( 'Title', 'wpessential' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$opt = Color::make( __( 'Text Color', 'wpessential' ) );
		$opt->wrap_selectors( [ '.wpe-heading-title, .wpe-heading-title > a' => 'color: {{VALUE}};' ] );
		$this->add_control( $opt->key, $opt->toArray() );

		$opt = PopoverToggle::make( __( 'Typography', 'wpessential' ) );
		$opt->global( true );
		$this->add_control( $opt->key, $opt->toArray() );

		$this->start_popover();

		$opts = CommonTypography::make( __( 'typography', 'wpessential' ) );
		$opts->common_key( 'typography' );
		$opts->typography();
		foreach ( $opts as $opt ) {
			wpe_error( $opt->toArray() );
			$this->add_control( $opt->key, $opt->toArray() );
		}

		$this->end_popover();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'global'   => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .wpe-heading-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'text_shadow',
				'selector' => '{{WRAPPER}} .wpe-heading-title',
			]
		);

		$opt = Select::make( __( 'Blend Mode', 'wpessential' ) );
		$opts->options( wpe_blend_mode() );
		$opts->wrap_selectors( [ '.wpe-heading-title' => 'mix-blend-mode: {{VALUE}}' ] );
		$this->add_control( $opt->key, $opt->toArray() );

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
		$settings = wpe_gen_attr( $this->get_settings_for_display() );
		echo do_shortcode( "[{$this->get_base_name()} {$settings}']" );
	}
}
