<?php

use \pdo\FilmPDO;

class FilmDB
{
    protected $fdb;
    protected $nbre_films;

    public function createFilm($name, $imgFile = null, $description = null, $genre = null, $reals = null, $acts = null, $anSortie = null, $duree = null)
    {
        // On doit pouvoir créer un film
        $fdb = new FilmPDO();
        $id = $fdb->genererRequest('SELECT COUNT(*) AS nbFilm FROM film ;');
        $id = $id + 1;
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $genre = htmlspecialchars($genre);
        $reals = htmlspecialchars($reals);
        $acts = htmlspecialchars($acts);

        $view = false;
        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirName = __DIR__ . "/". "affiche/";
            $dirImg = $dirName . $imgName;
            if (!is_dir($dirName)) mkdir($dirName);
            $uploaded = move_uploaded_file($tmpName, $dirImg);
            if (!$uploaded) die("FILE NOT UPLOADED");
        } else {
            echo "NO IMAGE !!!!";
        }

        $query = "INSERT INTO film VALUES ('$id', '$name', '$dirImg', '$description', '$genre', '$reals', '$acts', '$anSortie', '$view' ,'$duree');";
        $data = $fdb->genererRequest($query);
        header("Location: pages/accueil.php"); // vers accueil.php
        return $query;
    }

    public function deleteFilm($name)
    {
        // On doit pouvoir delete un film
        $id = $fdb->genererRequest("SELECT id FROM film WHERE name LIKE ".$name.";");
        $query = "DELETE FROM film WHERE (".$id.");";
        $data = $fdb->genererRequest($query);
        header("Location: pages/accueil.php"); // vers accueil.php
        return $query;
    }

    public function updateFilm($id, $column, $value)
    {
        // On doit pouvoir delete un film
        $query = "UPDATE film SET ".$column." = ".$value." WHERE ('$id')";
        $data = $fdb->genererRequest($query);
        header("Location: pages/accueil.php"); // vers accueil.php
        return $query;
    }

}
