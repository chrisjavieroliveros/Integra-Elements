<?php

  // Check if $preview_markup is defined in the parent file
  if (!isset($preview_markup)) {
    $preview_markup = '';
  }
  
  // Get preview type from attributes
  $preview_type = isset($settings['preview_type']) ? $settings['preview_type'] : '';

  // Get preview max width from attributes
  $preview_max_width = isset($settings['preview_max_width']) ? $settings['preview_max_width'] : 992;

  // Get appropriate preview URL based on the type
  $preview_url = '';
  if ($preview_type === 'image' && !empty($settings['preview_image']['url'])) {
      $preview_url = $settings['preview_image']['url'];
  } elseif ($preview_type === 'video' && !empty($settings['preview_video']['url'])) {
      $preview_url = $settings['preview_video']['url'];
  } elseif ($preview_type === 'storylane' && !empty($settings['storylane_url'])) {
      $preview_url = $settings['storylane_url'];
  }
  
  // Check if we have a preview URL and type
  if (!empty($preview_url) && !empty($preview_type)) {
    
    switch ($preview_type) {
      case 'image':

        // Apply special block styling for 'featured' widget type if preview_block is enabled
        if (isset($widget_type) && $widget_type === 'featured' && isset($settings['preview_block']) && $settings['preview_block'] === 'yes') {
            $previewBlockStyles = '';
            
            // Handle preview_block_color if set
            if (!empty($settings['preview_block_color'])) {
                $block_color = $settings['preview_block_color'];
                // Simply capitalize the first letter of the color name for the CSS variable
                $formatted_color = ucfirst($block_color);
                $previewBlockStyles = ' style="background-color: var(--radiance-color-' . esc_attr($formatted_color) . ');"';
            }
            
            $preview_markup = '<div class="preview-block-wrapper"' . $previewBlockStyles . '>' . $preview_markup . '</div>';
        }
        break;
        
      case 'video':
        // Video preview markup
        $preview_markup = '<div class="video-style">';

        if($preview_max_width['size'] > 320) {
            $preview_markup .= '<video controls>';
        } else {
            $preview_markup .= '<video controls>';
        }

        $preview_markup .= '<source src="'.esc_url($preview_url).'" type="video/mp4">';
        $preview_markup .= '</video>';
        $preview_markup .= '</div>';
        break;
        
      case 'storylane':
        // Storylane preview markup
        if (!wp_script_is('storylane-js', 'enqueued')) {
          $preview_markup .= '<script async id="storylane-js" src="https://js.storylane.io/js/v2/storylane.js"></script>';
        }
        
        $preview_markup .= '<div class="storylane sl-embed" style="position: relative;
                            padding-bottom: calc(73.11% + 25px);
                            width: 100%;
                            height: 0;
                            transform: scale(1);" >';
        $preview_markup .= '<iframe src="'.esc_url($preview_url).'" frameborder="0" allowfullscreen></iframe>';
        $preview_markup .= '</div>';
        break;
        
      default:
        // Default case if preview type is not recognized
        $preview_markup = '<p>Preview not available for this type.</p>';
        break;
    }
  } else {
    $preview_markup = '<p>No preview available. Missing URL or type.</p>';
  }

?>