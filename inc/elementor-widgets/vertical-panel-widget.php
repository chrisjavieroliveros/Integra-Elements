<?php
/**
 * Vertical Panel Widget - Vertical Panel Widget Implementation
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Vertical_Panel_Widget
 */
class Vertical_Panel_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'integra_vertical_panel';
    }

    public function get_title()
    {
        return esc_html__('Vertical Panel', 'integra-elements');
    }

    public function get_icon()
    {
        return 'eicon-tabs';
    }

    public function get_categories()
    {
        return ['integra-elements'];
    }

    public function get_keywords()
    {
        return ['vertical', 'panel', 'tabs', 'integra'];
    }

    protected function register_controls()
    {

        // General Section;
        $this->start_controls_section(
            'general_section',
            [
                'label' => esc_html__('General', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Container Controls
        include get_template_directory() . '/inc/elementor-widgets/attr/container/container.controls.php';

        // Height Controls
        include get_template_directory() . '/inc/elementor-widgets/attr/height/height.controls.php';

        // end general section;
        $this->end_controls_section();

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'integra-elements'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Tab Title', 'integra-elements'),
                'placeholder' => esc_html__('Enter tab title', 'integra-elements'),
            ]
        );

        $repeater->add_control(
            'tab_icon',
            [
                'label' => esc_html__('Tab Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-network-wired',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'ear_prefix',
            [
                'label' => esc_html__('Ear Prefix', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('SecureW2', 'integra-elements'),
                'placeholder' => esc_html__('Enter ear prefix', 'integra-elements'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<h4>Panel Title</h4><p>Panel content description goes here.</p>',
            ]
        );

        $repeater->add_control(
            'sample_integrations',
            [
                'label' => esc_html__('Sample Integrations', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [
                    [
                        'id' => '',
                        'url' => 'https://placehold.co/120x56',
                    ],
                    [
                        'id' => '',
                        'url' => 'https://placehold.co/120x56',
                    ],
                    [
                        'id' => '',
                        'url' => 'https://placehold.co/120x56',
                    ],
                ],
            ]
        );



        $this->add_control(
            'panels',
            [
                'label' => esc_html__('Panels', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Vertical Tab 1', 'integra-elements'),
                        'ear_prefix' => esc_html__('SecureW2', 'integra-elements'),
                        'content' => '<h4>Lorem Ipsum Dolor Sit Amet</h4><p>Fast, reliable 802.1X and Cloud RADIUS authentication for Wi-Fi and wired access—powered by real-time policy evaluation and passwordless certificate-based access that adapts to identity, posture and risk.</p>',
                    ],
                    [
                        'tab_title' => esc_html__('Vertical Tab 2', 'integra-elements'),
                        'ear_prefix' => esc_html__('SecureW2', 'integra-elements'),
                        'content' => '<h4>Consectetur Adipiscing Elit</h4><p>Streamline application access with identity governance and zero-trust security, protecting your apps with multi-factor authentication and conditional access controls.</p>',
                    ],
                    [
                        'tab_title' => esc_html__('Vertical Tab 3', 'integra-elements'),
                        'ear_prefix' => esc_html__('SecureW2', 'integra-elements'),
                        'content' => '<h4>Sed Do Eiusmod Tempor</h4><p>Enable secure remote access with zero-trust network access and advanced VPN, using identity-based policies and continuous authentication for every user.</p>',
                    ],
                    [
                        'tab_title' => esc_html__('Vertical Tab 4', 'integra-elements'),
                        'ear_prefix' => esc_html__('SecureW2', 'integra-elements'),
                        'content' => '<h4>Ut Enim Ad Minim Veniam</h4><p>Modernize desktop login with certificate-based authentication, delivering seamless, passwordless access to workstations and enterprise resources.</p>',
                    ],
                    [
                        'tab_title' => esc_html__('Vertical Tab 5', 'integra-elements'),
                        'ear_prefix' => esc_html__('SecureW2', 'integra-elements'),
                        'content' => '<h4>Quis Nostrud Exercitation</h4><p>Provide secure, seamless guest Wi-Fi access with automated onboarding and policy enforcement, ensuring a safe and user-friendly network experience.</p>',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();

        // CTA Controls
        include get_template_directory() . '/inc/elementor-widgets/attr/cta/cta.controls.php';

        // Spacing Controls
        include get_template_directory() . '/inc/elementor-widgets/attr/spacing/spacing.controls.php';

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        // Container Render
        // include get_template_directory() . '/inc/elementor-widgets/attr/container/container.render.php';
        
        echo '<section class="vertical-panel">';
        echo '<div class="container">';
        echo '<div class="vertical-panel-body">';
        
        // Render Tabs
        if (!empty($settings['panels'])) {
            echo '<div class="vertical-panel-tabs">';
            
            foreach ($settings['panels'] as $index => $panel) {
                $active_class = ($index === 0) ? ' active' : '';
                echo '<div class="vertical-panel-tab' . esc_attr($active_class) . '">';
                
                // Icon
                if (!empty($panel['tab_icon']['value'])) {
                    echo '<div class="icon-wrapper">';
                    \Elementor\Icons_Manager::render_icon($panel['tab_icon'], ['aria-hidden' => 'true']);
                    echo '</div>';
                }
                
                // Title
                echo '<span>/ ' . esc_html($panel['tab_title']) . '</span>';
                echo '</div>';
            }
            
            echo '</div>';
            
            // Render Panel Content
            echo '<div class="vertical-panel-view">';
            
            foreach ($settings['panels'] as $index => $panel) {
                $active_class = ($index === 0) ? ' active' : '';
                echo '<div class="vertical-panel-item text-content' . esc_attr($active_class) . '">';
                
                // Ear
                echo '<div class="vertical-panel-ear">';
                if (!empty($panel['tab_icon']['value'])) {
                    echo '<div class="icon-wrapper">';
                    \Elementor\Icons_Manager::render_icon($panel['tab_icon'], ['aria-hidden' => 'true']);
                    echo '</div>';
                }
                echo '<span>' . esc_html($panel['ear_prefix']) . ' / ' . esc_html($panel['tab_title']) . '</span>';
                echo '</div>';
                
                // Content
                echo '<div class="inner-content">';
                echo wp_kses_post($panel['content']);
                echo '</div>';
                
                // Sample Integrations
                if (!empty($panel['sample_integrations'])) {
                    echo '<div class="sample-integrations">';
                    echo '<b class="sample-integrations-title">Sample Integrations</b>';
                    echo '<div class="sample-integrations-logos-group">';
                    
                    foreach ($panel['sample_integrations'] as $image) {
                        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                }
                
                // CTAs
                $cta_markup = '';
                include get_template_directory() . '/inc/elementor-widgets/attr/cta/cta.render.php';
                echo $cta_markup;
                echo '</div>';
            }
            
            echo '</div>';
        }
        
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
} 