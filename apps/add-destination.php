<?php

include_once '../partials/connection.php';

if (!empty($_POST['location']) AND !empty($_POST['price']) AND !empty($_POST['operator'])) {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $operator = $_POST['operator'];

    $req = $database->prepare('INSERT INTO destinations SET location = :location, price = :price, id_tour_operator = :id_tour_operator');
    $req->execute(array(
        "location" => $location,
        "price" => $price,
        "id_tour_operator" => $operator
    ));

    echo "destination added";
} else {
    echo "zut";
}

function dumpArray(array $nested_arrays): void
{
    foreach ($nested_arrays as $key => $value) {
        if (gettype($value) !== 'array') {
            echo ('<li style="margin-left: 2rem;color: teal; background-color: white">'
                . '<span style="color : steelblue;font-weight : bold;">'
                . $key . '</span> : '
                . $value . '</li>');
        } else {
            /* ignore same level recursion */
            if ($nested_arrays !== $value) {
                echo ('<details><summary style="color : tomato; font-weight : bold;">'
                    . $key . '<span style="color : steelblue;font-weight : 100;"> ('
                    . count($value) . ')</span>'
                    . '</summary><ul style="font-size: 0.75rem; background-color: ghostwhite">');
                dumpArray($value);
                echo ('</ul></details>');
            }
        }
    }
}
dumpArray($GLOBALS);