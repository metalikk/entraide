<?php 
session_start();
require_once(dirname(__FILE__) . "./../configs/database.php");

$req = $db->prepare('INSERT INTO advert (title, description, image_url, author_id, created_at, location, statut) VALUES(:title, :description, :image_url, :author_id, NOW(), :location, :statut)');
$req->bindParam(':title', $_POST["title"]);
$req->bindParam(':description', $_POST["description"]);
$req->bindParam(':image_url', $_POST["image_url"]);
$req->bindParam(':author_id', $_SESSION["id"]);
$req->bindParam(':location', $_POST["location"]);
$req->bindParam(':statut', $config['STATUTS'][0]);
$req->execute();



?>