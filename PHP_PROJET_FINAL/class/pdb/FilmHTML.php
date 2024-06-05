<?php

class FilmHTML
{
    public function getHTML($data, $table){ ?>
    <?php //Vérifier si c un film, un acteur ou un réal ?>
    <?php if($table == "film"): ?>
        <article class="films">
    <?php endif ?>

    <?php if($table == "personne"): ?>
        <article class="personnes">
    <?php endif ?>

            <h1 class="btn btn-primary" data-bs-toggle="modal" data-bs-target=<?= "#".$data->id ?>><?= $data->nom ?></h1>
            <?php //le nom dois conduire sur la fiche de l'article ?>
            <div class="modal fade" id=<?= $data->id ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <?php //l'article complet?>
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php if($table == "film"): ?>
                                <h1 class="modal-title fs-5" id="ModalLabel"><?= $data->nom ?></h1>
                            <?php endif ?>
                            <?php if($table == "personne"): ?>
                                <h1 class="modal-title fs-5" id="ModalLabel"><?= $data->nom . $data->prenom ?></h1>
                            <?php endif ?>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if($table == "film"): ?>
                                <img class="modal-img" src="<?= $data->affiche ?>">
                                <?= "Genre :" . $data->genre?>
                                <?= "Année de Sortie :" . $data->An_Sortie?>
                            <?php endif ?>
                            <?php if($table == "personne"): ?>
                                <img class="modal-img" src="<?= $data->photo ?>">
                                <?= $data->genre?>
                                <?= "Année de Naissance :" . $data->anNais?>
                            <?php endif ?>
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
            <?php if($table == "film"): ?>
                <div class="film-content">
                    <img class="modal-img" src="<?= $data->affiche ?>">
                    <?php //la description apparaît par un accordion ?>
                    <div class="film-description">
                        <?= $data->description ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($table == "personne"): ?>
                <div class="personne-content">
                    <img class="modal-img" src="<?= $data->photo ?>">
                    <?php //la description apparaît par un accordion ?>
                    <div class="personne-description">
                        <?= $data->description ?>
                    </div>
                </div>
            <?php endif; ?>
        </article>
    <?php }
}
