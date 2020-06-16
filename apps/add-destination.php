<?php
$path = $_SERVER['DOCUMENT_ROOT'];
//include($path.'/comparOperateur/config/autoload.php');
include($path.'/config/autoload.php');
//include_once $path.'/comparOperateur/partials/connection.php';
include_once $path.'/partials/connection.php';
$destinationsManager = new DestinationsManager($pdo);
$osef = new Operator(['osef', 1, 'osef', 0]);

if (!empty($_POST['location']) AND !empty($_POST['price']) AND !empty($_POST['operator'])) {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $operator = $_POST['operator'];

    $destination = new Destination(["location" => $location,
                            "price" => $price,
                            "id_tour_operator" => $operator], $osef);
    $destinationsManager->create($destination);

    header('admin.php');
} else {
    echo "zut";
}

function prettyArray(array $nested_arrays): void
{
    foreach ($nested_arrays as $key => $value) {
        if (gettype($value) !== 'array') {
            echo ('<li class="dump">' . $key . ' : '
                . $value . '</li>');
        } else {
            echo ('<ul class="dump">' . $key);
            prettyArray($value);
            echo ('</ul>');
        }
    }
}

function prettyDump(array $nested_arrays): void
{
    foreach ($nested_arrays as $key => $value) {
        switch (gettype($value)) {
            case 'array':
                /* ignore same level recursion */
                if ($nested_arrays !== $value) {
                    echo ('<details><summary style="color : tomato;'
                        . 'font-weight : bold;">'
                        . $key . '<span style="color : steelblue;'
                        . 'font-weight : 100;"> ('
                        . count($value) . ')</span>'
                        . '</summary><ul style="font-size: 0.75rem;'
                        . 'background-color: ghostwhite">');
                    prettyDump($value);
                    echo ('</ul></details>');
                }
                break;
            case 'object':
                echo ('<details><summary style="color : tomato;'
                    . 'font-weight : bold;">'
                    . $key . '<span style="color : steelblue;'
                    . 'font-weight : 100;"> ('
                    . gettype($value).' : '. get_class($value). ')</span>'
                    . '</summary><ul style="font-size: 0.75rem;'
                    . 'background-color: ghostwhite">');
                    prettyDump(get_object_vars($value));
                    echo ' <details open><summary style="font-weight : bold;'
                    . 'color : plum">(methods)</summary><pre>';
                    prettyArray(get_class_methods($value));
                    echo '</details></pre>';
                    echo '</li></ul></details>';
                break;
            case 'callable':
            case 'iterable':
            case 'resource':
                /* not supported yet */
                break;
            default:
                /* scalar and NULL */
                echo ('<li style="margin-left: 2rem;color: teal;'
                    . 'background-color: white">'
                    . '<span style="color : steelblue;font-weight : bold;">'
                    . $key . '</span> : '
                    . ($value ?? '<span style="font-weight : bold;'
                        . 'color : violet">NULL<span/>')
                    . '</li>');
                break;
        }
    }
}
prettyDump($GLOBALS);