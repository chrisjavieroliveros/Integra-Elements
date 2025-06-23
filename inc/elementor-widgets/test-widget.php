<?php
/**
 * Test Widget - Minimal Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Test_Widget
 */
class Test_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'integra_test';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return __('Test Widget', 'integra-elements');
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return ['integra-elements'];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __('Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hello World!', 'integra-elements'),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <section>
            <div class="container">
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates earum odit.</h1>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium vero reprehenderit velit perferendis saepe in quisquam explicabo ipsam sequi tempora perspiciatis enim, architecto possimus consectetur placeat beatae maxime. Dolor sequi suscipit expedita laborum quia quos nemo voluptates facilis iure saepe? Doloremque laboriosam excepturi nobis autem!</p>
            </div>
        </section>

        <?php
        // echo '<div class="integra-test-widget">' . esc_html($settings['text']) . '</div>';
    }
} 