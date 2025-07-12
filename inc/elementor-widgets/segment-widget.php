<?php
/**
 * Segment Widget - Segment Widget Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Segment_Widget
 */
class Segment_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_segment';
    }

    public function get_title() {
        return __('Segment', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'segment', 'tabs', 'switcher'];
    }

    protected function register_controls() {

        /*-- Content Tab ------------------------------------------------------------*/

        // General Section
        $this->start_controls_section(
            'section_general',
            [
                'label' => __('General', 'integra-elements'),
            ]
        );

        // Container Controls;
        include('attr/container/container.controls.php');

        // Height Controls
        $height_config = [
            'selector' => '.segment-ui',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // End General Section
        $this->end_controls_section();

        // Segments Section
        $this->start_controls_section(
            'section_segments',
            [
                'label' => __('Segments', 'integra-elements'),
            ]
        );

        // Segments Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'segment_title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Segment Title', 'integra-elements'),
                'placeholder' => __('Enter segment title', 'integra-elements'),
            ]
        );

        $repeater->add_control(
            'segment_image',
            [
                'label' => __('Image', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/380x480',
                ],
            ]
        );

        $this->add_control(
            'segments',
            [
                'label' => __('Segments', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'segment_title' => __('Segment 1', 'integra-elements'),
                        'segment_image' => [
                            'url' => 'https://placehold.co/380x480',
                        ],
                    ],
                    [
                        'segment_title' => __('Segment 2', 'integra-elements'),
                        'segment_image' => [
                            'url' => 'https://placehold.co/380x480',
                        ],
                    ],
                    [
                        'segment_title' => __('Segment 3', 'integra-elements'),
                        'segment_image' => [
                            'url' => 'https://placehold.co/380x480',
                        ],
                    ],
                ],
                'title_field' => '{{{ segment_title }}}',
            ]
        );

        // End Segments Section
        $this->end_controls_section();

        // Spacing Section;
        include('attr/spacing/spacing.controls.php');

        /*-- Style Tab ------------------------------------------------------------*/

        // Background Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Background', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Theme Controls;
        include('attr/theme/theme.controls.php');

        // Background Controls;
        include('attr/background/background.controls.php');

        // End Background Section
        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Theme Render;
        include('attr/theme/theme.render.php');



        // Background Render;
        include('attr/background/background.render.php');

        $segments = $settings['segments'];

        ?>

        <!-- Segment Section -->
        <section class="segment-ui <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <div class="segment-ui-list">
                    <?php foreach ($segments as $index => $segment) : ?>
                        <div class="segment-ui-item <?= $index === 0 ? 'active' : ''; ?>">
                            <?= esc_html($segment['segment_title']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="segment-ui-previews">
                    <?php foreach ($segments as $index => $segment) : ?>
                        <div class="segment-ui-preview <?= $index === 0 ? 'show' : ''; ?>">
                            <?php if (!empty($segment['segment_image']['url'])) : ?>
                                <img src="<?= esc_url($segment['segment_image']['url']); ?>" alt="<?= esc_attr($segment['segment_title']); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>

        <?php
    }
} 