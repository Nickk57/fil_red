<?php ob_start() ?>
<br>
<div class="conatiner text-center">
    <h1>Modification des categorie</h1>
</div><br>
<div class="container">
    <form method="post">
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Nom</label>
            <input type="text" value="<?=$selCategory['name']?>" name="name" class="form-control" id="exampleInputNom1" aria-describedby="Nom">
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="submit" name="submit">Valides</button>
            <a href="index.php?page=2"><button class="btn btn-dark" type="button" name="retour">Retour</button></a>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php')?>