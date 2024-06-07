<?php
$logged = isset($_SESSION['nickname']) ;
?>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<header>
    <nav class = "navbar bg-body-tertiary" data-bs-theme="dark">
        <div class = "container">
            <a class = "navbar-brand" href = "../pages/accueil.php">
                <img src = "../images/logo-corp.png" alt = "Bootstrap" width="30" height = "24">
            </a>
            <button class = "btn btn-primary" type = "button" data-bs-theme="dark" data-bs-toggle="offcanvas" data-bs-target = "#offcanvasTop" aria-controls="offcanvasTop">Menu</button>
            <div>
                <div class ="offcanvas offcanvas-top" tabindex="-1" id ="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                    <div class ="offcanvas-header">
                        <h5 class ="offcanvas-title" id = "offcanvasTopLabel">FilmilyGuys</h5>
                        <button type = "button" class ="btn-close" data-bs-dismiss = "offcanvas" aria-label = "Close"></button>
                    </div>
                    <div class = "offcanvas-body">
                        <a class="navbar-brand" href="../search/acteur.php">
                            Acteur
                        </a>
                        <a class="navbar-brand" href="../search/film.php">
                            Film
                        </a>
                        <a class="navbar-brand" href="../search/realisateur.php">
                            Réalisateur
                        </a>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <?php if ($logged):?>
                        <div class = "btn-group" role = "group">
                            <button type = "button" class = "btn btn-primary" >
                                <a href = "#" style = "text-decoration: none; color: white">ADD</a>
                            </button>
                            <button type = "button" class = "btn btn-primary" >
                                <a href = "#" style = "text-decoration: none; color: white">EDIT</a>
                            </button>
                            
                        </div>
                        <a class="btn btn-outline-secondary" role="button" href="../client/logout.php">
                                Logout
                            </a>
                    <?php else: ?>
                        <a class="btn btn-secondary" role="button" href="../client/login.php">
                            Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
