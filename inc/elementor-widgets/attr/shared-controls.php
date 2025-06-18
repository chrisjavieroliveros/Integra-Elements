<?php
/**
 * Shared Control Traits
 *
 * This file loads all individual control traits.
 * Combined traits are defined in the individual widget files as needed.
 *
 * @package Integra_Elements
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Load all individual trait files
require_once get_template_directory() . '/inc/elementor-widgets/traits/background-controls.php';
require_once get_template_directory() . '/inc/elementor-widgets/traits/spacing-controls.php';
require_once get_template_directory() . '/inc/elementor-widgets/traits/wrapper-controls.php';

// Define combined traits after individual traits are loaded
namespace Integra_Elements\Elementor\Traits {

    /**
     * Combined trait that includes all control traits
     */
    trait Shared_Controls {
        use Background_Controls;
        use Spacing_Controls;
        use Wrapper_Controls;
    }

    /**
     * Alias for backward compatibility
     */
    trait Common_Background_Color {
        use Background_Controls;
    }
} 