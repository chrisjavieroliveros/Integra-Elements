<?php
if (!defined('ABSPATH')) exit;

// Output Eyebrow Text CSS Variables
echo "    /* Eyebrow Text Variables */\n";
echo "    --eyebrow-font-family: " . esc_attr(get_option('integra_eyebrow_font_family', 'DM Sans')) . ";\n";
echo "    --eyebrow-font-weight: " . esc_attr(get_option('integra_eyebrow_font_weight', '700')) . ";\n";
echo "    --eyebrow-font-size: " . esc_attr(get_option('integra_eyebrow_font_size', '0.875rem')) . ";\n";
echo "    --eyebrow-line-height: " . esc_attr(get_option('integra_eyebrow_line_height', '100%')) . ";\n";
echo "    --eyebrow-letter-spacing: " . esc_attr(get_option('integra_eyebrow_letter_spacing', '4%')) . ";\n";
echo "    --eyebrow-text-transform: " . esc_attr(get_option('integra_eyebrow_text_transform', 'uppercase')) . ";\n";
echo "    --eyebrow-padding: " . esc_attr(get_option('integra_eyebrow_padding', '0')) . ";\n";
echo "    --eyebrow-border-radius: " . esc_attr(get_option('integra_eyebrow_border_radius', '0')) . ";\n";
echo "    --eyebrow-background-color: " . esc_attr(get_option('integra_eyebrow_background_color', 'transparent')) . ";\n";
echo "    --eyebrow-color: " . esc_attr(get_option('integra_eyebrow_color', 'var(--color-Primary)')) . ";\n";
?> 