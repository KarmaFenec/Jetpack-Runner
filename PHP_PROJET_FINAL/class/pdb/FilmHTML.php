<?php

class FilmHTML
{
    public function getHTML($data){ ?>
        <article class="film">
            <h1><?= $data->nom ?></h1>
            <div class="film-content">
                <?php if($data->affiche != null) : ?>

                <img src="<?= "../../images/" . $data->affiche ?>">

                <?php endif; ?>
                <div class="film-description">
                    <?= $data->description ?>
                </div>
            </div>
        </article>
    <?php }
}