<?php ob_start() ?>
<br>
<div class="conatiner">
    <h1>Modification des sous-categorie</h1>
</div><br>
<div class="conatiner">
    <form method="POST">
        <div class="form">
            <label for="exampleInputNom1">Nom</label></td>
            <input type="text" name="name" class="form-control" id="exampleInputNom1" aria-describedby="Nom" value="<?=$subCategory['name']?>"></td>
        </div>
        <br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="submit" name="submit">Valides</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php')?>