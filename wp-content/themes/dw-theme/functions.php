<?php

/* **
 * Activate Wordpress components
 */
add_theme_support( 'post-thumbnails' ); 


/* **
 * Register main menu
 */
register_nav_menu( 'main', 'Navigation principale du site' );
register_nav_menu( 'footer', 'Navigation de fin de page' );


/* **
 * Get menu structure as array
 */
function dw_getMenu($location) {
    $menu = [];
    $locations = get_nav_menu_locations();

    foreach (wp_get_nav_menu_items($locations[$location]) as $post) {
        $item = new stdClass();
        $item->url = $post->url;
        $item->label = $post->title;
        $item->children = [];

        if(!$post->menu_item_parent) {
            $menu[$post->ID] = $item;
        }
        else {
            $menu[$post->menu_item_parent]->children[$post->ID] = $item;
        }
    }
    return $menu;
}

/* **
 * Register Custom Post Types
 */
function dw_register_post_types() {
    register_post_type('recipe', [
        'label' => 'Recettes',
        'labels' => [
            'singular_name' => 'Recette',
            'add_new_item' => 'Ajouter une recette'
        ],
        'public' => true,
        'description' => 'Les différentes recettes disponibles sur le site.',
        'menu_icon' => 'dashicons-carrot',
        'menu_position' => 5
    ]);
}

add_action('init', 'dw_register_post_types');


