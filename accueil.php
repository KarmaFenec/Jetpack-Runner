<?php

require "../class/Autoloader.php";
Autoloader::register();
?>
<link rel="stylesheet" href="../css/home.css">
<?php
session_start() ;
$logged = isset($_SESSION['nickname']) ;
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

<?php if($logged): ?>
<h1>Hi <?php echo $_SESSION['nickname'] ?></h1>
<?php endif; ?>

<body>
<div id = "main_content">
    <div id = "seen">
        <h2 class = "titre">Films vus</h2>
        
        <!-- premier carousel -->
        <div id = "carouselCardSeen" class = "carousel slide carousel-fade" data-bs-ride = "carousel">
            <div id = "cards" class = "carousel-inner">

                <!-- insérer les cartes ici -->
                <div class = "carousel-item active">
                    <div class = "card" style = "width: 18rem;">
                        <img src = "../images/glosling.png" class = "card-img-top">
                        <div class = "card-body">
                            <h5 class = "card-title">Le conducteur de drive</h5>
                            <p class = "card-text">Celui qui conduit la voiture de drive</p>
                        </div>
                    </div>
                </div>

                <div class = "carousel-item">
                    <img src = "../images/logo-corp.png" class = "img-thumbnail">
                </div>
            </div>

            <button class = "carousel-control-prev" type = "button" data-bs-target = "#carouselCardSeen" data-bs-slide = "prev">
                <span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
            </button>
            <button class = "carousel-control-next" type = "button" data-bs-target = "#carouselCardSeen" data-bs-slide = "next">
                <span class = "carousel-control-next-icon" aria-hidden = "true"></span>
            </button>
        </div>
    </div>

    <div id = "notSeen">
        <h2 class = "titre">Films non vus</h2>

        <!-- second carousel -->
        <div id = "carouselCardNotSeen" class = "carousel slide carousel-fade" data-bs-ride = "carousel">
            <div class = "carousel-inner">

                <!-- insérer les cartes ici -->
                <div class = "carousel-item active">
                    <div class = "card" style = "width: 18rem;">
                        <img src = "../images/glosling.png" class = "card-img-top">
                        <div class = "card-body">
                            <h5 class = "card-title">Le conducteur de drive</h5>
                            <p class = "card-text">Celui qui conduit la voiture de drive</p>
                        </div>
                    </div>
                </div>
                <div class = "carousel-item">
                    <img src = "../images/logo-corp.png" class = "img-thumbnail">
                </div>
            </div>

            <button class = "carousel-control-prev" type = "button" data-bs-target = "#carouselCardNotSeen" data-bs-slide = "prev">
                <span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
            </button>
            <button class = "carousel-control-next" type = "button" data-bs-target = "#carouselCardNotSeen" data-bs-slide = "next">
                <span class = "carousel-control-next-icon" aria-hidden = "true"></span>
            </button>
        </div>
    </div>
</div>
</body>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>