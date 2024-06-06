<?php
class Template
{

    public static function render(string $content) : void{?>

        <!doctype html>
        <html lang="en">
        <head>
        <meta charset = "UTF-8">
        <title>TheFilmGuy</title>
        <link rel = "stylesheet" href = "../css/template.css">

        <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

        </head>
        <body>
            <div id="wrapper">
            <?php include "../pages/header.php" ?>

            
                <?php echo $content ?>
            

            <?php include "../pages/footer.php" ?>
            </div>
        </body>
        </html>

    <?php
    }

}