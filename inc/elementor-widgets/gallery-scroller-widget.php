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
                                 <div class="gallery-section<?= esc_attr($gallery_section_class); ?>" id="gallery-section-<?= esc_attr($widget_id); ?>">
                    <div class="gallery-container" id="gallery-container-<?= esc_attr($widget_id); ?>">
                        <div class="gallery-wrapper" id="gallery-wrapper-<?= esc_attr($widget_id); ?>">
                            <?php if (!empty($gallery_images)) : ?>
                                <?php foreach ($gallery_images as $image) : ?>
                                    <div class="scroll-gallery-item">
                                        <?php if (!empty($image['url'])) : ?>
                                            <img src="<?= esc_url($image['url']); ?>" 
                                                 alt="<?= esc_attr($image['alt'] ?? 'Gallery Image'); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <!-- Default placeholder images if no gallery images are selected -->
                                <div class="scroll-gallery-item">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                                <div class="scroll-gallery-item">
                                    <img src="https://placehold.co/200x100" alt="Gallery Image">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
        (function() {
            // Configuration for this widget instance
            const widgetId = '<?= esc_js($widget_id); ?>';
            const config = {
                itemHeight: <?= esc_js($gallery_item_height); ?>,
                gap: <?= esc_js($gallery_gap); ?>,
                duration: 500,           // Keep duration constant
                speed: <?= esc_js($speed); ?>,
                                 sideColor: '<?= esc_js($side_color); ?>',
                 midColor: '<?= esc_js($mid_color); ?>'
            };

            // Dynamic endless scroller - instance specific
            function initScrollerGallery() {
                const gallerySection = document.querySelector('#gallery-section-' + widgetId);
                const gallery = document.querySelector('#gallery-container-' + widgetId);
                const wrapper = document.querySelector('#gallery-wrapper-' + widgetId);
                
                if (!gallery || !wrapper || !gallerySection) return;
                
                const items = Array.from(wrapper.children);
                if (items.length === 0) return;
                
                // Apply gradient background
                gallerySection.style.background = `linear-gradient(to right, ${config.sideColor} 0%, ${config.midColor} 50%, ${config.sideColor} 100%)`;
                
                // Set up specific styles
                wrapper.style.gap = config.gap + 'px';
                gallery.style.height = config.itemHeight + 'px';
                
                // Calculate dimensions dynamically
                let totalWidth = 0;
                items.forEach((item, index) => {
                    const img = item.querySelector('img');
                    if (img) {
                        // Set item height and calculate width based on aspect ratio
                        item.style.height = config.itemHeight + 'px';
                        item.style.flexShrink = '0';
                        item.style.display = 'flex';
                        item.style.alignItems = 'center';
                        item.style.justifyContent = 'center';
                        item.style.overflow = 'hidden';
                        item.style.borderRadius = '8px';
                        
                        img.style.height = '100%';
                        img.style.width = 'auto';
                        img.style.objectFit = 'cover';
                        
                        // Wait for image to load to get actual dimensions
                        img.onload = function() {
                            calculateAnimation();
                        };
                        
                        // If image is already loaded
                        if (img.complete) {
                            calculateAnimation();
                        }
                    }
                });
                
                function calculateAnimation() {
                    // Clone items for seamless loop
                    const existingClones = wrapper.querySelectorAll('.scroll-gallery-item.cloned');
                    existingClones.forEach(clone => clone.remove());
                    
                    items.forEach(item => {
                        const clone = item.cloneNode(true);
                        clone.classList.add('cloned');
                        wrapper.appendChild(clone);
                    });
                    
                    // Calculate total width of original items
                    totalWidth = 0;
                    items.forEach(item => {
                        totalWidth += item.offsetWidth;
                    });
                    totalWidth += (items.length - 1) * config.gap;
                    
                    // Create or update animation
                    const animationName = 'scroll-' + widgetId;
                    const existingStyle = document.querySelector('#scroller-styles-' + widgetId);
                    if (existingStyle) {
                        existingStyle.remove();
                    }
                    
                    // Calculate actual duration based on speed
                    const actualDuration = config.duration / config.speed;
                    
                    const style = document.createElement('style');
                    style.id = 'scroller-styles-' + widgetId;
                    style.textContent = `
                        @keyframes ${animationName} {
                            0% { transform: translateX(0); }
                            100% { transform: translateX(-${totalWidth + config.gap}px); }
                        }
                        #gallery-wrapper-${widgetId} {
                            animation: ${animationName} ${actualDuration}s linear infinite;
                        }
                        #gallery-wrapper-${widgetId}:hover {
                            animation-play-state: paused;
                        }
                    `;
                    document.head.appendChild(style);
                }
            }

            // Debounce function to limit resize event calls
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Initialize when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initScrollerGallery);
            } else {
                initScrollerGallery();
            }

            // Re-initialize on screen resize (debounced to avoid excessive calls)
            window.addEventListener('resize', debounce(initScrollerGallery, 250));
        })();
        </script>

        <?php
    }
} 