<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";

Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$table = "personne";
$sql = "SELECT * FROM personne  WHERE(metier = 'réalisateur' || metier = 'act_réal') ";
$fdb = new FilmPDO() ;
$fhtml = new FilmHTML();
//var_dump($data);

?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<?php //GENERALISABLE ?>
<header>
<div class="title">ACTEURS</div>

<?php //A FAIRE ?>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'>
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    </div>
</nav>

<?php 
//récupération de la donnée search
if($_GET!=null){
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
$sql=$sql." ORDER BY nom ";
$data =$fdb->genererRequest($sql);
if($data==null){
    echo "<h2>Aucun résultat de ".$mot." </h2>";
}
?>

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