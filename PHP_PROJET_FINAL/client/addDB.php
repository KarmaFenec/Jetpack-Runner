<?php

require "../class/Autoloader.php";
require "../class/pdb/AddingDB.php";

Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;

//On récupère la base de donnée
$adb = new AddingDB();

?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">EDIT</div>

<div class="main-content">
<?php
    $adb->generateFormFilm() ;
?>
</div>

<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>