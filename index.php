<?php
    //var_dump($_GET);


    // ROUTER 
    $page = isset($_GET["page"])? $_GET["page"] : "intro";

    switch ($page) {
        case "home":
            $include = "recettes/intro.html";
            break;
        case "entree":
            $include = "recettes/intro.html";
            break;
        case "plat":
            $include = "recettes/vidéo.html";
            break;
        case "dessert":
            $include = "recettes/live.html";
            break;
        case "recette":
            $include = "recettes/html/recette.php";
            break;
        default : $include = "mon site.html";
    }
    // ---
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>Mon petit site</title>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <header>
            <?php require "menu.php" ?>
        </header>

        <section class="content">
            <?php require $include ?>
        </section>
        
    </body>

</html>