/**
 * Primary Navigation JavaScript
 *
 * Handles navigation functionality for the theme.
 * This file is intentionally kept minimal and can be customized as needed.
 *
 * @package WP-Integra-Elements
 */

(function ($) {
  'use strict';

  // Initialize when the DOM is fully loaded
  $(document).ready(function () {

    // Mobile menu toggle functionality
    const $mobileNavToggle = $('#mobile-nav-toggle');
    const $navMenuWrapper = $('.nav-menu-wrapper');

    $mobileNavToggle.on('click', function (e) {
      e.preventDefault();

      const expanded = $mobileNavToggle.attr('aria-expanded') === 'true';

      // Toggle expanded state
      $mobileNavToggle.attr('aria-expanded', !expanded);

      // Toggle menu visibility
      $navMenuWrapper.toggleClass('active');
    });

    // Close menu when clicking outside
    $(document).on('click', function (event) {
      if (!$(event.target).closest('#primary-navigation').length) {
        $navMenuWrapper.removeClass('active');
        $mobileNavToggle.attr('aria-expanded', 'false');
      }
    });

    // Prevent clicks inside navigation from closing the menu
    $navMenuWrapper.on('click', function (event) {
      event.stopPropagation();
    });

    // Add dropdown functionality for sub-menus if needed
    // This is a basic version - you can expand it later
    $('.menu-item-has-children > a').on('click', function (e) {
      if (window.innerWidth < 769) {
        e.preventDefault();
        $(this).next('.sub-menu').slideToggle();
        $(this).parent().toggleClass('sub-menu-active');
      }
    });

    // Handle window resize events
    $(window).on('resize', function () {
      if (window.innerWidth > 768) {
        $navMenuWrapper.removeClass('active');
        $('.sub-menu').removeAttr('style');
      }
    });

  });

})(jQuery);
