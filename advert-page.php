<?php 
session_start();

if(!isset($_SESSION ["pseudo"])){
  header("Location: login.php");
  }

require_once("components/header.php");
require_once("components/navbar.php");
require_once("configs/database.php");
require_once("functions/getUser.php");

$req = $db->prepare("SELECT id, title, description, image_url, location, statut, author_id, helper_id, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM advert WHERE id =:id");
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

        <!--   s'il s'agit du proprietaire de l'annonce et que cette annonce n'est pas archivée -->
        <!--afficher bouton archiver et suprimer --> 

        <?php if ($_SESSION["id"] === $result["author_id"] && $result["statut"] !== $config["STATUTS"][2]): ?>
        <a href = "functions/deleteAdvert.php" class ="btn btn-danger"> Supprimer </a>
        <a href = "functions/updateAdvert.php?advert_id=<?=$result["id"]?> &action=archived"class ="btn btn-primary"> Archiver </a>
        <?php endif ?>

        <?php if ($_SESSION["id"] === $result["author_id"] && $result["statut"] === $config["STATUTS"][2]): ?>
        <a href = "functions/deleteAdvert.php?advert_id=<?= $result["id"]?>"class ="btn btn-danger"> Supprimer </a>
        <?php endif ?>

        <!-- s'il s'agit un jojoHelper,  si personne ne s'occupe de l'annonce --> 
        <!-- afficher le bouton participer --> 

        <?php if ($_SESSION["role"] === $config["ROLES"][1]  &&  $result["statut"] === $config["STATUTS"][0]): ?>
        <a href = "functions/updateAdvert.php?advert_id=<?=$result["id"]?> &action=in_progress"class ="btn btn-primary"> Participer </a>
        <?php endif ?>

        <?php if ($_SESSION["role"] === $config["ROLES"][1]  &&  $result["statut"] === $config["STATUTS"][1]): ?>
        <?php if ($_SESSION ["id"] === $result["helper_id"]) : ?>
        <a href = "functions/updateAdvert.php?advert_id=<?=$result["id"]?> &action=created"class ="btn btn-danger"> Annuler </a>
        <?php else : ?>
         On s'occupe de moi 
         <?php endif ?>
        <?php endif ?>


        </div>
    </div>
</div>

<?php


require_once ("components/footer.php"); 
?>