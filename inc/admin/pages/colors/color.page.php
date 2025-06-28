<div class="integra-page" id="page-colors">
    <h1>Colors</h1>
    
    <form method="post" action="" class="integra-colors-form">
        <?php wp_nonce_field('integra_colors_save', 'integra_colors_nonce'); ?>
        
        <!-- Primary Colors -->
        <div class="integra-config-section">
            <h2>Primary Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-primary">Primary</label>
                    <input type="color" id="color-primary" name="colors[primary]" value="<?php echo esc_attr(get_option('integra_color_primary', '#c33329')); ?>" data-default-value="#c33329">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary', '#c33329')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-tint">Primary Tint</label>
                    <input type="color" id="color-primary-tint" name="colors[primary_tint]" value="<?php echo esc_attr(get_option('integra_color_primary_tint', '#cf5c54')); ?>" data-default-value="#cf5c54">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_tint', '#cf5c54')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-shade">Primary Shade</label>
                    <input type="color" id="color-primary-shade" name="colors[primary_shade]" value="<?php echo esc_attr(get_option('integra_color_primary_shade', '#9c2921')); ?>" data-default-value="#9c2921">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_shade', '#9c2921')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-contrast">Primary Contrast</label>
                    <input type="color" id="color-primary-contrast" name="colors[primary_contrast]" value="<?php echo esc_attr(get_option('integra_color_primary_contrast', '#f9ebea')); ?>" data-default-value="#f9ebea">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_contrast', '#f9ebea')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Secondary Colors -->
        <div class="integra-config-section">
            <h2>Secondary Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-secondary">Secondary</label>
                    <input type="color" id="color-secondary" name="colors[secondary]" value="<?php echo esc_attr(get_option('integra_color_secondary', '#222d3f')); ?>" data-default-value="#222d3f">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary', '#222d3f')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-tint">Secondary Tint</label>
                    <input type="color" id="color-secondary-tint" name="colors[secondary_tint]" value="<?php echo esc_attr(get_option('integra_color_secondary_tint', '#4e5765')); ?>" data-default-value="#4e5765">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_tint', '#4e5765')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-shade">Secondary Shade</label>
                    <input type="color" id="color-secondary-shade" name="colors[secondary_shade]" value="<?php echo esc_attr(get_option('integra_color_secondary_shade', '#1b2432')); ?>" data-default-value="#1b2432">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_shade', '#1b2432')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-contrast">Secondary Contrast</label>
                    <input type="color" id="color-secondary-contrast" name="colors[secondary_contrast]" value="<?php echo esc_attr(get_option('integra_color_secondary_contrast', '#e9eaec')); ?>" data-default-value="#e9eaec">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_contrast', '#e9eaec')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Status Colors -->
        <div class="integra-config-section">
            <h2>Status Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-danger">Danger</label>
                    <input type="color" id="color-danger" name="colors[danger]" value="<?php echo esc_attr(get_option('integra_color_danger', '#b91c1c')); ?>" data-default-value="#b91c1c">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_danger', '#b91c1c')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-warning">Warning</label>
                    <input type="color" id="color-warning" name="colors[warning]" value="<?php echo esc_attr(get_option('integra_color_warning', '#ffb703')); ?>" data-default-value="#ffb703">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_warning', '#ffb703')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-success">Success</label>
                    <input type="color" id="color-success" name="colors[success]" value="<?php echo esc_attr(get_option('integra_color_success', '#4ca155')); ?>" data-default-value="#4ca155">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_success', '#4ca155')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-info">Info</label>
                    <input type="color" id="color-info" name="colors[info]" value="<?php echo esc_attr(get_option('integra_color_info', '#0369a1')); ?>" data-default-value="#0369a1">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_info', '#0369a1')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Primary Color Variants -->
        <div class="integra-config-section">
            <h2>Primary Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-primary-50">Primary-50</label>
                    <input type="color" id="color-primary-50" name="colors[primary_50]" value="<?php echo esc_attr(get_option('integra_color_primary_50', '#fdebed')); ?>" data-default-value="#fdebed">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_50', '#fdebed')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-100">Primary-100</label>
                    <input type="color" id="color-primary-100" name="colors[primary_100]" value="<?php echo esc_attr(get_option('integra_color_primary_100', '#fad6d9')); ?>" data-default-value="#fad6d9">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_100', '#fad6d9')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-200">Primary-200</label>
                    <input type="color" id="color-primary-200" name="colors[primary_200]" value="<?php echo esc_attr(get_option('integra_color_primary_200', '#f3c2c4')); ?>" data-default-value="#f3c2c4">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_200', '#f3c2c4')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-300">Primary-300</label>
                    <input type="color" id="color-primary-300" name="colors[primary_300]" value="<?php echo esc_attr(get_option('integra_color_primary_300', '#ecadae')); ?>" data-default-value="#ecadae">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_300', '#ecadae')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-400">Primary-400</label>
                    <input type="color" id="color-primary-400" name="colors[primary_400]" value="<?php echo esc_attr(get_option('integra_color_primary_400', '#e59997')); ?>" data-default-value="#e59997">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_400', '#e59997')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-500">Primary-500</label>
                    <input type="color" id="color-primary-500" name="colors[primary_500]" value="<?php echo esc_attr(get_option('integra_color_primary_500', '#c33329')); ?>" data-default-value="#c33329">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_500', '#c33329')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-600">Primary-600</label>
                    <input type="color" id="color-primary-600" name="colors[primary_600]" value="<?php echo esc_attr(get_option('integra_color_primary_600', '#af2d24')); ?>" data-default-value="#af2d24">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_600', '#af2d24')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-700">Primary-700</label>
                    <input type="color" id="color-primary-700" name="colors[primary_700]" value="<?php echo esc_attr(get_option('integra_color_primary_700', '#9a2820')); ?>" data-default-value="#9a2820">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_700', '#9a2820')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-800">Primary-800</label>
                    <input type="color" id="color-primary-800" name="colors[primary_800]" value="<?php echo esc_attr(get_option('integra_color_primary_800', '#711d17')); ?>" data-default-value="#711d17">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_800', '#711d17')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-900">Primary-900</label>
                    <input type="color" id="color-primary-900" name="colors[primary_900]" value="<?php echo esc_attr(get_option('integra_color_primary_900', '#47110e')); ?>" data-default-value="#47110e">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_900', '#47110e')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-primary-950">Primary-950</label>
                    <input type="color" id="color-primary-950" name="colors[primary_950]" value="<?php echo esc_attr(get_option('integra_color_primary_950', '#1e0705')); ?>" data-default-value="#1e0705">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_primary_950', '#1e0705')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Secondary Color Variants -->
        <div class="integra-config-section">
            <h2>Secondary Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-secondary-50">Secondary-50</label>
                    <input type="color" id="color-secondary-50" name="colors[secondary_50]" value="<?php echo esc_attr(get_option('integra_color_secondary_50', '#E7E9ED')); ?>" data-default-value="#E7E9ED">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_50', '#E7E9ED')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-100">Secondary-100</label>
                    <input type="color" id="color-secondary-100" name="colors[secondary_100]" value="<?php echo esc_attr(get_option('integra_color_secondary_100', '#d3d5d9')); ?>" data-default-value="#d3d5d9">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_100', '#d3d5d9')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-200">Secondary-200</label>
                    <input type="color" id="color-secondary-200" name="colors[secondary_200]" value="<?php echo esc_attr(get_option('integra_color_secondary_200', '#a7abb2')); ?>" data-default-value="#a7abb2">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_200', '#a7abb2')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-300">Secondary-300</label>
                    <input type="color" id="color-secondary-300" name="colors[secondary_300]" value="<?php echo esc_attr(get_option('integra_color_secondary_300', '#7a818c')); ?>" data-default-value="#7a818c">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_300', '#7a818c')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-400">Secondary-400</label>
                    <input type="color" id="color-secondary-400" name="colors[secondary_400]" value="<?php echo esc_attr(get_option('integra_color_secondary_400', '#454b57')); ?>" data-default-value="#454b57">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_400', '#454b57')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-500">Secondary-500</label>
                    <input type="color" id="color-secondary-500" name="colors[secondary_500]" value="<?php echo esc_attr(get_option('integra_color_secondary_500', '#222D3F')); ?>" data-default-value="#222D3F">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_500', '#222D3F')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-600">Secondary-600</label>
                    <input type="color" id="color-secondary-600" name="colors[secondary_600]" value="<?php echo esc_attr(get_option('integra_color_secondary_600', '#1f2939')); ?>" data-default-value="#1f2939">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_600', '#1f2939')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-700">Secondary-700</label>
                    <input type="color" id="color-secondary-700" name="colors[secondary_700]" value="<?php echo esc_attr(get_option('integra_color_secondary_700', '#1b2432')); ?>" data-default-value="#1b2432">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_700', '#1b2432')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-800">Secondary-800</label>
                    <input type="color" id="color-secondary-800" name="colors[secondary_800]" value="<?php echo esc_attr(get_option('integra_color_secondary_800', '#181f2c')); ?>" data-default-value="#181f2c">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_800', '#181f2c')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-900">Secondary-900</label>
                    <input type="color" id="color-secondary-900" name="colors[secondary_900]" value="<?php echo esc_attr(get_option('integra_color_secondary_900', '#141b26')); ?>" data-default-value="#141b26">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_900', '#141b26')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-secondary-950">Secondary-950</label>
                    <input type="color" id="color-secondary-950" name="colors[secondary_950]" value="<?php echo esc_attr(get_option('integra_color_secondary_950', '#111720')); ?>" data-default-value="#111720">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_secondary_950', '#111720')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Status Color Variants -->
        <div class="integra-config-section">
            <h2>Danger Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-danger-tint">Danger Tint</label>
                    <input type="color" id="color-danger-tint" name="colors[danger_tint]" value="<?php echo esc_attr(get_option('integra_color_danger_tint', '#c74949')); ?>" data-default-value="#c74949">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_danger_tint', '#c74949')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-danger-shade">Danger Shade</label>
                    <input type="color" id="color-danger-shade" name="colors[danger_shade]" value="<?php echo esc_attr(get_option('integra_color_danger_shade', '#941616')); ?>" data-default-value="#941616">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_danger_shade', '#941616')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-danger-contrast">Danger Contrast</label>
                    <input type="color" id="color-danger-contrast" name="colors[danger_contrast]" value="<?php echo esc_attr(get_option('integra_color_danger_contrast', '#f8e8e8')); ?>" data-default-value="#f8e8e8">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_danger_contrast', '#f8e8e8')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <div class="integra-config-section">
            <h2>Warning Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-warning-tint">Warning Tint</label>
                    <input type="color" id="color-warning-tint" name="colors[warning_tint]" value="<?php echo esc_attr(get_option('integra_color_warning_tint', '#ffc535')); ?>" data-default-value="#ffc535">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_warning_tint', '#ffc535')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-warning-shade">Warning Shade</label>
                    <input type="color" id="color-warning-shade" name="colors[warning_shade]" value="<?php echo esc_attr(get_option('integra_color_warning_shade', '#cc9202')); ?>" data-default-value="#cc9202">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_warning_shade', '#cc9202')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-warning-contrast">Warning Contrast</label>
                    <input type="color" id="color-warning-contrast" name="colors[warning_contrast]" value="<?php echo esc_attr(get_option('integra_color_warning_contrast', '#fff8e6')); ?>" data-default-value="#fff8e6">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_warning_contrast', '#fff8e6')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <div class="integra-config-section">
            <h2>Success Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-success-tint">Success Tint</label>
                    <input type="color" id="color-success-tint" name="colors[success_tint]" value="<?php echo esc_attr(get_option('integra_color_success_tint', '#70b477')); ?>" data-default-value="#70b477">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_success_tint', '#70b477')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-success-shade">Success Shade</label>
                    <input type="color" id="color-success-shade" name="colors[success_shade]" value="<?php echo esc_attr(get_option('integra_color_success_shade', '#3d8144')); ?>" data-default-value="#3d8144">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_success_shade', '#3d8144')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-success-contrast">Success Contrast</label>
                    <input type="color" id="color-success-contrast" name="colors[success_contrast]" value="<?php echo esc_attr(get_option('integra_color_success_contrast', '#edf6ee')); ?>" data-default-value="#edf6ee">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_success_contrast', '#edf6ee')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <div class="integra-config-section">
            <h2>Info Color Variants</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-info-tint">Info Tint</label>
                    <input type="color" id="color-info-tint" name="colors[info_tint]" value="<?php echo esc_attr(get_option('integra_color_info_tint', '#3587b4')); ?>" data-default-value="#3587b4">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_info_tint', '#3587b4')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-info-shade">Info Shade</label>
                    <input type="color" id="color-info-shade" name="colors[info_shade]" value="<?php echo esc_attr(get_option('integra_color_info_shade', '#025481')); ?>" data-default-value="#025481">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_info_shade', '#025481')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-info-contrast">Info Contrast</label>
                    <input type="color" id="color-info-contrast" name="colors[info_contrast]" value="<?php echo esc_attr(get_option('integra_color_info_contrast', '#e6f0f6')); ?>" data-default-value="#e6f0f6">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_info_contrast', '#e6f0f6')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Light Colors -->
        <div class="integra-config-section">
            <h2>Light Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-light-50">Light-50</label>
                    <input type="color" id="color-light-50" name="colors[light_50]" value="<?php echo esc_attr(get_option('integra_color_light_50', '#fdfdfd')); ?>" data-default-value="#fdfdfd">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_50', '#fdfdfd')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-100">Light-100</label>
                    <input type="color" id="color-light-100" name="colors[light_100]" value="<?php echo esc_attr(get_option('integra_color_light_100', '#fafafa')); ?>" data-default-value="#fafafa">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_100', '#fafafa')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-200">Light-200</label>
                    <input type="color" id="color-light-200" name="colors[light_200]" value="<?php echo esc_attr(get_option('integra_color_light_200', '#f5f5f5')); ?>" data-default-value="#f5f5f5">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_200', '#f5f5f5')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-300">Light-300</label>
                    <input type="color" id="color-light-300" name="colors[light_300]" value="<?php echo esc_attr(get_option('integra_color_light_300', '#ebebeb')); ?>" data-default-value="#ebebeb">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_300', '#ebebeb')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-400">Light-400</label>
                    <input type="color" id="color-light-400" name="colors[light_400]" value="<?php echo esc_attr(get_option('integra_color_light_400', '#e0e0e0')); ?>" data-default-value="#e0e0e0">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_400', '#e0e0e0')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-500">Light-500</label>
                    <input type="color" id="color-light-500" name="colors[light_500]" value="<?php echo esc_attr(get_option('integra_color_light_500', '#d6d6d6')); ?>" data-default-value="#d6d6d6">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_500', '#d6d6d6')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-600">Light-600</label>
                    <input type="color" id="color-light-600" name="colors[light_600]" value="<?php echo esc_attr(get_option('integra_color_light_600', '#c2c2c2')); ?>" data-default-value="#c2c2c2">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_600', '#c2c2c2')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-700">Light-700</label>
                    <input type="color" id="color-light-700" name="colors[light_700]" value="<?php echo esc_attr(get_option('integra_color_light_700', '#b0b0b0')); ?>" data-default-value="#b0b0b0">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_700', '#b0b0b0')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-800">Light-800</label>
                    <input type="color" id="color-light-800" name="colors[light_800]" value="<?php echo esc_attr(get_option('integra_color_light_800', '#a0a0a0')); ?>" data-default-value="#a0a0a0">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_800', '#a0a0a0')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-900">Light-900</label>
                    <input type="color" id="color-light-900" name="colors[light_900]" value="<?php echo esc_attr(get_option('integra_color_light_900', '#8f8f8f')); ?>" data-default-value="#8f8f8f">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_900', '#8f8f8f')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-light-950">Light-950</label>
                    <input type="color" id="color-light-950" name="colors[light_950]" value="<?php echo esc_attr(get_option('integra_color_light_950', '#858585')); ?>" data-default-value="#858585">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_light_950', '#858585')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Dark Colors -->
        <div class="integra-config-section">
            <h2>Dark Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-dark-50">Dark-50</label>
                    <input type="color" id="color-dark-50" name="colors[dark_50]" value="<?php echo esc_attr(get_option('integra_color_dark_50', '#7a7a7a')); ?>" data-default-value="#7a7a7a">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_50', '#7a7a7a')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-100">Dark-100</label>
                    <input type="color" id="color-dark-100" name="colors[dark_100]" value="<?php echo esc_attr(get_option('integra_color_dark_100', '#6f6f6f')); ?>" data-default-value="#6f6f6f">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_100', '#6f6f6f')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-200">Dark-200</label>
                    <input type="color" id="color-dark-200" name="colors[dark_200]" value="<?php echo esc_attr(get_option('integra_color_dark_200', '#606060')); ?>" data-default-value="#606060">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_200', '#606060')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-300">Dark-300</label>
                    <input type="color" id="color-dark-300" name="colors[dark_300]" value="<?php echo esc_attr(get_option('integra_color_dark_300', '#555555')); ?>" data-default-value="#555555">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_300', '#555555')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-400">Dark-400</label>
                    <input type="color" id="color-dark-400" name="colors[dark_400]" value="<?php echo esc_attr(get_option('integra_color_dark_400', '#494949')); ?>" data-default-value="#494949">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_400', '#494949')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-500">Dark-500</label>
                    <input type="color" id="color-dark-500" name="colors[dark_500]" value="<?php echo esc_attr(get_option('integra_color_dark_500', '#3d3d3d')); ?>" data-default-value="#3d3d3d">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_500', '#3d3d3d')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-600">Dark-600</label>
                    <input type="color" id="color-dark-600" name="colors[dark_600]" value="<?php echo esc_attr(get_option('integra_color_dark_600', '#323232')); ?>" data-default-value="#323232">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_600', '#323232')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-700">Dark-700</label>
                    <input type="color" id="color-dark-700" name="colors[dark_700]" value="<?php echo esc_attr(get_option('integra_color_dark_700', '#292929')); ?>" data-default-value="#292929">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_700', '#292929')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-800">Dark-800</label>
                    <input type="color" id="color-dark-800" name="colors[dark_800]" value="<?php echo esc_attr(get_option('integra_color_dark_800', '#1f1f1f')); ?>" data-default-value="#1f1f1f">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_800', '#1f1f1f')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-900">Dark-900</label>
                    <input type="color" id="color-dark-900" name="colors[dark_900]" value="<?php echo esc_attr(get_option('integra_color_dark_900', '#141414')); ?>" data-default-value="#141414">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_900', '#141414')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-dark-950">Dark-950</label>
                    <input type="color" id="color-dark-950" name="colors[dark_950]" value="<?php echo esc_attr(get_option('integra_color_dark_950', '#0a0a0a')); ?>" data-default-value="#0a0a0a">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_dark_950', '#0a0a0a')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <!-- Base Colors -->
        <div class="integra-config-section">
            <h2>Base Colors</h2>
            <div class="integra-config-grid">
                <div class="integra-config-field">
                    <label for="color-black">Black</label>
                    <input type="color" id="color-black" name="colors[black]" value="<?php echo esc_attr(get_option('integra_color_black', '#1e1e1e')); ?>" data-default-value="#1e1e1e">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_black', '#1e1e1e')); ?>" class="color-hex" readonly>
                </div>
                <div class="integra-config-field">
                    <label for="color-white">White</label>
                    <input type="color" id="color-white" name="colors[white]" value="<?php echo esc_attr(get_option('integra_color_white', '#ffffff')); ?>" data-default-value="#ffffff">
                    <input type="text" value="<?php echo esc_attr(get_option('integra_color_white', '#ffffff')); ?>" class="color-hex" readonly>
                </div>
            </div>
        </div>

        <div class="integra-form-actions">
            <button type="submit" name="save_colors" class="button button-primary">Save Colors</button>
            <button type="button" class="button integra-reset-button" data-confirm-message="Are you sure you want to reset all colors to defaults? This action cannot be undone.">Reset to Defaults</button>
        </div>
    </form>
</div>  