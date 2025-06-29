<?php
if (!defined('ABSPATH')) exit;

// Eyebrow Text Form
echo '<form method="post" action="" class="integra-eyebrow-text-form">';
        wp_nonce_field('integra_eyebrow_text_save', 'integra_eyebrow_text_nonce');
        ?>
        <!-- Eyebrow Text -->
        <div class="integra-config-section">
            <h2>Eyebrow Text</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="eyebrow-font-family">Eyebrow Font Family</label>
                    <input type="text" id="eyebrow-font-family" name="eyebrow_text[eyebrow_font_family]" value="<?php echo esc_attr(get_option('integra_eyebrow_font_family', 'DM Sans')); ?>" data-default-value="DM Sans" placeholder="DM Sans">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-font-weight">Eyebrow Font Weight</label>
                    <input type="number" id="eyebrow-font-weight" name="eyebrow_text[eyebrow_font_weight]" value="<?php echo esc_attr(get_option('integra_eyebrow_font_weight', '700')); ?>" data-default-value="700" placeholder="700" min="100" max="900" step="100">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-font-size">Eyebrow Font Size</label>
                    <input type="text" id="eyebrow-font-size" name="eyebrow_text[eyebrow_font_size]" value="<?php echo esc_attr(get_option('integra_eyebrow_font_size', '0.875rem')); ?>" data-default-value="0.875rem" placeholder="0.875rem">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-line-height">Eyebrow Line Height</label>
                    <input type="text" id="eyebrow-line-height" name="eyebrow_text[eyebrow_line_height]" value="<?php echo esc_attr(get_option('integra_eyebrow_line_height', '140%')); ?>" data-default-value="140%" placeholder="140%">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-letter-spacing">Eyebrow Letter Spacing</label>
                    <input type="text" id="eyebrow-letter-spacing" name="eyebrow_text[eyebrow_letter_spacing]" value="<?php echo esc_attr(get_option('integra_eyebrow_letter_spacing', '4%')); ?>" data-default-value="4%" placeholder="4%">
                </div>
                <!-- <div class="integra-config-field">
                    <label for="eyebrow-text-transform">Eyebrow Text Transform</label>
                    <input type="text" id="eyebrow-text-transform" name="eyebrow_text[eyebrow_text_transform]" value="<?php echo esc_attr(get_option('integra_eyebrow_text_transform', 'uppercase')); ?>" data-default-value="uppercase" placeholder="uppercase">
                </div> -->
                <div class="integra-config-field">
                    <label for="eyebrow-padding">Eyebrow Padding</label>
                    <input type="text" id="eyebrow-padding" name="eyebrow_text[eyebrow_padding]" value="<?php echo esc_attr(get_option('integra_eyebrow_padding', '0')); ?>" data-default-value="0" placeholder="0">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-border-radius">Eyebrow Border Radius</label>
                    <input type="text" id="eyebrow-border-radius" name="eyebrow_text[eyebrow_border_radius]" value="<?php echo esc_attr(get_option('integra_eyebrow_border_radius', '0')); ?>" data-default-value="0" placeholder="0">
                </div>
                <div class="integra-config-field">
                    <label for="eyebrow-background-color">Eyebrow Background Color</label>
                    <input type="text" id="eyebrow-background-color" name="eyebrow_text[eyebrow_background_color]" value="<?php echo esc_attr(get_option('integra_eyebrow_background_color', 'transparent')); ?>" data-default-value="transparent" placeholder="transparent">
                </div>
                <!-- <div class="integra-config-field">
                    <label for="eyebrow-color">Eyebrow Color</label>
                    <input type="text" id="eyebrow-color" name="eyebrow_text[eyebrow_color]" value="<?php echo esc_attr(get_option('integra_eyebrow_color', 'var(--color-Primary)')); ?>" data-default-value="var(--color-Primary)" placeholder="var(--color-Primary)">
                </div> -->
            </div>
        </div>

        <div class="integra-form-actions">
            <button type="submit" name="save_eyebrow_text" class="button button-primary">Save Eyebrow Text Settings</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all eyebrow text settings to their default values?">Reset All Eyebrow Text Settings</button>
        </div>
    </form> 