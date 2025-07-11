<?php

    $this->start_controls_section(
    'content_section',
    [
        'label' => 'Content (Global)',
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
    );
    

        // Display Icon Popover Toggle
        $this->add_control(
            'display_icon_popover',
            [
                'label' => __('Display Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('Default', 'integra-elements'),
                'label_on' => __('Custom', 'integra-elements'),
                'return_value' => 'yes',
            ]
        );
    
        $this->start_popover();

        // Show Display Icon;
        $this->add_control(
            'display_icon_show',
            [
                'label' => __('Show Display Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
    
        // Display Icon
        $this->add_control(
            'display_icon',
            [
                'label' => __('Display Icon', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );
    
        // Display Icon Size
        $this->add_control(
            'display_icon_size',
            [
                'label' => __('Icon Size', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 8,
                        'max' => 64,
                        'step' => 4,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'condition' => [
                    'display_icon[value]!' => '',
                ],
            ]
        );
    
        // Display Icon Color
        $this->add_control(
            'display_icon_color',
            [
                'label' => __('Icon Color', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Primary',
                'options' => [
                    
                    // Brand Colors
                    'Primary' => 'Primary',
                    'Secondary' => 'Secondary',
                    'Separator_0' => '────',
    
                    // Base Colors
                    'Light-500' => 'Light',
                    'Dark-500' => 'Dark',
                    'Black' => 'Black',
                    'White' => 'White',
                    'Separator_1' => '────',
                    
                    // State Colors
                    'Danger' => 'Danger',
                    'Warning' => 'Warning',
                    'Success' => 'Success',
                    'Info' => 'Info',
                ],
                'condition' => [
                    'display_icon[value]!' => '',
                ],
            ]
        );
    
        // Display Base Icon Color Opacity
        $this->add_control(
            'display_icon_opacity',
            [
                'label' => __('Base Color Opacity', 'integra-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
            ]
        );
    
        $this->end_popover();

    // Eyebrow Text Popover Toggle
    $this->add_control(
        'eyebrow_text_popover',
        [
            'label' => __('Eyebrow Text', 'integra-elements'),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => __('Default', 'integra-elements'),
            'label_on' => __('Custom', 'integra-elements'),
            'return_value' => 'yes',
        ]
    );

    $this->start_popover();

    // Show Eyebrow Text
    $this->add_control(
        'eyebrow_text_show',
        [
            'label' => __('Show Eyebrow Text', 'integra-elements'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]
    );

    // Eyebrow text 
    $this->add_control(
        'eyebrow_text',
        [
        'label' => __('Eyebrow Text', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('EYEBROW TEXT', 'integra-elements'),        
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
            'Separator_0' => '────',

            // Base Colors
            'Light-500' => 'Light',
            'Dark-500' => 'Dark',
            'Black' => 'Black',
            'White' => 'White',
            'Separator_1' => '────',
            
            // State Colors
            'Danger' => 'Danger',
            'Warning' => 'Warning',
            'Success' => 'Success',
            'Info' => 'Info',
            
    
          ],        
        ]
    );

    $this->end_popover();


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

    // List Style (Default, Icons);
    $this->add_control(
        'list_style',
        [
        'label' => __('List Style', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'default',
        'options' => [
            'default' => __('Default', 'integra-elements'),
            'icon' => __('Icon', 'integra-elements'),
        ],
        ]
    );

    // List Style Icon;
    $this->add_control(
        'list_style_icon',
        [
        'label' => __('List Style Icon', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'fas fa-star',
            'library' => 'fa-solid',
        ],
        'condition' => [
            'list_style' => 'icon',
        ],
        ]
    );

    // List Style Icon Color
    $this->add_control(
        'list_style_icon_color',
        [
            'label' => __('List Icon Color', 'integra-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Primary',
            'options' => [
                
                // Brand Colors
                'Primary' => 'Primary',
                'Secondary' => 'Secondary',
                'Separator_0' => '────',

                // Base Colors
                'Light-500' => 'Light',
                'Dark-500' => 'Dark',
                'Black' => 'Black',
                'White' => 'White',
                'Separator_1' => '────',
                
                // State Colors
                'Danger' => 'Danger',
                'Warning' => 'Warning',
                'Success' => 'Success',
                'Info' => 'Info',
            ],
            'condition' => [
                'list_style' => 'icon',
            ],
        ]
    );


    // Paragraph (WYSIWYG);
    $this->add_control(
        'contents',
        [
        'label' => __('Contents', 'integra-elements'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __('<h1>Design That Speaks Volumes</h1><p><strong>Crafting seamless digital experiences that captivate, convert, and inspire.</strong></p><p>From strategy to execution, we blend creativity with code to build high-performing websites and apps tailored to your goals. Let’s bring your vision to life with clarity and purpose.</p>', 'integra-elements'),
        'label_block' => true,
        ]
    );

    $this->end_controls_section();
?>
