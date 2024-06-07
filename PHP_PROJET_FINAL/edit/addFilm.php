<?php
require "../class/Autoloader.php";
require "../class/pdb/FilmDB.php";
require "../class/pdb/FilmForm.php";

Autoloader::register();
session_start();
$logged = isset($_SESSION['nickname']);
?>

<?php ob_start() ; ?>
<?php
$ff = new FilmForm();
$fdb = new FilmDB();
?>

<body>
<?php
    if (!isset($_POST['name'])) {
        $ff->genererFilmForm();
    } else {
        var_dump($_POST);
        $fdb->createFilm($_POST['name'], $_POST['affiche'], $_POST['synopsis'], $_POST['genre'], $_POST['nom_real'],$_POST['prenom_real'], $_POST['nom_act'],$_POST['prenom_act'], $_POST['sortie'], $_POST['duree']);
    }
?>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>