<?php

require "../class/Autoloader.php";
Autoloader::register();

session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<link rel = "stylesheet" href = "css/home.css">
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<!-- Démarre le buffering -->
<?php ob_start() ?>

<div class="title">ACTEURS</div>

<div class="main-content">
    FICHE
</div>

<article class="acteurs">
    <h1 class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"><?= "Rayan Glosling" ?></h1>
    <?php //le nom dois conduire sur la fiche de l'article ?>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= "Rayan Glosling" ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <img class="modal-img" src= "../images/glosling.png">
            <div class="modal-text">
            <?=
            "This is some placeholder content to show the scrolling behavior for modals. We use repeated line breaks to demonstrate how content can exceed minimum inner height, thereby showing inner scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.
            This content should appear at the bottom after you scroll."
            ?>
            </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>


    <div class="film-content">
        <img class="modal-img" src= "../images/glosling.png">
        <?php //la description apparaît par un accordion ?>
        <div class="film-description">
            <?= "C'est le mec qui conduit la voiture dans drive." ?>
        </div>
        
    </div>
</article>

<article class="acteurs">
    <h1 class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><?= "Vinz Gasoil" ?></h1>
    <?php //le nom dois conduire sur la fiche de l'article ?>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= "Vinz Gasoil" ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <img class="modal-img" src= "../images/Fast_and_Furious5.png">
            <div class="modal-text">
            <?=
            "This is some placeholder content to show the scrolling behavior for modals. We use repeated line breaks to demonstrate how content can exceed minimum inner height, thereby showing inner scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.
            This content should appear at the bottom after you scroll."
            ?>
            </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>


    <div class="film-content">
        <img class="modal-img" src= "../images/Fast_and_Furious5.png" >
        <?php //la description apparaît par un accordion ?>
        <div class="film-description">
            <?= "C'est le mec qui conduit la voiture dans drive." ?>
        </div>
        
    </div>
</article>

<?php $content=ob_get_clean() ?>
<?php Template::render($content) ?>