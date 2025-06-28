<?php

// Height Controls (Auto, Full, Marketing);
$this->add_responsive_control(
    'height',
    [
        'label' => __('Height', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['svh'],
        'range' => [
            'svh' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
        ],
        'default' => [
            'unit' => 'svh',
            'size' => 90,
        ],
        'tablet_default' => [
            'unit' => 'svh',
            'size' => 95,
        ],
        'mobile_default' => [
            'unit' => 'svh',
            'size' => 100,
        ],
        'selectors' => [
            '{{WRAPPER}} .hero' => 'min-height: {{SIZE}}{{UNIT}};',
        ],
    ]
);

?>