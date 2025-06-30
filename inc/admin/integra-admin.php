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
                // Handle Google Fonts import with special sanitization
                if ($key === 'google_fonts_import') {
                    // Allow ANY content for head injection (removes wp_kses restriction)
                    update_option('integra_' . $key, wp_unslash($value));
                } else {
                    update_option('integra_' . $key, sanitize_text_field($value));
                }
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Typography saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Handle form submissions for eyebrow text settings
 */
function integra_elements_handle_eyebrow_text_save() {
    if (isset($_POST['eyebrow_text']) && wp_verify_nonce($_POST['integra_eyebrow_text_nonce'], 'integra_eyebrow_text_save')) {
        if (current_user_can('manage_options')) {
            $eyebrow_text = $_POST['eyebrow_text'];
            
            // Save each eyebrow text setting to WordPress options
            foreach ($eyebrow_text as $key => $value) {
                update_option('integra_' . $key, sanitize_text_field($value));
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Eyebrow Text settings saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Handle form submissions for spacing settings
 */
function integra_elements_handle_spacing_save() {
    if (isset($_POST['save_spacing']) && wp_verify_nonce($_POST['integra_spacing_nonce'], 'integra_spacing_save')) {
        if (current_user_can('manage_options')) {
            $spacing = $_POST['spacing'];
            
            // Save each spacing setting to WordPress options
            foreach ($spacing as $key => $value) {
                update_option('integra_' . $key, sanitize_text_field($value));
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Spacing settings saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Handle form submissions for buttons settings
 */
function integra_elements_handle_buttons_save() {
    if (isset($_POST['submit_buttons']) && wp_verify_nonce($_POST['integra_buttons_nonce'], 'integra_buttons_save')) {
        if (current_user_can('manage_options')) {
            // Get all button form fields
            $btn_fields = [
                'integra_btn_line_height', 'integra_btn_border_radius', 'integra_btn_font_weight', 'integra_btn_border_width',
                'integra_btn_sm_height', 'integra_btn_sm_padding_x', 'integra_btn_sm_font_size',
                'integra_btn_md_height', 'integra_btn_md_padding_x', 'integra_btn_md_font_size',
                'integra_btn_lg_height', 'integra_btn_lg_padding_x', 'integra_btn_lg_font_size'
            ];
            
            // Save each button setting to WordPress options
            foreach ($btn_fields as $field) {
                if (isset($_POST[$field])) {
                    update_option($field, sanitize_text_field($_POST[$field]));
                }
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Button settings saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Handle form submissions for text content settings
 */
function integra_elements_handle_text_content_save() {
    if (isset($_POST['save_text_content']) && wp_verify_nonce($_POST['integra_text_content_nonce'], 'integra_text_content_save')) {
        if (current_user_can('manage_options')) {
            $text_content = $_POST['text_content'];
            
            // Save each text content setting to WordPress options
            foreach ($text_content as $key => $value) {
                update_option('integra_text_content_' . $key, sanitize_text_field($value));
            }
            
            // Show success message
            add_action('admin_notices', function() {
                echo '<div class="notice notice-success is-dismissible"><p>Text Content settings saved successfully!</p></div>';
            });
        }
    }
}

/**
 * Output dynamic CSS variables to frontend
 */
function integra_elements_output_dynamic_css() {
    $css = ':root {';
    
    // Include size variables
    include(get_template_directory() . '/inc/admin/pages/size/size.vars.php');

    // Include color variables
    include(get_template_directory() . '/inc/admin/pages/colors/color.vars.php');
    
    // Include typography variables
    include(get_template_directory() . '/inc/admin/pages/typography/typography.vars.php');
    
    // Include spacing variables
    include(get_template_directory() . '/inc/admin/pages/spacing/spacing.vars.php');
    
    // Include text content variables
    include(get_template_directory() . '/inc/admin/pages/text-content/text-content.vars.php');
    
    // Include eyebrow text variables
    include(get_template_directory() . '/inc/admin/pages/eyebrow-text/eyebrow-text.vars.php');
    
    // Include buttons variables
    include(get_template_directory() . '/inc/admin/pages/buttons/buttons.vars.php');

    $css .= '}';
    
    echo '<style id="integra-css-variables">' . $css . '</style>';
}
add_action('wp_head', 'integra_elements_output_dynamic_css');


// Output Google Fonts import code to frontend head
function integra_elements_output_google_fonts() {
    $google_fonts_import = get_option('integra_google_fonts_import', '');
    
    if (!empty($google_fonts_import)) {
        echo "\n<!-- Integra Elements - Google Fonts Import -->\n";
        echo $google_fonts_import;
        echo "\n<!-- /Integra Elements - Google Fonts Import -->\n";
    }
}
add_action('wp_head', 'integra_elements_output_google_fonts', 1);


/**
 * Render the Integra Elements admin page content
 */
function integra_elements_admin_page_content() {
    // Handle form submissions
    integra_elements_handle_color_save();
    integra_elements_handle_typography_save();
    integra_elements_handle_spacing_save();
    integra_elements_handle_text_content_save();
    integra_elements_handle_eyebrow_text_save();
    integra_elements_handle_buttons_save();
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
                            <li><a href="#" class="integra-nav-link" data-page="text-content">Text Content</a></li>
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
                            <li><a href="#" class="integra-nav-link" data-page="buttons">Button</a></li>
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
                
                <!-- Layout Pages -->
                <?php include(get_template_directory() . '/inc/admin/pages/spacing/spacing.page.php'); ?>
                <?php include(get_template_directory() . '/inc/admin/pages/text-content/text-content.page.php'); ?>
                
                <div class="integra-page" id="page-media">
                    <h1>Media</h1>
                </div>

                <!-- Base Elements Pages -->
                <?php include(get_template_directory() . '/inc/admin/pages/buttons/buttons.page.php'); ?>
                
                <div class="integra-page" id="page-media-element">
                    <h1>Media</h1>
                </div>

                <!-- Components Pages -->
                <div class="integra-page" id="page-eyebrow-text">
                    <h1>Eyebrow Text</h1>
                    <?php include(get_template_directory() . '/inc/admin/pages/eyebrow-text/eyebrow-text.page.php'); ?>
                </div>
                
            </div>
        </div>
    </div>
    <?php
} 