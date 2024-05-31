<?php

// Informations sur la BDD et le serveur qui la contient
$db_name = "cinema" ; // Nom de la base de données (pré-existante)
$db_host = "127.0.0.1" ; // Si le serveur MySQL est sur la machine locale
$db_port = "3306" ; // Port par défaut de MySQL

// Informations d'authentification de votre script PHP
$db_user = "root" ; // Utilisateur par défaut de MySQL (... à changer)
$db_pwd = "Maxence2004" ;  // Mot de passe par défaut pour l'utilisateur root (.. à changer !!!)

try{
    $dsn = 'mysql:dbname=' . $db_name . ';host='. $db_host. ';port=' . $db_port;
    $pdo = new PDO($dsn, $db_user, $db_pwd) ;
}catch(\Exception $ex){
    die("Erreur : " . $ex->getMessage()) ;
}

// Préparation d'une requête simple
$sql = "SELECT * FROM personne" ;
$statement = $pdo->prepare($sql) ;

// Exécution de la requête
$statement->execute() or die(var_dump($statement->errorInfo())) ;

// Récupération de la réponse sous forme d'un tableau d'objets
$results = $statement->fetchAll(PDO::FETCH_OBJ) ; 
var_dump($results) ;
?>