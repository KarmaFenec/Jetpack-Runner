<?php

require "../class/Autoloader.php";
require "../class/pbd/FilmBD.php";
Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$gdb = new GameDB() ;
$data =$gdb->getAllGames();
//var_dump($data);
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">ACCUEIL</div>

<?php if($logged): ?>
<h1>Hi <?php echo $_SESSION['nickname'] ?></h1>
<?php endif; ?>

<?php //On affiche les films?>
<section class="films-list">
    <?php foreach ($data as $d): ?>
        <?= $d->getHTML(); ?>
    <?php endforeach;?>
</section>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>