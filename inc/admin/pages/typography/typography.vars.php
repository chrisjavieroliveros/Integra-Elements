<?php
/**
 * Typography CSS Variables
 * This file outputs all typography-related CSS custom properties
 */

// Font Families
$css .= '--font-family-base: ' . get_option('integra_font_family_base', 'DM Sans') . ';';
$css .= '--font-family-heading: ' . get_option('integra_font_family_heading', 'Anek Bangla') . ';';
$css .= '--font-family-mono: ' . get_option('integra_font_family_mono', 'SFMono-Regular') . ';';

// Base Typography
$css .= '--base-font-size: ' . get_option('integra_base_font_size', '16px') . ';';
$css .= '--base-font-weight: ' . get_option('integra_base_font_weight', '400') . ';';
$css .= '--base-line-height: ' . get_option('integra_base_line_height', '140%') . ';';
$css .= '--lead-font-size: ' . get_option('integra_lead_font_size', '1.125rem') . ';';
$css .= '--lead-font-weight: ' . get_option('integra_lead_font_weight', '700') . ';';
$css .= '--lead-line-height: ' . get_option('integra_lead_line_height', '140%') . ';';
$css .= '--heading-font-weight: ' . get_option('integra_heading_font_weight', '700') . ';';
$css .= '--heading-line-height: ' . get_option('integra_heading_line_height', '100%') . ';';

// Display Headings
$css .= '--display-1-sm: ' . get_option('integra_display_1_sm', '2.75rem') . ';';
$css .= '--display-1-md: ' . get_option('integra_display_1_md', '3.25rem') . ';';
$css .= '--display-1-lg: ' . get_option('integra_display_1_lg', '3.75rem') . ';';
$css .= '--display-2-sm: ' . get_option('integra_display_2_sm', '2.5rem') . ';';
$css .= '--display-2-md: ' . get_option('integra_display_2_md', '2.75rem') . ';';
$css .= '--display-2-lg: ' . get_option('integra_display_2_lg', '3.25rem') . ';';

// H1-H6 Headings
$css .= '--h1-sm: ' . get_option('integra_h1_sm', '2.25rem') . ';';
$css .= '--h1-md: ' . get_option('integra_h1_md', '2.5rem') . ';';
$css .= '--h1-lg: ' . get_option('integra_h1_lg', '3rem') . ';';
$css .= '--h2-sm: ' . get_option('integra_h2_sm', '2rem') . ';';
$css .= '--h2-md: ' . get_option('integra_h2_md', '2.25rem') . ';';
$css .= '--h2-lg: ' . get_option('integra_h2_lg', '2.5rem') . ';';
$css .= '--h3-sm: ' . get_option('integra_h3_sm', '1.875rem') . ';';
$css .= '--h3-md: ' . get_option('integra_h3_md', '2rem') . ';';
$css .= '--h3-lg: ' . get_option('integra_h3_lg', '2.25rem') . ';';
$css .= '--h4-sm: ' . get_option('integra_h4_sm', '1.75rem') . ';';
$css .= '--h4-md: ' . get_option('integra_h4_md', '1.875rem') . ';';
$css .= '--h4-lg: ' . get_option('integra_h4_lg', '2rem') . ';';
$css .= '--h5-sm: ' . get_option('integra_h5_sm', '1.625rem') . ';';
$css .= '--h5-md: ' . get_option('integra_h5_md', '1.75rem') . ';';
$css .= '--h5-lg: ' . get_option('integra_h5_lg', '1.875rem') . ';';
$css .= '--h6-sm: ' . get_option('integra_h6_sm', '1.5rem') . ';';
$css .= '--h6-md: ' . get_option('integra_h6_md', '1.625rem') . ';';
$css .= '--h6-lg: ' . get_option('integra_h6_lg', '1.75rem') . ';';

