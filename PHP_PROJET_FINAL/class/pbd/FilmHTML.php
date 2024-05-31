<?php

class FilmHTML
{

    public function getHTML(){ ?>
        <article class="film">
            <h1><?= $this->nom ?></h1>
            <div class="film-content">
                <?php if($this->affiche != null) : ?>

                <img src="<?= "../../images/" . $this->affiche ?>">

                <?php endif; ?>
                <div class="film-description">
                    <?= $this->description ?>
                </div>
            </div>
        </article>
    <?php }

}