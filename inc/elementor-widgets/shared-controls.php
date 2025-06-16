<?php
/**
 * Shared Controls for Elementor Widgets
 *
 * This file includes all the individual control traits from the attr folder
 *
 * @package Integra_Elements
 */

namespace Integra_Elements\Elementor\Traits;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include all control trait files
require_once get_template_directory() . '/inc/elementor-widgets/attr/background-controls.php';
require_once get_template_directory() . '/inc/elementor-widgets/attr/spacing-controls.php';
require_once get_template_directory() . '/inc/elementor-widgets/attr/wrapper-controls.php';

// You can add more control files here as needed:
// require_once get_template_directory() . '/inc/elementor-widgets/attr/typography-controls.php';
// require_once get_template_directory() . '/inc/elementor-widgets/attr/animation-controls.php';
// require_once get_template_directory() . '/inc/elementor-widgets/attr/position-controls.php';

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