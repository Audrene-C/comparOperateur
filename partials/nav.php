<!--start NAV-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span><i class="fas fa-plane-departure fa-3x logo-icon"></i></span>
    <a class="navbar-brand btn btn-nav" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link btn btn-nav" href="views/operators.php">Tour-Operators<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form action="/views/operators.php" method="POST" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 input-search" name="search" type="search" placeholder="Tour-Operator..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--End NAV-->

