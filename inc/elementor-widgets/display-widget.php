<?php
/**
 * Display Widget - Display Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Display_Widget
 */
class Display_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_display';
    }

    public function get_title() {
        return __('Display', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return ['integra-elements'];
    }

    public function get_keywords() {
        return ['integra', 'elements', 'display', 'content', 'media'];
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
            'selector' => '.display-section',
            'default' => 90, // Will apply to all breakpoints initially
        ];
        include('attr/height/height.controls.php');

        // Display Style Controls (Default, Boxed)
        $this->add_control(
            'display_style',
            [
                'label' => __('Display Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __('Default', 'integra-elements'), 
                    'boxed' => __('Boxed', 'integra-elements')
                ],
                'default' => 'default',
            ]
        );

        // Display Layout Controls (Centered 1 Column, Display With Preview)
        $this->add_control(
            'display_layout',
            [
                'label' => __('Display Layout', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'display-centered' => __('Display Centered', 'integra-elements'),
                    'display-w-preview' => __('Display + Preview', 'integra-elements')
                ],
                'default' => 'display-centered',
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Content Section;
        include('attr/content/content.controls.php');

        // Preview Section;
        include('attr/preview/preview.controls.php');

        // CTA Section;
        include('attr/cta/cta.controls.php');

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

        // Container Render;
        include('attr/container/container.render.php');

        // Background Render;
        include('attr/background/background.render.php');

        // Content Render;
        include('attr/content/content.render.php');

        // Preview Render;
        include('attr/preview/preview.render.php');

        // CTA Render;
        include('attr/cta/cta.render.php');

        // Display Style;
        $display_style = $settings['display_style'];
        if($display_style === 'boxed') {
            $section_class .= ' display-section--boxed';
        }

        // Display Layout;
        $display_layout = $settings['display_layout'];
        if($display_layout === 'display-centered') {
            $section_class .= ' display-section--centered';
        }

        ?>

        <!-- Display: Boxed + Centered-->
        <section class="display-section <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="<?= esc_attr(trim($container_class)); ?>">

                <div class="display-content text-content">
                    <?= $content_markup; ?>
                    <?= $cta_markup; ?>
                </div>

                <?php if($display_layout === 'display-w-preview') { ?>
                    <div class="display-preview">
                        <?= $preview_markup; ?>
                    </div>
                <?php } ?>

            </div>
        </section>

        <?php
    }
} 