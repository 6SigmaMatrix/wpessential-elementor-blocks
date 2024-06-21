<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\BlogPost;

if ( ! defined( 'ABSPATH' ) )
{
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\Builders\Fields\Number;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;

use function defined;

class Post extends Base implements Shortcodes
{
	/**
	 * Set widget skings.
	 *
	 * @return string $skins_list name.
	 * @access public
	 * @public
	 */
	public $skins_list = [
		PostSyle1::class,
		PostSyle2::class,
	];

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
		return [ 'post list', 'post', 'blog list', 'blog post', 'blog' ];
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
				'label' => esc_html__( 'Post Settings', 'wpessential-elementor-blocks' )
			]
		);

		$opt = Number::make( esc_html__( 'Posts Per Page', 'wpessential-elementor-blocks' ) )
					 ->min( 1 )
					 ->step( 1 )
					 ->desc( esc_html__( 'Enter the number of post to display on frontend.', 'wpessential-elementor-blocks' ) )
					 ->default( 4 )
					 ->toArray();
		$this->add_control( $opt[ 'id' ], $opt );

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
