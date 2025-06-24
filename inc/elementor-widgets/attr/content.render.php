<?php

// Eyebrow text;
$eyebrow_text = $settings['eyebrow_text'];

// Heading;
$heading = $settings['heading'];
$heading_type = $settings['heading_type'];
$heading_class = $settings['heading_class'];

// Subheading;
$subheading = $settings['subheading'];
$subheading_type = $settings['subheading_type'];

// Paragraph;
$paragraph = $settings['paragraph'];

// Content Markup;
$content_markup = '';
$content_markup .= '<span class="eyebrow-text">'. $eyebrow_text .'</span>';
$content_markup .= '<div class="text-content">';
$content_markup .= '<'. $heading_type .' class="'. $heading_class .'">'. $heading .'</'. $heading_type .'>';

if($subheading_type === 'bold') {
    $content_markup .= '<p class="lead">'. $subheading .'</p>';
} else {
    $content_markup .= '<'. $subheading_type .'>'. $subheading .'</'. $subheading_type .'>';
}

$content_markup .= '<p>'. $paragraph .'</p>';
$content_markup .= '</div>';

?>