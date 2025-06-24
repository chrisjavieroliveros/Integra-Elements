<?php

    // Add "Container" control; Select (Default, Narrow, Wide, Full);
    $this->add_control(
        'container',
        [
            'label' => __('Container', 'integra-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'narrow' => __('Narrow', 'integra-elements'),
                'default' => __('Default', 'integra-elements'),
                'wide' => __('Wide', 'integra-elements'),
                'full' => __('Full', 'integra-elements'),
            ],
            'default' => 'default',
        ]
    );

?>