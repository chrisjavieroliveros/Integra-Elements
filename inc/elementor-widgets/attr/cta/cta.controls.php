<?php

  // Add "CTA" Section;
  $this->start_controls_section(
    'cta_section',
    [
      'label' => __( 'CTA (Global)', 'your-text-domain' ),
      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
  );

  // Add "Add Cta" Control;
  $this->add_control(
    'add_cta',
    [
      'label' => __( 'Add CTA', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'Yes', 'your-text-domain' ),
      'label_off' => __( 'No', 'your-text-domain' ),
      'return_value' => 'yes',
      'default' => 'yes',
    ]
  );


  // CTA Size;
  $this->add_control(
    'cta_size',
    [
      'label' => __( 'CTA Size', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'md',
      'options' => [
        'sm' => __( 'Small', 'your-text-domain' ),
        'md' => __( 'Medium', 'your-text-domain' ),
        'lg' => __( 'Large', 'your-text-domain' ),
      ],
    ]
  );


  // Buttons (Repeater);
  $repeater = new \Elementor\Repeater();

  // Add "Button" Control;
  $repeater->add_control(
    'button',
    [
      'label' => __( 'Text', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'default' => 'Button',
    ]
  );

  // Add "Style" Control;
  $repeater->add_control(
    'style',
    [
      'label' => __( 'Style', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'flat',
      'options' => [
        'flat' => __( 'Flat', 'your-text-domain' ),
        'outline' => __( 'Outline', 'your-text-domain' ),
      ],
    ]
  );

  // Add "Color" Control;
  $repeater->add_control(
    'color',
    [
      'label' => __( 'Color', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'primary',
      'options' => [
        // Brand Colors
        'primary' => __( 'Primary', 'your-text-domain' ),
        'secondary' => __( 'Secondary', 'your-text-domain' ),
        'separator_1' => __( '────', 'your-text-domain' ),

        // Base Colors
        'light' => __( 'Light', 'your-text-domain' ),
        'dark' => __( 'Dark', 'your-text-domain' ),
        'black' => __( 'Black', 'your-text-domain' ),
        'white' => __( 'White', 'your-text-domain' ),        
        'separator_2' => __( '────', 'your-text-domain' ),
        
        // State Colors
        'danger' => __( 'Danger', 'your-text-domain' ),
        'warning' => __( 'Warning', 'your-text-domain' ),
        'success' => __( 'Success', 'your-text-domain' ),
        'info' => __( 'Info', 'your-text-domain' ),
      ],
    ]
  );

  // Add "Link" Control;
  $repeater->add_control(
    'link',
    [
      'label' => __( 'Link', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::URL,
      'placeholder' => 'https://your-link.com',
      'default' => [
        'url' => '#',
      ],
    ]
  );


  // Add "Icon" Control;
  $repeater->add_control(
    'cta_icon',
    [
      'label' => __( 'Icon', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::ICONS,
      'default' => [
          'value' => '',
          'library' => '',
      ],
    ]
  );

    // Add "Icon Position" Control;
    $repeater->add_control(
      'icon_position',
      [
        'label' => __( 'Icon Position', 'your-text-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'before' => __( 'Before', 'your-text-domain' ),
          'after' => __( 'After', 'your-text-domain' ),
        ],
        'default' => 'before',
      ]
    );

  // Repeater;
  $this->add_control(
    'cta_buttons',
    [
      'label' => __( 'Buttons', 'your-text-domain' ),
      'type' => \Elementor\Controls_Manager::REPEATER,
      'fields' => $repeater->get_controls(),
      'default' => [
        [
          'button' => 'Button 1',
          'color' => 'primary',
          'link' => [
            'url' => '#',
          ],
          'icon' => 'fa fa-angle-right',
          'icon_position' => 'before',
          'size' => 'md',
        ],
        [
          'button' => 'Button 2',
          'color' => 'secondary',
          'link' => [
            'url' => '#',
          ],
          'icon' => 'fa fa-angle-right',
          'icon_position' => 'after',
          'size' => 'md',
        ],
      ],
      'title_field' => '{{{ button }}}',
      'condition' => [
        'add_cta' => 'yes',
      ],
    ]
  );

  // end of CTA Section;
  $this->end_controls_section();


?>