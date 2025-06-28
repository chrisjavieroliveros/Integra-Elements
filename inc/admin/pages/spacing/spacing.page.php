<div class="integra-page" id="page-spacing">
    <h1>Spacing</h1>
    
    <form method="post" action="" class="integra-spacing-form">
        <?php wp_nonce_field('integra_spacing_save', 'integra_spacing_nonce'); ?>
        
        <!-- Extra Small Spacing -->
        <div class="integra-config-section">
            <h2>Extra Small Spacing (XS)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-xs-mobile">XS Mobile</label>
                    <input type="text" id="spacing-xs-mobile" name="spacing[spacing_xs_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_xs_mobile', '1.5rem')); ?>" data-default-value="1.5rem" placeholder="1.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xs-tablet">XS Tablet</label>
                    <input type="text" id="spacing-xs-tablet" name="spacing[spacing_xs_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_xs_tablet', '2rem')); ?>" data-default-value="2rem" placeholder="2rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xs-desktop">XS Desktop</label>
                    <input type="text" id="spacing-xs-desktop" name="spacing[spacing_xs_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_xs_desktop', '2.5rem')); ?>" data-default-value="2.5rem" placeholder="2.5rem">
                </div>
            </div>
        </div>

        <!-- Small Spacing -->
        <div class="integra-config-section">
            <h2>Small Spacing (SM)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-sm-mobile">SM Mobile</label>
                    <input type="text" id="spacing-sm-mobile" name="spacing[spacing_sm_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_sm_mobile', '2.25rem')); ?>" data-default-value="2.25rem" placeholder="2.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-sm-tablet">SM Tablet</label>
                    <input type="text" id="spacing-sm-tablet" name="spacing[spacing_sm_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_sm_tablet', '3rem')); ?>" data-default-value="3rem" placeholder="3rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-sm-desktop">SM Desktop</label>
                    <input type="text" id="spacing-sm-desktop" name="spacing[spacing_sm_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_sm_desktop', '3.75rem')); ?>" data-default-value="3.75rem" placeholder="3.75rem">
                </div>
            </div>
        </div>

        <!-- Medium Spacing -->
        <div class="integra-config-section">
            <h2>Medium Spacing (MD)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-md-mobile">MD Mobile</label>
                    <input type="text" id="spacing-md-mobile" name="spacing[spacing_md_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_md_mobile', '3.5rem')); ?>" data-default-value="3.5rem" placeholder="3.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-md-tablet">MD Tablet</label>
                    <input type="text" id="spacing-md-tablet" name="spacing[spacing_md_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_md_tablet', '4.5rem')); ?>" data-default-value="4.5rem" placeholder="4.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-md-desktop">MD Desktop</label>
                    <input type="text" id="spacing-md-desktop" name="spacing[spacing_md_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_md_desktop', '5.5rem')); ?>" data-default-value="5.5rem" placeholder="5.5rem">
                </div>
            </div>
        </div>

        <!-- Large Spacing -->
        <div class="integra-config-section">
            <h2>Large Spacing (LG)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-lg-mobile">LG Mobile</label>
                    <input type="text" id="spacing-lg-mobile" name="spacing[spacing_lg_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_lg_mobile', '5.25rem')); ?>" data-default-value="5.25rem" placeholder="5.25rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-lg-tablet">LG Tablet</label>
                    <input type="text" id="spacing-lg-tablet" name="spacing[spacing_lg_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_lg_tablet', '6.75rem')); ?>" data-default-value="6.75rem" placeholder="6.75rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-lg-desktop">LG Desktop</label>
                    <input type="text" id="spacing-lg-desktop" name="spacing[spacing_lg_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_lg_desktop', '8.25rem')); ?>" data-default-value="8.25rem" placeholder="8.25rem">
                </div>
            </div>
        </div>

        <!-- Extra Large Spacing -->
        <div class="integra-config-section">
            <h2>Extra Large Spacing (XL)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-xl-mobile">XL Mobile</label>
                    <input type="text" id="spacing-xl-mobile" name="spacing[spacing_xl_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_xl_mobile', '7.5rem')); ?>" data-default-value="7.5rem" placeholder="7.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xl-tablet">XL Tablet</label>
                    <input type="text" id="spacing-xl-tablet" name="spacing[spacing_xl_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_xl_tablet', '9.5rem')); ?>" data-default-value="9.5rem" placeholder="9.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xl-desktop">XL Desktop</label>
                    <input type="text" id="spacing-xl-desktop" name="spacing[spacing_xl_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_xl_desktop', '11.5rem')); ?>" data-default-value="11.5rem" placeholder="11.5rem">
                </div>
            </div>
        </div>

        <!-- Extra Extra Large Spacing -->
        <div class="integra-config-section">
            <h2>Extra Extra Large Spacing (XXL)</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="spacing-xxl-mobile">XXL Mobile</label>
                    <input type="text" id="spacing-xxl-mobile" name="spacing[spacing_xxl_mobile]" value="<?php echo esc_attr(get_option('integra_spacing_xxl_mobile', '10.5rem')); ?>" data-default-value="10.5rem" placeholder="10.5rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xxl-tablet">XXL Tablet</label>
                    <input type="text" id="spacing-xxl-tablet" name="spacing[spacing_xxl_tablet]" value="<?php echo esc_attr(get_option('integra_spacing_xxl_tablet', '13rem')); ?>" data-default-value="13rem" placeholder="13rem">
                </div>
                <div class="integra-config-field">
                    <label for="spacing-xxl-desktop">XXL Desktop</label>
                    <input type="text" id="spacing-xxl-desktop" name="spacing[spacing_xxl_desktop]" value="<?php echo esc_attr(get_option('integra_spacing_xxl_desktop', '15.5rem')); ?>" data-default-value="15.5rem" placeholder="15.5rem">
                </div>
            </div>
        </div>

        <div class="integra-form-actions">
            <button type="submit" name="save_spacing" class="button button-primary">Save Spacing</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all spacing settings to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div> 