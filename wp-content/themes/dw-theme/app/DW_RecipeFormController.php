<?php

/**
 * Custom Recipe Form Post Controller
 */
class DW_RecipeFormController
{
    /**
     * The $_POST array
     *
     * @var array
     */
    protected $input;

    /**
     * The encountered validation errors
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Create a new controller instance
     *
     * @param array $input
     */
    public function __construct($input)
    {
        $this->input = $input;

        $this->handle();
    }

    /**
     * Bootstrap the validation & saving of sent data
     */
    protected function handle()
    {
        $values = $this->validate();

        if(!$this->errors) {
            // sauvegarder en DB en utilisant le post_type 'user_recipe'
            $this->save($values);
        }
    }

    /**
     * Validate the required data
     */
    protected function validate()
    {
        $values = [];
        $values['recipe_title'] = $this->check_valid('recipe_title');
        $values['recipe_time'] = $this->check_valid('recipe_time');
        $values['recipe_ingredients'] = $this->check_valid('recipe_ingredients');
        $values['recipe_guide'] = $this->check_valid('recipe_guide');

        return $values;
    }

    /**
     * Check if attribute exists and escape its value
     */
    protected function check_valid($attribute)
    {
        if($this->input[$attribute] ?? null) {
            return htmlspecialchars($this->input[$attribute]);
        }

        $this->errors[$attribute] = 'Veuillez fournir une valeur pour ce champs.';

        return null;
    }

    /**
     * Save the given values using the 'user_recipe' post_type
     *
     * @param array $values
     */
    protected function save($values)
    {
        wp_insert_post([
            'post_author' => 1,
            'post_content' => 'Temps requis : ' . $values['recipe_time'] . '<br>Ingrédients : ' . $values['recipe_ingredients'] . '<br>Mode opératoire : ' . $values['recipe_guide'],
            'post_title' => $values['recipe_title'],
            'post_type' => 'user_recipe'
        ]);
    }




}