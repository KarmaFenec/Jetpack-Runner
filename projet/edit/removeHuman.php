<?php
require "../class/Autoloader.php";
require "../class/pdb/HumanDB.php";
require "../class/pdb/HumanForm.php";

Autoloader::register();
session_start();
$logged = isset($_SESSION['nickname']);
?>
<link rel="stylesheet" href="../css/addFilm.css">
<?php ob_start() ; ?>
<?php
$hf = new HumanForm();
$hdb = new HumanDB();
?>

<body>
<?php
    if (empty($_POST['name'])) {
        $hf->deleteHumanForm();

    } else {
        $hdb->deleteHuman($_POST['name']);
    }
?>
</body>

<script src = "../javascript/add.js"></script>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>
