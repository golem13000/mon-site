<?php

session_start();

require "conf/global.php";


spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")){
        require_once "models/$class.php";
    }
});

$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";

switch($route) {
    case "home" : $view = showHome();
        break;
    case "insert_user" : insertUser();
        break;
    case "connect_user" : connectUser();
        break;
    case "deconnect" : deconnectUser();
        break;
    default : $view= showHome();
}

function showHome() {
            if(isset($_SESSION["utilisateur"])) {
                header("Location:index.php?route=membre");
            }       
            $datas = [];
            return ["template" => "home.html", "datas" => $datas];
}

function insertUser() {
    var_dump($_POST);
    if(preg_match("#^[a-zA-Z0-9]*$#", $_POST['pseudo']) &&
preg_match("#^[a-zA-Z0-9]*$#", $_POST['password'])){
    echo "Le pseudo et le mot de passe sont corrects";
    if(!empty($_POST['role'] && !empty($_POST['nom'] && !empty($_POST['prenom'] && !empty($_POST['adresse'] && !empty($_POST['pseudo'] && !empty($_POST['password']))))))){
$user = new Utilisateurs();
$user-> setRole($_POST['role']);
$user-> setNom($_POST['nom']);
$user-> setPrenom($_POST['prenom']);
$user-> setAdresse($_POST['adresse']);
$user-> setPseudo($_POST['pseudo']);
$user-> setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
var_dump($user);
$user->insert();
$role= isset($_POST['role'])? $_POST['role'] : "null";
$nom= isset($_POST['nom'])? $_POST['nom'] : "null";
$prenom= isset($_POST['prenom'])? $_POST['prenom'] : "null";
$adresse= isset($_POST['adresse'])? $_POST['adresse'] : "null";
$pseudo= isset($_POST['pseudo'])? $_POST['pseudo'] : "null";
$password= isset($_POST['password'])? $_POST['password'] : "null";
$_SESSION['pseudo']=$pseudo;
$_SESSION['password']=$password;
}
header('Location:index.php');
}else {
    echo "Le pseudo et le mot de passe sont incorrects";
}
}

function connectUser() {
    if(!empty($_POST['pseudo'] && !empty($_POST['password']))){
        $user = new Utilisateurs();
        $user-> setPseudo($_POST['pseudo']);
        $user-> setPassword($_POST['password']);
        $reponse = $user->selectByPseudo();
        if ($reponse && password_verify($_POST['password'],$reponse['password'])){
            $_SESSION['id'] = $reponse['id_user'];
            $_SESSION['pseudo']= $reponse['pseudo'];
            $_SESSION['password']=$reponse['password'];
            header('Location:monsite.php');
        }else {
            header('Location:index.php');
        }
        }
}

function deconnectUser() {
    unset($_SESSION['pseudo']);
    header('Location:index.php');
        }
        
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Plateforme</title>
</head>
<body>
    <?php require "views/{$view['template']}";?>
    
</body>
</html> 