/**
 * Integra Elements - Elementor Widgets Scripts
 */

(function ($) {
  'use strict';

  // Make sure we're in the context of Elementor
  $(window).on('elementor/frontend/init', function () {

    // Access the elementorFrontend variable correctly
    var elementorFrontend = window.elementorFrontend;

    var IntegraWidgets = {
      init: function () {
        this.initWidgets();
      },

      initWidgets: function () {
        // Initialize widget-specific functionality here

        // Register Feature Box widget handler
        if (typeof elementorFrontend.hooks !== 'undefined') {
          elementorFrontend.hooks.addAction('frontend/element_ready/integra_feature_box.default', this.featureBoxWidget);

          // Example:
          // elementorFrontend.hooks.addAction('frontend/element_ready/integra_example.default', this.exampleWidget);
        }
      },

      // Feature Box widget handler
      featureBoxWidget: function ($scope) {
        var $widget = $scope.find('.integra-feature-box');

        // Add hover animations or other interactive features
        if ($widget.length) {
          $widget.on('mouseenter', function () {
            $(this).addClass('is-hovered');
          }).on('mouseleave', function () {
            $(this).removeClass('is-hovered');
          });
        }
      },

      // Example widget handler
      // exampleWidget: function($scope) {
      //     var $widget = $scope.find('.integra-example-widget');
      //     // Widget-specific JavaScript
      // }
    };

    // Initialize when Elementor frontend is initialized
    setTimeout(function () {
      IntegraWidgets.init();
    }, 100);
  });

})(jQuery);
