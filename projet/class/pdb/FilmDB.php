<?php

use \pdo\FilmPDO;

class FilmDB
{
    protected $fdb;
    protected $nbre_films;

    public function createFilm($name, $imgFile = null, $description = null, $genre = null, $reals = null, $acts = null, $anSortie = null, $duree = null)
    {
        // On doit pouvoir créer un film/acteur/réalisateur
        $fdb = new FilmPDO();
        $bd = $fdb->genererRequest('SELECT COUNT(*) AS nbFilm FROM film');
        $bd = $bd->nbFilm + 1;
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $genre = htmlspecialchars($genre);
        $reals = htmlspecialchars($reals);
        $acts = htmlspecialchars($acts);

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

        $query = "INSERT INTO film (name, img, description, genre, reals, acts, anSortie, duree) VALUES ('$name', '$dirImg', '$description', '$genre', '$reals', '$acts', '$anSortie', '$duree')";
        $fdb->executeRequest($query);
        header("Location: pages/accueil.php"); // vers accueil.php
        return $query;
    }
}