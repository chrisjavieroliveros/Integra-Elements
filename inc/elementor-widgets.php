<?php
/**
 * Elementor Widgets
 *
 * Register and load custom Elementor widgets for Integra Elements theme
 *
 * @package Integra_Elements
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class Integra_Elementor_Widgets
 *
 * Main class to handle Elementor custom widgets
 */
class Integra_Elementor_Widgets {

    /**
     * Instance of this class
     *
     * @var Integra_Elementor_Widgets
     */
    private static $instance = null;

    /**
     * Widgets Directory
     *
     * @var string
     */
    private $widgets_dir;

    /**
     * Widgets Namespace
     *
     * @var string
     */
    private $widgets_namespace;

    /**
     * Constructor
     */
    public function __construct() {
        $this->widgets_dir = get_template_directory() . '/inc/elementor-widgets/';
        $this->widgets_namespace = 'Integra_Elements\\Elementor\\Widgets\\';

        // Register widgets
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        
        // Register widget categories
        add_action('elementor/elements/categories_registered', [$this, 'add_widget_categories']);
        
        // Enqueue widget scripts - using after_enqueue_scripts instead of after_register_scripts
        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_scripts']);
    }

    /**
     * Get instance of this class
     *
     * @return Integra_Elementor_Widgets
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Register widgets
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets($widgets_manager) {
        
        // Automatically load and register all widgets from the widgets directory
        $this->auto_register_widgets($widgets_manager);
    }

    /**
     * Automatically register all widgets from the widgets directory
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    private function auto_register_widgets($widgets_manager) {
        // Check if widgets directory exists
        if (!is_dir($this->widgets_dir)) {
            return;
        }

        // Get all PHP files in the widgets directory
        $widget_files = glob($this->widgets_dir . '*.php');

        if (empty($widget_files)) {
            return;
        }

        foreach ($widget_files as $widget_file) {
            // Skip if file doesn't exist
            if (!file_exists($widget_file)) {
                continue;
            }

            // Get filename without extension
            $filename = basename($widget_file, '.php');
            
            // Convert filename to class name (e.g., 'test-widget' becomes 'Test_Widget')
            $class_name = $this->filename_to_class_name($filename);
            $full_class_name = $this->widgets_namespace . $class_name;

            // Load the widget file
            require_once $widget_file;

            // Register the widget if class exists
            if (class_exists($full_class_name)) {
                $widgets_manager->register(new $full_class_name());
            }
        }
    }

    /**
     * Convert filename to class name
     * 
     * Converts 'test-widget' to 'Test_Widget'
     * Converts 'feature-box-widget' to 'Feature_Box_Widget'
     *
     * @param string $filename The filename without extension
     * @return string The class name
     */
    private function filename_to_class_name($filename) {
        // Split by hyphens and capitalize each part
        $parts = explode('-', $filename);
        $class_parts = array_map('ucfirst', $parts);
        
        // Join with underscores
        return implode('_', $class_parts);
    }

    /**
     * Add widget categories
     *
     * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager.
     */
    public function add_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'integra-elements',
            [
                'title' => __('Integra Elements', 'integra-elements'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    /**
     * Enqueue widget scripts
     */
    public function widget_scripts() {
        // Add your widget scripts here
        wp_enqueue_script(
            'integra-elementor-widgets',
            get_template_directory_uri() . '/js/elementor-widgets.js',
            ['jquery', 'elementor-frontend'],
            _S_VERSION, 
            true
        );
        
        // Add localized script data to ensure our script can access Elementor data
        wp_localize_script(
            'integra-elementor-widgets',
            'IntegraElementorData',
            [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('integra-elementor-nonce'),
            ]
        );
    }
}

// Initialize the class
Integra_Elementor_Widgets::get_instance();
