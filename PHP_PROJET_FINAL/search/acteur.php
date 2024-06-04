<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";

Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$table = "personne";
$sql = "SELECT * FROM personne ORDER BY nom WHERE metier = act";
$fdb = new FilmPDO() ;
$fhtml = new FilmHTML();
$data =$fdb->genererRequest($sql);
//var_dump($data);
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">ACTEURS</div>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
</nav>

<div class="main-content">
<?php //On affiche les acteurs?>
    <section class="acteurs-list">
        <?php foreach ($data as $d): ?>
            <?= $fhtml->getHTML($d, $table); ?>
        <?php endforeach;?>
    </section>
</div>

<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>