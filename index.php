<?php 
session_start();
require_once("components/header.php");
require_once("components/navbar.php");
require_once("configs/database.php");
require_once("configs/config.php");
require_once("functions/getUser.php");
if(!isset($_SESSION ["pseudo"])){
header("Location: login.php");
}
?>

<div class="container">
<h1>Liste des annonces</h1>
    <div class="row mt-5">
    <?php 
    $req = $db->prepare("SELECT id, title, description, image_url, location, statut, author_id, DATE_FORMAT(created_at, '%d/%m/%Y à %H:%i') AS created_at_format FROM advert WHERE statut = :statut ORDER BY created_at DESC");
    $req->bindParam(':statut', $config["STATUTS"][0]);
    $req->execute();
    while($result = $req->fetch(PDO::FETCH_ASSOC)) :?>

    <div class="col-md-6">
      <div class="card mb-3">
        <div class="row no no-gutters">
          <div class="col-md-4">
            <a href="advert-page.php">
              <img src ="<?= $result["image_url"]?>" alt="">
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <a href="advert-page.php">
                <h5 class ="card-tilte"><?= $result["title"]?></h5>
              </a>
              <p class ="card-text">
                  <?php 
                  $user = getUser($result["author_id"]);
                  ?>
                    <small class= "text-muted"><?= $user["pseudo"]?> - <?= $result["location"]?></small>
                    <br>
                    <small class= "text-muted"><?= $result["created_at_format"]?></small>
              </p>
              <p class="card-text">
                <?= substr($result["description"], 0, 100)?> ...</p>

            </div>
          </div>

        </div>

      </div>

    </div>

      
        <?php endwhile ?>
        
    </div>
</div>


<?php
require_once("components/footer.php");
?>
