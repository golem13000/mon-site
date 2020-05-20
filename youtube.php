<?php
require "acceuil.html";

$html = "";


foreach($cat_test["Mes intro"] as $intro) {
    $html.= "<figure class=\"col-4\">
    <h2 class=\"text-center\">".$intro["titre"]."</h2>
    <div class=\"img-block\"><a href=\"intro/Intro1.html\"><img src=\"img/".$intro["image"]."\" alt=\"Lien vers ".$intro["titre"]."\">
    </a></div>
    <p>".$intro["description"]."</p>
</figure>";
}



foreach($cat_test["Mes vidéos"] as $videos) {
    $html.= "<figure class=\"col-4\">
    <h2 class=\"text-center\">".$videos["titre"]."</h2>
    <div class=\"img-block\"><a href=\"vidéos/Vidéos1.html\"><img src=\"img/".$videos["image"]."\" alt=\"Lien vers ".$videos["titre"]."\">
    </a></div>
    <p>".$videos["description"]."</p>
</figure>";
}

foreach($cat_test["Mes lives"] as $lives) {
    $html.= "<figure class=\"col-4\">
    <h2 class=\"text-center\">".$lives["titre"]."</h2>
    <div class=\"img-block\"><a href=\"vidéos/Vidéos1.html\"><img src=\"img/".$lives["image"]."\" alt=\"Lien vers ".$lives["titre"]."\">
    </a></div>
    <p>".$lives["description"]."</p>
</figure>";
}



?>


<h1 class="text-center">Mes intro</h1>
        
<nav class="fig-menu row bg-light">

<h1 class="text-center">Mes videos</h1>
        
<nav class="fig-menu row bg-light">

<h1 class="text-center">Mes lives</h1>
        
<nav class="fig-menu row bg-light">
















    <?= $html ?>
</nav>