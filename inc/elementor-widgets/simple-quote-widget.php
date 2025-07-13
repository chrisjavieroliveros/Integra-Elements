<?php
/**
 * Simple Quote Widget - Simple Quote Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Simple_Quote_Widget
 */
class Simple_Quote_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_simple_quote';
    }

    public function get_title() {
        return __('Simple Quote', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'quote', 'testimonial', 'simple'];
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

        // Container Controls
        include('attr/container/container.controls.php');

        // Height Controls
        $height_config = [
            'selector' => '.simple-quote',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // End General Section
        $this->end_controls_section();

        // Quote Content Section
        $this->start_controls_section(
            'section_quote_content',
            [
                'label' => __('Quote Content', 'integra-elements'),
            ]
        );

        // Quote Text Control
        $this->add_control(
            'quote_text',
            [
                'label' => __('Quote Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum distinctio porro eligendi libero tempora!', 'integra-elements'),
                'placeholder' => __('Enter your quote text here...', 'integra-elements'),
                'rows' => 6,
            ]
        );

        // Quote Author Control
        $this->add_control(
            'quote_author',
            [
                'label' => __('Quote Author', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Josh H. Network Security Engineer', 'integra-elements'),
                'placeholder' => __('Enter author name and title...', 'integra-elements'),
            ]
        );

        // End Quote Content Section
        $this->end_controls_section();

        // Spacing Section
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

        // Theme Controls
        include('attr/theme/theme.controls.php');

        // Background Controls
        include('attr/background/background.controls.php');

        // End Background Section
        $this->end_controls_section();

        // Typography Section
        $this->start_controls_section(
            'section_typography',
            [
                'label' => __('Typography', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Quote Text Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'quote_text_typography',
                'label' => __('Quote Text Typography', 'integra-elements'),
                'selector' => '{{WRAPPER}} .simple-quote .quote-text p',
            ]
        );

        // Quote Author Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'quote_author_typography',
                'label' => __('Quote Author Typography', 'integra-elements'),
                'selector' => '{{WRAPPER}} .simple-quote .quote-author',
            ]
        );

        // End Typography Section
        $this->end_controls_section();

        // Colors Section
        $this->start_controls_section(
            'section_colors',
            [
                'label' => __('Colors', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Quote Text Color
        $this->add_control(
            'quote_text_color',
            [
                'label' => __('Quote Text Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .simple-quote .quote-text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Quote Author Color
        $this->add_control(
            'quote_author_color',
            [
                'label' => __('Quote Author Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .simple-quote .quote-author' => 'color: {{VALUE}};',
                ],
            ]
        );

        // End Colors Section
        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Theme Render
        include('attr/theme/theme.render.php');

        // Background Render
        include('attr/background/background.render.php');

        // Get quote content
        $quote_text = $settings['quote_text'];
        $quote_author = $settings['quote_author'];

        ?>

        <!-- Simple Quote Section -->
        <section class="simple-quote <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">
                <div class="quote-content">
                    <?php if (!empty($quote_text)) : ?>
                        <div class="quote-text">
                            <p><?= wp_kses_post($quote_text); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($quote_author)) : ?>
                        <span class="quote-author">
                            <?= esc_html($quote_author); ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
    }
} 