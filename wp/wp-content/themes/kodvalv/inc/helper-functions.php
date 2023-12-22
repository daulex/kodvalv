<?php

    function k_queue_style($label, $src){
        if(!$label || !$src)
            return;
        $cssVersion = filemtime(get_template_directory() . $src);
        wp_enqueue_style($label, get_template_directory_uri() . $src, [], $cssVersion);
    }