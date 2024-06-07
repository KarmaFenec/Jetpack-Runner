<?php


class Tag
{
    public function genererFiltre(){
    ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Filtre">Filtre</button>
    
    <div class="modal fade" id="Filtre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filtre</h1>
    </div>
    <div class="container mt-5">
        <form method="GET" action="">
            <div class="form-group">
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
                <!-- Ajoutez plus de genres si nécessaire -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filtrer</button>
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