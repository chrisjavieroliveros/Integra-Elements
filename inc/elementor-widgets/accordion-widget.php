<?php
/**
 * Accordion Widget - FAQ/Accordion Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Accordion_Widget
 */
class Accordion_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_accordion';
    }

    public function get_title() {
        return __('Accordion', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'accordion', 'faq', 'collapsible'];
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

        // End General Section
        $this->end_controls_section();

        // Accordion Items Section
        $this->start_controls_section(
            'section_accordion_items',
            [
                'label' => __('Accordion Items', 'integra-elements'),
            ]
        );

        $this->add_control(
            'accordion_items',
            [
                'label' => __('Accordion Items', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __('Title', 'integra-elements'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Accordion Item Title', 'integra-elements'),
                        'placeholder' => __('Enter accordion item title', 'integra-elements'),
                    ],
                    [
                        'name' => 'item_content',
                        'label' => __('Content', 'integra-elements'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => __('Accordion item content goes here.', 'integra-elements'),
                        'placeholder' => __('Enter accordion item content', 'integra-elements'),
                    ],
                    [
                        'name' => 'item_active',
                        'label' => __('Active by Default', 'integra-elements'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __('Yes', 'integra-elements'),
                        'label_off' => __('No', 'integra-elements'),
                        'return_value' => 'yes',
                        'default' => '',
                    ],
                ],
                'default' => [
                    [
                        'item_title' => __('How do schools securely onboard BYOD and unmanaged devices?', 'integra-elements'),
                        'item_content' => __('SecureW2 uses certificate-based authentication to apply access policies across all device types—whether managed or not. This includes Windows, macOS, iOS, Android, and ChromeOS devices, as well as shared-use carts.', 'integra-elements'),
                        'item_active' => 'yes',
                    ],
                    [
                        'item_title' => __('What are the benefits of certificate-based authentication?', 'integra-elements'),
                        'item_content' => __('Certificate-based authentication provides enhanced security, simplified IT management, and eliminates the risks associated with MAC filtering, shared passwords, or manually maintained whitelists.', 'integra-elements'),
                        'item_active' => '',
                    ],
                    [
                        'item_title' => __('How does this work across different device types?', 'integra-elements'),
                        'item_content' => __('The solution works seamlessly across Windows, macOS, iOS, Android, and ChromeOS devices, providing consistent security policies regardless of device type or management status.', 'integra-elements'),
                        'item_active' => '',
                    ],
                ],
                'title_field' => '{{{ item_title }}}',
            ]
        );

        // Icon Settings
        $this->add_control(
            'accordion_icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-down',
                    'library' => 'fa-solid',
                ],
                'separator' => 'before',
            ]
        );

        // End Accordion Items Section
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

        $accordion_items = $settings['accordion_items'];
        $accordion_icon = $settings['accordion_icon'];

        ?>

        <!-- Accordion Section -->
        <section class="accordion-section <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <?php foreach ($accordion_items as $index => $item) : ?>
                    <?php 
                    $item_active = $item['item_active'] === 'yes' ? ' accordion-item--active' : '';
                    ?>
                    <div class="accordion-item card-style<?= esc_attr($item_active); ?>">
                        <div class="accordion-item-header">
                            <?= esc_html($item['item_title']); ?>

                            <span class="accordion-item-icon">
                                <?php if (!empty($accordion_icon['value'])) : ?>
                                    <?php \Elementor\Icons_Manager::render_icon($accordion_icon, ['aria-hidden' => 'true']); ?>
                                <?php else : ?>
                                    <i class="fas fa-angle-down"></i>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="accordion-item-content">
                            <?= wp_kses_post($item['item_content']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>

        <?php
    }
} 