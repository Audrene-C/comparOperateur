<?php
$path  = str_replace('apps', '', __DIR__);
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

    if (isset($_FILES['small-img']) AND $_FILES['small-img']['error'] == 0)
    {
        if ($_FILES['small-img']['size'] <= 1000000)
        {
                $infosfichier = pathinfo($_FILES['small-img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    move_uploaded_file($_FILES['small-img']['tmp_name'], 'uploads/' . basename($_FILES['small-img']['name']));

                    if (isset($_FILES['large-img']) AND $_FILES['large-img']['error'] == 0)
                    {
                        if ($_FILES['large-img']['size'] <= 1000000)
                        {
                            $infosfichier = pathinfo($_FILES['large-img']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($extension_upload, $extensions_autorisees))
                            {
                                move_uploaded_file($_FILES['large-img']['tmp_name'], 'uploads/' . basename($_FILES['large-img']['name']));
                            }
                        }
                    } 
                    $destination = new Destination(["location" => $location,
                    "price" => $price,
                    "id_tour_operator" => $operator], $osef);
                    $destinationsManager->create($destination);

                    header("Location: ".$path."/index.php");
                    exit();
                }
        }
    }
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