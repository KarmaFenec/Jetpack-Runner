<?php

require "../class/Autoloader.php";
require "../class/pdo/FilmPDO.php";
require "../class/pdb/FilmHTML.php";
Autoloader::register();

?>
<link rel = "stylesheet" href = "../css/home.css">
<?php

session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<!-- Démarre le buffering -->
<?php ob_start() ;
$fdb = new FilmPDO() ;
$fhtml = new FilmHTML();?>



<body>
        <div id = "main_content">
            <div id = "seen">
                <?php 
                    //Récupération des données des films vu
                    $sql="SELECT affiche,nom,An_Sortie,genre,duree FROM film WHERE !film_vu";
                    $data =$fdb->genererRequest($sql);
                    //var_dump($data);
                    if($data!=null){
                ?>
                <h2 class='titre'>Films non vus</h2>
                <div id = "carouselCardSeen" class = "carousel slide carousel-fade">
                    <div id = "cards" class = "carousel-inner">
                        <?php
                            $i=0;
                            foreach($data as $d){
                                $fhtml->getCardAc($d,$i);
                                $i++; 
                            }
                            
                        ?>

                        

                    </div>
    
                    <button class = "carousel-control-prev" type = "button" data-bs-target = "#carouselCardSeen" data-bs-slide = "prev">
                        <span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
                    </button>
                    <button class = "carousel-control-next" type = "button" data-bs-target = "#carouselCardSeen" data-bs-slide = "next">
                        <span class = "carousel-control-next-icon" aria-hidden = "true"></span>
                    </button>
                </div>
                <?php 
                }else{
                    echo"<h2> Il n'y a pas de film de vu dans notre liste</h2>";  
                } ?>
            </div>

            <div id = "notSeen">
            <?php 
                    //Récupération des données des films vu
                    $sql2="SELECT affiche,nom,An_Sortie,genre,duree FROM film WHERE film_vu";
                    $data2 =$fdb->genererRequest($sql2);
                    //var_dump($data);
                    if($data2!=null){
                ?>
                <h2 class='titre'>Films vus</h2>
                <div id = "carouselCardNotSeen" class = "carousel slide carousel-fade">
                    <div class = "carousel-inner">
                        <div class = "carousel-item active">
                        <?php
                            $i=0;
                            foreach($data2 as $d1){
                                $fhtml->getCardAc($d1,$i);
                                $i++; 
                            }
                            
                        ?>
    
                    <button class = "carousel-control-prev" type = "button" data-bs-target = "#carouselCardNotSeen" data-bs-slide = "prev">
                        <span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
                    </button>
                    <button class = "carousel-control-next" type = "button" data-bs-target = "#carouselCardNotSeen" data-bs-slide = "next">
                        <span class = "carousel-control-next-icon" aria-hidden = "true"></span>
                    </button>
                </div>
                <?php 
                }else{
                    echo"<h2 class='titre'> Il n'y a pas de film de vu dans notre liste</h2>";  
                } ?>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>