<?php

// Default height configuration
$height_defaults = [
    'selector' => '.section',
    'defaults' => [
        'desktop' => 50,
        'tablet' => 60,
        'mobile' => 70,
    ],
    'range' => [
        'min' => 0,
        'max' => 100,
    ],
    'unit' => 'svh'
];

// Merge with widget-specific config if provided
$height_config = isset($height_config) ? array_merge($height_defaults, $height_config) : $height_defaults;

// Height Controls (Auto, Full, Marketing);
$this->add_responsive_control(
    'height',
    [
        'label' => __('Height', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [$height_config['unit']],
        'range' => [
            $height_config['unit'] => [
                'min' => $height_config['range']['min'],
                'max' => $height_config['range']['max'],
                'step' => 1,
            ],
        ],
        'default' => [
            'unit' => $height_config['unit'],
            'size' => $height_config['defaults']['desktop'],
        ],
        'tablet_default' => [
            'unit' => $height_config['unit'],
            'size' => $height_config['defaults']['tablet'],
        ],
        'mobile_default' => [
            'unit' => $height_config['unit'],
            'size' => $height_config['defaults']['mobile'],
        ],
        'selectors' => [
            '{{WRAPPER}} ' . $height_config['selector'] => 'min-height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

?>