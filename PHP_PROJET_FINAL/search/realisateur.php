<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";

Autoloader::register();
?>
<link rel = "stylesheet" href = "../css/films.css">
<?php

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$table = "personne";
$sql = "SELECT * FROM personne WHERE (metier = 'réalisateur' || metier = 'act_réal')";
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
                <h2>Vos réalisateurs</h2>
                <p>Votre liste des réalisateurs, triée par vous, pour vous</p>
            </div>
            <div id = "filtres">
                <!-- div pour mettre les différents filtres -->
                <nav class = "navbar" style = "padding-left: 50px;">
                    <div class = "container-fluid">
                        <form class = "d-flex" role = "search">
                            <input class = "form-control me-2" type = "search" placeholder = "Search" aria-label = "Search" name = "search">
                            <button class = "btn btn-outline-light" type = "submit">Search</button>
                            <?php $tag->genererFiltre($table); ?>
                        </form>
                    </div>
                </nav>
            </div>
            <?php 

//récupération de la donnée search
if($_GET!=null){
    if(key($_GET)=='search'){
        $param = $_GET['search'] ;
        // encodage avant affichage pour éviter les failles...
        $mot = htmlspecialchars($param) ;
        //var_dump($mot);
        if($mot!=""){
            $tab=explode(' ', $mot);
            if(count($tab)==2){
                $sql=$sql."&& (prenom LIKE '%".$tab[0]."%' || nom LIKE '%".$tab[1]."%')";  
            }
            else if(count($tab)==1){
                $sql=$sql."&& (prenom LIKE '%".$mot."%' || nom LIKE '%".$mot."%')";
            }
            else if(count($tab)>2){
                echo "<h2>Trop de mots différents  ! </h2>";
            }
            
        }
    }
    if(key($_GET)=='data'){
        $sql=$sql."&& id=".$_GET['data'];
    }
}

if(isset($_GET['options'])){
    $sql=$sql." ORDER BY ".$_GET['options'];
}

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