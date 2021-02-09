<?php

    //contains validation functions for food app

/** validFood() returns true if food is not empty */
function validFood($food) {
    //$validFoods = array("tacos", "eggs", "pizza");
    return !empty(trim($food)); // && in_array(strtolower($food), $validFoods);
}