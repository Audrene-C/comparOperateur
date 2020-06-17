<?php

class Operator
{
    protected $id;
    protected $name;
    protected $rating;
    protected $link;
    protected $is_premium;

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

    ///// get and setter for name /////
    public function setName(string $name)
    {      
        $this->name = htmlspecialchars($name);
    }
    public function getName()
    {
        return ($this->name);
    }

    ///// get and setter for rating /////
    public function setRating(int $rating)
    {      
        $this->rating = $rating;
    }
    public function getRating()
    {
        return ($this->rating);
    }

    ///// get and setter for link /////
    public function setLink($link)
    {      
        $this->link = $link;
    }
    public function getLink()
    {
        return ($this->link);
    }

    ///// get and setter for is_premium /////
    public function setIs_premium(int $is_premium)
    {      
        $this->is_premium = $is_premium;
    }
    public function getIs_premium()
    {
        return ($this->is_premium);
    }

    //hydrate from an array
    public function hydrate(array $operatorRow)
    {
        foreach ($operatorRow as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //construct with hydrate function
    public function __construct(array $operatorRow)
    {
        $this->hydrate($operatorRow);
    }

}