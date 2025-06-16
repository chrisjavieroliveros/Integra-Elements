<?php
/**
 * Background Controls for Elementor Widgets
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Traits;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Trait for common background color control
 */
trait Background_Controls {

    /**
     * Get theme color palette
     *
     * @return array
     */
    protected function get_theme_colors() {
        return [
            // Base Colors
            'Black' => '#272727',
            'White' => '#ffffff',
            
            // Primary Colors
            'Primary' => '#c33329',
            'Primary-50' => '#fdebed',
            'Primary-100' => '#fad6d9',
            'Primary-200' => '#f3c2c4',
            'Primary-300' => '#ecadae',
            'Primary-400' => '#e59997',
            'Primary-500' => '#c33329',
            'Primary-600' => '#af2d24',
            'Primary-700' => '#9a2820',
            'Primary-800' => '#711d17',
            'Primary-900' => '#47110e',
            'Primary-950' => '#1e0705',

            // Secondary Colors
            'Secondary' => '#222d3f',
            'Secondary-50' => '#e9eaec',
            'Secondary-100' => '#d3d5d9',
            'Secondary-200' => '#a7abb2',
            'Secondary-300' => '#7a818c',
            'Secondary-400' => '#4e5765',
            'Secondary-500' => '#222d3f',
            'Secondary-600' => '#1f2939',
            'Secondary-700' => '#1b2432',
            'Secondary-800' => '#181f2c',
            'Secondary-900' => '#141b26',
            'Secondary-950' => '#111720',

            // State Colors
            'Danger' => '#b91c1c',
            'Warning' => '#ffb703',
            'Success' => '#4ca155',
            'Info' => '#0369a1',
    
            // Light Colors
            'Light' => '#f1f1f1',
            'Light-50' => '#fafafa',
            'Light-100' => '#f1f1f1',
            'Light-200' => '#f0f0f0',
            'Light-300' => '#e0e0e0',
            'Light-400' => '#d0d0d0',
            'Light-500' => '#c0c0c0',
            'Light-600' => '#b0b0b0',
            'Light-700' => '#a0a0a0',
            'Light-800' => '#909090',
            'Light-900' => '#808080',
            'Light-950' => '#707070',

            // Dark Colors
            'Dark' => '#2a2a2a',
            'Dark-50' => '#606060',
            'Dark-100' => '#505050',
            'Dark-200' => '#404040',
            'Dark-300' => '#353535',
            'Dark-400' => '#2a2a2a',
            'Dark-500' => '#202020',
            'Dark-600' => '#1a1a1a',
            'Dark-700' => '#151515',
            'Dark-800' => '#101010',
            'Dark-900' => '#0a0a0a',
            'Dark-950' => '#050505',
        ];
    }

    /**
     * Get main colors (without variants)
     *
     * @return array
     */
    protected function get_main_colors() {
        return [
            'Black' => '#272727',
            'White' => '#ffffff',
            'Primary' => '#c33329',
            'Secondary' => '#222d3f',
            'Danger' => '#b91c1c',
            'Warning' => '#ffb703',
            'Success' => '#4ca155',
            'Info' => '#0369a1',
            'Light' => '#f1f1f1',
            'Dark' => '#2a2a2a',
        ];
    }

    /**
     * Get color variants for a specific main color
     *
     * @param string $main_color
     * @return array
     */
    protected function get_color_variants($main_color) {
        $all_colors = $this->get_theme_colors();
        $variants = [];
        
        // Add the main color as default variant
        if (isset($all_colors[$main_color])) {
            $variants['default'] = __('Default', 'integra-elements');
        }
        
        // Add numbered variants (50-950)
        for ($i = 50; $i <= 950; $i += ($i < 100 ? 50 : 100)) {
            $variant_key = $main_color . '-' . $i;
            if (isset($all_colors[$variant_key])) {
                $variants[$all_colors[$variant_key]] = $i;
            }
        }
        
        return $variants;
    }

    /**
     * Add common background color control
     *
     * @param string $selector CSS selector for the background element
     * @param string $control_name Name of the control (default: 'background_color')
     * @param string $label Control label (default: 'Background Color')
     * @param string $default Default color value
     */
    protected function add_common_background_color($selector, $control_name = 'background_color', $label = 'Background Color', $default = '') {
        $main_colors = $this->get_main_colors();
        
        // Create options array for the main color select
        $main_color_options = ['default' => __('Default', 'integra-elements')];
        
        // Add main colors to options
        foreach ($main_colors as $color_name => $color_value) {
            $main_color_options[$color_name] = $color_name;
        }

        // Main color selection
        $this->add_control(
            $control_name . '_main',
            [
                'label' => __($label . ' (Main)', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $main_color_options,
                'default' => 'default',
            ]
        );

        // Create variant selects for each main color
        foreach ($main_colors as $color_name => $color_value) {
            $variants = $this->get_color_variants($color_name);
            
            if (count($variants) > 1) { // Only show if there are variants
                $this->add_control(
                    $control_name . '_' . strtolower($color_name) . '_variant',
                    [
                        'label' => __($color_name . ' Variant', 'integra-elements'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => $variants,
                        'default' => 'default',
                        'condition' => [
                            $control_name . '_main' => $color_name,
                        ],
                        'selectors' => [
                            "{{WRAPPER}} {$selector}" => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
            }
        }

        // Main color selectors (when no variants or default variant selected)
        foreach ($main_colors as $color_name => $color_value) {
            $this->add_control(
                $control_name . '_' . strtolower($color_name) . '_selector',
                [
                    'type' => \Elementor\Controls_Manager::HIDDEN,
                    'default' => $color_value,
                    'condition' => [
                        $control_name . '_main' => $color_name,
                        $control_name . '_' . strtolower($color_name) . '_variant' => 'default',
                    ],
                    'selectors' => [
                        "{{WRAPPER}} {$selector}" => 'background-color: {{VALUE}};',
                    ],
                ]
            );
        }

        // Add custom color picker as backup
        $this->add_control(
            $control_name . '_custom',
            [
                'label' => __('Custom ' . $label, 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    $control_name . '_main' => 'default',
                ],
            ]
        );
    }
} 