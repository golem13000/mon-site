<?php

require 'Utilisateurs.php';


class Commentaire extends Dbconnect {
    public $idComment;
    public $description;
    public $idUtilisateur;

    function __construct($id=null) {
     parent::__construct($id);
}


public function getIdUtilisateur() {
    return $this->idUtilisateur;
}

public function setIdUtilisateur(int $id) {
    $this->idUtilisateur = $id;
}

public function getDescription() {
    return $this->description;
}

public function setDescription($description) {
    $this->description = $description;
}

public function getIdComment() {
    return $this->idComment;
}

public function setIdComment($id2) {
    $this->idComment = $id2;
}


public function insert(){
    $query = "INSERT INTO comments (DESCRIPTION, ID_USER) VALUES (:description, :id)";
    $result = $this->pdo->prepare($query);
    $result->bindValue("description", $this->description, PDO::PARAM_STR);
    $result->bindValue("id", $this->idUtilisateur, PDO::PARAM_INT);
    $result->execute();
    $this->idComment = $this->pdo->lastInsertId();
    var_dump($this);
    return $this;
}


public function selectAll(){
    $query ="SELECT * FROM comments;";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $datas= $result->fetchAll();

    $tab=[];

    foreach($datas as $data) {
        $current = new Commentaire();
        $current->setIdUtilisateur($data['ID_USER']);
            $current->setIdComment($data['ID_COMMENT']);
            $current->setDescription($data['DESCRIPTION']);
        array_push($tab, $current);
        }
        return $tab;

}

public function selectByUser(){
$query ="SELECT * FROM comments WHERE ID_USER = :iduser ;";
$result = $this->pdo->prepare($query);
$result->bindValue(':iduser',$this->idUtilisateur,PDO::PARAM_INT);
$result->execute();
$datas= $result->fetchAll();

$tab=[];
foreach($datas as $data) {
    $current = new Commentaire();
        $current->setIdUtilisateur($data['ID_USER']);
        $current->setIdComment($data['ID_COMMENT']);
        $current->setDescription($data['DESCRIPTION']);
    array_push($tab, $current);
    }
    return $tab;

}

public function select(){
$query = "SELECT * FROM comments WHERE ID_COMMENT = :idcomment;";
$result = $this->pdo->prepare($query);
$result->bindValue(':idcomment',$this->idComment,PDO::PARAM_INT);
$result->execute();
$data = $result->fetch();
$this->setIdUtilisateur($data['ID_USER']);
$this->setIdComment($data['ID_COMMENT']);
$this->setDescription($data['DESCRIPTION']);

    return $this;
}


public function update(){
        $query ="UPDATE `comments` SET `DESCRIPTION`=:description,`ID_USER`=:iduser WHERE ID_COMMENT = :idcomment";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':idcomment',$this->idComment,PDO::PARAM_INT);
        $result->bindValue(':description',$this->description,PDO::PARAM_STR);
        $result->bindValue(':iduser',$this->idUtilisateur,PDO::PARAM_INT);
        $result->execute();
}


public function delete(){
    $query ="DELETE FROM `comments` WHERE ID_COMMENT = :idcomment";
$result = $this->pdo->prepare($query);
$result->bindValue(':idcomment',$this->idComment,PDO::PARAM_INT);
$result->execute();
}

}

?>