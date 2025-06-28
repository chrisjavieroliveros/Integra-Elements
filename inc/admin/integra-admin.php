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
        30                                     // Position
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
 * Render the Integra Elements admin page content
 */
function integra_elements_admin_page_content() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="integra-admin-container">
            <!-- Sidebar Navigation -->
            <div class="integra-admin-sidebar">
                
                <!-- Design System Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="design-system">
                        🎨 Design System
                    </button>
                    <div class="integra-accordion-content" id="design-system">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="colors">Colors</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="typography">Typography</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="spacing">Spacing</a></li>
                        </ul>
                    </div>
                </div>

                <!-- UI Components Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="ui-components">
                        🧩 UI Components
                    </button>
                    <div class="integra-accordion-content" id="ui-components">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="buttons">Buttons</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="forms">Forms</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="cards">Cards</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Media & Layout Section -->
                <div class="integra-accordion-item">
                    <button class="integra-accordion-header" data-target="media-layout">
                        📱 Media & Layout
                    </button>
                    <div class="integra-accordion-content" id="media-layout">
                        <ul class="integra-nav-list">
                            <li><a href="#" class="integra-nav-link" data-page="breakpoints">Breakpoints</a></li>
                            <li><a href="#" class="integra-nav-link" data-page="container">Container</a></li>
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

                <!-- Design System Pages -->
                <div class="integra-page" id="page-colors">
                    <h1>Colors</h1>
                </div>
                
                <div class="integra-page" id="page-typography">
                    <h1>Typography</h1>
                </div>
                
                <div class="integra-page" id="page-spacing">
                    <h1>Spacing</h1>
                </div>

                <!-- UI Components Pages -->
                <div class="integra-page" id="page-buttons">
                    <h1>Buttons</h1>
                </div>
                
                <div class="integra-page" id="page-forms">
                    <h1>Forms</h1>
                </div>
                
                <div class="integra-page" id="page-cards">
                    <h1>Cards</h1>
                </div>

                <!-- Media & Layout Pages -->
                <div class="integra-page" id="page-breakpoints">
                    <h1>Breakpoints</h1>
                </div>
                
                <div class="integra-page" id="page-container">
                    <h1>Container</h1>
                </div>
                
            </div>
        </div>
    </div>
    <?php
} 