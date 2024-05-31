<?php

require "../class/Autoloader.php";
Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<link rel = "stylesheet" href = "css/home.css">
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">ACTEURS</div>

<div class="main-content">
    FICHE
</div>


<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>