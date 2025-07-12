<div class="integra-page" id="page-typography">
    <h1>Typography</h1>
    
    <form method="post" action="" class="integra-typography-form">
        <?php wp_nonce_field('integra_typography_save', 'integra_typography_nonce'); ?>
        
        <!-- Google Fonts Import -->
        <div class="integra-config-section">
            <h2>Google Fonts Import</h2>
            <div class="integra-config-field">
                <label for="google-fonts-import">Google Fonts HTML Code</label>
                <textarea 
                    id="google-fonts-import" 
                    name="typography[google_fonts_import]" 
                    rows="6" 
                    placeholder="Paste your Google Fonts HTML code here...&#10;&lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;&gt;&#10;&lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.gstatic.com&quot; crossorigin&gt;&#10;&lt;link href=&quot;https://fonts.googleapis.com/css2?family=...&quot; rel=&quot;stylesheet&quot;&gt;"
                    style="width: 100%; min-height: 120px; font-family: monospace; font-size: 12px;"
                ><?php echo esc_textarea(get_option('integra_google_fonts_import', '')); ?></textarea>
                <p class="description">
                    Paste your Google Fonts HTML code here (or any other content). 
                    This will be automatically added to your site's &lt;head&gt; section.
                </p>
            </div>
        </div>
        
        <!-- Font Families -->
        <div class="integra-config-section">
            <h2>Font Families</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="font-family-base">Base Font Family</label>
                    <input type="text" id="font-family-base" name="typography[font_family_base]" value="<?php echo esc_attr(get_option('integra_font_family_base', 'DM Sans')); ?>" data-default-value="DM Sans" placeholder="DM Sans">
                </div>
                <div class="integra-config-field">
                    <label for="font-family-heading">Heading Font Family</label>
                    <input type="text" id="font-family-heading" name="typography[font_family_heading]" value="<?php echo esc_attr(get_option('integra_font_family_heading', 'Anek Bangla')); ?>" data-default-value="Anek Bangla" placeholder="Anek Bangla">
                </div>
                <div class="integra-config-field">
                    <label for="font-family-mono">Monospace Font Family</label>
                    <input type="text" id="font-family-mono" name="typography[font_family_mono]" value="<?php echo esc_attr(get_option('integra_font_family_mono', 'SFMono-Regular')); ?>" data-default-value="SFMono-Regular" placeholder="SFMono-Regular">
                </div>
            </div>
        </div>

        <!-- Base Typography -->
        <div class="integra-config-section">
            <h2>Base Typography</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="base-font-size">Base Font Size</label>
                    <input type="text" id="base-font-size" name="typography[base_font_size]" value="<?php echo esc_attr(get_option('integra_base_font_size', '16px')); ?>" data-default-value="16px" placeholder="16px">
                </div>
                <div class="integra-config-field">
                    <label for="base-font-weight">Base Font Weight</label>
                    <input type="number" id="base-font-weight" name="typography[base_font_weight]" value="<?php echo esc_attr(get_option('integra_base_font_weight', '400')); ?>" data-default-value="400" placeholder="400" min="100" max="900" step="100">
                </div>
                <div class="integra-config-field">
                    <label for="base-line-height">Base Line Height</label>
                    <input type="text" id="base-line-height" name="typography[base_line_height]" value="<?php echo esc_attr(get_option('integra_base_line_height', '140%')); ?>" data-default-value="140%" placeholder="140%">
                </div>
                <div class="integra-config-field">
                    <label for="lead-font-size">Lead Font Size</label>
                    <input type="text" id="lead-font-size" name="typography[lead_font_size]" value="<?php echo esc_attr(get_option('integra_lead_font_size', '1.125rem')); ?>" data-default-value="1.125rem" placeholder="1.125rem">
                </div>
                <div class="integra-config-field">
                    <label for="lead-font-weight">Lead Font Weight</label>
                    <input type="number" id="lead-font-weight" name="typography[lead_font_weight]" value="<?php echo esc_attr(get_option('integra_lead_font_weight', '700')); ?>" data-default-value="700" placeholder="700" min="100" max="900" step="100">
                </div>
                <div class="integra-config-field">
                    <label for="lead-line-height">Lead Line Height</label>
                    <input type="text" id="lead-line-height" name="typography[lead_line_height]" value="<?php echo esc_attr(get_option('integra_lead_line_height', '140%')); ?>" data-default-value="140%" placeholder="140%">
                </div>
                <div class="integra-config-field">
                    <label for="heading-font-weight">Heading Font Weight</label>
                    <input type="number" id="heading-font-weight" name="typography[heading_font_weight]" value="<?php echo esc_attr(get_option('integra_heading_font_weight', '700')); ?>" data-default-value="700" placeholder="700" min="100" max="900" step="100">
                </div>
                <div class="integra-config-field">
                    <label for="heading-line-height">Heading Line Height</label>
                    <input type="text" id="heading-line-height" name="typography[heading_line_height]" value="<?php echo esc_attr(get_option('integra_heading_line_height', '100%')); ?>" data-default-value="100%" placeholder="100%">
                </div>
            </div>
        </div>

        <!-- Display Headings -->
        <div class="integra-config-section">
            <h2>Display Headings</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="display-1-sm">Display 1 Small</label>
                    <input type="text" id="display-1-sm" name="typography[display_1_sm]" value="<?php echo esc_attr(get_option('integra_display_1_sm', '2.75rem')); ?>" data-default-value="2.75rem" placeholder="2.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="display-1-md">Display 1 Medium</label>
                    <input type="text" id="display-1-md" name="typography[display_1_md]" value="<?php echo esc_attr(get_option('integra_display_1_md', '3.25rem')); ?>" data-default-value="3.25rem" placeholder="3.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="display-1-lg">Display 1 Large</label>
                    <input type="text" id="display-1-lg" name="typography[display_1_lg]" value="<?php echo esc_attr(get_option('integra_display_1_lg', '3.75rem')); ?>" data-default-value="3.75rem" placeholder="3.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="display-2-sm">Display 2 Small</label>
                    <input type="text" id="display-2-sm" name="typography[display_2_sm]" value="<?php echo esc_attr(get_option('integra_display_2_sm', '2.5rem')); ?>" data-default-value="2.5rem" placeholder="2.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="display-2-md">Display 2 Medium</label>
                    <input type="text" id="display-2-md" name="typography[display_2_md]" value="<?php echo esc_attr(get_option('integra_display_2_md', '2.75rem')); ?>" data-default-value="2.75rem" placeholder="2.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="display-2-lg">Display 2 Large</label>
                    <input type="text" id="display-2-lg" name="typography[display_2_lg]" value="<?php echo esc_attr(get_option('integra_display_2_lg', '3.25rem')); ?>" data-default-value="3.25rem" placeholder="3.25rem">
                </div>
            </div>
        </div>

        <!-- 📱 Small Screens (Mobile) -->
        <div class="integra-config-section">
            <h2>📱 Small Screens (Mobile)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="h1-sm">H1 Small</label>
                    <input type="text" id="h1-sm" name="typography[h1_sm]" value="<?php echo esc_attr(get_option('integra_h1_sm', '2.25rem')); ?>" data-default-value="2.25rem" placeholder="2.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="h2-sm">H2 Small</label>
                    <input type="text" id="h2-sm" name="typography[h2_sm]" value="<?php echo esc_attr(get_option('integra_h2_sm', '2rem')); ?>" data-default-value="2rem" placeholder="2rem">
                </div>
                <div class="integra-config-field">
                    <label for="h3-sm">H3 Small</label>
                    <input type="text" id="h3-sm" name="typography[h3_sm]" value="<?php echo esc_attr(get_option('integra_h3_sm', '1.875rem')); ?>" data-default-value="1.875rem" placeholder="1.875rem">
                </div>
                <div class="integra-config-field">
                    <label for="h4-sm">H4 Small</label>
                    <input type="text" id="h4-sm" name="typography[h4_sm]" value="<?php echo esc_attr(get_option('integra_h4_sm', '1.75rem')); ?>" data-default-value="1.75rem" placeholder="1.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="h5-sm">H5 Small</label>
                    <input type="text" id="h5-sm" name="typography[h5_sm]" value="<?php echo esc_attr(get_option('integra_h5_sm', '1.625rem')); ?>" data-default-value="1.625rem" placeholder="1.625rem">
                </div>
                <div class="integra-config-field">
                    <label for="h6-sm">H6 Small</label>
                    <input type="text" id="h6-sm" name="typography[h6_sm]" value="<?php echo esc_attr(get_option('integra_h6_sm', '1.5rem')); ?>" data-default-value="1.5rem" placeholder="1.5rem">
                </div>
            </div>
        </div>

        <!-- 📲 Medium Screens (Tablet) -->
        <div class="integra-config-section">
            <h2>📲 Medium Screens (Tablet)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="h1-md">H1 Medium</label>
                    <input type="text" id="h1-md" name="typography[h1_md]" value="<?php echo esc_attr(get_option('integra_h1_md', '2.5rem')); ?>" data-default-value="2.5rem" placeholder="2.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="h2-md">H2 Medium</label>
                    <input type="text" id="h2-md" name="typography[h2_md]" value="<?php echo esc_attr(get_option('integra_h2_md', '2.25rem')); ?>" data-default-value="2.25rem" placeholder="2.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="h3-md">H3 Medium</label>
                    <input type="text" id="h3-md" name="typography[h3_md]" value="<?php echo esc_attr(get_option('integra_h3_md', '2rem')); ?>" data-default-value="2rem" placeholder="2rem">
                </div>
                <div class="integra-config-field">
                    <label for="h4-md">H4 Medium</label>
                    <input type="text" id="h4-md" name="typography[h4_md]" value="<?php echo esc_attr(get_option('integra_h4_md', '1.875rem')); ?>" data-default-value="1.875rem" placeholder="1.875rem">
                </div>
                <div class="integra-config-field">
                    <label for="h5-md">H5 Medium</label>
                    <input type="text" id="h5-md" name="typography[h5_md]" value="<?php echo esc_attr(get_option('integra_h5_md', '1.75rem')); ?>" data-default-value="1.75rem" placeholder="1.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="h6-md">H6 Medium</label>
                    <input type="text" id="h6-md" name="typography[h6_md]" value="<?php echo esc_attr(get_option('integra_h6_md', '1.625rem')); ?>" data-default-value="1.625rem" placeholder="1.625rem">
                </div>
            </div>
        </div>

        <!-- 🖥️ Large Screens (Desktop) -->
        <div class="integra-config-section">
            <h2>🖥️ Large Screens (Desktop)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="h1-lg">H1 Large</label>
                    <input type="text" id="h1-lg" name="typography[h1_lg]" value="<?php echo esc_attr(get_option('integra_h1_lg', '3rem')); ?>" data-default-value="3rem" placeholder="3rem">
                </div>
                <div class="integra-config-field">
                    <label for="h2-lg">H2 Large</label>
                    <input type="text" id="h2-lg" name="typography[h2_lg]" value="<?php echo esc_attr(get_option('integra_h2_lg', '2.5rem')); ?>" data-default-value="2.5rem" placeholder="2.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="h3-lg">H3 Large</label>
                    <input type="text" id="h3-lg" name="typography[h3_lg]" value="<?php echo esc_attr(get_option('integra_h3_lg', '2.25rem')); ?>" data-default-value="2.25rem" placeholder="2.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="h4-lg">H4 Large</label>
                    <input type="text" id="h4-lg" name="typography[h4_lg]" value="<?php echo esc_attr(get_option('integra_h4_lg', '2rem')); ?>" data-default-value="2rem" placeholder="2rem">
                </div>
                <div class="integra-config-field">
                    <label for="h5-lg">H5 Large</label>
                    <input type="text" id="h5-lg" name="typography[h5_lg]" value="<?php echo esc_attr(get_option('integra_h5_lg', '1.875rem')); ?>" data-default-value="1.875rem" placeholder="1.875rem">
                </div>
                <div class="integra-config-field">
                    <label for="h6-lg">H6 Large</label>
                    <input type="text" id="h6-lg" name="typography[h6_lg]" value="<?php echo esc_attr(get_option('integra_h6_lg', '1.75rem')); ?>" data-default-value="1.75rem" placeholder="1.75rem">
                </div>
            </div>
        </div>

        <div class="integra-form-actions">
            <button type="submit" name="save_typography" class="button button-primary">Save Typography</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all typography settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 