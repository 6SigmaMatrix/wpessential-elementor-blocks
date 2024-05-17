<?php

namespace WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Shortcodes\WPEssential;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
use Elementor\Modules\DynamicTags\Module as TagsModule;
use WPEssential\Plugins\ElementorBlocks\Builders\Elementor\Utility\Base;
use WPEssential\Plugins\Implement\Shortcodes;
use function defined;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;




class Video extends Base implements Shortcodes
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
		return ['Video', 'title', 'text'];
	}

	public function set_icon()
	{
		return 'eicon-slider-video';
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

		$this->video_content();

		$this->video_style(); // Add this line to include the controls for video style
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

	private function video_content()
	{
		$this->start_controls_section(
			'wpe_st_video_content',
			[
				'label' => esc_html__('Video Content', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'wpe_st_video_type',
			[
				'label' => esc_html__('Source', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube' => esc_html__('YouTube', 'wpessential-elementor-blocks'),
					'vimeo' => esc_html__('Vimeo', 'wpessential-elementor-blocks'),
					'dailymotion' => esc_html__('Dailymotion', 'wpessential-elementor-blocks'),
					'videopress' => esc_html__('VideoPress', 'wpessential-elementor-blocks'),
					'hosted' => esc_html__('Self Hosted', 'wpessential-elementor-blocks'),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_youtube_url',
			[
				'label' => esc_html__('Link', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::POST_META_CATEGORY,
					// 	TagsModule::URL_CATEGORY,
					// ],
				],
				'placeholder' => esc_html__('Enter your URL', 'wpessential-elementor-blocks') . ' (YouTube)',
				'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				'label_block' => true,
				'condition' => [
					'wpe_st_video_type' => 'youtube',
				],
				'ai' => [
					'active' => false,
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_vimeo_url',
			[
				'label' => esc_html__('Link', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::POST_META_CATEGORY,
					// 	TagsModule::URL_CATEGORY,
					// ],
				],
				'placeholder' => esc_html__('Enter your URL', 'wpessential-elementor-blocks') . ' (Vimeo)',
				'default' => 'https://vimeo.com/235215203',
				'label_block' => true,
				'condition' => [
					'wpe_st_video_type' => 'vimeo',
				],
				'ai' => [
					'active' => false,
				],
			]
		);

		$this->add_control(
			'wpe_st_dailymotion_url',
			[
				'label' => esc_html__('Link', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::POST_META_CATEGORY,
					// 	TagsModule::URL_CATEGORY,
					// ],
				],
				'placeholder' => esc_html__('Enter your URL', 'wpessential-elementor-blocks') . ' (Dailymotion)',
				'default' => 'https://www.dailymotion.com/video/x6tqhqb',
				'label_block' => true,
				'condition' => [
					'wpe_st_video_type' => 'dailymotion',
				],
				'ai' => [
					'active' => false,
				],
			]
		);

		$this->add_control(
			'wpe_st_insert_url',
			[
				'label' => esc_html__('External URL', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'wpe_st_video_type' => ['hosted', 'videopress'],
				],
			]
		);

		$this->add_control(
			'wpe_st_hosted_url',
			[
				'label' => esc_html__('Choose Video File', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::MEDIA_CATEGORY,
					// ],
				],
				'media_types' => [
					'video',
				],
				'condition' => [
					'wpe_st_video_type' => ['hosted', 'videopress'],
					'wpe_st_insert_url' => '',
				],
			]
		);

		$this->add_control(
			'wpe_st_external_url',
			[
				'label' => esc_html__('URL', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::URL,
				'autocomplete' => false,
				'options' => false,
				'label_block' => true,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::POST_META_CATEGORY,
					// 	TagsModule::URL_CATEGORY,
					// ],
				],
				'placeholder' => esc_html__('Enter your URL', 'wpessential-elementor-blocks'),
				'condition' => [
					'wpe_st_video_type' => 'hosted',
					'wpe_st_insert_url' => 'yes',
				],
			]
		);

		$this->add_control(
			'wpe_st_videopress_url',
			[
				'label' => esc_html__('URL', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'show_label' => false,
				'default' => 'https://videopress.com/v/ZCAOzTNk',
				'dynamic' => [
					'active' => true,
					// 'categories' => [
					// 	TagsModule::POST_META_CATEGORY,
					// 	TagsModule::URL_CATEGORY,
					// ],
				],
				'placeholder' => esc_html__('VideoPress URL', 'wpessential-elementor-blocks'),
				'ai' => [
					'active' => false,
				],
				'condition' => [
					'wpe_st_video_type' => 'videopress',
					'wpe_st_insert_url' => 'yes',
				],

			]
		);

		$this->add_control(
			'wpe_st_start',
			[
				'label' => esc_html__('Start Time', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::NUMBER,
				'description' => esc_html__('Specify a start time (in seconds)', 'wpessential-elementor-blocks'),
				'frontend_available' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_end',
			[
				'label' => esc_html__('End Time', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::NUMBER,
				'description' => esc_html__('Specify an end time (in seconds)', 'wpessential-elementor-blocks'),
				'condition' => [
					'wpe_st_video_type' => ['youtube', 'hosted'],
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_video_options',
			[
				'label' => esc_html__('Video Options', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'wpe_st_autoplay',
			[
				'label' => esc_html__('Autoplay', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'frontend_available' => true,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'wpe_st_show_image_overlay',
							'value' => '',
						],
						[
							'name' => 'wpe_st_image_overlay[url]',
							'value' => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'wpe_st_play_on_mobile',
			[
				'label' => esc_html__('Play On Mobile', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'wpe_st_autoplay' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_mute',
			[
				'label' => esc_html__('Mute', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_loop',
			[
				'label' => esc_html__('Loop', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'wpe_st_video_type!' => 'dailymotion',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_controls',
			[
				'label' => esc_html__('Player Controls', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type!' => 'vimeo',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_showinfo',
			[
				'label' => esc_html__('Video Info', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type' => ['dailymotion'],
				],
			]
		);

		$this->add_control(
			'wpe_st_modestbranding',
			[
				'label' => esc_html__('Modest Branding', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'wpe_st_video_type' => ['youtube'],
					'wpe_st_controls' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_logo',
			[
				'label' => esc_html__('Logo', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type' => ['dailymotion'],
				],
			]
		);

		// YouTube.
		$this->add_control(
			'wpe_st_yt_privacy',
			[
				'label' => esc_html__('Privacy Mode', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('When you turn on privacy mode, YouTube/Vimeo won\'t store information about visitors on your website unless they play the video.', 'wpessential-elementor-blocks'),
				'condition' => [
					'vwpe_st_ideo_type' => ['youtube', 'vimeo'],
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_lazy_load',
			[
				'label' => esc_html__('Lazy Load', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'wpe_st_video_type',
							'operator' => '===',
							'value' => 'youtube',
						],
						[
							'relation' => 'and',
							'terms' => [
								[
									'name' => 'wpe_st_show_image_overlay',
									'operator' => '===',
									'value' => 'yes',
								],
								[
									'name' => 'wpe_st_video_type',
									'operator' => '!==',
									'value' => 'hosted',
								],
							],
						],
					],
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_rel',
			[
				'label' => esc_html__('Suggested Videos', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__('Current Video Channel', 'wpessential-elementor-blocks'),
					'yes' => esc_html__('Any Video', 'wpessential-elementor-blocks'),
				],
				'condition' => [
					'wpe_st_video_type' => 'youtube',
				],
			]
		);

		// Vimeo.
		$this->add_control(
			'wpe_st_vimeo_title',
			[
				'label' => esc_html__('Intro Title', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'wpe_st_vimeo_portrait',
			[
				'label' => esc_html__('Intro Portrait', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'wpe_st_vimeo_byline',
			[
				'label' => esc_html__('Intro Byline', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'default' => 'yes',
				'condition' => [
					'wpe_st_video_type' => 'vimeo',
				],
			]
		);

		$this->add_control(
			'wpe_st_color',
			[
				'label' => esc_html__('Controls Color', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'wpe_st_video_type' => ['vimeo', 'dailymotion'],
				],
			]
		);

		$this->add_control(
			'wpe_st_download_button',
			[
				'label' => esc_html__('Download Button', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'condition' => [
					'wpe_st_video_type' => 'hosted',
				],
			]
		);

		$this->add_control(
			'wpe_st_preload',
			[
				'label' => esc_html__('Preload', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'metadata' => esc_html__('Metadata', 'wpessential-elementor-blocks'),
					'auto' => esc_html__('Auto', 'wpessential-elementor-blocks'),
					'none' => esc_html__('None', 'wpessential-elementor-blocks'),
				],
				'description' => sprintf(
					esc_html__('Preload attribute lets you specify how the video should be loaded when the page loads. %1$sLearn More%2$s', 'wpessential-elementor-blocks'),
					'<a target="_blank" href="https://go.elementor.com/preload-video/">',
					'</a>'
				),
				'default' => 'metadata',
				'condition' => [
					'wpe_st_video_type' => 'hosted',
					'wpe_st_autoplay' => '',
				],
			]
		);

		$this->add_control(
			'wpe_st_poster',
			[
				'label' => esc_html__('Poster', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'wpe_st_video_type' => 'hosted',
				],
			]
		);

		$this->add_control(
			'wpe_st_view',
			[
				'label' => esc_html__('View', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'youtube',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wpe_st_section_image_overlay',
			[
				'label' => esc_html__('Image Overlay', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'wpe_st_show_image_overlay',
			[
				'label' => esc_html__('Image Overlay', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'wpe_st_image_overlay',
			[
				'label' => esc_html__('Choose Image', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'wpe_st_show_image_overlay' => 'yes',
				],
				'frontend_available' => true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'wpe_st_image_overlay', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_overlay_size` and `image_overlay_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'wpe_st_show_image_overlay' => 'yes',
				],
			]
		);

		$this->add_control(
			'wpe_st_show_play_icon',
			[
				'label' => esc_html__('Play Icon', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => esc_html__('Hide', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('Show', 'wpessential-elementor-blocks'),
				'separator' => 'before',
				'condition' => [
					'wpe_st_show_image_overlay' => 'yes',
					'wpe_st_image_overlay[url]!' => '',
				],
			]
		);

		$this->add_control(
			'wpe_st_play_icon',
			[
				'label' => esc_html__('Icon', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,
				'skin_settings' => [
					'inline' => [
						'none' => [
							'label' => 'Default',
							'icon' => 'eicon-play',
						],
						'icon' => [
							'icon' => 'eicon-star',
						],
					],
				],
				'recommended' => [
					'fa-regular' => [
						'play-circle',
					],
					'fa-solid' => [
						'play',
						'play-circle',
					],
				],
				'condition' => [
					'wpe_st_show_image_overlay' => 'yes',
					'wpe_st_show_play_icon!' => '',
				],
			]
		);

		$this->add_control(
			'wpe_st_lightbox',
			[
				'label' => esc_html__('Lightbox', 'wpessential-elementor-blocks'),
				'type' => Controls_Manager::SWITCHER,
				'frontend_available' => true,
				'label_off' => esc_html__('Off', 'wpessential-elementor-blocks'),
				'label_on' => esc_html__('On', 'wpessential-elementor-blocks'),
				'condition' => [
					'wpe_st_show_image_overlay' => 'yes',
					'wpe_st_image_overlay[url]!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();


	}
	private function video_style()
	{

		$this->start_controls_section(
			'wpe_st_video_style',
			[
				'label' => esc_html__('Video', 'wpessential-elementor-blocks'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

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
				'label' => esc_html__('Aspect Ratio', 'wpessential-elementor-blocks'),
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
				'label' => esc_html__('Shape', 'elementor-pro'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'square' => esc_html__('Square', 'elementor-pro'),
					'rounded' => esc_html__('Rounded', 'elementor-pro'),
					'circle' => esc_html__('Circle', 'elementor-pro'),
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
				'label' => esc_html__('Aspect Ratio', 'wpessential-elementor-blocks'),
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
				'label' => esc_html__('Shape', 'elementor-pro'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'square' => esc_html__('Square', 'elementor-pro'),
					'rounded' => esc_html__('Rounded', 'elementor-pro'),
					'circle' => esc_html__('Circle', 'elementor-pro'),
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



		$this->end_controls_section();

	}

}
