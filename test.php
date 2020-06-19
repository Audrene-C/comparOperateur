<?php 
    // include($path.'/comparOperateur/config/autoload.php');
    include(__DIR__.'/config/autoload.php');
    // include_once $path.'/comparOperateur/partials/connection.php';
    include_once __DIR__.'/partials/connection.php';
    $destinationsManager = new DestinationsManager($pdo);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ComparOperator</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/rating.css">
    <link rel="stylesheet" href="css/style.css" media="screen, handheld">
</head>
<body>

<div class="ratingDiv">
    <label>Rating:</label>
    <div class="form-group">
      <input class="star1 radioBtnStar" type="radio" name="comment[rating]" value="1" required>
      <label for="star1"><i class="starPicker starIcon1 fa fa-star"></i></label>

      <input class="star2 radioBtnStar" type="radio" name="comment[rating]" value="2">
      <label for="star2"><i class="starPicker starIcon2 fa fa-star"></i></label>

      <input class="star3 radioBtnStar" type="radio" name="comment[rating]" value="3">
      <label for="star3"><i class="starPicker starIcon3 fa fa-star"></i></label>

      <input class="star4 radioBtnStar" type="radio" name="comment[rating]" value="4">
      <label for="star4"><i class="starPicker starIcon4 fa fa-star"></i></label>

      <input class="star5 radioBtnStar" type="radio" name="comment[rating]" value="5">
      <label for="star5"><i class="starPicker starIcon5 fa fa-star"></i></label>
    </div>
</div>
<p id="numStar"></p>

</body>
</html>