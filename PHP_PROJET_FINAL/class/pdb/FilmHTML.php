<?php

class FilmHTML
{
    public function getHTML($data, $table){ ?>
        <div class = "accordion-item">
            <h2 class = "accordion-header">
                <button class = "accordion-button collapsed" type = "button" data-bs-toggle = "collapse" data-bs-target = "#flush-collapseOne" aria-expanded = "true" aria-controls = "flush-collapseOne">
                    <div class = "card" style = "width: 100%;" data-bs-theme = "light">
                        <div class = "row g-0">
                            <div class = "col-md-1">
                                <img src = <?php echo $data->affiche?> class = "img-fluid rounded-start">
                            </div>
                            <div class = "col-md-5">
                                <div class = "card-body">
                                    <h5 class = "card-title"><?php echo $data->nom?></h5>
                                    <p class = "card-text">date : <?php echo $data->An_Sortie;?> durée : <?php echo $data->duree;?> genre : <?php echo $data->genre;?></p>
                                    <p class = "card-text">Acteurs:</p>
                                    <p class = "card-text">Réalisateurs: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </button> 
            </h2>
            <div id = "flush-collapseOne" class = "accordion-collapse collapse" data-bs-parent = "accordion">
                <div class = "accordion-body">Synopsis</div>
            </div>
        </div>

        
        
        <?php }
    

    public function getCardAc($data,$ind){
        if($ind==0){
            ?>
            <div class = "carousel-item active">
                 <div class = "card" style = "width: 18rem;">
                 <?php //var_dump($data->affiche);?>
                    <img src = <?php echo $data->affiche; ?> class = "card-img-top">
                    <div id = "textSeen" class = "card-body">
                        <h5 class = "card-title"><?php echo $data->nom;?> (
                        <?php echo $data->An_Sortie;?> )
                        </h5>
                        <p class = "card-text">Durée : <?php echo $data->duree;?> Genre : <?php echo $data->genre;?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        
        else{
        ?>
        <div class = "carousel-item">
            <div class = "card" style = "width: 18rem;">
                <img src = <?php echo $data->affiche; ?> class = "card-img-top">
                <div id = "textSeen" class = "card-body">
                    <h5 class = "card-title"><?php echo $data->nom;?> (
                    <?php echo $data->An_Sortie;?> )
                    </h5>
                    <p class = "card-text">Durée : <?php echo $data->duree;?> Genre : <?php echo $data->genre;?></p>
                </div>
            </div>
        </div>
        <?php
        }
    }
}