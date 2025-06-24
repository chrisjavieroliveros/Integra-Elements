<?php

// Preview Section;
$this->start_controls_section(
  'preview_section',
  [
      'label' => __('Preview (Global)', 'your-text-domain'),
      'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
  ]
);

// Preview Type (Image, Video);
$this->add_control(
  'preview_type',
  [
      'label' => __('Preview Type', 'your-text-domain'),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'image',
      'options' => [
          'image' => __('Image', 'your-text-domain'),
          'video' => __('Video', 'your-text-domain'),
          'storylane' => __('Storylane', 'your-text-domain'),
          'none' => __('None', 'your-text-domain'),
      ],
  ]
);

// Preview Block switcher - only for featured widget with image preview
if (isset($widget_type) && $widget_type === 'featured') {
    $this->add_control(
        'preview_block',
        [
            'label' => __('Wrap Preview in Block?', 'your-text-domain'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'your-text-domain'),
            'label_off' => __('No', 'your-text-domain'),
            'return_value' => 'yes',
            'default' => 'no',
            'condition' => [
                'preview_type' => 'image',
            ],
        ]
    );

    // Add Preview Block Color Control;
    $this->add_control(
        'preview_block_color',
        [
            'label' => __('Block Color', 'your-text-domain'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'crimson' => 'Crimson',
                'black' => 'Black',
                'white' => 'White',
                'light-100' => 'Light 100',
                'light-200' => 'Light 200',
                'light-300' => 'Light 300',
                'light-400' => 'Light 400',
                'light-500' => 'Light 500',
                'light-600' => 'Light 600',
                'light-700' => 'Light 700',
                'light-800' => 'Light 800',
                'light-900' => 'Light 900',
                'dark-100' => 'Dark 100',
                'dark-200' => 'Dark 200',
                'dark-300' => 'Dark 300',
                'dark-400' => 'Dark 400',
                'dark-500' => 'Dark 500',
                'dark-600' => 'Dark 600',
                'dark-700' => 'Dark 700',
                'dark-800' => 'Dark 800',
                'dark-900' => 'Dark 900',
            ],
            'default' => 'light-100',
            'condition' => [
                'preview_block' => 'yes',
            ],
        ]
    );
}

// Preview Max Width (Random, 100%, 1200px);
$this->add_control(
  'preview_max_width',
  [
      'label' => __('Preview Max Width', 'your-text-domain'),
      'type' => \Elementor\Controls_Manager::SLIDER,
      'size_units' => ['px'],
      'range' => [
        'px' => [
          'min' => 320,
          'max' => 992,
          'step' => 8,
        ],
      ],
      'default' => [
        'unit' => 'px',
        'size' => 320,
      ],
  ]
);

// If Preview Type is Image;
$this->add_control(
  'preview_image',
  [
      'label' => __('Preview Image', 'your-text-domain'),
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
          'url' => 'https://placehold.co/550x310',
      ],
      'condition' => [
          'preview_type' => 'image',
      ],
  ]
);

// If Preview Type is Video;
$this->add_control(
  'preview_video',
  [
      'label' => __('Preview Video', 'your-text-domain'),
      'type' => \Elementor\Controls_Manager::MEDIA,
      'media_type' => 'video',
      'condition' => [
          'preview_type' => 'video',
      ],
  ]
);

// Video Poster;
$this->add_control(
  'video_poster',
  [
      'label' => __('Video Poster', 'your-text-domain'),
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
          'url' => 'https://placehold.co/550x310',
      ],
      'condition' => [
          'preview_type' => 'video',
      ],
  ]
);

// end of preview section
$this->end_controls_section();

?>