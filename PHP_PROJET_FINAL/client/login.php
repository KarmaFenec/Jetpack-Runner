<?php
require "../class/Autoloader.php";
Autoloader::register();

?>

<link rel = "stylesheet" href = "../css/logger.css">

<?php
session_start() ;

include "../class/Logger.php" ;

ob_start() ;

$logger = new Logger() ;

$username = null;
$password = null ;
if (isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    $response = $logger->log(trim($username), trim($password)) ;
    if ($response['granted']){
        $_SESSION['nickname'] = $response['nick'] ;
        header("Location: ../pages/accueil.php");
        exit() ;
    }
}

if (!isset($response)) :
    $logger->generateLoginForm("", $username);
elseif (!$response['granted']) :
    echo "<div class='magic-card' id='error'>" .$response['error']."</div>" ;
    $logger->generateLoginForm("", $username, $response['error']);
endif;

?>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>