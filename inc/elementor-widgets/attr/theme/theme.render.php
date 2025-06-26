<?php

    $theme = $this->get_settings('theme');

    // Check if $section_class defined in the parent file;
    if (!isset($section_class)) {
        $section_class = '';
    }

    if ($theme === 'light') {
        $section_class .= ' theme-light';
    } else {
        $section_class .= ' theme-dark';
    }

?>