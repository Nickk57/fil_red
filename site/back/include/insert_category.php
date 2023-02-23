<?php
    include_once('model/category.php');
    ajoutCategory();
?>
<div class="">
    <h1>Ajoute une category</h1>
</div>
<div class="container">
    <form method="POST" action="#">
        <div class="form">
            <label for="exampleFormControlInput1">Nom</label>
            <input class="form-control" type="text" name="name" id="exampleFormControlInput1" required>
        </div>
        <br>
        <div class="form">
            <button type="submit" class="btn btn-success" name="submit">Enregistre la categorie</button>
        </div>
    </form>
</div>