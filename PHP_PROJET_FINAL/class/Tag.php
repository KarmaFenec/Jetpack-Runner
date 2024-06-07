<?php


class Tag
{
    public function genererFiltre($table){
    ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Filtre">Trier</button>
    
    <div class="modal fade" id="Filtre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filtre par genre</h1>
    </div>
    <div class="container mt-5">
        <form method="GET" action="">
            <div class="form-group">
                <?php if($table=='film'):?>
                <label for="genres">Genres :</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="Action" id="action">
                    <label class="form-check-label" for="action">Action</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="Comédie" id="comedie">
                    <label class="form-check-label" for="comedie">Comédie</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="Drame" id="drame">
                    <label class="form-check-label" for="drame">Drame</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="Fantastique" id="fantastique">
                    <label class="form-check-label" for="fantastique">Fantastique</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="genres[]" value="Horreur" id="horreur">
                    <label class="form-check-label" for="horreur">Horreur</label>
                </div>
                <?php endif;?>
                <p>Trier par :</p>

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="nom" value="nom" autocomplete="off" checked> Nom
                    </label>
                    <?php if($table=='film'):?>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="Année de Sortie" value="An_Sortie" autocomplete="off"> Année de Sortie
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="duree" value="duree" autocomplete="off"> Durée
                    </label>
                    <?php endif;?>
                    <?php if($table=='personne'):?>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="Anniversaire" value="anNais" autocomplete="off"> Anniversaire
                    </label>
                    <?php endif;?>
                </div>
                <!-- Ajoutez plus de genres si nécessaire -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    <?php
    }
}
?>