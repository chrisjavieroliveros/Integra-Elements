<?php
if (!defined('ABSPATH')) exit;

// Button Variables
$css .= '--btn-line-height: ' . esc_attr(get_option('integra_btn_line_height', '1.7')) . ';';
$css .= '--btn-border-radius: ' . esc_attr(get_option('integra_btn_border_radius', '999px')) . ';';
$css .= '--btn-font-weight: ' . esc_attr(get_option('integra_btn_font_weight', '700')) . ';';

// Small Button Size
$css .= '--btn-sm-height: ' . esc_attr(get_option('integra_btn_sm_height', '40px')) . ';';
$css .= '--btn-sm-padding-x: ' . esc_attr(get_option('integra_btn_sm_padding_x', '16px')) . ';';
$css .= '--btn-sm-font-size: ' . esc_attr(get_option('integra_btn_sm_font_size', '12px')) . ';';

// Medium Button Size
$css .= '--btn-md-height: ' . esc_attr(get_option('integra_btn_md_height', '40px')) . ';';
$css .= '--btn-md-padding-x: ' . esc_attr(get_option('integra_btn_md_padding_x', '16px')) . ';';
$css .= '--btn-md-font-size: ' . esc_attr(get_option('integra_btn_md_font_size', '14px')) . ';';

// Large Button Size
$css .= '--btn-lg-height: ' . esc_attr(get_option('integra_btn_lg_height', '48px')) . ';';
$css .= '--btn-lg-padding-x: ' . esc_attr(get_option('integra_btn_lg_padding_x', '24px')) . ';';
$css .= '--btn-lg-font-size: ' . esc_attr(get_option('integra_btn_lg_font_size', '16px')) . ';';
?> 