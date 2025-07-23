<?php
/**
 * Gallery Scroller Widget - Gallery Scroller Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Gallery_Scroller_Widget
 */
class Gallery_Scroller_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_gallery_scroller';
    }

    public function get_title() {
        return __('Gallery Scroller', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'gallery', 'scroller', 'images', 'carousel'];
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
            'selector' => '.scroller-gallery',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Grayed Style
        $this->add_control(
            'grayed_style',
            [
                'label' => __('Grayed Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => '',
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Gallery Settings Section
        $this->start_controls_section(
            'section_gallery_settings',
            [
                'label' => __('Gallery Settings', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Gallery Item Height
        $this->add_control(
            'gallery_item_height',
            [
                'label' => __('Gallery Item Height', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 24,
                        'max' => 240,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
            ]
        );

        // Gallery Gap
        $this->add_control(
            'gallery_gap',
            [
                'label' => __('Gallery Gap', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
            ]
        );

        // Speed
        $this->add_control(
            'speed',
            [
                'label' => __('Speed', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [''],
                'range' => [
                    '' => [
                        'min' => 1,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '',
                    'size' => 4,
                ],
            ]
        );

        // Side Color
        $this->add_control(
            'side_color',
            [
                'label' => __('Side Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f8f9fa',
            ]
        );

        // Mid Color
        $this->add_control(
            'mid_color',
            [
                'label' => __('Mid Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
            ]
        );

        // End Gallery Settings Section
        $this->end_controls_section();

        // Gallery Items Section
        $this->start_controls_section(
            'section_gallery_items',
            [
                'label' => __('Gallery Items', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Gallery Images
        $this->add_control(
            'gallery_images',
            [
                'label' => __('Gallery Images', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        // End Gallery Items Section
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

        // Get gallery settings
        $gallery_images = $settings['gallery_images'] ?? [];
        $gallery_item_height = $settings['gallery_item_height']['size'] ?? 100;
        $gallery_gap = $settings['gallery_gap']['size'] ?? 24;
        $speed = $settings['speed']['size'] ?? 4;
        $side_color = $settings['side_color'] ?? '#f8f9fa';
        $mid_color = $settings['mid_color'] ?? '#ffffff';
        $grayed_style = $settings['grayed_style'] ?? '';

        // Apply grayed style class if enabled
        $gallery_section_class = '';
        if ($grayed_style === 'yes') {
            $gallery_section_class .= ' grayed-out';
        }

        // Generate unique ID for this widget instance
        $widget_id = $this->get_id();

        ?>

        <!-- Gallery Scroller Section -->
        <section class="scroller-gallery <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">
                                 <div class="gallery-section<?= esc_attr($gallery_section_class); ?>" 
                     id="gallery-section-<?= esc_attr($widget_id); ?>"
                     style="background: linear-gradient(to right, <?= esc_attr($side_color); ?> 0%, <?= esc_attr($mid_color); ?> 50%, <?= esc_attr($side_color); ?> 100%)">
                    <div class="gallery-container" 
                         id="gallery-container-<?= esc_attr($widget_id); ?>"
                         style="height: <?= esc_attr($gallery_item_height); ?>px;">
                        <div class="gallery-wrapper" 
                             id="gallery-wrapper-<?= esc_attr($widget_id); ?>"
                             style="gap: <?= esc_attr($gallery_gap); ?>px;">
                            <?php if (!empty($gallery_images)) : ?>
                                <?php foreach ($gallery_images as $image) : ?>
                                    <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                        <?php if (!empty($image['url'])) : ?>
                                            <img src="<?= esc_url($image['url']); ?>" 
                                                 alt="<?= esc_attr($image['alt'] ?? 'Gallery Image'); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- Default placeholder images if no gallery images are selected -->
                                <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item" style="height: <?= esc_attr($gallery_item_height); ?>px;">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.querySelector('.gallery-wrapper');

            // Speed configuration from Elementor settings
            const speed = <?= $speed; ?> || 4;

            // Responsive speed multipliers
            let currentSpeedMultiplier = window.innerWidth <= 768 ? 0.08 : 0.05; // Mobile: 0.8, Desktop: 0.05
            
            // Recalculate speed multiplier on window resize
            const updateSpeedMultiplier = () => {
                currentSpeedMultiplier = window.innerWidth <= 768 ? 0.08 : 0.05;
            };
            
            // Add resize event listener
            window.addEventListener('resize', updateSpeedMultiplier);

            // Duplicate the content for seamless scrolling
            wrapper.innerHTML += wrapper.innerHTML;

            let scrollAmount = 0;

            function scrollGallery() {
                scrollAmount += speed * currentSpeedMultiplier;
                wrapper.scrollLeft = scrollAmount;

                // Reset scroll to start when halfway through (since we doubled content)
                if (scrollAmount >= wrapper.scrollWidth / 2) {
                    scrollAmount = 0;
                }

                requestAnimationFrame(scrollGallery);
            }

            scrollGallery();
        });
    </script>

        <?php
    }
} 