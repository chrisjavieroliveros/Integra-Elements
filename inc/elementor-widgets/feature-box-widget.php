<?php
/**
 * Feature Box Widget
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;
namespace Integra_Elements\Elementor\Traits;


// use Integra_Elements\Elementor\Traits\Common_Background_Color;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Feature_Box_Widget
 */
class Feature_Box_Widget extends \Elementor\Widget_Base {
    use Common_Background_Color;

    /**
     * Get widget name.
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'integra_feature_box';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Feature Box', 'integra-elements');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-info-box';
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
        return ['feature', 'box', 'service', 'integra', 'info'];
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
            'icon_type',
            [
                'label' => __('Icon Type', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => __('Icon', 'integra-elements'),
                    'image' => __('Image', 'integra-elements'),
                ],
            ]
        );

        $this->add_control(
            'selected_icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Feature Title', 'integra-elements'),
                'placeholder' => __('Enter your title', 'integra-elements'),
                'label_block' => true,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('This is a feature box widget that you can use to highlight the features or services of your business.', 'integra-elements'),
                'placeholder' => __('Enter your description', 'integra-elements'),
                'rows' => 5,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'integra-elements'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Style Icon/Image Section
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __('Icon / Image', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .integra-feature-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4054b2',
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-icon i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __('Margin', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-icon, {{WRAPPER}} .integra-feature-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Title Section
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __('Title', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .integra-feature-title',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Description Section
        $this->start_controls_section(
            'section_style_description',
            [
                'label' => __('Description', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .integra-feature-description',
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label' => __('Margin', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Box Section
        $this->start_controls_section(
            'section_style_box',
            [
                'label' => __('Box', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-box' => 'text-align: {{VALUE}};',
                ],
            ]
        );

                 // Add shared background color control
         $this->add_common_background_color(
             '.integra-feature-box',
             'box_background_color',
             'Box Background Color'
         );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border', 'integra-elements'),
                'selector' => '{{WRAPPER}} .integra-feature-box',
            ]
        );

        $this->add_responsive_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'integra-elements'),
                'selector' => '{{WRAPPER}} .integra-feature-box',
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __('Padding', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .integra-feature-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'integra-feature-box');
        
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link', $settings['link']);
        }
        ?>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <?php if ($settings['icon_type'] === 'icon' && !empty($settings['selected_icon']['value'])) : ?>
                <!-- <div class="integra-feature-icon">
                    <?php // \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']); ?>
                </div> -->
            <?php elseif ($settings['icon_type'] === 'image' && !empty($settings['image']['url'])) : ?>
                <div class="integra-feature-image">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </div>
            <?php endif; ?>

            <?php if (!empty($settings['title'])) : ?>
                <h3 class="integra-feature-title">
                    <?php if (!empty($settings['link']['url'])) : ?>
                        <a <?php echo $this->get_render_attribute_string('link'); ?>>
                            <?php echo esc_html($settings['title']); ?>
                        </a>
                    <?php else : ?>
                        <?php echo esc_html($settings['title']); ?>
                    <?php endif; ?>
                </h3>
            <?php endif; ?>

            <?php if (!empty($settings['description'])) : ?>
                <div class="integra-feature-description">
                    <?php echo wp_kses_post($settings['description']); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

}
