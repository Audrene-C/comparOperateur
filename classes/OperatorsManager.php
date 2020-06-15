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
        $req = $this->pdo->prepare('INSERT INTO tour_operators(name, rating, link, is_premium) VALUES(:name, :rating, :link, :is_premium)');
        $req->execute(array(
            'name' => $operator->getName(),
            'rating' => $operator->getRating(),
            'link' => $operator->getLink(),
            'is_premium' => $operator->getIs_premium()
            ));

        $operator->hydrate([
            'id' => $this->pdo->lastInsertId()
        ]);
    }

    public function premium(string $name)
    {
        $req = $this->pdo->prepare('UPDATE tour_operators SET is_premium = 1 WHERE name = :name');
        $req->execute([':name' => $name]); 
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

    public function delete(int $id)
    {
        $this->pdo->exec('DELETE FROM tour_operators WHERE id = '.$id);
    }
}