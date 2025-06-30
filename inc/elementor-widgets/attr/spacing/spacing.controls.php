<?php 

  $spacing_config = [
    'selector' => '.container',
    'defaults_top' => [
      'desktop' => 80,
      'tablet' => 64,
      'mobile' => 40,
    ],
    'defaults_bottom' => [
      'desktop' => 80,
      'tablet' => 64,
      'mobile' => 40,
    ],
  ];

// Add New Section "Spacing" Section
    $this->start_controls_section(
      'section_spacing',
      [
        'label' => __( 'Spacing (Global)', 'text-domain' ),
      ]
    );

    // Add "Padding Top" control;
    $this->add_responsive_control(
      'padding_top',
      [
        'label' => __( 'Padding Top', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 240,
            'step' => 4,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_top']['desktop'],
        ],
        'tablet_default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_top']['tablet'],
        ],
        'mobile_default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_top']['mobile'],
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $spacing_config['selector'] => 'padding-top: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    // Add "Padding Bottom" control;
    $this->add_responsive_control(
      'padding_bottom',
      [
        'label' => __( 'Padding Bottom', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 240,
            'step' => 4,
          ],
        ],
        'default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_bottom']['desktop'],
        ],
        'tablet_default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_bottom']['tablet'],
        ],
        'mobile_default' => [
          'unit' => 'px',
          'size' => $spacing_config['defaults_bottom']['mobile'],
        ],
        'selectors' => [
          '{{WRAPPER}} ' . $spacing_config['selector'] => 'padding-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();

?>