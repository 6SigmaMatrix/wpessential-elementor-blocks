<?php

namespace WPEssential\Plugins\ElementorBlocksPro\Builders\Elementor\Shortcodes;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\CalderaForm;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\ContactForm7;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\FormidableForm;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\Mc4Wp;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\NinjaForm;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Forms\WPForm;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Sliders\LayerSlider;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Sliders\MasterSlider;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Sliders\RevolutionSlider;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\Sliders\SmartSlider;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\Cart;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\MyAccount;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\OrderTrack;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\ProductAddToCart;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\ProductCategories;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\Products;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WooCommerce\ProductSingle;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Accordions;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Button;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Counter;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Gallery;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\GoogleMaps;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Heading;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Icons;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Image;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\ImageBox;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Lists;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\Tabs;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential\TextEditor;

final class Widgets
{
	private static $list = [];

	public static function constructor ()
	{
		add_filter( 'wpe/elementor/shortcodes', [ __CLASS__, 'widgets' ], 20 );
	}


	public static function widgets ( $list )
	{
		self::$list = [
			//	'Post'    => Post::class,
			'Heading'    => Heading::class,
			'TextEditor' => TextEditor::class,
			'GoogleMaps' => GoogleMaps::class,
			'Accordions' => Accordions::class,
			'Button'     => Button::class,
			'Counter'    => Counter::class,
			'Tabs'       => Tabs::class,
			'Icons'      => Icons::class,
			'Lists'      => Lists::class,
			'ImageBox'   => ImageBox::class,
			'Image'      => Image::class,
			'Gallery'    => Gallery::class,
		];

		self::form_widget();
		self::slider_widget();
		self::woo_widget();

		return wp_parse_args( $list, $list );
	}

	private static function form_widget ()
	{
		if ( \class_exists( 'wpcf7' ) ) {
			self::$list[ 'ContactForm7' ] = ContactForm7::class;
		}
		if ( \function_exists( 'load_formidable_forms' ) ) {
			self::$list[ 'FormidableForm' ] = FormidableForm::class;
		}
		if ( \function_exists( 'caldera_forms_load' ) ) {
			self::$list[ 'CalderaForm' ] = CalderaForm::class;
		}
		if ( \function_exists( 'ninja_forms_three_table_exists' ) ) {
			self::$list[ 'NinjaForm' ] = NinjaForm::class;
		}
		if ( \function_exists( 'wpforms' ) ) {
			self::$list[ 'WPForm' ] = WPForm::class;
		}
		if ( \function_exists( '_mc4wp_load_plugin' ) ) {
			self::$list[ 'Mc4Wp' ] = Mc4Wp::class;
		}
	}

	private static function slider_widget ()
	{
		if ( \class_exists( 'LS_Shortcode' ) ) {
			self::$list[ 'LayerSlider' ] = LayerSlider::class;
		}
		if ( \class_exists( 'Master_Slider' ) ) {
			self::$list[ 'MasterSlider' ] = MasterSlider::class;
		}
		if ( \class_exists( 'RevSliderFront' ) ) {
			self::$list[ 'RevolutionSlider' ] = RevolutionSlider::class;
		}
		if ( \class_exists( 'Master_Slider' ) ) {
			self::$list[ 'SmartSlider' ] = SmartSlider::class;
		}
	}

	private static function woo_widget ()
	{
		if ( ! \function_exists( 'WC' ) ) {
			return;
		}

		self::$list[ 'Cart' ]              = Cart::class;
		self::$list[ 'MyAccount' ]         = MyAccount::class;
		self::$list[ 'OrderTrack' ]        = OrderTrack::class;
		self::$list[ 'ProductAddToCart' ]  = ProductAddToCart::class;
		self::$list[ 'ProductCategories' ] = ProductCategories::class;
		self::$list[ 'ProductSingle' ]     = ProductSingle::class;
		self::$list[ 'Products' ]          = Products::class;
	}
}
