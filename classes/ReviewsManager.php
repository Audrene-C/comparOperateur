<?php

class ReviewsManager
{
    private $pdo;

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function __construct(PDO $pdo)
    {
        $this->setPdo($pdo);
    }

    public function create(Review $review)
    {
        $req = $this->pdo->prepare('INSERT INTO reviews(message, rating, author, id_tour_operator) VALUES(:message, :rating, :author, :id_tour_operator)');
        $req->execute(array(
            'message' => $review->getMessage(),
            'rating' => $review->getRating(),
            'author' => $review->getAuthor(),
            'id_tour_operator' => $review->getId_tour_operator()
            ));

        $review->hydrate([
            'id' => $this->pdo->lastInsertId()
        ]);
    }

    public function get($info)
    {
        $reviews = [];

        if(is_int($info)) {
            $req = $this->pdo->query('SELECT * FROM reviews WHERE id_tour_operator = '.$info);
            while ($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                array_push($reviews, new Review($data));
            }
        } else {
            $req = $this->pdo->prepare('SELECT * FROM reviews WHERE author = :author');
            $req->execute([':author' => $info]);
            while ($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                array_push($reviews, new Review($data));
            }
        }
        return $reviews;
    }

    public function delete(Review $review)
    {
        $this->pdo->exec('DELETE FROM reviews WHERE id = '.$review->getId());
    }
}