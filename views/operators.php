<?php
    if (isset($_POST['operator'])) {
    $path = str_replace('views', '', __DIR__);
    //$path2 = "/simplon/Projets_groupe/comparOperateur";
    // include($path.'/comparOperateur/config/autoload.php');
    include($path.'/config/autoload.php');
    // include_once $path.'/comparOperateur/partials/connection.php';
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $id = intval($_POST['operator']);
    $operator = $operatorsManager->get($id);
    $destinations = $destinationsManager->getDestinationsByOperator($operator->getId());
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
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/test.css">
        <link rel="stylesheet" href="/css/style.css" media="screen, handheld">
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
                        <img src="https://fakeimg.pl/250x100/" class="d-block w-100 img-operator" alt="...">
                        <h1><?php echo $operator->getName(); ?>, rated <?php echo $operator->getRating(); ?>/5 by our clients</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <?php
                                    foreach ($destinations as $destination) {
                                        ?>
                                        <li>
                                            <p>Travel to <?php echo $destination->getLocation(); ?> for <?php echo $destination->getPrice(); ?> $</p>
                                        </li>
                                        <?php
                                    } 
                                ?>
                            </ul>

                            <form action="/apps/add-review.php" method="POST">

                                <label for="rating">Want to rate this operator?</label>
                                <input type="number" id="rating" name="rating" min="1" max="5">

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
        </main>

        <footer>
            <?php
                //include $path.$path2.'/partials/footer.php';
                include $path.'/partials/footer.php';
            ?>
        </footer>

        <script src="/js/rating.js"></script>
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
    //$path2 = "/simplon/Projets_groupe/comparOperateur";
    // include($path.'/comparOperateur/config/autoload.php');
    include($path.'/config/autoload.php');
    // include_once $path.'/comparOperateur/partials/connection.php';
    include_once $path.'/partials/connection.php';
    $operatorsManager = new OperatorsManager($pdo);
    $destinationsManager = new DestinationsManager($pdo);
    $name = $_POST['search'];
    $operator = $operatorsManager->get($name);
    $destinations = $destinationsManager->getDestinationsByOperator($operator->getId());
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
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/test.css">
        <link rel="stylesheet" href="/css/style.css" media="screen, handheld">
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
                        <img src="https://fakeimg.pl/250x100/" class="d-block w-100 img-operator" alt="...">
                        <h1><?php echo $operator->getName(); ?>, rated <?php echo $operator->getRating(); ?>/5 by our clients</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <?php
                                    foreach ($destinations as $destination) {
                                        ?>
                                        <li>
                                            <p>Travel to <?php echo $destination->getLocation(); ?> for <?php echo $destination->getPrice(); ?> $</p>
                                        </li>
                                        <?php
                                    } 
                                ?>
                            </ul>

                            <form action="/apps/add-review.php" method="POST">

                                <label for="rating">Want to rate this operator?</label>
                                <input type="number" id="rating" name="rating" min="1" max="5">

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
        </main>

        <footer>
            <?php
                //include $path.$path2.'/partials/footer.php';
                include $path.'/partials/footer.php';
            ?>
        </footer>

        <script src="/js/rating.js"></script>
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
    //$path2 = "/simplon/Projets_groupe/comparOperateur";
    // include($path.'/comparOperateur/config/autoload.php');
    include($path.'/config/autoload.php');
    // include_once $path.'/comparOperateur/partials/connection.php';
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
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/test.css">
        <link rel="stylesheet" href="/css/style.css" media="screen, handheld">
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
                            <img src="https://fakeimg.pl/250x100/" class="d-block w-100 img-operator" alt="...">
                            <h1><?php echo $operator->getName(); ?>, rated <?php echo $operator->getRating(); ?>/5 by our clients</h1>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                
                                <form action="/apps/add-review.php" method="POST">

                                    <label for="rating">Want to rate this operator?</label>
                                    <input type="number" id="rating" name="rating" min="1" max="5">

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

    <script src="/js/rating.js"></script>
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