<?php

/* model/validate.php
*returns data for my app
 *
*/

class DataLayer
{
    /** geteMeals() returns an array of meals
     * @return string[] array
     */
    function getMeals()
    {

        return array("breakfast", "brunch", "lunch", "dinner");
    }

    function getCondiments()
    {
        return array("mayo", "mustard", "sriracha", "ketchup", "relish");
    }
}
