<?php
function snippet_metabox_markup($object){
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    k_queue_style("k-code-metabox", "/assets/css/components/form.css");
?>
<div class="snippet-metabox-container">
<?php
    $textarea_code = get_post_meta($object->ID, "textarea-code", true);

    get_template_part("components/form/textarea-code", null, array(
        "value" => $textarea_code,
        "name" => "textarea-code",
        "label" => "Code"
    ));
    
    $checkbox_value = get_post_meta($object->ID, "code-is-current", true);

    get_template_part("components/form/checkbox", null, array(
        "value" => $checkbox_value,
        "name" => "code-is-current",
        "label" => "Code is current and not deprecated"
    ));
?>
</div>
<?php  
}

function add_snippet_metabox(){
    add_meta_box("snippet-meta-box", "Snippet data", "snippet_metabox_markup", "snippet", "normal", "high", null);
}

add_action("add_meta_boxes", "add_snippet_metabox");


function save_snippet_metabox($post_id, $post, $update){
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;


    $fields_to_process = array(
        "textarea-code",
        "code-is-current"
    );

    foreach($fields_to_process as $field){
        if(isset($_POST[$field]))
        {
            $meta_box_value = $_POST[$field];
            update_post_meta($post_id, $field, $meta_box_value);
        }
    }
}

add_action("save_post", "save_snippet_metabox", 10, 3);