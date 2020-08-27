<?php 
require_once("components/header.php");
require_once("components/navbar.php");
?> //ab
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ajouter une annonce</h1>
    <form action="" class="form-group">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Entrez un titre" id="">
        </div>
        <div class="form-group">
            <input type="text" name="image" class="form-control" placeholder="Entrez une url" id="">
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Entrez une description"></textarea>
        </div>
        <div class="form-group">
            <select name="location" class="form-control">
                <option value="Lille">Lille</option>
                <option value="Tourcoing">Tourcoing</option>
                <option value="Roubaix">Roubaix</option>
                <option value="Lens">Lens</option>
            </select>
        </div>
        <input type="submit"value="Créer mon annonce" class="btn btn-primary">
    </form>
        </div>
    </div>
</div>



<?php
 require_once("components/footer.php");
?>