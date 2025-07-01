<?php
if (!defined('ABSPATH')) exit;

// Pill Variables
$css .= '--pill-gap: ' . esc_attr(get_option('integra_pill_gap', '8px')) . ';';
$css .= '--pill-font-weight: ' . esc_attr(get_option('integra_pill_font_weight', '500')) . ';';
$css .= '--pill-color: ' . esc_attr(get_option('integra_pill_color', 'var(--color-Dark-500)')) . ';';
$css .= '--pill-border-radius: ' . esc_attr(get_option('integra_pill_border_radius', '999px')) . ';';
$css .= '--pill-padding-x: ' . esc_attr(get_option('integra_pill_padding_x', '12px')) . ';';
$css .= '--pill-height: ' . esc_attr(get_option('integra_pill_height', '24px')) . ';';
$css .= '--pill-font-size: ' . esc_attr(get_option('integra_pill_font_size', '12px')) . ';';
$css .= '--pill-background-color: ' . esc_attr(get_option('integra_pill_background_color', 'var(--color-Secondary-50)')) . ';';
$css .= '--pill-border-color: ' . esc_attr(get_option('integra_pill_border_color', 'transparent')) . ';';
?> 