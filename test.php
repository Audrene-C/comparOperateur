<?php
    include_once 'partials/connection.php';
?>

<div id="modify-operator">
    <h3>Modify an operator</h3>

    <form action="apps/modify-operator.php" method="GET">
    <label for="operator">Choose an operator:</label>
    <option value=""></option>

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