<?php
if (!defined('ABSPATH')) exit;

// Button Variables
$css .= '--btn-line-height: ' . esc_attr(get_option('integra_button_line_height', '120%')) . ';';
$css .= '--btn-border-radius: ' . esc_attr(get_option('integra_button_border_radius', '999px')) . ';';
$css .= '--btn-font-weight: ' . esc_attr(get_option('integra_button_font_weight', '700')) . ';';
$css .= '--btn-border-width: ' . esc_attr(get_option('integra_button_border_width', '1px')) . ';';
$css .= '--btn-transition: ' . esc_attr(get_option('integra_button_transition', 'all 120ms ease-out')) . ';';
$css .= '--btn-onhover-transform: ' . esc_attr(get_option('integra_button_onhover_transform', 'translateY(-4px)')) . ';';
$css .= '--btn-outline-bg: ' . esc_attr(get_option('integra_button_outline_bg', 'transparent')) . ';';

// Small Button Size
$css .= '--btn-sm-height: ' . esc_attr(get_option('integra_button_sm_height', '40px')) . ';';
$css .= '--btn-sm-padding-x: ' . esc_attr(get_option('integra_button_sm_padding_x', '16px')) . ';';
$css .= '--btn-sm-font-size: ' . esc_attr(get_option('integra_button_sm_font_size', '12px')) . ';';

// Medium Button Size
$css .= '--btn-md-height: ' . esc_attr(get_option('integra_button_md_height', '40px')) . ';';
$css .= '--btn-md-padding-x: ' . esc_attr(get_option('integra_button_md_padding_x', '16px')) . ';';
$css .= '--btn-md-font-size: ' . esc_attr(get_option('integra_button_md_font_size', '14px')) . ';';

// Large Button Size
$css .= '--btn-lg-height: ' . esc_attr(get_option('integra_button_lg_height', '48px')) . ';';
$css .= '--btn-lg-padding-x: ' . esc_attr(get_option('integra_button_lg_padding_x', '24px')) . ';';
$css .= '--btn-lg-font-size: ' . esc_attr(get_option('integra_button_lg_font_size', '16px')) . ';';
?> 