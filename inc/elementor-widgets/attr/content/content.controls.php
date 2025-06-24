<?php
    $this->start_controls_section(
    'content_section',
    [
        'label' => 'Content (Global)',
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
    );

    //   Eyebrow text 
    $this->add_control(
        'eyebrow_text',
        [
        'label' => __('Eyebrow Text', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Eyebrow Text', 'integra-elements'),
        ]
    );

    // Heading Type;
    $this->add_control(
        'heading_type',
        [
        'label' => __('Heading Type', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'h1' => __('H1', 'integra-elements'),
            'h2' => __('H2', 'integra-elements'),
            'h3' => __('H3', 'integra-elements'),
            'h4' => __('H4', 'integra-elements'),
            'h5' => __('H5', 'integra-elements'),
        ],
        'default' => 'h1',
        ]
    );

    // Heading Class (Default, Display, Display 2);
    $this->add_control(
        'heading_class',
        [
        'label' => __('Heading Class', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'display-1' => __('Display 1', 'integra-elements'),
            'display-2' => __('Display 2', 'integra-elements'),
            'default' => __('Default', 'integra-elements'),
        ],
        'default' => 'display-1',
        ]
    );

    // Heading;
    $this->add_control(
        'heading',
        [
        'label' => __('Heading', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('This is the Hero Title', 'integra-elements'),
        'label_block' => true,
        ]
    );

    // Subheading Type;
    $this->add_control(
        'subheading_type',
        [
        'label' => __('Subheading Type', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            'bold' => __('Bold', 'integra-elements'),
            'h2' => __('H2', 'integra-elements'),
            'h3' => __('H3', 'integra-elements'),
            'h4' => __('H4', 'integra-elements'),
            'h5' => __('H5', 'integra-elements'),
            'h6' => __('H6', 'integra-elements'),
        ],
        'default' => 'bold',
        ]
    );

    // Subheading;
    $this->add_control(
        'subheading',
        [
        'label' => __('Subheading', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('This is where the hero subheading goes', 'integra-elements'),
        'label_block' => true,
        ]
    );

    // Paragraph (WYSIWYG);
    $this->add_control(
        'paragraph',
        [
        'label' => __('Paragraph', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'integra-elements'),
        'label_block' => true,
        ]
    );

    $this->end_controls_section();
?>
