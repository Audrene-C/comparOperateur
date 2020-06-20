<?php 
    $path = __DIR__;
    include($path.'/config/autoload.php');
    //include($path.'/config/autoload.php');
    include_once $path.'/partials/connection.php';
    //include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $operator = $operatorsManager->get(4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Admin Operator Page</h1>
            <div class="card box effect">
                <div id="add-destination">
                    <h3 class="card-header">Add a destination</h3>


                    <form action="apps/add-destination.php" method="POST" enctype="multipart/form-data">
                        <label for="location">Location:</label><br>
                        <input type="text" id="location" name="location"><br>

                        <label for="price">Price:</label><br>
                        <input type="number" id="price" name="price"><br>

                        <label for="small-img">Choose a small image:</label><br>
                        <input type="file" name="small-img"><br>

                        <label for="large-img">Choose a large image:</label><br>
                        <input type="file" name="large-img"><br>

                        <input type="hidden" id="operator" name="operator" value="<?php echo $operator->getId(); ?>"><br>

                        <input type="submit" value="Add" class="btn btn-admin">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card box-4 effect">
                <div id="modify-operator">
                    <h3 class="card-header">Modify your info</h3>


                    <form action="apps/modify-operator.php" method="POST">

                        <input type="hidden" id="id" name="id" value="<?php echo $operator->getId(); ?>"><br>

                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" value="<?php echo $operator->getName(); ?>"><br>

                        <input type="hidden" id="rating" name="rating" min="1" max="5" value="<?php echo $operator->getRating(); ?>">

                        <input type="hidden" id="premium" name="premium" value="<?php echo $operator->getIs_premium(); ?>"><br>

                        <label for="link">Link:</label><br>
                        <input type="text" id="link" name="link" value="<?php echo $operator->getLink(); ?>"><br>

                        <input type="submit" value="Add" class="btn btn-admin">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card box-2 effect">
                <div id="modify-destination">
                    <h3 class="card-header">Modify a destination</h3>

                    <form action="" method="GET">

                        <select name="destination" id="destination">
                            <option value=""></option>
                            <?php
                            $destinations = $destinationsManager->getDestinationsByOperator($operator->getId());

                            foreach ($destinations as $destination) {
                                ?> <option value="<?php echo $destination->getId(); ?>"><?php echo $destination->getLocation(); ?></option> <?php
                            }
                            ?>
                        </select>

                        <input type="submit" value="Select" class="btn btn-admin">
                    </form>

                    <?php
                    if (!empty($_GET['destination'])) {
                        $id = intval($_GET['destination']);
                        $destination = $destinationsManager->get($id);
                        ?>
                        <form action="apps/modify-destination.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" id="id" name="id" value="<?php echo $destination->getId(); ?>"><br>

                            <label for="location">Location:</label><br>
                            <input type="text" id="location" name="location" value="<?php echo $destination->getLocation(); ?>"><br>

                            <label for="price">Price:</label><br>
                            <input type="number" id="price" name="price" value="<?php echo $destination->getPrice(); ?>"><br>

                            <label for="small-img">Choose a small image:</label><br>
                            <input type="file" name="small-img"><br>

                            <label for="large-img">Choose a large image:</label><br>
                            <input type="file" name="large-img"><br>

                            <input type="hidden" id="id_tour_operator" name="id_tour_operator" value="<?php echo $destination->getId_tour_operator(); ?>"><br>

                            <input type="submit" value="Modify" class="btn btn-admin">
                        </form>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>







</body>
</html>