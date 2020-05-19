<?php
require "youtube.php";

$html = "";


foreach($cat_test["youtube"] as $youtube) {
    $html.= "<figure class=\"col-4\">
    <h2 class=\"text-center\">".$youtube["titre"]."</h2>
    <div class=\"img-block\"><a href=\"intro/Intro1.html\"><img src=\"img/".$youtube["image"]."\" alt=\"Lien vers ".$youtube["titre"]."\">
    </a></div>
    <p>".$youtube["description"]."</p>
</figure>";
}



<h1 class="text-center">Mes intro</h1>
        
<nav class="fig-menu row bg-light">


foreach($cat_test["youtube"] as $youtube) {
    $html.= "<figure class=\"col-4\">
    <h2 class=\"text-center\">".$youtube["titre"]."</h2>
    <div class=\"img-block\"><a href=\"vidéos/Vidéos1.html\"><img src=\"img/".$youtube["image"]."\" alt=\"Lien vers ".$youtube["titre"]."\">
    </a></div>
    <p>".$youtube["description"]."</p>
</figure>";
}

?>

<h1 class="text-center">Mes videos</h1>
        
<nav class="fig-menu row bg-light">














    <?= $html ?>
</nav>