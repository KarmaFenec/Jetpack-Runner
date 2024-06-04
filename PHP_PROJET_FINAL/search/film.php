<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";

Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$table = "film";
$sql = "SELECT * FROM film ORDER BY nom";
$fdb = new FilmPDO() ;
$fhtml = new FilmHTML();
$data =$fdb->genererRequest($sql);
//var_dump($data);
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">FILMS</div>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
</nav>

<div class="main-content">
<?php //On affiche les films?>
    <section class="films-list">
        <?php foreach ($data as $d): ?>
            <?= $fhtml->getHTML($d, $table); ?>
        <?php endforeach;?>
    </section>
</div>

<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>