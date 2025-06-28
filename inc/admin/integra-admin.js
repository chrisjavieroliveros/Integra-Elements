/**
 * Integra Elements Admin Page JavaScript - Basic Setup
 */

jQuery(document).ready(function ($) {

    // Get URL parameter
    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Update URL with page parameter
    function updateUrl(page) {
        const url = new URL(window.location);
        if (page && page !== 'welcome') {
            url.searchParams.set('tab', page);
        } else {
            url.searchParams.delete('tab');
        }
        window.history.replaceState({}, '', url);
    }

    // Show specific page
    function showPage(targetPage) {
        if (!targetPage) {
            targetPage = 'welcome';
        }

        // Update active link
        $('.integra-nav-link').removeClass('active');
        $('.integra-nav-link[data-page="' + targetPage + '"]').addClass('active');

        // Show target page
        $('.integra-page').removeClass('integra-page-active');
        $('#page-' + targetPage).addClass('integra-page-active');

        // Update URL
        updateUrl(targetPage);

        // Open the correct accordion section for this page
        const $activeLink = $('.integra-nav-link[data-page="' + targetPage + '"]');
        if ($activeLink.length) {
            const $accordion = $activeLink.closest('.integra-accordion-content');
            if ($accordion.length) {
                const accordionId = $accordion.attr('id');
                const $header = $('.integra-accordion-header[data-target="' + accordionId + '"]');
                if (!$header.hasClass('active')) {
                    $header.trigger('click');
                }
            }
        }
    }

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

        showPage(targetPage);
    });

    // Initialize page based on URL parameter or default
    const currentPage = getUrlParameter('tab');
    if (currentPage && $('#page-' + currentPage).length) {
        showPage(currentPage);
    } else {
        // Auto-open first accordion if no specific page is requested
        $('.integra-accordion-header').first().trigger('click');
        showPage('welcome');
    }

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