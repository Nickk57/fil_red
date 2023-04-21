<?php ob_start() ?>
<br>
<div class="container">
    <h1>Ajoute une sous-category</h1>
    <h3><?= $success ?></h3>
</div><br>
<div class="container">
    <form method="POST">
        <div class="form">
            <label for="exampleFormControlInput1">Nom :</label><br>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" require>
        </div><br>
        <!-- <div class="form">
            <label for="formFile" class="form-label">photos :</label><br>
            <input type="text" name="namePicture" class="form-control"><br>
            <input type="file" name="chemin" id="formFile" class="form-control">
        </div><br> -->
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" name="submit" class="btn btn-success">Enregistre la sous-categorie</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php require('layout.php') ?>