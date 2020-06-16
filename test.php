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

    <div id="modify-operator">
        <h3>Modify an operator</h3>
        <form action="" method="GET">

            <select name="operator" id="operator">
                <option value=""></option>
                <?php 
                    $operators = $operatorsManager->getList();

                    foreach ($operators as $operator) {
                        ?> <option value="<?php echo $operator->getId(); ?>"><?php echo $operator->getName(); ?></option> <?php
                    }
                ?>
            </select>

            <input type="submit" value="Select">
        </form>

        <?php
            if (!empty($_GET['operator'])) {
                $id = intval($_GET['operator']);
                $operator = $operatorsManager->get($id);
                ?> 
                <form action="apps/modify-operator.php" method="POST">

                <input type="hidden" id="id" name="id" value="<?php echo $operator->getId(); ?>"><br>

                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $operator->getName(); ?>"><br>
    
                <label for="rating">Rating:</label><br>
                <input type="number" id="rating" name="rating" min="0" max="5" value="<?php echo $operator->getRating(); ?>">
    
                <p>Premium:</p>
    
                <div>
                <input type="radio" id="no" name="premium" value="no" <?php if ($operator->getIs_premium() == 0) {echo "checked";} ?> >
                <label for="no">No</label>
                </div>
    
                <div>
                <input type="radio" id="yes" name="premium" value="yes" <?php if ($operator->getIs_premium() == 1) {echo "checked";} ?> >
                <label for="yes">Yes</label>
                </div>
    
                <label for="link">Link:</label><br>
                <input type="text" id="link" name="link" value="<?php echo $operator->getLink(); ?>"><br>
    
                <input type="submit" value="Add">
            </form>
            <?php
            }
        ?>

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