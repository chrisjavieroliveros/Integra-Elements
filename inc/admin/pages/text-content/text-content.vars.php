<?php
/**
 * Text Content Variables
 * 
 * CSS Variables for text content settings
 *
 * @package Integra_Elements
 */

// Text Content Gap Variables
$css .= '--text-content-gap: ' . esc_attr(get_option('integra_text_content_gap', '1.5rem')) . ';';
$css .= '--text-content-gap-inner: ' . esc_attr(get_option('integra_text_content_gap_inner', '0.75rem')) . ';'; 