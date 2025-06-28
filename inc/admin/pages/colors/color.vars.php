<?php

// Primary colors
$css .= '--color-Primary: ' . esc_attr(get_option('integra_color_primary', '#c33329')) . ';';
$css .= '--color-Primary-Tint: ' . esc_attr(get_option('integra_color_primary_tint', '#cf5c54')) . ';';
$css .= '--color-Primary-Shade: ' . esc_attr(get_option('integra_color_primary_shade', '#9c2921')) . ';';
$css .= '--color-Primary-Contrast: ' . esc_attr(get_option('integra_color_primary_contrast', '#f9ebea')) . ';';

// Primary variants
$css .= '--color-Primary-50: ' . esc_attr(get_option('integra_color_primary_50', '#fdebed')) . ';';
$css .= '--color-Primary-100: ' . esc_attr(get_option('integra_color_primary_100', '#fad6d9')) . ';';
$css .= '--color-Primary-200: ' . esc_attr(get_option('integra_color_primary_200', '#f3c2c4')) . ';';
$css .= '--color-Primary-300: ' . esc_attr(get_option('integra_color_primary_300', '#ecadae')) . ';';
$css .= '--color-Primary-400: ' . esc_attr(get_option('integra_color_primary_400', '#e59997')) . ';';
$css .= '--color-Primary-500: ' . esc_attr(get_option('integra_color_primary_500', '#c33329')) . ';';
$css .= '--color-Primary-600: ' . esc_attr(get_option('integra_color_primary_600', '#af2d24')) . ';';
$css .= '--color-Primary-700: ' . esc_attr(get_option('integra_color_primary_700', '#9a2820')) . ';';
$css .= '--color-Primary-800: ' . esc_attr(get_option('integra_color_primary_800', '#711d17')) . ';';
$css .= '--color-Primary-900: ' . esc_attr(get_option('integra_color_primary_900', '#47110e')) . ';';
$css .= '--color-Primary-950: ' . esc_attr(get_option('integra_color_primary_950', '#1e0705')) . ';';

// Secondary colors  
$css .= '--color-Secondary: ' . esc_attr(get_option('integra_color_secondary', '#222d3f')) . ';';
$css .= '--color-Secondary-Tint: ' . esc_attr(get_option('integra_color_secondary_tint', '#4e5765')) . ';';
$css .= '--color-Secondary-Shade: ' . esc_attr(get_option('integra_color_secondary_shade', '#1b2432')) . ';';
$css .= '--color-Secondary-Contrast: ' . esc_attr(get_option('integra_color_secondary_contrast', '#e9eaec')) . ';';

// Secondary variants
$css .= '--color-Secondary-50: ' . esc_attr(get_option('integra_color_secondary_50', '#E7E9ED')) . ';';
$css .= '--color-Secondary-100: ' . esc_attr(get_option('integra_color_secondary_100', '#d3d5d9')) . ';';
$css .= '--color-Secondary-200: ' . esc_attr(get_option('integra_color_secondary_200', '#a7abb2')) . ';';
$css .= '--color-Secondary-300: ' . esc_attr(get_option('integra_color_secondary_300', '#7a818c')) . ';';
$css .= '--color-Secondary-400: ' . esc_attr(get_option('integra_color_secondary_400', '#454b57')) . ';';
$css .= '--color-Secondary-500: ' . esc_attr(get_option('integra_color_secondary_500', '#222D3F')) . ';';
$css .= '--color-Secondary-600: ' . esc_attr(get_option('integra_color_secondary_600', '#1f2939')) . ';';
$css .= '--color-Secondary-700: ' . esc_attr(get_option('integra_color_secondary_700', '#1b2432')) . ';';
$css .= '--color-Secondary-800: ' . esc_attr(get_option('integra_color_secondary_800', '#181f2c')) . ';';
$css .= '--color-Secondary-900: ' . esc_attr(get_option('integra_color_secondary_900', '#141b26')) . ';';
$css .= '--color-Secondary-950: ' . esc_attr(get_option('integra_color_secondary_950', '#111720')) . ';';

// Status colors
$css .= '--color-Danger: ' . esc_attr(get_option('integra_color_danger', '#b91c1c')) . ';';
$css .= '--color-Danger-Tint: ' . esc_attr(get_option('integra_color_danger_tint', '#c74949')) . ';';
$css .= '--color-Danger-Shade: ' . esc_attr(get_option('integra_color_danger_shade', '#941616')) . ';';
$css .= '--color-Danger-Contrast: ' . esc_attr(get_option('integra_color_danger_contrast', '#f8e8e8')) . ';';

