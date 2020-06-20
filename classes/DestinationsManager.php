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
        $req = $this->pdo->prepare('INSERT INTO destinations(location, price, img_url_small, img_url_large, id_tour_operator) VALUES(:location, :price, :img_url_small, :img_url_large, :id_tour_operator)');
        $req->execute(array(
            'location' => $destination->getLocation(),
            'price' => $destination->getPrice(),
            'img_url_small' => $destination->getImg_url_small(),
            'img_url_large' => $destination->getImg_url_large(),
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

            $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$data['id_tour_operator']);
            $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
            $operator = new Operator($dataOperator);

            return new Destination($data, $operator);

        } else {
            $destinations = [];

            $req = $this->pdo->prepare('SELECT * FROM destinations WHERE location = :location');
            $req->execute([':location' => $info]);

            while ($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$data['id_tour_operator']);
                $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
                $operator = new Operator($dataOperator);

                array_push($destinations, new Destination($data, $operator));
            }
            return $destinations;
        }
            
    }

    public function getList()
    {    
        $destinations = [];
        $osef = new Operator(['osef', 1, 'osef', 0]);
        $req = $this->pdo->query('SELECT * FROM destinations GROUP BY location');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            array_push($destinations, new Destination($data, $osef));
        }
        
        return $destinations;
    }

    public function getAll()
    {    
        $destinations = [];
        $req = $this->pdo->query('SELECT * FROM destinations');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $reqOperator = $this->pdo->query('SELECT * FROM tour_operators WHERE id = '.$data['id_tour_operator']);
            $dataOperator = $reqOperator->fetch(PDO::FETCH_ASSOC);
            $operator = new Operator($dataOperator);
            array_push($destinations, new Destination($data, $operator));
        }
        
        return $destinations;
    }

    public function getDestinationsByOperator(int $id) {

        $destinations = [];

        $req = $this->pdo->prepare('SELECT * FROM destinations WHERE id_tour_operator = :id_tour_operator');
        $req->execute([':id_tour_operator' => $id]);

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