<?php

require "../class/pdo/FilmPDO.php";
class FilmDB
{
    protected $fdb;

    public function createFilm($name, $imgFile = null, $description = null, $genre = null, $nom_real = null,$prenom_real = null, $nom_act = null,$prenom_act = null ,$anSortie = null, $duree = null)
    {
        // On doit pouvoir créer un film/acteur/réalisateur
        //var_dump('test');
        $fdb = new FilmPDO();
        $bd = $fdb->genererRequest('SELECT COUNT(*) AS nbFilm FROM film');
        $id = $bd[0]->nbFilm;
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $genre = htmlspecialchars($genre);
        $prenom_act = htmlspecialchars($prenom_act);
        $nom_act = htmlspecialchars($nom_act);
        $prenom_real = htmlspecialchars($prenom_real);
        $nom_real = htmlspecialchars($nom_real);
        //var_dump('test');
        $view = false;
        
        // enregistrement du fichier uploadé
        $dirName = "../affiche/";
        $dirImg = $dirName . $imgFile;
        /*
        if ($imgFile != null) {
            $tmpName="C:\Users\p2cma\Images".$imgFile;
            $imgName = $imgFile;

            $dirName = "../affiche/";
            $dirImg = $dirName . $imgName;
            var_dump($dirImg);
            var_dump($tmpName);
            if (!is_dir($dirName)) mkdir($dirName);
            $uploaded = move_uploaded_file($tmpName, $dirImg);
            if (!$uploaded) die("FILE NOT UPLOADED");
        } else {
            echo "NO IMAGE !!!!";
        }
            */
        var_dump("SELECT id FROM personne WHERE prenom='".$prenom_real."' && nom='".$nom_real."'");
        $sql_reals=$fdb->genererRequest("SELECT id FROM personne WHERE prenom='".$prenom_real."' && nom='".$nom_real."'");
        var_dump($sql_reals);
        if(!empty($sql_reals)){
            $reals="'".$sql_reals[0]->id."'";
        }
        else{
            $reals=" ' ' ";
        }
        $sql_act=$fdb->genererRequest("SELECT id FROM personne WHERE prenom='".$prenom_act."' && nom='".$nom_act."'");
        if(!empty($sql_act)){
            $act="'".$sql_act[0]->id."'";
        }
        else{
            $act=" ' ' ";
        }
        $query = "INSERT INTO film VALUES (".$id.", '".$name."', '".$dirImg."', '".$description."', '".$genre."', ".$reals.", ".$act.", ".$anSortie.", false ,'".$duree."')";
        var_dump($query);
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php"); // vers accueil.php
    }

    public function deleteFilm($id){
        //var_dump(("SELECT id FROM film WHERE name = '".$name."'"));
        //$id = $fdb->genererRequest("SELECT id FROM film WHERE nom = '".$name."'");
        //var_dump($id);
        $fdb = new FilmPDO();
        $query = "DELETE FROM film WHERE id = ".$id;
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php"); // vers accueil.php
    }

    public function editFilm($id,$columns,$value){
        $fdb = new FilmPDO();
        $query="UPDATE film SET ".$columns."= ".$value. " WHERE id = ".$id;
        var_dump($query);
        $data = $fdb->genererRequest($query);
        header("Location: ../pages/accueil.php");
    }
}