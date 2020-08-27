<?php
 require_once ("components/header.php"); 
?>

<body>
<div id="form" class="container-fluid" >
<div class="row pt-5">
<form action="functions/createUser.php" class="col-md-6" method="post">
        <h1>Créer un compte</h1>
        <?php if (isset($_GET["message"])) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <input type="password" name="confirmPassword"  class="form-controle" placeholder="Confirmez votre pseudo">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="role" id="role" class="form-check-input">
            <label for="role">Je souhaite devenir un jojo helper</label>
        </div>
        <div class="form-group">
            <a href ="login.php" class="btn btn-warning">Connexion</a>
<input type="submit" value="Créer mon compte" class="btn btn-primary">
        </div>
</form>
<div class="col-md-6 text-center">
<img src="asset/img/logo.png " height="300px" width= "300px" alt="">
    </div></div>

</div>
<?php
require_once ("components/footer.php"); 
?>