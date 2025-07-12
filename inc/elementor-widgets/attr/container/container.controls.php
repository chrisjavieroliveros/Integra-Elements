<?php

    // Add "Container" control; Range slider (320px to 1600px, steps of 8);
    $this->add_responsive_control(
        'container',
        [
            'label' => __('Container', 'integra-elements'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 320,
                    'max' => 1600,
                    'step' => 8,
                ],
                '%' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 10,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 1200,
            ],
            'selectors' => [
                '{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
            ]
        ]
    );

?>