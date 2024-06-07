<?php
require "../class/Autoloader.php";
Autoloader::register();
session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<link rel = "stylesheet" href = "../css/add.css">
<?php ob_start() ; ?>

<body>
<div id = "main_content" style = "flex-direction: column; justify-content: center; align-items: center;">
    <h2 id = "titre">Voulez-vous supprimer:</h2>
    <div id = "choix">
        <div id = "divFilm">
            <a id = "aFilm" class = "before" href = "removeFilm.php"><span id="spanFilm">Un film</span></a>
        </div>
        <div id = "divPersonne">
            <a id = "aPersonne" class = "before" href = "removeHuman.php"><span id = "spanPersonne">Une personne</span></a>
        </div>
    </div>
</div>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>
