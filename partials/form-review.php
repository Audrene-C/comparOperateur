<div id="add-review">

    <form action="apps/add-review.php" method="POST">

        <input type="hidden" id="operator" name="operator" value="1">

        <label for="author">Your name:</label><br>
        <input type="text" id="author" name="author"><br>

        <label for="message">Write a review:</label><br>
        <input type="text" id="message" name="message"><br>

        <label for="rating">Give a rating:</label><br>
        <input type="number" id="rating" name="rating" min="0" max="5"><br>

        <input type="submit" value="Add">

    </form>

</div>