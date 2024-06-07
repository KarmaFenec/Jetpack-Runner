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
            <button class = "btn btn-warning" type = "button" data-bs-theme="dark" data-bs-toggle="offcanvas" data-bs-target = "#offcanvasTop" aria-controls="offcanvasTop">Menu</button>
            <div>
                <div class ="offcanvas offcanvas-top" tabindex="-1" id ="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                    <div class ="offcanvas-header">
                        <h2 class = "offcanvas-header">TheFilmGuy</h5>
                        <button type = "button" class ="btn-close" data-bs-dismiss = "offcanvas" aria-label = "Close"></button>
                    </div>
                    <div class = "offcanvas-body">
                        <button type = "button" class = "btn btn-warning btn-lg"><a href = "../search/film.php" style = "text-decoration: none; color: black;">Films</a></button>
                        <button type = "button" class = "btn btn-warning btn-lg"><a href = "../search/acteur.php" style = "text-decoration: none; color: black;">Acteurs</a></button>
                        <button type = "button" class = "btn btn-warning btn-lg"><a href = "../search/realisateur.php" style = "text-decoration: none; color: black;">Realisateurs</a></button>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <?php if ($logged):?>
                        <div class="dropdown">
                            <div class="btn-group" role="group">
                                <button type = "button" class = "btn btn-primary">
                                    <a href = "../edit/add.php" style = "text-decoration: none; color: white;">ADD</a>
                                </button>
                                <button type = "button" class = "btn btn-primary">
                                    <a href = "../edit/delete.php" style = "text-decoration: none; color: white;">DELETE</a>
                                </button>
                                <button type = "button" class = "btn btn-primary">
                                    <a href = "../edit/edit.php" style = "text-decoration: none; color: white">EDIT</a>
                                </button>
                            </div>
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
