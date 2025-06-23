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
        return 'eicon-banner';
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

        // Hero Height Controls (Auto, Full, Marketing);
        include_once 'attr/height.controls.php';

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
                    'centered-column' => __('Centered Column', 'integra-elements'),
                    'hero-with-preview' => __('Hero With Preview', 'integra-elements')
                ],
                'default' => 'centered-1-column',
            ]
        );

        // End General Section
        $this->end_controls_section();

        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hero Title', 'integra-elements'),
            ]
        );

        // End Content Section
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
        include_once 'attr/theme.controls.php';

        // Background Controls;
        include_once 'attr/background.controls.php';

        // End Background Section
        $this->end_controls_section();
    }

        /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Hero Style;
        $hero_style = $settings['hero_style'];
        if($hero_style === 'boxed') {
            $section_class .= ' hero--boxed';
        }

        // Hero Layout;
        $hero_layout = $settings['hero_layout'];
        if($hero_layout === 'centered-column') {
            $section_class .= ' hero--centered';
        }

        // Hero Height;
        $hero_height = $settings['height'];
        $section_class .= ' height--'. $hero_height;

        // Theme Render;
        include_once 'attr/theme.render.php';

        // Background Render;
        include_once 'attr/background.render.php';

        ?>

        <!-- Hero: Boxed + Centered-->
        <section class="hero section-padding <?= $section_class; ?>"
                style="<?= $section_style; ?>">
            <div class="container container--narrow">
                <div class="hero-content">

                    <span class="eyebrow-text">Lorem ipsum dolor.</span>

                    <div class="text-content">
                        <h1 class="display-1">Hero Component Boxed</h1>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ducimus ratione
                            similique amet
                            quia
                            eius, ad at id magni quod explicabo soluta tenetur dolorem quasi laudantium, nobis
                            laboriosam,
                            labore praesentium!</p>
                    </div>

                    <div class="inline-cta">
                        <a href="#" class="btn btn--primary">Learn More</a>
                        <a href="#" class="btn btn--secondary">Contact Us</a>
                    </div>

                </div>

                <?php if($hero_layout === 'hero-with-preview') { ?>
                    <div class="hero-preview">
                        <img src="<?= $settings['hero_preview']['url']; ?>" alt="<?= $settings['hero_preview']['alt']; ?>">
                    </div>
                <?php } ?>

            </div>
        </section>

        <?php
    }
}
