<?php 

    // Add New Section "Spacing" Section
    $this->start_controls_section(
      'section_spacing',
      [
        'label' => __( 'Spacing (Global)', 'text-domain' ),
      ]
    );

    // Add "Padding Top" control;
    $this->add_control(
      'padding_top',
      [
        'label' => __( 'Padding Top', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'none' => 'none',
          'xs' => 'xs',
          'sm' => 'sm',
          'md' => 'md',
          'lg' => 'lg',
          'xl' => 'xl',
        ],
        'default' => 'md'
      ]
    );

    // Add "Padding Bottom" control;
    $this->add_control(
      'padding_bottom',
      [
        'label' => __( 'Padding Bottom', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'none' => 'none',
          'xs' => 'xs',
          'sm' => 'sm',
          'md' => 'md',
          'lg' => 'lg',
          'xl' => 'xl',
        ],
        'default' => 'md'
      ]
    );

    $this->end_controls_section();

?>