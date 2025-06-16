<?php
/**
 * Spacing Controls for Elementor Widgets
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Traits;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Trait for spacing controls (margin and padding)
 */
trait Spacing_Controls {

    /**
     * Add margin controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'margin')
     * @param string $label Control label (default: 'Margin')
     */
    protected function add_margin_controls($selector, $control_name = 'margin', $label = 'Margin') {
        $this->add_responsive_control(
            $control_name,
            [
                'label' => __($label, 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    /**
     * Add padding controls
     *
     * @param string $selector CSS selector for the element
     * @param string $control_name Name of the control (default: 'padding')
     * @param string $label Control label (default: 'Padding')
     */
    protected function add_padding_controls($selector, $control_name = 'padding', $label = 'Padding') {
        $this->add_responsive_control(
            $control_name,
            [
                'label' => __($label, 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    "{{WRAPPER}} {$selector}" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    }

    /**
     * Add combined spacing controls (both margin and padding)
     *
     * @param string $selector CSS selector for the element
     * @param string $margin_control_name Name of the margin control (default: 'margin')
     * @param string $padding_control_name Name of the padding control (default: 'padding')
     */
    protected function add_spacing_controls($selector, $margin_control_name = 'margin', $padding_control_name = 'padding') {
        $this->add_margin_controls($selector, $margin_control_name);
        $this->add_padding_controls($selector, $padding_control_name);
    }

    /**
     * Add spacing section with both margin and padding controls
     *
     * @param string $selector CSS selector for the element
     * @param string $section_name Name of the section (default: 'spacing_section')
     * @param string $section_label Section label (default: 'Spacing')
     * @param string $tab Tab to add section to (default: TAB_STYLE)
     */
    protected function add_spacing_section($selector, $section_name = 'spacing_section', $section_label = 'Spacing', $tab = \Elementor\Controls_Manager::TAB_STYLE) {
        $this->start_controls_section(
            $section_name,
            [
                'label' => __($section_label, 'integra-elements'),
                'tab' => $tab,
            ]
        );

        $this->add_spacing_controls($selector);

        $this->end_controls_section();
    }
} 