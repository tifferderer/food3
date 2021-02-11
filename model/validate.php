<?php

    //contains validation functions for food app

/** validFood() returns true if food is not empty and contains only letters */
function validFood($food) {
    //$validFoods = array("tacos", "eggs", "pizza");
    //return !empty(trim($food)); && in_array(strtolower($food), $validFoods);
    //$food = trim($food);

    return !empty($food) && ctype_alpha($food);
}

/** validMeal returns true if the selected meal is in the list of valid options */
function validMeals($meal)
{
    $validMeals = getMeals();
    return (in_array($meal, $validMeals));
}

/**validCondiments returns true if the condiments are in the list of valid options */
function validCondiments($selected)
{
    $validConds = getCondiments();
    foreach ($selected as $condiment) {
        if (!(in_array($condiment, $validConds))) {
            return false;
        }
    }
    return true;
}