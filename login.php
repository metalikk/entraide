<?php
require_once ("components/header.php"); 

?>

<body>
<div id="form" class="container-fluid" >
<div class="row pt-5">
<form action="functions/loginUser.php" class="col-md-6" method="post">
        <h1>Je me connecte</h1>
        <?php if (isset($_GET["message"])) : ?>
            <?php 
        if(isset($_GET["type"]) && ($_GET["type"]) === "sucess"){
            $classMessage = "alert alert-sucess alert-dismissible fade show";
        }   else{
            $classMessage = "alert alert-danger alert-dismissible fade show";
        }    
            ?>
<div class= "<?= $classMessage ?>" role="alert">
<?=  $_GET ["message"] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php  endif ?>
        <div class="form-group">
            <input type="text" name="pseudo"  class="form-controle" placeholder="Entrez votre pseudo">
        </div>
        <div class="form-group">
            <input type="password" name="password"  class="form-controle" placeholder="Entrez votre password">
        </div>
        <div class="form-group">
            <a href ="register.php" class="btn btn-warning">Créer un compte</a>
<input type="submit" value="Je me connecte" class="btn btn-primary">
        </div>
</form>
<div class="col-md-6 text-center">
<img src="asset/img/logo.png " height="300px" width= "300px" alt="">
    </div></div>

</div>

<?php
 require_once ("components/footer.php"); 
?>