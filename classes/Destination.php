<?php

class Destination
{
    protected $id;
    protected $location;
    protected $price;
    protected $img_url_small;
    protected $img_url_large;
    protected $id_tour_operator;
    protected $operator;

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

    ///// get and setter for img_url_small /////
    public function setImg_url_small(string $img_url_small)
    {      
        $this->img_url_small = $img_url_small;
    }
    public function getImg_url_small()
    {
        return ($this->img_url_small);
    }

    ///// get and setter for img_url_large /////
    public function setImg_url_large(string $img_url_large)
    {      
        $this->img_url_large = $img_url_large;
    }
    public function getImg_url_large()
    {
        return ($this->img_url_large);
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

    ///// get and setter for operator /////
    public function setOperator(Operator $operator)
    {      
        $this->operator = $operator;
    }
    public function getOperator()
    {
        return ($this->operator);
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
    public function __construct(array $destinationRow, Operator $operator)
    {
        $this->hydrate($destinationRow);
        $this->operator = $operator;
    }

}