<?php


class Autoloader
{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload')) ;
    }

    static function autoload($class_name){
        $class_name = str_replace('\\', '/', $class_name) ;
        require $class_name . '.php' ;

        ?>
        <link rel = "stylesheet" href = "css/films.css">
        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <?php
    }

}
?>