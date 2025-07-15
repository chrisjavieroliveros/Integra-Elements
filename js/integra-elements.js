/**
 * Integra Elements Theme JavaScript
 * 
 * @package Integra_Elements
 * @version 1.0.0
 */

(function ($) {
    'use strict';

    // Initialize when the DOM is fully loaded
    $(document).ready(function () {
        console.log('Integra Elements Theme - Loaded v1.0.2');

        /* Segment UI */
        $('.segment-ui-item').on('click', function (e) {
            e.preventDefault();

            // Remove active class from all items
            $('.segment-ui-item').removeClass('active');

            // Add active class to the clicked item
            $(this).addClass('active');

            // Show the previews
            $('.segment-ui-preview').removeClass('show');

            // Show the preview of the clicked item
            $('.segment-ui-preview').eq($(this).index()).addClass('show');

        });

        /* Expandable Cards */
        $('.expandable-card .card-trigger').on('click', function (e) {

            // Prevent default link behavior
            e.preventDefault();

            // Toggle expanded state
            $(this).closest('.expandable-card').toggleClass('expanded');

            // Update the text of the card trigger (preserve icons)
            if ($(this).closest('.expandable-card').hasClass('expanded')) {
                // Find and update only text nodes or use a text wrapper
                const $textSpan = $(this).find('.card-trigger-text');
                if ($textSpan.length) {
                    $textSpan.text('Show Less');
                } else {
                    // If no text wrapper, preserve HTML and update text
                    const html = $(this).html();
                    const newHtml = html.replace(/Learn More|Show Less/, 'Show Less');
                    $(this).html(newHtml);
                }
            } else {
                // Find and update only text nodes or use a text wrapper  
                const $textSpan = $(this).find('.card-trigger-text');
                if ($textSpan.length) {
                    $textSpan.text('Learn More');
                } else {
                    // If no text wrapper, preserve HTML and update text
                    const html = $(this).html();
                    const newHtml = html.replace(/Learn More|Show Less/, 'Learn More');
                    $(this).html(newHtml);
                }
            }

        });

        /* Accordion Toggler */
        $('.accordion-item-header').on('click', function (e) {
            e.preventDefault();

            const $accordionItem = $(this).closest('.accordion-item');

            // Toggle active class - CSS transitions handle the animation
            $accordionItem.toggleClass('accordion-item--active');
        });

        /* Vertical Panel */
        function setVerticalPanelMinHeight() {
            const $view = $('.vertical-panel-view');
            const $items = $('.vertical-panel-item');
            let maxHeight = 0;
            let paddingTop = parseInt($view.css('padding-top'), 10) || 0;
            let paddingBottom = parseInt($view.css('padding-bottom'), 10) || 0;
            let totalPadding = paddingTop + paddingBottom;

            // Temporarily show all items to measure their height
            $items.each(function () {
                const $item = $(this);

                // Measure the height
                const itemHeight = $item.outerHeight();
                maxHeight = Math.max(maxHeight, itemHeight);

            });

            // Calculate final height including padding
            let calculatedHeight = maxHeight + totalPadding + 16;

            // Set min-height on the view container
            $view.css('min-height', calculatedHeight + 'px');
        }

        // Initialize vertical panel height on page load
        setTimeout(function () {
            setVerticalPanelMinHeight();
        }, 300);

        // Recalculate on window resize
        $(window).on('resize', function () {
            setVerticalPanelMinHeight();
        });

        $('.vertical-panel-tab').on('click', function (e) {
            e.preventDefault();

            // Remove active class from all items
            $('.vertical-panel-tab').removeClass('active');

            // Add active class to the clicked item
            $(this).addClass('active');

            // Show the preview of the clicked item
            $('.vertical-panel-item').removeClass('active');
            $('.vertical-panel-item').eq($(this).index()).addClass('active');

        });

    });

})(jQuery); 