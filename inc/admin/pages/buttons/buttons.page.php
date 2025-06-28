<?php
/**
 * Buttons Settings Page
 * Admin page for managing button CSS variables
 */

if (!defined('ABSPATH')) exit;
?>

<div class="integra-page" id="page-buttons">
    <h1>Buttons</h1>
    
    <form method="post" action="" class="integra-buttons-form">
        <?php wp_nonce_field('integra_buttons_save', 'integra_buttons_nonce'); ?>
        
        <!-- General Button Properties -->
        <div class="integra-config-section">
            <h2>General Button Properties</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_btn_line_height">Line Height</label>
                    <input type="text" 
                           id="integra_btn_line_height" 
                           name="integra_btn_line_height" 
                           value="<?php echo esc_attr(get_option('integra_btn_line_height', '120%')); ?>"
                           data-default-value="120%" placeholder="Button Text Line Height">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_border_radius">Border Radius</label>
                    <input type="text" 
                           id="integra_btn_border_radius" 
                           name="integra_btn_border_radius" 
                           value="<?php echo esc_attr(get_option('integra_btn_border_radius', '999px')); ?>"
                           data-default-value="999px" placeholder="999px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_font_weight">Font Weight</label>
                    <input type="number" 
                           id="integra_btn_font_weight" 
                           name="integra_btn_font_weight" 
                           value="<?php echo esc_attr(get_option('integra_btn_font_weight', '700')); ?>"
                           min="100" max="900" step="100"
                           data-default-value="700" placeholder="700">
                </div>
            </div>
        </div>
        
        <!-- Small Button Size -->
        <div class="integra-config-section">
            <h2>Small Button Size</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_btn_sm_height">Height</label>
                    <input type="text" 
                           id="integra_btn_sm_height" 
                           name="integra_btn_sm_height" 
                           value="<?php echo esc_attr(get_option('integra_btn_sm_height', '40px')); ?>"
                           data-default-value="40px" placeholder="40px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_sm_padding_x">Padding X</label>
                    <input type="text" 
                           id="integra_btn_sm_padding_x" 
                           name="integra_btn_sm_padding_x" 
                           value="<?php echo esc_attr(get_option('integra_btn_sm_padding_x', '16px')); ?>"
                           data-default-value="16px" placeholder="16px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_sm_font_size">Font Size</label>
                    <input type="text" 
                           id="integra_btn_sm_font_size" 
                           name="integra_btn_sm_font_size" 
                           value="<?php echo esc_attr(get_option('integra_btn_sm_font_size', '12px')); ?>"
                           data-default-value="12px" placeholder="12px">
                </div>
            </div>
        </div>
        
        <!-- Medium Button Size -->
        <div class="integra-config-section">
            <h2>Medium Button Size</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_btn_md_height">Height</label>
                    <input type="text" 
                           id="integra_btn_md_height" 
                           name="integra_btn_md_height" 
                           value="<?php echo esc_attr(get_option('integra_btn_md_height', '40px')); ?>"
                           data-default-value="40px" placeholder="40px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_md_padding_x">Padding X</label>
                    <input type="text" 
                           id="integra_btn_md_padding_x" 
                           name="integra_btn_md_padding_x" 
                           value="<?php echo esc_attr(get_option('integra_btn_md_padding_x', '16px')); ?>"
                           data-default-value="16px" placeholder="16px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_md_font_size">Font Size</label>
                    <input type="text" 
                           id="integra_btn_md_font_size" 
                           name="integra_btn_md_font_size" 
                           value="<?php echo esc_attr(get_option('integra_btn_md_font_size', '14px')); ?>"
                           data-default-value="14px" placeholder="14px">
                </div>
            </div>
        </div>
        
        <!-- Large Button Size -->
        <div class="integra-config-section">
            <h2>Large Button Size</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="integra_btn_lg_height">Height</label>
                    <input type="text" 
                           id="integra_btn_lg_height" 
                           name="integra_btn_lg_height" 
                           value="<?php echo esc_attr(get_option('integra_btn_lg_height', '48px')); ?>"
                           data-default-value="48px" placeholder="48px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_lg_padding_x">Padding X</label>
                    <input type="text" 
                           id="integra_btn_lg_padding_x" 
                           name="integra_btn_lg_padding_x" 
                           value="<?php echo esc_attr(get_option('integra_btn_lg_padding_x', '24px')); ?>"
                           data-default-value="24px" placeholder="24px">
                </div>
                
                <div class="integra-config-field">
                    <label for="integra_btn_lg_font_size">Font Size</label>
                    <input type="text" 
                           id="integra_btn_lg_font_size" 
                           name="integra_btn_lg_font_size" 
                           value="<?php echo esc_attr(get_option('integra_btn_lg_font_size', '16px')); ?>"
                           data-default-value="16px" placeholder="16px">
                </div>
            </div>
        </div>
        
        <div class="integra-form-actions">
            <button type="submit" name="submit_buttons" class="button button-primary">Save Button Settings</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all button settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 