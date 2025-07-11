<?php
/**
 * Display Icon Variables
 * 
 * CSS Variables for display icon settings
 *
 * @package Integra_Elements
 */

if (!defined('ABSPATH')) exit;

// Display Icon Variables
$css .= '--display-icon-padding: ' . esc_attr(get_option('integra_display_icon_padding', '10px')) . ';';
$css .= '--display-icon-font-size: ' . esc_attr(get_option('integra_display_icon_font_size', '24px')) . ';';

// Display Icon Base Variables
$css .= '--display-icon-base-border-radius: ' . esc_attr(get_option('integra_display_icon_base_border_radius', '6px')) . ';';
$css .= '--display-icon-base-opacity: ' . esc_attr(get_option('integra_display_icon_base_opacity', '0.1')) . ';';

?> 