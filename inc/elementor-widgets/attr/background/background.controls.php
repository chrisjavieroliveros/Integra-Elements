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
        
        'Transparent' => 'Transparent',
        'Separator_0' => '────',

        // Brand Colors
        'Primary' => 'Primary',
        'Secondary' => 'Secondary',
        'Separator_1' => '────',
          
        // Base Colors
        'Light' => 'Light',
        'Dark' => 'Dark',
        'Black' => 'Black',
        'White' => 'White',
        'Separator_2' => '────',

        // State Colors
        'Danger' => 'Danger',
        'Warning' => 'Warning',
        'Success' => 'Success',
        'Info' => 'Info',

      ],
      'default' => 'Transparent',
      'condition' => [
        'background' => 'color'
      ]
    ]
  );

  // Add "Primary" Variants;
  $this->add_control(
    'primary_variants',
    [
      'label' => 'Primary Variants',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'Primary-50' => 'Primary-50',
        'Primary-100' => 'Primary-100',
        'Primary-200' => 'Primary-200',
        'Primary-300' => 'Primary-300',
        'Primary-400' => 'Primary-400',
        'Primary-500' => 'Primary-500',
        'Primary-600' => 'Primary-600',
        'Primary-700' => 'Primary-700',
        'Primary-800' => 'Primary-800',
        'Primary-900' => 'Primary-900',
        'Primary-950' => 'Primary-950',
      ],
      'condition' => [
        'background_color' => [
          'Primary',
        ],
        'background' => 'color'
      ],
      'default' => 'Primary-500',
    ]
  );

  // Add "Secondary" Variants;
  $this->add_control(
    'secondary_variants',
    [
      'label' => 'Secondary Variants',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'Secondary-50' => 'Secondary-50',
        'Secondary-100' => 'Secondary-100',
        'Secondary-200' => 'Secondary-200',
        'Secondary-300' => 'Secondary-300',
        'Secondary-400' => 'Secondary-400',
        'Secondary-500' => 'Secondary-500',
        'Secondary-600' => 'Secondary-600',
        'Secondary-700' => 'Secondary-700',
        'Secondary-800' => 'Secondary-800',
        'Secondary-900' => 'Secondary-900',
        'Secondary-950' => 'Secondary-950',
      ],
      'condition' => [
        'background_color' => [
          'Secondary',
        ],
        'background' => 'color'
      ],
      'default' => 'Secondary-500',
    ]
  );


  // Add "Light" Variants;  
  $this->add_control(
    'light_variants',
    [
      'label' => 'Light Variants',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'Light-50' => 'Light-50',
        'Light-100' => 'Light-100',
        'Light-200' => 'Light-200',
        'Light-300' => 'Light-300',
        'Light-400' => 'Light-400',
        'Light-500' => 'Light-500',
        'Light-600' => 'Light-600',
        'Light-700' => 'Light-700',
        'Light-800' => 'Light-800',
        'Light-900' => 'Light-900',
        'Light-950' => 'Light-950',
      ],
      'condition' => [
        'background_color' => [
          'Light',
        ],
        'background' => 'color'
      ],
      'default' => 'Light-50',
    ]
  );

  // Add "Dark" Variants;
  $this->add_control(
    'dark_variants',
    [
      'label' => 'Dark Variants',
      'type' => \Elementor\Controls_Manager::SELECT,
      'options' => [
        'Dark-50' => 'Dark-50',
        'Dark-100' => 'Dark-100',
        'Dark-200' => 'Dark-200',
        'Dark-300' => 'Dark-300',
        'Dark-400' => 'Dark-400',
        'Dark-500' => 'Dark-500',
        'Dark-600' => 'Dark-600',
        'Dark-700' => 'Dark-700',
        'Dark-800' => 'Dark-800',
        'Dark-900' => 'Dark-900',
        'Dark-950' => 'Dark-950',
      ],
      'condition' => [
        'background_color' => [
          'Dark',
        ],
        'background' => 'color'
      ],
      'default' => 'Dark-50',
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