<?php

/* **
 * Handle our custom recipe formular
 */

function dw_get_recipe_form_token() {
    return 'dw-custom-form-recipe';
}

if($_POST['dw_recipe_token'] ?? false === dw_get_recipe_form_token()) {
    // charger le fichier qui contient notre classe de controller
    require_once __DIR__ . '/app/DW_RecipeFormController.php';

    // Exécuter le traitement du formulaire
    $recipe_form = new DW_RecipeFormController($_POST);

    // stocker le feedback du formulaire dans $_SESSION
    // rediriger l'utilisateur vers la page courante pour affichier le feedback.
}

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
    register_post_type('user_recipe', [
        'label' => 'Recettes envoyées',
        'labels' => [
            'singular_name' => 'Recette envoyée',
            'add_new_item' => 'Ajouter une recette'
        ],
        'public' => true,
        'description' => 'Les différentes recettes envoyées par les utilisateurs du site.',
        'menu_icon' => 'dashicons-carrot',
        'menu_position' => 6
    ]);
}

add_action('init', 'dw_register_post_types');


/* **
 * Register custom translations
 */

function dw_set_theme_textdomain(){
    load_theme_textdomain('dw', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'dw_set_theme_textdomain');

