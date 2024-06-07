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
        $ff->editFilmForm();

    } else {
        
    }
?>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>