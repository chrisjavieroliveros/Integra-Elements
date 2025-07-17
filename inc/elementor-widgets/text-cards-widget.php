<?php
/**
 * Text Cards Widget - Text Cards Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Text_Cards_Widget
 */
class Text_Cards_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_text_cards';
    }

    public function get_title() {
        return __('Text Cards', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'text', 'cards', 'grid', 'content'];
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

        // Height Controls
        $height_config = [
            'selector' => '.text-cards-section',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Grid columns control
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ],
                'selectors' => [
                    '{{WRAPPER}} .text-cards-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        // Card Size
        $this->add_control(
            'card_size',
            [
                'label' => __('Card Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'sm',
                'options' => [
                    'sm' => __('Small', 'integra-elements'),
                    'md' => __('Medium', 'integra-elements'),
                    'lg' => __('Large', 'integra-elements'),
                ],
            ]
        );

        // Card Shadow
        $this->add_control(
            'card_shadow',
            [
                'label' => __('Card Shadow', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'no-shadow',
                'options' => [
                    'no-shadow' => __('No Shadow', 'integra-elements'),
                    'shadow-1' => __('Shadow 1', 'integra-elements'),
                    'shadow-2' => __('Shadow 2', 'integra-elements'),
                    'shadow-3' => __('Shadow 3', 'integra-elements'),
                    'shadow-4' => __('Shadow 4', 'integra-elements'),
                    'shadow-5' => __('Shadow 5', 'integra-elements'),
                ],
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Text Cards Section
        $this->start_controls_section(
            'section_text_cards',
            [
                'label' => __('Text Cards', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Text Cards Repeater
        $repeater = new \Elementor\Repeater();

        // Card Content
        $repeater->add_control(
            'card_content',
            [
                'label' => esc_html__('Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<b>Cloud-Native Applications</b><p>Designed for modern cloud environments with scalable architecture and microservices approach for optimal performance.</p>',
                'placeholder' => esc_html__('Enter card content...', 'integra-elements'),
            ]
        );

        // List Style (Default, Icons);
        $repeater->add_control(
            'list_style',
            [
                'label' => __('List Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __('Default', 'integra-elements'),
                    'icon' => __('Icon', 'integra-elements'),
                ],
            ]
        );

        // List Style Icon;
        $repeater->add_control(
            'list_style_icon',
            [
                'label' => __('List Style Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'list_style' => 'icon',
                ],
            ]
        );

        // List Style Icon Color
        $repeater->add_control(
            'list_style_icon_color',
            [
                'label' => __('List Icon Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Primary',
                'options' => [
                    // Brand Colors
                    'Primary' => 'Primary',
                    'Secondary' => 'Secondary',
                    'Separator_0' => '────',

                    // Base Colors
                    'Light-500' => 'Light',
                    'Dark-500' => 'Dark',
                    'Black' => 'Black',
                    'White' => 'White',
                    'Separator_1' => '────',
                    
                    // State Colors
                    'Danger' => 'Danger',
                    'Warning' => 'Warning',
                    'Success' => 'Success',
                    'Info' => 'Info',
                ],
                'condition' => [
                    'list_style' => 'icon',
                ],
            ]
        );

        // Text Cards Repeater
        $this->add_control(
            'cards',
            [
                'label' => esc_html__('Cards', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_content' => '<b>Cloud-Native Applications</b><p>Designed for modern cloud environments with scalable architecture and microservices approach for optimal performance.</p>',
                        'list_style' => 'default',
                    ],
                    [
                        'card_content' => '<b>Legacy System Integration</b><p>Seamless data migration and API connectivity ensuring backward compatibility with existing infrastructure systems.</p>',
                        'list_style' => 'default',
                    ],
                    [
                        'card_content' => '<b>Security & Compliance</b><p>End-to-end encryption with regulatory compliance features and comprehensive access control management capabilities.</p>',
                        'list_style' => 'default',
                    ],
                    [
                        'card_content' => '<b>Performance Optimization</b><p>Real-time monitoring with auto-scaling capabilities and intelligent load balancing for enhanced system performance.</p>',
                        'list_style' => 'default',
                    ],
                    [
                        'card_content' => '<b>DevOps Integration</b><p>Complete CI/CD pipelines with automated testing and deployment automation for streamlined development workflows.</p>',
                        'list_style' => 'default',
                    ],
                ],
                'title_field' => '{{{ card_content.replace(/<[^>]*>/g, "").substring(0, 50) }}}',
            ]
        );

        // End Text Cards Section
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

        // Theme Render;
        include('attr/theme/theme.render.php');

        // Background Render;
        include('attr/background/background.render.php');

        // Get text cards data
        $text_cards = $settings['cards'] ?? [];
        $grid_columns = $settings['columns'] ?? '3';
        $card_size = $settings['card_size'] ?? 'sm';
        $card_shadow = $settings['card_shadow'] ?? 'no-shadow';

        // Determine card size class
        $card_size_class = '';
        if ($card_size === 'sm') {
            $card_size_class = ' text-cards-grid--small';
        } elseif ($card_size === 'lg') {
            $card_size_class = ' text-cards-grid--large';
        }

        ?>

        <!-- Text Cards Section -->
        <section class="text-cards-section <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <div class="text-cards-grid text-cards-grid--<?= esc_attr($grid_columns); ?><?= esc_attr($card_size_class); ?>">
                    
                                        <?php foreach ($text_cards as $index => $item) : ?>
                        <div class="card-style<?= $card_shadow !== 'no-shadow' ? ' card-style--' . esc_attr($card_shadow) : ''; ?>">
                            <div class="text-content">
                            <div class="inner-content">
                                <?php if (!empty($item['card_content'])) : ?>
                                        <?php
                                        $card_content = $item['card_content'];
                                        
                                        // Apply list style overrides if set
                                        if (!empty($item['list_style']) && $item['list_style'] === 'icon') {
                                            $list_style_icon_color = $item['list_style_icon_color'] ?? 'Primary';
                                            
                                            // Add styled-icons class to parent ul or ol elements
                                            $card_content = preg_replace('/<(ul|ol)([^>]*)>/', '<$1$2 class="styled-icons">', $card_content);
                                            // Handle case where class attribute already exists
                                            $card_content = preg_replace('/<(ul|ol)([^>]*) class="([^"]*)" class="styled-icons">/', '<$1$2 class="$3 styled-icons">', $card_content);
                                            
                                            // Add icon to each list item with color styling
                                            if (!empty($item['list_style_icon']['value'])) {
                                                $card_content = preg_replace('/<li>(.*?)<\/li>/', '<li><i class="'. $item['list_style_icon']['value'] .'" style="color: var(--color-'. $list_style_icon_color .');"></i>$1</li>', $card_content);
                                            }
                                        }
                                        
                                        echo wp_kses_post($card_content);
                                        ?>
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