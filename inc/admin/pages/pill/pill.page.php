<?php
/**
 * Pill Settings Page
 * Admin page for managing pill component CSS variables
 */

if (!defined('ABSPATH')) exit;
?>

<div class="integra-page" id="page-pill">
    <h1>Pill</h1>
    
    <form method="post" action="" class="integra-pill-form">
        <?php wp_nonce_field('integra_pill_save', 'integra_pill_nonce'); ?>
        
        <!-- General Pill Properties -->
        <div class="integra-config-section">
            <h2>General Pill Properties</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_pill_gap">Gap</label>
                    <input type="text" 
                           id="integra_pill_gap" 
                           name="pill[gap]" 
                           value="<?php echo esc_attr(get_option('integra_pill_gap', '8px')); ?>"
                           data-default-value="8px" placeholder="8px">
                    <p class="description">Space between pills in a pill wrapper</p>
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_pill_font_weight">Font Weight</label>
                    <input type="number" 
                           id="integra_pill_font_weight" 
                           name="pill[font_weight]" 
                           value="<?php echo esc_attr(get_option('integra_pill_font_weight', '500')); ?>"
                           min="100" max="900" step="100"
                           data-default-value="500" placeholder="500">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_pill_border_radius">Border Radius</label>
                    <input type="text" 
                           id="integra_pill_border_radius" 
                           name="pill[border_radius]" 
                           value="<?php echo esc_attr(get_option('integra_pill_border_radius', '999px')); ?>"
                           data-default-value="999px" placeholder="999px">
                </div>

                <div class="integra-config-field">
                    <label for="integra_pill_padding_x">Padding X</label>
                    <input type="text" 
                           id="integra_pill_padding_x" 
                           name="pill[padding_x]" 
                           value="<?php echo esc_attr(get_option('integra_pill_padding_x', '12px')); ?>"
                           data-default-value="12px" placeholder="12px">
                    <p class="description">Horizontal padding inside the pill</p>
                </div>

                <div class="integra-config-field">
                    <label for="integra_pill_height">Height</label>
                    <input type="text" 
                           id="integra_pill_height" 
                           name="pill[height]" 
                           value="<?php echo esc_attr(get_option('integra_pill_height', '24px')); ?>"
                           data-default-value="24px" placeholder="24px">
                </div>

                <div class="integra-config-field">
                    <label for="integra_pill_font_size">Font Size</label>
                    <input type="text" 
                           id="integra_pill_font_size" 
                           name="pill[font_size]" 
                           value="<?php echo esc_attr(get_option('integra_pill_font_size', '12px')); ?>"
                           data-default-value="12px" placeholder="12px">
                </div>
            </div>
        </div>
        
        <!-- Pill Colors -->
        <div class="integra-config-section">
            <h2>Pill Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_pill_color">Text Color</label>
                    <input type="text" 
                           id="integra_pill_color" 
                           name="pill[color]" 
                           value="<?php echo esc_attr(get_option('integra_pill_color', 'var(--color-Dark-500)')); ?>"
                           data-default-value="var(--color-Dark-500)" placeholder="var(--color-Dark-500)">
                    <p class="description">Use CSS variables like var(--color-Dark-500) or hex colors</p>
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_pill_background_color">Background Color</label>
                    <input type="text" 
                           id="integra_pill_background_color" 
                           name="pill[background_color]" 
                           value="<?php echo esc_attr(get_option('integra_pill_background_color', 'var(--color-Secondary-50)')); ?>"
                           data-default-value="var(--color-Secondary-50)" placeholder="var(--color-Secondary-50)">
                    <p class="description">Use CSS variables like var(--color-Secondary-50) or hex colors</p>
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_pill_border_color">Border Color</label>
                    <input type="text" 
                           id="integra_pill_border_color" 
                           name="pill[border_color]" 
                           value="<?php echo esc_attr(get_option('integra_pill_border_color', 'transparent')); ?>"
                           data-default-value="transparent" placeholder="transparent">
                    <p class="description">Use CSS variables, transparent, or hex colors</p>
                </div>
            </div>
        </div>
        
        <div class="integra-form-actions">
            <button type="submit" name="save_pill" class="button button-primary">Save Pill Settings</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all pill settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 