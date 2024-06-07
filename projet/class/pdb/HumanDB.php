<?php

require "../class/pdo/FilmPDO.php";
class FilmDB
{
    protected $fdb;

    public function createHuman($name, $firstname, $imgFile = null, $description = null, $anNais = null, $metier = null)
    {
        // On doit pouvoir créer un film/acteur/réalisateur
        $fdb = new FilmPDO();
        $bd = $fdb->genererRequest('SELECT COUNT(*) AS nbPersonne FROM personne');
        $id = $bd[0]->nbPersonne;

        $name = htmlspecialchars($name);
        $firstname = htmlspecialchars($firstname);
        $description = htmlspecialchars($description);
        $nom_films = htmlspecialchars($nom_films);
        $metier = htmlspecialchars($metier);
        
        // enregistrement du fichier uploadé
        $dirName = "../photo/";
        $dirImg = $dirName . $imgFile;
        /*
        $sql_act=$fdb->genererRequest("SELECT id FROM film WHERE nom='".$nom_films."'");
        if(!empty($sql_act)){
            $act="'".$sql_act[0]->id."'";
        }
        else{
            $act=" ' ' ";
        }
        */
        $query = "INSERT INTO personne VALUES (".$id.", '".$firstname."', '".$name."', '".$anNais."', '".$description."', ".$dirImg.", ".$metier.", ".$nom_films.")";
        var_dump($query);
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php"); // vers accueil.php
    }

    public function deleteHuman($id){
        $fdb = new FilmPDO();
        $query = "DELETE FROM personne WHERE id = ".$id;
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php"); // vers accueil.php
    }

    public function editHuman($id,$columns,$value){
        $fdb = new FilmPDO();
        $query="UPDATE personne SET ".$columns."= ".$value. " WHERE id = ".$id;
        var_dump($query);
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php"); // vers accueil.php
    }
}