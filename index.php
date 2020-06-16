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
    <!--<link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/semantic.css">-->
    <link rel="stylesheet" href="css/mobile-first.css">
    <link rel="stylesheet" href="css/style.css" media="screen, handheld">
</head>
<body>
<header>
    <!--start NAV-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span><i class="fas fa-plane-departure fa-3x logo-icon"></i></span>
        <a class="navbar-brand btn btn-nav" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-nav" href="#">Tour-Operators<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 input-search" type="search" placeholder="Tour-Operator..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--End NAV-->


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

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="" class="contact-link"><h2>Contact</h2></a><br>
                <a href="" class="contact-link"><h4>About Us</h4></a><br>
                <a href="partials/mentions-legale.php" class="contact-link">Mentions Légales</a>
            </div>

            <div class="col-6">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook fa-3x reseau"></i></a>
                <a href="https://twitter.com/"><i class="fab fa-twitter fa-3x reseau"></i></a>
                <a href="https://www.twitch.tv/sintica"><i class="fab fa-linkedin-in fa-3x reseau"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="js/semantic.min.js"></script>
<script src="js/semantic.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>