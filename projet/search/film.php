<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";
require "../class/Tag.php";

Autoloader::register();
?>
<link rel = "stylesheet" href = "../css/films.css">
<?php

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$table = "film";
$sql = "SELECT * FROM film";
$fdb = new FilmPDO() ;
$fhtml = new FilmHTML();
$tag = new Tag();
//var_dump($data);
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>


<?php //GENERALISABLE ?>



<div id="main_content">

<div id = "text">
    <h2>Vos Films</h2>
    <p>Votre liste de films, triée par vous, pour vous</p>
</div>
<div id="filtres">
    <div id="filtre_content">
        <?php $tag->genererFiltre(); ?>
        <?php //On filtre?>
        <?php
        if (isset($_GET['genres'])) {
            $sql=$sql." WHERE genre LIKE";
            $selectedGenres = $_GET['genres'];
            $i = 0;
            foreach ($selectedGenres as $genre) {
                if($i!=0){
                    $sql=$sql." OR genre LIKE ";
                }
                $mot = htmlspecialchars($genre);
                $sql=$sql."'%".$mot."%'";
                $i=$i+1;
            }
        }
        ?>
    </div>
    <!-- div pour mettre les différents filtres -->
    <nav class = "navbar" style = "padding-left: 50px;">
        <div class = "container-fluid">
            <form class = "d-flex" role = "search">
                <input class = "form-control me-2" type = "search" placeholder = "Search" aria-label = "Search" name = "sear">
                <button class = "btn btn-outline-light" type = "submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<?php 
//récupération de la donnée search
if(isset($_GET['sear'])){
    $param = $_GET['sear'] ;
    // encodage avant affichage pour éviter les failles...
    $mot = htmlspecialchars($param);
    if($mot!=""){
        $sql=$sql." WHERE nom LIKE '%".$mot."%'";
    }
}
$sql=$sql." ORDER BY nom ";
$data =$fdb->genererRequest($sql);
if($data==null){
    echo "<h2 id='text'>Aucun résultat de ".$mot." </h2>";
}
?>




<?php //On affiche les films?>
    <div id = "accordion" class = "accordion accordion-flush" data-bs-theme = "dark">
        <?php foreach ($data as $d): ?>
            <?= $fhtml->getHTML($d, $table); ?>
        <?php endforeach;?>
        </div>
</div>
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>