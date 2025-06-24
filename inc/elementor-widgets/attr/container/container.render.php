<?php

    // Get container from attributes
    $container = isset($settings['container']) ? $settings['container'] : 'default';

    // Add container class to the wrapper
    $container_class = '';

    // Add container class to the wrapper
    $container_class .= ' container container--' . $container;

?>