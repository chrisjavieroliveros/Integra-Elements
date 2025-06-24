<?php

    // Add "Theme" control;
    $this->add_control(
        'theme',
        [
            'label' => 'Theme',
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'light' => 'Light',
                'dark' => 'Dark',
            ],
            'default' => 'dark',
        ]
    );

?>