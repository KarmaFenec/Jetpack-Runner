<?php

require "../class/Autoloader.php";
Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">ACCUEIL</div>

<?php if($logged): ?>
<h1>Hi <?php echo $_SESSION['nickname'] ?></h1>
<?php endif; ?>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>