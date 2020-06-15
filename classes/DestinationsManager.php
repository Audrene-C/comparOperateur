<?php

class DestinationsManager
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

    public function create(Destination $destination)
    {
        $req = $this->pdo->prepare('INSERT INTO destinations(location, price, id_tour_operator) VALUES(:location, :price, :id_tour_operator)');
        $req->execute(array(
            'location' => $destination->getLocation(),
            'price' => $destination->getPrice(),
            'id_tour_operator' => $destination->getId_tour_operator()
            ));

        $destination->hydrate([
            'id' => $this->pdo->lastInsertId()
        ]);
    }

    public function get($info)
    {
        if(is_int($info)) {
            $req = $this->pdo->query('SELECT * FROM destinations WHERE id = '.$info);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        } else {
            $req = $this->pdo->prepare('SELECT * FROM destinations WHERE location = :location');
            $req->execute([':location' => $info]);
            $data = $req->fetch(PDO::FETCH_ASSOC);
        }
        return new Destination($data);
    }

    public function delete(int $info)
    {
        $this->pdo->exec('DELETE FROM destinations WHERE id = '.$info);
    }
}