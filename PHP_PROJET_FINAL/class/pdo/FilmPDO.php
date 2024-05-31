<?php

class FilmPDO {
    // Informations sur la BDD et le serveur qui la contient
    private $db_name = "cinema" ; // Nom de la base de données (pré-existante)
    private $db_host = "127.0.0.1" ; // Si le serveur MySQL est sur la machine locale
    private $db_port = "3306" ; // Port par défaut de MySQL

    // Informations d'authentification de votre script PHP
    private $db_user = "root" ; // Utilisateur par défaut de MySQL
    private $db_pwd = "Maxence2004" ;  // Mot de passe par défaut pour l'utilisateur root

    public function genererRequest($sql){
        try{
            $dsn = 'mysql:dbname=' . $this->db_name . ';host='. $this->db_host. ';port=' . $this->db_port;
            $pdo = new PDO($dsn, $this->db_user, $this->db_pwd) ;
            }catch(\Exception $ex){
            die("Erreur : " . $ex->getMessage()) ;
        }
        // Exécution de la requête
        $statement = $pdo->prepare($sql) ;
        $statement->execute() or die(var_dump($statement->errorInfo())) ;

        // Récupération de la réponse sous forme d'un tableau d'objets
        $results = $statement->fetchAll(PDO::FETCH_OBJ) ; 
        return $results;
    }
}
?>