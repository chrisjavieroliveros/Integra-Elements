<?php
/**
 * Stats Widget - Stat Cards Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Stats_Widget
 */
class Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_stats';
    }

    public function get_title() {
        return __('Stats', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-number-field';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'stats', 'cards', 'info'];
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

        $this->end_controls_section();


        // Cards Section
        $this->start_controls_section(
            'section_cards',
            [
                'label' => __('Stat Cards', 'integra-elements'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'card_icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chart-line',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'card_title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Card Title', 'integra-elements'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => __('Description', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet.', 'integra-elements'),
            ]
        );

        $repeater->add_control(
			'card_color',
			[
				'label' => __( 'Color', 'integra-elements' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-repeater-item-{{ID}} .icon-wrapper i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .elementor-repeater-item-{{ID}} .card-content h6' => 'color: {{VALUE}}',
				],
			]
		);


        $this->add_control(
            'stat_cards',
            [
                'label' => __('Stat Cards', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_title' => __( 'Card Title 1', 'integra-elements' ),
                        'card_description' => __( 'Lorem ipsum dolor sit amet.', 'integra-elements' ),
                    ],
                    [
                        'card_title' => __( 'Card Title 2', 'integra-elements' ),
                        'card_description' => __( 'Lorem ipsum dolor sit amet.', 'integra-elements' ),
                    ],
                    [
                        'card_title' => __( 'Card Title 3', 'integra-elements' ),
                        'card_description' => __( 'Lorem ipsum dolor sit amet.', 'integra-elements' ),
                    ],
                    [
                        'card_title' => __( 'Card Title 4', 'integra-elements' ),
                        'card_description' => __( 'Lorem ipsum dolor sit amet.', 'integra-elements' ),
                    ]
                ],
                'title_field' => '{{{ card_title }}}',
            ]
        );

        $this->end_controls_section();

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
        ?>

        <!-- Stat Cards Section -->
        <section class="stat-cards <?= esc_attr(trim($section_class)); ?>" style="<?= esc_attr($section_style); ?>">
            <div class="container" style="grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));">
                <?php if ($settings['stat_cards']) : ?>
                    <?php foreach ($settings['stat_cards'] as $item) : ?>
                        <div class="stat-card card-style elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                            <div class="icon-wrapper">
                                <?php \Elementor\Icons_Manager::render_icon($item['card_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                            <div class="card-content">
                                <h6><?php echo esc_html($item['card_title']); ?></h6>
                                <p><?php echo esc_html($item['card_description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }
} 