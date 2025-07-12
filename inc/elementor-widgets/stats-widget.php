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

        // Icon Size;
        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 16,
                        'max' => 64,
                        'step' => 8,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
            ]
        );

        // Card Columns;
        $this->add_control(
            'card_columns',
            [
                'label' => __('Card Columns', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 3,
                        'max' => 5,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 4,
                ],
            ]
        );

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
                    'value' => 'fas fa-border-none',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'card_icon_color',
            [
                'label' => __( 'Icon Color', 'integra-elements' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'Transparent' => 'Transparent',
                    'Separator_0' => '────',

                    // Brand Colors
                    'Primary' => 'Primary',
                    'Secondary' => 'Secondary',
                    'Separator_1' => '────',
                        
                    // Base Colors
                    'Light' => 'Light',
                    'Dark' => 'Dark',
                    'Black' => 'Black',
                    'White' => 'White',
                    'Separator_2' => '────',

                    // State Colors
                    'Danger' => 'Danger',
                    'Warning' => 'Warning',
                    'Success' => 'Success',
                    'Info' => 'Info',
                ],
                'default' => 'Primary',
            ]
        );

        $repeater->add_control(
            'card_content',
            [
                'label' => __('Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('<h5 class="text-Primary">Stat Title</h5>Stat description and text goes here', 'integra-elements'),
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
                        'card_content' => __( '<h5 class="text-Primary">Stat Title</h5>Stat description and text goes here', 'integra-elements' ),
                    ],
                    [
                        'card_content' => __( '<h5 class="text-Primary">Stat Title</h5>Stat description and text goes here', 'integra-elements' ),
                    ],
                    [
                        'card_content' => __( '<h5 class="text-Primary">Stat Title</h5>Stat description and text goes here', 'integra-elements' ),
                    ],
                    [
                        'card_content' => __( '<h5 class="text-Primary">Stat Title</h5>Stat description and text goes here', 'integra-elements' ),
                    ]
                ],
                'title_field' => '{{{ card_content }}}',
            ]
        );

        $this->end_controls_section();

        // Spacing Section;
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

        $card_columns = $settings['card_columns']['size'];

        // Theme Render;
        include('attr/theme/theme.render.php');
        
        // Background Render;
        include('attr/background/background.render.php');
        ?>

        <!-- Stat Cards Section -->
        <section class="stat-cards stat-cards--<?= esc_attr(trim($card_columns)); ?> <?= esc_attr(trim($section_class)); ?>" style="<?= esc_attr($section_style); ?>">
            <div class="container">
                <?php if ($settings['stat_cards']) : ?>
                    <?php foreach ($settings['stat_cards'] as $item) : ?>
                        <div class="stat-card card-style elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                            <div class="icon-wrapper">
                                <i class="<?php echo esc_attr($item['card_icon']['value']); ?>" style="font-size: <?php echo $settings['icon_size']['size']; ?>px; color: var(--color-<?php echo esc_attr($item['card_icon_color']); ?>);"></i>
                            </div>
                            <div class="card-content">
                                <?php echo wp_kses_post($item['card_content']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <?php
    }
} 