<?php

class Review
{
    protected $id;
    protected $message;
    protected $rating;
    protected $author;
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

    ///// get and setter for message /////
    public function setMessage(string $message)
    {      
        $this->message = htmlspecialchars($message);
    }
    public function getMessage()
    {
        return ($this->message);
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

    ///// get and setter for author /////
    public function setAuthor(string $author)
    {      
        $this->author = htmlspecialchars($author);
    }
    public function getAuthor()
    {
        return ($this->author);
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
    public function hydrate(array $reviewRow)
    {
        foreach ($reviewRow as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    //construct with hydrate function
    public function __construct(array $reviewRow)
    {
        $this->hydrate($reviewRow);
    }
}