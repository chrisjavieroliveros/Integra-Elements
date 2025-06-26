<?php
/**
 * Background Render
 * 
 * Renders background styles based on selected background type
 * Populates $section_class and $section_style variables
 */

// Check if $section_class defined in the parent file;
if (!isset($section_class)) {
    $section_class = '';
}

// Check if $section_style defined in the parent file;
if (!isset($section_style)) {
    $section_style = '';
}

// Get background type
$background_type = $this->get_settings('background');

// CSS styles array and class array
$styles = [];
$classes = [];

// Process based on background type
switch ($background_type) {
    case 'color':
        // Handle background color
        $bg_color = $this->get_settings('background_color');
        $light_variants = $this->get_settings('light_variants');
        $dark_variants = $this->get_settings('dark_variants');

        if ($bg_color === 'Light') {
            $styles[] = "background-color: var(--color-{$light_variants});";
        } else if ($bg_color === 'Dark') {
            $styles[] = "background-color: var(--color-{$dark_variants});";
        } else {
            $styles[] = "background-color: var(--color-{$bg_color});";
        }

        break;
        
    case 'image':
        // Handle background image
        $bg_image = $this->get_settings('background_image');
        if (!empty($bg_image['url'])) {
            // Build background image properties
            $bg_pos_h = $this->get_settings('background_position_horizontal');
            $bg_pos_v = $this->get_settings('background_position_vertical');
            $bg_size = $this->get_settings('background_size');
            
            // Add background image style
            $styles[] = "background-image: url('{$bg_image['url']}')";
            $styles[] = "background-position: {$bg_pos_h} {$bg_pos_v}";
            $styles[] = "background-size: {$bg_size}";
            $styles[] = "background-repeat: no-repeat";
            
        }
        break;
        
    default:
        // Default to white background if nothing else specified
        $styles[] = "background-color: var(--color-Light-50);";
        break;
}

// Populate the section class and style variables
$section_style .= implode('; ', $styles);
$section_class .= !empty($classes) ? ' ' . implode(' ', $classes) : '';
?>