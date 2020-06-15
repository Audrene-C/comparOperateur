<?php 
include_once 'partials/connection.php';
?>

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
                $req = $database->query('SELECT name FROM tour_operators');
                $results = $req->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $result) {
                    ?> <option value="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></option> <?php
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
                $req = $database->query('SELECT * FROM tour_operators');
                $results = $req->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $result) {
                    ?> <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option> <?php
                }
            ?>
        </select>

        <input type="submit" value="Add">
    </form>

</div>

<div id="modify-operator">
    <h3>Modify an operator</h3>
    <form action="apps/modify-operator.php" method="POST">
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

<div id="delete-operator">
    <h3>Delete an operator</h3>

    <form action="apps/delete-operator.php" method="POST">
    <label for="operator">Choose an operator:</label>

    <select name="operator" id="operator">
        <?php 
            $req = $database->query('SELECT * FROM tour_operators');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                ?> <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option> <?php
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
            $req = $database->query('SELECT destinations.id, destinations.location, tour_operators.name FROM destinations INNER JOIN tour_operators WHERE destinations.id_tour_operator = tour_operators.id');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                ?> <option value="<?php echo $result['id']; ?>"><?php echo $result['location']; ?> with <?php echo $result['name']; ?></option> <?php
            }
        ?>
    </select>

        <input type="submit" value="Delete">
    </form>

</div>