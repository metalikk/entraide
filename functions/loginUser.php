<?php
require_once(dirname(__FILE__) . "/../configs/database.php");

$passwordToHash = $_POST["password"] . $config["SECRET_KEY"]; //clé en plus du password ( secure password generator .net)
$hash =  md5("$passwordToHash"); // crypter mdp + clé pour securiser


$req = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $hash);
$req->execute();

$result = $req->fetch(PDO :: FETCH_ASSOC); // prendre toutes les lignes de la bdd

if(!$result){
    header("Location: ../login.php?message=identifiants incorrects");
} else {
    session_start();
    $_SESSION["pseudo"] = $result["pseudo"];
    header("Location: ../index.php");
}
?>