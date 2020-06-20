<?php
    if (isset($_POST['operator'])) {
    $path = str_replace('views', '', __DIR__);
    include($path.'/config/autoload.php');
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $reviewsManager = new ReviewsManager($pdo);
    $id = intval($_POST['operator']);
    $operator = $operatorsManager->get($id);
    $destinations = $destinationsManager->getDestinationsByOperator($id);
    $reviews = $reviewsManager->get($id);
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
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/test.css">
        <link rel="stylesheet" href="../css/rating.css">
        <link rel="stylesheet" href="../css/style.css" media="screen, handheld">
        <link rel="stylesheet" href="../css/comment.css">

    </head>
    <body>
        <header>
            <?php
            //include $path.$path2.'/partials/nav.php';
            include $path.'/partials/nav.php';
            ?>
        </header>


        <main>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-operator card-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo $destination->getImg_url_large(); ?>" class="d-block w-100 img-operator" alt="...">
                                    </div>

                                    <div class="col-2">
                                    <?php
                                        foreach ($destinations as $destination) {
                                    ?>
                                        <label>Price:</label><br>
                                        <h3><?php echo $destination->getLocation(); ?> for <?php echo $destination->getPrice(); ?> $</h3>
                                    <?php
                                        } 
                                    ?>
                                    </div>

                                    <div class="col-7 ratingDiv">
                                        <!-- Rating Stars Box -->
                                            <label>Rating:</label>
                                            <div class="form-group">
                                                <input class="<?php if($operator->getRating() <= 1) {echo 'clickedStar';}?> star1 radioBtnStar" type="radio" name="comment[rating]" value="1" required>
                                                <label for="star1"><i class="starPicker starIcon1 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 2) {echo 'clickedStar';}?> star2 radioBtnStar" type="radio" name="comment[rating]" value="2">
                                                <label for="star2"><i class="starPicker starIcon2 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 3) {echo 'clickedStar';}?> star3 radioBtnStar" type="radio" name="comment[rating]" value="3">
                                                <label for="star3"><i class="starPicker starIcon3 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 4) {echo 'clickedStar';}?> star4 radioBtnStar" type="radio" name="comment[rating]" value="4">
                                                <label for="star4"><i class="starPicker starIcon4 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 5) {echo 'clickedStar';}?> star5 radioBtnStar" type="radio" name="comment[rating]" value="5">
                                                <label for="star5"><i class="starPicker starIcon5 fa fa-star"></i></label>
                                            </div>
                                        <p id="numStar"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h1><?php echo $operator->getName(); ?></h1>
                                        <p>
                                        <?php 
                                            if ($operator->getIs_premium() == 1) {
                                                ?> <a href="<?php echo $operator->getLink(); ?>">Website : <?php echo $operator->getLink(); ?></a> <?php
                                            }
                                        ?>
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <form action="" method="POST">
                                            <input type="hidden" name="search" value="<?php echo $operator->getName(); ?>">
                                            <input type="submit" class="btn btn-card-operator" value="Want to rate this operator?">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <footer>
            <?php
                //include $path.$path2.'/partials/footer.php';
                include $path.'/partials/footer.php';
            ?>
        </footer>

        <script src="../js/rating.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
    
    <?php
} elseif (isset($_POST['search'])) {
    $path = str_replace('views', '', __DIR__);
    include($path.'/config/autoload.php');
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $reviewsManager = new ReviewsManager($pdo);
    $name = $_POST['search'];
    $destinations = $destinationsManager->getDestinationsByOperator($name);
    $operator = $operatorsManager->get($name);
    $reviews = $reviewsManager->get($operator->getId());
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
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/test.css">
        <link rel="stylesheet" href="../css/rating.css">
        <link rel="stylesheet" href="../css/style.css" media="screen, handheld">
        <link rel="stylesheet" href="../css/comment.css">
    </head>
    <body>
        <header>
            <?php
            //include $path.$path2.'/partials/nav.php';
            include $path.'/partials/nav.php';
            ?>
        </header>


        <main>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-operator card-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo $destination->getImg_url_large(); ?>" class="d-block w-100 img-operator" alt="...">
                                    </div>

                                    <div class="col-7 ratingDiv">
                                        <!-- Rating Stars Box -->
                                            <label>Rating:</label>
                                            <div class="form-group">
                                                <input class="<?php if($operator->getRating() <= 1) {echo 'clickedStar';}?> star1 radioBtnStar" type="radio" name="comment[rating]" value="1" required>
                                                <label for="star1"><i class="starPicker starIcon1 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 2) {echo 'clickedStar';}?> star2 radioBtnStar" type="radio" name="comment[rating]" value="2">
                                                <label for="star2"><i class="starPicker starIcon2 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 3) {echo 'clickedStar';}?> star3 radioBtnStar" type="radio" name="comment[rating]" value="3">
                                                <label for="star3"><i class="starPicker starIcon3 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 4) {echo 'clickedStar';}?> star4 radioBtnStar" type="radio" name="comment[rating]" value="4">
                                                <label for="star4"><i class="starPicker starIcon4 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 5) {echo 'clickedStar';}?> star5 radioBtnStar" type="radio" name="comment[rating]" value="5">
                                                <label for="star5"><i class="starPicker starIcon5 fa fa-star"></i></label>
                                            </div>
                                        <p id="numStar"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h1><?php echo $operator->getName(); ?></h1>
                                        <p>
                                        <?php 
                                            if ($operator->getIs_premium() == 1) {
                                                ?> <a href="<?php echo $operator->getLink(); ?>">Website : <?php echo $operator->getLink(); ?></a> <?php
                                            }
                                        ?>
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <form action="/apps/add-review.php" method="POST">

                                            <div class="ratingDiv">
                                                <label for="comment[rating]">Want to rate this operator?</label>
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

                                            <label for="author">Your name :</label>
                                            <input type="text" id="author" name="author">

                                            <label for="message">Leave a comment :</label>
                                            <input type="text" id="message" name="message">

                                            <input type="hidden" id="operator" name="operator" value="<?php echo $operator->getId(); ?>">

                                            <input type="submit" value="Send">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="comments-container">
                <h3>Comentaires</h3>

                <ul id="comments-list" class="comments-list">
                    <?php 
                        foreach ($reviews as $review) {
                    ?>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                    <!-- Contenedor del Comentario -->
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author"><?php echo $review->getAuthor(); ?></a></h6>
                                            <span>20 minutes ago</span>
                                            <i class="fa fa-reply"></i>
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content">
                                            <?php echo $review->getMessage(); ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>

        </main>

        <footer>
            <?php
                //include $path.$path2.'/partials/footer.php';
                include $path.'/partials/footer.php';
            ?>
        </footer>

        <script src="../js/rating.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>

    <?php
} else {
    $path = str_replace('views', '', __DIR__);
    include($path.'/config/autoload.php');
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $operators = $operatorsManager->getList();
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
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/test.css">
        <link rel="stylesheet" href="../css/rating.css">
        <link rel="stylesheet" href="../css/style.css" media="screen, handheld">
        <link rel="stylesheet" href="../css/comment.css">
    </head>
    <body>
    <header>
        <?php
        //include $path.$path2.'/partials/nav.php';
        include $path.'/partials/nav.php';
        ?>
    </header>


    <main>
        <div class="container">
            <?php
                foreach ($operators as $operator) {
            ?> 
                <div class="row">
                    <div class="col-12">
                        <div class="card-operator card-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="../img/<?php echo $operator->getImage(); ?>" class="d-block w-100 img-operator" alt="...">
                                    </div>

                                    <div class="col-7 ratingDiv">
                                        <!-- Rating Stars Box -->
                                            <label>Rating:</label>
                                            <div class="form-group">
                                                <input class="<?php if($operator->getRating() <= 1) {echo 'clickedStar';}?> star1 radioBtnStar" type="radio" name="comment[rating]" value="1" required>
                                                <label for="star1"><i class="starPicker starIcon1 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 2) {echo 'clickedStar';}?> star2 radioBtnStar" type="radio" name="comment[rating]" value="2">
                                                <label for="star2"><i class="starPicker starIcon2 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 3) {echo 'clickedStar';}?> star3 radioBtnStar" type="radio" name="comment[rating]" value="3">
                                                <label for="star3"><i class="starPicker starIcon3 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 4) {echo 'clickedStar';}?> star4 radioBtnStar" type="radio" name="comment[rating]" value="4">
                                                <label for="star4"><i class="starPicker starIcon4 fa fa-star"></i></label>

                                                <input class="<?php if($operator->getRating() <= 5) {echo 'clickedStar';}?> star5 radioBtnStar" type="radio" name="comment[rating]" value="5">
                                                <label for="star5"><i class="starPicker starIcon5 fa fa-star"></i></label>
                                            </div>
                                        <p id="numStar"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <h1><?php echo $operator->getName(); ?></h1>
                                        <p>
                                        <?php 
                                            if ($operator->getIs_premium() == 1) {
                                                ?> <a href="<?php echo $operator->getLink(); ?>">Website : <?php echo $operator->getLink(); ?></a> <?php
                                            }
                                        ?>
                                        </p>
                                    </div>

                                    <div class="col-6">
                                        <form action="" method="POST">
                                            <input type="hidden" name="search" value="<?php echo $operator->getName(); ?>">
                                            <input type="submit" class="btn btn-card-operator" value="Want to rate this operator?">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
                          
        </div>
    </main>

    <footer>
        <?php
            //include $path.$path2.'/partials/footer.php';
            include $path.'/partials/footer.php';
        ?>
    </footer>

    <script src="../js/rating.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>

    <?php
}