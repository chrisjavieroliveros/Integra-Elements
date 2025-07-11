<?php

// Check if $content_markup is defined in the parent file
if (!isset($content_markup)) {
    $content_markup = '';
}

// Content Settings;
$eyebrow_text = $settings['eyebrow_text'] ?? '';
$eyebrow_text_color = $settings['eyebrow_text_color'] ?? 'Primary';
$heading_class = $settings['heading_class'] ?? 'default';
$contents = $settings['contents'] ?? '';

// Display Icon;
$display_icon_show = $settings['display_icon_show'] ?? 'yes';
$display_icon_color = $settings['display_icon_color'] ?? 'Primary';
$display_icon_opacity = $settings['display_icon_opacity'] ?? '10';
$display_icon = $settings['display_icon'] ?? '';

if($display_icon_show === 'yes') {
    $content_markup .= '<div class="display-icon" style="color: var(--color-'. $display_icon_color .'); font-size: '. $settings['display_icon_size']['size'] .'px;">';
    $content_markup .= '<i class="'. $display_icon['value'] .'"></i>';
         $content_markup .= '<div class="display-icon-base" style="background-color: var(--color-'. $display_icon_color .'); opacity: '. $display_icon_opacity['size'] .'%;"></div>';
    $content_markup .= '</div>';
}


// Eyebrow Text;
if($eyebrow_text !== '') {
    $content_markup .= '<span class="eyebrow-text" style="color: var(--color-'. $eyebrow_text_color .');">'. esc_html($eyebrow_text) .'</span>';
}

// Find h1-h6 tags in the contents and add the heading class;
if($heading_class !== 'default') {
    $contents = preg_replace('/<h([1-6])>(.*?)<\/h\1>/', '<h$1 class="'. esc_attr($heading_class) .'">$2</h$1>', $contents);
}   

// Add the contents to the content markup;
if($contents !== '') {
    $content_markup .= '<div class="inner-content">'. $contents .'</div>';
}

?>