<?php
/**
 * CTA Widget - CTA Widget Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class CTA_Widget
 */
class CTA_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_cta';
    }

    public function get_title() {
        return __('CTA', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'cta', 'call to action', 'button'];
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
            'selector' => '.cta',
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
                    'flex-start' => [
                        'title' => __('Left', 'integra-elements'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'integra-elements'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'integra-elements'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .inline-cta' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        // End General Section
        $this->end_controls_section();

        // CTA Section;
        include('attr/cta/cta.controls.php');

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



        // Background Render;
        include('attr/background/background.render.php');

        // CTA Render;
        include('attr/cta/cta.render.php');


        ?>

        <!-- CTA Section -->
        <section class="cta-section <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <?= $cta_markup; ?>

            </div>
        </section>

        <?php
    }
} 