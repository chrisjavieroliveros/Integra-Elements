<?php
/**
 * Flip Cards Widget - Interactive flip cards with stats and overlays
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Flip_Cards_Widget
 */
class Flip_Cards_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_flip_cards';
    }

    public function get_title() {
        return __('Flip Cards', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'flip', 'cards', 'stats', 'hover'];
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
            'selector' => '.flip-cards',
            'default' => 50,
        ];
        include('attr/height/height.controls.php');

        // Columns Control
        $this->add_control(
            'columns',
            [
                'label' => __('Columns', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '3' => __('3 Columns', 'integra-elements'),
                    '4' => __('4 Columns', 'integra-elements'),
                ],
                'default' => '3',
                'description' => __('Responsive behavior is handled automatically by the theme CSS.', 'integra-elements'),
            ]
        );

        $this->end_controls_section();

        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Flip Cards', 'integra-elements'),
            ]
        );

        $this->add_control(
            'overlay_title',
            [
                'label' => __('Overlay Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Lorem Ipsum', 'integra-elements'),
                'placeholder' => __('Enter overlay title', 'integra-elements'),
                'description' => __('This title will appear on all flip card overlays.', 'integra-elements'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Card Title', 'integra-elements'),
                'placeholder' => __('Enter title', 'integra-elements'),
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Card subtitle', 'integra-elements'),
                'placeholder' => __('Enter subtitle', 'integra-elements'),
            ]
        );



        $repeater->add_control(
            'overlay_description',
            [
                'label' => __('Overlay Description', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('This is the overlay description that appears when the card is hovered or clicked.', 'integra-elements'),
                'placeholder' => __('Enter overlay description', 'integra-elements'),
            ]
        );

        $this->add_control(
            'flip_cards',
            [
                'label' => __('Flip Cards', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Lorem Ipsum Dolor Sit Amet', 'integra-elements'),
                        'subtitle' => __('Consectetur adipiscing elit', 'integra-elements'),
                        'overlay_description' => __('Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-ticket',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'title' => __('Consectetur Adipiscing Elit', 'integra-elements'),
                        'subtitle' => __('Sed do eiusmod tempor incididunt', 'integra-elements'),
                        'overlay_description' => __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-mobile',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'title' => __('Ut Labore Et Dolore Magna', 'integra-elements'),
                        'subtitle' => __('Aliqua ut enim ad minim veniam', 'integra-elements'),
                        'overlay_description' => __('Sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-shield',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'title' => __('Quis Nostrud Exercitation', 'integra-elements'),
                        'subtitle' => __('Ullamco laboris nisi ut aliquip', 'integra-elements'),
                        'overlay_description' => __('Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-clock-o',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'title' => __('Excepteur Sint Occaecat', 'integra-elements'),
                        'subtitle' => __('Cupidatat non proident sunt', 'integra-elements'),
                        'overlay_description' => __('Aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-cloud',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'title' => __('Temporibus Autem Quibusdam', 'integra-elements'),
                        'subtitle' => __('Et aut officiis debitis aut rerum', 'integra-elements'),
                        'overlay_description' => __('Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem.', 'integra-elements'),
                        'icon' => [
                            'value' => 'fa fa-line-chart',
                            'library' => 'fa-solid',
                        ],
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

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

        // Get columns setting
        $columns = $settings['columns'];

        // Build section classes
        $section_classes = [
            'flip-cards',
            'flip-cards--' . $columns,
        ];

        if (isset($section_class)) {
            $section_classes[] = trim($section_class);
        }

        ?>

        <!-- Flip Cards Section -->
        <section class="<?= esc_attr(implode(' ', $section_classes)); ?>"
                style="<?= esc_attr($section_style ?? ''); ?>">
            <div class="container">

                <?php if (!empty($settings['flip_cards'])) : ?>
                    <?php foreach ($settings['flip_cards'] as $index => $card) : ?>
                        <div class="flip-card">
                            <div class="flip-card-front">
                                <?php if (!empty($card['icon'])) : ?>
                                    <div class="icon-wrapper">
                                        <?php 
                                        $display_icon = $card['icon'];
                                        
                                        // Simple check: if array, it's SVG upload; if string, it's library icon
                                        if (is_array($display_icon)) {
                                            // Check if it's SVG (library = 'svg' and nested url)
                                            if (isset($display_icon['library']) && $display_icon['library'] === 'svg' && isset($display_icon['value']['url'])) {
                                                // SVG upload - render as img
                                                echo '<img src="'. esc_url($display_icon['value']['url']) .'" alt="Flip Card Icon" style="width: 24px; height: auto;" />';
                                            } elseif (isset($display_icon['value']) && !empty($display_icon['value'])) {
                                                // Library icon - render as i tag
                                                echo '<i class="'. esc_attr($display_icon['value']) .'" aria-hidden="true"></i>';
                                            }
                                        } elseif (!empty($display_icon)) {
                                            // Library icon - render as i tag
                                            $icon_class = is_array($display_icon) && isset($display_icon['value']) ? $display_icon['value'] : $display_icon;
                                            echo '<i class="'. esc_attr($icon_class) .'" aria-hidden="true"></i>';
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="text-content">
                                    <?php if (!empty($card['title'])) : ?>
                                        <h5><?= esc_html($card['title']); ?></h5>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($card['subtitle'])) : ?>
                                        <span><?= esc_html($card['subtitle']); ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="pop-indicator">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            <div class="flip-card-overlay">
                                <?php if (!empty($settings['overlay_title'])) : ?>
                                    <h6 class="overlay-title"><?= esc_html($settings['overlay_title']); ?></h6>
                                <?php endif; ?>
                                
                                <?php if (!empty($card['overlay_description'])) : ?>
                                    <p><?= esc_html($card['overlay_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </section>

        <?php
    }
} 