/**
 * Integra Elements Theme JavaScript
 * 
 * @package Integra_Elements
 * @version 1.0.2
 * @no-minify
 */

// Defensive wrapper to handle caching plugin issues
(function () {
    'use strict';

    // Check if jQuery is available, with fallback loading
    function ensureJQuery(callback) {
        if (typeof jQuery !== 'undefined' && jQuery) {
            callback(jQuery);
        } else if (typeof $ !== 'undefined' && $) {
            callback($);
        } else {
            // Fallback: wait a bit and try again (for async loading scenarios)
            var attempts = 0;
            var maxAttempts = 10;
            var interval = setInterval(function () {
                attempts++;
                if (typeof jQuery !== 'undefined' && jQuery) {
                    clearInterval(interval);
                    callback(jQuery);
                } else if (attempts >= maxAttempts) {
                    clearInterval(interval);
                    console.warn('Integra Elements: jQuery not available after multiple attempts');
                }
            }, 100);
        }
    }

    // Main initialization function
    function initIntegraElements($) {
        // Ensure DOM is ready with multiple fallbacks
        function domReady(fn) {
            if (document.readyState === 'loading') {
                if ($ && $.fn) {
                    $(document).ready(fn);
                } else {
                    document.addEventListener('DOMContentLoaded', fn);
                }
            } else {
                fn();
            }
        }

        domReady(function () {
            try {
                console.log('Integra Elements Theme - Loaded v1.0.2');

                /* Segment UI */
                var $segmentItems = $('.segment-ui-item');
                if ($segmentItems.length > 0) {
                    $segmentItems.on('click', function (e) {
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
                }

                /* Expandable Cards */
                var $expandableCards = $('.expandable-card .card-trigger');
                if ($expandableCards.length > 0) {
                    $expandableCards.on('click', function (e) {
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
                }

                /* Accordion Toggler */
                var $accordionHeaders = $('.accordion-item-header');
                if ($accordionHeaders.length > 0) {
                    $accordionHeaders.on('click', function (e) {
                        e.preventDefault();

                        const $accordionItem = $(this).closest('.accordion-item');

                        // Toggle active class - CSS transitions handle the animation
                        $accordionItem.toggleClass('accordion-item--active');
                    });
                }

                /* Vertical Panel */
                function setVerticalPanelMinHeight() {
                    const $view = $('.vertical-panel-view');
                    const $items = $('.vertical-panel-item');

                    if ($view.length === 0 || $items.length === 0) return;

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
                var $verticalPanels = $('.vertical-panel-view');
                if ($verticalPanels.length > 0) {
                    setTimeout(function () {
                        setVerticalPanelMinHeight();
                    }, 500);

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
                }

                /* Flip Cards */
                var $flipCards = $('.flip-card');
                if ($flipCards.length > 0) {
                    $flipCards.on('click', function (e) {
                        e.preventDefault();
                        $(this).toggleClass('active');
                    });
                }

                /* Reviews Scroller */
                var $reviewsSection = $('.reviews-section .swiper');
                if ($reviewsSection.length > 0 && typeof Swiper !== 'undefined') {
                    try {
                        const swiper = new Swiper('.reviews-section .swiper', {
                            cssMode: true,
                            loop: true,
                            navigation: {
                                nextEl: '.review-button-next',
                                prevEl: '.review-button-prev',
                            },
                        });
                    } catch (swiperError) {
                        console.warn('Integra Elements: Swiper initialization failed', swiperError);
                    }
                }

            } catch (error) {
                console.error('Integra Elements: Initialization error', error);
            }
        });
    }

    // Initialize with jQuery when available
    ensureJQuery(initIntegraElements);

})(); 