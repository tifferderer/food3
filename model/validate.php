<?php

    //contains validation functions for food app
class Validate
{
    private $_dataLayer;
    function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    /** validFood() returns true if food is not empty and contains only letters
     * @param $food string food
     * @return bool
     */
    function validFood($food)
    {
        //$validFoods = array("tacos", "eggs", "pizza");
        //return !empty(trim($food)); && in_array(strtolower($food), $validFoods);
        //$food = trim($food);

        return !empty($food) && ctype_alpha($food);
    }

    /** validMeal returns true if the selected meal is in the list of valid options
     * @param $meal string
     * @return bool
     */
    function validMeals($meal)
    {
        $validMeals = $this->_dataLayer->getMeals();
        return (in_array($meal, $validMeals));
    }

    /**validCondiments returns true if the condiments are in the list of valid options
     * @param $selected
     * @return bool
     */
    function validCondiments($selected)
    {
        $validConds = $this->_dataLayer->getCondiments();
        foreach ($selected as $condiment) {
            if (!(in_array($condiment, $validConds))) {
                return false;
            }
        }
        return true;
    }
}