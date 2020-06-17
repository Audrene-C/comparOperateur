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
        $req = $this->pdo->prepare('INSERT INTO reviews(message, author, id_tour_operator) VALUES(:message, :author, :id_tour_operator)');
        $req->execute(array(
            'message' => $review->getMessage(),
            'author' => $review->getAuthor(),
            'id_tour_operator' => $review->getId_tour_operator()
            ));

        $review->hydrate([
            'id' => $this->pdo->lastInsertId()
        ]);
    }

    public function get($info)
    {
        if(is_int($info)) {
            $req = $this->pdo->query('SELECT * FROM reviews WHERE id_tour_operator = '.$info);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        } else {
            $req = $this->pdo->prepare('SELECT * FROM reviews WHERE author = :author');
            $req->execute([':author' => $info]);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        }
        return new Review($data);
    }

    public function getReviewByOperator(string $name) {

        $reviews = [];

        $req = $this->pdo->prepare('SELECT reviews.id, reviews.message, reviews.author, reviews.id_tour_operator FROM tour_operators INNER JOIN reviews ON  tour_operators.id = reviews.id_tour_operator WHERE name = :name');
        $req->execute([':name' => $name]);

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            array_push($reviews, new Review($data));
        }
        
        return $reviews;
    }

    public function delete(Review $review)
    {
        $this->pdo->exec('DELETE FROM reviews WHERE id = '.$review->getId());
    }
}