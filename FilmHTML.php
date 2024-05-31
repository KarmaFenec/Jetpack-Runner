<?php

class FilmHTML
{
    public function getHTML($data){ ?>
        <article class="films">
            <h1 class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $data->nom ?></h1>
            <?php //le nom dois conduire sur la fiche de l'article ?>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $data->nom ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="<?= "../../images/" . $data->affiche ?>">
                    <?= $data->description ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>


            <div class="film-content">
                <img src="<?= "../../images/" . $data->affiche ?>">
                <?php //la description apparaît par un accordion ?>
                <div class="film-description">
                    <?= $data->description ?>
                </div>
                
            </div>
        </article>
    <?php }
}