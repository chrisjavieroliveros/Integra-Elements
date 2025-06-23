<?php

    $theme = $this->get_settings('theme');

    if ($theme === 'light') {
        $section_class .= ' theme-light';
    } else {
        $section_class .= ' theme-dark';
    }

?>