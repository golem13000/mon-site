<?php



?>

<h1>Mon espace</h1>

<a href="index.php?route=deconnect">Me déconnecter</a>

<form action="index.php?route=insert_tache" method="post">
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
    </div>
    <div>
        <label for="deadline">Avant le </label>
        input type="date" id="deadline" name="deadline">
    </div>
    <input type="submit" value="Ajouter">
</form>        