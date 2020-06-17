

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
    <link rel="stylesheet" href="css/style.css" media="screen, handheld">
</head>
<body>
<header>
    <?php
        include 'partials/nav.php';
    ?>


    <!--Start Carousel-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev carousel-swipe" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next carousel-swipe" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--end Carousel-->
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-2 col-sm-1">
                <div class="card card-1">
                    <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
                    <span class="d2">
                    <h1>Lorem</h1>
                    <button class="btn btn-card"><a href="views/destinations.php">Voir plus</a></button>
                </div>
            </div>

            <div class="col-lg-4 col-md-2 col-sm-1">
                <div class="card card-1">
                    <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
                    <span class="d2">
                    <h1>Lorem</h1>
                    <button class="btn btn-card">Positive</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-2 col-sm-1">
                <div class="card card-1">
                    <img src="https://fakeimg.pl/250x100/" class="d-block w-100" alt="...">
                    <span class="d2">
                    <h1>Lorem</h1>
                    <button class="btn btn-card">Positive</button>
                </div>
            </div>
        </div>
    </div>
</main>

<!--footer-->
<?php
include 'partials/footer.php';
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>