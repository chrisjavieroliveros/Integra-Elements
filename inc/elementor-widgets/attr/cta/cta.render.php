<?php

  // Buttons / CTA;
  $ctaButtons = $settings['cta_buttons'];

  // Only render CTA if "Add CTA" is set to "Yes";
  $addCta = $settings['add_cta'];
  if( $addCta !== 'yes' ) {
    return;
  }

  $cta_markup = '';
  $cta_markup .= '<div class="inline-cta">';
  
  foreach( $ctaButtons as $button ) {
    $buttonText = $button['button'];
    $buttonLink = $button['link']['url'];
    $buttonColor = $button['color'];
    $buttonSize = $button['size'];
    $buttonIconPosition = $button['icon_position'];

    $cta_markup .= '<a href="' . $buttonLink . '" class="btn btn--' . $buttonColor . ' btn--' . $buttonSize . '">';
    
    // Add the icon before the text if it exists
    if (!empty($button['cta_icon']['value'])) {
      $cta_markup .= '<div class="cta-icon"><i class="' . $button['cta_icon']['value'] . '"></i></div>';
    }
    
    $cta_markup .= $buttonText;    
    $cta_markup .= '</a>';
  }
  
  $cta_markup .= '</div>';

?>