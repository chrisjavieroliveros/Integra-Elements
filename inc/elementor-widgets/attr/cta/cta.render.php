<?php

  // Check if $cta_markup is defined in the parent file
  if (!isset($cta_markup)) {
    $cta_markup = '';
  }

  $ctaButtons = $settings['cta_buttons'];

  // Only render CTA if "Add CTA" is set to "Yes";
  $addCta = $settings['add_cta'];
  if( $addCta !== 'yes' ) {
    return;
  }

  $cta_markup .= '<div class="inline-cta">';
  $cta_size = $settings['cta_size'];

  foreach( $ctaButtons as $button ) {
    $buttonText = $button['button'];
    $buttonStyle = $button['style'];
    $buttonLink = $button['link']['url'];
    $buttonColor = $button['color'];
    $buttonIconPosition = $button['icon_position'];
    if(!isset($buttonIconPosition)) {
      $buttonIconPosition = 'before';
    }

    $cta_markup .= '<a href="' . esc_url($buttonLink) . '" class="btn btn--' . esc_attr($buttonColor) . ' btn--' . esc_attr($cta_size) . ' btn--' . esc_attr($buttonStyle) . '">';
    
    // Add the icon before the text if it exists
    if (!empty($button['cta_icon']['value']) && $buttonIconPosition === 'before') {
      $cta_markup .= '<div class="cta-icon" style="margin-right: var(--size-2);"><i class="' . esc_attr($button['cta_icon']['value']) . '"></i></div>';
    }
    
    $cta_markup .= esc_html($buttonText);    

    // Add the icon after the text if it exists
    if (!empty($button['cta_icon']['value']) && $buttonIconPosition === 'after') {
      $cta_markup .= '<div class="cta-icon" style="margin-left: var(--size-2);"><i class="' . esc_attr($button['cta_icon']['value']) . '"></i></div>';
    }

    $cta_markup .= '</a>';
  }
  
  $cta_markup .= '</div>';

?>