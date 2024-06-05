<?php
$logged = isset($_SESSION['nickname']) ;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<header >
    <nav class = "navbar bg-body-tertiary" data-bs-theme="dark">
        <div class = "container">

            <!-- remplacer par le logo -->
            <a class = "navbar-brand" href = "../pages/accueil.php">
                <img src = "../images/logo-corp.png"  width="30" height = "24">
            </a>

            <!-- bouton du offcanva -->
            <button class = "btn btn-warning" type = "button" data-bs-theme="dark" data-bs-toggle="offcanvas" data-bs-target = "#offcanvasTop" aria-controls="offcanvasTop">Menu</button>
        
            <!-- offcanva -->
            <div class ="offcanvas offcanvas-top" tabindex="-1" id ="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class ="offcanvas-header">
                    <button type = "button" class ="btn-close" data-bs-dismiss = "offcanvas" aria-label = "Close"></button>
                </div>

                <div id = "offcanvaHeader" class = "offcanvas-header" data-bs-scroll="true">
                    <!-- mettre le logo ici -->
                    <h2 class = "titre">The Film Guy</h2>
                </div>

                <div id = "offcanva" class = "offcanvas-body" data-bs-scroll = "true">
                    <button type = "button" class = "btn btn-warning btn-lg"><a class="navbar-button" href="../search/film.php">Film</a></button>
                    <button type = "button" class = "btn btn-warning btn-lg"><a class="navbar-button" href="../search/acteur.php">Acteurs</button>
                    <button type = "button" class = "btn btn-warning btn-lg"><a class="navbar-button" href="../search/realisateur.php">Réalisateurs</button>
                    <div class="btn-group" role="group">
                    <?php if ($logged):?>
                    <div class="dropdown">
                        <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    EDIT
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../client/addDB.php">ADD</a></li>
                                    <li><a class="dropdown-item" href="#">DELETE</a></li>
                                    <li><a class="dropdown-item" href="#">UPDATE</a></li>
                                    </ul>
                                </div>
                                <a class="btn btn-dark" role="button" href="../client/logout.php">
                                    Logout
                                </a>
                            </div>
                        <?php else: ?>
                            <a class="btn btn-dark" role="button" href="../client/login.php">
                                Login
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>