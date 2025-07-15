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
        include('attr/container/container.controls.php');

        // Height Controls
        include('attr/height/height.controls.php');

        $this->add_control(
            'integration_image_height',
            [
                'label' => esc_html__('Integration Image Height', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 16,
                        'max' => 64,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 56,
                ],
                'description' => esc_html__('Set the height for all integration images.', 'integra-elements'),
            ]
        );

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

        $repeater->add_control(
            'cta_1_text',
            [
                'label' => esc_html__('CTA 1 Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore', 'integra-elements'),
            ]
        );
        $repeater->add_control(
            'cta_1_link',
            [
                'label' => esc_html__('CTA 1 Link', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );
        $repeater->add_control(
            'cta_1_style',
            [
                'label' => esc_html__('CTA 1 Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'flat',
                'options' => [
                    'flat' => esc_html__('Flat', 'integra-elements'),
                    'outline' => esc_html__('Outline', 'integra-elements'),
                ],
            ]
        );
        $repeater->add_control(
            'cta_1_icon_position',
            [
                'label' => esc_html__('CTA 1 Icon Position', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'before' => esc_html__('Before', 'integra-elements'),
                    'after' => esc_html__('After', 'integra-elements'),
                ],
                'default' => 'before',
            ]
        );
        $repeater->add_control(
            'cta_1_icon',
            [
                'label' => esc_html__('CTA 1 Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => '',
                ],
            ]
        );
        $repeater->add_control(
            'cta_2_text',
            [
                'label' => esc_html__('CTA 2 Text', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get a Demo', 'integra-elements'),
            ]
        );
        $repeater->add_control(
            'cta_2_link',
            [
                'label' => esc_html__('CTA 2 Link', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );
        $repeater->add_control(
            'cta_2_style',
            [
                'label' => esc_html__('CTA 2 Style', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'outline',
                'options' => [
                    'flat' => esc_html__('Flat', 'integra-elements'),
                    'outline' => esc_html__('Outline', 'integra-elements'),
                ],
            ]
        );
        $repeater->add_control(
            'cta_2_icon_position',
            [
                'label' => esc_html__('CTA 2 Icon Position', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'before' => esc_html__('Before', 'integra-elements'),
                    'after' => esc_html__('After', 'integra-elements'),
                ],
                'default' => 'before',
            ]
        );
        $repeater->add_control(
            'cta_2_icon',
            [
                'label' => esc_html__('CTA 2 Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => '',
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


        // Spacing Section;
        include('attr/spacing/spacing.controls.php');

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
                    
                    $integration_img_style = '';
                    if (!empty($settings['integration_image_height']['size'])) {
                        $integration_img_style = ' style="height: ' . esc_attr($settings['integration_image_height']['size']) . 'px;"';
                    }

                    foreach ($panel['sample_integrations'] as $image) {
                        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '"' . $integration_img_style . '>';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                }
                
                echo '<div class="inline-cta">';
                // CTA 1
                if (!empty($panel['cta_1_text'])) {
                    $cta1_class = 'btn btn--sm';
                    $cta1_class .= ($panel['cta_1_style'] === 'flat') ? ' btn--flat btn--primary' : ' btn--outline btn--primary';
                    $cta1_icon_html = '';
                    if (!empty($panel['cta_1_icon']['value'])) {
                        $cta1_icon_position = isset($panel['cta_1_icon_position']) ? $panel['cta_1_icon_position'] : 'before';
                        $cta1_icon_style = $cta1_icon_position === 'before' ? 'margin-right: var(--size-2);' : 'margin-left: var(--size-2);';
                        $cta1_icon_html = '<span class="cta-icon" style="' . $cta1_icon_style . '"><i class="' . esc_attr($panel['cta_1_icon']['value']) . '"></i></span>';
                    }
                    $cta1_icon_position = isset($panel['cta_1_icon_position']) ? $panel['cta_1_icon_position'] : 'before';
                    echo '<a href="' . esc_url($panel['cta_1_link']) . '" class="' . esc_attr($cta1_class) . '">';
                    if ($cta1_icon_position === 'before') {
                        echo $cta1_icon_html . ' ' . esc_html($panel['cta_1_text']);
                    } else {
                        echo esc_html($panel['cta_1_text']) . ' ' . $cta1_icon_html;
                    }
                    echo '</a>';
                }
                // CTA 2
                if (!empty($panel['cta_2_text'])) {
                    $cta2_class = 'btn btn--sm';
                    $cta2_class .= ($panel['cta_2_style'] === 'flat') ? ' btn--flat btn--primary' : ' btn--outline btn--primary';
                    $cta2_icon_html = '';
                    if (!empty($panel['cta_2_icon']['value'])) {
                        $cta2_icon_position = isset($panel['cta_2_icon_position']) ? $panel['cta_2_icon_position'] : 'before';
                        $cta2_icon_style = $cta2_icon_position === 'before' ? 'margin-right: var(--size-2);' : 'margin-left: var(--size-2);';
                        $cta2_icon_html = '<span class="cta-icon" style="' . $cta2_icon_style . '"><i class="' . esc_attr($panel['cta_2_icon']['value']) . '"></i></span>';
                    }
                    $cta2_icon_position = isset($panel['cta_2_icon_position']) ? $panel['cta_2_icon_position'] : 'before';
                    echo '<a href="' . esc_url($panel['cta_2_link']) . '" class="' . esc_attr($cta2_class) . '">';
                    if ($cta2_icon_position === 'before') {
                        echo $cta2_icon_html . ' ' . esc_html($panel['cta_2_text']);
                    } else {
                        echo esc_html($panel['cta_2_text']) . ' ' . $cta2_icon_html;
                    }
                    echo '</a>';
                }
                echo '</div>';
                
                echo '</div>';
            }
            
            echo '</div>';
        }
        
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
} 