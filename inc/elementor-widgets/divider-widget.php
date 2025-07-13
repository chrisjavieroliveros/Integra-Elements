<?php
/**
 * Divider Widget - Divider Widget Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Divider_Widget
 */
class Divider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_divider';
    }

    public function get_title() {
        return __('Divider', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-divider';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'divider', 'separator', 'line'];
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
        $this->add_responsive_control(
            'height',
            [
                'label' => __('Height', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .divider' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Width Controls
        $this->add_responsive_control(
            'max_width',
            [
                'label' => __('Max Width', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1440,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .divider' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Spacing Section;
        include('attr/spacing/spacing.controls.php');

        /*-- Style Tab ------------------------------------------------------------*/

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Style Type Control
        $this->add_control(
            'divider_style',
            [
                'label' => __('Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => __('Solid', 'integra-elements'),
                    'gradient' => __('Gradient', 'integra-elements'),
                ],
            ]
        );


        // Divider Color Control
        $this->add_control(
        'divider_color',
        [
            'label' => 'Color',
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                    
            // Brand Colors
            'Primary' => 'Primary',
            'Secondary' => 'Secondary',
            
            // State Colors
            'Danger' => 'Danger',
            'Warning' => 'Warning',
            'Success' => 'Success',
            'Info' => 'Info',
            
            // Base Colors
            'Black' => 'Black',
            'White' => 'White',
    
            // Light/Dark Variants
            'Light' => 'Light',
            'Dark' => 'Dark',
    
    
            ],
            'default' => 'Primary',
            'condition' => [
            'divider_style' => 'solid'
            ]
        ]
        );

        // Light Variants;
        $this->add_control(
            'light_variants',
            [
                'label' => 'Light Variants',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'Light-50' => 'Light-50',
                    'Light-100' => 'Light-100',
                    'Light-200' => 'Light-200',
                    'Light-300' => 'Light-300',
                    'Light-400' => 'Light-400',
                    'Light-500' => 'Light-500',
                    'Light-600' => 'Light-600',
                    'Light-700' => 'Light-700',
                    'Light-800' => 'Light-800',
                    'Light-900' => 'Light-900',
                    'Light-950' => 'Light-950',
                ],
                'condition' => [
                    'divider_color' => 'Light',
                ],
                'default' => 'Light-500',
            ]
        );

        // Dark Variants;
        $this->add_control(
            'dark_variants',
            [
                'label' => 'Dark Variants',
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'Dark-50' => 'Dark-50',
                    'Dark-100' => 'Dark-100',
                    'Dark-200' => 'Dark-200',
                    'Dark-300' => 'Dark-300',
                    'Dark-400' => 'Dark-400',
                    'Dark-500' => 'Dark-500',
                    'Dark-600' => 'Dark-600',
                    'Dark-700' => 'Dark-700',
                    'Dark-800' => 'Dark-800',
                    'Dark-900' => 'Dark-900',
                    'Dark-950' => 'Dark-950',
                ],
                'condition' => [
                    'divider_color' => 'Dark',
                ],
                'default' => 'Dark-500',
            ]
        );

        // Gradient Controls
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'divider_gradient',
                'label' => __('Gradient', 'integra-elements'),
                'types' => ['gradient'],
                'condition' => [
                    'divider_style' => 'gradient',
                ],
                'selector' => '{{WRAPPER}} .divider',
            ]
        );

        // End Style Section
        $this->end_controls_section();

    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();



        // Divider color;
        $divider_color = $settings['divider_color'];
        $light_variants = $settings['light_variants'];
        $dark_variants = $settings['dark_variants'];

        if ($divider_color === 'Light') {
            $divider_color = $light_variants;
        } else if ($divider_color === 'Dark') {
            $divider_color = $dark_variants;
        }


        ?>

        <!-- Divider Section -->
        <section class="divider-section">
            <div class="container">
                <div class="divider" style="background-color: var(--color-<?= esc_attr($divider_color); ?>);"></div>
            </div>
        </section>

        <?php
    }
} 