<?php
$logged = isset($_SESSION['nickname']) ;
?>

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
                    <?php if ($logged):?>
                        <div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                EDIT
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../edit/add.php">ADD</a></li>
                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            EDIT
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../edit/add.php">ADD</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                            </ul>
                        </div>
                        <a class="btn btn-dark" role="button" href="../client/logout.php">
                                Logout
                        </a>
                    <?php else: ?>
                        <a class="btn btn-dark" role="button" href="../client/login.php">
                            Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>