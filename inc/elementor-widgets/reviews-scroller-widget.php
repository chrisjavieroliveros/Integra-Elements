<?php
/**
 * Reviews Scroller Widget - Reviews Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Reviews_Scroller_Widget
 */
class Reviews_Scroller_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_reviews_scroller';
    }

    public function get_title() {
        return __('Reviews Scroller', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'reviews', 'testimonials', 'feedback'];
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
        $container_config = [
            'default' => 992,
        ];
        include('attr/container/container.controls.php');

        // Height Controls
        $height_config = [
            'selector' => '.reviews-section',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Show Navigation Controls
        $this->add_control(
            'show_navigation',
            [
                'label' => __('Show Navigation', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Quote Icon Section
        $this->start_controls_section(
            'section_quote_icon',
            [
                'label' => __('Quote Icon', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Show Quote Icon
        $this->add_control(
            'show_quote_icon',
            [
                'label' => __('Show Quote Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Quote Icon
        $this->add_control(
            'quote_icon',
            [
                'label' => __('Quote Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-quote-left',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_quote_icon' => 'yes',
                ],
            ]
        );

        // Quote Icon Size
        $this->add_control(
            'quote_icon_size',
            [
                'label' => __('Icon Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 8,
                        'max' => 64,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'condition' => [
                    'show_quote_icon' => 'yes',
                ],
            ]
        );

        // Quote Icon Color
        $this->add_control(
            'quote_icon_color',
            [
                'label' => __('Icon Color', 'integra-elements'),
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
                    'show_quote_icon' => 'yes',
                ],
            ]
        );

        // End Quote Icon Section
        $this->end_controls_section();

        // Reviews Section
        $this->start_controls_section(
            'section_reviews',
            [
                'label' => __('Reviews', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Reviews Repeater
        $repeater = new \Elementor\Repeater();

        // Brand Logo
        $repeater->add_control(
            'brand_logo',
            [
                'label' => __('Brand Logo', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/130x56',
                ],
            ]
        );

        // Star Rating
        $repeater->add_control(
            'star_rating',
            [
                'label' => __('Star Rating', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [''],
                'range' => [
                    '' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 5,
                ],
            ]
        );

        // Review Title
        $repeater->add_control(
            'review_title',
            [
                'label' => __('Review Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Lorem Ipsum Dolor Sit Amet', 'integra-elements'),
            ]
        );

        // Review Content
        $repeater->add_control(
            'review_content',
            [
                'label' => __('Review Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam enim, eget aliquam massa nisl quis neque."', 'integra-elements'),
            ]
        );

        // Author Name
        $repeater->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('John Doe, Position', 'integra-elements'),
            ]
        );

        // Reviews Repeater
        $this->add_control(
            'reviews_list',
            [
                'label' => __('Reviews', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'brand_logo' => [
                            'url' => 'https://placehold.co/130x56',
                        ],
                        'star_rating' => [
                            'size' => 5,
                        ],
                        'review_title' => __('Lorem Ipsum Dolor Sit Amet', 'integra-elements'),
                        'review_content' => __('"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, urna eu tincidunt consectetur, nisi nisl aliquam enim, eget aliquam massa nisl quis neque."', 'integra-elements'),
                        'author_name' => __('John Doe, Position', 'integra-elements'),
                    ],
                    [
                        'brand_logo' => [
                            'url' => 'https://placehold.co/130x56',
                        ],
                        'star_rating' => [
                            'size' => 4,
                        ],
                        'review_title' => __('Sed Do Eiusmod Tempor', 'integra-elements'),
                        'review_content' => __('"Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."', 'integra-elements'),
                        'author_name' => __('Jane Smith, Title', 'integra-elements'),
                    ],
                    [
                        'brand_logo' => [
                            'url' => 'https://placehold.co/130x56',
                        ],
                        'star_rating' => [
                            'size' => 3,
                        ],
                        'review_title' => __('Consectetur Adipiscing Elit', 'integra-elements'),
                        'review_content' => __('"Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida."', 'integra-elements'),
                        'author_name' => __('Alex Roe, Developer', 'integra-elements'),
                    ],
                ],
                'title_field' => '{{{ review_title }}}',
            ]
        );

        // End Reviews Section
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

        // Get reviews data
        $reviews = $settings['reviews_list'] ?? [];
        $show_quote_icon = $settings['show_quote_icon'] ?? 'yes';
        $quote_icon = $settings['quote_icon'] ?? '';
        $quote_icon_size = $settings['quote_icon_size']['size'] ?? 24;
        $quote_icon_color = $settings['quote_icon_color'] ?? 'Primary';
        $show_navigation = $settings['show_navigation'] ?? 'yes';

        ?>

        <!-- Reviews Section -->
        <section class="reviews-section <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">

                <div class="swiper-outer">
                    <div class="swiper review-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($reviews as $review) : ?>
                                <div class="swiper-slide">
                                    <div class="review-card">

                                        <div class="review-card-header">
                                            <?php if ($show_quote_icon === 'yes' && !empty($quote_icon)) : ?>
                                                <div class="icon-wrapper">
                                                    <?php if (is_array($quote_icon) && isset($quote_icon['value'])) : ?>
                                                        <?php if (isset($quote_icon['library']) && $quote_icon['library'] === 'svg' && isset($quote_icon['value']['url'])) : ?>
                                                            <img src="<?= esc_url($quote_icon['value']['url']) ?>" 
                                                                 alt="Review Icon" 
                                                                 style="width: <?= esc_attr($quote_icon_size) ?>px; height: auto; color: var(--color-<?= esc_attr($quote_icon_color) ?>);">
                                                        <?php else : ?>
                                                            <i class="<?= esc_attr($quote_icon['value']) ?>" 
                                                               style="font-size: <?= esc_attr($quote_icon_size) ?>px; color: var(--color-<?= esc_attr($quote_icon_color) ?>);"></i>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <i class="<?= esc_attr($quote_icon) ?>" 
                                                           style="font-size: <?= esc_attr($quote_icon_size) ?>px; color: var(--color-<?= esc_attr($quote_icon_color) ?>);"></i>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($review['brand_logo']['url'])) : ?>
                                                <div class="review-brand">
                                                    <img src="<?= esc_url($review['brand_logo']['url']) ?>" alt="Brand Logo">
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="review-card-body">
                                            <?php if (!empty($review['star_rating']['size'])) : ?>
                                                <div class="review-card-stars">
                                                    <?php 
                                                    $rating = (int) ($review['star_rating']['size'] ?? 0);
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $rating) {
                                                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="text-content">
                                                <?php if (!empty($review['review_title'])) : ?>
                                                    <span class="review-title">
                                                        <?= esc_html($review['review_title']) ?>
                                                    </span>
                                                <?php endif; ?>
                                                
                                                <?php if (!empty($review['review_content'])) : ?>
                                                    <p><?= wp_kses_post($review['review_content']) ?></p>
                                                <?php endif; ?>
                                                
                                                <?php if (!empty($review['author_name'])) : ?>
                                                    <b class="review-card-author"><?= esc_html($review['author_name']) ?></b>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if ($show_navigation === 'yes') : ?>
                            <div class="review-swiper-controls">
                                <div class="review-button review-button-prev">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </div>
                                <div class="review-button review-button-next">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </section>

        <?php
    }
} 