<?php

class Destination
{
    protected $id;
    protected $location;
    protected $price;
    protected $id_tour_operator;

    ///// get and setter for id /////
    public function setId(int $id)
    {
        $id = $id;
        
        if ($id > 0) {
            $this->id = $id;
        }
    }
    public function getId()
    {
        return $this->id;
    }

    ///// get and setter for location /////
    public function setLocation(string $location)
    {      
        $this->location = htmlspecialchars($location);
    }
    public function getLocation()
    {
        return ($this->location);
    }

    ///// get and setter for price /////
    public function setPrice(int $price)
    {      
        $this->price = $price;
    }
    public function getPrice()
    {
        return ($this->price);
    }

    ///// get and setter for id_tour_operator /////
    public function setId_tour_operator(int $id_tour_operator)
    {      
        $this->id_tour_operator = $id_tour_operator;
    }
    public function getId_tour_operator()
    {
        return ($this->id_tour_operator);
    }

    //hydrate from an array
    public function hydrate(array $destinationRow)
    {
        foreach ($destinationRow as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //construct with hydrate function
    public function __construct(array $destinationRow)
    {
        $this->hydrate($destinationRow);
    }
}