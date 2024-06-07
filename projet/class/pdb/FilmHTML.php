<?php

class FilmHTML
{
    public function getHTML($data, $table){ ?>
        <script>
        function handleClick(event,lien) {
            event.preventDefault(); 
            const dat = event.target.getAttribute('info');
            //const xhr = new XMLHttpRequest();
            //xhr.open('GET', lien+"?data="+ encodeURIComponent(dat));
            //xhr.send();
            //console.log(xhr);
            window.location.href = lien+"?data="+ encodeURIComponent(dat);

        
        }
        </script>
        <div class = "accordion-item">
            <h2 class = "accordion-header">
                <button class = "accordion-button collapsed" type = "button" data-bs-toggle = "collapse" data-bs-target = "#<?php echo $data->id?>" aria-expanded = "true" aria-controls = "flush-collapseOne">
                    <div class = "card" style = "width: 100%;" data-bs-theme = "light">
                        <div class = "row g-0">
                            <div class = "col-md-1">
                                <?php if($table=='film') : ?>
                                    <img src = <?php echo $data->affiche;?> class = "img-fluid rounded-start">
                                <?php endif;?>
                                <?php if($table=='personne') : ?>
                                    <img src = <?php echo $data->photo;?> class = "img-fluid rounded-start">
                                <?php endif;?>
                            </div>
                            <div class = "col-md-5">
                                <div class = "card-body">
                                    <?php if($table=='film') : ?>
                                    <h5 class = "card-title"><?php echo $data->nom?></h5>
                                    <p class = "card-text">date : <?php echo $data->An_Sortie;?> durée : <?php echo $data->duree;?> genre : <?php echo $data->genre;?></p>
                                    <?php
                                    //récupération des acteurs du films
                                    $fdb = new FilmPDO() ;
                                    $sql="SELECT * FROM personne WHERE id=";
                                    $tab=explode(',', $data->l_act);
                                    $sql=$sql.$tab[0];
                                    for($i=1 ; $i<count($tab) ; $i++){
                                        $sql=$sql."|| id=".$tab[$i];
                                    }
                                    $acteur=$fdb->genererRequest($sql);
                                    ?>
                                    <p class = "card-text">Acteurs: 
                                        <?php 
                                        foreach($acteur as $act){
                                            ?> <a href="acteur.php" info="<?php echo $act->id?>" onclick="handleClick(event,'acteur.php')"><?php echo $act->prenom;
                                            ?> <?php
                                            echo $act->nom;
                                            ?></a>,<?php
                                        }
                                         
                                    ?>
                                    
                                </p>
                                    <?php
                                    //récupération du réalisateur du film
                                    
                                    $sql="SELECT * FROM personne WHERE id=".$data->l_real;
                                    $real=$fdb->genererRequest($sql);
                                    ?>
                                    <p class = "card-text">Réalisateur:  <a href="realisateur.php" info="<?php echo $real[0]->id?>" onclick="handleClick(event,'realisateur.php')"> <?php  echo $real[0]->prenom?> <?php echo $real[0]->nom?></a></p>
                                    
                                    <?php endif;?>
                                    <?php if($table=='personne') : ?>
                                    <h5 class = "card-title"><?php echo $data->prenom?> <?php echo $data->nom?></h5>
                                    <p class = "card-text">Date de naissance: <?php echo $data->anNais;?></p>
                                    <?php
                                    //récupération des films de la personne
                                    $fdb = new FilmPDO() ;
                                    $sql="SELECT * FROM film WHERE id=";
                                    $tab=explode(',', $data->l_film);
                                    $sql=$sql.$tab[0];
                                    for($i=1 ; $i<count($tab) ; $i++){
                                        $sql=$sql."|| id=".$tab[$i];
                                    }
                                    $film=$fdb->genererRequest($sql);
                                    ?>
                                    <p class = "card-text">Film(s) : 
                                        <?php 
                                        foreach($film as $f){
                                            ?> <a href="film.php" info="<?php echo $f->id?>" onclick="handleClick(event,'film.php')"><?php echo $f->nom;
                                            ?></a>,<?php
                                        }
                                         
                                    ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </button> 
            </h2>
            <div id = "<?php echo $data->id?>" class = "accordion-collapse collapse" data-bs-parent = "accordion">
                <div class = "accordion-body"><?php echo $data->description?></div>
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