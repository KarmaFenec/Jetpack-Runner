<?php

require "../class/Autoloader.php";
Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">REALISATEURS</div>

<div class="main-content">
    FICHE
</div>

<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>