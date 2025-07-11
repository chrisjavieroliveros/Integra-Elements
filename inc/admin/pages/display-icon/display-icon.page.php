<?php
/**
 * Display Icon Settings Page
 * Admin page for managing display icon component CSS variables
 */

if (!defined('ABSPATH')) exit;
?>

<div class="integra-page" id="page-display-icon">
    <h1>Display Icon</h1>
    
    <form method="post" action="" class="integra-display-icon-form">
        <?php wp_nonce_field('integra_display_icon_save', 'integra_display_icon_nonce'); ?>
        
        <!-- Display Icon Properties -->
        <div class="integra-config-section">
            <h2>Display Icon Properties</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_display_icon_padding">Padding</label>
                    <input type="text" 
                           id="integra_display_icon_padding" 
                           name="display_icon[padding]" 
                           value="<?php echo esc_attr(get_option('integra_display_icon_padding', '10px')); ?>"
                           data-default-value="10px" placeholder="10px">
                    <p class="description">Padding around the display icon</p>
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_display_icon_font_size">Font Size</label>
                    <input type="text" 
                           id="integra_display_icon_font_size" 
                           name="display_icon[font_size]" 
                           value="<?php echo esc_attr(get_option('integra_display_icon_font_size', '24px')); ?>"
                           data-default-value="24px" placeholder="24px">
                    <p class="description">Font size of the display icon</p>
                </div>
            </div>
        </div>
        
        <!-- Display Icon Base Properties -->
        <div class="integra-config-section">
            <h2>Display Icon Base Properties</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_display_icon_base_border_radius">Border Radius</label>
                    <input type="text" 
                           id="integra_display_icon_base_border_radius" 
                           name="display_icon[base_border_radius]" 
                           value="<?php echo esc_attr(get_option('integra_display_icon_base_border_radius', '6px')); ?>"
                           data-default-value="6px" placeholder="6px">
                    <p class="description">Border radius of the display icon background</p>
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_display_icon_base_opacity">Opacity</label>
                    <input type="number" 
                           id="integra_display_icon_base_opacity" 
                           name="display_icon[base_opacity]" 
                           value="<?php echo esc_attr(get_option('integra_display_icon_base_opacity', '0.1')); ?>"
                           data-default-value="0.1" placeholder="0.1"
                           min="0" max="1" step="0.1">
                    <p class="description">Opacity of the display icon background (0.0 to 1.0)</p>
                </div>
            </div>
        </div>
        
        <div class="integra-form-actions">
            <button type="submit" name="save_display_icon" class="button button-primary">Save Display Icon Settings</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all display icon settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 