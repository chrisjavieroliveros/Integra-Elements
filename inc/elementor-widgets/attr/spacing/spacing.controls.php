<?php 

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
          'size' => 80,
        ],
        'tablet_default' => [
          'unit' => 'px',
          'size' => 64,
        ],
        'mobile_default' => [
          'unit' => 'px',
          'size' => 40,
        ],
        'selectors' => [
          '{{WRAPPER}} .container' => 'padding-top: {{SIZE}}{{UNIT}};',
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
          'size' => 80,
        ],
        'tablet_default' => [
          'unit' => 'px',
          'size' => 64,
        ],
        'mobile_default' => [
          'unit' => 'px',
          'size' => 40,
        ],
        'selectors' => [
          '{{WRAPPER}} .container' => 'padding-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();

?>