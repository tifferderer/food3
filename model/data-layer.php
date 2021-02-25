<?php

/* model/validate.php
*returns data for my app
 *
*/

class DataLayer
{
    private $_dbh;

    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }
/* Return all of the roes in the db orders table */
    function getOrders() {
        $sql = "SELECT * FROM orders";

        $statement = $this->_dbh->prepare($sql);

        //execute
        $statement->execute();
        //$id =  $this->_dbh->lastInsertId();
        //echo "Added value : $id!";
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    function saveOrder($order) {
        //var_dump($order);
        //echo "<p>Saving order</p>";
        $sql = "INSERT INTO orders(food, meal, condiments) VALUES(:food, :meal, :condiments)";

    $statement = $this->_dbh->prepare($sql);

    $condString = implode(",", $order->getCondiments());
    $statement->bindParam(':food', $order->getFood(), PDO::PARAM_STR);
    $statement->bindParam(':meal', $order->getMeal(), PDO::PARAM_STR);
    $statement->bindParam(':condiments', $condString, PDO::PARAM_STR);

    //execute
    $statement->execute();
    //$id =  $this->_dbh->lastInsertId();
    //echo "Added value : $id!";

    }
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
