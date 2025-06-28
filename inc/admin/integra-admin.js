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

}); 