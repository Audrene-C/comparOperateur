<?php

include_once '../partials/connection.php';

if (!empty($_POST['name']) AND !empty($_POST['rating']) AND !empty($_POST['link']) AND !empty($_POST['premium'])) {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $link = $_POST['link'];
    $is_premium = $_POST['premium'];

    if ($is_premium == "no") {
        $is_premium = 0;
    } else {
        $is_premium = 1;
    }

    $req = $database->prepare('INSERT INTO tour_operators SET name = :name, rating = :rating, link = :link, is_premium = :is_premium');
    $req->execute(array(
        "name" => $name,
        "rating" => $rating,
        "link" => $link,
        "is_premium" => $is_premium
    ));

    echo "operator added";
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