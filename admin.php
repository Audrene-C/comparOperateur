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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <div id="add-operator">
        <h3>Add an operator</h3>
        <form action="apps/add-operator.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="rating">Rating:</label><br>
            <input type="number" id="rating" name="rating" min="0" max="5">

            <p>Premium:</p>

            <div>
            <input type="radio" id="no" name="premium" value="no"
                    checked>
            <label for="no">No</label>
            </div>

            <div>
            <input type="radio" id="yes" name="premium" value="yes">
            <label for="yes">Yes</label>
            </div>

            <label for="link">Link:</label><br>
            <input type="text" id="link" name="link"><br>

            <input type="submit" value="Add">
        </form>
    </div>

    <div id="add-premium">
        <form action="apps/add-premium.php" method="POST">
            <h3>Add premium to an existing operator</h3>
            <label for="add-premium">Choose an operator:</label>

            <select name="add-premium" id="add-premium">
                <?php 
                    $operators = $operatorsManager->getList();

                    foreach ($operators as $operator) {
                        ?> <option value="<?php echo $operator->getId(); ?>"><?php echo $operator->getName(); ?></option> <?php
                    }
                ?>
            </select>

            <input type="submit" value="Add">
        </form>
    </div>

    <div id="add-destination">
        <h3>Add a destination</h3>

        <form action="apps/add-destination.php" method="POST">
            <label for="location">Location:</label><br>
            <input type="text" id="location" name="location"><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price"><br>

            <label for="operator">Choose an operator:</label>

            <select name="operator" id="operator">
                <?php 
                    $operators = $operatorsManager->getList();

                    foreach ($operators as $operator) {
                        ?> <option value="<?php echo $operator->getId(); ?>"><?php echo $operator->getName(); ?></option> <?php
                    }
                ?>
            </select>

            <input type="submit" value="Add">
        </form>

    </div>

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

    <div id="modify-destination">
        <h3>Modify a destination</h3>
        <form action="" method="GET">

            <select name="destination" id="destination">
                <option value=""></option>
                <?php 
                    $destinations = $destinationsManager->getList();

                    foreach ($destinations as $destination) {
                        ?> <option value="<?php echo $destination->getId(); ?>"><?php echo $destination->getLocation(); ?></option> <?php
                    }
                ?>
            </select>

            <input type="submit" value="Select">
        </form>

        <?php
            if (!empty($_GET['destination'])) {
                $id = intval($_GET['destination']);
                $destination = $destinationsManager->get($id);
                ?> 
                <form action="apps/modify-destination.php" method="POST">

                <input type="hidden" id="id" name="id" value="<?php echo $destination->getId(); ?>"><br>

                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" value="<?php echo $destination->getLocation(); ?>"><br>
    
                <label for="price">Price:</label><br>
                <input type="number" id="price" name="price" value="<?php echo $destination->getPrice(); ?>"><br>
    
                <input type="hidden" id="id_tour_operator" name="id_tour_operator" value="<?php echo $destination->getId_tour_operator(); ?>"><br>
    
                <input type="submit" value="Modify">
            </form>
            <?php
            }
        ?>

    </div>

    <div id="delete-operator">
        <h3>Delete an operator</h3>

        <form action="apps/delete-operator.php" method="POST">
        <label for="operator">Choose an operator:</label>

        <select name="operator" id="operator">
            <?php 
                $operators = $operatorsManager->getList();

                foreach ($operators as $operator) {
                    ?> <option value="<?php echo $operator->getId(); ?>"><?php echo $operator->getName(); ?></option> <?php
                }
            ?>
        </select>

            <input type="submit" value="Delete">
        </form>

    </div>

    <div id="delete-destination">
        <h3>Delete a destination</h3>

        <form action="apps/delete-destination.php" method="POST">
        <label for="destination">Choose a destination:</label>

        <select name="destination" id="destination">
            <?php 
                $destinations = $destinationsManager->getList();

                foreach ($destinations as $destination) {
                    $operator = $destination->getOperator();
                    $operatorName = $operator->getName();
                    ?> <option value="<?php echo $destination->getId(); ?>"><?php echo $destination->getLocation(); ?> with <?php echo $operatorName; ?></option> <?php
                }
            ?>
        </select>

            <input type="submit" value="Delete">
        </form>

    </div>

</body>
</html>