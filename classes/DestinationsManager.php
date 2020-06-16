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
            $reqDestination = $this->pdo->query('SELECT * FROM destinations WHERE id = '.$info);
            $dataDestination = $reqDestination->fetch(PDO::FETCH_ASSOC);

            $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$dataDestination['id_tour_operator']);
            $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
            $operator = new Operator($dataOperator);
        } else {
            $reqDestination = $this->pdo->prepare('SELECT * FROM destinations WHERE location = :location');
            $reqDestination->execute([':location' => $info]);
            $dataDestination = $reqDestination->fetch(PDO::FETCH_ASSOC);

            $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$dataDestination['id_tour_operator']);
            $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
            $operator = new Operator($dataOperator);
        }
        return new Destination($dataDestination, $operator);
    }

    public function getList()
    {
        $destinations = [];
    
        $req = $this->pdo->query('SELECT destinations.id, destinations.location, destinations.id_tour_operator, tour_operators.name FROM destinations INNER JOIN tour_operators WHERE destinations.id_tour_operator = tour_operators.id');
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$data['id_tour_operator']);
            $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
            $operator = new Operator($dataOperator);
            array_push($destinations, new Destination($data, $operator));
        }
        
        return $destinations;
    }

    public function update(Destination $destination) {
        $req = $this->pdo->prepare('UPDATE destinations SET location = :location, price = :price WHERE id = :id');
        $req->execute(array(
            ':location' => $destination->getLocation(),
            ':price' => $destination->getPrice(),
            ':id' => $destination->getId()
            ));
    }

    public function delete(int $info)
    {
        $this->pdo->exec('DELETE FROM destinations WHERE id = '.$info);
    }
}