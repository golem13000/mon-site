<?php

class Utilisateurs extends Dbconnect {
    private $idUtilisateur;
    private $role;
    private $nom;
    private $prenom;
    private $adresse;
    private $pseudo;
    private $password;
 
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $id) {
        $this->idUtilisateur = $id;
    }

    public function getRole($role) {
     return $this->role;
 }
 
 public function setRole($role) {
     $this->role = $role;
 }

 public function getNom($nom) {
     return $this->nom;
 }
 
 public function setNom($nom) {
     $this->nom = $nom;
 }

 public function getPrenom($prenom) {
     return $this->prenom;
 }
 
 public function setPrenom($prenom) {
     $this->prenom = $prenom;
 }

    public function getAdresse($adresse) {
        return $this->adresse;
    }
    
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    
    public function getPseudo($pseudo) {
        return $this->pseudo;
    }
    
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getPassword($password) {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


public function insert(){

$query="INSERT INTO users(ROLE, NOM, PRENOM, ADRESSE_EMAIL, PSEUDO, PASSWORD) VALUES (:role, :nom, :prenom,:adresse_mail,:pseudo,:password)";
$result=$this->pdo->prepare($query);
$result->bindValue(':role',$this->role,PDO::PARAM_STR);
$result->bindValue(':nom',$this->nom,PDO::PARAM_STR);
$result->bindValue(':prenom',$this->prenom,PDO::PARAM_STR);
$result->bindValue(':adresse_mail',$this->adresse,PDO::PARAM_STR);
$result->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
$result->bindValue(':password',$this->password,PDO::PARAM_STR);
$result->execute();
$this->id=$this->pdo->lastInsertId();
return$this;
}


public function selectAll(){
        $query ="SELECT * FROM users;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll();

        $tab= json_decode(file_get_contents("datas/users.json"));

        foreach($datas as $data) {
            $current = new Utilisateurs();
            $current->setId($data['id_user']);
            array_push($tab, $current);
            }
            return $tab;

    }
    
public function select(){
    $query2 = "SELECT * FROM users WHERE id_user = :id;";
    $result2 = $this->pdo->prepare($query2);
    $result2->bindValue(':id',$this->idUtilisateur,PDO::PARAM_INT);
    $result2->execute();
    $data2 = $result2->fetch();
    $this->nom = $data2["nom"];
    $this->prenom = $data2["prenom"];
    $this->pseudo = $data2["pseudo"];
    $this->password = $data2["password"];
    $this->adresse = $data2["adresse_email"];
    $this->role = $data2["role"];
        
        return $this;
    }

public fonction update() {

    $query ="UPDATE `users` SET `ID_USER`=:iduser, `NOM`=:nom,`PRENOM`=:prenom,`ADRESSE_EMAIL`=:adresse,`PSEUDO`=:pseudo WHERE ID_USER = :iduser";;
            $result = $this->pdo->prepare($query);
            $result->bindValue(':iduser',$this->idUtilisateur,PDO::PARAM_INT);
            $result->bindValue(':nom',$this->nom,PDO::PARAM_STR);
            $result->bindValue(':prenom',$this->prenom,PDO::PARAM_STR);
            $result->bindValue(':adresse',$this->adresse,PDO::PARAM_STR);
            $result->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
            $result->execute();

    }   
    
public fonction delete() {

    $query ="DELETE FROM `users` WHERE ID_USER = :iduser";
    $result = $this->pdo->prepare($query);
    $result->bindValue(':iduser',$this->idUtilisateur,PDO::PARAM_INT);
    $result->execute();

    }    

    public function selectByPseudo(){
        $query2 = "SELECT * FROM users WHERE pseudo = '$this->pseudo';";
        $result2 = $this->pdo->prepare($query2);
        $result2->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $result2->execute();
        $data2 = $result2->fetch();
                
         return $data2;
        }

}
?>