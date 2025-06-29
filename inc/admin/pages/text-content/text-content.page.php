<div class="integra-page" id="page-text-content">
    <h1>Text Content</h1>
    
    <form method="post" action="" class="integra-text-content-form">
        <?php wp_nonce_field('integra_text_content_save', 'integra_text_content_nonce'); ?>
        
        <!-- Text Content Gap Settings -->
        <div class="integra-config-section">
            <h2>Text Content Gap Settings</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="text-content-gap">Text Content Gap</label>
                    <input type="text" id="text-content-gap" name="text_content[gap]" value="<?php echo esc_attr(get_option('integra_text_content_gap', '1.5rem')); ?>" data-default-value="1.5rem" placeholder="1.5rem">
                    <p class="description">The main gap between text content elements (e.g., between paragraphs, headings, and other text elements).</p>
                </div>
                <div class="integra-config-field">
                    <label for="text-content-gap-inner">Text Content Gap Inner</label>
                    <input type="text" id="text-content-gap-inner" name="text_content[gap_inner]" value="<?php echo esc_attr(get_option('integra_text_content_gap_inner', '0.75rem')); ?>" data-default-value="0.75rem" placeholder="0.75rem">
                    <p class="description">The inner gap for closely related text content elements (e.g., between list items, or within content blocks).</p>
                </div>
            </div>
        </div>

        <div class="integra-form-actions">
            <button type="submit" name="save_text_content" class="button button-primary">Save Text Content</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all text content settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 