$css .= '--color-Warning: ' . esc_attr(get_option('integra_color_warning', '#ffb703')) . ';';
$css .= '--color-Warning-Tint: ' . esc_attr(get_option('integra_color_warning_tint', '#ffc535')) . ';';
$css .= '--color-Warning-Shade: ' . esc_attr(get_option('integra_color_warning_shade', '#cc9202')) . ';';
$css .= '--color-Warning-Contrast: ' . esc_attr(get_option('integra_color_warning_contrast', '#fff8e6')) . ';';

$css .= '--color-Success: ' . esc_attr(get_option('integra_color_success', '#4ca155')) . ';';
$css .= '--color-Success-Tint: ' . esc_attr(get_option('integra_color_success_tint', '#70b477')) . ';';
$css .= '--color-Success-Shade: ' . esc_attr(get_option('integra_color_success_shade', '#3d8144')) . ';';
$css .= '--color-Success-Contrast: ' . esc_attr(get_option('integra_color_success_contrast', '#edf6ee')) . ';';

$css .= '--color-Info: ' . esc_attr(get_option('integra_color_info', '#0369a1')) . ';';
$css .= '--color-Info-Tint: ' . esc_attr(get_option('integra_color_info_tint', '#3587b4')) . ';';
$css .= '--color-Info-Shade: ' . esc_attr(get_option('integra_color_info_shade', '#025481')) . ';';
$css .= '--color-Info-Contrast: ' . esc_attr(get_option('integra_color_info_contrast', '#e6f0f6')) . ';';

// Light colors
$css .= '--color-Light-50: ' . esc_attr(get_option('integra_color_light_50', '#fdfdfd')) . ';';
$css .= '--color-Light-100: ' . esc_attr(get_option('integra_color_light_100', '#fafafa')) . ';';
$css .= '--color-Light-200: ' . esc_attr(get_option('integra_color_light_200', '#f5f5f5')) . ';';
$css .= '--color-Light-300: ' . esc_attr(get_option('integra_color_light_300', '#ebebeb')) . ';';
$css .= '--color-Light-400: ' . esc_attr(get_option('integra_color_light_400', '#e0e0e0')) . ';';
$css .= '--color-Light-500: ' . esc_attr(get_option('integra_color_light_500', '#d6d6d6')) . ';';
$css .= '--color-Light-600: ' . esc_attr(get_option('integra_color_light_600', '#c2c2c2')) . ';';
$css .= '--color-Light-700: ' . esc_attr(get_option('integra_color_light_700', '#b0b0b0')) . ';';
$css .= '--color-Light-800: ' . esc_attr(get_option('integra_color_light_800', '#a0a0a0')) . ';';
$css .= '--color-Light-900: ' . esc_attr(get_option('integra_color_light_900', '#8f8f8f')) . ';';
$css .= '--color-Light-950: ' . esc_attr(get_option('integra_color_light_950', '#858585')) . ';';

// Dark colors
$css .= '--color-Dark-50: ' . esc_attr(get_option('integra_color_dark_50', '#7a7a7a')) . ';';
$css .= '--color-Dark-100: ' . esc_attr(get_option('integra_color_dark_100', '#6f6f6f')) . ';';
$css .= '--color-Dark-200: ' . esc_attr(get_option('integra_color_dark_200', '#606060')) . ';';
$css .= '--color-Dark-300: ' . esc_attr(get_option('integra_color_dark_300', '#555555')) . ';';
$css .= '--color-Dark-400: ' . esc_attr(get_option('integra_color_dark_400', '#494949')) . ';';
$css .= '--color-Dark-500: ' . esc_attr(get_option('integra_color_dark_500', '#3d3d3d')) . ';';
$css .= '--color-Dark-600: ' . esc_attr(get_option('integra_color_dark_600', '#323232')) . ';';
$css .= '--color-Dark-700: ' . esc_attr(get_option('integra_color_dark_700', '#292929')) . ';';
$css .= '--color-Dark-800: ' . esc_attr(get_option('integra_color_dark_800', '#1f1f1f')) . ';';
$css .= '--color-Dark-900: ' . esc_attr(get_option('integra_color_dark_900', '#141414')) . ';';
$css .= '--color-Dark-950: ' . esc_attr(get_option('integra_color_dark_950', '#0a0a0a')) . ';';

// Base colors
$css .= '--color-Black: ' . esc_attr(get_option('integra_color_black', '#1e1e1e')) . ';';
$css .= '--color-White: ' . esc_attr(get_option('integra_color_white', '#ffffff')) . ';';


?>