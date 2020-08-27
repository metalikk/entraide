<?php

require_once(dirname(__FILE__) . "/../configs/database.php");

if($_POST["password"] !== $_POST["confirmPassword"]){
    header("Location: ../register.php?message=Erreur votre confirmation de mot passe doit être identique à votre mot de passe");
}

$req = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->execute();

$result = $req->fetch(PDO :: FETCH_ASSOC); // prendre toutes les lignes de la bdd

if($result){
    $message = "Le compte existe déjà";
    header("Location: ../register.php?message=$message");
}
if(!$result){
    $passwordToHash = $_POST["password"] . $config["SECRET_KEY"]; //clé en plus du password ( secure password generator .net)
$hash =  md5("$passwordToHash"); // crypter mdp + clé pour securiser


if(isset($_POST["role"])){
    $role = $config["ROLES"][1];
}else{
    $role = $config["ROLES"][0];
}


$req = $db->prepare("INSERT INTO user(pseudo, password, role) VALUE(:pseudo, :password, :role)");
$req->bindParam(":pseudo",$_POST["pseudo"]);
$req->bindParam(":password",$hash);
$req->bindParam(":role", $role);
$req->execute(); 


$message = "Compté créé";
header("Location: ../login.php?message=$message&type=sucess");
}


?>