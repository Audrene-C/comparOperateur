<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    // include($path.'/comparOperateur/config/autoload.php');
    include($path.'/config/autoload.php');
    // include_once $path.'/comparOperateur/partials/connection.php';
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $reviewsManager = new ReviewsManager($pdo);
?>

<div id="add-review">

    <form action="apps/add-review.php" method="POST">

        <input type="hidden" id="operator" name="operator" value="1">

        <label for="author">Your name:</label><br>
        <input type="text" id="author" name="author"><br>

        <label for="message">Write a review:</label><br>
        <input type="text" id="message" name="message"><br>

        <label for="rating">Give a rating:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5"><br>

        <input type="submit" value="Add">

    </form>

</div>

<?php
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