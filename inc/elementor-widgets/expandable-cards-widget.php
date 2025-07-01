<?php
/**
 * Expandable Cards Widget - Expandable Cards Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Expandable_Cards_Widget
 */
class Expandable_Cards_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_expandable_cards';
    }

    public function get_title() {
        return __('Expandable Cards', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'expandable', 'cards'];
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

        // End General Section
        $this->end_controls_section();

        // Expandable Cards Section
        $this->start_controls_section(
            'section_expandable_cards',
            [
                'label' => __('Expandable Cards', 'integra-elements'),
            ]
        );

        // Card Repeater;
        $card_repeater = new \Elementor\Repeater();

        // Card Repeater: Card Title;
        $card_repeater->add_control(
            'title',
            [
                'label' => __('Card Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Expandable Card',
                'label_block' => true,
            ]
        );

        // Card Repeater: Card Icon;
        $card_repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => '' ],
            ]
        );

        // Card Repeater: Card Content;
        $card_repeater->add_control(
            'card_content',
            [
                'label' => __('Card Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'placeholder' => __('Enter card content here.', 'integra-elements'),
            ]
        );

        // Card Repeater: Pills;
        $card_repeater->add_control(
            'pills_text',
            [
                'label' => __('Pills', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter pill text separated by commas (e.g., Pill 1, Pill 2, Pill 3)', 'integra-elements'),
                'default' => 'Pill 1, Pill 2',
            ]
        );

        // Card Repeater: List Items;
        $card_repeater->add_control(
            'list_texts',
            [
                'label' => __('List Item: Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter list items separated by commas (e.g., List item 1, List item 2, List item 3)', 'integra-elements'),
                'default' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, Sed do eiusmod tempor incididunt ut labore dolore magna, Ut enim ad minim veniam quis nostrud exercitation',
            ]
        );

        // Card Repeater: List Item Icons;
        $card_repeater->add_control(
            'list_icons',
            [
                'label' => __('List Item: Icons', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('fa fa-exclamation-circle | Warning, fa fa-check-circle-o | Danger, fa fa-dot-circle-o | Success', 'integra-elements'),
                'description' => __('Format: icon class | color. Use color names (Warning, Success) or theme colors (Secondary-500, Light-300). Separate with commas.', 'integra-elements'),
                'default' => 'fa fa-exclamation-circle | Warning, fa fa-check-circle-o | Danger, fa fa-dot-circle-o | Success',
            ]
        );

        
        $this->add_control(
            'cards',
            [
                'label' => __('Cards', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $card_repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Expandable Card #1',
                        'card_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'pills_text' => 'Pill 1, Pill 2',
                        'list_texts' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, Sed do eiusmod tempor incididunt ut labore dolore magna, Ut enim ad minim veniam quis nostrud exercitation',
                        'list_icons' => 'fa fa-exclamation-circle | Warning, fa fa-check-circle-o | Danger, fa fa-dot-circle-o | Success',
                    ],
                    [
                        'title' => 'Expandable Card #2',
                        'card_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'pills_text' => 'Pill 1, Pill 2',
                        'list_texts' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, Sed do eiusmod tempor incididunt ut labore dolore magna, Ut enim ad minim veniam quis nostrud exercitation',
                        'list_icons' => 'fa fa-exclamation-circle | Warning, fa fa-check-circle-o | Danger, fa fa-dot-circle-o | Success',
                    ],
                    [
                        'title' => 'Expandable Card #3',
                        'card_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                        'pills_text' => 'Pill 1, Pill 2',
                        'list_texts' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, Sed do eiusmod tempor incididunt ut labore dolore magna, Ut enim ad minim veniam quis nostrud exercitation',
                        'list_icons' => 'fa fa-exclamation-circle | Warning, fa fa-check-circle-o | Danger, fa fa-dot-circle-o | Success',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Spacing Section;
        $spacing_config = [
            'selector' => '.expandable-cards',
            'defaults_top' => [
                'desktop' => 0,
                'tablet' => 0,
                'mobile' => 0,
            ],
            'defaults_bottom' => [
                'desktop' => 0,
                'tablet' => 0,
                'mobile' => 0,
            ],
        ];
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

        // Theme Controls;
        include('attr/theme/theme.controls.php');

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

        // Theme Render;
        include('attr/theme/theme.render.php');

        // Container Render;
        include('attr/container/container.render.php');

        // Background Render;
        include('attr/background/background.render.php');

        // Spacing Render;
        // (No spacing.render.php, but spacing is handled by controls)

        $cards = $settings['cards'] ?? [];
        ?>
        <!-- Expandable Cards Section -->
        <section class="expandable-cards <?= esc_attr(trim($section_class)); ?>" style="<?= esc_attr($section_style); ?>">
            <div class="<?= esc_attr(trim($container_class)); ?>">
                <div class="expandable-cards-wrapper expandable-cards-wrapper--layout-3">
                    <?php foreach ($cards as $card) : ?>
                        <div class="expandable-card card-style">
                            <div class="visible-content">
                                <div class="card-content">
                                    <?php if (!empty($card['icon']['url'])) : ?>
                                    <div class="icon-wrapper">
                                        <img src="<?= esc_url($card['icon']['url']); ?>" alt="<?= esc_attr($card['title']); ?>">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($card['title'])) : ?>
                                        <h6><?= esc_html($card['title']); ?></h6>
                                    <?php endif; ?>
                                    <?php if (!empty($card['card_content'])) : ?>
                                        <p><?= wp_kses_post($card['card_content']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($card['pills_text'])) : ?>
                                        <div class="pill-wrapper">
                                            <?php 
                                            $pills = array_filter(array_map('trim', explode(',', $card['pills_text'])));
                                            foreach ($pills as $pill) : ?>
                                                <span class="pill pill--light-200"><?= esc_html($pill); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <span class="card-trigger"> <span class="card-trigger-text">Learn More</span> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span>
                            </div>
                            <div class="hidden-content">
                                <div class="expandable-card-list">
                                    <?php if (!empty($card['list_texts'])) : ?>
                                        <?php 
                                        $expandable_items = array_filter(array_map('trim', explode(',', $card['list_texts'])));
                                        $expandable_icons_raw = !empty($card['list_icons']) ? 
                                            array_filter(array_map('trim', explode(',', $card['list_icons']))) : [];
                                        
                                        foreach ($expandable_items as $index => $item) : 
                                            $icon_class = '';
                                            $icon_color = '';
                                            
                                            if (isset($expandable_icons_raw[$index]) && !empty($expandable_icons_raw[$index])) {
                                                $icon_parts = explode('|', $expandable_icons_raw[$index]);
                                                $icon_class = trim($icon_parts[0]);
                                                $icon_color = isset($icon_parts[1]) ? trim($icon_parts[1]) : '';
                                            }
                                        ?>
                                            <div class="expandable-card-list-item">
                                                <div class="icon-wrapper">
                                                    <?php if (!empty($icon_class)) : ?>
                                                        <i class="<?= esc_attr($icon_class); ?>" 
                                                           <?php if (!empty($icon_color)) : ?>
                                                               style="color: var(--color-<?= esc_attr($icon_color); ?>);"
                                                           <?php endif; ?>
                                                           aria-hidden="true"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="card-content">
                                                    <p><?= esc_html($item); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
} 