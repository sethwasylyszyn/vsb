<?php
function create_custom_client_role() {
    add_role('client_editor', 'Client Editor', array(
        'read'                 => true,
        'edit_pages'           => true,
        'publish_pages'        => true,
        'delete_pages'         => true,
        'edit_published_pages' => true,
        'delete_published_pages' => true,
    ));
}
add_action('init', 'create_custom_client_role');
