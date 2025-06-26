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

    // Eyebrow Text Color (Primary, Secondar, Light, Dark);
    $this->add_control(
        'eyebrow_text_color',
        [
        'label' => __('Eyebrow Color', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'Primary',
        'options' => [
            
            // Brand Colors
            'Primary' => 'Primary',
            'Secondary' => 'Secondary',
            
            // State Colors
            'Danger' => 'Danger',
            'Warning' => 'Warning',
            'Success' => 'Success',
            'Info' => 'Info',
            
            // Base Colors
            'Black' => 'Black',
            'White' => 'White',
    
          ],
        'condition' => [
            'eyebrow_text!' => '',
        ],
        ]
    );

    // Heading Class (Display 1, Display 2, Default);
    $this->add_control(
        'heading_class',
        [
        'label' => __('Heading Class', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'default',
        'options' => [
            'default' => __('Default', 'integra-elements'),
            'display-1' => __('Display 1', 'integra-elements'),
            'display-2' => __('Display 2', 'integra-elements'),
        ],
        ]
    );

    // Paragraph (WYSIWYG);
    $this->add_control(
        'contents',
        [
        'label' => __('Contents', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'integra-elements'),
        'label_block' => true,
        ]
    );

    $this->end_controls_section();
?>
