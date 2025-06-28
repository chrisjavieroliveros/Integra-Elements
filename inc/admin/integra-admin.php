<?php
/**
 * Integra Elements Admin Page
 *
 * @package Integra_Elements
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/*
 * ==========================================================================
 * Integra Elements Admin Page
 * ==========================================================================
 */

/**
 * Add Integra Elements admin menu page
 */
function integra_elements_add_admin_page() {
    add_menu_page(
        'Integra Elements',                    // Page title
        'Integra Elements',                    // Menu title
        'manage_options',                      // Capability required
        'integra-elements',                    // Menu slug
        'integra_elements_admin_page_content', // Callback function
        'dashicons-admin-customizer',          // Icon
        58                                     // Position
    );
}
add_action('admin_menu', 'integra_elements_add_admin_page');

/**
 * Enqueue admin page styles and scripts
 */
function integra_elements_admin_enqueue_scripts($hook) {
    // Only load on our admin page
    if ($hook !== 'toplevel_page_integra-elements') {
        return;
    }
    
    wp_enqueue_script('integra-admin-js', get_template_directory_uri() . '/inc/admin/integra-admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('integra-admin-css', get_template_directory_uri() . '/inc/admin/integra-admin.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'integra_elements_admin_enqueue_scripts');

/**
 * Handle form submissions for color settings
 */
function integra_elements_handle_color_save() {
    if (isset($_POST['save_colors']) && wp_verify_nonce($_POST['integra_colors_nonce'], 'integra_colors_save')) {
        if (current_user_can('manage_options')) {
            $colors = $_POST['colors'];
            
            // Save each color to WordPress options
            foreach ($colors as $key => $value) {
                update_option('integra_color_' . $key, sanitize_hex_color($value));
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Colors saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Handle form submissions for typography settings
 */
function integra_elements_handle_typography_save() {
    if (isset($_POST['save_typography']) && wp_verify_nonce($_POST['integra_typography_nonce'], 'integra_typography_save')) {
        if (current_user_can('manage_options')) {
            $typography = $_POST['typography'];
            
            // Save each typography setting to WordPress options
            foreach ($typography as $key => $value) {
                update_option('integra_' . $key, sanitize_text_field($value));
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Typography saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Output dynamic CSS variables to frontend
 */
function integra_elements_output_dynamic_css() {
    $css = ':root {';
    
    // Include color variables
    include(get_template_directory() . '/inc/admin/pages/colors/color.vars.php');
    
    // Include typography variables
    include(get_template_directory() . '/inc/admin/pages/typography/typography.vars.php');

    $css .= '}';
    
    echo '<style id="integra-css-variables">' . $css . '</style>';
}
add_action('wp_head', 'integra_elements_output_dynamic_css');

/**
 * Render the Integra Elements admin page content
 */
function integra_elements_admin_page_content() {
    // Handle form submissions
    integra_elements_handle_color_save();
    integra_elements_handle_typography_save();
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="integra-admin-container">
            <!-- Sidebar Navigation -->
            <div class="integra-admin-sidebar">
                
                <!-- Core Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="core">
                        🎨 Core
                    </button>
                    <div class="integra-accordion-content" id="core">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="colors">Colors</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="typography">Typography</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="sizes">Sizes</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Layout Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="layout">
                        📐 Layout
                    </button>
                    <div class="integra-accordion-content" id="layout">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="spacing">Spacing</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="media">Media</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Base Elements Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="base-elements">
                        🧱 Base Elements
                    </button>
                    <div class="integra-accordion-content" id="base-elements">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="button">Button</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="media-element">Media</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Components Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="components">
                        🧩 Components
                    </button>
                    <div class="integra-accordion-content" id="components">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="eyebrow-text">Eyebrow Text</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>

            <!-- Main Content Area -->
            <div class="integra-admin-main">
                
                <!-- Welcome Page (Default) -->
                <div class="integra-page integra-page-active" id="page-welcome">
                    <h1>Welcome to Integra Elements</h1>
                    <p>Select an option from the sidebar to get started.</p>
                </div>

                <!-- Core Pages -->
                <?php include(get_template_directory() . '/inc/admin/pages/colors/color.page.php'); ?>               
                
                <?php include get_template_directory() . '/inc/admin/pages/typography/typography.page.php'; ?>
                
                <div class="integra-page" id="page-sizes">
                    <h1>Sizes</h1>
                </div>

                <!-- Layout Pages -->
                <div class="integra-page" id="page-spacing">
                    <h1>Spacing</h1>
                </div>
                
                <div class="integra-page" id="page-media">
                    <h1>Media</h1>
                </div>

                <!-- Base Elements Pages -->
                <div class="integra-page" id="page-button">
                    <h1>Button</h1>
                </div>
                
                <div class="integra-page" id="page-media-element">
                    <h1>Media</h1>
                </div>

                <!-- Components Pages -->
                <div class="integra-page" id="page-eyebrow-text">
                    <h1>Eyebrow Text</h1>
                </div>
                
            </div>
        </div>
    </div>
    <?php
} 