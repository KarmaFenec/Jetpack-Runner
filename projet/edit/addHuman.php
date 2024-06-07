<?php
require "../class/Autoloader.php";
require "../class/pdb/HumanDB.php";
require "../class/pdb/HumanForm.php";

Autoloader::register();
session_start();
$logged = isset($_SESSION['nickname']);
?>

<?php ob_start() ; ?>
<?php
$hf = new HumanForm();
$hdb = new HumanDB();
?>

<body>
<?php
    if (!isset($_POST['name'])) {
        $hf->genererHumanForm();
    } else {
        var_dump($_POST);
        $hdb->createHuman($_POST['nom'], $_POST['prénom'], $_POST['formFile'], $_POST['bio'], $_POST['naissance'], $_POST['inlineRadioOptions']);
    }
?>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>