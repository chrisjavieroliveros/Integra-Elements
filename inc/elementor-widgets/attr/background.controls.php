<?php

  // Add "Background" control;
  $this->add_control(
    'background',
    [
      'label' => 'Background',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'color' => 'Color',
        'image' => 'Image',
      ],
      'default' => 'color'
    ]
  );

  // Add "Custom Background Color" control;
  $this->add_control(
    'background_color',
    [
      'label' => 'Background Color',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        // Base Colors
        'Transparent' => 'Transparent',
        
        'Primary' => 'Primary',
        'Secondary' => 'Secondary',
        'Black' => 'Black',
        'White' => 'White',
                
        // Light Colors
        'Light-50' => 'Light 50',
        'Light-100' => 'Light 100',
        'Light-200' => 'Light 200',
        'Light-300' => 'Light 300',
        'Light-400' => 'Light 400',
        'Light-500' => 'Light 500',
        'Light-600' => 'Light 600',
        'Light-700' => 'Light 700',
        'Light-800' => 'Light 800',
        'Light-900' => 'Light 900',
        'Light-950' => 'Light 950',
        
        // Dark Colors
        'Dark-50' => 'Dark 50',
        'Dark-100' => 'Dark 100',
        'Dark-200' => 'Dark 200',
        'Dark-300' => 'Dark 300',
        'Dark-400' => 'Dark 400',
        'Dark-500' => 'Dark 500',
        'Dark-600' => 'Dark 600',
        'Dark-700' => 'Dark 700',
        'Dark-800' => 'Dark 800',
        'Dark-900' => 'Dark 900',
        'Dark-950' => 'Dark 950',

        // State Colors
        'Danger' => 'Danger',
        'Warning' => 'Warning',
        'Success' => 'Success',
        'Info' => 'Info'
      ],
      'default' => 'Transparent',
      'condition' => [
        'background' => 'color'
      ]
    ]
  );

  // Add "Background Image" control;
  $this->add_control(
    'background_image',
    [
      'label' => 'Background Image',
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
        'url' => 'https://via.placeholder.com/1920x1080'
      ],
      'condition' => [
        'background' => 'image'
      ]
    ]
  );

  // Add "Background Position - Horizontal" control;
  $this->add_control(
    'background_position_horizontal',
    [
      'label' => 'Position - Horizontal',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'left' => 'Left',
        'center' => 'Center',
        'right' => 'Right',
      ],
      'default' => 'center',
      'condition' => [
        'background' => 'image'
      ]
    ]
  );

  // Add "Background Position - Vertical" control;
  $this->add_control(
    'background_position_vertical',
    [
      'label' => 'Position - Vertical',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'top' => 'Top',
        'center' => 'Center',
        'bottom' => 'Bottom',
      ],
      'default' => 'center',
      'condition' => [
        'background' => 'image'
      ]
    ]
  );

  // Add "Background Size" control;
  $this->add_control(
    'background_size',
    [
      'label' => 'Size',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'auto' => 'Auto',
        'cover' => 'Cover',
        'contain' => 'Contain',
      ],
      'default' => 'cover',
      'condition' => [
        'background' => 'image'
      ]
    ]
  );

?>