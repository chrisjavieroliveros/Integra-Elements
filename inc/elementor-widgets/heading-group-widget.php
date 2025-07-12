<?php
/**
 * Heading Group Widget - Heading Group Widget Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Heading_Group_Widget
 */
class Heading_Group_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_heading_group';
    }

    public function get_title() {
        return __('Heading Group', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'heading', 'group', 'title'];
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
            'selector' => '.heading',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Alignment Controls
        $this->add_responsive_control(
            'alignment',
            [
                'label' => __('Alignment', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'integra-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'integra-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'integra-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .text-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Content Section;
        include('attr/content/content.controls.php');


        // Spacing Section;
        $spacing_config = [
            'selector' => '.text-content',
            'defaults_bottom' => [
                'desktop' => 40,
                'tablet' => 32,
                'mobile' => 24,
            ],
        ];
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

        // Content Render;
        include('attr/content/content.render.php');

        ?>

        <!-- Heading Section -->
        <section class="heading <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <div class="text-content">
                    <?= $content_markup; ?>
                </div>

            </div>
        </section>

        <?php
    }
} 