<?php
/**
 * Wrapper Controls for Elementor Widgets
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Traits;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Trait for wrapper controls (border, border radius, box shadow, etc.)
 */
trait Wrapper_Controls {

    /**
     * Add border controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'border')
     * @param string $label Control label (default: 'Border')
     */
    protected function add_border_controls($selector, $control_name = 'border', $label = 'Border') {
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => $control_name,
                'label' => __($label, 'integra-elements'),
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );
    }

    /**
     * Add border radius controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'border_radius')
     * @param string $label Control label (default: 'Border Radius')
     */
    protected function add_border_radius_controls($selector, $control_name = 'border_radius', $label = 'Border Radius') {
        $this->add_responsive_control(
            $control_name,
            [
                'label' => __($label, 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    /**
     * Add box shadow controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'box_shadow')
     * @param string $label Control label (default: 'Box Shadow')
     */
    protected function add_box_shadow_controls($selector, $control_name = 'box_shadow', $label = 'Box Shadow') {
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => $control_name,
                'label' => __($label, 'integra-elements'),
                'selector' => "{{WRAPPER}} {$selector}",
            ]
        );
    }

    /**
     * Add width and height controls
     *
     * @param string $selector CSS selector for the element
     * @param string $width_control_name Name of the width control (default: 'width')
     * @param string $height_control_name Name of the height control (default: 'height')
     */
    protected function add_size_controls($selector, $width_control_name = 'width', $height_control_name = 'height') {
        $this->add_responsive_control(
            $width_control_name,
            [
                'label' => __('Width', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            $height_control_name,
            [
                'label' => __('Height', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'vh', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
    }

    /**
     * Add overflow controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'overflow')
     * @param string $label Control label (default: 'Overflow')
     */
    protected function add_overflow_controls($selector, $control_name = 'overflow', $label = 'Overflow') {
        $this->add_control(
            $control_name,
            [
                'label' => __($label, 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => __('Default', 'integra-elements'),
                    'visible' => __('Visible', 'integra-elements'),
                    'hidden' => __('Hidden', 'integra-elements'),
                    'scroll' => __('Scroll', 'integra-elements'),
                    'auto' => __('Auto', 'integra-elements'),
                ],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'overflow: {{VALUE}};',
                ],
            ]
        );
    }

    /**
     * Add combined wrapper controls (border, border radius, box shadow)
     *
     * @param string $selector CSS selector for the element
     * @param string $border_control_name Name of the border control (default: 'wrapper_border')
     * @param string $border_radius_control_name Name of the border radius control (default: 'wrapper_border_radius')
     * @param string $box_shadow_control_name Name of the box shadow control (default: 'wrapper_box_shadow')
     */
    protected function add_wrapper_style_controls($selector, $border_control_name = 'wrapper_border', $border_radius_control_name = 'wrapper_border_radius', $box_shadow_control_name = 'wrapper_box_shadow') {
        $this->add_border_controls($selector, $border_control_name);
        $this->add_border_radius_controls($selector, $border_radius_control_name);
        $this->add_box_shadow_controls($selector, $box_shadow_control_name);
    }

    /**
     * Add wrapper section with common wrapper styling controls
     *
     * @param string $selector CSS selector for the element
     * @param string $section_name Name of the section (default: 'wrapper_section')
     * @param string $section_label Section label (default: 'Wrapper')
     * @param string $tab Tab to add section to (default: TAB_STYLE)
     */
    protected function add_wrapper_section($selector, $section_name = 'wrapper_section', $section_label = 'Wrapper', $tab = \Elementor\Controls_Manager::TAB_STYLE) {
        $this->start_controls_section(
            $section_name,
            [
                'label' => __($section_label, 'integra-elements'),
                'tab' => $tab,
            ]
        );

        $this->add_wrapper_style_controls($selector);
        $this->add_size_controls($selector);
        $this->add_overflow_controls($selector);

        $this->end_controls_section();
    }
} 