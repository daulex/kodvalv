<?php

$value = get_post_meta($post->ID, "textarea-code", true);
if(!empty($value)){
    echo "<pre><code>" . $value . "</code></pre>";
?>
<?php
}
