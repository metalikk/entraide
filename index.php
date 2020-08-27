<?php 
session_start();
require_once("components/header.php");
require_once("components/navbar.php");
if(!isset($_SESSION ["pseudo"])){
header("Location: login.php");
}

?>

<div class="container">
<h1>Liste des annonces</h1>
    <div class="row mt-5">
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
      <a href="advert-page.php">
        <h5 class="card-title">Card title</h5></a>
    
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
      <a href="advert-page.php">
        <h5 class="card-title">Card title</h5></a>
    
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
  <img src="https://picsum.photos/200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  
</div>

        </div>
    </div>
</div>






<?php
 require_once("components/footer.php");
?>