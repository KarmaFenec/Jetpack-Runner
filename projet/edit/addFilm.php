<?php
require "../class/Autoloader.php";
require "../class/pdb/FilmDB.php";
require "../class/pdb/FilmForm.php";

Autoloader::register();
session_start();
$logged = isset($_SESSION['nickname']);
?>
<link rel="stylesheet" href="../css/addFilm.css">
<?php ob_start() ; ?>
<?php
$ff = new FilmForm();
$fdb = new FilmDB();
?>

<body>
<?php
    if (empty($_POST['name'])) {
        $ff->genererFilmForm();
    } else {
        echo ($val);
        //$imgFile = isset($_FILES['image']) ? $_FILES['image'] : null;
        $imgFile = isset($_POST['image']) ? $_POST['image'] : null;
        $fdb->createFilm($_POST['name'], $imgFile, $_POST['description'], $_POST['genre'], $_POST['reals'], $_POST['acts'], $_POST['anSortie'], $_POST['duree']);
    }
?>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>
