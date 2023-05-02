<?php
/*
Plugin Name: Last Updated Column
Plugin URI: wordpress.com
Description: Adds a new column in Post-page "Last updated" and it is sortable
Version: 1.0
Author: Cornelii Sandberg/ ChatGPT
Author URI: https://github.com/CornElDos/Wordpress-Plugin-Last-Updated-Posts
License: GPL2
*/

// Skapa kolumnen för senast uppdaterade datum och gör den sorterbar
function last_updated_column_head($defaults) {
    $defaults['last_updated'] = __('Last Updated', 'last_updated');
    return $defaults;
}

// Visar datum för senast uppdaterade post i kolumnen och gör den sorterbar
function last_updated_column_content($column_name, $post_id) {
    if ($column_name == 'last_updated') {
        $post_modified = get_post_field('post_modified', $post_id);
        echo $post_modified;
    }
}

// Gör kolumnen "Last Updated" sorterbar
function last_updated_column_sortable($columns) {
    $columns['last_updated'] = 'post_modified';
    return $columns;
}

// Lägg till kolumnen och sorteringsfunktionen i posttabellen
add_filter('manage_posts_columns', 'last_updated_column_head');
add_action('manage_posts_custom_column', 'last_updated_column_content', 10, 2);
add_filter('manage_edit-post_sortable_columns', 'last_updated_column_sortable');
