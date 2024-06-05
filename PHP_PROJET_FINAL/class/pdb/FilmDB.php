<?php

require "../pdo/FilmPDO.php";

class FilmDB
{

    protected $fdb;
    protected $nbre_films;

    public function createFilm($name, $imgFile, $description, $genre, $reals, $acts, $anSortie, $duree){
        //On doit pouvoir créé un film/acteur/réalisateur
        $fdb = new FilmPDO() ;
        $bd =$fdb->genererRequest('SELECT COUNT(*) AS nbFilm FROM film');
        $id=$bd->nbFilm+1;

        $name = htmlspecialchars($name) ;
        $description = htmlspecialchars($description) ;
        $genre = htmlspecialchars($genre) ;
        $reals = htmlspecialchars($reals) ;
        $acts = htmlspecialchars($acts) ;

        $imgName = null ;
        // enregistrement du fichier uploadé
        if($imgFile != null){
            $tmpName = $imgFile['tmp_name'] ;
            $imgName = $imgFile['name'] ;
            $imgName = urlencode(htmlspecialchars($imgName)) ;

            $dirname = $GLOBALS['PHP_DIR'].self::UPLOAD_DIR ;
            if(!is_dir($dirname)) mkdir($dirname) ;
            $uploaded = move_uploaded_file($tmpName, $dirname.$imgName) ;
            if (!$uploaded) die("FILE NOT UPLOADED") ;
        }else echo "NO IMAGE !!!!" ;

        $query = 'INSERT INTO film VALUES ($id, $name, $imgName, $description, $genre, $reals, $acts, $anSortie, false, $duree)';
        return $query ;
    }

    public function createPersonne($name, $description=null, $imgFile=null){
        //En cours
    }
}