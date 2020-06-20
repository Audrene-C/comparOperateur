<?php

class OperatorsManager
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

    public function create(Operator $operator)
    {
        $req = $this->pdo->prepare('INSERT INTO tour_operators(name, rating, link, image, is_premium) VALUES(:name, :rating, :link, :image, :is_premium)');
        $req->execute(array(
            'name' => $operator->getName(),
            'rating' => $operator->getRating(),
            'link' => $operator->getLink(),
            'image' => $operator->getImage(),
            'is_premium' => $operator->getIs_premium()
            ));

        $operator->hydrate([
            'id' => $this->pdo->lastInsertId()
        ]);
    }

    public function premium(int $id)
    {
        $req = $this->pdo->prepare('UPDATE tour_operators SET is_premium = 1 WHERE id = :id');
        $req->execute([':id' => $id]); 
    }

    public function update(Operator $operator) {
        $req = $this->pdo->prepare('UPDATE tour_operators SET name = :name, rating = :rating, link = :link, image = :image, is_premium = :is_premium WHERE id = :id');
        $req->execute(array(
            ':name' => $operator->getName(),
            ':rating' => $operator->getRating(),
            ':link' => $operator->getLink(),
            'image' => $operator->getImage(),
            ':is_premium' => $operator->getIs_premium(),
            ':id' => $operator->getId()
            ));
    }

    public function get($info)
    {
        if(is_int($info)) {
            $req = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$info);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        } else {
            $req = $this->pdo->prepare('SELECT * FROM tour_operators WHERE name = :name');
            $req->execute([':name' => $info]);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        }
        return new Operator($data);
    }

    public function getList()
    {
        $operators = [];
    
        $req = $this->pdo->query('SELECT * FROM tour_operators');
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            array_push($operators, new Operator($data));
        }
        
        return $operators;
    }

    public function getOperatorByDestination(string $name) {

        $operators = [];

        $req = $this->pdo->prepare('SELECT tour_operators.id, tour_operators.name, tour_operators.rating, tour_operators.link, tour_operators.image, tour_operators.is_premium FROM tour_operators INNER JOIN destinations ON tour_operators.id = destinations.id_tour_operator WHERE location = :location');
        $req->execute([':location' => $name]);

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            array_push($operators, new Operator($data));
        }
        
        return $operators;
    }

    public function calcAverageRating(int $id) {
        $ratings = array(
            '5' => 0,
            '4' => 0,
            '3' => 0,
            '2' => 0,
            '1' => 0
        );        
        $totalWeight = 0;
        $totalReviews = 0;

        $req = $this->pdo->query('SELECT reviews.rating FROM reviews INNER JOIN tour_operators ON reviews.id_tour_operator = tour_operators.id WHERE tour_operators.id = '.$id);

        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            switch ($data['rating'])
            {
                case '1':
                    $ratings['1'] += intval($data['rating']); break;

                case '2':
                    $ratings['2'] += intval($data['rating']); break;

                case '3':
                    $ratings['3'] += intval($data['rating']); break;

                case '4':
                    $ratings['4'] += intval($data['rating']); break;

                case '5':
                    $ratings['5'] += intval($data['rating']); break;
            }
        }
        
        foreach ($ratings as $weight => $numberofReviews) {
            $WeightMultipliedByNumber = $weight * $numberofReviews;
            $totalWeight += $WeightMultipliedByNumber;
            $totalReviews += $numberofReviews;
        }
        
        //divide the total weight by total number of reviews
        $averageRating = $totalWeight / $totalReviews;
        
        return $averageRating;
    }

    public function updateRating(Operator $operator, int $updatedRating) {
        $req = $this->pdo->prepare('UPDATE tour_operators SET rating = :rating WHERE id = :id');
        $req->execute(array(
            ':rating' => $operator->getRating(),
            ':id' => $updatedRating
        ));
    }

    public function delete(int $id)
    {
        $this->pdo->exec('DELETE FROM tour_operators WHERE id = '.$id);
    }

}