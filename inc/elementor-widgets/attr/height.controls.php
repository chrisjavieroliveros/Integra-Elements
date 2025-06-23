<?php

// Height Controls (Auto, Full, Marketing);
$this->add_control(
    'height',
    [
        'label' => __('Height', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'auto' => __('Auto', 'integra-elements'),
            'full' => __('Full', 'integra-elements'),
            'marketing' => __('Marketing', 'integra-elements')
        ],
        'default' => 'auto',
    ]
);

?>