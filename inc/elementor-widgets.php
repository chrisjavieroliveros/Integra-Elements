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
        // Load shared controls first
        require_once $this->widgets_dir . 'shared-controls.php';
        
        // Autoload widgets
        $widget_files = glob($this->widgets_dir . '*.php');
        
        foreach ($widget_files as $widget_file) {
            // Skip the shared controls file
            if (basename($widget_file) === 'shared-controls.php') {
                continue;
            }
            
            require_once $widget_file;
            
            // Convert filename to class name
            $widget_name = pathinfo($widget_file, PATHINFO_FILENAME);
            
            // Convert kebab-case to PascalCase for class name
            $class_parts = explode('-', $widget_name);
            $class_parts = array_map('ucfirst', $class_parts);
            $class_name = implode('_', $class_parts);
            
            // Add namespace
            $full_class_name = $this->widgets_namespace . $class_name;
            
            if (class_exists($full_class_name)) {
                $widgets_manager->register(new $full_class_name());
            }
        }
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
            get_template_directory_uri() . '/assets/js/elementor-widgets.js',
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
