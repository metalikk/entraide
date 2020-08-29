<?php 
session_start();

if(!isset($_SESSION ["pseudo"])){
  header("Location: login.php");
  }

require_once("components/header.php");
require_once("components/navbar.php");
require_once("configs/database.php");
require_once("functions/getUser.php");

$req = $db->prepare("SELECT id, title, description, image_url, location, statut, author_id, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM advert WHERE id =:id");
$req->bindParam(':id', $_GET["id"]);
$req->execute();

$result = $req->fetch(PDO::FETCH_ASSOC);
$user = getUser($result["author_id"]);
?>

<div class="container" id = "advert-page">
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="<?=$result['image_url'] ?>"  width = "450px" height ="450px" alt"">
        </div>
        <div class="col-md-6">
        <h1> <?= $result['title'] ?> <span class="badge badge-secondary"><?=$result['statut'] ?> </span ></h1>
        <p> <?= $user["pseudo"] ?> - <?=$result['location'] ?> - <?=$result['created_at_format'] ?> </p>
        <p> <?= $result["description"] ?></p>
        </div>
    </div>
</div>


<?php
require_once ("components/footer.php"); 
?>