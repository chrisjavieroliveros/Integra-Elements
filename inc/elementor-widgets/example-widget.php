<?php
/**
 * Example Widget
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

// use Integra_Elements\Elementor\Traits\Common_Background_Color;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Example_Widget
 */
class Example_Widget extends \Elementor\Widget_Base {
    // use Common_Background_Color;

    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'integra_example';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Example Widget', 'integra-elements');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * Get widget categories.
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['integra-elements'];
    }

    /**
     * Get widget keywords.
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['example', 'integra', 'widget'];
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
            'title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Example Title', 'integra-elements'),
                'placeholder' => __('Enter your title', 'integra-elements'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Example description text. Edit this to change the content.', 'integra-elements'),
                'placeholder' => __('Enter your description', 'integra-elements'),
                'rows' => 10,
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .integra-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'integra-elements'),
                'selector' => '{{WRAPPER}} .integra-widget-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .integra-widget-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

                 $this->add_group_control(
             \Elementor\Group_Control_Typography::get_type(),
             [
                 'name' => 'description_typography',
                 'label' => __('Description Typography', 'integra-elements'),
                 'selector' => '{{WRAPPER}} .integra-widget-description',
             ]
         );

         // Add shared background color control
         // $this->add_common_background_color(
         //     '.integra-elementor-widget',
         //     'widget_background_color',
         //     'Widget Background Color'
         // );

         $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="container">
            <div class="integra-elementor-widget integra-example-widget">
                <h2 class="integra-widget-title"><?php echo esc_html($settings['title']); ?></h2>
                <div class="integra-widget-description">
                    <?php echo wp_kses_post($settings['description']); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
