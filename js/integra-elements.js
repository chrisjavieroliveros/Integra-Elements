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
        console.log('Integra Elements Theme - Ready');

        /* Segment UI */
        $('.segment-ui-item').on('click', function (e) {
            e.preventDefault();

            console.log('Segment UI Item Clicked');

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

    });

})(jQuery); 