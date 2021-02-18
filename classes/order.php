<?php

class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * @return String
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * @param String $food
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * @param string $meal
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * @param String $condiments
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }


}