<?php

class FilmHTML
{
    public function getHTML($data, $table){ ?>
    <?php //Vérifier si c un film, un acteur ou un réal ?>
        <article class="films">
            <h1 class="btn btn-primary" data-bs-toggle="modal" data-bs-target=<?= $data->id ?>><?= $data->nom ?></h1>
            <?php //le nom dois conduire sur la fiche de l'article ?>


            <div class="modal fade" id=<?= $data->id ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php //l'article complet?>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $data->nom ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img class="modal-img" src="<?= $data->affiche ?>">
                    <div class="modal-text">
                        <?= $data->description ?>
                    </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
            </div>

            <?php //le core de l'affichage minimal ?>
            <div class="film-content">
                <img class="modal-img" src="<?= $data->affiche ?>">
                <?php //la description apparaît par un accordion ?>
                <div class="film-description">
                    <?= $data->description ?>
                </div>
                
            </div>
        </article>
    <?php }
}