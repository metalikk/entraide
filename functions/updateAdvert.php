<?php
session_start();
require_once(dirname(__FILE__) . "/../configs/database.php");

if($_GET["action"] === "archived"){

    $req = $db->prepare("UPDATE advert SET statut =:statut WHERE id = :advert_id");
    $req->bindParam(":statut", $_GET["action"]);
    $req->bindParam(":advert_id", $_GET["advert_id"]);
    $req->execute();

    header("Location: ../advert-page.php?id=" .$_GET["advert_id"]);
}

if($_GET["action"] === "in_progress"){

    $req = $db->prepare("UPDATE advert SET statut =:statut, helper_id =:helper_id WHERE id = :advert_id");
    $req->bindParam(":statut", $_GET["action"]);
    $req->bindParam(":advert_id", $_GET["advert_id"]);
    $req->bindParam(":helper_id", $_SESSION["id"]);
    $req->execute();

    header("Location: ../advert-page.php?id=" .$_GET["advert_id"]); 
    
}
if($_GET["action"] === "created"){

    $newHelperID = NULL;
    $req = $db->prepare("UPDATE advert SET statut =:statut, helper_id =:helper_id WHERE id = :advert_id");
    $req->bindParam(":statut", $_GET["action"]);
    $req->bindParam(":advert_id", $_GET["advert_id"]);
    $req->bindParam(":helper_id", $newHelperID);
    $req->execute();

    header("Location: ../advert-page.php?id=" .$_GET["advert_id"]); 
    
}
?>