<?php

require "../pdo/FilmPDO.php";

class GameDB
{
    public function getAllGames(){
        return $this->exec(
            "SELECT * FROM games ORDER BY name", null, 'FilmHTMl') ;
    }
}
?>