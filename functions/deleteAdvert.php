<?php
require_once(dirname(__FILE__) . "/../configs/database.php");


$req = $db->prepare("DELETE FROM advert WHERE id = :advert_id");
$req->bindParam(":advert_id", $_GET["advert_id"]);
$req->execute();

header("Location: ../index.php");




?>