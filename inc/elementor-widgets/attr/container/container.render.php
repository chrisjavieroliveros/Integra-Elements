<?php

    // Check if $container_class defined in the parent file;
    if (!isset($container_class)) {
        $container_class = '';
    }

    // Get container from attributes
    $container = isset($settings['container']) ? $settings['container'] : 'default';

    // Add container class to the wrapper
    $container_class .= ' container container--' . $container;

?>