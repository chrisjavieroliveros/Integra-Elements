/**
 * Integra Elements Admin Page JavaScript - Basic Setup
 */

jQuery(document).ready(function ($) {

    // Accordion functionality
    $('.integra-accordion-header').on('click', function (e) {
        e.preventDefault();

        const $header = $(this);
        const $content = $('#' + $header.data('target'));

        if ($header.hasClass('active')) {
            // Close current accordion
            $header.removeClass('active');
            $content.removeClass('active').hide();
        } else {
            // Close all accordions
            $('.integra-accordion-header').removeClass('active');
            $('.integra-accordion-content').removeClass('active').hide();

            // Open clicked accordion
            $header.addClass('active');
            $content.addClass('active').show();
        }
    });

    // Page navigation
    $('.integra-nav-link').on('click', function (e) {
        e.preventDefault();

        const $link = $(this);
        const targetPage = $link.data('page');

        // Update active link
        $('.integra-nav-link').removeClass('active');
        $link.addClass('active');

        // Show target page
        $('.integra-page').removeClass('integra-page-active');
        $('#page-' + targetPage).addClass('integra-page-active');
    });

    // Auto-open first accordion
    $('.integra-accordion-header').first().trigger('click');

    // Color picker synchronization
    $('input[type="color"]').on('change', function () {
        const colorValue = $(this).val();
        const hexInput = $(this).siblings('.color-hex');
        hexInput.val(colorValue);
    });



    // Global reset functionality for any page/section
    $(document).on('click', '.integra-reset-button', function () {
        var $button = $(this);
        var confirmMessage = $button.data('confirm-message') || 'Are you sure you want to reset all values to defaults? This action cannot be undone.';

        if (confirm(confirmMessage)) {
            // Find the parent container (page or section)
            var $integraPage = $button.closest('.integra-page');

            // Reset all elements with data-default-value within this container
            $integraPage.find('[data-default-value]').each(function () {
                var $element = $(this);
                var defaultValue = $element.data('default-value');
                $element.val(defaultValue).trigger('change');
            });
        }
    });

}); 