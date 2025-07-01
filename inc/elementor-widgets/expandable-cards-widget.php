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

        $pill_repeater = new \Elementor\Repeater();
        $pill_repeater->add_control(
            'pill_text',
            [
                'label' => __('Pill Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Pill', 'integra-elements'),
            ]
        );

        $list_repeater = new \Elementor\Repeater();
        $list_repeater->add_control(
            'list_item_text',
            [
                'label' => __('List Item Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('List item', 'integra-elements'),
            ]
        );

        $card_repeater = new \Elementor\Repeater();
        $card_repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => '' ],
            ]
        );


        // Card Content Control (WYSIWYG)
        $card_repeater->add_control(
            'card_content',
            [
                'label' => __('Card Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h6>Lorem ipsum dolor sit amet.</h6> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, iste! Voluptatem, dicta.</p>', 'integra-elements'),
            ]
        );


        $card_repeater->add_control(
            'pills',
            [
                'label' => __('Pills', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $pill_repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ pill_text }}}',
            ]
        );
        
        $card_repeater->add_control(
            'list_items',
            [
                'label' => __('Expandable List Items', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $list_repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ list_item_text }}}',
            ]
        );

        $this->add_control(
            'cards',
            [
                'label' => __('Cards', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $card_repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ card_content }}}',
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
                                <div class="icon-wrapper">
                                    <?php if (!empty($card['icon']['url'])) : ?>
                                        <img src="<?= esc_url($card['icon']['url']); ?>" alt="<?= esc_attr($card['title']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="card-content">
                                    <?= wp_kses_post($card['card_content']); ?>
                                    <?php if (!empty($card['pills'])) : ?>
                                        <div class="pill-wrapper">
                                            <?php foreach ($card['pills'] as $pill) : ?>
                                                <span class="pill pill--light-200"><?= esc_html($pill['pill_text']); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <span class="card-trigger"> Learn More <i class="fas fa-chevron-down"></i> </span>
                            </div>
                            <div class="hidden-content">
                                <div class="expandable-card-list">
                                    <?php if (!empty($card['list_items'])) : ?>
                                        <?php foreach ($card['list_items'] as $item) : ?>
                                            <div class="expandable-card-list-item">
                                                <div class="icon-wrapper"></div>
                                                <div class="card-content">
                                                    <p><?= esc_html($item['list_item_text']); ?></p>
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