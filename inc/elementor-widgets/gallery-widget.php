<?php
/**
 * Gallery Widget - Image Gallery Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Gallery_Widget
 */
class Gallery_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_gallery';
    }

    public function get_title() {
        return __('Gallery', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-carousel';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements'];
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
            'selector' => '.gallery',
            'default' => 0, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Styling (Default, Gray First);
        $this->add_control(
            'gallery_style',
            [
                'label' => __('Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __('Default', 'integra-elements'),
                    'gray-first' => __('Gray First', 'integra-elements'),
                ],
                'default' => 'default',
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Gallery Section
        $this->start_controls_section(
            'section_gallery',
            [
                'label' => __('Gallery', 'integra-elements'),
            ]
        );

        $this->add_responsive_control(
            'gallery_item_size',
            [
                'label' => __('Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 24,
                        'max' => 240,
                        'step' => 8,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 64,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 48,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gallery_column_spacing',
            [
                'label' => __('Column Spacing', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 120,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-grid' => 'column-gap: calc({{SIZE}}{{UNIT}});',
                ],
            ]
        );


        $this->add_responsive_control(
            'gallery_row_spacing',
            [
                'label' => __('Row Spacing', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 120,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-grid' => 'row-gap: calc({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'gallery_images',
            [
                'label' => __('Gallery Images', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    ['url' => 'https://placehold.co/180x80', 'id' => 0],
                    ['url' => 'https://placehold.co/180x80', 'id' => 0],
                    ['url' => 'https://placehold.co/180x80', 'id' => 0],
                    ['url' => 'https://placehold.co/180x80', 'id' => 0],
                    ['url' => 'https://placehold.co/180x80', 'id' => 0],
                ],
                'show_label' => false,
            ]
        );

        // End Gallery Section
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

        // Gallery Style;
        if ($settings['gallery_style'] == 'gray-first') {
            $section_class .= ' gallery--is-gray';
        }

        ?>

        <!-- Gallery Section -->
        <section class="gallery <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="container">
                <div class="gallery-grid">
                    <?php
                    if (!empty($settings['gallery_images'])) {
                        foreach ($settings['gallery_images'] as $image) {
                            // Check if it's a placeholder URL (id = 0) or a real attachment
                            if (!empty($image['url']) && $image['id'] == 0) {
                                // Handle placeholder URLs
                                $final_url = $image['url'];
                                $image_alt = 'Gallery Image';
                            } else {
                                // Handle WordPress attachments
                                $image_url = wp_get_attachment_image_src($image['id'], 'full');
                                $image_alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true);
                                $final_url = !empty($image_url) ? $image_url[0] : '';
                            }
                            
                            if (!empty($final_url)) {
                                echo '<div class="gallery-item">';
                                echo '<img src="' . esc_url($final_url) . '" alt="' . esc_attr($image_alt) . '">';
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <?php
    }
} 