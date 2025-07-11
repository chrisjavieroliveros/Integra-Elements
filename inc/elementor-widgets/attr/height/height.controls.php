<?php

// Default height configuration
$height_defaults = [
    'selector' => '.section',
    'default' => 50, // Single default value that applies to all breakpoints initially
];

// Merge with widget-specific config if provided
$height_config = isset($height_config) ? array_merge($height_defaults, $height_config) : $height_defaults;

// Height Controls (Auto, Full, Marketing);
$this->add_responsive_control(
    'height',
    [
        'label' => __('Height', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['svh', 'px'],
        'range' => [
            'svh' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
            'px' => [
                'min' => 0,
                'max' => 2000,
                'step' => 10,
            ],
        ],
        'default' => [
            'unit' => 'svh',
            'size' => $height_config['default'],
        ],
        // Note: No tablet_default or mobile_default - they will inherit from desktop
        'selectors' => [
            '{{WRAPPER}} ' . $height_config['selector'] => 'min-height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

?>