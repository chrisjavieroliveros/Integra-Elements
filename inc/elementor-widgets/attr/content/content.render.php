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

// Eyebrow Text;
if($eyebrow_text !== '') {
    $content_markup .= '<span class="eyebrow-text" style="color: var(--color-'. $eyebrow_text_color .');">'. esc_html($eyebrow_text) .'</span>';
}

// Find h1-h6 tags in the contents and add the heading class;
if($heading_class !== 'default') {
    $contents = preg_replace('/<h([1-6])>(.*?)<\/h\1>/', '<h$1 class="'. esc_attr($heading_class) .'">$2</h$1>', $contents);
}   

// Add the contents to the content markup;
$content_markup .= '<div class="text-content">'. $contents .'</div>';

?>