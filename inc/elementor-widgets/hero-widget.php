<?php
/**
 * Hero Widget - Hero Section Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Hero_Widget
 */
class Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'integra_hero';
    }

    public function get_title() {
        return __('Hero Section', 'integra-elements');
    }

    public function get_icon() {
        return 'eicon-ehp-hero';
    }

    public function get_categories() {
        return ['integra-elements'];
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

        // Hero Height Controls (Auto, Full, Marketing);
        include('attr/height/height.controls.php');

        // Hero Style Controls (Default, Boxed)
        $this->add_control(
            'hero_style',
            [
                'label' => __('Hero Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __('Default', 'integra-elements'), 
                    'boxed' => __('Boxed', 'integra-elements')
                ],
                'default' => 'default',
            ]
        );

        // Hero Layout Controls (Centered 1 Column, Hero With Preview)
        $this->add_control(
            'hero_layout',
            [
                'label' => __('Hero Layout', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'hero-centered' => __('Hero Centered', 'integra-elements'),
                    'hero-w-preview' => __('Hero + Preview', 'integra-elements')
                ],
                'default' => 'hero-centered',
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

        // Spacing Render;
        include('attr/spacing/spacing.render.php');

        // Hero Style;
        $hero_style = $settings['hero_style'];
        if($hero_style === 'boxed') {
            $section_class .= ' hero--boxed';
        }

        // Hero Layout;
        $hero_layout = $settings['hero_layout'];
        if($hero_layout === 'hero-centered') {
            $section_class .= ' hero--centered';
        }

        // Hero Height;
        $hero_height = $settings['height'] ?? 'auto';
        $section_class .= ' height--'. $hero_height;

        ?>

        <!-- Hero: Boxed + Centered-->
        <section class="hero <?= esc_attr(trim($section_class)); ?>"
                style="<?= esc_attr($section_style); ?>">
            <div class="<?= esc_attr(trim($container_class)); ?>">

                <div class="hero-content">
                    <?= $content_markup; ?>
                    <?= $cta_markup; ?>
                </div>

                <?php if($hero_layout === 'hero-w-preview') { ?>
                    <div class="hero-preview">
                        <?= $preview_markup; ?>
                    </div>
                <?php } ?>

            </div>
        </section>

        <?php
    }
}
